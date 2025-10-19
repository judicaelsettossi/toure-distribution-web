<?php

require_once './configs/utils.php';

class ChauffeurController
{
    public function creerChauffeur()
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Inclure la vue de création de chauffeur
        ob_start();
        include './views/chauffeur/creer.php';
        $content = ob_get_clean();
        
        // Inclure le layout
        include './views/layouts/app-layout.php';
    }

    public function listeChauffeurs()
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Inclure la vue de liste des chauffeurs
        ob_start();
        include './views/chauffeur/liste.php';
        $content = ob_get_clean();
        
        // Inclure le layout
        include './views/layouts/app-layout.php';
    }

    public function chauffeursSupprimes()
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Inclure la vue des chauffeurs supprimés
        ob_start();
        include './views/chauffeur/supprimes.php';
        $content = ob_get_clean();
        
        // Inclure le layout
        include './views/layouts/app-layout.php';
    }

    public function statistiquesChauffeurs()
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Inclure la vue des statistiques des chauffeurs
        ob_start();
        include './views/chauffeur/statistiques.php';
        $content = ob_get_clean();
        
        // Inclure le layout
        include './views/layouts/app-layout.php';
    }

    public function detailsChauffeur($id)
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Inclure la vue de détails du chauffeur
        ob_start();
        include './views/chauffeur/details.php';
        $content = ob_get_clean();
        
        // Inclure le layout
        include './views/layouts/app-layout.php';
    }

    public function modifierChauffeur($id)
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Inclure la vue de modification du chauffeur
        ob_start();
        include './views/chauffeur/edit.php';
        $content = ob_get_clean();
        
        // Inclure le layout
        include './views/layouts/app-layout.php';
    }

    public function supprimerChauffeur($id)
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Inclure la vue de suppression du chauffeur
        ob_start();
        include './views/chauffeur/supprimer.php';
        $content = ob_get_clean();
        
        // Inclure le layout
        include './views/layouts/app-layout.php';
    }

    public function restaurerChauffeur($id)
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Inclure la vue de restauration du chauffeur
        ob_start();
        include './views/chauffeur/restaurer.php';
        $content = ob_get_clean();
        
        // Inclure le layout
        include './views/layouts/app-layout.php';
    }
}