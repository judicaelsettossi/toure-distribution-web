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

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .stats-card {
        background: white;
        border-radius: 12px;
        padding: 1.25rem;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        border: none;
        text-align: center;
        height: 110px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        animation: fadeInUp 0.6s ease-out;
    }

    .stats-card:nth-child(1) { animation-delay: 0.1s; }
    .stats-card:nth-child(2) { animation-delay: 0.2s; }
    .stats-card:nth-child(3) { animation-delay: 0.3s; }
    .stats-card:nth-child(4) { animation-delay: 0.4s; }
    .stats-card:nth-child(5) { animation-delay: 0.5s; }
    .stats-card:nth-child(6) { animation-delay: 0.6s; }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .stats-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .stats-card:hover .stats-icon {
        transform: scale(1.1);
    }

    .stats-card:hover .stats-value {
        transform: scale(1.05);
    }

    .stats-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--primary-color), #d1036d);
    }

    .stats-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        margin: 0 auto 0.75rem;
        flex-shrink: 0;
        transition: all 0.3s ease;
    }

    .stats-icon.primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .stats-icon.success {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        color: white;
    }

    .stats-icon.warning {
        background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        color: white;
    }

    .stats-icon.info {
        background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        color: #333;
    }

    .stats-icon.danger {
        background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
        color: #333;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 0.75rem;
        }
        
        .stats-card {
            height: 100px;
            padding: 1rem;
        }
        
        .stats-icon {
            width: 35px;
            height: 35px;
            font-size: 0.9rem;
        }
        
        .stats-value {
            font-size: 1.25rem;
        }
        
        .stats-label {
            font-size: 0.7rem;
        }
    }

    @media (max-width: 480px) {
        .stats-grid {
            grid-template-columns: 1fr;
            gap: 0.5rem;
        }
    }

    .stats-value {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.25rem;
        line-height: 1.2;
        transition: all 0.3s ease;
    }

    .stats-label {
        color: #6c757d;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        line-height: 1.2;
    }

    .table-modern {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .table-modern thead {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        color: black;
    }

    .table-modern thead th {
        border: none;
        font-weight: 600;
        padding: 1rem;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .table-modern tbody td {
        border: none;
        padding: 1rem;
        vertical-align: middle;
        border-bottom: 1px solid #f1f3f4;
    }

    .table-modern tbody tr:last-child td {
        border-bottom: none;
    }

    .table-modern tbody tr:hover {
        background-color: #f8f9fa;
    }

    .badge-status {
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.875rem;
    }

    .badge-en-preparation {
        background-color: #fff3cd;
        color: #856404;
    }

    .badge-prete {
        background-color: #d1ecf1;
        color: #0c5460;
    }

    .badge-en-transit {
        background-color: #cce5ff;
        color: #004085;
    }

    .badge-livree {
        background-color: #d4edda;
        color: #155724;
    }

    .badge-annulee {
        background-color: #f8d7da;
        color: #721c24;
    }

    .badge-en-retard {
        background-color: #f8d7da;
        color: #721c24;
    }

    .btn-outline-modern {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        border: 2px solid var(--primary-color);
        background: white;
        color: var(--primary-color);
        border-radius: 8px;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-outline-modern:hover {
        background-color: var(--primary-color);
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 3px 10px rgba(240, 4, 128, 0.3);
    }

    .loading-spinner {
        display: none;
    }

    .error-message {
        display: none;
    }

    .success-message {
        display: none;
    }

    .alert-custom {
        border-radius: 8px;
        border: none;
        font-weight: 500;
    }

    .alert-success-custom {
        background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
        color: #155724;
        border-left: 4px solid #28a745;
    }

    .alert-danger-custom {
        background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
        color: #721c24;
        border-left: 4px solid #dc3545;
    }

    .alert-warning-custom {
        background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
        color: #856404;
        border-left: 4px solid #ffc107;
    }

    .alert-info-custom {
        background: linear-gradient(135deg, #d1ecf1 0%, #bee5eb 100%);
        color: #0c5460;
        border-left: 4px solid #17a2b8;
    }
</style>

<main class="main">
    <div class="content px-4 py-4">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-1 font-public-sans text-primary-custom">Gestion des Livraisons</h1>
                <p class="text-muted mb-0">Suivez et gérez toutes les livraisons aux clients</p>
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-outline-modern" onclick="refreshData()">
                    <i class="bi-arrow-clockwise me-1"></i> Actualiser
                </button>
                <button class="btn btn-primary-custom" onclick="createDelivery()">
                    <i class="bi-plus-circle me-1"></i> Nouvelle Livraison
                </button>
            </div>
        </div>

        <!-- Loading State -->
        <div class="loading-spinner text-center py-5" id="loadingState">
            <div class="spinner-border text-primary-custom" role="status">
                <span class="visually-hidden">Chargement...</span>
            </div>
            <p class="mt-3 text-muted">Chargement des livraisons...</p>
        </div>

        <!-- Error State -->
        <div class="error-message alert alert-danger-custom alert-custom" id="errorState">
            <i class="bi-exclamation-triangle me-2"></i>
            <span id="errorMessage">Une erreur est survenue lors du chargement des livraisons.</span>
        </div>

        <!-- Success State -->
        <div class="success-message alert alert-success-custom alert-custom" id="successState">
            <i class="bi-check-circle me-2"></i>
            <span id="successMessage">Action effectuée avec succès !</span>
        </div>

        <!-- Livraisons Container -->
        <div id="livraisonsContainer" style="display: none;">
            <!-- Stats Cards -->
            <div class="stats-grid" id="statsCards">
                <div class="stats-card">
                    <div class="stats-icon primary">
                        <i class="bi-truck"></i>
                    </div>
                    <div class="stats-value text-primary-custom" id="totalLivraisons">0</div>
                    <div class="stats-label">Total</div>
                </div>
                <div class="stats-card">
                    <div class="stats-icon warning">
                        <i class="bi-hourglass-split"></i>
                    </div>
                    <div class="stats-value text-warning" id="enPreparation">0</div>
                    <div class="stats-label">En Préparation</div>
                </div>
                <div class="stats-card">
                    <div class="stats-icon info">
                        <i class="bi-check-circle"></i>
                    </div>
                    <div class="stats-value text-info" id="prete">0</div>
                    <div class="stats-label">Prête</div>
                </div>
                <div class="stats-card">
                    <div class="stats-icon primary">
                        <i class="bi-truck"></i>
                    </div>
                    <div class="stats-value text-primary" id="enTransit">0</div>
                    <div class="stats-label">En Transit</div>
                </div>
                <div class="stats-card">
                    <div class="stats-icon success">
                        <i class="bi-check2-circle"></i>
                    </div>
                    <div class="stats-value text-success" id="livree">0</div>
                    <div class="stats-label">Livrée</div>
                </div>
                <div class="stats-card">
                    <div class="stats-icon danger">
                        <i class="bi-exclamation-triangle"></i>
                    </div>
                    <div class="stats-value text-danger" id="enRetard">0</div>
                    <div class="stats-label">En Retard</div>
                </div>
            </div>

            <!-- Filtres -->
            <div class="card card-custom mb-4">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label for="searchInput" class="form-label">Rechercher</label>
                            <input type="text" class="form-control" id="searchInput" placeholder="Référence, client...">
                        </div>
                        <div class="col-md-2">
                            <label for="statutFilter" class="form-label">Statut</label>
                            <select class="form-select" id="statutFilter">
                                <option value="">Tous</option>
                                <option value="en_preparation">En Préparation</option>
                                <option value="prete">Prête</option>
                                <option value="en_transit">En Transit</option>
                                <option value="livree">Livrée</option>
                                <option value="annulee">Annulée</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="dateDebut" class="form-label">Date Début</label>
                            <input type="date" class="form-control" id="dateDebut">
                        </div>
                        <div class="col-md-2">
                            <label for="dateFin" class="form-label">Date Fin</label>
                            <input type="date" class="form-control" id="dateFin">
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <button class="btn btn-outline-primary me-2" onclick="applyFilters()">
                                <i class="bi-funnel me-1"></i> Filtrer
                            </button>
                            <button class="btn btn-outline-secondary" onclick="clearFilters()">
                                <i class="bi-x-circle me-1"></i> Effacer
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tableau des livraisons -->
            <div class="card card-custom">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">
                        <i class="bi-truck me-2"></i>Liste des Livraisons
                    </h5>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-success btn-sm" onclick="exportToExcel()">
                            <i class="bi-file-earmark-excel me-1"></i> Excel
                        </button>
                        <button class="btn btn-outline-danger btn-sm" onclick="exportToPDF()">
                            <i class="bi-file-earmark-pdf me-1"></i> PDF
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-modern mb-0">
                            <thead>
                                <tr>
                                    <th>Référence</th>
                                    <th>Client</th>
                                    <th>Chauffeur</th>
                                    <th>Camion</th>
                                    <th>Date Prévue</th>
                                    <th>Adresse</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="livraisonsTableBody">
                                <tr>
                                    <td colspan="8" class="text-center py-4">
                                        <div class="spinner-border text-primary" role="status">
                                            <span class="visually-hidden">Chargement...</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    // Variables globales
    let livraisonsData = [];
    let currentPage = 1;
    let perPage = 15;
    let totalPages = 1;

    // Fonction pour récupérer un cookie
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
    }

    // Fonction pour afficher le loading
    function showLoading() {
        document.getElementById('loadingState').style.display = 'block';
        document.getElementById('livraisonsContainer').style.display = 'none';
        document.getElementById('errorState').style.display = 'none';
        document.getElementById('successState').style.display = 'none';
    }

    // Fonction pour masquer le loading
    function hideLoading() {
        document.getElementById('loadingState').style.display = 'none';
        document.getElementById('livraisonsContainer').style.display = 'block';
    }

    // Fonction pour afficher une erreur
    function showError(message) {
        document.getElementById('errorState').style.display = 'block';
        document.getElementById('errorMessage').textContent = message;
        document.getElementById('successState').style.display = 'none';
    }

    // Fonction pour afficher un succès
    function showSuccess(message) {
        document.getElementById('successState').style.display = 'block';
        document.getElementById('successMessage').textContent = message;
        document.getElementById('errorState').style.display = 'none';
    }

    // Fonction pour charger les livraisons
    async function loadLivraisons() {
        try {
            const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
            
            if (!accessToken) {
                showError('Token d\'authentification manquant');
                return;
            }

            // Construire les paramètres de requête
            const params = new URLSearchParams({
                page: currentPage,
                per_page: perPage
            });

            // Ajouter les filtres
            const search = document.getElementById('searchInput').value;
            const statut = document.getElementById('statutFilter').value;
            const dateDebut = document.getElementById('dateDebut').value;
            const dateFin = document.getElementById('dateFin').value;

            if (search) params.append('search', search);
            if (statut) params.append('statut', statut);
            if (dateDebut) params.append('date_debut', dateDebut);
            if (dateFin) params.append('date_fin', dateFin);

            const response = await fetch(`/api/livraisons?${params}`, {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                credentials: 'include'
            });

            if (!response.ok) {
                throw new Error(`Erreur HTTP: ${response.status}`);
            }

            const result = await response.json();
            
            if (result.success && result.data) {
                livraisonsData = result.data.data || [];
                totalPages = result.data.last_page || 1;
                displayLivraisons();
                loadStatistics();
            } else {
                throw new Error(result.message || 'Erreur lors du chargement des livraisons');
            }

        } catch (error) {
            console.error('Erreur lors du chargement des livraisons:', error);
            showError('Erreur lors du chargement des livraisons: ' + error.message);
        }
    }

    // Fonction pour charger les statistiques
    async function loadStatistics() {
        try {
            const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
            
            const response = await fetch('/api/livraisons/statistics/overview', {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                credentials: 'include'
            });

            if (response.ok) {
                const result = await response.json();
                if (result.success && result.data) {
                    displayStatistics(result.data);
                }
            }

        } catch (error) {
            console.error('Erreur lors du chargement des statistiques:', error);
        }
    }

    // Fonction pour afficher les statistiques
    function displayStatistics(stats) {
        document.getElementById('totalLivraisons').textContent = stats.total || 0;
        document.getElementById('enPreparation').textContent = stats.en_preparation || 0;
        document.getElementById('prete').textContent = stats.prete || 0;
        document.getElementById('enTransit').textContent = stats.en_transit || 0;
        document.getElementById('livree').textContent = stats.livree || 0;
        document.getElementById('enRetard').textContent = stats.en_retard || 0;
    }

    // Fonction pour afficher les livraisons
    function displayLivraisons() {
        const tbody = document.getElementById('livraisonsTableBody');
        
        if (!livraisonsData || livraisonsData.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="8" class="text-center py-4 text-muted">
                        <i class="bi-truck me-2"></i>Aucune livraison trouvée
                    </td>
                </tr>
            `;
            return;
        }

        tbody.innerHTML = livraisonsData.map(livraison => `
            <tr>
                <td>
                    <div class="fw-semibold">${livraison.reference || 'N/A'}</div>
                </td>
                <td>
                    <div class="fw-semibold">${livraison.vente?.client?.name || 'N/A'}</div>
                    <small class="text-muted">${livraison.vente?.numero_vente || ''}</small>
                </td>
                <td>
                    <div>${livraison.chauffeur?.nom || 'N/A'}</div>
                    <small class="text-muted">${livraison.chauffeur?.telephone || ''}</small>
                </td>
                <td>
                    <div>${livraison.camion?.immatriculation || 'N/A'}</div>
                    <small class="text-muted">${livraison.camion?.marque || ''}</small>
                </td>
                <td>${formatDate(livraison.date_livraison_prevue)}</td>
                <td>
                    <div class="text-truncate" style="max-width: 200px;" title="${livraison.adresse_livraison || ''}">
                        ${livraison.adresse_livraison || 'N/A'}
                    </div>
                </td>
                <td>
                    <span class="badge-status badge-${getStatusClass(livraison.statut)}">
                        ${getStatusLabel(livraison.statut)}
                    </span>
                </td>
                <td>
                    <div class="d-flex gap-1">
                        <button class="btn btn-sm btn-outline-primary" onclick="viewDelivery('${livraison.livraison_id}')" title="Voir">
                            <i class="bi-eye"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-success" onclick="editDelivery('${livraison.livraison_id}')" title="Modifier">
                            <i class="bi-pencil"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger" onclick="deleteDelivery('${livraison.livraison_id}')" title="Supprimer">
                            <i class="bi-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>
        `).join('');
    }

    // Fonctions utilitaires
    function formatDate(dateString) {
        if (!dateString) return 'N/A';
        return new Date(dateString).toLocaleDateString('fr-FR');
    }

    function getStatusLabel(status) {
        const labels = {
            'en_preparation': 'En Préparation',
            'prete': 'Prête',
            'en_transit': 'En Transit',
            'livree': 'Livrée',
            'annulee': 'Annulée',
            'en_retard': 'En Retard'
        };
        return labels[status] || status;
    }

    function getStatusClass(status) {
        const classes = {
            'en_preparation': 'en-preparation',
            'prete': 'prete',
            'en_transit': 'en-transit',
            'livree': 'livree',
            'annulee': 'annulee',
            'en_retard': 'en-retard'
        };
        return classes[status] || 'en-preparation';
    }

    // Actions
    function createDelivery() {
        window.location.href = '/livraison/creer';
    }

    function viewDelivery(id) {
        window.location.href = `/livraison/${id}`;
    }

    function editDelivery(id) {
        window.location.href = `/livraison/${id}/edit`;
    }

    function deleteDelivery(id) {
        if (confirm('Êtes-vous sûr de vouloir supprimer cette livraison ?')) {
            // TODO: Implémenter la suppression
            showToast('Fonctionnalité de suppression en cours de développement', 'info');
        }
    }

    function refreshData() {
        showLoading();
        loadLivraisons().then(() => {
            hideLoading();
        });
    }

    function applyFilters() {
        currentPage = 1;
        showLoading();
        loadLivraisons().then(() => {
            hideLoading();
        });
    }

    function clearFilters() {
        document.getElementById('searchInput').value = '';
        document.getElementById('statutFilter').value = '';
        document.getElementById('dateDebut').value = '';
        document.getElementById('dateFin').value = '';
        applyFilters();
    }

    // Fonctions d'export
    function exportToExcel() {
        if (!livraisonsData || livraisonsData.length === 0) {
            showToast('Aucune donnée à exporter', 'warning');
            return;
        }
        
        let csvContent = "Référence,Client,Chauffeur,Camion,Date Prévue,Adresse,Statut\n";
        livraisonsData.forEach(livraison => {
            const reference = livraison.reference || 'N/A';
            const client = livraison.vente?.client?.name || 'N/A';
            const chauffeur = livraison.chauffeur?.nom || 'N/A';
            const camion = livraison.camion?.immatriculation || 'N/A';
            const datePrevue = formatDate(livraison.date_livraison_prevue);
            const adresse = livraison.adresse_livraison || 'N/A';
            const statut = getStatusLabel(livraison.statut);
            csvContent += `"${reference}","${client}","${chauffeur}","${camion}","${datePrevue}","${adresse}","${statut}"\n`;
        });
        
        const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement('a');
        const url = URL.createObjectURL(blob);
        link.setAttribute('href', url);
        link.setAttribute('download', `livraisons_${new Date().toISOString().split('T')[0]}.csv`);
        link.style.visibility = 'hidden';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        showToast('Export Excel réussi', 'success');
    }

    function exportToPDF() {
        if (!livraisonsData || livraisonsData.length === 0) {
            showToast('Aucune donnée à exporter', 'warning');
            return;
        }
        
        let htmlContent = `
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset="utf-8">
                <title>Liste des Livraisons</title>
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
                    <h1>Liste des Livraisons</h1>
                    <p class="date">Généré le ${new Date().toLocaleDateString('fr-FR')} à ${new Date().toLocaleTimeString('fr-FR')}</p>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Référence</th>
                            <th>Client</th>
                            <th>Chauffeur</th>
                            <th>Camion</th>
                            <th>Date Prévue</th>
                            <th>Adresse</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>
        `;
        
        livraisonsData.forEach(livraison => {
            const reference = livraison.reference || 'N/A';
            const client = livraison.vente?.client?.name || 'N/A';
            const chauffeur = livraison.chauffeur?.nom || 'N/A';
            const camion = livraison.camion?.immatriculation || 'N/A';
            const datePrevue = formatDate(livraison.date_livraison_prevue);
            const adresse = livraison.adresse_livraison || 'N/A';
            const statut = getStatusLabel(livraison.statut);
            htmlContent += `
                <tr>
                    <td>${reference}</td>
                    <td>${client}</td>
                    <td>${chauffeur}</td>
                    <td>${camion}</td>
                    <td>${datePrevue}</td>
                    <td>${adresse}</td>
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
        toast.className = `toast align-items-center text-white bg-${type === 'success' ? 'success' : type === 'error' ? 'danger' : type === 'warning' ? 'warning' : 'info'} border-0`;
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
        showLoading();
        loadLivraisons().then(() => {
            hideLoading();
        });
    });
</script>

<?php $content = ob_get_clean(); ?>
<?php require './views/layouts/app-layout.php'; ?>

