<?php

/**
 * Configuration de la base de données
 * 
 * Ce fichier contient la configuration pour la connexion à la base de données locale
 * et la classe Database pour gérer les connexions PDO
 */

// Configuration de la base de données
define('DB_HOST', 'localhost');
define('DB_NAME', 'erp_gestion');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

/**
 * Classe Database pour gérer les connexions à la base de données
 */
class Database {
    private static $instance = null;
    private $connection = null;
    
    private function __construct() {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . DB_CHARSET
            ];
            
            $this->connection = new PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (PDOException $e) {
            error_log("Erreur de connexion à la base de données: " . $e->getMessage());
            throw new Exception("Erreur de connexion à la base de données");
        }
    }
    
    /**
     * Obtenir l'instance unique de la classe Database (Singleton)
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    /**
     * Obtenir la connexion PDO
     */
    public function getConnection() {
        return $this->connection;
    }
    
    /**
     * Empêcher le clonage de l'instance
     */
    private function __clone() {}
    
    /**
     * Empêcher la désérialisation de l'instance
     */
    public function __wakeup() {
        throw new Exception("Impossible de désérialiser un singleton");
    }
}

/**
 * Classe BaseModel - Classe de base pour tous les modèles
 */
abstract class BaseModel {
    protected $db;
    protected $table;
    protected $primaryKey = 'id';
    
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
    
    /**
     * Récupérer tous les enregistrements
     */
    public function all($conditions = [], $orderBy = null, $limit = null) {
        $sql = "SELECT * FROM {$this->table}";
        
        if (!empty($conditions)) {
            $where = [];
            foreach ($conditions as $key => $value) {
                $where[] = "$key = :$key";
            }
            $sql .= " WHERE " . implode(" AND ", $where);
        }
        
        if ($orderBy) {
            $sql .= " ORDER BY $orderBy";
        }
        
        if ($limit) {
            $sql .= " LIMIT $limit";
        }
        
        $stmt = $this->db->prepare($sql);
        
        foreach ($conditions as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    /**
     * Récupérer un enregistrement par ID
     */
    public function find($id) {
        $sql = "SELECT * FROM {$this->table} WHERE {$this->primaryKey} = :id LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }
    
    /**
     * Récupérer un enregistrement selon des conditions
     */
    public function findWhere($conditions) {
        $where = [];
        foreach ($conditions as $key => $value) {
            $where[] = "$key = :$key";
        }
        
        $sql = "SELECT * FROM {$this->table} WHERE " . implode(" AND ", $where) . " LIMIT 1";
        $stmt = $this->db->prepare($sql);
        
        foreach ($conditions as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        
        $stmt->execute();
        return $stmt->fetch();
    }
    
    /**
     * Créer un nouvel enregistrement
     */
    public function create($data) {
        // Ajouter la date de création si elle n'existe pas
        if (!isset($data['created_at'])) {
            $data['created_at'] = date('Y-m-d H:i:s');
        }
        
        $columns = array_keys($data);
        $values = array_values($data);
        
        $placeholders = array_map(function($col) { return ":$col"; }, $columns);
        
        $sql = "INSERT INTO {$this->table} (" . implode(", ", $columns) . ") 
                VALUES (" . implode(", ", $placeholders) . ")";
        
        $stmt = $this->db->prepare($sql);
        
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        
        if ($stmt->execute()) {
            return $this->db->lastInsertId();
        }
        
        return false;
    }
    
    /**
     * Mettre à jour un enregistrement
     */
    public function update($id, $data) {
        // Ajouter la date de mise à jour
        if (!isset($data['updated_at'])) {
            $data['updated_at'] = date('Y-m-d H:i:s');
        }
        
        $set = [];
        foreach ($data as $key => $value) {
            $set[] = "$key = :$key";
        }
        
        $sql = "UPDATE {$this->table} SET " . implode(", ", $set) . 
               " WHERE {$this->primaryKey} = :id";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        
        return $stmt->execute();
    }
    
    /**
     * Supprimer un enregistrement (soft delete si la colonne deleted_at existe)
     */
    public function delete($id) {
        // Vérifier si la table a une colonne deleted_at pour le soft delete
        $columns = $this->getTableColumns();
        
        if (in_array('deleted_at', $columns)) {
            // Soft delete
            $sql = "UPDATE {$this->table} SET deleted_at = :deleted_at 
                    WHERE {$this->primaryKey} = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':deleted_at', date('Y-m-d H:i:s'));
            $stmt->bindValue(':id', $id);
        } else {
            // Hard delete
            $sql = "DELETE FROM {$this->table} WHERE {$this->primaryKey} = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':id', $id);
        }
        
        return $stmt->execute();
    }
    
    /**
     * Restaurer un enregistrement supprimé (soft delete)
     */
    public function restore($id) {
        $sql = "UPDATE {$this->table} SET deleted_at = NULL 
                WHERE {$this->primaryKey} = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }
    
    /**
     * Compter les enregistrements
     */
    public function count($conditions = []) {
        $sql = "SELECT COUNT(*) as total FROM {$this->table}";
        
        if (!empty($conditions)) {
            $where = [];
            foreach ($conditions as $key => $value) {
                $where[] = "$key = :$key";
            }
            $sql .= " WHERE " . implode(" AND ", $where);
        }
        
        $stmt = $this->db->prepare($sql);
        
        foreach ($conditions as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['total'] ?? 0;
    }
    
    /**
     * Récupérer les colonnes de la table
     */
    private function getTableColumns() {
        $sql = "SHOW COLUMNS FROM {$this->table}";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $columns = $stmt->fetchAll(PDO::FETCH_COLUMN);
        return $columns;
    }
    
    /**
     * Commencer une transaction
     */
    public function beginTransaction() {
        return $this->db->beginTransaction();
    }
    
    /**
     * Valider une transaction
     */
    public function commit() {
        return $this->db->commit();
    }
    
    /**
     * Annuler une transaction
     */
    public function rollback() {
        return $this->db->rollBack();
    }
    
    /**
     * Exécuter une requête SQL personnalisée
     */
    public function query($sql, $params = []) {
        $stmt = $this->db->prepare($sql);
        
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    /**
     * Pagination
     */
    public function paginate($page = 1, $perPage = 15, $conditions = [], $orderBy = null) {
        $offset = ($page - 1) * $perPage;
        
        // Compter le total
        $total = $this->count($conditions);
        
        // Récupérer les données
        $sql = "SELECT * FROM {$this->table}";
        
        if (!empty($conditions)) {
            $where = [];
            foreach ($conditions as $key => $value) {
                $where[] = "$key = :$key";
            }
            $sql .= " WHERE " . implode(" AND ", $where);
        }
        
        if ($orderBy) {
            $sql .= " ORDER BY $orderBy";
        }
        
        $sql .= " LIMIT :limit OFFSET :offset";
        
        $stmt = $this->db->prepare($sql);
        
        foreach ($conditions as $key => $value) {
            $stmt->bindValue(":$key", $value);
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
            'last_page' => ceil($total / $perPage),
            'from' => $offset + 1,
            'to' => min($offset + $perPage, $total)
        ];
    }
}

/**
 * Fonction helper pour obtenir une connexion à la base de données
 */
function getDB() {
    return Database::getInstance()->getConnection();
}

?>
