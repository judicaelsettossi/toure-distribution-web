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

.btn-secondary-custom {
    background-color: var(--secondary-color);
    border-color: var(--secondary-color);
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

.btn-secondary-custom:hover {
    background-color: #020a7a;
    border-color: #020a7a;
    color: white;
    transform: translateY(-1px);
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

/* Page Header */
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

.page-header-title {
    font-size: 1.75rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
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

/* Form Container */
.form-container {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
    overflow: hidden;
}

.form-header {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 1.5rem 2rem;
    border-bottom: 1px solid #e9ecef;
}

.form-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--secondary-color);
    margin: 0;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.form-body {
    padding: 2rem;
}

/* Form Elements */
.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    font-weight: 600;
    color: #495057;
    margin-bottom: 0.5rem;
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.form-control {
    border: 1px solid #e9ecef;
    border-radius: 8px;
    padding: 0.75rem 1rem;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    background-color: #fff;
}

.form-control:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(240, 4, 128, 0.25);
    background-color: #fff;
}

.form-control.is-invalid {
    border-color: #dc3545;
}

.invalid-feedback {
    display: block;
    width: 100%;
    margin-top: 0.25rem;
    font-size: 0.8rem;
    color: #dc3545;
}

/* Password Strength Indicator */
.password-strength {
    margin-top: 0.5rem;
}

.strength-bar {
    height: 4px;
    background-color: #e9ecef;
    border-radius: 2px;
    overflow: hidden;
    margin-bottom: 0.5rem;
}

.strength-fill {
    height: 100%;
    width: 0%;
    transition: all 0.3s ease;
    border-radius: 2px;
}

.strength-weak { background-color: #dc3545; }
.strength-fair { background-color: #ffc107; }
.strength-good { background-color: #17a2b8; }
.strength-strong { background-color: #28a745; }

.strength-text {
    font-size: 0.8rem;
    font-weight: 500;
}

/* Form Actions */
.form-actions {
    background: #f8f9fa;
    padding: 1.5rem 2rem;
    border-top: 1px solid #e9ecef;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.form-actions .text-muted {
    font-size: 0.85rem;
    margin: 0;
}

.form-actions .btn-group {
    display: flex;
    gap: 0.75rem;
    flex-wrap: wrap;
}

/* Loading States */
.btn-loading {
    position: relative;
    pointer-events: none;
}

.btn-loading::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 16px;
    height: 16px;
    margin: -8px 0 0 -8px;
    border: 2px solid transparent;
    border-top: 2px solid currentColor;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
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

/* Responsive */
@media (max-width: 768px) {
    .page-header {
        padding: 1.5rem;
    }
    
    .form-body {
        padding: 1.5rem;
    }
    
    .form-actions {
        padding: 1rem 1.5rem;
        flex-direction: column;
        align-items: stretch;
    }
    
    .form-actions .btn-group {
        justify-content: center;
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
                            <li class="breadcrumb-item"><a class="breadcrumb-link text-white" href="/utilisateurs">Utilisateurs</a></li>
                            <li class="breadcrumb-item active">Nouvel Utilisateur</li>
                        </ol>
                    </nav>
                    <h1 class="page-header-title">
                        <i class="bi-person-plus me-2"></i>Créer un Nouvel Utilisateur
                    </h1>
                    <p class="mb-0">Ajoutez un nouveau compte utilisateur au système</p>
                </div>

                <div class="col-sm-auto">
                    <a class="btn btn-light" href="/utilisateurs">
                        <i class="bi-arrow-left me-1"></i> Retour à la liste
                    </a>
                </div>
            </div>
        </div>

        <!-- Form Container -->
        <div class="form-container">
            <div class="form-header">
                <h2 class="form-title">
                    <i class="bi-person-badge me-2"></i>Informations de l'Utilisateur
                </h2>
            </div>

            <form id="createUserForm" class="form-body">
                <div class="row">
                    <!-- Informations Personnelles -->
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname" class="form-label">
                                        <i class="bi-person me-1"></i>Prénom *
                                    </label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname" class="form-label">
                                        <i class="bi-person me-1"></i>Nom de famille *
                                    </label>
                                    <input type="text" class="form-control" id="lastname" name="lastname" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username" class="form-label">
                                        <i class="bi-at me-1"></i>Nom d'utilisateur *
                                    </label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-label">
                                        <i class="bi-envelope me-1"></i>Adresse email *
                                    </label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phonenumber" class="form-label">
                                        <i class="bi-telephone me-1"></i>Numéro de téléphone
                                    </label>
                                    <input type="tel" class="form-control" id="phonenumber" name="phonenumber">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="poste" class="form-label">
                                        <i class="bi-briefcase me-1"></i>Poste/Fonction
                                    </label>
                                    <input type="text" class="form-control" id="poste" name="poste">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mot de passe -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="password" class="form-label">
                                <i class="bi-lock me-1"></i>Mot de passe *
                            </label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <div class="password-strength">
                                <div class="strength-bar">
                                    <div class="strength-fill" id="strengthFill"></div>
                                </div>
                                <div class="strength-text" id="strengthText">Saisissez un mot de passe</div>
                            </div>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="form-label">
                                <i class="bi-lock-fill me-1"></i>Confirmer le mot de passe *
                            </label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="alert alert-info">
                            <i class="bi-info-circle me-2"></i>
                            <strong>Exigences du mot de passe :</strong>
                            <ul class="mb-0 mt-2">
                                <li>Minimum 8 caractères</li>
                                <li>Au moins une majuscule</li>
                                <li>Au moins une minuscule</li>
                                <li>Au moins un chiffre</li>
                                <li>Au moins un symbole</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Form Actions -->
            <div class="form-actions">
                <div class="text-muted">
                    <i class="bi-info-circle me-1"></i>
                    Les champs marqués d'un * sont obligatoires
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-modern" onclick="window.location.href='/utilisateurs'">
                        <i class="bi-x-lg me-1"></i> Annuler
                    </button>
                    <button type="submit" class="btn btn-primary-custom" id="saveBtn" form="createUserForm">
                        <i class="bi-check-lg me-1"></i> Créer l'Utilisateur
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Toast Container -->
<div id="toastContainer"></div>

<script>
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

        setupEventListeners();
    });

    function setupEventListeners() {
        // Form submission
        document.getElementById('createUserForm').addEventListener('submit', handleSubmit);

        // Password strength indicator
        document.getElementById('password').addEventListener('input', updatePasswordStrength);
        document.getElementById('password_confirmation').addEventListener('input', validatePasswordConfirmation);
    }

    // Fonction pour calculer la force du mot de passe
    function updatePasswordStrength() {
        const password = document.getElementById('password').value;
        const strengthFill = document.getElementById('strengthFill');
        const strengthText = document.getElementById('strengthText');
        
        let strength = 0;
        let strengthLabel = '';
        let strengthClass = '';
        
        if (password.length >= 8) strength += 1;
        if (/[a-z]/.test(password)) strength += 1;
        if (/[A-Z]/.test(password)) strength += 1;
        if (/[0-9]/.test(password)) strength += 1;
        if (/[^A-Za-z0-9]/.test(password)) strength += 1;
        
        switch (strength) {
            case 0:
            case 1:
                strengthLabel = 'Très faible';
                strengthClass = 'strength-weak';
                break;
            case 2:
                strengthLabel = 'Faible';
                strengthClass = 'strength-fair';
                break;
            case 3:
                strengthLabel = 'Moyen';
                strengthClass = 'strength-good';
                break;
            case 4:
            case 5:
                strengthLabel = 'Fort';
                strengthClass = 'strength-strong';
                break;
        }
        
        const percentage = (strength / 5) * 100;
        strengthFill.style.width = percentage + '%';
        strengthFill.className = 'strength-fill ' + strengthClass;
        strengthText.textContent = strengthLabel;
    }

    // Fonction pour valider la confirmation du mot de passe
    function validatePasswordConfirmation() {
        const password = document.getElementById('password').value;
        const confirmation = document.getElementById('password_confirmation').value;
        const confirmationField = document.getElementById('password_confirmation');
        
        if (confirmation && password !== confirmation) {
            confirmationField.setCustomValidity('Les mots de passe ne correspondent pas');
            confirmationField.classList.add('is-invalid');
        } else {
            confirmationField.setCustomValidity('');
            confirmationField.classList.remove('is-invalid');
        }
    }

    async function handleSubmit(e) {
        e.preventDefault();
        
        const saveBtn = document.getElementById('saveBtn');
        const originalText = saveBtn.innerHTML;
        
        try {
            // Désactiver le bouton et afficher le loading
            saveBtn.disabled = true;
            saveBtn.classList.add('btn-loading');
            saveBtn.innerHTML = '<i class="bi-hourglass-split me-1"></i> Création...';
            
            // Récupérer les données du formulaire
            const formData = new FormData(e.target);
            const data = Object.fromEntries(formData.entries());
            
            // Validation côté client
            if (!data.firstname || !data.lastname || !data.username || !data.email || !data.password || !data.password_confirmation) {
                throw new Error('Veuillez remplir tous les champs obligatoires');
            }
            
            if (data.password !== data.password_confirmation) {
                throw new Error('Les mots de passe ne correspondent pas');
            }
            
            // Appel API
            const accessToken = getCookie('access_token');
            const response = await fetch('https://toure.gestiem.com/api/auth/register', {
                method: 'POST',
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
                showToast('Utilisateur créé avec succès', 'success');
                
                // Rediriger vers la liste après 2 secondes
                setTimeout(() => {
                    window.location.href = '/utilisateurs';
                }, 2000);
            } else {
                throw new Error(result.message || 'Erreur lors de la création');
            }

        } catch (error) {
            console.error('Erreur lors de la création:', error);
            showToast('Erreur lors de la création: ' + error.message, 'error');
        } finally {
            // Réactiver le bouton
            saveBtn.disabled = false;
            saveBtn.classList.remove('btn-loading');
            saveBtn.innerHTML = originalText;
        }
    }

    // Fonction pour afficher les erreurs de validation
    function displayValidationErrors(errors) {
        // Réinitialiser les erreurs
        document.querySelectorAll('.form-control').forEach(field => {
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
