<?php

// Configuration de la base de données locale
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'toure');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

// Flag pour vérifier si la base de données est initialisée
define('DB_INIT_CHECKED', 'db_init_checked');

// Fonction de connexion à la base de données locale
function getLocalDBConnection() {
    static $pdo = null;
    
    if ($pdo === null) {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            
            $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (PDOException $e) {
            error_log("Erreur de connexion à la base de données locale: " . $e->getMessage());
            throw new Exception("Impossible de se connecter à la base de données locale");
        }
    }
    
    return $pdo;
}

// Fonction pour exécuter une requête avec gestion d'erreurs
function executeLocalQuery($sql, $params = []) {
    try {
        $pdo = getLocalDBConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    } catch (PDOException $e) {
        error_log("Erreur SQL locale: " . $e->getMessage());
        throw new Exception("Erreur lors de l'exécution de la requête");
    }
}

// Fonction pour récupérer un enregistrement unique
function fetchLocalOne($sql, $params = []) {
    $stmt = executeLocalQuery($sql, $params);
    return $stmt->fetch();
}

// Fonction pour récupérer plusieurs enregistrements
function fetchLocalAll($sql, $params = []) {
    $stmt = executeLocalQuery($sql, $params);
    return $stmt->fetchAll();
}

// Fonction pour insérer et récupérer l'ID
function insertLocalAndGetId($sql, $params = []) {
    $pdo = getLocalDBConnection();
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $pdo->lastInsertId();
}

// Fonction pour commencer une transaction
function beginLocalTransaction() {
    $pdo = getLocalDBConnection();
    return $pdo->beginTransaction();
}

// Fonction pour valider une transaction
function commitLocalTransaction() {
    $pdo = getLocalDBConnection();
    return $pdo->commit();
}

// Fonction pour annuler une transaction
function rollbackLocalTransaction() {
    $pdo = getLocalDBConnection();
    return $pdo->rollBack();
}

// Fonction pour générer un numéro d'achat unique
function generatePurchaseNumber() {
    $prefix = 'ACH';
    $year = date('Y');
    $month = date('m');
    
    // Récupérer le dernier numéro du mois
    $sql = "SELECT purchase_number FROM purchases 
            WHERE purchase_number LIKE ? 
            ORDER BY purchase_number DESC 
            LIMIT 1";
    $pattern = $prefix . $year . $month . '%';
    $lastNumber = fetchLocalOne($sql, [$pattern]);
    
    if ($lastNumber) {
        $lastNum = intval(substr($lastNumber['purchase_number'], -4));
        $newNum = $lastNum + 1;
    } else {
        $newNum = 1;
    }
    
    return $prefix . $year . $month . str_pad($newNum, 4, '0', STR_PAD_LEFT);
}

// Fonction pour générer un numéro de vente unique
function generateSaleNumber() {
    $prefix = 'VEN';
    $year = date('Y');
    $month = date('m');
    
    // Récupérer le dernier numéro du mois
    $sql = "SELECT sale_number FROM sales 
            WHERE sale_number LIKE ? 
            ORDER BY sale_number DESC 
            LIMIT 1";
    $pattern = $prefix . $year . $month . '%';
    $lastNumber = fetchLocalOne($sql, [$pattern]);
    
    if ($lastNumber) {
        $lastNum = intval(substr($lastNumber['sale_number'], -4));
        $newNum = $lastNum + 1;
    } else {
        $newNum = 1;
    }
    
    return $prefix . $year . $month . str_pad($newNum, 4, '0', STR_PAD_LEFT);
}

// Fonction pour générer un numéro de transfert unique
function generateTransferNumber() {
    $prefix = 'TRF';
    $year = date('Y');
    $month = date('m');
    
    // Récupérer le dernier numéro du mois
    $sql = "SELECT transfer_number FROM stock_transfers 
            WHERE transfer_number LIKE ? 
            ORDER BY transfer_number DESC 
            LIMIT 1";
    $pattern = $prefix . $year . $month . '%';
    $lastNumber = fetchLocalOne($sql, [$pattern]);
    
    if ($lastNumber) {
        $lastNum = intval(substr($lastNumber['transfer_number'], -4));
        $newNum = $lastNum + 1;
    } else {
        $newNum = 1;
    }
    
    return $prefix . $year . $month . str_pad($newNum, 4, '0', STR_PAD_LEFT);
}

// Fonction d'auto-initialisation de la base de données
function autoInitializeDatabase() {
    // Vérifier si l'initialisation a déjà été faite
    if (isset($_SESSION[DB_INIT_CHECKED]) && $_SESSION[DB_INIT_CHECKED] === true) {
        return true;
    }
    
    try {
        // Tenter de se connecter à la base de données
        $pdo = getLocalDBConnection();
        
        // Vérifier si les tables principales existent
        $tables = ['warehouses', 'suppliers', 'products', 'purchases', 'purchase_details'];
        $missingTables = [];
        
        foreach ($tables as $table) {
            $result = $pdo->query("SHOW TABLES LIKE '{$table}'")->fetch();
            if (!$result) {
                $missingTables[] = $table;
            }
        }
        
        // Si des tables manquent, initialiser la base de données
        if (!empty($missingTables)) {
            initializeDatabaseTables();
        }
        
        // Marquer comme initialisé
        $_SESSION[DB_INIT_CHECKED] = true;
        return true;
        
    } catch (Exception $e) {
        // En cas d'erreur, essayer de créer la base de données
        try {
            createDatabaseIfNotExists();
            initializeDatabaseTables();
            $_SESSION[DB_INIT_CHECKED] = true;
            return true;
        } catch (Exception $e2) {
            error_log("Erreur d'auto-initialisation de la base de données: " . $e2->getMessage());
            return false;
        }
    }
}

// Créer la base de données si elle n'existe pas
function createDatabaseIfNotExists() {
    try {
        // Connexion sans spécifier la base de données
        $dsn = "mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET;
        $pdo = new PDO($dsn, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
        
        // Créer la base de données
        $pdo->exec("CREATE DATABASE IF NOT EXISTS " . DB_NAME . " CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
        $pdo->exec("USE " . DB_NAME);
        
    } catch (PDOException $e) {
        throw new Exception("Impossible de créer la base de données: " . $e->getMessage());
    }
}

// Initialiser les tables de la base de données
function initializeDatabaseTables() {
    $sqlFile = __DIR__ . '/../database/init_local_database.sql';
    
    if (!file_exists($sqlFile)) {
        throw new Exception("Fichier SQL d'initialisation introuvable");
    }
    
    $sql = file_get_contents($sqlFile);
    if ($sql === false) {
        throw new Exception("Impossible de lire le fichier SQL");
    }
    
    $pdo = getLocalDBConnection();
    $queries = array_filter(array_map('trim', explode(';', $sql)));
    
    foreach ($queries as $query) {
        if (empty($query) || strpos($query, '--') === 0) {
            continue;
        }
        
        try {
            $pdo->exec($query);
        } catch (PDOException $e) {
            // Ignorer les erreurs de tables existantes
            if (strpos($e->getMessage(), 'already exists') === false) {
                error_log("Erreur SQL: " . $e->getMessage());
            }
        }
    }
}

// Synchroniser les produits depuis l'API (version simplifiée)
function autoSyncProducts() {
    try {
        // Vérifier si des produits existent déjà
        $existingProducts = fetchLocalOne("SELECT COUNT(*) as count FROM products");
        if ($existingProducts['count'] > 0) {
            return true; // Déjà synchronisé
        }
        
        // Récupérer quelques produits de l'API
        $response = makeApiCall('/products?limit=50');
        
        if (!$response['success'] || empty($response['data']['data'])) {
            // Créer des produits de test si l'API n'est pas disponible
            createTestProducts();
            return true;
        }
        
        $products = $response['data']['data'];
        
        foreach ($products as $product) {
            try {
                $productData = [
                    'product_api_id' => $product['id'],
                    'product_name' => $product['name'] ?? 'Produit sans nom',
                    'product_code' => $product['code'] ?? 'CODE' . $product['id'],
                    'description' => $product['description'] ?? '',
                    'unit_price' => $product['unit_price'] ?? 0,
                    'cost_price' => $product['cost_price'] ?? 0,
                    'unit_measure' => $product['unit_measure'] ?? 'Unité',
                    'min_stock_level' => $product['min_stock_level'] ?? 0,
                    'max_stock_level' => $product['max_stock_level'] ?? 100,
                    'is_active' => ($product['status'] ?? 'active') === 'active'
                ];
                
                $sql = "INSERT IGNORE INTO products (product_api_id, product_name, product_code, description, unit_price, cost_price, unit_measure, min_stock_level, max_stock_level, is_active) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                
                executeLocalQuery($sql, [
                    $productData['product_api_id'],
                    $productData['product_name'],
                    $productData['product_code'],
                    $productData['description'],
                    $productData['unit_price'],
                    $productData['cost_price'],
                    $productData['unit_measure'],
                    $productData['min_stock_level'],
                    $productData['max_stock_level'],
                    $productData['is_active']
                ]);
                
            } catch (Exception $e) {
                error_log("Erreur synchronisation produit {$product['id']}: " . $e->getMessage());
            }
        }
        
        return true;
        
    } catch (Exception $e) {
        // En cas d'erreur, créer des produits de test
        createTestProducts();
        return true;
    }
}

// Créer des produits de test
function createTestProducts() {
    $testProducts = [
        ['Riz Basmati 5kg', 'RIZ001', 'Riz basmati de qualité supérieure', 15000.00, 12000.00, 'Sac', 10, 100],
        ['Huile de Palme 1L', 'HUI001', 'Huile de palme raffinée', 2500.00, 2000.00, 'Bouteille', 20, 200],
        ['Sucre en Poudre 1kg', 'SUC001', 'Sucre blanc cristallisé', 1500.00, 1200.00, 'Sachet', 15, 150],
        ['Farine de Blé 2kg', 'FAR001', 'Farine de blé T45', 3000.00, 2500.00, 'Sachet', 12, 120],
        ['Pâtes Spaghetti 500g', 'PAT001', 'Pâtes italiennes', 2000.00, 1500.00, 'Paquet', 8, 80],
        ['Tomates en Conserve', 'TOM001', 'Tomates pelées en conserve', 1800.00, 1400.00, 'Boîte', 25, 250]
    ];
    
    foreach ($testProducts as $product) {
        try {
            $sql = "INSERT IGNORE INTO products (product_name, product_code, description, unit_price, cost_price, unit_measure, min_stock_level, max_stock_level, is_active) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, 1)";
            
            executeLocalQuery($sql, $product);
        } catch (Exception $e) {
            error_log("Erreur création produit test: " . $e->getMessage());
        }
    }
}

// Générer les alertes de stock
function generateStockAlerts() {
    try {
        // Supprimer les anciennes alertes non résolues
        executeLocalQuery("DELETE FROM stock_alerts WHERE is_resolved = 0");
        
        // Récupérer tous les stocks
        $sql = "SELECT 
                    ws.*,
                    p.product_name,
                    p.product_code,
                    p.min_stock_level,
                    p.max_stock_level
                FROM warehouse_stock ws
                JOIN products p ON ws.id_product = p.id_product
                JOIN warehouses w ON ws.id_warehouse = w.id_warehouse
                WHERE p.is_active = 1 AND w.is_active = 1";
        
        $stocks = fetchLocalAll($sql);
        
        $alertsCreated = 0;
        
        foreach ($stocks as $stock) {
            $currentQuantity = (int)$stock['current_quantity'];
            $minLevel = (int)$stock['min_stock_level'];
            $maxLevel = (int)$stock['max_stock_level'];
            
            // Stock faible
            if ($currentQuantity <= $minLevel && $currentQuantity > 0) {
                executeLocalQuery(
                    "INSERT INTO stock_alerts (id_warehouse, id_product, alert_type, current_quantity, threshold_quantity, is_resolved) 
                     VALUES (?, ?, 'low_stock', ?, ?, 0)",
                    [$stock['id_warehouse'], $stock['id_product'], $currentQuantity, $minLevel]
                );
                $alertsCreated++;
            }
            
            // Rupture de stock
            if ($currentQuantity <= 0) {
                executeLocalQuery(
                    "INSERT INTO stock_alerts (id_warehouse, id_product, alert_type, current_quantity, threshold_quantity, is_resolved) 
                     VALUES (?, ?, 'out_of_stock', ?, ?, 0)",
                    [$stock['id_warehouse'], $stock['id_product'], $currentQuantity, 0]
                );
                $alertsCreated++;
            }
            
            // Surstock
            if ($maxLevel > 0 && $currentQuantity >= $maxLevel) {
                executeLocalQuery(
                    "INSERT INTO stock_alerts (id_warehouse, id_product, alert_type, current_quantity, threshold_quantity, is_resolved) 
                     VALUES (?, ?, 'overstock', ?, ?, 0)",
                    [$stock['id_warehouse'], $stock['id_product'], $currentQuantity, $maxLevel]
                );
                $alertsCreated++;
            }
        }
        
        return $alertsCreated;
    } catch (Exception $e) {
        error_log("Erreur génération alertes: " . $e->getMessage());
        return 0;
    }
}

?>
