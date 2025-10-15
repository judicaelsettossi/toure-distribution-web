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
    .stock-entry-wrapper {
        margin-left: 250px;
        margin-top: 70px;
        padding: 2rem;
        min-height: calc(100vh - 70px);
        background: #f8f9fa;
    }

    @media (max-width: 991px) {
        .stock-entry-wrapper {
            margin-left: 0;
            margin-top: 60px;
            padding: 1rem;
        }
    }

    /* Header */
    .stock-entry-header {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .stock-entry-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, var(--success-color) 0%, #059669 100%);
    }

    .stock-entry-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--secondary-color);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .stock-entry-icon {
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

    /* Product search */
    .product-search-container {
        position: relative;
    }

    .product-search-results {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: white;
        border: 2px solid #e5e7eb;
        border-top: none;
        border-radius: 0 0 12px 12px;
        max-height: 300px;
        overflow-y: auto;
        z-index: 1000;
        display: none;
    }

    .product-search-item {
        padding: 1rem;
        border-bottom: 1px solid #f0f0f0;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }

    .product-search-item:hover {
        background: var(--light-primary);
    }

    .product-search-item:last-child {
        border-bottom: none;
    }

    .product-name {
        font-weight: 600;
        color: var(--secondary-color);
        margin-bottom: 0.25rem;
    }

    .product-details {
        font-size: 0.85rem;
        color: #6b7280;
    }

    /* Supplier search */
    .supplier-search-container {
        position: relative;
    }

    .supplier-search-results {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: white;
        border: 2px solid #e5e7eb;
        border-top: none;
        border-radius: 0 0 12px 12px;
        max-height: 300px;
        overflow-y: auto;
        z-index: 1000;
        display: none;
    }

    .supplier-search-item {
        padding: 1rem;
        border-bottom: 1px solid #f0f0f0;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }

    .supplier-search-item:hover {
        background: var(--light-primary);
    }

    .supplier-search-item:last-child {
        border-bottom: none;
    }

    .supplier-name {
        font-weight: 600;
        color: var(--secondary-color);
        margin-bottom: 0.25rem;
    }

    .supplier-details {
        font-size: 0.85rem;
        color: #6b7280;
    }

    /* Warehouse search */
    .warehouse-search-container {
        position: relative;
    }

    .warehouse-search-results {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: white;
        border: 2px solid #e5e7eb;
        border-top: none;
        border-radius: 0 0 12px 12px;
        max-height: 300px;
        overflow-y: auto;
        z-index: 1000;
        display: none;
    }

    .warehouse-search-item {
        padding: 1rem;
        border-bottom: 1px solid #f0f0f0;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }

    .warehouse-search-item:hover {
        background: var(--light-primary);
    }

    .warehouse-search-item:last-child {
        border-bottom: none;
    }

    .warehouse-name {
        font-weight: 600;
        color: var(--secondary-color);
        margin-bottom: 0.25rem;
    }

    .warehouse-details {
        font-size: 0.85rem;
        color: #6b7280;
    }

    /* Selected product */
    .selected-product {
        background: var(--light-primary);
        border: 2px solid var(--success-color);
        border-radius: 12px;
        padding: 1rem;
        margin-top: 1rem;
        display: none;
    }

    .selected-product.show {
        display: block;
        animation: slideDown 0.3s ease-out;
    }

    /* Selected supplier */
    .selected-supplier {
        background: var(--light-primary);
        border: 2px solid var(--info-color);
        border-radius: 12px;
        padding: 1rem;
        margin-top: 1rem;
        display: none;
    }

    .selected-supplier.show {
        display: block;
        animation: slideDown 0.3s ease-out;
    }

    /* Selected warehouse */
    .selected-warehouse {
        background: var(--light-primary);
        border: 2px solid var(--warning-color);
        border-radius: 12px;
        padding: 1rem;
        margin-top: 1rem;
        display: none;
    }

    .selected-warehouse.show {
        display: block;
        animation: slideDown 0.3s ease-out;
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

    .product-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .supplier-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .warehouse-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .product-image {
        width: 60px;
        height: 60px;
        border-radius: 8px;
        object-fit: cover;
        background: #f0f0f0;
    }

    .supplier-image {
        width: 60px;
        height: 60px;
        border-radius: 8px;
        object-fit: cover;
        background: #f0f0f0;
    }

    .warehouse-image {
        width: 60px;
        height: 60px;
        border-radius: 8px;
        object-fit: cover;
        background: #f0f0f0;
    }

    .product-details-info h6 {
        margin: 0 0 0.25rem 0;
        color: var(--secondary-color);
        font-weight: 600;
    }

    .supplier-details-info h6 {
        margin: 0 0 0.25rem 0;
        color: var(--secondary-color);
        font-weight: 600;
    }

    .warehouse-details-info h6 {
        margin: 0 0 0.25rem 0;
        color: var(--secondary-color);
        font-weight: 600;
    }

    .product-details-info small {
        color: #6b7280;
    }

    .supplier-details-info small {
        color: #6b7280;
    }

    .warehouse-details-info small {
        color: #6b7280;
    }

    .remove-product {
        background: var(--danger-color);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 0.5rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .remove-supplier {
        background: var(--danger-color);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 0.5rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .remove-warehouse {
        background: var(--danger-color);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 0.5rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .remove-product:hover {
        background: #dc2626;
        transform: scale(1.05);
    }

    .remove-supplier:hover {
        background: #dc2626;
        transform: scale(1.05);
    }

    .remove-warehouse:hover {
        background: #dc2626;
        transform: scale(1.05);
    }

    /* Quantity and price */
    .quantity-price-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
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

    /* Responsive */
    @media (max-width: 768px) {
        .quantity-price-row {
            grid-template-columns: 1fr;
        }
        
        .form-actions {
            flex-direction: column;
        }
        
        .stock-entry-title {
            font-size: 2rem;
        }
    }
</style>

<div class="stock-entry-wrapper font-public-sans">
    <!-- Header -->
    <div class="stock-entry-header fade-in">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="stock-entry-title">
                <div class="stock-entry-icon">
                    <i class="bi bi-box-arrow-in-down"></i>
                </div>
                Entrée de Stock
            </h1>
            <a href="/entree-sortie-stock" class="btn-modern btn-outline-modern">
                <i class="bi bi-arrow-left"></i> Retour
            </a>
        </div>
        <p class="text-muted mb-0">Enregistrez une nouvelle entrée de stock</p>
    </div>

    <!-- Alerts -->
    <div id="alertContainer"></div>

    <!-- Form -->
    <form id="stockEntryForm" class="form-container fade-in">
        <!-- Section Type de Mouvement -->
        <div class="form-section">
            <h3 class="section-title">
                <div class="section-icon">
                    <i class="bi bi-arrow-repeat"></i>
                </div>
                Type de Mouvement
            </h3>

            <div class="form-group-modern">
                <label class="form-label-modern label-required">Sélectionner le type de mouvement</label>
                <select id="movementType" class="form-control-modern" required>
                    <option value="">-- Choisir le type de mouvement --</option>
                    <option value="receipt">Réception (Fournisseur → Entrepôt)</option>
                    <option value="transfer">Transfert (Entrepôt → Entrepôt)</option>
                </select>
            </div>
        </div>

        <!-- Section Produit -->
        <div class="form-section">
            <h3 class="section-title">
                <div class="section-icon">
                    <i class="bi bi-box-seam"></i>
                </div>
                Sélection du Produit
            </h3>

            <div class="form-group-modern">
                <label class="form-label-modern label-required">Rechercher un produit</label>
                <div class="product-search-container">
                    <input type="text" id="productSearch" class="form-control-modern" placeholder="Tapez le nom ou le code du produit..." autocomplete="off">
                    <div id="productSearchResults" class="product-search-results"></div>
                </div>
                <div id="selectedProduct" class="selected-product">
                    <div class="product-info">
                        <img id="selectedProductImage" class="product-image" src="" alt="Image produit">
                        <div class="product-details-info">
                            <h6 id="selectedProductName">-</h6>
                            <small id="selectedProductCode">Code: -</small><br>
                            <small id="selectedProductStock">Stock actuel: -</small>
                        </div>
                        <button type="button" class="remove-product" onclick="clearSelectedProduct()">
                            <i class="bi bi-x"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Détails de l'entrée -->
        <div class="form-section">
            <h3 class="section-title">
                <div class="section-icon">
                    <i class="bi bi-info-circle"></i>
                </div>
                Détails de l'Entrée
            </h3>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group-modern">
                        <label class="form-label-modern label-required">Quantité</label>
                        <input type="number" id="quantity" class="form-control-modern" placeholder="0" min="1" step="1" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-modern">
                        <label class="form-label-modern">Prix d'achat unitaire (FCFA)</label>
                        <input type="number" id="unitPrice" class="form-control-modern" placeholder="0" min="0" step="1">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4" id="warehouseFromSection" style="display: none;">
                    <div class="form-group-modern">
                        <label class="form-label-modern label-required">Entrepôt source</label>
                        <div class="warehouse-search-container">
                            <input type="text" id="warehouseFromSearch" class="form-control-modern" placeholder="Tapez le nom de l'entrepôt source..." autocomplete="off">
                            <div id="warehouseFromSearchResults" class="warehouse-search-results"></div>
                        </div>
                        <div id="selectedWarehouseFrom" class="selected-warehouse">
                            <div class="warehouse-info">
                                <img id="selectedWarehouseFromImage" class="warehouse-image" src="" alt="Image entrepôt">
                                <div class="warehouse-details-info">
                                    <h6 id="selectedWarehouseFromName">-</h6>
                                    <small id="selectedWarehouseFromLocation">Localisation: -</small><br>
                                    <small id="selectedWarehouseFromManager">Responsable: -</small>
                                </div>
                                <button type="button" class="remove-warehouse" onclick="clearSelectedWarehouseFrom()">
                                    <i class="bi bi-x-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group-modern">
                        <label class="form-label-modern label-required">Entrepôt de destination</label>
                        <div class="warehouse-search-container">
                            <input type="text" id="warehouseSearch" class="form-control-modern" placeholder="Tapez le nom de l'entrepôt..." autocomplete="off">
                            <div id="warehouseSearchResults" class="warehouse-search-results"></div>
                        </div>
                        <div id="selectedWarehouse" class="selected-warehouse">
                            <div class="warehouse-info">
                                <img id="selectedWarehouseImage" class="warehouse-image" src="" alt="Image entrepôt">
                                <div class="warehouse-details-info">
                                    <h6 id="selectedWarehouseName">-</h6>
                                    <small id="selectedWarehouseLocation">Localisation: -</small><br>
                                    <small id="selectedWarehouseManager">Responsable: -</small>
                                </div>
                                <button type="button" class="remove-warehouse" onclick="clearSelectedWarehouse()">
                                    <i class="bi bi-x"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group-modern">
                        <label class="form-label-modern">Date de réception</label>
                        <input type="datetime-local" id="receivedDate" class="form-control-modern">
                    </div>
                </div>
                <div class="col-md-4" id="supplierSection" style="display: none;">
                    <div class="form-group-modern">
                        <label class="form-label-modern">Fournisseur</label>
                        <div class="supplier-search-container">
                            <input type="text" id="supplierSearch" class="form-control-modern" placeholder="Tapez le nom du fournisseur..." autocomplete="off">
                            <div id="supplierSearchResults" class="supplier-search-results"></div>
                        </div>
                        <div id="selectedSupplier" class="selected-supplier">
                            <div class="supplier-info">
                                <img id="selectedSupplierImage" class="supplier-image" src="" alt="Image fournisseur">
                                <div class="supplier-details-info">
                                    <h6 id="selectedSupplierName">-</h6>
                                    <small id="selectedSupplierContact">Contact: -</small><br>
                                    <small id="selectedSupplierEmail">Email: -</small>
                                </div>
                                <button type="button" class="remove-supplier" onclick="clearSelectedSupplier()">
                                    <i class="bi bi-x"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group-modern">
                <label class="form-label-modern">Motif / Référence</label>
                <select id="reason" class="form-control-modern form-select-modern">
                    <option value="">Sélectionner un motif</option>
                    <option value="achat">Achat</option>
                    <option value="retour_client">Retour client</option>
                    <option value="transfert">Transfert entre entrepôts</option>
                    <option value="ajustement">Ajustement de stock</option>
                    <option value="inventaire">Correction d'inventaire</option>
                    <option value="autre">Autre</option>
                </select>
            </div>

            <div class="form-group-modern">
                <label class="form-label-modern">Notes / Commentaires</label>
                <textarea id="notes" class="form-control-modern" rows="3" placeholder="Informations complémentaires..."></textarea>
            </div>
        </div>

        <!-- Actions -->
        <div class="form-actions">
            <button type="button" class="btn-modern btn-secondary-modern" onclick="resetForm()">
                <i class="bi bi-arrow-clockwise"></i>
                Réinitialiser
            </button>
            <button type="button" id="submitStockEntry" class="btn-modern btn-success-modern">
                <i class="bi bi-check-circle"></i>
                Enregistrer l'Entrée
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
    let selectedProduct = null;
    let selectedSupplier = null;
    let selectedWarehouse = null;
    let selectedWarehouseFrom = null;
    let products = [];
    let suppliers = [];
    let warehouses = [];
    let searchTimeout = null;
    let supplierSearchTimeout = null;
    let warehouseSearchTimeout = null;

    document.addEventListener('DOMContentLoaded', function() {
        // Définir la date actuelle
        const now = new Date();
        const dateTimeLocal = now.toISOString().slice(0, 16);
        document.getElementById('receivedDate').value = dateTimeLocal;

        // Test de connexion API
        testApiConnection();

        // Event listeners
        setupEventListeners();
    });

    async function testApiConnection() {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            if (!accessToken) {
                console.warn('Aucun token d\'accès trouvé');
                return;
            }

            const response = await fetch('https://toure.gestiem.com/api/products?per_page=1', {
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });
            
            console.log('Test API - Status:', response.status);
            if (response.ok) {
                console.log('✅ API accessible');
                
                // Tester la structure des mouvements de stock
                testStockMovementStructure();
            } else {
                console.warn('⚠️ API retourne une erreur:', response.status);
            }
        } catch (error) {
            console.error('❌ Erreur de connexion API:', error);
        }
    }

    async function testStockMovementStructure() {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            
            // Tester avec une requête GET pour voir la structure attendue
            const response = await fetch('https://toure.gestiem.com/api/stock-movements?per_page=1', {
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });
            
            if (response.ok) {
                const result = await response.json();
                console.log('Structure des mouvements de stock:', result);
                
                // Essayer de récupérer les types de mouvements
                loadMovementTypes();
            } else {
                console.log('Endpoint stock-movements status:', response.status);
            }
        } catch (error) {
            console.log('Test structure - Erreur:', error.message);
        }
    }

    async function loadMovementTypes() {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            
            const response = await fetch('https://toure.gestiem.com/api/stock-movement-types', {
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });
            
            if (response.ok) {
                const result = await response.json();
                console.log('Types de mouvements disponibles:', result);
                
                // Stocker les types pour utilisation ultérieure
                window.availableMovementTypes = result.data || [];
                console.log('Types stockés:', window.availableMovementTypes);
                console.log('Type de availableMovementTypes:', typeof window.availableMovementTypes);
                console.log('Est un tableau:', Array.isArray(window.availableMovementTypes));
            } else {
                console.log('Types de mouvements status:', response.status);
            }
        } catch (error) {
            console.log('Erreur chargement types:', error.message);
        }
    }

    function findMovementTypeId(type) {
        if (!window.availableMovementTypes) {
            console.log('Aucun type de mouvement disponible');
            return null;
        }
        
        // Vérifier si c'est un tableau
        if (!Array.isArray(window.availableMovementTypes)) {
            console.log('availableMovementTypes n\'est pas un tableau:', window.availableMovementTypes);
            return null;
        }
        
        console.log('Recherche du type:', type, 'dans:', window.availableMovementTypes);
        
        const movementType = window.availableMovementTypes.find(mt => 
            mt.direction === type || 
            mt.movement_type === type ||
            mt.name?.toLowerCase().includes(type) ||
            mt.label?.toLowerCase().includes(type)
        );
        
        console.log('Type trouvé:', movementType);
        
        return movementType ? movementType.stock_movement_type_id || movementType.id : null;
    }

    function setupEventListeners() {
        // Gestion du type de mouvement
        document.getElementById('movementType').addEventListener('change', function(e) {
            const movementType = e.target.value;
            const supplierSection = document.getElementById('supplierSection');
            const warehouseFromSection = document.getElementById('warehouseFromSection');
            
            if (movementType === 'receipt') {
                // Réception : afficher fournisseur, masquer entrepôt source
                supplierSection.style.display = 'block';
                warehouseFromSection.style.display = 'none';
                // Vider l'entrepôt source s'il était sélectionné
                clearSelectedWarehouseFrom();
            } else if (movementType === 'transfer') {
                // Transfert : masquer fournisseur, afficher entrepôt source
                supplierSection.style.display = 'none';
                warehouseFromSection.style.display = 'block';
                // Vider le fournisseur s'il était sélectionné
                clearSelectedSupplier();
            } else {
                // Aucun type sélectionné : tout masquer
                supplierSection.style.display = 'none';
                warehouseFromSection.style.display = 'none';
            }
        });

        // Recherche d'entrepôt source
        document.getElementById('warehouseFromSearch').addEventListener('input', function(e) {
            const query = e.target.value.trim();
            
            if (query.length < 2) {
                hideWarehouseFromSearchResults();
                return;
            }

            clearTimeout(warehouseSearchTimeout);
            warehouseSearchTimeout = setTimeout(() => {
                searchWarehousesFrom(query);
            }, 300);
        });

        // Recherche de produits
        document.getElementById('productSearch').addEventListener('input', function(e) {
            const query = e.target.value.trim();
            
            if (query.length < 2) {
                hideSearchResults();
                return;
            }

            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                searchProducts(query);
            }, 300);
        });

        // Recherche de fournisseurs
        document.getElementById('supplierSearch').addEventListener('input', function(e) {
            const query = e.target.value.trim();
            
            if (query.length < 2) {
                hideSupplierSearchResults();
                return;
            }

            clearTimeout(supplierSearchTimeout);
            supplierSearchTimeout = setTimeout(() => {
                searchSuppliers(query);
            }, 300);
        });

        // Recherche d'entrepôts
        document.getElementById('warehouseSearch').addEventListener('input', function(e) {
            const query = e.target.value.trim();
            
            if (query.length < 2) {
                hideWarehouseSearchResults();
                return;
            }

            clearTimeout(warehouseSearchTimeout);
            warehouseSearchTimeout = setTimeout(() => {
                searchWarehouses(query);
            }, 300);
        });

        // Fermer les résultats de recherche en cliquant ailleurs
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.product-search-container')) {
                hideSearchResults();
            }
            if (!e.target.closest('.supplier-search-container')) {
                hideSupplierSearchResults();
            }
            if (!e.target.closest('.warehouse-search-container')) {
                hideWarehouseSearchResults();
                hideWarehouseFromSearchResults();
            }
        });

        // Soumission du formulaire
        const form = document.getElementById('stockEntryForm');
        if (form) {
            form.addEventListener('submit', handleSubmit);
            console.log('Event listener ajouté au formulaire');
        } else {
            console.error('Formulaire non trouvé!');
        }

        // Event listener pour le bouton de soumission
        const submitButton = document.getElementById('submitStockEntry');
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

    // Normaliser les données de produit pour gérer différents formats API
    function normalizeProduct(product) {
        return {
            id: product.product_id || product.id,
            name: product.name || product.product_name,
            code: product.code || product.product_code,
            stock_quantity: product.stock_quantity || product.current_stock || product.quantity || 0,
            category: product.category || { label: product.category_name || product.category_label },
            picture: product.picture || product.image || product.photo,
            price: product.price || product.unit_price,
            description: product.description
        };
    }

    // Normaliser les données de fournisseur pour gérer différents formats API
    function normalizeSupplier(supplier) {
        return {
            id: supplier.fournisseur_id || supplier.id || supplier.supplier_id,
            name: supplier.name || supplier.name_fournisseur || supplier.supplier_name,
            email: supplier.email || supplier.email_fournisseur,
            phone: supplier.phone || supplier.telephone || supplier.contact_phone,
            address: supplier.address || supplier.adresse || supplier.supplier_address,
            contact_person: supplier.contact_person || supplier.personne_contact,
            picture: supplier.picture || supplier.image || supplier.photo,
            is_active: supplier.is_active !== false
        };
    }

    // Normaliser les données d'entrepôt pour gérer différents formats API
    function normalizeWarehouse(warehouse) {
        return {
            id: warehouse.entrepot_id || warehouse.id || warehouse.warehouse_id,
            name: warehouse.name || warehouse.name_entrepot || warehouse.warehouse_name,
            location: warehouse.location || warehouse.localisation || warehouse.address,
            manager: warehouse.manager || warehouse.responsable || warehouse.manager_name,
            capacity: warehouse.capacity || warehouse.capacite,
            description: warehouse.description,
            picture: warehouse.picture || warehouse.image || warehouse.photo,
            is_active: warehouse.is_active !== false
        };
    }

    async function searchProducts(query) {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            
            const response = await fetch(`https://toure.gestiem.com/api/products?search=${encodeURIComponent(query)}&per_page=10`, {
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });

            if (response.ok) {
                const result = await response.json();
                const rawProducts = result.data || [];
                products = rawProducts.map(normalizeProduct);
                console.log('Produits trouvés (normalisés):', products);
                displaySearchResults(products);
            } else {
                console.error('Erreur de recherche:', response.status, response.statusText);
                const errorResult = await response.json();
                console.error('Détails de l\'erreur:', errorResult);
                showAlert('Erreur lors de la recherche de produits', 'danger');
            }
        } catch (error) {
            console.error('Erreur lors de la recherche:', error);
            hideSearchResults();
            showAlert('Erreur de connexion lors de la recherche', 'danger');
        }
    }

    async function searchSuppliers(query) {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            
            const response = await fetch(`https://toure.gestiem.com/api/fournisseurs?search=${encodeURIComponent(query)}&per_page=10`, {
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });

            if (response.ok) {
                const result = await response.json();
                const rawSuppliers = result.data || [];
                suppliers = rawSuppliers.map(normalizeSupplier);
                console.log('Fournisseurs trouvés (normalisés):', suppliers);
                displaySupplierSearchResults(suppliers);
            } else {
                console.error('Erreur de recherche fournisseurs:', response.status, response.statusText);
                const errorResult = await response.json();
                console.error('Détails de l\'erreur:', errorResult);
                showAlert('Erreur lors de la recherche de fournisseurs', 'danger');
            }
        } catch (error) {
            console.error('Erreur lors de la recherche de fournisseurs:', error);
            hideSupplierSearchResults();
            showAlert('Erreur de connexion lors de la recherche de fournisseurs', 'danger');
        }
    }

    async function searchWarehouses(query) {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            
            const response = await fetch(`https://toure.gestiem.com/api/entrepots?search=${encodeURIComponent(query)}&per_page=10`, {
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });

            if (response.ok) {
                const result = await response.json();
                const rawWarehouses = result.data || [];
                warehouses = rawWarehouses.map(normalizeWarehouse);
                console.log('Entrepôts trouvés (normalisés):', warehouses);
                displayWarehouseSearchResults(warehouses);
            } else {
                console.error('Erreur de recherche entrepôts:', response.status, response.statusText);
                const errorResult = await response.json();
                console.error('Détails de l\'erreur:', errorResult);
                showAlert('Erreur lors de la recherche d\'entrepôts', 'danger');
            }
        } catch (error) {
            console.error('Erreur lors de la recherche d\'entrepôts:', error);
            hideWarehouseSearchResults();
            showAlert('Erreur de connexion lors de la recherche d\'entrepôts', 'danger');
        }
    }

    function displaySearchResults(products) {
        const resultsContainer = document.getElementById('productSearchResults');
        
        if (products.length === 0) {
            resultsContainer.innerHTML = '<div class="product-search-item">Aucun produit trouvé</div>';
        } else {
            resultsContainer.innerHTML = products.map(product => `
                <div class="product-search-item" onclick="selectProduct('${product.id}')">
                    <div class="product-name">${product.name || 'Produit sans nom'}</div>
                    <div class="product-details">
                        Code: ${product.code || 'N/A'} | 
                        Stock: ${product.stock_quantity} | 
                        Catégorie: ${product.category?.label || 'N/A'}
                    </div>
                </div>
            `).join('');
        }
        
        resultsContainer.style.display = 'block';
    }

    function hideSearchResults() {
        document.getElementById('productSearchResults').style.display = 'none';
    }

    function displaySupplierSearchResults(suppliers) {
        const resultsContainer = document.getElementById('supplierSearchResults');
        
        if (suppliers.length === 0) {
            resultsContainer.innerHTML = '<div class="supplier-search-item">Aucun fournisseur trouvé</div>';
        } else {
            resultsContainer.innerHTML = suppliers.map(supplier => `
                <div class="supplier-search-item" onclick="selectSupplier('${supplier.id}')">
                    <div class="supplier-name">${supplier.name || 'Fournisseur sans nom'}</div>
                    <div class="supplier-details">
                        Email: ${supplier.email || 'N/A'} | 
                        Téléphone: ${supplier.phone || 'N/A'} | 
                        Contact: ${supplier.contact_person || 'N/A'}
                    </div>
                </div>
            `).join('');
        }
        
        resultsContainer.style.display = 'block';
    }

    function hideSupplierSearchResults() {
        document.getElementById('supplierSearchResults').style.display = 'none';
    }

    function displayWarehouseSearchResults(warehouses) {
        const resultsContainer = document.getElementById('warehouseSearchResults');
        
        if (warehouses.length === 0) {
            resultsContainer.innerHTML = '<div class="warehouse-search-item">Aucun entrepôt trouvé</div>';
        } else {
            resultsContainer.innerHTML = warehouses.map(warehouse => `
                <div class="warehouse-search-item" onclick="selectWarehouse('${warehouse.id}')">
                    <div class="warehouse-name">${warehouse.name || 'Entrepôt sans nom'}</div>
                    <div class="warehouse-details">
                        Localisation: ${warehouse.location || 'N/A'} | 
                        Responsable: ${warehouse.manager || 'N/A'} | 
                        Capacité: ${warehouse.capacity || 'N/A'}
                    </div>
                </div>
            `).join('');
        }
        
        resultsContainer.style.display = 'block';
    }

    function hideWarehouseSearchResults() {
        document.getElementById('warehouseSearchResults').style.display = 'none';
    }

    function selectProduct(productId) {
        console.log('Sélection du produit avec ID:', productId);
        console.log('Produits disponibles:', products);
        
        selectedProduct = products.find(p => p.id === productId);
        
        console.log('Produit sélectionné:', selectedProduct);
        
        if (selectedProduct) {
            // Afficher le produit sélectionné
            document.getElementById('selectedProduct').classList.add('show');
            document.getElementById('selectedProductName').textContent = selectedProduct.name || 'Produit sans nom';
            document.getElementById('selectedProductCode').textContent = `Code: ${selectedProduct.code || 'N/A'}`;
            document.getElementById('selectedProductStock').textContent = `Stock actuel: ${selectedProduct.stock_quantity}`;
            
            if (selectedProduct.picture) {
                document.getElementById('selectedProductImage').src = `https://toure.gestiem.com/storage/${selectedProduct.picture}`;
            }
            
            // Vider le champ de recherche
            document.getElementById('productSearch').value = '';
            hideSearchResults();
            
            // Focus sur la quantité
            document.getElementById('quantity').focus();
            
            console.log('Produit sélectionné avec succès');
        } else {
            console.error('Produit non trouvé avec l\'ID:', productId);
            showAlert('Erreur: Produit non trouvé', 'danger');
        }
    }

    function clearSelectedProduct() {
        selectedProduct = null;
        document.getElementById('selectedProduct').classList.remove('show');
        document.getElementById('productSearch').value = '';
    }

    function selectSupplier(supplierId) {
        console.log('Sélection du fournisseur avec ID:', supplierId);
        console.log('Fournisseurs disponibles:', suppliers);
        
        selectedSupplier = suppliers.find(s => s.id === supplierId);
        
        console.log('Fournisseur sélectionné:', selectedSupplier);
        
        if (selectedSupplier) {
            // Afficher le fournisseur sélectionné
            document.getElementById('selectedSupplier').classList.add('show');
            document.getElementById('selectedSupplierName').textContent = selectedSupplier.name || 'Fournisseur sans nom';
            document.getElementById('selectedSupplierContact').textContent = `Contact: ${selectedSupplier.contact_person || 'N/A'}`;
            document.getElementById('selectedSupplierEmail').textContent = `Email: ${selectedSupplier.email || 'N/A'}`;
            
            if (selectedSupplier.picture) {
                document.getElementById('selectedSupplierImage').src = `https://toure.gestiem.com/storage/${selectedSupplier.picture}`;
            }
            
            // Vider le champ de recherche
            document.getElementById('supplierSearch').value = '';
            hideSupplierSearchResults();
            
            console.log('Fournisseur sélectionné avec succès');
        } else {
            console.error('Fournisseur non trouvé avec l\'ID:', supplierId);
            showAlert('Erreur: Fournisseur non trouvé', 'danger');
        }
    }

    function clearSelectedSupplier() {
        selectedSupplier = null;
        document.getElementById('selectedSupplier').classList.remove('show');
        document.getElementById('supplierSearch').value = '';
    }

    function selectWarehouse(warehouseId) {
        console.log('Sélection de l\'entrepôt avec ID:', warehouseId);
        console.log('Entrepôts disponibles:', warehouses);
        
        selectedWarehouse = warehouses.find(w => w.id === warehouseId);
        
        console.log('Entrepôt sélectionné:', selectedWarehouse);
        
        if (selectedWarehouse) {
            // Afficher l'entrepôt sélectionné
            document.getElementById('selectedWarehouse').classList.add('show');
            document.getElementById('selectedWarehouseName').textContent = selectedWarehouse.name || 'Entrepôt sans nom';
            document.getElementById('selectedWarehouseLocation').textContent = `Localisation: ${selectedWarehouse.location || 'N/A'}`;
            document.getElementById('selectedWarehouseManager').textContent = `Responsable: ${selectedWarehouse.manager || 'N/A'}`;
            
            if (selectedWarehouse.picture) {
                document.getElementById('selectedWarehouseImage').src = `https://toure.gestiem.com/storage/${selectedWarehouse.picture}`;
            }
            
            // Vider le champ de recherche
            document.getElementById('warehouseSearch').value = '';
            hideWarehouseSearchResults();
            
            console.log('Entrepôt sélectionné avec succès');
        } else {
            console.error('Entrepôt non trouvé avec l\'ID:', warehouseId);
            showAlert('Erreur: Entrepôt non trouvé', 'danger');
        }
    }

    function clearSelectedWarehouse() {
        selectedWarehouse = null;
        document.getElementById('selectedWarehouse').classList.remove('show');
        document.getElementById('warehouseSearch').value = '';
    }

    function selectWarehouseFrom(warehouseId) {
        console.log('Sélection de l\'entrepôt source avec ID:', warehouseId);
        console.log('Entrepôts disponibles:', warehouses);
        
        selectedWarehouseFrom = warehouses.find(w => w.id === warehouseId);
        
        console.log('Entrepôt source sélectionné:', selectedWarehouseFrom);
        
        if (selectedWarehouseFrom) {
            // Afficher l'entrepôt source sélectionné
            document.getElementById('selectedWarehouseFrom').classList.add('show');
            document.getElementById('selectedWarehouseFromName').textContent = selectedWarehouseFrom.name || 'Entrepôt sans nom';
            document.getElementById('selectedWarehouseFromLocation').textContent = `Localisation: ${selectedWarehouseFrom.location || 'N/A'}`;
            document.getElementById('selectedWarehouseFromManager').textContent = `Responsable: ${selectedWarehouseFrom.manager || 'N/A'}`;
            
            if (selectedWarehouseFrom.picture) {
                document.getElementById('selectedWarehouseFromImage').src = `https://toure.gestiem.com/storage/${selectedWarehouseFrom.picture}`;
            }
            
            // Vider le champ de recherche
            document.getElementById('warehouseFromSearch').value = '';
            hideWarehouseFromSearchResults();
            
            console.log('Entrepôt source sélectionné avec succès');
        } else {
            console.error('Entrepôt source non trouvé avec l\'ID:', warehouseId);
            showAlert('Erreur: Entrepôt source non trouvé', 'danger');
        }
    }

    function clearSelectedWarehouseFrom() {
        selectedWarehouseFrom = null;
        document.getElementById('selectedWarehouseFrom').classList.remove('show');
        document.getElementById('warehouseFromSearch').value = '';
    }

    async function searchWarehousesFrom(query) {
        if (query.length < 2) {
            hideWarehouseFromSearchResults();
            return;
        }

        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            const response = await fetch(`https://toure.gestiem.com/api/entrepots?search=${encodeURIComponent(query)}&per_page=10`, {
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });

            if (response.ok) {
                const result = await response.json();
                const rawWarehouses = result.data || [];
                warehouses = rawWarehouses.map(normalizeWarehouse);
                console.log('Entrepôts trouvés (normalisés):', warehouses);
                displayWarehouseFromSearchResults(warehouses);
            } else {
                console.error('Erreur lors de la recherche d\'entrepôts:', response.status);
                hideWarehouseFromSearchResults();
            }
        } catch (error) {
            console.error('Erreur de connexion:', error);
            hideWarehouseFromSearchResults();
        }
    }

    function displayWarehouseFromSearchResults(warehouses) {
        const resultsContainer = document.getElementById('warehouseFromSearchResults');
        
        if (warehouses.length === 0) {
            resultsContainer.innerHTML = '<div class="warehouse-search-item">Aucun entrepôt trouvé</div>';
        } else {
            resultsContainer.innerHTML = warehouses.map(warehouse => `
                <div class="warehouse-search-item" onclick="selectWarehouseFrom('${warehouse.id}')">
                    <div class="warehouse-name">${warehouse.name || 'Entrepôt sans nom'}</div>
                    <div class="warehouse-details">
                        Localisation: ${warehouse.location || 'N/A'} | 
                        Responsable: ${warehouse.manager || 'N/A'} | 
                        Capacité: ${warehouse.capacity || 'N/A'}
                    </div>
                </div>
            `).join('');
        }
        
        resultsContainer.style.display = 'block';
    }

    function hideWarehouseFromSearchResults() {
        document.getElementById('warehouseFromSearchResults').style.display = 'none';
    }

    async function handleSubmit(e) {
        e.preventDefault();
        console.log('=== DÉBUT DE LA SOUMISSION ===');
        console.log('Produit sélectionné:', selectedProduct);
        console.log('Entrepôt sélectionné:', selectedWarehouse);
        console.log('Fournisseur sélectionné:', selectedSupplier);

        if (!selectedProduct) {
            showAlert('Veuillez sélectionner un produit', 'danger');
            return;
        }

        if (!selectedWarehouse) {
            showAlert('Veuillez sélectionner un entrepôt de destination', 'danger');
            return;
        }

        const quantity = parseInt(document.getElementById('quantity').value);
        if (!quantity || quantity <= 0) {
            showAlert('Veuillez saisir une quantité valide', 'danger');
            return;
        }

        try {
            document.getElementById('loadingOverlay').style.display = 'flex';

            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            console.log('Access token:', accessToken ? 'Présent' : 'Manquant');
            console.log('Token value:', accessToken);
            
            if (!accessToken) {
                throw new Error('Token d\'accès manquant. Veuillez vous reconnecter.');
            }
            
            // Déterminer le type de mouvement
            const movementType = document.getElementById('movementType').value;
            console.log('Type de mouvement sélectionné:', movementType);
            
            let endpoint, formData;
            
            if (movementType === 'receipt') {
                // Réception Fournisseur → Entrepôt
                if (!selectedSupplier) {
                    throw new Error('Veuillez sélectionner un fournisseur pour une réception');
                }
                
                endpoint = 'https://toure.gestiem.com/api/stock-movements/receipt/supplier';
                formData = {
                    movement_type: 'entrée',
                    fournisseur_id: selectedSupplier.id,
                    entrepot_to_id: selectedWarehouse.id,
                    note: document.getElementById('notes').value || null,
                    details: [
                        {
                            product_id: selectedProduct.id,
                            quantite: quantity
                        }
                    ]
                };
                
            } else if (movementType === 'transfer') {
                // Transfert Entrepôt → Entrepôt
                if (!selectedWarehouseFrom) {
                    throw new Error('Veuillez sélectionner un entrepôt source pour un transfert');
                }
                
                if (selectedWarehouseFrom.id === selectedWarehouse.id) {
                    throw new Error('L\'entrepôt source et destination doivent être différents');
                }
                
                endpoint = 'https://toure.gestiem.com/api/stock-movements/transfer/warehouse';
                formData = {
                    movement_type: 'transfert',
                    entrepot_from_id: selectedWarehouseFrom.id,
                    entrepot_to_id: selectedWarehouse.id,
                    note: document.getElementById('notes').value || null,
                    details: [
                        {
                            product_id: selectedProduct.id,
                            quantite: quantity
                        }
                    ]
                };
            } else {
                throw new Error('Type de mouvement non reconnu');
            }

            console.log('Endpoint:', endpoint);
            console.log('Données à envoyer:', formData);
            console.log('Headers:', {
                'Authorization': `Bearer ${accessToken}`,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            });

            const response = await fetch(endpoint, {
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
                
                const successMessage = movementType === 'receipt' 
                    ? '✓ Réception de stock enregistrée avec succès !' 
                    : '✓ Transfert de stock enregistré avec succès !';
                
                showAlert(successMessage, 'success');
                resetForm();
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
        document.getElementById('stockEntryForm').reset();
        clearSelectedProduct();
        clearSelectedSupplier();
        clearSelectedWarehouse();
        clearSelectedWarehouseFrom();
        
        // Masquer toutes les sections conditionnelles
        document.getElementById('supplierSection').style.display = 'none';
        document.getElementById('warehouseFromSection').style.display = 'none';
        
        // Réinitialiser la date
        const now = new Date();
        const dateTimeLocal = now.toISOString().slice(0, 16);
        document.getElementById('receivedDate').value = dateTimeLocal;
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
