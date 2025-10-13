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
        $response = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($response, true);

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

            header("Location: /");
            exit;
        } else {
            header("Location: /login");
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
