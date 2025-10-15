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
    .modify-camion-wrapper {
        margin-left: 250px;
        margin-top: 70px;
        padding: 2rem;
        min-height: calc(100vh - 70px);
        background: #f8f9fa;
    }

    @media (max-width: 991px) {
        .modify-camion-wrapper {
            margin-left: 0;
            margin-top: 60px;
            padding: 1rem;
        }
    }

    /* Header */
    .modify-camion-header {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .modify-camion-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, var(--warning-color) 0%, #d97706 100%);
    }

    .modify-camion-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--secondary-color);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .modify-camion-icon {
        width: 60px;
        height: 60px;
        border-radius: 15px;
        background: linear-gradient(135deg, var(--warning-color), #d97706);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        box-shadow: 0 8px 25px rgba(245, 158, 11, 0.3);
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
        background: linear-gradient(135deg, var(--warning-color), #d97706);
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
        border-color: var(--warning-color);
        box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.1);
    }

    .form-select-modern {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 0.75rem center;
        background-repeat: no-repeat;
        background-size: 1rem;
        padding-right: 2.5rem;
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

    .btn-warning-modern {
        background: linear-gradient(135deg, var(--warning-color), #d97706);
        color: white;
        box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
    }

    .btn-warning-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(245, 158, 11, 0.4);
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
        border-top-color: var(--warning-color);
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
            transform: translateY(-10px);
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
        
        .modify-camion-title {
            font-size: 2rem;
        }
    }
</style>

<div class="modify-camion-wrapper font-public-sans">
    <!-- Header -->
    <div class="modify-camion-header fade-in">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="modify-camion-title">
                <div class="modify-camion-icon">
                    <i class="bi bi-pencil-square"></i>
                </div>
                Modifier le Camion
            </h1>
            <a href="/camion/<?php echo $camion_id; ?>" class="btn-modern btn-outline-modern">
                <i class="bi bi-arrow-left"></i> Retour
            </a>
        </div>
        <p class="text-muted mb-0">Modifiez les informations du camion</p>
    </div>

    <!-- Alerts -->
    <div id="alertContainer"></div>

    <!-- Loading -->
    <div id="loadingData" class="text-center py-4">
        <div class="spinner-border text-warning" role="status">
            <span class="visually-hidden">Chargement...</span>
        </div>
        <p class="mt-2">Chargement des données...</p>
    </div>

    <!-- Form -->
    <form id="modifyCamionForm" class="form-container fade-in" style="display: none;">
        <!-- Section Informations Générales -->
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
                        <label class="form-label-modern label-required">Numéro d'immatriculation</label>
                        <input type="text" id="numeroImmat" class="form-control-modern" placeholder="AB-1234-CD" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-modern">
                        <label class="form-label-modern label-required">Marque</label>
                        <input type="text" id="marque" class="form-control-modern" placeholder="Mercedes, Volvo, Scania..." required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group-modern">
                        <label class="form-label-modern">Modèle</label>
                        <input type="text" id="modele" class="form-control-modern" placeholder="Actros, FH16, R-Series...">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-modern">
                        <label class="form-label-modern label-required">Capacité (tonnes)</label>
                        <input type="number" id="capacite" class="form-control-modern" placeholder="15.5" min="0" step="0.1" required>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Statut et Notes -->
        <div class="form-section">
            <h3 class="section-title">
                <div class="section-icon">
                    <i class="bi bi-gear"></i>
                </div>
                Statut et Configuration
            </h3>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group-modern">
                        <label class="form-label-modern">Statut</label>
                        <select id="status" class="form-control-modern form-select-modern">
                            <option value="disponible">Disponible</option>
                            <option value="en_mission">En mission</option>
                            <option value="en_maintenance">En maintenance</option>
                            <option value="hors_service">Hors service</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group-modern">
                <label class="form-label-modern">Notes / Observations</label>
                <textarea id="note" class="form-control-modern" rows="4" placeholder="Informations complémentaires sur le camion (état, équipements, historique...)"></textarea>
            </div>
        </div>

        <!-- Actions -->
        <div class="form-actions">
            <button type="button" class="btn-modern btn-secondary-modern" onclick="resetForm()">
                <i class="bi bi-arrow-clockwise"></i>
                Annuler
            </button>
            <button type="button" id="submitModifyCamion" class="btn-modern btn-warning-modern">
                <i class="bi bi-check-circle"></i>
                Mettre à jour
            </button>
        </div>
    </form>
</div>

<!-- Loading Overlay -->
<div id="loadingOverlay" class="loading-overlay" style="display: none;">
    <div class="loading-content">
        <div class="loading-spinner"></div>
        <div class="loading-text">Mise à jour en cours...</div>
    </div>
</div>

<script>
    const camionId = '<?php echo $camion_id; ?>';
    let camionData = null;

    document.addEventListener('DOMContentLoaded', function() {
        loadCamionData();
        setupEventListeners();
    });

    async function loadCamionData() {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            
            if (!accessToken) {
                console.error('Token d\'accès manquant');
                return;
            }

            const response = await fetch(`https://toure.gestiem.com/api/camions/${camionId}`, {
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });

            if (response.ok) {
                const result = await response.json();
                console.log('Données du camion:', result);
                
                camionData = result.data;
                populateForm();
                
                document.getElementById('loadingData').style.display = 'none';
                document.getElementById('modifyCamionForm').style.display = 'block';
            } else {
                console.error('Erreur API:', response.status, response.statusText);
                const errorResult = await response.json();
                console.error('Détails erreur:', errorResult);
                throw new Error('Erreur lors du chargement des données');
            }
        } catch (error) {
            console.error('Erreur:', error);
            document.getElementById('loadingData').innerHTML = '<div class="alert alert-danger">Erreur lors du chargement des données</div>';
        }
    }

    function populateForm() {
        if (!camionData) return;

        document.getElementById('numeroImmat').value = camionData.numero_immat || '';
        document.getElementById('marque').value = camionData.marque || '';
        document.getElementById('modele').value = camionData.modele || '';
        document.getElementById('capacite').value = camionData.capacite || '';
        document.getElementById('status').value = camionData.status || 'disponible';
        document.getElementById('note').value = camionData.note || '';
    }

    function setupEventListeners() {
        // Soumission du formulaire
        const form = document.getElementById('modifyCamionForm');
        if (form) {
            form.addEventListener('submit', handleSubmit);
        }

        // Event listener pour le bouton de soumission
        const submitButton = document.getElementById('submitModifyCamion');
        if (submitButton) {
            submitButton.addEventListener('click', function(e) {
                e.preventDefault();
                handleSubmit(e);
            });
        }
    }

    async function handleSubmit(e) {
        e.preventDefault();
        console.log('=== DÉBUT DE LA SOUMISSION ===');

        // Validation des champs requis
        const numeroImmat = document.getElementById('numeroImmat').value.trim();
        const marque = document.getElementById('marque').value.trim();
        const capacite = document.getElementById('capacite').value;

        if (!numeroImmat) {
            showAlert('Veuillez saisir le numéro d\'immatriculation', 'danger');
            return;
        }

        if (!marque) {
            showAlert('Veuillez saisir la marque du camion', 'danger');
            return;
        }

        if (!capacite || parseFloat(capacite) <= 0) {
            showAlert('Veuillez saisir une capacité valide', 'danger');
            return;
        }

        try {
            document.getElementById('loadingOverlay').style.display = 'flex';

            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            
            if (!accessToken) {
                throw new Error('Token d\'accès manquant. Veuillez vous reconnecter.');
            }
            
            const formData = {
                numero_immat: numeroImmat,
                marque: marque,
                modele: document.getElementById('modele').value.trim() || null,
                capacite: parseFloat(capacite),
                status: document.getElementById('status').value,
                note: document.getElementById('note').value.trim() || null
            };

            console.log('Données à envoyer:', formData);

            const response = await fetch(`https://toure.gestiem.com/api/camions/${camionId}`, {
                method: 'PUT',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(formData)
            });

            console.log('Réponse du serveur:', response.status, response.statusText);

            if (response.ok) {
                const result = await response.json();
                console.log('Succès:', result);
                
                showAlert('✓ Camion mis à jour avec succès !', 'success');
                
                // Rediriger vers les détails après 2 secondes
                setTimeout(() => {
                    window.location.href = `/camion/${camionId}?updated=1`;
                }, 2000);
            } else {
                const errorResult = await response.json();
                console.error('Erreur du serveur:', errorResult);
                
                if (errorResult.errors) {
                    let errorMessage = 'Erreurs de validation:\n';
                    for (const [field, messages] of Object.entries(errorResult.errors)) {
                        errorMessage += `• ${field}: ${Array.isArray(messages) ? messages.join(', ') : messages}\n`;
                    }
                    throw new Error(errorMessage);
                }
                
                throw new Error(errorResult.message || `Erreur ${response.status}: ${response.statusText}`);
            }

        } catch (error) {
            console.error('Erreur:', error);
            showAlert('Erreur: ' + error.message, 'danger');
        } finally {
            document.getElementById('loadingOverlay').style.display = 'none';
        }
    }

    function resetForm() {
        if (camionData) {
            populateForm();
        }
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
