<?php

/**
 * Contrôleur des ventes utilisant la base de données locale
 * Ce contrôleur remplace les appels API par des requêtes directes à la base
 */

require_once __DIR__ . '/../configs/database-config.php';
require_once __DIR__ . '/../models/Vente.php';
require_once __DIR__ . '/../models/Client.php';
require_once __DIR__ . '/../models/Entrepot.php';
require_once __DIR__ . '/../models/Product.php';

class DbVenteController
{
    private $venteModel;
    private $clientModel;
    private $entrepotModel;
    private $productModel;
    
    public function __construct() {
        $this->venteModel = new Vente();
        $this->clientModel = new Client();
        $this->entrepotModel = new Entrepot();
        $this->productModel = new Product();
    }
    
    private function checkAuth()
    {
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit();
        }
    }
    
    // ============================================
    // MÉTHODES POUR LES PAGES WEB
    // ============================================
    
    /**
     * Page liste des ventes
     */
    public function index()
    {
        $this->checkAuth();
        
        $user_id = $_COOKIE['user_id'];
        $firstname = $_COOKIE['firstname'];
        $lastname = $_COOKIE['lastname'];
        $username = $_COOKIE['username'];
        $email = $_COOKIE['email'];
        $is_active = $_COOKIE['is_active'];
        $last_login_at = $_COOKIE['last_login_at'] ?? null;
        $access_token = $_COOKIE['access_token'];
        
        ob_start();
        include './views/vente/liste.php';
        $content = ob_get_clean();
        include './views/layouts/app-layout.php';
    }
    
    /**
     * Page créer une vente
     */
    public function create()
    {
        $this->checkAuth();
        
        $user_id = $_COOKIE['user_id'];
        $firstname = $_COOKIE['firstname'];
        $lastname = $_COOKIE['lastname'];
        $username = $_COOKIE['username'];
        $email = $_COOKIE['email'];
        $is_active = $_COOKIE['is_active'];
        $last_login_at = $_COOKIE['last_login_at'] ?? null;
        $access_token = $_COOKIE['access_token'];
        
        ob_start();
        include './views/vente/creer.php';
        $content = ob_get_clean();
        include './views/layouts/app-layout.php';
    }
    
    /**
     * Page détails d'une vente
     */
    public function show($id)
    {
        $this->checkAuth();
        
        $user_id = $_COOKIE['user_id'];
        $firstname = $_COOKIE['firstname'];
        $lastname = $_COOKIE['lastname'];
        $username = $_COOKIE['username'];
        $email = $_COOKIE['email'];
        $is_active = $_COOKIE['is_active'];
        $last_login_at = $_COOKIE['last_login_at'] ?? null;
        $access_token = $_COOKIE['access_token'];
        
        ob_start();
        include './views/vente/details.php';
        $content = ob_get_clean();
        include './views/layouts/app-layout.php';
    }
    
    /**
     * Page modifier une vente
     */
    public function edit($id)
    {
        $this->checkAuth();
        
        $user_id = $_COOKIE['user_id'];
        $firstname = $_COOKIE['firstname'];
        $lastname = $_COOKIE['lastname'];
        $username = $_COOKIE['username'];
        $email = $_COOKIE['email'];
        $is_active = $_COOKIE['is_active'];
        $last_login_at = $_COOKIE['last_login_at'] ?? null;
        $access_token = $_COOKIE['access_token'];
        
        include './views/vente/modifier.php';
    }
    
    // ============================================
    // MÉTHODES API (JSON)
    // ============================================
    
    /**
     * API: Liste des ventes
     * GET /api/db-ventes
     */
    public function getVentesList()
    {
        $this->checkAuth();
        
        try {
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
            
            $result = $this->venteModel->getVentes($filters, $page, $perPage);
            
            http_response_code(200);
            header('Content-Type: application/json');
            echo json_encode($result);
            
        } catch (Exception $e) {
            http_response_code(500);
            header('Content-Type: application/json');
            echo json_encode([
                'success' => false,
                'message' => 'Erreur serveur: ' . $e->getMessage()
            ]);
        }
    }
    
    /**
     * API: Créer une vente
     * POST /api/db-ventes
     */
    public function createVente()
    {
        $this->checkAuth();
        
        try {
            $input = json_decode(file_get_contents('php://input'), true);
            
            if (!$input) {
                http_response_code(400);
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'message' => 'Données JSON invalides']);
                exit();
            }
            
            // Préparer les données de la vente
            $venteData = [
                'client_id' => $input['client_id'] ?? null,
                'entrepot_id' => $input['entrepot_id'] ?? 1,
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
            
            // Créer la vente
            $venteId = $this->venteModel->createVente($venteData, $details);
            
            http_response_code(201);
            header('Content-Type: application/json');
            echo json_encode([
                'success' => true,
                'message' => 'Vente créée avec succès',
                'data' => ['id' => $venteId]
            ]);
            
        } catch (Exception $e) {
            http_response_code(500);
            header('Content-Type: application/json');
            echo json_encode([
                'success' => false,
                'message' => 'Erreur serveur: ' . $e->getMessage()
            ]);
        }
    }
    
    /**
     * API: Détails d'une vente
     * GET /api/db-ventes/{id}
     */
    public function getVenteDetails($id)
    {
        $this->checkAuth();
        
        try {
            $vente = $this->venteModel->getVenteWithDetails($id);
            
            if (!$vente) {
                http_response_code(404);
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'message' => 'Vente introuvable']);
                exit();
            }
            
            http_response_code(200);
            header('Content-Type: application/json');
            echo json_encode([
                'success' => true,
                'data' => $vente
            ]);
            
        } catch (Exception $e) {
            http_response_code(500);
            header('Content-Type: application/json');
            echo json_encode([
                'success' => false,
                'message' => 'Erreur serveur: ' . $e->getMessage()
            ]);
        }
    }
    
    /**
     * API: Mettre à jour une vente
     * PUT /api/db-ventes/{id}
     */
    public function updateVente($id)
    {
        $this->checkAuth();
        
        try {
            $input = json_decode(file_get_contents('php://input'), true);
            
            if (!$input) {
                http_response_code(400);
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'message' => 'Données JSON invalides']);
                exit();
            }
            
            // Préparer les données à mettre à jour
            $venteData = [];
            if (isset($input['status'])) $venteData['status'] = $input['status'];
            if (isset($input['notes'])) $venteData['notes'] = $input['notes'];
            if (isset($input['date_livraison'])) $venteData['date_livraison'] = $input['date_livraison'];
            
            $details = $input['details'] ?? null;
            
            // Mettre à jour la vente
            $this->venteModel->updateVente($id, $venteData, $details);
            
            http_response_code(200);
            header('Content-Type: application/json');
            echo json_encode([
                'success' => true,
                'message' => 'Vente mise à jour avec succès'
            ]);
            
        } catch (Exception $e) {
            http_response_code(500);
            header('Content-Type: application/json');
            echo json_encode([
                'success' => false,
                'message' => 'Erreur serveur: ' . $e->getMessage()
            ]);
        }
    }
    
    /**
     * API: Supprimer une vente
     * DELETE /api/db-ventes/{id}
     */
    public function deleteVente($id)
    {
        $this->checkAuth();
        
        try {
            $this->venteModel->delete($id);
            
            http_response_code(200);
            header('Content-Type: application/json');
            echo json_encode([
                'success' => true,
                'message' => 'Vente supprimée avec succès'
            ]);
            
        } catch (Exception $e) {
            http_response_code(500);
            header('Content-Type: application/json');
            echo json_encode([
                'success' => false,
                'message' => 'Erreur serveur: ' . $e->getMessage()
            ]);
        }
    }
    
    /**
     * API: Ajouter un paiement à une vente
     * POST /api/db-ventes/{id}/paiement
     */
    public function addPaiement($id)
    {
        $this->checkAuth();
        
        try {
            $input = json_decode(file_get_contents('php://input'), true);
            
            if (!$input) {
                http_response_code(400);
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'message' => 'Données JSON invalides']);
                exit();
            }
            
            $paiementData = [
                'date_paiement' => $input['date_paiement'] ?? date('Y-m-d'),
                'montant' => $input['montant'],
                'mode_paiement' => $input['mode_paiement'] ?? 'especes',
                'reference' => $input['reference'] ?? null,
                'notes' => $input['notes'] ?? null,
                'user_id' => $_COOKIE['user_id'] ?? 1
            ];
            
            $this->venteModel->addPaiement($id, $paiementData);
            
            http_response_code(201);
            header('Content-Type: application/json');
            echo json_encode([
                'success' => true,
                'message' => 'Paiement ajouté avec succès'
            ]);
            
        } catch (Exception $e) {
            http_response_code(500);
            header('Content-Type: application/json');
            echo json_encode([
                'success' => false,
                'message' => 'Erreur serveur: ' . $e->getMessage()
            ]);
        }
    }
    
    /**
     * API: Récupérer les détails d'une vente (compatibilité avec ancien code)
     * GET /api/db-detail-ventes/vente/{venteId}
     */
    public function getVenteDetailsItems($venteId)
    {
        $this->checkAuth();
        
        try {
            $vente = $this->venteModel->getVenteWithDetails($venteId);
            
            if (!$vente) {
                http_response_code(404);
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'message' => 'Vente introuvable']);
                exit();
            }
            
            http_response_code(200);
            header('Content-Type: application/json');
            echo json_encode([
                'success' => true,
                'data' => [
                    'details' => $vente['details'] ?? []
                ]
            ]);
            
        } catch (Exception $e) {
            http_response_code(500);
            header('Content-Type: application/json');
            echo json_encode([
                'success' => false,
                'message' => 'Erreur serveur: ' . $e->getMessage()
            ]);
        }
    }
}

?>
