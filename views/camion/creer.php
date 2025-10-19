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

/* Form Section */
.form-section {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 2rem;
    border: 1px solid #e9ecef;
    overflow: hidden;
}

.form-section-header {
    background: linear-gradient(135deg, var(--light-primary) 0%, #f8f9fa 100%);
    padding: 1.25rem 2rem;
    border-bottom: 1px solid #e9ecef;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.form-section-header h5 {
    font-weight: 600;
    color: var(--secondary-color);
    font-size: 1.1rem;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.form-section-body {
    padding: 2rem;
}

/* Form Controls */
.form-label {
    font-weight: 600;
    color: var(--secondary-color);
    margin-bottom: 0.5rem;
    font-size: 0.95rem;
}

.required-field::after {
    content: " *";
    color: var(--primary-color);
    font-weight: bold;
}

.form-control {
    padding: 0.75rem 1rem;
    border: 2px solid #e9ecef;
    border-radius: 8px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: #f8f9fa;
}

.form-control:focus {
    outline: none;
    border-color: var(--primary-color);
    background: white;
    box-shadow: 0 0 0 0.2rem rgba(240, 4, 128, 0.15);
}

.form-control.is-invalid {
    border-color: #dc3545;
    background: rgba(220, 53, 69, 0.05);
}

.form-select {
    padding: 0.75rem 1rem;
    border: 2px solid #e9ecef;
    border-radius: 8px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: #f8f9fa;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m1 6 7 7 7-7'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 0.75rem center;
    background-size: 16px 12px;
    appearance: none;
}

.form-select:focus {
    outline: none;
    border-color: var(--primary-color);
    background: white;
    box-shadow: 0 0 0 0.2rem rgba(240, 4, 128, 0.15);
}

.form-text {
    font-size: 0.75rem;
    color: #6c757d;
    margin-top: 0.25rem;
}

.invalid-feedback {
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.5rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

/* Input with Icon */
.position-relative {
    position: relative;
}

.input-icon {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--secondary-color);
    font-size: 0.9rem;
    z-index: 2;
}

.has-icon {
    padding-left: 35px;
}

/* Status Options */
.status-options {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    margin-top: 1rem;
}

.status-option {
    background: white;
    border: 2px solid #e9ecef;
    border-radius: 10px;
    padding: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
}

.status-option:hover {
    border-color: var(--primary-color);
    background-color: var(--light-primary);
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(240, 4, 128, 0.15);
}

.status-option.selected {
    border-color: var(--primary-color);
    background-color: var(--light-primary);
    box-shadow: 0 4px 15px rgba(240, 4, 128, 0.2);
}

.status-icon {
    font-size: 2rem;
    color: var(--secondary-color);
}

.status-option.selected .status-icon {
    color: var(--primary-color);
}

.status-name {
    font-weight: 600;
    font-size: 0.9rem;
    margin: 0;
}

.status-description {
    font-size: 0.75rem;
    color: #6c757d;
    margin: 0;
}

/* Form Actions */
.form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 1rem;
    padding: 2rem;
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
    
    .status-options {
        grid-template-columns: 1fr;
    }
}
</style>

<main id="content" role="main" class="main font-public-sans">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/" class="text-white">Tableau de Bord</a></li>
                            <li class="breadcrumb-item"><a href="/camions" class="text-white">Camions</a></li>
                            <li class="breadcrumb-item active">Nouveau Camion</li>
                        </ol>
                    </nav>
                    <h1 class="page-header-title">
                        <i class="bi-truck me-2"></i>
                        Créer un Nouveau Camion
                    </h1>
                    <p class="mb-0">Ajoutez un nouveau véhicule à votre flotte de transport</p>
                </div>
                <div class="col-auto">
                    <a href="/camions" class="btn btn-outline-light">
                        <i class="bi-arrow-left me-1"></i> Retour
                    </a>
                </div>
            </div>
        </div>

        <!-- Alerts Container -->
        <div id="alertContainer"></div>

        <!-- Form -->
        <form id="createCamionForm">
            <!-- Section Informations du Camion -->
            <div class="form-section">
                <div class="form-section-header">
                    <h5>
                        <i class="bi-truck"></i>
                        Informations du Camion
                    </h5>
                </div>
                <div class="form-section-body">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="numeroImmat" class="form-label required-field">Numéro d'Immatriculation</label>
                            <div class="position-relative">
                                <i class="bi-123 input-icon"></i>
                                <input type="text" id="numeroImmat" name="numero_immat" class="form-control has-icon" 
                                       placeholder="Ex: AB-1234-CD" required>
                            </div>
                            <div class="form-text">Numéro unique d'immatriculation du camion</div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="marque" class="form-label required-field">Marque</label>
                            <div class="position-relative">
                                <i class="bi-truck input-icon"></i>
                                <input type="text" id="marque" name="marque" class="form-control has-icon" 
                                       placeholder="Ex: Mercedes, Volvo, Iveco..." required>
                            </div>
                            <div class="form-text">Marque du véhicule</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="modele" class="form-label">Modèle</label>
                            <div class="position-relative">
                                <i class="bi-tag input-icon"></i>
                                <input type="text" id="modele" name="modele" class="form-control has-icon" 
                                       placeholder="Ex: Actros, FH16, Eurocargo...">
                            </div>
                            <div class="form-text">Modèle spécifique du camion</div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="capacite" class="form-label required-field">Capacité (tonnes)</label>
                            <div class="position-relative">
                                <i class="bi-speedometer2 input-icon"></i>
                                <input type="number" id="capacite" name="capacite" class="form-control has-icon" 
                                       placeholder="Ex: 15.50" step="0.01" min="0" required>
                            </div>
                            <div class="form-text">Capacité de charge en tonnes</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <label for="note" class="form-label">Notes</label>
                            <div class="position-relative">
                                <i class="bi-file-text input-icon" style="top: 20px;"></i>
                                <textarea id="note" name="note" class="form-control has-icon" 
                                          placeholder="Notes ou observations sur le camion..." rows="3"></textarea>
                            </div>
                            <div class="form-text">Informations complémentaires sur l'état ou les caractéristiques</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Statut du Camion -->
            <div class="form-section">
                <div class="form-section-header">
                    <h5>
                        <i class="bi-gear"></i>
                        Statut du Camion
                    </h5>
                </div>
                <div class="form-section-body">
                    <div class="status-options">
                        <div class="status-option" data-status="disponible">
                            <i class="bi-check-circle status-icon"></i>
                            <h6 class="status-name">Disponible</h6>
                            <p class="status-description">Camion disponible pour les missions</p>
                        </div>
                        <div class="status-option" data-status="en_mission">
                            <i class="bi-truck status-icon"></i>
                            <h6 class="status-name">En Mission</h6>
                            <p class="status-description">Actuellement en cours de transport</p>
                        </div>
                        <div class="status-option" data-status="en_maintenance">
                            <i class="bi-tools status-icon"></i>
                            <h6 class="status-name">En Maintenance</h6>
                            <p class="status-description">En réparation ou entretien</p>
                        </div>
                        <div class="status-option" data-status="hors_service">
                            <i class="bi-x-circle status-icon"></i>
                            <h6 class="status-name">Hors Service</h6>
                            <p class="status-description">Temporairement indisponible</p>
                        </div>
                    </div>
                    <input type="hidden" id="status" name="status" value="disponible">
                </div>
            </div>

            <!-- Actions -->
            <div class="form-actions">
                <button type="button" class="btn-outline-modern" onclick="window.history.back()">
                    <i class="bi-x-lg me-1"></i> Annuler
                </button>
                <button type="submit" class="btn-primary-custom" id="submitBtn">
                    <i class="bi-check-lg me-1"></i> Créer le Camion
                </button>
            </div>
        </form>
    </div>
</main>

<!-- Loading Overlay -->
<div id="loadingOverlay" class="loading-overlay" style="display: none;">
    <div class="loading-content">
        <div class="loading-spinner"></div>
        <div class="loading-text">Création du camion...</div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        setupEventListeners();
        initializeForm();
    });

    function setupEventListeners() {
        // Status selection
        const statusOptions = document.querySelectorAll('.status-option');
        statusOptions.forEach(option => {
            option.addEventListener('click', function() {
                // Remove selected class from all options
                statusOptions.forEach(opt => opt.classList.remove('selected'));
                // Add selected class to clicked option
                this.classList.add('selected');
                // Update hidden input
                document.getElementById('status').value = this.dataset.status;
            });
        });

        // Form submission
        document.getElementById('createCamionForm').addEventListener('submit', handleSubmit);
    }

    function initializeForm() {
        // Set default status as selected
        const defaultStatus = document.querySelector('.status-option[data-status="disponible"]');
        if (defaultStatus) {
            defaultStatus.classList.add('selected');
        }
    }

    async function handleSubmit(event) {
        event.preventDefault();
        
        try {
            showLoadingOverlay();
            
            const formData = {
                numero_immat: document.getElementById('numeroImmat').value.trim(),
                marque: document.getElementById('marque').value.trim(),
                modele: document.getElementById('modele').value.trim(),
                capacite: parseFloat(document.getElementById('capacite').value),
                note: document.getElementById('note').value.trim(),
                status: document.getElementById('status').value
            };

            console.log('Données du camion:', formData);

            // Validation
            if (!formData.numero_immat) {
                throw new Error('Le numéro d\'immatriculation est obligatoire');
            }
            if (!formData.marque) {
                throw new Error('La marque est obligatoire');
            }
            if (!formData.capacite || formData.capacite <= 0) {
                throw new Error('La capacité doit être un nombre positif');
            }

            // Get access token from cookies
            const accessToken = getCookie('access_token');
            if (!accessToken) {
                throw new Error('Token d\'authentification manquant. Veuillez vous reconnecter.');
            }

            const response = await fetch('https://toure.gestiem.com/api/camions', {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(formData)
            });

            console.log('Réponse création:', response.status);

            if (!response.ok) {
                const errorData = await response.json();
                console.error('Erreur de réponse:', errorData);
                throw new Error(errorData.message || `Erreur HTTP ${response.status}`);
            }

            const result = await response.json();
            console.log('Camion créé:', result);

            if (result.success) {
                showAlert('Camion créé avec succès !', 'success');
                setTimeout(() => {
                    window.location.href = '/camions';
                }, 1500);
            } else {
                throw new Error(result.message || 'Erreur lors de la création');
            }

        } catch (error) {
            console.error('Erreur lors de la création:', error);
            showAlert('Erreur: ' + error.message, 'danger');
        } finally {
            hideLoadingOverlay();
        }
    }

    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
    }

    function showLoadingOverlay() {
        document.getElementById('loadingOverlay').style.display = 'flex';
    }

    function hideLoadingOverlay() {
        document.getElementById('loadingOverlay').style.display = 'none';
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
// Le contenu est directement affiché, le contrôleur récupère avec ob_get_clean()
?>