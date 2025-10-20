<?php
/**
 * Configuration pour l'hébergement mutualisé
 * Ce fichier contient les paramètres optimisés pour un serveur mutualisé
 */

// Désactiver l'affichage des erreurs en production
if (!defined('DEBUG_MODE')) {
    define('DEBUG_MODE', false);
}

// Configuration des erreurs selon l'environnement
if (DEBUG_MODE) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
    ini_set('log_errors', 1);
    ini_set('error_log', __DIR__ . '/../logs/error.log');
}

// Configuration de la session
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_secure', isset($_SERVER['HTTPS']));

// Configuration de la mémoire et du temps d'exécution
ini_set('memory_limit', '256M');
ini_set('max_execution_time', 30);

// Configuration de la base de données pour l'hébergement mutualisé
// Ces valeurs peuvent être surchargées par des variables d'environnement
if (!defined('DB_HOST')) {
    define('DB_HOST', $_ENV['DB_HOST'] ?? 'localhost');
}
if (!defined('DB_NAME')) {
    define('DB_NAME', $_ENV['DB_NAME'] ?? 'toure_distribution');
}
if (!defined('DB_USER')) {
    define('DB_USER', $_ENV['DB_USER'] ?? 'root');
}
if (!defined('DB_PASS')) {
    define('DB_PASS', $_ENV['DB_PASS'] ?? '');
}

// Configuration de l'API
if (!defined('API_BASE_URL')) {
    define('API_BASE_URL', $_ENV['API_BASE_URL'] ?? 'https://toure.gestiem.com/api');
}

// Configuration de l'application
if (!defined('APP_URL')) {
    define('APP_URL', $_ENV['APP_URL'] ?? 'http://' . $_SERVER['HTTP_HOST']);
}

// Créer le dossier de logs s'il n'existe pas
$logDir = __DIR__ . '/../logs';
if (!is_dir($logDir)) {
    mkdir($logDir, 0755, true);
}

// Fonction de log personnalisée
function logMessage($message, $level = 'INFO') {
    $logFile = __DIR__ . '/../logs/app.log';
    $timestamp = date('Y-m-d H:i:s');
    $logEntry = "[{$timestamp}] [{$level}] {$message}" . PHP_EOL;
    file_put_contents($logFile, $logEntry, FILE_APPEND | LOCK_EX);
}

// Fonction pour vérifier les prérequis de l'hébergement
function checkHostingRequirements() {
    $requirements = [
        'PHP Version >= 7.4' => version_compare(PHP_VERSION, '7.4.0', '>='),
        'PDO MySQL' => extension_loaded('pdo_mysql'),
        'cURL' => extension_loaded('curl'),
        'JSON' => extension_loaded('json'),
        'Session' => extension_loaded('session'),
        'Directory writable' => is_writable(__DIR__ . '/../logs'),
    ];
    
    $missing = [];
    foreach ($requirements as $requirement => $status) {
        if (!$status) {
            $missing[] = $requirement;
        }
    }
    
    return $missing;
}

// Fonction pour optimiser les performances sur serveur mutualisé
function optimizeForSharedHosting() {
    // Limiter la taille des uploads
    ini_set('upload_max_filesize', '10M');
    ini_set('post_max_size', '10M');
    
    // Optimiser les sessions
    ini_set('session.gc_maxlifetime', 3600);
    ini_set('session.gc_probability', 1);
    ini_set('session.gc_divisor', 100);
    
    // Limiter les ressources
    ini_set('max_input_vars', 3000);
    ini_set('max_input_time', 60);
}

// Appliquer les optimisations
optimizeForSharedHosting();

// Vérifier les prérequis au premier chargement
if (!isset($_SESSION['hosting_checked'])) {
    $missing = checkHostingRequirements();
    if (!empty($missing)) {
        logMessage("Prérequis manquants: " . implode(', ', $missing), 'ERROR');
        if (DEBUG_MODE) {
            die("Prérequis manquants: " . implode(', ', $missing));
        }
    }
    $_SESSION['hosting_checked'] = true;
}

?>
