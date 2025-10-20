<?php

require_once './configs/utils.php';

class ChauffeurController
{
    public function creerChauffeur()
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Inclure la vue de création de chauffeur
        ob_start();
        include './views/chauffeur/creer.php';
        $content = ob_get_clean();
        
        // Inclure le layout
        include './views/layouts/app-layout.php';
    }

    public function listeChauffeurs()
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Inclure la vue de liste des chauffeurs
        ob_start();
        include './views/chauffeur/liste.php';
        $content = ob_get_clean();
        
        // Inclure le layout
        include './views/layouts/app-layout.php';
    }

    public function chauffeursSupprimes()
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Inclure la vue des chauffeurs supprimés
        ob_start();
        include './views/chauffeur/supprimes.php';
        $content = ob_get_clean();
        
        // Inclure le layout
        include './views/layouts/app-layout.php';
    }

    public function statistiquesChauffeurs()
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Inclure la vue des statistiques des chauffeurs
        ob_start();
        include './views/chauffeur/statistiques.php';
        $content = ob_get_clean();
        
        // Inclure le layout
        include './views/layouts/app-layout.php';
    }

    public function detailsChauffeur($id)
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Inclure la vue de détails du chauffeur
        ob_start();
        include './views/chauffeur/details.php';
        $content = ob_get_clean();
        
        // Inclure le layout
        include './views/layouts/app-layout.php';
    }

    public function modifierChauffeur($id)
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Inclure la vue de modification du chauffeur
        ob_start();
        include './views/chauffeur/edit.php';
        $content = ob_get_clean();
        
        // Inclure le layout
        include './views/layouts/app-layout.php';
    }

    public function supprimerChauffeur($id)
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Inclure la vue de suppression du chauffeur
        ob_start();
        include './views/chauffeur/supprimer.php';
        $content = ob_get_clean();
        
        // Inclure le layout
        include './views/layouts/app-layout.php';
    }

    public function restaurerChauffeur($id)
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Inclure la vue de restauration du chauffeur
        ob_start();
        include './views/chauffeur/restaurer.php';
        $content = ob_get_clean();
        
        // Inclure le layout
        include './views/layouts/app-layout.php';
    }

    // Méthodes API pour les chauffeurs
    public function getChauffeursList()
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['access_token']) && !isset($_COOKIE['connected'])) {
            http_response_code(401);
            echo json_encode(['success' => false, 'message' => 'Non authentifié']);
            return;
        }

        try {
            $queryParams = $_GET;
            $apiUrl = 'https://toure.gestiem.com/api/chauffeurs?' . http_build_query($queryParams);
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer ' . ($_COOKIE['access_token'] ?? ''),
                'Content-Type: application/json',
                'Accept: application/json'
            ]);
            
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            
            http_response_code($httpCode);
            echo $response;
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Erreur serveur: ' . $e->getMessage()]);
        }
    }

    public function getChauffeurDetails($id)
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['access_token']) && !isset($_COOKIE['connected'])) {
            http_response_code(401);
            echo json_encode(['success' => false, 'message' => 'Non authentifié']);
            return;
        }

        try {
            $apiUrl = 'https://toure.gestiem.com/api/chauffeurs/' . $id;
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer ' . ($_COOKIE['access_token'] ?? ''),
                'Content-Type: application/json',
                'Accept: application/json'
            ]);
            
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            
            http_response_code($httpCode);
            echo $response;
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Erreur serveur: ' . $e->getMessage()]);
        }
    }

    public function createChauffeur()
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['access_token']) && !isset($_COOKIE['connected'])) {
            http_response_code(401);
            echo json_encode(['success' => false, 'message' => 'Non authentifié']);
            return;
        }

        try {
            $input = json_decode(file_get_contents('php://input'), true);
            $apiUrl = 'https://toure.gestiem.com/api/chauffeurs';
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($input));
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer ' . ($_COOKIE['access_token'] ?? ''),
                'Content-Type: application/json',
                'Accept: application/json'
            ]);
            
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            
            http_response_code($httpCode);
            echo $response;
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Erreur serveur: ' . $e->getMessage()]);
        }
    }

    public function updateChauffeur($id)
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['access_token']) && !isset($_COOKIE['connected'])) {
            http_response_code(401);
            echo json_encode(['success' => false, 'message' => 'Non authentifié']);
            return;
        }

        try {
            $input = json_decode(file_get_contents('php://input'), true);
            $apiUrl = 'https://toure.gestiem.com/api/chauffeurs/' . $id;
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($input));
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer ' . ($_COOKIE['access_token'] ?? ''),
                'Content-Type: application/json',
                'Accept: application/json'
            ]);
            
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            
            http_response_code($httpCode);
            echo $response;
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Erreur serveur: ' . $e->getMessage()]);
        }
    }

    public function deleteChauffeur($id)
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['access_token']) && !isset($_COOKIE['connected'])) {
            http_response_code(401);
            echo json_encode(['success' => false, 'message' => 'Non authentifié']);
            return;
        }

        try {
            $apiUrl = 'https://toure.gestiem.com/api/chauffeurs/' . $id;
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer ' . ($_COOKIE['access_token'] ?? ''),
                'Content-Type: application/json',
                'Accept: application/json'
            ]);
            
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            
            http_response_code($httpCode);
            echo $response;
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Erreur serveur: ' . $e->getMessage()]);
        }
    }
}