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
        background-color: #6c757d;
        border-color: #6c757d;
        color: white;
        transform: translateY(-1px);
    }

    /* Form Section */
    .form-section {
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
        margin-bottom: 1.5rem;
        border: 1px solid #e9ecef;
        overflow: hidden;
    }

    .form-section-header {
        background: linear-gradient(135deg, var(--light-primary) 0%, #f8f9fa 100%);
        padding: 1rem 1.5rem;
        border-bottom: 1px solid #e9ecef;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .form-section-header h5 {
        font-weight: 600;
        color: var(--secondary-color);
        font-size: 1rem;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .form-section-body {
        padding: 1.5rem;
    }

    /* Form Controls */
    .form-label {
        font-weight: 600;
        color: var(--secondary-color);
        margin-bottom: 0.4rem;
        font-size: 0.9rem;
    }

    .required-field::after {
        content: " *";
        color: var(--primary-color);
        font-weight: bold;
    }

    .form-control {
        padding: 0.6rem 0.8rem;
        border: 2px solid #e9ecef;
        border-radius: 6px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        background: #f8f9fa;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary-color);
        background: white;
        box-shadow: 0 0 0 0.15rem rgba(240, 4, 128, 0.15);
    }

    .form-control.is-invalid {
        border-color: #dc3545;
        background: rgba(220, 53, 69, 0.05);
    }

    .form-select {
        padding: 0.6rem 0.8rem;
        border: 2px solid #e9ecef;
        border-radius: 6px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        background: #f8f9fa;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m1 6 7 7 7-7'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 0.6rem center;
        background-size: 14px 10px;
        appearance: none;
    }

    .form-select:focus {
        outline: none;
        border-color: var(--primary-color);
        background: white;
        box-shadow: 0 0 0 0.15rem rgba(240, 4, 128, 0.15);
    }

    .form-control:disabled {
        background-color: #e9ecef;
        opacity: 1;
        cursor: not-allowed;
    }

    .form-text {
        font-size: 0.7rem;
        color: #6c757d;
        margin-top: 0.2rem;
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 0.8rem;
        margin-top: 0.4rem;
        display: flex;
        align-items: center;
        gap: 0.4rem;
    }

    /* Input with Icon */
    .position-relative {
        position: relative;
    }

    .input-icon {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--secondary-color);
        font-size: 0.8rem;
        z-index: 2;
    }

    .has-icon {
        padding-left: 30px;
    }

    /* Toggle Switch */
    .toggle-container {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        padding: 0.8rem;
        background: #f8f9fa;
        border-radius: 6px;
        border: 1px solid #e9ecef;
    }

    .toggle-switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 28px;
    }

    .toggle-switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .toggle-slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: 0.4s;
        border-radius: 28px;
    }

    .toggle-slider:before {
        position: absolute;
        content: "";
        height: 22px;
        width: 22px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: 0.4s;
        border-radius: 50%;
    }

    input:checked + .toggle-slider {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    }

    input:checked + .toggle-slider:before {
        transform: translateX(22px);
    }

    .toggle-label {
        font-weight: 600;
        color: var(--secondary-color);
        font-size: 0.9rem;
        margin: 0;
    }

    .toggle-status {
        padding: 0.4rem 0.8rem;
        border-radius: 16px;
        font-size: 0.8rem;
        font-weight: 600;
        margin-left: auto;
    }

    .status-active {
        background: rgba(40, 167, 69, 0.2);
        color: #28a745;
    }

    .status-inactive {
        background: rgba(220, 53, 69, 0.2);
        color: #dc3545;
    }

    /* Info Box */
    .info-box {
        background: linear-gradient(135deg, #e3f2fd 0%, #f3e5f5 100%);
        border-left: 3px solid #2196f3;
        padding: 0.6rem;
        border-radius: 5px;
        margin-top: 0.6rem;
        font-size: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.4rem;
        color: #1976d2;
    }

    /* Form Actions */
    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 0.8rem;
        padding: 1.5rem;
        background: #f8f9fa;
        border-top: 1px solid #e9ecef;
    }

    /* Loading */
    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
    }

    .loading-content {
        background: white;
        padding: 2rem 3rem;
        border-radius: 16px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }

    .loading-spinner {
        width: 60px;
        height: 60px;
        border: 4px solid #f0f0f0;
        border-top-color: var(--primary-color);
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin: 0 auto 1rem;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    .loading-text {
        color: var(--secondary-color);
        font-weight: 600;
        font-size: 1.1rem;
    }

    /* Alerts */
    .alert {
        padding: 1rem 1.5rem;
        margin-bottom: 1rem;
        border-radius: 8px;
        border: none;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-weight: 500;
        animation: slideDown 0.3s ease-out;
    }

    .alert-success {
        background: rgba(40, 167, 69, 0.1);
        color: #28a745;
        border-left: 4px solid #28a745;
    }

    .alert-danger {
        background: rgba(220, 53, 69, 0.1);
        color: #dc3545;
        border-left: 4px solid #dc3545;
    }

    .alert-icon {
        font-size: 1.25rem;
    }

    .alert-close {
        margin-left: auto;
        cursor: pointer;
        opacity: 0.6;
        transition: opacity 0.3s;
        font-size: 1.25rem;
    }

    .alert-close:hover {
        opacity: 1;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .form-section-body {
            padding: 1.5rem;
        }
        
        .form-actions {
            padding: 1.5rem;
            flex-direction: column;
        }
        
        .toggle-container {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.75rem;
        }
        
        .toggle-status {
            margin-left: 0;
        }
    }
</style>

<main id="content" role="main" class="main font-public-sans">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="row align-items-center">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/" class="text-primary-custom">Tableau de Bord</a></li>
                            <li class="breadcrumb-item"><a href="/entrepots" class="text-primary-custom">Entrepôts</a></li>
                            <li class="breadcrumb-item active">Modifier Entrepôt</li>
                        </ol>
                    </nav>
                    <h1 class="page-header-title text-secondary-custom">
                        <i class="bi-building me-2"></i>
                        Modifier l'Entrepôt
                    </h1>
                    <p class="text-muted mb-0">Modifiez les informations de cet entrepôt</p>
                </div>
                <div class="col-auto">
                    <button class="btn btn-outline-secondary me-2" onclick="window.history.back()">
                        <i class="bi-arrow-left me-1"></i> Retour
                    </button>
                    <button class="btn btn-primary-custom" onclick="window.location.href='/entrepots'">
                        <i class="bi-list me-1"></i> Liste Entrepôts
                    </button>
                </div>
            </div>
        </div>

        <!-- Alerts Container -->
        <div id="alertContainer"></div>

        <!-- Loading Initial -->
        <div id="loadingInitial" class="text-center py-5">
            <div class="loading-spinner mx-auto"></div>
            <div class="loading-text">Chargement de l'entrepôt...</div>
        </div>

        <!-- Form -->
        <form id="editWarehouseForm" style="display: none;">
            <!-- Section Informations de Base -->
            <div class="form-section">
                <div class="form-section-header">
                    <h5>
                        <i class="bi-info-circle-fill"></i>
                        Informations de Base
                    </h5>
                </div>
                <div class="form-section-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="warehouseCode" class="form-label">Code de l'Entrepôt</label>
                            <div class="position-relative">
                                <i class="bi-hash input-icon"></i>
                                <input type="text" id="warehouseCode" class="form-control has-icon" disabled>
                            </div>
                            <div class="info-box">
                                <i class="bi-info-circle"></i>
                                Le code est généré automatiquement et ne peut pas être modifié
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="warehouseName" class="form-label required-field">Nom de l'Entrepôt</label>
                            <div class="position-relative">
                                <i class="bi-building input-icon"></i>
                                <input type="text" id="warehouseName" class="form-control has-icon" placeholder="Ex: Entrepôt Central" required>
                            </div>
                            <div class="form-text">Nom descriptif pour identifier facilement l'entrepôt</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="warehouseDescription" class="form-label">Description</label>
                            <div class="position-relative">
                                <i class="bi-file-text input-icon" style="top: 20px;"></i>
                                <textarea id="warehouseDescription" class="form-control has-icon" placeholder="Description de l'entrepôt..." rows="3"></textarea>
                            </div>
                            <div class="form-text">Description détaillée de l'entrepôt (optionnel)</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Contact & Localisation -->
            <div class="form-section">
                <div class="form-section-header">
                    <h5>
                        <i class="bi-geo-alt-fill"></i>
                        Contact & Localisation
                    </h5>
                </div>
                <div class="form-section-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="warehouseEmail" class="form-label">Email</label>
                            <div class="position-relative">
                                <i class="bi-envelope input-icon"></i>
                                <input type="email" id="warehouseEmail" class="form-control has-icon" placeholder="email@exemple.com">
                            </div>
                            <div class="form-text">Email de contact pour l'entrepôt</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="warehousePhone" class="form-label">Téléphone</label>
                            <div class="position-relative">
                                <i class="bi-telephone input-icon"></i>
                                <input type="tel" id="warehousePhone" class="form-control has-icon" placeholder="+229 XX XX XX XX">
                            </div>
                            <div class="form-text">Numéro de téléphone de l'entrepôt</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="warehouseAddress" class="form-label required-field">Adresse Complète</label>
                            <div class="position-relative">
                                <i class="bi-geo-alt input-icon" style="top: 20px;"></i>
                                <textarea id="warehouseAddress" class="form-control has-icon" placeholder="Adresse complète de l'entrepôt..." required rows="3"></textarea>
                            </div>
                            <div class="form-text">Localisation précise pour les livraisons et inventaires</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="warehouseCity" class="form-label">Ville</label>
                            <div class="position-relative">
                                <i class="bi-building input-icon"></i>
                                <input type="text" id="warehouseCity" class="form-control has-icon" placeholder="Ex: Cotonou">
                            </div>
                            <div class="form-text">Ville où se trouve l'entrepôt</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="warehousePostalCode" class="form-label">Code Postal</label>
                            <div class="position-relative">
                                <i class="bi-mailbox input-icon"></i>
                                <input type="text" id="warehousePostalCode" class="form-control has-icon" placeholder="Ex: 01 BP 1234">
                            </div>
                            <div class="form-text">Code postal de la localisation</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Responsable -->
            <div class="form-section">
                <div class="form-section-header">
                    <h5>
                        <i class="bi-person-badge-fill"></i>
                        Responsable de l'Entrepôt
                    </h5>
                </div>
                <div class="form-section-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="warehouseUserId" class="form-label">Responsable Assigné</label>
                            <div class="position-relative">
                                <i class="bi-person-badge input-icon"></i>
                                <select id="warehouseUserId" class="form-select has-icon">
                                    <option value="">Aucun responsable assigné</option>
                                </select>
                            </div>
                            <div class="form-text">Le responsable qui gère cet entrepôt</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Statut -->
            <div class="form-section">
                <div class="form-section-header">
                    <h5>
                        <i class="bi-toggle-on"></i>
                        Statut de l'Entrepôt
                    </h5>
                </div>
                <div class="form-section-body">
                    <div class="toggle-container">
                        <label class="toggle-switch">
                            <input type="checkbox" id="warehouseIsActive" checked>
                            <span class="toggle-slider"></span>
                        </label>
                        <span class="toggle-label">Entrepôt actif</span>
                        <span id="statusText" class="toggle-status status-active">Actif</span>
                    </div>
                    <div class="form-text">
                        <i class="bi-info-circle me-1"></i> Un entrepôt inactif ne peut pas recevoir de nouveaux mouvements de stock
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="form-actions">
                <button type="button" class="btn-secondary-modern" onclick="window.history.back()">
                    <i class="bi-x-lg me-1"></i> Annuler
                </button>
                <button type="submit" class="btn-primary-custom" id="submitBtn">
                    <i class="bi-check-lg me-1"></i> Enregistrer les modifications
                </button>
            </div>
        </form>
    </div>
</main>

<!-- Loading Overlay -->
<div id="loadingOverlay" class="loading-overlay" style="display: none;">
    <div class="loading-content">
        <div class="loading-spinner"></div>
        <div class="loading-text">Mise à jour en cours...</div>
    </div>
</div>

<script>
    let currentWarehouseId = null;
    let currentWarehouse = null;

    // Fonction pour récupérer un cookie
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Vérifier l'authentification
        const accessToken = getCookie('access_token');
        const connected = getCookie('connected');
        
        if (!connected || !accessToken) {
            window.location.href = '/login';
            return;
        }

        // Récupérer l'ID de l'entrepôt depuis l'URL
        const pathParts = window.location.pathname.split('/');
        // URL: /entrepot/{id}/edit, donc l'ID est à l'index -2 (avant-dernier)
        currentWarehouseId = pathParts[pathParts.length - 2];
        
        console.log('URL complète:', window.location.pathname);
        console.log('Parts:', pathParts);
        console.log('ID extrait:', currentWarehouseId);
        
        if (currentWarehouseId && currentWarehouseId !== 'edit') {
            loadWarehouseData();
            setupEventListeners();
        } else {
            showError('ID de l\'entrepôt non trouvé dans l\'URL');
        }
    });

    function setupEventListeners() {
        // Toggle status
        const toggleSwitch = document.getElementById('warehouseIsActive');
        const statusText = document.getElementById('statusText');
        
        toggleSwitch.addEventListener('change', function() {
            if (this.checked) {
                statusText.textContent = 'Actif';
                statusText.className = 'toggle-status status-active';
            } else {
                statusText.textContent = 'Inactif';
                statusText.className = 'toggle-status status-inactive';
            }
        });

        // Form submission
        document.getElementById('editWarehouseForm').addEventListener('submit', handleSubmit);
    }

    async function loadWarehouseData() {
        try {
            const accessToken = getCookie('access_token');
            console.log('Chargement de l\'entrepôt:', currentWarehouseId);

            const response = await fetch(`https://toure.gestiem.com/api/entrepots/${currentWarehouseId}`, {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            console.log('Réponse chargement:', response.status);

            if (!response.ok) {
                throw new Error(`Erreur HTTP: ${response.status}`);
            }

            const result = await response.json();
            console.log('Données entrepôt:', result);

            // L'API retourne directement les données de l'entrepôt
            if (result.entrepot_id || result.id) {
                currentWarehouse = result;
                populateForm(currentWarehouse);
                hideLoading();
            } else if (result.success && result.data) {
                currentWarehouse = result.data;
                populateForm(currentWarehouse);
                hideLoading();
            } else {
                throw new Error('Structure de réponse invalide');
            }

        } catch (error) {
            console.error('Erreur lors du chargement:', error);
            showError('Erreur lors du chargement de l\'entrepôt: ' + error.message);
        }
    }

    function populateForm(warehouse) {
        // Informations de base
        document.getElementById('warehouseCode').value = warehouse.code || '';
        document.getElementById('warehouseName').value = warehouse.name || '';
        document.getElementById('warehouseDescription').value = warehouse.description || '';

        // Contact & Localisation
        document.getElementById('warehouseEmail').value = warehouse.email || '';
        document.getElementById('warehousePhone').value = warehouse.phone || '';
        document.getElementById('warehouseAddress').value = warehouse.adresse || '';
        document.getElementById('warehouseCity').value = warehouse.city || '';
        document.getElementById('warehousePostalCode').value = warehouse.postal_code || '';

        // Responsable
        document.getElementById('warehouseUserId').value = warehouse.user_id || '';

        // Statut
        const isActive = warehouse.is_active === 1 || warehouse.is_active === true;
        document.getElementById('warehouseIsActive').checked = isActive;
        
        const statusText = document.getElementById('statusText');
        if (isActive) {
            statusText.textContent = 'Actif';
            statusText.className = 'toggle-status status-active';
        } else {
            statusText.textContent = 'Inactif';
            statusText.className = 'toggle-status status-inactive';
        }
    }

    async function handleSubmit(event) {
        event.preventDefault();
        
        try {
            showLoadingOverlay();
            
            const formData = {
                name: document.getElementById('warehouseName').value.trim(),
                description: document.getElementById('warehouseDescription').value.trim(),
                email: document.getElementById('warehouseEmail').value.trim(),
                phone: document.getElementById('warehousePhone').value.trim(),
                adresse: document.getElementById('warehouseAddress').value.trim(),
                city: document.getElementById('warehouseCity').value.trim(),
                postal_code: document.getElementById('warehousePostalCode').value.trim(),
                user_id: document.getElementById('warehouseUserId').value || null,
                is_active: document.getElementById('warehouseIsActive').checked ? 1 : 0
            };

            console.log('Données à envoyer:', formData);

            // Validation
            if (!formData.name) {
                throw new Error('Le nom de l\'entrepôt est obligatoire');
            }
            if (!formData.adresse) {
                throw new Error('L\'adresse est obligatoire');
            }

            const accessToken = getCookie('access_token');
            const response = await fetch(`https://toure.gestiem.com/api/entrepots/${currentWarehouseId}`, {
                method: 'PUT',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(formData)
            });

            console.log('Réponse mise à jour:', response.status);

            if (!response.ok) {
                const errorText = await response.text();
                console.error('Erreur de réponse:', errorText);
                throw new Error(`Erreur HTTP ${response.status}: ${errorText}`);
            }

            // Vérifier si la réponse contient du contenu
            const responseText = await response.text();
            console.log('Réponse texte:', responseText);

            let result;
            if (responseText.trim()) {
                try {
                    result = JSON.parse(responseText);
                } catch (jsonError) {
                    if (response.status === 200) {
                        result = { success: true };
                    } else {
                        throw new Error('Réponse invalide du serveur');
                    }
                }
            } else {
                result = { success: true };
            }

            if (result.success || response.status === 200) {
                showAlert('Entrepôt modifié avec succès !', 'success');
                setTimeout(() => {
                    window.location.href = '/entrepots';
                }, 1500);
            } else {
                throw new Error(result.message || 'Erreur lors de la modification');
            }

        } catch (error) {
            console.error('Erreur lors de la modification:', error);
            showAlert('Erreur: ' + error.message, 'danger');
        } finally {
            hideLoadingOverlay();
        }
    }

    function showLoading() {
        document.getElementById('loadingInitial').style.display = 'block';
        document.getElementById('editWarehouseForm').style.display = 'none';
    }

    function hideLoading() {
        document.getElementById('loadingInitial').style.display = 'none';
        document.getElementById('editWarehouseForm').style.display = 'block';
    }

    function showLoadingOverlay() {
        document.getElementById('loadingOverlay').style.display = 'flex';
    }

    function hideLoadingOverlay() {
        document.getElementById('loadingOverlay').style.display = 'none';
    }

    function showError(message) {
        document.getElementById('loadingInitial').style.display = 'none';
        document.getElementById('editWarehouseForm').style.display = 'block';
        showAlert(message, 'danger');
    }

    function showAlert(message, type = 'info') {
        const alertContainer = document.getElementById('alertContainer');
        const alertId = 'alert-' + Date.now();
        
        const alert = document.createElement('div');
        alert.id = alertId;
        alert.className = `alert alert-${type === 'success' ? 'success' : type === 'danger' ? 'danger' : 'info'}`;
        alert.innerHTML = `
            <i class="bi ${type === 'success' ? 'bi-check-circle' : type === 'danger' ? 'bi-exclamation-triangle' : 'bi-info-circle'} alert-icon"></i>
            <span>${message}</span>
            <i class="bi bi-x-lg alert-close" onclick="closeAlert('${alertId}')"></i>
        `;
        
        alertContainer.appendChild(alert);
        
        // Auto-remove after 5 seconds
        setTimeout(() => {
            closeAlert(alertId);
        }, 5000);
    }

    function closeAlert(alertId) {
        const alert = document.getElementById(alertId);
        if (alert) {
            alert.remove();
        }
    }
</script>

<?php
$content = ob_get_clean();
require('./views/layouts/app-layout.php');
?>