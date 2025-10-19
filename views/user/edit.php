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

    .btn-secondary-modern {
        background-color: #6c757d;
        border-color: #6c757d;
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

    .btn-secondary-modern:hover {
        background-color: #5a6268;
        border-color: #545b62;
        color: white;
        transform: translateY(-1px);
    }

    .form-section {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        margin-bottom: 2rem;
        overflow: hidden;
        border: 1px solid #e9ecef;
    }

    .form-section .card-body {
        padding: 2rem;
    }

    .section-header {
        background: linear-gradient(135deg, var(--light-primary) 0%, #f8f9fa 100%);
        border-radius: 8px 8px 0 0;
        padding: 1rem 1.5rem;
        border-bottom: 1px solid #e9ecef;
    }

    .section-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--secondary-color);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .form-group-modern {
        margin-bottom: 1.5rem;
    }

    .form-label-modern {
        font-weight: 600;
        color: #495057;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .label-required::after {
        content: " *";
        color: #dc3545;
    }

    .form-control-modern {
        border: 1px solid #e9ecef;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        background-color: #fff;
        width: 100%;
    }

    .form-control-modern:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(240, 4, 128, 0.25);
        background-color: #fff;
        outline: none;
    }

    .form-control-modern.is-invalid {
        border-color: #dc3545;
    }

    .invalid-feedback {
        display: block;
        width: 100%;
        margin-top: 0.25rem;
        font-size: 0.8rem;
        color: #dc3545;
    }

    .form-check-modern {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .form-check-input-modern {
        width: 1.25rem;
        height: 1.25rem;
        border: 2px solid #e9ecef;
        border-radius: 4px;
        background-color: #fff;
        cursor: pointer;
    }

    .form-check-input-modern:checked {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .form-check-label-modern {
        font-weight: 500;
        color: #495057;
        cursor: pointer;
        margin: 0;
    }

    .text-muted-custom {
        color: #6c757d !important;
        font-size: 0.85rem;
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

    .btn-modern {
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        border: none;
        cursor: pointer;
        text-decoration: none;
    }

    .btn-primary-modern {
        background-color: var(--primary-color);
        color: white;
    }

    .btn-primary-modern:hover {
        background-color: #d1036d;
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(240, 4, 128, 0.3);
    }

    .btn-outline-modern {
        background-color: transparent;
        color: #6c757d;
        border: 1px solid #e9ecef;
    }

    .btn-outline-modern:hover {
        background-color: #f8f9fa;
        border-color: var(--primary-color);
        color: var(--primary-color);
        transform: translateY(-1px);
        box-shadow: 0 3px 10px rgba(240, 4, 128, 0.3);
    }

    .btn-secondary-modern {
        background-color: #6c757d;
        color: white;
    }

    .btn-secondary-modern:hover {
        background-color: #5a6268;
        color: white;
        transform: translateY(-1px);
    }

    .loading-spinner {
        width: 2rem;
        height: 2rem;
        border: 0.25rem solid #f3f3f3;
        border-top: 0.25rem solid var(--primary-color);
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin: 0 auto;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
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

    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 9999;
    }

    .loading-content {
        background: white;
        padding: 2rem;
        border-radius: 12px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    }

    .loading-text {
        margin-top: 1rem;
        font-weight: 500;
        color: #495057;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .page-header {
            padding: 1.5rem;
        }
        
        .form-section .card-body {
            padding: 1.5rem;
        }
        
        .section-header {
            padding: 1rem;
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
                            <li class="breadcrumb-item"><a class="breadcrumb-link text-white" href="/">Tableau de Bord</a></li>
                            <li class="breadcrumb-item"><a class="breadcrumb-link text-white" href="/utilisateurs">Utilisateurs</a></li>
                            <li class="breadcrumb-item active" id="userNameBreadcrumb">Modifier</li>
                        </ol>
                    </nav>
                    <h2 class="mb-0 text-white">Modifier l'Utilisateur</h2>
                </div>
                <div class="col-sm-auto">
                    <button class="btn btn-outline-light me-2" onclick="window.history.back()">
                        <i class="bi-arrow-left me-1"></i> Retour
                    </button>
                    <button class="btn btn-outline-light" onclick="window.location.href='/utilisateurs'">
                        <i class="bi-list me-1"></i> Liste
                    </button>
                </div>
            </div>
        </div>

        <!-- Loading State -->
        <div id="loadingState" class="text-center py-5">
            <div class="spinner-border text-primary-custom" role="status">
                <span class="visually-hidden">Chargement...</span>
            </div>
            <p class="mt-3 text-muted">Chargement des données de l'utilisateur...</p>
        </div>

        <!-- Error State -->
        <div id="errorState" class="text-center py-5" style="display: none;">
            <i class="bi-exclamation-triangle fs-1 text-danger"></i>
            <p class="mt-3 text-danger" id="errorMessage">Erreur lors du chargement</p>
            <div class="d-flex gap-2 justify-content-center">
                <button class="btn btn-primary-custom" onclick="location.reload()">
                    <i class="bi-arrow-clockwise me-1"></i> Réessayer
                </button>
                <button class="btn btn-secondary-modern" onclick="window.location.href='/utilisateurs'">
                    <i class="bi-arrow-left me-1"></i> Retour à la liste
                </button>
            </div>
        </div>

        <!-- Form Container -->
        <div id="formContainer" style="display: none;">
            <!-- Alert Container -->
            <div id="alertContainer"></div>

            <form id="editUserForm">
                <!-- Informations Personnelles -->
                <div class="form-section">
                    <div class="section-header">
                        <h5 class="section-title">
                            <i class="bi-person text-primary-custom"></i>
                            Informations Personnelles
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">
                                        <i class="bi-person me-1"></i>
                                        Prénom <span class="label-required"></span>
                                    </label>
                                    <input type="text" id="firstname" name="firstname" class="form-control-modern" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">
                                        <i class="bi-person me-1"></i>
                                        Nom de famille <span class="label-required"></span>
                                    </label>
                                    <input type="text" id="lastname" name="lastname" class="form-control-modern" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">
                                        <i class="bi-at me-1"></i>
                                        Nom d'utilisateur <span class="label-required"></span>
                                    </label>
                                    <input type="text" id="username" name="username" class="form-control-modern" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">
                                        <i class="bi-envelope me-1"></i>
                                        Adresse email <span class="label-required"></span>
                                    </label>
                                    <input type="email" id="email" name="email" class="form-control-modern" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">
                                        <i class="bi-telephone me-1"></i>
                                        Numéro de téléphone
                                    </label>
                                    <input type="tel" id="phonenumber" name="phonenumber" class="form-control-modern">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">
                                        <i class="bi-briefcase me-1"></i>
                                        Poste/Fonction
                                    </label>
                                    <input type="text" id="poste" name="poste" class="form-control-modern">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statut -->
                <div class="form-section">
                    <div class="section-header">
                        <h5 class="section-title">
                            <i class="bi-toggle-on text-primary-custom"></i>
                            Statut du Compte
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group-modern">
                            <div class="form-check-modern">
                                <input type="checkbox" id="is_active" name="is_active" class="form-check-input-modern">
                                <label class="form-check-label-modern" for="is_active">
                                    Compte actif
                                </label>
                            </div>
                            <small class="text-muted-custom">
                                <i class="bi-info-circle me-1"></i>
                                Les comptes inactifs ne peuvent pas se connecter
                            </small>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="form-section">
                    <div class="card-body">
                        <div class="d-flex gap-3 justify-content-end">
                            <button type="button" class="btn btn-secondary-modern" onclick="window.location.href='/utilisateurs'">
                                <i class="bi-x-circle me-1"></i> Annuler
                            </button>
                            <button type="submit" class="btn btn-primary-modern" id="submitBtn">
                                <i class="bi-check-circle me-1"></i> Enregistrer les modifications
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<!-- Loading overlay -->
<div id="loadingOverlay" class="loading-overlay" style="display: none;">
    <div class="loading-content">
        <div class="loading-spinner"></div>
        <div class="loading-text">Mise à jour en cours...</div>
    </div>
</div>

<script>
    // Variables globales
    let currentUserData = null;
    let currentUserId = null;

    // Fonction pour récupérer un cookie
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
    }

    // Fonction pour afficher une alerte
    function showAlert(message, type = 'info') {
        const alertContainer = document.getElementById('alertContainer');
        const alertId = 'alert-' + Date.now();
        
        const icons = {
            success: 'bi-check-circle-fill',
            error: 'bi-exclamation-triangle-fill',
            warning: 'bi-exclamation-circle-fill',
            info: 'bi-info-circle-fill'
        };
        
        const alert = document.createElement('div');
        alert.id = alertId;
        alert.className = `alert alert-${type} alert-dismissible fade show`;
        alert.innerHTML = `
            <i class="bi ${icons[type]} me-2"></i>
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        alertContainer.appendChild(alert);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            const alertElement = document.getElementById(alertId);
            if (alertElement) {
                alertElement.remove();
            }
        }, 5000);
    }

    // Fonction pour charger les données de l'utilisateur
    async function loadUserData() {
        try {
            const accessToken = getCookie('access_token');
            if (!accessToken) {
                throw new Error('Token d\'authentification manquant');
            }

            // Récupérer l'ID de l'utilisateur depuis l'URL
            const pathParts = window.location.pathname.split('/');
            currentUserId = pathParts[pathParts.length - 2]; // /utilisateur/{id}/modifier
            
            if (!currentUserId) {
                throw new Error('ID utilisateur manquant');
            }

            const response = await fetch(`https://toure.gestiem.com/api/auth/users/${currentUserId}`, {
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
                populateForm(currentUserData);
                showForm();
            } else {
                throw new Error(data.message || 'Erreur lors du chargement des données');
            }

        } catch (error) {
            console.error('Erreur lors du chargement:', error);
            showError('Erreur lors du chargement: ' + error.message);
        }
    }

    // Fonction pour peupler le formulaire
    function populateForm(user) {
        document.getElementById('firstname').value = user.firstname || '';
        document.getElementById('lastname').value = user.lastname || '';
        document.getElementById('username').value = user.username || '';
        document.getElementById('email').value = user.email || '';
        document.getElementById('phonenumber').value = user.phonenumber || '';
        document.getElementById('poste').value = user.poste || '';
        document.getElementById('is_active').checked = user.is_active || false;
        
        // Mettre à jour le breadcrumb
        const fullName = `${user.firstname || ''} ${user.lastname || ''}`.trim() || 'Utilisateur';
        document.getElementById('userNameBreadcrumb').textContent = fullName;
    }

    // Fonction pour afficher le formulaire
    function showForm() {
        document.getElementById('loadingState').style.display = 'none';
        document.getElementById('formContainer').style.display = 'block';
    }

    // Fonction pour afficher une erreur
    function showError(message) {
        document.getElementById('loadingState').style.display = 'none';
        document.getElementById('errorMessage').textContent = message;
        document.getElementById('errorState').style.display = 'block';
    }

    // Fonction pour gérer la soumission du formulaire
    async function handleSubmit(e) {
        e.preventDefault();
        
        const submitBtn = document.getElementById('submitBtn');
        const originalText = submitBtn.innerHTML;
        
        try {
            // Désactiver le bouton et afficher le loading
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<div class="loading-spinner me-2"></div> Mise à jour...';
            
            // Récupérer les données du formulaire
            const formData = new FormData(e.target);
            const data = Object.fromEntries(formData.entries());
            data.is_active = document.getElementById('is_active').checked;
            
            // Validation côté client
            if (!data.firstname || !data.lastname || !data.username || !data.email) {
                throw new Error('Veuillez remplir tous les champs obligatoires');
            }
            
            // Appel API
            const accessToken = getCookie('access_token');
            const response = await fetch(`/api/users/${currentUserId}`, {
                method: 'PUT',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            });

            if (!response.ok) {
                const errorData = await response.json();
                if (errorData.errors) {
                    // Afficher les erreurs de validation
                    displayValidationErrors(errorData.errors);
                    throw new Error('Erreurs de validation');
                }
                throw new Error(errorData.message || `Erreur HTTP: ${response.status}`);
            }

            const result = await response.json();
            
            if (result.success) {
                showAlert('Utilisateur mis à jour avec succès', 'success');
                
                // Rediriger vers les détails après 2 secondes
                setTimeout(() => {
                    window.location.href = `/utilisateur/${currentUserId}`;
                }, 2000);
            } else {
                throw new Error(result.message || 'Erreur lors de la mise à jour');
            }

        } catch (error) {
            console.error('Erreur lors de la mise à jour:', error);
            showAlert('Erreur lors de la mise à jour: ' + error.message, 'danger');
        } finally {
            // Réactiver le bouton
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        }
    }

    // Fonction pour afficher les erreurs de validation
    function displayValidationErrors(errors) {
        // Réinitialiser les erreurs
        document.querySelectorAll('.form-control-modern').forEach(field => {
            field.classList.remove('is-invalid');
        });
        document.querySelectorAll('.invalid-feedback').forEach(feedback => {
            feedback.textContent = '';
        });
        
        // Afficher les nouvelles erreurs
        Object.keys(errors).forEach(fieldName => {
            const field = document.getElementById(fieldName);
            const feedback = field.nextElementSibling;
            
            if (field && feedback) {
                field.classList.add('is-invalid');
                feedback.textContent = errors[fieldName][0];
            }
        });
    }

    // Event listeners
    document.addEventListener('DOMContentLoaded', function() {
        // Vérifier l'authentification
        const accessToken = getCookie('access_token');
        const connected = getCookie('connected');
        
        if (!connected || !accessToken) {
            showLoginRequired();
            return;
        }

        // Charger les données
        loadUserData();
        
        // Event listener pour le formulaire
        document.getElementById('editUserForm').addEventListener('submit', handleSubmit);
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
                            Vous devez être connecté pour modifier les informations de l'utilisateur.
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
