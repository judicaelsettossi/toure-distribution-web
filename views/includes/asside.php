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
                    </div>
                    <!-- End Collapse -->
                </div>

            </div>
            <!-- End Content -->
        </div>
    </div>
</aside>