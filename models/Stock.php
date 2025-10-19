<?php

require_once __DIR__ . '/../configs/database-config.php';

class Stock extends BaseModel {
    protected $table = 'stocks';
    
    /**
     * Récupérer ou créer un stock pour un produit dans un entrepôt
     */
    public function getOrCreateStock($productId, $entrepotId) {
        $stock = $this->findWhere([
            'product_id' => $productId,
            'entrepot_id' => $entrepotId
        ]);
        
        if (!$stock) {
            $stockId = $this->create([
                'product_id' => $productId,
                'entrepot_id' => $entrepotId,
                'quantite_disponible' => 0,
                'quantite_reservee' => 0,
                'quantite_en_transit' => 0,
                'cout_moyen_unitaire' => 0,
                'valeur_stock' => 0
            ]);
            
            $stock = $this->find($stockId);
        }
        
        return $stock;
    }
    
    /**
     * Mettre à jour la quantité de stock
     */
    public function updateQuantity($productId, $entrepotId, $quantity, $type = 'add') {
        $stock = $this->getOrCreateStock($productId, $entrepotId);
        
        $newQuantity = $stock['quantite_disponible'];
        
        if ($type === 'add') {
            $newQuantity += $quantity;
        } elseif ($type === 'subtract') {
            $newQuantity -= $quantity;
        } elseif ($type === 'set') {
            $newQuantity = $quantity;
        }
        
        // Empêcher les quantités négatives
        if ($newQuantity < 0) {
            throw new Exception("La quantité ne peut pas être négative");
        }
        
        $this->update($stock['id'], [
            'quantite_disponible' => $newQuantity,
            'derniere_entree' => ($type === 'add') ? date('Y-m-d H:i:s') : $stock['derniere_entree'],
            'derniere_sortie' => ($type === 'subtract') ? date('Y-m-d H:i:s') : $stock['derniere_sortie']
        ]);
        
        return $newQuantity;
    }
    
    /**
     * Mettre à jour le coût moyen unitaire
     */
    public function updateAverageCost($productId, $entrepotId, $newQuantity, $newCost) {
        $stock = $this->getOrCreateStock($productId, $entrepotId);
        
        $oldQuantity = $stock['quantite_disponible'];
        $oldCost = $stock['cout_moyen_unitaire'];
        
        // Calcul du coût moyen pondéré
        $totalQuantity = $oldQuantity + $newQuantity;
        
        if ($totalQuantity > 0) {
            $averageCost = (($oldQuantity * $oldCost) + ($newQuantity * $newCost)) / $totalQuantity;
            $stockValue = $averageCost * $totalQuantity;
            
            $this->update($stock['id'], [
                'cout_moyen_unitaire' => $averageCost,
                'valeur_stock' => $stockValue
            ]);
        }
    }
    
    /**
     * Réserver du stock
     */
    public function reserveStock($productId, $entrepotId, $quantity) {
        $stock = $this->getOrCreateStock($productId, $entrepotId);
        
        if ($stock['quantite_disponible'] < $quantity) {
            throw new Exception("Stock insuffisant pour la réservation");
        }
        
        $this->update($stock['id'], [
            'quantite_disponible' => $stock['quantite_disponible'] - $quantity,
            'quantite_reservee' => $stock['quantite_reservee'] + $quantity
        ]);
    }
    
    /**
     * Libérer une réservation de stock
     */
    public function releaseReservation($productId, $entrepotId, $quantity) {
        $stock = $this->getOrCreateStock($productId, $entrepotId);
        
        $this->update($stock['id'], [
            'quantite_disponible' => $stock['quantite_disponible'] + $quantity,
            'quantite_reservee' => max(0, $stock['quantite_reservee'] - $quantity)
        ]);
    }
    
    /**
     * Récupérer tous les stocks avec détails
     */
    public function getAllStocksWithDetails($filters = []) {
        $sql = "SELECT s.*, 
                       p.name as product_name,
                       p.code as product_code,
                       p.stock_alert,
                       e.name as entrepot_name,
                       e.code as entrepot_code
                FROM {$this->table} s
                INNER JOIN products p ON s.product_id = p.id
                INNER JOIN entrepots e ON s.entrepot_id = e.id
                WHERE p.deleted_at IS NULL AND e.deleted_at IS NULL";
        
        $params = [];
        
        if (!empty($filters['entrepot_id'])) {
            $sql .= " AND s.entrepot_id = :entrepot_id";
            $params[':entrepot_id'] = $filters['entrepot_id'];
        }
        
        if (!empty($filters['product_id'])) {
            $sql .= " AND s.product_id = :product_id";
            $params[':product_id'] = $filters['product_id'];
        }
        
        if (isset($filters['alert_only']) && $filters['alert_only']) {
            $sql .= " AND s.quantite_disponible <= p.stock_alert";
        }
        
        $sql .= " ORDER BY p.name ASC";
        
        $stmt = $this->db->prepare($sql);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    /**
     * Récupérer les produits en rupture de stock
     */
    public function getOutOfStockProducts() {
        $sql = "SELECT p.*, 
                       SUM(s.quantite_disponible) as total_stock
                FROM products p
                LEFT JOIN stocks s ON p.id = s.product_id
                WHERE p.deleted_at IS NULL
                GROUP BY p.id
                HAVING total_stock <= 0 OR total_stock IS NULL
                ORDER BY p.name ASC";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    /**
     * Récupérer les produits en alerte de stock
     */
    public function getLowStockProducts() {
        $sql = "SELECT p.*, 
                       SUM(s.quantite_disponible) as total_stock,
                       p.stock_alert
                FROM products p
                LEFT JOIN stocks s ON p.id = s.product_id
                WHERE p.deleted_at IS NULL
                GROUP BY p.id
                HAVING total_stock <= p.stock_alert AND total_stock > 0
                ORDER BY p.name ASC";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

?>
