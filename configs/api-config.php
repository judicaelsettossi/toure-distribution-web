<?php

// Configuration de l'API
define('API_BASE_URL', 'https://toure.gestiem.com/api');
define('API_TIMEOUT', 30);

// Fonction utilitaire pour faire des appels API avec gestion d'erreurs améliorée et retry
function makeApiCall($endpoint, $method = 'GET', $data = null, $headers = [], $options = []) {
    $maxRetries = isset($options['max_retries']) ? $options['max_retries'] : 3;
    $retryDelay = isset($options['retry_delay']) ? $options['retry_delay'] : 1000000; // microseconds (1 second)
    $exponentialBackoff = isset($options['exponential_backoff']) ? $options['exponential_backoff'] : true;
    
    $lastError = null;
    
    for ($attempt = 0; $attempt <= $maxRetries; $attempt++) {
        $result = makeApiCallSingle($endpoint, $method, $data, $headers);
        
        // Si succès, retourner le résultat
        if ($result['success'] || !isRetriableErrorPHP($result)) {
            return $result;
        }
        
        $lastError = $result;
        
        // Si ce n'est pas la dernière tentative, attendre avant de réessayer
        if ($attempt < $maxRetries) {
            $delay = $exponentialBackoff ? $retryDelay * pow(2, $attempt) : $retryDelay;
            error_log("[API] Retry attempt " . ($attempt + 1) . "/$maxRetries after " . ($delay / 1000) . "ms for $endpoint");
            usleep($delay);
        }
    }
    
    // Toutes les tentatives ont échoué
    error_log("[API] All retry attempts failed for $endpoint");
    return $lastError;
}

// Fonction pour faire un seul appel API (sans retry)
function makeApiCallSingle($endpoint, $method = 'GET', $data = null, $headers = []) {
    $url = API_BASE_URL . $endpoint;
    
    $defaultHeaders = [
        'Content-Type: application/json',
        'Accept: application/json'
    ];
    
    // Ajouter l'autorisation si un token est disponible
    if (isset($_COOKIE['access_token'])) {
        $defaultHeaders[] = 'Authorization: Bearer ' . $_COOKIE['access_token'];
    }
    
    $headers = array_merge($defaultHeaders, $headers);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, API_TIMEOUT);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    // Options SSL pour améliorer la fiabilité
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    
    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
        if ($data) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }
    } elseif ($method === 'PUT') {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        if ($data) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }
    } elseif ($method === 'DELETE') {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    }
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    $curlErrno = curl_errno($ch);
    curl_close($ch);
    
    // Déterminer le type d'erreur
    $errorType = null;
    $isNetworkError = false;
    
    if ($curlError) {
        // Erreurs réseau retriables
        $networkErrors = [
            CURLE_COULDNT_CONNECT,
            CURLE_COULDNT_RESOLVE_HOST,
            CURLE_COULDNT_RESOLVE_PROXY,
            CURLE_OPERATION_TIMEDOUT,
            CURLE_SSL_CONNECT_ERROR,
            CURLE_GOT_NOTHING
        ];
        
        if (in_array($curlErrno, $networkErrors)) {
            $errorType = 'network';
            $isNetworkError = true;
        } else if ($curlErrno === CURLE_OPERATION_TIMEDOUT) {
            $errorType = 'timeout';
            $isNetworkError = true;
        }
        
        return [
            'success' => false,
            'error' => 'Erreur de connexion: ' . $curlError,
            'error_type' => $errorType,
            'is_network_error' => $isNetworkError,
            'curl_errno' => $curlErrno,
            'http_code' => $httpCode,
            'data' => null
        ];
    }
    
    $decodedResponse = json_decode($response, true);
    
    return [
        'success' => $httpCode >= 200 && $httpCode < 300,
        'http_code' => $httpCode,
        'data' => $decodedResponse,
        'raw_response' => $response,
        'is_network_error' => false
    ];
}

// Vérifier si une erreur est retriable
function isRetriableErrorPHP($error) {
    // Erreurs réseau sont retriables
    if (isset($error['is_network_error']) && $error['is_network_error']) {
        return true;
    }
    
    // Status codes retriables
    $retriableStatuses = [408, 429, 500, 502, 503, 504];
    if (isset($error['http_code']) && in_array($error['http_code'], $retriableStatuses)) {
        return true;
    }
    
    return false;
}

// Fonction pour récupérer les produits
function getProducts($page = 1, $limit = 10, $search = '', $category = '', $status = '') {
    $endpoint = '/products?page=' . $page . '&limit=' . $limit;
    
    if (!empty($search)) {
        $endpoint .= '&search=' . urlencode($search);
    }
    
    if (!empty($category)) {
        $endpoint .= '&category=' . urlencode($category);
    }
    
    if (!empty($status)) {
        $endpoint .= '&status=' . urlencode($status);
    }
    
    return makeApiCall($endpoint);
}

// Fonction pour récupérer un produit par ID
function getProduct($productId) {
    return makeApiCall('/products/' . $productId);
}

// Fonction pour créer un produit
function createProduct($productData) {
    return makeApiCall('/products', 'POST', $productData);
}

// Fonction pour modifier un produit
function updateProduct($productId, $productData) {
    return makeApiCall('/products/' . $productId, 'PUT', $productData);
}

// Fonction pour supprimer un produit
function deleteProduct($productId) {
    return makeApiCall('/products/' . $productId, 'DELETE');
}

// Fonction pour récupérer les catégories
function getProductCategories() {
    return makeApiCall('/product-categories');
}

?>
