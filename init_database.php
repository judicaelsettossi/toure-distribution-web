<?php
/**
 * Script d'initialisation de la base de données locale
 * Exécuter ce script une seule fois pour créer les tables et données de test
 */

require_once __DIR__ . '/configs/database-config.php';

echo "=== Initialisation de la base de données Toure Distribution ===\n\n";

try {
    // Lire le fichier SQL
    $sqlFile = __DIR__ . '/database/init_local_database.sql';
    
    if (!file_exists($sqlFile)) {
        throw new Exception("Fichier SQL d'initialisation introuvable: {$sqlFile}");
    }
    
    $sql = file_get_contents($sqlFile);
    
    if ($sql === false) {
        throw new Exception("Impossible de lire le fichier SQL");
    }
    
    // Diviser le SQL en requêtes individuelles
    $queries = array_filter(array_map('trim', explode(';', $sql)));
    
    echo "Connexion à la base de données...\n";
    $pdo = getLocalDBConnection();
    
    echo "Exécution des requêtes SQL...\n";
    $successCount = 0;
    $errorCount = 0;
    
    foreach ($queries as $query) {
        if (empty($query) || strpos($query, '--') === 0) {
            continue; // Ignorer les commentaires et lignes vides
        }
        
        try {
            $pdo->exec($query);
            $successCount++;
            
            // Afficher le progrès pour les requêtes importantes
            if (strpos($query, 'CREATE TABLE') !== false) {
                preg_match('/CREATE TABLE.*?`?(\w+)`?/i', $query, $matches);
                $tableName = $matches[1] ?? 'table';
                echo "  ✓ Table '{$tableName}' créée\n";
            } elseif (strpos($query, 'CREATE VIEW') !== false) {
                preg_match('/CREATE.*?VIEW.*?`?(\w+)`?/i', $query, $matches);
                $viewName = $matches[1] ?? 'view';
                echo "  ✓ Vue '{$viewName}' créée\n";
            } elseif (strpos($query, 'INSERT') !== false) {
                echo "  ✓ Données de test insérées\n";
            }
            
        } catch (PDOException $e) {
            $errorCount++;
            echo "  ✗ Erreur: " . $e->getMessage() . "\n";
            echo "    Requête: " . substr($query, 0, 100) . "...\n";
        }
    }
    
    echo "\n=== Résumé ===\n";
    echo "Requêtes exécutées avec succès: {$successCount}\n";
    echo "Erreurs: {$errorCount}\n";
    
    if ($errorCount === 0) {
        echo "\n🎉 Base de données initialisée avec succès!\n";
        echo "\nVous pouvez maintenant:\n";
        echo "- Accéder à la liste des achats: /achats\n";
        echo "- Créer un nouvel achat: /achat/creer\n";
        echo "- Gérer les fournisseurs et entrepôts\n";
        echo "- Voir les stocks dans les entrepôts\n";
    } else {
        echo "\n⚠️  Certaines erreurs sont survenues. Vérifiez les messages ci-dessus.\n";
    }
    
} catch (Exception $e) {
    echo "\n❌ Erreur fatale: " . $e->getMessage() . "\n";
    echo "\nVérifiez que:\n";
    echo "- MySQL/MariaDB est démarré\n";
    echo "- Les paramètres de connexion dans configs/database-config.php sont corrects\n";
    echo "- L'utilisateur de base de données a les permissions nécessaires\n";
    exit(1);
}

echo "\n=== Configuration recommandée ===\n";
echo "1. Vérifiez les paramètres de connexion dans configs/database-config.php\n";
echo "2. Assurez-vous que la base de données 'toure_distribution' existe\n";
echo "3. Testez l'accès via l'interface web\n";
echo "\nScript terminé.\n";
?>
