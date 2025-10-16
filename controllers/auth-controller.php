<?php

class AuthController
{
    public function login()
    {
        require './views/auth/login.php';
        exit();
    }

    public function loginPost()
    {
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;

        if (!$email || !$password) {
            echo "Email et mot de passe requis.";
            return;
        }

        $postData = [
            "login" => $email,
            "password" => $password,
            "remember" => false
        ];

        $ch = curl_init("https://toure.gestiem.com/api/auth/login");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "Accept: application/json"
        ]);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError = curl_error($ch);
        curl_close($ch);
        
        // Logs pour le debugging
        error_log("Code HTTP: " . $httpCode);
        error_log("Erreur cURL: " . $curlError);
        error_log("Réponse brute: " . $response);

        // Vérifier s'il y a une erreur cURL
        if ($curlError) {
            error_log("Erreur cURL: " . $curlError);
            header("Location: /login?error=connection");
            exit;
        }
        
        // Vérifier si la réponse est valide
        if (!$response) {
            error_log("Aucune réponse de l'API");
            header("Location: /login?error=no_response");
            exit;
        }
        
        $result = json_decode($response, true);
        
        // Vérifier si le JSON est valide
        if (json_last_error() !== JSON_ERROR_NONE) {
            error_log("Erreur de décodage JSON: " . json_last_error_msg());
            error_log("Réponse brute: " . $response);
            header("Location: /login?error=json_decode");
            exit;
        }
        
        // Logs pour le debugging
        error_log("Réponse API de connexion: " . $response);
        error_log("Résultat décodé: " . print_r($result, true));

        if ($result['success'] ?? false) {
            $user = $result['data']['user'];
            $token = $result['data']['access_token'];

            setcookie("connected", true, time() + (30 * 24 * 60 * 60), "/");
            setcookie("user_id", $user['user_id'], time() + (30 * 24 * 60 * 60), "/");
            setcookie("firstname", $user['firstname'], time() + (30 * 24 * 60 * 60), "/");
            setcookie("lastname", $user['lastname'], time() + (30 * 24 * 60 * 60), "/");
            setcookie("username", $user['username'], time() + (30 * 24 * 60 * 60), "/");
            setcookie("email", $user['email'], time() + (30 * 24 * 60 * 60), "/");
            setcookie("is_active", $user['is_active'] ? 1 : 0, time() + (30 * 24 * 60 * 60), "/");
            setcookie("last_login_at", $user['last_login_at'] ?? "", time() + (30 * 24 * 60 * 60), "/");
            setcookie("access_token", $token, time() + (30 * 24 * 60 * 60), "/");
            setcookie("token_type", $result['data']['token_type'], time() + (30 * 24 * 60 * 60), "/");

            error_log("Connexion réussie, redirection vers /");
            header("Location: /");
            exit;
        } else {
            $errorMessage = $result['message'] ?? 'Erreur de connexion';
            error_log("Échec de la connexion: " . $errorMessage);
            header("Location: /login?error=invalid_credentials&message=" . urlencode($errorMessage));
            exit;
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();

        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach ($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);

                setcookie($name, '', time() - 3600, '/');
                setcookie($name, '', time() - 3600, '/', '', false, true);
            }
        }

        header('Location: /');
        exit;
    }
}
