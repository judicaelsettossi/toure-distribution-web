<?php

class FournisseurController
{
    public function listeFournisseurs()
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;

        if ($connected) {
            $user_id = $_COOKIE['user_id'];
            $firstname = $_COOKIE['firstname'];
            $lastname = $_COOKIE['lastname'];
            $username = $_COOKIE['username'];
            $email = $_COOKIE['email'];
            $is_active = $_COOKIE['is_active'];
            $last_login_at = $_COOKIE['last_login_at'] ?? null;
            $access_token = $_COOKIE['access_token'];

            require './views/fournisseur/liste.php';
            exit();
        } else {
            header('Location: /login');
            exit();
        }
    }

    public function addFournisseur()
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;

        if ($connected) {
            $user_id = $_COOKIE['user_id'];
            $firstname = $_COOKIE['firstname'];
            $lastname = $_COOKIE['lastname'];
            $username = $_COOKIE['username'];
            $email = $_COOKIE['email'];
            $is_active = $_COOKIE['is_active'];
            $last_login_at = $_COOKIE['last_login_at'] ?? null;
            $access_token = $_COOKIE['access_token'];

            require './views/fournisseur/ajouter.php';
            exit();
        } else {
            header('Location: /login');
            exit();
        }
    }

    public function detailsFournisseur($id)
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;

        if ($connected) {
            $user_id = $_COOKIE['user_id'];
            $firstname = $_COOKIE['firstname'];
            $lastname = $_COOKIE['lastname'];
            $username = $_COOKIE['username'];
            $email = $_COOKIE['email'];
            $is_active = $_COOKIE['is_active'];
            $last_login_at = $_COOKIE['last_login_at'] ?? null;
            $access_token = $_COOKIE['access_token'];

            require './views/fournisseur/details.php';
            exit();
        } else {
            header('Location: /login');
            exit();
        }
    }

    public function editFournisseur($id)
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;

        if ($connected) {
            $user_id = $_COOKIE['user_id'];
            $firstname = $_COOKIE['firstname'];
            $lastname = $_COOKIE['lastname'];
            $username = $_COOKIE['username'];
            $email = $_COOKIE['email'];
            $is_active = $_COOKIE['is_active'];
            $last_login_at = $_COOKIE['last_login_at'] ?? null;
            $access_token = $_COOKIE['access_token'];

            require './views/fournisseur/edit.php';
            exit();
        } else {
            header('Location: /login');
            exit();
        }
    }

    // API Methods
    public function getFournisseursList()
    {
        // Vérifier l'authentification via cookies ou headers
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        $access_token = $_COOKIE['access_token'] ?? '';
        
        // Si pas de cookie, vérifier les headers Authorization
        if (!$connected && empty($access_token)) {
            $headers = getallheaders();
            if (isset($headers['Authorization'])) {
                $auth = $headers['Authorization'];
                if (preg_match('/Bearer\s+(.*)$/i', $auth, $matches)) {
                    $access_token = $matches[1];
                    $connected = true;
                }
            }
        }
        
        if (!$connected) {
            http_response_code(401);
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Non authentifié']);
            exit();
        }

        try {
            $page = $_GET['page'] ?? 1;
            $per_page = $_GET['per_page'] ?? 15;
            $search = $_GET['search'] ?? '';

            $url = 'https://toure.gestiem.com/api/fournisseurs?' . http_build_query([
                'page' => $page,
                'per_page' => $per_page,
                'search' => $search
            ]);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
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

    public function getFournisseurDetails($id)
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
            curl_setopt($ch, CURLOPT_URL, 'https://toure.gestiem.com/api/fournisseurs/' . $id);
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

    public function createFournisseur()
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        if (!$connected) {
            http_response_code(401);
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Non authentifié']);
            exit();
        }

        $access_token = $_COOKIE['access_token'] ?? '';
        $input = json_decode(file_get_contents('php://input'), true);

        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://toure.gestiem.com/api/fournisseurs');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($input));
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
                http_response_code($httpCode);
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

    public function updateFournisseur($id)
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        if (!$connected) {
            http_response_code(401);
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Non authentifié']);
            exit();
        }

        $access_token = $_COOKIE['access_token'] ?? '';
        $input = json_decode(file_get_contents('php://input'), true);

        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://toure.gestiem.com/api/fournisseurs/' . $id);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($input));
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
                http_response_code($httpCode);
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

    public function deleteFournisseur($id)
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
            curl_setopt($ch, CURLOPT_URL, 'https://toure.gestiem.com/api/fournisseurs/' . $id);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
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
                http_response_code($httpCode);
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
