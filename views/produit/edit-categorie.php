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

    .form-section {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        margin-bottom: 2rem;
        border-left: 4px solid var(--primary-color);
        overflow: hidden;
    }

    .form-section-header {
        background: var(--light-primary);
        padding: 1.5rem;
        border-bottom: 1px solid #e9ecef;
    }

    .form-section-body {
        padding: 2rem;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(240, 4, 128, 0.25);
    }

    .required-field::after {
        content: " *";
        color: var(--primary-color);
    }

    .category-preview {
        border: 2px solid #e9ecef;
        border-radius: 12px;
        padding: 2rem;
        text-align: center;
        background: linear-gradient(135deg, var(--light-primary) 0%, white 100%);
        transition: all 0.3s ease;
    }

    .category-preview:hover {
        border-color: var(--primary-color);
        box-shadow: 0 4px 20px rgba(240, 4, 128, 0.15);
    }

    .preview-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        color: white;
        font-size: 2rem;
    }

    .info-box {
        background-color: #f8f9fa;
        border-left: 4px solid #17a2b8;
        padding: 1rem;
        border-radius: 8px;
        margin-top: 1rem;
    }

    .info-box .small {
        margin: 0;
        color: #6c757d;
    }

    .loading-spinner {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 3rem;
    }

    .error-state {
        text-align: center;
        padding: 3rem;
    }

    .error-state i {
        font-size: 3rem;
        margin-bottom: 1rem;
        color: #dc3545;
    }

    .btn-action {
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
    }

    .btn-action:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .btn-save {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: white;
    }

    .btn-save:hover {
        background: linear-gradient(135deg, #20c997 0%, #1e7e34 100%);
        color: white;
    }

    .btn-cancel {
        background: #6c757d;
        color: white;
    }

    .btn-cancel:hover {
        background: #5a6268;
        color: white;
    }

    .btn-back {
        background: #6c757d;
        color: white;
    }

    .btn-back:hover {
        background: #5a6268;
        color: white;
    }

    .form-floating > .form-control:focus ~ label,
    .form-floating > .form-control:not(:placeholder-shown) ~ label {
        color: var(--primary-color);
    }

    .is-invalid {
        border-color: #dc3545 !important;
    }

    .invalid-feedback {
        display: block;
        width: 100%;
        margin-top: 0.25rem;
        font-size: 0.875em;
        color: #dc3545;
    }

    .spinner-border-sm {
        width: 1rem;
        height: 1rem;
        border-width: 0.15rem;
    }

    @media (max-width: 768px) {
        .form-section-body {
            padding: 1.5rem;
        }
        
        .form-section-header {
            padding: 1rem 1.5rem;
        }
        
        .category-preview {
            padding: 1.5rem;
        }
        
        .preview-icon {
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
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
        background: #10b981;
        color: white;
    }

    .toast-error .toast-icon {
        background: #ef4444;
        color: white;
    }

    .toast-warning .toast-icon {
        background: #f59e0b;
        color: white;
    }

    .toast-info .toast-icon {
        background: #3b82f6;
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

    @media (max-width: 768px) {
        .toast-container {
            top: 1rem;
            right: 1rem;
            left: 1rem;
            max-width: none;
        }
    }
</style>

<main id="content" role="main" class="main font-public-sans">
    <div class="content container-fluid">
        <!-- Loading State -->
        <div id="loadingState" class="loading-spinner">
            <div class="spinner-border text-primary-custom" role="status">
                <span class="visually-hidden">Chargement...</span>
            </div>
            <p class="ms-3 mb-0 text-muted">Chargement des données de la catégorie...</p>
        </div>

        <!-- Main Content -->
        <div id="mainContent" style="display: none;">
            <!-- Page Header -->
            <div class="page-header mb-4">
                <div class="row align-items-center">
                    <div class="col">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/" class="text-primary-custom">Tableau de Bord</a></li>
                                <li class="breadcrumb-item"><a href="/categories-produits-liste" class="text-primary-custom">Catégories</a></li>
                                <li class="breadcrumb-item active">Modifier</li>
                            </ol>
                        </nav>
                        <h1 class="page-header-title text-secondary-custom">
                            <i class="bi-pencil-square me-2"></i>
                            Modifier la Catégorie
                        </h1>
                        <p class="text-muted mb-0">Modifiez les informations de cette catégorie de produits</p>
                    </div>
                    <div class="col-auto">
                        <a href="/categories-produits-liste" class="btn-action btn-back">
                            <i class="bi-arrow-left"></i> Retour
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Formulaire -->
                <div class="col-lg-8">
                    <form id="categoryForm">
                        <!-- Informations de Base -->
                        <div class="form-section">
                            <div class="form-section-header">
                                <h5 class="mb-0 text-secondary-custom">
                                    <i class="bi-info-circle me-2"></i>
                                    Informations de la Catégorie
                                </h5>
                            </div>
                            <div class="form-section-body">
                                <div class="mb-4">
                                    <label for="categoryLabel" class="form-label required-field">Nom de la Catégorie</label>
                                    <input type="text" class="form-control form-control-lg" id="categoryLabel" name="label"
                                        placeholder="Ex: RIZ, SUCRE, FARINE..." required>
                                    <div class="form-text">Nom court et descriptif de la catégorie</div>
                                </div>

                                <div class="mb-4">
                                    <label for="categoryDescription" class="form-label">Description</label>
                                    <textarea class="form-control" id="categoryDescription" name="description" rows="4"
                                        placeholder="Description détaillée de la catégorie et des produits qu'elle contient..."></textarea>
                                    <div class="form-text">Informations complémentaires (optionnel)</div>
                                </div>

                                <div class="mb-4">
                                    <label for="categoryStatus" class="form-label">Statut</label>
                                    <select class="form-select" id="categoryStatus" name="is_active">
                                        <option value="1">Active - Visible dans le système</option>
                                        <option value="0">Inactive - Masquée temporairement</option>
                                    </select>
                                    <div class="form-text">Une catégorie inactive n'apparaît pas dans les listes de sélection</div>
                                </div>

                                <div class="info-box">
                                    <small class="text-info">
                                        <i class="bi-lightbulb me-1"></i>
                                        <strong>Conseil :</strong> Les modifications seront appliquées immédiatement. Assurez-vous que les informations sont correctes avant de sauvegarder.
                                    </small>
                                </div>
                            </div>
                        </div>

                        <!-- Boutons d'Action -->
                        <div class="d-flex justify-content-between align-items-center mb-5">
                            <a href="/categories-produits-liste" class="btn-action btn-cancel">
                                <i class="bi-x-circle me-1"></i> Annuler
                            </a>

                            <button type="submit" class="btn-action btn-save" id="submitBtn">
                                <i class="bi-check-circle me-1"></i> Sauvegarder
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Aperçu en temps réel -->
                <div class="col-lg-4">
                    <div class="position-sticky" style="top: 2rem;">
                        <div class="form-section">
                            <div class="form-section-header">
                                <h6 class="mb-0 text-secondary-custom">
                                    <i class="bi-eye me-2"></i>
                                    Aperçu
                                </h6>
                            </div>
                            <div class="form-section-body">
                                <div class="category-preview" id="categoryPreview">
                                    <div class="preview-icon" id="previewIcon">
                                        <i class="bi-grid-3x3-gap"></i>
                                    </div>
                                    <h4 class="text-secondary-custom mb-2" id="previewLabel">Nom de la Catégorie</h4>
                                    <p class="text-muted mb-3" id="previewDescription">Description de la catégorie</p>
                                    <span class="badge bg-success" id="previewStatus">Active</span>
                                </div>

                                <div class="mt-4">
                                    <h6 class="text-secondary-custom mb-3">Informations de la Catégorie</h6>
                                    <div class="list-group list-group-flush">
                                        <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                            <small class="text-muted">ID</small>
                                            <small class="fw-semibold" id="previewId">-</small>
                                        </div>
                                        <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                            <small class="text-muted">Créée le</small>
                                            <small class="fw-semibold" id="previewCreatedAt">-</small>
                                        </div>
                                        <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                            <small class="text-muted">Modifiée le</small>
                                            <small class="fw-semibold" id="previewUpdatedAt">-</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Aide -->
                        <div class="card border-0 bg-light">
                            <div class="card-body">
                                <h6 class="card-title text-secondary-custom">
                                    <i class="bi-question-circle me-2"></i>
                                    Besoin d'aide ?
                                </h6>
                                <p class="card-text small">
                                    Modifiez les informations de la catégorie selon vos besoins. 
                                    Les changements seront appliqués immédiatement après sauvegarde.
                                </p>
                                <a href="#" class="btn btn-sm btn-outline-primary">
                                    <i class="bi-book me-1"></i> Guide d'utilisation
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Error State -->
        <div id="errorState" style="display: none;" class="error-state">
            <i class="bi-exclamation-triangle"></i>
            <h3 class="text-danger">Erreur de chargement</h3>
            <p class="text-muted">Impossible de charger les données de cette catégorie.</p>
            <button class="btn btn-primary-custom" onclick="loadCategoryData()">
                <i class="bi-arrow-clockwise me-1"></i> Réessayer
            </button>
        </div>
    </div>
</main>

<!-- Toast Container -->
<div id="toastContainer" class="toast-container"></div>

<script>
    let currentCategoryId = null;
    let originalData = null;
    let formModified = false;

    document.addEventListener('DOMContentLoaded', function() {
        // Récupérer l'ID de la catégorie depuis l'URL
        const urlParts = window.location.pathname.split('/');
        currentCategoryId = urlParts[urlParts.length - 2]; // Assuming URL is /categorie/{id}/edit
        
        console.log('URL parts:', urlParts);
        console.log('Category ID:', currentCategoryId);
        
        if (currentCategoryId && currentCategoryId !== 'edit') {
            loadCategoryData();
        } else {
            showError('ID de catégorie manquant');
        }

        // Aperçu en temps réel
        document.getElementById('categoryLabel').addEventListener('input', updatePreview);
        document.getElementById('categoryDescription').addEventListener('input', updatePreview);
        document.getElementById('categoryStatus').addEventListener('change', updatePreview);

        // Protection contre la perte de données
        document.getElementById('categoryForm').addEventListener('input', function() {
            formModified = true;
        });

        // Soumission du formulaire
        document.getElementById('categoryForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            await saveCategory();
        });
    });

    async function loadCategoryData() {
        if (!currentCategoryId) {
            showError('ID de catégorie manquant');
            return;
        }

        try {
            showLoading();

            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            
            if (!accessToken) {
                throw new Error('Token d\'accès manquant');
            }

            const response = await fetch(`https://toure.gestiem.com/api/product-categories/${currentCategoryId}`, {
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            const category = await response.json();

            if (response.ok) {
                originalData = category;
                populateForm(category);
                updatePreview();
                hideLoading();
                document.getElementById('mainContent').style.display = 'block';
            } else {
                throw new Error(category.message || 'Erreur lors du chargement de la catégorie');
            }

        } catch (error) {
            console.error('Error:', error);
            showError(error.message);
        }
    }

    function populateForm(category) {
        document.getElementById('categoryLabel').value = category.label || '';
        document.getElementById('categoryDescription').value = category.description || '';
        document.getElementById('categoryStatus').value = category.is_active ? '1' : '0';
        
        // Mise à jour de l'aperçu avec les données originales
        document.getElementById('previewId').textContent = category.product_category_id || '-';
        document.getElementById('previewCreatedAt').textContent = formatDate(category.created_at);
        document.getElementById('previewUpdatedAt').textContent = formatDate(category.updated_at);
    }

    function updatePreview() {
        const label = document.getElementById('categoryLabel').value || 'Nom de la Catégorie';
        const description = document.getElementById('categoryDescription').value || 'Description de la catégorie';
        const isActive = document.getElementById('categoryStatus').value === '1';

        document.getElementById('previewLabel').textContent = label;
        document.getElementById('previewDescription').textContent = description;

        const statusBadge = document.getElementById('previewStatus');
        if (isActive) {
            statusBadge.className = 'badge bg-success';
            statusBadge.textContent = 'Active';
        } else {
            statusBadge.className = 'badge bg-secondary';
            statusBadge.textContent = 'Inactive';
        }
    }

    async function saveCategory() {
        const submitBtn = document.getElementById('submitBtn');
        const originalBtnText = submitBtn.innerHTML;

        // Désactiver le bouton et afficher le loader
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Sauvegarde...';

        // Préparer les données
        const formData = {
            label: document.getElementById('categoryLabel').value.trim(),
            description: document.getElementById('categoryDescription').value.trim() || null,
            is_active: document.getElementById('categoryStatus').value === '1'
        };

        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            
            const response = await fetch(`https://toure.gestiem.com/api/product-categories/${currentCategoryId}`, {
                method: 'PUT',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(formData)
            });

            const result = await response.json();

            if (response.ok) {
                // Succès
                showToast('Sauvegarde réussie', 'La catégorie a été mise à jour avec succès', 'success');
                formModified = false;

                // Redirection vers les détails après 2 secondes
                setTimeout(() => {
                    window.location.href = `/categorie/${currentCategoryId}/details`;
                }, 2000);
            } else {
                // Erreur
                if (result.errors) {
                    let errorMsg = 'Erreurs de validation:\n';
                    Object.keys(result.errors).forEach(field => {
                        errorMsg += `\n• ${result.errors[field].join('\n• ')}`;
                    });
                    showToast('Erreur de validation', errorMsg, 'error');
                } else {
                    showToast('Erreur', result.message || 'Erreur lors de la mise à jour de la catégorie', 'error');
                }

                // Réactiver le bouton
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
            }
        } catch (error) {
            showToast('Erreur', 'Erreur de connexion au serveur', 'error');
            console.error('Error:', error);

            // Réactiver le bouton
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalBtnText;
        }
    }

    function showLoading() {
        document.getElementById('loadingState').style.display = 'flex';
        document.getElementById('mainContent').style.display = 'none';
        document.getElementById('errorState').style.display = 'none';
    }

    function hideLoading() {
        document.getElementById('loadingState').style.display = 'none';
    }

    function showError(message) {
        document.getElementById('loadingState').style.display = 'none';
        document.getElementById('mainContent').style.display = 'none';
        document.getElementById('errorState').style.display = 'block';
    }

    function formatDate(dateString) {
        if (!dateString) return 'N/A';
        return new Date(dateString).toLocaleDateString('fr-FR', {
            year: 'numeric',
            month: 'short',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        });
    }

    // Protection contre la perte de données
    window.addEventListener('beforeunload', function(e) {
        if (formModified) {
            e.preventDefault();
            e.returnValue = '';
        }
    });

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
</script>

<?php
$content = ob_get_clean();
require('./views/layouts/app-layout.php');
?>
