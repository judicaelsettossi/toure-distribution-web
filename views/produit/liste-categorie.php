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

    .category-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        color: white;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    }

    .stats-card {
        border-radius: 10px;
        padding: 1rem;
        background: white;
        border-left: 4px solid var(--primary-color);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        min-height: 80px;
        display: flex;
        align-items: center;
    }

    .stats-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(240, 4, 128, 0.12);
    }

    .stats-card h4 {
        font-size: 1.25rem;
        font-weight: 700;
        line-height: 1.1;
    }

    .stats-card .small {
        font-size: 0.7rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    @media (max-width: 768px) {
        .stats-card {
            padding: 0.75rem;
            min-height: 65px;
        }
        
        .stats-card h4 {
            font-size: 1.1rem;
        }
        
        .stats-card .small {
            font-size: 0.65rem;
        }
        
        .category-avatar {
            width: 35px !important;
            height: 35px !important;
        }
    }

    .action-btn {
        width: 35px;
        height: 35px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .action-btn:hover {
        transform: scale(1.1);
    }

    .skeleton {
        animation: skeleton-loading 1s linear infinite alternate;
    }

    @keyframes skeleton-loading {
        0% {
            background-color: hsl(200, 20%, 80%);
        }

        100% {
            background-color: hsl(200, 20%, 95%);
        }
    }

    .balance-positive {
        color: #28a745;
        font-weight: 600;
    }

    .balance-negative {
        color: #dc3545;
        font-weight: 600;
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

    .balance-zero {
        color: #6c757d;
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

    /* Pagination Styles */
    .pagination {
        --bs-pagination-color: var(--primary-color);
        --bs-pagination-hover-color: var(--secondary-color);
        --bs-pagination-focus-color: var(--secondary-color);
        --bs-pagination-active-bg: var(--primary-color);
        --bs-pagination-active-border-color: var(--primary-color);
        --bs-pagination-disabled-bg: #f8f9fa;
        --bs-pagination-disabled-color: #6c757d;
    }

    .pagination .page-link {
        border-radius: 8px;
        margin: 0 2px;
        border: 1px solid #e9ecef;
        font-weight: 500;
        transition: all 0.2s ease;
        min-width: 40px;
        text-align: center;
    }

    .pagination .page-link:hover {
        background-color: var(--light-primary);
        border-color: var(--primary-color);
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(240, 4, 128, 0.15);
    }

    .pagination .page-item.active .page-link {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        box-shadow: 0 2px 8px rgba(240, 4, 128, 0.3);
    }

    .pagination .page-item.disabled .page-link {
        background-color: #f8f9fa;
        border-color: #e9ecef;
        color: #6c757d;
        cursor: not-allowed;
    }

    .pagination .page-item.disabled .page-link:hover {
        transform: none;
        box-shadow: none;
    }

    #paginationInfo {
        font-size: 0.875rem;
        white-space: nowrap;
    }

    /* Pagination at top styling */
    .card.mb-3 .card-body {
        background-color: #f8f9fa;
        border-radius: 8px;
    }

    .card.mb-3 .card-body .form-select {
        border-color: #dee2e6;
    }

    .card.mb-3 .card-body .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(240, 4, 128, 0.25);
    }

    @media (max-width: 576px) {
        .pagination .page-link {
            min-width: 35px;
            padding: 0.375rem 0.5rem;
            font-size: 0.875rem;
        }
        
        #paginationInfo {
            font-size: 0.8rem;
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
                            <li class="breadcrumb-item active">Catégories de Produits</li>
                        </ol>
                    </nav>
                    <h1 class="page-header-title text-secondary-custom">
                        <i class="bi-grid-3x3-gap me-2"></i>Catégories de Produits
                    </h1>
                    <p class="text-muted mb-0">Organisez vos produits par catégorie</p>
                </div>

                <div class="col-sm-auto">
                    <a class="btn btn-primary-custom" href="/produit/add-categorie">
                        <i class="bi-plus-lg me-1"></i> Nouvelle Catégorie 
                    </a>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="stats-card">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <div>
                            <span class="d-block text-muted small mb-1">Total Catégories</span>
                            <h4 class="mb-0 text-secondary-custom" id="totalCategories">-</h4>
                        </div>
                        <div class="category-avatar" style="width: 40px; height: 40px;">
                            <i class="bi-grid-3x3-gap fs-5"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="stats-card" style="border-left-color: #28a745;">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <div>
                            <span class="d-block text-muted small mb-1">Catégories Actives</span>
                            <h4 class="mb-0 text-success" id="activeCategories">-</h4>
                        </div>
                        <div class="category-avatar" style="width: 40px; height: 40px; background: linear-gradient(135deg, #28a745 0%, #20c997 100%);">
                            <i class="bi-check-circle fs-5"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="stats-card" style="border-left-color: #ffc107;">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <div>
                            <span class="d-block text-muted small mb-1">Catégories Inactives</span>
                            <h4 class="mb-0 text-warning" id="inactiveCategories">-</h4>
                        </div>
                        <div class="category-avatar" style="width: 40px; height: 40px; background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);">
                            <i class="bi-x-circle fs-5"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="stats-card" style="border-left-color: #17a2b8;">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <div>
                            <span class="d-block text-muted small mb-1">Produits Total</span>
                            <h4 class="mb-0 text-info" id="totalProducts">-</h4>
                        </div>
                        <div class="category-avatar" style="width: 40px; height: 40px; background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);">
                            <i class="bi-box fs-5"></i>
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
                        <label class="form-label small fw-semibold">Recherche Globale</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi-search"></i></span>
                            <input type="text" class="form-control" id="searchInput" placeholder="Nom, description...">
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label small fw-semibold">Statut</label>
                        <select class="form-select" id="statusFilter">
                            <option value="">Tous</option>
                            <option value="1">Actives</option>
                            <option value="0">Inactives</option>
                        </select>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label small fw-semibold">Trier par</label>
                        <select class="form-select" id="sortByFilter">
                            <option value="label">Nom</option>
                            <option value="created_at">Date de création</option>
                            <option value="products_count">Nombre de produits</option>
                        </select>
                    </div>

                    <div class="col-md-2 mb-3 d-flex align-items-end">
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
                            <span id="categoryCount">0</span> catégorie(s) trouvée(s)
                        </h5>
                    </div>
                    <div class="col-auto">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="exportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi-download me-1"></i> Exporter
                        </button>
                            <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                                <li>
                                    <a class="dropdown-item" href="#" onclick="exportCategories('excel')">
                                        <i class="bi-file-earmark-excel text-success me-2"></i> Excel (.xlsx)
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#" onclick="exportCategories('pdf')">
                                        <i class="bi-file-earmark-pdf text-danger me-2"></i> PDF
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination - Moved to top -->
            <div class="card mb-3">
                <div class="card-body py-2">
                    <div class="row align-items-center">
                        <div class="col-sm mb-2 mb-sm-0">
                            <div class="d-flex align-items-center">
                                <span class="me-2 small text-muted">Afficher</span>
                                <select class="form-select form-select-sm w-auto" id="perPageSelect">
                                    <option value="10">10</option>
                                    <option value="15" selected>15</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                <span class="ms-2 small text-muted">par page</span>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div class="d-flex align-items-center gap-3">
                                <div id="paginationInfo" class="small text-muted">
                                    <!-- Pagination info will be generated here -->
                                </div>
                            <nav>
                                <ul class="pagination pagination-sm mb-0" id="pagination">
                                    <!-- Pagination will be generated here -->
                                </ul>
                            </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-nowrap align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Catégorie</th>
                            <th>Description</th>
                            <th>Produits</th>
                            <th>Statut</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="categoriesTableBody">
                        <!-- Loading skeleton -->
                        <tr class="skeleton-row">
                            <td colspan="5" class="text-center py-5">
                                <div class="spinner-border text-primary-custom" role="status">
                                    <span class="visually-hidden">Chargement...</span>
                                </div>
                                <p class="mt-3 text-muted">Chargement des catégories...</p>
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
    let currentPage = 1;
    let perPage = 15;
    let totalCategories = 0;
    let debounceTimer;

    document.addEventListener('DOMContentLoaded', function() {
        loadCategories();

        // Event listeners pour les filtres
        document.getElementById('searchInput').addEventListener('input', debounceSearch);
        document.getElementById('statusFilter').addEventListener('change', loadCategories);
        document.getElementById('sortByFilter').addEventListener('change', loadCategories);
        document.getElementById('perPageSelect').addEventListener('change', function() {
            perPage = parseInt(this.value);
            currentPage = 1;
            loadCategories();
        });
    });

    function debounceSearch() {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(loadCategories, 500);
    }

    async function loadCategories() {
        const searchInput = document.getElementById('searchInput').value;
        const status = document.getElementById('statusFilter').value;
        const sortBy = document.getElementById('sortByFilter').value;

        const params = new URLSearchParams({
            page: currentPage,
            per_page: perPage
        });

        if (searchInput) params.append('search', searchInput);
        if (status !== '') params.append('is_active', status);
        if (sortBy) params.append('sort', sortBy);

        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            
            if (!accessToken) {
                console.error('Token d\'accès manquant');
                showError('Token d\'accès manquant');
                return;
            }

            const response = await fetch(`https://toure.gestiem.com/api/product-categories?${params}`, {
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            const result = await response.json();

            if (response.ok) {
                // L'API retourne directement un tableau de catégories
                const categories = Array.isArray(result) ? result : (result.data || []);
                displayCategories(categories);
                updatePagination(result.meta || result.pagination || { total: categories.length, current_page: 1, last_page: 1 });
                updateStats(categories);
            } else {
                showError('Erreur lors du chargement des catégories');
            }
        } catch (error) {
            console.error('Error:', error);
            showError('Erreur de connexion au serveur');
        }
    }

    function displayCategories(categories) {
        const tbody = document.getElementById('categoriesTableBody');

        // Vérifier que categories est bien un tableau
        if (!Array.isArray(categories)) {
            console.error('categories is not an array:', categories);
            showError('Format de données invalide');
            return;
        }

        if (categories.length === 0) {
            tbody.innerHTML = `
            <tr>
                <td colspan="5" class="text-center py-5">
                    <i class="bi-inbox fs-1 text-muted"></i>
                    <p class="mt-3 text-muted">Aucune catégorie trouvée</p>
                </td>
            </tr>
        `;
            document.getElementById('categoryCount').textContent = '0';
            return;
        }

        tbody.innerHTML = categories.map(category => `
        <tr onclick="viewCategory('${category.product_category_id}')">
            <td>
                <div class="d-flex align-items-center">
                    <div class="category-avatar me-3">
                        ${getInitials(category.label)}
                    </div>
                    <div>
                        <h6 class="mb-0">${category.label || 'Catégorie sans nom'}</h6>
                        <small class="text-muted">ID: ${category.product_category_id}</small>
                    </div>
                </div>
            </td>
            <td>
                <div class="text-truncate" style="max-width: 200px;" title="${category.description || 'Aucune description'}">
                    ${category.description || '-'}
                </div>
            </td>
            <td>
                <span class="badge bg-info">0 produits</span>
            </td>
            <td>
                <span class="badge ${category.is_active ? 'bg-success' : 'bg-secondary'}">
                    ${category.is_active ? 'Active' : 'Inactive'}
                </span>
            </td>
            <td class="text-end">
                <button class="btn btn-sm action-btn btn-outline-primary" onclick="editCategory(event, '${category.product_category_id}')" title="Modifier">
                    <i class="bi-pencil"></i>
                </button>
                <button class="btn btn-sm action-btn btn-outline-info" onclick="viewCategoryDetails(event, '${category.product_category_id}')" title="Détails">
                    <i class="bi-eye"></i>
                </button>
            </td>
        </tr>
    `).join('');

        document.getElementById('categoryCount').textContent = categories.length;
    }

    function updatePagination(meta) {
        if (!meta) return;

        const pagination = document.getElementById('pagination');
        const totalPages = meta.last_page || Math.ceil(meta.total / perPage);
        const currentPageNum = meta.current_page || currentPage;
        const totalItems = meta.total || 0;
        const from = meta.from || ((currentPageNum - 1) * perPage + 1);
        const to = meta.to || Math.min(currentPageNum * perPage, totalItems);

        // Update current page
        currentPage = currentPageNum;

        let paginationHTML = '';

        // Previous button
        paginationHTML += `
        <li class="page-item ${currentPageNum === 1 ? 'disabled' : ''}">
            <a class="page-link" href="#" onclick="changePage(${currentPageNum - 1}); return false;" 
               ${currentPageNum === 1 ? 'tabindex="-1" aria-disabled="true"' : ''}>
                <i class="bi-chevron-left"></i>
                <span class="d-none d-sm-inline ms-1">Précédent</span>
            </a>
        </li>
    `;

        // Calculate page range
        let startPage = Math.max(1, currentPageNum - 2);
        let endPage = Math.min(totalPages, currentPageNum + 2);

        // Adjust range if we're near the beginning or end
        if (endPage - startPage < 4) {
            if (startPage === 1) {
                endPage = Math.min(totalPages, startPage + 4);
            } else {
                startPage = Math.max(1, endPage - 4);
            }
        }

        // First page and ellipsis
        if (startPage > 1) {
            paginationHTML += `
            <li class="page-item">
                <a class="page-link" href="#" onclick="changePage(1); return false;">1</a>
            </li>
            `;
            if (startPage > 2) {
                paginationHTML += `
                <li class="page-item disabled">
                    <span class="page-link">...</span>
                </li>
                `;
            }
        }

        // Page numbers
        for (let i = startPage; i <= endPage; i++) {
            paginationHTML += `
            <li class="page-item ${i === currentPageNum ? 'active' : ''}">
                <a class="page-link" href="#" onclick="changePage(${i}); return false;">${i}</a>
            </li>
        `;
        }

        // Last page and ellipsis
        if (endPage < totalPages) {
            if (endPage < totalPages - 1) {
                paginationHTML += `
                <li class="page-item disabled">
                    <span class="page-link">...</span>
                </li>
                `;
            }
            paginationHTML += `
            <li class="page-item">
                <a class="page-link" href="#" onclick="changePage(${totalPages}); return false;">${totalPages}</a>
            </li>
            `;
        }

        // Next button
        paginationHTML += `
        <li class="page-item ${currentPageNum === totalPages ? 'disabled' : ''}">
            <a class="page-link" href="#" onclick="changePage(${currentPageNum + 1}); return false;"
               ${currentPageNum === totalPages ? 'tabindex="-1" aria-disabled="true"' : ''}>
                <span class="d-none d-sm-inline me-1">Suivant</span>
                <i class="bi-chevron-right"></i>
            </a>
        </li>
    `;

        pagination.innerHTML = paginationHTML;

        // Update pagination info
        updatePaginationInfo(from, to, totalItems);
    }

    function updatePaginationInfo(from, to, total) {
        const infoElement = document.getElementById('paginationInfo');
        if (infoElement) {
            infoElement.innerHTML = `
                <span class="text-muted">
                    Affichage de <strong>${from}</strong> à <strong>${to}</strong> 
                    sur <strong>${total}</strong> catégories
                </span>
            `;
        }
    }

    function updateStats(categories) {
        // Vérifier que categories est bien un tableau
        if (!Array.isArray(categories)) {
            console.error('categories is not an array in updateStats:', categories);
            return;
        }

        document.getElementById('totalCategories').textContent = categories.length;

        // Calculs pour les stats
        const activeCount = categories.filter(c => c.is_active).length;
        const inactiveCount = categories.filter(c => !c.is_active).length;
        const totalProducts = 0; // Pas de compteur de produits dans l'API actuelle

        document.getElementById('activeCategories').textContent = activeCount;
        document.getElementById('inactiveCategories').textContent = inactiveCount;
        document.getElementById('totalProducts').textContent = totalProducts;
    }

    function changePage(page) {
        if (page < 1 || page === currentPage) return;
        
        // Show loading state
        const pagination = document.getElementById('pagination');
        const originalHTML = pagination.innerHTML;
        pagination.innerHTML = `
            <li class="page-item disabled">
                <span class="page-link">
                    <div class="spinner-border spinner-border-sm" role="status">
                        <span class="visually-hidden">Chargement...</span>
                    </div>
                </span>
            </li>
        `;
        
        currentPage = page;
        loadCategories().finally(() => {
            // Restore pagination if there's an error
            if (pagination.children.length === 1) {
                pagination.innerHTML = originalHTML;
            }
        });
    }

    function changePerPage(newPerPage) {
        perPage = parseInt(newPerPage);
        currentPage = 1; // Reset to first page
        loadCategories();
    }

    function resetFilters() {
        document.getElementById('searchInput').value = '';
        document.getElementById('statusFilter').value = '';
        document.getElementById('sortByFilter').value = 'label';
        currentPage = 1;
        loadCategories();
    }

    function getInitials(label) {
        if (!label) return 'CA';
        return label.split(' ').map(n => n[0]).join('').substring(0, 2).toUpperCase();
    }

    function viewCategory(categoryId) {
        window.location.href = `/categorie/${categoryId}/details`;
    }

    function editCategory(event, categoryId) {
        event.stopPropagation();
        window.location.href = `/categorie/${categoryId}/edit`;
    }

    function viewCategoryDetails(event, categoryId) {
        event.stopPropagation();
        window.location.href = `/categorie/${categoryId}/details`;
    }

    async function exportCategories(format = 'excel') {
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
            
            if (format === 'excel') {
                await exportToExcel([]);
            } else if (format === 'pdf') {
                await exportToPDF([]);
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

    async function exportToExcel(data) {
        try {
            // Get ALL categories (not just current page) for complete export
            const filters = getCurrentFilters();
            const completeCategoryData = await fetchAllCategoriesFromAPI(filters);
            const categories = Array.isArray(completeCategoryData) ? completeCategoryData : (completeCategoryData.data || []);
            
            if (!categories || categories.length === 0) {
                showToast('Export Excel', 'Aucune catégorie à exporter', 'warning');
                return;
            }

            // Create workbook and worksheet
            const wb = XLSX.utils.book_new();
            
            // Prepare data with proper headers and formatting
            const excelData = categories.map((category, index) => ({
                'N°': index + 1,
                'ID Catégorie': category.product_category_id || '',
                'Nom de la Catégorie': category.label || '',
                'Description': category.description || '',
                'Statut': category.is_active ? 'Active' : 'Inactive',
                'Date de Création': category.created_at ? formatDate(category.created_at) : '',
                'Dernière Modification': category.updated_at ? formatDate(category.updated_at) : ''
            }));
            
            const ws = XLSX.utils.json_to_sheet(excelData);
            
            // Set column widths for better readability
            const colWidths = [
                { wch: 6 },  // N°
                { wch: 15 }, // ID Catégorie
                { wch: 25 }, // Nom de la Catégorie
                { wch: 45 }, // Description
                { wch: 12 }, // Statut
                { wch: 18 }, // Date de Création
                { wch: 18 }  // Dernière Modification
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
            for (let row = 1; row <= categories.length; row++) {
                for (let col = headerRange.s.c; col <= headerRange.e.c; col++) {
                    const cellAddress = XLSX.utils.encode_cell({ r: row, c: col });
                    if (!ws[cellAddress]) continue;
                    
                    // Special styling for status column
                    if (col === 4) { // Statut column
                        const isActive = ws[cellAddress].v === 'Active';
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
                ['Total des catégories', categories.length],
                ['Catégories actives', categories.filter(c => c.is_active).length],
                ['Catégories inactives', categories.filter(c => !c.is_active).length],
                [''],
                ['Date d\'export', new Date().toLocaleDateString('fr-FR')],
                ['Heure d\'export', new Date().toLocaleTimeString('fr-FR', {hour: '2-digit', minute: '2-digit'})],
                ['Filtres appliqués', JSON.stringify(filters, null, 2)]
            ];
            
            const summaryWs = XLSX.utils.aoa_to_sheet(summaryData);
            summaryWs['!cols'] = [{ wch: 25 }, { wch: 30 }];
            
            // Style summary sheet
            summaryWs['A1'].s = {
                font: { bold: true, size: 14, color: { rgb: "F00480" } },
                alignment: { horizontal: "center", vertical: "center" }
            };
            
            // Add worksheets to workbook
            XLSX.utils.book_append_sheet(wb, ws, 'Liste des Catégories');
            XLSX.utils.book_append_sheet(wb, summaryWs, 'Résumé');
            
            // Generate Excel file
            const excelBuffer = XLSX.write(wb, { bookType: 'xlsx', type: 'array' });
            const blob = new Blob([excelBuffer], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
            
            // Download file
            const url = window.URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = url;
            link.download = `Liste_Categories_${new Date().toISOString().split('T')[0]}.xlsx`;
            link.click();
            window.URL.revokeObjectURL(url);
            
            showToast('Export Excel', `Fichier Excel téléchargé avec succès (${categories.length} catégories)`, 'success');
            
        } catch (error) {
            console.error('Erreur lors de l\'export Excel:', error);
            showToast('Erreur Excel', 'Erreur lors de la génération du fichier Excel', 'error');
        }
    }

    async function exportToPDF(data) {
        try {
            console.log('Début de l\'export PDF');
            
            // Check if PDFMake is loaded
            if (typeof pdfMake === 'undefined') {
                throw new Error('PDFMake n\'est pas chargé. Veuillez recharger la page.');
            }
            
            // Get ALL categories for complete export
            const filters = getCurrentFilters();
            console.log('Filtres appliqués:', filters);
            
            const completeCategoryData = await fetchAllCategoriesFromAPI(filters);
            const categories = Array.isArray(completeCategoryData) ? completeCategoryData : (completeCategoryData.data || []);
            
            console.log('Catégories récupérées:', categories.length);
            
            if (!categories || categories.length === 0) {
                showToast('Export PDF', 'Aucune catégorie à exporter', 'warning');
                return;
            }

            // Prepare PDF data
            const pdfData = categories.map((category, index) => [
                index + 1,
                category.label || 'N/A',
                category.description || '-',
                category.is_active ? 'Active' : 'Inactive',
                category.created_at ? formatDate(category.created_at) : '-'
            ]);

            // PDF configuration - Version simplifiée
            const docDefinition = {
                pageSize: 'A4',
                pageMargins: [40, 60, 40, 60],
                
                content: [
                    // Titre principal
                    {
                        text: 'LISTE DES CATÉGORIES DE PRODUITS',
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
                            { text: `${categories.length} catégorie(s)`, bold: true },
                            { text: ' | Actives: ', bold: true },
                            { text: `${categories.filter(c => c.is_active).length}`, bold: true },
                            { text: ' | Inactives: ', bold: true },
                            { text: `${categories.filter(c => !c.is_active).length}`, bold: true }
                        ],
                        fontSize: 10,
                        margin: [0, 0, 0, 20]
                    },
                    
                    // Tableau des catégories
                    {
                        table: {
                            headerRows: 1,
                            widths: ['8%', '25%', '35%', '12%', '20%'],
                            body: [
                                // En-tête du tableau
                                [
                                    { text: 'N°', style: 'tableHeader', alignment: 'center' },
                                    { text: 'Nom de la Catégorie', style: 'tableHeader' },
                                    { text: 'Description', style: 'tableHeader' },
                                    { text: 'Statut', style: 'tableHeader', alignment: 'center' },
                                    { text: 'Date de Création', style: 'tableHeader', alignment: 'center' }
                                ],
                                // Données des catégories
                                ...pdfData.map(row => [
                                    { text: row[0].toString(), alignment: 'center', fontSize: 9 },
                                    { text: row[1], fontSize: 9 },
                                    { text: row[2], fontSize: 9 },
                                    { 
                                        text: row[3], 
                                        alignment: 'center',
                                        fontSize: 9,
                                        bold: true,
                                        color: row[3] === 'Active' ? '#28a745' : '#6c757d'
                                    },
                                    { text: row[4], alignment: 'center', fontSize: 9 }
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
            console.log('Génération du PDF...');
            
            // Test de création du PDF
            const pdfDocGenerator = pdfMake.createPdf(docDefinition);
            
            // Téléchargement du PDF
            pdfDocGenerator.download(`Liste_Categories_${new Date().toISOString().split('T')[0]}.pdf`);
            
            console.log('PDF généré avec succès');
            showToast('Export PDF', `Fichier PDF téléchargé avec succès (${categories.length} catégories)`, 'success');
            
        } catch (error) {
            console.error('Erreur lors de l\'export PDF:', error);
            console.error('Détails de l\'erreur:', error.message);
            console.error('Stack trace:', error.stack);
            
            let errorMessage = 'Erreur lors de la génération du PDF';
            if (error.message.includes('PDFMake')) {
                errorMessage = 'PDFMake n\'est pas chargé. Veuillez recharger la page.';
            } else if (error.message.includes('fetch')) {
                errorMessage = 'Erreur lors de la récupération des données.';
            }
            
            showToast('Erreur PDF', errorMessage, 'error');
        }
    }
    
    function getCurrentFilters() {
        return {
            search: document.getElementById('searchInput')?.value || '',
            status: document.getElementById('statusFilter')?.value || '',
            sort: document.getElementById('sortByFilter')?.value || ''
        };
    }

    function formatDate(dateString) {
        if (!dateString) return 'N/A';
        return new Date(dateString).toLocaleDateString('fr-FR');
    }

    async function fetchCategoriesFromAPI(page, perPage, filters) {
        try {
            const params = new URLSearchParams({
                page: page,
                per_page: perPage
            });

            if (filters.search) params.append('search', filters.search);
            if (filters.status !== '') params.append('is_active', filters.status);
            if (filters.sort) params.append('sort', filters.sort);

            const url = `https://toure.gestiem.com/api/product-categories?${params}`;

            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            
            const response = await fetch(url, {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            if (!response.ok) {
                throw new Error(`Erreur ${response.status}: ${response.statusText}`);
            }

            const result = await response.json();
            // L'API retourne directement un tableau, pas un objet avec data
            return Array.isArray(result) ? result : (result.data || []);
        } catch (error) {
            console.error('Erreur lors de la récupération des catégories:', error);
            throw error;
        }
    }

    async function fetchAllCategoriesFromAPI(filters) {
        try {
            const params = new URLSearchParams({
                per_page: 1000 // Récupérer un grand nombre pour avoir toutes les catégories
            });

            if (filters.search) params.append('search', filters.search);
            if (filters.status !== '') params.append('is_active', filters.status);
            if (filters.sort) params.append('sort', filters.sort);

            const url = `https://toure.gestiem.com/api/product-categories?${params}`;

            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            
            const response = await fetch(url, {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            if (!response.ok) {
                throw new Error(`Erreur ${response.status}: ${response.statusText}`);
            }

            const result = await response.json();
            // L'API retourne directement un tableau, pas un objet avec data
            return Array.isArray(result) ? result : (result.data || []);
        } catch (error) {
            console.error('Erreur lors de la récupération de toutes les catégories:', error);
            throw error;
        }
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
        const tbody = document.getElementById('categoriesTableBody');
        tbody.innerHTML = `
        <tr>
            <td colspan="5" class="text-center py-5">
                <i class="bi-exclamation-triangle fs-1 text-danger"></i>
                <p class="mt-3 text-danger">${message}</p>
                <button class="btn btn-sm btn-primary-custom" onclick="loadCategories()">
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
