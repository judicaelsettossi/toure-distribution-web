<?php
/**
 * Test de connexion à la base de données
 */

require_once 'configs/database-config.php';
require_once 'models/Product.php';
require_once 'models/Vente.php';
require_once 'models/Commande.php';
require_once 'models/Stock.php';

$results = [];
$errors = [];

// Test 1: Connexion
try {
    $db = Database::getInstance()->getConnection();
    $results[] = "✓ Connexion à la base de données réussie";
} catch (Exception $e) {
    $errors[] = "✗ Erreur de connexion: " . $e->getMessage();
}

// Test 2: Vérifier les tables
try {
    $stmt = $db->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    $results[] = "✓ " . count($tables) . " tables trouvées";
} catch (Exception $e) {
    $errors[] = "✗ Erreur tables: " . $e->getMessage();
}

// Test 3: Tester les modèles
try {
    $productModel = new Product();
    $products = $productModel->all([], 'name ASC', 10);
    $results[] = "✓ Modèle Product: " . count($products) . " produits";
} catch (Exception $e) {
    $errors[] = "✗ Erreur Product: " . $e->getMessage();
}

try {
    $venteModel = new Vente();
    $ventes = $venteModel->all(['deleted_at' => null], 'id DESC', 10);
    $results[] = "✓ Modèle Vente: " . count($ventes) . " ventes";
} catch (Exception $e) {
    $errors[] = "✗ Erreur Vente: " . $e->getMessage();
}

try {
    $commandeModel = new Commande();
    $commandes = $commandeModel->all(['deleted_at' => null], 'id DESC', 10);
    $results[] = "✓ Modèle Commande: " . count($commandes) . " commandes";
} catch (Exception $e) {
    $errors[] = "✗ Erreur Commande: " . $e->getMessage();
}

try {
    $stockModel = new Stock();
    $stocks = $stockModel->all([], 'id DESC', 10);
    $results[] = "✓ Modèle Stock: " . count($stocks) . " enregistrements";
} catch (Exception $e) {
    $errors[] = "✗ Erreur Stock: " . $e->getMessage();
}

// Test 4: Statistiques de la base
try {
    $stats = [];
    
    $tables = [
        'products' => 'Produits',
        'clients' => 'Clients',
        'fournisseurs' => 'Fournisseurs',
        'entrepots' => 'Entrepôts',
        'ventes' => 'Ventes',
        'commandes' => 'Commandes',
        'stock_movements' => 'Mouvements de stock',
        'stocks' => 'Stocks'
    ];
    
    foreach ($tables as $table => $label) {
        $stmt = $db->query("SELECT COUNT(*) as count FROM $table");
        $count = $stmt->fetch()['count'];
        $stats[$label] = $count;
    }
    
    $results[] = "✓ Statistiques récupérées";
} catch (Exception $e) {
    $errors[] = "✗ Erreur statistiques: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Base de Données</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px;
            text-align: center;
        }
        .header h1 {
            font-size: 32px;
            margin-bottom: 10px;
        }
        .content {
            padding: 40px;
        }
        .test-section {
            margin-bottom: 30px;
        }
        .test-section h2 {
            color: #667eea;
            margin-bottom: 15px;
            font-size: 24px;
        }
        .result {
            background: #d4edda;
            border-left: 4px solid #28a745;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            color: #155724;
        }
        .error {
            background: #f8d7da;
            border-left: 4px solid #dc3545;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            color: #721c24;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .stat-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }
        .stat-card .number {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .stat-card .label {
            opacity: 0.9;
            font-size: 14px;
        }
        .btn {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            text-decoration: none;
            margin-top: 20px;
            transition: transform 0.3s;
        }
        .btn:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🧪 Test de la Base de Données</h1>
            <p>Vérification du système ERP</p>
        </div>
        
        <div class="content">
            <div class="test-section">
                <h2>Résultats des Tests</h2>
                
                <?php foreach ($results as $result): ?>
                    <div class="result"><?php echo htmlspecialchars($result); ?></div>
                <?php endforeach; ?>
                
                <?php foreach ($errors as $error): ?>
                    <div class="error"><?php echo htmlspecialchars($error); ?></div>
                <?php endforeach; ?>
            </div>
            
            <?php if (!empty($stats)): ?>
                <div class="test-section">
                    <h2>Statistiques de la Base</h2>
                    <div class="stats-grid">
                        <?php foreach ($stats as $label => $count): ?>
                            <div class="stat-card">
                                <div class="number"><?php echo $count; ?></div>
                                <div class="label"><?php echo $label; ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
            
            <div style="text-align: center; margin-top: 40px;">
                <a href="/" class="btn">← Retour à l'accueil</a>
                <?php if (!empty($errors)): ?>
                    <a href="install-database.php" class="btn">🔧 Réinstaller la base</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
