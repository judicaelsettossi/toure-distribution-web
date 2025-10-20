<aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-white  ">
    <div class="navbar-vertical-container">
        <div class="navbar-vertical-footer-offset">
            <!-- Logo -->

            <a class="navbar-brand" href="/" aria-label="Front">
                <img class="navbar-brand-logo" src="/assets/svg/logos/logo.png" alt="Logo" data-hs-theme-appearance="default">
                <img class="navbar-brand-logo" src="/assets/svg/logos/logo.png" alt="Logo" data-hs-theme-appearance="dark">
                <img class="navbar-brand-logo-mini" src="/assets/svg/logos/logo-short.svg" alt="Logo" data-hs-theme-appearance="default">
                <img class="navbar-brand-logo-mini" src="/assets/svg/logos-light/logo-short.svg" alt="Logo" data-hs-theme-appearance="dark">
            </a>

            <!-- End Logo -->

            <!-- Navbar Vertical Toggle -->
            <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
                <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
                <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
            </button>

            <!-- End Navbar Vertical Toggle -->

            <!-- Content -->
            <div class="navbar-vertical-content">
                <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">
                    <!-- Collapse -->
                    <div class="nav-item">
                        <a class="nav-link dropdown-toggle active" href="#navbarVerticalMenuDashboards" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuDashboards" aria-expanded="true" aria-controls="navbarVerticalMenuDashboards">
                            <i class="bi-house-door nav-icon"></i>
                            <span class="nav-link-title">Toure Distribution</span>
                        </a>

                        <div id="navbarVerticalMenuDashboards" class="nav-collapse collapse show" data-bs-parent="#navbarVerticalMenu">
                            <a class="nav-link active" href="/">Tableau de bord</a>
                            <a class="nav-link " href="/logout">Déconnexion</a>
                        </div>
                    </div>
                    <!-- End Collapse -->

                    <span class="dropdown-header mt-4">Outils</span>
                    <small class="bi-three-dots nav-subtitle-replacer"></small>

                    <!-- Collapse -->
                    <div class="navbar-nav nav-compact">

                    </div>
                    <div id="navbarVerticalMenuPagesMenu">
                        <!-- Collapse -->
                        <div class="nav-item">
                            <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesUsersMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesUsersMenu" aria-expanded="false" aria-controls="navbarVerticalMenuPagesUsersMenu">
                                <i class="bi-people nav-icon"></i>
                                <span class="nav-link-title" style="color:black;">Clients</span>
                            </a>

                            <div id="navbarVerticalMenuPagesUsersMenu" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                                <a class="nav-link " href="/client/ajouter">Créer un client</a>
                                <a class="nav-link " href="/liste-client">Liste des clients</a>
                            </div>
                        </div>
                        <!-- End Collapse -->

                        <!-- Collapse -->
                        <div class="nav-item">
                            <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesFournisseurs" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesFournisseurs" aria-expanded="false" aria-controls="navbarVerticalMenuPagesFournisseurs">
                                <i class="bi-truck nav-icon"></i>
                                <span class="nav-link-title">Fournisseurs</span>
                            </a>

                            <div id="navbarVerticalMenuPagesFournisseurs" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                                <a class="nav-link " href="/fournisseurs">Liste des fournisseurs</a>
                                <a class="nav-link " href="/fournisseur/ajouter">Créer un fournisseur</a>
                            </div>
                        </div>
                        <!-- End Collapse -->

                        <!-- Collapse -->
                        <div class="nav-item">
                            <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesAchats" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesAchats" aria-expanded="false" aria-controls="navbarVerticalMenuPagesAchats">
                                <i class="bi-cart-plus nav-icon"></i>
                                <span class="nav-link-title">Achats</span>
                            </a>

                            <div id="navbarVerticalMenuPagesAchats" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                                <a class="nav-link " href="/achats">Liste des achats</a>
                                <a class="nav-link " href="/achat/creer">Créer un achat</a>
                            </div>
                        </div>
                        <!-- End Collapse -->

                        <!-- Collapse -->
                        <div class="nav-item">
                            <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesVentes" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesVentes" aria-expanded="false" aria-controls="navbarVerticalMenuPagesVentes">
                                <i class="bi-cart-check nav-icon"></i>
                                <span class="nav-link-title">Ventes</span>
                            </a>

                            <div id="navbarVerticalMenuPagesVentes" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                                <a class="nav-link " href="/vente">Liste des ventes</a>
                                <a class="nav-link " href="/vente/creer">Créer une vente</a>
                            </div>
                        </div>
                        <!-- End Collapse -->

                        <!-- Collapse -->
                        <div class="nav-item">
                            <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesEntrepot" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesEntrepot" aria-expanded="false" aria-controls="navbarVerticalMenuPagesEntrepot">
                                <i class="bi-building nav-icon"></i>
                                <span class="nav-link-title">Entrepôts</span>
                            </a>

                            <div id="navbarVerticalMenuPagesEntrepot" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesEntrepot">
                                <a class="nav-link " href="/creer-un-entrepot">Créer un entrepôt</a>
                                <a class="nav-link " href="/entrepots">Liste des entrepôt</a>
                                <a class="nav-link " href="/entrepot/transfert">Transfert entre entrepôts</a>
                            </div>
                        </div>
                        <!-- End Collapse -->

                        <!-- Collapse -->
                        <div class="nav-item">
                            <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesStock" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesStock" aria-expanded="false" aria-controls="navbarVerticalMenuPagesStock">
                                <i class="bi-box nav-icon"></i>
                                <span class="nav-link-title">Stock</span>
                            </a>

                            <div id="navbarVerticalMenuPagesStock" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesStock">
                                <a class="nav-link " href="/stock">Vue d'ensemble</a>
                                <a class="nav-link " href="/stock/par-entrepot">Par entrepôt</a>
                                <a class="nav-link " href="/stock/par-produit">Par produit</a>
                                <a class="nav-link " href="/stock/transfert">Transfert</a>
                                <a class="nav-link " href="/stock/transferts">Liste transferts</a>
                            </div>
                        </div>
                        <!-- End Collapse -->

                        <!-- Collapse -->
                        <div class="nav-item">
                            <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesCamions" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesCamions" aria-expanded="false" aria-controls="navbarVerticalMenuPagesCamions">
                                <i class="bi-truck nav-icon"></i>
                                <span class="nav-link-title">Gestion des Camions</span>
                            </a>

                            <div id="navbarVerticalMenuPagesCamions" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                                <a class="nav-link " href="/camions">Liste des camions</a>
                                <a class="nav-link " href="/camion/creer">Nouveau camion</a>
                            </div>
                        </div>
                        <!-- End Collapse -->

                        <!-- Collapse -->
                        <div class="nav-item">
                            <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesChauffeurs" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesChauffeurs" aria-expanded="false" aria-controls="navbarVerticalMenuPagesChauffeurs">
                                <i class="bi-person-badge nav-icon"></i>
                                <span class="nav-link-title">Gestion des Chauffeurs</span>
                            </a>

                            <div id="navbarVerticalMenuPagesChauffeurs" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                                <a class="nav-link " href="/chauffeurs">Liste des chauffeurs</a>
                                <a class="nav-link " href="/chauffeur/creer">Nouveau chauffeur</a>
                            </div>
                        </div>
                        <!-- End Collapse -->

                        <!-- Collapse -->
                        <div class="nav-item">
                            <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesUtilisateurs" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesUtilisateurs" aria-expanded="false" aria-controls="navbarVerticalMenuPagesUtilisateurs">
                                <i class="bi-people nav-icon"></i>
                                <span class="nav-link-title">Gestion des Utilisateurs</span>
                            </a>

                            <div id="navbarVerticalMenuPagesUtilisateurs" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                                <a class="nav-link " href="/utilisateurs">Liste des utilisateurs</a>
                                <a class="nav-link " href="/utilisateur/creer">Nouvel utilisateur</a>
                            </div>
                        </div>
                        <!-- End Collapse -->

                        <!-- Collapse -->
                        <div class="nav-item">
                            <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesProduits" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesProduits" aria-expanded="false" aria-controls="navbarVerticalMenuPagesProduits">
                                <i class="bi-box nav-icon"></i>
                                <span class="nav-link-title">Produits</span>
                            </a>

                            <div id="navbarVerticalMenuPagesProduits" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                                <a class="nav-link " href="/produit/liste">Liste des produits</a>
                                <a class="nav-link " href="/produit/ajouter">Créer un produit</a>
                                <a class="nav-link " href="/categorie-produit-add">Créer une categorie</a>
                                <a class="nav-link " href="/categories-produits-liste">Liste des catégories</a>
                            </div>
                        </div>
                        <!-- End Collapse -->

                        <!-- Collapse -->
                        <div class="nav-item">
                            <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesCommandes" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesCommandes" aria-expanded="false" aria-controls="navbarVerticalMenuPagesCommandes">
                                <i class="bi bi-cart-check nav-icon"></i>
                                <span class="nav-link-title">Commandes</span>
                            </a>

                            <div id="navbarVerticalMenuPagesCommandes" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                                <a class="nav-link " href="/commandes">Liste des commandes</a>
                                <a class="nav-link " href="/commande/creer">Nouvelle commande</a>
                                
                            </div>
                        </div>
                        <!-- End Collapse -->

                        <!-- Collapse -->
                        <div class="nav-item">
                            <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesLivraisons" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesLivraisons" aria-expanded="false" aria-controls="navbarVerticalMenuPagesLivraisons">
                                <i class="bi-truck nav-icon"></i>
                                <span class="nav-link-title">Livraisons</span>
                            </a>

                            <div id="navbarVerticalMenuPagesLivraisons" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                                <a class="nav-link " href="/livraison">Liste des livraisons</a>
                                <a class="nav-link " href="/livraison/creer">Nouvelle livraison</a>
                            </div>
                        </div>
                        <!-- End Collapse -->

                        <!-- Collapse -->
                        <div class="nav-item">
                            <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesMonCompte" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesMonCompte" aria-expanded="false" aria-controls="navbarVerticalMenuPagesMonCompte">
                                <i class="bi-person-circle nav-icon"></i>
                                <span class="nav-link-title">Mon Compte</span>
                            </a>

                            <div id="navbarVerticalMenuPagesMonCompte" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                                <a class="nav-link " href="/profil">Mon Profil</a>
                            </div>
                        </div>
                        <!-- End Collapse -->

                        <!-- Collapse -->
                        <div class="nav-item">
                            <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesAide" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesAide" aria-expanded="false" aria-controls="navbarVerticalMenuPagesAide">
                                <i class="bi-question-circle nav-icon"></i>
                                <span class="nav-link-title">Centre d'Aide</span>
                            </a>

                            <div id="navbarVerticalMenuPagesAide" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                                <a class="nav-link " href="/help">Accueil Aide</a>
                                <a class="nav-link " href="/help/faq">Questions Fréquentes</a>
                                <a class="nav-link " href="/help/guides">Guides d'Utilisation</a>
                                <a class="nav-link " href="/help/contact">Contact Support</a>
                            </div>
                        </div>
                        <!-- End Collapse -->
                    </div>
                    <!-- End Collapse -->
                </div>

            </div>
            <!-- End Content -->
        </div>
    </div>
</aside>