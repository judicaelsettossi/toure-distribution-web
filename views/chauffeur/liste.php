<?php
// Pas besoin d'ob_start() car le contrôleur gère déjà le buffer
?>

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

    .badge-status {
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 600;
    }

    .badge-actif {
        background-color: #e8f5e9;
        color: #388e3c;
    }

    .badge-inactif {
        background-color: #ffebee;
        color: #d32f2f;
    }

    .badge-en-conge {
        background-color: #fff3e0;
        color: #f57c00;
    }

    .chauffeur-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        color: white;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        font-size: 0.875rem;
    }

    .stats-card {
        background: white;
        border-radius: 12px;
        padding: 1rem;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        border: 1px solid #e9ecef;
        text-align: center;
        transition: all 0.3s ease;
        height: 120px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .stats-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
    }

    .stats-icon {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        color: white;
        margin: 0 auto 0.5rem;
    }

    .stats-value {
        font-size: 1.5rem;
        font-weight: 700;
        color: #212529;
        margin-bottom: 0.25rem;
    }

    .stats-label {
        font-size: 0.8rem;
        color: #6c757d;
        font-weight: 500;
    }

    .page-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        color: white;
        border-radius: 12px;
        padding: 2rem;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: -20%;
        right: -10%;
        width: 120px;
        height: 120px;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
        z-index: 1;
    }

    .page-header .row {
        position: relative;
        z-index: 2;
    }

    .page-header-title {
        font-size: 1.75rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        color: white !important;
    }

    .breadcrumb {
        background: none;
        padding: 0;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .breadcrumb-item a {
        color: rgba(255,255,255,0.8) !important;
        text-decoration: none;
    }

    .breadcrumb-item.active {
        color: white !important;
    }

    .btn-outline-light {
        border-color: rgba(255,255,255,0.3);
        color: white;
    }

    .btn-outline-light:hover {
        background-color: rgba(255,255,255,0.1);
        border-color: rgba(255,255,255,0.5);
        color: white;
    }

    .search-input {
        border-radius: 8px;
        border: 1px solid #e9ecef;
        padding: 0.75rem 1rem;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(240, 4, 128, 0.25);
    }

    .filter-select {
        border-radius: 8px;
        border: 1px solid #e9ecef;
        padding: 0.75rem 1rem;
        font-size: 0.9rem;
        background-color: white;
    }

    .filter-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(240, 4, 128, 0.25);
    }

    .table th {
        border-top: none;
        font-weight: 600;
        color: #495057;
        font-size: 0.9rem;
        padding: 1rem 0.75rem;
    }

    .table td {
        padding: 1rem 0.75rem;
        vertical-align: middle;
        font-size: 0.9rem;
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
        align-items: center;
    }

    .btn-sm {
        padding: 0.375rem 0.75rem;
        font-size: 0.8rem;
        border-radius: 6px;
    }

    .pagination {
        margin-bottom: 0;
    }

    .page-link {
        border-radius: 8px;
        margin: 0 2px;
        border: 1px solid #e9ecef;
        color: #6c757d;
        padding: 0.5rem 0.75rem;
    }

    .page-link:hover {
        background-color: var(--light-primary);
        border-color: var(--primary-color);
        color: var(--primary-color);
    }

    .page-item.active .page-link {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .loading-spinner {
        display: none;
        text-align: center;
        padding: 2rem;
    }

    .spinner-border-sm {
        width: 1rem;
        height: 1rem;
    }

    .no-data {
        text-align: center;
        padding: 3rem 1rem;
        color: #6c757d;
    }

    .no-data i {
        font-size: 3rem;
        margin-bottom: 1rem;
        color: #dee2e6;
    }

    /* Modal styles */
    .modal-content {
        border-radius: 12px;
        border: none;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }

    .modal-header {
        border-bottom: 1px solid #e9ecef;
        padding: 1.5rem;
    }

    .modal-title {
        font-weight: 600;
        color: #212529;
    }

    .modal-body {
        padding: 1.5rem;
    }

    .modal-footer {
        border-top: 1px solid #e9ecef;
        padding: 1rem 1.5rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .page-header {
            padding: 1.5rem;
        }
        
        .stats-card {
            margin-bottom: 1rem;
        }
        
        .table-responsive {
            font-size: 0.8rem;
        }
        
        .action-buttons {
            flex-direction: column;
            gap: 0.25rem;
        }
    }
</style>

<main id="content" role="main" class="main font-public-sans">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link text-white" href="/">Tableau de Bord</a></li>
                            <li class="breadcrumb-item active">Chauffeurs</li>
                        </ol>
                    </nav>
                    <h1 class="page-header-title">
                        <i class="bi-person-badge me-2"></i>Gestion des Chauffeurs
                    </h1>
                    <p class="mb-0">Gérez vos conducteurs et leurs informations</p>
                </div>

                <div class="col-sm-auto">
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-light" onclick="exportToExcel()">
                            <i class="bi-file-earmark-excel me-1"></i> Excel
                        </button>
                        <button class="btn btn-outline-light" onclick="exportToPDF()">
                            <i class="bi-file-earmark-pdf me-1"></i> PDF
                        </button>
                        <a class="btn btn-light" href="/chauffeur/creer">
                            <i class="bi-plus-lg me-1"></i> Nouveau Chauffeur
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stats-card">
                    <div class="stats-icon" style="background: linear-gradient(135deg, #28a745, #20c997);">
                        <i class="bi-person-check"></i>
                    </div>
                    <div class="stats-value" id="totalChauffeurs">-</div>
                    <div class="stats-label">Total Chauffeurs</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stats-card">
                    <div class="stats-icon" style="background: linear-gradient(135deg, #007bff, #6610f2);">
                        <i class="bi-person-check-fill"></i>
                    </div>
                    <div class="stats-value" id="chauffeursActifs">-</div>
                    <div class="stats-label">Actifs</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stats-card">
                    <div class="stats-icon" style="background: linear-gradient(135deg, #ffc107, #fd7e14);">
                        <i class="bi-calendar-check"></i>
                    </div>
                    <div class="stats-value" id="chauffeursEnConge">-</div>
                    <div class="stats-label">En Congé</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="stats-card">
                    <div class="stats-icon" style="background: linear-gradient(135deg, #dc3545, #e83e8c);">
                        <i class="bi-person-x"></i>
                    </div>
                    <div class="stats-value" id="chauffeursInactifs">-</div>
                    <div class="stats-label">Inactifs</div>
                </div>
            </div>
        </div>

        <!-- Filters and Search -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card card-custom filter-card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-4 mb-3 mb-md-0">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi-search"></i>
                                    </span>
                                    <input type="text" class="form-control search-input" id="searchInput" placeholder="Rechercher par nom ou téléphone...">
                                </div>
                            </div>
                            <div class="col-md-3 mb-3 mb-md-0">
                                <select class="form-select filter-select" id="statusFilter">
                                    <option value="">Tous les statuts</option>
                                    <option value="actif">Actif</option>
                                    <option value="inactif">Inactif</option>
                                    <option value="en_conge">En Congé</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3 mb-md-0">
                                <select class="form-select filter-select" id="permisFilter">
                                    <option value="">Tous les permis</option>
                                    <option value="1">Permis valide</option>
                                    <option value="0">Permis expiré</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary-custom w-100" onclick="applyFilters()">
                                    <i class="bi-funnel me-1"></i> Filtrer
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chauffeurs Table -->
        <div class="row">
            <div class="col-12">
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="card-title mb-0">
                                    <i class="bi-list-ul me-2"></i>Liste des Chauffeurs
                                </h5>
                            </div>
                            <div class="col-auto">
                                <span class="badge bg-primary" id="chauffeursCount">0 chauffeurs</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="loading-spinner" id="loadingSpinner">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Chargement...</span>
                            </div>
                            <p class="mt-2">Chargement des chauffeurs...</p>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover mb-0" id="chauffeursTable">
                                <thead>
                                    <tr>
                                        <th>Chauffeur</th>
                                        <th>Téléphone</th>
                                        <th>Permis</th>
                                        <th>Expiration</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="chauffeursTableBody">
                                    <!-- Les données seront chargées ici -->
                                </tbody>
                            </table>
                        </div>

                        <div class="no-data d-none" id="noDataMessage">
                            <i class="bi-person-x"></i>
                            <h5>Aucun chauffeur trouvé</h5>
                            <p>Il n'y a aucun chauffeur correspondant à vos critères de recherche.</p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <nav aria-label="Pagination">
                            <ul class="pagination justify-content-center mb-0" id="pagination">
                                <!-- La pagination sera générée ici -->
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modal de confirmation de suppression -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title text-danger" id="deleteModalLabel">
                    <i class="bi-exclamation-triangle-fill me-2"></i>Confirmer la suppression
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0">
                <div class="d-flex align-items-start">
                    <div class="flex-shrink-0">
                        <div class="bg-danger bg-opacity-10 rounded-circle p-3">
                            <i class="bi-trash text-danger" style="font-size: 1.5rem;"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-2">Êtes-vous sûr de vouloir supprimer ce chauffeur ?</h6>
                        <p class="text-muted mb-3">
                            Cette action est <strong>irréversible</strong>. Le chauffeur sera supprimé définitivement du système.
                        </p>
                        <div class="bg-light rounded p-3">
                            <div class="d-flex align-items-center">
                                <div class="chauffeur-avatar me-3" id="modalChauffeurAvatar" style="width: 40px; height: 40px; font-size: 0.875rem;">
                                    <!-- Avatar will be populated -->
                                </div>
                                <div>
                                    <div class="fw-semibold" id="modalChauffeurName">-</div>
                                    <small class="text-muted" id="modalChauffeurDetails">-</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi-x-lg me-1"></i> Annuler
                </button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">
                    <i class="bi-trash me-1"></i> Supprimer définitivement
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    // Variables globales
    let currentPage = 1;
    let totalPages = 1;
    let chauffeursData = [];
    let chauffeurToDelete = null;

    // Fonction pour récupérer un cookie
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
    }

    // Fonction pour obtenir les initiales d'un chauffeur
    function getChauffeurInitials(name) {
        return name.split(' ').map(word => word.charAt(0)).join('').toUpperCase().substring(0, 2);
    }

    // Fonction pour formater la date
    function formatDate(dateString) {
        if (!dateString) return '-';
        const date = new Date(dateString);
        return date.toLocaleDateString('fr-FR');
    }

    // Fonction pour obtenir la classe du badge de statut
    function getStatusBadgeClass(status) {
        switch (status) {
            case 'actif': return 'badge-actif';
            case 'inactif': return 'badge-inactif';
            case 'en_conge': return 'badge-en-conge';
            default: return 'badge-inactif';
        }
    }

    // Fonction pour obtenir le texte du statut
    function getStatusText(status) {
        switch (status) {
            case 'actif': return 'Actif';
            case 'inactif': return 'Inactif';
            case 'en_conge': return 'En Congé';
            default: return 'Inconnu';
        }
    }

    // Fonction pour vérifier si un permis est expiré
    function isPermisExpired(dateString) {
        if (!dateString) return true;
        const expirationDate = new Date(dateString);
        const today = new Date();
        return expirationDate < today;
    }

    // Fonction pour charger les statistiques
    async function loadStatistics() {
        try {
            const accessToken = getCookie('access_token');
            const response = await fetch('https://toure.gestiem.com/api/chauffeurs?per_page=1', {
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });

            if (!response.ok) {
                throw new Error(`Erreur HTTP: ${response.status}`);
            }

            const data = await response.json();
            
            if (data.success && data.data) {
                const stats = data.data;
                document.getElementById('totalChauffeurs').textContent = stats.total || 0;
                
                // Calculer les statistiques par statut
                let actifs = 0, inactifs = 0, enConge = 0;
                
                // Charger toutes les données pour calculer les stats
                const allResponse = await fetch('https://toure.gestiem.com/api/chauffeurs?per_page=100', {
                    headers: {
                        'Authorization': `Bearer ${accessToken}`,
                        'Accept': 'application/json'
                    }
                });
                
                if (allResponse.ok) {
                    const allData = await allResponse.json();
                    if (allData.success && allData.data && allData.data.data) {
                        allData.data.data.forEach(chauffeur => {
                            switch (chauffeur.status) {
                                case 'actif': actifs++; break;
                                case 'inactif': inactifs++; break;
                                case 'en_conge': enConge++; break;
                            }
                        });
                    }
                }
                
                document.getElementById('chauffeursActifs').textContent = actifs;
                document.getElementById('chauffeursInactifs').textContent = inactifs;
                document.getElementById('chauffeursEnConge').textContent = enConge;
            }
        } catch (error) {
            console.error('Erreur lors du chargement des statistiques:', error);
        }
    }

    // Fonction pour charger les chauffeurs
    async function loadChauffeurs(page = 1) {
        try {
            showLoading(true);
            
            const accessToken = getCookie('access_token');
            const search = document.getElementById('searchInput').value;
            const status = document.getElementById('statusFilter').value;
            const permisValide = document.getElementById('permisFilter').value;
            
            let url = `https://toure.gestiem.com/api/chauffeurs?page=${page}&per_page=15`;
            
            if (search) url += `&search=${encodeURIComponent(search)}`;
            if (status) url += `&status=${status}`;
            if (permisValide !== '') url += `&permis_valide=${permisValide}`;
            
            const response = await fetch(url, {
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });

            if (!response.ok) {
                throw new Error(`Erreur HTTP: ${response.status}`);
            }

            const data = await response.json();
            
            if (data.success && data.data) {
                chauffeursData = data.data.data || [];
                currentPage = data.data.current_page || 1;
                totalPages = data.data.last_page || 1;
                
                displayChauffeurs(chauffeursData);
                updatePagination();
                updateChauffeursCount(chauffeursData.length, data.data.total || 0);
            } else {
                throw new Error(data.message || 'Erreur lors du chargement des données');
            }
        } catch (error) {
            console.error('Erreur lors du chargement des chauffeurs:', error);
            showError('Erreur lors du chargement des chauffeurs: ' + error.message);
        } finally {
            showLoading(false);
        }
    }

    // Fonction pour afficher les chauffeurs
    function displayChauffeurs(chauffeurs) {
        const tbody = document.getElementById('chauffeursTableBody');
        const noDataMessage = document.getElementById('noDataMessage');
        
        if (chauffeurs.length === 0) {
            tbody.innerHTML = '';
            noDataMessage.classList.remove('d-none');
            return;
        }
        
        noDataMessage.classList.add('d-none');
        
        tbody.innerHTML = chauffeurs.map(chauffeur => `
            <tr onclick="viewChauffeur('${chauffeur.chauffeur_id}')">
                <td>
                    <div class="d-flex align-items-center">
                        <div class="chauffeur-avatar me-3">
                            ${getChauffeurInitials(chauffeur.name)}
                        </div>
                        <div>
                            <div class="fw-semibold">${chauffeur.name || 'N/A'}</div>
                            <small class="text-muted">ID: ${chauffeur.chauffeur_id}</small>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="fw-medium">${chauffeur.phone || 'N/A'}</div>
                </td>
                <td>
                    <div class="fw-medium">${chauffeur.numero_permis || 'N/A'}</div>
                </td>
                <td>
                    <div class="fw-medium ${isPermisExpired(chauffeur.date_expiration_permis) ? 'text-danger' : 'text-success'}">
                        ${formatDate(chauffeur.date_expiration_permis)}
                        ${isPermisExpired(chauffeur.date_expiration_permis) ? '<i class="bi-exclamation-triangle-fill ms-1"></i>' : ''}
                    </div>
                </td>
                <td>
                    <span class="badge badge-status ${getStatusBadgeClass(chauffeur.status)}">
                        ${getStatusText(chauffeur.status)}
                    </span>
                </td>
                <td>
                    <div class="action-buttons" onclick="event.stopPropagation()">
                        <button class="btn btn-sm btn-outline-primary" onclick="viewChauffeur('${chauffeur.chauffeur_id}')" title="Voir">
                            <i class="bi-eye"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-secondary" onclick="editChauffeur('${chauffeur.chauffeur_id}')" title="Modifier">
                            <i class="bi-pencil"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger" onclick="deleteChauffeur('${chauffeur.chauffeur_id}', '${chauffeur.name}')" title="Supprimer">
                            <i class="bi-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>
        `).join('');
    }

    // Fonction pour mettre à jour la pagination
    function updatePagination() {
        const pagination = document.getElementById('pagination');
        
        if (totalPages <= 1) {
            pagination.innerHTML = '';
            return;
        }
        
        let paginationHTML = '';
        
        // Bouton précédent
        paginationHTML += `
            <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
                <a class="page-link" href="#" onclick="changePage(${currentPage - 1})">
                    <i class="bi-chevron-left"></i>
                </a>
            </li>
        `;
        
        // Pages
        for (let i = 1; i <= totalPages; i++) {
            if (i === 1 || i === totalPages || (i >= currentPage - 2 && i <= currentPage + 2)) {
                paginationHTML += `
                    <li class="page-item ${i === currentPage ? 'active' : ''}">
                        <a class="page-link" href="#" onclick="changePage(${i})">${i}</a>
                    </li>
                `;
            } else if (i === currentPage - 3 || i === currentPage + 3) {
                paginationHTML += '<li class="page-item disabled"><span class="page-link">...</span></li>';
            }
        }
        
        // Bouton suivant
        paginationHTML += `
            <li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
                <a class="page-link" href="#" onclick="changePage(${currentPage + 1})">
                    <i class="bi-chevron-right"></i>
                </a>
            </li>
        `;
        
        pagination.innerHTML = paginationHTML;
    }

    // Fonction pour changer de page
    function changePage(page) {
        if (page >= 1 && page <= totalPages && page !== currentPage) {
            loadChauffeurs(page);
        }
    }

    // Fonction pour appliquer les filtres
    function applyFilters() {
        currentPage = 1;
        loadChauffeurs();
    }

    // Fonction pour afficher/masquer le loading
    function showLoading(show) {
        const loadingSpinner = document.getElementById('loadingSpinner');
        const table = document.getElementById('chauffeursTable');
        const noDataMessage = document.getElementById('noDataMessage');
        
        if (show) {
            loadingSpinner.style.display = 'block';
            table.style.display = 'none';
            noDataMessage.classList.add('d-none');
        } else {
            loadingSpinner.style.display = 'none';
            table.style.display = 'table';
        }
    }

    // Fonction pour afficher une erreur
    function showError(message) {
        const tbody = document.getElementById('chauffeursTableBody');
        tbody.innerHTML = `
            <tr>
                <td colspan="6" class="text-center text-danger py-4">
                    <i class="bi-exclamation-triangle-fill me-2"></i>
                    ${message}
                </td>
            </tr>
        `;
    }

    // Fonction pour mettre à jour le compteur de chauffeurs
    function updateChauffeursCount(displayed, total) {
        document.getElementById('chauffeursCount').textContent = `${displayed} chauffeur${displayed > 1 ? 's' : ''} sur ${total}`;
    }

    // Fonction pour voir un chauffeur
    function viewChauffeur(id) {
        window.location.href = `/chauffeur/${id}`;
    }

    // Fonction pour modifier un chauffeur
    function editChauffeur(id) {
        window.location.href = `/chauffeur/${id}/modifier`;
    }

    // Fonction pour supprimer un chauffeur
    function deleteChauffeur(id, name) {
        chauffeurToDelete = { id: id, name: name };
        document.getElementById('modalChauffeurAvatar').textContent = getChauffeurInitials(name);
        document.getElementById('modalChauffeurName').textContent = name;
        document.getElementById('modalChauffeurDetails').textContent = `ID: ${id}`;
        const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
        modal.show();
    }

    // Fonction pour confirmer la suppression
    async function confirmDelete() {
        if (!chauffeurToDelete) return;
        
        try {
            const accessToken = getCookie('access_token');
            const response = await fetch(`https://toure.gestiem.com/api/chauffeurs/${chauffeurToDelete.id}`, {
                method: 'DELETE',
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
                showToast('Chauffeur supprimé avec succès', 'success');
                loadChauffeurs(currentPage);
            } else {
                throw new Error(data.message || 'Erreur lors de la suppression');
            }
        } catch (error) {
            console.error('Erreur lors de la suppression:', error);
            showToast('Erreur lors de la suppression: ' + error.message, 'error');
        } finally {
            const modal = bootstrap.Modal.getInstance(document.getElementById('deleteModal'));
            modal.hide();
            chauffeurToDelete = null;
        }
    }

    // Fonction pour exporter vers Excel
    async function exportToExcel() {
        try {
            showToast('Préparation de l\'export Excel...', 'info');
            
            const accessToken = getCookie('access_token');
            const response = await fetch('https://toure.gestiem.com/api/chauffeurs?per_page=1000', {
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });

            if (!response.ok) {
                throw new Error(`Erreur HTTP: ${response.status}`);
            }

            const data = await response.json();
            
            if (data.success && data.data && data.data.data) {
                const chauffeurs = data.data.data;
                
                // Charger SheetJS
                if (typeof XLSX === 'undefined') {
                    const script = document.createElement('script');
                    script.src = 'https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js';
                    script.onload = () => exportChauffeursToExcel(chauffeurs);
                    document.head.appendChild(script);
                } else {
                    exportChauffeursToExcel(chauffeurs);
                }
            } else {
                throw new Error('Aucune donnée à exporter');
            }
        } catch (error) {
            console.error('Erreur lors de l\'export Excel:', error);
            showToast('Erreur lors de l\'export Excel: ' + error.message, 'error');
        }
    }

    // Fonction pour exporter les chauffeurs vers Excel
    function exportChauffeursToExcel(chauffeurs) {
        try {
            const worksheet = XLSX.utils.json_to_sheet(chauffeurs.map(chauffeur => ({
                'Nom': chauffeur.name || 'N/A',
                'Téléphone': chauffeur.phone || 'N/A',
                'Numéro de Permis': chauffeur.numero_permis || 'N/A',
                'Date d\'Expiration': formatDate(chauffeur.date_expiration_permis),
                'Statut': getStatusText(chauffeur.status),
                'Permis Valide': isPermisExpired(chauffeur.date_expiration_permis) ? 'Non' : 'Oui',
                'Date de Création': formatDate(chauffeur.created_at)
            })));

            const workbook = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(workbook, worksheet, 'Chauffeurs');

            const fileName = `chauffeurs_${new Date().toISOString().split('T')[0]}.xlsx`;
            XLSX.writeFile(workbook, fileName);
            
            showToast('Export Excel terminé avec succès', 'success');
        } catch (error) {
            console.error('Erreur lors de la génération Excel:', error);
            showToast('Erreur lors de la génération Excel: ' + error.message, 'error');
        }
    }

    // Fonction pour exporter vers PDF
    async function exportToPDF() {
        try {
            showToast('Préparation de l\'export PDF...', 'info');
            
            const accessToken = getCookie('access_token');
            const response = await fetch('https://toure.gestiem.com/api/chauffeurs?per_page=1000', {
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });

            if (!response.ok) {
                throw new Error(`Erreur HTTP: ${response.status}`);
            }

            const data = await response.json();
            
            if (data.success && data.data && data.data.data) {
                const chauffeurs = data.data.data;
                
                // Charger PDFMake
                if (typeof pdfMake === 'undefined') {
                    const script = document.createElement('script');
                    script.src = 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js';
                    script.onload = () => exportChauffeursToPDF(chauffeurs);
                    document.head.appendChild(script);
                } else {
                    exportChauffeursToPDF(chauffeurs);
                }
            } else {
                throw new Error('Aucune donnée à exporter');
            }
        } catch (error) {
            console.error('Erreur lors de l\'export PDF:', error);
            showToast('Erreur lors de l\'export PDF: ' + error.message, 'error');
        }
    }

    // Fonction pour exporter les chauffeurs vers PDF
    function exportChauffeursToPDF(chauffeurs) {
        try {
            const docDefinition = {
                pageSize: 'A4',
                pageOrientation: 'landscape',
                content: [
                    {
                        text: 'LISTE DES CHAUFFEURS',
                        style: 'header',
                        alignment: 'center',
                        margin: [0, 0, 0, 20]
                    },
                    {
                        table: {
                            headerRows: 1,
                            widths: ['*', 'auto', 'auto', 'auto', 'auto', 'auto'],
                            body: [
                                [
                                    { text: 'Nom', style: 'tableHeader' },
                                    { text: 'Téléphone', style: 'tableHeader' },
                                    { text: 'Permis', style: 'tableHeader' },
                                    { text: 'Expiration', style: 'tableHeader' },
                                    { text: 'Statut', style: 'tableHeader' },
                                    { text: 'Valide', style: 'tableHeader' }
                                ],
                                ...chauffeurs.map(chauffeur => [
                                    chauffeur.name || 'N/A',
                                    chauffeur.phone || 'N/A',
                                    chauffeur.numero_permis || 'N/A',
                                    formatDate(chauffeur.date_expiration_permis),
                                    getStatusText(chauffeur.status),
                                    isPermisExpired(chauffeur.date_expiration_permis) ? 'Non' : 'Oui'
                                ])
                            ]
                        },
                        layout: 'lightHorizontalLines'
                    }
                ],
                styles: {
                    header: {
                        fontSize: 18,
                        bold: true,
                        color: '#f00480'
                    },
                    tableHeader: {
                        bold: true,
                        fontSize: 10,
                        color: 'white',
                        fillColor: '#f00480'
                    }
                },
                defaultStyle: {
                    fontSize: 9
                }
            };

            const fileName = `chauffeurs_${new Date().toISOString().split('T')[0]}.pdf`;
            pdfMake.createPdf(docDefinition).download(fileName);
            
            showToast('Export PDF terminé avec succès', 'success');
        } catch (error) {
            console.error('Erreur lors de la génération PDF:', error);
            showToast('Erreur lors de la génération PDF: ' + error.message, 'error');
        }
    }

    // Fonction pour afficher les notifications toast
    function showToast(message, type = 'info') {
        // Créer le conteneur s'il n'existe pas
        let toastContainer = document.getElementById('toastContainer');
        if (!toastContainer) {
            toastContainer = document.createElement('div');
            toastContainer.id = 'toastContainer';
            toastContainer.className = 'toast-container';
            document.body.appendChild(toastContainer);
        }
        
        const toastId = 'toast-' + Date.now();
        
        const icons = {
            success: 'bi-check-circle-fill',
            error: 'bi-exclamation-triangle-fill',
            warning: 'bi-exclamation-circle-fill',
            info: 'bi-info-circle-fill'
        };
        
        const toast = document.createElement('div');
        toast.id = toastId;
        toast.className = `toast toast-${type}`;
        toast.innerHTML = `
            <i class="bi ${icons[type]} toast-icon"></i>
            <div class="toast-content">
                <div class="toast-title">${type.charAt(0).toUpperCase() + type.slice(1)}</div>
                <div class="toast-message">${message}</div>
            </div>
            <button class="toast-close" onclick="closeToast('${toastId}')">
                <i class="bi-x"></i>
            </button>
        `;
        
        toastContainer.appendChild(toast);
        
        // Trigger animation
        setTimeout(() => toast.classList.add('show'), 100);
        
        // Auto remove after 5 seconds
        setTimeout(() => closeToast(toastId), 5000);
    }

    function closeToast(toastId) {
        const toast = document.getElementById(toastId);
        if (toast) {
            toast.classList.add('hide');
            setTimeout(() => toast.remove(), 300);
        }
    }

    // Configuration des événements
    function setupEventListeners() {
        // Recherche en temps réel
        document.getElementById('searchInput').addEventListener('input', debounce(() => {
            applyFilters();
        }, 500));

        // Filtres
        document.getElementById('statusFilter').addEventListener('change', applyFilters);
        document.getElementById('permisFilter').addEventListener('change', applyFilters);

        // Modal de suppression
        document.getElementById('confirmDeleteBtn').addEventListener('click', confirmDelete);
        document.getElementById('deleteModal').addEventListener('hidden.bs.modal', function() {
            chauffeurToDelete = null;
        });
    }

    // Fonction debounce pour la recherche
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // Initialisation
    document.addEventListener('DOMContentLoaded', function() {
        // Vérifier l'authentification
        const accessToken = getCookie('access_token');
        const connected = getCookie('connected');
        
        if (!connected || !accessToken) {
            window.location.href = '/login';
            return;
        }

        setupEventListeners();
        loadStatistics();
        loadChauffeurs();
    });
</script>

<?php
// Le contenu est directement affiché, le contrôleur récupère avec ob_get_clean()
?>