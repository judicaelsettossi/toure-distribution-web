<?php

require_once './configs/api-config.php';
require_once './configs/utils.php';

class ClientController
{
    public function addClient()
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;

        if ($connected) {
            $user_id = $_COOKIE['user_id'];
            $firstname = $_COOKIE['firstname'];
            $lastname = $_COOKIE['lastname'];
            $username = $_COOKIE['username'];
            $email = $_COOKIE['email'];
            $is_active = $_COOKIE['is_active'];
            $last_login_at = $_COOKIE['last_login_at'];
            $access_token = $_COOKIE['access_token'];

            require './views/client/add.php';
            exit();
        } else {
            header('Location: /login');
            exit();
        }
    }

    public function listeClient()
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;

        if ($connected) {
            $user_id = $_COOKIE['user_id'];
            $firstname = $_COOKIE['firstname'];
            $lastname = $_COOKIE['lastname'];
            $username = $_COOKIE['username'];
            $email = $_COOKIE['email'];
            $is_active = $_COOKIE['is_active'];
            $last_login_at = $_COOKIE['last_login_at'];
            $access_token = $_COOKIE['access_token'];

            require './views/client/liste.php';
            exit();
        } else {
            header('Location: /login');
            exit();
        }
    }

    public function detailsClient($id)
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

            require './views/client/details.php';
            exit();
        } else {
            header('Location: /login');
            exit();
        }
    }

    public function editClient($id)
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

            require './views/client/edit.php';
            exit();
        } else {
            header('Location: /login');
            exit();
        }
    }

    // API Methods
    public function getClientsList()
    {
        $access_token = $_COOKIE['access_token'] ?? '';
        
        if (empty($access_token)) {
            http_response_code(401);
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Token d\'authentification manquant']);
            return;
        }

        try {
            $apiUrl = 'https://toure.gestiem.com/api/clients';
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer ' . $access_token,
                'Accept: application/json',
                'Content-Type: application/json'
            ]);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_error($ch);
            curl_close($ch);
            
            if ($error) {
                throw new Exception('Erreur cURL: ' . $error);
            }
            
            http_response_code($httpCode);
            header('Content-Type: application/json');
            echo $response;
            
        } catch (Exception $e) {
            http_response_code(500);
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Erreur lors du chargement des clients: ' . $e->getMessage()]);
        }
    }

    public function getClientDetails($id)
    {
        $access_token = $_COOKIE['access_token'] ?? '';
        
        if (empty($access_token)) {
            http_response_code(401);
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Token d\'authentification manquant']);
            return;
        }

        try {
            $apiUrl = 'https://toure.gestiem.com/api/clients/' . $id;
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer ' . $access_token,
                'Accept: application/json',
                'Content-Type: application/json'
            ]);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_error($ch);
            curl_close($ch);
            
            if ($error) {
                throw new Exception('Erreur cURL: ' . $error);
            }
            
            http_response_code($httpCode);
            header('Content-Type: application/json');
            echo $response;
            
        } catch (Exception $e) {
            http_response_code(500);
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Erreur lors du chargement du client: ' . $e->getMessage()]);
        }
    }

    public function createClient()
    {
        $access_token = $_COOKIE['access_token'] ?? '';
        
        if (empty($access_token)) {
            http_response_code(401);
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Token d\'authentification manquant']);
            return;
        }

        try {
            $input = json_decode(file_get_contents('php://input'), true);
            
            $apiUrl = 'https://toure.gestiem.com/api/clients';
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($input));
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer ' . $access_token,
                'Accept: application/json',
                'Content-Type: application/json'
            ]);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_error($ch);
            curl_close($ch);
            
            if ($error) {
                throw new Exception('Erreur cURL: ' . $error);
            }
            
            http_response_code($httpCode);
            header('Content-Type: application/json');
            echo $response;
            
        } catch (Exception $e) {
            http_response_code(500);
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Erreur lors de la création du client: ' . $e->getMessage()]);
        }
    }

    public function updateClient($id)
    {
        $access_token = $_COOKIE['access_token'] ?? '';
        
        if (empty($access_token)) {
            http_response_code(401);
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Token d\'authentification manquant']);
            return;
        }

        try {
            $input = json_decode(file_get_contents('php://input'), true);
            
            $apiUrl = 'https://toure.gestiem.com/api/clients/' . $id;
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($input));
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer ' . $access_token,
                'Accept: application/json',
                'Content-Type: application/json'
            ]);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_error($ch);
            curl_close($ch);
            
            if ($error) {
                throw new Exception('Erreur cURL: ' . $error);
            }
            
            http_response_code($httpCode);
            header('Content-Type: application/json');
            echo $response;
            
        } catch (Exception $e) {
            http_response_code(500);
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Erreur lors de la mise à jour du client: ' . $e->getMessage()]);
        }
    }

    public function deleteClient($id)
    {
        $access_token = $_COOKIE['access_token'] ?? '';
        
        if (empty($access_token)) {
            http_response_code(401);
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Token d\'authentification manquant']);
            return;
        }

        try {
            $apiUrl = 'https://toure.gestiem.com/api/clients/' . $id;
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer ' . $access_token,
                'Accept: application/json',
                'Content-Type: application/json'
            ]);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_error($ch);
            curl_close($ch);
            
            if ($error) {
                throw new Exception('Erreur cURL: ' . $error);
            }
            
            http_response_code($httpCode);
            header('Content-Type: application/json');
            echo $response;
            
        } catch (Exception $e) {
            http_response_code(500);
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Erreur lors de la suppression du client: ' . $e->getMessage()]);
        }
    }
}
