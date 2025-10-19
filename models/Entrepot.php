<?php

require_once __DIR__ . '/../configs/database-config.php';

class Entrepot extends BaseModel {
    protected $table = 'entrepots';
    
    /**
     * Récupérer tous les entrepôts actifs
     */
    public function getActiveEntrepots() {
        return $this->all(['is_active' => 1, 'deleted_at' => null], 'name ASC');
    }
    
    /**
     * Récupérer les entrepôts avec pagination et filtres
     */
    public function getEntrepots($filters = [], $page = 1, $perPage = 15) {
        $sql = "SELECT e.*, u.username as manager_name
                FROM {$this->table} e
                LEFT JOIN users u ON e.manager_id = u.id
                WHERE e.deleted_at IS NULL";
        
        $params = [];
        
        // Filtres
        if (!empty($filters['search'])) {
            $sql .= " AND (e.name LIKE :search OR e.code LIKE :search)";
            $params[':search'] = '%' . $filters['search'] . '%';
        }
        
        if (!empty($filters['type'])) {
            $sql .= " AND e.type = :type";
            $params[':type'] = $filters['type'];
        }
        
        if (isset($filters['is_active'])) {
            $sql .= " AND e.is_active = :is_active";
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
        $sql .= " ORDER BY e.name ASC";
        
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
     * Générer un code entrepôt automatique
     */
    public function generateEntrepotCode() {
        $sql = "SELECT code FROM {$this->table} 
                WHERE code LIKE 'ENT-%' 
                ORDER BY id DESC LIMIT 1";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        
        if ($result) {
            $lastCode = $result['code'];
            $number = intval(substr($lastCode, 4)) + 1;
        } else {
            $number = 1;
        }
        
        return 'ENT-' . str_pad($number, 4, '0', STR_PAD_LEFT);
    }
}

?>
