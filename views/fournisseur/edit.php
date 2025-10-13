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
        box-shadow: 0 0 0 0.2rem rgba(240, 4, 128, 0.25);
        background-color: #fff;
    }

    .form-control-modern.is-invalid {
        border-color: #dc3545;
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
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
        border-radius: 8px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        margin-bottom: 2rem;
        overflow: hidden;
    }

    .form-section .card-body {
        padding: 1.5rem;
    }

    .text-muted-custom {
        color: #6c757d !important;
        font-size: 0.875rem;
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
                                    href="/fournisseurs">Fournisseurs</a></li>
                            <li class="breadcrumb-item active" id="fournisseurNameBreadcrumb">Modifier</li>
                        </ol>
                    </nav>
                    <h2 class="mb-0 text-secondary-custom">Modifier le Fournisseur</h2>
                </div>
                <div class="col-sm-auto">
                    <button class="btn btn-secondary-modern me-2" onclick="window.history.back()">
                        <i class="bi-arrow-left me-1"></i> Retour
                    </button>
                    <button class="btn btn-outline-modern" onclick="window.location.href='/fournisseurs'">
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
            <p class="mt-3 text-muted">Chargement des données du fournisseur...</p>
        </div>

        <!-- Error State -->
        <div id="errorState" class="text-center py-5" style="display: none;">
            <i class="bi-exclamation-triangle fs-1 text-danger"></i>
            <p class="mt-3 text-danger" id="errorMessage">Erreur lors du chargement</p>
            <div class="d-flex gap-2 justify-content-center">
                <button class="btn btn-primary-custom" onclick="location.reload()">
                    <i class="bi-arrow-clockwise me-1"></i> Réessayer
                </button>
                <button class="btn btn-secondary-modern" onclick="window.location.href='/fournisseurs'">
                    <i class="bi-arrow-left me-1"></i> Retour à la liste
                </button>
            </div>
        </div>

        <!-- Form Container -->
        <div id="formContainer" style="display: none;">
            <!-- Alert Container -->
            <div id="alertContainer"></div>

            <form id="fournisseurForm">
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
                                        Nom du fournisseur <span class="label-required"></span>
                                    </label>
                                    <input type="text" id="name" name="name" class="form-control-modern" 
                                           placeholder="Ex: ACME Corporation" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">Code du fournisseur</label>
                                    <input type="text" id="code" name="code" class="form-control-modern" 
                                           placeholder="Ex: FRN-ABC123" readonly>
                                    <small class="text-muted-custom">Généré automatiquement</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">Responsable</label>
                                    <input type="text" id="responsable" name="responsable" class="form-control-modern" 
                                           placeholder="Ex: John Doe">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">Conditions de paiement</label>
                                    <input type="text" id="payment_terms" name="payment_terms" class="form-control-modern" 
                                           placeholder="Ex: 30 jours">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group-modern">
                                    <div class="form-check-modern">
                                        <input type="checkbox" id="is_active" name="is_active" class="form-check-input-modern" checked>
                                        <label class="form-check-label-modern" for="is_active">
                                            Fournisseur actif
                                        </label>
                                    </div>
                                    <small class="text-muted-custom">
                                        <i class="bi-info-circle me-1"></i>
                                        Les fournisseurs inactifs ne peuvent pas recevoir de nouvelles commandes
                                    </small>
                                </div>
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
                                    <input type="tel" id="phone" name="phone" class="form-control-modern" 
                                           placeholder="Ex: +33123456789">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Adresse -->
                <div class="form-section">
                    <div class="section-header">
                        <h5 class="section-title">
                            <i class="bi-geo-alt text-primary-custom"></i>
                            Adresse
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">Adresse complète</label>
                                    <textarea id="adresse" name="adresse" class="form-control-modern" rows="3" 
                                              placeholder="Ex: 123 Main Street, 75001 Paris"></textarea>
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
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="form-section">
                    <div class="card-body">
                        <div class="d-flex gap-3 justify-content-end">
                            <button type="button" class="btn btn-secondary-modern" onclick="window.location.href='/fournisseurs'">
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
    let fournisseurData = null;

    document.addEventListener('DOMContentLoaded', function() {
        // Extraire l'ID du fournisseur depuis l'URL
        const fournisseurId = getFournisseurIdFromUrl();
        
        if (!fournisseurId || fournisseurId === 'edit') {
            showError('ID du fournisseur manquant dans l\'URL');
            return;
        }
        
        loadFournisseurData(fournisseurId);
        setupEventListeners();
    });

    function getFournisseurIdFromUrl() {
        const pathParts = window.location.pathname.split('/');
        if (pathParts.includes('fournisseur') && pathParts.length > 2) {
            const fournisseurIndex = pathParts.indexOf('fournisseur');
            return pathParts[fournisseurIndex + 1];
        }
        return pathParts[pathParts.length - 1];
    }

    async function loadFournisseurData(fournisseurId) {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            if (!accessToken) {
                window.location.href = '/login';
                return;
            }

            console.log('Chargement des données pour le fournisseur:', fournisseurId);
            const response = await fetch(`https://toure.gestiem.com/api/fournisseurs/${fournisseurId}`, {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            if (response.ok) {
                const result = await response.json();
                fournisseurData = result;
                populateForm(result);
                
                document.getElementById('loadingState').style.display = 'none';
                document.getElementById('formContainer').style.display = 'block';
                
                document.getElementById('fournisseurNameBreadcrumb').textContent = result.name;
                document.title = `Modifier ${result.name} - Fournisseurs`;
            } else if (response.status === 404) {
                showError(`Fournisseur avec l'ID "${fournisseurId}" non trouvé`);
            } else if (response.status === 401) {
                window.location.href = '/login';
                return;
            } else {
                const errorResult = await response.json().catch(() => ({ message: 'Erreur inconnue' }));
                showError(`Erreur ${response.status}: ${errorResult.message || 'Erreur lors du chargement des données'}`);
            }
        } catch (error) {
            console.error('Erreur:', error);
            showError('Erreur de connexion au serveur');
        }
    }

    function populateForm(fournisseur) {
        document.getElementById('name').value = fournisseur.name || '';
        document.getElementById('code').value = fournisseur.code || '';
        document.getElementById('responsable').value = fournisseur.responsable || '';
        document.getElementById('email').value = fournisseur.email || '';
        document.getElementById('phone').value = fournisseur.phone || '';
        document.getElementById('city').value = fournisseur.city || '';
        document.getElementById('adresse').value = fournisseur.adresse || '';
        document.getElementById('payment_terms').value = fournisseur.payment_terms || '';
        document.getElementById('is_active').checked = fournisseur.is_active !== false;
    }

    function setupEventListeners() {
        const form = document.getElementById('fournisseurForm');
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
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            const fournisseurId = getFournisseurIdFromUrl();
            
            const data = {
                name: formData.get('name'),
                responsable: formData.get('responsable'),
                email: formData.get('email'),
                phone: formData.get('phone'),
                city: formData.get('city'),
                adresse: formData.get('adresse'),
                payment_terms: formData.get('payment_terms'),
                is_active: formData.get('is_active') === 'on'
            };
            
            // Nettoyer les données vides
            Object.keys(data).forEach(key => {
                if (data[key] === '' || data[key] === null) {
                    data[key] = null;
                }
            });
            
            console.log('Données à envoyer:', data);
            
            const response = await fetch(`https://toure.gestiem.com/api/fournisseurs/${fournisseurId}`, {
                method: 'PUT',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(data)
            });
            
            const result = await response.json();
            
            if (!response.ok) {
                if (response.status === 401) {
                    window.location.href = '/login';
                    return;
                }
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
                throw new Error(result.message || 'Erreur lors de la mise à jour du fournisseur');
            }
            
            showAlert('Fournisseur modifié avec succès !', 'success');
            
            // Redirection après 2 secondes
            setTimeout(() => {
                window.location.href = `/fournisseur/${fournisseurId}/details`;
            }, 2000);
            
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