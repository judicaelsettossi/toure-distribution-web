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
    background-color: #d1036d;
    border-color: #d1036d;
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
    box-shadow: 0 0 0 4px rgba(240, 4, 128, 0.2);
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
}

.form-section-header {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 10px;
    padding: 1rem;
    margin-bottom: 1rem;
    border-left: 4px solid var(--primary-color);
}

.form-section-body {
    padding: 0;
}

/* Form Controls - Compact */
.form-control-lg {
    padding: 0.75rem 1rem;
    font-size: 0.9rem;
    border-radius: 8px;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
}

.form-control-lg:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(240, 4, 128, 0.15);
}

.form-label {
    font-weight: 600;
    color: var(--secondary-color);
    margin-bottom: 0.5rem;
    font-size: 0.85rem;
}

.required-field::after {
    content: " *";
    color: #dc3545;
    font-weight: 700;
}

.form-text {
    font-size: 0.75rem;
    color: #6c757d;
    margin-top: 0.25rem;
}

/* Client Type Cards - Compact */
.client-type-card {
    background: white;
    border: 2px solid #e9ecef;
    border-radius: 10px;
    padding: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    text-align: center;
    height: 100%;
}

.client-type-card:hover {
    border-color: var(--primary-color);
    background-color: var(--light-primary);
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(240, 4, 128, 0.15);
}

.client-type-card.selected {
    border-color: var(--primary-color);
    background-color: var(--light-primary);
    box-shadow: 0 4px 15px rgba(240, 4, 128, 0.2);
}

.client-type-icon {
    font-size: 1.8rem;
    color: var(--secondary-color);
    margin-bottom: 0.5rem;
}

.client-type-card.selected .client-type-icon {
    color: var(--primary-color);
}

.client-type-card h6 {
    font-size: 0.9rem;
    font-weight: 700;
    margin-bottom: 0.25rem;
}

.client-type-card p {
    font-size: 0.75rem;
    margin-bottom: 0;
}

/* Info Box - Compact */
.info-box {
    background: linear-gradient(135deg, #e3f2fd 0%, #f3e5f5 100%);
    border-left: 4px solid #2196f3;
    padding: 0.75rem;
    border-radius: 6px;
    margin-top: 0.75rem;
    font-size: 0.8rem;
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

/* Form Navigation - Compact */
.form-navigation {
    display: flex;
    justify-content: space-between;
    margin-top: 1rem;
    padding-top: 1rem;
    border-top: 2px solid #e9ecef;
}

.input-icon {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--secondary-color);
    font-size: 0.9rem;
}

.has-icon {
    padding-left: 35px;
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

.breadcrumb-item.active {
    color: white !important;
}

/* Main Container - No Scroll */
.main {
    height: 100vh;
    overflow: hidden;
}

.content {
    height: calc(100vh - 60px);
    overflow-y: auto;
    padding: 1rem;
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
    
    .page-header {
        padding: 0.75rem;
    }
    
    .page-header-title {
        font-size: 1.1rem;
    }
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

.toast::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, transparent 0%, rgba(255,255,255,0.3) 50%, transparent 100%);
    animation: shimmer 2s infinite;
}

@keyframes shimmer {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}

.toast-success {
    border-left-color: var(--success-color);
    background: linear-gradient(135deg, #f0fff4 0%, #e6fffa 100%);
}

.toast-error {
    border-left-color: var(--danger-color);
    background: linear-gradient(135deg, #fef2f2 0%, #fef7f7 100%);
}

.toast-warning {
    border-left-color: var(--warning-color);
    background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
}

.toast-info {
    border-left-color: var(--info-color);
    background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
}

.toast-icon {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.9rem;
    font-weight: 700;
    flex-shrink: 0;
    margin-top: 0.125rem;
}

.toast-success .toast-icon {
    background: var(--success-color);
    color: white;
}

.toast-error .toast-icon {
    background: var(--danger-color);
    color: white;
}

.toast-warning .toast-icon {
    background: var(--warning-color);
    color: white;
}

.toast-info .toast-icon {
    background: var(--info-color);
    color: white;
}

.toast-content {
    flex: 1;
    min-width: 0;
}

.toast-title {
    font-weight: 700;
    font-size: 0.9rem;
    margin-bottom: 0.25rem;
    color: #1f2937;
}

.toast-message {
    font-size: 0.85rem;
    color: #6b7280;
    line-height: 1.4;
    margin: 0;
}

.toast-close {
    background: none;
    border: none;
    color: #9ca3af;
    font-size: 1.2rem;
    cursor: pointer;
    padding: 0;
    width: 20px;
    height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 4px;
    transition: all 0.2s ease;
    flex-shrink: 0;
}

.toast-close:hover {
    background: rgba(0,0,0,0.1);
    color: #374151;
}

.toast-progress {
    position: absolute;
    bottom: 0;
    left: 0;
    height: 3px;
    background: rgba(0,0,0,0.1);
    border-radius: 0 0 12px 12px;
    overflow: hidden;
}

.toast-progress-bar {
    height: 100%;
    background: linear-gradient(90deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    border-radius: 0 0 12px 12px;
    animation: progress 5s linear forwards;
}

@keyframes progress {
    from { width: 100%; }
    to { width: 0%; }
}

/* Mobile responsive */
@media (max-width: 768px) {
    .toast-container {
        top: 1rem;
        right: 1rem;
        left: 1rem;
        max-width: none;
    }
    
    .toast {
        padding: 0.875rem 1rem;
    }
    
    .toast-title {
        font-size: 0.85rem;
    }
    
    .toast-message {
        font-size: 0.8rem;
    }
}

/* Loading Overlay */
.loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    backdrop-filter: blur(5px);
}

.loading-content {
    background: white;
    padding: 2rem;
    border-radius: 15px;
    text-align: center;
    box-shadow: 0 15px 35px rgba(0,0,0,0.3);
}

.loading-spinner {
    width: 40px;
    height: 40px;
    border: 3px solid #f3f3f3;
    border-top: 3px solid var(--primary-color);
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin: 0 auto 1rem;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.fade-in {
    animation: fadeIn 0.4s ease-in;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

<main id="content" role="main" class="main font-public-sans">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header mb-3">
            <div class="row align-items-center">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/" class="text-primary-custom">Tableau de Bord</a></li>
                            <li class="breadcrumb-item"><a href="/clients" class="text-primary-custom">Clients</a></li>
                            <li class="breadcrumb-item active">Nouveau Client</li>
                        </ol>
                    </nav>
                    <h1 class="page-header-title text-secondary-custom">
                        <i class="bi-person-plus-fill me-2"></i>
                        Créer un Nouveau Client
                    </h1>
                    <p class="text-white-50 mb-0">Ajoutez un nouveau client en 4 étapes simples</p>
                </div>
                <div class="col-auto">
                    <a href="/liste-client" class="btn btn-outline-light btn-sm">
                        <i class="bi-arrow-left me-1"></i> Retour
                    </a>
                </div>
            </div>
        </div>

        <!-- Progress Bar -->
        <div class="progress-bar-custom">
            <div class="progress-bar-fill" id="progressBar" style="width: 25%"></div>
        </div>

        <!-- Steps Indicator -->
        <div class="steps-container">
            <div class="step-item active" data-step="1">
                <div class="step-number">1</div>
                <div class="step-label">Informations<br>de Base</div>
                <div class="step-line"></div>
            </div>
            <div class="step-item" data-step="2">
                <div class="step-number">2</div>
                <div class="step-label">Type de<br>Client</div>
                <div class="step-line"></div>
            </div>
            <div class="step-item" data-step="3">
                <div class="step-number">3</div>
                <div class="step-label">Adresse &<br>Contact</div>
                <div class="step-line"></div>
            </div>
            <div class="step-item" data-step="4">
                <div class="step-number">4</div>
                <div class="step-label">Conditions<br>Commerciales</div>
            </div>
        </div>

        <!-- Formulaire Multi-étapes -->
        <form id="clientForm">

            <!-- STEP 1: Informations de Base -->
            <div class="form-step active" data-step="1">
                <div class="form-section">
                    <div class="form-section-header">
                        <h5 class="mb-0 text-secondary-custom">
                            <i class="bi-info-circle-fill me-2"></i>
                            Informations de Base du Client
                        </h5>
                    </div>
                    <div class="form-section-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nameClient" class="form-label required-field">Nom du Client</label>
                                <div class="position-relative">
                                    <i class="bi-person input-icon"></i>
                                    <input type="text" class="form-control form-control-lg has-icon" id="nameClient"
                                        name="name_client" placeholder="Nom complet ou raison sociale" required>
                                </div>
                                <div class="form-text">Nom officiel tel qu'il apparaîtra sur les documents</div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="nameRepresentant" class="form-label">Nom du Représentant</label>
                                <div class="position-relative">
                                    <i class="bi-person-badge input-icon"></i>
                                    <input type="text" class="form-control form-control-lg has-icon"
                                        id="nameRepresentant" name="name_representant"
                                        placeholder="Personne de contact principale">
                                </div>
                                <div class="form-text">Contact principal chez le client</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="marketteur" class="form-label">Marketteur Assigné</label>
                                <div class="position-relative">
                                    <i class="bi-person-check input-icon"></i>
                                    <input type="text" class="form-control form-control-lg has-icon" id="marketteur"
                                        name="marketteur" placeholder="Commercial en charge">
                                </div>
                                <div class="form-text">Agent commercial responsable du compte</div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="ifu" class="form-label">Numéro IFU</label>
                                <div class="position-relative">
                                    <i class="bi-card-text input-icon"></i>
                                    <input type="text" class="form-control form-control-lg has-icon" id="ifu" name="ifu"
                                        placeholder="Identifiant Fiscal Unique" maxlength="13">
                                </div>
                                <div class="form-text">Identifiant fiscal à 13 chiffres</div>
                            </div>
                        </div>

                        <div class="info-box">
                            <small>
                                <i class="bi-lightbulb-fill me-2"></i>
                                <strong>Conseil :</strong> Assurez-vous que le nom du client est exact car il sera
                                utilisé dans toutes les factures et documents officiels.
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- STEP 2: Type de Client -->
            <div class="form-step" data-step="2">
                <div class="form-section">
                    <div class="form-section-header">
                        <h5 class="mb-0 text-secondary-custom">
                            <i class="bi-tags-fill me-2"></i>
                            Sélectionnez le Type de Client
                        </h5>
                    </div>
                    <div class="form-section-body">
                        <p class="text-muted mb-3">Choisissez la catégorie qui correspond le mieux à votre client. Cela
                            déterminera les conditions commerciales par défaut.</p>

                        <div class="row g-2">
                            <div class="col-md-3 col-sm-6">
                                <div class="client-type-card" data-type="0199a5c7-c6b0-72f4-a050-56c10dc7a258">
                                    <div class="client-type-icon">
                                        <i class="bi-calendar-check"></i>
                                    </div>
                                    <h6 class="fw-bold">Long Terme</h6>
                                    <p class="small text-muted mb-0">Contrat durable avec conditions préférentielles</p>
                                    <input type="radio" name="client_type_id"
                                        value="0199a5c7-c6b0-72f4-a050-56c10dc7a258" class="d-none" required>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div class="client-type-card" data-type="0199a5c9-21b3-734f-b30d-b71b01c4f7b7">
                                    <div class="client-type-icon">
                                        <i class="bi-calendar2-week"></i>
                                    </div>
                                    <h6 class="fw-bold">Court Terme</h6>
                                    <p class="small text-muted mb-0">Achats ponctuels ou saisonniers</p>
                                    <input type="radio" name="client_type_id"
                                        value="0199a5c9-21b3-734f-b30d-b71b01c4f7b7" class="d-none">
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div class="client-type-card" data-type="0199a5ca-c426-7246-b3f1-e7f1a79a9477">
                                    <div class="client-type-icon">
                                        <i class="bi-cash-coin"></i>
                                    </div>
                                    <h6 class="fw-bold">Comptant</h6>
                                    <p class="small text-muted mb-0">Paiement immédiat à la livraison</p>
                                    <input type="radio" name="client_type_id"
                                        value="0199a5ca-c426-7246-b3f1-e7f1a79a9477" class="d-none">
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div class="client-type-card" data-type="0199a5cc-186a-73d6-b840-7872901a0e30">
                                    <div class="client-type-icon">
                                        <i class="bi-exclamation-triangle"></i>
                                    </div>
                                    <h6 class="fw-bold">Litigieux</h6>
                                    <p class="small text-muted mb-0">Compte nécessitant une surveillance</p>
                                    <input type="radio" name="client_type_id"
                                        value="0199a5cc-186a-73d6-b840-7872901a0e30" class="d-none">
                                </div>
                            </div>
                        </div>

                        <div class="info-box mt-3">
                            <small>
                                <i class="bi-info-circle-fill me-2"></i>
                                <strong>À savoir :</strong> Le type de client influence la limite de crédit, le délai de
                                paiement et les réductions applicables.
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- STEP 3: Adresse & Contact -->
            <div class="form-step" data-step="3">
                <div class="form-section">
                    <div class="form-section-header">
                        <h5 class="mb-0 text-secondary-custom">
                            <i class="bi-geo-alt-fill me-2"></i>
                            Adresse et Coordonnées
                        </h5>
                    </div>
                    <div class="form-section-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="adresse" class="form-label">Adresse Complète</label>
                                <div class="position-relative">
                                    <i class="bi-house input-icon" style="top: 20px;"></i>
                                    <textarea class="form-control has-icon" id="adresse" name="adresse" rows="2"
                                        placeholder="Adresse de livraison et de facturation"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="city" class="form-label">Ville</label>
                                <div class="position-relative">
                                    <i class="bi-pin-map input-icon"></i>
                                    <input type="text" class="form-control form-control-lg has-icon" id="city" name="city"
                                        placeholder="Ville de résidence">
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Téléphone</label>
                                <div class="position-relative">
                                    <i class="bi-telephone input-icon"></i>
                                    <input type="tel" class="form-control form-control-lg has-icon" id="phone" name="phone"
                                        placeholder="Numéro de téléphone">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <div class="position-relative">
                                    <i class="bi-envelope input-icon"></i>
                                    <input type="email" class="form-control form-control-lg has-icon" id="email" name="email"
                                        placeholder="Adresse email">
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="website" class="form-label">Site Web</label>
                                <div class="position-relative">
                                    <i class="bi-globe input-icon"></i>
                                    <input type="url" class="form-control form-control-lg has-icon" id="website" name="website"
                                        placeholder="Site web (optionnel)">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- STEP 4: Conditions Commerciales -->
            <div class="form-step" data-step="4">
                <div class="form-section">
                    <div class="form-section-header">
                        <h5 class="mb-0 text-secondary-custom">
                            <i class="bi-credit-card-fill me-2"></i>
                            Conditions Commerciales
                        </h5>
                    </div>
                    <div class="form-section-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="limiteCredit" class="form-label">Limite de Crédit</label>
                                <div class="input-group">
                                    <input type="number" class="form-control form-control-lg" id="limiteCredit" name="limite_credit"
                                        placeholder="0" step="0.01" min="0">
                                    <span class="input-group-text">FCFA</span>
                                </div>
                                <div class="form-text">Montant maximum autorisé à crédit</div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="delaiPaiement" class="form-label">Délai de Paiement</label>
                                <div class="input-group">
                                    <input type="number" class="form-control form-control-lg" id="delaiPaiement" name="delai_paiement"
                                        placeholder="0" min="0">
                                    <span class="input-group-text">jours</span>
                                </div>
                                <div class="form-text">Nombre de jours pour le paiement</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="remise" class="form-label">Remise (%)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control form-control-lg" id="remise" name="remise"
                                        placeholder="0" step="0.01" min="0" max="100">
                                    <span class="input-group-text">%</span>
                                </div>
                                <div class="form-text">Pourcentage de remise accordé</div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="note" class="form-label">Notes</label>
                                <textarea class="form-control" id="note" name="note" rows="2"
                                    placeholder="Informations complémentaires sur le client..."></textarea>
                            </div>
                        </div>

                        <div class="info-box">
                            <small>
                                <i class="bi-info-circle-fill me-2"></i>
                                <strong>Note :</strong> Ces conditions peuvent être modifiées ultérieurement selon l'évolution de la relation commerciale.
                            </small>
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
                        <i class="bi-check-circle me-1"></i> Créer le Client
                    </button>
                </div>
            </div>
        </form>
    </div>
</main>

<!-- Toast Container -->
<div id="toastContainer" class="toast-container"></div>

<!-- Loading Overlay -->
<div id="loadingOverlay" class="loading-overlay" style="display: none;">
    <div class="loading-content">
        <div class="loading-spinner"></div>
        <div class="loading-text">Création du client en cours...</div>
    </div>
</div>

<script>
    let currentStep = 1;
    const totalSteps = 4;

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

        // Client type selection
        document.querySelectorAll('.client-type-card').forEach(card => {
            card.addEventListener('click', function() {
                // Remove selected class from all cards
                document.querySelectorAll('.client-type-card').forEach(c => c.classList.remove('selected'));
                
                // Add selected class to clicked card
                this.classList.add('selected');
                
                // Check the radio button
                const radio = this.querySelector('input[type="radio"]');
                radio.checked = true;
            });
        });

        // Form submission
        document.getElementById('clientForm').addEventListener('submit', function(e) {
            e.preventDefault();
            handleSubmit();
        });
    });

    function showStep(stepNumber) {
        console.log('Showing step:', stepNumber);
        
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
            console.log('Step element found and activated');
        } else {
            console.error('Step element not found for step:', stepNumber);
        }
        
        if (currentStepItem) {
            currentStepItem.classList.add('active');
            console.log('Step item found and activated');
        } else {
            console.error('Step item not found for step:', stepNumber);
        }

        // Mark previous steps as completed
        for (let i = 1; i < stepNumber; i++) {
            document.querySelector(`.step-item[data-step="${i}"]`).classList.add('completed');
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
        const currentStepElement = document.querySelector(`[data-step="${currentStep}"]`);
        const requiredFields = currentStepElement.querySelectorAll('[required]');
        
        for (let field of requiredFields) {
            if (!field.value.trim()) {
                field.focus();
                showToast('Erreur de validation', 'Veuillez remplir tous les champs obligatoires', 'error');
                return false;
            }
        }

        // Special validation for client type
        if (currentStep === 2) {
            const selectedType = document.querySelector('input[name="client_type_id"]:checked');
            if (!selectedType) {
                showToast('Sélection requise', 'Veuillez sélectionner un type de client', 'warning');
                return false;
            }
        }

        return true;
    }

    // Toast notification system
    function showToast(title, message, type = 'info', duration = 5000) {
        const toastContainer = document.getElementById('toastContainer');
        const toastId = 'toast-' + Date.now() + '-' + Math.random().toString(36).substr(2, 9);
        
        const icons = {
            success: '✓',
            error: '✕',
            warning: '⚠',
            info: 'ℹ'
        };
        
        const toast = document.createElement('div');
        toast.id = toastId;
        toast.className = `toast toast-${type}`;
        
        toast.innerHTML = `
            <div class="toast-icon">${icons[type] || icons.info}</div>
            <div class="toast-content">
                <div class="toast-title">${title}</div>
                <div class="toast-message">${message}</div>
            </div>
            <button class="toast-close" onclick="closeToast('${toastId}')">×</button>
            <div class="toast-progress">
                <div class="toast-progress-bar"></div>
            </div>
        `;
        
        toastContainer.appendChild(toast);
        
        // Trigger animation
        setTimeout(() => {
            toast.classList.add('show');
        }, 100);
        
        // Auto close
        if (duration > 0) {
            setTimeout(() => {
                closeToast(toastId);
            }, duration);
        }
        
        return toastId;
    }
    
    function closeToast(toastId) {
        const toast = document.getElementById(toastId);
        if (toast) {
            toast.classList.add('hide');
            setTimeout(() => {
                if (toast.parentNode) {
                    toast.parentNode.removeChild(toast);
                }
            }, 400);
        }
    }
    
    // Close all toasts
    function closeAllToasts() {
        const toasts = document.querySelectorAll('.toast');
        toasts.forEach(toast => {
            closeToast(toast.id);
        });
    }

    function showLoadingOverlay() {
        document.getElementById('loadingOverlay').style.display = 'flex';
    }

    function hideLoadingOverlay() {
        document.getElementById('loadingOverlay').style.display = 'none';
    }

    async function handleSubmit() {
        if (!validateCurrentStep()) {
            return;
        }

        showLoadingOverlay();

        try {
            const formData = new FormData(document.getElementById('clientForm'));
            const data = Object.fromEntries(formData.entries());

            const accessToken = getCookie('access_token');
            
            if (!accessToken) {
                throw new Error('Token d\'accès manquant. Veuillez vous reconnecter.');
            }

            const response = await fetch('https://toure.gestiem.com/api/clients', {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(data)
            });

            const result = await response.json();

            if (response.ok) {
                showToast('Succès !', 'Client créé avec succès !', 'success');
                setTimeout(() => {
                    window.location.href = '/liste-client';
                }, 2000);
            } else {
                let errorMessage = 'Erreur lors de la création du client';
                if (result.message) {
                    errorMessage = result.message;
                } else if (result.errors) {
                    const errorKeys = Object.keys(result.errors);
                    if (errorKeys.length > 0) {
                        errorMessage = result.errors[errorKeys[0]][0];
                    }
                }
                showToast('Erreur', errorMessage, 'error');
            }
        } catch (error) {
            console.error('Erreur:', error);
            showToast('Erreur de connexion', 'Veuillez réessayer.', 'error');
        } finally {
            hideLoadingOverlay();
        }
    }

    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }
</script>

<?php
$content = ob_get_clean();
require './views/layouts/app-layout.php';
?>