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

    .badge-type {
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 600;
    }

    .badge-long-terme {
        background-color: #e3f2fd;
        color: #1976d2;
    }

    .badge-court-terme {
        background-color: #fff3e0;
        color: #f57c00;
    }

    .badge-comptant {
        background-color: #e8f5e9;
        color: #388e3c;
    }

    .badge-litigieux {
        background-color: #ffebee;
        color: #d32f2f;
    }

    .badge-indefini {
        background-color: #f5f5f5;
        color: #757575;
    }

    .fournisseur-avatar {
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
        
        .fournisseur-avatar {
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
                            <li class="breadcrumb-item active">Fournisseurs</li>
                        </ol>
                    </nav>
                    <h1 class="page-header-title text-secondary-custom">
                        <i class="bi-truck me-2"></i>Liste des Fournisseurs
                    </h1>
                    <p class="text-muted mb-0">Gérez vos fournisseurs et partenaires commerciaux</p>
                </div>

                <div class="col-sm-auto">
                    <a class="btn btn-primary-custom" href="/fournisseur/ajouter">
                        <i class="bi-plus-lg me-1"></i> Nouveau Fournisseur 
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
                            <span class="d-block text-muted small mb-1">Total Fournisseurs</span>
                            <h4 class="mb-0 text-secondary-custom" id="totalFournisseurs">-</h4>
                        </div>
                        <div class="fournisseur-avatar" style="width: 40px; height: 40px;">
                            <i class="bi-building fs-5"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="stats-card" style="border-left-color: #28a745;">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <div>
                            <span class="d-block text-muted small mb-1">Fournisseurs Actifs</span>
                            <h4 class="mb-0 text-success" id="activeFournisseurs">-</h4>
                        </div>
                        <div class="fournisseur-avatar" style="width: 40px; height: 40px; background: linear-gradient(135deg, #28a745 0%, #20c997 100%);">
                            <i class="bi-check-circle fs-5"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="stats-card" style="border-left-color: #ffc107;">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <div>
                            <span class="d-block text-muted small mb-1">Fournisseurs Inactifs</span>
                            <h4 class="mb-0 text-warning" id="inactiveFournisseurs">-</h4>
                        </div>
                        <div class="fournisseur-avatar" style="width: 40px; height: 40px; background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);">
                            <i class="bi-x-circle fs-5"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="stats-card" style="border-left-color: #17a2b8;">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <div>
                            <span class="d-block text-muted small mb-1">Note Moyenne</span>
                            <h4 class="mb-0 text-info" id="avgRating">-</h4>
                        </div>
                        <div class="fournisseur-avatar" style="width: 40px; height: 40px; background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);">
                            <i class="bi-star-fill fs-5"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="card card-custom filter-card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label small fw-semibold">Recherche Globale</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi-search"></i></span>
                            <input type="text" class="form-control" id="searchInput" placeholder="Nom, email, code...">
                        </div>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label class="form-label small fw-semibold">Ville</label>
                        <select class="form-select" id="cityFilter">
                            <option value="">Toutes les villes</option>
                            <option value="Abidjan">Abidjan</option>
                            <option value="Yamoussoukro">Yamoussoukro</option>
                            <option value="Bouaké">Bouaké</option>
                            <option value="Daloa">Daloa</option>
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
                        <label class="form-label small fw-semibold">Trier par</label>
                        <select class="form-select" id="sortByFilter">
                            <option value="name">Nom</option>
                            <option value="code">Code</option>
                            <option value="created_at">Date de création</option>
                            <option value="city">Ville</option>
                        </select>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label class="form-label small fw-semibold">Type de Paiement</label>
                        <select class="form-select" id="paymentFilter">
                            <option value="">Tous les types</option>
                            <option value="comptant">Comptant</option>
                            <option value="credit">Crédit</option>
                            <option value="30j">30 jours</option>
                            <option value="60j">60 jours</option>
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
                            <span id="fournisseurCount">0</span> fournisseur(s) trouvé(s)
                        </h5>
                    </div>
                    <div class="col-auto">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="exportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi-download me-1"></i> Exporter
                        </button>
                            <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                                <li>
                                    <a class="dropdown-item" href="#" onclick="exportFournisseurs('excel')">
                                        <i class="bi-file-earmark-excel text-success me-2"></i> Excel (.xlsx)
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#" onclick="exportFournisseurs('pdf')">
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
                            <th>Fournisseur</th>
                            <th>Contact</th>
                            <th>Ville</th>
                            <th>Paiement</th>
                            <th>Statut</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="fournisseursTableBody">
                        <!-- Loading skeleton -->
                        <tr class="skeleton-row">
                            <td colspan="6" class="text-center py-5">
                                <div class="spinner-border text-primary-custom" role="status">
                                    <span class="visually-hidden">Chargement...</span>
                                </div>
                                <p class="mt-3 text-muted">Chargement des fournisseurs...</p>
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
    });
</script>

<script>
    let currentPage = 1;
    let perPage = 15;
    let totalFournisseurs = 0;
    let debounceTimer;

    document.addEventListener('DOMContentLoaded', function() {
        loadFournisseurs();

        // Event listeners pour les filtres
        document.getElementById('searchInput').addEventListener('input', debounceSearch);
        document.getElementById('cityFilter').addEventListener('change', loadFournisseurs);
        document.getElementById('statusFilter').addEventListener('change', loadFournisseurs);
        document.getElementById('sortByFilter').addEventListener('change', loadFournisseurs);
        document.getElementById('paymentFilter').addEventListener('change', loadFournisseurs);
        document.getElementById('perPageSelect').addEventListener('change', function() {
            perPage = parseInt(this.value);
            currentPage = 1;
            loadFournisseurs();
        });
    });

    function debounceSearch() {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(loadFournisseurs, 500);
    }

    async function loadFournisseurs() {
        const searchInput = document.getElementById('searchInput').value;
        const city = document.getElementById('cityFilter').value;
        const status = document.getElementById('statusFilter').value;
        const sortBy = document.getElementById('sortByFilter').value;
        const payment = document.getElementById('paymentFilter').value;

        const params = new URLSearchParams({
            page: currentPage,
            per_page: perPage
        });

        if (searchInput) params.append('search', searchInput);
        if (city) params.append('city', city);
        if (status !== '') params.append('is_active', status);
        if (sortBy) params.append('sort', sortBy);
        if (payment) params.append('payment_terms', payment);

        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            
            if (!accessToken) {
                console.error('Token d\'accès manquant');
                showError('Token d\'accès manquant');
                return;
            }

            const response = await fetch(`https://toure.gestiem.com/api/fournisseurs?${params}`, {
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            const result = await response.json();

            if (response.ok) {
                displayFournisseurs(result.data);
                updatePagination(result.meta || result.pagination);
                updateStats(result);
            } else {
                showError('Erreur lors du chargement des fournisseurs');
            }
        } catch (error) {
            console.error('Error:', error);
            showError('Erreur de connexion au serveur');
        }
    }

    function displayFournisseurs(fournisseurs) {
        const tbody = document.getElementById('fournisseursTableBody');

        if (fournisseurs.length === 0) {
            tbody.innerHTML = `
            <tr>
                <td colspan="6" class="text-center py-5">
                    <i class="bi-inbox fs-1 text-muted"></i>
                    <p class="mt-3 text-muted">Aucun fournisseur trouvé</p>
                </td>
            </tr>
        `;
            document.getElementById('fournisseurCount').textContent = '0';
            return;
        }

        tbody.innerHTML = fournisseurs.map(fournisseur => `
        <tr onclick="viewFournisseur('${fournisseur.fournisseur_id}')">
            <td>
                <div class="d-flex align-items-center">
                    <div class="fournisseur-avatar me-3">
                        ${getInitials(fournisseur.name)}
                    </div>
                    <div>
                        <h6 class="mb-0">${fournisseur.name || 'Fournisseur sans nom'}</h6>
                        <small class="text-muted">${fournisseur.code || 'Code non défini'}</small>
                    </div>
                </div>
            </td>
            <td>
                <div>
                    ${fournisseur.email ? `<div class="small"><i class="bi-envelope me-1"></i>${fournisseur.email}</div>` : ''}
                    ${fournisseur.phone ? `<div class="small"><i class="bi-telephone me-1"></i>${fournisseur.phone}</div>` : ''}
                </div>
            </td>
            <td>${fournisseur.city || '-'}</td>
            <td>
                <span class="badge badge-type ${getPaymentBadgeClass(fournisseur.payment_terms)}">
                    ${fournisseur.payment_terms || 'Non défini'}
                </span>
            </td>
            <td>
                <span class="badge ${fournisseur.is_active ? 'bg-success' : 'bg-danger'}">
                    ${fournisseur.is_active ? 'Actif' : 'Inactif'}
                </span>
            </td>
            <td class="text-end">
                <button class="btn btn-sm action-btn btn-outline-primary" onclick="editFournisseur(event, '${fournisseur.fournisseur_id}')" title="Modifier">
                    <i class="bi-pencil"></i>
                </button>
                <button class="btn btn-sm action-btn btn-outline-info" onclick="viewFournisseurDetails(event, '${fournisseur.fournisseur_id}')" title="Détails">
                    <i class="bi-eye"></i>
                </button>
            </td>
        </tr>
    `).join('');

        document.getElementById('fournisseurCount').textContent = fournisseurs.length;
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
                    sur <strong>${total}</strong> fournisseurs
                </span>
            `;
        }
    }

    function updateStats(result) {
        document.getElementById('totalFournisseurs').textContent = result.meta?.total || result.data.length;

        // Calculs pour les stats
        const fournisseurs = result.data;
        const activeCount = fournisseurs.filter(f => f.is_active).length;
        const inactiveCount = fournisseurs.filter(f => !f.is_active).length;
        
        // Calculer une note moyenne fictive basée sur l'activité
        const total = fournisseurs.length;
        const avgRating = total > 0 ? (activeCount / total * 5).toFixed(1) : '0.0';

        document.getElementById('activeFournisseurs').textContent = activeCount;
        document.getElementById('inactiveFournisseurs').textContent = inactiveCount;
        document.getElementById('avgRating').textContent = avgRating;
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
        loadFournisseurs().finally(() => {
            // Restore pagination if there's an error
            if (pagination.children.length === 1) {
                pagination.innerHTML = originalHTML;
            }
        });
    }

    function changePerPage(newPerPage) {
        perPage = parseInt(newPerPage);
        currentPage = 1; // Reset to first page
        loadFournisseurs();
    }

    function resetFilters() {
        document.getElementById('searchInput').value = '';
        document.getElementById('cityFilter').value = '';
        document.getElementById('statusFilter').value = '';
        document.getElementById('sortByFilter').value = 'name';
        document.getElementById('paymentFilter').value = '';
        currentPage = 1;
        loadFournisseurs();
    }

    function getInitials(name) {
        if (!name) return 'FN';
        return name.split(' ').map(n => n[0]).join('').substring(0, 2).toUpperCase();
    }

    function getPaymentBadgeClass(paymentTerms) {
        if (!paymentTerms) return 'badge-indefini';
        
        const terms = paymentTerms.toLowerCase();
        if (terms.includes('comptant')) return 'badge-comptant';
        if (terms.includes('30') || terms.includes('trente')) return 'badge-long-terme';
        if (terms.includes('60') || terms.includes('soixante')) return 'badge-court-terme';
        return 'badge-indefini';
    }

    function viewFournisseur(fournisseurId) {
        window.location.href = `/fournisseur/${fournisseurId}/details`;
    }

    function editFournisseur(event, fournisseurId) {
        event.stopPropagation();
        window.location.href = `/fournisseur/${fournisseurId}/edit`;
    }

    function viewFournisseurDetails(event, fournisseurId) {
        event.stopPropagation();
        window.location.href = `/fournisseur/${fournisseurId}/details`;
    }

    async function exportFournisseurs(format = 'excel') {
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
        // Get complete fournisseur data from API instead of table data
        const filters = getCurrentFilters();
        const completeFournisseurData = await fetchFournisseursFromAPI(currentPage, perPage, filters);
        const fournisseurs = completeFournisseurData.data || [];
        
        // Create workbook and worksheet
        const wb = XLSX.utils.book_new();
        
        // Prepare data with proper headers and formatting
        const excelData = fournisseurs.map(fournisseur => ({
            'Nom du Fournisseur': fournisseur.name || '',
            'Code': fournisseur.code || '',
            'Email': fournisseur.email || '',
            'Téléphone': fournisseur.phone || '',
            'Responsable': fournisseur.responsable || '',
            'Ville': fournisseur.city || '',
            'Conditions de Paiement': fournisseur.payment_terms || '',
            'Statut': fournisseur.is_active ? 'Actif' : 'Inactif',
            'Date de Création': fournisseur.created_at ? formatDate(fournisseur.created_at) : ''
        }));
        
        const ws = XLSX.utils.json_to_sheet(excelData);
        
        // Set column widths
        const colWidths = [
            { wch: 30 }, // Nom du Fournisseur
            { wch: 15 }, // Code
            { wch: 25 }, // Email
            { wch: 18 }, // Téléphone
            { wch: 20 }, // Responsable
            { wch: 18 }, // Ville
            { wch: 20 }, // Conditions de Paiement
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
        for (let row = 1; row <= fournisseurs.length; row++) {
            for (let col = headerRange.s.c; col <= headerRange.e.c; col++) {
                const cellAddress = XLSX.utils.encode_cell({ r: row, c: col });
                if (!ws[cellAddress]) continue;
                
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
        
        // Add worksheet to workbook
        XLSX.utils.book_append_sheet(wb, ws, 'Liste des Fournisseurs');
        
        // Generate Excel file
        const excelBuffer = XLSX.write(wb, { bookType: 'xlsx', type: 'array' });
        const blob = new Blob([excelBuffer], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
        
        // Download file
        const url = window.URL.createObjectURL(blob);
        const link = document.createElement('a');
        link.href = url;
        link.download = `Liste_Fournisseurs_${new Date().toISOString().split('T')[0]}.xlsx`;
        link.click();
        window.URL.revokeObjectURL(url);
    }

    async function exportToPDF(data) {
        try {
            // Check if PDFMake is loaded
            if (typeof pdfMake === 'undefined') {
                throw new Error('PDFMake n\'est pas chargé. Veuillez recharger la page.');
            }
            
            console.log('PDFMake chargé:', typeof pdfMake);
            
            // Get current filters
            const filters = getCurrentFilters();
            console.log('Filtres:', filters);
            
            // Get complete fournisseur data from API
            const completeFournisseurData = await fetchFournisseursFromAPI(currentPage, perPage, filters);
            const fournisseurs = completeFournisseurData.data || [];
            
            console.log('Fournisseurs récupérés:', fournisseurs.length);
            
            if (fournisseurs.length === 0) {
                throw new Error('Aucune donnée à exporter');
            }
            
            // Generate PDF with PDFMake
            const pdfDoc = generatePDFWithPDFMake(fournisseurs, filters);
            console.log('Document PDF généré:', pdfDoc);
            
            // Validate PDF document
            if (!pdfDoc || !pdfDoc.content) {
                throw new Error('Document PDF invalide généré');
            }
            
            // Download the PDF
            try {
                const pdf = pdfMake.createPdf(pdfDoc);
                console.log('PDF créé par PDFMake:', pdf);
                
                pdf.download(`Liste_Fournisseurs_${new Date().toISOString().split('T')[0]}.pdf`);
                console.log('Téléchargement PDF lancé');
            } catch (downloadError) {
                console.error('Erreur lors du téléchargement:', downloadError);
                throw new Error('Erreur lors du téléchargement du PDF: ' + downloadError.message);
            }
            
        } catch (error) {
            console.error('Erreur lors de l\'export PDF:', error);
            throw error;
        }
    }

    function generatePDFWithPDFMake(fournisseurs, filters) {
        console.log('Génération du PDF avec', fournisseurs.length, 'fournisseurs');
        
        const dateExport = new Date().toLocaleDateString('fr-FR');
        const totalFournisseurs = fournisseurs.length;
        
        // Calculate statistics
        const activeFournisseurs = fournisseurs.filter(fournisseur => fournisseur.is_active);
        const activeCount = activeFournisseurs.length;
        const inactiveCount = totalFournisseurs - activeCount;
        
        // Color scheme - style minimaliste
        const primaryColor = '#2563eb';
        const headerColor = '#F5F5F5';
        const borderColor = '#E0E0E0';
        const textColor = '#333333';
        const secondaryTextColor = '#666666';
        
        const docDefinition = {
            pageSize: 'A4',
            pageOrientation: 'landscape',
            pageMargins: [20, 40, 20, 40],
            
            content: [
                // Title
                {
                    text: 'LISTE DES FOURNISSEURS',
                    style: 'title',
                    margin: [0, 0, 0, 20]
                },
                
                // Export info
                {
                    columns: [
                        {
                            text: `Date d'export: ${dateExport}`,
                            style: 'exportInfo'
                        },
                        {
                            text: `Total: ${totalFournisseurs} fournisseurs`,
                            style: 'exportInfo',
                            alignment: 'right'
                        }
                    ],
                    margin: [0, 0, 0, 20]
                },
                
                // Statistics summary
                {
                    table: {
                        widths: [120, 120, 120, 120],
                        body: [
                            [
                                { text: 'Total Fournisseurs', style: 'statLabel' },
                                { text: 'Fournisseurs Actifs', style: 'statLabel' },
                                { text: 'Fournisseurs Inactifs', style: 'statLabel' },
                                { text: 'Note Moyenne', style: 'statLabel' }
                            ],
                            [
                                { text: totalFournisseurs.toString(), style: 'statValue' },
                                { text: activeCount.toString(), style: 'statValue' },
                                { text: inactiveCount.toString(), style: 'statValue' },
                                { text: (totalFournisseurs > 0 ? (activeCount / totalFournisseurs * 5).toFixed(1) : '0.0'), style: 'statValue' }
                            ]
                        ]
                    },
                    layout: {
                        hLineWidth: function (i, node) {
                            return i === 0 ? 1 : 0;
                        },
                        vLineWidth: function (i, node) {
                            return 0;
                        },
                        hLineColor: borderColor,
                        vLineColor: borderColor
                    },
                    margin: [0, 0, 0, 30]
                },
                
                // Fournisseurs table - pleine largeur
                {
                    table: {
                        headerRows: 1,
                        widths: [40, 150, 120, 100, 90, 100, 90],
                        body: [
                            // Header row
                            [
                                { text: 'ID', style: 'tableHeader' },
                                { text: 'Nom du Fournisseur', style: 'tableHeader' },
                                { text: 'Contact', style: 'tableHeader' },
                                { text: 'Ville', style: 'tableHeader' },
                                { text: 'Paiement', style: 'tableHeader' },
                                { text: 'Statut', style: 'tableHeader' },
                                { text: 'Créé le', style: 'tableHeader' }
                            ],
                            // Data rows
                            ...fournisseurs.map((fournisseur, index) => [
                                { text: (index + 1).toString(), style: 'tableCell', alignment: 'center' },
                                { text: fournisseur.name || 'N/A', style: 'tableCell' },
                                { text: fournisseur.email || fournisseur.phone || 'N/A', style: 'tableCell' },
                                { text: fournisseur.city || 'N/A', style: 'tableCell' },
                                { text: fournisseur.payment_terms || 'N/A', style: 'tableCell' },
                                { text: fournisseur.is_active ? 'Actif' : 'Inactif', style: 'tableCell' },
                                { text: formatDate(fournisseur.created_at), style: 'tableCell' }
                            ])
                        ]
                    },
                    layout: {
                        hLineWidth: function (i, node) {
                            return i === 0 ? 1 : 0.5;
                        },
                        vLineWidth: function (i, node) {
                            return 0.5;
                        },
                        hLineColor: borderColor,
                        vLineColor: borderColor
                    }
                }
            ],
            
            styles: {
                title: {
                    fontSize: 16,
                    bold: true,
                    color: primaryColor,
                    alignment: 'center'
                },
                exportInfo: {
                    fontSize: 9,
                    color: secondaryTextColor
                },
                statValue: {
                    fontSize: 10,
                    bold: true,
                    color: textColor,
                    alignment: 'center'
                },
                statLabel: {
                    fontSize: 9,
                    color: secondaryTextColor
                },
                tableHeader: {
                    fontSize: 9,
                    bold: true,
                    color: textColor,
                    fillColor: headerColor,
                    alignment: 'left',
                    margin: [4, 3, 4, 3]
                },
                tableCell: {
                    fontSize: 8,
                    color: textColor,
                    margin: [4, 2, 4, 2]
                }
            },
            
            defaultStyle: {
                fontSize: 8,
                lineHeight: 1.1
            }
        };
        
        console.log('Document PDF complet généré:', docDefinition);
        return docDefinition;
    }
    
    function getCurrentFilters() {
        return {
            search: document.getElementById('searchInput')?.value || '',
            status: document.getElementById('statusFilter')?.value || '',
            city: document.getElementById('cityFilter')?.value || '',
            sort: document.getElementById('sortByFilter')?.value || '',
            payment: document.getElementById('paymentFilter')?.value || ''
        };
    }

    function formatDate(dateString) {
        if (!dateString) return 'N/A';
        return new Date(dateString).toLocaleDateString('fr-FR');
    }

    async function fetchFournisseursFromAPI(page, perPage, filters) {
        try {
            console.log('Récupération des fournisseurs - Page:', page, 'PerPage:', perPage, 'Filtres:', filters);
            
            // Construire l'URL avec les paramètres (même logique que loadFournisseurs)
            const params = new URLSearchParams({
                page: page,
                per_page: perPage
            });

            // Ajouter les filtres
            if (filters.search) params.append('search', filters.search);
            if (filters.city) params.append('city', filters.city);
            if (filters.status !== '') params.append('is_active', filters.status);
            if (filters.sort) params.append('sort', filters.sort);
            if (filters.payment) params.append('payment_terms', filters.payment);

            const url = `https://toure.gestiem.com/api/fournisseurs?${params}`;
            console.log('URL de l\'API:', url);

            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            
            const response = await fetch(url, {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            console.log('Réponse API:', response.status, response.statusText);

            if (!response.ok) {
                throw new Error(`Erreur ${response.status}: ${response.statusText}`);
            }

            const result = await response.json();
            console.log('Données reçues:', result);
            
            // Log de la structure des fournisseurs pour debug
            if (result.data && result.data.length > 0) {
                console.log('Premier fournisseur (structure):', result.data[0]);
                console.log('Champs disponibles:', Object.keys(result.data[0]));
            }
            
            return result;
        } catch (error) {
            console.error('Erreur lors de la récupération des fournisseurs:', error);
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

    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
    }

    function showError(message) {
        const tbody = document.getElementById('fournisseursTableBody');
        tbody.innerHTML = `
        <tr>
            <td colspan="6" class="text-center py-5">
                <i class="bi-exclamation-triangle fs-1 text-danger"></i>
                <p class="mt-3 text-danger">${message}</p>
                <button class="btn btn-sm btn-primary-custom" onclick="loadFournisseurs()">
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