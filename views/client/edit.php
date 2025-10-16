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
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 120px;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .btn-primary-custom:hover {
        background-color: #d1036d;
        border-color: #d1036d;
        color: white;
        transform: translateY(-1px);
    }

    .card-custom {
        border-radius: 12px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        border: none;
    }

    .form-group-modern {
        margin-bottom: 1.5rem;
        display: flex;
        flex-direction: column;
    }

    .form-label-modern {
        font-weight: 600;
        color: var(--secondary-color);
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
        display: block;
        width: 100%;
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
        box-shadow: 0 0 0 0.2rem rgba(240, 4, 128, 0.25);
        background-color: #fff;
    }

    .form-control-modern.is-invalid {
        border-color: #dc3545;
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
    }

    .form-select-modern {
        appearance: none;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 0.75rem center;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
        padding-right: 2.5rem;
    }

    .form-check-modern {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1rem;
    }

    .form-check-input-modern {
        width: 1.25rem;
        height: 1.25rem;
        border: 2px solid #e9ecef;
        border-radius: 4px;
        background-color: #fff;
        cursor: pointer;
        position: relative;
        appearance: none;
        transition: all 0.3s ease;
    }

    .form-check-input-modern:checked {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .form-check-input-modern:checked::after {
        content: '✓';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-weight: bold;
        font-size: 0.875rem;
    }

    .form-check-label-modern {
        color: var(--secondary-color);
        font-weight: 500;
        cursor: pointer;
        margin-bottom: 0;
    }

    .invalid-feedback {
        display: block;
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }

    .alert {
        padding: 1rem 1.5rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        border: 1px solid transparent;
    }

    .alert-success {
        background-color: rgba(40, 167, 69, 0.1);
        color: #155724;
        border-color: rgba(40, 167, 69, 0.2);
    }

    .alert-danger {
        background-color: rgba(220, 53, 69, 0.1);
        color: #721c24;
        border-color: rgba(220, 53, 69, 0.2);
    }

    .alert-warning {
        background-color: rgba(255, 193, 7, 0.1);
        color: #856404;
        border-color: rgba(255, 193, 7, 0.2);
    }

    .btn-modern {
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        font-size: 1rem;
    }

    .btn-primary-modern {
        background-color: var(--primary-color);
        color: white;
        border: 2px solid var(--primary-color);
    }

    .btn-primary-modern:hover {
        background-color: #d1036d;
        border-color: #d1036d;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(240, 4, 128, 0.3);
    }

    .btn-outline-modern {
        background-color: transparent;
        color: var(--primary-color);
        border: 2px solid var(--primary-color);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        font-weight: 500;
        border-radius: 6px;
        transition: all 0.3s ease;
    }

    .btn-outline-modern:hover {
        background-color: var(--primary-color);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(240, 4, 128, 0.3);
    }

    .btn-secondary-modern {
        background-color: #6c757d;
        color: white;
        border: 2px solid #6c757d;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        font-weight: 500;
        border-radius: 6px;
        transition: all 0.3s ease;
    }

    .btn-secondary-modern:hover {
        background-color: #5a6268;
        border-color: #545b62;
        color: white;
        transform: translateY(-2px);
    }

    .loading-spinner {
        display: inline-block;
        width: 1rem;
        height: 1rem;
        border: 2px solid transparent;
        border-top: 2px solid currentColor;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
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

    .form-section .card-header {
        background: linear-gradient(135deg, var(--light-primary) 0%, #f8f9fa 100%);
        border-bottom: 1px solid #e9ecef;
        padding: 1.25rem 2rem;
        display: flex;
        align-items: center;
    }

    .form-section .card-title {
        font-weight: 600;
        color: var(--secondary-color);
        font-size: 1.1rem;
        margin: 0;
        display: flex;
        align-items: center;
    }

    .text-muted-custom {
        color: #6c757d !important;
        font-size: 0.875rem;
    }

    .client-types-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 1.5rem;
        margin-top: 1rem;
        align-items: stretch;
    }

    .client-type-card {
        border: 2px solid #e9ecef;
        border-radius: 12px;
        padding: 1.5rem 1rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        background: #fff;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 140px;
    }

    .client-type-card:hover {
        border-color: var(--primary-color);
        background: var(--light-primary);
        transform: translateY(-2px);
    }

    .client-type-card.selected {
        border-color: var(--primary-color);
        background: var(--light-primary);
    }

    .client-type-card input[type="radio"] {
        display: none;
    }

    .client-type-icon {
        font-size: 2.5rem;
        color: var(--primary-color);
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .client-type-name {
        font-weight: 600;
        color: var(--secondary-color);
        margin-bottom: 0.5rem;
        font-size: 1rem;
        line-height: 1.2;
    }

    .client-type-description {
        font-size: 0.875rem;
        color: #6c757d;
        line-height: 1.4;
        text-align: center;
        flex-grow: 1;
        display: flex;
        align-items: center;
    }

    @media (max-width: 768px) {
        .form-section .card-body {
            padding: 1rem;
        }
        
        .btn-modern {
            width: 100%;
            justify-content: center;
            margin-bottom: 0.5rem;
        }

        .client-types-grid {
            grid-template-columns: 1fr;
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
                            <li class="breadcrumb-item"><a class="breadcrumb-link text-primary-custom" href="/">Tableau
                                    de Bord</a></li>
                            <li class="breadcrumb-item"><a class="breadcrumb-link text-primary-custom"
                                    href="/liste-client">Clients</a></li>
                            <li class="breadcrumb-item active" id="clientNameBreadcrumb">Modifier</li>
                        </ol>
                    </nav>
                    <h2 class="mb-0 text-secondary-custom">Modifier le Client</h2>
                </div>
                <div class="col-sm-auto">
                    <button class="btn btn-secondary-modern me-2" onclick="window.history.back()">
                        <i class="bi-arrow-left me-1"></i> Retour
                    </button>
                    <button class="btn btn-outline-modern" onclick="window.location.href='/liste-client'">
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
            <p class="mt-3 text-muted">Chargement des données du client...</p>
        </div>

        <!-- Error State -->
        <div id="errorState" class="text-center py-5" style="display: none;">
            <i class="bi-exclamation-triangle fs-1 text-danger"></i>
            <p class="mt-3 text-danger" id="errorMessage">Erreur lors du chargement</p>
            <div class="d-flex gap-2 justify-content-center">
                <button class="btn btn-primary-custom" onclick="location.reload()">
                    <i class="bi-arrow-clockwise me-1"></i> Réessayer
                </button>
                <button class="btn btn-secondary-modern" onclick="window.location.href='/liste-client'">
                    <i class="bi-arrow-left me-1"></i> Retour à la liste
                </button>
            </div>
        </div>

        <!-- Form Container -->
        <div id="formContainer" style="display: none;">
            <!-- Alert Container -->
            <div id="alertContainer"></div>

            <form id="clientForm">
                <!-- Informations Générales -->
                <div class="form-section">
                    <div class="section-header">
                        <h5 class="section-title">
                            <i class="bi-person-vcard text-primary-custom"></i>
                            Informations Générales
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">
                                        Nom du client <span class="label-required"></span>
                                    </label>
                                    <input type="text" id="name_client" name="name_client" class="form-control-modern" 
                                           placeholder="Ex: ACME Corporation" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">Code du client</label>
                                    <input type="text" id="code" name="code" class="form-control-modern" 
                                           placeholder="Ex: CLT-ABC123" readonly>
                                    <small class="text-muted-custom">Généré automatiquement</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">Nom du représentant</label>
                                    <input type="text" id="name_representant" name="name_representant" class="form-control-modern" 
                                           placeholder="Ex: John Doe">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">Numéro IFU</label>
                                    <input type="text" id="ifu" name="ifu" class="form-control-modern" 
                                           placeholder="Ex: 12345678901234">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Type de Client -->
                <div class="form-section">
                    <div class="section-header">
                        <h5 class="section-title">
                            <i class="bi-tag text-primary-custom"></i>
                            Type de Client
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="client-types-grid">
                            <div class="client-type-card" onclick="selectClientType('long-terme')">
                                <input type="radio" id="long-terme" name="client_type_id" value="0199a5c7-c6b0-72f4-a050-56c10dc7a258">
                                <div class="client-type-icon">
                                    <i class="bi-calendar-range"></i>
                                </div>
                                <div class="client-type-name">Long terme</div>
                                <div class="client-type-description">Partenaires fidèles avec contrats étendus</div>
                            </div>
                            <div class="client-type-card" onclick="selectClientType('court-terme')">
                                <input type="radio" id="court-terme" name="client_type_id" value="0199a5c9-21b3-734f-b30d-b71b01c4f7b7">
                                <div class="client-type-icon">
                                    <i class="bi-calendar-week"></i>
                                </div>
                                <div class="client-type-name">Court terme</div>
                                <div class="client-type-description">Clients avec contrats courts</div>
                            </div>
                            <div class="client-type-card" onclick="selectClientType('comptant')">
                                <input type="radio" id="comptant" name="client_type_id" value="0199a5ca-c426-7246-b3f1-e7f1a79a9477">
                                <div class="client-type-icon">
                                    <i class="bi-cash"></i>
                                </div>
                                <div class="client-type-name">Comptant</div>
                                <div class="client-type-description">Paiement à la livraison</div>
                            </div>
                            <div class="client-type-card" onclick="selectClientType('litigieux')">
                                <input type="radio" id="litigieux" name="client_type_id" value="0199a5cc-186a-73d6-b840-7872901a0e30">
                                <div class="client-type-icon">
                                    <i class="bi-exclamation-triangle"></i>
                                </div>
                                <div class="client-type-name">Litigieux</div>
                                <div class="client-type-description">Clients avec problèmes de paiement</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Informations de Contact -->
                <div class="form-section">
                    <div class="section-header">
                        <h5 class="section-title">
                            <i class="bi-telephone text-primary-custom"></i>
                            Informations de Contact
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">Email</label>
                                    <input type="email" id="email" name="email" class="form-control-modern" 
                                           placeholder="Ex: contact@acme.com">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">Téléphone</label>
                                    <input type="tel" id="phonenumber" name="phonenumber" class="form-control-modern" 
                                           placeholder="Ex: +33123456789">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">Ville</label>
                                    <input type="text" id="city" name="city" class="form-control-modern" 
                                           placeholder="Ex: Paris">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">Marketteur assigné</label>
                                    <input type="text" id="marketteur" name="marketteur" class="form-control-modern" 
                                           placeholder="Ex: Jean Dupont">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">Adresse complète</label>
                                    <textarea id="adresse" name="adresse" class="form-control-modern" rows="3" 
                                              placeholder="Ex: 123 Main Street, 75001 Paris"></textarea>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Conditions Financières -->
                <div class="form-section">
                    <div class="section-header">
                        <h5 class="section-title">
                            <i class="bi-cash-stack text-primary-custom"></i>
                            Conditions Financières
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">Limite de crédit (FCFA)</label>
                                    <input type="number" id="credit_limit" name="credit_limit" class="form-control-modern" 
                                           placeholder="0" min="0" step="100">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">Solde actuel (FCFA)</label>
                                    <input type="number" id="current_balance" name="current_balance" class="form-control-modern" 
                                           placeholder="0" min="0" step="100">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">Réduction de base (%)</label>
                                    <input type="number" id="base_reduction" name="base_reduction" class="form-control-modern" 
                                           placeholder="0" min="0" max="100" step="0.1">
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
                            Statut
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group-modern">
                            <div class="form-check-modern">
                                <input type="checkbox" id="is_active" name="is_active" class="form-check-input-modern" checked>
                                <label class="form-check-label-modern" for="is_active">
                                    Client actif
                                </label>
                            </div>
                            <small class="text-muted-custom">
                                <i class="bi-info-circle me-1"></i>
                                Les clients inactifs ne peuvent pas recevoir de nouvelles factures
                            </small>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="form-section">
                    <div class="card-body">
                        <div class="d-flex gap-3 justify-content-end">
                            <button type="button" class="btn btn-secondary-modern" onclick="window.location.href='/liste-client'">
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

<script>
    let clientData = null;

    document.addEventListener('DOMContentLoaded', function() {
        // Extraire l'ID du client depuis l'URL
        const clientId = getClientIdFromUrl();
        
        if (!clientId || clientId === 'modifier') {
            showError('ID du client manquant dans l\'URL');
            return;
        }
        
        loadClientData(clientId);
        setupEventListeners();
    });

    function getClientIdFromUrl() {
        const pathParts = window.location.pathname.split('/');
        if (pathParts.includes('client') && pathParts.length > 2) {
            const clientIndex = pathParts.indexOf('client');
            return pathParts[clientIndex + 1];
        }
        return pathParts[pathParts.length - 1];
    }

    async function loadClientData(clientId) {
        try {
            // Récupérer le token d'authentification
            const accessToken = localStorage.getItem('access_token');
            
            const headers = {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            };
            
            if (accessToken) {
                headers['Authorization'] = `Bearer ${accessToken}`;
            }
            
            const response = await fetch(`https://toure.gestiem.com/api/clients/${clientId}?with_client_type=1`, {
                headers: headers
            });

            if (response.ok) {
                const result = await response.json();
                clientData = result.data;
                populateForm(clientData);
                
                document.getElementById('loadingState').style.display = 'none';
                document.getElementById('formContainer').style.display = 'block';
                
                document.getElementById('clientNameBreadcrumb').textContent = clientData.name_client;
                document.title = `Modifier ${clientData.name_client} - Clients`;
            } else if (response.status === 404) {
                showError(`Client avec l'ID "${clientId}" non trouvé`);
            } else {
                showError('Erreur lors du chargement des informations');
            }
        } catch (error) {
            console.error('Error:', error);
            showError('Erreur de connexion au serveur');
        }
    }

    function populateForm(client) {
        document.getElementById('name_client').value = client.name_client || '';
        document.getElementById('code').value = client.code || '';
        document.getElementById('name_representant').value = client.name_representant || '';
        document.getElementById('ifu').value = client.ifu || '';
        document.getElementById('email').value = client.email || '';
        document.getElementById('phonenumber').value = client.phonenumber || '';
        document.getElementById('city').value = client.city || '';
        document.getElementById('marketteur').value = client.marketteur || '';
        document.getElementById('adresse').value = client.adresse || '';
        document.getElementById('credit_limit').value = client.credit_limit || 0;
        document.getElementById('current_balance').value = client.current_balance || 0;
        document.getElementById('base_reduction').value = client.base_reduction || 0;
        document.getElementById('is_active').checked = client.is_active !== false;
        
        // Sélectionner le type de client
        if (client.client_type_id) {
            const typeName = getClientTypeName(client.client_type_id);
            if (typeName) {
                selectClientType(typeName);
            } else {
                console.warn('Type de client non reconnu:', client.client_type_id);
            }
        }
    }

    function getClientTypeName(typeId) {
        const types = {
            '0199a5c7-c6b0-72f4-a050-56c10dc7a258': 'long-terme',
            '0199a5c9-21b3-734f-b30d-b71b01c4f7b7': 'court-terme',
            '0199a5ca-c426-7246-b3f1-e7f1a79a9477': 'comptant',
            '0199a5cc-186a-73d6-b840-7872901a0e30': 'litigieux'
        };
        return types[typeId] || '';
    }

    function selectClientType(typeName) {
        // Vérifier que typeName n'est pas vide
        if (!typeName || typeName.trim() === '') {
            console.warn('Type de client vide ou invalide:', typeName);
            return;
        }
        
        // Désélectionner tous les types
        document.querySelectorAll('.client-type-card').forEach(card => {
            card.classList.remove('selected');
        });
        
        // Vérifier que l'élément existe avant de le sélectionner
        const element = document.getElementById(typeName);
        if (!element) {
            console.warn('Élément non trouvé pour le type:', typeName);
            return;
        }
        
        // Sélectionner le type choisi
        const selectedCard = element.closest('.client-type-card');
        if (selectedCard) {
            selectedCard.classList.add('selected');
        }
        
        // Cocher la radio
        element.checked = true;
    }

    function setupEventListeners() {
        const form = document.getElementById('clientForm');
        form.addEventListener('submit', handleSubmit);
        
        // Validation en temps réel
        const inputs = form.querySelectorAll('input[required], textarea[required]');
        inputs.forEach(input => {
            input.addEventListener('blur', validateField);
            input.addEventListener('input', clearValidation);
        });
    }

    function validateField(e) {
        const field = e.target;
        const value = field.value.trim();
        
        if (field.hasAttribute('required') && !value) {
            showFieldError(field, 'Ce champ est obligatoire');
            return false;
        }
        
        if (field.type === 'email' && value && !isValidEmail(value)) {
            showFieldError(field, 'Adresse email invalide');
            return false;
        }
        
        clearFieldError(field);
        return true;
    }

    function clearValidation(e) {
        const field = e.target;
        if (field.classList.contains('is-invalid')) {
            clearFieldError(field);
        }
    }

    function showFieldError(field, message) {
        field.classList.add('is-invalid');
        const feedback = field.parentNode.querySelector('.invalid-feedback');
        if (feedback) {
            feedback.textContent = message;
        }
    }

    function clearFieldError(field) {
        field.classList.remove('is-invalid');
        const feedback = field.parentNode.querySelector('.invalid-feedback');
        if (feedback) {
            feedback.textContent = '';
        }
    }

    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    async function handleSubmit(e) {
        e.preventDefault();
        
        const form = e.target;
        const formData = new FormData(form);
        
        // Validation de tous les champs requis
        let isValid = true;
        const requiredFields = form.querySelectorAll('input[required], textarea[required]');
        
        requiredFields.forEach(field => {
            if (!validateField({ target: field })) {
                isValid = false;
            }
        });
        
        if (!isValid) {
            showAlert('Veuillez corriger les erreurs dans le formulaire', 'danger');
            return;
        }
        
        const submitBtn = document.getElementById('submitBtn');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<span class="loading-spinner me-2"></span>Enregistrement...';
        submitBtn.disabled = true;
        
        try {
            const clientId = getClientIdFromUrl();
            
            const data = {
                name_client: formData.get('name_client'),
                name_representant: formData.get('name_representant'),
                ifu: formData.get('ifu'),
                email: formData.get('email'),
                phonenumber: formData.get('phonenumber'),
                city: formData.get('city'),
                marketteur: formData.get('marketteur'),
                adresse: formData.get('adresse'),
                credit_limit: parseFloat(formData.get('credit_limit')) || 0,
                current_balance: parseFloat(formData.get('current_balance')) || 0,
                base_reduction: parseFloat(formData.get('base_reduction')) || 0,
                client_type_id: formData.get('client_type_id'),
                is_active: formData.get('is_active') === 'on'
            };
            
            // Nettoyer les données vides
            Object.keys(data).forEach(key => {
                if (data[key] === '' || data[key] === null) {
                    data[key] = null;
                }
            });
            
            console.log('Données à envoyer:', data);
            
            // Récupérer le token d'authentification
            const accessToken = localStorage.getItem('access_token');
            
            const headers = {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            };
            
            if (accessToken) {
                headers['Authorization'] = `Bearer ${accessToken}`;
            }
            
            const response = await fetch(`https://toure.gestiem.com/api/clients/${clientId}`, {
                method: 'PUT',
                headers: headers,
                body: JSON.stringify(data)
            });
            
            const result = await response.json();
            
            if (response.ok) {
                showAlert('Client modifié avec succès !', 'success');
                
                // Redirection après 2 secondes
                setTimeout(() => {
                    window.location.href = `/client/${clientId}/details`;
                }, 2000);
            } else {
                if (response.status === 422) {
                    // Erreurs de validation
                    if (result.errors) {
                        Object.keys(result.errors).forEach(field => {
                            const input = document.getElementById(field);
                            if (input) {
                                showFieldError(input, result.errors[field][0]);
                            }
                        });
                    }
                    throw new Error(result.message || 'Erreurs de validation');
                }
                throw new Error(result.message || 'Erreur lors de la mise à jour du client');
            }
        } catch (error) {
            console.error('Erreur:', error);
            showAlert('Erreur lors de la modification: ' + error.message, 'danger');
        } finally {
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }
    }

    function showAlert(message, type) {
        const alertContainer = document.getElementById('alertContainer');
        const alertId = 'alert-' + Date.now();
        
        const alertHtml = `
            <div id="${alertId}" class="alert alert-${type} alert-dismissible fade show" role="alert">
                <i class="bi bi-${type === 'success' ? 'check-circle' : type === 'danger' ? 'exclamation-triangle' : 'info-circle'}"></i>
                ${message}
                <button type="button" class="btn-close" onclick="closeAlert('${alertId}')" aria-label="Close"></button>
            </div>
        `;
        
        alertContainer.innerHTML = alertHtml;
        
        // Auto-close after 5 seconds
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

    function showError(message) {
        document.getElementById('loadingState').style.display = 'none';
        document.getElementById('errorMessage').textContent = message;
        document.getElementById('errorState').style.display = 'block';
    }
</script>

<?php
$content = ob_get_clean();
require('./views/layouts/app-layout.php');
?>
