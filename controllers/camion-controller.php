<?php

require_once './configs/utils.php';

class CamionController
{
    public function creerCamion()
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Inclure la vue de création de camion
        ob_start();
        include './views/camion/creer.php';
        $content = ob_get_clean();
        
        // Inclure le layout
        include './views/layouts/app-layout.php';
    }

    public function listeCamions()
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Inclure la vue de liste des camions
        ob_start();
        include './views/camion/liste.php';
        $content = ob_get_clean();
        
        // Inclure le layout
        include './views/layouts/app-layout.php';
    }

    public function camionsSupprimes()
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Inclure la vue des camions supprimés
        ob_start();
        include './views/camion/supprimes.php';
        $content = ob_get_clean();
        
        // Inclure le layout
        include './views/layouts/app-layout.php';
    }

    public function statistiquesCamions()
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Inclure la vue des statistiques des camions
        ob_start();
        include './views/camion/statistiques.php';
        $content = ob_get_clean();
        
        // Inclure le layout
        include './views/layouts/app-layout.php';
    }

    public function detailsCamion()
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Inclure la vue des détails du camion
        ob_start();
        include './views/camion/details.php';
        $content = ob_get_clean();
        
        // Inclure le layout
        include './views/layouts/app-layout.php';
    }

    public function modifierCamion()
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Inclure la vue de modification du camion
        ob_start();
        include './views/camion/edit.php';
        $content = ob_get_clean();
        
        // Inclure le layout
        include './views/layouts/app-layout.php';
    }

    public function supprimerCamion()
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Logique de suppression du camion
        // Redirection vers la liste
        header('Location: /camions');
        exit;
    }

    public function restaurerCamion()
    {
        // Vérifier l'authentification
        if (!isset($_COOKIE['connected']) || !$_COOKIE['connected']) {
            header('Location: /login');
            exit;
        }

        // Logique de restauration du camion
        // Redirection vers la liste
        header('Location: /camions');
        exit;
    }
}
?>