<?php

class LivraisonController
{
    // Pages web
    public function index()
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        
        if (!$connected) {
            header('Location: /login');
            exit();
        }

        include './views/livraison/liste.php';
    }

    public function create()
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        
        if (!$connected) {
            header('Location: /login');
            exit();
        }

        include './views/livraison/creer.php';
    }

    public function store()
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        
        if (!$connected) {
            header('Location: /login');
            exit();
        }

        // Rediriger vers la liste après création
        header('Location: /livraison');
        exit();
    }

    public function show($id)
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        
        if (!$connected) {
            header('Location: /login');
            exit();
        }

        include './views/livraison/details.php';
    }

    public function edit($id)
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        
        if (!$connected) {
            header('Location: /login');
            exit();
        }

        include './views/livraison/edit.php';
    }

    public function update($id)
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        
        if (!$connected) {
            header('Location: /login');
            exit();
        }

        // Rediriger vers les détails après modification
        header("Location: /livraison/{$id}");
        exit();
    }

    public function destroy($id)
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        
        if (!$connected) {
            header('Location: /login');
            exit();
        }

        // Rediriger vers la liste après suppression
        header('Location: /livraison');
        exit();
    }

    // API Methods pour les livraisons
    public function getLivraisonsList()
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        $access_token = $_COOKIE['access_token'] ?? '';
        
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
            // Construire l'URL avec les paramètres de requête
            $queryParams = $_GET;
            $apiUrl = 'https://toure.gestiem.com/api/deliveries?' . http_build_query($queryParams);
            
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

    public function createLivraison()
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        $access_token = $_COOKIE['access_token'] ?? '';
        
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
            $input = json_decode(file_get_contents('php://input'), true);
            
            if (!$input) {
                http_response_code(400);
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'message' => 'Données JSON invalides']);
                exit();
            }

            $apiUrl = 'https://toure.gestiem.com/api/deliveries';
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($input));
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

    public function getLivraisonDetails($id)
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        $access_token = $_COOKIE['access_token'] ?? '';
        
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
            $apiUrl = 'https://toure.gestiem.com/api/deliveries/' . $id;
            
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

    public function updateLivraison($id)
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        $access_token = $_COOKIE['access_token'] ?? '';
        
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
            $input = json_decode(file_get_contents('php://input'), true);
            
            if (!$input) {
                http_response_code(400);
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'message' => 'Données JSON invalides']);
                exit();
            }

            $apiUrl = 'https://toure.gestiem.com/api/deliveries/' . $id;
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($input));
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

    public function deleteLivraison($id)
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        $access_token = $_COOKIE['access_token'] ?? '';
        
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
            $apiUrl = 'https://toure.gestiem.com/api/deliveries/' . $id;
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
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

    public function startLivraison($id)
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        $access_token = $_COOKIE['access_token'] ?? '';
        
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
            $apiUrl = 'https://toure.gestiem.com/api/deliveries/' . $id . '/start';
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
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

    public function completeLivraison($id)
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        $access_token = $_COOKIE['access_token'] ?? '';
        
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
            $input = json_decode(file_get_contents('php://input'), true);
            
            $apiUrl = 'https://toure.gestiem.com/api/deliveries/' . $id . '/complete';
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($input ?: []));
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

    public function cancelLivraison($id)
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        $access_token = $_COOKIE['access_token'] ?? '';
        
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
            $input = json_decode(file_get_contents('php://input'), true);
            
            $apiUrl = 'https://toure.gestiem.com/api/deliveries/' . $id . '/cancel';
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($input ?: []));
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

    public function getLivraisonsStatistics()
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        $access_token = $_COOKIE['access_token'] ?? '';
        
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
            $apiUrl = 'https://toure.gestiem.com/api/deliveries/statistics/overview';
            
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

    // API Methods pour les détails de livraison
    public function getDeliveryDetailsList()
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        $access_token = $_COOKIE['access_token'] ?? '';
        
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
            $queryParams = $_GET;
            $apiUrl = 'https://toure.gestiem.com/api/delivery-details?' . http_build_query($queryParams);
            
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

    public function getDeliveryDetail($id)
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        $access_token = $_COOKIE['access_token'] ?? '';
        
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
            $apiUrl = 'https://toure.gestiem.com/api/delivery-details/' . $id;
            
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

    public function updateDeliveryDetail($id)
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        $access_token = $_COOKIE['access_token'] ?? '';
        
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
            $input = json_decode(file_get_contents('php://input'), true);
            
            if (!$input) {
                http_response_code(400);
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'message' => 'Données JSON invalides']);
                exit();
            }

            $apiUrl = 'https://toure.gestiem.com/api/delivery-details/' . $id;
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($input));
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

    public function prepareProduct($id)
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        $access_token = $_COOKIE['access_token'] ?? '';
        
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
            $input = json_decode(file_get_contents('php://input'), true);
            
            if (!$input) {
                http_response_code(400);
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'message' => 'Données JSON invalides']);
                exit();
            }

            $apiUrl = 'https://toure.gestiem.com/api/delivery-details/' . $id . '/preparer';
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($input));
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

    public function deliverProduct($id)
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        $access_token = $_COOKIE['access_token'] ?? '';
        
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
            $input = json_decode(file_get_contents('php://input'), true);
            
            if (!$input) {
                http_response_code(400);
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'message' => 'Données JSON invalides']);
                exit();
            }

            $apiUrl = 'https://toure.gestiem.com/api/delivery-details/' . $id . '/livrer';
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($input));
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

    public function returnProduct($id)
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        $access_token = $_COOKIE['access_token'] ?? '';
        
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
            $input = json_decode(file_get_contents('php://input'), true);
            
            if (!$input) {
                http_response_code(400);
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'message' => 'Données JSON invalides']);
                exit();
            }

            $apiUrl = 'https://toure.gestiem.com/api/delivery-details/' . $id . '/retourner';
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($input));
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

    public function getDeliveryDetailsByDelivery($deliveryId)
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        $access_token = $_COOKIE['access_token'] ?? '';
        
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
            $apiUrl = 'https://toure.gestiem.com/api/delivery-details/delivery/' . $deliveryId;
            
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

    public function prepareAllProducts($deliveryId)
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        $access_token = $_COOKIE['access_token'] ?? '';
        
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
            $apiUrl = 'https://toure.gestiem.com/api/delivery-details/delivery/' . $deliveryId . '/preparer-tout';
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
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
