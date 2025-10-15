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

    .text-primary-custom { color: var(--primary-color) !important; }
    .text-secondary-custom { color: var(--secondary-color) !important; }
    .bg-primary-custom { background-color: var(--primary-color) !important; }
    .bg-light-primary { background-color: var(--light-primary) !important; }

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
    }

    .btn-outline-modern {
        background-color: transparent;
        color: var(--primary-color);
        border: 2px solid var(--primary-color);
    }

    .btn-outline-modern:hover {
        background-color: var(--primary-color);
        color: white;
    }

    .btn-success-modern {
        background-color: #28a745;
        color: white;
        border: 2px solid #28a745;
    }

    .btn-success-modern:hover {
        background-color: #218838;
        border-color: #1e7e34;
        color: white;
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

    .product-item {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 1rem;
        border: 2px solid #e9ecef;
        transition: all 0.3s ease;
    }

    .product-item:hover {
        border-color: var(--primary-color);
        background: var(--light-primary);
    }

    .product-item.selected {
        border-color: var(--primary-color);
        background: var(--light-primary);
    }

    .product-checkbox {
        width: 1.25rem;
        height: 1.25rem;
        margin-right: 0.75rem;
    }

    .product-info {
        flex: 1;
    }

    .product-name {
        font-weight: 600;
        color: var(--secondary-color);
        margin-bottom: 0.25rem;
    }

    .product-details {
        font-size: 0.875rem;
        color: #6c757d;
        margin-bottom: 0.5rem;
    }

    .product-price {
        font-weight: 600;
        color: var(--primary-color);
    }

    .quantity-input {
        width: 80px;
        text-align: center;
    }

    .price-input {
        width: 120px;
        text-align: right;
    }

    .summary-card {
        background: linear-gradient(135deg, var(--light-primary) 0%, #f8f9fa 100%);
        border-radius: 12px;
        padding: 1.5rem;
        position: sticky;
        top: 2rem;
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
        font-weight: 700;
        font-size: 1.1rem;
        color: var(--secondary-color);
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

    .client-search-container {
        position: relative;
    }

    .client-dropdown {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: white;
        border: 2px solid #e9ecef;
        border-top: none;
        border-radius: 0 0 8px 8px;
        max-height: 200px;
        overflow-y: auto;
        z-index: 1000;
        display: none;
    }

    .client-dropdown-item {
        padding: 0.75rem 1rem;
        cursor: pointer;
        border-bottom: 1px solid #f8f9fa;
        transition: background-color 0.3s ease;
    }

    .client-dropdown-item:hover {
        background-color: var(--light-primary);
    }

    .client-dropdown-item:last-child {
        border-bottom: none;
    }

    .invalid-feedback {
        display: block;
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.25rem;
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

        .summary-card {
            position: static;
            margin-top: 2rem;
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
                            <li class="breadcrumb-item"><a class="breadcrumb-link text-primary-custom" href="/factures">Factures</a></li>
                            <li class="breadcrumb-item active">Nouvelle Facture</li>
                        </ol>
                    </nav>
                    <h2 class="mb-0 text-secondary-custom">Créer une Nouvelle Facture</h2>
                </div>
                <div class="col-sm-auto">
                    <button class="btn btn-outline-modern me-2" onclick="window.location.href='/factures'">
                        <i class="bi-arrow-left me-1"></i> Annuler
                    </button>
                    <button class="btn btn-success-modern" onclick="saveDraft()">
                        <i class="bi-save me-1"></i> Sauvegarder le brouillon
                    </button>
                </div>
            </div>
        </div>

        <!-- Alert Container -->
        <div id="alertContainer"></div>

        <form id="factureForm">
            <div class="row">
                <div class="col-lg-8">
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
                                        <label class="form-label-modern">
                                            Client <span class="label-required"></span>
                                        </label>
                                        <div class="client-search-container">
                                            <input type="text" id="clientSearch" class="form-control form-control-modern" 
                                                   placeholder="Rechercher un client..." required>
                                            <input type="hidden" id="clientId" name="client_id">
                                            <div id="clientDropdown" class="client-dropdown"></div>
                                        </div>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern">Référence</label>
                                        <input type="text" id="reference" name="reference" class="form-control form-control-modern" 
                                               placeholder="Ex: REF-2025-001">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern">Date de facturation</label>
                                        <input type="date" id="factureDate" name="facture_date" class="form-control form-control-modern" 
                                               value="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern">Date d'échéance</label>
                                        <input type="date" id="dueDate" name="due_date" class="form-control form-control-modern" 
                                               value="<?php echo date('Y-m-d', strtotime('+30 days')); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern">Taux de taxe (%)</label>
                                        <input type="number" id="taxeRate" name="taxe_rate" class="form-control form-control-modern" 
                                               value="18" min="0" max="100" step="0.1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern">Coût de transport (FCFA)</label>
                                        <input type="number" id="transportCost" name="transport_cost" class="form-control form-control-modern" 
                                               value="0" min="0" step="100">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern">Réduction globale (FCFA)</label>
                                        <input type="number" id="discountAmount" name="discount_amount" class="form-control form-control-modern" 
                                               value="0" min="0" step="100">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern">Adresse de livraison</label>
                                        <input type="text" id="deliveryAdresse" name="delivery_adresse" class="form-control form-control-modern" 
                                               placeholder="Adresse de livraison">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern">Note</label>
                                        <textarea id="note" name="note" class="form-control form-control-modern" rows="3" 
                                                  placeholder="Notes ou commentaires..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Produits -->
                    <div class="form-section">
                        <div class="section-header">
                            <h5 class="section-title">
                                <i class="bi-box-seam text-primary-custom"></i>
                                Produits
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-8">
                                    <input type="text" id="productSearch" class="form-control form-control-modern" 
                                           placeholder="Rechercher un produit...">
                                </div>
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-outline-modern w-100" onclick="loadProducts()">
                                        <i class="bi-arrow-clockwise me-1"></i> Actualiser
                                    </button>
                                </div>
                            </div>

                            <div id="productsContainer">
                                <div class="text-center py-4">
                                    <div class="spinner-border text-primary-custom" role="status">
                                        <span class="visually-hidden">Chargement...</span>
                                    </div>
                                    <p class="mt-3 text-muted">Chargement des produits...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Résumé -->
                    <div class="summary-card">
                        <h5 class="mb-3">
                            <i class="bi-calculator text-primary-custom"></i>
                            Résumé de la Facture
                        </h5>
                        
                        <div class="summary-item">
                            <span>Sous-total:</span>
                            <span id="subtotalAmount">0 FCFA</span>
                        </div>
                        <div class="summary-item">
                            <span>Transport:</span>
                            <span id="transportAmount">0 FCFA</span>
                        </div>
                        <div class="summary-item">
                            <span>Réduction:</span>
                            <span id="discountSummaryAmount">0 FCFA</span>
                        </div>
                        <div class="summary-item">
                            <span>Taxe (<span id="taxeRateDisplay">18</span>%):</span>
                            <span id="taxeAmount">0 FCFA</span>
                        </div>
                        <hr>
                        <div class="summary-item">
                            <span>Total:</span>
                            <span id="totalAmount">0 FCFA</span>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary-custom w-100 mb-2">
                                <i class="bi-check-circle me-1"></i> Créer la Facture
                            </button>
                            <button type="button" class="btn btn-outline-modern w-100" onclick="previewFacture()">
                                <i class="bi-eye me-1"></i> Aperçu
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>

<script>
    let allProducts = [];
    let selectedProducts = [];
    let allClients = [];

    document.addEventListener('DOMContentLoaded', function() {
        loadProducts();
        loadClients();
        setupEventListeners();
        updateSummary();
    });

    function setupEventListeners() {
        document.getElementById('factureForm').addEventListener('submit', handleSubmit);
        
        // Client search
        document.getElementById('clientSearch').addEventListener('input', debounceClientSearch);
        
        // Product search
        document.getElementById('productSearch').addEventListener('input', debounceProductSearch);
        
        // Summary updates
        document.getElementById('taxeRate').addEventListener('input', updateSummary);
        document.getElementById('transportCost').addEventListener('input', updateSummary);
        document.getElementById('discountAmount').addEventListener('input', updateSummary);
    }

    function debounceClientSearch() {
        clearTimeout(this.searchTimeout);
        this.searchTimeout = setTimeout(() => {
            searchClients();
        }, 300);
    }

    function debounceProductSearch() {
        clearTimeout(this.searchTimeout);
        this.searchTimeout = setTimeout(() => {
            displayProducts();
        }, 300);
    }

    async function loadProducts() {
        try {
            const response = await fetch('https://toure.gestiem.com/api/products?per_page=1000', {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            if (response.ok) {
                const result = await response.json();
                allProducts = result.data || [];
                displayProducts();
            }
        } catch (error) {
            console.error('Erreur lors du chargement des produits:', error);
        }
    }

    async function loadClients() {
        try {
            const response = await fetch('https://toure.gestiem.com/api/clients?per_page=1000', {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            if (response.ok) {
                const result = await response.json();
                allClients = result.data || [];
            }
        } catch (error) {
            console.error('Erreur lors du chargement des clients:', error);
        }
    }

    function displayProducts() {
        const search = document.getElementById('productSearch').value.toLowerCase();
        const filteredProducts = allProducts.filter(product => 
            product.name.toLowerCase().includes(search) ||
            product.code.toLowerCase().includes(search)
        );

        const container = document.getElementById('productsContainer');
        
        if (filteredProducts.length === 0) {
            container.innerHTML = `
                <div class="text-center py-4">
                    <i class="bi-search fs-1 text-muted"></i>
                    <p class="mt-3 text-muted">Aucun produit trouvé</p>
                </div>
            `;
            return;
        }

        container.innerHTML = filteredProducts.map(product => `
            <div class="product-item" data-product-id="${product.product_id}">
                <div class="d-flex align-items-center">
                    <input type="checkbox" class="product-checkbox" 
                           onchange="toggleProduct('${product.product_id}', this.checked)">
                    <div class="product-info">
                        <div class="product-name">${product.name}</div>
                        <div class="product-details">
                            Code: ${product.code} | Stock: ${product.stock_quantity || 0}
                        </div>
                        <div class="product-price">
                            Prix: ${formatCurrency(product.unit_price)}
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <label class="form-label-modern mb-0">Qté:</label>
                        <input type="number" class="form-control quantity-input" 
                               id="qty_${product.product_id}" value="1" min="1" 
                               onchange="updateProductQuantity('${product.product_id}')">
                        <label class="form-label-modern mb-0">Prix:</label>
                        <input type="number" class="form-control price-input" 
                               id="price_${product.product_id}" value="${product.unit_price}" 
                               onchange="updateProductPrice('${product.product_id}')">
                    </div>
                </div>
            </div>
        `).join('');
    }

    function toggleProduct(productId, isSelected) {
        const product = allProducts.find(p => p.product_id === productId);
        if (!product) return;

        if (isSelected) {
            const quantity = parseInt(document.getElementById(`qty_${productId}`).value) || 1;
            const price = parseFloat(document.getElementById(`price_${productId}`).value) || product.unit_price;
            
            selectedProducts.push({
                ...product,
                quantity: quantity,
                price: price,
                total: quantity * price
            });
            
            document.querySelector(`[data-product-id="${productId}"]`).classList.add('selected');
        } else {
            selectedProducts = selectedProducts.filter(p => p.product_id !== productId);
            document.querySelector(`[data-product-id="${productId}"]`).classList.remove('selected');
        }
        
        updateSummary();
    }

    function updateProductQuantity(productId) {
        const product = selectedProducts.find(p => p.product_id === productId);
        if (product) {
            const quantity = parseInt(document.getElementById(`qty_${productId}`).value) || 1;
            product.quantity = quantity;
            product.total = quantity * product.price;
            updateSummary();
        }
    }

    function updateProductPrice(productId) {
        const product = selectedProducts.find(p => p.product_id === productId);
        if (product) {
            const price = parseFloat(document.getElementById(`price_${productId}`).value) || 0;
            product.price = price;
            product.total = product.quantity * price;
            updateSummary();
        }
    }

    function searchClients() {
        const search = document.getElementById('clientSearch').value.toLowerCase();
        const filteredClients = allClients.filter(client => 
            client.name_client.toLowerCase().includes(search) ||
            client.email.toLowerCase().includes(search)
        );

        const dropdown = document.getElementById('clientDropdown');
        
        if (search.length < 2) {
            dropdown.style.display = 'none';
            return;
        }

        if (filteredClients.length === 0) {
            dropdown.innerHTML = '<div class="client-dropdown-item text-muted">Aucun client trouvé</div>';
        } else {
            dropdown.innerHTML = filteredClients.map(client => `
                <div class="client-dropdown-item" onclick="selectClient('${client.client_id}', '${client.name_client}')">
                    <div class="fw-bold">${client.name_client}</div>
                    <small class="text-muted">${client.email || ''}</small>
                </div>
            `).join('');
        }
        
        dropdown.style.display = 'block';
    }

    function selectClient(clientId, clientName) {
        document.getElementById('clientId').value = clientId;
        document.getElementById('clientSearch').value = clientName;
        document.getElementById('clientDropdown').style.display = 'none';
        
        // Clear validation
        document.getElementById('clientSearch').classList.remove('is-invalid');
    }

    function updateSummary() {
        const subtotal = selectedProducts.reduce((sum, product) => sum + product.total, 0);
        const transport = parseFloat(document.getElementById('transportCost').value) || 0;
        const discount = parseFloat(document.getElementById('discountAmount').value) || 0;
        const taxeRate = parseFloat(document.getElementById('taxeRate').value) || 0;
        
        const taxableAmount = subtotal + transport - discount;
        const taxe = (taxableAmount * taxeRate) / 100;
        const total = taxableAmount + taxe;

        document.getElementById('subtotalAmount').textContent = formatCurrency(subtotal);
        document.getElementById('transportAmount').textContent = formatCurrency(transport);
        document.getElementById('discountSummaryAmount').textContent = formatCurrency(discount);
        document.getElementById('taxeRateDisplay').textContent = taxeRate;
        document.getElementById('taxeAmount').textContent = formatCurrency(taxe);
        document.getElementById('totalAmount').textContent = formatCurrency(total);
    }

    async function handleSubmit(e) {
        e.preventDefault();
        
        if (!validateForm()) {
            return;
        }

        const submitBtn = e.target.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<span class="loading-spinner me-2"></span>Création...';
        submitBtn.disabled = true;

        try {
            const formData = new FormData(e.target);
            
            const data = {
                client_id: document.getElementById('clientId').value,
                reference: formData.get('reference'),
                facture_date: formData.get('facture_date'),
                due_date: formData.get('due_date'),
                taxe_rate: parseFloat(formData.get('taxe_rate')) || 0,
                transport_cost: parseFloat(formData.get('transport_cost')) || 0,
                discount_amount: parseFloat(formData.get('discount_amount')) || 0,
                delivery_adresse: formData.get('delivery_adresse'),
                note: formData.get('note'),
                user_id: '<?php echo $_COOKIE['user_id']; ?>',
                details: selectedProducts.map(product => ({
                    product_id: product.product_id,
                    quantite: product.quantity,
                    prix_unitaire: product.price
                }))
            };

            const response = await fetch('https://toure.gestiem.com/api/factures', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(data)
            });

            const result = await response.json();

            if (response.ok) {
                showAlert('Facture créée avec succès !', 'success');
                setTimeout(() => {
                    window.location.href = `/facture/${result.data.facture_id}/details`;
                }, 2000);
            } else {
                if (response.status === 422) {
                    displayValidationErrors(result.errors);
                }
                throw new Error(result.message || 'Erreur lors de la création de la facture');
            }
        } catch (error) {
            console.error('Erreur:', error);
            showAlert('Erreur lors de la création: ' + error.message, 'danger');
        } finally {
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }
    }

    function validateForm() {
        let isValid = true;

        // Validate client
        if (!document.getElementById('clientId').value) {
            document.getElementById('clientSearch').classList.add('is-invalid');
            isValid = false;
        } else {
            document.getElementById('clientSearch').classList.remove('is-invalid');
        }

        // Validate products
        if (selectedProducts.length === 0) {
            showAlert('Veuillez sélectionner au moins un produit', 'danger');
            isValid = false;
        }

        return isValid;
    }

    function displayValidationErrors(errors) {
        Object.keys(errors).forEach(field => {
            const input = document.getElementById(field);
            if (input) {
                input.classList.add('is-invalid');
                const feedback = input.parentNode.querySelector('.invalid-feedback');
                if (feedback) {
                    feedback.textContent = errors[field][0];
                }
            }
        });
    }

    function formatCurrency(amount) {
        return new Intl.NumberFormat('fr-FR', {
            style: 'currency',
            currency: 'XOF',
            minimumFractionDigits: 0
        }).format(amount).replace('XOF', 'FCFA');
    }

    function saveDraft() {
        // TODO: Implémenter la sauvegarde de brouillon
        showAlert('Fonctionnalité de brouillon à venir', 'info');
    }

    function previewFacture() {
        // TODO: Implémenter l'aperçu de la facture
        showAlert('Fonctionnalité d\'aperçu à venir', 'info');
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

    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.client-search-container')) {
            document.getElementById('clientDropdown').style.display = 'none';
        }
    });
</script>

<?php
$content = ob_get_clean();
require('./views/layouts/app-layout.php');
?>
