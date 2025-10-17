<?php ob_start(); ?>

<style>
:root {
    --primary-color: #10b981;
    --secondary-color: #010768;
    --accent-color: #010068;
    --light-primary: rgba(16, 185, 129, 0.1);
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

.bg-secondary-custom {
    background-color: var(--secondary-color) !important;
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
    background-color: #059669;
    border-color: #059669;
    color: white;
}

.btn-secondary-custom {
    background-color: var(--secondary-color);
    border-color: var(--secondary-color);
    color: white;
}

.btn-secondary-custom:hover {
    background-color: #020a7a;
    border-color: #020a7a;
    color: white;
}

/* Steps Indicator - Compact */
.steps-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 1.5rem;
    position: relative;
}

.step-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    flex: 1;
    max-width: 180px;
}

.step-number {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background-color: #e9ecef;
    color: #6c757d;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 1.1rem;
    border: 3px solid #e9ecef;
    transition: all 0.3s ease;
    position: relative;
    z-index: 2;
}

.step-item.active .step-number {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
    color: white;
    box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.2);
}

.step-item.completed .step-number {
    background-color: #28a745;
    border-color: #28a745;
    color: white;
}

.step-label {
    font-size: 0.75rem;
    font-weight: 600;
    color: #6c757d;
    text-align: center;
    margin-top: 0.5rem;
    line-height: 1.2;
}

.step-item.active .step-label {
    color: var(--primary-color);
}

.step-item.completed .step-label {
    color: #28a745;
}

.step-line {
    position: absolute;
    top: 22px;
    left: 50%;
    width: 100%;
    height: 2px;
    background-color: #e9ecef;
    z-index: 1;
}

.step-item:last-child .step-line {
    display: none;
}

.step-item.completed .step-line {
    background-color: #28a745;
}

/* Form Steps - Compact */
.form-step {
    display: none;
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    border: 1px solid rgba(0,0,0,0.05);
    margin-bottom: 1rem;
}

.form-step.active {
    display: block !important;
}

.form-section {
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
}

.form-section-header {
    background: linear-gradient(135deg, var(--light-primary) 0%, #f8f9fa 100%);
    border-radius: 10px;
    padding: 1rem 1.5rem;
    margin-bottom: 1.5rem;
    border: 1px solid rgba(16, 185, 129, 0.2);
}

.form-group-modern {
    margin-bottom: 1.5rem;
}

.form-label-modern {
    font-weight: 600;
    color: var(--secondary-color);
    margin-bottom: 0.5rem;
    font-size: 0.9rem;
}

.label-required::after {
    content: ' *';
    color: #dc3545;
}

.form-control-modern {
    border: 2px solid #e9ecef;
    border-radius: 8px;
    padding: 0.75rem 1rem;
    font-size: 1rem;
    transition: all 0.3s ease;
    background-color: #fff;
}

.form-control-modern:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(16, 185, 129, 0.25);
    background-color: #fff;
}

.form-control-modern.is-invalid {
    border-color: #dc3545;
    box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
}

.invalid-feedback {
    display: block;
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

/* Progress Bar - Compact */
.progress-bar-custom {
    height: 6px;
    background-color: #e9ecef;
    border-radius: 8px;
    margin-bottom: 1rem;
    overflow: hidden;
}

.progress-bar-fill {
    height: 100%;
    background: linear-gradient(90deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    transition: width 0.3s ease;
    border-radius: 8px;
}

/* Page Header - Compact */
.page-header {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    color: white;
    border-radius: 12px;
    padding: 1rem;
    margin-bottom: 0.75rem;
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
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 0.25rem;
    color: white !important;
}

.breadcrumb {
    background: none;
    padding: 0;
    margin-bottom: 0.25rem;
    font-size: 0.85rem;
}

.breadcrumb-item a {
    color: rgba(255,255,255,0.8) !important;
    text-decoration: none;
}

.breadcrumb-item a:hover {
    color: white !important;
}

.breadcrumb-item.active {
    color: rgba(255,255,255,0.6) !important;
}

/* Form Navigation - Compact */
.form-navigation {
    display: flex;
    justify-content: space-between;
    margin-top: 1rem;
    padding-top: 1rem;
    border-top: 2px solid #e9ecef;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .step-item {
        max-width: 120px;
    }
    
    .step-number {
        width: 35px;
        height: 35px;
        font-size: 0.9rem;
    }
    
    .step-label {
        font-size: 0.7rem;
    }
    
    .form-step {
        padding: 1rem;
    }
}



    /* Form container */
    .form-container {
        background: white;
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        margin-bottom: 2rem;
    }

    .form-section {
        margin-bottom: 2.5rem;
        padding-bottom: 2rem;
        border-bottom: 2px solid #f0f0f0;
    }

    .form-section:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }

    .section-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .section-icon {
        width: 45px;
        height: 45px;
        border-radius: 12px;
        background: linear-gradient(135deg, var(--success-color), #059669);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
    }

    /* Form controls */
    .form-group-modern {
        margin-bottom: 1.5rem;
    }

    .form-label-modern {
        font-weight: 600;
        color: var(--secondary-color);
        margin-bottom: 0.5rem;
        display: block;
        font-size: 0.95rem;
    }

    .label-required::after {
        content: ' *';
        color: var(--danger-color);
    }

    .form-control-modern {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: white;
    }

    .form-control-modern:focus {
        outline: none;
        border-color: var(--success-color);
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
    }

    .form-select-modern {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 0.75rem center;
        background-repeat: no-repeat;
        background-size: 1rem;
        padding-right: 2.5rem;
    }

    /* Input icons */
    .input-with-icon {
        position: relative;
    }

    .input-icon {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
        font-size: 1.1rem;
    }

    .form-control-modern.with-icon {
        padding-right: 3rem;
    }

    /* Toggle switch */
    .toggle-switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .toggle-switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
        border-radius: 34px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
    }

    input:checked + .slider {
        background-color: var(--success-color);
    }

    input:checked + .slider:before {
        transform: translateX(26px);
    }

    .toggle-label {
        margin-left: 1rem;
        font-weight: 600;
        color: var(--secondary-color);
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
    }

    .loading-spinner {
        width: 60px;
        height: 60px;
        border: 4px solid #f0f0f0;
        border-top-color: var(--success-color);
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

    /* Alert messages */
    .alert-modern {
        padding: 1.25rem;
        border-radius: 12px;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        font-weight: 500;
        animation: slideDown 0.3s ease-out;
    }

    .alert-success {
        background: rgba(16, 185, 129, 0.1);
        color: var(--success-color);
        border-left: 4px solid var(--success-color);
    }

    .alert-danger {
        background: rgba(239, 68, 68, 0.1);
        color: var(--danger-color);
        border-left: 4px solid var(--danger-color);
    }

    .alert-icon {
        font-size: 1.5rem;
    }

    /* Animations */
    .fade-in {
        animation: fadeIn 0.6s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
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
        .form-actions {
            flex-direction: column;
        }
    }
</style>

<main id="content" role="main" class="main font-public-sans">
    <div class="content container-fluid">

    <!-- Alerts -->
    <div id="alertContainer"></div>

    <!-- Page Header -->
    <div class="page-header mb-3">
        <div class="row align-items-center">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/" class="text-primary-custom">Tableau de Bord</a></li>
                        <li class="breadcrumb-item"><a href="/fournisseurs" class="text-primary-custom">Fournisseurs</a></li>
                        <li class="breadcrumb-item active">Nouveau Fournisseur</li>
                    </ol>
                </nav>
                <h1 class="page-header-title text-secondary-custom">
                    <i class="bi-truck me-2"></i>
                    Créer un Nouveau Fournisseur
                </h1>
                <p class="text-white-50 mb-0">Ajoutez un nouveau fournisseur en 3 étapes simples</p>
            </div>
            <div class="col-auto">
                <a href="/fournisseurs" class="btn btn-outline-light btn-sm">
                    <i class="bi-arrow-left me-1"></i> Retour
                </a>
            </div>
        </div>
    </div>

    <!-- Progress Bar -->
    <div class="progress-bar-custom">
        <div class="progress-bar-fill" id="progressBar" style="width: 33%"></div>
    </div>

    <!-- Steps Indicator -->
    <div class="steps-container">
        <div class="step-item active" data-step="1">
            <div class="step-number">1</div>
            <div class="step-label">Informations<br>Générales</div>
            <div class="step-line"></div>
        </div>
        <div class="step-item" data-step="2">
            <div class="step-number">2</div>
            <div class="step-label">Adresse &<br>Contact</div>
            <div class="step-line"></div>
        </div>
        <div class="step-item" data-step="3">
            <div class="step-number">3</div>
            <div class="step-label">Statut &<br>Configuration</div>
        </div>
    </div>

    <!-- Form -->
    <form id="addFournisseurForm" class="form-container fade-in">
        <!-- STEP 1: Informations Générales -->
        <div class="form-step active" data-step="1">
            <div class="form-section">
                <div class="form-section-header">
                    <h5 class="mb-0 text-secondary-custom">
                        <i class="bi-info-circle-fill me-2"></i>
                        Informations Générales du Fournisseur
                    </h5>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group-modern">
                            <label class="form-label-modern label-required">Nom du fournisseur</label>
                            <input type="text" id="name" class="form-control-modern" placeholder="Ex: ACME Corporation" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-modern">
                            <label class="form-label-modern">Personne responsable</label>
                            <input type="text" id="responsable" class="form-control-modern" placeholder="Ex: John Doe">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-modern">
                            <label class="form-label-modern">Numéro IFU</label>
                            <input type="text" id="ifu" class="form-control-modern" placeholder="Ex: 1234567890123">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- STEP 2: Adresse & Contact -->
        <div class="form-step" data-step="2">
            <div class="form-section">
                <div class="form-section-header">
                    <h5 class="mb-0 text-secondary-custom">
                        <i class="bi-geo-alt-fill me-2"></i>
                        Adresse et Coordonnées
                    </h5>
                </div>
                <div class="form-group-modern">
                    <label class="form-label-modern">Adresse complète</label>
                    <textarea id="adresse" class="form-control-modern" rows="3" placeholder="123 Main Street, Building A"></textarea>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group-modern">
                            <label class="form-label-modern">Ville</label>
                            <input type="text" id="city" class="form-control-modern" placeholder="Ex: Cotonou">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-modern">
                            <label class="form-label-modern">Code postal</label>
                            <input type="text" id="postal_code" class="form-control-modern" placeholder="Ex: 01BP1234">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-modern">
                            <label class="form-label-modern">Email</label>
                            <input type="email" id="email" class="form-control-modern" placeholder="contact@entreprise.com">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-modern">
                            <label class="form-label-modern">Téléphone</label>
                            <input type="tel" id="phone" class="form-control-modern" placeholder="+225123456789">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- STEP 3: Statut & Configuration -->
        <div class="form-step" data-step="3">
            <div class="form-section">
                <div class="form-section-header">
                    <h5 class="mb-0 text-secondary-custom">
                        <i class="bi-toggle-on-fill me-2"></i>
                        Statut et Configuration
                    </h5>
                </div>
                <div class="form-group-modern">
                    <div class="d-flex align-items-center">
                        <label class="toggle-switch">
                            <input type="checkbox" id="isActive" checked>
                            <span class="slider"></span>
                        </label>
                        <span class="toggle-label ms-3">Fournisseur actif</span>
                    </div>
                    <small class="text-muted">Un fournisseur actif peut être utilisé dans les commandes et mouvements de stock</small>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group-modern">
                            <label class="form-label-modern">Conditions de paiement</label>
                            <select id="paymentTerms" class="form-control-modern">
                                <option value="">Sélectionner...</option>
                                <option value="30 jours">30 jours</option>
                                <option value="45 jours">45 jours</option>
                                <option value="60 jours">60 jours</option>
                                <option value="Comptant">Comptant</option>
                                <option value="À la livraison">À la livraison</option>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <div class="form-navigation">
            <button type="button" class="btn btn-outline-secondary" id="prevBtn" style="display: none;">
                <i class="bi-arrow-left me-1"></i> Précédent
            </button>
            <div class="ms-auto">
                <button type="button" class="btn btn-primary-custom" id="nextBtn">
                    Suivant <i class="bi-arrow-right ms-1"></i>
                </button>
                <button type="submit" class="btn btn-success" id="submitBtn" style="display: none;">
                    <i class="bi-check-circle me-1"></i> Créer le Fournisseur
                </button>
            </div>
        </div>
    </form>
    </div>
</main>

<!-- Loading Overlay -->
<div id="loadingOverlay" class="loading-overlay" style="display: none;">
    <div class="loading-content">
        <div class="loading-spinner"></div>
        <div class="loading-text">Création du fournisseur...</div>
    </div>
</div>

<script>
    let formModified = false;
    let currentStep = 1;
    const totalSteps = 3;

    document.addEventListener('DOMContentLoaded', function() {
        // Navigation buttons
        document.getElementById('nextBtn').addEventListener('click', function() {
            if (validateCurrentStep()) {
                if (currentStep < totalSteps) {
                    showStep(currentStep + 1);
                }
            }
        });

        document.getElementById('prevBtn').addEventListener('click', function() {
            if (currentStep > 1) {
                showStep(currentStep - 1);
            }
        });
        
        // Initialize first step
        showStep(1);
        
        // Event listeners
        setupEventListeners();
    });

    function setupEventListeners() {
        // Form modification tracking
        const form = document.getElementById('addFournisseurForm');
        form.addEventListener('input', function() {
            formModified = true;
        });

        // Before unload warning
        window.addEventListener('beforeunload', function(e) {
            if (formModified) {
                e.preventDefault();
                e.returnValue = '';
            }
        });

        // Form submit
        form.addEventListener('submit', handleSubmit);
    }

    async function handleSubmit(e) {
        e.preventDefault();

        // Clear previous errors
        document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        document.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');

        try {
            document.getElementById('loadingOverlay').style.display = 'flex';

            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            
            const formData = {
                name: document.getElementById('name').value.trim(),
                responsable: document.getElementById('responsable').value.trim(),
                ifu: document.getElementById('ifu').value.trim(),
                email: document.getElementById('email').value.trim(),
                phone: document.getElementById('phone').value.trim(),
                adresse: document.getElementById('adresse').value.trim(),
                city: document.getElementById('city').value.trim(),
                postal_code: document.getElementById('postal_code').value.trim(),
                payment_terms: document.getElementById('paymentTerms').value,
                is_active: document.getElementById('isActive').checked
            };

            console.log('Données du formulaire:', formData);

            const response = await fetch('https://toure.gestiem.com/api/fournisseurs', {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(formData)
            });

            const result = await response.json();

            if (response.ok) {
                // Désactiver l'alerte beforeunload
                formModified = false;
                window.removeEventListener('beforeunload', arguments.callee);
                
                showAlert('✓ Fournisseur créé avec succès !', 'success');
                
                // Redirection vers la liste après 2 secondes
                setTimeout(() => {
                    window.location.href = '/fournisseurs';
                }, 2000);
            } else {
                if (response.status === 422) {
                    handleValidationErrors(result.errors);
                } else if (response.status === 500) {
                    throw new Error('Erreur serveur: Le modèle Fournisseur n\'existe pas côté serveur. Veuillez contacter l\'administrateur.');
                } else {
                    throw new Error(result.message || 'Erreur lors de la création');
                }
            }

        } catch (error) {
            console.error('Erreur:', error);
            showAlert('Erreur: ' + error.message, 'danger');
        } finally {
            document.getElementById('loadingOverlay').style.display = 'none';
        }
    }

    function handleValidationErrors(errors) {
        for (const [field, messages] of Object.entries(errors)) {
            let inputId = '';

            switch (field) {
                case 'name':
                    inputId = 'name';
                    break;
                case 'responsable':
                    inputId = 'responsable';
                    break;
                case 'email':
                    inputId = 'email';
                    break;
                case 'phone':
                    inputId = 'phone';
                    break;
                case 'adresse':
                    inputId = 'adresse';
                    break;
                case 'city':
                    inputId = 'city';
                    break;
                case 'payment_terms':
                    inputId = 'paymentTerms';
                    break;
                case 'is_active':
                    inputId = 'isActive';
                    break;
            }

            if (inputId) {
                const input = document.getElementById(inputId);
                const feedback = input.parentNode.querySelector('.invalid-feedback');
                
                input.classList.add('is-invalid');
                if (feedback) {
                    feedback.textContent = messages[0];
                }
            }
        }
        
        showAlert('Veuillez corriger les erreurs dans le formulaire', 'danger');
    }

    // Step management functions
    function showStep(stepNumber) {
        // Hide all steps
        document.querySelectorAll('.form-step').forEach(step => {
            step.classList.remove('active');
        });

        // Remove active class from all step items
        document.querySelectorAll('.step-item').forEach(item => {
            item.classList.remove('active', 'completed');
        });

        // Show current step
        const currentStepElement = document.querySelector(`.form-step[data-step="${stepNumber}"]`);
        const currentStepItem = document.querySelector(`.step-item[data-step="${stepNumber}"]`);
        
        if (currentStepElement) {
            currentStepElement.classList.add('active');
        }
        
        if (currentStepItem) {
            currentStepItem.classList.add('active');
        }

        // Mark previous steps as completed
        for (let i = 1; i < stepNumber; i++) {
            const prevStepItem = document.querySelector(`.step-item[data-step="${i}"]`);
            if (prevStepItem) {
                prevStepItem.classList.add('completed');
            }
        }

        // Update progress bar
        const progress = (stepNumber / totalSteps) * 100;
        document.getElementById('progressBar').style.width = progress + '%';

        // Update navigation buttons
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitBtn = document.getElementById('submitBtn');

        if (stepNumber === 1) {
            prevBtn.style.display = 'none';
            nextBtn.style.display = 'inline-block';
            submitBtn.style.display = 'none';
        } else if (stepNumber === totalSteps) {
            prevBtn.style.display = 'inline-block';
            nextBtn.style.display = 'none';
            submitBtn.style.display = 'inline-block';
        } else {
            prevBtn.style.display = 'inline-block';
            nextBtn.style.display = 'inline-block';
            submitBtn.style.display = 'none';
        }

        currentStep = stepNumber;
    }

    function validateCurrentStep() {
        const currentStepElement = document.querySelector(`.form-step[data-step="${currentStep}"]`);
        const requiredFields = currentStepElement.querySelectorAll('[required]');
        let isValid = true;

        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                field.classList.add('is-invalid');
                const feedback = field.parentNode.querySelector('.invalid-feedback');
                if (feedback) {
                    feedback.textContent = 'Ce champ est obligatoire';
                }
                isValid = false;
            } else {
                field.classList.remove('is-invalid');
                const feedback = field.parentNode.querySelector('.invalid-feedback');
                if (feedback) {
                    feedback.textContent = '';
                }
            }
        });

        return isValid;
    }

    function resetForm() {
        document.getElementById('addFournisseurForm').reset();
        document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        document.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');
        
        // Reset to first step
        currentStep = 1;
        showStep(1);
        document.getElementById('isActive').checked = true;
        formModified = false;
    }

    function showAlert(message, type) {
        const alertContainer = document.getElementById('alertContainer');
        const alertId = 'alert-' + Date.now();
        
        const alertHTML = `
            <div id="${alertId}" class="alert-modern alert-${type}">
                <i class="alert-icon bi bi-${type === 'success' ? 'check-circle' : 'exclamation-triangle'}"></i>
                <span>${message}</span>
                <button type="button" class="btn-close" onclick="closeAlert('${alertId}')" style="margin-left: auto; background: none; border: none; font-size: 1.2rem; opacity: 0.7;">&times;</button>
            </div>
        `;
        
        alertContainer.innerHTML = alertHTML;
        
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
require './views/layouts/app-layout.php';
?>
