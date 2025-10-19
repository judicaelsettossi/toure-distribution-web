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

    .camion-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, #d1036d 100%);
        color: white;
        padding: 2rem;
        border-radius: 12px 12px 0 0;
    }

    .camion-avatar-large {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        font-weight: 700;
        background: white;
        color: var(--primary-color);
        border: 4px solid rgba(255, 255, 255, 0.3);
    }

    .info-item {
        padding: 1rem;
        border-bottom: 1px solid #e9ecef;
    }

    .info-item:last-child {
        border-bottom: none;
    }

    .info-label {
        font-weight: 600;
        color: #6c757d;
        font-size: 0.875rem;
        margin-bottom: 0.25rem;
    }

    .info-value {
        font-size: 1rem;
        color: #212529;
    }

    .status-badge {
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.875rem;
    }

    .status-disponible {
        background-color: #e8f5e9;
        color: #388e3c;
    }

    .status-en-mission {
        background-color: #e3f2fd;
        color: #1976d2;
    }

    .status-en-maintenance {
        background-color: #fff3e0;
        color: #f57c00;
    }

    .status-hors-service {
        background-color: #ffebee;
        color: #d32f2f;
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }

    .btn-action {
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 500;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.2s ease;
    }

    .btn-edit {
        background-color: #e3f2fd;
        color: #1976d2;
        border: 1px solid #bbdefb;
    }

    .btn-edit:hover {
        background-color: #bbdefb;
        color: #0d47a1;
    }

    .btn-delete {
        background-color: #ffebee;
        color: #d32f2f;
        border: 1px solid #ffcdd2;
    }

    .btn-delete:hover {
        background-color: #ffcdd2;
        color: #b71c1c;
    }

    .btn-back {
        background-color: #f5f5f5;
        color: #616161;
        border: 1px solid #e0e0e0;
    }

    .btn-back:hover {
        background-color: #eeeeee;
        color: #424242;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: white;
        border-radius: 12px;
        padding: 1rem;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        border: 1px solid #e9ecef;
        text-align: center;
        height: 120px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .stat-icon {
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

    .stat-icon.primary {
        background: linear-gradient(135deg, var(--primary-color) 0%, #d1036d 100%);
    }

    .stat-icon.success {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }

    .stat-icon.warning {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    }

    .stat-icon.info {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
    }

    .stat-value {
        font-size: 1.2rem;
        font-weight: 700;
        color: #212529;
        margin-bottom: 0.25rem;
    }

    .stat-label {
        font-size: 0.8rem;
        color: #6c757d;
        font-weight: 500;
    }

    .loading-spinner {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 200px;
    }

    .error-message {
        text-align: center;
        padding: 2rem;
        color: #dc3545;
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
        font-size: 1.25rem;
        margin-top: 0.125rem;
    }

    .toast-content {
        flex: 1;
    }

    .toast-title {
        font-weight: 600;
        font-size: 0.875rem;
        margin-bottom: 0.25rem;
        color: #1f2937;
    }

    .toast-message {
        font-size: 0.8rem;
        color: #6b7280;
        line-height: 1.4;
    }

    .toast-close {
        position: absolute;
        top: 0.5rem;
        right: 0.5rem;
        background: none;
        border: none;
        font-size: 1rem;
        color: #9ca3af;
        cursor: pointer;
        padding: 0;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: all 0.2s ease;
    }

    .toast-close:hover {
        background-color: rgba(0,0,0,0.1);
        color: #374151;
    }

    @media (max-width: 768px) {
        .action-buttons {
            flex-direction: column;
        }
        
        .btn-action {
            justify-content: center;
        }
        
        .stats-grid {
            grid-template-columns: 1fr;
        }
    }

    /* Modal de suppression */
    .modal-content {
        border-radius: 12px;
        border: none;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    .modal-header {
        padding: 1.5rem 1.5rem 0 1.5rem;
    }

    .modal-body {
        padding: 0 1.5rem 1.5rem 1.5rem;
    }

    .modal-footer {
        padding: 0 1.5rem 1.5rem 1.5rem;
    }

    .modal-title {
        font-weight: 600;
        font-size: 1.1rem;
    }

    .btn-close {
        background: none;
        border: none;
        font-size: 1.25rem;
        opacity: 0.5;
        transition: opacity 0.2s ease;
    }

    .btn-close:hover {
        opacity: 0.75;
    }

    #confirmDeleteBtn {
        background-color: #dc3545;
        border-color: #dc3545;
        font-weight: 500;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        transition: all 0.2s ease;
    }

    #confirmDeleteBtn:hover {
        background-color: #c82333;
        border-color: #bd2130;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        font-weight: 500;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        transition: all 0.2s ease;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
        transform: translateY(-1px);
    }
</style>

<main id="content" role="main" class="main font-public-sans">
    <div class="content container-fluid">
        <!-- Loading State -->
        <div id="loadingState" class="loading-spinner">
            <div class="text-center">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Chargement...</span>
                </div>
                <p class="mt-2 text-muted">Chargement des détails du camion...</p>
            </div>
        </div>

        <!-- Error State -->
        <div id="errorState" class="error-message" style="display: none;">
            <i class="bi-exclamation-triangle-fill text-danger" style="font-size: 3rem;"></i>
            <h4 class="mt-3">Erreur de chargement</h4>
            <p id="errorMessage">Impossible de charger les détails du camion.</p>
            <button class="btn btn-primary-custom mt-2" onclick="loadCamionData()">
                <i class="bi-arrow-clockwise me-1"></i> Réessayer
            </button>
        </div>

        <!-- Main Content -->
        <div id="mainContent" style="display: none;">
            <!-- Page Header -->
            <div class="page-header mb-4">
                <div class="row align-items-center">
                    <div class="col-sm mb-2 mb-sm-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-no-gutter">
                                <li class="breadcrumb-item"><a class="breadcrumb-link text-primary-custom" href="/">Tableau de Bord</a></li>
                                <li class="breadcrumb-item"><a class="breadcrumb-link text-primary-custom" href="/camions">Camions</a></li>
                                <li class="breadcrumb-item active" id="breadcrumbCamion">Détails</li>
                            </ol>
                        </nav>
                        <h1 class="page-header-title text-secondary-custom">
                            <i class="bi-truck me-2"></i>Détails du Camion
                        </h1>
                        <p class="text-muted mb-0" id="pageSubtitle">Informations détaillées du véhicule</p>
                    </div>

                    <div class="col-sm-auto">
                        <div class="action-buttons">
                            <a class="btn-action btn-back" href="/camions">
                                <i class="bi-arrow-left"></i> Retour à la liste
                            </a>
                            <a class="btn-action btn-edit" href="#" id="editLink">
                                <i class="bi-pencil"></i> Modifier
                            </a>
                            <button class="btn-action btn-delete" onclick="deleteCamion()">
                                <i class="bi-trash"></i> Supprimer
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="stats-grid" id="statsGrid">
                <!-- Stats will be populated here -->
            </div>

            <!-- Main Info Card -->
            <div class="card card-custom">
                <div class="camion-header">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="camion-avatar-large" id="camionAvatar">
                                <!-- Avatar will be populated here -->
                            </div>
                        </div>
                        <div class="col">
                            <h2 class="mb-1" id="camionName">Chargement...</h2>
                            <p class="mb-0 opacity-75" id="camionId">ID: Chargement...</p>
                            <div class="mt-2">
                                <span class="status-badge" id="statusBadge">Chargement...</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="row">
                        <!-- Informations Générales -->
                        <div class="col-md-6">
                            <div class="p-3">
                                <h5 class="text-secondary-custom mb-3">
                                    <i class="bi-info-circle me-2"></i>Informations Générales
                                </h5>
                                
                                <div class="info-item">
                                    <div class="info-label">Numéro d'immatriculation</div>
                                    <div class="info-value" id="numeroImmat">-</div>
                                </div>
                                
                                <div class="info-item">
                                    <div class="info-label">Marque</div>
                                    <div class="info-value" id="marque">-</div>
                                </div>
                                
                                <div class="info-item">
                                    <div class="info-label">Modèle</div>
                                    <div class="info-value" id="modele">-</div>
                                </div>
                                
                                <div class="info-item">
                                    <div class="info-label">Capacité</div>
                                    <div class="info-value" id="capacite">-</div>
                                </div>
                            </div>
                        </div>

                        <!-- Informations Techniques -->
                        <div class="col-md-6">
                            <div class="p-3">
                                <h5 class="text-secondary-custom mb-3">
                                    <i class="bi-gear me-2"></i>Informations Techniques
                                </h5>
                                
                                <div class="info-item">
                                    <div class="info-label">Statut</div>
                                    <div class="info-value" id="status">-</div>
                                </div>
                                
                                <div class="info-item">
                                    <div class="info-label">Date de création</div>
                                    <div class="info-value" id="createdAt">-</div>
                                </div>
                                
                                <div class="info-item">
                                    <div class="info-label">Dernière modification</div>
                                    <div class="info-value" id="updatedAt">-</div>
                                </div>
                                
                                <div class="info-item">
                                    <div class="info-label">Note</div>
                                    <div class="info-value" id="note">-</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Toast Container -->
<div id="toastContainer"></div>

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
                        <h6 class="mb-2">Êtes-vous sûr de vouloir supprimer ce camion ?</h6>
                        <p class="text-muted mb-3">
                            Cette action est <strong>irréversible</strong>. Le camion sera supprimé définitivement du système.
                        </p>
                        <div class="bg-light rounded p-3">
                            <div class="d-flex align-items-center">
                                <div class="camion-avatar me-3" id="modalCamionAvatar" style="width: 40px; height: 40px; font-size: 0.875rem;">
                                    <!-- Avatar will be populated -->
                                </div>
                                <div>
                                    <div class="fw-semibold" id="modalCamionName">-</div>
                                    <small class="text-muted" id="modalCamionDetails">-</small>
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
    let currentCamionId = null;
    let camionToDelete = null;

    // Fonction pour récupérer un cookie
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
    }

    // Fonction pour extraire l'ID du camion de l'URL
    function getCamionIdFromUrl() {
        const path = window.location.pathname;
        const pathParts = path.split('/');
        // URL format: /camion/{id}
        return pathParts[pathParts.length - 1];
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Vérifier l'authentification
        const accessToken = getCookie('access_token');
        const connected = getCookie('connected');
        
        if (!connected || !accessToken) {
            window.location.href = '/login';
            return;
        }

        currentCamionId = getCamionIdFromUrl();
        if (currentCamionId) {
            loadCamionData();
            setupModalEventListeners();
        } else {
            showError('ID du camion non trouvé dans l\'URL');
        }
    });

    async function loadCamionData() {
        try {
            showLoading();
            
            const accessToken = getCookie('access_token');
            const response = await fetch(`https://toure.gestiem.com/api/camions/${currentCamionId}`, {
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
            console.log('Données du camion:', result);

            if (result.success && result.data) {
                displayCamionData(result.data);
                hideLoading();
                showMainContent();
            } else {
                throw new Error('Structure de réponse invalide');
            }

        } catch (error) {
            console.error('Erreur lors du chargement des détails du camion:', error);
            hideLoading();
            showError('Erreur lors du chargement des détails du camion: ' + error.message);
        }
    }

    function displayCamionData(camion) {
        // Mise à jour des informations principales
        document.getElementById('breadcrumbCamion').textContent = camion.numero_immat;
        document.getElementById('pageSubtitle').textContent = `Informations détaillées du véhicule ${camion.numero_immat}`;
        
        // Avatar
        const avatar = document.getElementById('camionAvatar');
        avatar.textContent = getCamionInitials(camion.numero_immat);
        
        // Nom et ID
        document.getElementById('camionName').textContent = camion.numero_immat;
        document.getElementById('camionId').textContent = `ID: ${camion.camion_id}`;
        
        // Statut
        const statusBadge = document.getElementById('statusBadge');
        statusBadge.textContent = getStatusName(camion.status);
        statusBadge.className = `status-badge status-${camion.status.replace('_', '-')}`;
        
        // Informations détaillées
        document.getElementById('numeroImmat').textContent = camion.numero_immat || '-';
        document.getElementById('marque').textContent = camion.marque || '-';
        document.getElementById('modele').textContent = camion.modele || '-';
        document.getElementById('capacite').textContent = camion.capacite ? `${camion.capacite} tonnes` : '-';
        document.getElementById('status').textContent = getStatusName(camion.status);
        document.getElementById('createdAt').textContent = formatDate(camion.created_at);
        document.getElementById('updatedAt').textContent = formatDate(camion.updated_at);
        document.getElementById('note').textContent = camion.note || 'Aucune note';
        
        // Lien de modification
        document.getElementById('editLink').href = `/camion/${camion.camion_id}/modifier`;
        
        // Mise à jour des statistiques
        updateStats(camion);
    }

    function getCamionInitials(numeroImmat) {
        return numeroImmat.substring(0, 2).toUpperCase();
    }

    function getStatusName(status) {
        const statusMap = {
            'disponible': 'Disponible',
            'en_mission': 'En Mission',
            'en_maintenance': 'En Maintenance',
            'hors_service': 'Hors Service'
        };
        return statusMap[status] || 'Inconnu';
    }

    function formatDate(dateString) {
        if (!dateString) return '-';
        const date = new Date(dateString);
        return date.toLocaleDateString('fr-FR', {
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        });
    }

    function updateStats(camion) {
        const statsGrid = document.getElementById('statsGrid');
        
        const stats = [
            {
                icon: 'bi-truck',
                iconClass: 'primary',
                value: camion.numero_immat,
                label: 'Immatriculation'
            },
            {
                icon: 'bi-building',
                iconClass: 'info',
                value: camion.marque || 'N/A',
                label: 'Marque'
            },
            {
                icon: 'bi-speedometer2',
                iconClass: 'success',
                value: camion.capacite ? `${camion.capacite} t` : 'N/A',
                label: 'Capacité'
            },
            {
                icon: 'bi-check-circle',
                iconClass: 'warning',
                value: getStatusName(camion.status),
                label: 'Statut'
            }
        ];

        statsGrid.innerHTML = stats.map(stat => `
            <div class="stat-card">
                <div class="stat-icon ${stat.iconClass}">
                    <i class="bi ${stat.icon}"></i>
                </div>
                <div class="stat-value">${stat.value}</div>
                <div class="stat-label">${stat.label}</div>
            </div>
        `).join('');
    }

    function showLoading() {
        document.getElementById('loadingState').style.display = 'flex';
        document.getElementById('errorState').style.display = 'none';
        document.getElementById('mainContent').style.display = 'none';
    }

    function hideLoading() {
        document.getElementById('loadingState').style.display = 'none';
    }

    function showError(message) {
        document.getElementById('errorMessage').textContent = message;
        document.getElementById('errorState').style.display = 'block';
        document.getElementById('mainContent').style.display = 'none';
    }

    function showMainContent() {
        document.getElementById('mainContent').style.display = 'block';
    }

    function setupModalEventListeners() {
        // Bouton de confirmation de suppression
        document.getElementById('confirmDeleteBtn').addEventListener('click', confirmDelete);
        
        // Réinitialiser les données quand la modal se ferme
        document.getElementById('deleteModal').addEventListener('hidden.bs.modal', function() {
            camionToDelete = null;
        });
    }

    function deleteCamion() {
        // Remplir la modal avec les informations du camion
        const camionName = document.getElementById('camionName').textContent;
        const camionId = document.getElementById('camionId').textContent;
        
        document.getElementById('modalCamionAvatar').textContent = getCamionInitials(camionName);
        document.getElementById('modalCamionName').textContent = camionName;
        document.getElementById('modalCamionDetails').textContent = camionId;
        
        // Afficher la modal
        const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
        modal.show();
    }

    async function confirmDelete() {
        try {
            const accessToken = getCookie('access_token');
            const response = await fetch(`https://toure.gestiem.com/api/camions/${currentCamionId}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            if (!response.ok) {
                throw new Error(`Erreur HTTP: ${response.status}`);
            }

            // Fermer la modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('deleteModal'));
            modal.hide();

            showToast('Camion supprimé avec succès', 'success');
            
            // Rediriger vers la liste après 2 secondes
            setTimeout(() => {
                window.location.href = '/camions';
            }, 2000);

        } catch (error) {
            console.error('Erreur lors de la suppression:', error);
            showToast('Erreur lors de la suppression: ' + error.message, 'error');
        }
    }

    // Toast notifications
    function showToast(message, type = 'info') {
        const toastContainer = document.getElementById('toastContainer');
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
</script>

<?php
// Le contenu est directement affiché, le contrôleur récupère avec ob_get_clean()
?>