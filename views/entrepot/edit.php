<?php
ob_start();
$entrepot_id = $id ?? '';
?>

<style>
    :root {
        --primary-color: #f00480;
        --secondary-color: #010768;
        --accent-color: #010068;
        --light-primary: rgba(240, 4, 128, 0.1);
        --light-secondary: rgba(1, 7, 104, 0.1);
        --success-color: #28a745;
        --danger-color: #dc3545;
    }

    .font-public-sans {
        font-family: 'Public Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    }

    /* Fix chevauchement */
    .edit-warehouse-wrapper {
        margin-left: 250px;
        margin-top: 70px;
        padding: 2rem;
        min-height: calc(100vh - 70px);
        background: #f8f9fa;
    }

    @media (max-width: 991px) {
        .edit-warehouse-wrapper {
            margin-left: 0;
            margin-top: 60px;
            padding: 1rem;
        }
    }

    /* Header sticky */
    .edit-header {
        position: sticky;
        top: 70px;
        background: white;
        padding: 1.5rem;
        border-radius: 20px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        margin-bottom: 2rem;
        z-index: 100;
    }

    .edit-title {
        font-size: 2rem;
        font-weight: 800;
        color: var(--secondary-color);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .edit-title-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    /* Form container */
    .form-container {
        background: white;
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
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
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: var(--light-primary);
        color: var(--primary-color);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }

    /* Form groups */
    .form-group-modern {
        margin-bottom: 1.5rem;
    }

    .form-label-modern {
        font-weight: 600;
        color: var(--secondary-color);
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .label-required {
        color: var(--danger-color);
        font-size: 1.2rem;
    }

    .form-control-modern {
        width: 100%;
        padding: 0.875rem 1.25rem;
        border: 2px solid #e0e0e0;
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: #f8f9fa;
    }

    .form-control-modern:focus {
        outline: none;
        border-color: var(--primary-color);
        background: white;
        box-shadow: 0 0 0 4px var(--light-primary);
    }

    .form-control-modern:disabled {
        background: #e9ecef;
        cursor: not-allowed;
        opacity: 0.7;
    }

    textarea.form-control-modern {
        min-height: 120px;
        resize: vertical;
    }

    .form-select-modern {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23333' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 12px;
        padding-right: 2.5rem;
    }

    /* Info badge */
    .info-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 8px 16px;
        background: var(--light-secondary);
        border-radius: 8px;
        font-size: 0.9rem;
        color: var(--secondary-color);
        font-weight: 500;
    }

    /* Toggle switch */
    .toggle-container {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1.5rem;
        background: linear-gradient(135deg, var(--light-primary), var(--light-secondary));
        border-radius: 16px;
        border: 2px solid var(--primary-color);
    }

    .toggle-switch {
        position: relative;
        width: 60px;
        height: 30px;
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
        border-radius: 30px;
    }

    .toggle-slider:before {
        position: absolute;
        content: "";
        height: 22px;
        width: 22px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        transition: 0.4s;
        border-radius: 50%;
    }

    input:checked+.toggle-slider {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    }

    input:checked+.toggle-slider:before {
        transform: translateX(30px);
    }

    .toggle-label {
        font-weight: 600;
        color: var(--secondary-color);
        font-size: 1.1rem;
    }

    .toggle-status {
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 700;
    }

    .status-active {
        background: rgba(40, 167, 69, 0.2);
        color: var(--success-color);
    }

    .status-inactive {
        background: rgba(220, 53, 69, 0.2);
        color: var(--danger-color);
    }

    /* Buttons */
    .btn-modern {
        padding: 12px 32px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-primary-modern {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        box-shadow: 0 4px 15px rgba(240, 4, 128, 0.3);
    }

    .btn-primary-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(240, 4, 128, 0.4);
    }

    .btn-primary-modern:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }

    .btn-secondary-modern {
        background: white;
        color: var(--secondary-color);
        border: 2px solid var(--secondary-color);
    }

    .btn-secondary-modern:hover {
        background: var(--secondary-color);
        color: white;
        transform: translateY(-2px);
    }

    .form-actions {
        display: flex;
        gap: 1rem;
        justify-content: flex-end;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 2px solid #f0f0f0;
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

    .alert-success {
        background: rgba(40, 167, 69, 0.1);
        color: var(--success-color);
        border-left: 4px solid var(--success-color);
    }

    .alert-danger {
        background: rgba(220, 53, 69, 0.1);
        color: var(--danger-color);
        border-left: 4px solid var(--danger-color);
    }

    .alert-icon {
        font-size: 1.5rem;
    }

    .alert-close {
        margin-left: auto;
        cursor: pointer;
        opacity: 0.6;
        transition: opacity 0.3s;
    }

    .alert-close:hover {
        opacity: 1;
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

    /* Error inputs */
    .form-control-modern.is-invalid {
        border-color: var(--danger-color);
        background: rgba(220, 53, 69, 0.05);
    }

    .invalid-feedback {
        color: var(--danger-color);
        font-size: 0.875rem;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }

    /* Input icons */
    .input-with-icon {
        position: relative;
    }

    .input-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--primary-color);
        font-size: 1.1rem;
    }

    .form-control-modern.with-icon {
        padding-left: 3rem;
    }
</style>

<div class="edit-warehouse-wrapper font-public-sans">
    <!-- Header -->
    <div class="edit-header">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="edit-title">
                <div class="edit-title-icon">
                    <i class="bi bi-building"></i>
                </div>
                Modifier l'Entrepôt
            </h1>
            <a href="/entrepot/liste" class="btn-modern btn-secondary-modern">
                <i class="bi bi-arrow-left"></i> Retour à la liste
            </a>
        </div>
    </div>

    <!-- Alerts -->
    <div id="alertContainer"></div>

    <!-- Loading initial -->
    <div id="loadingInitial" class="text-center py-5">
        <div class="loading-spinner mx-auto"></div>
        <div class="loading-text">Chargement de l'entrepôt...</div>
    </div>

    <!-- Form -->
    <form id="editWarehouseForm" style="display: none;">
        <div class="form-container">
            <!-- Section Informations de base -->
            <div class="form-section">
                <h3 class="section-title">
                    <div class="section-icon">
                        <i class="bi bi-info-circle"></i>
                    </div>
                    Informations de Base
                </h3>

                <div class="form-group-modern">
                    <label class="form-label-modern">
                        <i class="bi bi-hash"></i> Code de l'Entrepôt
                    </label>
                    <input type="text" id="warehouseCode" class="form-control-modern" disabled>
                    <div class="info-badge mt-2">
                        <i class="bi bi-info-circle"></i>
                        Le code est généré automatiquement et ne peut pas être modifié
                    </div>
                </div>

                <div class="form-group-modern">
                    <label class="form-label-modern">
                        Nom de l'Entrepôt <span class="label-required">*</span>
                    </label>
                    <div class="input-with-icon">
                        <i class="input-icon bi bi-building"></i>
                        <input type="text" id="warehouseName" class="form-control-modern with-icon" placeholder="Ex: Entrepôt Central" required>
                    </div>
                    <div class="invalid-feedback"></div>
                </div>

                <div class="form-group-modern">
                    <label class="form-label-modern">
                        Adresse <span class="label-required">*</span>
                    </label>
                    <div class="input-with-icon">
                        <i class="input-icon bi bi-geo-alt"></i>
                        <textarea id="warehouseAddress" class="form-control-modern with-icon" placeholder="Adresse complète de l'entrepôt..." required></textarea>
                    </div>
                    <div class="invalid-feedback"></div>
                </div>
            </div>

            <!-- Section Responsable -->
            <div class="form-section">
                <h3 class="section-title">
                    <div class="section-icon">
                        <i class="bi bi-person-circle"></i>
                    </div>
                    Responsable de l'Entrepôt
                </h3>

                <div class="form-group-modern">
                    <label class="form-label-modern">
                        Responsable
                    </label>
                    <select id="userId" class="form-control-modern form-select-modern">
                        <option value="">Aucun responsable assigné</option>
                    </select>
                    <small class="text-muted">Le responsable qui gère cet entrepôt</small>
                    <div class="invalid-feedback"></div>
                </div>
            </div>

            <!-- Section Statut -->
            <div class="form-section">
                <h3 class="section-title">
                    <div class="section-icon">
                        <i class="bi bi-toggles"></i>
                    </div>
                    Statut de l'Entrepôt
                </h3>

                <div class="toggle-container">
                    <label class="toggle-switch">
                        <input type="checkbox" id="isActive" checked>
                        <span class="toggle-slider"></span>
                    </label>
                    <span class="toggle-label">Entrepôt actif</span>
                    <span id="statusText" class="toggle-status status-active">Actif</span>
                </div>
                <small class="text-muted mt-2 d-block">
                    <i class="bi bi-info-circle"></i> Un entrepôt inactif ne peut pas recevoir de nouveaux mouvements de stock
                </small>
            </div>

            <!-- Actions -->
            <div class="form-actions">
                <button type="button" class="btn-modern btn-secondary-modern" onclick="window.location.href='/entrepot/liste'">
                    <i class="bi bi-x-lg"></i> Annuler
                </button>
                <button type="submit" class="btn-modern btn-primary-modern" id="submitBtn">
                    <i class="bi bi-check-lg"></i> Enregistrer les modifications
                </button>
            </div>
        </div>
    </form>
</div>

<!-- Loading overlay -->
<div id="loadingOverlay" class="loading-overlay" style="display: none;">
    <div class="loading-content">
        <div class="loading-spinner"></div>
        <div class="loading-text">Mise à jour en cours...</div>
    </div>
</div>

<script>
    const entrepotId = '<?php echo $entrepot_id; ?>';
    let users = [];
    let currentWarehouse = null;

    document.addEventListener('DOMContentLoaded', function() {
        if (!entrepotId) {
            showAlert('ID de l\'entrepôt manquant dans l\'URL', 'danger');
            return;
        }

        loadUsers();
        loadWarehouseData();
        setupEventListeners();
    });

    async function loadUsers() {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            const response = await fetch('https://toure.gestiem.com/api/users', {
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });

            if (response.ok) {
                const result = await response.json();
                users = result.data || result || [];
                populateUserSelect();
            }
        } catch (error) {
            console.error('Erreur chargement utilisateurs:', error);
        }
    }

    function populateUserSelect() {
        const select = document.getElementById('userId');
        users.forEach(user => {
            const option = document.createElement('option');
            option.value = user.user_id || user.id;
            option.textContent = `${user.name} (${user.email})`;
            select.appendChild(option);
        });
    }

    async function loadWarehouseData() {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';

            const response = await fetch(`https://toure.gestiem.com/api/entrepots/${entrepotId}?with_user=1`, {
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });

            if (!response.ok) {
                if (response.status === 401) {
                    window.location.href = '/login';
                    return;
                }
                throw new Error('Entrepôt introuvable');
            }

            currentWarehouse = await response.json();
            populateForm(currentWarehouse);

            document.getElementById('loadingInitial').style.display = 'none';
            document.getElementById('editWarehouseForm').style.display = 'block';

        } catch (error) {
            console.error('Erreur:', error);
            showAlert('Erreur lors du chargement de l\'entrepôt: ' + error.message, 'danger');
            document.getElementById('loadingInitial').style.display = 'none';
        }
    }

    function populateForm(warehouse) {
        document.getElementById('warehouseCode').value = warehouse.code || '';
        document.getElementById('warehouseName').value = warehouse.name || '';
        document.getElementById('warehouseAddress').value = warehouse.adresse || '';
        document.getElementById('userId').value = warehouse.user_id || '';
        document.getElementById('isActive').checked = warehouse.is_active;

        updateStatusDisplay();
    }

    function setupEventListeners() {
        // Toggle status
        document.getElementById('isActive').addEventListener('change', updateStatusDisplay);

        // Form submit
        document.getElementById('editWarehouseForm').addEventListener('submit', handleSubmit);
    }

    function updateStatusDisplay() {
        const isActive = document.getElementById('isActive').checked;
        const statusText = document.getElementById('statusText');

        if (isActive) {
            statusText.textContent = 'Actif';
            statusText.className = 'toggle-status status-active';
        } else {
            statusText.textContent = 'Inactif';
            statusText.className = 'toggle-status status-inactive';
        }
    }

    async function handleSubmit(e) {
        e.preventDefault();

        // Clear previous errors
        document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        document.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');

        // Prepare data
        const data = {
            name: document.getElementById('warehouseName').value,
            adresse: document.getElementById('warehouseAddress').value,
            is_active: document.getElementById('isActive').checked,
        };

        // Add user_id only if selected
        const userId = document.getElementById('userId').value;
        if (userId) {
            data.user_id = userId;
        }

        try {
            document.getElementById('loadingOverlay').style.display = 'flex';
            document.getElementById('submitBtn').disabled = true;

            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';

            const response = await fetch(`https://toure.gestiem.com/api/entrepots/${entrepotId}`, {
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
                if (response.status === 422) {
                    handleValidationErrors(result.errors || {});
                    showAlert('Veuillez corriger les erreurs dans le formulaire', 'danger');
                } else {
                    throw new Error(result.message || 'Erreur lors de la mise à jour');
                }
            } else {
                showAlert('✓ Entrepôt mis à jour avec succès !', 'success');
                setTimeout(() => {
                    window.location.href = `/entrepot/${entrepotId}/details`;
                }, 1500);
            }

        } catch (error) {
            console.error('Erreur:', error);
            showAlert('Erreur: ' + error.message, 'danger');
        } finally {
            document.getElementById('loadingOverlay').style.display = 'none';
            document.getElementById('submitBtn').disabled = false;
        }
    }

    function handleValidationErrors(errors) {
        for (const [field, messages] of Object.entries(errors)) {
            let inputId = '';

            switch (field) {
                case 'name':
                    inputId = 'warehouseName';
                    break;
                case 'adresse':
                    inputId = 'warehouseAddress';
                    break;
                case 'user_id':
                    inputId = 'userId';
                    break;
            }

            if (inputId) {
                const input = document.getElementById(inputId);
                input.classList.add('is-invalid');
                const feedback = input.parentElement.querySelector('.invalid-feedback') ||
                    input.parentElement.parentElement.querySelector('.invalid-feedback');
                if (feedback) {
                    feedback.innerHTML = `<i class="bi bi-exclamation-circle"></i> ${messages[0]}`;
                }
            }
        }
    }

    function showAlert(message, type) {
        const container = document.getElementById('alertContainer');
        const alert = document.createElement('div');
        alert.className = `alert-modern alert-${type}`;
        alert.innerHTML = `
        <i class="bi ${type === 'success' ? 'bi-check-circle-fill' : 'bi-exclamation-triangle-fill'} alert-icon"></i>
        <span>${message}</span>
        <i class="bi bi-x-lg alert-close" onclick="this.parentElement.remove()"></i>
    `;
        container.appendChild(alert);

        setTimeout(() => alert.remove(), 5000);
    }
</script>

<?php
$content = ob_get_clean();
require('./views/layouts/app-layout.php');
?>