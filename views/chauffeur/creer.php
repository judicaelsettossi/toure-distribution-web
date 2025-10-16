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
    .create-chauffeur-wrapper {
        margin-left: 250px;
        margin-top: 70px;
        padding: 2rem;
        min-height: calc(100vh - 70px);
        background: #f8f9fa;
    }

    @media (max-width: 991px) {
        .create-chauffeur-wrapper {
            margin-left: 0;
            margin-top: 60px;
            padding: 1rem;
        }
    }

    /* Header */
    .create-chauffeur-header {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .create-chauffeur-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, var(--success-color) 0%, #059669 100%);
    }

    .create-chauffeur-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--secondary-color);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .create-chauffeur-icon {
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
        
        .create-chauffeur-title {
            font-size: 2rem;
        }
    }
</style>

<div class="create-chauffeur-wrapper font-public-sans">
    <!-- Header -->
    <div class="create-chauffeur-header fade-in">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="create-chauffeur-title">
                <div class="create-chauffeur-icon">
                    <i class="bi bi-person-badge"></i>
                </div>
                Nouveau Chauffeur
            </h1>
            <a href="/chauffeurs" class="btn-modern btn-outline-modern">
                <i class="bi bi-arrow-left"></i> Retour
            </a>
        </div>
        <p class="text-muted mb-0">Enregistrez un nouveau chauffeur dans votre équipe</p>
    </div>

    <!-- Alerts -->
    <div id="alertContainer"></div>

    <!-- Form -->
    <form id="createChauffeurForm" class="form-container fade-in">
        <!-- Section Informations Personnelles -->
        <div class="form-section">
            <h3 class="section-title">
                <div class="section-icon">
                    <i class="bi bi-person"></i>
                </div>
                Informations Personnelles
            </h3>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group-modern">
                        <label class="form-label-modern label-required">Nom complet</label>
                        <input type="text" id="name" class="form-control-modern" placeholder="Jean Dupont" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-modern">
                        <label class="form-label-modern label-required">Numéro de téléphone</label>
                        <input type="tel" id="phone" class="form-control-modern" placeholder="+229 97 00 00 00" required>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Permis de Conduire -->
        <div class="form-section">
            <h3 class="section-title">
                <div class="section-icon">
                    <i class="bi bi-card-text"></i>
                </div>
                Permis de Conduire
            </h3>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group-modern">
                        <label class="form-label-modern label-required">Numéro de permis</label>
                        <input type="text" id="numeroPermis" class="form-control-modern" placeholder="PERM123456" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-modern">
                        <label class="form-label-modern label-required">Date d'expiration</label>
                        <input type="date" id="dateExpirationPermis" class="form-control-modern" required>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Statut -->
        <div class="form-section">
            <h3 class="section-title">
                <div class="section-icon">
                    <i class="bi bi-gear"></i>
                </div>
                Statut
            </h3>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group-modern">
                        <label class="form-label-modern">Statut</label>
                        <select id="status" class="form-control-modern form-select-modern">
                            <option value="actif">Actif</option>
                            <option value="inactif">Inactif</option>
                            <option value="en_conge">En congé</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="form-actions">
            <button type="button" class="btn-modern btn-secondary-modern" onclick="resetForm()">
                <i class="bi bi-arrow-clockwise"></i>
                Réinitialiser
            </button>
            <button type="button" id="submitCreateChauffeur" class="btn-modern btn-success-modern">
                <i class="bi bi-check-circle"></i>
                Enregistrer le Chauffeur
            </button>
        </div>
    </form>
</div>

<!-- Loading Overlay -->
<div id="loadingOverlay" class="loading-overlay" style="display: none;">
    <div class="loading-content">
        <div class="loading-spinner"></div>
        <div class="loading-text">Enregistrement en cours...</div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Event listeners
        setupEventListeners();
    });

    function setupEventListeners() {
        // Soumission du formulaire
        const form = document.getElementById('createChauffeurForm');
        if (form) {
            form.addEventListener('submit', handleSubmit);
            console.log('Event listener ajouté au formulaire');
        } else {
            console.error('Formulaire non trouvé!');
        }

        // Event listener pour le bouton de soumission
        const submitButton = document.getElementById('submitCreateChauffeur');
        if (submitButton) {
            console.log('Bouton de soumission trouvé:', submitButton);
            submitButton.addEventListener('click', function(e) {
                console.log('Bouton de soumission cliqué!');
                e.preventDefault();
                handleSubmit(e);
            });
        } else {
            console.error('Bouton de soumission non trouvé!');
        }
    }

    async function handleSubmit(e) {
        e.preventDefault();
        console.log('=== DÉBUT DE LA SOUMISSION ===');

        // Validation des champs requis
        const name = document.getElementById('name').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const numeroPermis = document.getElementById('numeroPermis').value.trim();
        const dateExpirationPermis = document.getElementById('dateExpirationPermis').value;

        if (!name) {
            showAlert('Veuillez saisir le nom du chauffeur', 'danger');
            return;
        }

        if (!phone) {
            showAlert('Veuillez saisir le numéro de téléphone', 'danger');
            return;
        }

        if (!numeroPermis) {
            showAlert('Veuillez saisir le numéro de permis', 'danger');
            return;
        }

        if (!dateExpirationPermis) {
            showAlert('Veuillez saisir la date d\'expiration du permis', 'danger');
            return;
        }

        try {
            document.getElementById('loadingOverlay').style.display = 'flex';

            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            console.log('Access token:', accessToken ? 'Présent' : 'Manquant');
            
            if (!accessToken) {
                throw new Error('Token d\'accès manquant. Veuillez vous reconnecter.');
            }
            
            const formData = {
                name: name,
                phone: phone,
                numero_permis: numeroPermis,
                date_expiration_permis: dateExpirationPermis,
                status: document.getElementById('status').value
            };

            console.log('Données à envoyer:', formData);

            const response = await fetch('https://toure.gestiem.com/api/chauffeurs', {
                method: 'POST',
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
                
                showAlert('✓ Chauffeur créé avec succès !', 'success');
                resetForm();
                
                // Rediriger vers la liste après 2 secondes
                setTimeout(() => {
                    window.location.href = '/chauffeurs?created=1';
                }, 2000);
            } else {
                const errorResult = await response.json();
                console.error('Erreur du serveur:', errorResult);
                console.error('Détails de l\'erreur:', JSON.stringify(errorResult, null, 2));
                
                // Afficher les erreurs de validation de manière détaillée
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
        document.getElementById('createChauffeurForm').reset();
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
