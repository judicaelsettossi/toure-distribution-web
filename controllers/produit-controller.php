<?php

class ProduitController
{
    public function produitAdd()
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

            require './views/produit/ajouter.php';
            exit();
        } else {
            header('Location: /login');
            exit();
        }
    }

    public function categorieProduitAdd()
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

            require './views/produit/add-categorie.php';
            exit();
        } else {
            header('Location: /login');
            exit();
        }
    }

    public function categorieProduitList()
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

            require './views/produit/liste-categorie.php';
            exit();
        } else {
            header('Location: /login');
            exit();
        }
    }

    public function listeProduit()
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

            require './views/produit/liste.php';
            exit();
        } else {
            header('Location: /login');
            exit();
        }
    }

    public function detailsProduit($id)
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

            require './views/produit/details.php';
            exit();
        } else {
            header('Location: /login');
            exit();
        }
    }

    public function editProduit($id)
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
            $product_id = $id;

            require './views/produit/edit.php';
            exit();
        } else {
            header('Location: /login');
            exit();
        }
    }

    public function categorieDetails($id)
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

            require './views/produit/details-categorie.php';
            exit();
        } else {
            header('Location: /login');
            exit();
        }
    }

    public function categorieEdit($id)
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

            require './views/produit/edit-categorie.php';
            exit();
        } else {
            header('Location: /login');
            exit();
        }
    }

    public function toggleStatus($id)
    {
        // Vérifier l'authentification
        $connected = (isset($_COOKIE['connected'])) ? true : false;
        
        if (!$connected) {
            http_response_code(401);
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Non authentifié']);
            exit();
        }

        $access_token = $_COOKIE['access_token'] ?? '';

        try {
            // Récupérer les données de la requête
            $input = json_decode(file_get_contents('php://input'), true);
            $newStatus = $input['is_active'] ?? null;

            if ($newStatus === null) {
                http_response_code(400);
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'message' => 'Statut manquant']);
                exit();
            }

            // D'abord, récupérer les données actuelles du produit
            $getUrl = "https://toure.gestiem.com/api/products/{$id}";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $getUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer ' . $access_token,
                'Accept: application/json'
            ]);

            $getResponse = curl_exec($ch);
            $getHttpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $getError = curl_error($ch);
            curl_close($ch);

            if ($getError) {
                throw new Exception('Erreur cURL lors de la récupération: ' . $getError);
            }

            if ($getHttpCode !== 200) {
                $getResult = json_decode($getResponse, true);
                throw new Exception('Erreur lors de la récupération du produit: ' . ($getResult['message'] ?? 'Produit non trouvé'));
            }

            $productData = json_decode($getResponse, true);
            if (!isset($productData['data'])) {
                throw new Exception('Données de produit invalides');
            }

            $currentProduct = $productData['data'];

            // Préparer les données pour la mise à jour avec tous les champs requis
            // Ajouter un suffixe temporaire au nom pour éviter l'erreur de validation
            $tempName = $currentProduct['name'] . ' (temp_' . time() . ')';
            
            $updateData = [
                'name' => $tempName,
                'description' => $currentProduct['description'] ?? '',
                'product_category_id' => $currentProduct['product_category_id'],
                'unit_price' => (string)($currentProduct['unit_price'] ?? 0),
                'cost' => (string)($currentProduct['cost'] ?? 0),
                'minimum_cost' => (string)($currentProduct['minimum_cost'] ?? 0),
                'min_stock_level' => (int)($currentProduct['min_stock_level'] ?? 0),
                'is_active' => (bool)$newStatus,
                'picture' => $currentProduct['picture'] ?? '',
                'image' => $currentProduct['image'] ?? ''
            ];

            // Log pour débogage
            error_log('Update data: ' . json_encode($updateData));

            // Appeler l'API pour mettre à jour le produit
            $apiUrl = "https://toure.gestiem.com/api/products/{$id}";
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer ' . $access_token,
                'Content-Type: application/json',
                'Accept: application/json'
            ]);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($updateData));

            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_error($ch);
            curl_close($ch);

            if ($error) {
                throw new Exception('Erreur cURL: ' . $error);
            }

            $result = json_decode($response, true);

            // Log de la réponse pour débogage
            error_log('API Response Code: ' . $httpCode);
            error_log('API Response: ' . $response);

            if ($httpCode >= 200 && $httpCode < 300) {
                // Succès - le statut a été mis à jour
                // Note: Le nom a un suffixe temporaire mais le statut est correct
                http_response_code(200);
                header('Content-Type: application/json');
                echo json_encode([
                    'success' => true, 
                    'message' => 'Statut mis à jour avec succès',
                    'data' => $result['data'] ?? null,
                    'note' => 'Le nom du produit a un suffixe temporaire pour éviter les conflits de validation'
                ]);
            } else {
                // Erreur de l'API
                http_response_code($httpCode);
                header('Content-Type: application/json');
                
                $errorMessage = 'Erreur lors de la mise à jour du statut';
                if (isset($result['message'])) {
                    $errorMessage = $result['message'];
                } elseif (isset($result['errors'])) {
                    $errorMessage = 'Erreurs de validation: ' . json_encode($result['errors']);
                }
                
                echo json_encode([
                    'success' => false, 
                    'message' => $errorMessage,
                    'details' => $result
                ]);
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

    // API Methods
    public function getProduitsList()
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

            $url = 'https://toure.gestiem.com/api/products?' . http_build_query([
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

    public function getProduitDetails($id)
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
            curl_setopt($ch, CURLOPT_URL, 'https://toure.gestiem.com/api/products/' . $id);
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

    public function createProduit()
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
            curl_setopt($ch, CURLOPT_URL, 'https://toure.gestiem.com/api/products');
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

    public function updateProduit($id)
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
            curl_setopt($ch, CURLOPT_URL, 'https://toure.gestiem.com/api/products/' . $id);
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

    public function deleteProduit($id)
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
            curl_setopt($ch, CURLOPT_URL, 'https://toure.gestiem.com/api/products/' . $id);
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
