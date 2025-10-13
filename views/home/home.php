<?php ob_start(); ?>

<style>
    :root {
        --primary-color: #f00480;
        --secondary-color: #010768;
        --accent-color: #010068;
        --light-primary: rgba(240, 4, 128, 0.1);
        --light-secondary: rgba(1, 7, 104, 0.1);
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
    }

    .btn-primary-custom:hover {
        background-color: #d1036d;
        border-color: #d1036d;
    }

    .card-stats {
        border-left: 4px solid var(--primary-color);
        transition: all 0.3s ease;
    }

    .card-stats:hover {
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
    }

    .quick-action-card {
        border: 2px dashed #e5e5e5;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .quick-action-card:hover {
        border-color: var(--primary-color);
        background-color: var(--light-primary);
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
    }

    .timeline-item::before {
        content: '';
        position: absolute;
        left: -25px;
        top: 5px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background-color: var(--primary-color);
        border: 3px solid white;
        box-shadow: 0 0 0 2px var(--primary-color);
    }

    /* Pour cacher la scrollbar mais garder le scroll */
    html,
    body {
        overflow: auto;
        /* ou scroll */
    }

    /* Chrome, Safari et autres basés sur Webkit */
    ::-webkit-scrollbar {
        display: none;
    }

    /* Firefox */
    html {
        scrollbar-width: none;
        /* enlève la scrollbar */
    }

    /* Internet Explorer et Edge ancien */
    html {
        -ms-overflow-style: none;
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
                        <button class="btn btn-primary-custom">
                            <i class="bi-plus-circle me-1"></i> Nouvelle Facture
                        </button>
                        <button class="btn btn-outline-secondary">
                            <i class="bi-download me-1"></i> Exporter
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistiques Principales -->
        <div class="row mb-5">
            <!-- Chiffre d'Affaires -->
            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="card card-stats h-100 border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h6 class="card-subtitle text-muted mb-1">Chiffre d'Affaires</h6>
                                <h2 class="text-secondary-custom mb-0"><?= number_format($totalRevenue, 0, ',', ' ') ?> FCFA</h2>
                            </div>
                            <div class="stats-icon bg-primary-custom">
                                <i class="bi-cash-stack"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="badge bg-light-primary text-primary-custom me-2">
                                <i class="bi-arrow-up"></i> +12.5%
                            </span>
                            <span class="text-muted small">vs mois dernier</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Nombre de Factures -->
            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="card card-stats h-100 border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h6 class="card-subtitle text-muted mb-1">Factures du Mois</h6>
                                <h2 class="text-secondary-custom mb-0"><?= $totalInvoices ?></h2>
                            </div>
                            <div class="stats-icon bg-secondary-custom">
                                <i class="bi-receipt"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="badge bg-light-primary text-primary-custom me-2">
                                <i class="bi-arrow-up"></i> +8.2%
                            </span>
                            <span class="text-muted small">vs mois dernier</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Clients Actifs -->
            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="card card-stats h-100 border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h6 class="card-subtitle text-muted mb-1">Clients Actifs</h6>
                                <h2 class="text-secondary-custom mb-0"><?= $activeClients ?></h2>
                            </div>
                            <div class="stats-icon" style="background-color: var(--accent-color);">
                                <i class="bi-people"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="badge bg-light-primary text-primary-custom me-2">
                                <i class="bi-arrow-up"></i> +15.3%
                            </span>
                            <span class="text-muted small">nouveaux clients</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stock Critique -->
            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="card card-stats h-100 border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h6 class="card-subtitle text-muted mb-1">Produits en Rupture</h6>
                                <h2 class="text-danger mb-0"><?= $lowStockProducts ?></h2>
                            </div>
                            <div class="stats-icon bg-danger">
                                <i class="bi-exclamation-triangle"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="badge bg-danger-subtle text-danger me-2">
                                <i class="bi-arrow-down"></i> Attention
                            </span>
                            <span class="text-muted small">réassort nécessaire</span>
                        </div>
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
                        <div class="card quick-action-card h-100 text-center p-3" onclick="window.location.href='nouvelle-facture.php'">
                            <div class="stats-icon bg-primary-custom mx-auto mb-2">
                                <i class="bi-receipt-cutoff"></i>
                            </div>
                            <h6 class="mb-0">Nouvelle Facture</h6>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 mb-3">
                        <div class="card quick-action-card h-100 text-center p-3" onclick="window.location.href='/client/ajouter'">
                            <div class="stats-icon bg-secondary-custom mx-auto mb-2">
                                <i class="bi-person-plus"></i>
                            </div>
                            <h6 class="mb-0">Nouveau Client</h6>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 mb-3">
                        <div class="card quick-action-card h-100 text-center p-3" onclick="window.location.href='entree-stock.php'">
                            <div class="stats-icon" style="background-color: var(--accent-color);" class="mx-auto mb-2">
                                <i class="bi-box-arrow-in-down"></i>
                            </div>
                            <h6 class="mb-0">Entrée Stock</h6>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 mb-3">
                        <div class="card quick-action-card h-100 text-center p-3" onclick="window.location.href='livraisons.php'">
                            <div class="stats-icon bg-info mx-auto mb-2">
                                <i class="bi-truck"></i>
                            </div>
                            <h6 class="mb-0">Livraisons</h6>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 mb-3">
                        <div class="card quick-action-card h-100 text-center p-3" onclick="window.location.href='encaissements.php'">
                            <div class="stats-icon bg-success mx-auto mb-2">
                                <i class="bi-credit-card"></i>
                            </div>
                            <h6 class="mb-0">Encaissements</h6>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 mb-3">
                        <div class="card quick-action-card h-100 text-center p-3" onclick="window.location.href='rapports.php'">
                            <div class="stats-icon bg-warning mx-auto mb-2">
                                <i class="bi-graph-up"></i>
                            </div>
                            <h6 class="mb-0">Rapports</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenu Principal -->
        <div class="row">
            <!-- Activités Récentes -->
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
                                        <h6 class="mb-1">Nouvelle facture créée</h6>
                                        <p class="text-muted mb-1 small">Facture #FAC-2025-001 pour DEMBA ABENGOUROU</p>
                                        <span class="text-muted small">Il y a 2 heures</span>
                                    </div>
                                    <span class="badge bg-light-primary text-primary-custom">Facture</span>
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
                                        <h6 class="mb-1">Entrée de stock</h6>
                                        <p class="text-muted mb-1 small">1000 PARB GRETEL IND 50KG ajoutés au stock</p>
                                        <span class="text-muted small">Hier à 14:30</span>
                                    </div>
                                    <span class="badge bg-warning-subtle text-warning">Stock</span>
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
    <div class="footer">
        <div class="row justify-content-between align-items-center">
            <div class="col">
                <p class="fs-6 mb-0 text-muted">&copy; <?= date('Y') ?> Toure Distribution. Tous droits réservés.</p>
            </div>
            <div class="col-auto">
                <div class="d-flex justify-content-end">
                    <ul class="list-inline list-separator">
                        <li class="list-inline-item">
                            <a class="list-separator-link text-primary-custom" href="#">Aide</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="list-separator-link text-primary-custom" href="#">Support</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="list-separator-link text-primary-custom" href="#">Version 1.0</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    // Animation des cartes au survol
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.card-stats');
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
                this.style.boxShadow = '0 8px 25px rgba(240, 4, 128, 0.15)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = '0 2px 4px rgba(0,0,0,0.1)';
            });
        });

        // Animation des actions rapides
        const quickActions = document.querySelectorAll('.quick-action-card');
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