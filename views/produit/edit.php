<?php
ob_start();
$product_id = $id ?? '';
?>

<style>
    :root {
        --primary-color: #f00480;
        --secondary-color: #010768;
        --accent-color: #010068;
        --light-primary: rgba(240, 4, 128, 0.1);
        --light-secondary: rgba(1, 7, 104, 0.1);
        --success-color: #28a745;
        --warning-color: #ffc107;
        --danger-color: #dc3545;
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

    /* Image upload */
    .image-upload-section {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 1.5rem;
        border: 2px dashed #dee2e6;
        text-align: center;
    }

    .current-image-preview {
        text-align: center;
        margin-bottom: 1rem;
    }

    .preview-image {
        max-width: 200px;
        max-height: 200px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 0.5rem;
    }

    .upload-area {
        background: white;
        border-radius: 8px;
        padding: 1.5rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        border: 2px dashed #dee2e6;
    }

    .upload-area:hover {
        border-color: var(--primary-color);
        background: var(--light-primary);
    }

    .upload-icon {
        font-size: 2rem;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
    }

    .upload-text {
        font-size: 1rem;
        font-weight: 600;
        color: var(--secondary-color);
        margin-bottom: 0.25rem;
    }

    .upload-hint {
        font-size: 0.875rem;
        color: #6c757d;
    }

    #imagePreview {
        max-width: 100%;
        max-height: 200px;
        border-radius: 8px;
        margin-top: 1rem;
        display: none;
    }

    /* Price calculator */
    .price-calculator {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 1rem;
        margin-top: 1rem;
        border: 1px solid #dee2e6;
    }

    .calculator-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.5rem 0;
        border-bottom: 1px solid #dee2e6;
    }

    .calculator-row:last-child {
        border-bottom: none;
        padding-top: 0.5rem;
        margin-top: 0.5rem;
        border-top: 2px solid var(--primary-color);
        font-weight: 600;
    }

    .calculator-label {
        font-weight: 500;
        color: #495057;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .calculator-value {
        font-weight: 600;
        font-size: 1rem;
    }

    .profit-positive {
        color: var(--success-color);
    }

    .profit-negative {
        color: var(--danger-color);
    }

    /* Toggle switch */
    .toggle-container {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background: #f8f9fa;
        border-radius: 8px;
    }

    .toggle-switch {
        position: relative;
        width: 50px;
        height: 25px;
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
        border-radius: 25px;
    }

    .toggle-slider:before {
        position: absolute;
        content: "";
        height: 19px;
        width: 19px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: 0.4s;
        border-radius: 50%;
    }

    input:checked+.toggle-slider {
        background-color: var(--primary-color);
    }

    input:checked+.toggle-slider:before {
        transform: translateX(25px);
    }

    .toggle-label {
        font-weight: 600;
        color: var(--secondary-color);
    }

    .toggle-status {
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 0.875rem;
        font-weight: 600;
    }

    .status-active {
        background: rgba(40, 167, 69, 0.1);
        color: var(--success-color);
    }

    .status-inactive {
        background: rgba(220, 53, 69, 0.1);
        color: var(--danger-color);
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
        font-size: 1rem;
    }

    .form-control-modern.with-icon {
        padding-right: 3rem;
    }

    /* Style pour les boutons de catégorie */
    .category-buttons {
        display: flex;
        gap: 0.5rem;
        align-items: center;
    }

    .category-buttons .btn-modern {
        padding: 0.5rem;
        min-width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
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
                            <li class="breadcrumb-item"><a class="breadcrumb-link text-primary-custom" href="/">Tableau de Bord</a></li>
                            <li class="breadcrumb-item"><a class="breadcrumb-link text-primary-custom" href="/liste-produit">Produits</a></li>
                            <li class="breadcrumb-item active" id="productNameBreadcrumb">Modifier</li>
                        </ol>
                    </nav>
                    <h2 class="mb-0 text-secondary-custom">Modifier le Produit</h2>
                </div>
                <div class="col-sm-auto">
                    <button class="btn btn-secondary-modern me-2" onclick="window.history.back()">
                        <i class="bi-arrow-left me-1"></i> Retour
                    </button>
                    <button class="btn btn-outline-modern" onclick="window.location.href='/liste-produit'">
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
            <p class="mt-3 text-muted">Chargement des données du produit...</p>
        </div>

        <!-- Error State -->
        <div id="errorState" class="text-center py-5" style="display: none;">
            <i class="bi-exclamation-triangle fs-1 text-danger"></i>
            <p class="mt-3 text-danger" id="errorMessage">Erreur lors du chargement</p>
            <div class="d-flex gap-2 justify-content-center">
                <button class="btn btn-primary-custom" onclick="location.reload()">
                    <i class="bi-arrow-clockwise me-1"></i> Réessayer
                </button>
                <button class="btn btn-secondary-modern" onclick="window.location.href='/liste-produit'">
                    <i class="bi-arrow-left me-1"></i> Retour à la liste
                </button>
            </div>
        </div>

        <!-- Form Container -->
        <div id="formContainer" style="display: none;">
            <!-- Alert Container -->
            <div id="alertContainer"></div>

            <form id="editProductForm">
                <!-- Image du Produit -->
                <div class="form-section">
                    <div class="section-header">
                        <h5 class="section-title">
                            <i class="bi-image text-primary-custom"></i>
                            Image du Produit
                        </h5>
                    </div>
                    <div class="card-body">
                            <div class="current-image-preview" id="currentImagePreview" style="display: none;">
                                <img id="currentImage" class="preview-image" alt="Image actuelle">
                                <div class="mt-2">
                                    <small class="text-muted-custom">Image actuelle</small>
                                </div>
                            </div>
                            <div class="upload-area" onclick="document.getElementById('image').click()">
                                <div class="upload-icon">
                                    <i class="bi-cloud-upload"></i>
                                </div>
                                <div class="upload-text">Cliquez pour changer l'image</div>
                                <div class="upload-hint">PNG, JPG, JPEG jusqu'à 2MB</div>
                            </div>
                            <input type="file" id="image" name="image" accept="image/*" style="display: none;" onchange="previewImage(this)">
                            <img id="imagePreview" class="preview-image" style="display: none;">
                        </div>
                    </div>
                </div>

                <!-- Informations Générales -->
                <div class="form-section">
                    <div class="section-header">
                        <h5 class="section-title">
                            <i class="bi-info-circle text-primary-custom"></i>
                            Informations Générales
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">Code du produit</label>
                                    <input type="text" id="code" name="code" class="form-control-modern" readonly>
                                    <small class="text-muted-custom">Généré automatiquement</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">
                                        Catégorie <span class="label-required"></span>
                                    </label>
                                    <div class="input-with-icon">
                                        <select id="product_category_id" name="product_category_id" class="form-control-modern form-select-modern" required>
                                            <option value="">Sélectionner une catégorie</option>
                                        </select>
                                        <i class="bi-chevron-down input-icon"></i>
                                    </div>
                                    <div class="category-buttons mt-2">
                                        <button type="button" class="btn btn-outline-modern" onclick="loadCategories()">
                                            <i class="bi-arrow-clockwise"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-modern" onclick="showAddCategoryModal()">
                                            <i class="bi-plus"></i> Ajouter
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">
                                        Nom du produit <span class="label-required"></span>
                                    </label>
                                    <input type="text" id="name" name="name" class="form-control-modern" placeholder="Ex: Ordinateur portable Dell" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">Description</label>
                                    <textarea id="description" name="description" class="form-control-modern" rows="3" placeholder="Description détaillée du produit"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Prix et Coûts -->
                <div class="form-section">
                    <div class="section-header">
                        <h5 class="section-title">
                            <i class="bi-currency-exchange text-primary-custom"></i>
                            Prix et Coûts
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">
                                        Prix unitaire (FCFA) <span class="label-required"></span>
                                    </label>
                                    <div class="input-with-icon">
                                        <input type="number" id="unit_price" name="unit_price" class="form-control-modern with-icon" placeholder="0" min="0" step="0.01" required>
                                        <i class="bi-currency-exchange input-icon"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">
                                        Coût d'achat (FCFA) <span class="label-required"></span>
                                    </label>
                                    <div class="input-with-icon">
                                        <input type="number" id="cost" name="cost" class="form-control-modern with-icon" placeholder="0" min="0" step="0.01" required>
                                        <i class="bi-cash input-icon"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">Coût minimum (FCFA)</label>
                                    <div class="input-with-icon">
                                        <input type="number" id="minimum_cost" name="minimum_cost" class="form-control-modern with-icon" placeholder="0" min="0" step="0.01">
                                        <i class="bi-graph-down input-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <!-- Calculateur de prix -->
                        <div class="price-calculator" id="priceCalculator" style="display: none;">
                            <div class="calculator-row">
                                <span class="calculator-label">
                                    <i class="bi-cash"></i>
                                    Prix de vente
                                </span>
                                <span class="calculator-value" id="displayUnitPrice">0 FCFA</span>
                            </div>
                            <div class="calculator-row">
                                <span class="calculator-label">
                                    <i class="bi-cash-stack"></i>
                                    Coût d'achat
                                </span>
                                <span class="calculator-value" id="displayCost">0 FCFA</span>
                            </div>
                            <div class="calculator-row">
                                <span class="calculator-label">
                                    <i class="bi-graph-up"></i>
                                    Marge bénéficiaire
                                </span>
                                <span class="calculator-value" id="displayProfit">0 FCFA</span>
                            </div>
                            <div class="calculator-row">
                                <span class="calculator-label">
                                    <i class="bi-percent"></i>
                                    Marge en %
                                </span>
                                <span class="calculator-value" id="displayProfitPercent">0%</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gestion du Stock -->
                <div class="form-section">
                    <div class="section-header">
                        <h5 class="section-title">
                            <i class="bi-box-seam text-primary-custom"></i>
                            Gestion du Stock
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">Niveau de stock minimum</label>
                                    <div class="input-with-icon">
                                        <input type="number" id="min_stock_level" name="min_stock_level" class="form-control-modern with-icon" placeholder="0" min="0" step="1">
                                        <i class="bi-exclamation-triangle input-icon"></i>
                                    </div>
                                    <small class="text-muted-custom">Alerte quand le stock est en dessous de ce niveau</small>
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
                                <input type="checkbox" id="isActive" name="is_active" class="form-check-input-modern" checked>
                                <label class="form-check-label-modern" for="isActive">
                                    Produit actif
                                </label>
                            </div>
                            <small class="text-muted-custom">
                                <i class="bi-info-circle me-1"></i>
                                Les produits inactifs ne sont pas visibles dans les commandes
                            </small>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="form-section">
                    <div class="card-body">
                        <div class="d-flex gap-3 justify-content-end">
                            <button type="button" class="btn btn-secondary-modern" onclick="window.location.href='/liste-produit'">
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

<!-- Loading overlay -->
<div id="loadingOverlay" class="loading-overlay" style="display: none;">
    <div class="loading-content">
        <div class="loading-spinner"></div>
        <div class="loading-text">Mise à jour en cours...</div>
    </div>
</div>

<script>
    const productId = '<?php echo $product_id; ?>';
    let categories = [];
    let currentProduct = null;

    document.addEventListener('DOMContentLoaded', function() {
        if (!productId) {
            showAlert('ID du produit manquant', 'danger');
            return;
        }

        // Charger d'abord les catégories, puis les données du produit
        loadCategories().then(() => {
            loadProductData();
        }).catch(error => {
            console.error('Erreur lors du chargement initial:', error);
            showAlert('Erreur lors du chargement des données', 'danger');
        });
        
        setupEventListeners();
    });

    async function loadCategories() {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            
            if (!accessToken) {
                console.error('Token d\'accès manquant');
                showAlert('Erreur d\'authentification', 'danger');
                return;
            }

            const response = await fetch('https://toure.gestiem.com/api/product-categories', {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            if (!response.ok) {
                if (response.status === 401) {
                    window.location.href = '/login';
                    return;
                }
                throw new Error(`Erreur ${response.status}: ${response.statusText}`);
            }

            const result = await response.json();
            console.log('Catégories reçues:', result); // Debug
            
            // L'API retourne directement un tableau de catégories selon la documentation
            const categoriesList = Array.isArray(result) ? result : (result.data || []);
            console.log('Catégories traitées:', categoriesList); // Debug
            
            categories = categoriesList.filter(cat => cat.is_active !== false); // Filtrer les catégories actives
            populateCategorySelect();
            
            // Afficher le nombre de catégories chargées
            console.log(`${categories.length} catégories chargées`);
            
        } catch (error) {
            console.error('Erreur lors du chargement des catégories:', error);
            showAlert('Erreur lors du chargement des catégories: ' + error.message, 'danger');
            
            // En cas d'erreur, ajouter une option par défaut
            const select = document.getElementById('product_category_id');
            select.innerHTML = '';
            const errorOption = document.createElement('option');
            errorOption.value = '';
            errorOption.textContent = 'Erreur de chargement des catégories';
            errorOption.disabled = true;
            select.appendChild(errorOption);
            
            // Désactiver le bouton d'ajout de catégorie
            const addCategoryBtn = document.querySelector('[onclick="showAddCategoryModal()"]');
            if (addCategoryBtn) {
                addCategoryBtn.disabled = true;
            }
        }
    }

    function populateCategorySelect() {
        const select = document.getElementById('product_category_id');
        
        // Vider le select complètement
        select.innerHTML = '';
        
        if (!categories || categories.length === 0) {
            const noOption = document.createElement('option');
            noOption.value = '';
            noOption.textContent = 'Aucune catégorie disponible';
            noOption.disabled = true;
            select.appendChild(noOption);
            return;
        }
        
        // Ajouter l'option par défaut
        const defaultOption = document.createElement('option');
        defaultOption.value = '';
        defaultOption.textContent = 'Sélectionner une catégorie';
        select.appendChild(defaultOption);
        
        // Ajouter toutes les catégories
        categories.forEach(cat => {
            const option = document.createElement('option');
            option.value = cat.product_category_id;
            option.textContent = cat.label;
            
            // Ajouter la description si disponible
            if (cat.description) {
                option.textContent += ` - ${cat.description}`;
            }
            
            select.appendChild(option);
        });
        
        console.log(`Select de catégories peuplé avec ${categories.length} options`);
        
        // Activer le bouton d'ajout de catégorie
        const addCategoryBtn = document.querySelector('[onclick="showAddCategoryModal()"]');
        if (addCategoryBtn) {
            addCategoryBtn.disabled = false;
        }
    }

    function showAddCategoryModal() {
        const categoryName = prompt('Nom de la nouvelle catégorie:');
        if (categoryName && categoryName.trim()) {
            addNewCategory(categoryName.trim());
        }
    }

    async function addNewCategory(categoryName) {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            
            const response = await fetch('https://toure.gestiem.com/api/product-categories', {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    label: categoryName,
                    description: `Catégorie créée depuis l'édition de produit`,
                    is_active: true
                })
            });

            if (!response.ok) {
                if (response.status === 401) {
                    window.location.href = '/login';
                    return;
                }
                const errorResult = await response.json();
                throw new Error(errorResult.message || 'Erreur lors de la création de la catégorie');
            }

            const result = await response.json();
            const newCategory = result.data || result;
            
            // Ajouter la nouvelle catégorie à la liste
            categories.push(newCategory);
            
            // Mettre à jour le select
            populateCategorySelect();
            
            // Sélectionner la nouvelle catégorie
            document.getElementById('product_category_id').value = newCategory.product_category_id;
            
            showAlert(`Catégorie "${categoryName}" créée avec succès !`, 'success');
            
        } catch (error) {
            console.error('Erreur lors de la création de la catégorie:', error);
            showAlert('Erreur lors de la création de la catégorie: ' + error.message, 'danger');
        }
    }

    // Fonction pour rafraîchir la liste des catégories
    async function refreshCategories() {
        console.log('Rafraîchissement de la liste des catégories...');
        
        const refreshBtn = document.querySelector('[onclick="loadCategories()"]');
        const originalIcon = refreshBtn.innerHTML;
        
        // Afficher l'indicateur de chargement
        refreshBtn.innerHTML = '<i class="bi bi-arrow-clockwise spinner"></i>';
        refreshBtn.disabled = true;
        
        try {
            await loadCategories();
            showAlert('Liste des catégories rafraîchie avec succès !', 'success');
        } catch (error) {
            console.error('Erreur lors du rafraîchissement:', error);
            showAlert('Erreur lors du rafraîchissement des catégories', 'danger');
        } finally {
            // Restaurer le bouton
            refreshBtn.innerHTML = originalIcon;
            refreshBtn.disabled = false;
        }
    }

    async function loadProductData() {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';

            const response = await fetch(`https://toure.gestiem.com/api/products/${productId}`, {
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
                throw new Error('Produit introuvable');
            }

            const result = await response.json();
            currentProduct = result.data;
            populateForm(currentProduct);

            document.getElementById('loadingState').style.display = 'none';
            document.getElementById('formContainer').style.display = 'block';

        } catch (error) {
            console.error('Erreur:', error);
            showAlert('Erreur lors du chargement du produit: ' + error.message, 'danger');
            document.getElementById('loadingState').style.display = 'none';
        }
    }

    function populateForm(product) {
        console.log('Données du produit à peupler:', product); // Debug
        
        document.getElementById('code').value = product.code || '';
        document.getElementById('name').value = product.name || '';
        document.getElementById('description').value = product.description || '';
        
        // Gestion de la catégorie - supporte plusieurs structures
        let categoryId = '';
        if (product.product_category_id) {
            categoryId = product.product_category_id;
        } else if (product.category && product.category.product_category_id) {
            categoryId = product.category.product_category_id;
        } else if (product.category_id) {
            categoryId = product.category_id;
        }
        
        document.getElementById('product_category_id').value = categoryId;
        console.log('Catégorie sélectionnée:', categoryId); // Debug
        
        document.getElementById('unit_price').value = product.unit_price || 0;
        document.getElementById('cost').value = product.cost || 0;
        document.getElementById('minimum_cost').value = product.minimum_cost || 0;
        document.getElementById('min_stock_level').value = product.min_stock_level || 0;
        document.getElementById('isActive').checked = product.is_active;

        // Image actuelle
        if (product.picture) {
            const img = document.getElementById('currentImage');
            img.src = `https://toure.gestiem.com/storage/${product.picture}`;
            img.onerror = function() {
                document.getElementById('currentImagePreview').style.display = 'none';
            };
        } else {
            document.getElementById('currentImagePreview').style.display = 'none';
        }

        updateStatusDisplay();
        updatePriceCalculator();
        
        // Vérifier si la catégorie sélectionnée existe dans la liste
        if (categoryId && categories.length > 0) {
            const categoryExists = categories.find(cat => cat.product_category_id === categoryId);
            if (!categoryExists) {
                console.warn(`Catégorie ${categoryId} non trouvée dans la liste des catégories chargées`);
            }
        }
    }

    function setupEventListeners() {
        // Image upload
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                if (file.size > 5 * 1024 * 1024) {
                    showAlert('La taille de l\'image ne doit pas dépasser 5MB', 'danger');
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('imagePreview');
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });

        // Toggle status
        document.getElementById('isActive').addEventListener('change', updateStatusDisplay);

        // Price calculator
        ['unit_price', 'cost'].forEach(id => {
            document.getElementById(id).addEventListener('input', updatePriceCalculator);
        });

        // Form submit
        document.getElementById('editProductForm').addEventListener('submit', handleSubmit);
    }

    function updateStatusDisplay() {
        const isActive = document.getElementById('isActive').checked;
        const statusText = document.querySelector('.toggle-status');

        if (isActive) {
            statusText.textContent = 'Actif';
            statusText.className = 'toggle-status status-active';
        } else {
            statusText.textContent = 'Inactif';
            statusText.className = 'toggle-status status-inactive';
        }
    }

    function updatePriceCalculator() {
        const unitPrice = parseFloat(document.getElementById('unit_price').value) || 0;
        const cost = parseFloat(document.getElementById('cost').value) || 0;
        
        document.getElementById('displayUnitPrice').textContent = formatCurrency(unitPrice);
        document.getElementById('displayCost').textContent = formatCurrency(cost);

        const profit = unitPrice - cost;
        const profitPercent = cost > 0 ? ((profit / cost) * 100).toFixed(1) : 0;

        const calcProfit = document.getElementById('displayProfit');
        const calcProfitPercent = document.getElementById('displayProfitPercent');
        
        calcProfit.textContent = formatCurrency(profit);
        calcProfit.className = 'calculator-value ' + (profit >= 0 ? 'profit-positive' : 'profit-negative');
        
        calcProfitPercent.textContent = `${profitPercent}%`;
        calcProfitPercent.className = 'calculator-value ' + (profit >= 0 ? 'profit-positive' : 'profit-negative');
        
        // Afficher le calculateur s'il y a des valeurs
        const calculator = document.getElementById('priceCalculator');
        if (unitPrice > 0 || cost > 0) {
            calculator.style.display = 'block';
        } else {
            calculator.style.display = 'none';
        }
    }

    async function handleSubmit(e) {
        e.preventDefault();

        // Validation personnalisée pour la catégorie
        const categorySelect = document.getElementById('product_category_id');
        if (!categorySelect.value) {
            showAlert('Veuillez sélectionner une catégorie', 'danger');
            categorySelect.focus();
            categorySelect.classList.add('is-invalid');
            return;
        }

        // Clear previous errors
        document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        document.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');

        // Prepare data
        const formData = new FormData();
        formData.append('name', document.getElementById('name').value);
        formData.append('description', document.getElementById('description').value);
        formData.append('product_category_id', document.getElementById('product_category_id').value);
        formData.append('unit_price', document.getElementById('unit_price').value);
        formData.append('cost', document.getElementById('cost').value);
        formData.append('minimum_cost', document.getElementById('minimum_cost').value);
        formData.append('min_stock_level', document.getElementById('min_stock_level').value);
        formData.append('is_active', document.getElementById('isActive').checked ? '1' : '0');

        // Add image if changed
        const imageInput = document.getElementById('image');
        if (imageInput.files.length > 0) {
            formData.append('image', imageInput.files[0]);
        }

        try {
            document.getElementById('loadingOverlay').style.display = 'flex';
            document.getElementById('submitBtn').disabled = true;

            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';

            const response = await fetch(`https://toure.gestiem.com/api/products/${productId}`, {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'X-HTTP-Method-Override': 'PUT'
                },
                body: formData
            });

            const result = await response.json();

            if (!response.ok) {
                if (response.status === 422) {
                    handleValidationErrors(result.errors);
                    showAlert('Veuillez corriger les erreurs dans le formulaire', 'danger');
                } else {
                    throw new Error(result.message || 'Erreur lors de la mise à jour');
                }
            } else {
                showAlert('✓ Produit mis à jour avec succès !', 'success');
                setTimeout(() => {
                    window.location.href = `/produit/${productId}/details`;
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
                    inputId = 'name';
                    break;
                case 'description':
                    inputId = 'description';
                    break;
                case 'product_category_id':
                    inputId = 'product_category_id';
                    break;
                case 'unit_price':
                    inputId = 'unit_price';
                    break;
                case 'cost':
                    inputId = 'cost';
                    break;
                case 'minimum_cost':
                    inputId = 'minimum_cost';
                    break;
                case 'min_stock_level':
                    inputId = 'min_stock_level';
                    break;
            }

            if (inputId) {
                const input = document.getElementById(inputId);
                input.classList.add('is-invalid');
                const feedback = input.parentElement.querySelector('.invalid-feedback');
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

    function formatCurrency(amount) {
        return new Intl.NumberFormat('fr-FR').format(amount) + ' FCFA';
    }

    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('imagePreview');
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<?php
$content = ob_get_clean();
require('./views/layouts/app-layout.php');
?>