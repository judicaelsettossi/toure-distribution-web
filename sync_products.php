<?php
/**
 * Script de synchronisation des produits de l'API vers la base de données locale
 * Ce script récupère les produits de l'API et les synchronise avec la table locale
 */

require_once __DIR__ . '/configs/api-config.php';
require_once __DIR__ . '/configs/database-config.php';

echo "=== Synchronisation des produits API vers base locale ===\n\n";

try {
    // Récupérer tous les produits de l'API
    echo "Récupération des produits depuis l'API...\n";
    
    $page = 1;
    $limit = 100;
    $totalSynced = 0;
    $totalErrors = 0;
    
    do {
        echo "Page {$page}...\n";
        
        $response = getProducts($page, $limit);
        
        if (!$response['success']) {
            throw new Exception("Erreur API: " . ($response['data']['message'] ?? 'Erreur inconnue'));
        }
        
        $products = $response['data']['data'] ?? [];
        $hasMore = $response['data']['has_more'] ?? false;
        
        if (empty($products)) {
            break;
        }
        
        foreach ($products as $product) {
            try {
                // Vérifier si le produit existe déjà
                $existingProduct = fetchLocalOne(
                    "SELECT id_product FROM products WHERE product_api_id = ?",
                    [$product['id']]
                );
                
                $productData = [
                    'product_api_id' => $product['id'],
                    'product_name' => $product['name'] ?? 'Produit sans nom',
                    'product_code' => $product['code'] ?? 'CODE' . $product['id'],
                    'description' => $product['description'] ?? '',
                    'unit_price' => $product['unit_price'] ?? 0,
                    'cost_price' => $product['cost_price'] ?? 0,
                    'unit_measure' => $product['unit_measure'] ?? 'Unité',
                    'min_stock_level' => $product['min_stock_level'] ?? 0,
                    'max_stock_level' => $product['max_stock_level'] ?? 100,
                    'is_active' => ($product['status'] ?? 'active') === 'active'
                ];
                
                if ($existingProduct) {
                    // Mettre à jour le produit existant
                    $sql = "UPDATE products SET 
                            product_name = ?, 
                            product_code = ?, 
                            description = ?, 
                            unit_price = ?, 
                            cost_price = ?, 
                            unit_measure = ?, 
                            min_stock_level = ?, 
                            max_stock_level = ?, 
                            is_active = ?,
                            updated_at = CURRENT_TIMESTAMP
                            WHERE product_api_id = ?";
                    
                    executeLocalQuery($sql, [
                        $productData['product_name'],
                        $productData['product_code'],
                        $productData['description'],
                        $productData['unit_price'],
                        $productData['cost_price'],
                        $productData['unit_measure'],
                        $productData['min_stock_level'],
                        $productData['max_stock_level'],
                        $productData['is_active'],
                        $product['id']
                    ]);
                    
                    echo "  ✓ Produit mis à jour: {$productData['product_name']}\n";
                } else {
                    // Créer un nouveau produit
                    $sql = "INSERT INTO products (product_api_id, product_name, product_code, description, unit_price, cost_price, unit_measure, min_stock_level, max_stock_level, is_active) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    
                    executeLocalQuery($sql, [
                        $productData['product_api_id'],
                        $productData['product_name'],
                        $productData['product_code'],
                        $productData['description'],
                        $productData['unit_price'],
                        $productData['cost_price'],
                        $productData['unit_measure'],
                        $productData['min_stock_level'],
                        $productData['max_stock_level'],
                        $productData['is_active']
                    ]);
                    
                    echo "  ✓ Nouveau produit créé: {$productData['product_name']}\n";
                }
                
                $totalSynced++;
                
            } catch (Exception $e) {
                $totalErrors++;
                echo "  ✗ Erreur pour le produit {$product['id']}: " . $e->getMessage() . "\n";
            }
        }
        
        $page++;
        
    } while ($hasMore);
    
    echo "\n=== Résumé de la synchronisation ===\n";
    echo "Produits synchronisés: {$totalSynced}\n";
    echo "Erreurs: {$totalErrors}\n";
    
    if ($totalErrors === 0) {
        echo "\n🎉 Synchronisation terminée avec succès!\n";
    } else {
        echo "\n⚠️  Synchronisation terminée avec des erreurs.\n";
    }
    
} catch (Exception $e) {
    echo "\n❌ Erreur fatale: " . $e->getMessage() . "\n";
    echo "\nVérifiez que:\n";
    echo "- L'API est accessible\n";
    echo "- Vous êtes connecté (token valide)\n";
    echo "- La base de données locale est configurée\n";
    exit(1);
}

echo "\n=== Prochaines étapes ===\n";
echo "1. Vérifiez les produits dans l'interface web\n";
echo "2. Créez des fournisseurs si nécessaire\n";
echo "3. Testez la création d'achats\n";
echo "\nScript terminé.\n";
?>
