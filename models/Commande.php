<?php

require_once __DIR__ . '/../configs/database-config.php';

class Commande extends BaseModel {
    protected $table = 'commandes';
    
    /**
     * Récupérer les commandes avec pagination et filtres
     */
    public function getCommandes($filters = [], $page = 1, $perPage = 15) {
        $sql = "SELECT c.*, 
                       f.name as fournisseur_name,
                       f.code as fournisseur_code,
                       e.name as entrepot_name,
                       u.username as user_name
                FROM {$this->table} c
                INNER JOIN fournisseurs f ON c.fournisseur_id = f.id
                LEFT JOIN entrepots e ON c.entrepot_id = e.id
                LEFT JOIN users u ON c.user_id = u.id
                WHERE c.deleted_at IS NULL AND f.deleted_at IS NULL";
        
        $params = [];
        
        // Filtres
        if (!empty($filters['search'])) {
            $sql .= " AND (c.numero_commande LIKE :search OR f.name LIKE :search)";
            $params[':search'] = '%' . $filters['search'] . '%';
        }
        
        if (!empty($filters['fournisseur_id'])) {
            $sql .= " AND c.fournisseur_id = :fournisseur_id";
            $params[':fournisseur_id'] = $filters['fournisseur_id'];
        }
        
        if (!empty($filters['status'])) {
            $sql .= " AND c.status = :status";
            $params[':status'] = $filters['status'];
        }
        
        if (!empty($filters['date_achat_debut'])) {
            $sql .= " AND c.date_commande >= :date_achat_debut";
            $params[':date_achat_debut'] = $filters['date_achat_debut'];
        }
        
        if (!empty($filters['date_achat_fin'])) {
            $sql .= " AND c.date_commande <= :date_achat_fin";
            $params[':date_achat_fin'] = $filters['date_achat_fin'];
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
        $sql .= " ORDER BY c.date_commande DESC, c.created_at DESC";
        
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
            'success' => true,
            'data' => [
                'commandes' => $data,
                'pagination' => [
                    'total' => $total,
                    'per_page' => $perPage,
                    'current_page' => $page,
                    'last_page' => ceil($total / $perPage),
                    'from' => $offset + 1,
                    'to' => min($offset + $perPage, $total)
                ]
            ]
        ];
    }
    
    /**
     * Récupérer une commande avec ses détails
     */
    public function getCommandeWithDetails($id) {
        $sql = "SELECT c.*, 
                       f.name as fournisseur_name,
                       f.code as fournisseur_code,
                       f.email as fournisseur_email,
                       f.phone as fournisseur_phone,
                       f.address as fournisseur_address,
                       e.name as entrepot_name,
                       u.username as user_name
                FROM {$this->table} c
                INNER JOIN fournisseurs f ON c.fournisseur_id = f.id
                LEFT JOIN entrepots e ON c.entrepot_id = e.id
                LEFT JOIN users u ON c.user_id = u.id
                WHERE c.id = :id AND c.deleted_at IS NULL
                LIMIT 1";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        
        $commande = $stmt->fetch();
        
        if ($commande) {
            // Récupérer les détails de la commande
            $detailsSql = "SELECT dc.*, 
                                  p.name as product_name,
                                  p.code as product_code,
                                  p.image_url as product_image
                           FROM detail_commandes dc
                           INNER JOIN products p ON dc.product_id = p.id
                           WHERE dc.commande_id = :commande_id";
            
            $detailsStmt = $this->db->prepare($detailsSql);
            $detailsStmt->bindValue(':commande_id', $id);
            $detailsStmt->execute();
            
            $commande['details'] = $detailsStmt->fetchAll();
            
            // Récupérer les paiements
            $paiementsSql = "SELECT * FROM paiement_commandes 
                             WHERE commande_id = :commande_id 
                             ORDER BY date_paiement DESC";
            
            $paiementsStmt = $this->db->prepare($paiementsSql);
            $paiementsStmt->bindValue(':commande_id', $id);
            $paiementsStmt->execute();
            
            $commande['paiements'] = $paiementsStmt->fetchAll();
        }
        
        return $commande;
    }
    
    /**
     * Créer une commande avec ses détails
     */
    public function createCommande($data, $details) {
        $this->beginTransaction();
        
        try {
            // Calculer les montants
            $montantHT = 0;
            $montantTVA = 0;
            
            foreach ($details as $detail) {
                $montantHT += $detail['sous_total'];
                $montantTVA += ($detail['sous_total'] * $detail['tva'] / 100);
            }
            
            $montantTTC = $montantHT + $montantTVA;
            $remise = $data['remise'] ?? 0;
            $fraisTransport = $data['frais_transport'] ?? 0;
            $montantTotal = $montantTTC - $remise + $fraisTransport;
            
            // Préparer les données de la commande
            $commandeData = [
                'numero_commande' => $this->generateCommandeNumber(),
                'fournisseur_id' => $data['fournisseur_id'],
                'entrepot_id' => $data['entrepot_id'] ?? null,
                'user_id' => $data['user_id'],
                'date_commande' => $data['date_commande'] ?? date('Y-m-d'),
                'date_livraison_prevue' => $data['date_livraison_prevue'] ?? null,
                'status' => $data['status'] ?? 'brouillon',
                'montant_ht' => $montantHT,
                'montant_tva' => $montantTVA,
                'montant_ttc' => $montantTTC,
                'remise' => $remise,
                'frais_transport' => $fraisTransport,
                'montant_total' => $montantTotal,
                'conditions_paiement' => $data['conditions_paiement'] ?? null,
                'notes' => $data['notes'] ?? null
            ];
            
            // Créer la commande
            $commandeId = $this->create($commandeData);
            
            // Créer les détails
            $detailsModel = new DetailCommande();
            foreach ($details as $detail) {
                $detail['commande_id'] = $commandeId;
                $detailsModel->create($detail);
            }
            
            $this->commit();
            return $commandeId;
        } catch (Exception $e) {
            $this->rollback();
            throw $e;
        }
    }
    
    /**
     * Mettre à jour une commande
     */
    public function updateCommande($id, $data, $details = null) {
        $this->beginTransaction();
        
        try {
            // Si des détails sont fournis, recalculer les montants
            if ($details !== null) {
                $montantHT = 0;
                $montantTVA = 0;
                
                foreach ($details as $detail) {
                    $montantHT += $detail['sous_total'];
                    $montantTVA += ($detail['sous_total'] * $detail['tva'] / 100);
                }
                
                $montantTTC = $montantHT + $montantTVA;
                $remise = $data['remise'] ?? 0;
                $fraisTransport = $data['frais_transport'] ?? 0;
                $montantTotal = $montantTTC - $remise + $fraisTransport;
                
                $data['montant_ht'] = $montantHT;
                $data['montant_tva'] = $montantTVA;
                $data['montant_ttc'] = $montantTTC;
                $data['montant_total'] = $montantTotal;
                
                // Supprimer les anciens détails
                $detailsModel = new DetailCommande();
                $sql = "DELETE FROM detail_commandes WHERE commande_id = :commande_id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue(':commande_id', $id);
                $stmt->execute();
                
                // Créer les nouveaux détails
                foreach ($details as $detail) {
                    $detail['commande_id'] = $id;
                    $detailsModel->create($detail);
                }
            }
            
            // Mettre à jour la commande
            $this->update($id, $data);
            
            $this->commit();
            return true;
        } catch (Exception $e) {
            $this->rollback();
            throw $e;
        }
    }
    
    /**
     * Recevoir une commande (créer un mouvement de stock)
     */
    public function recevoirCommande($commandeId, $receptionData, $details) {
        $this->beginTransaction();
        
        try {
            $commande = $this->find($commandeId);
            
            if (!$commande) {
                throw new Exception("Commande introuvable");
            }
            
            // Créer le mouvement de stock
            $movementModel = new StockMovement();
            
            // Récupérer le type de mouvement pour les entrées d'achat
            $sql = "SELECT id FROM stock_movement_types WHERE code = 'ENTR_ACHAT' LIMIT 1";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $movementType = $stmt->fetch();
            
            if (!$movementType) {
                throw new Exception("Type de mouvement 'ENTR_ACHAT' introuvable");
            }
            
            $movementData = [
                'numero' => $movementModel->generateMovementNumber('ENTR_ACHAT'),
                'movement_type_id' => $movementType['id'],
                'entrepot_to_id' => $commande['entrepot_id'] ?? $receptionData['entrepot_id'],
                'fournisseur_id' => $commande['fournisseur_id'],
                'user_id' => $receptionData['user_id'],
                'reference_type' => 'commande',
                'reference_id' => $commandeId,
                'date_mouvement' => $receptionData['date_reception'] ?? date('Y-m-d'),
                'statut' => 'brouillon',
                'note' => 'Réception de commande #' . $commande['numero_commande']
            ];
            
            // Créer et valider le mouvement
            $movementId = $movementModel->createMovement($movementData, $details);
            $movementModel->validateMovement($movementId, $receptionData['user_id']);
            
            // Mettre à jour les quantités reçues dans les détails de la commande
            $detailsModel = new DetailCommande();
            foreach ($details as $detail) {
                $sql = "UPDATE detail_commandes 
                        SET quantite_recue = quantite_recue + :quantite 
                        WHERE commande_id = :commande_id AND product_id = :product_id";
                
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue(':quantite', $detail['quantite']);
                $stmt->bindValue(':commande_id', $commandeId);
                $stmt->bindValue(':product_id', $detail['product_id']);
                $stmt->execute();
            }
            
            // Vérifier si la commande est complètement reçue
            $sql = "SELECT 
                        SUM(quantite) as total_commande,
                        SUM(quantite_recue) as total_recu
                    FROM detail_commandes 
                    WHERE commande_id = :commande_id";
            
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':commande_id', $commandeId);
            $stmt->execute();
            $totals = $stmt->fetch();
            
            $newStatus = 'en_cours';
            if ($totals['total_recu'] >= $totals['total_commande']) {
                $newStatus = 'livree';
                $this->update($commandeId, [
                    'status' => $newStatus,
                    'date_livraison_reelle' => $receptionData['date_reception'] ?? date('Y-m-d')
                ]);
            } elseif ($totals['total_recu'] > 0) {
                $newStatus = 'partielle';
                $this->update($commandeId, ['status' => $newStatus]);
            }
            
            $this->commit();
            return $movementId;
        } catch (Exception $e) {
            $this->rollback();
            throw $e;
        }
    }
    
    /**
     * Générer un numéro de commande
     */
    public function generateCommandeNumber() {
        $prefix = 'CMD-' . date('Ymd') . '-';
        
        $sql = "SELECT numero_commande FROM {$this->table} 
                WHERE numero_commande LIKE :prefix 
                ORDER BY id DESC LIMIT 1";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':prefix', $prefix . '%');
        $stmt->execute();
        $result = $stmt->fetch();
        
        if ($result) {
            $lastNumber = intval(substr($result['numero_commande'], -4)) + 1;
        } else {
            $lastNumber = 1;
        }
        
        return $prefix . str_pad($lastNumber, 4, '0', STR_PAD_LEFT);
    }
}

class DetailCommande extends BaseModel {
    protected $table = 'detail_commandes';
}

?>
