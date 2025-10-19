<?php
$title = 'Tableau de Bord - Toure Distribution';
ob_start();
?>

<style>
    :root {
        --primary-color: #f00480;
        --secondary-color: #010768;
        --accent-color: #010068;
        --light-primary: rgba(240, 4, 128, 0.1);
        --light-secondary: rgba(1, 7, 104, 0.1);
        --success-color: #28a745;
        --warning-color: #ffc107;
        --danger-color: #dc3545;
        --info-color: #17a2b8;
    }

    .font-public-sans {
        font-family: 'Public Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    }

    .text-primary-custom {
        color: var(--primary-color) !important;
    }

    .text-secondary-custom {
        color: var(--secondary-color) !important;
    }

    .text-accent-custom {
        color: var(--accent-color) !important;
    }

    .bg-primary-custom {
        background-color: var(--primary-color) !important;
    }

    .bg-secondary-custom {
        background-color: var(--secondary-color) !important;
    }

    .bg-light-primary {
        background-color: var(--light-primary) !important;
    }

    .btn-primary-custom {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary-custom:hover {
        background-color: #d1036d;
        border-color: #d1036d;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(240, 4, 128, 0.3);
    }

    .hero-section {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 12px;
        padding: 2rem;
        margin-bottom: 2rem;
        border: 1px solid #e9ecef;
        position: relative;
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .stats-card {
        background: white;
        border-radius: 8px;
        padding: 1.5rem;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        border: none;
        transition: all 0.3s ease;
        position: relative;
        border-left: 4px solid var(--primary-color);
    }

    .stats-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(240, 4, 128, 0.2);
    }

    .stats-icon {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: white;
        margin-bottom: 1rem;
    }

    .feature-card {
        background: white;
        border-radius: 8px;
        padding: 1.5rem;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        border: none;
        transition: all 0.3s ease;
        height: 100%;
    }

    .feature-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(240, 4, 128, 0.2);
    }

    .feature-icon {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: white;
        margin-bottom: 1rem;
    }

    .api-section {
        background: white;
        border-radius: 8px;
        padding: 2rem;
        margin: 2rem 0;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        border: 1px solid #e9ecef;
    }

    .api-endpoint {
        background: #f8f9fa;
        border-radius: 6px;
        padding: 1rem;
        margin: 0.5rem 0;
        border-left: 4px solid var(--primary-color);
        transition: all 0.3s ease;
    }

    .api-endpoint:hover {
        transform: translateX(2px);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        background: white;
    }

    .method-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 4px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
    }

    .method-get { background-color: #28a745; color: white; }
    .method-post { background-color: #007bff; color: white; }
    .method-put { background-color: #ffc107; color: #212529; }
    .method-delete { background-color: #dc3545; color: white; }

    .quick-action-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 1rem;
        margin: 2rem 0;
    }

    .quick-action-item {
        background: white;
        border-radius: 8px;
        padding: 1.5rem;
        text-align: center;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        border: 2px dashed #e5e5e5;
        transition: all 0.3s ease;
        cursor: pointer;
        text-decoration: none;
        color: inherit;
    }

    .quick-action-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(240, 4, 128, 0.2);
        border-color: var(--primary-color);
        background-color: var(--light-primary);
        text-decoration: none;
        color: inherit;
    }

    .quick-action-icon {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: white;
        margin: 0 auto 1rem;
    }

    .activity-timeline {
        position: relative;
        padding-left: 2rem;
    }

    .activity-timeline::before {
        content: '';
        position: absolute;
        left: 10px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: linear-gradient(to bottom, var(--primary-color), var(--secondary-color));
    }

    .timeline-item {
        position: relative;
        margin-bottom: 1.5rem;
        background: white;
        border-radius: 8px;
        padding: 1rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    }

    .timeline-item::before {
        content: '';
        position: absolute;
        left: -25px;
        top: 15px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background-color: var(--primary-color);
        border: 3px solid white;
        box-shadow: 0 0 0 2px var(--primary-color);
    }

    .section-title {
        color: var(--secondary-color);
        font-weight: 600;
        font-size: 1.25rem;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .section-title i {
        color: var(--primary-color);
    }


    /* Responsive Design */
    @media (max-width: 768px) {
        .hero-section {
            padding: 2rem 1rem;
        }
        
        .quick-action-grid {
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        }
        
        .stats-card {
            margin-bottom: 1rem;
        }
    }
</style>

<main id="content" role="main" class="main font-public-sans">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="page-header-title text-secondary-custom">
                        <i class="bi-speedometer2 me-2"></i>
                        Tableau de Bord - Toure Distribution
                    </h1>
                    <p class="text-muted mb-0">Vue d'ensemble de votre activité commerciale</p>
                </div>
                <div class="col-auto">
                    <div class="d-flex gap-2">
                        <a href="/vente/creer" class="btn btn-primary-custom">
                            <i class="bi-plus-circle me-1"></i> Nouvelle Vente
                        </a>
                        <a href="https://toure.gestiem.com/docs" target="_blank" class="btn btn-outline-secondary">
                            <i class="bi-book me-1"></i> Documentation API
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistiques Principales -->
        <div class="row mb-5">
            <!-- Chiffre d'Affaires -->
            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="stats-card">
                    <div class="stats-icon bg-primary-custom">
                        <i class="bi-cash-stack"></i>
                    </div>
                    <h6 class="text-muted mb-2">Chiffre d'Affaires</h6>
                    <h2 class="text-secondary-custom mb-3"><?= isset($totalRevenue) ? number_format($totalRevenue, 0, ',', ' ') : '0' ?> FCFA</h2>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-light-primary text-primary-custom me-2">
                            <i class="bi-arrow-up"></i> +12.5%
                        </span>
                        <span class="text-muted small">vs mois dernier</span>
                    </div>
                </div>
            </div>

            <!-- Ventes -->
            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="stats-card">
                    <div class="stats-icon bg-secondary-custom">
                        <i class="bi-receipt"></i>
                    </div>
                    <h6 class="text-muted mb-2">Ventes du Mois</h6>
                    <h2 class="text-secondary-custom mb-3"><?= isset($totalVentes) ? $totalVentes : '0' ?></h2>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-light-primary text-primary-custom me-2">
                            <i class="bi-arrow-up"></i> +8.2%
                        </span>
                        <span class="text-muted small">vs mois dernier</span>
                    </div>
                </div>
            </div>

            <!-- Clients Actifs -->
            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="stats-card">
                    <div class="stats-icon" style="background-color: var(--accent-color);">
                        <i class="bi-people"></i>
                    </div>
                    <h6 class="text-muted mb-2">Clients Actifs</h6>
                    <h2 class="text-secondary-custom mb-3"><?= isset($activeClients) ? $activeClients : '0' ?></h2>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-light-primary text-primary-custom me-2">
                            <i class="bi-arrow-up"></i> +15.3%
                        </span>
                        <span class="text-muted small">nouveaux clients</span>
                    </div>
                </div>
            </div>

            <!-- Produits -->
            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="stats-card">
                    <div class="stats-icon bg-success">
                        <i class="bi-box"></i>
                    </div>
                    <h6 class="text-muted mb-2">Produits en Stock</h6>
                    <h2 class="text-secondary-custom mb-3"><?= isset($totalProducts) ? $totalProducts : '0' ?></h2>
                    <div class="d-flex align-items-center">
                        <span class="badge bg-success-subtle text-success me-2">
                            <i class="bi-check-circle"></i> Disponible
                        </span>
                        <span class="text-muted small">en stock</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions Rapides -->
        <div class="row mb-5">
            <div class="col-12">
                <h4 class="text-secondary-custom mb-3">Actions Rapides</h4>
                <div class="row">
                    <div class="col-md-2 col-sm-4 mb-3">
                        <div class="card quick-action-item h-100 text-center p-3" onclick="window.location.href='/vente/creer'">
                            <div class="stats-icon bg-primary-custom mx-auto mb-2">
                                <i class="bi-cart-plus"></i>
                            </div>
                            <h6 class="mb-0">Nouvelle Vente</h6>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 mb-3">
                        <div class="card quick-action-item h-100 text-center p-3" onclick="window.location.href='/client/ajouter'">
                            <div class="stats-icon bg-secondary-custom mx-auto mb-2">
                                <i class="bi-person-plus"></i>
                            </div>
                            <h6 class="mb-0">Nouveau Client</h6>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 mb-3">
                        <div class="card quick-action-item h-100 text-center p-3" onclick="window.location.href='/commande/creer'">
                            <div class="stats-icon" style="background-color: var(--accent-color);" class="mx-auto mb-2">
                                <i class="bi-bag-plus"></i>
                            </div>
                            <h6 class="mb-0">Nouvelle Commande</h6>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 mb-3">
                        <div class="card quick-action-item h-100 text-center p-3" onclick="window.location.href='/livraison/creer'">
                            <div class="stats-icon bg-info mx-auto mb-2">
                                <i class="bi-truck"></i>
                            </div>
                            <h6 class="mb-0">Nouvelle Livraison</h6>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 mb-3">
                        <div class="card quick-action-item h-100 text-center p-3" onclick="window.location.href='/produit/ajouter'">
                            <div class="stats-icon bg-success mx-auto mb-2">
                                <i class="bi-box"></i>
                            </div>
                            <h6 class="mb-0">Nouveau Produit</h6>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 mb-3">
                        <div class="card quick-action-item h-100 text-center p-3" onclick="window.location.href='/creer-un-entrepot'">
                            <div class="stats-icon bg-warning mx-auto mb-2">
                                <i class="bi-building"></i>
                            </div>
                            <h6 class="mb-0">Nouvel Entrepôt</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Liens Rapides vers les Listes -->
        <div class="row mb-5">
            <div class="col-12">
                <h4 class="text-secondary-custom mb-3">Accès Rapide aux Listes</h4>
                <div class="row">
                    <div class="col-md-2 col-sm-4 mb-3">
                        <a href="/vente" class="btn btn-outline-primary w-100">
                            <i class="bi-cart me-2"></i>Ventes
                        </a>
                    </div>
                    <div class="col-md-2 col-sm-4 mb-3">
                        <a href="/liste-client" class="btn btn-outline-primary w-100">
                            <i class="bi-people me-2"></i>Clients
                        </a>
                    </div>
                    <div class="col-md-2 col-sm-4 mb-3">
                        <a href="/commandes" class="btn btn-outline-primary w-100">
                            <i class="bi-bag me-2"></i>Commandes
                        </a>
                    </div>
                    <div class="col-md-2 col-sm-4 mb-3">
                        <a href="/livraison" class="btn btn-outline-primary w-100">
                            <i class="bi-truck me-2"></i>Livraisons
                        </a>
                    </div>
                    <div class="col-md-2 col-sm-4 mb-3">
                        <a href="/produit/liste" class="btn btn-outline-primary w-100">
                            <i class="bi-box me-2"></i>Produits
                        </a>
                    </div>
                    <div class="col-md-2 col-sm-4 mb-3">
                        <a href="/entrepots" class="btn btn-outline-primary w-100">
                            <i class="bi-building me-2"></i>Entrepôts
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section API Documentation -->
        <div class="api-section">
            <div class="row">
                <div class="col-12">
                    <h4 class="text-secondary-custom mb-3">
                        <i class="bi-code-slash me-2"></i>
                        Documentation API
                    </h4>
                    <p class="text-muted mb-4">
                        Découvrez notre API complète pour intégrer Toure Distribution dans vos applications.
                    </p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-8 mb-4">
                    <h5 class="text-secondary-custom mb-3">Endpoints Principaux</h5>
                    
                    <div class="api-endpoint">
                        <div class="d-flex align-items-center mb-2">
                            <span class="method-badge method-get me-3">GET</span>
                            <code>/api/clients</code>
                        </div>
                        <p class="text-muted small mb-0">Récupérer la liste des clients</p>
                    </div>
                    
                    <div class="api-endpoint">
                        <div class="d-flex align-items-center mb-2">
                            <span class="method-badge method-post me-3">POST</span>
                            <code>/api/ventes</code>
                        </div>
                        <p class="text-muted small mb-0">Créer une nouvelle vente</p>
                    </div>
                    
                    <div class="api-endpoint">
                        <div class="d-flex align-items-center mb-2">
                            <span class="method-badge method-put me-3">PUT</span>
                            <code>/api/commandes/{id}</code>
                        </div>
                        <p class="text-muted small mb-0">Mettre à jour une commande</p>
                    </div>
                    
                    <div class="api-endpoint">
                        <div class="d-flex align-items-center mb-2">
                            <span class="method-badge method-delete me-3">DELETE</span>
                            <code>/api/produits/{id}</code>
                        </div>
                        <p class="text-muted small mb-0">Supprimer un produit</p>
                    </div>
                </div>
                
                <div class="col-lg-4 mb-4">
                    <div class="text-center">
                        <a href="https://toure.gestiem.com/docs" target="_blank" class="btn btn-primary-custom">
                            <i class="bi-book me-2"></i> Voir la Documentation Complète
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Activités Récentes -->
        <div class="row mb-5">
            <div class="col-lg-8 mb-4">
                <div class="card border-0 h-100">
                    <div class="card-header bg-transparent">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title text-secondary-custom mb-0">
                                <i class="bi-clock-history me-2"></i>Activités Récentes
                            </h5>
                            <a href="#" class="btn btn-sm btn-outline-primary">Voir tout</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="activity-timeline">
                            <div class="timeline-item">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="mb-1">Nouvelle vente créée</h6>
                                        <p class="text-muted mb-1 small">Vente #VTE-2025-001 pour DEMBA ABENGOUROU</p>
                                        <span class="text-muted small">Il y a 2 heures</span>
                                    </div>
                                    <span class="badge bg-light-primary text-primary-custom">Vente</span>
                                </div>
                            </div>

                            <div class="timeline-item">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="mb-1">Livraison effectuée</h6>
                                        <p class="text-muted mb-1 small">300 PARB BONJOURNE 50KG livrés par Kone Yacouba</p>
                                        <span class="text-muted small">Il y a 4 heures</span>
                                    </div>
                                    <span class="badge bg-success-subtle text-success">Livraison</span>
                                </div>
                            </div>

                            <div class="timeline-item">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="mb-1">Nouveau client ajouté</h6>
                                        <p class="text-muted mb-1 small">GAOUSSO TOUMOUKRO inscrit comme client long terme</p>
                                        <span class="text-muted small">Il y a 6 heures</span>
                                    </div>
                                    <span class="badge bg-info-subtle text-info">Client</span>
                                </div>
                            </div>

                            <div class="timeline-item">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="mb-1">Commande reçue</h6>
                                        <p class="text-muted mb-1 small">1000 PARB GRETEL IND 50KG ajoutés au stock</p>
                                        <span class="text-muted small">Hier à 14:30</span>
                                    </div>
                                    <span class="badge bg-warning-subtle text-warning">Commande</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Indicateurs & Alertes -->
            <div class="col-lg-4 mb-4">
                <div class="row">
                    <!-- Produits en Alerte -->
                    <div class="col-12 mb-3">
                        <div class="card border-0 border-left-danger">
                            <div class="card-header bg-transparent">
                                <h6 class="card-title text-danger mb-0">
                                    <i class="bi-exclamation-triangle me-2"></i>Alertes Stock
                                </h6>
                            </div>
                            <div class="card-body pt-2">
                                <div class="small">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>RIZ PARFUME 50KG</span>
                                        <span class="text-danger">5 restants</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>SUCRE BLANC 25KG</span>
                                        <span class="text-warning">12 restants</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>FARINE DE BLE 50KG</span>
                                        <span class="text-danger">3 restants</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Top Produits -->
                    <div class="col-12 mb-3">
                        <div class="card border-0">
                            <div class="card-header bg-transparent">
                                <h6 class="card-title text-secondary-custom mb-0">
                                    <i class="bi-trophy me-2"></i>Top Produits
                                </h6>
                            </div>
                            <div class="card-body pt-2">
                                <div class="small">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span>PARB DADA 50KG</span>
                                        <div>
                                            <span class="text-primary-custom fw-bold">800</span>
                                            <span class="text-muted">vendus</span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span>PARB GRETEL IND 50KG</span>
                                        <div>
                                            <span class="text-primary-custom fw-bold">650</span>
                                            <span class="text-muted">vendus</span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>KC MARACANA VIET 50K</span>
                                        <div>
                                            <span class="text-primary-custom fw-bold">420</span>
                                            <span class="text-muted">vendus</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Objectifs du Mois -->
                    <div class="col-12">
                        <div class="card border-0">
                            <div class="card-header bg-transparent">
                                <h6 class="card-title text-secondary-custom mb-0">
                                    <i class="bi-bullseye me-2"></i>Objectifs du Mois
                                </h6>
                            </div>
                            <div class="card-body pt-2">
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="small">Chiffre d'Affaires</span>
                                        <span class="small text-primary-custom">75%</span>
                                    </div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-primary-custom" style="width: 75%"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="small">Nouveaux Clients</span>
                                        <span class="small text-secondary-custom">60%</span>
                                    </div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-secondary-custom" style="width: 60%"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="small">Livraisons</span>
                                        <span class="small" style="color: var(--accent-color);">90%</span>
                                    </div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar" style="background-color: var(--accent-color); width: 90%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Footer -->
        <div class="footer mt-5 pt-4 border-top">
            <div class="row justify-content-between align-items-center">
                <div class="col">
                    <p class="fs-6 mb-0 text-muted">
                        &copy; <?= date('Y') ?> Toure Distribution. Tous droits réservés.
                    </p>
                </div>
                <div class="col-auto">
                    <div class="d-flex justify-content-end">
                        <ul class="list-inline list-separator">
                            <li class="list-inline-item">
                                <a class="list-separator-link text-primary-custom" href="https://toure.gestiem.com/docs" target="_blank">
                                    <i class="bi-book me-1"></i> Documentation
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="list-separator-link text-primary-custom" href="#">
                                    <i class="bi-question-circle me-1"></i> Aide
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="list-separator-link text-primary-custom" href="#">
                                    <i class="bi-headset me-1"></i> Support
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <span class="text-muted">Version 1.0</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    // Animation des cartes au survol
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.stats-card, .quick-action-item');
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
                this.style.boxShadow = '0 4px 15px rgba(240, 4, 128, 0.2)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = '0 2px 15px rgba(0, 0, 0, 0.08)';
            });
        });

        // Animation des actions rapides
        const quickActions = document.querySelectorAll('.quick-action-item');
        quickActions.forEach(action => {
            action.addEventListener('click', function() {
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                }, 150);
            });
        });
    });

    // Fonction pour actualiser les données
    function refreshDashboard() {
        // Animation de chargement
        const refreshBtn = document.querySelector('.btn-outline-secondary');
        if (refreshBtn) {
            const originalText = refreshBtn.innerHTML;
            refreshBtn.innerHTML = '<i class="bi-arrow-clockwise spin me-1"></i> Actualisation...';
            refreshBtn.disabled = true;

            // Simulation de rechargement
            setTimeout(() => {
                refreshBtn.innerHTML = originalText;
                refreshBtn.disabled = false;
                // Ici vous pouvez ajouter la logique AJAX pour actualiser les données
            }, 2000);
        }
    }

    // Animation de rotation pour l'icône refresh
    const style = document.createElement('style');
    style.textContent = `
    .spin {
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
`;
    document.head.appendChild(style);
</script>

<?php
$content = ob_get_clean();
require('./views/layouts/app-layout.php');
?>