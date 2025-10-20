<?php
/**
 * Configuration de base de données - EXEMPLE
 * Copiez ce fichier vers database-config.php et modifiez les valeurs
 */

// Configuration de la base de données locale
define('DB_HOST', 'localhost');                    // Adresse du serveur MySQL
define('DB_NAME', 'toure_distribution');           // Nom de la base de données
define('DB_USER', 'votre_utilisateur');            // Nom d'utilisateur MySQL
define('DB_PASS', 'votre_mot_de_passe');          // Mot de passe MySQL
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

// ... (le reste des fonctions reste identique)
?>
