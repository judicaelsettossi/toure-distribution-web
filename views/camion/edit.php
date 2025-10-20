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

    .btn-primary-custom:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
        box-shadow: none;
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

    .btn-secondary-modern {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.4rem;
        padding: 0.6rem 1.2rem;
        font-weight: 500;
        border-radius: 6px;
        transition: all 0.3s ease;
        border: 1px solid #6c757d;
        background: white;
        color: #6c757d;
        font-size: 0.9rem;
    }

    .btn-secondary-modern:hover {
        background-color: #f8f9fa;
        border-color: #495057;
        color: #495057;
        transform: translateY(-1px);
        box-shadow: 0 3px 10px rgba(73, 80, 87, 0.3);
    }

    .card-modern {
        border: none;
        border-radius: 12px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    .card-modern:hover {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
    }

    .form-control-modern {
        border: 1px solid #e9ecef;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        background-color: #fff;
    }

    .form-control-modern:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(240, 4, 128, 0.25);
        background-color: #fff;
    }

    .form-label-modern {
        font-weight: 600;
        color: #495057;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .form-select-modern {
        border: 1px solid #e9ecef;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        background-color: #fff;
    }

    .form-select-modern:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(240, 4, 128, 0.25);
    }

    .status-card {
        border: 2px solid #e9ecef;
        border-radius: 12px;
        padding: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        background: white;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .status-card:hover {
        border-color: var(--primary-color);
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(240, 4, 128, 0.15);
    }

    .status-card.selected {
        border-color: var(--primary-color);
        background: var(--light-primary);
        box-shadow: 0 4px 15px rgba(240, 4, 128, 0.2);
    }

    .status-card.selected::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--primary-color), #d1036d);
    }

    .status-icon {
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
        display: block;
    }

    .status-name {
        font-weight: 600;
        font-size: 0.9rem;
        margin-bottom: 0.25rem;
    }

    .status-description {
        font-size: 0.8rem;
        color: #6c757d;
        line-height: 1.3;
    }

    .status-disponible .status-icon { color: #28a745; }
    .status-en-mission .status-icon { color: #007bff; }
    .status-en-maintenance .status-icon { color: #ffc107; }
    .status-hors-service .status-icon { color: #dc3545; }

    .info-box {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-left: 4px solid var(--primary-color);
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 1.5rem;
    }

    .info-box .info-title {
        font-weight: 600;
        color: var(--secondary-color);
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .info-box .info-text {
        color: #6c757d;
        font-size: 0.85rem;
        line-height: 1.4;
        margin: 0;
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
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.25rem;
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
        .status-card {
            margin-bottom: 1rem;
        }
        
        .btn-primary-custom,
        .btn-outline-modern,
        .btn-secondary-modern {
            width: 100%;
            justify-content: center;
        }
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
                <p class="mt-2 text-muted">Chargement des données du camion...</p>
            </div>
        </div>

        <!-- Error State -->
        <div id="errorState" class="error-message" style="display: none;">
            <i class="bi-exclamation-triangle-fill text-danger" style="font-size: 3rem;"></i>
            <h4 class="mt-3">Erreur de chargement</h4>
            <p id="errorMessage">Impossible de charger les données du camion.</p>
            <button class="btn btn-primary-custom mt-2" onclick="loadCamionData()">
                <i class="bi-arrow-clockwise me-1"></i> Réessayer
            </button>
        </div>

        <!-- Main Content -->
        <div id="mainContent" style="display: none;">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm mb-2 mb-sm-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-no-gutter">
                                <li class="breadcrumb-item"><a class="breadcrumb-link text-white" href="/">Tableau de Bord</a></li>
                                <li class="breadcrumb-item"><a class="breadcrumb-link text-white" href="/camions">Camions</a></li>
                                <li class="breadcrumb-item active" id="breadcrumbCamion">Modification</li>
                            </ol>
                        </nav>
                        <h1 class="page-header-title">
                            <i class="bi-pencil-square me-2"></i>Modifier le Camion
                        </h1>
                        <p class="mb-0" id="pageSubtitle">Modifiez les informations du véhicule</p>
                    </div>

                    <div class="col-sm-auto">
                        <div class="d-flex gap-2">
                            <a class="btn btn-light" href="/camions">
                                <i class="bi-arrow-left me-1"></i> Retour
                            </a>
                            <a class="btn btn-light" href="#" id="viewLink">
                                <i class="bi-eye me-1"></i> Voir
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form id="editCamionForm">
                <div class="row">
                    <!-- Informations Générales -->
                    <div class="col-lg-8">
                        <div class="card card-modern mb-4">
                            <div class="card-header bg-white border-0 pb-0">
                                <h5 class="card-title text-secondary-custom mb-0">
                                    <i class="bi-info-circle me-2"></i>Informations Générales
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="numeroImmat" class="form-label-modern">
                                            <i class="bi-truck me-1"></i>Numéro d'immatriculation *
                                        </label>
                                        <input type="text" class="form-control form-control-modern" id="numeroImmat" name="numero_immat" required>
                                        <div class="invalid-feedback"></div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="marque" class="form-label-modern">
                                            <i class="bi-building me-1"></i>Marque *
                                        </label>
                                        <input type="text" class="form-control form-control-modern" id="marque" name="marque" required>
                                        <div class="invalid-feedback"></div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="modele" class="form-label-modern">
                                            <i class="bi-gear me-1"></i>Modèle
                                        </label>
                                        <input type="text" class="form-control form-control-modern" id="modele" name="modele">
                                        <div class="invalid-feedback"></div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="capacite" class="form-label-modern">
                                            <i class="bi-speedometer2 me-1"></i>Capacité (tonnes) *
                                        </label>
                                        <input type="number" class="form-control form-control-modern" id="capacite" name="capacite" step="0.01" min="0" required>
                                        <div class="invalid-feedback"></div>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="note" class="form-label-modern">
                                            <i class="bi-sticky me-1"></i>Note
                                        </label>
                                        <textarea class="form-control form-control-modern" id="note" name="note" rows="3" placeholder="Ajoutez des notes ou observations sur ce camion..."></textarea>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Statut -->
                    <div class="col-lg-4">
                        <div class="card card-modern mb-4">
                            <div class="card-header bg-white border-0 pb-0">
                                <h5 class="card-title text-secondary-custom mb-0">
                                    <i class="bi-activity me-2"></i>Statut du Camion
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="info-box">
                                    <div class="info-title">Sélectionnez le statut</div>
                                    <div class="info-text">Choisissez le statut actuel du camion selon son état d'utilisation.</div>
                                </div>

                                <div class="row g-3">
                                    <div class="col-6">
                                        <div class="status-card status-disponible" data-status="disponible">
                                            <i class="bi-check-circle status-icon"></i>
                                            <div class="status-name">Disponible</div>
                                            <div class="status-description">En service</div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="status-card status-en-mission" data-status="en_mission">
                                            <i class="bi-truck status-icon"></i>
                                            <div class="status-name">En Mission</div>
                                            <div class="status-description">Actuellement utilisé</div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="status-card status-en-maintenance" data-status="en_maintenance">
                                            <i class="bi-tools status-icon"></i>
                                            <div class="status-name">Maintenance</div>
                                            <div class="status-description">En réparation</div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="status-card status-hors-service" data-status="hors_service">
                                            <i class="bi-x-circle status-icon"></i>
                                            <div class="status-name">Hors Service</div>
                                            <div class="status-description">Indisponible</div>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" id="status" name="status" value="disponible">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="row">
                    <div class="col-12">
                        <div class="card card-modern">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-muted">
                                        <i class="bi-info-circle me-1"></i>
                                        Les champs marqués d'un * sont obligatoires
                                    </div>
                                    <div class="d-flex gap-2">
                                        <button type="button" class="btn btn-secondary-modern" onclick="window.location.href='/camions'">
                                            <i class="bi-x-lg me-1"></i> Annuler
                                        </button>
                                        <button type="submit" class="btn btn-primary-custom" id="saveBtn">
                                            <i class="bi-check-lg me-1"></i> Enregistrer les modifications
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<!-- Toast Container -->
<div id="toastContainer"></div>

<script>
    let currentCamionId = null;

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
        // URL format: /camion/{id}/modifier
        return pathParts[pathParts.length - 2];
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
            setupEventListeners();
        } else {
            showError('ID du camion non trouvé dans l\'URL');
        }
    });

    function setupEventListeners() {
        // Status cards
        document.querySelectorAll('.status-card').forEach(card => {
            card.addEventListener('click', function() {
                selectStatus(this.dataset.status);
            });
        });

        // Form submission
        document.getElementById('editCamionForm').addEventListener('submit', handleSubmit);
    }

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
                populateForm(result.data);
                hideLoading();
                showMainContent();
            } else {
                throw new Error('Structure de réponse invalide');
            }

        } catch (error) {
            console.error('Erreur lors du chargement des données du camion:', error);
            hideLoading();
            showError('Erreur lors du chargement des données du camion: ' + error.message);
        }
    }

    function populateForm(camion) {
        // Mise à jour des informations principales
        document.getElementById('breadcrumbCamion').textContent = camion.numero_immat;
        document.getElementById('pageSubtitle').textContent = `Modifiez les informations du véhicule ${camion.numero_immat}`;
        
        // Lien de visualisation
        document.getElementById('viewLink').href = `/camion/${camion.camion_id}`;
        
        // Remplissage du formulaire
        document.getElementById('numeroImmat').value = camion.numero_immat || '';
        document.getElementById('marque').value = camion.marque || '';
        document.getElementById('modele').value = camion.modele || '';
        document.getElementById('capacite').value = camion.capacite || '';
        document.getElementById('note').value = camion.note || '';
        
        // Sélection du statut
        selectStatus(camion.status || 'disponible');
    }

    function selectStatus(status) {
        // Désélectionner toutes les cartes
        document.querySelectorAll('.status-card').forEach(card => {
            card.classList.remove('selected');
        });
        
        // Sélectionner la carte correspondante
        const selectedCard = document.querySelector(`[data-status="${status}"]`);
        if (selectedCard) {
            selectedCard.classList.add('selected');
        }
        
        // Mettre à jour le champ caché
        document.getElementById('status').value = status;
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

    async function handleSubmit(e) {
        e.preventDefault();
        
        const saveBtn = document.getElementById('saveBtn');
        const originalText = saveBtn.innerHTML;
        
        try {
            // Désactiver le bouton et afficher le loading
            saveBtn.disabled = true;
            saveBtn.innerHTML = '<i class="bi-hourglass-split me-1"></i> Enregistrement...';
            
            // Récupérer les données du formulaire
            const formData = new FormData(e.target);
            const data = Object.fromEntries(formData.entries());
            
            // Validation côté client
            if (!data.numero_immat || !data.marque || !data.capacite) {
                throw new Error('Veuillez remplir tous les champs obligatoires');
            }
            
            // Appel API
            const accessToken = getCookie('access_token');
            const response = await fetch(`https://toure.gestiem.com/api/camions/${currentCamionId}`, {
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
                throw new Error(errorData.message || `Erreur HTTP: ${response.status}`);
            }

            const result = await response.json();
            
            if (result.success) {
                showToast('Camion modifié avec succès', 'success');
                
                // Rediriger vers la page de détails après 2 secondes
                setTimeout(() => {
                    window.location.href = `/camion/${currentCamionId}`;
                }, 2000);
            } else {
                throw new Error(result.message || 'Erreur lors de la modification');
            }

        } catch (error) {
            console.error('Erreur lors de la modification:', error);
            showToast('Erreur lors de la modification: ' + error.message, 'error');
        } finally {
            // Réactiver le bouton
            saveBtn.disabled = false;
            saveBtn.innerHTML = originalText;
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
