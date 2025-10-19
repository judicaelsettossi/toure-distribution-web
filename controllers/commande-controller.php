<?php

class CommandeController
{
    public function listeCommandes()
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;

        if ($connected) {
            $user_id = $_COOKIE['user_id'];
            $firstname = $_COOKIE['firstname'];
            $lastname = $_COOKIE['lastname'];
            $username = $_COOKIE['username'];
            $email = $_COOKIE['email'];
            $is_active = $_COOKIE['is_active'];
            $last_login_at = $_COOKIE['last_login_at'] ?? '';
            $access_token = $_COOKIE['access_token'];

            require './views/commande/liste.php';
            exit();
        } else {
            header('Location: /login');
            exit();
        }
    }

    public function creerCommande()
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;

        if ($connected) {
            $user_id = $_COOKIE['user_id'];
            $firstname = $_COOKIE['firstname'];
            $lastname = $_COOKIE['lastname'];
            $username = $_COOKIE['username'];
            $email = $_COOKIE['email'];
            $is_active = $_COOKIE['is_active'];
            $last_login_at = $_COOKIE['last_login_at'] ?? '';
            $access_token = $_COOKIE['access_token'];

            require './views/commande/creer.php';
            exit();
        } else {
            header('Location: /login');
            exit();
        }
    }

    public function detailsCommande($id)
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;

        if ($connected) {
            $user_id = $_COOKIE['user_id'];
            $firstname = $_COOKIE['firstname'];
            $lastname = $_COOKIE['lastname'];
            $username = $_COOKIE['username'];
            $email = $_COOKIE['email'];
            $is_active = $_COOKIE['is_active'];
            $last_login_at = $_COOKIE['last_login_at'] ?? '';
            $access_token = $_COOKIE['access_token'];
            $commande_id = $id;

            require './views/commande/details.php';
            exit();
        } else {
            header('Location: /login');
            exit();
        }
    }

    public function modifierCommande($id)
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;

        if ($connected) {
            $user_id = $_COOKIE['user_id'];
            $firstname = $_COOKIE['firstname'];
            $lastname = $_COOKIE['lastname'];
            $username = $_COOKIE['username'];
            $email = $_COOKIE['email'];
            $is_active = $_COOKIE['is_active'];
            $last_login_at = $_COOKIE['last_login_at'] ?? '';
            $access_token = $_COOKIE['access_token'];
            $commande_id = $id;

            require './views/commande/modifier.php';
            exit();
        } else {
            header('Location: /login');
            exit();
        }
    }

    // API Methods
    public function getCommandesList()
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
            // Récupérer les paramètres de requête
            $page = $_GET['page'] ?? 1;
            $per_page = $_GET['per_page'] ?? 15;
            $search = $_GET['search'] ?? '';
            $status = $_GET['status'] ?? '';
            $fournisseur_id = $_GET['fournisseur_id'] ?? '';
            $date_achat_debut = $_GET['date_achat_debut'] ?? '';
            $date_achat_fin = $_GET['date_achat_fin'] ?? '';
            $montant_min = $_GET['montant_min'] ?? '';
            $montant_max = $_GET['montant_max'] ?? '';
            $en_retard = $_GET['en_retard'] ?? '';

            // Construire l'URL avec les paramètres
            $url = 'https://toure.gestiem.com/api/commandes?' . http_build_query([
                'page' => $page,
                'per_page' => $per_page,
                'search' => $search,
                'status' => $status,
                'fournisseur_id' => $fournisseur_id,
                'date_achat_debut' => $date_achat_debut,
                'date_achat_fin' => $date_achat_fin,
                'montant_min' => $montant_min,
                'montant_max' => $montant_max,
                'en_retard' => $en_retard
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


    public function createCommande()
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
            curl_setopt($ch, CURLOPT_URL, 'https://toure.gestiem.com/api/commandes');
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

    public function updateCommande($id)
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
            curl_setopt($ch, CURLOPT_URL, 'https://toure.gestiem.com/api/commandes/' . $id);
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

    public function deleteCommande($id)
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
            curl_setopt($ch, CURLOPT_URL, 'https://toure.gestiem.com/api/commandes/' . $id);
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

    public function getTrashedCommandes()
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
            $page = $_GET['page'] ?? 1;
            $per_page = $_GET['per_page'] ?? 15;

            $url = 'https://toure.gestiem.com/api/commandes/trashed/list?' . http_build_query([
                'page' => $page,
                'per_page' => $per_page
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

    public function restoreCommande($id)
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
            curl_setopt($ch, CURLOPT_URL, 'https://toure.gestiem.com/api/commandes/' . $id . '/restore');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
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

    // Méthodes pour les détails de commande
    public function getDetailCommandesList()
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
            $page = $_GET['page'] ?? 1;
            $per_page = $_GET['per_page'] ?? 15;
            $commande_id = $_GET['commande_id'] ?? '';
            $product_id = $_GET['product_id'] ?? '';

            $url = 'https://toure.gestiem.com/api/detail-commandes?' . http_build_query([
                'page' => $page,
                'per_page' => $per_page,
                'commande_id' => $commande_id,
                'product_id' => $product_id
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

    public function createDetailCommande()
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
            curl_setopt($ch, CURLOPT_URL, 'https://toure.gestiem.com/api/detail-commandes');
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

    public function getDetailCommande($id)
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
            curl_setopt($ch, CURLOPT_URL, 'https://toure.gestiem.com/api/detail-commandes/' . $id);
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

    public function updateDetailCommande($id)
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
            curl_setopt($ch, CURLOPT_URL, 'https://toure.gestiem.com/api/detail-commandes/' . $id);
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

    public function deleteDetailCommande($id)
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
            curl_setopt($ch, CURLOPT_URL, 'https://toure.gestiem.com/api/detail-commandes/' . $id);
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

    public function getCommandeDetails($id)
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
            $apiUrl = 'https://toure.gestiem.com/api/commandes/' . $id;
            
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

    public function getCommandeDetailsItems($commandeId)
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
            $apiUrl = 'https://toure.gestiem.com/api/detail-commandes/commande/' . $commandeId;
            
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

    public function downloadCommandePDF($id)
    {
        // Vérifier l'authentification via cookies ou headers
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        $access_token = $_COOKIE['access_token'] ?? '';
        
        // Si pas de cookie, vérifier les headers Authorization ou token dans l'URL
        if (!$connected && empty($access_token)) {
            $headers = getallheaders();
            if (isset($headers['Authorization'])) {
                $auth = $headers['Authorization'];
                if (preg_match('/Bearer\s+(.*)$/i', $auth, $matches)) {
                    $access_token = $matches[1];
                    $connected = true;
                }
            } elseif (isset($_GET['token'])) {
                $access_token = $_GET['token'];
                $connected = true;
            }
        }
        
        if (!$connected) {
            http_response_code(401);
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Non authentifié']);
            exit();
        }

        try {
            // Récupérer les détails de la commande
            $commandeUrl = 'https://toure.gestiem.com/api/commandes/' . $id;
            $detailsUrl = 'https://toure.gestiem.com/api/detail-commandes/commande/' . $id;
            
            // Récupérer les informations de la commande
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $commandeUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer ' . $access_token,
                'Accept: application/json',
                'Content-Type: application/json'
            ]);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            
            $commandeResponse = curl_exec($ch);
            $commandeHttpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            
            if ($commandeHttpCode !== 200) {
                throw new Exception('Erreur lors de la récupération des détails de la commande');
            }
            
            $commandeData = json_decode($commandeResponse, true);
            if (!$commandeData['success']) {
                throw new Exception('Données de commande invalides');
            }
            
            // Récupérer les détails des produits
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $detailsUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer ' . $access_token,
                'Accept: application/json',
                'Content-Type: application/json'
            ]);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            
            $detailsResponse = curl_exec($ch);
            $detailsHttpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            
            $detailsData = [];
            if ($detailsHttpCode === 200) {
                $detailsData = json_decode($detailsResponse, true);
            }
            
            // Générer le PDF
            $this->generateCommandePDF($commandeData['data'], $detailsData['data']['details'] ?? []);
            
        } catch (Exception $e) {
            http_response_code(500);
            header('Content-Type: application/json');
            echo json_encode([
                'success' => false, 
                'message' => 'Erreur lors de la génération du PDF: ' . $e->getMessage()
            ]);
        }
    }
    
    private function generateCommandePDF($commande, $details = [])
    {
        // Utiliser directement TCPDF pour générer un vrai PDF
        $this->generatePDFFallback($commande, $details);
    }
    
    private function generatePDFFallback($commande, $details = [])
    {
        // Utiliser TCPDF pour générer un vrai PDF
        require_once 'vendor/autoload.php';
        
        $numero = $commande['numero_commande'] ?? 'N/A';
        $fournisseur = $commande['fournisseur']['name'] ?? 'N/A';
        $dateAchat = isset($commande['date_achat']) ? date('d/m/Y', strtotime($commande['date_achat'])) : 'N/A';
        $montant = number_format($commande['montant'] ?? 0, 0, ',', ' ') . ' F CFA';
        
        // Créer une nouvelle instance TCPDF
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
        // Informations du document
        $pdf->SetCreator('Système de Gestion');
        $pdf->SetAuthor('Système de Gestion');
        $pdf->SetTitle('Bon de Commande - ' . $numero);
        $pdf->SetSubject('Bon de Commande');
        
        // Supprimer l'en-tête et le pied de page par défaut
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        
        // Ajouter une page
        $pdf->AddPage();
        
        // Couleurs
        $pdf->SetTextColor(240, 4, 128); // #f00480
        $pdf->SetFillColor(240, 4, 128);
        
        // Titre principal
        $pdf->SetFont('helvetica', 'B', 20);
        $pdf->Cell(0, 15, 'BON DE COMMANDE', 0, 1, 'C');
        
        // Numéro de commande
        $pdf->SetFont('helvetica', '', 14);
        $pdf->Cell(0, 8, 'Numéro: ' . $numero, 0, 1, 'C');
        
        $pdf->Ln(10);
        
        // Informations de la commande
        $pdf->SetTextColor(1, 7, 104); // #010768
        $pdf->SetFont('helvetica', 'B', 14);
        $pdf->Cell(0, 8, 'INFORMATIONS DE LA COMMANDE', 0, 1, 'L');
        
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('helvetica', '', 12);
        
        $pdf->Cell(60, 6, 'Numéro de Commande:', 0, 0, 'L');
        $pdf->Cell(0, 6, $numero, 0, 1, 'L');
        
        $pdf->Cell(60, 6, 'Fournisseur:', 0, 0, 'L');
        $pdf->Cell(0, 6, $fournisseur, 0, 1, 'L');
        
        $pdf->Cell(60, 6, 'Date d\'Achat:', 0, 0, 'L');
        $pdf->Cell(0, 6, $dateAchat, 0, 1, 'L');
        
        $pdf->Cell(60, 6, 'Statut:', 0, 0, 'L');
        $pdf->Cell(0, 6, ucfirst($commande['status'] ?? 'N/A'), 0, 1, 'L');
        
        $pdf->Ln(10);
        
        // Produits commandés
        $pdf->SetTextColor(1, 7, 104);
        $pdf->SetFont('helvetica', 'B', 14);
        $pdf->Cell(0, 8, 'PRODUITS COMMANDÉS', 0, 1, 'L');
        
        $pdf->Ln(5);
        
        // En-tête du tableau - utiliser une couleur de fond plus claire
        $pdf->SetFillColor(255, 255, 255); // Fond blanc
        $pdf->SetTextColor(0, 0, 0); // Texte noir
        $pdf->SetFont('helvetica', 'B', 10);
        
        // Créer l'en-tête avec fond blanc et texte noir
        $pdf->Cell(80, 8, 'Produit', 1, 0, 'C', true);
        $pdf->Cell(30, 8, 'Code', 1, 0, 'C', true);
        $pdf->Cell(25, 8, 'Quantité', 1, 0, 'C', true);
        $pdf->Cell(30, 8, 'Prix Unitaire', 1, 0, 'C', true);
        $pdf->Cell(30, 8, 'Total', 1, 1, 'C', true);
        
        // Données du tableau
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('helvetica', '', 10);
        $totalGeneral = 0;
        
        foreach ($details as $detail) {
            $produit = $detail['product'] ?? [];
            $nom = $produit['name'] ?? 'Produit inconnu';
            $code = $produit['code'] ?? 'N/A';
            $quantite = $detail['quantite'] ?? 0;
            $prixUnitaire = number_format($detail['prix_unitaire'] ?? 0, 0, ',', ' ') . ' F CFA';
            $sousTotal = number_format($detail['sous_total'] ?? 0, 0, ',', ' ') . ' F CFA';
            $totalGeneral += floatval($detail['sous_total'] ?? 0);
            
            $pdf->Cell(80, 6, $nom, 1, 0, 'L');
            $pdf->Cell(30, 6, $code, 1, 0, 'C');
            $pdf->Cell(25, 6, $quantite, 1, 0, 'C');
            $pdf->Cell(30, 6, $prixUnitaire, 1, 0, 'R');
            $pdf->Cell(30, 6, $sousTotal, 1, 1, 'R');
        }
        
        $pdf->Ln(10);
        
        // Total général
        $pdf->SetTextColor(240, 4, 128);
        $pdf->SetFont('helvetica', 'B', 16);
        $pdf->Cell(0, 8, 'TOTAL GÉNÉRAL: ' . number_format($totalGeneral, 0, ',', ' ') . ' F CFA', 0, 1, 'R');
        
        $pdf->Ln(20);
        
        // Pied de page
        $pdf->SetTextColor(102, 102, 102);
        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(0, 6, 'Document généré le ' . date('d/m/Y à H:i'), 0, 1, 'C');
        $pdf->Cell(0, 6, '© ' . date('Y') . ' - Système de Gestion des Commandes', 0, 1, 'C');
        
        // Headers pour le téléchargement
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="bon-commande-' . $numero . '.pdf"');
        header('Cache-Control: private, max-age=0, must-revalidate');
        header('Pragma: public');
        
        // Générer et envoyer le PDF
        $pdf->Output('bon-commande-' . $numero . '.pdf', 'D');
    }
    
    private function getCommandePDFHTML($commande, $details)
    {
        $numero = $commande['numero_commande'] ?? 'N/A';
        $fournisseur = $commande['fournisseur']['name'] ?? 'N/A';
        $dateAchat = isset($commande['date_achat']) ? date('d/m/Y', strtotime($commande['date_achat'])) : 'N/A';
        $montant = number_format($commande['montant'] ?? 0, 0, ',', ' ') . ' F CFA';
        
        $html = '
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>Bon de Commande - ' . $numero . '</title>
            <style>
                @media print {
                    body { margin: 0; }
                    .no-print { display: none; }
                }
                
                body { 
                    font-family: Arial, sans-serif; 
                    margin: 20px; 
                    line-height: 1.4;
                }
                .header { 
                    text-align: center; 
                    margin-bottom: 30px; 
                    border-bottom: 3px solid #f00480;
                    padding-bottom: 20px;
                }
                .header h1 { 
                    color: #f00480; 
                    margin: 0; 
                    font-size: 28px;
                    font-weight: bold;
                }
                .header p {
                    margin: 10px 0 0 0;
                    font-size: 16px;
                    color: #666;
                }
                .info-section { 
                    margin-bottom: 25px; 
                }
                .info-section h3 { 
                    color: #010768; 
                    border-bottom: 2px solid #f00480; 
                    padding-bottom: 8px; 
                    margin-bottom: 15px;
                    font-size: 18px;
                }
                .info-row { 
                    display: flex; 
                    margin-bottom: 12px; 
                    padding: 5px 0;
                }
                .info-label { 
                    font-weight: bold; 
                    width: 200px; 
                    color: #333;
                }
                .info-value { 
                    flex: 1; 
                    color: #666;
                }
                .table { 
                    width: 100%; 
                    border-collapse: collapse; 
                    margin-top: 20px; 
                    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                }
                .table th, .table td { 
                    border: 1px solid #ddd; 
                    padding: 12px 8px; 
                    text-align: left; 
                }
                .table th { 
                    background-color: #f00480; 
                    color: white; 
                    font-weight: bold;
                    text-transform: uppercase;
                    font-size: 12px;
                    letter-spacing: 0.5px;
                }
                .table td {
                    background-color: #fafafa;
                }
                .table tr:nth-child(even) td {
                    background-color: #f5f5f5;
                }
                .total-section { 
                    margin-top: 30px; 
                    text-align: right; 
                    padding: 20px;
                    background-color: #f8f9fa;
                    border-radius: 8px;
                }
                .total-amount { 
                    font-size: 20px; 
                    font-weight: bold; 
                    color: #f00480; 
                }
                .footer { 
                    margin-top: 50px; 
                    text-align: center; 
                    font-size: 12px; 
                    color: #666; 
                    border-top: 1px solid #ddd;
                    padding-top: 20px;
                }
                .print-button {
                    position: fixed;
                    top: 20px;
                    right: 20px;
                    background-color: #f00480;
                    color: white;
                    border: none;
                    padding: 10px 20px;
                    border-radius: 5px;
                    cursor: pointer;
                    font-weight: bold;
                }
                .print-button:hover {
                    background-color: #d1036d;
                }
            </style>
        </head>
        <body>
            <button class="print-button no-print" onclick="window.print()">
                📄 Imprimer / Sauvegarder PDF
            </button>
            
            <div class="header">
                <h1>BON DE COMMANDE</h1>
                <p>Numéro: ' . $numero . '</p>
            </div>
            
            <div class="info-section">
                <h3>Informations de la Commande</h3>
                <div class="info-row">
                    <div class="info-label">Numéro de Commande:</div>
                    <div class="info-value">' . $numero . '</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Fournisseur:</div>
                    <div class="info-value">' . $fournisseur . '</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Date d\'Achat:</div>
                    <div class="info-value">' . $dateAchat . '</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Statut:</div>
                    <div class="info-value">' . ucfirst($commande['status'] ?? 'N/A') . '</div>
                </div>
            </div>
            
            <div class="info-section">
                <h3>Produits Commandés</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Code</th>
                            <th>Quantité</th>
                            <th>Prix Unitaire</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>';
        
        $totalGeneral = 0;
        foreach ($details as $detail) {
            $produit = $detail['product'] ?? [];
            $nom = $produit['name'] ?? 'Produit inconnu';
            $code = $produit['code'] ?? 'N/A';
            $quantite = $detail['quantite'] ?? 0;
            $prixUnitaire = number_format($detail['prix_unitaire'] ?? 0, 0, ',', ' ') . ' F CFA';
            $sousTotal = number_format($detail['sous_total'] ?? 0, 0, ',', ' ') . ' F CFA';
            $totalGeneral += floatval($detail['sous_total'] ?? 0);
            
            $html .= '
                        <tr>
                            <td>' . $nom . '</td>
                            <td>' . $code . '</td>
                            <td>' . $quantite . '</td>
                            <td>' . $prixUnitaire . '</td>
                            <td>' . $sousTotal . '</td>
                        </tr>';
        }
        
        $html .= '
                    </tbody>
                </table>
                
                <div class="total-section">
                    <div class="total-amount">
                        Total Général: ' . number_format($totalGeneral, 0, ',', ' ') . ' F CFA
                    </div>
                </div>
            </div>
            
            <div class="footer">
                <p>Document généré le ' . date('d/m/Y à H:i') . '</p>
                <p>© ' . date('Y') . ' - Système de Gestion des Commandes</p>
            </div>
        </body>
        </html>';
        
        return $html;
    }
}