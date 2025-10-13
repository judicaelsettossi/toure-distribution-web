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

    .product-image {
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

    .product-details-info small {
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

    .remove-product:hover {
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
                <div class="col-md-6">
                    <div class="form-group-modern">
                        <label class="form-label-modern">Date de réception</label>
                        <input type="datetime-local" id="receivedDate" class="form-control-modern">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group-modern">
                        <label class="form-label-modern">Fournisseur</label>
                        <input type="text" id="supplier" class="form-control-modern" placeholder="Nom du fournisseur">
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
            <button type="submit" class="btn-modern btn-success-modern">
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
    let products = [];
    let searchTimeout = null;

    document.addEventListener('DOMContentLoaded', function() {
        // Définir la date actuelle
        const now = new Date();
        const dateTimeLocal = now.toISOString().slice(0, 16);
        document.getElementById('receivedDate').value = dateTimeLocal;

        // Event listeners
        setupEventListeners();
    });

    function setupEventListeners() {
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

        // Fermer les résultats de recherche en cliquant ailleurs
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.product-search-container')) {
                hideSearchResults();
            }
        });

        // Soumission du formulaire
        document.getElementById('stockEntryForm').addEventListener('submit', handleSubmit);
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
                products = result.data || [];
                displaySearchResults(products);
            }
        } catch (error) {
            console.error('Erreur lors de la recherche:', error);
            hideSearchResults();
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
                        Stock: ${product.current_stock || 0} | 
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

    function selectProduct(productId) {
        selectedProduct = products.find(p => p.id === productId);
        
        if (selectedProduct) {
            // Afficher le produit sélectionné
            document.getElementById('selectedProduct').classList.add('show');
            document.getElementById('selectedProductName').textContent = selectedProduct.name || 'Produit sans nom';
            document.getElementById('selectedProductCode').textContent = `Code: ${selectedProduct.code || 'N/A'}`;
            document.getElementById('selectedProductStock').textContent = `Stock actuel: ${selectedProduct.current_stock || 0}`;
            
            if (selectedProduct.picture) {
                document.getElementById('selectedProductImage').src = `https://toure.gestiem.com/storage/${selectedProduct.picture}`;
            }
            
            // Vider le champ de recherche
            document.getElementById('productSearch').value = '';
            hideSearchResults();
            
            // Focus sur la quantité
            document.getElementById('quantity').focus();
        }
    }

    function clearSelectedProduct() {
        selectedProduct = null;
        document.getElementById('selectedProduct').classList.remove('show');
        document.getElementById('productSearch').value = '';
    }

    async function handleSubmit(e) {
        e.preventDefault();

        if (!selectedProduct) {
            showAlert('Veuillez sélectionner un produit', 'danger');
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
            
            const formData = {
                product_id: selectedProduct.id,
                type: 'in',
                quantity: quantity,
                unit_price: parseFloat(document.getElementById('unitPrice').value) || null,
                received_date: document.getElementById('receivedDate').value,
                supplier: document.getElementById('supplier').value,
                reason: document.getElementById('reason').value,
                notes: document.getElementById('notes').value
            };

            const response = await fetch('https://toure.gestiem.com/api/stock/movements', {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(formData)
            });

            const result = await response.json();

            if (response.ok) {
                showAlert('✓ Entrée de stock enregistrée avec succès !', 'success');
                resetForm();
            } else {
                throw new Error(result.message || 'Erreur lors de l\'enregistrement');
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
