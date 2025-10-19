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

    .chauffeur-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, #d1036d 100%);
        color: white;
        padding: 2rem;
        border-radius: 12px 12px 0 0;
    }

    .chauffeur-avatar-large {
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

    .action-buttons {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
    }

    .btn-outline-modern {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        font-weight: 500;
        border-radius: 8px;
        transition: all 0.3s ease;
        border: 1px solid #e9ecef;
        background: white;
        color: #6c757d;
    }

    .btn-outline-modern:hover {
        background-color: #f8f9fa;
        border-color: var(--primary-color);
        color: var(--primary-color);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(240, 4, 128, 0.3);
    }

    .btn-danger-modern {
        background-color: #dc3545;
        border-color: #dc3545;
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .btn-danger-modern:hover {
        background-color: #c82333;
        border-color: #bd2130;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3);
    }

    .info-section {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }

    .section-title {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        padding: 1.5rem 2rem;
        border-bottom: 1px solid #e9ecef;
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--secondary-color);
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .section-content {
        padding: 2rem;
    }

    .loading-spinner {
        text-align: center;
        padding: 3rem;
    }

    .error-message {
        text-align: center;
        padding: 3rem;
        color: #dc3545;
    }

    .error-message i {
        font-size: 3rem;
        margin-bottom: 1rem;
        color: #dc3545;
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
        
        .chauffeur-header {
            padding: 1.5rem;
        }
        
        .section-content {
            padding: 1.5rem;
        }
        
        .action-buttons {
            flex-direction: column;
        }
        
        .stat-card {
            margin-bottom: 1rem;
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
                            <li class="breadcrumb-item"><a class="breadcrumb-link text-white" href="/chauffeurs">Chauffeurs</a></li>
                            <li class="breadcrumb-item active">Détails du Chauffeur</li>
                        </ol>
                    </nav>
                    <h1 class="page-header-title">
                        <i class="bi-person-badge me-2"></i>Détails du Chauffeur
                    </h1>
                    <p class="mb-0" id="chauffeurName">Chargement...</p>
                </div>

                <div class="col-sm-auto">
                    <div class="action-buttons">
                        <a class="btn btn-outline-light" href="/chauffeurs">
                            <i class="bi-arrow-left me-1"></i> Retour
                        </a>
                        <button class="btn btn-outline-light" onclick="editChauffeur()">
                            <i class="bi-pencil me-1"></i> Modifier
                        </button>
                        <button class="btn btn-outline-light" onclick="toggleStatus()">
                            <i class="bi-toggle-on me-1"></i> Changer Statut
                        </button>
                        <button class="btn btn-outline-light" onclick="deleteChauffeur()">
                            <i class="bi-trash me-1"></i> Supprimer
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Loading Spinner -->
        <div class="loading-spinner" id="loadingSpinner">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Chargement...</span>
            </div>
            <p class="mt-3">Chargement des détails du chauffeur...</p>
        </div>

        <!-- Error Message -->
        <div class="error-message d-none" id="errorMessage">
            <i class="bi-exclamation-triangle-fill"></i>
            <h5>Erreur de chargement</h5>
            <p id="errorText">Une erreur s'est produite lors du chargement des détails du chauffeur.</p>
            <button class="btn btn-primary-custom mt-3" onclick="loadChauffeurData()">
                <i class="bi-arrow-clockwise me-1"></i> Réessayer
            </button>
        </div>

        <!-- Chauffeur Details -->
        <div class="d-none" id="chauffeurDetails">
            <!-- Chauffeur Header -->
            <div class="card card-custom mb-4">
                <div class="chauffeur-header">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="chauffeur-avatar-large" id="chauffeurAvatar">
                                <!-- Avatar will be populated -->
                            </div>
                        </div>
                        <div class="col">
                            <h2 class="mb-2" id="chauffeurNameHeader">-</h2>
                            <p class="mb-1" id="chauffeurPhone">-</p>
                            <p class="mb-0" id="chauffeurId">ID: -</p>
                        </div>
                        <div class="col-auto">
                            <div class="text-end">
                                <div class="status-badge" id="statusBadge">
                                    <!-- Status badge will be populated -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics -->
            <div class="row mb-4">
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="stat-card">
                        <div class="stat-icon" style="background: linear-gradient(135deg, #28a745, #20c997);">
                            <i class="bi-person-check"></i>
                        </div>
                        <div class="stat-value" id="statActif">-</div>
                        <div class="stat-label">Statut Actif</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="stat-card">
                        <div class="stat-icon" style="background: linear-gradient(135deg, #007bff, #6610f2);">
                            <i class="bi-card-text"></i>
                        </div>
                        <div class="stat-value" id="statPermis">-</div>
                        <div class="stat-label">Permis Valide</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="stat-card">
                        <div class="stat-icon" style="background: linear-gradient(135deg, #ffc107, #fd7e14);">
                            <i class="bi-calendar-check"></i>
                        </div>
                        <div class="stat-value" id="statExpiration">-</div>
                        <div class="stat-label">Jours Restants</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="stat-card">
                        <div class="stat-icon" style="background: linear-gradient(135deg, #6c757d, #495057);">
                            <i class="bi-clock"></i>
                        </div>
                        <div class="stat-value" id="statAnciennete">-</div>
                        <div class="stat-label">Ancienneté</div>
                    </div>
                </div>
            </div>

            <!-- Informations Personnelles -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="info-section">
                        <div class="section-title">
                            <i class="bi-person-lines-fill"></i>
                            Informations Personnelles
                        </div>
                        <div class="section-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">Nom complet</div>
                                        <div class="info-value" id="infoName">-</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">Téléphone</div>
                                        <div class="info-value" id="infoPhone">-</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">Numéro de permis</div>
                                        <div class="info-value" id="infoPermis">-</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">Date d'expiration du permis</div>
                                        <div class="info-value" id="infoExpiration">-</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">Statut</div>
                                        <div class="info-value" id="infoStatus">-</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">Date de création</div>
                                        <div class="info-value" id="infoCreated">-</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="info-section">
                        <div class="section-title">
                            <i class="bi-gear"></i>
                            Actions Rapides
                        </div>
                        <div class="section-content">
                            <div class="d-grid gap-2">
                                <button class="btn btn-outline-modern" onclick="editChauffeur()">
                                    <i class="bi-pencil me-2"></i> Modifier les informations
                                </button>
                                <button class="btn btn-outline-modern" onclick="toggleStatus()">
                                    <i class="bi-toggle-on me-2"></i> Changer le statut
                                </button>
                                <button class="btn btn-outline-modern" onclick="viewHistory()">
                                    <i class="bi-clock-history me-2"></i> Voir l'historique
                                </button>
                                <button class="btn btn-danger-modern" onclick="deleteChauffeur()">
                                    <i class="bi-trash me-2"></i> Supprimer le chauffeur
                                </button>
                            </div>
                        </div>
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
    let currentChauffeurId = null;
    let currentChauffeurData = null;

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

    // Fonction pour calculer les jours restants
    function getDaysUntilExpiration(dateString) {
        if (!dateString) return 0;
        const expirationDate = new Date(dateString);
        const today = new Date();
        const diffTime = expirationDate - today;
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        return diffDays;
    }

    // Fonction pour calculer l'ancienneté
    function getAnciennete(dateString) {
        if (!dateString) return '0 jour';
        const createdDate = new Date(dateString);
        const today = new Date();
        const diffTime = today - createdDate;
        const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));
        
        if (diffDays < 30) {
            return `${diffDays} jour${diffDays > 1 ? 's' : ''}`;
        } else if (diffDays < 365) {
            const months = Math.floor(diffDays / 30);
            return `${months} mois`;
        } else {
            const years = Math.floor(diffDays / 365);
            const remainingMonths = Math.floor((diffDays % 365) / 30);
            return `${years} an${years > 1 ? 's' : ''}${remainingMonths > 0 ? ` ${remainingMonths} mois` : ''}`;
        }
    }

    // Fonction pour charger les données du chauffeur
    async function loadChauffeurData() {
        try {
            showLoading(true);
            hideError();
            
            // Extraire l'ID du chauffeur depuis l'URL
            const pathParts = window.location.pathname.split('/');
            currentChauffeurId = pathParts[pathParts.length - 1];
            
            if (!currentChauffeurId) {
                throw new Error('ID du chauffeur non trouvé dans l\'URL');
            }

            const accessToken = getCookie('access_token');
            const response = await fetch(`https://toure.gestiem.com/api/chauffeurs/${currentChauffeurId}`, {
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
                currentChauffeurData = data.data;
                displayChauffeurData(currentChauffeurData);
                showChauffeurDetails();
            } else {
                throw new Error(data.message || 'Erreur lors du chargement des données');
            }
        } catch (error) {
            console.error('Erreur lors du chargement du chauffeur:', error);
            showError('Erreur lors du chargement du chauffeur: ' + error.message);
        } finally {
            showLoading(false);
        }
    }

    // Fonction pour afficher les données du chauffeur
    function displayChauffeurData(chauffeur) {
        // Header
        document.getElementById('chauffeurName').textContent = chauffeur.name || 'N/A';
        document.getElementById('chauffeurNameHeader').textContent = chauffeur.name || 'N/A';
        document.getElementById('chauffeurPhone').textContent = chauffeur.phone || 'N/A';
        document.getElementById('chauffeurId').textContent = `ID: ${chauffeur.chauffeur_id}`;
        
        // Avatar
        document.getElementById('chauffeurAvatar').textContent = getChauffeurInitials(chauffeur.name || 'N/A');
        
        // Statut
        const statusBadge = document.getElementById('statusBadge');
        statusBadge.className = `status-badge ${getStatusBadgeClass(chauffeur.status)}`;
        statusBadge.textContent = getStatusText(chauffeur.status);
        
        // Statistiques
        document.getElementById('statActif').textContent = chauffeur.is_actif ? 'Oui' : 'Non';
        document.getElementById('statPermis').textContent = chauffeur.is_permis_expire ? 'Non' : 'Oui';
        
        const daysUntilExpiration = getDaysUntilExpiration(chauffeur.date_expiration_permis);
        document.getElementById('statExpiration').textContent = daysUntilExpiration > 0 ? `${daysUntilExpiration} jours` : 'Expiré';
        
        const anciennete = getAnciennete(chauffeur.created_at);
        document.getElementById('statAnciennete').textContent = anciennete;
        
        // Informations détaillées
        document.getElementById('infoName').textContent = chauffeur.name || 'N/A';
        document.getElementById('infoPhone').textContent = chauffeur.phone || 'N/A';
        document.getElementById('infoPermis').textContent = chauffeur.numero_permis || 'N/A';
        document.getElementById('infoExpiration').textContent = formatDate(chauffeur.date_expiration_permis);
        document.getElementById('infoStatus').textContent = getStatusText(chauffeur.status);
        document.getElementById('infoCreated').textContent = formatDate(chauffeur.created_at);
    }

    // Fonction pour afficher/masquer le loading
    function showLoading(show) {
        const loadingSpinner = document.getElementById('loadingSpinner');
        const chauffeurDetails = document.getElementById('chauffeurDetails');
        
        if (show) {
            loadingSpinner.style.display = 'block';
            chauffeurDetails.classList.add('d-none');
        } else {
            loadingSpinner.style.display = 'none';
        }
    }

    // Fonction pour afficher les détails du chauffeur
    function showChauffeurDetails() {
        const chauffeurDetails = document.getElementById('chauffeurDetails');
        chauffeurDetails.classList.remove('d-none');
    }

    // Fonction pour afficher une erreur
    function showError(message) {
        const errorMessage = document.getElementById('errorMessage');
        const errorText = document.getElementById('errorText');
        errorText.textContent = message;
        errorMessage.classList.remove('d-none');
    }

    // Fonction pour masquer l'erreur
    function hideError() {
        const errorMessage = document.getElementById('errorMessage');
        errorMessage.classList.add('d-none');
    }

    // Fonction pour modifier le chauffeur
    function editChauffeur() {
        if (currentChauffeurId) {
            window.location.href = `/chauffeur/${currentChauffeurId}/modifier`;
        }
    }

    // Fonction pour changer le statut
    async function toggleStatus() {
        if (!currentChauffeurData) return;
        
        try {
            const newStatus = currentChauffeurData.status === 'actif' ? 'inactif' : 'actif';
            const accessToken = getCookie('access_token');
            
            const response = await fetch(`https://toure.gestiem.com/api/chauffeurs/${currentChauffeurId}`, {
                method: 'PUT',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    ...currentChauffeurData,
                    status: newStatus
                })
            });

            if (!response.ok) {
                throw new Error(`Erreur HTTP: ${response.status}`);
            }

            const data = await response.json();
            
            if (data.success) {
                showToast(`Statut changé en ${getStatusText(newStatus)}`, 'success');
                loadChauffeurData(); // Recharger les données
            } else {
                throw new Error(data.message || 'Erreur lors du changement de statut');
            }
        } catch (error) {
            console.error('Erreur lors du changement de statut:', error);
            showToast('Erreur lors du changement de statut: ' + error.message, 'error');
        }
    }

    // Fonction pour supprimer le chauffeur
    function deleteChauffeur() {
        if (!currentChauffeurData) return;
        
        document.getElementById('modalChauffeurAvatar').textContent = getChauffeurInitials(currentChauffeurData.name);
        document.getElementById('modalChauffeurName').textContent = currentChauffeurData.name;
        document.getElementById('modalChauffeurDetails').textContent = `ID: ${currentChauffeurData.chauffeur_id}`;
        
        const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
        modal.show();
    }

    // Fonction pour confirmer la suppression
    async function confirmDelete() {
        if (!currentChauffeurId) return;
        
        try {
            const accessToken = getCookie('access_token');
            const response = await fetch(`https://toure.gestiem.com/api/chauffeurs/${currentChauffeurId}`, {
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
                setTimeout(() => {
                    window.location.href = '/chauffeurs';
                }, 2000);
            } else {
                throw new Error(data.message || 'Erreur lors de la suppression');
            }
        } catch (error) {
            console.error('Erreur lors de la suppression:', error);
            showToast('Erreur lors de la suppression: ' + error.message, 'error');
        } finally {
            const modal = bootstrap.Modal.getInstance(document.getElementById('deleteModal'));
            modal.hide();
        }
    }

    // Fonction pour voir l'historique
    function viewHistory() {
        showToast('Fonctionnalité d\'historique à venir', 'info');
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
        // Modal de suppression
        document.getElementById('confirmDeleteBtn').addEventListener('click', confirmDelete);
        document.getElementById('deleteModal').addEventListener('hidden.bs.modal', function() {
            // Reset modal state if needed
        });
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
        loadChauffeurData();
    });
</script>

<?php
// Le contenu est directement affiché, le contrôleur récupère avec ob_get_clean()
?>