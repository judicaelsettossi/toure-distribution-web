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
        font-weight: 600;
        padding: 0.6rem 1.2rem;
        border-radius: 6px;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.4rem;
        font-size: 0.9rem;
    }

    .btn-primary-custom:hover {
        background-color: #d1036d;
        border-color: #d1036d;
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 3px 10px rgba(240, 4, 128, 0.3);
    }

    .btn-outline-modern {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.4rem;
        padding: 0.6rem 1.2rem;
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

    .page-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        color: white;
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        position: relative;
        overflow: hidden;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: -20%;
        right: -10%;
        width: 100px;
        height: 100px;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
        z-index: 1;
    }

    .page-header .row {
        position: relative;
        z-index: 2;
    }

    .page-header-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.25rem;
        color: white !important;
    }

    .breadcrumb {
        background: none;
        padding: 0;
        margin-bottom: 0.5rem;
        font-size: 0.85rem;
    }

    .breadcrumb-item a {
        color: rgba(255,255,255,0.8) !important;
        text-decoration: none;
    }

    .breadcrumb-item.active {
        color: white !important;
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

    .card-custom {
        border-radius: 12px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        border: none;
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
        .page-header {
            padding: 1.2rem;
        }
        
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
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link text-white" href="/">Tableau de Bord</a></li>
                            <li class="breadcrumb-item active">Mon Profil</li>
                        </ol>
                    </nav>
                    <h1 class="page-header-title">
                        <i class="bi-person-circle me-2"></i>Mon Profil
                    </h1>
                    <p class="mb-0" id="userName">Chargement...</p>
                </div>

                <div class="col-sm-auto">
                    <div class="action-buttons">
                        <button class="btn btn-outline-light" onclick="editProfile()">
                            <i class="bi-pencil me-1"></i> Modifier
                        </button>
                        <button class="btn btn-outline-light" onclick="changePassword()">
                            <i class="bi-key me-1"></i> Changer mot de passe
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
            <p class="mt-3">Chargement de votre profil...</p>
        </div>

        <!-- Error Message -->
        <div class="error-message d-none" id="errorMessage">
            <i class="bi-exclamation-triangle-fill"></i>
            <h5>Erreur de chargement</h5>
            <p id="errorText">Une erreur s'est produite lors du chargement de votre profil.</p>
            <button class="btn btn-primary-custom mt-3" onclick="loadProfileData()">
                <i class="bi-arrow-clockwise me-1"></i> Réessayer
            </button>
        </div>

        <!-- Profile Details -->
        <div class="d-none" id="profileDetails">
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
                            Actions Rapides
                        </div>
                        <div class="section-content">
                            <div class="d-grid gap-2">
                                <button class="btn btn-outline-modern" onclick="editProfile()">
                                    <i class="bi-pencil me-2"></i> Modifier le profil
                                </button>
                                <button class="btn btn-outline-modern" onclick="changePassword()">
                                    <i class="bi-key me-2"></i> Changer le mot de passe
                                </button>
                                <button class="btn btn-outline-modern" onclick="viewActivity()">
                                    <i class="bi-activity me-2"></i> Voir l'activité
                                </button>
                                <button class="btn btn-outline-modern" onclick="logout()">
                                    <i class="bi-box-arrow-right me-2"></i> Se déconnecter
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    // Variables globales
    let currentUserData = null;

    // Fonction pour récupérer un cookie
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
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

    // Fonction pour charger les données du profil
    async function loadProfileData() {
        try {
            showLoading(true);
            hideError();
            
            const accessToken = getCookie('access_token');
            const connected = getCookie('connected');
            
            console.log('Token récupéré:', accessToken ? 'Présent' : 'Absent');
            console.log('Connected:', connected);
            
            if (!accessToken) {
                throw new Error('Token d\'authentification manquant. Veuillez vous reconnecter.');
            }
            
            console.log('Tentative de chargement du profil avec le token:', accessToken.substring(0, 20) + '...');
            
            const response = await fetch('https://toure.gestiem.com/api/auth/profile', {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            console.log('Réponse API:', response.status, response.statusText);
            
            if (!response.ok) {
                const errorText = await response.text();
                console.error('Erreur API:', errorText);
                throw new Error(`Erreur HTTP: ${response.status} - ${response.statusText}`);
            }

            const data = await response.json();
            console.log('Données reçues:', data);
            
            if (data.success && data.data) {
                currentUserData = data.data;
                displayProfileData(currentUserData);
                showProfileDetails();
            } else if (data.user) {
                // Fallback: utiliser directement les données user si elles sont dans data.user
                currentUserData = data.user;
                displayProfileData(currentUserData);
                showProfileDetails();
            } else {
                // Fallback: utiliser les cookies si l'API ne fonctionne pas
                console.log('API ne retourne pas les données attendues, utilisation des cookies');
                loadProfileFromCookies();
            }
        } catch (error) {
            console.error('Erreur lors du chargement du profil:', error);
            console.log('Tentative de chargement depuis les cookies...');
            loadProfileFromCookies();
        } finally {
            showLoading(false);
        }
    }

    // Fonction de fallback pour charger le profil depuis les cookies
    function loadProfileFromCookies() {
        try {
            const userData = {
                user_id: getCookie('user_id'),
                firstname: getCookie('firstname'),
                lastname: getCookie('lastname'),
                username: getCookie('username'),
                email: getCookie('email'),
                phonenumber: '', // Pas stocké dans les cookies
                poste: '', // Pas stocké dans les cookies
                is_active: getCookie('is_active') === '1',
                email_verified: false, // Pas stocké dans les cookies
                last_login_at: getCookie('last_login_at'),
                created_at: '' // Pas stocké dans les cookies
            };

            console.log('Données utilisateur depuis les cookies:', userData);
            
            if (userData.user_id) {
                currentUserData = userData;
                displayProfileData(currentUserData);
                showProfileDetails();
                showToast('Profil chargé depuis les données locales', 'info');
            } else {
                throw new Error('Aucune donnée utilisateur trouvée');
            }
        } catch (error) {
            console.error('Erreur lors du chargement depuis les cookies:', error);
            showError('Impossible de charger le profil. Veuillez vous reconnecter.');
        }
    }

    // Fonction pour afficher les données du profil
    function displayProfileData(user) {
        // Header
        document.getElementById('userName').textContent = `${user.firstname || ''} ${user.lastname || ''}`.trim() || 'Utilisateur';
        document.getElementById('profileName').textContent = `${user.firstname || ''} ${user.lastname || ''}`.trim() || 'Utilisateur';
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
        document.getElementById('statEmailVerified').textContent = user.email_verified ? 'Oui' : 'Non';
        document.getElementById('statLastLogin').textContent = formatDateTime(user.last_login_at);
        document.getElementById('statMemberSince').textContent = getAnciennete(user.created_at);
        
        // Informations détaillées
        document.getElementById('infoFirstname').textContent = user.firstname || 'N/A';
        document.getElementById('infoLastname').textContent = user.lastname || 'N/A';
        document.getElementById('infoUsername').textContent = user.username || 'N/A';
        document.getElementById('infoEmail').textContent = user.email || 'N/A';
        document.getElementById('infoPhone').textContent = user.phonenumber || 'N/A';
        document.getElementById('infoPoste').textContent = user.poste || 'N/A';
    }

    // Fonction pour afficher/masquer le loading
    function showLoading(show) {
        const loadingSpinner = document.getElementById('loadingSpinner');
        const profileDetails = document.getElementById('profileDetails');
        
        if (show) {
            loadingSpinner.style.display = 'block';
            profileDetails.classList.add('d-none');
        } else {
            loadingSpinner.style.display = 'none';
        }
    }

    // Fonction pour afficher les détails du profil
    function showProfileDetails() {
        const profileDetails = document.getElementById('profileDetails');
        profileDetails.classList.remove('d-none');
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

    // Fonction pour modifier le profil
    function editProfile() {
        showToast('Fonctionnalité de modification à venir', 'info');
    }

    // Fonction pour changer le mot de passe
    function changePassword() {
        showToast('Fonctionnalité de changement de mot de passe à venir', 'info');
    }

    // Fonction pour voir l'activité
    function viewActivity() {
        showToast('Fonctionnalité d\'activité à venir', 'info');
    }

    // Fonction pour se déconnecter
    function logout() {
        if (confirm('Êtes-vous sûr de vouloir vous déconnecter ?')) {
            // Supprimer les cookies
            document.cookie = 'connected=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
            document.cookie = 'access_token=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
            
            // Rediriger vers la page de connexion
            window.location.href = '/login';
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

    // Initialisation
    document.addEventListener('DOMContentLoaded', function() {
        // Vérifier l'authentification
        const accessToken = getCookie('access_token');
        const connected = getCookie('connected');
        
        if (!connected || !accessToken) {
            window.location.href = '/login';
            return;
        }

        loadProfileData();
    });
</script>

<?php
// Le contenu est directement affiché, le contrôleur récupère avec ob_get_clean()
?>
