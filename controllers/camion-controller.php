<?php

class CamionController
{
    private function checkAuth()
    {
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit();
        }
    }

    // Liste des camions avec filtres et pagination
    public function listeCamions()
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
            'page' => $_GET['page'] ?? 1,
            'per_page' => $_GET['per_page'] ?? 15,
            'search' => $_GET['search'] ?? '',
            'status' => $_GET['status'] ?? '',
            'capacite_min' => $_GET['capacite_min'] ?? '',
            'capacite_max' => $_GET['capacite_max'] ?? '',
            'marque' => $_GET['marque'] ?? ''
        ];

        require './views/camion/liste.php';
        exit();
    }

    // Détails d'un camion
    public function detailsCamion($id)
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

        // Passer l'ID du camion à la vue
        $camion_id = $id;

        require './views/camion/details.php';
        exit();
    }

    // Créer un nouveau camion
    public function creerCamion()
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

        // Traitement des données POST pour créer un camion
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $camion_data = [
                'numero_immat' => $_POST['numero_immat'] ?? '',
                'marque' => $_POST['marque'] ?? '',
                'modele' => $_POST['modele'] ?? '',
                'capacite' => $_POST['capacite'] ?? '',
                'status' => $_POST['status'] ?? 'disponible',
                'note' => $_POST['note'] ?? ''
            ];

            // Rediriger vers la liste des camions après création
            header('Location: /camions?created=1');
            exit();
        }

        require './views/camion/creer.php';
        exit();
    }

    // Modifier un camion
    public function modifierCamion($id)
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

        // Traitement des données POST pour mettre à jour un camion
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $camion_data = [
                'numero_immat' => $_POST['numero_immat'] ?? '',
                'marque' => $_POST['marque'] ?? '',
                'modele' => $_POST['modele'] ?? '',
                'capacite' => $_POST['capacite'] ?? '',
                'status' => $_POST['status'] ?? 'disponible',
                'note' => $_POST['note'] ?? ''
            ];

            // Rediriger vers les détails du camion après mise à jour
            header('Location: /camion/' . $id . '?updated=1');
            exit();
        }

        $camion_id = $id;
        require './views/camion/modifier.php';
        exit();
    }

    // Supprimer un camion (soft delete)
    public function supprimerCamion($id)
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

        // Traitement de la suppression
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Logique de suppression via API
            // Rediriger vers la liste des camions après suppression
            header('Location: /camions?deleted=1');
            exit();
        }

        $camion_id = $id;
        require './views/camion/supprimer.php';
        exit();
    }

    // Liste des camions supprimés
    public function camionsSupprimes()
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

        // Récupérer les paramètres de pagination
        $filters = [
            'page' => $_GET['page'] ?? 1,
            'per_page' => $_GET['per_page'] ?? 15
        ];

        require './views/camion/supprimes.php';
        exit();
    }

    // Restaurer un camion supprimé
    public function restaurerCamion($id)
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

        // Traitement de la restauration
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Logique de restauration via API
            // Rediriger vers la liste des camions après restauration
            header('Location: /camions?restored=1');
            exit();
        }

        $camion_id = $id;
        require './views/camion/restaurer.php';
        exit();
    }

    // Statistiques des camions
    public function statistiquesCamions()
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

        require './views/camion/statistiques.php';
        exit();
    }
}
