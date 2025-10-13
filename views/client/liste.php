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

    .client-avatar {
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

    .balance-zero {
        color: #6c757d;
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
                            <li class="breadcrumb-item active">Clients</li>
                        </ol>
                    </nav>
                    <h1 class="page-header-title text-secondary-custom">
                        <i class="bi-people-fill me-2"></i>Liste des Clients
                    </h1>
                    <p class="text-muted mb-0">Gérez votre portefeuille clients</p>
                </div>

                <div class="col-sm-auto">
                    <a class="btn btn-primary-custom" href="/nouveau-client">
                        <i class="bi-plus-lg me-1"></i> Nouveau Client
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
                            <span class="d-block text-muted small mb-1">Total Clients</span>
                            <h3 class="mb-0 text-secondary-custom" id="totalClients">-</h3>
                        </div>
                        <div class="client-avatar" style="width: 50px; height: 50px;">
                            <i class="bi-people fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="stats-card" style="border-left-color: #28a745;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="d-block text-muted small mb-1">Clients Actifs</span>
                            <h3 class="mb-0 text-success" id="activeClients">-</h3>
                        </div>
                        <div class="client-avatar" style="width: 50px; height: 50px; background: linear-gradient(135deg, #28a745 0%, #20c997 100%);">
                            <i class="bi-check-circle fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="stats-card" style="border-left-color: #ffc107;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="d-block text-muted small mb-1">Crédit Total</span>
                            <h3 class="mb-0 text-warning" id="totalCredit">-</h3>
                        </div>
                        <div class="client-avatar" style="width: 50px; height: 50px; background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);">
                            <i class="bi-cash-stack fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="stats-card" style="border-left-color: #17a2b8;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="d-block text-muted small mb-1">Solde Total</span>
                            <h3 class="mb-0 text-info" id="totalBalance">-</h3>
                        </div>
                        <div class="client-avatar" style="width: 50px; height: 50px; background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);">
                            <i class="bi-wallet2 fs-4"></i>
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
                        <label class="form-label small fw-semibold">Type de Client</label>
                        <select class="form-select" id="clientTypeFilter">
                            <option value="">Tous les types</option>
                            <option value="0199a5c7-c6b0-72f4-a050-56c10dc7a258">Long terme</option>
                            <option value="0199a5c9-21b3-734f-b30d-b71b01c4f7b7">Court terme</option>
                            <option value="0199a5ca-c426-7246-b3f1-e7f1a79a9477">Comptant</option>
                            <option value="0199a5cc-186a-73d6-b840-7872901a0e30">Litigieux</option>
                        </select>
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
                        <label class="form-label small fw-semibold">Solde</label>
                        <select class="form-select" id="balanceFilter">
                            <option value="">Tous les soldes</option>
                            <option value="positive">Positif</option>
                            <option value="negative">Négatif</option>
                            <option value="zero">Zéro</option>
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
                            <span id="clientCount">0</span> client(s) trouvé(s)
                        </h5>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-sm btn-outline-primary" onclick="exportClients()">
                            <i class="bi-download me-1"></i> Exporter
                        </button>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-nowrap align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Client</th>
                            <th>Type</th>
                            <th>Contact</th>
                            <th>Ville</th>
                            <th>Crédit</th>
                            <th>Solde</th>
                            <th>Statut</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="clientsTableBody">
                        <!-- Loading skeleton -->
                        <tr class="skeleton-row">
                            <td colspan="8" class="text-center py-5">
                                <div class="spinner-border text-primary-custom" role="status">
                                    <span class="visually-hidden">Chargement...</span>
                                </div>
                                <p class="mt-3 text-muted">Chargement des clients...</p>
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
                            <ul class="pagination pagination-sm mb-0" id="pagination">
                                <!-- Pagination will be generated here -->
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    let currentPage = 1;
    let perPage = 15;
    let totalClients = 0;
    let debounceTimer;

    document.addEventListener('DOMContentLoaded', function() {
        loadClients();

        // Event listeners pour les filtres
        document.getElementById('searchInput').addEventListener('input', debounceSearch);
        document.getElementById('clientTypeFilter').addEventListener('change', loadClients);
        document.getElementById('cityFilter').addEventListener('change', loadClients);
        document.getElementById('balanceFilter').addEventListener('change', loadClients);
        document.getElementById('statusFilter').addEventListener('change', loadClients);
        document.getElementById('perPageSelect').addEventListener('change', function() {
            perPage = parseInt(this.value);
            currentPage = 1;
            loadClients();
        });
    });

    function debounceSearch() {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(loadClients, 500);
    }

    async function loadClients() {
        const searchInput = document.getElementById('searchInput').value;
        const clientType = document.getElementById('clientTypeFilter').value;
        const city = document.getElementById('cityFilter').value;
        const balanceFilter = document.getElementById('balanceFilter').value;
        const status = document.getElementById('statusFilter').value;

        const params = new URLSearchParams({
            page: currentPage,
            per_page: perPage,
            with_client_type: 1
        });

        if (searchInput) params.append('search', searchInput);
        if (clientType) params.append('client_type_id', clientType);
        if (city) params.append('city', city);
        if (balanceFilter) params.append('balance_filter', balanceFilter);
        if (status !== '') params.append('is_active', status);

        try {
            const response = await fetch(`https://toure.gestiem.com/api/clients?${params}`, {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            const result = await response.json();

            if (response.ok) {
                displayClients(result.data);
                updatePagination(result.meta || result.pagination);
                updateStats(result);
            } else {
                showError('Erreur lors du chargement des clients');
            }
        } catch (error) {
            console.error('Error:', error);
            showError('Erreur de connexion au serveur');
        }
    }

    function displayClients(clients) {
        const tbody = document.getElementById('clientsTableBody');

        if (clients.length === 0) {
            tbody.innerHTML = `
            <tr>
                <td colspan="8" class="text-center py-5">
                    <i class="bi-inbox fs-1 text-muted"></i>
                    <p class="mt-3 text-muted">Aucun client trouvé</p>
                </td>
            </tr>
        `;
            document.getElementById('clientCount').textContent = '0';
            return;
        }

        tbody.innerHTML = clients.map(client => `
        <tr onclick="viewClient('${client.client_id}')">
            <td>
                <div class="d-flex align-items-center">
                    <div class="client-avatar me-3">
                        ${getInitials(client.name_client)}
                    </div>
                    <div>
                        <h6 class="mb-0">${client.name_client}</h6>
                        <small class="text-muted">${client.code}</small>
                    </div>
                </div>
            </td>
            <td>
                <span class="badge badge-type ${getTypeBadgeClass(client.client_type_id)}">
                    ${getClientType(client.client_type_id)}
                </span>
            </td>
            <td>
                <div>
                    ${client.email ? `<div class="small"><i class="bi-envelope me-1"></i>${client.email}</div>` : ''}
                    ${client.phonenumber ? `<div class="small"><i class="bi-telephone me-1"></i>${client.phonenumber}</div>` : ''}
                </div>
            </td>
            <td>${client.city || '-'}</td>
            <td>${formatCurrency(client.credit_limit)}</td>
            <td>
                <span class="${getBalanceClass(client.current_balance)}">
                    ${formatCurrency(client.current_balance)}
                </span>
            </td>
            <td>
                <span class="badge ${client.is_active ? 'bg-success' : 'bg-secondary'}">
                    ${client.is_active ? 'Actif' : 'Inactif'}
                </span>
            </td>
            <td class="text-end">
                <button class="btn btn-sm action-btn btn-outline-primary" onclick="editClient(event, '${client.client_id}')" title="Modifier">
                    <i class="bi-pencil"></i>
                </button>
                <button class="btn btn-sm action-btn btn-outline-info" onclick="viewClientDetails(event, '${client.client_id}')" title="Détails">
                    <i class="bi-eye"></i>
                </button>
            </td>
        </tr>
    `).join('');

        document.getElementById('clientCount').textContent = clients.length;
    }

    function updatePagination(meta) {
        if (!meta) return;

        const pagination = document.getElementById('pagination');
        const totalPages = meta.last_page || Math.ceil(meta.total / perPage);

        let paginationHTML = '';

        // Previous button
        paginationHTML += `
        <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
            <a class="page-link" href="#" onclick="changePage(${currentPage - 1}); return false;">
                <i class="bi-chevron-left"></i>
            </a>
        </li>
    `;

        // Page numbers
        for (let i = 1; i <= Math.min(totalPages, 5); i++) {
            paginationHTML += `
            <li class="page-item ${i === currentPage ? 'active' : ''}">
                <a class="page-link" href="#" onclick="changePage(${i}); return false;">${i}</a>
            </li>
        `;
        }

        // Next button
        paginationHTML += `
        <li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
            <a class="page-link" href="#" onclick="changePage(${currentPage + 1}); return false;">
                <i class="bi-chevron-right"></i>
            </a>
        </li>
    `;

        pagination.innerHTML = paginationHTML;
    }

    function updateStats(result) {
        document.getElementById('totalClients').textContent = result.meta?.total || result.data.length;

        // Calculs pour les stats
        const clients = result.data;
        const activeCount = clients.filter(c => c.is_active).length;
        const totalCredit = clients.reduce((sum, c) => sum + parseFloat(c.credit_limit || 0), 0);
        const totalBalance = clients.reduce((sum, c) => sum + parseFloat(c.current_balance || 0), 0);

        document.getElementById('activeClients').textContent = activeCount;
        document.getElementById('totalCredit').textContent = formatCurrency(totalCredit);
        document.getElementById('totalBalance').textContent = formatCurrency(totalBalance);
    }

    function changePage(page) {
        currentPage = page;
        loadClients();
    }

    function resetFilters() {
        document.getElementById('searchInput').value = '';
        document.getElementById('clientTypeFilter').value = '';
        document.getElementById('cityFilter').value = '';
        document.getElementById('balanceFilter').value = '';
        document.getElementById('statusFilter').value = '';
        currentPage = 1;
        loadClients();
    }

    function getInitials(name) {
        return name.split(' ').map(n => n[0]).join('').substring(0, 2).toUpperCase();
    }

    function getClientType(typeId) {
        const types = {
            '0199a5c7-c6b0-72f4-a050-56c10dc7a258': 'Long terme',
            '0199a5c9-21b3-734f-b30d-b71b01c4f7b7': 'Court terme',
            '0199a5ca-c426-7246-b3f1-e7f1a79a9477': 'Comptant',
            '0199a5cc-186a-73d6-b840-7872901a0e30': 'Litigieux'
        };
        return types[typeId] || 'Non défini';
    }

    function getTypeBadgeClass(typeId) {
        const classes = {
            '0199a5c7-c6b0-72f4-a050-56c10dc7a258': 'badge-long-terme',
            '0199a5c9-21b3-734f-b30d-b71b01c4f7b7': 'badge-court-terme',
            '0199a5ca-c426-7246-b3f1-e7f1a79a9477': 'badge-comptant',
            '0199a5cc-186a-73d6-b840-7872901a0e30': 'badge-litigieux'
        };
        return classes[typeId] || '';
    }

    function getBalanceClass(balance) {
        const bal = parseFloat(balance);
        if (bal > 0) return 'balance-positive';
        if (bal < 0) return 'balance-negative';
        return 'balance-zero';
    }

    function formatCurrency(amount) {
        return new Intl.NumberFormat('fr-FR', {
            style: 'currency',
            currency: 'XOF',
            minimumFractionDigits: 0
        }).format(amount).replace('XOF', 'FCFA');
    }

    function viewClient(clientId) {
        window.location.href = `/client/${clientId}`;
    }

    function editClient(event, clientId) {
        event.stopPropagation();
        window.location.href = `/client/${clientId}/modifier`;
    }

    function viewClientDetails(event, clientId) {
        event.stopPropagation();
        window.location.href = `/client/${clientId}/details`;
    }

    function exportClients() {
        window.location.href = 'https://toure.gestiem.com/api/clients/export';
    }

    function showError(message) {
        const tbody = document.getElementById('clientsTableBody');
        tbody.innerHTML = `
        <tr>
            <td colspan="8" class="text-center py-5">
                <i class="bi-exclamation-triangle fs-1 text-danger"></i>
                <p class="mt-3 text-danger">${message}</p>
                <button class="btn btn-sm btn-primary-custom" onclick="loadClients()">
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