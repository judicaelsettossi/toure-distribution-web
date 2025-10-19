<?php

require_once __DIR__ . '/../configs/database-config.php';

class Product extends BaseModel {
    protected $table = 'products';
    
    /**
     * Récupérer les produits avec pagination et filtres
     */
    public function getProducts($filters = [], $page = 1, $perPage = 15) {
        $sql = "SELECT p.*, 
                       pc.name as category_name,
                       u.name as unit_name,
                       u.symbol as unit_symbol
                FROM {$this->table} p
                LEFT JOIN product_categories pc ON p.category_id = pc.id
                LEFT JOIN units u ON p.unit_id = u.id
                WHERE p.deleted_at IS NULL";
        
        $params = [];
        
        // Filtres
        if (!empty($filters['search'])) {
            $sql .= " AND (p.name LIKE :search OR p.code LIKE :search OR p.barcode LIKE :search)";
            $params[':search'] = '%' . $filters['search'] . '%';
        }
        
        if (!empty($filters['category_id'])) {
            $sql .= " AND p.category_id = :category_id";
            $params[':category_id'] = $filters['category_id'];
        }
        
        if (!empty($filters['status'])) {
            $sql .= " AND p.status = :status";
            $params[':status'] = $filters['status'];
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
        $sql .= " ORDER BY p.name ASC";
        
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
     * Récupérer un produit avec ses relations
     */
    public function getProductWithDetails($id) {
        $sql = "SELECT p.*, 
                       pc.name as category_name,
                       u.name as unit_name,
                       u.symbol as unit_symbol
                FROM {$this->table} p
                LEFT JOIN product_categories pc ON p.category_id = pc.id
                LEFT JOIN units u ON p.unit_id = u.id
                WHERE p.id = :id AND p.deleted_at IS NULL
                LIMIT 1";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch();
    }
    
    /**
     * Récupérer le stock total d'un produit
     */
    public function getTotalStock($productId) {
        $sql = "SELECT SUM(quantite_disponible) as total_stock
                FROM stocks
                WHERE product_id = :product_id";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':product_id', $productId);
        $stmt->execute();
        
        $result = $stmt->fetch();
        return $result['total_stock'] ?? 0;
    }
    
    /**
     * Récupérer le stock par entrepôt pour un produit
     */
    public function getStockByWarehouse($productId) {
        $sql = "SELECT s.*, e.name as entrepot_name, e.code as entrepot_code
                FROM stocks s
                INNER JOIN entrepots e ON s.entrepot_id = e.id
                WHERE s.product_id = :product_id";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':product_id', $productId);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    /**
     * Vérifier si le code produit existe déjà
     */
    public function codeExists($code, $excludeId = null) {
        $sql = "SELECT COUNT(*) as count FROM {$this->table} 
                WHERE code = :code AND deleted_at IS NULL";
        
        if ($excludeId) {
            $sql .= " AND id != :exclude_id";
        }
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':code', $code);
        
        if ($excludeId) {
            $stmt->bindValue(':exclude_id', $excludeId);
        }
        
        $stmt->execute();
        $result = $stmt->fetch();
        
        return $result['count'] > 0;
    }
    
    /**
     * Générer un code produit automatique
     */
    public function generateProductCode() {
        $sql = "SELECT code FROM {$this->table} 
                WHERE code LIKE 'PROD-%' 
                ORDER BY id DESC LIMIT 1";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        
        if ($result) {
            $lastCode = $result['code'];
            $number = intval(substr($lastCode, 5)) + 1;
        } else {
            $number = 1;
        }
        
        return 'PROD-' . str_pad($number, 6, '0', STR_PAD_LEFT);
    }
}

?>
