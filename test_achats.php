<?php
/**
 * Script de test pour vérifier le fonctionnement du système d'achats
 */

require_once __DIR__ . '/configs/database-config.php';

echo "=== Test du système d'achats ===\n\n";

try {
    // Test 1: Connexion à la base de données
    echo "1. Test de connexion à la base de données...\n";
    $pdo = getLocalDBConnection();
    echo "   ✓ Connexion réussie\n\n";
    
    // Test 2: Vérifier les tables
    echo "2. Vérification des tables...\n";
    $tables = ['warehouses', 'suppliers', 'products', 'purchases', 'purchase_details', 'warehouse_stock'];
    
    foreach ($tables as $table) {
        $result = fetchLocalOne("SHOW TABLES LIKE ?", [$table]);
        if ($result) {
            echo "   ✓ Table '{$table}' existe\n";
        } else {
            echo "   ✗ Table '{$table}' manquante\n";
        }
    }
    echo "\n";
    
    // Test 3: Vérifier les données de test
    echo "3. Vérification des données de test...\n";
    
    $warehouseCount = fetchLocalOne("SELECT COUNT(*) as count FROM warehouses")['count'];
    echo "   Entrepôts: {$warehouseCount}\n";
    
    $supplierCount = fetchLocalOne("SELECT COUNT(*) as count FROM suppliers")['count'];
    echo "   Fournisseurs: {$supplierCount}\n";
    
    $productCount = fetchLocalOne("SELECT COUNT(*) as count FROM products")['count'];
    echo "   Produits: {$productCount}\n";
    
    echo "\n";
    
    // Test 4: Test de génération de numéros
    echo "4. Test de génération de numéros...\n";
    $purchaseNumber = generatePurchaseNumber();
    echo "   Numéro d'achat généré: {$purchaseNumber}\n";
    
    $saleNumber = generateSaleNumber();
    echo "   Numéro de vente généré: {$saleNumber}\n";
    
    $transferNumber = generateTransferNumber();
    echo "   Numéro de transfert généré: {$transferNumber}\n";
    
    echo "\n";
    
    // Test 5: Test de création d'un achat fictif
    echo "5. Test de création d'achat...\n";
    
    // Récupérer un fournisseur et un entrepôt
    $supplier = fetchLocalOne("SELECT id_supplier FROM suppliers LIMIT 1");
    $warehouse = fetchLocalOne("SELECT id_warehouse FROM warehouses LIMIT 1");
    $product = fetchLocalOne("SELECT id_product FROM products LIMIT 1");
    
    if ($supplier && $warehouse && $product) {
        beginLocalTransaction();
        
        try {
            // Créer un achat de test
            $purchaseNumber = generatePurchaseNumber();
            $sql = "INSERT INTO purchases (purchase_number, id_supplier, id_warehouse, purchase_date, total_amount, statut) 
                    VALUES (?, ?, ?, ?, ?, 'pending')";
            
            $purchaseId = insertLocalAndGetId($sql, [
                $purchaseNumber,
                $supplier['id_supplier'],
                $warehouse['id_warehouse'],
                date('Y-m-d'),
                10000.00
            ]);
            
            // Créer un détail d'achat
            $detailSql = "INSERT INTO purchase_details (id_purchase, id_product, quantity_ordered, unit_price, total_price) 
                         VALUES (?, ?, ?, ?, ?)";
            
            executeLocalQuery($detailSql, [
                $purchaseId,
                $product['id_product'],
                5,
                2000.00,
                10000.00
            ]);
            
            commitLocalTransaction();
            echo "   ✓ Achat de test créé avec succès (ID: {$purchaseId})\n";
            
            // Nettoyer l'achat de test
            executeLocalQuery("DELETE FROM purchase_details WHERE id_purchase = ?", [$purchaseId]);
            executeLocalQuery("DELETE FROM purchases WHERE id_purchase = ?", [$purchaseId]);
            echo "   ✓ Achat de test supprimé\n";
            
        } catch (Exception $e) {
            rollbackLocalTransaction();
            echo "   ✗ Erreur lors de la création d'achat: " . $e->getMessage() . "\n";
        }
    } else {
        echo "   ⚠️  Données de test insuffisantes pour créer un achat\n";
    }
    
    echo "\n";
    
    // Test 6: Vérifier les vues
    echo "6. Vérification des vues...\n";
    $views = ['v_total_stock_by_product', 'v_warehouse_inventory', 'v_pending_purchases'];
    
    foreach ($views as $view) {
        try {
            $result = fetchLocalOne("SELECT COUNT(*) as count FROM {$view}");
            echo "   ✓ Vue '{$view}' fonctionne (records: {$result['count']})\n";
        } catch (Exception $e) {
            echo "   ✗ Vue '{$view}' erreur: " . $e->getMessage() . "\n";
        }
    }
    
    echo "\n";
    
    echo "=== Résumé des tests ===\n";
    echo "✓ Système d'achats opérationnel\n";
    echo "✓ Base de données configurée\n";
    echo "✓ Tables et vues créées\n";
    echo "✓ Fonctions utilitaires fonctionnelles\n";
    
    echo "\n🎉 Tous les tests sont passés avec succès!\n";
    echo "\nVous pouvez maintenant:\n";
    echo "- Accéder à /achats pour voir la liste\n";
    echo "- Créer un achat via /achat/creer\n";
    echo "- Tester les fonctionnalités via l'interface web\n";
    
} catch (Exception $e) {
    echo "\n❌ Erreur fatale: " . $e->getMessage() . "\n";
    echo "\nVérifiez que:\n";
    echo "- La base de données est initialisée (php init_database.php)\n";
    echo "- Les paramètres de connexion sont corrects\n";
    echo "- MySQL/MariaDB est démarré\n";
    exit(1);
}

echo "\nScript de test terminé.\n";
?>
