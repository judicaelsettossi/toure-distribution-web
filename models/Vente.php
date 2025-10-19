<?php

require_once __DIR__ . '/../configs/database-config.php';

class Vente extends BaseModel {
    protected $table = 'ventes';
    
    /**
     * Récupérer les ventes avec pagination et filtres
     */
    public function getVentes($filters = [], $page = 1, $perPage = 15) {
        $sql = "SELECT v.*, 
                       c.name as client_name,
                       c.code as client_code,
                       e.name as entrepot_name,
                       u.username as user_name
                FROM {$this->table} v
                LEFT JOIN clients c ON v.client_id = c.id
                LEFT JOIN entrepots e ON v.entrepot_id = e.id
                LEFT JOIN users u ON v.user_id = u.id
                WHERE v.deleted_at IS NULL";
        
        $params = [];
        
        // Filtres
        if (!empty($filters['search'])) {
            $sql .= " AND (v.numero_vente LIKE :search OR c.name LIKE :search)";
            $params[':search'] = '%' . $filters['search'] . '%';
        }
        
        if (!empty($filters['client_id'])) {
            $sql .= " AND v.client_id = :client_id";
            $params[':client_id'] = $filters['client_id'];
        }
        
        if (!empty($filters['status'])) {
            $sql .= " AND v.status = :status";
            $params[':status'] = $filters['status'];
        }
        
        if (!empty($filters['statut_paiement'])) {
            $sql .= " AND v.statut_paiement = :statut_paiement";
            $params[':statut_paiement'] = $filters['statut_paiement'];
        }
        
        if (!empty($filters['date_from'])) {
            $sql .= " AND v.date_vente >= :date_from";
            $params[':date_from'] = $filters['date_from'];
        }
        
        if (!empty($filters['date_to'])) {
            $sql .= " AND v.date_vente <= :date_to";
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
        $sql .= " ORDER BY v.date_vente DESC, v.created_at DESC";
        
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
                'ventes' => $data,
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
     * Récupérer une vente avec ses détails
     */
    public function getVenteWithDetails($id) {
        $sql = "SELECT v.*, 
                       c.name as client_name,
                       c.code as client_code,
                       c.email as client_email,
                       c.phone as client_phone,
                       c.address as client_address,
                       e.name as entrepot_name,
                       u.username as user_name
                FROM {$this->table} v
                LEFT JOIN clients c ON v.client_id = c.id
                LEFT JOIN entrepots e ON v.entrepot_id = e.id
                LEFT JOIN users u ON v.user_id = u.id
                WHERE v.id = :id AND v.deleted_at IS NULL
                LIMIT 1";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        
        $vente = $stmt->fetch();
        
        if ($vente) {
            // Récupérer les détails de la vente
            $detailsSql = "SELECT dv.*, 
                                  p.name as product_name,
                                  p.code as product_code,
                                  p.image_url as product_image
                           FROM detail_ventes dv
                           INNER JOIN products p ON dv.product_id = p.id
                           WHERE dv.vente_id = :vente_id";
            
            $detailsStmt = $this->db->prepare($detailsSql);
            $detailsStmt->bindValue(':vente_id', $id);
            $detailsStmt->execute();
            
            $vente['details'] = $detailsStmt->fetchAll();
            
            // Récupérer les paiements
            $paiementsSql = "SELECT * FROM paiement_ventes 
                             WHERE vente_id = :vente_id 
                             ORDER BY date_paiement DESC";
            
            $paiementsStmt = $this->db->prepare($paiementsSql);
            $paiementsStmt->bindValue(':vente_id', $id);
            $paiementsStmt->execute();
            
            $vente['paiements'] = $paiementsStmt->fetchAll();
        }
        
        return $vente;
    }
    
    /**
     * Créer une vente avec ses détails
     */
    public function createVente($data, $details) {
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
            $remiseMontant = $data['remise_montant'] ?? 0;
            $fraisLivraison = $data['frais_livraison'] ?? 0;
            $montantTotal = $montantTTC - $remiseMontant + $fraisLivraison;
            
            // Préparer les données de la vente
            $venteData = [
                'numero_vente' => $this->generateVenteNumber(),
                'client_id' => $data['client_id'] ?? null,
                'entrepot_id' => $data['entrepot_id'],
                'user_id' => $data['user_id'],
                'date_vente' => $data['date_vente'] ?? date('Y-m-d'),
                'type_vente' => $data['type_vente'] ?? 'comptant',
                'status' => $data['status'] ?? 'brouillon',
                'montant_ht' => $montantHT,
                'montant_tva' => $montantTVA,
                'montant_ttc' => $montantTTC,
                'remise_pourcentage' => $data['remise_pourcentage'] ?? 0,
                'remise_montant' => $remiseMontant,
                'frais_livraison' => $fraisLivraison,
                'montant_total' => $montantTotal,
                'montant_paye' => 0,
                'montant_restant' => $montantTotal,
                'statut_paiement' => 'non_paye',
                'notes' => $data['notes'] ?? null
            ];
            
            // Créer la vente
            $venteId = $this->create($venteData);
            
            // Créer les détails
            $detailsModel = new DetailVente();
            foreach ($details as $detail) {
                $detail['vente_id'] = $venteId;
                $detailsModel->create($detail);
            }
            
            // Si la vente est confirmée, créer un mouvement de stock
            if ($venteData['status'] === 'confirmee' || $venteData['status'] === 'livree') {
                $this->createStockMovementForVente($venteId, $venteData, $details);
            }
            
            $this->commit();
            return $venteId;
        } catch (Exception $e) {
            $this->rollback();
            throw $e;
        }
    }
    
    /**
     * Mettre à jour une vente
     */
    public function updateVente($id, $data, $details = null) {
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
                $remiseMontant = $data['remise_montant'] ?? 0;
                $fraisLivraison = $data['frais_livraison'] ?? 0;
                $montantTotal = $montantTTC - $remiseMontant + $fraisLivraison;
                
                $data['montant_ht'] = $montantHT;
                $data['montant_tva'] = $montantTVA;
                $data['montant_ttc'] = $montantTTC;
                $data['montant_total'] = $montantTotal;
                $data['montant_restant'] = $montantTotal - ($data['montant_paye'] ?? 0);
                
                // Supprimer les anciens détails
                $detailsModel = new DetailVente();
                $sql = "DELETE FROM detail_ventes WHERE vente_id = :vente_id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue(':vente_id', $id);
                $stmt->execute();
                
                // Créer les nouveaux détails
                foreach ($details as $detail) {
                    $detail['vente_id'] = $id;
                    $detailsModel->create($detail);
                }
            }
            
            // Mettre à jour la vente
            $this->update($id, $data);
            
            $this->commit();
            return true;
        } catch (Exception $e) {
            $this->rollback();
            throw $e;
        }
    }
    
    /**
     * Ajouter un paiement à une vente
     */
    public function addPaiement($venteId, $paiementData) {
        $this->beginTransaction();
        
        try {
            $vente = $this->find($venteId);
            
            if (!$vente) {
                throw new Exception("Vente introuvable");
            }
            
            // Créer le paiement
            $paiementModel = new PaiementVente();
            $paiementData['vente_id'] = $venteId;
            $paiementData['numero_paiement'] = $paiementModel->generatePaiementNumber();
            $paiementModel->create($paiementData);
            
            // Mettre à jour les montants de la vente
            $nouveauMontantPaye = $vente['montant_paye'] + $paiementData['montant'];
            $nouveauMontantRestant = $vente['montant_total'] - $nouveauMontantPaye;
            
            $statutPaiement = 'non_paye';
            if ($nouveauMontantRestant <= 0) {
                $statutPaiement = 'paye';
            } elseif ($nouveauMontantPaye > 0) {
                $statutPaiement = 'partiel';
            }
            
            $this->update($venteId, [
                'montant_paye' => $nouveauMontantPaye,
                'montant_restant' => max(0, $nouveauMontantRestant),
                'statut_paiement' => $statutPaiement
            ]);
            
            $this->commit();
            return true;
        } catch (Exception $e) {
            $this->rollback();
            throw $e;
        }
    }
    
    /**
     * Créer un mouvement de stock pour une vente
     */
    private function createStockMovementForVente($venteId, $venteData, $details) {
        $movementModel = new StockMovement();
        
        // Récupérer le type de mouvement pour les sorties de vente
        $sql = "SELECT id FROM stock_movement_types WHERE code = 'SORT_VENTE' LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $movementType = $stmt->fetch();
        
        if (!$movementType) {
            throw new Exception("Type de mouvement 'SORT_VENTE' introuvable");
        }
        
        // Créer le mouvement
        $movementData = [
            'numero' => $movementModel->generateMovementNumber('SORT_VENTE'),
            'movement_type_id' => $movementType['id'],
            'entrepot_from_id' => $venteData['entrepot_id'],
            'client_id' => $venteData['client_id'],
            'user_id' => $venteData['user_id'],
            'reference_type' => 'vente',
            'reference_id' => $venteId,
            'date_mouvement' => $venteData['date_vente'],
            'statut' => 'valide',
            'note' => 'Sortie de stock pour vente #' . $venteData['numero_vente']
        ];
        
        // Préparer les détails du mouvement
        $movementDetails = [];
        foreach ($details as $detail) {
            $movementDetails[] = [
                'product_id' => $detail['product_id'],
                'quantite' => $detail['quantite'],
                'prix_unitaire' => $detail['prix_unitaire'],
                'cout_unitaire' => $detail['cout_unitaire'] ?? 0,
                'montant' => $detail['sous_total']
            ];
        }
        
        // Créer et valider le mouvement
        $movementId = $movementModel->createMovement($movementData, $movementDetails);
        $movementModel->validateMovement($movementId, $venteData['user_id']);
    }
    
    /**
     * Générer un numéro de vente
     */
    public function generateVenteNumber() {
        $prefix = 'VENTE-' . date('Ymd') . '-';
        
        $sql = "SELECT numero_vente FROM {$this->table} 
                WHERE numero_vente LIKE :prefix 
                ORDER BY id DESC LIMIT 1";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':prefix', $prefix . '%');
        $stmt->execute();
        $result = $stmt->fetch();
        
        if ($result) {
            $lastNumber = intval(substr($result['numero_vente'], -4)) + 1;
        } else {
            $lastNumber = 1;
        }
        
        return $prefix . str_pad($lastNumber, 4, '0', STR_PAD_LEFT);
    }
}

class DetailVente extends BaseModel {
    protected $table = 'detail_ventes';
}

class PaiementVente extends BaseModel {
    protected $table = 'paiement_ventes';
    
    public function generatePaiementNumber() {
        $prefix = 'PAY-' . date('Ymd') . '-';
        
        $sql = "SELECT numero_paiement FROM {$this->table} 
                WHERE numero_paiement LIKE :prefix 
                ORDER BY id DESC LIMIT 1";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':prefix', $prefix . '%');
        $stmt->execute();
        $result = $stmt->fetch();
        
        if ($result) {
            $lastNumber = intval(substr($result['numero_paiement'], -4)) + 1;
        } else {
            $lastNumber = 1;
        }
        
        return $prefix . str_pad($lastNumber, 4, '0', STR_PAD_LEFT);
    }
}

?>
