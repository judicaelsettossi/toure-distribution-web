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

    .category-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, #d1036d 100%);
        color: white;
        padding: 2rem;
        border-radius: 12px 12px 0 0;
    }

    .category-avatar-large {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        font-weight: 700;
        background: white;
        color: var(--primary-color);
        border: 4px solid rgba(255, 255, 255, 0.3);
    }

    .info-item {
        padding: 1rem;
        border-bottom: 1px solid #e9ecef;
    }

    .info-item:last-child {
        border-bottom: none;
    }

    .info-label {
        font-weight: 600;
        color: #6c757d;
        font-size: 0.875rem;
        margin-bottom: 0.25rem;
    }

    .info-value {
        font-size: 1rem;
        color: #212529;
    }

    .stat-box {
        text-align: center;
        padding: 1.5rem;
        border-radius: 10px;
        background: linear-gradient(135deg, var(--light-primary) 0%, #f8f9fa 100%);
    }

    .stat-value {
        font-size: 2rem;
        font-weight: 700;
        color: var(--secondary-color);
    }

    .stat-label {
        font-size: 0.875rem;
        color: #6c757d;
        margin-top: 0.5rem;
    }

    .badge-type {
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.875rem;
    }

    .badge-active {
        background-color: #e8f5e9;
        color: #388e3c;
    }

    .badge-inactive {
        background-color: #ffebee;
        color: #d32f2f;
    }

    .section-coming-soon {
        opacity: 0.5;
        pointer-events: none;
        position: relative;
    }

    .section-coming-soon::after {
        content: 'Bientôt disponible';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: var(--primary-color);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 600;
        z-index: 10;
    }

    /* Modal de confirmation de suppression */
    .modal-content {
        border-radius: 16px;
        border: none;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
    }

    .modal-header {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 16px 16px 0 0;
    }

    .modal-title {
        font-weight: 600;
        color: #dc3545;
    }

    .modal-body {
        padding: 2rem;
    }

    .modal-footer {
        padding: 1rem 2rem 2rem;
    }

    .modal-footer .btn {
        border-radius: 8px;
        font-weight: 500;
        padding: 0.75rem 1.5rem;
    }

    .modal-footer .btn-danger {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        border: none;
        box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
    }

    .modal-footer .btn-danger:hover {
        background: linear-gradient(135deg, #c82333 0%, #bd2130 100%);
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(220, 53, 69, 0.4);
    }

    .modal-footer .btn-outline-secondary {
        border-color: #6c757d;
        color: #6c757d;
    }

    .modal-footer .btn-outline-secondary:hover {
        background-color: #6c757d;
        border-color: #6c757d;
        color: white;
    }

    /* Modal de toggle status */
    .modal-footer .btn-success {
        background: linear-gradient(135deg, #198754 0%, #157347 100%);
        border: none;
        box-shadow: 0 4px 15px rgba(25, 135, 84, 0.3);
    }

    .modal-footer .btn-success:hover {
        background: linear-gradient(135deg, #157347 0%, #146c43 100%);
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(25, 135, 84, 0.4);
    }

    .modal-footer .btn-warning {
        background: linear-gradient(135deg, #ffc107 0%, #ffb300 100%);
        border: none;
        box-shadow: 0 4px 15px rgba(255, 193, 7, 0.3);
    }

    .modal-footer .btn-warning:hover {
        background: linear-gradient(135deg, #ffb300 0%, #ffa000 100%);
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(255, 193, 7, 0.4);
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
        
        .category-header {
            padding: 1.5rem;
        }
        
        .category-avatar-large {
            width: 80px;
            height: 80px;
            font-size: 2rem;
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
                            <li class="breadcrumb-item"><a class="breadcrumb-link text-primary-custom" href="/">Tableau de Bord</a></li>
                            <li class="breadcrumb-item"><a class="breadcrumb-link text-primary-custom" href="/categories-produits-liste">Catégories</a></li>
                            <li class="breadcrumb-item active" id="categoryNameBreadcrumb">Détails</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-sm-auto">
                    <button class="btn btn-outline-secondary me-2" onclick="window.history.back()">
                        <i class="bi-arrow-left me-1"></i> Retour
                    </button>
                    <button class="btn btn-primary-custom" onclick="editCategory()">
                        <i class="bi-pencil me-1"></i> Modifier
                    </button>
                </div>
            </div>
        </div>

        <div id="loadingState" class="text-center py-5">
            <div class="spinner-border text-primary-custom" role="status">
                <span class="visually-hidden">Chargement...</span>
            </div>
            <p class="mt-3 text-muted">Chargement des informations de la catégorie...</p>
        </div>

        <div id="categoryContent" style="display: none;">
            <!-- Category Header Card -->
            <div class="card card-custom mb-4">
                <div class="category-header">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="category-avatar-large" id="categoryAvatar">CA</div>
                        </div>
                        <div class="col">
                            <h2 class="mb-1" id="categoryName">-</h2>
                            <p class="mb-2 opacity-75">
                                <i class="bi-tag me-2"></i>
                                <span id="categoryCode">-</span>
                            </p>
                            <div class="d-flex align-items-center gap-3">
                                <span class="badge badge-type" id="categoryStatusBadge">-</span>
                            </div>
                        </div>
                        <div class="col-auto text-end">
                            <div class="btn-group">
                                <button class="btn btn-light" onclick="toggleCategoryStatus()" id="toggleStatusBtn">
                                    <i class="bi-toggle-off me-1"></i> Activer/Désactiver
                                </button>
                                <button class="btn btn-danger" onclick="confirmDeleteCategory()">
                                    <i class="bi-trash me-1"></i> Supprimer
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Informations Principales -->
                <div class="col-lg-8">
                    <!-- Informations Générales -->
                    <div class="card card-custom mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi-info-circle me-2 text-primary-custom"></i>
                                Informations Générales
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="info-item">
                                <div class="info-label">ID Catégorie</div>
                                <div class="info-value" id="categoryId">-</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Nom de la Catégorie</div>
                                <div class="info-value" id="categoryLabel">-</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Description</div>
                                <div class="info-value" id="categoryDescription">-</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Statut</div>
                                <div class="info-value" id="categoryStatus">-</div>
                            </div>
                        </div>
                    </div>

                    <!-- Dates et Historique -->
                    <div class="card card-custom mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi-calendar3 me-2 text-primary-custom"></i>
                                Dates et Historique
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="info-item">
                                <div class="info-label">Date de Création</div>
                                <div class="info-value" id="categoryCreatedAt">-</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Dernière Modification</div>
                                <div class="info-value" id="categoryUpdatedAt">-</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Durée d'Existence</div>
                                <div class="info-value" id="categoryAge">-</div>
                            </div>
                        </div>
                    </div>

                    <!-- Produits de cette Catégorie -->
                    <div class="card card-custom mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi-box-seam me-2 text-primary-custom"></i>
                                Produits de cette Catégorie
                            </h5>
                        </div>
                        <div class="card-body">
                            <div id="productsList">
                                <div class="text-center text-muted py-4">
                                    <i class="bi-box fs-1"></i>
                                    <p class="mt-2">Chargement des produits...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Statistiques -->
                    <div class="card card-custom mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi-graph-up me-2 text-primary-custom"></i>
                                Statistiques
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="stat-box mb-3">
                                <div class="stat-value" id="totalProducts">-</div>
                                <div class="stat-label">Produits Total</div>
                            </div>
                            <div class="stat-box mb-3">
                                <div class="stat-value" id="daysSinceCreation">-</div>
                                <div class="stat-label">Jours d'Existence</div>
                            </div>
                            <div class="stat-box">
                                <div class="stat-value" id="lastUpdate">-</div>
                                <div class="stat-label">Dernière Modification</div>
                            </div>
                        </div>
                    </div>

                    <!-- Informations Système -->
                    <div class="card card-custom mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi-gear me-2 text-primary-custom"></i>
                                Informations Système
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="info-item">
                                <div class="info-label">Statut API</div>
                                <div class="info-value text-success">
                                    <i class="bi-check-circle me-1"></i>Connecté
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Version API</div>
                                <div class="info-value">v1.0</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Dernière Synchronisation</div>
                                <div class="info-value" id="lastSync">Maintenant</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Permissions</div>
                                <div class="info-value">
                                    <span class="badge bg-success me-1">Lecture</span>
                                    <span class="badge bg-success me-1">Modification</span>
                                    <span class="badge bg-success">Suppression</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modal de Confirmation de Suppression -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title" id="deleteConfirmModalLabel">
                    <i class="bi-exclamation-triangle-fill text-danger me-2"></i>
                    Confirmer la suppression
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0">
                <div class="text-center mb-4">
                    <div class="bg-danger bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="bi-trash-fill text-danger" style="font-size: 2rem;"></i>
                    </div>
                    <h6 class="text-dark mb-2">Êtes-vous sûr de vouloir supprimer cette catégorie ?</h6>
                    <p class="text-muted mb-0" id="deleteCategoryName">-</p>
                </div>
                <div class="alert alert-warning border-0">
                    <div class="d-flex align-items-start">
                        <i class="bi-info-circle-fill text-warning me-2 mt-1"></i>
                        <div>
                            <strong>Attention :</strong> Cette action est irréversible. Toutes les données associées à cette catégorie seront définitivement supprimées.
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="bi-x-circle me-1"></i> Annuler
                </button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">
                    <i class="bi-trash me-1"></i> Supprimer définitivement
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Confirmation d'Activation/Désactivation -->
<div class="modal fade" id="toggleStatusModal" tabindex="-1" aria-labelledby="toggleStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title" id="toggleStatusModalLabel">
                    <i class="bi-toggle-on text-warning me-2"></i>
                    <span id="toggleStatusTitle">Confirmer l'action</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0">
                <div class="text-center mb-4">
                    <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="bi-toggle-on text-warning" id="toggleStatusIcon" style="font-size: 2rem;"></i>
                    </div>
                    <h6 class="text-dark mb-2" id="toggleStatusMessage">Êtes-vous sûr de vouloir effectuer cette action ?</h6>
                    <p class="text-muted mb-0" id="toggleCategoryName">-</p>
                </div>
                <div class="alert alert-info border-0">
                    <div class="d-flex align-items-start">
                        <i class="bi-info-circle-fill text-info me-2 mt-1"></i>
                        <div>
                            <strong>Information :</strong> <span id="toggleStatusInfo">Cette action modifiera le statut de la catégorie dans le système.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="bi-x-circle me-1"></i> Annuler
                </button>
                <button type="button" class="btn btn-warning" id="confirmToggleBtn">
                    <i class="bi-check-circle me-1"></i> <span id="toggleConfirmText">Confirmer</span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Toast Container -->
<div id="toastContainer" class="toast-container"></div>

<script>
    let categoryData = null;

    document.addEventListener('DOMContentLoaded', function() {
        // Récupérer l'ID de la catégorie depuis l'URL
        const urlParts = window.location.pathname.split('/');
        currentCategoryId = urlParts[urlParts.length - 2]; // Assuming URL is /categorie/{id}/details
        
        console.log('URL parts:', urlParts);
        console.log('Category ID:', currentCategoryId);
        
        if (currentCategoryId && currentCategoryId !== 'details') {
            loadCategoryDetails();
        } else {
            showError('ID de catégorie manquant');
        }
    });

    async function loadCategoryDetails() {
        if (!currentCategoryId) {
            showError('ID de catégorie manquant');
            return;
        }

        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            
            if (!accessToken) {
                throw new Error('Token d\'accès manquant');
            }

            // Charger les détails de la catégorie
            const response = await fetch(`https://toure.gestiem.com/api/product-categories/${currentCategoryId}`, {
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            const category = await response.json();

            if (response.ok) {
                categoryData = category;
                displayCategoryDetails(category);
                loadCategoryProducts();
            } else {
                throw new Error(category.message || 'Erreur lors du chargement de la catégorie');
            }

        } catch (error) {
            console.error('Error:', error);
            showError(error.message);
        }
    }

    async function loadCategoryProducts() {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            
            const response = await fetch(`https://toure.gestiem.com/api/products/category/${currentCategoryId}`, {
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            const result = await response.json();

            if (response.ok) {
                displayProducts(result.data || []);
            } else {
                console.warn('Erreur lors du chargement des produits:', result.message);
                displayProducts([]);
            }

        } catch (error) {
            console.warn('Erreur lors du chargement des produits:', error);
            displayProducts([]);
        }
    }

    function displayCategoryDetails(category) {
        document.getElementById('loadingState').style.display = 'none';
        document.getElementById('categoryContent').style.display = 'block';

        // Header
        document.getElementById('categoryAvatar').textContent = getInitials(category.label);
        document.getElementById('categoryName').textContent = category.label || 'Catégorie sans nom';
        document.getElementById('categoryCode').textContent = category.product_category_id;
        document.getElementById('categoryNameBreadcrumb').textContent = category.label || 'Catégorie sans nom';

        // Status
        const statusBadge = document.getElementById('categoryStatusBadge');
        if (category.is_active) {
            statusBadge.textContent = 'Active';
            statusBadge.className = 'badge badge-type badge-active';
        } else {
            statusBadge.textContent = 'Inactive';
            statusBadge.className = 'badge badge-type badge-inactive';
        }

        // Informations
        document.getElementById('categoryId').textContent = category.product_category_id;
        document.getElementById('categoryLabel').textContent = category.label || 'Non renseigné';
        document.getElementById('categoryDescription').textContent = category.description || 'Aucune description';
        document.getElementById('categoryStatus').textContent = category.is_active ? 'Active' : 'Inactive';

        // Dates
        document.getElementById('categoryCreatedAt').textContent = formatDate(category.created_at);
        document.getElementById('categoryUpdatedAt').textContent = formatDate(category.updated_at);
        
        // Calculer l'âge de la catégorie
        const createdAt = new Date(category.created_at);
        const now = new Date();
        const daysDiff = Math.floor((now - createdAt) / (1000 * 60 * 60 * 24));
        document.getElementById('categoryAge').textContent = `${daysDiff} jours`;

        // Stats
        document.getElementById('totalProducts').textContent = '0'; // Will be updated when products load
        document.getElementById('daysSinceCreation').textContent = daysDiff;
        
        const updatedAt = new Date(category.updated_at);
        const hoursDiff = Math.floor((now - updatedAt) / (1000 * 60 * 60));
        if (hoursDiff < 24) {
            document.getElementById('lastUpdate').textContent = `${hoursDiff}h`;
        } else {
            document.getElementById('lastUpdate').textContent = `${Math.floor(hoursDiff / 24)}j`;
        }
    }

    function displayProducts(products) {
        const productsList = document.getElementById('productsList');
        const totalProductsElement = document.getElementById('totalProducts');
        
        totalProductsElement.textContent = products.length;

        if (products.length === 0) {
            productsList.innerHTML = `
                <div class="text-center text-muted py-4">
                    <i class="bi-box fs-1"></i>
                    <h5 class="mt-3">Aucun produit trouvé</h5>
                    <p class="text-muted">Cette catégorie ne contient actuellement aucun produit.</p>
                </div>
            `;
        } else {
            productsList.innerHTML = `
                <div class="row">
                    ${products.map(product => `
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="card-title">${product.name || 'Produit sans nom'}</h6>
                                    <p class="card-text text-muted small">${product.description || 'Aucune description'}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="badge bg-info">${product.price || 'N/A'} FCFA</span>
                                        <small class="text-muted">Stock: ${product.stock || 0}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `).join('')}
                </div>
            `;
        }
    }

    function toggleCategoryStatus() {
        if (!categoryData) return;

        const newStatus = !categoryData.is_active;
        const isActivating = newStatus;
        
        // Mettre à jour le contenu de la modal
        document.getElementById('toggleStatusTitle').textContent = isActivating ? 'Activer la catégorie' : 'Désactiver la catégorie';
        document.getElementById('toggleStatusMessage').textContent = isActivating ? 
            'Êtes-vous sûr de vouloir activer cette catégorie ?' : 
            'Êtes-vous sûr de vouloir désactiver cette catégorie ?';
        document.getElementById('toggleCategoryName').textContent = categoryData.label;
        document.getElementById('toggleStatusInfo').textContent = isActivating ? 
            'La catégorie sera visible dans toutes les listes et pourra être utilisée pour créer des produits.' :
            'La catégorie ne sera plus visible dans les listes et ne pourra plus être utilisée pour créer des produits.';
        document.getElementById('toggleConfirmText').textContent = isActivating ? 'Activer' : 'Désactiver';
        
        // Changer l'icône selon l'action
        const icon = document.getElementById('toggleStatusIcon');
        icon.className = isActivating ? 'bi-toggle-on text-success' : 'bi-toggle-off text-danger';
        
        // Changer la couleur du cercle de fond
        const circle = icon.parentElement;
        circle.className = isActivating ? 
            'bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3' :
            'bg-danger bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3';
        
        // Changer la couleur du bouton
        const confirmBtn = document.getElementById('confirmToggleBtn');
        confirmBtn.className = isActivating ? 'btn btn-success' : 'btn btn-danger';
        
        // Afficher la modal
        const modal = new bootstrap.Modal(document.getElementById('toggleStatusModal'));
        modal.show();
        
        // Ajouter l'événement de confirmation
        document.getElementById('confirmToggleBtn').onclick = async function() {
            modal.hide();
            await performToggleStatus(newStatus);
        };
    }

    async function performToggleStatus(newStatus) {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            
            const response = await fetch(`https://toure.gestiem.com/api/product-categories/${currentCategoryId}`, {
                method: 'PUT',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    ...categoryData,
                    is_active: newStatus
                })
            });

            const result = await response.json();

            if (response.ok) {
                showToast('Succès', result.message || 'Statut mis à jour avec succès', 'success');
                loadCategoryDetails();
            } else {
                showToast('Erreur', result.message || 'Erreur lors de la mise à jour', 'error');
            }
        } catch (error) {
            showToast('Erreur', 'Erreur de connexion au serveur', 'error');
        }
    }

    function confirmDeleteCategory() {
        if (!categoryData) return;
        
        // Afficher le nom de la catégorie dans la modal
        document.getElementById('deleteCategoryName').textContent = categoryData.label;
        
        // Afficher la modal
        const modal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
        modal.show();
        
        // Ajouter l'événement de confirmation
        document.getElementById('confirmDeleteBtn').onclick = async function() {
            modal.hide();
            await deleteCategory();
        };
    }

    async function deleteCategory() {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            
            const response = await fetch(`https://toure.gestiem.com/api/product-categories/${currentCategoryId}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            const result = await response.json();

            if (response.ok) {
                showToast('Suppression réussie', 'La catégorie a été supprimée avec succès', 'success');
                
                // Redirection après 2 secondes
                setTimeout(() => {
                    window.location.href = '/categories-produits-liste';
                }, 2000);
            } else {
                showToast('Erreur', result.message || 'Erreur lors de la suppression', 'error');
            }

        } catch (error) {
            console.error('Error:', error);
            showToast('Erreur', error.message, 'error');
        }
    }

    function editCategory() {
        window.location.href = `/categorie/${currentCategoryId}/edit`;
    }

    function getInitials(label) {
        if (!label) return 'CA';
        return label.split(' ').map(n => n[0]).join('').substring(0, 2).toUpperCase();
    }

    function formatDate(dateString) {
        if (!dateString) return 'N/A';
        return new Date(dateString).toLocaleDateString('fr-FR', {
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        });
    }

    function showError(message) {
        document.getElementById('loadingState').innerHTML = `
        <i class="bi-exclamation-triangle fs-1 text-danger"></i>
        <p class="mt-3 text-danger">${message}</p>
        <div class="d-flex gap-2 justify-content-center">
            <button class="btn btn-primary-custom" onclick="location.reload()">
                <i class="bi-arrow-clockwise me-1"></i> Réessayer
            </button>
            <button class="btn btn-outline-secondary" onclick="window.location.href='/categories-produits-liste'">
                <i class="bi-arrow-left me-1"></i> Retour à la liste
            </button>
        </div>
    `;
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