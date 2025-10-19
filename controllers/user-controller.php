<?php

require_once './configs/utils.php';

class UserController
{
    public function creerUtilisateur()
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Inclure la vue de création d'utilisateur
        ob_start();
        include './views/user/creer.php';
        $content = ob_get_clean();
        
        // Inclure le layout
        include './views/layouts/app-layout.php';
    }

    public function listeUtilisateurs()
    {
        // Inclure la vue de liste des utilisateurs
        ob_start();
        include './views/user/liste.php';
        $content = ob_get_clean();
        
        // Inclure le layout
        include './views/layouts/app-layout.php';
    }

    public function detailsUtilisateur($id)
    {
        // Inclure la vue de détails de l'utilisateur
        ob_start();
        include './views/user/details.php';
        $content = ob_get_clean();
        
        // Inclure le layout
        include './views/layouts/app-layout.php';
    }

    public function modifierUtilisateur($id)
    {
        // Inclure la vue de modification de l'utilisateur
        ob_start();
        include './views/user/edit.php';
        $content = ob_get_clean();
        
        // Inclure le layout
        include './views/layouts/app-layout.php';
    }

    public function profilUtilisateur()
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Inclure la vue du profil utilisateur
        ob_start();
        include './views/user/profil.php';
        $content = ob_get_clean();
        
        // Inclure le layout
        include './views/layouts/app-layout.php';
    }

    // API Methods for user management
    public function activateUser($id)
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        if (!$connected) {
            http_response_code(401);
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Non authentifié']);
            exit();
        }

        $access_token = $_COOKIE['access_token'] ?? '';

        try {
            $apiUrl = "https://toure.gestiem.com/api/auth/users/{$id}/activate";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer ' . $access_token,
                'Accept: application/json',
                'Content-Type: application/json'
            ]);

            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_error($ch);
            curl_close($ch);

            if ($error) {
                throw new Exception('Erreur cURL: ' . $error);
            }

            if ($httpCode >= 200 && $httpCode < 300) {
                http_response_code(200);
                header('Content-Type: application/json');
                echo $response;
            } else {
                http_response_code($httpCode);
                header('Content-Type: application/json');
                echo $response;
            }

        } catch (Exception $e) {
            http_response_code(500);
            header('Content-Type: application/json');
            echo json_encode([
                'success' => false, 
                'message' => 'Erreur serveur: ' . $e->getMessage()
            ]);
        }
    }

    public function unlockUser($id)
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        if (!$connected) {
            http_response_code(401);
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Non authentifié']);
            exit();
        }

        $access_token = $_COOKIE['access_token'] ?? '';

        try {
            $apiUrl = "https://toure.gestiem.com/api/auth/users/{$id}/unlock";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer ' . $access_token,
                'Accept: application/json',
                'Content-Type: application/json'
            ]);

            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_error($ch);
            curl_close($ch);

            if ($error) {
                throw new Exception('Erreur cURL: ' . $error);
            }

            if ($httpCode >= 200 && $httpCode < 300) {
                http_response_code(200);
                header('Content-Type: application/json');
                echo $response;
            } else {
                http_response_code($httpCode);
                header('Content-Type: application/json');
                echo $response;
            }

        } catch (Exception $e) {
            http_response_code(500);
            header('Content-Type: application/json');
            echo json_encode([
                'success' => false, 
                'message' => 'Erreur serveur: ' . $e->getMessage()
            ]);
        }
    }

    public function updateUser($id)
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        if (!$connected) {
            http_response_code(401);
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Non authentifié']);
            exit();
        }

        $access_token = $_COOKIE['access_token'] ?? '';

        try {
            $input = json_decode(file_get_contents('php://input'), true);
            
            if (!$input) {
                http_response_code(400);
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'message' => 'Données JSON invalides']);
                exit();
            }

            $apiUrl = "https://toure.gestiem.com/api/auth/users/{$id}";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer ' . $access_token,
                'Accept: application/json',
                'Content-Type: application/json'
            ]);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($input));

            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_error($ch);
            curl_close($ch);

            if ($error) {
                throw new Exception('Erreur cURL: ' . $error);
            }

            if ($httpCode >= 200 && $httpCode < 300) {
                http_response_code(200);
                header('Content-Type: application/json');
                echo $response;
            } else {
                http_response_code($httpCode);
                header('Content-Type: application/json');
                echo $response;
            }

        } catch (Exception $e) {
            http_response_code(500);
            header('Content-Type: application/json');
            echo json_encode([
                'success' => false, 
                'message' => 'Erreur serveur: ' . $e->getMessage()
            ]);
        }
    }

    public function getUsersList()
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        if (!$connected) {
            http_response_code(401);
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Non authentifié']);
            exit();
        }

        $access_token = $_COOKIE['access_token'] ?? '';

        // Récupérer les paramètres de requête
        $search = $_GET['search'] ?? '';
        $is_active = $_GET['is_active'] ?? '';
        $poste = $_GET['poste'] ?? '';
        $per_page = $_GET['per_page'] ?? '15';
        $page = $_GET['page'] ?? '1';
        $sort_by = $_GET['sort_by'] ?? 'created_at';
        $sort_order = $_GET['sort_order'] ?? 'desc';

        try {
            // Construire l'URL avec les paramètres
            $apiUrl = "https://toure.gestiem.com/api/auth/users";
            $params = [];
            
            if (!empty($search)) $params['search'] = $search;
            if ($is_active !== '') $params['is_active'] = $is_active;
            if (!empty($poste)) $params['poste'] = $poste;
            if (!empty($per_page)) $params['per_page'] = $per_page;
            if (!empty($page)) $params['page'] = $page;
            if (!empty($sort_by)) $params['sort_by'] = $sort_by;
            if (!empty($sort_order)) $params['sort_order'] = $sort_order;
            
            if (!empty($params)) {
                $apiUrl .= '?' . http_build_query($params);
            }

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer ' . $access_token,
                'Accept: application/json',
                'Content-Type: application/json'
            ]);
            
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_error($ch);
            curl_close($ch);

            if ($error) {
                throw new Exception('Erreur cURL: ' . $error);
            }

            if ($httpCode >= 200 && $httpCode < 300) {
                http_response_code(200);
                header('Content-Type: application/json');
                echo $response;
            } else {
                http_response_code($httpCode);
                header('Content-Type: application/json');
                echo $response;
            }

        } catch (Exception $e) {
            http_response_code(500);
            header('Content-Type: application/json');
            echo json_encode([
                'success' => false, 
                'message' => 'Erreur serveur: ' . $e->getMessage()
            ]);
        }
    }

    public function getUsersStatistics()
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        if (!$connected) {
            http_response_code(401);
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Non authentifié']);
            exit();
        }

        $access_token = $_COOKIE['access_token'] ?? '';

        try {
            $apiUrl = "https://toure.gestiem.com/api/auth/statistics";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer ' . $access_token,
                'Accept: application/json',
                'Content-Type: application/json'
            ]);
            
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_error($ch);
            curl_close($ch);

            if ($error) {
                throw new Exception('Erreur cURL: ' . $error);
            }

            if ($httpCode >= 200 && $httpCode < 300) {
                http_response_code(200);
                header('Content-Type: application/json');
                echo $response;
            } else {
                http_response_code($httpCode);
                header('Content-Type: application/json');
                echo $response;
            }

        } catch (Exception $e) {
            http_response_code(500);
            header('Content-Type: application/json');
            echo json_encode([
                'success' => false, 
                'message' => 'Erreur serveur: ' . $e->getMessage()
            ]);
        }
    }

    public function getUserDetails($id)
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        if (!$connected) {
            http_response_code(401);
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Non authentifié']);
            exit();
        }

        $access_token = $_COOKIE['access_token'] ?? '';

        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://toure.gestiem.com/api/auth/users/' . $id);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer ' . $access_token,
                'Accept: application/json',
                'Content-Type: application/json'
            ]);
            
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_error($ch);
            curl_close($ch);

            if ($error) {
                throw new Exception('Erreur cURL: ' . $error);
            }

            if ($httpCode >= 200 && $httpCode < 300) {
                http_response_code(200);
                header('Content-Type: application/json');
                echo $response;
            } else {
                http_response_code($httpCode);
                header('Content-Type: application/json');
                echo $response;
            }

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
