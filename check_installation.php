<?php
/**
 * Script de vérification de l'installation
 * Accessible via l'URL pour vérifier que tout fonctionne
 */

// Activer l'affichage des erreurs pour le diagnostic
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Vérification Installation - Toure Distribution</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .success { color: #28a745; }
        .error { color: #dc3545; }
        .warning { color: #ffc107; }
        .info { color: #17a2b8; }
        .section { margin: 20px 0; padding: 15px; border-left: 4px solid #007bff; background: #f8f9fa; }
        .check-item { margin: 10px 0; padding: 5px 0; }
        .btn { display: inline-block; padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 4px; margin: 10px 5px; }
        .btn:hover { background: #0056b3; }
        pre { background: #f8f9fa; padding: 10px; border-radius: 4px; overflow-x: auto; }
    </style>
</head>
<body>
<div class='container'>
    <h1>🔍 Vérification de l'Installation</h1>
    <p>Ce script vérifie que votre installation de Toure Distribution est correcte.</p>";

$allGood = true;
$checks = [];

// 1. Vérifier PHP
echo "<div class='section'><h2>1. Version PHP</h2>";
$phpVersion = PHP_VERSION;
$phpOk = version_compare($phpVersion, '7.4.0', '>=');
$checks[] = $phpOk;
echo "<div class='check-item'>";
echo $phpOk ? "✅" : "❌";
echo " Version PHP : {$phpVersion} " . ($phpOk ? "(OK)" : "(Nécessite PHP 7.4+)");
echo "</div></div>";

// 2. Vérifier les extensions
echo "<div class='section'><h2>2. Extensions PHP</h2>";
$extensions = ['pdo', 'pdo_mysql', 'curl', 'json', 'session'];
foreach ($extensions as $ext) {
    $loaded = extension_loaded($ext);
    $checks[] = $loaded;
    echo "<div class='check-item'>";
    echo $loaded ? "✅" : "❌";
    echo " Extension {$ext} : " . ($loaded ? "Chargée" : "Manquante");
    echo "</div>";
}
echo "</div>";

// 3. Vérifier les permissions
echo "<div class='section'><h2>3. Permissions de Fichiers</h2>";
$dirs = ['logs', 'configs', 'controllers', 'views'];
foreach ($dirs as $dir) {
    $exists = is_dir($dir);
    $writable = $exists && is_writable($dir);
    $checks[] = $exists && $writable;
    echo "<div class='check-item'>";
    echo ($exists && $writable) ? "✅" : "❌";
    echo " Dossier {$dir} : " . ($exists ? ($writable ? "Accessible en écriture" : "Existe mais non accessible en écriture") : "N'existe pas");
    echo "</div>";
}
echo "</div>";

// 4. Vérifier la configuration
echo "<div class='section'><h2>4. Configuration</h2>";
$configFiles = ['configs/database-config.php', 'configs/api-config.php', 'configs/utils.php'];
foreach ($configFiles as $file) {
    $exists = file_exists($file);
    $checks[] = $exists;
    echo "<div class='check-item'>";
    echo $exists ? "✅" : "❌";
    echo " Fichier {$file} : " . ($exists ? "Existe" : "Manquant");
    echo "</div>";
}
echo "</div>";

// 5. Test de connexion à la base de données
echo "<div class='section'><h2>5. Base de Données</h2>";
try {
    require_once 'configs/database-config.php';
    
    // Test de connexion
    $pdo = getLocalDBConnection();
    echo "<div class='check-item success'>✅ Connexion à la base de données : OK</div>";
    
    // Vérifier les tables
    $tables = ['warehouses', 'suppliers', 'products', 'purchases', 'purchase_details'];
    $allTablesExist = true;
    
    foreach ($tables as $table) {
        $result = $pdo->query("SHOW TABLES LIKE '{$table}'")->fetch();
        $exists = (bool)$result;
        $allTablesExist = $allTablesExist && $exists;
        echo "<div class='check-item'>";
        echo $exists ? "✅" : "❌";
        echo " Table {$table} : " . ($exists ? "Existe" : "Manquante");
        echo "</div>";
    }
    
    $checks[] = $allTablesExist;
    
    // Compter les enregistrements
    if ($allTablesExist) {
        $warehouseCount = $pdo->query("SELECT COUNT(*) as count FROM warehouses")->fetch()['count'];
        $supplierCount = $pdo->query("SELECT COUNT(*) as count FROM suppliers")->fetch()['count'];
        $productCount = $pdo->query("SELECT COUNT(*) as count FROM products")->fetch()['count'];
        
        echo "<div class='check-item info'>📊 Entrepôts : {$warehouseCount}</div>";
        echo "<div class='check-item info'>📊 Fournisseurs : {$supplierCount}</div>";
        echo "<div class='check-item info'>📊 Produits : {$productCount}</div>";
    }
    
} catch (Exception $e) {
    $checks[] = false;
    echo "<div class='check-item error'>❌ Erreur de connexion : " . htmlspecialchars($e->getMessage()) . "</div>";
}
echo "</div>";

// 6. Test de l'API
echo "<div class='section'><h2>6. API</h2>";
try {
    require_once 'configs/api-config.php';
    $response = makeApiCall('/products?limit=1');
    $apiOk = $response['success'];
    $checks[] = $apiOk;
    echo "<div class='check-item'>";
    echo $apiOk ? "✅" : "⚠️";
    echo " API : " . ($apiOk ? "Accessible" : "Non accessible ou erreur");
    echo "</div>";
} catch (Exception $e) {
    $checks[] = false;
    echo "<div class='check-item error'>❌ Erreur API : " . htmlspecialchars($e->getMessage()) . "</div>";
}
echo "</div>";

// 7. Test des routes
echo "<div class='section'><h2>7. Routes de l'Application</h2>";
$routes = [
    'Liste des achats' => '/achats',
    'Créer un achat' => '/achat/creer',
    'Liste des fournisseurs' => '/fournisseurs',
    'Liste des produits' => '/produit/liste'
];

foreach ($routes as $name => $route) {
    echo "<div class='check-item info'>🔗 {$name} : <code>{$route}</code></div>";
}
echo "</div>";

// Résumé
$allGood = !in_array(false, $checks);
echo "<div class='section'>";
echo "<h2>" . ($allGood ? "🎉 Installation Réussie !" : "⚠️ Problèmes Détectés") . "</h2>";

if ($allGood) {
    echo "<div class='success'>";
    echo "<h3>✅ Votre installation est prête !</h3>";
    echo "<p>Vous pouvez maintenant utiliser l'application :</p>";
    echo "<ul>";
    echo "<li><a href='/achats' class='btn'>Gérer les Achats</a></li>";
    echo "<li><a href='/achat/creer' class='btn'>Créer un Achat</a></li>";
    echo "<li><a href='/fournisseurs' class='btn'>Gérer les Fournisseurs</a></li>";
    echo "</ul>";
    echo "</div>";
} else {
    echo "<div class='error'>";
    echo "<h3>❌ Des problèmes ont été détectés</h3>";
    echo "<p>Veuillez corriger les erreurs ci-dessus avant d'utiliser l'application.</p>";
    echo "<p>Consultez le fichier <code>DEPLOYMENT.md</code> pour plus d'informations.</p>";
    echo "</div>";
}
echo "</div>";

// Informations système
echo "<div class='section'><h2>8. Informations Système</h2>";
echo "<pre>";
echo "Système d'exploitation : " . PHP_OS . "\n";
echo "Serveur web : " . ($_SERVER['SERVER_SOFTWARE'] ?? 'Inconnu') . "\n";
echo "Version PHP : " . PHP_VERSION . "\n";
echo "Mémoire disponible : " . ini_get('memory_limit') . "\n";
echo "Temps d'exécution max : " . ini_get('max_execution_time') . "s\n";
echo "Upload max : " . ini_get('upload_max_filesize') . "\n";
echo "Post max : " . ini_get('post_max_size') . "\n";
echo "</pre>";
echo "</div>";

echo "<div class='section'>";
echo "<p><strong>Note :</strong> Vous pouvez supprimer ce fichier après vérification pour des raisons de sécurité.</p>";
echo "<a href='#' onclick='this.style.display=\"none\"; return false;' class='btn'>Masquer cette page</a>";
echo "</div>";

echo "</div></body></html>";
?>
