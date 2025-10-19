<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

session_start();

// Exclure les fichiers statiques du routage
$requestUri = $_SERVER['REQUEST_URI'];
$parsedUrl = parse_url($requestUri);
$path = $parsedUrl['path'];

// Exclure les routes d'application qui ne sont pas des fichiers statiques
$appRoutes = ['/camion/', '/client/', '/fournisseur/', '/entrepot/', '/produit/', '/stock/', '/facture/', '/chauffeur/', '/commande/'];
$isAppRoute = false;
foreach ($appRoutes as $route) {
    if (strpos($path, $route) === 0) {
        $isAppRoute = true;
        break;
    }
}

// Si c'est une route d'application, ne pas traiter comme fichier statique
if ($isAppRoute) {
    // Continuer avec le routage normal
} else {
    // Liste des extensions de fichiers statiques à exclure
    $staticExtensions = ['ico', 'css', 'js', 'png', 'jpg', 'jpeg', 'gif', 'svg', 'woff', 'woff2', 'ttf', 'eot'];
    $pathInfo = pathinfo($path);

    // Si c'est un fichier statique, servir directement
    if (isset($pathInfo['extension']) && in_array(strtolower($pathInfo['extension']), $staticExtensions)) {
    $filePath = __DIR__ . $path;
    if (file_exists($filePath)) {
        // Déterminer le type MIME
        $mimeTypes = [
            'ico' => 'image/x-icon',
            'css' => 'text/css',
            'js' => 'application/javascript',
            'png' => 'image/png',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'gif' => 'image/gif',
            'svg' => 'image/svg+xml',
            'woff' => 'font/woff',
            'woff2' => 'font/woff2',
            'ttf' => 'font/ttf',
            'eot' => 'application/vnd.ms-fontobject'
        ];
        
        $extension = strtolower($pathInfo['extension']);
        $mimeType = isset($mimeTypes[$extension]) ? $mimeTypes[$extension] : 'application/octet-stream';
        
        header('Content-Type: ' . $mimeType);
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
        exit;
    }
    }
}

require 'configs/utils.php';
require 'vendor/autoload.php';
require 'controllers/controllers.php';

// Création de l'instance du routeur
$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {

    // Routes principale
    $r->addRoute('GET', '/', 'HomeController@home');

    // Routes pour les entrepots
    $r->addRoute('GET', '/creer-un-entrepot', 'EntrepotController@addEntrepot');
    $r->addRoute('GET', '/entrepots', 'EntrepotController@listeEntrepot');
    $r->addRoute('GET', '/entrepot/{id}/details', 'EntrepotController@detailsEntrepot');
    $r->addRoute('GET', '/entrepot/{id}/modifier', 'EntrepotController@editEntrepot');



    // Routes pour les clients
    $r->addRoute('GET', '/client/ajouter', 'ClientController@addClient');
    $r->addRoute('GET', '/liste-client', 'ClientController@listeClient');
    $r->addRoute('GET', '/client/{id}/details', 'ClientController@detailsClient');
    $r->addRoute('GET', '/client/{id}/modifier', 'ClientController@editClient');

    // Routes pour les produits
    $r->addRoute('GET', '/produit/ajouter', 'ProduitController@produitAdd');
    $r->addRoute('GET', '/produit/liste', 'ProduitController@listeProduit');
    $r->addRoute('GET', '/produit/{id}/details', 'ProduitController@detailsProduit');
    $r->addRoute('GET', '/produit/{id}/edit', 'ProduitController@editProduit');
    $r->addRoute('PATCH', '/api/products/{id}/toggle-status', 'ProduitController@toggleStatus');

    // Routes pour les categories
    $r->addRoute('GET', '/categorie-produit-add', 'ProduitController@categorieProduitAdd');
    $r->addRoute('GET', '/categories-produits-liste', 'ProduitController@categorieProduitList');
    $r->addRoute('GET', '/categorie/{id}/details', 'ProduitController@categorieDetails');
    $r->addRoute('GET', '/categorie/{id}/edit', 'ProduitController@categorieEdit');

    // Routes pour la gestion de stock
    $r->addRoute('GET', '/entree-sortie-stock', 'StockController@stockEntry');
    $r->addRoute('GET', '/stock/mouvements', 'StockController@stockMovements');
    $r->addRoute('GET', '/mouvements-stock', 'StockController@stockMovements');
    $r->addRoute('GET', '/stock/entree', 'StockController@stockIn');
    $r->addRoute('GET', '/stock/sortie', 'StockController@stockOut');
    $r->addRoute('GET', '/stock/gestion', 'StockController@stockManagement');
    $r->addRoute('GET', '/stock/mouvement/{id}/details', 'StockController@stockMovementDetails');
    $r->addRoute('GET', '/mouvement-stock/{id}', 'StockController@stockMovementDetails');
    
    // Routes pour créer et modifier les mouvements de stock
    $r->addRoute('GET', '/creer-mouvement-stock', 'StockController@createStockMovement');
    $r->addRoute('POST', '/creer-mouvement-stock', 'StockController@createStockMovement');
    $r->addRoute('GET', '/modifier-mouvement-stock/{id}', 'StockController@updateStockMovement');
    $r->addRoute('POST', '/modifier-mouvement-stock/{id}', 'StockController@updateStockMovement');
    
    // Routes spécialisées pour les mouvements de stock
    $r->addRoute('GET', '/transfert-entrepot', 'StockController@createWarehouseTransfer');
    $r->addRoute('POST', '/transfert-entrepot', 'StockController@createWarehouseTransfer');
    $r->addRoute('GET', '/reception-fournisseur', 'StockController@createSupplierReceipt');
    $r->addRoute('POST', '/reception-fournisseur', 'StockController@createSupplierReceipt');
    
    // Routes pour les types de mouvements de stock
    $r->addRoute('GET', '/stock/types-mouvements', 'StockController@stockMovementTypes');
    $r->addRoute('GET', '/stock/type-mouvement/creer', 'StockController@createMovementType');
    $r->addRoute('GET', '/stock/type-mouvement/{id}/edit', 'StockController@editMovementType');
    
    // Routes pour la gestion avancée des stocks
    $r->addRoute('GET', '/stock/par-produit', 'StockController@stockByProduct');
    $r->addRoute('GET', '/stock/par-produit/{id}', 'StockController@stockByProduct');
    $r->addRoute('GET', '/stock/par-entrepot', 'StockController@stockByWarehouse');
    $r->addRoute('GET', '/stock/par-entrepot/{id}', 'StockController@stockByWarehouse');
    $r->addRoute('GET', '/stock/ajustement', 'StockController@stockAdjustment');
    $r->addRoute('GET', '/stock/reservation', 'StockController@stockReservation');

    // Routes pour la gestion des fournisseurs
    $r->addRoute('GET', '/fournisseurs', 'FournisseurController@listeFournisseurs');
    $r->addRoute('GET', '/fournisseur/ajouter', 'FournisseurController@addFournisseur');
    $r->addRoute('GET', '/fournisseur/{id}/details', 'FournisseurController@detailsFournisseur');
    $r->addRoute('GET', '/fournisseur/{id}/edit', 'FournisseurController@editFournisseur');

    // Routes pour les transferts entre entrepôts
    $r->addRoute('GET', '/entrepot/transfert', 'EntrepotController@transfertEntrepot');

    // Routes pour la gestion des factures
    $r->addRoute('GET', '/factures', 'FactureController@listeFactures');
    $r->addRoute('GET', '/facture/creer', 'FactureController@createFacture');
    $r->addRoute('GET', '/facture/{id}/details', 'FactureController@detailsFacture');
    $r->addRoute('GET', '/facture/{id}/edit', 'FactureController@editFacture');
    $r->addRoute('GET', '/factures/statistiques', 'FactureController@statisticsFactures');
    $r->addRoute('GET', '/factures/impayees', 'FactureController@facturesImpayees');
    $r->addRoute('GET', '/factures/relances', 'FactureController@facturesRelances');

    // Routes pour la gestion des camions
    $r->addRoute('GET', '/camions', 'CamionController@listeCamions');
    $r->addRoute('GET', '/camions/supprimes', 'CamionController@camionsSupprimes');
    $r->addRoute('GET', '/camions/statistiques', 'CamionController@statistiquesCamions');
    $r->addRoute('GET', '/camion/creer', 'CamionController@creerCamion');
    $r->addRoute('POST', '/camion/creer', 'CamionController@creerCamion');
    $r->addRoute('GET', '/camion/{id}', 'CamionController@detailsCamion');
    $r->addRoute('GET', '/camion/{id}/modifier', 'CamionController@modifierCamion');
    $r->addRoute('POST', '/camion/{id}/modifier', 'CamionController@modifierCamion');
    $r->addRoute('GET', '/camion/{id}/supprimer', 'CamionController@supprimerCamion');
    $r->addRoute('POST', '/camion/{id}/supprimer', 'CamionController@supprimerCamion');
    $r->addRoute('GET', '/camion/{id}/restaurer', 'CamionController@restaurerCamion');
    $r->addRoute('POST', '/camion/{id}/restaurer', 'CamionController@restaurerCamion');

    // Routes pour la gestion des chauffeurs
    $r->addRoute('GET', '/chauffeurs', 'ChauffeurController@listeChauffeurs');
    $r->addRoute('GET', '/chauffeurs/supprimes', 'ChauffeurController@chauffeursSupprimes');
    $r->addRoute('GET', '/chauffeurs/statistiques', 'ChauffeurController@statistiquesChauffeurs');
    $r->addRoute('GET', '/chauffeur/creer', 'ChauffeurController@creerChauffeur');
    $r->addRoute('POST', '/chauffeur/creer', 'ChauffeurController@creerChauffeur');
    $r->addRoute('GET', '/chauffeur/{id}', 'ChauffeurController@detailsChauffeur');
    $r->addRoute('GET', '/chauffeur/{id}/modifier', 'ChauffeurController@modifierChauffeur');
    $r->addRoute('POST', '/chauffeur/{id}/modifier', 'ChauffeurController@modifierChauffeur');
    $r->addRoute('GET', '/chauffeur/{id}/supprimer', 'ChauffeurController@supprimerChauffeur');
    $r->addRoute('POST', '/chauffeur/{id}/supprimer', 'ChauffeurController@supprimerChauffeur');
    $r->addRoute('GET', '/chauffeur/{id}/restaurer', 'ChauffeurController@restaurerChauffeur');
    $r->addRoute('POST', '/chauffeur/{id}/restaurer', 'ChauffeurController@restaurerChauffeur');

    // Routes pour la gestion des utilisateurs
    $r->addRoute('GET', '/utilisateurs', 'UserController@listeUtilisateurs');
    $r->addRoute('GET', '/utilisateur/creer', 'UserController@creerUtilisateur');
    $r->addRoute('POST', '/utilisateur/creer', 'UserController@creerUtilisateur');
    $r->addRoute('GET', '/utilisateur/{id}', 'UserController@detailsUtilisateur');
    $r->addRoute('GET', '/utilisateur/{id}/modifier', 'UserController@modifierUtilisateur');
    $r->addRoute('POST', '/utilisateur/{id}/modifier', 'UserController@modifierUtilisateur');

    // API Routes utilisateurs
    $r->addRoute('GET', '/api/users', 'UserController@getUsersList');
    $r->addRoute('GET', '/api/users/statistics', 'UserController@getUsersStatistics');
    $r->addRoute('GET', '/api/users/{id}', 'UserController@getUserDetails');
    $r->addRoute('POST', '/api/users/{id}/activate', 'UserController@activateUser');
    $r->addRoute('POST', '/api/users/{id}/unlock', 'UserController@unlockUser');
    $r->addRoute('PUT', '/api/users/{id}', 'UserController@updateUser');

    // Routes pour le profil utilisateur
    $r->addRoute('GET', '/profil', 'UserController@profilUtilisateur');
    $r->addRoute('POST', '/profil', 'UserController@profilUtilisateur');

    // Routes pour la gestion des commandes
    $r->addRoute('GET', '/commandes', 'CommandeController@listeCommandes');
    $r->addRoute('GET', '/commandes/supprimees', 'CommandeController@commandesSupprimees');
    $r->addRoute('GET', '/commandes/statistiques', 'CommandeController@statistiquesCommandes');
    $r->addRoute('GET', '/commande/creer', 'CommandeController@creerCommande');
    $r->addRoute('POST', '/commande/creer', 'CommandeController@creerCommande');
    $r->addRoute('GET', '/commande/{id}', 'CommandeController@detailsCommande');
    $r->addRoute('GET', '/commande/{id}/modifier', 'CommandeController@modifierCommande');
    $r->addRoute('POST', '/commande/{id}/modifier', 'CommandeController@modifierCommande');
    $r->addRoute('GET', '/commande/{id}/supprimer', 'CommandeController@supprimerCommande');
    $r->addRoute('POST', '/commande/{id}/supprimer', 'CommandeController@supprimerCommande');
    $r->addRoute('GET', '/commande/{id}/restaurer', 'CommandeController@restaurerCommande');
    $r->addRoute('POST', '/commande/{id}/restaurer', 'CommandeController@restaurerCommande');
    
    // Routes pour la gestion des détails de commandes
    $r->addRoute('GET', '/commande/{id}/items', 'CommandeController@detailsCommandeItems');
    $r->addRoute('GET', '/commande/{id}/ajouter-item', 'CommandeController@ajouterDetailCommande');
    $r->addRoute('POST', '/commande/{id}/ajouter-item', 'CommandeController@ajouterDetailCommande');
    $r->addRoute('GET', '/commande/{commande_id}/modifier-item/{detail_id}', 'CommandeController@modifierDetailCommande');

    // Routes pour la gestion des paiements de commandes
    $r->addRoute('GET', '/paiement-commande', 'PaiementCommandeController@index');
    $r->addRoute('GET', '/paiement-commande/creer', 'PaiementCommandeController@creer');
    $r->addRoute('POST', '/paiement-commande/creer', 'PaiementCommandeController@creer');
    $r->addRoute('GET', '/paiement-commande/{id}', 'PaiementCommandeController@details');
    $r->addRoute('GET', '/paiement-commande/{id}/modifier', 'PaiementCommandeController@modifier');
    $r->addRoute('POST', '/paiement-commande/{id}/modifier', 'PaiementCommandeController@modifier');
    $r->addRoute('GET', '/paiement-commande/{id}/supprimer', 'PaiementCommandeController@supprimer');
    $r->addRoute('POST', '/paiement-commande/{id}/supprimer', 'PaiementCommandeController@supprimer');
    $r->addRoute('GET', '/commande/{id}/paiements', 'PaiementCommandeController@commandePaiements');
    $r->addRoute('POST', '/commande/{commande_id}/modifier-item/{detail_id}', 'CommandeController@modifierDetailCommande');
    $r->addRoute('GET', '/commande/{commande_id}/supprimer-item/{detail_id}', 'CommandeController@supprimerDetailCommande');
    $r->addRoute('POST', '/commande/{commande_id}/supprimer-item/{detail_id}', 'CommandeController@supprimerDetailCommande');

    // Routes pour l'authentification
    $r->addRoute('GET', '/login', 'AuthController@login');
    $r->addRoute('POST', '/login', 'AuthController@loginPost');
    $r->addRoute('GET', '/logout', 'AuthController@logout');
});


// Récupération de la méthode et de l'URI
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Suppression des paramètres de la query string
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}

// Dispatch de la requête
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

// Traitement de la réponse
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo 'Ressource not found';
        http_response_code(404);
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        // 405 Method Not Allowed
        $allowedMethods = $routeInfo[1];
        echo 'Method not allowed';
        break;
    case FastRoute\Dispatcher::FOUND:
        // Appel du contrôleur et de la méthode associée
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        list($controller, $method) = explode('@', $handler, 2);
        
        // Convertir les paramètres nommés en tableau indexé
        $args = array_values($vars);
        call_user_func_array(array(new $controller, $method), $args);
        break;
}
