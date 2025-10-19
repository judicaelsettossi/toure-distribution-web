<?php

/**
 * Script d'installation de la base de données
 * 
 * Ce script crée la base de données et exécute le schéma SQL
 */

// Configuration
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'erp_gestion';
$schemaFile = __DIR__ . '/schema.sql';

echo "===========================================\n";
echo "Installation de la base de données ERP\n";
echo "===========================================\n\n";

try {
    // Connexion à MySQL (sans sélectionner de base de données)
    echo "1. Connexion au serveur MySQL...\n";
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "   ✓ Connexion réussie\n\n";
    
    // Créer la base de données si elle n'existe pas
    echo "2. Création de la base de données '$dbname'...\n";
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbname` 
                CHARACTER SET utf8mb4 
                COLLATE utf8mb4_unicode_ci");
    echo "   ✓ Base de données créée\n\n";
    
    // Sélectionner la base de données
    $pdo->exec("USE `$dbname`");
    
    // Lire et exécuter le fichier de schéma
    echo "3. Exécution du schéma SQL...\n";
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
            // Ignorer les erreurs de tables déjà existantes
            if (strpos($e->getMessage(), 'already exists') === false) {
                echo "   ⚠ Erreur: " . $e->getMessage() . "\n";
                $errorCount++;
            }
        }
    }
    
    echo "   ✓ Schéma exécuté: $successCount requêtes réussies";
    if ($errorCount > 0) {
        echo ", $errorCount erreurs ignorées";
    }
    echo "\n\n";
    
    // Vérifier les tables créées
    echo "4. Vérification des tables...\n";
    $stmt = $pdo->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    echo "   Tables créées (" . count($tables) . "):\n";
    foreach ($tables as $table) {
        echo "   - $table\n";
    }
    echo "\n";
    
    echo "===========================================\n";
    echo "✓ Installation terminée avec succès!\n";
    echo "===========================================\n\n";
    
    echo "Vous pouvez maintenant:\n";
    echo "1. Mettre à jour les paramètres de connexion dans configs/database-config.php\n";
    echo "2. Commencer à utiliser votre système ERP\n\n";
    
} catch (PDOException $e) {
    echo "\n✗ ERREUR PDO: " . $e->getMessage() . "\n\n";
    exit(1);
} catch (Exception $e) {
    echo "\n✗ ERREUR: " . $e->getMessage() . "\n\n";
    exit(1);
}

?>
