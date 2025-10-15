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

    .badge-status {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.875rem;
    }

    .badge-pending { background-color: #fff3cd; color: #856404; }
    .badge-paid { background-color: #d1edff; color: #0c5460; }
    .badge-partially-paid { background-color: #d4edda; color: #155724; }
    .badge-cancelled { background-color: #f8d7da; color: #721c24; }
    .badge-overdue { background-color: #f5c6cb; color: #721c24; }

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
        transform: scale(1.01);
    }

    .pagination-modern .page-link {
        color: var(--primary-color);
        border: 2px solid #e9ecef;
        border-radius: 8px;
        margin: 0 0.25rem;
        padding: 0.75rem 1rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .pagination-modern .page-link:hover {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
        transform: translateY(-2px);
    }

    .pagination-modern .page-item.active .page-link {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }

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

    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: #6c757d;
    }

    .empty-state i {
        font-size: 4rem;
        margin-bottom: 1rem;
        color: #dee2e6;
    }

    @media (max-width: 768px) {
        .stats-card {
            margin-bottom: 1rem;
        }
        
        .table-modern {
            font-size: 0.875rem;
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
                            <li class="breadcrumb-item active">Factures</li>
                        </ol>
                    </nav>
                    <h2 class="mb-0 text-secondary-custom">Gestion des Factures</h2>
                </div>
                <div class="col-sm-auto">
                    <button class="btn btn-outline-modern me-2" onclick="window.location.href='/factures/statistiques'">
                        <i class="bi-graph-up me-1"></i> Statistiques
                    </button>
                    <button class="btn btn-primary-custom" onclick="window.location.href='/facture/creer'">
                        <i class="bi-plus-circle me-1"></i> Nouvelle Facture
                    </button>
                </div>
            </div>
        </div>

        <!-- Statistiques -->
        <div class="row mb-4" id="statsContainer">
            <div class="col-md-3 mb-3">
                <div class="stats-card">
                    <div class="stats-value" id="totalFactures">-</div>
                    <div class="stats-label">Total Factures</div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stats-card">
                    <div class="stats-value" id="facturesPayees">-</div>
                    <div class="stats-label">Payées</div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stats-card">
                    <div class="stats-value" id="facturesEnAttente">-</div>
                    <div class="stats-label">En Attente</div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stats-card">
                    <div class="stats-value" id="montantTotal">-</div>
                    <div class="stats-label">Montant Total</div>
                </div>
            </div>
        </div>

        <!-- Filtres -->
        <div class="filter-section">
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label fw-bold">Recherche</label>
                    <input type="text" id="searchInput" class="form-control form-control-modern" placeholder="Numéro ou référence...">
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-bold">Statut</label>
                    <select id="statutFilter" class="form-select form-control-modern">
                        <option value="">Tous les statuts</option>
                        <option value="pending">En attente</option>
                        <option value="paid">Payée</option>
                        <option value="partially_paid">Partiellement payée</option>
                        <option value="cancelled">Annulée</option>
                        <option value="overdue">En retard</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-bold">Date début</label>
                    <input type="date" id="dateFromFilter" class="form-control form-control-modern">
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-bold">Date fin</label>
                    <input type="date" id="dateToFilter" class="form-control form-control-modern">
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-bold">Par page</label>
                    <select id="perPageSelect" class="form-select form-control-modern">
                        <option value="10">10</option>
                        <option value="25" selected>25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <div class="col-md-1">
                    <label class="form-label">&nbsp;</label>
                    <button class="btn btn-primary-custom d-block w-100" onclick="applyFilters()">
                        <i class="bi-search"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Table des factures -->
        <div class="card-custom">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="bi-receipt me-2 text-primary-custom"></i>
                    Liste des Factures
                    <span class="badge bg-secondary ms-2" id="factureCount">0</span>
                </h5>
            </div>
            <div class="card-body p-0">
                <div id="loadingContainer" class="text-center py-5">
                    <div class="spinner-border text-primary-custom" role="status">
                        <span class="visually-hidden">Chargement...</span>
                    </div>
                    <p class="mt-3 text-muted">Chargement des factures...</p>
                </div>

                <div id="facturesContainer" style="display: none;">
                    <div class="table-responsive">
                        <table class="table table-modern mb-0">
                            <thead>
                                <tr>
                                    <th>Numéro</th>
                                    <th>Client</th>
                                    <th>Date</th>
                                    <th>Échéance</th>
                                    <th>Montant</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="facturesTableBody">
                                <!-- Les factures seront chargées ici -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-between align-items-center p-3">
                        <div class="text-muted">
                            Affichage de <span id="showingStart">0</span> à <span id="showingEnd">0</span> 
                            sur <span id="totalFacturesCount">0</span> factures
                        </div>
                        <nav>
                            <ul class="pagination pagination-modern mb-0" id="paginationContainer">
                                <!-- Pagination sera générée ici -->
                            </ul>
                        </nav>
                    </div>
                </div>

                <div id="emptyState" class="empty-state" style="display: none;">
                    <i class="bi-receipt"></i>
                    <h5>Aucune facture trouvée</h5>
                    <p>Il n'y a pas de factures correspondant à vos critères de recherche.</p>
                    <button class="btn btn-primary-custom" onclick="clearFilters()">
                        <i class="bi-arrow-clockwise me-1"></i> Réinitialiser les filtres
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    let allFactures = [];
    let filteredFactures = [];
    let currentPage = 1;
    let perPage = 25;
    let totalPages = 1;

    document.addEventListener('DOMContentLoaded', function() {
        loadStatistics();
        loadFactures();
        setupEventListeners();
    });

    function setupEventListeners() {
        document.getElementById('searchInput').addEventListener('input', debounceSearch);
        document.getElementById('statutFilter').addEventListener('change', applyFilters);
        document.getElementById('dateFromFilter').addEventListener('change', applyFilters);
        document.getElementById('dateToFilter').addEventListener('change', applyFilters);
        document.getElementById('perPageSelect').addEventListener('change', function() {
            perPage = parseInt(this.value);
            currentPage = 1;
            applyFilters();
        });
    }

    function debounceSearch() {
        clearTimeout(this.searchTimeout);
        this.searchTimeout = setTimeout(() => {
            applyFilters();
        }, 500);
    }

    async function loadStatistics() {
        try {
            const response = await fetch('https://toure.gestiem.com/api/factures/statistics/overview', {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            if (response.ok) {
                const result = await response.json();
                updateStatistics(result.data);
            }
        } catch (error) {
            console.error('Erreur lors du chargement des statistiques:', error);
        }
    }

    function updateStatistics(stats) {
        document.getElementById('totalFactures').textContent = stats.total_factures || 0;
        document.getElementById('facturesPayees').textContent = stats.factures_paid || 0;
        document.getElementById('facturesEnAttente').textContent = stats.factures_pending || 0;
        document.getElementById('montantTotal').textContent = formatCurrency(stats.total_amount || 0);
    }

    async function loadFactures() {
        try {
            const response = await fetch('https://toure.gestiem.com/api/factures?per_page=1000&with_client=1', {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            if (response.ok) {
                const result = await response.json();
                allFactures = result.data || [];
                filteredFactures = [...allFactures];
                applyFilters();
                
                document.getElementById('loadingContainer').style.display = 'none';
                document.getElementById('facturesContainer').style.display = 'block';
            } else {
                showError('Erreur lors du chargement des factures');
            }
        } catch (error) {
            console.error('Erreur:', error);
            showError('Erreur de connexion au serveur');
        }
    }

    function applyFilters() {
        currentPage = 1;
        filterFactures();
    }

    function filterFactures() {
        const search = document.getElementById('searchInput').value.toLowerCase();
        const statut = document.getElementById('statutFilter').value;
        const dateFrom = document.getElementById('dateFromFilter').value;
        const dateTo = document.getElementById('dateToFilter').value;

        filteredFactures = allFactures.filter(facture => {
            // Filtre par recherche
            if (search) {
                const searchMatch = 
                    facture.facture_number.toLowerCase().includes(search) ||
                    (facture.reference && facture.reference.toLowerCase().includes(search)) ||
                    (facture.client && facture.client.name_client.toLowerCase().includes(search));
                if (!searchMatch) return false;
            }

            // Filtre par statut
            if (statut && facture.statut !== statut) return false;

            // Filtre par date
            if (dateFrom || dateTo) {
                const factureDate = new Date(facture.facture_date);
                if (dateFrom && factureDate < new Date(dateFrom)) return false;
                if (dateTo && factureDate > new Date(dateTo)) return false;
            }

            return true;
        });

        totalPages = Math.ceil(filteredFactures.length / perPage);
        currentPage = Math.min(currentPage, totalPages);
        displayFactures();
        updatePagination();
    }

    function displayFactures() {
        const startIndex = (currentPage - 1) * perPage;
        const endIndex = startIndex + perPage;
        const facturesToShow = filteredFactures.slice(startIndex, endIndex);

        const tbody = document.getElementById('facturesTableBody');
        
        if (facturesToShow.length === 0) {
            document.getElementById('facturesContainer').style.display = 'none';
            document.getElementById('emptyState').style.display = 'block';
            return;
        }

        document.getElementById('facturesContainer').style.display = 'block';
        document.getElementById('emptyState').style.display = 'none';

        tbody.innerHTML = facturesToShow.map(facture => `
            <tr>
                <td>
                    <div class="fw-bold text-primary-custom">${facture.facture_number}</div>
                    ${facture.reference ? `<small class="text-muted">${facture.reference}</small>` : ''}
                </td>
                <td>
                    <div class="fw-bold">${facture.client ? facture.client.name_client : 'Client supprimé'}</div>
                    ${facture.client && facture.client.email ? `<small class="text-muted">${facture.client.email}</small>` : ''}
                </td>
                <td>${formatDate(facture.facture_date)}</td>
                <td>${formatDate(facture.due_date)}</td>
                <td>
                    <div class="fw-bold">${formatCurrency(facture.total_amount)}</div>
                    ${parseFloat(facture.paid_amount) > 0 ? `<small class="text-success">Payé: ${formatCurrency(facture.paid_amount)}</small>` : ''}
                </td>
                <td><span class="badge-status badge-${facture.statut}">${getStatutLabel(facture.statut)}</span></td>
                <td>
                    <div class="btn-group btn-group-sm">
                        <button class="btn btn-outline-primary" onclick="viewFacture('${facture.facture_id}')" title="Voir">
                            <i class="bi-eye"></i>
                        </button>
                        <button class="btn btn-outline-secondary" onclick="editFacture('${facture.facture_id}')" title="Modifier">
                            <i class="bi-pencil"></i>
                        </button>
                        <button class="btn btn-outline-danger" onclick="deleteFacture('${facture.facture_id}')" title="Supprimer">
                            <i class="bi-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>
        `).join('');

        // Mise à jour des compteurs
        document.getElementById('factureCount').textContent = filteredFactures.length;
        document.getElementById('showingStart').textContent = startIndex + 1;
        document.getElementById('showingEnd').textContent = Math.min(endIndex, filteredFactures.length);
        document.getElementById('totalFacturesCount').textContent = filteredFactures.length;
    }

    function updatePagination() {
        const container = document.getElementById('paginationContainer');
        let paginationHtml = '';

        // Bouton précédent
        paginationHtml += `
            <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
                <a class="page-link" href="#" onclick="changePage(${currentPage - 1})">
                    <i class="bi-chevron-left"></i>
                </a>
            </li>
        `;

        // Pages
        const startPage = Math.max(1, currentPage - 2);
        const endPage = Math.min(totalPages, currentPage + 2);

        for (let i = startPage; i <= endPage; i++) {
            paginationHtml += `
                <li class="page-item ${i === currentPage ? 'active' : ''}">
                    <a class="page-link" href="#" onclick="changePage(${i})">${i}</a>
                </li>
            `;
        }

        // Bouton suivant
        paginationHtml += `
            <li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
                <a class="page-link" href="#" onclick="changePage(${currentPage + 1})">
                    <i class="bi-chevron-right"></i>
                </a>
            </li>
        `;

        container.innerHTML = paginationHtml;
    }

    function changePage(page) {
        if (page >= 1 && page <= totalPages) {
            currentPage = page;
            displayFactures();
            updatePagination();
        }
    }

    function clearFilters() {
        document.getElementById('searchInput').value = '';
        document.getElementById('statutFilter').value = '';
        document.getElementById('dateFromFilter').value = '';
        document.getElementById('dateToFilter').value = '';
        applyFilters();
    }

    function getStatutLabel(statut) {
        const labels = {
            'pending': 'En attente',
            'paid': 'Payée',
            'partially_paid': 'Partiellement payée',
            'cancelled': 'Annulée',
            'overdue': 'En retard'
        };
        return labels[statut] || statut;
    }

    function formatCurrency(amount) {
        return new Intl.NumberFormat('fr-FR', {
            style: 'currency',
            currency: 'XOF',
            minimumFractionDigits: 0
        }).format(amount).replace('XOF', 'FCFA');
    }

    function formatDate(dateString) {
        if (!dateString) return '-';
        return new Date(dateString).toLocaleDateString('fr-FR');
    }

    function viewFacture(factureId) {
        window.location.href = `/facture/${factureId}/details`;
    }

    function editFacture(factureId) {
        window.location.href = `/facture/${factureId}/edit`;
    }

    async function deleteFacture(factureId) {
        if (!confirm('Êtes-vous sûr de vouloir supprimer cette facture ? Cette action est irréversible.')) {
            return;
        }

        try {
            const response = await fetch(`https://toure.gestiem.com/api/factures/${factureId}`, {
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            if (response.ok) {
                showNotification('success', 'Facture supprimée avec succès');
                loadFactures();
                loadStatistics();
            } else {
                const result = await response.json();
                showNotification('error', result.message || 'Erreur lors de la suppression');
            }
        } catch (error) {
            console.error('Erreur:', error);
            showNotification('error', 'Erreur de connexion au serveur');
        }
    }

    function showNotification(type, message) {
        const toast = document.createElement('div');
        toast.className = `alert alert-${type === 'success' ? 'success' : 'danger'} position-fixed top-0 end-0 m-3`;
        toast.style.zIndex = '9999';
        toast.style.minWidth = '350px';

        const icon = type === 'success' ? 'check-circle-fill' : 'exclamation-triangle-fill';
        toast.innerHTML = `
            <div class="d-flex align-items-start">
                <i class="bi-${icon} me-2 fs-5"></i>
                <div class="flex-grow-1">${message}</div>
                <button type="button" class="btn-close" onclick="this.parentElement.parentElement.remove()"></button>
            </div>
        `;

        document.body.appendChild(toast);

        setTimeout(() => {
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 300);
        }, 5000);
    }

    function showError(message) {
        document.getElementById('loadingContainer').innerHTML = `
            <i class="bi-exclamation-triangle fs-1 text-danger"></i>
            <p class="mt-3 text-danger">${message}</p>
            <button class="btn btn-primary-custom" onclick="location.reload()">
                <i class="bi-arrow-clockwise me-1"></i> Réessayer
            </button>
        `;
    }
</script>

<?php
$content = ob_get_clean();
require('./views/layouts/app-layout.php');
?>
