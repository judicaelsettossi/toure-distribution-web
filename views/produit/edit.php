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
        font-family: 'Public Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    }

    /* Fix chevauchement */
    .edit-product-wrapper {
        margin-left: 250px;
        margin-top: 70px;
        padding: 2rem;
        min-height: calc(100vh - 70px);
        background: #f8f9fa;
    }

    @media (max-width: 991px) {
        .edit-product-wrapper {
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

    /* Image upload */
    .image-upload-section {
        background: linear-gradient(135deg, var(--light-primary), var(--light-secondary));
        border-radius: 16px;
        padding: 2rem;
        border: 2px dashed var(--primary-color);
    }

    .current-image-preview {
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .preview-image {
        max-width: 300px;
        max-height: 300px;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        margin-bottom: 1rem;
    }

    .upload-area {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        border: 2px dashed #d0d0d0;
    }

    .upload-area:hover {
        border-color: var(--primary-color);
        background: var(--light-primary);
    }

    .upload-icon {
        font-size: 3rem;
        color: var(--primary-color);
        margin-bottom: 1rem;
    }

    .upload-text {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--secondary-color);
        margin-bottom: 0.5rem;
    }

    .upload-hint {
        font-size: 0.9rem;
        color: #6c757d;
    }

    #imagePreview {
        max-width: 100%;
        max-height: 300px;
        border-radius: 12px;
        margin-top: 1rem;
        display: none;
    }

    /* Price calculator */
    .price-calculator {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        border-radius: 12px;
        padding: 1.5rem;
        margin-top: 1rem;
    }

    .calculator-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.75rem 0;
        border-bottom: 1px solid #dee2e6;
    }

    .calculator-row:last-child {
        border-bottom: none;
        padding-top: 1rem;
        margin-top: 0.5rem;
        border-top: 2px solid var(--primary-color);
    }

    .calculator-label {
        font-weight: 600;
        color: #495057;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .calculator-value {
        font-weight: 700;
        font-size: 1.1rem;
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
        border-radius: 12px;
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
    }

    .toggle-status {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
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
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
        font-size: 1.1rem;
    }

    .form-control-modern.with-icon {
        padding-right: 3rem;
    }

    /* Animation spinner pour les boutons */
    .spinner {
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
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
</style>

<div class="edit-product-wrapper font-public-sans">
    <!-- Header -->
    <div class="edit-header">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="edit-title">
                <div class="edit-title-icon">
                    <i class="bi bi-pencil-square"></i>
                </div>
                Modifier le Produit
            </h1>
            <a href="/produit/liste" class="btn-modern btn-secondary-modern">
                <i class="bi bi-arrow-left"></i> Retour à la liste
            </a>
        </div>
    </div>

    <!-- Alerts -->
    <div id="alertContainer"></div>

    <!-- Loading initial -->
    <div id="loadingInitial" class="text-center py-5">
        <div class="loading-spinner mx-auto"></div>
        <div class="loading-text">Chargement du produit...</div>
    </div>

    <!-- Form -->
    <form id="editProductForm" style="display: none;">
        <div class="form-container">
            <!-- Section Image -->
            <div class="form-section">
                <h3 class="section-title">
                    <div class="section-icon">
                        <i class="bi bi-image"></i>
                    </div>
                    Image du Produit
                </h3>

                <div class="image-upload-section">
                    <div class="current-image-preview" id="currentImageContainer">
                        <p class="text-muted mb-2">Image actuelle</p>
                        <img id="currentImage" src="" alt="Image actuelle" class="preview-image">
                    </div>

                    <div class="upload-area" onclick="document.getElementById('imageInput').click()">
                        <div class="upload-icon">
                            <i class="bi bi-cloud-upload"></i>
                        </div>
                        <div class="upload-text">Cliquez pour changer l'image</div>
                        <div class="upload-hint">PNG, JPG, JPEG (Max. 5MB)</div>
                        <input type="file" id="imageInput" accept="image/*" style="display: none;">
                    </div>
                    <img id="imagePreview" alt="Nouvelle image">
                </div>
            </div>

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
                            <label class="form-label-modern">
                                Code Produit
                            </label>
                            <input type="text" id="productCode" class="form-control-modern" disabled>
                            <small class="text-muted">Généré automatiquement</small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group-modern">
                            <label class="form-label-modern">
                                Catégorie <span class="label-required">*</span>
                            </label>
                            <div class="d-flex gap-2 align-items-center">
                                <select id="categoryId" class="form-control-modern form-select-modern" required>
                                    <option value="">Chargement des catégories...</option>
                                </select>
                                <div class="category-buttons">
                                    <button type="button" id="addCategoryBtn" class="btn-modern btn-outline-modern" onclick="showAddCategoryModal()" title="Ajouter une nouvelle catégorie" disabled>
                                        <i class="bi bi-plus"></i>
                                    </button>
                                    <button type="button" id="refreshCategoryBtn" class="btn-modern btn-outline-modern" onclick="refreshCategories()" title="Rafraîchir la liste des catégories">
                                        <i class="bi bi-arrow-clockwise"></i>
                                    </button>
                                </div>
                            </div>
                            <small class="text-muted">
                                <i class="bi bi-info-circle"></i> 
                                Cliquez sur <i class="bi bi-plus"></i> pour créer une nouvelle catégorie
                            </small>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>

                <div class="form-group-modern">
                    <label class="form-label-modern">
                        Nom du Produit <span class="label-required">*</span>
                    </label>
                    <input type="text" id="productName" class="form-control-modern" placeholder="Ex: Laptop Dell XPS 15" required>
                    <div class="invalid-feedback"></div>
                </div>

                <div class="form-group-modern">
                    <label class="form-label-modern">
                        Description <span class="label-required">*</span>
                    </label>
                    <textarea id="productDescription" class="form-control-modern" placeholder="Description détaillée du produit..." required></textarea>
                    <div class="invalid-feedback"></div>
                </div>
            </div>

            <!-- Section Prix et Coûts -->
            <div class="form-section">
                <h3 class="section-title">
                    <div class="section-icon">
                        <i class="bi bi-currency-exchange"></i>
                    </div>
                    Prix et Coûts
                </h3>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group-modern">
                            <label class="form-label-modern">
                                Prix de Vente (FCFA) <span class="label-required">*</span>
                            </label>
                            <div class="input-with-icon">
                                <input type="number" id="unitPrice" class="form-control-modern with-icon" placeholder="0" min="0" step="1" required>
                                <span class="input-icon">FCFA</span>
                            </div>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group-modern">
                            <label class="form-label-modern">
                                Coût d'Achat (FCFA) <span class="label-required">*</span>
                            </label>
                            <div class="input-with-icon">
                                <input type="number" id="cost" class="form-control-modern with-icon" placeholder="0" min="0" step="1" required>
                                <span class="input-icon">FCFA</span>
                            </div>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group-modern">
                            <label class="form-label-modern">
                                Coût Minimum (FCFA) <span class="label-required">*</span>
                            </label>
                            <div class="input-with-icon">
                                <input type="number" id="minimumCost" class="form-control-modern with-icon" placeholder="0" min="0" step="1" required>
                                <span class="input-icon">FCFA</span>
                            </div>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>

                <!-- Calculateur de marge -->
                <div class="price-calculator">
                    <div class="calculator-row">
                        <span class="calculator-label">
                            <i class="bi bi-calculator"></i> Prix de vente
                        </span>
                        <span class="calculator-value" id="calcUnitPrice">0 FCFA</span>
                    </div>
                    <div class="calculator-row">
                        <span class="calculator-label">
                            <i class="bi bi-dash-circle"></i> Coût d'achat
                        </span>
                        <span class="calculator-value" id="calcCost">0 FCFA</span>
                    </div>
                    <div class="calculator-row">
                        <span class="calculator-label">
                            <i class="bi bi-graph-up-arrow"></i> Marge bénéficiaire
                        </span>
                        <span class="calculator-value" id="calcProfit">0 FCFA (0%)</span>
                    </div>
                </div>
            </div>

            <!-- Section Stock -->
            <div class="form-section">
                <h3 class="section-title">
                    <div class="section-icon">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    Gestion du Stock
                </h3>

                <div class="form-group-modern">
                    <label class="form-label-modern">
                        Stock Minimum <span class="label-required">*</span>
                    </label>
                    <input type="number" id="minStockLevel" class="form-control-modern" placeholder="0" min="0" step="1" required>
                    <small class="text-muted">Seuil d'alerte pour le réapprovisionnement</small>
                    <div class="invalid-feedback"></div>
                </div>
            </div>

            <!-- Section Statut -->
            <div class="form-section">
                <h3 class="section-title">
                    <div class="section-icon">
                        <i class="bi bi-toggles"></i>
                    </div>
                    Statut du Produit
                </h3>

                <div class="toggle-container">
                    <label class="toggle-switch">
                        <input type="checkbox" id="isActive" checked>
                        <span class="toggle-slider"></span>
                    </label>
                    <span class="toggle-label">Produit actif</span>
                    <span id="statusText" class="toggle-status status-active">Actif</span>
                </div>
            </div>

            <!-- Actions -->
            <div class="form-actions">
                <button type="button" class="btn-modern btn-secondary-modern" onclick="window.location.href='/produit/liste'">
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
            const select = document.getElementById('categoryId');
            select.innerHTML = '';
            const errorOption = document.createElement('option');
            errorOption.value = '';
            errorOption.textContent = 'Erreur de chargement des catégories';
            errorOption.disabled = true;
            select.appendChild(errorOption);
            
            // Désactiver le bouton d'ajout de catégorie
            const addCategoryBtn = document.getElementById('addCategoryBtn');
            if (addCategoryBtn) {
                addCategoryBtn.disabled = true;
            }
        }
    }

    function populateCategorySelect() {
        const select = document.getElementById('categoryId');
        
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
        const addCategoryBtn = document.getElementById('addCategoryBtn');
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
            document.getElementById('categoryId').value = newCategory.product_category_id;
            
            showAlert(`Catégorie "${categoryName}" créée avec succès !`, 'success');
            
        } catch (error) {
            console.error('Erreur lors de la création de la catégorie:', error);
            showAlert('Erreur lors de la création de la catégorie: ' + error.message, 'danger');
        }
    }

    // Fonction pour rafraîchir la liste des catégories
    async function refreshCategories() {
        console.log('Rafraîchissement de la liste des catégories...');
        
        const refreshBtn = document.getElementById('refreshCategoryBtn');
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

            document.getElementById('loadingInitial').style.display = 'none';
            document.getElementById('editProductForm').style.display = 'block';

        } catch (error) {
            console.error('Erreur:', error);
            showAlert('Erreur lors du chargement du produit: ' + error.message, 'danger');
            document.getElementById('loadingInitial').style.display = 'none';
        }
    }

    function populateForm(product) {
        console.log('Données du produit à peupler:', product); // Debug
        
        document.getElementById('productCode').value = product.code || '';
        document.getElementById('productName').value = product.name || '';
        document.getElementById('productDescription').value = product.description || '';
        
        // Gestion de la catégorie - supporte plusieurs structures
        let categoryId = '';
        if (product.product_category_id) {
            categoryId = product.product_category_id;
        } else if (product.category && product.category.product_category_id) {
            categoryId = product.category.product_category_id;
        } else if (product.category_id) {
            categoryId = product.category_id;
        }
        
        document.getElementById('categoryId').value = categoryId;
        console.log('Catégorie sélectionnée:', categoryId); // Debug
        
        document.getElementById('unitPrice').value = product.unit_price || 0;
        document.getElementById('cost').value = product.cost || 0;
        document.getElementById('minimumCost').value = product.minimum_cost || 0;
        document.getElementById('minStockLevel').value = product.min_stock_level || 0;
        document.getElementById('isActive').checked = product.is_active;

        // Image actuelle
        if (product.picture) {
            const img = document.getElementById('currentImage');
            img.src = `https://toure.gestiem.com/storage/${product.picture}`;
            img.onerror = function() {
                document.getElementById('currentImageContainer').style.display = 'none';
            };
        } else {
            document.getElementById('currentImageContainer').style.display = 'none';
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
        document.getElementById('imageInput').addEventListener('change', function(e) {
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
        ['unitPrice', 'cost'].forEach(id => {
            document.getElementById(id).addEventListener('input', updatePriceCalculator);
        });

        // Form submit
        document.getElementById('editProductForm').addEventListener('submit', handleSubmit);
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

    function updatePriceCalculator() {
        const unitPrice = parseFloat(document.getElementById('unitPrice').value) || 0;
        const cost = parseFloat(document.getElementById('cost').value) || 0;

        document.getElementById('calcUnitPrice').textContent = formatCurrency(unitPrice);
        document.getElementById('calcCost').textContent = formatCurrency(cost);

        const profit = unitPrice - cost;
        const profitPercent = cost > 0 ? ((profit / cost) * 100).toFixed(1) : 0;

        const calcProfit = document.getElementById('calcProfit');
        calcProfit.textContent = `${formatCurrency(profit)} (${profitPercent}%)`;
        calcProfit.className = 'calculator-value ' + (profit >= 0 ? 'profit-positive' : 'profit-negative');
    }

    async function handleSubmit(e) {
        e.preventDefault();

        // Validation personnalisée pour la catégorie
        const categorySelect = document.getElementById('categoryId');
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
        formData.append('name', document.getElementById('productName').value);
        formData.append('description', document.getElementById('productDescription').value);
        formData.append('product_category_id', document.getElementById('categoryId').value);
        formData.append('unit_price', document.getElementById('unitPrice').value);
        formData.append('cost', document.getElementById('cost').value);
        formData.append('minimum_cost', document.getElementById('minimumCost').value);
        formData.append('min_stock_level', document.getElementById('minStockLevel').value);
        formData.append('is_active', document.getElementById('isActive').checked ? '1' : '0');

        // Add image if changed
        const imageInput = document.getElementById('imageInput');
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
                    inputId = 'productName';
                    break;
                case 'description':
                    inputId = 'productDescription';
                    break;
                case 'product_category_id':
                    inputId = 'categoryId';
                    break;
                case 'unit_price':
                    inputId = 'unitPrice';
                    break;
                case 'cost':
                    inputId = 'cost';
                    break;
                case 'minimum_cost':
                    inputId = 'minimumCost';
                    break;
                case 'min_stock_level':
                    inputId = 'minStockLevel';
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
</script>

<?php
$content = ob_get_clean();
require('./views/layouts/app-layout.php');
?>