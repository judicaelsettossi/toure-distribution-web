<?php

require_once './configs/api-config.php';
require_once './configs/utils.php';

class EntrepotController
{
    public function addEntrepot()
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

            require './views/entrepot/create.php';
            exit();
        } else {
            header('Location: /login');
            exit();
        }
    }

    public function listeEntrepot()
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

            require './views/entrepot/liste.php';
            exit();
        } else {
            header('Location: /login');
            exit();
        }
    }

    public function detailsEntrepot($id)
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

            require './views/entrepot/details.php';
            exit();
        } else {
            header('Location: /login');
            exit();
        }
    }

    public function editEntrepot($id)
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

            require './views/entrepot/edit.php';
            exit();
        }else 
        {
            header('Location: /login');
            exit();
        }
    }

    public function transfertEntrepot()
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

            require './views/entrepot/transfert.php';
            exit();
        } else {
            header('Location: /login');
            exit();
        }
    }

    public function getEntrepotsList()
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
            $apiUrl = 'https://toure.gestiem.com/api/entrepots';
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer ' . $access_token,
                'Content-Type: application/json',
                'Accept: application/json'
            ]);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            
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
            echo json_encode([
                'success' => false, 
                'message' => 'Erreur serveur: ' . $e->getMessage()
            ]);
        }
    }
}
