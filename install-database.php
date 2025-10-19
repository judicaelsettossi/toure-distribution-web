<?php
/**
 * Installateur de base de données - Interface web
 */

// Configuration
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'erp_gestion';
$schemaFile = __DIR__ . '/database/schema.sql';

$output = [];
$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Connexion à MySQL
        $output[] = "Connexion au serveur MySQL...";
        $pdo = new PDO("mysql:host=$host", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $output[] = "✓ Connexion réussie";
        
        // Créer la base de données
        $output[] = "Création de la base de données '$dbname'...";
        $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbname` 
                    CHARACTER SET utf8mb4 
                    COLLATE utf8mb4_unicode_ci");
        $output[] = "✓ Base de données créée";
        
        // Sélectionner la base
        $pdo->exec("USE `$dbname`");
        
        // Lire et exécuter le schéma
        $output[] = "Exécution du schéma SQL...";
        if (!file_exists($schemaFile)) {
            throw new Exception("Fichier de schéma introuvable: $schemaFile");
        }
        
        $sql = file_get_contents($schemaFile);
        
        // Séparer les requêtes
        $statements = array_filter(
            array_map('trim', explode(';', $sql)),
            function($stmt) {
                return !empty($stmt) && 
                       !preg_match('/^--/', $stmt) && 
                       !preg_match('/^\/\*/', $stmt);
            }
        );
        
        $successCount = 0;
        $errorCount = 0;
        
        foreach ($statements as $statement) {
            try {
                $pdo->exec($statement);
                $successCount++;
            } catch (PDOException $e) {
                if (strpos($e->getMessage(), 'already exists') === false) {
                    $errorCount++;
                    $errors[] = $e->getMessage();
                }
            }
        }
        
        $output[] = "✓ Schéma exécuté: $successCount requêtes réussies";
        if ($errorCount > 0) {
            $output[] = "⚠ $errorCount erreurs ignorées";
        }
        
        // Vérifier les tables
        $output[] = "Vérification des tables...";
        $stmt = $pdo->query("SHOW TABLES");
        $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
        
        $output[] = "✓ " . count($tables) . " tables créées";
        
        $success = true;
        
    } catch (PDOException $e) {
        $errors[] = "Erreur PDO: " . $e->getMessage();
    } catch (Exception $e) {
        $errors[] = "Erreur: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Installation Base de Données ERP</title>
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
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            max-width: 800px;
            width: 100%;
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
        .header p {
            opacity: 0.9;
            font-size: 16px;
        }
        .content {
            padding: 40px;
        }
        .info-box {
            background: #f8f9fa;
            border-left: 4px solid #667eea;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 5px;
        }
        .info-box h3 {
            color: #667eea;
            margin-bottom: 10px;
        }
        .info-box ul {
            list-style: none;
            padding-left: 0;
        }
        .info-box li {
            padding: 5px 0;
            padding-left: 25px;
            position: relative;
        }
        .info-box li:before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #667eea;
            font-weight: bold;
        }
        .config-box {
            background: #fff3cd;
            border: 1px solid #ffc107;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .config-box strong {
            color: #856404;
        }
        .btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 15px 40px;
            font-size: 18px;
            border-radius: 50px;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
            width: 100%;
            font-weight: bold;
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }
        .btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }
        .output-box {
            background: #1e1e1e;
            color: #00ff00;
            padding: 20px;
            border-radius: 10px;
            font-family: 'Courier New', monospace;
            font-size: 14px;
            margin-top: 20px;
            max-height: 400px;
            overflow-y: auto;
        }
        .output-box div {
            margin: 5px 0;
        }
        .error {
            color: #ff4444;
        }
        .success-message {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            text-align: center;
        }
        .success-message h2 {
            margin-bottom: 10px;
        }
        .next-steps {
            background: #e7f3ff;
            border-left: 4px solid #2196F3;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
        }
        .next-steps h3 {
            color: #2196F3;
            margin-bottom: 15px;
        }
        .next-steps ol {
            padding-left: 20px;
        }
        .next-steps li {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🚀 Installation ERP</h1>
            <p>Système de Gestion - Stock, Ventes & Commandes</p>
        </div>
        
        <div class="content">
            <?php if (!$_SERVER['REQUEST_METHOD'] === 'POST' || !$success): ?>
                <div class="info-box">
                    <h3>Ce qui sera installé :</h3>
                    <ul>
                        <li>30+ tables pour la gestion complète</li>
                        <li>Gestion des stocks multi-entrepôts</li>
                        <li>Système de ventes et facturation</li>
                        <li>Gestion des commandes fournisseurs</li>
                        <li>Suivi des mouvements de stock</li>
                        <li>Inventaires et ajustements</li>
                        <li>Logs et traçabilité</li>
                    </ul>
                </div>
                
                <div class="config-box">
                    <strong>Configuration actuelle :</strong><br>
                    Serveur: <?php echo $host; ?><br>
                    Base de données: <?php echo $dbname; ?><br>
                    Utilisateur: <?php echo $username; ?>
                </div>
                
                <form method="POST">
                    <button type="submit" class="btn">
                        ⚡ Installer la Base de Données
                    </button>
                </form>
            <?php endif; ?>
            
            <?php if (!empty($output)): ?>
                <div class="output-box">
                    <?php foreach ($output as $line): ?>
                        <div><?php echo htmlspecialchars($line); ?></div>
                    <?php endforeach; ?>
                    
                    <?php foreach ($errors as $error): ?>
                        <div class="error"><?php echo htmlspecialchars($error); ?></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            
            <?php if ($success): ?>
                <div class="success-message">
                    <h2>✅ Installation Réussie !</h2>
                    <p>La base de données a été installée avec succès.</p>
                </div>
                
                <div class="next-steps">
                    <h3>Prochaines étapes :</h3>
                    <ol>
                        <li><strong>Vérifiez la configuration</strong> dans <code>configs/database-config.php</code></li>
                        <li><strong>Testez la connexion</strong> en accédant à <code>test-db.php</code></li>
                        <li><strong>Commencez à utiliser</strong> votre système ERP !</li>
                    </ol>
                    <br>
                    <a href="/" style="color: #2196F3; text-decoration: none; font-weight: bold;">← Retour à l'accueil</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
