<?php

class CommandeController
{
    private function checkAuth()
    {
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit();
        }
    }

    // Liste des commandes avec filtres et pagination
    public function listeCommandes()
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
            'fournisseur_id' => $_GET['fournisseur_id'] ?? '',
            'date_achat_debut' => $_GET['date_achat_debut'] ?? '',
            'date_achat_fin' => $_GET['date_achat_fin'] ?? '',
            'montant_min' => $_GET['montant_min'] ?? '',
            'montant_max' => $_GET['montant_max'] ?? '',
            'en_retard' => $_GET['en_retard'] ?? ''
        ];

        require './views/commande/liste.php';
        exit();
    }

    // Détails d'une commande
    public function detailsCommande($id)
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

        // Passer l'ID de la commande à la vue
        $commande_id = $id;

        require './views/commande/details.php';
        exit();
    }

    // Créer une nouvelle commande
    public function creerCommande()
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

        // Traitement des données POST pour créer une commande
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->traiterCreationCommande($access_token);
            return;
        }

        // Charger les fournisseurs pour le formulaire
        $fournisseurs = $this->getFournisseursList($access_token);

        require './views/commande/creer.php';
        exit();
    }

    private function traiterCreationCommande($accessToken)
    {
        $commande_data = [
            'fournisseur_id' => $_POST['fournisseur_id'] ?? '',
            'date_achat' => $_POST['date_achat'] ?? '',
            'date_livraison_prevue' => $_POST['date_livraison_prevue'] ?? '',
            'date_livraison_effective' => $_POST['date_livraison_effective'] ?? null,
            'montant' => $_POST['montant'] ?? '',
            'status' => $_POST['status'] ?? 'en_attente',
            'note' => $_POST['note'] ?? ''
        ];

        $url = 'https://toure.gestiem.com/api/commandes';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($commande_data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $accessToken,
            'Content-Type: application/json',
            'Accept: application/json'
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode === 201) {
            // Succès - rediriger vers la liste
            header('Location: /commandes?success=1');
            exit;
        } else {
            // Erreur - rediriger avec message d'erreur
            $errorData = json_decode($response, true);
            $errorMessage = $errorData['message'] ?? 'Erreur lors de la création de la commande';
            header('Location: /commande/creer?error=' . urlencode($errorMessage));
            exit;
        }
    }

    private function getFournisseursList($accessToken)
    {
        $url = 'https://toure.gestiem.com/api/fournisseurs?per_page=100';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $accessToken,
            'Accept: application/json'
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode === 200) {
            $data = json_decode($response, true);
            if (isset($data['success']) && $data['success']) {
                return $data['data']['data'] ?? $data['data'] ?? [];
            }
        }

        return [];
    }

    // Modifier une commande
    public function modifierCommande($id)
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

        // Traitement des données POST pour mettre à jour une commande
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $commande_data = [
                'fournisseur_id' => $_POST['fournisseur_id'] ?? '',
                'date_achat' => $_POST['date_achat'] ?? '',
                'date_livraison_prevue' => $_POST['date_livraison_prevue'] ?? '',
                'date_livraison_effective' => $_POST['date_livraison_effective'] ?? null,
                'montant' => $_POST['montant'] ?? '',
                'status' => $_POST['status'] ?? 'en_attente',
                'note' => $_POST['note'] ?? ''
            ];

            // Rediriger vers les détails de la commande après mise à jour
            header('Location: /commande/' . $id . '?updated=1');
            exit();
        }

        $commande_id = $id;
        require './views/commande/modifier.php';
        exit();
    }

    // Supprimer une commande (soft delete)
    public function supprimerCommande($id)
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
            // Rediriger vers la liste des commandes après suppression
            header('Location: /commandes?deleted=1');
            exit();
        }

        $commande_id = $id;
        require './views/commande/supprimer.php';
        exit();
    }

    // Liste des commandes supprimées
    public function commandesSupprimees()
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

        require './views/commande/supprimees.php';
        exit();
    }

    // Restaurer une commande supprimée
    public function restaurerCommande($id)
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
            // Rediriger vers la liste des commandes après restauration
            header('Location: /commandes?restored=1');
            exit();
        }

        $commande_id = $id;
        require './views/commande/restaurer.php';
        exit();
    }

    // Statistiques des commandes
    public function statistiquesCommandes()
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

        require './views/commande/statistiques.php';
        exit();
    }

    // Gestion des détails de commande
    public function detailsCommandeItems($id)
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

        $commande_id = $id;
        require './views/commande/items.php';
        exit();
    }

    // Ajouter un détail de commande
    public function ajouterDetailCommande($id)
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

        // Traitement des données POST pour ajouter un détail
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $detail_data = [
                'product_id' => $_POST['product_id'] ?? '',
                'quantite' => $_POST['quantite'] ?? '',
                'prix_unitaire' => $_POST['prix_unitaire'] ?? ''
            ];

            // Rediriger vers les détails de la commande après ajout
            header('Location: /commande/' . $id . '/items?added=1');
            exit();
        }

        $commande_id = $id;
        require './views/commande/ajouter-item.php';
        exit();
    }

    // Modifier un détail de commande
    public function modifierDetailCommande($commande_id, $detail_id)
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

        // Traitement des données POST pour mettre à jour un détail
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $detail_data = [
                'quantite' => $_POST['quantite'] ?? '',
                'prix_unitaire' => $_POST['prix_unitaire'] ?? ''
            ];

            // Rediriger vers les détails de la commande après mise à jour
            header('Location: /commande/' . $commande_id . '/items?updated=1');
            exit();
        }

        $commande_id = $commande_id;
        $detail_id = $detail_id;
        require './views/commande/modifier-item.php';
        exit();
    }

    // Supprimer un détail de commande
    public function supprimerDetailCommande($commande_id, $detail_id)
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
            // Rediriger vers les détails de la commande après suppression
            header('Location: /commande/' . $commande_id . '/items?deleted=1');
            exit();
        }

        $commande_id = $commande_id;
        $detail_id = $detail_id;
        require './views/commande/supprimer-item.php';
        exit();
    }
}
