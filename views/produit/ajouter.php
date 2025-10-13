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

    .bg-secondary-custom {
        background-color: var(--secondary-color) !important;
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

    .btn-secondary-custom {
        background-color: var(--secondary-color);
        border-color: var(--secondary-color);
        color: white;
    }

    .btn-secondary-custom:hover {
        background-color: #020a7a;
        border-color: #020a7a;
        color: white;
    }

    /* Steps Indicator */
    .steps-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 3rem;
        position: relative;
    }

    .step-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        flex: 1;
        max-width: 200px;
    }

    .step-number {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #e9ecef;
        color: #6c757d;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1.2rem;
        border: 3px solid #e9ecef;
        transition: all 0.3s ease;
        position: relative;
        z-index: 2;
    }

    .step-item.active .step-number {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
        box-shadow: 0 0 0 4px rgba(240, 4, 128, 0.2);
    }

    .step-item.completed .step-number {
        background-color: var(--secondary-color);
        border-color: var(--secondary-color);
        color: white;
    }

    .step-item.completed .step-number i {
        font-size: 1.5rem;
    }

    .step-label {
        margin-top: 0.5rem;
        font-size: 0.875rem;
        font-weight: 600;
        color: #6c757d;
        text-align: center;
    }

    .step-item.active .step-label {
        color: var(--primary-color);
    }

    .step-item.completed .step-label {
        color: var(--secondary-color);
    }

    .step-line {
        position: absolute;
        top: 25px;
        left: 50%;
        width: 100%;
        height: 3px;
        background-color: #e9ecef;
        z-index: 1;
    }

    .step-item.completed .step-line {
        background-color: var(--secondary-color);
    }

    .step-item:last-child .step-line {
        display: none;
    }

    /* Form Sections */
    .form-step {
        display: none;
        animation: fadeIn 0.3s ease;
    }

    .form-step.active {
        display: block;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-section {
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
        border-left: 4px solid var(--primary-color);
    }

    .form-section-header {
        background-color: var(--light-primary);
        padding: 1rem 1.5rem;
        border-radius: 10px 10px 0 0;
        border-bottom: 1px solid #e9ecef;
    }

    .form-section-body {
        padding: 1.5rem;
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

    /* Image Upload */
    .image-upload-container {
        border: 2px dashed #e9ecef;
        border-radius: 10px;
        padding: 2rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .image-upload-container:hover {
        border-color: var(--primary-color);
        background-color: var(--light-primary);
    }

    .image-upload-container.has-image {
        border-style: solid;
        border-color: var(--secondary-color);
    }

    .image-preview {
        max-width: 200px;
        max-height: 200px;
        margin: 1rem auto;
        display: none;
    }

    .image-preview img {
        width: 100%;
        height: auto;
        border-radius: 8px;
    }

    /* Category Cards */
    .category-card {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
    }

    .category-card:hover {
        border-color: var(--primary-color);
        background-color: var(--light-primary);
        transform: translateY(-2px);
    }

    .category-card.selected {
        border-color: var(--primary-color);
        background-color: var(--light-primary);
        box-shadow: 0 4px 15px rgba(240, 4, 128, 0.2);
    }

    .category-icon {
        font-size: 2rem;
        color: var(--secondary-color);
        margin-bottom: 0.5rem;
    }

    .category-card.selected .category-icon {
        color: var(--primary-color);
    }

    /* Navigation Buttons */
    .form-navigation {
        display: flex;
        justify-content: space-between;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 2px solid #e9ecef;
    }

    .progress-bar-custom {
        height: 8px;
        background-color: #e9ecef;
        border-radius: 10px;
        margin-bottom: 2rem;
        overflow: hidden;
    }

    .progress-bar-fill {
        height: 100%;
        background: linear-gradient(90deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        transition: width 0.3s ease;
        border-radius: 10px;
    }

    /* Info Box */
    .info-box {
        background-color: #f8f9fa;
        border-left: 4px solid #17a2b8;
        padding: 1rem;
        margin-top: 1rem;
        border-radius: 5px;
    }

    .price-calculator {
        background-color: var(--light-primary);
        border: 1px solid var(--primary-color);
        padding: 1rem;
        border-radius: 8px;
        margin-top: 1rem;
    }
</style>

<main id="content" role="main" class="main font-public-sans">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="row align-items-center">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php" class="text-primary-custom">Tableau de Bord</a></li>
                            <li class="breadcrumb-item"><a href="products.php" class="text-primary-custom">Produits</a></li>
                            <li class="breadcrumb-item active">Nouveau Produit</li>
                        </ol>
                    </nav>
                    <h1 class="page-header-title text-secondary-custom">
                        <i class="bi-box-seam me-2"></i>
                        Créer un Nouveau Produit
                    </h1>
                    <p class="text-muted mb-0">Ajoutez un nouveau produit en 3 étapes simples</p>
                </div>
                <div class="col-auto">
                    <a href="products.php" class="btn btn-outline-secondary me-2">
                        <i class="bi-arrow-left me-1"></i> Retour
                    </a>
                </div>
            </div>
        </div>

        <!-- Progress Bar -->
        <div class="progress-bar-custom">
            <div class="progress-bar-fill" id="progressBar" style="width: 33.33%"></div>
        </div>

        <!-- Steps Indicator -->
        <div class="steps-container">
            <div class="step-item active" data-step="1">
                <div class="step-number">1</div>
                <div class="step-label">Informations</div>
                <div class="step-line"></div>
            </div>
            <div class="step-item" data-step="2">
                <div class="step-number">2</div>
                <div class="step-label">Prix & Coûts</div>
                <div class="step-line"></div>
            </div>
            <div class="step-item" data-step="3">
                <div class="step-number">3</div>
                <div class="step-label">Stock & Image</div>
            </div>
        </div>

        <!-- Formulaire Multi-étapes -->
        <form id="productForm" method="POST" action="/api/products" enctype="multipart/form-data">

            <!-- STEP 1: Informations de Base -->
            <div class="form-step active" data-step="1">
                <div class="form-section">
                    <div class="form-section-header">
                        <h5 class="mb-0 text-secondary-custom">
                            <i class="bi-info-circle me-2"></i>
                            Étape 1 : Informations de Base
                        </h5>
                    </div>
                    <div class="form-section-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="productName" class="form-label required-field">Nom du Produit</label>
                                <input type="text" class="form-control" id="productName" name="name"
                                    placeholder="Ex: PARB DADA 50KG" required>
                                <div class="form-text">Nom complet et descriptif du produit</div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="productCategory" class="form-label required-field">Catégorie</label>
                                <select class="form-select" id="productCategory" name="product_category_id" required>
                                    <option value="">Sélectionner une catégorie</option>
                                    <option value="cat-riz">RIZ</option>
                                    <option value="cat-sucre">SUCRE</option>
                                    <option value="cat-farine">FARINE</option>
                                    <option value="cat-lait">LAIT</option>
                                    <option value="cat-huile">HUILE</option>
                                    <option value="cat-divers">DIVERS</option>
                                    <option value="cat-degilare">DEGILARE</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="productDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="productDescription" name="description" rows="4"
                                    placeholder="Description détaillée du produit, caractéristiques, origine..."></textarea>
                                <div class="form-text">Informations complémentaires pour identifier le produit</div>
                            </div>
                        </div>

                        <div class="info-box">
                            <small class="text-info">
                                <i class="bi-lightbulb me-1"></i>
                                <strong>Conseil :</strong> Utilisez un nom clair incluant le type, la marque et le conditionnement (ex: PARB BONJOURNE 50KG)
                            </small>
                        </div>
                    </div>
                </div>

                <!-- Sélection Rapide de Catégorie -->
                <div class="form-section">
                    <div class="form-section-header">
                        <h6 class="mb-0 text-secondary-custom">Sélection Rapide de Catégorie</h6>
                    </div>
                    <div class="form-section-body">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <div class="category-card" data-category="cat-riz">
                                    <div class="category-icon">
                                        <i class="bi-basket"></i>
                                    </div>
                                    <h6>RIZ</h6>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="category-card" data-category="cat-sucre">
                                    <div class="category-icon">
                                        <i class="bi-cup-straw"></i>
                                    </div>
                                    <h6>SUCRE</h6>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="category-card" data-category="cat-farine">
                                    <div class="category-icon">
                                        <i class="bi-egg"></i>
                                    </div>
                                    <h6>FARINE</h6>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="category-card" data-category="cat-lait">
                                    <div class="category-icon">
                                        <i class="bi-droplet"></i>
                                    </div>
                                    <h6>LAIT</h6>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="category-card" data-category="cat-huile">
                                    <div class="category-icon">
                                        <i class="bi-moisture"></i>
                                    </div>
                                    <h6>HUILE</h6>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="category-card" data-category="cat-divers">
                                    <div class="category-icon">
                                        <i class="bi-box"></i>
                                    </div>
                                    <h6>DIVERS</h6>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="category-card" data-category="cat-degilare">
                                    <div class="category-icon">
                                        <i class="bi-gift"></i>
                                    </div>
                                    <h6>DEGILARE</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- STEP 2: Prix et Coûts -->
            <div class="form-step" data-step="2">
                <div class="form-section">
                    <div class="form-section-header">
                        <h5 class="mb-0 text-secondary-custom">
                            <i class="bi-currency-exchange me-2"></i>
                            Étape 2 : Prix et Coûts
                        </h5>
                    </div>
                    <div class="form-section-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="unitPrice" class="form-label required-field">Prix Unitaire (FCFA)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="unitPrice" name="unit_price"
                                        placeholder="22500" min="0" step="0.01" required>
                                    <span class="input-group-text">FCFA</span>
                                </div>
                                <div class="form-text">Prix de vente au client</div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="cost" class="form-label">Coût d'Achat (FCFA)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="cost" name="cost"
                                        placeholder="18000" min="0" step="0.01">
                                    <span class="input-group-text">FCFA</span>
                                </div>
                                <div class="form-text">Coût d'acquisition</div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="minimumCost" class="form-label">Coût Minimum (FCFA)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="minimumCost" name="minimum_cost"
                                        placeholder="17000" min="0" step="0.01">
                                    <span class="input-group-text">FCFA</span>
                                </div>
                                <div class="form-text">Prix plancher acceptable</div>
                            </div>
                        </div>

                        <!-- Calculateur de Marge -->
                        <div class="price-calculator" id="priceCalculator">
                            <h6 class="text-secondary-custom mb-3">
                                <i class="bi-calculator me-2"></i>Analyse de Rentabilité
                            </h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="text-center">
                                        <small class="text-muted d-block">Marge Brute</small>
                                        <h4 class="text-primary-custom mb-0" id="grossMargin">0 FCFA</h4>
                                        <small class="text-muted" id="marginPercent">0%</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="text-center">
                                        <small class="text-muted d-block">Marge Minimale</small>
                                        <h4 class="text-success mb-0" id="minMargin">0 FCFA</h4>
                                        <small class="text-muted" id="minMarginPercent">0%</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="text-center">
                                        <small class="text-muted d-block">Statut</small>
                                        <h4 id="profitStatus">
                                            <span class="badge bg-secondary">-</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="info-box mt-3">
                            <small class="text-info">
                                <i class="bi-info-circle me-1"></i>
                                <strong>Recommandations :</strong><br>
                                • Prix de vente = Coût + Marge (20-30% recommandé)<br>
                                • Coût minimum = Seuil en dessous duquel la vente n'est pas rentable<br>
                                • Vérifiez la compétitivité de vos prix
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- STEP 3: Stock et Image -->
            <div class="form-step" data-step="3">
                <div class="form-section">
                    <div class="form-section-header">
                        <h5 class="mb-0 text-secondary-custom">
                            <i class="bi-boxes me-2"></i>
                            Étape 3 : Gestion de Stock
                        </h5>
                    </div>
                    <div class="form-section-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="minStockLevel" class="form-label">Seuil Minimum de Stock</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="minStockLevel" name="min_stock_level"
                                        placeholder="10" min="0" value="10">
                                    <span class="input-group-text">unités</span>
                                </div>
                                <div class="form-text">Alerte lorsque le stock descend sous ce niveau</div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="isActive" class="form-label">Statut du Produit</label>
                                <select class="form-select" id="isActive" name="is_active">
                                    <option value="1" selected>Actif (en vente)</option>
                                    <option value="0">Inactif (non disponible)</option>
                                </select>
                                <div class="form-text">Produit visible et vendable</div>
                            </div>
                        </div>

                        <div class="info-box">
                            <small class="text-info">
                                <i class="bi-bell me-1"></i>
                                <strong>Alertes de Stock :</strong> Vous recevrez une notification lorsque le stock atteindra le seuil minimum défini
                            </small>
                        </div>
                    </div>
                </div>

                <!-- Upload Image -->
                <div class="form-section">
                    <div class="form-section-header">
                        <h5 class="mb-0 text-secondary-custom">
                            <i class="bi-image me-2"></i>
                            Image du Produit
                        </h5>
                    </div>
                    <div class="form-section-body">
                        <div class="image-upload-container" id="imageUploadContainer">
                            <div class="upload-placeholder" id="uploadPlaceholder">
                                <i class="bi-cloud-upload" style="font-size: 3rem; color: var(--primary-color);"></i>
                                <h6 class="mt-3">Cliquez ou glissez une image ici</h6>
                                <p class="text-muted small">PNG, JPG jusqu'à 5MB</p>
                            </div>
                            <div class="image-preview" id="imagePreview">
                                <img src="" alt="Aperçu" id="previewImg">
                            </div>
                            <input type="file" class="d-none" id="productImage" name="picture" accept="image/*">
                        </div>

                        <div class="d-flex justify-content-between mt-3">
                            <button type="button" class="btn btn-outline-secondary btn-sm" id="removeImageBtn" style="display: none;">
                                <i class="bi-trash me-1"></i> Supprimer l'image
                            </button>
                            <small class="text-muted">Facultatif - Une image aide à identifier rapidement le produit</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="form-navigation">
                <button type="button" class="btn btn-outline-secondary" id="prevBtn" onclick="changeStep(-1)" style="display: none;">
                    <i class="bi-arrow-left me-1"></i> Précédent
                </button>

                <div>
                    <button type="button" class="btn btn-outline-secondary me-2" onclick="saveDraft()">
                        <i class="bi-save me-1"></i> Sauvegarder Brouillon
                    </button>
                    <button type="button" class="btn btn-primary-custom" id="nextBtn" onclick="changeStep(1)">
                        Suivant <i class="bi-arrow-right ms-1"></i>
                    </button>
                    <button type="submit" class="btn btn-primary-custom d-none" id="submitBtn">
                        <i class="bi-check-circle me-1"></i> Créer le Produit
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <div class="footer mt-5">
        <div class="row justify-content-between align-items-center">
            <div class="col">
                <p class="fs-6 mb-0 text-muted">&copy; <?= date('Y') ?> Toure Distribution. Tous droits réservés.</p>
            </div>
        </div>
    </div>
</main>

<script>
    let currentStep = 1;
    const totalSteps = 3;

    document.addEventListener('DOMContentLoaded', function() {
        // Gestion des catégories
        const categoryCards = document.querySelectorAll('.category-card');
        const categorySelect = document.getElementById('productCategory');

        categoryCards.forEach(card => {
            card.addEventListener('click', function() {
                categoryCards.forEach(c => c.classList.remove('selected'));
                this.classList.add('selected');
                categorySelect.value = this.dataset.category;
            });
        });

        // Synchroniser le select avec les cartes
        categorySelect.addEventListener('change', function() {
            categoryCards.forEach(card => {
                if (card.dataset.category === this.value) {
                    card.classList.add('selected');
                } else {
                    card.classList.remove('selected');
                }
            });
        });

        // Calculateur de marge
        const unitPrice = document.getElementById('unitPrice');
        const cost = document.getElementById('cost');
        const minimumCost = document.getElementById('minimumCost');

        [unitPrice, cost, minimumCost].forEach(input => {
            input.addEventListener('input', calculateMargins);
        });

        // Upload d'image
        const imageUploadContainer = document.getElementById('imageUploadContainer');
        const productImage = document.getElementById('productImage');
        const imagePreview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        const uploadPlaceholder = document.getElementById('uploadPlaceholder');
        const removeImageBtn = document.getElementById('removeImageBtn');

        imageUploadContainer.addEventListener('click', () => {
            productImage.click();
        });

        productImage.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    uploadPlaceholder.style.display = 'none';
                    imagePreview.style.display = 'block';
                    imageUploadContainer.classList.add('has-image');
                    removeImageBtn.style.display = 'inline-block';
                };
                reader.readAsDataURL(file);
            }
        });

        removeImageBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            productImage.value = '';
            previewImg.src = '';
            uploadPlaceholder.style.display = 'block';
            imagePreview.style.display = 'none';
            imageUploadContainer.classList.remove('has-image');
            removeImageBtn.style.display = 'none';
        });

        // Drag and drop
        imageUploadContainer.addEventListener('dragover', (e) => {
            e.preventDefault();
            imageUploadContainer.style.borderColor = 'var(--primary-color)';
        });

        imageUploadContainer.addEventListener('dragleave', () => {
            imageUploadContainer.style.borderColor = '#e9ecef';
        });

        imageUploadContainer.addEventListener('drop', (e) => {
            e.preventDefault();
            const file = e.dataTransfer.files[0];
            if (file && file.type.startsWith('image/')) {
                productImage.files = e.dataTransfer.files;
                productImage.dispatchEvent(new Event('change'));
            }
            imageUploadContainer.style.borderColor = '#e9ecef';
        });

        // Validation à la soumission
        document.getElementById('productForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            try {
                const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';

                const response = await fetch('https://toure.gestiem.com/api/products', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Authorization': `Bearer ${accessToken}`,
                        'Accept': 'application/json'
                    }
                });

                const result = await response.json();

                if (response.ok) {
                    // Succès
                    showNotification('success', result.message || 'Produit créé avec succès');
                    setTimeout(() => {
                        window.location.href = 'products.php';
                    }, 2000);
                } else {
                    // Erreur de validation
                    if (result.errors) {
                        let errorMsg = 'Erreurs de validation:\n';
                        Object.keys(result.errors).forEach(field => {
                            errorMsg += `\n• ${result.errors[field].join('\n• ')}`;
                        });
                        showNotification('error', errorMsg);
                    } else {
                        showNotification('error', result.message || 'Erreur lors de la création du produit');
                    }
                }
            } catch (error) {
                showNotification('error', 'Erreur de connexion au serveur');
                console.error('Error:', error);
            }
        });

        updateNavigation();
    });

    function changeStep(direction) {
        const steps = document.querySelectorAll('.form-step');
        const stepItems = document.querySelectorAll('.step-item');

        // Validation avant de passer à l'étape suivante
        if (direction > 0 && !validateStep(currentStep)) {
            return;
        }

        // Masquer l'étape actuelle
        steps[currentStep - 1].classList.remove('active');

        // Marquer comme complétée
        if (direction > 0) {
            stepItems[currentStep - 1].classList.add('completed');
            stepItems[currentStep - 1].querySelector('.step-number').innerHTML = '<i class="bi-check2"></i>';
        }

        // Changer d'étape
        currentStep += direction;

        // Afficher la nouvelle étape
        steps[currentStep - 1].classList.add('active');
        stepItems[currentStep - 1].classList.add('active');

        // Retirer le statut actif des autres étapes
        stepItems.forEach((item, index) => {
            if (index + 1 !== currentStep) {
                item.classList.remove('active');
            }
        });

        // Mettre à jour la navigation
        updateNavigation();
        updateProgressBar();

        // Scroll vers le haut
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    function validateStep(step) {
        const currentStepElement = document.querySelector(`.form-step[data-step="${step}"]`);
        const requiredInputs = currentStepElement.querySelectorAll('[required]');

        for (let input of requiredInputs) {
            if (!input.value.trim()) {
                input.focus();
                input.classList.add('is-invalid');
                showNotification('error', 'Veuillez remplir tous les champs obligatoires.');
                return false;
            }
            input.classList.remove('is-invalid');
        }

        return true;
    }

    function updateNavigation() {
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitBtn = document.getElementById('submitBtn');

        // Bouton précédent
        prevBtn.style.display = currentStep === 1 ? 'none' : 'inline-block';

        // Bouton suivant/soumettre
        if (currentStep === totalSteps) {
            nextBtn.classList.add('d-none');
            submitBtn.classList.remove('d-none');
        } else {
            nextBtn.classList.remove('d-none');
            submitBtn.classList.add('d-none');
        }
    }

    function updateProgressBar() {
        const progress = (currentStep / totalSteps) * 100;
        document.getElementById('progressBar').style.width = progress + '%';
    }

    function calculateMargins() {
        const unitPrice = parseFloat(document.getElementById('unitPrice').value) || 0;
        const cost = parseFloat(document.getElementById('cost').value) || 0;
        const minimumCost = parseFloat(document.getElementById('minimumCost').value) || 0;

        // Marge brute
        const grossMargin = unitPrice - cost;
        const marginPercent = cost > 0 ? ((grossMargin / cost) * 100).toFixed(2) : 0;

        // Marge minimale
        const minMargin = unitPrice - minimumCost;
        const minMarginPercent = minimumCost > 0 ? ((minMargin / minimumCost) * 100).toFixed(2) : 0;

        // Affichage
        document.getElementById('grossMargin').textContent = grossMargin.toLocaleString() + ' FCFA';
        document.getElementById('marginPercent').textContent = marginPercent + '%';
        document.getElementById('minMargin').textContent = minMargin.toLocaleString() + ' FCFA';
        document.getElementById('minMarginPercent').textContent = minMarginPercent + '%';

        // Statut de rentabilité
        const statusElement = document.getElementById('profitStatus');
        if (grossMargin > 0 && marginPercent >= 20) {
            statusElement.innerHTML = '<span class="badge bg-success">Excellent</span>';
        } else if (grossMargin > 0 && marginPercent >= 10) {
            statusElement.innerHTML = '<span class="badge bg-warning">Acceptable</span>';
        } else if (grossMargin > 0) {
            statusElement.innerHTML = '<span class="badge bg-danger">Faible</span>';
        } else {
            statusElement.innerHTML = '<span class="badge bg-danger">Non Rentable</span>';
        }
    }

    function saveDraft() {
        const formData = new FormData(document.getElementById('productForm'));
        const data = Object.fromEntries(formData);
        localStorage.setItem('productDraft', JSON.stringify(data));

        showNotification('success', 'Brouillon sauvegardé avec succès');
    }

    function showNotification(type, message) {
        const toast = document.createElement('div');
        toast.className = `alert alert-${type === 'success' ? 'success' : 'danger'} position-fixed top-0 end-0 m-3`;
        toast.style.zIndex = '9999';
        toast.style.minWidth = '300px';

        const icon = type === 'success' ? 'check-circle' : 'exclamation-triangle';
        toast.innerHTML = `<i class="bi-${icon} me-2"></i>${message}`;

        document.body.appendChild(toast);

        setTimeout(() => {
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }

    // Restaurer le brouillon au chargement
    window.addEventListener('load', function() {
        const draft = localStorage.getItem('productDraft');
        if (draft && confirm('Un brouillon a été trouvé. Voulez-vous le restaurer ?')) {
            const data = JSON.parse(draft);

            Object.keys(data).forEach(key => {
                const element = document.querySelector(`[name="${key}"]`);
                if (element) {
                    if (element.type === 'checkbox') {
                        element.checked = data[key] === '1';
                    } else if (element.type !== 'file') {
                        element.value = data[key];
                    }
                }
            });

            // Recalculer les marges si les prix sont restaurés
            calculateMargins();

            localStorage.removeItem('productDraft');
        }
    });

    // Avertir avant de quitter si le formulaire a été modifié
    let formModified = false;
    document.getElementById('productForm').addEventListener('input', function() {
        formModified = true;
    });

    window.addEventListener('beforeunload', function(e) {
        if (formModified) {
            e.preventDefault();
            e.returnValue = '';
        }
    });
</script>

<?php
$content = ob_get_clean();
require('./views/layouts/app-layout.php');
?>