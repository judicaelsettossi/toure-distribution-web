<?php

require_once __DIR__ . '/../configs/database-config.php';

class Fournisseur extends BaseModel {
    protected $table = 'fournisseurs';
    
    /**
     * Récupérer les fournisseurs avec pagination et filtres
     */
    public function getFournisseurs($filters = [], $page = 1, $perPage = 15) {
        $sql = "SELECT * FROM {$this->table} WHERE deleted_at IS NULL";
        
        $params = [];
        
        // Filtres
        if (!empty($filters['search'])) {
            $sql .= " AND (name LIKE :search OR code LIKE :search OR email LIKE :search OR phone LIKE :search)";
            $params[':search'] = '%' . $filters['search'] . '%';
        }
        
        if (!empty($filters['type'])) {
            $sql .= " AND type = :type";
            $params[':type'] = $filters['type'];
        }
        
        if (isset($filters['is_active'])) {
            $sql .= " AND is_active = :is_active";
            $params[':is_active'] = $filters['is_active'];
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
        $sql .= " ORDER BY name ASC";
        
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
     * Générer un code fournisseur automatique
     */
    public function generateFournisseurCode() {
        $sql = "SELECT code FROM {$this->table} 
                WHERE code LIKE 'FOURN-%' 
                ORDER BY id DESC LIMIT 1";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        
        if ($result) {
            $lastCode = $result['code'];
            $number = intval(substr($lastCode, 6)) + 1;
        } else {
            $number = 1;
        }
        
        return 'FOURN-' . str_pad($number, 6, '0', STR_PAD_LEFT);
    }
}

?>
