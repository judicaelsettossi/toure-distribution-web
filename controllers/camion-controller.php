<?php

require_once './configs/utils.php';

class CamionController
{
    public function creerCamion()
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Inclure la vue de création de camion
        ob_start();
        include './views/camion/creer.php';
        $content = ob_get_clean();
        
        // Inclure le layout
        include './views/layouts/app-layout.php';
    }

    public function listeCamions()
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Inclure la vue de liste des camions
        ob_start();
        include './views/camion/liste.php';
        $content = ob_get_clean();
        
        // Inclure le layout
        include './views/layouts/app-layout.php';
    }

    public function camionsSupprimes()
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Inclure la vue des camions supprimés
        ob_start();
        include './views/camion/supprimes.php';
        $content = ob_get_clean();
        
        // Inclure le layout
        include './views/layouts/app-layout.php';
    }

    public function statistiquesCamions()
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Inclure la vue des statistiques des camions
        ob_start();
        include './views/camion/statistiques.php';
        $content = ob_get_clean();
        
        // Inclure le layout
        include './views/layouts/app-layout.php';
    }

    public function detailsCamion()
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Inclure la vue des détails du camion
        ob_start();
        include './views/camion/details.php';
        $content = ob_get_clean();
        
        // Inclure le layout
        include './views/layouts/app-layout.php';
    }

    public function modifierCamion()
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Inclure la vue de modification du camion
        ob_start();
        include './views/camion/edit.php';
        $content = ob_get_clean();
        
        // Inclure le layout
        include './views/layouts/app-layout.php';
    }

    public function supprimerCamion()
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Logique de suppression du camion
        // Redirection vers la liste
        header('Location: /camions');
        exit;
    }

    public function restaurerCamion()
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Logique de restauration du camion
        // Redirection vers la liste
        header('Location: /camions');
        exit;
    }

    // Méthodes API pour les camions
    public function getCamionsList()
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['access_token']) && !isset($_COOKIE['connected'])) {
            http_response_code(401);
            echo json_encode(['success' => false, 'message' => 'Non authentifié']);
            return;
        }

        try {
            $queryParams = $_GET;
            $apiUrl = 'https://toure.gestiem.com/api/camions?' . http_build_query($queryParams);
            
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

    public function getCamionDetails($id)
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['access_token']) && !isset($_COOKIE['connected'])) {
            http_response_code(401);
            echo json_encode(['success' => false, 'message' => 'Non authentifié']);
            return;
        }

        try {
            $apiUrl = 'https://toure.gestiem.com/api/camions/' . $id;
            
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

    public function createCamion()
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['access_token']) && !isset($_COOKIE['connected'])) {
            http_response_code(401);
            echo json_encode(['success' => false, 'message' => 'Non authentifié']);
            return;
        }

        try {
            $input = json_decode(file_get_contents('php://input'), true);
            $apiUrl = 'https://toure.gestiem.com/api/camions';
            
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

    public function updateCamion($id)
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['access_token']) && !isset($_COOKIE['connected'])) {
            http_response_code(401);
            echo json_encode(['success' => false, 'message' => 'Non authentifié']);
            return;
        }

        try {
            $input = json_decode(file_get_contents('php://input'), true);
            $apiUrl = 'https://toure.gestiem.com/api/camions/' . $id;
            
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

    public function deleteCamion($id)
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['access_token']) && !isset($_COOKIE['connected'])) {
            http_response_code(401);
            echo json_encode(['success' => false, 'message' => 'Non authentifié']);
            return;
        }

        try {
            $apiUrl = 'https://toure.gestiem.com/api/camions/' . $id;
            
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
?>