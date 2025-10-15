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
        font-family: 'Public Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
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

    .transfer-header {
        background: linear-gradient(135deg, var(--secondary-color) 0%, var(--accent-color) 100%);
        color: white;
        padding: 2rem;
        border-radius: 12px 12px 0 0;
        text-align: center;
    }

    .transfer-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        background: rgba(255, 255, 255, 0.2);
        margin: 0 auto 1rem;
        border: 3px solid rgba(255, 255, 255, 0.3);
    }

    .form-group-modern {
        margin-bottom: 1.5rem;
    }

    .form-label-modern {
        font-weight: 600;
        color: var(--secondary-color);
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
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
        border-radius: 8px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        margin-bottom: 2rem;
        overflow: hidden;
    }

    .form-section .card-body {
        padding: 1.5rem;
    }

    .text-muted-custom {
        color: #6c757d !important;
        font-size: 0.875rem;
    }

    .product-item {
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
    }

    .product-item:hover {
        background: #e9ecef;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .product-item.selected {
        background: var(--light-primary);
        border-color: var(--primary-color);
    }

    .product-checkbox {
        width: 1.25rem;
        height: 1.25rem;
        border: 2px solid #e9ecef;
        border-radius: 4px;
        background-color: #fff;
        cursor: pointer;
        appearance: none;
        transition: all 0.3s ease;
    }

    .product-checkbox:checked {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .product-checkbox:checked::after {
        content: '✓';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-weight: bold;
        font-size: 0.875rem;
    }

    .quantity-input {
        width: 80px;
        text-align: center;
        border: 1px solid #ced4da;
        border-radius: 4px;
        padding: 0.25rem 0.5rem;
    }

    .transfer-summary {
        background: linear-gradient(135deg, var(--light-primary) 0%, #f8f9fa 100%);
        border-radius: 8px;
        padding: 1.5rem;
        border: 2px dashed var(--primary-color);
    }

    .summary-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.5rem 0;
        border-bottom: 1px solid #e9ecef;
    }

    .summary-item:last-child {
        border-bottom: none;
        font-weight: 600;
        font-size: 1.1rem;
        color: var(--secondary-color);
    }

    .entrepot-info {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 1rem;
        border-left: 4px solid var(--primary-color);
    }

    .entrepot-name {
        font-weight: 600;
        color: var(--secondary-color);
        margin-bottom: 0.25rem;
    }

    .entrepot-details {
        font-size: 0.875rem;
        color: #6c757d;
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

        .transfer-header {
            padding: 1.5rem 1rem;
        }

        .transfer-icon {
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
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
                            <li class="breadcrumb-item"><a class="breadcrumb-link text-primary-custom" href="/">Tableau
                                    de Bord</a></li>
                            <li class="breadcrumb-item"><a class="breadcrumb-link text-primary-custom"
                                    href="/entrepots">Entrepôts</a></li>
                            <li class="breadcrumb-item active">Transfert entre Entrepôts</li>
                        </ol>
                    </nav>
                    <h2 class="mb-0 text-secondary-custom">Transfert entre Entrepôts</h2>
                </div>
                <div class="col-sm-auto">
                    <button class="btn btn-secondary-modern me-2" onclick="window.history.back()">
                        <i class="bi-arrow-left me-1"></i> Retour
                    </button>
                    <button class="btn btn-outline-modern" onclick="window.location.href='/entrepots'">
                        <i class="bi-list me-1"></i> Liste
                    </button>
                </div>
            </div>
        </div>

        <!-- Transfer Header -->
        <div class="card card-custom mb-4">
            <div class="transfer-header">
                <div class="transfer-icon">
                    <i class="bi-arrow-left-right"></i>
                </div>
                <h3 class="mb-2">Transfert de Produits entre Entrepôts</h3>
                <p class="mb-0 opacity-75">
                    Sélectionnez les produits à transférer d'un entrepôt source vers un entrepôt de destination
                </p>
            </div>
        </div>

        <!-- Alert Container -->
        <div id="alertContainer"></div>

        <!-- Form Container -->
        <div id="formContainer">
            <form id="transferForm">
                <!-- Sélection des Entrepôts -->
                <div class="form-section">
                    <div class="section-header">
                        <h5 class="section-title">
                            <i class="bi-building text-primary-custom"></i>
                            Sélection des Entrepôts
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">
                                        Entrepôt Source <span class="label-required"></span>
                                    </label>
                                    <select id="entrepot_source" name="entrepot_source" class="form-control-modern form-select-modern" required>
                                        <option value="">Sélectionner l'entrepôt source...</option>
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div id="entrepotSourceInfo" class="entrepot-info" style="display: none;">
                                    <div class="entrepot-name" id="entrepotSourceName">-</div>
                                    <div class="entrepot-details" id="entrepotSourceDetails">-</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">
                                        Entrepôt Destination <span class="label-required"></span>
                                    </label>
                                    <select id="entrepot_destination" name="entrepot_destination" class="form-control-modern form-select-modern" required>
                                        <option value="">Sélectionner l'entrepôt destination...</option>
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div id="entrepotDestinationInfo" class="entrepot-info" style="display: none;">
                                    <div class="entrepot-name" id="entrepotDestinationName">-</div>
                                    <div class="entrepot-details" id="entrepotDestinationDetails">-</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sélection des Produits -->
                <div class="form-section" id="productsSection" style="display: none;">
                    <div class="section-header">
                        <h5 class="section-title">
                            <i class="bi-box text-primary-custom"></i>
                            Produits Disponibles
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">Rechercher un produit</label>
                                    <input type="text" id="productSearch" class="form-control-modern" placeholder="Nom, code ou référence du produit...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">Filtrer par catégorie</label>
                                    <select id="categoryFilter" class="form-control-modern form-select-modern">
                                        <option value="">Toutes les catégories</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div id="productsList" class="row">
                            <!-- Les produits seront chargés dynamiquement -->
                        </div>
                    </div>
                </div>

                <!-- Résumé du Transfert -->
                <div class="form-section" id="transferSummary" style="display: none;">
                    <div class="section-header">
                        <h5 class="section-title">
                            <i class="bi-list-check text-primary-custom"></i>
                            Résumé du Transfert
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="transfer-summary">
                            <div class="summary-item">
                                <span>Produits sélectionnés:</span>
                                <span id="selectedProductsCount">0</span>
                            </div>
                            <div class="summary-item">
                                <span>Quantité totale:</span>
                                <span id="totalQuantity">0</span>
                            </div>
                            <div class="summary-item">
                                <span>Valeur totale:</span>
                                <span id="totalValue">0 FCFA</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Informations Complémentaires -->
                <div class="form-section">
                    <div class="section-header">
                        <h5 class="section-title">
                            <i class="bi-info-circle text-primary-custom"></i>
                            Informations Complémentaires
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">Date du transfert</label>
                                    <input type="date" id="transfer_date" name="transfer_date" class="form-control-modern" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">Référence du transfert</label>
                                    <input type="text" id="transfer_reference" name="transfer_reference" class="form-control-modern" 
                                           placeholder="Ex: TRANSF-2024-001" readonly>
                                    <small class="text-muted-custom">Généré automatiquement</small>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group-modern">
                                    <label class="form-label-modern">Notes (optionnel)</label>
                                    <textarea id="notes" name="notes" class="form-control-modern" rows="3" 
                                              placeholder="Ajoutez des notes concernant ce transfert..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="form-section">
                    <div class="card-body">
                        <div class="d-flex gap-3 justify-content-end">
                            <button type="button" class="btn btn-secondary-modern" onclick="window.location.href='/entrepots'">
                                <i class="bi-x-circle me-1"></i> Annuler
                            </button>
                            <button type="submit" class="btn btn-primary-modern" id="submitBtn" disabled>
                                <i class="bi-check-circle me-1"></i> Exécuter le Transfert
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
    let entrepots = [];
    let products = [];
    let selectedProducts = new Map();
    let filteredProducts = [];

    document.addEventListener('DOMContentLoaded', function() {
        // Définir la date d'aujourd'hui
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('transfer_date').value = today;
        
        // Générer une référence de transfert
        generateTransferReference();
        
        loadEntrepots();
        setupEventListeners();
    });

    function generateTransferReference() {
        const now = new Date();
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        const time = String(now.getTime()).slice(-4);
        
        document.getElementById('transfer_reference').value = `TRANSF-${year}${month}${day}-${time}`;
    }

    function setupEventListeners() {
        const form = document.getElementById('transferForm');
        form.addEventListener('submit', handleSubmit);
        
        // Événements pour les entrepôts
        document.getElementById('entrepot_source').addEventListener('change', handleSourceEntrepotChange);
        document.getElementById('entrepot_destination').addEventListener('change', handleDestinationEntrepotChange);
        
        // Événements pour la recherche et filtrage
        document.getElementById('productSearch').addEventListener('input', debounce(filterProducts, 300));
        document.getElementById('categoryFilter').addEventListener('change', filterProducts);
        
        // Validation des champs requis
        document.getElementById('transfer_date').addEventListener('change', validateForm);
    }

    async function loadEntrepots() {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            if (!accessToken) {
                window.location.href = '/login';
                return;
            }

            const response = await fetch('https://toure.gestiem.com/api/entrepots', {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            if (response.ok) {
                const result = await response.json();
                entrepots = result.data || result;
                populateEntrepotSelects();
                loadCategories();
            } else {
                showAlert('Erreur lors du chargement des entrepôts', 'danger');
            }
        } catch (error) {
            console.error('Erreur:', error);
            showAlert('Erreur de connexion au serveur', 'danger');
        }
    }

    async function loadCategories() {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            const response = await fetch('https://toure.gestiem.com/api/product-categories', {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            if (response.ok) {
                const result = await response.json();
                const categories = Array.isArray(result) ? result : (result.data || []);
                populateCategoryFilter(categories);
            }
        } catch (error) {
            console.error('Erreur lors du chargement des catégories:', error);
        }
    }

    function populateEntrepotSelects() {
        const sourceSelect = document.getElementById('entrepot_source');
        const destinationSelect = document.getElementById('entrepot_destination');
        
        // Vider les selects
        sourceSelect.innerHTML = '<option value="">Sélectionner l\'entrepôt source...</option>';
        destinationSelect.innerHTML = '<option value="">Sélectionner l\'entrepôt destination...</option>';
        
        entrepots.forEach(entrepot => {
            if (entrepot.is_active !== false) {
                const sourceOption = document.createElement('option');
                sourceOption.value = entrepot.entrepot_id;
                sourceOption.textContent = `${entrepot.name} (${entrepot.code})`;
                sourceSelect.appendChild(sourceOption);
                
                const destOption = document.createElement('option');
                destOption.value = entrepot.entrepot_id;
                destOption.textContent = `${entrepot.name} (${entrepot.code})`;
                destinationSelect.appendChild(destOption);
            }
        });
    }

    function populateCategoryFilter(categories) {
        const categoryFilter = document.getElementById('categoryFilter');
        categories.forEach(category => {
            if (category.is_active !== false) {
                const option = document.createElement('option');
                option.value = category.product_category_id;
                option.textContent = category.label;
                categoryFilter.appendChild(option);
            }
        });
    }

    function handleSourceEntrepotChange() {
        const sourceId = document.getElementById('entrepot_source').value;
        const destinationId = document.getElementById('entrepot_destination').value;
        
        // Mettre à jour les options de destination
        const destinationSelect = document.getElementById('entrepot_destination');
        Array.from(destinationSelect.options).forEach(option => {
            if (option.value === sourceId) {
                option.style.display = 'none';
                option.disabled = true;
            } else {
                option.style.display = 'block';
                option.disabled = false;
            }
        });
        
        // Afficher les infos de l'entrepôt source
        if (sourceId) {
            const entrepot = entrepots.find(e => e.entrepot_id === sourceId);
            if (entrepot) {
                document.getElementById('entrepotSourceName').textContent = entrepot.name;
                document.getElementById('entrepotSourceDetails').textContent = 
                    `${entrepot.address || 'Adresse non renseignée'} - ${entrepot.city || 'Ville non renseignée'}`;
                document.getElementById('entrepotSourceInfo').style.display = 'block';
                
                // Charger les produits de cet entrepôt
                loadProducts(sourceId);
            }
        } else {
            document.getElementById('entrepotSourceInfo').style.display = 'none';
            document.getElementById('productsSection').style.display = 'none';
        }
        
        validateForm();
    }

    function handleDestinationEntrepotChange() {
        const destinationId = document.getElementById('entrepot_destination').value;
        
        if (destinationId) {
            const entrepot = entrepots.find(e => e.entrepot_id === destinationId);
            if (entrepot) {
                document.getElementById('entrepotDestinationName').textContent = entrepot.name;
                document.getElementById('entrepotDestinationDetails').textContent = 
                    `${entrepot.address || 'Adresse non renseignée'} - ${entrepot.city || 'Ville non renseignée'}`;
                document.getElementById('entrepotDestinationInfo').style.display = 'block';
            }
        } else {
            document.getElementById('entrepotDestinationInfo').style.display = 'none';
        }
        
        validateForm();
    }

    async function loadProducts(entrepotId) {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            const response = await fetch(`https://toure.gestiem.com/api/entrepots/${entrepotId}/products`, {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            if (response.ok) {
                const result = await response.json();
                products = result.data || result;
                filteredProducts = [...products];
                displayProducts();
                document.getElementById('productsSection').style.display = 'block';
            } else {
                showAlert('Erreur lors du chargement des produits', 'danger');
            }
        } catch (error) {
            console.error('Erreur:', error);
            showAlert('Erreur de connexion au serveur', 'danger');
        }
    }

    function displayProducts() {
        const productsList = document.getElementById('productsList');
        productsList.innerHTML = '';

        if (filteredProducts.length === 0) {
            productsList.innerHTML = `
                <div class="col-12 text-center py-4">
                    <i class="bi-box fs-1 text-muted"></i>
                    <p class="mt-2 text-muted">Aucun produit trouvé</p>
                </div>
            `;
            return;
        }

        filteredProducts.forEach(product => {
            const productCard = document.createElement('div');
            productCard.className = 'col-md-6 col-lg-4';
            
            const isSelected = selectedProducts.has(product.product_id);
            const selectedClass = isSelected ? 'selected' : '';
            const checkedAttr = isSelected ? 'checked' : '';
            const quantityValue = isSelected ? selectedProducts.get(product.product_id).quantity : 1;
            
            productCard.innerHTML = `
                <div class="product-item ${selectedClass}">
                    <div class="d-flex align-items-start gap-3">
                        <div class="position-relative">
                            <input type="checkbox" class="product-checkbox" ${checkedAttr}
                                   onchange="toggleProductSelection('${product.product_id}', this.checked)">
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1">${product.name}</h6>
                            <p class="mb-1 text-muted small">Code: ${product.code}</p>
                            <p class="mb-1 text-muted small">Stock: ${product.stock_quantity || 0} unités</p>
                            <p class="mb-2 text-muted small">Prix: ${formatCurrency(product.unit_price || 0)}</p>
                            <div class="d-flex align-items-center gap-2">
                                <label class="small text-muted">Quantité:</label>
                                <input type="number" class="quantity-input" min="1" max="${product.stock_quantity || 0}" 
                                       value="${quantityValue}" onchange="updateProductQuantity('${product.product_id}', this.value)"
                                       ${isSelected ? '' : 'disabled'}>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            productsList.appendChild(productCard);
        });
        
        updateTransferSummary();
    }

    function toggleProductSelection(productId, isSelected) {
        const product = products.find(p => p.product_id === productId);
        if (!product) return;

        if (isSelected) {
            const quantity = Math.min(1, product.stock_quantity || 0);
            selectedProducts.set(productId, {
                product: product,
                quantity: quantity
            });
        } else {
            selectedProducts.delete(productId);
        }
        
        displayProducts();
        updateTransferSummary();
        validateForm();
    }

    function updateProductQuantity(productId, quantity) {
        if (selectedProducts.has(productId)) {
            const productData = selectedProducts.get(productId);
            const maxQuantity = productData.product.stock_quantity || 0;
            const validQuantity = Math.min(Math.max(1, parseInt(quantity)), maxQuantity);
            
            selectedProducts.set(productId, {
                ...productData,
                quantity: validQuantity
            });
            
            updateTransferSummary();
        }
    }

    function updateTransferSummary() {
        const count = selectedProducts.size;
        let totalQuantity = 0;
        let totalValue = 0;
        
        selectedProducts.forEach((data, productId) => {
            totalQuantity += data.quantity;
            totalValue += (data.product.unit_price || 0) * data.quantity;
        });
        
        document.getElementById('selectedProductsCount').textContent = count;
        document.getElementById('totalQuantity').textContent = totalQuantity;
        document.getElementById('totalValue').textContent = formatCurrency(totalValue);
        
        const summarySection = document.getElementById('transferSummary');
        if (count > 0) {
            summarySection.style.display = 'block';
        } else {
            summarySection.style.display = 'none';
        }
    }

    function filterProducts() {
        const searchTerm = document.getElementById('productSearch').value.toLowerCase();
        const categoryFilter = document.getElementById('categoryFilter').value;
        
        filteredProducts = products.filter(product => {
            const matchesSearch = !searchTerm || 
                product.name.toLowerCase().includes(searchTerm) ||
                product.code.toLowerCase().includes(searchTerm);
            
            const matchesCategory = !categoryFilter || 
                product.product_category_id === categoryFilter ||
                (product.category && product.category.product_category_id === categoryFilter);
            
            return matchesSearch && matchesCategory;
        });
        
        displayProducts();
    }

    function validateForm() {
        const sourceEntrepot = document.getElementById('entrepot_source').value;
        const destinationEntrepot = document.getElementById('entrepot_destination').value;
        const transferDate = document.getElementById('transfer_date').value;
        const hasSelectedProducts = selectedProducts.size > 0;
        
        const isValid = sourceEntrepot && destinationEntrepot && sourceEntrepot !== destinationEntrepot && 
                       transferDate && hasSelectedProducts;
        
        document.getElementById('submitBtn').disabled = !isValid;
        
        return isValid;
    }

    async function handleSubmit(e) {
        e.preventDefault();
        
        if (!validateForm()) {
            showAlert('Veuillez remplir tous les champs obligatoires et sélectionner au moins un produit', 'danger');
            return;
        }
        
        const submitBtn = document.getElementById('submitBtn');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<span class="loading-spinner me-2"></span>Transfert en cours...';
        submitBtn.disabled = true;
        
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            
            const transferData = {
                entrepot_source_id: document.getElementById('entrepot_source').value,
                entrepot_destination_id: document.getElementById('entrepot_destination').value,
                transfer_date: document.getElementById('transfer_date').value,
                transfer_reference: document.getElementById('transfer_reference').value,
                notes: document.getElementById('notes').value,
                products: Array.from(selectedProducts.entries()).map(([productId, data]) => ({
                    product_id: productId,
                    quantity: data.quantity
                }))
            };
            
            console.log('Données du transfert:', transferData);
            
            const response = await fetch('https://toure.gestiem.com/api/transfers', {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(transferData)
            });
            
            const result = await response.json();
            
            if (response.ok) {
                showAlert('Transfert effectué avec succès !', 'success');
                
                // Redirection après 2 secondes
                setTimeout(() => {
                    window.location.href = '/entrepots';
                }, 2000);
            } else {
                if (response.status === 422) {
                    // Erreurs de validation
                    if (result.errors) {
                        const errorMessages = Object.values(result.errors).flat();
                        showAlert('Erreurs de validation: ' + errorMessages.join(', '), 'danger');
                    } else {
                        showAlert(result.message || 'Erreurs de validation', 'danger');
                    }
                } else {
                    showAlert(result.message || 'Erreur lors du transfert', 'danger');
                }
            }
        } catch (error) {
            console.error('Erreur:', error);
            showAlert('Erreur de connexion au serveur', 'danger');
        } finally {
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }
    }

    function formatCurrency(amount) {
        return new Intl.NumberFormat('fr-FR', {
            style: 'currency',
            currency: 'XOF',
            minimumFractionDigits: 0
        }).format(amount).replace('XOF', 'FCFA');
    }

    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    function showAlert(message, type) {
        const alertContainer = document.getElementById('alertContainer');
        const alertId = 'alert-' + Date.now();
        
        const alertHtml = `
            <div id="${alertId}" class="alert alert-${type} alert-dismissible fade show" role="alert">
                <i class="bi bi-${type === 'success' ? 'check-circle' : type === 'danger' ? 'exclamation-triangle' : 'info-circle'}"></i>
                ${message}
                <button type="button" class="btn-close" onclick="closeAlert('${alertId}')" aria-label="Close"></button>
            </div>
        `;
        
        alertContainer.innerHTML = alertHtml;
        
        // Auto-close after 5 seconds
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
require('./views/layouts/app-layout.php');
?>
