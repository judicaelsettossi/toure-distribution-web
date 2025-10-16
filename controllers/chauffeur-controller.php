<?php

class ChauffeurController
{
    private function checkAuth()
    {
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit();
        }
    }

    // Liste des chauffeurs avec filtres et pagination
    public function listeChauffeurs()
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
            'permis_valide' => $_GET['permis_valide'] ?? ''
        ];

        require './views/chauffeur/liste.php';
        exit();
    }

    // Détails d'un chauffeur
    public function detailsChauffeur($id)
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

        // Passer l'ID du chauffeur à la vue
        $chauffeur_id = $id;

        require './views/chauffeur/details.php';
        exit();
    }

    // Créer un nouveau chauffeur
    public function creerChauffeur()
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

        // Traitement des données POST pour créer un chauffeur
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $chauffeur_data = [
                'name' => $_POST['name'] ?? '',
                'phone' => $_POST['phone'] ?? '',
                'numero_permis' => $_POST['numero_permis'] ?? '',
                'date_expiration_permis' => $_POST['date_expiration_permis'] ?? '',
                'status' => $_POST['status'] ?? 'actif'
            ];

            // Rediriger vers la liste des chauffeurs après création
            header('Location: /chauffeurs?created=1');
            exit();
        }

        require './views/chauffeur/creer.php';
        exit();
    }

    // Modifier un chauffeur
    public function modifierChauffeur($id)
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

        // Traitement des données POST pour mettre à jour un chauffeur
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $chauffeur_data = [
                'name' => $_POST['name'] ?? '',
                'phone' => $_POST['phone'] ?? '',
                'numero_permis' => $_POST['numero_permis'] ?? '',
                'date_expiration_permis' => $_POST['date_expiration_permis'] ?? '',
                'status' => $_POST['status'] ?? 'actif'
            ];

            // Rediriger vers les détails du chauffeur après mise à jour
            header('Location: /chauffeur/' . $id . '?updated=1');
            exit();
        }

        $chauffeur_id = $id;
        require './views/chauffeur/modifier.php';
        exit();
    }

    // Supprimer un chauffeur (soft delete)
    public function supprimerChauffeur($id)
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
            // Rediriger vers la liste des chauffeurs après suppression
            header('Location: /chauffeurs?deleted=1');
            exit();
        }

        $chauffeur_id = $id;
        require './views/chauffeur/supprimer.php';
        exit();
    }

    // Liste des chauffeurs supprimés
    public function chauffeursSupprimes()
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

        require './views/chauffeur/supprimes.php';
        exit();
    }

    // Restaurer un chauffeur supprimé
    public function restaurerChauffeur($id)
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
            // Rediriger vers la liste des chauffeurs après restauration
            header('Location: /chauffeurs?restored=1');
            exit();
        }

        $chauffeur_id = $id;
        require './views/chauffeur/restaurer.php';
        exit();
    }

    // Statistiques des chauffeurs
    public function statistiquesChauffeurs()
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

        require './views/chauffeur/statistiques.php';
        exit();
    }
}
