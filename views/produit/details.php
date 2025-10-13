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
        color: white;
    }

    .btn-secondary-custom {
        background-color: var(--secondary-color);
        border-color: var(--secondary-color);
        color: white;
    }

    .btn-secondary-custom:hover {
        background-color: #020a7a;
        border-color: #020a7a;
        color: white;
    }

    /* Product Header */
    .product-header {
        background: linear-gradient(135deg, var(--secondary-color) 0%, var(--accent-color) 100%);
        color: white;
        border-radius: 12px;
        padding: 2rem;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .product-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle, rgba(240, 4, 128, 0.1) 0%, transparent 70%);
        border-radius: 50%;
    }

    .product-image-large {
        width: 120px;
        height: 120px;
        border-radius: 12px;
        object-fit: cover;
        border: 4px solid rgba(255, 255, 255, 0.2);
        background: rgba(255, 255, 255, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        color: rgba(255, 255, 255, 0.7);
    }

    .product-title {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .product-subtitle {
        font-size: 1.1rem;
        opacity: 0.9;
        margin-bottom: 1rem;
    }

    .product-badge {
        background: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 20px;
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
        font-weight: 600;
    }

    /* Info Cards */
    .info-card {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        border-left: 4px solid var(--primary-color);
        transition: all 0.3s ease;
        height: 100%;
    }

    .info-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 20px rgba(240, 4, 128, 0.15);
    }

    .info-card-header {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }

    .info-card-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background-color: var(--light-primary);
        color: var(--primary-color);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        font-size: 1.2rem;
    }

    .info-card-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--secondary-color);
        margin: 0;
    }

    .info-card-value {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 0.5rem;
    }

    .info-card-label {
        font-size: 0.875rem;
        color: #6c757d;
        margin: 0;
    }

    /* Price Display */
    .price-display {
        background: linear-gradient(135deg, var(--light-primary) 0%, rgba(1, 7, 104, 0.1) 100%);
        border-radius: 12px;
        padding: 1.5rem;
        text-align: center;
        border: 2px solid var(--primary-color);
    }

    .price-main {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
    }

    .price-label {
        font-size: 1rem;
        color: var(--secondary-color);
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .price-details {
        display: flex;
        justify-content: space-around;
        gap: 1rem;
    }

    .price-item {
        text-align: center;
    }

    .price-item-value {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--secondary-color);
        margin-bottom: 0.25rem;
    }

    .price-item-label {
        font-size: 0.75rem;
        color: #6c757d;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Stock Indicator */
    .stock-indicator {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 1.1rem;
    }

    .stock-indicator.low {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .stock-indicator.medium {
        background-color: #fff3cd;
        color: #856404;
        border: 1px solid #ffeaa7;
    }

    .stock-indicator.high {
        background-color: #d1edff;
        color: #0c5460;
        border: 1px solid #b8daff;
    }

    .stock-icon {
        font-size: 1.5rem;
    }

    /* Timeline */
    .timeline {
        position: relative;
        padding-left: 2rem;
    }

    .timeline::before {
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
        margin-bottom: 2rem;
        background: white;
        border-radius: 8px;
        padding: 1rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
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

    .timeline-date {
        font-size: 0.875rem;
        color: #6c757d;
        font-weight: 600;
    }

    .timeline-title {
        font-size: 1rem;
        font-weight: 600;
        color: var(--secondary-color);
        margin: 0.5rem 0;
    }

    .timeline-description {
        font-size: 0.875rem;
        color: #6c757d;
        margin: 0;
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .action-btn {
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

    .action-btn:hover {
        transform: translateY(-2px);
        text-decoration: none;
    }

    .action-btn.primary {
        background-color: var(--primary-color);
        color: white;
    }

    .action-btn.primary:hover {
        background-color: #d1036d;
        color: white;
    }

    .action-btn.secondary {
        background-color: var(--secondary-color);
        color: white;
    }

    .action-btn.secondary:hover {
        background-color: #020a7a;
        color: white;
    }

    .action-btn.outline {
        background-color: transparent;
        border: 2px solid var(--primary-color);
        color: var(--primary-color);
    }

    .action-btn.outline:hover {
        background-color: var(--primary-color);
        color: white;
    }

    .action-btn.danger {
        background-color: #dc3545;
        color: white;
    }

    .action-btn.danger:hover {
        background-color: #c82333;
        color: white;
    }

    /* Loading States */
    .loading-skeleton {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: loading 1.5s infinite;
        border-radius: 4px;
        height: 1rem;
    }

    @keyframes loading {
        0% { background-position: 200% 0; }
        100% { background-position: -200% 0; }
    }

    .skeleton-text {
        margin-bottom: 0.5rem;
    }

    .skeleton-text.large {
        height: 2rem;
    }

    .skeleton-text.medium {
        height: 1.5rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .product-header {
            padding: 1.5rem;
        }

        .product-title {
            font-size: 1.5rem;
        }

        .price-main {
            font-size: 2rem;
        }

        .action-buttons {
            flex-direction: column;
        }

        .action-btn {
            justify-content: center;
        }
    }
</style>

<main id="content" role="main" class="main font-public-sans">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="row align-items-center">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/" class="text-primary-custom">Tableau de Bord</a></li>
                            <li class="breadcrumb-item"><a href="/produit/liste" class="text-primary-custom">Produits</a></li>
                            <li class="breadcrumb-item active" id="breadcrumbProduct">Détails Produit</li>
                        </ol>
                    </nav>
                    <h1 class="page-header-title text-secondary-custom">
                        <i class="bi-box-seam me-2"></i>
                        Détails du Produit
                    </h1>
                </div>
                <div class="col-auto">
                    <div class="action-buttons">
                        <a href="/produit/liste" class="action-btn outline">
                            <i class="bi-arrow-left me-1"></i> Retour à la liste
                        </a>
                        <a href="#" id="editProductBtn" class="action-btn primary">
                            <i class="bi-pencil me-1"></i> Modifier
                        </a>
                        <button onclick="deleteProduct()" class="action-btn danger">
                            <i class="bi-trash me-1"></i> Supprimer
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Loading State -->
        <div id="loadingState" class="text-center py-5">
            <div class="spinner-border text-primary-custom" role="status">
                <span class="visually-hidden">Chargement...</span>
            </div>
            <p class="text-muted mt-3">Chargement des détails du produit...</p>
        </div>

        <!-- Product Details Content -->
        <div id="productContent" style="display: none;">
            <!-- Product Header -->
            <div class="product-header">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <div class="product-image-large" id="productImageLarge">
                            <i class="bi-image"></i>
                        </div>
                    </div>
                    <div class="col">
                        <h1 class="product-title" id="productName">-</h1>
                        <p class="product-subtitle" id="productDescription">-</p>
                        <div class="d-flex gap-2 flex-wrap">
                            <span class="product-badge" id="productCategory">-</span>
                            <span class="product-badge" id="productStatus">-</span>
                            <span class="product-badge" id="productCreated">-</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="row">
                <!-- Left Column - Product Info -->
                <div class="col-lg-8">
                    <!-- Price Information -->
                    <div class="price-display mb-4">
                        <div class="price-label">Prix de Vente</div>
                        <div class="price-main" id="unitPrice">-</div>
                        <div class="price-details">
                            <div class="price-item">
                                <div class="price-item-value" id="cost">-</div>
                                <div class="price-item-label">Coût d'achat</div>
                            </div>
                            <div class="price-item">
                                <div class="price-item-value" id="minimumCost">-</div>
                                <div class="price-item-label">Coût minimum</div>
                            </div>
                            <div class="price-item">
                                <div class="price-item-value" id="margin">-</div>
                                <div class="price-item-label">Marge</div>
                            </div>
                        </div>
                    </div>

                    <!-- Stock Information -->
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <div class="info-card">
                                <div class="info-card-header">
                                    <div class="info-card-icon">
                                        <i class="bi-boxes"></i>
                                    </div>
                                    <h5 class="info-card-title">Stock Actuel</h5>
                                </div>
                                <div class="stock-indicator" id="stockIndicator">
                                    <i class="stock-icon bi-exclamation-triangle"></i>
                                    <span id="stockQuantity">-</span>
                                </div>
                                <p class="info-card-label mt-2">
                                    Seuil minimum: <span id="minStockLevel">-</span> unités
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="info-card">
                                <div class="info-card-header">
                                    <div class="info-card-icon">
                                        <i class="bi-graph-up"></i>
                                    </div>
                                    <h5 class="info-card-title">Performance</h5>
                                </div>
                                <div class="info-card-value" id="totalSales">-</div>
                                <p class="info-card-label">Unités vendues</p>
                                <div class="mt-2">
                                    <small class="text-muted">Dernière vente: <span id="lastSale">-</span></small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Details -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="info-card">
                                <div class="info-card-header">
                                    <div class="info-card-icon">
                                        <i class="bi-info-circle"></i>
                                    </div>
                                    <h5 class="info-card-title">Informations Détaillées</h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">ID du Produit</label>
                                            <p class="mb-0 fw-bold" id="productId">-</p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Catégorie</label>
                                            <p class="mb-0" id="categoryName">-</p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Statut</label>
                                            <p class="mb-0" id="statusText">-</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Date de Création</label>
                                            <p class="mb-0" id="createdAt">-</p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Dernière Modification</label>
                                            <p class="mb-0" id="updatedAt">-</p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-muted">Créé par</label>
                                            <p class="mb-0" id="createdBy">-</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label class="form-label text-muted">Description</label>
                                    <p class="mb-0" id="fullDescription">-</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Actions & History -->
                <div class="col-lg-4">
                    <!-- Quick Actions -->
                    <div class="info-card mb-4">
                        <div class="info-card-header">
                            <div class="info-card-icon">
                                <i class="bi-lightning"></i>
                            </div>
                            <h5 class="info-card-title">Actions Rapides</h5>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-primary" onclick="adjustStock()">
                                <i class="bi-plus-circle me-2"></i>Ajuster le Stock
                            </button>
                            <button class="btn btn-outline-secondary" onclick="updatePrice()">
                                <i class="bi-currency-exchange me-2"></i>Modifier le Prix
                            </button>
                            <button class="btn btn-outline-info" onclick="viewHistory()">
                                <i class="bi-clock-history me-2"></i>Historique
                            </button>
                            <button class="btn btn-outline-warning" onclick="duplicateProduct()">
                                <i class="bi-files me-2"></i>Dupliquer
                            </button>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="info-card mb-4">
                        <div class="info-card-header">
                            <div class="info-card-icon">
                                <i class="bi-activity"></i>
                            </div>
                            <h5 class="info-card-title">Activité Récente</h5>
                        </div>
                        <div class="timeline" id="activityTimeline">
                            <!-- L'activité sera chargée ici -->
                        </div>
                    </div>

                    <!-- Stock Alerts -->
                    <div class="info-card">
                        <div class="info-card-header">
                            <div class="info-card-icon">
                                <i class="bi-bell"></i>
                            </div>
                            <h5 class="info-card-title">Alertes Stock</h5>
                        </div>
                        <div id="stockAlerts">
                            <!-- Les alertes seront chargées ici -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Error State -->
        <div id="errorState" class="text-center py-5" style="display: none;">
            <i class="bi-exclamation-triangle text-danger" style="font-size: 4rem;"></i>
            <h4 class="text-danger mt-3">Produit non trouvé</h4>
            <p class="text-muted">Le produit demandé n'existe pas ou a été supprimé.</p>
            <a href="/produit/liste" class="btn btn-primary-custom">
                <i class="bi-arrow-left me-1"></i> Retour à la liste
            </a>
        </div>
    </div>
</main>

<script>
    let productId = null;
    let product = null;

    document.addEventListener('DOMContentLoaded', function() {
        // Récupérer l'ID du produit depuis l'URL
        const pathParts = window.location.pathname.split('/');
        productId = pathParts[pathParts.length - 1];
        
        if (productId) {
            loadProductDetails();
        } else {
            showError();
        }
    });

    async function loadProductDetails() {
        try {
            showLoading(true);
            
            const result = await ProductAPI.getById(productId);

            if (result.success) {
                product = result.data.data;
                
                displayProductDetails();
                loadProductActivity();
                showLoading(false);
            } else {
                if (result.status === 404) {
                    showError();
                    return;
                }
                handleApiError(result, 'Erreur lors du chargement du produit');
                showError();
            }
            
        } catch (error) {
            console.error('Error loading product:', error);
            showNotification('error', 'Erreur lors du chargement du produit');
            showError();
        }
    }

    function displayProductDetails() {
        if (!product) return;

        // Header
        document.getElementById('productName').textContent = product.name || '-';
        document.getElementById('productDescription').textContent = product.description || 'Aucune description';
        document.getElementById('breadcrumbProduct').textContent = product.name || 'Détails Produit';
        
        // Image
        const imageContainer = document.getElementById('productImageLarge');
        if (product.picture) {
            imageContainer.innerHTML = `<img src="${product.picture}" alt="${product.name}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 12px;">`;
        } else {
            imageContainer.innerHTML = '<i class="bi-image"></i>';
        }

        // Badges
        document.getElementById('productCategory').textContent = product.category_name || 'Non catégorisé';
        document.getElementById('productStatus').textContent = product.is_active ? 'Actif' : 'Inactif';
        document.getElementById('productCreated').textContent = formatDate(product.created_at);

        // Prix
        document.getElementById('unitPrice').textContent = formatPrice(product.unit_price);
        document.getElementById('cost').textContent = formatPrice(product.cost);
        document.getElementById('minimumCost').textContent = formatPrice(product.minimum_cost);
        
        // Calcul de la marge
        const margin = product.unit_price && product.cost ? 
            product.unit_price - product.cost : 0;
        document.getElementById('margin').textContent = formatPrice(margin);

        // Stock
        updateStockDisplay();

        // Détails
        document.getElementById('productId').textContent = product.product_id || '-';
        document.getElementById('categoryName').textContent = product.category_name || 'Non catégorisé';
        document.getElementById('statusText').textContent = product.is_active ? 'Actif' : 'Inactif';
        document.getElementById('createdAt').textContent = formatDate(product.created_at);
        document.getElementById('updatedAt').textContent = formatDate(product.updated_at);
        document.getElementById('createdBy').textContent = product.created_by || 'Système';
        document.getElementById('fullDescription').textContent = product.description || 'Aucune description';

        // Actions
        document.getElementById('editProductBtn').href = `/produit/${productId}/edit`;

        // Statistiques (simulées pour l'instant)
        document.getElementById('totalSales').textContent = Math.floor(Math.random() * 1000);
        document.getElementById('lastSale').textContent = 'Il y a 2 jours';
    }

    function updateStockDisplay() {
        const quantity = product.stock_quantity || 0;
        const minLevel = product.min_stock_level || 10;
        
        const stockIndicator = document.getElementById('stockIndicator');
        const stockQuantity = document.getElementById('stockQuantity');
        const minStockLevel = document.getElementById('minStockLevel');

        stockQuantity.textContent = `${quantity} unités`;
        minStockLevel.textContent = minLevel;

        // Mettre à jour l'indicateur de stock
        stockIndicator.className = 'stock-indicator';
        const stockIcon = stockIndicator.querySelector('.stock-icon');
        
        if (quantity <= minLevel) {
            stockIndicator.classList.add('low');
            stockIcon.className = 'stock-icon bi-exclamation-triangle';
        } else if (quantity <= minLevel * 2) {
            stockIndicator.classList.add('medium');
            stockIcon.className = 'stock-icon bi-info-circle';
        } else {
            stockIndicator.classList.add('high');
            stockIcon.className = 'stock-icon bi-check-circle';
        }
    }

    async function loadProductActivity() {
        // Simuler des activités récentes
        const activities = [
            {
                date: 'Aujourd\'hui 14:30',
                title: 'Stock ajusté',
                description: '+50 unités ajoutées au stock'
            },
            {
                date: 'Hier 09:15',
                title: 'Prix modifié',
                description: 'Prix de vente mis à jour de 22,500 à 23,000 FCFA'
            },
            {
                date: 'Il y a 3 jours',
                title: 'Vente effectuée',
                description: '10 unités vendues au client DEMBA ABENGOUROU'
            },
            {
                date: 'Il y a 1 semaine',
                title: 'Produit créé',
                description: 'Produit ajouté au catalogue'
            }
        ];

        const timeline = document.getElementById('activityTimeline');
        timeline.innerHTML = activities.map(activity => `
            <div class="timeline-item">
                <div class="timeline-date">${activity.date}</div>
                <div class="timeline-title">${activity.title}</div>
                <div class="timeline-description">${activity.description}</div>
            </div>
        `).join('');
    }

    function adjustStock() {
        const newQuantity = prompt('Nouvelle quantité en stock:', product.stock_quantity || 0);
        if (newQuantity !== null && !isNaN(newQuantity)) {
            // TODO: Implémenter l'ajustement de stock via API
            showNotification('info', 'Fonction d\'ajustement de stock en cours de développement');
        }
    }

    function updatePrice() {
        const newPrice = prompt('Nouveau prix de vente (FCFA):', product.unit_price || 0);
        if (newPrice !== null && !isNaN(newPrice)) {
            // TODO: Implémenter la modification de prix via API
            showNotification('info', 'Fonction de modification de prix en cours de développement');
        }
    }

    function viewHistory() {
        // TODO: Ouvrir une modal avec l'historique complet
        showNotification('info', 'Fonction d\'historique en cours de développement');
    }

    function duplicateProduct() {
        if (confirm('Voulez-vous dupliquer ce produit ?')) {
            // TODO: Implémenter la duplication
            showNotification('info', 'Fonction de duplication en cours de développement');
        }
    }

    async function deleteProduct() {
        if (!confirm('Êtes-vous sûr de vouloir supprimer ce produit ? Cette action est irréversible.')) {
            return;
        }

        try {
            const result = await ProductAPI.delete(productId);

            if (result.success) {
                showNotification('success', 'Produit supprimé avec succès');
                setTimeout(() => {
                    window.location.href = '/produit/liste';
                }, 2000);
            } else {
                handleApiError(result, 'Erreur lors de la suppression');
            }
        } catch (error) {
            console.error('Error deleting product:', error);
            showNotification('error', 'Erreur lors de la suppression');
        }
    }

    function showLoading(show) {
        document.getElementById('loadingState').style.display = show ? 'block' : 'none';
        document.getElementById('productContent').style.display = show ? 'none' : 'block';
        document.getElementById('errorState').style.display = 'none';
    }

    function showError() {
        document.getElementById('loadingState').style.display = 'none';
        document.getElementById('productContent').style.display = 'none';
        document.getElementById('errorState').style.display = 'block';
    }

    // Fonctions utilitaires spécifiques à cette page
    function formatDate(dateString) {
        if (!dateString) return '-';
        const date = new Date(dateString);
        return date.toLocaleDateString('fr-FR', {
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        });
    }
</script>

<?php
$content = ob_get_clean();
require('./views/layouts/app-layout.php');
?>
