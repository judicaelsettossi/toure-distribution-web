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

    /* Export Dropdown Styles */
    .dropdown-menu {
        border: none;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        border-radius: 8px;
        padding: 0.5rem 0;
        min-width: 160px;
    }

    .dropdown-item {
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
    }

    .dropdown-item:hover {
        background-color: var(--light-primary);
        color: var(--primary-color);
    }

    .dropdown-item i {
        width: 16px;
        text-align: center;
    }

    .export-loading {
        position: relative;
        pointer-events: none;
    }

    .export-loading::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 16px;
        height: 16px;
        margin: -8px 0 0 -8px;
        border: 2px solid transparent;
        border-top: 2px solid var(--primary-color);
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Toast Notifications */
    .toast-container {
        position: fixed;
        top: 2rem;
        right: 2rem;
        z-index: 10000;
        display: flex;
        flex-direction: column;
        gap: 1rem;
        max-width: 400px;
    }

    .toast {
        background: white;
        border-radius: 12px;
        padding: 1rem 1.25rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        border-left: 4px solid;
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        transform: translateX(100%);
        opacity: 0;
        transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        position: relative;
        overflow: hidden;
    }

    .toast.show {
        transform: translateX(0);
        opacity: 1;
    }

    .toast.hide {
        transform: translateX(100%);
        opacity: 0;
    }

    .toast-success {
        border-left-color: #10b981;
        background: linear-gradient(135deg, #f0fff4 0%, #e6fffa 100%);
    }

    .toast-error {
        border-left-color: #ef4444;
        background: linear-gradient(135deg, #fef2f2 0%, #fef7f7 100%);
    }

    .toast-warning {
        border-left-color: #f59e0b;
        background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
    }

    .toast-info {
        border-left-color: #3b82f6;
        background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
    }

    .toast-icon {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
        font-weight: 700;
        flex-shrink: 0;
        margin-top: 0.125rem;
    }

    .toast-success .toast-icon {
        background: #10b981;
        color: white;
    }

    .toast-error .toast-icon {
        background: #ef4444;
        color: white;
    }

    .toast-warning .toast-icon {
        background: #f59e0b;
        color: white;
    }

    .toast-info .toast-icon {
        background: #3b82f6;
        color: white;
    }

    .toast-content {
        flex: 1;
        min-width: 0;
    }

    .toast-title {
        font-weight: 700;
        font-size: 0.9rem;
        margin-bottom: 0.25rem;
        color: #1f2937;
    }

    .toast-message {
        font-size: 0.85rem;
        color: #6b7280;
        line-height: 1.4;
        margin: 0;
    }

    .toast-close {
        background: none;
        border: none;
        color: #9ca3af;
        font-size: 1.2rem;
        cursor: pointer;
        padding: 0;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
        transition: all 0.2s ease;
        flex-shrink: 0;
    }

    .toast-close:hover {
        background: rgba(0,0,0,0.1);
        color: #374151;
    }

    @media (max-width: 768px) {
        .toast-container {
            top: 1rem;
            right: 1rem;
            left: 1rem;
            max-width: none;
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
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="exportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi-download me-1"></i> Exporter
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                                <li>
                                    <a class="dropdown-item" href="#" onclick="exportProducts('excel')">
                                        <i class="bi-file-earmark-excel text-success me-2"></i> Excel (.xlsx)
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#" onclick="exportProducts('pdf')">
                                        <i class="bi-file-earmark-pdf text-danger me-2"></i> PDF
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination Top -->
            <div class="card-body py-2 border-bottom">
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

            <div class="table-responsive">
                <table class="table table-hover table-nowrap align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Produit</th>
                            <th>Code</th>
                            <th>Prix Unitaire</th>
                            <th>Coût</th>
                            <th>Stock</th>
                            <th>Statut</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="productsTableBody">
                        <tr class="skeleton-row">
                            <td colspan="7" class="text-center py-5">
                                <div class="spinner-border text-primary-custom" role="status">
                                    <span class="visually-hidden">Chargement...</span>
                                </div>
                                <p class="mt-3 text-muted">Chargement des produits...</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- Toast Container -->
<div id="toastContainer" class="toast-container"></div>

<!-- Libraries for Export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<script>
    // Ensure libraries are loaded
    window.addEventListener('load', function() {
        console.log('XLSX loaded:', typeof XLSX !== 'undefined');
        console.log('PDFMake loaded:', typeof pdfMake !== 'undefined');
        
        if (typeof pdfMake === 'undefined') {
            console.error('PDFMake n\'est pas chargé !');
            showToast('Erreur', 'PDFMake n\'est pas chargé. Rechargez la page.', 'error');
        }
        
        if (typeof XLSX === 'undefined') {
            console.error('XLSX n\'est pas chargé !');
            showToast('Erreur', 'XLSX n\'est pas chargé. Rechargez la page.', 'error');
        }
    });
</script>

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
                <td colspan="7" class="text-center py-5">
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

    async function exportProducts(format = 'excel') {
        const exportButton = document.getElementById('exportDropdown');
        const originalText = exportButton.innerHTML;
        
        try {
            console.log('Début de l\'export:', format);
            
            // Show loading state
            exportButton.classList.add('export-loading');
            exportButton.innerHTML = '<i class="bi-hourglass-split me-1"></i> Export...';
            exportButton.disabled = true;
            
            // Check if required libraries are loaded
            if (format === 'excel' && typeof XLSX === 'undefined') {
                throw new Error('Bibliothèque Excel non chargée. Veuillez recharger la page.');
            }
            
            if (format === 'pdf' && typeof pdfMake === 'undefined') {
                throw new Error('PDFMake n\'est pas chargé. Veuillez recharger la page.');
            }
            
            console.log('Bibliothèques vérifiées, début de l\'export...');
            
            // Utiliser les produits filtrés pour l'export
            const productsToExport = filteredProducts.length > 0 ? filteredProducts : allProducts;
            
            if (format === 'excel') {
                await exportToExcel(productsToExport);
            } else if (format === 'pdf') {
                await exportToPDF(productsToExport);
            }
            
            console.log('Export terminé avec succès');
            
            // Show success message
            showToast('Export réussi', `Fichier ${format.toUpperCase()} téléchargé avec succès`, 'success');
            
        } catch (error) {
            console.error('Erreur lors de l\'export:', error);
            showToast('Erreur d\'export', error.message || 'Une erreur est survenue lors de l\'export', 'error');
        } finally {
            // Reset button state
            exportButton.classList.remove('export-loading');
            exportButton.innerHTML = originalText;
            exportButton.disabled = false;
        }
    }

    async function exportToExcel(products) {
        // Create workbook and worksheet
        const wb = XLSX.utils.book_new();
        
        // Prepare data with proper headers and formatting
        const excelData = products.map((product, index) => ({
            'N°': index + 1,
            'ID Produit': product.product_id || '',
            'Nom du Produit': product.name || '',
            'Code': product.code || '',
            'Description': product.description || '',
            'Catégorie': getCategoryName(product),
            'Prix Unitaire': product.unit_price || 0,
            'Coût': product.cost || 0,
            'Stock': product.min_stock_level || 0,
            'Statut': product.is_active ? 'Actif' : 'Inactif',
            'Date de Création': product.created_at ? formatDate(product.created_at) : ''
        }));
        
        const ws = XLSX.utils.json_to_sheet(excelData);
        
        // Set column widths for better readability
        const colWidths = [
            { wch: 6 },  // N°
            { wch: 15 }, // ID Produit
            { wch: 25 }, // Nom du Produit
            { wch: 12 }, // Code
            { wch: 35 }, // Description
            { wch: 20 }, // Catégorie
            { wch: 15 }, // Prix Unitaire
            { wch: 12 }, // Coût
            { wch: 10 }, // Stock
            { wch: 12 }, // Statut
            { wch: 18 }  // Date de Création
        ];
        ws['!cols'] = colWidths;
        
        // Style the header row
        const headerRange = XLSX.utils.decode_range(ws['!ref']);
        for (let col = headerRange.s.c; col <= headerRange.e.c; col++) {
            const cellAddress = XLSX.utils.encode_cell({ r: 0, c: col });
            if (!ws[cellAddress]) continue;
            
            ws[cellAddress].s = {
                font: { bold: true, color: { rgb: "FFFFFF" } },
                fill: { fgColor: { rgb: "F00480" } },
                alignment: { horizontal: "center", vertical: "center" },
                border: {
                    top: { style: "thin", color: { rgb: "000000" } },
                    bottom: { style: "thin", color: { rgb: "000000" } },
                    left: { style: "thin", color: { rgb: "000000" } },
                    right: { style: "thin", color: { rgb: "000000" } }
                }
            };
        }
        
        // Style data rows
        for (let row = 1; row <= products.length; row++) {
            for (let col = headerRange.s.c; col <= headerRange.e.c; col++) {
                const cellAddress = XLSX.utils.encode_cell({ r: row, c: col });
                if (!ws[cellAddress]) continue;
                
                // Special styling for status column
                if (col === 9) { // Statut column
                    const isActive = ws[cellAddress].v === 'Actif';
                    ws[cellAddress].s = {
                        font: { bold: true, color: { rgb: isActive ? "28A745" : "6C757D" } },
                        alignment: { horizontal: "center", vertical: "center" },
                        border: {
                            top: { style: "thin", color: { rgb: "CCCCCC" } },
                            bottom: { style: "thin", color: { rgb: "CCCCCC" } },
                            left: { style: "thin", color: { rgb: "CCCCCC" } },
                            right: { style: "thin", color: { rgb: "CCCCCC" } }
                        }
                    };
                } else {
                    ws[cellAddress].s = {
                        alignment: { horizontal: "left", vertical: "center" },
                        border: {
                            top: { style: "thin", color: { rgb: "CCCCCC" } },
                            bottom: { style: "thin", color: { rgb: "CCCCCC" } },
                            left: { style: "thin", color: { rgb: "CCCCCC" } },
                            right: { style: "thin", color: { rgb: "CCCCCC" } }
                        }
                    };
                }
            }
        }
        
        // Add summary sheet
        const summaryData = [
            ['RÉSUMÉ DE L\'EXPORT'],
            [''],
            ['Total des produits', products.length],
            ['Produits actifs', products.filter(p => p.is_active).length],
            ['Produits inactifs', products.filter(p => !p.is_active).length],
            ['Stock faible', products.filter(p => (p.min_stock_level || 0) < 10).length],
            [''],
            ['Date d\'export', new Date().toLocaleDateString('fr-FR')],
            ['Heure d\'export', new Date().toLocaleTimeString('fr-FR', {hour: '2-digit', minute: '2-digit'})],
            ['Filtres appliqués', getCurrentFiltersString()]
        ];
        
        const summaryWs = XLSX.utils.aoa_to_sheet(summaryData);
        summaryWs['!cols'] = [{ wch: 25 }, { wch: 30 }];
        
        // Style summary sheet
        summaryWs['A1'].s = {
            font: { bold: true, size: 14, color: { rgb: "F00480" } },
            alignment: { horizontal: "center", vertical: "center" }
        };
        
        // Add worksheets to workbook
        XLSX.utils.book_append_sheet(wb, ws, 'Liste des Produits');
        XLSX.utils.book_append_sheet(wb, summaryWs, 'Résumé');
        
        // Generate Excel file
        const excelBuffer = XLSX.write(wb, { bookType: 'xlsx', type: 'array' });
        const blob = new Blob([excelBuffer], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
        
        // Download file
        const url = window.URL.createObjectURL(blob);
        const link = document.createElement('a');
        link.href = url;
        link.download = `Liste_Produits_${new Date().toISOString().split('T')[0]}.xlsx`;
        link.click();
        window.URL.revokeObjectURL(url);
        
        showToast('Export Excel', `Fichier Excel téléchargé avec succès (${products.length} produits)`, 'success');
    }

    async function exportToPDF(products) {
        // Prepare PDF data
        const pdfData = products.map((product, index) => [
            index + 1,
            product.name || 'N/A',
            product.code || '-',
            getCategoryName(product),
            formatCurrency(product.unit_price || 0),
            product.is_active ? 'Actif' : 'Inactif',
            product.created_at ? formatDate(product.created_at) : '-'
        ]);

        // PDF configuration - Version simplifiée
        const docDefinition = {
            pageSize: 'A4',
            pageMargins: [40, 60, 40, 60],
            
            content: [
                // Titre principal
                {
                    text: 'LISTE DES PRODUITS',
                    fontSize: 18,
                    bold: true,
                    alignment: 'center',
                    color: '#f00480',
                    margin: [0, 0, 0, 30]
                },
                
                // Informations entreprise et date
                {
                    columns: [
                        {
                            text: 'TOURE DISTRIBUTION',
                            fontSize: 14,
                            bold: true,
                            color: '#010768'
                        },
                        {
                            text: `Export généré le: ${new Date().toLocaleDateString('fr-FR')} à ${new Date().toLocaleTimeString('fr-FR', {hour: '2-digit', minute: '2-digit'})}`,
                            fontSize: 10,
                            color: '#666666',
                            alignment: 'right'
                        }
                    ],
                    margin: [0, 0, 0, 20]
                },
                
                // Statistiques résumé
                {
                    text: [
                        { text: 'Total: ', bold: true },
                        { text: `${products.length} produit(s)`, bold: true },
                        { text: ' | Actifs: ', bold: true },
                        { text: `${products.filter(p => p.is_active).length}`, bold: true },
                        { text: ' | Inactifs: ', bold: true },
                        { text: `${products.filter(p => !p.is_active).length}`, bold: true }
                    ],
                    fontSize: 10,
                    margin: [0, 0, 0, 20]
                },
                
                // Tableau des produits
                {
                    table: {
                        headerRows: 1,
                        widths: ['8%', '25%', '12%', '20%', '15%', '12%', '8%'],
                        body: [
                            // En-tête du tableau
                            [
                                { text: 'N°', style: 'tableHeader', alignment: 'center' },
                                { text: 'Nom du Produit', style: 'tableHeader' },
                                { text: 'Code', style: 'tableHeader' },
                                { text: 'Catégorie', style: 'tableHeader' },
                                { text: 'Prix Unitaire', style: 'tableHeader', alignment: 'center' },
                                { text: 'Statut', style: 'tableHeader', alignment: 'center' },
                                { text: 'Créé le', style: 'tableHeader', alignment: 'center' }
                            ],
                            // Données des produits
                            ...pdfData.map(row => [
                                { text: row[0].toString(), alignment: 'center', fontSize: 9 },
                                { text: row[1], fontSize: 9 },
                                { text: row[2], fontSize: 9 },
                                { text: row[3], fontSize: 9 },
                                { text: row[4], alignment: 'center', fontSize: 9 },
                                { 
                                    text: row[5], 
                                    alignment: 'center',
                                    fontSize: 9,
                                    bold: true,
                                    color: row[5] === 'Actif' ? '#28a745' : '#6c757d'
                                },
                                { text: row[6], alignment: 'center', fontSize: 9 }
                            ])
                        ]
                    },
                    layout: 'lightHorizontalLines'
                }
            ],
            
            styles: {
                tableHeader: {
                    fontSize: 10,
                    bold: true,
                    color: '#ffffff',
                    fillColor: '#f00480'
                }
            },
            
            defaultStyle: {
                fontSize: 10
            }
        };

        // Generate and download PDF
        pdfMake.createPdf(docDefinition).download(`Liste_Produits_${new Date().toISOString().split('T')[0]}.pdf`);
        
        showToast('Export PDF', `Fichier PDF téléchargé avec succès (${products.length} produits)`, 'success');
    }

    function getCategoryName(product) {
        if (product.category && product.category.label) {
            return product.category.label;
        } else if (product.category_name) {
            return product.category_name;
        }
        return 'Non défini';
    }

    function getCurrentFiltersString() {
        const search = document.getElementById('searchInput').value;
        const category = document.getElementById('categoryFilter').value;
        const status = document.getElementById('statusFilter').value;
        const stock = document.getElementById('stockFilter').value;
        
        const filters = [];
        if (search) filters.push(`Recherche: ${search}`);
        if (category) filters.push(`Catégorie: ${document.getElementById('categoryFilter').selectedOptions[0]?.textContent || category}`);
        if (status) filters.push(`Statut: ${status === '1' ? 'Actifs' : 'Inactifs'}`);
        if (stock) filters.push(`Stock: ${stock === 'low' ? 'Faible' : 'Rupture'}`);
        
        return filters.length > 0 ? filters.join(', ') : 'Aucun filtre';
    }

    function formatDate(dateString) {
        if (!dateString) return 'N/A';
        return new Date(dateString).toLocaleDateString('fr-FR');
    }

    // Toast notification system
    function showToast(title, message, type = 'info', duration = 5000) {
        const toastContainer = document.getElementById('toastContainer');
        const toastId = 'toast-' + Date.now() + '-' + Math.random().toString(36).substr(2, 9);
        
        const icons = {
            success: '✓',
            error: '✕',
            warning: '⚠',
            info: 'ℹ'
        };
        
        const toast = document.createElement('div');
        toast.id = toastId;
        toast.className = `toast toast-${type}`;
        
        toast.innerHTML = `
            <div class="toast-icon">${icons[type] || icons.info}</div>
            <div class="toast-content">
                <div class="toast-title">${title}</div>
                <div class="toast-message">${message}</div>
            </div>
            <button class="toast-close" onclick="closeToast('${toastId}')">×</button>
        `;
        
        toastContainer.appendChild(toast);
        
        // Trigger animation
        setTimeout(() => {
            toast.classList.add('show');
        }, 100);
        
        // Auto close
        if (duration > 0) {
            setTimeout(() => {
                closeToast(toastId);
            }, duration);
        }
        
        return toastId;
    }
    
    function closeToast(toastId) {
        const toast = document.getElementById(toastId);
        if (toast) {
            toast.classList.add('hide');
            setTimeout(() => {
                if (toast.parentNode) {
                    toast.parentNode.removeChild(toast);
                }
            }, 400);
        }
    }

    function showError(message) {
        const tbody = document.getElementById('productsTableBody');
        tbody.innerHTML = `
        <tr>
            <td colspan="7" class="text-center py-5">
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