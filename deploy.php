<?php
/**
 * Script de déploiement simple
 * Vérifie et configure l'application pour l'hébergement mutualisé
 */

// Activer l'affichage des erreurs pour le diagnostic
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Déploiement - Toure Distribution</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .success { color: #28a745; background: #d4edda; padding: 10px; border-radius: 4px; margin: 10px 0; }
        .error { color: #dc3545; background: #f8d7da; padding: 10px; border-radius: 4px; margin: 10px 0; }
        .info { color: #17a2b8; background: #d1ecf1; padding: 10px; border-radius: 4px; margin: 10px 0; }
        .btn { display: inline-block; padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 4px; margin: 10px 5px; }
        .btn:hover { background: #0056b3; }
        pre { background: #f8f9fa; padding: 10px; border-radius: 4px; overflow-x: auto; }
    </style>
</head>
<body>
<div class='container'>
    <h1>🚀 Déploiement Toure Distribution</h1>";

// Vérifier si c'est la première fois
$configFile = __DIR__ . '/configs/database-config.php';
$exampleFile = __DIR__ . '/configs/database-config.example.php';

if (!file_exists($configFile) && file_exists($exampleFile)) {
    echo "<div class='info'>";
    echo "<h3>Configuration Initiale</h3>";
    echo "<p>Le fichier de configuration n'existe pas encore. Création automatique...</p>";
    
    try {
        // Copier le fichier d'exemple
        if (copy($exampleFile, $configFile)) {
            echo "<div class='success'>✅ Fichier de configuration créé</div>";
            echo "<p><strong>Important :</strong> Modifiez le fichier <code>configs/database-config.php</code> avec vos paramètres de base de données.</p>";
        } else {
            echo "<div class='error'>❌ Impossible de créer le fichier de configuration</div>";
        }
    } catch (Exception $e) {
        echo "<div class='error'>❌ Erreur : " . htmlspecialchars($e->getMessage()) . "</div>";
    }
    echo "</div>";
}

// Vérifier les prérequis
echo "<h3>Vérification des Prérequis</h3>";

$requirements = [
    'PHP 7.4+' => version_compare(PHP_VERSION, '7.4.0', '>='),
    'PDO MySQL' => extension_loaded('pdo_mysql'),
    'cURL' => extension_loaded('curl'),
    'JSON' => extension_loaded('json'),
    'Session' => extension_loaded('session'),
];

$allGood = true;
foreach ($requirements as $req => $status) {
    echo "<div class='" . ($status ? 'success' : 'error') . "'>";
    echo ($status ? '✅' : '❌') . " {$req}";
    echo "</div>";
    if (!$status) $allGood = false;
}

if (!$allGood) {
    echo "<div class='error'>";
    echo "<h3>❌ Prérequis Manquants</h3>";
    echo "<p>Veuillez installer les extensions PHP manquantes avant de continuer.</p>";
    echo "</div>";
    exit;
}

// Créer les dossiers nécessaires
echo "<h3>Création des Dossiers</h3>";

$dirs = ['logs', 'cache', 'uploads'];
foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        if (mkdir($dir, 0755, true)) {
            echo "<div class='success'>✅ Dossier {$dir} créé</div>";
        } else {
            echo "<div class='error'>❌ Impossible de créer le dossier {$dir}</div>";
        }
    } else {
        echo "<div class='success'>✅ Dossier {$dir} existe</div>";
    }
}

// Vérifier les permissions
echo "<h3>Vérification des Permissions</h3>";

$writableDirs = ['logs', 'cache'];
foreach ($writableDirs as $dir) {
    if (is_writable($dir)) {
        echo "<div class='success'>✅ {$dir} accessible en écriture</div>";
    } else {
        echo "<div class='error'>❌ {$dir} non accessible en écriture</div>";
        echo "<p>Exécutez : <code>chmod 755 {$dir}</code></p>";
    }
}

// Instructions finales
echo "<div class='info'>";
echo "<h3>🎉 Déploiement Terminé !</h3>";
echo "<p>Votre application est prête. Prochaines étapes :</p>";
echo "<ol>";
echo "<li>Modifiez <code>configs/database-config.php</code> avec vos paramètres de base de données</li>";
echo "<li>Accédez à <a href='/achats'>/achats</a> pour commencer</li>";
echo "<li>Utilisez <a href='/check_installation.php'>/check_installation.php</a> pour vérifier l'installation</li>";
echo "</ol>";
echo "</div>";

echo "<div class='info'>";
echo "<h3>📋 Informations de Déploiement</h3>";
echo "<ul>";
echo "<li><strong>URL de l'application :</strong> <a href='/'>" . (isset($_SERVER['HTTP_HOST']) ? 'http://' . $_SERVER['HTTP_HOST'] : 'Votre domaine') . "</a></li>";
echo "<li><strong>Version PHP :</strong> " . PHP_VERSION . "</li>";
echo "<li><strong>Serveur :</strong> " . ($_SERVER['SERVER_SOFTWARE'] ?? 'Inconnu') . "</li>";
echo "<li><strong>Répertoire :</strong> " . __DIR__ . "</li>";
echo "</ul>";
echo "</div>";

echo "<div class='info'>";
echo "<p><strong>Note de sécurité :</strong> Supprimez ce fichier après le déploiement.</p>";
echo "<a href='#' onclick='this.parentElement.style.display=\"none\"; return false;' class='btn'>Masquer cette page</a>";
echo "</div>";

echo "</div></body></html>";
?>
