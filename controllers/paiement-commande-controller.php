<?php

class PaiementCommandeController
{
    private $apiBaseUrl = 'https://toure.gestiem.com/api';

    public function index()
    {
        $page = $_GET['page'] ?? 1;
        $perPage = $_GET['per_page'] ?? 15;
        $search = $_GET['search'] ?? '';
        $commandeId = $_GET['commande_id'] ?? '';
        $statut = $_GET['statut'] ?? '';
        $modePaiement = $_GET['mode_paiement'] ?? '';
        $dateDebut = $_GET['date_debut'] ?? '';
        $dateFin = $_GET['date_fin'] ?? '';
        $montantMin = $_GET['montant_min'] ?? '';
        $montantMax = $_GET['montant_max'] ?? '';

        $accessToken = $_COOKIE['access_token'] ?? '';

        if (!$accessToken) {
            header('Location: /auth/login');
            exit;
        }

        // Construire les paramètres de requête
        $queryParams = [
            'page' => $page,
            'per_page' => $perPage
        ];

        if ($search) $queryParams['search'] = $search;
        if ($commandeId) $queryParams['commande_id'] = $commandeId;
        if ($statut) $queryParams['statut'] = $statut;
        if ($modePaiement) $queryParams['mode_paiement'] = $modePaiement;
        if ($dateDebut) $queryParams['date_debut'] = $dateDebut;
        if ($dateFin) $queryParams['date_fin'] = $dateFin;
        if ($montantMin) $queryParams['montant_min'] = $montantMin;
        if ($montantMax) $queryParams['montant_max'] = $montantMax;

        $url = $this->apiBaseUrl . '/paiement-commandes?' . http_build_query($queryParams);

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

        $data = json_decode($response, true);

        if ($httpCode === 200 && isset($data['success']) && $data['success']) {
            $paiements = $data['data']['data'] ?? [];
            $pagination = [
                'current_page' => $data['data']['current_page'] ?? 1,
                'last_page' => $data['data']['last_page'] ?? 1,
                'per_page' => $data['data']['per_page'] ?? 15,
                'total' => $data['data']['total'] ?? 0,
                'from' => $data['data']['from'] ?? 0,
                'to' => $data['data']['to'] ?? 0
            ];
        } else {
            $paiements = [];
            $pagination = [
                'current_page' => 1,
                'last_page' => 1,
                'per_page' => 15,
                'total' => 0,
                'from' => 0,
                'to' => 0
            ];
        }

        // Charger les commandes pour le filtre
        $commandes = $this->getCommandesList($accessToken);

        ob_start();
        include './views/paiement-commande/liste.php';
        $content = ob_get_clean();
        require './views/layouts/app-layout.php';
    }

    public function creer()
    {
        $accessToken = $_COOKIE['access_token'] ?? '';

        if (!$accessToken) {
            header('Location: /auth/login');
            exit;
        }

        // Si c'est une requête POST, traiter la création
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->traiterCreationPaiement($accessToken);
            return;
        }

        // Charger les commandes pour le formulaire
        $commandes = $this->getCommandesList($accessToken);

        ob_start();
        include './views/paiement-commande/creer.php';
        $content = ob_get_clean();
        require './views/layouts/app-layout.php';
    }

    private function traiterCreationPaiement($accessToken)
    {
        $data = [
            'commande_id' => $_POST['commande_id'],
            'montant' => $_POST['montant'],
            'mode_paiement' => $_POST['mode_paiement'],
            'statut' => $_POST['statut'] ?? 'en_attente',
            'date_paiement' => $_POST['date_paiement']
        ];

        // Champs optionnels
        if (!empty($_POST['numero_transaction'])) {
            $data['numero_transaction'] = $_POST['numero_transaction'];
        }
        if (!empty($_POST['numero_cheque'])) {
            $data['numero_cheque'] = $_POST['numero_cheque'];
        }
        if (!empty($_POST['banque'])) {
            $data['banque'] = $_POST['banque'];
        }
        if (!empty($_POST['note'])) {
            $data['note'] = $_POST['note'];
        }

        $url = $this->apiBaseUrl . '/paiement-commandes';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
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
            header('Location: /paiement-commande?success=1');
            exit;
        } else {
            // Erreur - rediriger avec message d'erreur
            $errorData = json_decode($response, true);
            $errorMessage = $errorData['message'] ?? 'Erreur lors de la création du paiement';
            header('Location: /paiement-commande/creer?error=' . urlencode($errorMessage));
            exit;
        }
    }

    public function details($paiementId)
    {
        $accessToken = $_COOKIE['access_token'] ?? '';

        if (!$accessToken) {
            header('Location: /auth/login');
            exit;
        }

        $url = $this->apiBaseUrl . '/paiement-commandes/' . $paiementId;

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

        $data = json_decode($response, true);

        if ($httpCode === 200 && isset($data['success']) && $data['success']) {
            $paiement = $data['data'];
        } else {
            $paiement = null;
        }

        ob_start();
        include './views/paiement-commande/details.php';
        $content = ob_get_clean();
        require './views/layouts/app-layout.php';
    }

    public function modifier($paiementId)
    {
        $accessToken = $_COOKIE['access_token'] ?? '';

        if (!$accessToken) {
            header('Location: /auth/login');
            exit;
        }

        // Si c'est une requête POST, traiter la modification
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->traiterModificationPaiement($accessToken, $paiementId);
            return;
        }

        // Charger les données du paiement
        $url = $this->apiBaseUrl . '/paiement-commandes/' . $paiementId;

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

        $data = json_decode($response, true);

        if ($httpCode === 200 && isset($data['success']) && $data['success']) {
            $paiement = $data['data'];
        } else {
            $paiement = null;
        }

        ob_start();
        include './views/paiement-commande/modifier.php';
        $content = ob_get_clean();
        require './views/layouts/app-layout.php';
    }

    private function traiterModificationPaiement($accessToken, $paiementId)
    {
        $data = [
            'montant' => $_POST['montant'],
            'mode_paiement' => $_POST['mode_paiement'],
            'statut' => $_POST['statut'],
            'date_paiement' => $_POST['date_paiement']
        ];

        // Champs optionnels
        if (!empty($_POST['numero_transaction'])) {
            $data['numero_transaction'] = $_POST['numero_transaction'];
        }
        if (!empty($_POST['numero_cheque'])) {
            $data['numero_cheque'] = $_POST['numero_cheque'];
        }
        if (!empty($_POST['banque'])) {
            $data['banque'] = $_POST['banque'];
        }
        if (!empty($_POST['note'])) {
            $data['note'] = $_POST['note'];
        }

        $url = $this->apiBaseUrl . '/paiement-commandes/' . $paiementId;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $accessToken,
            'Content-Type: application/json',
            'Accept: application/json'
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode === 200) {
            // Succès - rediriger vers les détails
            header('Location: /paiement-commande/' . $paiementId . '?success=1');
            exit;
        } else {
            // Erreur - rediriger avec message d'erreur
            $errorData = json_decode($response, true);
            $errorMessage = $errorData['message'] ?? 'Erreur lors de la modification du paiement';
            header('Location: /paiement-commande/' . $paiementId . '/modifier?error=' . urlencode($errorMessage));
            exit;
        }
    }

    public function supprimer($paiementId)
    {
        $accessToken = $_COOKIE['access_token'] ?? '';

        if (!$accessToken) {
            header('Location: /auth/login');
            exit;
        }

        $url = $this->apiBaseUrl . '/paiement-commandes/' . $paiementId;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $accessToken,
            'Accept: application/json'
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        // Rediriger vers la liste des paiements
        header('Location: /paiement-commande');
        exit;
    }

    public function commandePaiements($commandeId)
    {
        $accessToken = $_COOKIE['access_token'] ?? '';

        if (!$accessToken) {
            header('Location: /auth/login');
            exit;
        }

        $url = $this->apiBaseUrl . '/paiement-commandes/commande/' . $commandeId;

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

        $data = json_decode($response, true);

        if ($httpCode === 200 && isset($data['success']) && $data['success']) {
            $commande = $data['data']['commande'] ?? null;
            $paiements = $data['data']['paiements'] ?? [];
        } else {
            $commande = null;
            $paiements = [];
        }

        ob_start();
        include './views/paiement-commande/commande-paiements.php';
        $content = ob_get_clean();
        require './views/layouts/app-layout.php';
    }

    private function getCommandesList($accessToken)
    {
        $url = $this->apiBaseUrl . '/commandes?per_page=100';

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
            return $data['data']['data'] ?? [];
        }

        return [];
    }
}
