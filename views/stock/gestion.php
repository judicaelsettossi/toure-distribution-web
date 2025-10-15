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

    .text-primary-custom { color: var(--primary-color) !important; }
    .text-secondary-custom { color: var(--secondary-color) !important; }
    .bg-primary-custom { background-color: var(--primary-color) !important; }
    .bg-light-primary { background-color: var(--light-primary) !important; }

    .btn-primary-custom {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
    }
    .btn-primary-custom:hover {
        background-color: #d1036d;
        border-color: #d1036d;
        color: white;
    }

    .card-custom {
        border-radius: 12px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        border: none;
    }

    .stats-card {
        background: linear-gradient(135deg, var(--light-primary) 0%, #f8f9fa 100%);
        border-radius: 12px;
        padding: 1.5rem;
        text-align: center;
        transition: all 0.3s ease;
        margin-bottom: 1rem;
    }

    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(240, 4, 128, 0.15);
    }

    .stats-value {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 0.5rem;
    }

    .stats-label {
        color: #6c757d;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.875rem;
        letter-spacing: 0.5px;
    }

    .stats-icon {
        font-size: 3rem;
        color: var(--primary-color);
        margin-bottom: 1rem;
    }

    .action-card {
        background: #fff;
        border-radius: 12px;
        padding: 2rem;
        text-align: center;
        transition: all 0.3s ease;
        border: 2px solid #e9ecef;
        cursor: pointer;
        height: 100%;
    }

    .action-card:hover {
        border-color: var(--primary-color);
        background: var(--light-primary);
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(240, 4, 128, 0.15);
    }

    .action-icon {
        font-size: 3rem;
        color: var(--primary-color);
        margin-bottom: 1rem;
    }

    .action-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--secondary-color);
        margin-bottom: 0.5rem;
    }

    .action-description {
        color: #6c757d;
        font-size: 0.9rem;
        line-height: 1.5;
    }

    .filter-section {
        background: #fff;
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
    }

    .form-control-modern {
        border: 2px solid #e9ecef;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
    }

    .form-control-modern:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(240, 4, 128, 0.25);
    }

    .btn-modern {
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .btn-outline-modern {
        background-color: transparent;
        color: var(--primary-color);
        border: 2px solid var(--primary-color);
    }

    .btn-outline-modern:hover {
        background-color: var(--primary-color);
        color: white;
    }

    .table-modern {
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
    }

    .table-modern thead {
        background: linear-gradient(135deg, var(--secondary-color) 0%, var(--accent-color) 100%);
        color: white;
    }

    .table-modern th {
        border: none;
        padding: 1rem;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.875rem;
        letter-spacing: 0.5px;
    }

    .table-modern td {
        border: none;
        padding: 1rem;
        vertical-align: middle;
    }

    .table-modern tbody tr {
        border-bottom: 1px solid #f8f9fa;
        transition: all 0.3s ease;
    }

    .table-modern tbody tr:hover {
        background-color: var(--light-primary);
    }

    .stock-indicator {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .stock-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        display: inline-block;
    }

    .stock-dot.critical { background-color: #dc3545; }
    .stock-dot.low { background-color: #ffc107; }
    .stock-dot.normal { background-color: #28a745; }

    .loading-spinner {
        display: inline-block;
        width: 1rem;
        height: 1rem;
        border: 2px solid transparent;
        border-top: 2px solid currentColor;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .quick-actions {
        background: linear-gradient(135deg, var(--light-primary) 0%, #f8f9fa 100%);
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 2rem;
    }

    .quick-actions-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--secondary-color);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    @media (max-width: 768px) {
        .stats-card {
            margin-bottom: 1rem;
        }
        
        .action-card {
            margin-bottom: 1rem;
        }
        
        .btn-modern {
            width: 100%;
            justify-content: center;
            margin-bottom: 0.5rem;
        }
    }
</style>

<main id="content" role="main" class="main font-public-sans">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link text-primary-custom" href="/">Tableau de Bord</a></li>
                            <li class="breadcrumb-item active">Gestion de Stock</li>
                        </ol>
                    </nav>
                    <h2 class="mb-0 text-secondary-custom">Gestion des Stocks</h2>
                </div>
                <div class="col-sm-auto">
                    <button class="btn btn-outline-modern me-2" onclick="window.location.href='/stock/ajustement'">
                        <i class="bi-sliders me-1"></i> Ajustement
                    </button>
                    <button class="btn btn-primary-custom" onclick="window.location.href='/stock/entree'">
                        <i class="bi-plus-circle me-1"></i> Entrée de Stock
                    </button>
                </div>
            </div>
        </div>

        <!-- Statistiques -->
        <div class="row mb-4" id="statsContainer">
            <div class="col-md-3 mb-3">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="bi-boxes"></i>
                    </div>
                    <div class="stats-value" id="totalProducts">-</div>
                    <div class="stats-label">Produits en Stock</div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="bi-arrow-up-circle"></i>
                    </div>
                    <div class="stats-value" id="totalMovements">-</div>
                    <div class="stats-label">Mouvements Aujourd'hui</div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="bi-exclamation-triangle"></i>
                    </div>
                    <div class="stats-value" id="lowStockProducts">-</div>
                    <div class="stats-label">Stocks Faibles</div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="bi-building"></i>
                    </div>
                    <div class="stats-value" id="totalWarehouses">-</div>
                    <div class="stats-label">Entrepôts Actifs</div>
                </div>
            </div>
        </div>

        <!-- Actions Rapides -->
        <div class="quick-actions">
            <h5 class="quick-actions-title">
                <i class="bi-lightning text-primary-custom"></i>
                Actions Rapides
            </h5>
            <div class="row">
                <div class="col-md-2 col-sm-4 col-6 mb-3">
                    <button class="btn btn-outline-modern w-100" onclick="window.location.href='/stock/entree'">
                        <i class="bi-plus-circle d-block mb-1"></i>
                        <small>Entrée</small>
                    </button>
                </div>
                <div class="col-md-2 col-sm-4 col-6 mb-3">
                    <button class="btn btn-outline-modern w-100" onclick="window.location.href='/stock/sortie'">
                        <i class="bi-dash-circle d-block mb-1"></i>
                        <small>Sortie</small>
                    </button>
                </div>
                <div class="col-md-2 col-sm-4 col-6 mb-3">
                    <button class="btn btn-outline-modern w-100" onclick="window.location.href='/stock/ajustement'">
                        <i class="bi-sliders d-block mb-1"></i>
                        <small>Ajustement</small>
                    </button>
                </div>
                <div class="col-md-2 col-sm-4 col-6 mb-3">
                    <button class="btn btn-outline-modern w-100" onclick="window.location.href='/stock/reservation'">
                        <i class="bi-bookmark d-block mb-1"></i>
                        <small>Réservation</small>
                    </button>
                </div>
                <div class="col-md-2 col-sm-4 col-6 mb-3">
                    <button class="btn btn-outline-modern w-100" onclick="window.location.href='/stock/mouvements'">
                        <i class="bi-list-ul d-block mb-1"></i>
                        <small>Mouvements</small>
                    </button>
                </div>
                <div class="col-md-2 col-sm-4 col-6 mb-3">
                    <button class="btn btn-outline-modern w-100" onclick="window.location.href='/stock/types-mouvements'">
                        <i class="bi-gear d-block mb-1"></i>
                        <small>Types</small>
                    </button>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Actions Principales -->
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="action-card" onclick="window.location.href='/stock/entree'">
                            <div class="action-icon">
                                <i class="bi-arrow-down-circle"></i>
                            </div>
                            <h5 class="action-title">Entrée de Stock</h5>
                            <p class="action-description">
                                Enregistrer les entrées de produits dans les entrepôts avec détails complets
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="action-card" onclick="window.location.href='/stock/sortie'">
                            <div class="action-icon">
                                <i class="bi-arrow-up-circle"></i>
                            </div>
                            <h5 class="action-title">Sortie de Stock</h5>
                            <p class="action-description">
                                Gérer les sorties de produits avec contrôle des quantités disponibles
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="action-card" onclick="window.location.href='/stock/mouvements'">
                            <div class="action-icon">
                                <i class="bi-arrow-left-right"></i>
                            </div>
                            <h5 class="action-title">Mouvements de Stock</h5>
                            <p class="action-description">
                                Consulter l'historique complet des mouvements avec filtres avancés
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="action-card" onclick="window.location.href='/stock/ajustement'">
                            <div class="action-icon">
                                <i class="bi-sliders"></i>
                            </div>
                            <h5 class="action-title">Ajustements</h5>
                            <p class="action-description">
                                Corriger les écarts d'inventaire et ajuster les quantités en stock
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Produits avec Stocks Faibles -->
                <div class="card card-custom mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi-exclamation-triangle me-2 text-warning"></i>
                            Stocks Faibles
                        </h5>
                    </div>
                    <div class="card-body">
                        <div id="lowStockContainer">
                            <div class="text-center py-3">
                                <div class="loading-spinner text-primary-custom"></div>
                                <p class="mt-2 text-muted">Chargement...</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mouvements Récents -->
                <div class="card card-custom mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi-clock-history me-2 text-primary-custom"></i>
                            Mouvements Récents
                        </h5>
                    </div>
                    <div class="card-body">
                        <div id="recentMovementsContainer">
                            <div class="text-center py-3">
                                <div class="loading-spinner text-primary-custom"></div>
                                <p class="mt-2 text-muted">Chargement...</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Liens Rapides -->
                <div class="card card-custom">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi-link-45deg me-2 text-primary-custom"></i>
                            Liens Rapides
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-modern" onclick="window.location.href='/stock/par-produit'">
                                <i class="bi-box-seam me-2"></i> Stocks par Produit
                            </button>
                            <button class="btn btn-outline-modern" onclick="window.location.href='/stock/par-entrepot'">
                                <i class="bi-building me-2"></i> Stocks par Entrepôt
                            </button>
                            <button class="btn btn-outline-modern" onclick="window.location.href='/stock/types-mouvements'">
                                <i class="bi-gear me-2"></i> Types de Mouvements
                            </button>
                            <button class="btn btn-outline-modern" onclick="window.location.href='/stock/reservation'">
                                <i class="bi-bookmark me-2"></i> Réservations
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        loadStatistics();
        loadLowStockProducts();
        loadRecentMovements();
    });

    async function loadStatistics() {
        try {
            // Charger les statistiques des stocks
            const [productsResponse, movementsResponse, warehousesResponse] = await Promise.all([
                fetch('https://toure.gestiem.com/api/products?per_page=1000'),
                fetch('https://toure.gestiem.com/api/stock-movements?per_page=1000'),
                fetch('https://toure.gestiem.com/api/entrepots?per_page=1000')
            ]);

            let totalProducts = 0;
            let lowStockProducts = 0;
            let totalMovements = 0;
            let totalWarehouses = 0;

            if (productsResponse.ok) {
                const productsResult = await productsResponse.json();
                const products = productsResult.data || [];
                totalProducts = products.length;
                
                // Compter les produits avec stock faible
                lowStockProducts = products.filter(product => {
                    const stock = parseFloat(product.stock_quantity || 0);
                    const minStock = parseFloat(product.min_stock_level || 0);
                    return stock <= minStock && minStock > 0;
                }).length;
            }

            if (movementsResponse.ok) {
                const movementsResult = await movementsResponse.json();
                const movements = movementsResult.data || [];
                
                // Compter les mouvements d'aujourd'hui
                const today = new Date().toISOString().split('T')[0];
                totalMovements = movements.filter(movement => {
                    return movement.created_at && movement.created_at.startsWith(today);
                }).length;
            }

            if (warehousesResponse.ok) {
                const warehousesResult = await warehousesResponse.json();
                const warehouses = warehousesResult.data || [];
                totalWarehouses = warehouses.filter(warehouse => warehouse.is_active !== false).length;
            }

            // Mettre à jour les statistiques
            document.getElementById('totalProducts').textContent = totalProducts;
            document.getElementById('lowStockProducts').textContent = lowStockProducts;
            document.getElementById('totalMovements').textContent = totalMovements;
            document.getElementById('totalWarehouses').textContent = totalWarehouses;

        } catch (error) {
            console.error('Erreur lors du chargement des statistiques:', error);
        }
    }

    async function loadLowStockProducts() {
        try {
            const response = await fetch('https://toure.gestiem.com/api/products?per_page=1000');
            
            if (response.ok) {
                const result = await response.json();
                const products = result.data || [];
                
                const lowStockProducts = products.filter(product => {
                    const stock = parseFloat(product.stock_quantity || 0);
                    const minStock = parseFloat(product.min_stock_level || 0);
                    return stock <= minStock && minStock > 0;
                }).slice(0, 5);

                const container = document.getElementById('lowStockContainer');
                
                if (lowStockProducts.length === 0) {
                    container.innerHTML = `
                        <div class="text-center py-3">
                            <i class="bi-check-circle fs-1 text-success"></i>
                            <p class="mt-2 text-muted">Tous les stocks sont normaux</p>
                        </div>
                    `;
                } else {
                    container.innerHTML = lowStockProducts.map(product => `
                        <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                            <div>
                                <div class="fw-bold text-truncate" style="max-width: 150px;" title="${product.name}">
                                    ${product.name}
                                </div>
                                <small class="text-muted">${product.code}</small>
                            </div>
                            <div class="text-end">
                                <div class="stock-indicator">
                                    <span class="stock-dot ${getStockLevel(product.stock_quantity, product.min_stock_level)}"></span>
                                    <span class="fw-bold">${product.stock_quantity || 0}</span>
                                </div>
                                <small class="text-muted">Min: ${product.min_stock_level || 0}</small>
                            </div>
                        </div>
                    `).join('');
                }
            }
        } catch (error) {
            console.error('Erreur lors du chargement des stocks faibles:', error);
            document.getElementById('lowStockContainer').innerHTML = `
                <div class="text-center py-3">
                    <i class="bi-exclamation-triangle fs-1 text-warning"></i>
                    <p class="mt-2 text-muted">Erreur de chargement</p>
                </div>
            `;
        }
    }

    async function loadRecentMovements() {
        try {
            const response = await fetch('https://toure.gestiem.com/api/stock-movements?per_page=10&sort=created_at&order=desc');
            
            if (response.ok) {
                const result = await response.json();
                const movements = result.data || [];

                const container = document.getElementById('recentMovementsContainer');
                
                if (movements.length === 0) {
                    container.innerHTML = `
                        <div class="text-center py-3">
                            <i class="bi-inbox fs-1 text-muted"></i>
                            <p class="mt-2 text-muted">Aucun mouvement récent</p>
                        </div>
                    `;
                } else {
                    container.innerHTML = movements.map(movement => `
                        <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                            <div>
                                <div class="fw-bold text-truncate" style="max-width: 120px;" title="${movement.reference || 'Mouvement'}">
                                    ${movement.reference || 'Mouvement'}
                                </div>
                                <small class="text-muted">${formatDate(movement.created_at)}</small>
                            </div>
                            <div class="text-end">
                                <span class="badge ${movement.movement_type === 'in' ? 'bg-success' : 'bg-danger'}">
                                    ${movement.movement_type === 'in' ? 'Entrée' : 'Sortie'}
                                </span>
                            </div>
                        </div>
                    `).join('');
                }
            }
        } catch (error) {
            console.error('Erreur lors du chargement des mouvements récents:', error);
            document.getElementById('recentMovementsContainer').innerHTML = `
                <div class="text-center py-3">
                    <i class="bi-exclamation-triangle fs-1 text-warning"></i>
                    <p class="mt-2 text-muted">Erreur de chargement</p>
                </div>
            `;
        }
    }

    function getStockLevel(currentStock, minStock) {
        const stock = parseFloat(currentStock || 0);
        const min = parseFloat(minStock || 0);
        
        if (stock === 0) return 'critical';
        if (stock <= min) return 'low';
        return 'normal';
    }

    function formatDate(dateString) {
        if (!dateString) return '-';
        const date = new Date(dateString);
        return date.toLocaleDateString('fr-FR', {
            day: '2-digit',
            month: '2-digit',
            hour: '2-digit',
            minute: '2-digit'
        });
    }
</script>

<?php
$content = ob_get_clean();
require('./views/layouts/app-layout.php');
?>
