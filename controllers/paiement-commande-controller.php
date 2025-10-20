<?php

require_once './configs/api-config.php';
require_once './configs/utils.php';

class PaiementCommandeController
{
    public function createPaiement()
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
            // Récupérer les données POST
            $input = json_decode(file_get_contents('php://input'), true);
            
            if (!$input) {
                http_response_code(400);
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'message' => 'Données JSON invalides']);
                exit();
            }

            // Log des données reçues
            error_log('PaiementCommandeController - Données reçues: ' . json_encode($input));
            error_log('PaiementCommandeController - Token: ' . substr($access_token, 0, 20) . '...');

            $apiUrl = 'https://toure.gestiem.com/api/paiement-commandes';
            
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
            
            // Log de la réponse
            error_log('PaiementCommandeController - HTTP Code: ' . $httpCode);
            error_log('PaiementCommandeController - Response: ' . $response);
            error_log('PaiementCommandeController - Error: ' . $error);
            
            if ($error) {
                throw new Exception('Erreur cURL: ' . $error);
            }
            
            // Vérifier si la réponse est du JSON valide
            $decodedResponse = json_decode($response, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                error_log('PaiementCommandeController - JSON invalide: ' . json_last_error_msg());
                throw new Exception('Réponse API invalide: ' . substr($response, 0, 200));
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

    public function getPaiementsByCommande($commandeId)
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
            // Log de la requête
            error_log('PaiementCommandeController - Récupération paiements pour commande: ' . $commandeId);
            error_log('PaiementCommandeController - Token: ' . substr($access_token, 0, 20) . '...');

            $apiUrl = 'https://toure.gestiem.com/api/paiement-commandes/commande/' . $commandeId;
            
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
            
            // Log de la réponse
            error_log('PaiementCommandeController - HTTP Code: ' . $httpCode);
            error_log('PaiementCommandeController - Response: ' . $response);
            error_log('PaiementCommandeController - Error: ' . $error);
            
            if ($error) {
                throw new Exception('Erreur cURL: ' . $error);
            }
            
            // Vérifier si la réponse est du JSON valide
            $decodedResponse = json_decode($response, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                error_log('PaiementCommandeController - JSON invalide: ' . json_last_error_msg());
                throw new Exception('Réponse API invalide: ' . substr($response, 0, 200));
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