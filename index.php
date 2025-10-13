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


    // Routes pour les clients
    $r->addRoute('GET', '/client/ajouter', 'ClientController@addClient');
    $r->addRoute('GET', '/liste-client', 'ClientController@listeClient');
    $r->addRoute('GET', '/client/{id}/details', 'ClientController@detailsClient');

    // Routes pour les produits
    $r->addRoute('GET', '/produit/ajouter', 'ProduitController@produitAdd');
    $r->addRoute('GET', '/produit/liste', 'ProduitController@listeProduit');
    $r->addRoute('GET', '/produit/{id}/details', 'ProduitController@detailsProduit');
    $r->addRoute('GET', '/produit/{id}/edit', 'ProduitController@editProduit');

    // Routes pour les categories
    $r->addRoute('GET', '/categorie-produit-add', 'ProduitController@categorieProduitAdd');
    $r->addRoute('GET', '/categories-produits-liste', 'ProduitController@categorieProduitList');

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
