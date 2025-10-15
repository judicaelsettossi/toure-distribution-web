<?php

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
}
