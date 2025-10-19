<style>
    :root {
        --primary-color: #f00480;
        --secondary-color: #010768;
        --accent-color: #010068;
        --light-primary: rgba(240, 4, 128, 0.1);
    }

    .font-public-sans {
        font-family: 'Public Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    }

    #header {
        border-bottom: 3px solid var(--primary-color);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .search-input-custom:focus {
        border-color: var(--primary-color) !important;
        box-shadow: 0 0 0 0.2rem rgba(240, 4, 128, 0.15) !important;
    }

    .navbar-dropdown-account-wrapper:hover .avatar {
        transform: scale(1.05);
        transition: transform 0.2s ease;
    }

    .dropdown-item:hover {
        background-color: var(--light-primary);
        color: var(--primary-color);
    }

    .badge-pro {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        font-weight: 600;
        color: white !important;
    }

    .status-indicator {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        display: inline-block;
        margin-right: 8px;
    }

    .company-badge {
        background: linear-gradient(135deg, var(--secondary-color) 0%, var(--accent-color) 100%);
    }

    .notification-badge {
        position: absolute;
        top: -5px;
        right: -5px;
        background-color: var(--primary-color);
        color: white;
        border-radius: 10px;
        padding: 2px 6px;
        font-size: 0.7rem;
        font-weight: 600;
    }

    .navbar-icon-btn {
        position: relative;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        border: none;
        background: transparent;
    }

    .navbar-icon-btn:hover {
        background-color: var(--light-primary);
        color: var(--primary-color);
    }

    .quick-access-item {
        text-decoration: none;
        color: inherit;
        transition: all 0.3s ease;
    }

    .quick-access-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 12px rgba(240, 4, 128, 0.15);
    }

    .text-primary-custom {
        color: var(--primary-color) !important;
    }

    .text-danger-custom {
        color: #dc3545;
    }
</style>

<header id="header" class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-container navbar-bordered bg-white font-public-sans">
    <div class="navbar-nav-wrap">
        <!-- Logo -->
        <a class="navbar-brand" href="/" aria-label="Front">
            <img class="navbar-brand-logo" src="/assets/svg/logos/logo.png" alt="Logo" data-hs-theme-appearance="default">
            <img class="navbar-brand-logo" src="/assets/svg/logos/logo.png" alt="Logo" data-hs-theme-appearance="dark">
            <img class="navbar-brand-logo-mini" src="/assets/svg/logos/logo-short.svg" alt="Logo" data-hs-theme-appearance="default">
            <img class="navbar-brand-logo-mini" src="/assets/svg/logos-light/logo-short.svg" alt="Logo" data-hs-theme-appearance="dark">
        </a>
        <!-- End Logo -->

        <div class="navbar-nav-wrap-content-start">
            <!-- Navbar Vertical Toggle -->
            <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
                <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Réduire"></i>
                <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Développer"></i>
            </button>
            <!-- End Navbar Vertical Toggle -->

            <!-- Search Form -->
            <div class="dropdown ms-2">
                <div class="d-none d-lg-block">
                    <div class="input-group input-group-merge input-group-borderless input-group-hover-light navbar-input-group">
                        <div class="input-group-prepend input-group-text">
                            <i class="bi-search"></i>
                        </div>
                        <input type="search" class="js-form-search form-control search-input-custom" placeholder="Rechercher clients, produits, factures..." aria-label="Rechercher" data-hs-form-search-options='{
                       "clearIcon": "#clearSearchResultsIcon",
                       "dropMenuElement": "#searchDropdownMenu",
                       "dropMenuOffset": 20,
                       "toggleIconOnFocus": true,
                       "activeClass": "focus"
                     }'>
                        <a class="input-group-append input-group-text" href="javascript:;">
                            <i id="clearSearchResultsIcon" class="bi-x-lg" style="display: none;"></i>
                        </a>
                    </div>
                </div>

                <button class="js-form-search js-form-search-mobile-toggle btn btn-ghost-secondary btn-icon rounded-circle d-lg-none" type="button" data-hs-form-search-options='{
                       "clearIcon": "#clearSearchResultsIcon",
                       "dropMenuElement": "#searchDropdownMenu",
                       "dropMenuOffset": 20,
                       "toggleIconOnFocus": true,
                       "activeClass": "focus"
                     }'>
                    <i class="bi-search"></i>
                </button>
            </div>
            <!-- End Search Form -->
        </div>

        <div class="navbar-nav-wrap-content-end">
            <ul class="navbar-nav">
                <!-- Notifications -->
                <li class="nav-item d-none d-sm-inline-block">
                    <button class="navbar-icon-btn nav-link" type="button" data-bs-toggle="tooltip" title="Notifications">
                        <i class="bi-bell fs-5"></i>
                        <span class="notification-badge">0</span>
                    </button>
                </li>

                <!-- Account -->
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="navbar-dropdown-account-wrapper" href="javascript:;" id="accountNavbarDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                            <div class="avatar avatar-sm avatar-circle">
                                <img class="avatar-img" src="/assets/img/160x160/defaut.jpg" alt="Photo de profil">
                                <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                            </div>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 18rem;">
                            <!-- User Info -->
                            <div class="dropdown-item-text">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-sm avatar-circle">
                                        <img class="avatar-img" src="/assets/img/160x160/defaut.jpg" alt="Avatar">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="mb-0"><?php echo $lastname . ' ' . $firstname; ?></h5>
                                        <p class="card-text text-body small mb-0"><?php echo $email; ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-divider"></div>

                            <!-- Status -->
                            <div class="dropdown">
                                <a class="navbar-dropdown-submenu-item dropdown-item dropdown-toggle d-flex align-items-center" href="javascript:;" id="navSubmenuPagesAccountDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="status-indicator bg-success"></span>
                                    <span>Statut</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-sub-menu" aria-labelledby="navSubmenuPagesAccountDropdown1">
                                    <a class="dropdown-item" href="#">
                                        <span class="status-indicator bg-success"></span> Disponible
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <span class="status-indicator bg-danger"></span> Occupé
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <span class="status-indicator bg-warning"></span> En pause
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">
                                        <span class="status-indicator bg-secondary"></span> Hors ligne
                                    </a>
                                </div>
                            </div>

                            <div class="dropdown-divider"></div>

                            <!-- Quick Links -->
                            <a class="dropdown-item" href="/profil">
                                <i class="bi-person dropdown-item-icon"></i> Mon Profil
                            </a>
                            <a class="dropdown-item" href="/parametres">
                                <i class="bi-gear dropdown-item-icon"></i> Paramètres
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- Company Info -->
                            <div class="dropdown-item-text">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm avatar-circle company-badge">
                                            <span class="avatar-initials text-white fw-bold">TD</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-2">
                                        <h6 class="mb-0">
                                            Toure Distribution
                                            <span class="badge badge-pro text-uppercase ms-1">PRO</span>
                                        </h6>
                                        <span class="card-text small text-muted">Licence Premium</span>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-divider"></div>

                            <div class="dropdown-divider"></div>

                            <!-- Logout -->
                            <a class="dropdown-item text-danger-custom" href="/logout">
                                <i class="bi-box-arrow-right dropdown-item-icon"></i> Déconnexion
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialiser les tooltips
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>