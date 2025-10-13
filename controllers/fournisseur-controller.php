<?php

class FournisseurController
{
    public function listeFournisseurs()
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

            require './views/fournisseur/liste.php';
            exit();
        } else {
            header('Location: /login');
            exit();
        }
    }

    public function addFournisseur()
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

            require './views/fournisseur/ajouter.php';
            exit();
        } else {
            header('Location: /login');
            exit();
        }
    }

    public function detailsFournisseur($id)
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

            require './views/fournisseur/details.php';
            exit();
        } else {
            header('Location: /login');
            exit();
        }
    }

    public function editFournisseur($id)
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

            require './views/fournisseur/edit.php';
            exit();
        } else {
            header('Location: /login');
            exit();
        }
    }
}
