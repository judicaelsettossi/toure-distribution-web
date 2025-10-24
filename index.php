<?php
// Configuration pour l'hébergement mutualisé
require_once __DIR__ . '/configs/hosting-config.php';

session_start();

// Exclure les fichiers statiques du routage
$requestUri = $_SERVER['REQUEST_URI'];
$parsedUrl = parse_url($requestUri);
$path = $parsedUrl['path'];

// Exclure les routes d'application qui ne sont pas des fichiers statiques
$appRoutes = ['/camion/', '/client/', '/fournisseur/', '/entrepot/', '/produit/', '/stock/', '/facture/', '/chauffeur/', '/commande/', '/vente/'];
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
    // $r->addRoute('GET', '/', 'HomeController@home'); // Remplacé par DashboardController@index

    // Routes pour le centre d'aide
    $r->addRoute('GET', '/help', 'HelpController@index');
    $r->addRoute('GET', '/help/faq', 'HelpController@faq');
    $r->addRoute('GET', '/help/guides', 'HelpController@guides');
    $r->addRoute('GET', '/help/contact', 'HelpController@contact');
    $r->addRoute('GET', '/help/search', 'HelpController@search');

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
    
    // Routes pour la gestion avancée des stocks (désactivées: doublons)
    // $r->addRoute('GET', '/stock/par-produit', 'StockController@stockByProduct');
    // $r->addRoute('GET', '/stock/par-produit/{id}', 'StockController@stockByProduct');
    // $r->addRoute('GET', '/stock/par-entrepot', 'StockController@stockByWarehouse');
    // $r->addRoute('GET', '/stock/par-entrepot/{id}', 'StockController@stockByWarehouse');
    // $r->addRoute('GET', '/stock/ajustement', 'StockController@stockAdjustment');
    // $r->addRoute('GET', '/stock/reservation', 'StockController@stockReservation');

    // Routes pour la gestion des fournisseurs
    $r->addRoute('GET', '/fournisseurs', 'FournisseurController@listeFournisseurs');
    $r->addRoute('GET', '/fournisseur/ajouter', 'FournisseurController@addFournisseur');
    $r->addRoute('GET', '/fournisseur/{id}/details', 'FournisseurController@detailsFournisseur');
    $r->addRoute('GET', '/fournisseur/{id}/edit', 'FournisseurController@editFournisseur');

    // Routes pour la gestion des achats (base de données locale)
    $r->addRoute('GET', '/achats', 'PurchaseController@listeAchats');
    $r->addRoute('GET', '/achat/creer', 'PurchaseController@creerAchat');
    $r->addRoute('POST', '/achat/creer', 'PurchaseController@creerAchat');
    $r->addRoute('GET', '/achat/{id}/details', 'PurchaseController@detailsAchat');
    $r->addRoute('GET', '/achat/{id}/modifier-statut', 'PurchaseController@modifierStatut');
    $r->addRoute('POST', '/achat/{id}/modifier-statut', 'PurchaseController@modifierStatut');

    // Routes pour la gestion des ventes (base de données locale)
    $r->addRoute('GET', '/ventes', 'SaleController@listeVentes');
    $r->addRoute('GET', '/vente/creer', 'SaleController@creerVente');
    $r->addRoute('POST', '/vente/creer', 'SaleController@creerVente');
    $r->addRoute('GET', '/vente/{id}/details', 'SaleController@detailsVente');
    $r->addRoute('GET', '/vente/{id}/modifier-statut', 'SaleController@modifierStatut');
    $r->addRoute('POST', '/vente/{id}/modifier-statut', 'SaleController@modifierStatut');

    // Routes pour la gestion des stocks (base de données locale)
    $r->addRoute('GET', '/stock', 'StockController@stockParEntrepot');
    $r->addRoute('GET', '/stock/par-entrepot', 'StockController@stockParEntrepot');
    $r->addRoute('GET', '/stock/par-entrepot/{id}', 'StockController@stockParEntrepot');
    $r->addRoute('GET', '/stock/par-produit', 'StockController@stockParProduit');
    $r->addRoute('GET', '/stock/par-produit/{id}', 'StockController@stockParProduit');
    $r->addRoute('GET', '/stock/transfert', 'StockController@transfertStock');
    $r->addRoute('POST', '/stock/transfert', 'StockController@transfertStock');
    $r->addRoute('GET', '/stock/transferts', 'StockController@listeTransferts');
    $r->addRoute('GET', '/stock/transfert/{id}/details', 'StockController@detailsTransfert');
    $r->addRoute('GET', '/stock/transfert/{id}/confirmer', 'StockController@confirmerTransfert');

    // Routes pour la gestion des alertes (base de données locale)
    $r->addRoute('GET', '/alerts', 'AlertsController@dashboardAlertes');
    $r->addRoute('GET', '/alerts/mouvements', 'AlertsController@historiqueMouvements');
    $r->addRoute('GET', '/alerts/stock', 'AlertsController@alertesStock');
    $r->addRoute('GET', '/alerts/generer', 'AlertsController@genererAlertes');
    $r->addRoute('GET', '/alerts/{id}/resoudre', 'AlertsController@resoudreAlerte');

    // Routes pour la synchronisation API
    $r->addRoute('GET', '/sync', 'SyncController@dashboardSync');
    $r->addRoute('GET', '/sync/products', 'SyncController@syncProducts');
    $r->addRoute('GET', '/sync/clients', 'SyncController@syncClients');
    $r->addRoute('GET', '/sync/invoices', 'SyncController@creerFactures');
    $r->addRoute('GET', '/sync/factures', 'SyncController@listeFactures');
    $r->addRoute('GET', '/sync/facture/{id}/details', 'SyncController@detailsFacture');
    $r->addRoute('GET', '/sync/complete', 'SyncController@syncComplete');

    // Routes pour les transferts entre entrepôts
    $r->addRoute('GET', '/entrepot/transfert', 'EntrepotController@transfertEntrepot');

    // Tableau de bord d'ensemble
    $r->addRoute('GET', '/', 'DashboardController@index');
    $r->addRoute('GET', '/dashboard', 'DashboardController@index');

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

    // Routes pour la gestion des ventes
    // Anciennes routes VenteController désactivées au profit du module local SaleController
    // $r->addRoute('GET', '/vente', 'VenteController@index');
    // $r->addRoute('GET', '/vente/{id}', 'VenteController@show');
    // $r->addRoute('GET', '/vente/{id}/edit', 'VenteController@edit');
    // $r->addRoute('POST', '/vente/{id}/edit', 'VenteController@update');
    // $r->addRoute('POST', '/vente/{id}/delete', 'VenteController@destroy');

    // Routes pour la gestion des livraisons
    $r->addRoute('GET', '/livraison', 'LivraisonController@index');
    $r->addRoute('GET', '/livraison/creer', 'LivraisonController@create');
    $r->addRoute('POST', '/livraison/creer', 'LivraisonController@store');
    $r->addRoute('GET', '/livraison/{id}', 'LivraisonController@show');
    $r->addRoute('GET', '/livraison/{id}/edit', 'LivraisonController@edit');
    $r->addRoute('POST', '/livraison/{id}/edit', 'LivraisonController@update');
    $r->addRoute('POST', '/livraison/{id}/delete', 'LivraisonController@destroy');

    // API Routes utilisateurs
    $r->addRoute('GET', '/api/users', 'UserController@getUsersList');
    $r->addRoute('GET', '/api/users/statistics', 'UserController@getUsersStatistics');
    $r->addRoute('GET', '/api/users/{id}', 'UserController@getUserDetails');
    $r->addRoute('POST', '/api/users/{id}/activate', 'UserController@activateUser');
    $r->addRoute('POST', '/api/users/{id}/unlock', 'UserController@unlockUser');
    $r->addRoute('PUT', '/api/users/{id}', 'UserController@updateUser');

    // API Routes commandes
    $r->addRoute('GET', '/api/commandes', 'CommandeController@getCommandesList');
    $r->addRoute('GET', '/api/commandes/{id}', 'CommandeController@getCommandeDetails');
    $r->addRoute('GET', '/api/commandes/{id}/pdf', 'CommandeController@downloadCommandePDF');
    $r->addRoute('POST', '/api/commandes', 'CommandeController@createCommande');
    $r->addRoute('PUT', '/api/commandes/{id}', 'CommandeController@updateCommande');
    $r->addRoute('DELETE', '/api/commandes/{id}', 'CommandeController@deleteCommande');
    $r->addRoute('GET', '/api/commandes/trashed/list', 'CommandeController@getTrashedCommandes');
    $r->addRoute('POST', '/api/commandes/{id}/restore', 'CommandeController@restoreCommande');

    // API Routes mouvements de stock
    $r->addRoute('POST', '/api/stock-movements/receipt/supplier', 'StockMovementController@createSupplierReceipt');
    $r->addRoute('POST', '/api/stock-movements/transfer', 'StockMovementController@createTransfer');
    $r->addRoute('POST', '/api/stock-movements/{id}/validate', 'StockMovementController@validateMovement');
    $r->addRoute('GET', '/api/entrepots', 'EntrepotController@getEntrepotsList');
    
    // API Routes paiements commandes
    $r->addRoute('POST', '/api/paiement-commandes', 'PaiementCommandeController@createPaiement');
    $r->addRoute('GET', '/api/paiement-commandes/commande/{id}', 'PaiementCommandeController@getPaiementsByCommande');

    // API Routes détails de commandes
    $r->addRoute('GET', '/api/detail-commandes', 'CommandeController@getDetailCommandesList');
    $r->addRoute('POST', '/api/detail-commandes', 'CommandeController@createDetailCommande');
    $r->addRoute('GET', '/api/detail-commandes/{id}', 'CommandeController@getDetailCommande');
    $r->addRoute('PUT', '/api/detail-commandes/{id}', 'CommandeController@updateDetailCommande');
    $r->addRoute('DELETE', '/api/detail-commandes/{id}', 'CommandeController@deleteDetailCommande');
    $r->addRoute('GET', '/api/detail-commandes/commande/{commandeId}', 'CommandeController@getCommandeDetailsItems');

    // API Routes ventes
    // API ventes de l’ancien module désactivée
    // $r->addRoute('GET', '/api/ventes', 'VenteController@getVentesList');
    // $r->addRoute('POST', '/api/ventes', 'VenteController@createVente');
    // $r->addRoute('GET', '/api/ventes/{id}', 'VenteController@getVenteDetails');
    // $r->addRoute('PUT', '/api/ventes/{id}', 'VenteController@updateVente');
    // $r->addRoute('PATCH', '/api/ventes/{id}', 'VenteController@updateVente');
    // $r->addRoute('DELETE', '/api/ventes/{id}', 'VenteController@deleteVente');
    // $r->addRoute('GET', '/api/ventes/trashed/list', 'VenteController@getTrashedVentes');
    // $r->addRoute('POST', '/api/ventes/{id}/restore', 'VenteController@restoreVente');

    // API Routes détails de ventes
    // API détail-ventes ancien module désactivée
    // $r->addRoute('GET', '/api/detail-ventes', 'VenteController@getDetailVentesList');
    // ...
    // $r->addRoute('GET', '/api/detail-ventes/vente/{id}', 'VenteController@getVenteDetails');

    // API Routes paiements de ventes
    // API paiements ventes ancien module désactivée
    // $r->addRoute('GET', '/api/paiement-ventes', 'VenteController@getPaiementVentesList');
    // ...

    // API Routes livraisons
    $r->addRoute('GET', '/api/livraisons', 'LivraisonController@getLivraisonsList');
    $r->addRoute('POST', '/api/livraisons', 'LivraisonController@createLivraison');
    $r->addRoute('GET', '/api/livraisons/{id}', 'LivraisonController@getLivraisonDetails');
    $r->addRoute('PUT', '/api/livraisons/{id}', 'LivraisonController@updateLivraison');
    $r->addRoute('PATCH', '/api/livraisons/{id}', 'LivraisonController@updateLivraison');
    $r->addRoute('DELETE', '/api/livraisons/{id}', 'LivraisonController@deleteLivraison');
    $r->addRoute('POST', '/api/livraisons/{id}/start', 'LivraisonController@startLivraison');
    $r->addRoute('POST', '/api/livraisons/{id}/complete', 'LivraisonController@completeLivraison');
    $r->addRoute('POST', '/api/livraisons/{id}/cancel', 'LivraisonController@cancelLivraison');
    $r->addRoute('GET', '/api/livraisons/statistics/overview', 'LivraisonController@getLivraisonsStatistics');

    // API Routes détails de livraison
    $r->addRoute('GET', '/api/delivery-details', 'LivraisonController@getDeliveryDetailsList');
    $r->addRoute('GET', '/api/delivery-details/{id}', 'LivraisonController@getDeliveryDetail');
    $r->addRoute('PUT', '/api/delivery-details/{id}', 'LivraisonController@updateDeliveryDetail');
    $r->addRoute('PATCH', '/api/delivery-details/{id}', 'LivraisonController@updateDeliveryDetail');
    $r->addRoute('POST', '/api/delivery-details/{id}/preparer', 'LivraisonController@prepareProduct');
    $r->addRoute('POST', '/api/delivery-details/{id}/livrer', 'LivraisonController@deliverProduct');
    $r->addRoute('POST', '/api/delivery-details/{id}/retourner', 'LivraisonController@returnProduct');
    $r->addRoute('GET', '/api/delivery-details/delivery/{deliveryId}', 'LivraisonController@getDeliveryDetailsByDelivery');
    $r->addRoute('POST', '/api/delivery-details/delivery/{deliveryId}/preparer-tout', 'LivraisonController@prepareAllProducts');

    // API Routes fournisseurs
    $r->addRoute('GET', '/api/fournisseur', 'FournisseurController@getFournisseursList');
    $r->addRoute('GET', '/api/fournisseur/{id}', 'FournisseurController@getFournisseurDetails');
    $r->addRoute('POST', '/api/fournisseur', 'FournisseurController@createFournisseur');
    $r->addRoute('PUT', '/api/fournisseur/{id}', 'FournisseurController@updateFournisseur');
    $r->addRoute('DELETE', '/api/fournisseur/{id}', 'FournisseurController@deleteFournisseur');

    // API Routes clients
    $r->addRoute('GET', '/api/clients', 'ClientController@getClientsList');
    $r->addRoute('GET', '/api/clients/{id}', 'ClientController@getClientDetails');
    $r->addRoute('POST', '/api/clients', 'ClientController@createClient');
    $r->addRoute('PUT', '/api/clients/{id}', 'ClientController@updateClient');
    $r->addRoute('DELETE', '/api/clients/{id}', 'ClientController@deleteClient');

    // API Routes produits
    $r->addRoute('GET', '/api/produits', 'ProduitController@getProduitsList');
    $r->addRoute('GET', '/api/produits/{id}', 'ProduitController@getProduitDetails');
    $r->addRoute('POST', '/api/produits', 'ProduitController@createProduit');
    $r->addRoute('PUT', '/api/produits/{id}', 'ProduitController@updateProduit');
    $r->addRoute('DELETE', '/api/produits/{id}', 'ProduitController@deleteProduit');

    // API Routes camions
    $r->addRoute('GET', '/api/camions', 'CamionController@getCamionsList');
    $r->addRoute('GET', '/api/camions/{id}', 'CamionController@getCamionDetails');
    $r->addRoute('POST', '/api/camions', 'CamionController@createCamion');
    $r->addRoute('PUT', '/api/camions/{id}', 'CamionController@updateCamion');
    $r->addRoute('DELETE', '/api/camions/{id}', 'CamionController@deleteCamion');

    // API Routes chauffeurs
    $r->addRoute('GET', '/api/chauffeurs', 'ChauffeurController@getChauffeursList');
    $r->addRoute('GET', '/api/chauffeurs/{id}', 'ChauffeurController@getChauffeurDetails');
    $r->addRoute('POST', '/api/chauffeurs', 'ChauffeurController@createChauffeur');
    $r->addRoute('PUT', '/api/chauffeurs/{id}', 'ChauffeurController@updateChauffeur');
    $r->addRoute('DELETE', '/api/chauffeurs/{id}', 'ChauffeurController@deleteChauffeur');

    // Routes pour le profil utilisateur
    $r->addRoute('GET', '/profil', 'UserController@profilUtilisateur');
    $r->addRoute('POST', '/profil', 'UserController@profilUtilisateur');

    // Routes pour la gestion des commandes
    $r->addRoute('GET', '/commandes', 'CommandeController@listeCommandes');
    $r->addRoute('GET', '/commande/creer', 'CommandeController@creerCommande');
    $r->addRoute('GET', '/commande/{id}', 'CommandeController@detailsCommande');
    $r->addRoute('GET', '/commande/{id}/modifier', 'CommandeController@modifierCommande');
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
