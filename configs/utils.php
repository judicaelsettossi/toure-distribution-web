<?php

// Inclure la configuration de l'API
require_once __DIR__ . '/api-config.php';

// Fonctions utilitaires générales
function formatPrice($price) {
    return number_format($price, 0, ',', ' ') . ' FCFA';
}

function formatDate($date, $format = 'd/m/Y H:i') {
    if (empty($date)) return '-';
    return date($format, strtotime($date));
}

function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

// CSRF minimal
function csrfTokenEnsure() {
    if (session_status() !== PHP_SESSION_ACTIVE) session_start();
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(16));
    }
    return $_SESSION['csrf_token'];
}

function csrfValidateOrFail() {
    if (session_status() !== PHP_SESSION_ACTIVE) session_start();
    $token = $_POST['csrf_token'] ?? '';
    if (empty($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $token)) {
        throw new Exception('CSRF token invalide');
    }
}

function isValidUUID($uuid) {
    return preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/i', $uuid);
}

// Configuration de l'application
define('APP_NAME', 'Toure Distribution');
define('APP_VERSION', '1.0.0');
define('APP_URL', 'http://localhost');

// Messages de l'application
define('MSG_SUCCESS', 'success');
define('MSG_ERROR', 'error');
define('MSG_WARNING', 'warning');
define('MSG_INFO', 'info');

?>
