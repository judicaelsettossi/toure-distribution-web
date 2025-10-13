<?php

class HomeController
{
    public function home()
    {
        $connected = (isset($_COOKIE['connected'])) ? true : false ;

        if ($connected) {
            $user_id = $_COOKIE['user_id'];
            $firstname = $_COOKIE['firstname'];
            $lastname = $_COOKIE['lastname'];
            $username = $_COOKIE['username'];
            $email = $_COOKIE['email'];
            $is_active = $_COOKIE['is_active'];
            $last_login_at = $_COOKIE['last_login_at'];
            $access_token = $_COOKIE['access_token'];

            require './views/home/home.php';
            exit();
        } else {
            header('Location: /login');
            exit();
        }
    }
}