<?php

class FactureController
{
    private function checkAuth()
    {
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit();
        }
    }

    public function listeFactures()
    {
        $this->checkAuth();
        $user_id = $_COOKIE['user_id'];
        $firstname = $_COOKIE['firstname'];
        $lastname = $_COOKIE['lastname'];
        $username = $_COOKIE['username'];
        $email = $_COOKIE['email'];
        $is_active = $_COOKIE['is_active'];
        $last_login_at = $_COOKIE['last_login_at'] ?? null;
        $access_token = $_COOKIE['access_token'];
        
        require './views/facture/liste.php';
        exit();
    }

    public function createFacture()
    {
        $this->checkAuth();
        $user_id = $_COOKIE['user_id'];
        $firstname = $_COOKIE['firstname'];
        $lastname = $_COOKIE['lastname'];
        $username = $_COOKIE['username'];
        $email = $_COOKIE['email'];
        $is_active = $_COOKIE['is_active'];
        $last_login_at = $_COOKIE['last_login_at'] ?? null;
        $access_token = $_COOKIE['access_token'];
        
        require './views/facture/creer.php';
        exit();
    }

    public function detailsFacture($id)
    {
        $this->checkAuth();
        $user_id = $_COOKIE['user_id'];
        $firstname = $_COOKIE['firstname'];
        $lastname = $_COOKIE['lastname'];
        $username = $_COOKIE['username'];
        $email = $_COOKIE['email'];
        $is_active = $_COOKIE['is_active'];
        $last_login_at = $_COOKIE['last_login_at'] ?? null;
        $access_token = $_COOKIE['access_token'];
        
        require './views/facture/details.php';
        exit();
    }

    public function editFacture($id)
    {
        $this->checkAuth();
        $user_id = $_COOKIE['user_id'];
        $firstname = $_COOKIE['firstname'];
        $lastname = $_COOKIE['lastname'];
        $username = $_COOKIE['username'];
        $email = $_COOKIE['email'];
        $is_active = $_COOKIE['is_active'];
        $last_login_at = $_COOKIE['last_login_at'] ?? null;
        $access_token = $_COOKIE['access_token'];
        
        require './views/facture/edit.php';
        exit();
    }

    public function statisticsFactures()
    {
        $this->checkAuth();
        $user_id = $_COOKIE['user_id'];
        $firstname = $_COOKIE['firstname'];
        $lastname = $_COOKIE['lastname'];
        $username = $_COOKIE['username'];
        $email = $_COOKIE['email'];
        $is_active = $_COOKIE['is_active'];
        $last_login_at = $_COOKIE['last_login_at'] ?? null;
        $access_token = $_COOKIE['access_token'];
        
        require './views/facture/statistiques.php';
        exit();
    }

    public function facturesImpayees()
    {
        $this->checkAuth();
        $user_id = $_COOKIE['user_id'];
        $firstname = $_COOKIE['firstname'];
        $lastname = $_COOKIE['lastname'];
        $username = $_COOKIE['username'];
        $email = $_COOKIE['email'];
        $is_active = $_COOKIE['is_active'];
        $last_login_at = $_COOKIE['last_login_at'] ?? null;
        $access_token = $_COOKIE['access_token'];
        
        require './views/facture/impayees.php';
        exit();
    }

    public function facturesRelances()
    {
        $this->checkAuth();
        $user_id = $_COOKIE['user_id'];
        $firstname = $_COOKIE['firstname'];
        $lastname = $_COOKIE['lastname'];
        $username = $_COOKIE['username'];
        $email = $_COOKIE['email'];
        $is_active = $_COOKIE['is_active'];
        $last_login_at = $_COOKIE['last_login_at'] ?? null;
        $access_token = $_COOKIE['access_token'];
        
        require './views/facture/relances.php';
        exit();
    }
}
