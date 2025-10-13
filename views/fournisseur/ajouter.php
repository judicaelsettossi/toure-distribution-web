<?php ob_start(); ?>

<style>
    :root {
        --primary-color: #f00480;
        --secondary-color: #010768;
        --accent-color: #010068;
        --light-primary: rgba(240, 4, 128, 0.1);
        --light-secondary: rgba(1, 7, 104, 0.1);
        --success-color: #10b981;
        --warning-color: #f59e0b;
        --danger-color: #ef4444;
        --info-color: #3b82f6;
    }

    .font-public-sans {
        font-family: 'Public Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    }

    /* Fix chevauchement */
    .add-fournisseur-wrapper {
        margin-left: 250px;
        margin-top: 70px;
        padding: 2rem;
        min-height: calc(100vh - 70px);
        background: #f8f9fa;
    }

    @media (max-width: 991px) {
        .add-fournisseur-wrapper {
            margin-left: 0;
            margin-top: 60px;
            padding: 1rem;
        }
    }

    /* Header */
    .add-fournisseur-header {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .add-fournisseur-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, var(--success-color) 0%, #059669 100%);
    }

    .add-fournisseur-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--secondary-color);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .add-fournisseur-icon {
        width: 60px;
        height: 60px;
        border-radius: 15px;
        background: linear-gradient(135deg, var(--success-color), #059669);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
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

    /* Buttons */
    .btn-modern {
        padding: 0.75rem 2rem;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.95rem;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
    }

    .btn-success-modern {
        background: linear-gradient(135deg, var(--success-color), #059669);
        color: white;
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
    }

    .btn-success-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(16, 185, 129, 0.4);
    }

    .btn-outline-modern {
        background: white;
        color: var(--secondary-color);
        border: 2px solid var(--secondary-color);
    }

    .btn-outline-modern:hover {
        background: var(--secondary-color);
        color: white;
        transform: translateY(-2px);
    }

    .btn-secondary-modern {
        background: #6b7280;
        color: white;
    }

    .btn-secondary-modern:hover {
        background: #4b5563;
        transform: translateY(-2px);
    }

    /* Form actions */
    .form-actions {
        display: flex;
        gap: 1rem;
        justify-content: flex-end;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 2px solid #f0f0f0;
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
        
        .add-fournisseur-title {
            font-size: 2rem;
        }
    }
</style>

<div class="add-fournisseur-wrapper font-public-sans">
    <!-- Header -->
    <div class="add-fournisseur-header fade-in">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="add-fournisseur-title">
                <div class="add-fournisseur-icon">
                    <i class="bi bi-truck"></i>
                </div>
                Nouveau Fournisseur
            </h1>
            <a href="/fournisseurs" class="btn-modern btn-outline-modern">
                <i class="bi bi-arrow-left"></i> Retour
            </a>
        </div>
        <p class="text-muted mb-0">Ajoutez un nouveau fournisseur à votre système</p>
    </div>

    <!-- Alerts -->
    <div id="alertContainer"></div>

    <!-- Form -->
    <form id="addFournisseurForm" class="form-container fade-in">
        <!-- Section Informations générales -->
        <div class="form-section">
            <h3 class="section-title">
                <div class="section-icon">
                    <i class="bi bi-info-circle"></i>
                </div>
                Informations Générales
            </h3>

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
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group-modern">
                        <label class="form-label-modern">Email</label>
                        <div class="input-with-icon">
                            <input type="email" id="email" class="form-control-modern with-icon" placeholder="contact@example.com">
                            <span class="input-icon"><i class="bi bi-envelope"></i></span>
                        </div>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group-modern">
                        <label class="form-label-modern">Téléphone</label>
                        <div class="input-with-icon">
                            <input type="tel" id="phone" class="form-control-modern with-icon" placeholder="+225123456789">
                            <span class="input-icon"><i class="bi bi-telephone"></i></span>
                        </div>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Adresse -->
        <div class="form-section">
            <h3 class="section-title">
                <div class="section-icon">
                    <i class="bi bi-geo-alt"></i>
                </div>
                Adresse
            </h3>

            <div class="form-group-modern">
                <label class="form-label-modern">Adresse complète</label>
                <textarea id="adresse" class="form-control-modern" rows="3" placeholder="123 Main Street, Building A"></textarea>
                <div class="invalid-feedback"></div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group-modern">
                        <label class="form-label-modern">Ville</label>
                        <input type="text" id="city" class="form-control-modern" placeholder="Ex: Paris">
                        <div class="invalid-feedback"></div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group-modern">
                        <label class="form-label-modern">Conditions de paiement</label>
                        <select id="paymentTerms" class="form-control-modern form-select-modern">
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

        <!-- Section Statut -->
        <div class="form-section">
            <h3 class="section-title">
                <div class="section-icon">
                    <i class="bi bi-toggle-on"></i>
                </div>
                Statut
            </h3>

            <div class="form-group-modern">
                <div class="d-flex align-items-center">
                    <label class="toggle-switch">
                        <input type="checkbox" id="isActive" checked>
                        <span class="slider"></span>
                    </label>
                    <span class="toggle-label">Fournisseur actif</span>
                </div>
                <small class="text-muted">Un fournisseur actif peut être utilisé dans les commandes et mouvements de stock</small>
            </div>
        </div>

        <!-- Actions -->
        <div class="form-actions">
            <button type="button" class="btn-modern btn-secondary-modern" onclick="resetForm()">
                <i class="bi bi-arrow-clockwise"></i>
                Réinitialiser
            </button>
            <button type="submit" class="btn-modern btn-success-modern">
                <i class="bi bi-check-circle"></i>
                Créer le Fournisseur
            </button>
        </div>
    </form>
</div>

<!-- Loading Overlay -->
<div id="loadingOverlay" class="loading-overlay" style="display: none;">
    <div class="loading-content">
        <div class="loading-spinner"></div>
        <div class="loading-text">Création du fournisseur...</div>
    </div>
</div>

<script>
    let formModified = false;

    document.addEventListener('DOMContentLoaded', function() {
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
                email: document.getElementById('email').value.trim(),
                phone: document.getElementById('phone').value.trim(),
                adresse: document.getElementById('adresse').value.trim(),
                city: document.getElementById('city').value.trim(),
                payment_terms: document.getElementById('paymentTerms').value,
                is_active: document.getElementById('isActive').checked
            };

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

    function resetForm() {
        document.getElementById('addFournisseurForm').reset();
        document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        document.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');
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
