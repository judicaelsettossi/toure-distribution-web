<?php

class StockController
{
    private function checkAuth()
    {
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit();
        }
    }

    // Dashboard principal de gestion de stock
    public function stockEntry()
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

        require './views/stock/entree-sortie.php';
        exit();
    }

    // Liste des mouvements de stock avec pagination et filtrage
    public function stockMovements()
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

        // Récupérer les paramètres de filtrage depuis l'URL
        $filters = [
            'movement_type' => $_GET['movement_type'] ?? '',
            'statut' => $_GET['statut'] ?? '',
            'entrepot_from_id' => $_GET['entrepot_from_id'] ?? '',
            'entrepot_to_id' => $_GET['entrepot_to_id'] ?? '',
            'client_id' => $_GET['client_id'] ?? '',
            'fournisseur_id' => $_GET['fournisseur_id'] ?? '',
            'search' => $_GET['search'] ?? '',
            'date_from' => $_GET['date_from'] ?? '',
            'date_to' => $_GET['date_to'] ?? '',
            'sort_by' => $_GET['sort_by'] ?? 'created_at',
            'sort_order' => $_GET['sort_order'] ?? 'desc',
            'per_page' => $_GET['per_page'] ?? 15,
            'page' => $_GET['page'] ?? 1
        ];

        require './views/stock/mouvements.php';
        exit();
    }

    // Créer un mouvement d'entrée de stock
    public function stockIn()
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

        require './views/stock/entree.php';
        exit();
    }

    // Créer un mouvement de sortie de stock
    public function stockOut()
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

        require './views/stock/sortie.php';
        exit();
    }

    // Gestion des stocks généraux
    public function stockManagement()
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

        require './views/stock/gestion.php';
        exit();
    }

    // Détails d'un mouvement de stock
    public function stockMovementDetails($id)
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

        // Passer l'ID du mouvement à la vue
        $movement_id = $id;

        require './views/stock/details-mouvement.php';
        exit();
    }

    // Types de mouvements de stock
    public function stockMovementTypes()
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

        require './views/stock/types-mouvements.php';
        exit();
    }

    // Créer un nouveau type de mouvement
    public function createMovementType()
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

        require './views/stock/creer-type-mouvement.php';
        exit();
    }

    // Éditer un type de mouvement
    public function editMovementType($id)
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

        require './views/stock/edit-type-mouvement.php';
        exit();
    }

    // Stocks par produit
    public function stockByProduct($productId = null)
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

        require './views/stock/stocks-par-produit.php';
        exit();
    }

    // Stocks par entrepôt
    public function stockByWarehouse($warehouseId = null)
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

        require './views/stock/stocks-par-entrepot.php';
        exit();
    }

    // Ajustement de stock
    public function stockAdjustment()
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

        require './views/stock/ajustement.php';
        exit();
    }

    // Réservation de stock
    public function stockReservation()
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

        require './views/stock/reservation.php';
        exit();
    }

    // Créer un nouveau mouvement de stock (POST)
    public function createStockMovement()
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

        // Traitement des données POST pour créer un mouvement
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $movement_data = [
                'movement_type' => $_POST['movement_type'] ?? '',
                'entrepot_from_id' => $_POST['entrepot_from_id'] ?? null,
                'entrepot_to_id' => $_POST['entrepot_to_id'] ?? null,
                'fournisseur_id' => $_POST['fournisseur_id'] ?? null,
                'client_id' => $_POST['client_id'] ?? null,
                'note' => $_POST['note'] ?? '',
                'details' => json_decode($_POST['details'] ?? '[]', true)
            ];

            // Rediriger vers la liste des mouvements après création
            header('Location: /mouvements-stock?created=1');
            exit();
        }

        require './views/stock/creer-mouvement.php';
        exit();
    }

    // Mettre à jour un mouvement de stock (PUT/PATCH)
    public function updateStockMovement($id)
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

        // Traitement des données PUT/PATCH pour mettre à jour un mouvement
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $movement_data = [
                'movement_type' => $_POST['movement_type'] ?? '',
                'entrepot_from_id' => $_POST['entrepot_from_id'] ?? null,
                'entrepot_to_id' => $_POST['entrepot_to_id'] ?? null,
                'fournisseur_id' => $_POST['fournisseur_id'] ?? null,
                'client_id' => $_POST['client_id'] ?? null,
                'statut' => $_POST['statut'] ?? 'pending',
                'note' => $_POST['note'] ?? '',
                'details' => json_decode($_POST['details'] ?? '[]', true)
            ];

            // Rediriger vers les détails du mouvement après mise à jour
            header('Location: /mouvement-stock/' . $id . '?updated=1');
            exit();
        }

        $movement_id = $id;
        require './views/stock/modifier-mouvement.php';
        exit();
    }

    // Créer un transfert entre entrepôts
    public function createWarehouseTransfer()
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

        // Traitement des données POST pour créer un transfert
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $transfer_data = [
                'movement_type' => 'transfert',
                'entrepot_from_id' => $_POST['entrepot_from_id'] ?? '',
                'entrepot_to_id' => $_POST['entrepot_to_id'] ?? '',
                'note' => $_POST['note'] ?? '',
                'details' => json_decode($_POST['details'] ?? '[]', true)
            ];

            // Rediriger vers la liste des mouvements après création
            header('Location: /mouvements-stock?transfer_created=1');
            exit();
        }

        require './views/stock/transfert-entrepot.php';
        exit();
    }

    // Créer une réception de fournisseur
    public function createSupplierReceipt()
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

        // Traitement des données POST pour créer une réception
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $receipt_data = [
                'movement_type' => 'entrée',
                'fournisseur_id' => $_POST['fournisseur_id'] ?? '',
                'entrepot_to_id' => $_POST['entrepot_to_id'] ?? '',
                'note' => $_POST['note'] ?? '',
                'details' => json_decode($_POST['details'] ?? '[]', true)
            ];

            // Rediriger vers la liste des mouvements après création
            header('Location: /mouvements-stock?receipt_created=1');
            exit();
        }

        require './views/stock/reception-fournisseur.php';
        exit();
    }
}
