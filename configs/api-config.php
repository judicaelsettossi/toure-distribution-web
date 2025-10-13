<?php

// Configuration de l'API
define('API_BASE_URL', 'https://toure.gestiem.com/api');
define('API_TIMEOUT', 30);

// Fonction utilitaire pour faire des appels API
function makeApiCall($endpoint, $method = 'GET', $data = null, $headers = []) {
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
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
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
    $error = curl_error($ch);
    curl_close($ch);
    
    if ($error) {
        return [
            'success' => false,
            'error' => 'Erreur de connexion: ' . $error,
            'data' => null
        ];
    }
    
    $decodedResponse = json_decode($response, true);
    
    return [
        'success' => $httpCode >= 200 && $httpCode < 300,
        'http_code' => $httpCode,
        'data' => $decodedResponse,
        'raw_response' => $response
    ];
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
