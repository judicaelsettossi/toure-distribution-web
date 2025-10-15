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
                                <a class="nav-link " href="/clients/fidelite">Programme de fidélité</a>
                                <a class="nav-link " href="/clients/statistiques">Statistiques</a>
                            </div>
                        </div>
                        <!-- End Collapse -->

                        <!-- Collapse -->
                        <div class="nav-item">
                            <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesUserProfileMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesUserProfileMenu" aria-expanded="false" aria-controls="navbarVerticalMenuPagesUserProfileMenu">
                                <i class="bi-person nav-icon"></i>
                                <span class="nav-link-title">Produits</span>
                            </a>

                            <div id="navbarVerticalMenuPagesUserProfileMenu" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                                <a class="nav-link " href="/produit/liste">Liste des produits</a>
                                <a class="nav-link " href="/produit/ajouter">Créer un produit</a>
                                <a class="nav-link " href="/categorie-produit-add">Créer une categorie</a>
                                <a class="nav-link " href="/categories-produits-liste">Liste des catégories</a>
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
                            <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesStock" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesStock" aria-expanded="false" aria-controls="navbarVerticalMenuPagesStock">
                                <i class="bi-boxes nav-icon"></i>
                                <span class="nav-link-title">Gestion de Stock</span>
                            </a>

                            <div id="navbarVerticalMenuPagesStock" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                                <a class="nav-link " href="/entree-sortie-stock">Tableau de bord</a>
                                <a class="nav-link " href="/stock/gestion">Gestion des stocks</a>
                                <a class="nav-link " href="/stock/entree">Entrée de stock</a>
                                <a class="nav-link " href="/stock/sortie">Sortie de stock</a>
                                <a class="nav-link " href="/stock/mouvements">Mouvements</a>
                                <a class="nav-link " href="/stock/types-mouvements">Types de mouvements</a>
                                <a class="nav-link " href="/stock/par-produit">Stocks par produit</a>
                                <a class="nav-link " href="/stock/par-entrepot">Stocks par entrepôt</a>
                                <a class="nav-link " href="/stock/ajustement">Ajustements</a>
                                <a class="nav-link " href="/stock/reservation">Réservations</a>
                            </div>
                        </div>
                        <!-- End Collapse -->

                        <!-- Collapse -->
                        <div class="nav-item">
                            <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesAccountMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesAccountMenu" aria-expanded="false" aria-controls="navbarVerticalMenuPagesAccountMenu">
                                <i class="bi-person-badge nav-icon"></i>
                                <span class="nav-link-title">Paiement</span>
                            </a>

                            <div id="navbarVerticalMenuPagesAccountMenu" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                                <a class="nav-link " href="/subscription-list">Liste des paiements</a>
                            </div>
                        </div>
                        <!-- End Collapse -->

                        <!-- Collapse -->
                        <div class="nav-item">
                            <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesCommandes" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesCommandes" aria-expanded="false" aria-controls="navbarVerticalMenuPagesCommandes">
                                <i class="bi-cart nav-icon"></i>
                                <span class="nav-link-title">Commandes</span>
                            </a>

                            <div id="navbarVerticalMenuPagesCommandes" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                                <a class="nav-link " href="/commandes">Liste des commandes</a>
                                <a class="nav-link " href="/commande/creer">Nouvelle commande</a>
                                <a class="nav-link " href="/commandes/attente">En attente</a>
                                <a class="nav-link " href="/commandes/livrees">Livrées</a>
                            </div>
                        </div>
                        <!-- End Collapse -->

                        <!-- Collapse -->
                        <div class="nav-item">
                            <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesFactures" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesFactures" aria-expanded="false" aria-controls="navbarVerticalMenuPagesFactures">
                                <i class="bi-receipt nav-icon"></i>
                                <span class="nav-link-title">Factures</span>
                            </a>

                            <div id="navbarVerticalMenuPagesFactures" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                                <a class="nav-link " href="/factures">Liste des factures</a>
                                <a class="nav-link " href="/facture/creer">Nouvelle facture</a>
                                <a class="nav-link " href="/factures/impayees">Impayées</a>
                                <a class="nav-link " href="/factures/relances">Relances</a>
                            </div>
                        </div>
                        <!-- End Collapse -->

                        <!-- Collapse -->
                        <div class="nav-item">
                            <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesRapports" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesRapports" aria-expanded="false" aria-controls="navbarVerticalMenuPagesRapports">
                                <i class="bi-graph-up nav-icon"></i>
                                <span class="nav-link-title">Rapports</span>
                            </a>

                            <div id="navbarVerticalMenuPagesRapports" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                                <a class="nav-link " href="/rapports/ventes">Rapport de ventes</a>
                                <a class="nav-link " href="/rapports/stock">Rapport de stock</a>
                                <a class="nav-link " href="/rapports/fournisseurs">Rapport fournisseurs</a>
                                <a class="nav-link " href="/rapports/clients">Rapport clients</a>
                                <a class="nav-link " href="/rapports/financier">Rapport financier</a>
                            </div>
                        </div>
                        <!-- End Collapse -->

                        <!-- Collapse -->
                        <div class="nav-item">
                            <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesMaintenance" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesMaintenance" aria-expanded="false" aria-controls="navbarVerticalMenuPagesMaintenance">
                                <i class="bi-tools nav-icon"></i>
                                <span class="nav-link-title">Maintenance</span>
                            </a>

                            <div id="navbarVerticalMenuPagesMaintenance" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                                <a class="nav-link " href="/maintenance/backup">Sauvegarde</a>
                                <a class="nav-link " href="/maintenance/logs">Logs système</a>
                                <a class="nav-link " href="/maintenance/cache">Cache</a>
                                <a class="nav-link " href="/maintenance/optimisation">Optimisation</a>
                            </div>
                        </div>
                        <!-- End Collapse -->

                        <!-- Collapse -->
                        <div class="nav-item">
                            <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesAccountMenu1" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesAccountMenu1" aria-expanded="false" aria-controls="navbarVerticalMenuPagesAccountMenu1">
                                <i class="bi-person-badge nav-icon"></i>
                                <span class="nav-link-title">Offre d'emploi</span>
                            </a>

                            <div id="navbarVerticalMenuPagesAccountMenu1" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                                <a class="nav-link " href="/offres-emploi/creer">Ajouter une offre</a>
                                <a class="nav-link " href="/job-liste">Liste des offres</a>
                                <a class="nav-link " href="/candidature-list">Candidatures</a>
                            </div>
                        </div>
                        <!-- End Collapse -->

                        <span class="dropdown-header mt-4">Paramètres</span>
                        <small class="bi-three-dots nav-subtitle-replacer"></small>

                        <!-- Collapse -->
                        <div class="nav-item">
                            <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesParametres" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesParametres" aria-expanded="false" aria-controls="navbarVerticalMenuPagesParametres">
                                <i class="bi-gear nav-icon"></i>
                                <span class="nav-link-title">Paramètres</span>
                            </a>

                            <div id="navbarVerticalMenuPagesParametres" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                                <a class="nav-link " href="/parametres/general">Général</a>
                                <a class="nav-link " href="/parametres/entreprise">Entreprise</a>
                                <a class="nav-link " href="/parametres/notifications">Notifications</a>
                                <a class="nav-link " href="/parametres/securite">Sécurité</a>
                                <a class="nav-link " href="/parametres/integrations">Intégrations</a>
                            </div>
                        </div>
                        <!-- End Collapse -->

                        <!-- Collapse -->
                        <div class="nav-item">
                            <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesUtilisateurs" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesUtilisateurs" aria-expanded="false" aria-controls="navbarVerticalMenuPagesUtilisateurs">
                                <i class="bi-person-gear nav-icon"></i>
                                <span class="nav-link-title">Utilisateurs</span>
                            </a>

                            <div id="navbarVerticalMenuPagesUtilisateurs" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                                <a class="nav-link " href="/utilisateurs">Liste des utilisateurs</a>
                                <a class="nav-link " href="/utilisateur/creer">Créer un utilisateur</a>
                                <a class="nav-link " href="/roles">Rôles et permissions</a>
                                <a class="nav-link " href="/activite">Activité utilisateurs</a>
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