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
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border: 1px solid #dee2e6;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .stats-item {
        display: flex;
    }

    .stats-card {
        height: 100%;
        min-height: 50px;
        padding: 0.5rem;
        flex: 1;
    }

    .table-modern {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
    }

    .table-modern thead {
        background-color: #f8f9fa;
    }

    .table-modern th {
        border: none;
        font-weight: 600;
        color: #000;
        padding: 1rem;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .table-modern tbody tr {
        transition: all 0.2s ease;
    }

    .table-modern tbody tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    .table-modern tbody tr:hover {
        background-color: var(--light-primary);
        transform: scale(1.01);
    }

    .badge-status {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .badge-en-attente {
        background-color: #fff3cd;
        color: #856404;
        border: 1px solid #ffeaa7;
    }

    .badge-validee {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .badge-en-cours {
        background-color: #d1ecf1;
        color: #0c5460;
        border: 1px solid #bee5eb;
    }

    .badge-livree {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .badge-partiellement-livree {
        background-color: #fff3cd;
        color: #856404;
        border: 1px solid #ffeaa7;
    }

    .badge-annulee {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    /* Modal de confirmation personnalisé */
    .modal.show {
        z-index: 1055;
    }
    
    .modal-content {
        border: none;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }
    
    .modal-header {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 12px 12px 0 0;
    }
    
    .modal-title {
        font-weight: 600;
    }
    
    .modal-body {
        padding: 1.5rem;
    }
    
    .modal-footer {
        padding: 1rem 1.5rem;
        background-color: #f8f9fa;
        border-radius: 0 0 12px 12px;
    }
    
    .btn-close {
        background: none;
        border: none;
        font-size: 1.2rem;
        opacity: 0.7;
    }
    
    .btn-close:hover {
        opacity: 1;
    }

    .action-btn {
        padding: 0.375rem 0.75rem;
        border-radius: 6px;
        font-size: 0.875rem;
        transition: all 0.2s ease;
    }

    .action-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    }

    .loading-spinner {
        display: none;
    }

    .error-message {
        display: none;
    }

    /* Responsive for stats cards */
    @media (max-width: 576px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (min-width: 577px) and (max-width: 768px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (min-width: 769px) {
        .stats-grid {
            grid-template-columns: repeat(4, 1fr);
        }
    }
</style>

<main class="main">
    <div class="content px-4 py-4">
        <div class="page-header mb-4">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="page-title text-primary-custom font-public-sans">
                        <i class="bi-cart-check me-2"></i>
                        Gestion des Commandes
                    </h1>
                    <p class="page-description text-muted">Gérez les commandes d'achat auprès des fournisseurs</p>
                </div>
                <div class="col-sm-auto">
                    <div class="d-flex gap-2">
                        <button class="btn btn-primary-custom" onclick="window.location.href='/commande/creer'">
                            <i class="bi-plus-circle me-1"></i> Nouvelle Commande
                        </button>
                        <button class="btn btn-outline-secondary" onclick="window.location.href='/commandes/supprimees'">
                            <i class="bi-trash me-1"></i> Commandes Supprimées
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Loading State -->
        <div class="loading-spinner text-center py-5" id="loadingState">
            <div class="spinner-border text-primary-custom" role="status">
                <span class="visually-hidden">Chargement...</span>
            </div>
            <p class="mt-3 text-muted">Chargement des commandes...</p>
        </div>

        <!-- Error State -->
        <div class="error-message alert alert-danger" id="errorState">
            <i class="bi-exclamation-triangle me-2"></i>
            <span id="errorMessage">Une erreur est survenue lors du chargement des commandes.</span>
        </div>

        <!-- Stats Cards -->
        <div class="stats-grid mb-4" id="statsContainer">
            <div class="stats-item">
                <div class="card stats-card card-custom">
                    <div class="card-body text-center">
                        <div class="d-flex align-items-center justify-content-center mb-2">
                            <i class="bi-cart-check text-primary-custom fs-2"></i>
                        </div>
                        <h3 class="mb-1 text-primary-custom" id="totalCommandes">-</h3>
                        <p class="text-muted mb-0">Total Commandes</p>
                    </div>
                </div>
            </div>
            <div class="stats-item">
                <div class="card stats-card card-custom">
                    <div class="card-body text-center">
                        <div class="d-flex align-items-center justify-content-center mb-2">
                            <i class="bi-clock text-warning fs-2"></i>
                        </div>
                        <h3 class="mb-1 text-warning" id="commandesEnAttente">-</h3>
                        <p class="text-muted mb-0">En Attente</p>
                    </div>
                </div>
            </div>
            <div class="stats-item">
                <div class="card stats-card card-custom">
                    <div class="card-body text-center">
                        <div class="d-flex align-items-center justify-content-center mb-2">
                            <i class="bi-truck text-success fs-2"></i>
                        </div>
                        <h3 class="mb-1 text-success" id="commandesLivrees">-</h3>
                        <p class="text-muted mb-0">Livrées</p>
                    </div>
                </div>
            </div>
            <div class="stats-item">
                <div class="card stats-card card-custom">
                    <div class="card-body text-center">
                        <div class="d-flex align-items-center justify-content-center mb-2">
                            <i class="bi-currency-dollar text-info fs-2"></i>
                        </div>
                        <h3 class="mb-1 text-info" id="montantTotal">-</h3>
                        <p class="text-muted mb-0">Montant Total</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="card filter-card mb-4">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Recherche</label>
                        <input type="text" class="form-control" id="searchInput" placeholder="Numéro de commande...">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label fw-semibold">Statut</label>
                        <select class="form-select" id="statusFilter">
                            <option value="">Tous les statuts</option>
                            <option value="en_attente">En Attente</option>
                            <option value="validee">Validée</option>
                            <option value="en_cours">En Cours</option>
                            <option value="livree">Livrée</option>
                            <option value="partiellement_livree">Partiellement Livrée</option>
                            <option value="annulee">Annulée</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label fw-semibold">Date Début</label>
                        <input type="date" class="form-control" id="dateDebutFilter">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label fw-semibold">Date Fin</label>
                        <input type="date" class="form-control" id="dateFinFilter">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label fw-semibold">Montant Min</label>
                        <input type="number" class="form-control" id="montantMinFilter" placeholder="0">
                    </div>
                    <div class="col-md-1">
                        <label class="form-label fw-semibold">&nbsp;</label>
                        <div class="d-grid">
                            <button class="btn btn-primary-custom" onclick="applyFilters()">
                                <i class="bi-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <button class="btn btn-outline-secondary me-2" onclick="clearFilters()">
                            <i class="bi-arrow-clockwise me-1"></i> Réinitialiser
                        </button>
                        <button class="btn btn-outline-success me-2" onclick="exportToExcel()">
                            <i class="bi-file-earmark-excel me-1"></i> Export Excel
                        </button>
                        <button class="btn btn-outline-danger" onclick="exportToPDF()">
                            <i class="bi-file-earmark-pdf me-1"></i> Export PDF
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="card card-custom mb-4">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-modern mb-0" id="commandesTable">
                        <thead>
                            <tr>
                                <th>Numéro</th>
                                <th>Fournisseur</th>
                                <th>Date Achat</th>
                                <th>Date Livraison</th>
                                <th>Montant</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="commandesTableBody">
                            <!-- Les données seront chargées ici -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <nav aria-label="Pagination des commandes" class="mt-4">
            <ul class="pagination justify-content-center" id="paginationContainer">
                <!-- La pagination sera générée ici -->
            </ul>
        </nav>
    </div>
</main>

<script>
    // Variables globales
    let currentCommandes = [];
    let currentPage = 1;
    let totalPages = 1;
    let perPage = 15;

    // Fonction pour récupérer un cookie
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
    }

    // Fonction pour afficher le loading
    function showLoading() {
        const loadingSpinner = document.getElementById('loadingState');
        const commandesTable = document.getElementById('commandesTable');
        const errorState = document.getElementById('errorState');
        
        if (loadingSpinner) loadingSpinner.style.display = 'block';
        if (commandesTable) commandesTable.style.display = 'none';
        if (errorState) errorState.style.display = 'none';
    }

    // Fonction pour masquer le loading
    function hideLoading() {
        const loadingSpinner = document.getElementById('loadingState');
        const commandesTable = document.getElementById('commandesTable');
        
        if (loadingSpinner) loadingSpinner.style.display = 'none';
        if (commandesTable) commandesTable.style.display = 'table';
    }

    // Fonction pour afficher une erreur
    function showError(message) {
        const errorState = document.getElementById('errorState');
        const errorMessage = document.getElementById('errorMessage');
        const loadingSpinner = document.getElementById('loadingState');
        const commandesTable = document.getElementById('commandesTable');
        
        if (errorState) errorState.style.display = 'block';
        if (errorMessage) errorMessage.textContent = message;
        if (loadingSpinner) loadingSpinner.style.display = 'none';
        if (commandesTable) commandesTable.style.display = 'none';
    }

    // Fonction pour charger les commandes
    async function loadCommandes(page = 1) {
        showLoading();
        
        try {
            const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
            
            if (!accessToken) {
                showError('Token d\'authentification manquant');
                return;
            }

            const params = new URLSearchParams({
                page: page,
                per_page: perPage,
                search: document.getElementById('searchInput').value,
                status: document.getElementById('statusFilter').value,
                date_achat_debut: document.getElementById('dateDebutFilter').value,
                date_achat_fin: document.getElementById('dateFinFilter').value,
                montant_min: document.getElementById('montantMinFilter').value
            });

            const response = await fetch(`/api/commandes?${params}`, {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });

            if (!response.ok) {
                throw new Error(`Erreur HTTP: ${response.status}`);
            }

            const data = await response.json();
            
            if (data.success) {
                currentCommandes = data.data.data || [];
                currentPage = data.data.current_page || 1;
                totalPages = data.data.last_page || 1;
                
                displayCommandes();
                updatePagination();
                updateStats(data.data);
                hideLoading();
            } else {
                throw new Error(data.message || 'Erreur lors du chargement des commandes');
            }

        } catch (error) {
            console.error('Erreur lors du chargement des commandes:', error);
            showError('Erreur lors du chargement des commandes: ' + error.message);
        }
    }

    // Fonction pour afficher les commandes
    function displayCommandes() {
        const tbody = document.getElementById('commandesTableBody');
        if (!tbody) return;

        if (currentCommandes.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="7" class="text-center py-4">
                        <i class="bi-inbox text-muted fs-1"></i>
                        <p class="text-muted mt-2">Aucune commande trouvée</p>
                    </td>
                </tr>
            `;
            return;
        }

        tbody.innerHTML = currentCommandes.map(commande => `
            <tr>
                <td>
                    <div class="fw-semibold text-primary-custom">${commande.numero_commande || 'N/A'}</div>
                </td>
                <td>
                    <div class="d-flex align-items-center">
                        <div class="me-2">
                            <div class="bg-light-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <i class="bi-truck text-primary-custom"></i>
                            </div>
                        </div>
                        <div>
                            <div class="fw-semibold">${commande.fournisseur?.name || 'N/A'}</div>
                            <small class="text-muted">${commande.fournisseur?.code || ''}</small>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="text-nowrap">${formatDate(commande.date_achat)}</div>
                </td>
                <td>
                    <div class="text-nowrap">
                        ${commande.date_livraison_effective ? formatDate(commande.date_livraison_effective) : formatDate(commande.date_livraison_prevue)}
                        ${commande.date_livraison_effective ? '<small class="text-success">✓</small>' : '<small class="text-warning">⏳</small>'}
                    </div>
                </td>
                <td>
                    <div class="fw-semibold text-success">${formatPrice(commande.montant)}</div>
                </td>
                <td>
                    <span class="badge-status badge-${getStatusClass(commande.status)}">
                        ${getStatusText(commande.status)}
                    </span>
                </td>
                <td>
                    <div class="d-flex gap-1 justify-content-end">
                        <button class="btn btn-outline-primary btn-sm action-btn" onclick="viewCommande('${commande.commande_id}')" title="Voir détails">
                            <i class="bi-eye"></i>
                        </button>
                        <button class="btn btn-outline-secondary btn-sm action-btn" onclick="editCommande('${commande.commande_id}')" title="Modifier">
                            <i class="bi-pencil"></i>
                        </button>
                        <button class="btn btn-outline-danger btn-sm action-btn" onclick="deleteCommande('${commande.commande_id}')" title="Supprimer">
                            <i class="bi-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>
        `).join('');
    }

    // Fonction pour obtenir la classe CSS du statut
    function getStatusClass(status) {
        const statusMap = {
            'en_attente': 'en-attente',
            'validee': 'validee',
            'en_cours': 'en-cours',
            'livree': 'livree',
            'partiellement_livree': 'partiellement-livree',
            'annulee': 'annulee'
        };
        return statusMap[status] || 'en-attente';
    }

    // Fonction pour obtenir le texte du statut
    function getStatusText(status) {
        const statusMap = {
            'en_attente': 'En Attente',
            'validee': 'Validée',
            'en_cours': 'En Cours',
            'livree': 'Livrée',
            'partiellement_livree': 'Partiellement Livrée',
            'annulee': 'Annulée'
        };
        return statusMap[status] || status;
    }

    // Fonction pour formater la date
    function formatDate(dateString) {
        if (!dateString) return 'N/A';
        const date = new Date(dateString);
        return date.toLocaleDateString('fr-FR');
    }

    // Fonction pour formater le prix
    function formatPrice(price) {
        if (!price) return '0 F CFA';
        return new Intl.NumberFormat('fr-FR').format(parseFloat(price)) + ' F CFA';
    }

    // Fonction pour mettre à jour les statistiques
    function updateStats(data) {
        document.getElementById('totalCommandes').textContent = data.total || 0;
        
        // Compter les commandes par statut
        const enAttente = currentCommandes.filter(c => c.status === 'en_attente').length;
        const livrees = currentCommandes.filter(c => c.status === 'livree').length;
        
        document.getElementById('commandesEnAttente').textContent = enAttente;
        document.getElementById('commandesLivrees').textContent = livrees;
        
        // Calculer le montant total
        const montantTotal = currentCommandes.reduce((sum, c) => sum + parseFloat(c.montant || 0), 0);
        document.getElementById('montantTotal').textContent = formatPrice(montantTotal);
    }

    // Fonction pour mettre à jour la pagination
    function updatePagination() {
        const container = document.getElementById('paginationContainer');
        if (!container) return;

        let paginationHTML = '';

        // Bouton précédent
        if (currentPage > 1) {
            paginationHTML += `
                <li class="page-item">
                    <a class="page-link" href="#" onclick="loadCommandes(${currentPage - 1})">
                        <i class="bi-chevron-left"></i>
                    </a>
                </li>
            `;
        }

        // Pages
        for (let i = Math.max(1, currentPage - 2); i <= Math.min(totalPages, currentPage + 2); i++) {
            paginationHTML += `
                <li class="page-item ${i === currentPage ? 'active' : ''}">
                    <a class="page-link" href="#" onclick="loadCommandes(${i})">${i}</a>
                </li>
            `;
        }

        // Bouton suivant
        if (currentPage < totalPages) {
            paginationHTML += `
                <li class="page-item">
                    <a class="page-link" href="#" onclick="loadCommandes(${currentPage + 1})">
                        <i class="bi-chevron-right"></i>
                    </a>
                </li>
            `;
        }

        container.innerHTML = paginationHTML;
    }

    // Fonctions d'action
    function viewCommande(commandeId) {
        window.location.href = `http://localhost:5000/commande/${commandeId}`;
    }

    function editCommande(commandeId) {
        window.location.href = `/commande/${commandeId}/modifier`;
    }

    async function deleteCommande(commandeId) {
        showDeleteConfirmation(commandeId);
    }

    function showDeleteConfirmation(commandeId) {
        const modal = document.createElement('div');
        modal.className = 'modal fade show';
        modal.style.display = 'block';
        modal.style.backgroundColor = 'rgba(0,0,0,0.5)';
        modal.innerHTML = `
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h5 class="modal-title text-danger">
                            <i class="bi-exclamation-triangle me-2"></i>
                            Confirmer la suppression
                        </h5>
                        <button type="button" class="btn-close" onclick="closeDeleteModal()"></button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-3">Êtes-vous sûr de vouloir supprimer cette commande ?</p>
                        <div class="alert alert-warning d-flex align-items-center">
                            <i class="bi-info-circle me-2"></i>
                            <small>Cette action est irréversible. La commande sera marquée comme supprimée.</small>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" onclick="closeDeleteModal()">
                            <i class="bi-x-circle me-1"></i>
                            Annuler
                        </button>
                        <button type="button" class="btn btn-danger" onclick="confirmDelete('${commandeId}')">
                            <i class="bi-trash me-1"></i>
                            Supprimer
                        </button>
                    </div>
                </div>
            </div>
        `;
        
        document.body.appendChild(modal);
        document.body.style.overflow = 'hidden';
    }

    function closeDeleteModal() {
        const modal = document.querySelector('.modal.show');
        if (modal) {
            modal.remove();
            document.body.style.overflow = '';
        }
    }

    async function confirmDelete(commandeId) {
        closeDeleteModal();
        
        try {
            const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
            const response = await fetch(`/api/commandes/${commandeId}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });

            if (response.ok) {
                showToast('Commande supprimée avec succès', 'success');
                loadCommandes(currentPage);
            } else {
                const data = await response.json();
                throw new Error(data.message || 'Erreur lors de la suppression');
            }
        } catch (error) {
            console.error('Erreur lors de la suppression:', error);
            showToast('Erreur lors de la suppression: ' + error.message, 'error');
        }
    }

    // Fonctions de filtrage
    function applyFilters() {
        loadCommandes(1);
    }

    function clearFilters() {
        document.getElementById('searchInput').value = '';
        document.getElementById('statusFilter').value = '';
        document.getElementById('dateDebutFilter').value = '';
        document.getElementById('dateFinFilter').value = '';
        document.getElementById('montantMinFilter').value = '';
        loadCommandes(1);
    }

    // Fonctions d'export
    function exportToExcel() {
        if (!currentCommandes || currentCommandes.length === 0) {
            showToast('Aucune donnée à exporter', 'warning');
            return;
        }
        
        let csvContent = "Numéro,Fournisseur,Date Achat,Date Livraison,Montant,Statut\n";
        currentCommandes.forEach(commande => {
            const numero = commande.numero_commande || 'N/A';
            const fournisseur = commande.fournisseur?.name || 'N/A';
            const dateAchat = formatDate(commande.date_achat);
            const dateLivraison = commande.date_livraison_effective ? formatDate(commande.date_livraison_effective) : formatDate(commande.date_livraison_prevue);
            const montant = commande.montant || '0';
            const statut = getStatusText(commande.status);
            
            csvContent += `"${numero}","${fournisseur}","${dateAchat}","${dateLivraison}","${montant}","${statut}"\n`;
        });
        
        const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement('a');
        const url = URL.createObjectURL(blob);
        link.setAttribute('href', url);
        link.setAttribute('download', `commandes_${new Date().toISOString().split('T')[0]}.csv`);
        link.style.visibility = 'hidden';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        showToast('Export Excel réussi', 'success');
    }

    function exportToPDF() {
        if (!currentCommandes || currentCommandes.length === 0) {
            showToast('Aucune donnée à exporter', 'warning');
            return;
        }
        
        let htmlContent = `
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset="utf-8">
                <title>Liste des Commandes</title>
                <style>
                    body { font-family: Arial, sans-serif; margin: 20px; }
                    h1 { color: #f00480; text-align: center; margin-bottom: 30px; }
                    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                    th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
                    th { background-color: #f00480; color: white; }
                    tr:nth-child(even) { background-color: #f2f2f2; }
                    .header { text-align: center; margin-bottom: 20px; }
                    .date { color: #666; font-size: 12px; }
                </style>
            </head>
            <body>
                <div class="header">
                    <h1>Liste des Commandes</h1>
                    <p class="date">Généré le ${new Date().toLocaleDateString('fr-FR')} à ${new Date().toLocaleTimeString('fr-FR')}</p>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Numéro</th>
                            <th>Fournisseur</th>
                            <th>Date Achat</th>
                            <th>Date Livraison</th>
                            <th>Montant</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>
        `;
        
        currentCommandes.forEach(commande => {
            const numero = commande.numero_commande || 'N/A';
            const fournisseur = commande.fournisseur?.name || 'N/A';
            const dateAchat = formatDate(commande.date_achat);
            const dateLivraison = commande.date_livraison_effective ? formatDate(commande.date_livraison_effective) : formatDate(commande.date_livraison_prevue);
            const montant = formatPrice(commande.montant);
            const statut = getStatusText(commande.status);
            
            htmlContent += `
                <tr>
                    <td>${numero}</td>
                    <td>${fournisseur}</td>
                    <td>${dateAchat}</td>
                    <td>${dateLivraison}</td>
                    <td>${montant}</td>
                    <td>${statut}</td>
                </tr>
            `;
        });
        
        htmlContent += `
                    </tbody>
                </table>
            </body>
            </html>
        `;
        
        const printWindow = window.open('', '_blank');
        printWindow.document.write(htmlContent);
        printWindow.document.close();
        printWindow.focus();
        printWindow.onload = function() {
            printWindow.print();
            printWindow.close();
        };
        showToast('Export PDF lancé', 'success');
    }

    // Fonction pour afficher les toasts
    function showToast(message, type = 'info') {
        const toastContainer = document.getElementById('toastContainer') || createToastContainer();
        
        const toast = document.createElement('div');
        toast.className = `toast align-items-center text-white bg-${type === 'success' ? 'success' : type === 'error' ? 'danger' : 'info'} border-0`;
        toast.setAttribute('role', 'alert');
        toast.innerHTML = `
            <div class="d-flex">
                <div class="toast-body">${message}</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        `;
        
        toastContainer.appendChild(toast);
        
        const bsToast = new bootstrap.Toast(toast);
        bsToast.show();
        
        toast.addEventListener('hidden.bs.toast', () => {
            toast.remove();
        });
    }

    function createToastContainer() {
        const container = document.createElement('div');
        container.id = 'toastContainer';
        container.className = 'toast-container position-fixed top-0 end-0 p-3';
        container.style.zIndex = '9999';
        document.body.appendChild(container);
        return container;
    }

    // Initialisation
    document.addEventListener('DOMContentLoaded', function() {
        loadCommandes();
    });
</script>

<?php $content = ob_get_clean(); ?>
<?php require './views/layouts/app-layout.php'; ?>