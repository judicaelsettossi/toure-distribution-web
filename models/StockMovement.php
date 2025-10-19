<?php

require_once __DIR__ . '/../configs/database-config.php';

class StockMovement extends BaseModel {
    protected $table = 'stock_movements';
    
    /**
     * Récupérer les mouvements avec pagination et filtres
     */
    public function getMovements($filters = [], $page = 1, $perPage = 15) {
        $sql = "SELECT sm.*, 
                       smt.name as movement_type_name,
                       smt.type as movement_type,
                       ef.name as entrepot_from_name,
                       et.name as entrepot_to_name,
                       f.name as fournisseur_name,
                       c.name as client_name,
                       u.username as user_name
                FROM {$this->table} sm
                LEFT JOIN stock_movement_types smt ON sm.movement_type_id = smt.id
                LEFT JOIN entrepots ef ON sm.entrepot_from_id = ef.id
                LEFT JOIN entrepots et ON sm.entrepot_to_id = et.id
                LEFT JOIN fournisseurs f ON sm.fournisseur_id = f.id
                LEFT JOIN clients c ON sm.client_id = c.id
                LEFT JOIN users u ON sm.user_id = u.id
                WHERE sm.deleted_at IS NULL";
        
        $params = [];
        
        // Filtres
        if (!empty($filters['search'])) {
            $sql .= " AND sm.numero LIKE :search";
            $params[':search'] = '%' . $filters['search'] . '%';
        }
        
        if (!empty($filters['movement_type_id'])) {
            $sql .= " AND sm.movement_type_id = :movement_type_id";
            $params[':movement_type_id'] = $filters['movement_type_id'];
        }
        
        if (!empty($filters['statut'])) {
            $sql .= " AND sm.statut = :statut";
            $params[':statut'] = $filters['statut'];
        }
        
        if (!empty($filters['entrepot_from_id'])) {
            $sql .= " AND sm.entrepot_from_id = :entrepot_from_id";
            $params[':entrepot_from_id'] = $filters['entrepot_from_id'];
        }
        
        if (!empty($filters['entrepot_to_id'])) {
            $sql .= " AND sm.entrepot_to_id = :entrepot_to_id";
            $params[':entrepot_to_id'] = $filters['entrepot_to_id'];
        }
        
        if (!empty($filters['date_from'])) {
            $sql .= " AND sm.date_mouvement >= :date_from";
            $params[':date_from'] = $filters['date_from'];
        }
        
        if (!empty($filters['date_to'])) {
            $sql .= " AND sm.date_mouvement <= :date_to";
            $params[':date_to'] = $filters['date_to'];
        }
        
        // Comptage total
        $countSql = "SELECT COUNT(*) as total FROM (" . $sql . ") as count_table";
        $countStmt = $this->db->prepare($countSql);
        foreach ($params as $key => $value) {
            $countStmt->bindValue($key, $value);
        }
        $countStmt->execute();
        $total = $countStmt->fetch()['total'];
        
        // Tri
        $sql .= " ORDER BY sm.date_mouvement DESC, sm.created_at DESC";
        
        // Pagination
        $offset = ($page - 1) * $perPage;
        $sql .= " LIMIT :limit OFFSET :offset";
        
        $stmt = $this->db->prepare($sql);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        $stmt->bindValue(':limit', (int)$perPage, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        
        $stmt->execute();
        $data = $stmt->fetchAll();
        
        return [
            'data' => $data,
            'total' => $total,
            'per_page' => $perPage,
            'current_page' => $page,
            'last_page' => ceil($total / $perPage)
        ];
    }
    
    /**
     * Récupérer un mouvement avec ses détails
     */
    public function getMovementWithDetails($id) {
        $sql = "SELECT sm.*, 
                       smt.name as movement_type_name,
                       smt.type as movement_type,
                       ef.name as entrepot_from_name,
                       et.name as entrepot_to_name,
                       f.name as fournisseur_name,
                       c.name as client_name,
                       u.username as user_name
                FROM {$this->table} sm
                LEFT JOIN stock_movement_types smt ON sm.movement_type_id = smt.id
                LEFT JOIN entrepots ef ON sm.entrepot_from_id = ef.id
                LEFT JOIN entrepots et ON sm.entrepot_to_id = et.id
                LEFT JOIN fournisseurs f ON sm.fournisseur_id = f.id
                LEFT JOIN clients c ON sm.client_id = c.id
                LEFT JOIN users u ON sm.user_id = u.id
                WHERE sm.id = :id AND sm.deleted_at IS NULL
                LIMIT 1";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        
        $movement = $stmt->fetch();
        
        if ($movement) {
            // Récupérer les détails du mouvement
            $detailsSql = "SELECT smd.*, 
                                  p.name as product_name,
                                  p.code as product_code
                           FROM stock_movement_details smd
                           INNER JOIN products p ON smd.product_id = p.id
                           WHERE smd.stock_movement_id = :movement_id";
            
            $detailsStmt = $this->db->prepare($detailsSql);
            $detailsStmt->bindValue(':movement_id', $id);
            $detailsStmt->execute();
            
            $movement['details'] = $detailsStmt->fetchAll();
        }
        
        return $movement;
    }
    
    /**
     * Créer un mouvement de stock avec ses détails
     */
    public function createMovement($data, $details) {
        $this->beginTransaction();
        
        try {
            // Créer le mouvement
            $movementId = $this->create($data);
            
            // Créer les détails
            $detailsModel = new StockMovementDetail();
            foreach ($details as $detail) {
                $detail['stock_movement_id'] = $movementId;
                $detailsModel->create($detail);
            }
            
            // Mettre à jour le montant total
            $this->updateTotalAmount($movementId);
            
            $this->commit();
            return $movementId;
        } catch (Exception $e) {
            $this->rollback();
            throw $e;
        }
    }
    
    /**
     * Valider un mouvement de stock
     */
    public function validateMovement($movementId, $userId) {
        $movement = $this->getMovementWithDetails($movementId);
        
        if (!$movement) {
            throw new Exception("Mouvement introuvable");
        }
        
        if ($movement['statut'] === 'valide') {
            throw new Exception("Ce mouvement est déjà validé");
        }
        
        $this->beginTransaction();
        
        try {
            $stockModel = new Stock();
            
            foreach ($movement['details'] as $detail) {
                $productId = $detail['product_id'];
                $quantity = $detail['quantite'];
                $cost = $detail['cout_unitaire'];
                
                // Mouvement d'entrée
                if ($movement['movement_type'] === 'entree' && $movement['entrepot_to_id']) {
                    $stockModel->updateQuantity($productId, $movement['entrepot_to_id'], $quantity, 'add');
                    $stockModel->updateAverageCost($productId, $movement['entrepot_to_id'], $quantity, $cost);
                }
                
                // Mouvement de sortie
                if ($movement['movement_type'] === 'sortie' && $movement['entrepot_from_id']) {
                    $stockModel->updateQuantity($productId, $movement['entrepot_from_id'], $quantity, 'subtract');
                }
                
                // Mouvement de transfert
                if ($movement['movement_type'] === 'transfert') {
                    if ($movement['entrepot_from_id']) {
                        $stockModel->updateQuantity($productId, $movement['entrepot_from_id'], $quantity, 'subtract');
                    }
                    if ($movement['entrepot_to_id']) {
                        $stockModel->updateQuantity($productId, $movement['entrepot_to_id'], $quantity, 'add');
                    }
                }
            }
            
            // Mettre à jour le statut du mouvement
            $this->update($movementId, [
                'statut' => 'valide',
                'validated_by' => $userId,
                'validated_at' => date('Y-m-d H:i:s')
            ]);
            
            $this->commit();
            return true;
        } catch (Exception $e) {
            $this->rollback();
            throw $e;
        }
    }
    
    /**
     * Mettre à jour le montant total d'un mouvement
     */
    public function updateTotalAmount($movementId) {
        $sql = "SELECT SUM(montant) as total 
                FROM stock_movement_details 
                WHERE stock_movement_id = :movement_id";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':movement_id', $movementId);
        $stmt->execute();
        
        $result = $stmt->fetch();
        $total = $result['total'] ?? 0;
        
        $this->update($movementId, ['montant_total' => $total]);
    }
    
    /**
     * Générer un numéro de mouvement
     */
    public function generateMovementNumber($typeCode) {
        $prefix = strtoupper($typeCode) . '-' . date('Ymd') . '-';
        
        $sql = "SELECT numero FROM {$this->table} 
                WHERE numero LIKE :prefix 
                ORDER BY id DESC LIMIT 1";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':prefix', $prefix . '%');
        $stmt->execute();
        $result = $stmt->fetch();
        
        if ($result) {
            $lastNumber = intval(substr($result['numero'], -4)) + 1;
        } else {
            $lastNumber = 1;
        }
        
        return $prefix . str_pad($lastNumber, 4, '0', STR_PAD_LEFT);
    }
}

class StockMovementDetail extends BaseModel {
    protected $table = 'stock_movement_details';
}

?>
