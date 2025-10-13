<?php
// Script de diagnostic pour la création de produits
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require 'configs/utils.php';

echo "<h1>🔍 Diagnostic - Création de Produit</h1>";

echo "<h2>1. Vérification des Cookies</h2>";
echo "<pre>";
print_r($_COOKIE);
echo "</pre>";

echo "<h2>2. Test de Connexion API</h2>";
$token = $_COOKIE['access_token'] ?? null;
if ($token) {
    echo "✅ Token trouvé: " . substr($token, 0, 20) . "...<br>";
    
    // Test de l'endpoint API
    $testData = [
        'name' => 'Test Product',
        'description' => 'Produit de test',
        'unit_price' => 1000,
        'is_active' => true
    ];
    
    $result = makeApiCall('/products', 'POST', $testData);
    echo "<h3>Résultat du test API:</h3>";
    echo "<pre>";
    print_r($result);
    echo "</pre>";
} else {
    echo "❌ Aucun token d'authentification trouvé<br>";
    echo "<a href='/login'>Se connecter d'abord</a>";
}

echo "<h2>3. Vérification des Routes</h2>";
echo "<pre>";
echo "Routes configurées:\n";
echo "- GET /produit/ajouter -> ProduitController@produitAdd\n";
echo "- POST /api/products -> API externe\n";
echo "</pre>";

echo "<h2>4. Test des Fonctions JavaScript</h2>";
?>

<script src="/assets/js/api.js"></script>
<script>
console.log('=== Test des fonctions JavaScript ===');
console.log('API_CONFIG:', API_CONFIG);
console.log('ProductAPI:', ProductAPI);
console.log('getCookie function:', typeof getCookie);

// Test de la fonction getCookie
const token = getCookie('access_token');
console.log('Token récupéré:', token ? 'Oui' : 'Non');

// Test de la fonction ProductAPI
if (typeof ProductAPI !== 'undefined') {
    console.log('ProductAPI.create function:', typeof ProductAPI.create);
} else {
    console.error('ProductAPI non défini !');
}

// Test de la fonction showNotification
if (typeof showNotification !== 'undefined') {
    console.log('showNotification function:', typeof showNotification);
    showNotification('info', 'Test de notification');
} else {
    console.error('showNotification non définie !');
}
</script>

<?php
echo "<h2>5. Informations du Serveur</h2>";
echo "<pre>";
echo "PHP Version: " . phpversion() . "\n";
echo "Server: " . $_SERVER['SERVER_SOFTWARE'] . "\n";
echo "Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "\n";
echo "Request URI: " . $_SERVER['REQUEST_URI'] . "\n";
echo "HTTP Method: " . $_SERVER['REQUEST_METHOD'] . "\n";
echo "Content Type: " . ($_SERVER['CONTENT_TYPE'] ?? 'Non défini') . "\n";
echo "</pre>";

echo "<h2>6. Vérification des Fichiers</h2>";
$files_to_check = [
    '/assets/js/api.js',
    '/views/produit/add.php',
    '/configs/api-config.php',
    '/configs/utils.php'
];

foreach ($files_to_check as $file) {
    $full_path = __DIR__ . $file;
    if (file_exists($full_path)) {
        echo "✅ $file existe<br>";
    } else {
        echo "❌ $file manquant<br>";
    }
}

echo "<h2>7. Test de Création Manuel</h2>";
if ($token) {
    echo '<form id="testForm">
        <input type="text" name="name" placeholder="Nom du produit" required><br><br>
        <input type="number" name="unit_price" placeholder="Prix unitaire" required><br><br>
        <textarea name="description" placeholder="Description"></textarea><br><br>
        <button type="submit">Tester la Création</button>
    </form>';
    
    echo '<div id="result"></div>';
    
    echo '<script>
    document.getElementById("testForm").addEventListener("submit", async function(e) {
        e.preventDefault();
        const resultDiv = document.getElementById("result");
        resultDiv.innerHTML = "🔄 Création en cours...";
        
        const formData = new FormData(this);
        
        try {
            const result = await ProductAPI.create(formData);
            if (result.success) {
                resultDiv.innerHTML = "✅ Produit créé avec succès !";
                console.log("Résultat:", result);
            } else {
                resultDiv.innerHTML = "❌ Erreur: " + JSON.stringify(result, null, 2);
            }
        } catch (error) {
            resultDiv.innerHTML = "❌ Erreur: " + error.message;
        }
    });
    </script>';
}
?>

<style>
body { font-family: Arial, sans-serif; margin: 20px; }
pre { background: #f5f5f5; padding: 10px; border-radius: 4px; }
form { margin: 20px 0; padding: 20px; border: 1px solid #ddd; border-radius: 4px; }
input, textarea { width: 100%; margin: 5px 0; padding: 8px; }
button { background: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
</style>

