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
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .btn-primary-custom:hover {
        background-color: #d1036d;
        border-color: #d1036d;
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(240, 4, 128, 0.3);
    }

    .btn-outline-modern {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        font-weight: 500;
        border-radius: 6px;
        transition: all 0.3s ease;
        border: 1px solid #e9ecef;
        background: white;
        color: #6c757d;
        font-size: 0.9rem;
    }

    .btn-outline-modern:hover {
        background-color: #f8f9fa;
        border-color: var(--primary-color);
        color: var(--primary-color);
        transform: translateY(-1px);
        box-shadow: 0 3px 10px rgba(240, 4, 128, 0.3);
    }

    /* Modal de confirmation */
    .confirmation-modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }

    .confirmation-modal.show {
        opacity: 1;
        visibility: visible;
    }

    .confirmation-content {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        max-width: 400px;
        width: 90%;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        transform: scale(0.8);
        transition: transform 0.3s ease;
    }

    .confirmation-modal.show .confirmation-content {
        transform: scale(1);
    }

    .confirmation-header {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }

    .confirmation-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        font-size: 1.2rem;
    }

    .confirmation-icon.warning {
        background-color: #fff3cd;
        color: #856404;
    }

    .confirmation-icon.success {
        background-color: #d4edda;
        color: #155724;
    }

    .confirmation-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--secondary-color);
        margin: 0;
    }

    .confirmation-message {
        color: #666;
        margin-bottom: 1.5rem;
        line-height: 1.5;
    }

    .confirmation-actions {
        display: flex;
        gap: 0.75rem;
        justify-content: flex-end;
    }

    .btn-confirm {
        padding: 0.5rem 1.5rem;
        border: none;
        border-radius: 6px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .btn-confirm-primary {
        background-color: var(--primary-color);
        color: white;
    }

    .btn-confirm-primary:hover {
        background-color: #d1036d;
        transform: translateY(-1px);
    }

    .btn-confirm-secondary {
        background-color: #6c757d;
        color: white;
    }

    .btn-confirm-secondary:hover {
        background-color: #5a6268;
        transform: translateY(-1px);
    }

    .btn-secondary-modern {
        background-color: #6c757d;
        border-color: #6c757d;
        color: white;
        font-weight: 600;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        font-size: 0.9rem;
    }

    .btn-secondary-modern:hover {
        background-color: #5a6268;
        border-color: #545b62;
        color: white;
        transform: translateY(-1px);
    }

    .card-custom {
        border-radius: 12px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        border: none;
    }

    .profile-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, #d1036d 100%);
        color: white;
        padding: 2rem;
        border-radius: 12px 12px 0 0;
    }

    .profile-avatar-large {
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

    .badge-active {
        background-color: #e8f5e9;
        color: #388e3c;
    }

    .badge-inactive {
        background-color: #ffebee;
        color: #d32f2f;
    }

    .badge-verified {
        background-color: #e3f2fd;
        color: #1976d2;
    }

    .badge-unverified {
        background-color: #fff3e0;
        color: #f57c00;
    }

    .badge-locked {
        background-color: #ffebee;
        color: #d32f2f;
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

    .action-buttons {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
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

    /* Responsive */
    @media (max-width: 768px) {
        .profile-header {
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
        <div class="page-header mb-4">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link text-primary-custom" href="/">Tableau de Bord</a></li>
                            <li class="breadcrumb-item"><a class="breadcrumb-link text-primary-custom" href="/utilisateurs">Utilisateurs</a></li>
                            <li class="breadcrumb-item active" id="userNameBreadcrumb">Détails</li>
                        </ol>
                    </nav>
                    <h2 class="mb-0 text-secondary-custom">Détails de l'Utilisateur</h2>
                </div>
                <div class="col-sm-auto">
                    <div class="action-buttons">
                        <button class="btn btn-outline-modern" onclick="window.history.back()">
                            <i class="bi-arrow-left me-1"></i> Retour
                        </button>
                        <button class="btn btn-outline-modern" onclick="window.location.href='/utilisateurs'">
                            <i class="bi-list me-1"></i> Liste
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Loading State -->
        <div class="loading-spinner" id="loadingSpinner">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Chargement...</span>
            </div>
            <p class="mt-3">Chargement des détails de l'utilisateur...</p>
        </div>

        <!-- Error State -->
        <div class="error-message d-none" id="errorMessage">
            <i class="bi-exclamation-triangle-fill"></i>
            <h5>Erreur de chargement</h5>
            <p id="errorText">Une erreur s'est produite lors du chargement des détails de l'utilisateur.</p>
            <button class="btn btn-primary-custom mt-3" onclick="loadUserDetails()">
                <i class="bi-arrow-clockwise me-1"></i> Réessayer
            </button>
        </div>

        <!-- User Details -->
        <div class="d-none" id="userDetails">
            <!-- Profile Header -->
            <div class="card card-custom mb-4">
                <div class="profile-header">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="profile-avatar-large" id="profileAvatar">
                                <!-- Avatar will be populated -->
                            </div>
                        </div>
                        <div class="col">
                            <h2 class="mb-2" id="profileName">-</h2>
                            <p class="mb-1" id="profileEmail">-</p>
                            <p class="mb-0" id="profilePoste">-</p>
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
                        <div class="stat-value" id="statActive">-</div>
                        <div class="stat-label">Compte Actif</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="stat-card">
                        <div class="stat-icon" style="background: linear-gradient(135deg, #007bff, #6610f2);">
                            <i class="bi-envelope-check"></i>
                        </div>
                        <div class="stat-value" id="statEmailVerified">-</div>
                        <div class="stat-label">Email Vérifié</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="stat-card">
                        <div class="stat-icon" style="background: linear-gradient(135deg, #ffc107, #fd7e14);">
                            <i class="bi-clock-history"></i>
                        </div>
                        <div class="stat-value" id="statLastLogin">-</div>
                        <div class="stat-label">Dernière Connexion</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="stat-card">
                        <div class="stat-icon" style="background: linear-gradient(135deg, #6c757d, #495057);">
                            <i class="bi-calendar-plus"></i>
                        </div>
                        <div class="stat-value" id="statMemberSince">-</div>
                        <div class="stat-label">Membre Depuis</div>
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
                                        <div class="info-label">Prénom</div>
                                        <div class="info-value" id="infoFirstname">-</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">Nom de famille</div>
                                        <div class="info-value" id="infoLastname">-</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">Nom d'utilisateur</div>
                                        <div class="info-value" id="infoUsername">-</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">Adresse email</div>
                                        <div class="info-value" id="infoEmail">-</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">Numéro de téléphone</div>
                                        <div class="info-value" id="infoPhone">-</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">Poste/Fonction</div>
                                        <div class="info-value" id="infoPoste">-</div>
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
                            Actions
                        </div>
                        <div class="section-content">
                            <div class="d-grid gap-2">
                                <button class="btn btn-outline-modern" onclick="toggleUserStatus()" id="toggleStatusBtn">
                                    <i class="bi-toggle-on me-2"></i> Changer le statut
                                </button>
                                <button class="btn btn-outline-modern" onclick="unlockUser()" id="unlockBtn" style="display: none;">
                                    <i class="bi-unlock me-2"></i> Déverrouiller le compte
                                </button>
                                <button class="btn btn-outline-modern" onclick="viewActivity()">
                                    <i class="bi-activity me-2"></i> Voir l'activité
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modal de confirmation -->
<div class="confirmation-modal" id="confirmationModal">
    <div class="confirmation-content">
        <div class="confirmation-header">
            <div class="confirmation-icon warning" id="confirmationIcon">
                <i class="bi-exclamation-triangle"></i>
            </div>
            <h3 class="confirmation-title" id="confirmationTitle">Confirmation</h3>
        </div>
        <p class="confirmation-message" id="confirmationMessage">Êtes-vous sûr de vouloir effectuer cette action ?</p>
        <div class="confirmation-actions">
            <button class="btn-confirm btn-confirm-secondary" onclick="hideConfirmation()">Annuler</button>
            <button class="btn-confirm btn-confirm-primary" id="confirmActionBtn">Confirmer</button>
        </div>
    </div>
</div>

<script>
    // Variables globales
    let currentUserData = null;
    let currentUserId = null;
    let pendingAction = null;

    // Fonction pour récupérer un cookie
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
    }

    // Fonctions pour le modal de confirmation
    function showConfirmation(title, message, action, iconType = 'warning') {
        document.getElementById('confirmationTitle').textContent = title;
        document.getElementById('confirmationMessage').textContent = message;
        
        const icon = document.getElementById('confirmationIcon');
        icon.className = `confirmation-icon ${iconType}`;
        
        if (iconType === 'warning') {
            icon.innerHTML = '<i class="bi-exclamation-triangle"></i>';
        } else if (iconType === 'success') {
            icon.innerHTML = '<i class="bi-check-circle"></i>';
        }
        
        pendingAction = action;
        
        const modal = document.getElementById('confirmationModal');
        modal.classList.add('show');
    }

    function hideConfirmation() {
        const modal = document.getElementById('confirmationModal');
        modal.classList.remove('show');
        pendingAction = null;
    }

    function executePendingAction() {
        if (pendingAction) {
            pendingAction();
        }
        hideConfirmation();
    }

    // Fonction pour obtenir les initiales d'un utilisateur
    function getUserInitials(firstname, lastname) {
        const firstInitial = firstname ? firstname.charAt(0) : '';
        const lastInitial = lastname ? lastname.charAt(0) : '';
        return (firstInitial + lastInitial).toUpperCase();
    }

    // Fonction pour formater la date
    function formatDate(dateString) {
        if (!dateString) return '-';
        const date = new Date(dateString);
        return date.toLocaleDateString('fr-FR');
    }

    // Fonction pour formater la date et l'heure
    function formatDateTime(dateString) {
        if (!dateString) return '-';
        const date = new Date(dateString);
        return date.toLocaleString('fr-FR');
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

    // Fonction pour charger les détails de l'utilisateur
    async function loadUserDetails() {
        try {
            showLoading(true);
            hideError();
            
            const accessToken = getCookie('access_token');
            if (!accessToken) {
                throw new Error('Token d\'authentification manquant');
            }

            // Récupérer l'ID de l'utilisateur depuis l'URL
            const pathParts = window.location.pathname.split('/');
            currentUserId = pathParts[pathParts.length - 1];
            
            if (!currentUserId) {
                throw new Error('ID utilisateur manquant');
            }

            const response = await fetch(`/api/users/${currentUserId}`, {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });

            if (!response.ok) {
                if (response.status === 401) {
                    showLoginRequired();
                    return;
                } else if (response.status === 404) {
                    throw new Error('Utilisateur non trouvé');
                }
                throw new Error(`Erreur HTTP: ${response.status}`);
            }

            const data = await response.json();
            
            if (data.success && data.data) {
                currentUserData = data.data;
                displayUserData(currentUserData);
                showUserDetails();
            } else {
                throw new Error(data.message || 'Erreur lors du chargement des détails');
            }

        } catch (error) {
            console.error('Erreur lors du chargement des détails:', error);
            showError('Erreur lors du chargement des détails: ' + error.message);
        } finally {
            showLoading(false);
        }
    }

    // Fonction pour afficher les données de l'utilisateur
    function displayUserData(user) {
        // Header
        const fullName = `${user.firstname || ''} ${user.lastname || ''}`.trim() || 'Utilisateur';
        document.getElementById('userNameBreadcrumb').textContent = fullName;
        document.getElementById('profileName').textContent = fullName;
        document.getElementById('profileEmail').textContent = user.email || 'N/A';
        document.getElementById('profilePoste').textContent = user.poste || 'Non spécifié';
        
        // Avatar
        document.getElementById('profileAvatar').textContent = getUserInitials(user.firstname, user.lastname);
        
        // Statut
        const statusBadge = document.getElementById('statusBadge');
        if (user.is_active) {
            statusBadge.className = 'status-badge badge-active';
            statusBadge.textContent = 'Actif';
        } else {
            statusBadge.className = 'status-badge badge-inactive';
            statusBadge.textContent = 'Inactif';
        }
        
        // Statistiques
        document.getElementById('statActive').textContent = user.is_active ? 'Oui' : 'Non';
        document.getElementById('statEmailVerified').textContent = user.email_verified_at ? 'Oui' : 'Non';
        document.getElementById('statLastLogin').textContent = formatDateTime(user.last_login_at);
        document.getElementById('statMemberSince').textContent = getAnciennete(user.created_at);
        
        // Informations détaillées
        document.getElementById('infoFirstname').textContent = user.firstname || 'N/A';
        document.getElementById('infoLastname').textContent = user.lastname || 'N/A';
        document.getElementById('infoUsername').textContent = user.username || 'N/A';
        document.getElementById('infoEmail').textContent = user.email || 'N/A';
        document.getElementById('infoPhone').textContent = user.phonenumber || 'N/A';
        document.getElementById('infoPoste').textContent = user.poste || 'N/A';

        // Boutons d'action
        const toggleStatusBtn = document.getElementById('toggleStatusBtn');
        const unlockBtn = document.getElementById('unlockBtn');

        if (user.is_active) {
            toggleStatusBtn.innerHTML = '<i class="bi-toggle-off me-2"></i> Désactiver';
            toggleStatusBtn.className = 'btn btn-outline-modern';
        } else {
            toggleStatusBtn.innerHTML = '<i class="bi-toggle-on me-2"></i> Activer';
            toggleStatusBtn.className = 'btn btn-primary-custom';
        }

        if (user.failed_login_attempts > 0) {
            unlockBtn.style.display = 'block';
        } else {
            unlockBtn.style.display = 'none';
        }
    }

    // Fonction pour afficher/masquer le loading
    function showLoading(show) {
        const loadingSpinner = document.getElementById('loadingSpinner');
        const userDetails = document.getElementById('userDetails');
        
        if (show) {
            loadingSpinner.style.display = 'block';
            userDetails.classList.add('d-none');
        } else {
            loadingSpinner.style.display = 'none';
        }
    }

    // Fonction pour afficher les détails de l'utilisateur
    function showUserDetails() {
        const userDetails = document.getElementById('userDetails');
        userDetails.classList.remove('d-none');
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

    // Fonctions d'action
    async function toggleUserStatus() {
        if (!currentUserData) return;

        const action = currentUserData.is_active ? 'désactiver' : 'activer';
        showConfirmation(
            'Changer le statut',
            `Êtes-vous sûr de vouloir ${action} cet utilisateur ?`,
            performToggleStatus,
            'warning'
        );
    }

    async function performToggleStatus() {

        try {
            const accessToken = getCookie('access_token');
            const response = await fetch(`/api/users/${currentUserId}/activate`, {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });

            if (response.ok) {
                showToast(`Utilisateur ${action} avec succès`, 'success');
                loadUserDetails(); // Recharger les données
            } else {
                const error = await response.json();
                throw new Error(error.message || `Erreur lors de l'${action}`);
            }
        } catch (error) {
            console.error(`Erreur lors de l'${action}:`, error);
            showToast(`Erreur lors de l'${action}: ` + error.message, 'error');
        }
    }

    async function unlockUser() {
        showConfirmation(
            'Déverrouiller le compte',
            'Êtes-vous sûr de vouloir déverrouiller ce compte ?',
            performUnlockUser,
            'warning'
        );
    }

    async function performUnlockUser() {

        try {
            const accessToken = getCookie('access_token');
            const response = await fetch(`/api/users/${currentUserId}/unlock`, {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });

            if (response.ok) {
                showToast('Compte déverrouillé avec succès', 'success');
                loadUserDetails(); // Recharger les données
            } else {
                const error = await response.json();
                throw new Error(error.message || 'Erreur lors du déverrouillage');
            }
        } catch (error) {
            console.error('Erreur lors du déverrouillage:', error);
            showToast('Erreur lors du déverrouillage: ' + error.message, 'error');
        }
    }

    function viewActivity() {
        showToast('Fonctionnalité d\'activité à venir', 'info');
    }

    // Fonction pour afficher les notifications toast
    function showToast(message, type = 'info') {
        // Créer le conteneur s'il n'existe pas
        let toastContainer = document.getElementById('toastContainer');
        if (!toastContainer) {
            toastContainer = document.createElement('div');
            toastContainer.id = 'toastContainer';
            toastContainer.className = 'toast-container';
            toastContainer.style.cssText = `
                position: fixed;
                top: 2rem;
                right: 2rem;
                z-index: 10000;
                display: flex;
                flex-direction: column;
                gap: 1rem;
                max-width: 400px;
            `;
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
        toast.style.cssText = `
            background: white;
            border-radius: 12px;
            padding: 1rem 1.25rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            border-left: 4px solid ${type === 'success' ? '#10b981' : type === 'error' ? '#ef4444' : type === 'warning' ? '#f59e0b' : '#3b82f6'};
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            transform: translateX(100%);
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        `;
        toast.innerHTML = `
            <i class="bi ${icons[type]} toast-icon"></i>
            <div class="toast-content">
                <div class="toast-title">${type.charAt(0).toUpperCase() + type.slice(1)}</div>
                <div class="toast-message">${message}</div>
            </div>
            <button class="toast-close" onclick="closeToast('${toastId}')" style="background: none; border: none; font-size: 1rem; color: #9ca3af; cursor: pointer; padding: 0; width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; border-radius: 50%;">
                <i class="bi-x"></i>
            </button>
        `;
        
        toastContainer.appendChild(toast);
        
        // Trigger animation
        setTimeout(() => {
            toast.style.transform = 'translateX(0)';
            toast.style.opacity = '1';
        }, 100);
        
        // Auto remove after 5 seconds
        setTimeout(() => closeToast(toastId), 5000);
    }

    function closeToast(toastId) {
        const toast = document.getElementById(toastId);
        if (toast) {
            toast.style.transform = 'translateX(100%)';
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 300);
        }
    }

    // Initialisation
    document.addEventListener('DOMContentLoaded', function() {
        // Vérifier l'authentification
        const accessToken = getCookie('access_token');
        const connected = getCookie('connected');
        
        if (!connected || !accessToken) {
            showLoginRequired();
            return;
        }
        
        // Event listeners pour le modal
        document.getElementById('confirmActionBtn').addEventListener('click', executePendingAction);
        
        // Fermer le modal en cliquant à l'extérieur
        document.getElementById('confirmationModal').addEventListener('click', function(e) {
            if (e.target === this) {
                hideConfirmation();
            }
        });
        
        // Fermer le modal avec Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                hideConfirmation();
            }
        });
        
        loadUserDetails();
    });

    // Fonction pour afficher le message de connexion requise
    function showLoginRequired() {
        const content = document.querySelector('.content');
        content.innerHTML = `
            <div class="text-center py-5">
                <div class="card card-custom mx-auto" style="max-width: 500px;">
                    <div class="card-body p-5">
                        <i class="bi-person-lock fs-1 text-primary-custom mb-3"></i>
                        <h4 class="text-secondary-custom mb-3">Connexion requise</h4>
                        <p class="text-muted mb-4">
                            Vous devez être connecté pour accéder aux détails de l'utilisateur.
                        </p>
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="/login" class="btn btn-primary-custom">
                                <i class="bi-box-arrow-in-right me-1"></i> Se connecter
                            </a>
                            <a href="/" class="btn btn-outline-modern">
                                <i class="bi-house me-1"></i> Accueil
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }
</script>

<?php
$content = ob_get_clean();
require('./views/layouts/app-layout.php');
?>
