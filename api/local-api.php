<?php

/**
 * API Locale pour l'ERP
 * 
 * Cette API remplace les appels à l'API externe pour les fonctionnalités
 * de stock, ventes et commandes en utilisant la base de données locale.
 */

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Gestion des requêtes OPTIONS (preflight)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Inclure les modèles
require_once __DIR__ . '/../configs/database-config.php';
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/Stock.php';
require_once __DIR__ . '/../models/StockMovement.php';
require_once __DIR__ . '/../models/Vente.php';
require_once __DIR__ . '/../models/Commande.php';
require_once __DIR__ . '/../models/Client.php';
require_once __DIR__ . '/../models/Fournisseur.php';
require_once __DIR__ . '/../models/Entrepot.php';

// Fonction pour vérifier l'authentification
function checkAuth() {
    $headers = getallheaders();
    $token = null;
    
    if (isset($headers['Authorization'])) {
        $auth = $headers['Authorization'];
        if (preg_match('/Bearer\s+(.*)$/i', $auth, $matches)) {
            $token = $matches[1];
        }
    } elseif (isset($_COOKIE['access_token'])) {
        $token = $_COOKIE['access_token'];
    }
    
    if (!$token) {
        http_response_code(401);
        echo json_encode(['success' => false, 'message' => 'Non authentifié']);
        exit();
    }
    
    return $token;
}

// Fonction pour envoyer une réponse JSON
function sendResponse($data, $statusCode = 200) {
    http_response_code($statusCode);
    echo json_encode($data);
    exit();
}

// Fonction pour gérer les erreurs
function handleError($e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Erreur serveur: ' . $e->getMessage()
    ]);
    exit();
}

// Router simple
$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Extraire le chemin de l'API
$path = parse_url($requestUri, PHP_URL_PATH);
$path = str_replace('/api/local-api.php', '', $path);
$segments = array_filter(explode('/', $path));

try {
    // ============================================
    // ROUTES POUR LES PRODUITS
    // ============================================
    if ($segments[1] === 'products') {
        checkAuth();
        $productModel = new Product();
        
        // GET /products - Liste des produits
        if ($requestMethod === 'GET' && count($segments) === 2) {
            $filters = [
                'search' => $_GET['search'] ?? '',
                'category_id' => $_GET['category_id'] ?? '',
                'status' => $_GET['status'] ?? ''
            ];
            $page = $_GET['page'] ?? 1;
            $perPage = $_GET['per_page'] ?? 15;
            
            $result = $productModel->getProducts($filters, $page, $perPage);
            sendResponse(['success' => true, 'data' => $result]);
        }
        
        // GET /products/{id} - Détails d'un produit
        if ($requestMethod === 'GET' && count($segments) === 3) {
            $id = $segments[3];
            $product = $productModel->getProductWithDetails($id);
            
            if ($product) {
                sendResponse(['success' => true, 'data' => $product]);
            } else {
                sendResponse(['success' => false, 'message' => 'Produit introuvable'], 404);
            }
        }
        
        // POST /products - Créer un produit
        if ($requestMethod === 'POST' && count($segments) === 2) {
            $data = json_decode(file_get_contents('php://input'), true);
            
            if (!isset($data['code']) || empty($data['code'])) {
                $data['code'] = $productModel->generateProductCode();
            }
            
            $productId = $productModel->create($data);
            sendResponse(['success' => true, 'data' => ['id' => $productId]], 201);
        }
        
        // PUT /products/{id} - Mettre à jour un produit
        if ($requestMethod === 'PUT' && count($segments) === 3) {
            $id = $segments[3];
            $data = json_decode(file_get_contents('php://input'), true);
            
            $productModel->update($id, $data);
            sendResponse(['success' => true, 'message' => 'Produit mis à jour']);
        }
        
        // DELETE /products/{id} - Supprimer un produit
        if ($requestMethod === 'DELETE' && count($segments) === 3) {
            $id = $segments[3];
            $productModel->delete($id);
            sendResponse(['success' => true, 'message' => 'Produit supprimé']);
        }
    }
    
    // ============================================
    // ROUTES POUR LES VENTES
    // ============================================
    if ($segments[1] === 'ventes') {
        checkAuth();
        $venteModel = new Vente();
        
        // GET /ventes - Liste des ventes
        if ($requestMethod === 'GET' && count($segments) === 2) {
            $filters = [
                'search' => $_GET['search'] ?? '',
                'client_id' => $_GET['client_id'] ?? '',
                'status' => $_GET['status'] ?? '',
                'statut_paiement' => $_GET['statut_paiement'] ?? '',
                'date_from' => $_GET['date_from'] ?? '',
                'date_to' => $_GET['date_to'] ?? ''
            ];
            $page = $_GET['page'] ?? 1;
            $perPage = $_GET['per_page'] ?? 15;
            
            $result = $venteModel->getVentes($filters, $page, $perPage);
            sendResponse($result);
        }
        
        // GET /ventes/{id} - Détails d'une vente
        if ($requestMethod === 'GET' && count($segments) === 3) {
            $id = $segments[3];
            $vente = $venteModel->getVenteWithDetails($id);
            
            if ($vente) {
                sendResponse(['success' => true, 'data' => $vente]);
            } else {
                sendResponse(['success' => false, 'message' => 'Vente introuvable'], 404);
            }
        }
        
        // POST /ventes - Créer une vente
        if ($requestMethod === 'POST' && count($segments) === 2) {
            $input = json_decode(file_get_contents('php://input'), true);
            
            $venteData = [
                'client_id' => $input['client_id'] ?? null,
                'entrepot_id' => $input['entrepot_id'],
                'user_id' => $_COOKIE['user_id'] ?? 1,
                'date_vente' => $input['date_vente'] ?? date('Y-m-d'),
                'type_vente' => $input['type_vente'] ?? 'comptant',
                'status' => $input['status'] ?? 'brouillon',
                'remise_pourcentage' => $input['remise_pourcentage'] ?? 0,
                'remise_montant' => $input['remise_montant'] ?? 0,
                'frais_livraison' => $input['frais_livraison'] ?? 0,
                'notes' => $input['notes'] ?? null
            ];
            
            $details = $input['details'] ?? [];
            
            $venteId = $venteModel->createVente($venteData, $details);
            sendResponse(['success' => true, 'data' => ['id' => $venteId]], 201);
        }
        
        // PUT /ventes/{id} - Mettre à jour une vente
        if ($requestMethod === 'PUT' && count($segments) === 3) {
            $id = $segments[3];
            $input = json_decode(file_get_contents('php://input'), true);
            
            $venteData = [
                'status' => $input['status'] ?? null,
                'notes' => $input['notes'] ?? null
            ];
            
            $details = $input['details'] ?? null;
            
            // Filtrer les valeurs nulles
            $venteData = array_filter($venteData, function($value) {
                return $value !== null;
            });
            
            $venteModel->updateVente($id, $venteData, $details);
            sendResponse(['success' => true, 'message' => 'Vente mise à jour']);
        }
        
        // DELETE /ventes/{id} - Supprimer une vente
        if ($requestMethod === 'DELETE' && count($segments) === 3) {
            $id = $segments[3];
            $venteModel->delete($id);
            sendResponse(['success' => true, 'message' => 'Vente supprimée']);
        }
    }
    
    // ============================================
    // ROUTES POUR LES COMMANDES
    // ============================================
    if ($segments[1] === 'commandes') {
        checkAuth();
        $commandeModel = new Commande();
        
        // GET /commandes - Liste des commandes
        if ($requestMethod === 'GET' && count($segments) === 2) {
            $filters = [
                'search' => $_GET['search'] ?? '',
                'fournisseur_id' => $_GET['fournisseur_id'] ?? '',
                'status' => $_GET['status'] ?? '',
                'date_achat_debut' => $_GET['date_achat_debut'] ?? '',
                'date_achat_fin' => $_GET['date_achat_fin'] ?? ''
            ];
            $page = $_GET['page'] ?? 1;
            $perPage = $_GET['per_page'] ?? 15;
            
            $result = $commandeModel->getCommandes($filters, $page, $perPage);
            sendResponse($result);
        }
        
        // GET /commandes/{id} - Détails d'une commande
        if ($requestMethod === 'GET' && count($segments) === 3) {
            $id = $segments[3];
            $commande = $commandeModel->getCommandeWithDetails($id);
            
            if ($commande) {
                sendResponse(['success' => true, 'data' => $commande]);
            } else {
                sendResponse(['success' => false, 'message' => 'Commande introuvable'], 404);
            }
        }
        
        // POST /commandes - Créer une commande
        if ($requestMethod === 'POST' && count($segments) === 2) {
            $input = json_decode(file_get_contents('php://input'), true);
            
            $commandeData = [
                'fournisseur_id' => $input['fournisseur_id'],
                'entrepot_id' => $input['entrepot_id'] ?? null,
                'user_id' => $_COOKIE['user_id'] ?? 1,
                'date_commande' => $input['date_commande'] ?? date('Y-m-d'),
                'date_livraison_prevue' => $input['date_livraison_prevue'] ?? null,
                'status' => $input['status'] ?? 'brouillon',
                'remise' => $input['remise'] ?? 0,
                'frais_transport' => $input['frais_transport'] ?? 0,
                'notes' => $input['notes'] ?? null
            ];
            
            $details = $input['details'] ?? [];
            
            $commandeId = $commandeModel->createCommande($commandeData, $details);
            sendResponse(['success' => true, 'data' => ['id' => $commandeId]], 201);
        }
        
        // PUT /commandes/{id} - Mettre à jour une commande
        if ($requestMethod === 'PUT' && count($segments) === 3) {
            $id = $segments[3];
            $input = json_decode(file_get_contents('php://input'), true);
            
            $commandeData = [
                'status' => $input['status'] ?? null,
                'notes' => $input['notes'] ?? null
            ];
            
            $details = $input['details'] ?? null;
            
            // Filtrer les valeurs nulles
            $commandeData = array_filter($commandeData, function($value) {
                return $value !== null;
            });
            
            $commandeModel->updateCommande($id, $commandeData, $details);
            sendResponse(['success' => true, 'message' => 'Commande mise à jour']);
        }
    }
    
    // ============================================
    // ROUTES POUR LES MOUVEMENTS DE STOCK
    // ============================================
    if ($segments[1] === 'stock-movements') {
        checkAuth();
        $movementModel = new StockMovement();
        
        // GET /stock-movements - Liste des mouvements
        if ($requestMethod === 'GET' && count($segments) === 2) {
            $filters = [
                'search' => $_GET['search'] ?? '',
                'movement_type_id' => $_GET['movement_type_id'] ?? '',
                'statut' => $_GET['statut'] ?? '',
                'entrepot_from_id' => $_GET['entrepot_from_id'] ?? '',
                'entrepot_to_id' => $_GET['entrepot_to_id'] ?? '',
                'date_from' => $_GET['date_from'] ?? '',
                'date_to' => $_GET['date_to'] ?? ''
            ];
            $page = $_GET['page'] ?? 1;
            $perPage = $_GET['per_page'] ?? 15;
            
            $result = $movementModel->getMovements($filters, $page, $perPage);
            sendResponse(['success' => true, 'data' => $result]);
        }
        
        // GET /stock-movements/{id} - Détails d'un mouvement
        if ($requestMethod === 'GET' && count($segments) === 3) {
            $id = $segments[3];
            $movement = $movementModel->getMovementWithDetails($id);
            
            if ($movement) {
                sendResponse(['success' => true, 'data' => $movement]);
            } else {
                sendResponse(['success' => false, 'message' => 'Mouvement introuvable'], 404);
            }
        }
        
        // POST /stock-movements - Créer un mouvement
        if ($requestMethod === 'POST' && count($segments) === 2) {
            $input = json_decode(file_get_contents('php://input'), true);
            
            $movementData = [
                'numero' => $movementModel->generateMovementNumber($input['movement_type_code'] ?? 'MOV'),
                'movement_type_id' => $input['movement_type_id'],
                'entrepot_from_id' => $input['entrepot_from_id'] ?? null,
                'entrepot_to_id' => $input['entrepot_to_id'] ?? null,
                'fournisseur_id' => $input['fournisseur_id'] ?? null,
                'client_id' => $input['client_id'] ?? null,
                'user_id' => $_COOKIE['user_id'] ?? 1,
                'date_mouvement' => $input['date_mouvement'] ?? date('Y-m-d'),
                'statut' => 'brouillon',
                'note' => $input['note'] ?? null
            ];
            
            $details = $input['details'] ?? [];
            
            $movementId = $movementModel->createMovement($movementData, $details);
            
            // Valider automatiquement si demandé
            if (isset($input['auto_validate']) && $input['auto_validate']) {
                $movementModel->validateMovement($movementId, $_COOKIE['user_id'] ?? 1);
            }
            
            sendResponse(['success' => true, 'data' => ['id' => $movementId]], 201);
        }
        
        // POST /stock-movements/{id}/validate - Valider un mouvement
        if ($requestMethod === 'POST' && count($segments) === 4 && $segments[4] === 'validate') {
            $id = $segments[3];
            $movementModel->validateMovement($id, $_COOKIE['user_id'] ?? 1);
            sendResponse(['success' => true, 'message' => 'Mouvement validé']);
        }
    }
    
    // ============================================
    // ROUTES POUR LES STOCKS
    // ============================================
    if ($segments[1] === 'stocks') {
        checkAuth();
        $stockModel = new Stock();
        
        // GET /stocks - Liste des stocks
        if ($requestMethod === 'GET' && count($segments) === 2) {
            $filters = [
                'entrepot_id' => $_GET['entrepot_id'] ?? '',
                'product_id' => $_GET['product_id'] ?? '',
                'alert_only' => isset($_GET['alert_only']) ? true : false
            ];
            
            $stocks = $stockModel->getAllStocksWithDetails($filters);
            sendResponse(['success' => true, 'data' => $stocks]);
        }
        
        // GET /stocks/alerts - Produits en alerte
        if ($requestMethod === 'GET' && count($segments) === 3 && $segments[3] === 'alerts') {
            $lowStock = $stockModel->getLowStockProducts();
            $outOfStock = $stockModel->getOutOfStockProducts();
            
            sendResponse([
                'success' => true,
                'data' => [
                    'low_stock' => $lowStock,
                    'out_of_stock' => $outOfStock
                ]
            ]);
        }
    }
    
    // ============================================
    // ROUTES POUR LES CLIENTS
    // ============================================
    if ($segments[1] === 'clients') {
        checkAuth();
        $clientModel = new Client();
        
        // GET /clients - Liste des clients
        if ($requestMethod === 'GET' && count($segments) === 2) {
            $filters = [
                'search' => $_GET['search'] ?? '',
                'type' => $_GET['type'] ?? '',
                'is_active' => $_GET['is_active'] ?? null
            ];
            $page = $_GET['page'] ?? 1;
            $perPage = $_GET['per_page'] ?? 15;
            
            $result = $clientModel->getClients($filters, $page, $perPage);
            sendResponse(['success' => true, 'data' => $result]);
        }
        
        // POST /clients - Créer un client
        if ($requestMethod === 'POST' && count($segments) === 2) {
            $data = json_decode(file_get_contents('php://input'), true);
            
            if (!isset($data['code']) || empty($data['code'])) {
                $data['code'] = $clientModel->generateClientCode();
            }
            
            $clientId = $clientModel->create($data);
            sendResponse(['success' => true, 'data' => ['id' => $clientId]], 201);
        }
    }
    
    // ============================================
    // ROUTES POUR LES FOURNISSEURS
    // ============================================
    if ($segments[1] === 'fournisseurs') {
        checkAuth();
        $fournisseurModel = new Fournisseur();
        
        // GET /fournisseurs - Liste des fournisseurs
        if ($requestMethod === 'GET' && count($segments) === 2) {
            $filters = [
                'search' => $_GET['search'] ?? '',
                'type' => $_GET['type'] ?? '',
                'is_active' => $_GET['is_active'] ?? null
            ];
            $page = $_GET['page'] ?? 1;
            $perPage = $_GET['per_page'] ?? 15;
            
            $result = $fournisseurModel->getFournisseurs($filters, $page, $perPage);
            sendResponse(['success' => true, 'data' => $result]);
        }
        
        // POST /fournisseurs - Créer un fournisseur
        if ($requestMethod === 'POST' && count($segments) === 2) {
            $data = json_decode(file_get_contents('php://input'), true);
            
            if (!isset($data['code']) || empty($data['code'])) {
                $data['code'] = $fournisseurModel->generateFournisseurCode();
            }
            
            $fournisseurId = $fournisseurModel->create($data);
            sendResponse(['success' => true, 'data' => ['id' => $fournisseurId]], 201);
        }
    }
    
    // ============================================
    // ROUTES POUR LES ENTREPÔTS
    // ============================================
    if ($segments[1] === 'entrepots') {
        checkAuth();
        $entrepotModel = new Entrepot();
        
        // GET /entrepots - Liste des entrepôts
        if ($requestMethod === 'GET' && count($segments) === 2) {
            $filters = [
                'search' => $_GET['search'] ?? '',
                'type' => $_GET['type'] ?? '',
                'is_active' => $_GET['is_active'] ?? null
            ];
            $page = $_GET['page'] ?? 1;
            $perPage = $_GET['per_page'] ?? 15;
            
            $result = $entrepotModel->getEntrepots($filters, $page, $perPage);
            sendResponse(['success' => true, 'data' => $result]);
        }
    }
    
    // Route non trouvée
    sendResponse(['success' => false, 'message' => 'Route non trouvée'], 404);
    
} catch (Exception $e) {
    handleError($e);
}

?>
