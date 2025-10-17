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

    .warehouse-avatar {
        width: 45px;
        height: 45px;
        border-radius: 10px;
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
                            <li class="breadcrumb-item active">Entrepôts</li>
                        </ol>
                    </nav>
                    <h1 class="page-header-title text-secondary-custom">
                        <i class="bi-building me-2"></i>Liste des Entrepôts
                    </h1>
                    <p class="text-muted mb-0">Gérez votre réseau de stockage</p>
                </div>

                <div class="col-sm-auto">
                    <a class="btn btn-primary-custom" href="/creer-un-entrepot">
                        <i class="bi-plus-lg me-1"></i> Nouvel Entrepôt
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
                            <span class="d-block text-muted small mb-1">Total Entrepôts</span>
                            <h3 class="mb-0 text-secondary-custom" id="totalWarehouses">-</h3>
                        </div>
                        <div class="warehouse-avatar" style="width: 50px; height: 50px;">
                            <i class="bi-building fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="stats-card" style="border-left-color: #28a745;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="d-block text-muted small mb-1">Actifs</span>
                            <h3 class="mb-0 text-success" id="activeWarehouses">-</h3>
                        </div>
                        <div class="warehouse-avatar" style="width: 50px; height: 50px; background: linear-gradient(135deg, #28a745 0%, #20c997 100%);">
                            <i class="bi-check-circle fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="stats-card" style="border-left-color: #ffc107;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="d-block text-muted small mb-1">Avec Responsable</span>
                            <h3 class="mb-0 text-warning" id="warehousesWithManager">-</h3>
                        </div>
                        <div class="warehouse-avatar" style="width: 50px; height: 50px; background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);">
                            <i class="bi-person-check fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="stats-card" style="border-left-color: #6c757d;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="d-block text-muted small mb-1">Inactifs</span>
                            <h3 class="mb-0 text-secondary" id="inactiveWarehouses">-</h3>
                        </div>
                        <div class="warehouse-avatar" style="width: 50px; height: 50px; background: linear-gradient(135deg, #6c757d 0%, #495057 100%);">
                            <i class="bi-x-circle fs-4"></i>
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
                            <input type="text" class="form-control" id="searchInput" placeholder="Nom, code, adresse...">
                        </div>
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
                        <label class="form-label small fw-semibold">Responsable</label>
                        <select class="form-select" id="managerFilter">
                            <option value="">Tous</option>
                            <option value="has">Avec responsable</option>
                            <option value="no">Sans responsable</option>
                        </select>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label class="form-label small fw-semibold">Trier par</label>
                        <select class="form-select" id="sortByFilter">
                            <option value="name">Nom</option>
                            <option value="code">Code</option>
                            <option value="created_at">Date création</option>
                        </select>
                    </div>

                    <div class="col-md-1 mb-3">
                        <label class="form-label small fw-semibold">Ordre</label>
                        <select class="form-select" id="sortOrderFilter">
                            <option value="asc">↑ Asc</option>
                            <option value="desc">↓ Desc</option>
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
                            <span id="warehouseCount">0</span> entrepôt(s) trouvé(s)
                        </h5>
                    </div>
                    <div class="col-auto">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="exportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi-download me-1"></i> Exporter
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                                <li>
                                    <a class="dropdown-item" href="#" onclick="exportWarehouses('excel')">
                                        <i class="bi-file-earmark-excel text-success me-2"></i> Excel (.xlsx)
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#" onclick="exportWarehouses('pdf')">
                                        <i class="bi-file-earmark-pdf text-danger me-2"></i> PDF
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-nowrap align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Entrepôt</th>
                            <th>Code</th>
                            <th>Adresse</th>
                            <th>Responsable</th>
                            <th>Statut</th>
                            <th>Date Création</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="warehousesTableBody">
                        <tr class="skeleton-row">
                            <td colspan="7" class="text-center py-5">
                                <div class="spinner-border text-primary-custom" role="status">
                                    <span class="visually-hidden">Chargement...</span>
                                </div>
                                <p class="mt-3 text-muted">Chargement des entrepôts...</p>
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
    let currentPage = 1;
    let perPage = 15;
    let debounceTimer;

    document.addEventListener('DOMContentLoaded', function() {
        loadWarehouses();

        document.getElementById('searchInput').addEventListener('input', debounceSearch);
        document.getElementById('statusFilter').addEventListener('change', loadWarehouses);
        document.getElementById('managerFilter').addEventListener('change', loadWarehouses);
        document.getElementById('sortByFilter').addEventListener('change', loadWarehouses);
        document.getElementById('sortOrderFilter').addEventListener('change', loadWarehouses);
        document.getElementById('perPageSelect').addEventListener('change', function() {
            perPage = parseInt(this.value);
            currentPage = 1;
            loadWarehouses();
        });
    });

    function debounceSearch() {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(loadWarehouses, 500);
    }

    async function loadWarehouses() {
        const searchInput = document.getElementById('searchInput').value;
        const status = document.getElementById('statusFilter').value;
        const manager = document.getElementById('managerFilter').value;
        const sortBy = document.getElementById('sortByFilter').value;
        const sortOrder = document.getElementById('sortOrderFilter').value;

        const params = new URLSearchParams({
            page: currentPage,
            per_page: perPage,
            with_user: 1,
            sort_by: sortBy,
            sort_order: sortOrder
        });

        if (searchInput) params.append('search', searchInput);
        if (status !== '') params.append('is_active', status);
        if (manager === 'has') params.append('has_user', 1);
        if (manager === 'no') params.append('has_user', 0);

        try {
            const response = await fetch(`https://toure.gestiem.com/api/entrepots?${params}`, {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            const result = await response.json();

            if (response.ok) {
                displayWarehouses(result.data);
                updatePagination(result.meta);
                updateStats(result);
            } else {
                showError('Erreur lors du chargement des entrepôts');
            }
        } catch (error) {
            console.error('Error:', error);
            showError('Erreur de connexion au serveur');
        }
    }

    function displayWarehouses(warehouses) {
        const tbody = document.getElementById('warehousesTableBody');

        if (warehouses.length === 0) {
            tbody.innerHTML = `
            <tr>
                <td colspan="7" class="text-center py-5">
                    <i class="bi-inbox fs-1 text-muted"></i>
                    <p class="mt-3 text-muted">Aucun entrepôt trouvé</p>
                </td>
            </tr>
        `;
            document.getElementById('warehouseCount').textContent = '0';
            return;
        }

        tbody.innerHTML = warehouses.map(warehouse => `
        <tr onclick="viewWarehouse('${warehouse.entrepot_id}')">
            <td>
                <div class="d-flex align-items-center">
                    <div class="warehouse-avatar me-3">
                        <i class="bi-building"></i>
                    </div>
                    <div>
                        <h6 class="mb-0">${warehouse.name}</h6>
                    </div>
                </div>
            </td>
            <td>
                <span class="badge bg-light text-dark">${warehouse.code}</span>
            </td>
            <td>
                <small class="text-muted">${warehouse.adresse || 'Non renseignée'}</small>
            </td>
            <td>
                ${warehouse.user ? `
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xs avatar-circle me-2">
                            <span class="avatar-initials">${getInitials(warehouse.user.name)}</span>
                        </div>
                        <small>${warehouse.user.name}</small>
                    </div>
                ` : '<small class="text-muted">Non assigné</small>'}
            </td>
            <td>
                <span class="badge ${warehouse.is_active ? 'bg-success' : 'bg-secondary'}">
                    ${warehouse.is_active ? 'Actif' : 'Inactif'}
                </span>
            </td>
            <td>
                <small class="text-muted">${formatDate(warehouse.created_at)}</small>
            </td>
            <td class="text-end">
                <button class="btn btn-sm action-btn btn-outline-primary" onclick="editWarehouse(event, '${warehouse.entrepot_id}')" title="Modifier">
                    <i class="bi-pencil"></i>
                </button>
                <button class="btn btn-sm action-btn btn-outline-info" onclick="viewWarehouseDetails(event, '${warehouse.entrepot_id}')" title="Détails">
                    <i class="bi-eye"></i>
                </button>
            </td>
        </tr>
    `).join('');

        document.getElementById('warehouseCount').textContent = warehouses.length;
    }

    function updatePagination(meta) {
        if (!meta) return;

        const pagination = document.getElementById('pagination');
        const totalPages = meta.last_page;

        let paginationHTML = '';

        paginationHTML += `
        <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
            <a class="page-link" href="#" onclick="changePage(${currentPage - 1}); return false;">
                <i class="bi-chevron-left"></i>
            </a>
        </li>
    `;

        for (let i = 1; i <= Math.min(totalPages, 5); i++) {
            paginationHTML += `
            <li class="page-item ${i === currentPage ? 'active' : ''}">
                <a class="page-link" href="#" onclick="changePage(${i}); return false;">${i}</a>
            </li>
        `;
        }

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
        const warehouses = result.data;
        const total = result.meta?.total || warehouses.length;
        const active = warehouses.filter(w => w.is_active).length;
        const withManager = warehouses.filter(w => w.user_id).length;
        const inactive = total - active;

        document.getElementById('totalWarehouses').textContent = total;
        document.getElementById('activeWarehouses').textContent = active;
        document.getElementById('warehousesWithManager').textContent = withManager;
        document.getElementById('inactiveWarehouses').textContent = inactive;
    }

    function changePage(page) {
        currentPage = page;
        loadWarehouses();
    }

    function resetFilters() {
        document.getElementById('searchInput').value = '';
        document.getElementById('statusFilter').value = '';
        document.getElementById('managerFilter').value = '';
        document.getElementById('sortByFilter').value = 'name';
        document.getElementById('sortOrderFilter').value = 'asc';
        currentPage = 1;
        loadWarehouses();
    }

    function getInitials(name) {
        return name.split(' ').map(n => n[0]).join('').substring(0, 2).toUpperCase();
    }

    function formatDate(dateString) {
        return new Date(dateString).toLocaleDateString('fr-FR');
    }

    function viewWarehouse(warehouseId) {
        window.location.href = `/entrepot/${warehouseId}/details`;
    }

    function editWarehouse(event, warehouseId) {
        event.stopPropagation();
        window.location.href = `/entrepot/${warehouseId}/modifier`;
    }

    function viewWarehouseDetails(event, warehouseId) {
        event.stopPropagation();
        window.location.href = `/entrepot/${warehouseId}/details`;
    }


    function showError(message) {
        const tbody = document.getElementById('warehousesTableBody');
        tbody.innerHTML = `
        <tr>
            <td colspan="7" class="text-center py-5">
                <i class="bi-exclamation-triangle fs-1 text-danger"></i>
                <p class="mt-3 text-danger">${message}</p>
                <button class="btn btn-sm btn-primary-custom" onclick="loadWarehouses()">
                    Réessayer
                </button>
            </td>
        </tr>
    `;
    }

    // Export functions
    async function exportWarehouses(format = 'excel') {
        const exportButton = document.getElementById('exportDropdown');
        const originalText = exportButton.innerHTML;
        
        try {
            console.log('Début de l\'export:', format);
            exportButton.innerHTML = '<i class="bi-hourglass-split me-1"></i> Export...';
            exportButton.disabled = true;
            
            // Check if libraries are loaded
            if (format === 'excel' && typeof XLSX === 'undefined') {
                throw new Error('SheetJS n\'est pas chargé. Veuillez recharger la page.');
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
            showToast('Export réussi !', 'success');
            
        } catch (error) {
            console.error('Erreur d\'export:', error);
            showToast('Erreur d\'export: ' + error.message, 'danger');
        } finally {
            exportButton.innerHTML = originalText;
            exportButton.disabled = false;
        }
    }

    async function fetchWarehousesFromAPI(page = 1, perPage = 100, filters = {}) {
        try {
            const accessToken = localStorage.getItem('access_token');
            const queryParams = new URLSearchParams({
                page: page.toString(),
                per_page: perPage.toString(),
                ...filters
            });

            const response = await fetch(`https://toure.gestiem.com/api/entrepots?${queryParams}`, {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            if (!response.ok) {
                throw new Error(`Erreur HTTP: ${response.status}`);
            }

            const result = await response.json();
            return result;
        } catch (error) {
            console.error('Erreur lors de la récupération des entrepôts:', error);
            throw error;
        }
    }

    async function exportToExcel(data) {
        try {
            // Get complete warehouse data from API
            const completeWarehouseData = await fetchWarehousesFromAPI(1, 1000);
            const warehouses = completeWarehouseData.data || [];
            
            console.log('Données des entrepôts récupérées:', warehouses);
            
            // Prepare Excel data
            const excelData = warehouses.map(warehouse => ({
                'Code': warehouse.code || '',
                'Nom': warehouse.name || '',
                'Adresse': warehouse.adresse || '',
                'Ville': warehouse.city || '',
                'Code Postal': warehouse.postal_code || '',
                'Téléphone': warehouse.phone || '',
                'Email': warehouse.email || '',
                'Statut': warehouse.is_active ? 'Actif' : 'Inactif',
                'Date de Création': warehouse.created_at ? new Date(warehouse.created_at).toLocaleDateString('fr-FR') : ''
            }));
            
            // Create workbook
            const wb = XLSX.utils.book_new();
            const ws = XLSX.utils.json_to_sheet(excelData);
            
            // Set column widths
            ws['!cols'] = [
                { width: 15 }, // Code
                { width: 25 }, // Nom
                { width: 35 }, // Adresse
                { width: 20 }, // Ville
                { width: 12 }, // Code Postal
                { width: 15 }, // Téléphone
                { width: 25 }, // Email
                { width: 10 }, // Statut
                { width: 15 }  // Date de Création
            ];
            
            // Add worksheet to workbook
            XLSX.utils.book_append_sheet(wb, ws, 'Entrepôts');
            
            // Generate and download file
            const fileName = `entrepots_${new Date().toISOString().split('T')[0]}.xlsx`;
            XLSX.writeFile(wb, fileName);
            
            console.log('Export Excel terminé');
            
        } catch (error) {
            console.error('Erreur lors de l\'export Excel:', error);
            throw error;
        }
    }

    async function exportToPDF(data) {
        try {
            // Check if PDFMake is loaded
            if (typeof pdfMake === 'undefined') {
                throw new Error('PDFMake n\'est pas chargé. Veuillez recharger la page.');
            }
            
            // Get complete warehouse data from API
            const completeWarehouseData = await fetchWarehousesFromAPI(1, 1000);
            const warehouses = completeWarehouseData.data || [];
            
            console.log('Données des entrepôts pour PDF:', warehouses);
            
            // Generate PDF
            await generatePDFWithPDFMake(warehouses);
            
            console.log('Export PDF terminé');
            
        } catch (error) {
            console.error('Erreur lors de l\'export PDF:', error);
            throw error;
        }
    }

    async function generatePDFWithPDFMake(warehouses) {
        const docDefinition = {
            pageSize: 'A4',
            pageOrientation: 'landscape',
            pageMargins: [20, 40, 20, 40],
            content: [
                // Title
                {
                    text: 'LISTE DES ENTREPÔTS',
                    style: 'header',
                    alignment: 'center',
                    margin: [0, 0, 0, 20]
                },
                
                // Export info
                {
                    text: `Exporté le ${new Date().toLocaleDateString('fr-FR')} à ${new Date().toLocaleTimeString('fr-FR')}`,
                    style: 'subheader',
                    alignment: 'center',
                    margin: [0, 0, 0, 20]
                },
                
                // Statistics summary
                {
                    text: `Total: ${warehouses.length} entrepôt(s)`,
                    style: 'stats',
                    margin: [0, 0, 0, 20]
                },
                
                // Table
                {
                    table: {
                        headerRows: 1,
                        widths: [60, 180, 120, 100, 80, 120, 130],
                        body: [
                            // Header row
                            [
                                { text: 'Code', style: 'tableHeader' },
                                { text: 'Nom', style: 'tableHeader' },
                                { text: 'Ville', style: 'tableHeader' },
                                { text: 'Téléphone', style: 'tableHeader' },
                                { text: 'Statut', style: 'tableHeader' },
                                { text: 'Email', style: 'tableHeader' },
                                { text: 'Date Création', style: 'tableHeader' }
                            ],
                            // Data rows
                            ...warehouses.map(warehouse => [
                                { text: warehouse.code || 'N/A', style: 'tableCell' },
                                { text: warehouse.name || 'N/A', style: 'tableCell' },
                                { text: warehouse.city || 'N/A', style: 'tableCell' },
                                { text: warehouse.phone || 'N/A', style: 'tableCell' },
                                { text: warehouse.is_active ? 'Actif' : 'Inactif', style: 'tableCell' },
                                { text: warehouse.email || 'N/A', style: 'tableCell' },
                                { text: warehouse.created_at ? new Date(warehouse.created_at).toLocaleDateString('fr-FR') : 'N/A', style: 'tableCell' }
                            ])
                        ]
                    },
                    layout: {
                        hLineWidth: function (i, node) {
                            return (i === 0 || i === node.table.body.length) ? 2 : 1;
                        },
                        vLineWidth: function (i, node) {
                            return (i === 0 || i === node.table.widths.length) ? 2 : 1;
                        },
                        hLineColor: function (i, node) {
                            return (i === 0 || i === node.table.body.length) ? '#010768' : '#cccccc';
                        },
                        vLineColor: function (i, node) {
                            return (i === 0 || i === node.table.widths.length) ? '#010768' : '#cccccc';
                        }
                    }
                }
            ],
            styles: {
                header: {
                    fontSize: 18,
                    bold: true,
                    color: '#010768'
                },
                subheader: {
                    fontSize: 10,
                    color: '#666666'
                },
                stats: {
                    fontSize: 12,
                    bold: true,
                    color: '#010768'
                },
                tableHeader: {
                    fontSize: 10,
                    bold: true,
                    color: '#ffffff',
                    fillColor: '#010768',
                    alignment: 'center'
                },
                tableCell: {
                    fontSize: 9,
                    color: '#333333',
                    alignment: 'left'
                }
            }
        };

        // Generate and download PDF
        const fileName = `entrepots_${new Date().toISOString().split('T')[0]}.pdf`;
        pdfMake.createPdf(docDefinition).download(fileName);
    }

    function showToast(message, type = 'info') {
        // Create toast element
        const toast = document.createElement('div');
        toast.className = `toast align-items-center text-white bg-${type === 'success' ? 'success' : type === 'danger' ? 'danger' : 'primary'} border-0`;
        toast.setAttribute('role', 'alert');
        toast.innerHTML = `
            <div class="d-flex">
                <div class="toast-body">
                    ${message}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        `;
        
        // Add to container
        let toastContainer = document.getElementById('toastContainer');
        if (!toastContainer) {
            toastContainer = document.createElement('div');
            toastContainer.id = 'toastContainer';
            toastContainer.className = 'toast-container position-fixed top-0 end-0 p-3';
            toastContainer.style.zIndex = '9999';
            document.body.appendChild(toastContainer);
        }
        
        toastContainer.appendChild(toast);
        
        // Initialize and show toast
        const bsToast = new bootstrap.Toast(toast);
        bsToast.show();
        
        // Remove from DOM after hiding
        toast.addEventListener('hidden.bs.toast', () => {
            toast.remove();
        });
    }
</script>

<!-- SheetJS Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

<!-- PDFMake Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<?php
$content = ob_get_clean();
require('./views/layouts/app-layout.php');
?>