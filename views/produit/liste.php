<?php ob_start(); ?>

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

    .text-primary-custom {
        color: var(--primary-color) !important;
    }

    .text-secondary-custom {
        color: var(--secondary-color) !important;
    }

    .bg-primary-custom {
        background-color: var(--primary-color) !important;
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

    .card-custom {
        border-radius: 12px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        border: none;
    }

    .filter-card {
        background: linear-gradient(135deg, var(--light-primary) 0%, #f8f9fa 100%);
        border-left: 4px solid var(--primary-color);
    }

    .table-hover tbody tr:hover {
        background-color: var(--light-primary);
        cursor: pointer;
    }

    .product-image {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 8px;
    }

    .product-placeholder {
        width: 50px;
        height: 50px;
        border-radius: 8px;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
    }

    .stats-card {
        border-radius: 12px;
        padding: 1.5rem;
        background: white;
        border-left: 4px solid var(--primary-color);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    .stats-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(240, 4, 128, 0.15);
    }

    .badge-category {
        padding: 0.4rem 0.8rem;
        border-radius: 6px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .stock-indicator {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        display: inline-block;
        margin-right: 5px;
    }

    .stock-good {
        background-color: #28a745;
    }

    .stock-warning {
        background-color: #ffc107;
    }

    .stock-critical {
        background-color: #dc3545;
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
                            <li class="breadcrumb-item active">Produits</li>
                        </ol>
                    </nav>
                    <h1 class="page-header-title text-secondary-custom">
                        <i class="bi-box-seam-fill me-2"></i>Liste des Produits
                    </h1>
                    <p class="text-muted mb-0">Gérez votre catalogue de produits</p>
                </div>

                <div class="col-sm-auto">
                    <a class="btn btn-primary-custom" href="/produit/ajouter">
                        <i class="bi-plus-lg me-1"></i> Nouveau Produit
                    </a>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="stats-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="d-block text-muted small mb-1">Total Produits</span>
                            <h3 class="mb-0 text-secondary-custom" id="totalProducts">-</h3>
                        </div>
                        <div class="product-placeholder" style="width: 50px; height: 50px;">
                            <i class="bi-box-seam fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="stats-card" style="border-left-color: #28a745;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="d-block text-muted small mb-1">Produits Actifs</span>
                            <h3 class="mb-0 text-success" id="activeProducts">-</h3>
                        </div>
                        <div class="product-placeholder" style="width: 50px; height: 50px; background: linear-gradient(135deg, #28a745 0%, #20c997 100%);">
                            <i class="bi-check-circle fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="stats-card" style="border-left-color: #ffc107;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="d-block text-muted small mb-1">Stock Faible</span>
                            <h3 class="mb-0 text-warning" id="lowStockProducts">-</h3>
                        </div>
                        <div class="product-placeholder" style="width: 50px; height: 50px; background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);">
                            <i class="bi-exclamation-triangle fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="stats-card" style="border-left-color: #17a2b8;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="d-block text-muted small mb-1">Catégories</span>
                            <h3 class="mb-0 text-info" id="totalCategories">-</h3>
                        </div>
                        <div class="product-placeholder" style="width: 50px; height: 50px; background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);">
                            <i class="bi-grid-3x3-gap fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="card card-custom filter-card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label small fw-semibold">Recherche</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi-search"></i></span>
                            <input type="text" class="form-control" id="searchInput" placeholder="Nom, code, description...">
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label small fw-semibold">Catégorie</label>
                        <select class="form-select" id="categoryFilter">
                            <option value="">Toutes les catégories</option>
                            <!-- Chargé dynamiquement -->
                        </select>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label class="form-label small fw-semibold">Statut</label>
                        <select class="form-select" id="statusFilter">
                            <option value="">Tous</option>
                            <option value="1">Actifs</option>
                            <option value="0">Inactifs</option>
                        </select>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label class="form-label small fw-semibold">Stock</label>
                        <select class="form-select" id="stockFilter">
                            <option value="">Tous</option>
                            <option value="low">Stock faible</option>
                            <option value="out">Rupture</option>
                        </select>
                    </div>

                    <div class="col-md-1 mb-3 d-flex align-items-end">
                        <button class="btn btn-outline-secondary w-100" onclick="resetFilters()">
                            <i class="bi-arrow-clockwise"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="card card-custom">
            <div class="card-header border-bottom">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="card-header-title mb-0">
                            <span id="productCount">0</span> produit(s) trouvé(s)
                        </h5>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-sm btn-outline-primary" onclick="exportProducts()">
                            <i class="bi-download me-1"></i> Exporter
                        </button>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-nowrap align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Produit</th>
                            <th>Code</th>
                            <th>Catégorie</th>
                            <th>Prix Unitaire</th>
                            <th>Coût</th>
                            <th>Stock</th>
                            <th>Statut</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="productsTableBody">
                        <tr class="skeleton-row">
                            <td colspan="8" class="text-center py-5">
                                <div class="spinner-border text-primary-custom" role="status">
                                    <span class="visually-hidden">Chargement...</span>
                                </div>
                                <p class="mt-3 text-muted">Chargement des produits...</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="card-footer">
                <div class="row align-items-center">
                    <div class="col-sm mb-2 mb-sm-0">
                        <div class="d-flex align-items-center">
                            <span class="me-2 small text-muted">Afficher</span>
                            <select class="form-select form-select-sm w-auto" id="perPageSelect">
                                <option value="10">10</option>
                                <option value="15" selected>15</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                            </select>
                            <span class="ms-2 small text-muted">par page</span>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <nav>
                            <ul class="pagination pagination-sm mb-0" id="pagination"></ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
    let currentPage = 1;
    let perPage = 15;
    let debounceTimer;
    let allProducts = []; // Stocker tous les produits
    let filteredProducts = []; // Produits après filtrage
    let totalPages = 1;

    document.addEventListener('DOMContentLoaded', function() {
        loadProducts();
        loadCategories();

        document.getElementById('searchInput').addEventListener('input', debounceSearch);
        document.getElementById('categoryFilter').addEventListener('change', applyFilters);
        document.getElementById('statusFilter').addEventListener('change', applyFilters);
        document.getElementById('stockFilter').addEventListener('change', applyFilters);
        document.getElementById('perPageSelect').addEventListener('change', function() {
            perPage = parseInt(this.value);
            currentPage = 1;
            applyFilters();
        });
    });

    function debounceSearch() {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(applyFilters, 500);
    }

    function applyFilters() {
        currentPage = 1;
        filterProducts();
    }

    function filterProducts() {
        const searchInput = document.getElementById('searchInput').value.toLowerCase();
        const category = document.getElementById('categoryFilter').value;
        const status = document.getElementById('statusFilter').value;
        const stock = document.getElementById('stockFilter').value;

        // Filtrer les produits
        filteredProducts = allProducts.filter(product => {
            // Filtre de recherche
            if (searchInput && !product.name.toLowerCase().includes(searchInput) && 
                !product.code.toLowerCase().includes(searchInput) &&
                !(product.description && product.description.toLowerCase().includes(searchInput))) {
                return false;
            }

            // Filtre par catégorie
            if (category) {
                // Support des deux structures possibles
                const productCategoryId = product.category_id || (product.category && product.category.product_category_id);
                if (!productCategoryId || productCategoryId != category) {
                    return false;
                }
            }

            // Filtre par statut
            if (status !== '' && product.is_active.toString() !== status) {
                return false;
            }

            // Filtre par stock
            if (stock === 'low' && product.min_stock_level >= 10) {
                return false;
            }
            if (stock === 'out' && product.min_stock_level > 0) {
                return false;
            }

            return true;
        });

        // Mettre à jour la pagination
        totalPages = Math.ceil(filteredProducts.length / perPage);
        currentPage = Math.min(currentPage, totalPages);

        // Afficher les produits paginés
        displayFilteredProducts();
        updatePaginationFromFiltered();
        updateStatsFromFiltered();
    }

    function displayFilteredProducts() {
        const startIndex = (currentPage - 1) * perPage;
        const endIndex = startIndex + perPage;
        const productsToShow = filteredProducts.slice(startIndex, endIndex);
        
        displayProducts(productsToShow);
        document.getElementById('productCount').textContent = filteredProducts.length;
    }

    function updatePaginationFromFiltered() {
        const pagination = document.getElementById('pagination');
        
        if (totalPages <= 1) {
            pagination.innerHTML = '';
            return;
        }

        let paginationHTML = '';

        // Bouton précédent
        paginationHTML += `
        <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
            <a class="page-link" href="#" onclick="changePage(${currentPage - 1}); return false;">
                <i class="bi-chevron-left"></i>
            </a>
        </li>
        `;

        // Pages
        const startPage = Math.max(1, currentPage - 2);
        const endPage = Math.min(totalPages, currentPage + 2);

        for (let i = startPage; i <= endPage; i++) {
            paginationHTML += `
            <li class="page-item ${i === currentPage ? 'active' : ''}">
                <a class="page-link" href="#" onclick="changePage(${i}); return false;">${i}</a>
            </li>
            `;
        }

        // Bouton suivant
        paginationHTML += `
        <li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
            <a class="page-link" href="#" onclick="changePage(${currentPage + 1}); return false;">
                <i class="bi-chevron-right"></i>
            </a>
        </li>
        `;

        pagination.innerHTML = paginationHTML;
    }

    function updateStatsFromFiltered() {
        const total = filteredProducts.length;
        const active = filteredProducts.filter(p => p.is_active).length;
        const lowStock = filteredProducts.filter(p => p.min_stock_level < 10).length;

        document.getElementById('totalProducts').textContent = total;
        document.getElementById('activeProducts').textContent = active;
        document.getElementById('lowStockProducts').textContent = lowStock;
    }

    async function loadCategories() {
        try {
            const response = await fetch('https://toure.gestiem.com/api/product-categories', {
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });

            if (response.ok) {
                const categories = await response.json();
                const select = document.getElementById('categoryFilter');

                // Debug: Afficher la structure des catégories
                console.log('Structure des catégories reçues:', categories);

                // La réponse est directement un tableau selon la documentation
                const categoriesList = Array.isArray(categories) ? categories : (categories.data || []);
                
                console.log('Catégories traitées:', categoriesList);
                
                categoriesList.forEach(cat => {
                    const option = document.createElement('option');
                    option.value = cat.product_category_id;
                    option.textContent = cat.label;
                    select.appendChild(option);
                });

                // Mettre à jour le compteur de catégories
                document.getElementById('totalCategories').textContent = categoriesList.length;
            }
        } catch (error) {
            console.error('Error loading categories:', error);
        }
    }

    async function loadProducts() {
        try {
            // Charger tous les produits sans pagination pour le filtrage côté client
            const response = await fetch('https://toure.gestiem.com/api/products?per_page=1000', {
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });

            const result = await response.json();

            if (response.ok) {
                allProducts = result.data || [];
                filteredProducts = [...allProducts];
                
                // Debug: Afficher la structure des produits pour vérifier les catégories
                if (allProducts.length > 0) {
                    console.log('Structure du premier produit:', allProducts[0]);
                    console.log('Structure de catégorie:', allProducts[0].category);
                }
                
                // Appliquer les filtres initiaux
                filterProducts();
            } else if (response.status === 401) {
                window.location.href = '/login';
            } else {
                showError('Erreur lors du chargement des produits');
            }
        } catch (error) {
            console.error('Error:', error);
            showError('Erreur de connexion au serveur');
        }
    }

    function displayProducts(products) {
        const tbody = document.getElementById('productsTableBody');

        if (products.length === 0) {
            tbody.innerHTML = `
            <tr>
                <td colspan="8" class="text-center py-5">
                    <i class="bi-inbox fs-1 text-muted"></i>
                    <p class="mt-3 text-muted">Aucun produit trouvé</p>
                </td>
            </tr>
        `;
            document.getElementById('productCount').textContent = '0';
            return;
        }

        tbody.innerHTML = products.map(product => `
        <tr onclick="viewProduct('${product.product_id}')">
            <td>
                <div class="d-flex align-items-center">
                    ${product.picture ? 
                        `<img src="${product.picture}" class="product-image me-3" alt="${product.name}">` :
                        `<div class="product-placeholder me-3"><i class="bi-box-seam"></i></div>`
                    }
                    <div>
                        <h6 class="mb-0">${product.name}</h6>
                        ${product.description ? `<small class="text-muted">${product.description.substring(0, 40)}...</small>` : ''}
                    </div>
                </div>
            </td>
            <td><span class="badge bg-light text-dark">${product.code}</span></td>
            <td>
                ${getCategoryLabel(product)}
            </td>
            <td class="fw-bold">${formatCurrency(product.unit_price)}</td>
            <td class="text-muted">${formatCurrency(product.cost || 0)}</td>
            <td>
                ${getStockIndicator(product.min_stock_level)}
                <small>${product.min_stock_level || 0}</small>
            </td>
            <td>
                <span class="badge ${product.is_active ? 'bg-success' : 'bg-secondary'}">
                    ${product.is_active ? 'Actif' : 'Inactif'}
                </span>
            </td>
            <td class="text-end">
                <button class="btn btn-sm btn-outline-primary" onclick="editProduct(event, '${product.product_id}')" title="Modifier">
                    <i class="bi-pencil"></i>
                </button>
                <button class="btn btn-sm btn-outline-info" onclick="viewProductDetails(event, '${product.product_id}')" title="Détails">
                    <i class="bi-eye"></i>
                </button>
            </td>
        </tr>
    `).join('');
    }

    function getStockIndicator(stock) {
        if (stock === 0) return '<span class="stock-indicator stock-critical"></span>';
        if (stock < 10) return '<span class="stock-indicator stock-warning"></span>';
        return '<span class="stock-indicator stock-good"></span>';
    }

    function getCategoryLabel(product) {
        let categoryLabel = '';
        
        // Support des deux structures possibles
        if (product.category && product.category.label) {
            // Structure avec objet category
            categoryLabel = product.category.label;
        } else if (product.category_name) {
            // Structure avec category_name direct
            categoryLabel = product.category_name;
        } else {
            return '<span class="text-muted">-</span>';
        }
        
        return `<span class="badge badge-category" style="background-color: #e3f2fd; color: #1976d2;">${categoryLabel}</span>`;
    }


    function changePage(page) {
        if (page < 1 || page > totalPages) return;
        currentPage = page;
        displayFilteredProducts();
        updatePaginationFromFiltered();
    }

    function resetFilters() {
        document.getElementById('searchInput').value = '';
        document.getElementById('categoryFilter').value = '';
        document.getElementById('statusFilter').value = '';
        document.getElementById('stockFilter').value = '';
        currentPage = 1;
        filterProducts();
    }

    function formatCurrency(amount) {
        return new Intl.NumberFormat('fr-FR', {
            style: 'currency',
            currency: 'XOF',
            minimumFractionDigits: 0
        }).format(amount).replace('XOF', 'FCFA');
    }

    function viewProduct(productId) {
        window.location.href = `/produit/${productId}/details`;
    }

    function editProduct(event, productId) {
        event.stopPropagation();
        window.location.href = `/produit/${productId}/edit`;
    }

    function viewProductDetails(event, productId) {
        event.stopPropagation();
        window.location.href = `/produit/${productId}/details`;
    }

    function exportProducts() {
        window.location.href = 'https://toure.gestiem.com/api/products/export';
    }

    function showError(message) {
        const tbody = document.getElementById('productsTableBody');
        tbody.innerHTML = `
        <tr>
            <td colspan="8" class="text-center py-5">
                <i class="bi-exclamation-triangle fs-1 text-danger"></i>
                <p class="mt-3 text-danger">${message}</p>
                <button class="btn btn-sm btn-primary-custom" onclick="loadProducts()">
                    Réessayer
                </button>
            </td>
        </tr>
    `;
    }
</script>

<?php
$content = ob_get_clean();
require('./views/layouts/app-layout.php');
?>