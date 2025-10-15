<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

session_start();

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
    $r->addRoute('GET', '/entrepot/{id}/edit', 'EntrepotController@editEntrepot');


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

    // Routes pour les categories
    $r->addRoute('GET', '/categorie-produit-add', 'ProduitController@categorieProduitAdd');
    $r->addRoute('GET', '/categories-produits-liste', 'ProduitController@categorieProduitList');

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
    $r->addRoute('GET', '/camion/{id}', 'CamionController@detailsCamion');
    $r->addRoute('GET', '/camion/creer', 'CamionController@creerCamion');
    $r->addRoute('POST', '/camion/creer', 'CamionController@creerCamion');
    $r->addRoute('GET', '/camion/{id}/modifier', 'CamionController@modifierCamion');
    $r->addRoute('POST', '/camion/{id}/modifier', 'CamionController@modifierCamion');
    $r->addRoute('GET', '/camion/{id}/supprimer', 'CamionController@supprimerCamion');
    $r->addRoute('POST', '/camion/{id}/supprimer', 'CamionController@supprimerCamion');
    $r->addRoute('GET', '/camions/supprimes', 'CamionController@camionsSupprimes');
    $r->addRoute('GET', '/camion/{id}/restaurer', 'CamionController@restaurerCamion');
    $r->addRoute('POST', '/camion/{id}/restaurer', 'CamionController@restaurerCamion');
    $r->addRoute('GET', '/camions/statistiques', 'CamionController@statistiquesCamions');

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
        call_user_func_array(array(new $controller, $method), $vars);
        break;
}
