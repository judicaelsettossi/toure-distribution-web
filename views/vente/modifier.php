<?php
$title = 'Modifier une Vente';
ob_start();
?>

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

    .form-section {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        border: none;
    }

    .section-title {
        color: var(--primary-color);
        font-weight: 600;
        font-size: 1.1rem;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .form-label {
        font-weight: 600;
        color: #333;
        margin-bottom: 0.5rem;
    }

    .form-control, .form-select {
        border-radius: 8px;
        border: 2px solid #e9ecef;
        padding: 0.75rem 1rem;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(240, 4, 128, 0.25);
    }

    .btn-outline-modern {
        border: 2px solid var(--primary-color);
        color: var(--primary-color);
        background: transparent;
        border-radius: 8px;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-outline-modern:hover {
        background-color: var(--primary-color);
        color: white;
    }

    .loading-spinner {
        display: none;
    }

    .error-message, .success-message {
        display: none;
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 1rem;
    }

    .error-message {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .success-message {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .summary-card {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 12px;
        padding: 1.5rem;
        border: none;
    }

    .summary-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.5rem 0;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .summary-item:last-child {
        border-bottom: none;
        font-weight: 600;
        font-size: 1.1rem;
        color: var(--primary-color);
    }

    .product-item {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 1rem;
        border: 1px solid #e9ecef;
    }

    .product-header {
        display: flex;
        justify-content: between;
        align-items: center;
        margin-bottom: 0.5rem;
    }

    .product-name {
        font-weight: 600;
        color: #333;
    }

    .product-price {
        color: var(--primary-color);
        font-weight: 600;
    }

    .btn-remove-product {
        background: #dc3545;
        color: white;
        border: none;
        border-radius: 6px;
        padding: 0.25rem 0.5rem;
        font-size: 0.8rem;
        cursor: pointer;
    }

    .btn-remove-product:hover {
        background: #c82333;
    }

    .btn-add-product {
        background: var(--primary-color);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-add-product:hover {
        background: #d1036d;
    }

    .btn-add-product:disabled {
        background: #6c757d;
        cursor: not-allowed;
    }
</style>

<main class="main">
    <div class="content px-4 py-4">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-1 font-public-sans text-primary-custom">Modifier une Vente</h1>
                <p class="text-muted mb-0">Modifiez les informations de la vente</p>
            </div>
            <div class="d-flex gap-2">
                <a href="/vente" class="btn btn-outline-modern">
                    <i class="bi-arrow-left me-1"></i> Retour à la liste
                </a>
            </div>
        </div>

        <!-- Loading State -->
        <div class="loading-spinner text-center py-5" id="loadingState">
            <div class="spinner-border text-primary-custom" role="status">
                <span class="visually-hidden">Chargement...</span>
            </div>
            <p class="mt-3 text-muted">Chargement des données de la vente...</p>
        </div>

        <!-- Error State -->
        <div class="error-message" id="errorState">
            <i class="bi-exclamation-triangle me-2"></i>
            <span id="errorMessage">Une erreur est survenue lors du chargement des données.</span>
        </div>

        <!-- Success State -->
        <div class="success-message" id="successState">
            <i class="bi-check-circle me-2"></i>
            <span id="successMessage">Vente modifiée avec succès !</span>
        </div>

        <!-- Form Container -->
        <div id="formContainer" style="display: none;">
            <form id="venteForm">
                <div class="row">
                    <!-- Informations de base -->
                    <div class="col-lg-8">
                        <div class="form-section">
                            <h5 class="section-title">
                                <i class="bi-info-circle"></i>
                                Informations de la Vente
                            </h5>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="numero_vente" class="form-label">Numéro de Vente</label>
                                        <input type="text" class="form-control" id="numero_vente" name="numero_vente" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="date_vente" class="form-label">Date de Vente <span class="text-danger">*</span></label>
                                        <input type="datetime-local" class="form-control" id="date_vente" name="date_vente" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="client_id" class="form-label">Client <span class="text-danger">*</span></label>
                                        <select class="form-select" id="client_id" name="client_id" required>
                                            <option value="">Sélectionner un client</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="entrepot_id" class="form-label">Entrepôt <span class="text-danger">*</span></label>
                                        <select class="form-select" id="entrepot_id" name="entrepot_id" required>
                                            <option value="">Sélectionner un entrepôt</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="montant_total" class="form-label">Montant Total <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="montant_total" name="montant_total" step="0.01" min="0" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="remise" class="form-label">Remise</label>
                                        <input type="number" class="form-control" id="remise" name="remise" step="0.01" min="0" value="0">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Statut</label>
                                        <select class="form-select" id="status" name="status">
                                            <option value="en_attente">En Attente</option>
                                            <option value="validee">Validée</option>
                                            <option value="annulee">Annulée</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="montant_net" class="form-label">Montant Net</label>
                                        <input type="number" class="form-control" id="montant_net" name="montant_net" step="0.01" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="note" class="form-label">Notes</label>
                                <textarea class="form-control" id="note" name="note" rows="3"></textarea>
                            </div>
                        </div>

                        <!-- Produits -->
                        <div class="form-section">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="section-title mb-0">
                                    <i class="bi-box"></i>
                                    Produits Vendus
                                </h5>
                                <button type="button" class="btn btn-add-product" onclick="addProduct()">
                                    <i class="bi-plus-circle me-1"></i> Ajouter un Produit
                                </button>
                            </div>

                            <div id="productsContainer">
                                <!-- Les produits seront ajoutés dynamiquement -->
                            </div>
                        </div>
                    </div>

                    <!-- Résumé -->
                    <div class="col-lg-4">
                        <div class="card summary-card">
                            <h5 class="text-primary-custom mb-3">
                                <i class="bi-receipt me-2"></i>
                                Résumé de la Vente
                            </h5>
                            
                            <div id="venteSummary">
                                <div class="text-center text-muted py-4">
                                    <i class="bi-info-circle me-2"></i>
                                    Les informations apparaîtront ici
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary-custom w-100">
                                    <i class="bi-check-circle me-2"></i>
                                    Modifier la Vente
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
    // Variables globales
    let venteData = null;
    let clientsData = [];
    let entrepotsData = [];
    let produitsData = [];
    let productCounter = 0;

    // Fonction pour récupérer l'ID de la vente depuis l'URL
    function getVenteId() {
        const path = window.location.pathname;
        console.log('🔍 Chemin actuel:', path);
        const matches = path.match(/\/vente\/([^\/]+)\/edit/);
        console.log('🎯 Matches trouvés:', matches);
        return matches ? matches[1] : null;
    }

    // Fonction pour formater le prix
    function formatPrice(price) {
        return new Intl.NumberFormat('fr-FR', {
            style: 'currency',
            currency: 'XOF',
            minimumFractionDigits: 0
        }).format(price);
    }

    // Fonction pour calculer le montant net
    function calculateNetAmount() {
        const montantTotal = parseFloat(document.getElementById('montant_total').value) || 0;
        const remise = parseFloat(document.getElementById('remise').value) || 0;
        const montantNet = montantTotal - remise;
        document.getElementById('montant_net').value = montantNet.toFixed(2);
        updateSummary();
    }

    // Fonction pour mettre à jour le résumé
    function updateSummary() {
        const clientId = document.getElementById('client_id').value;
        const entrepotId = document.getElementById('entrepot_id').value;
        const montantTotal = document.getElementById('montant_total').value;
        const remise = document.getElementById('remise').value;
        const montantNet = document.getElementById('montant_net').value;
        const status = document.getElementById('status').value;

        const client = clientsData.find(c => c.client_id === clientId);
        const entrepot = entrepotsData.find(e => e.entrepot_id === entrepotId);

        const summaryDiv = document.getElementById('venteSummary');
        
        summaryDiv.innerHTML = `
            <div class="summary-item">
                <span>Client:</span>
                <span>${client ? client.name : 'Non sélectionné'}</span>
            </div>
            <div class="summary-item">
                <span>Entrepôt:</span>
                <span>${entrepot ? entrepot.name : 'Non sélectionné'}</span>
            </div>
            <div class="summary-item">
                <span>Statut:</span>
                <span class="badge bg-${getStatusColor(status)}">${getStatusLabel(status)}</span>
            </div>
            <div class="summary-item">
                <span>Montant Total:</span>
                <span>${formatPrice(montantTotal)}</span>
            </div>
            <div class="summary-item">
                <span>Remise:</span>
                <span>${formatPrice(remise)}</span>
            </div>
            <div class="summary-item">
                <span>Montant Net:</span>
                <span>${formatPrice(montantNet)}</span>
            </div>
        `;
    }

    // Fonction pour obtenir la couleur du statut
    function getStatusColor(status) {
        switch(status) {
            case 'validee': return 'success';
            case 'en_attente': return 'warning';
            case 'annulee': return 'danger';
            default: return 'secondary';
        }
    }

    // Fonction pour obtenir le libellé du statut
    function getStatusLabel(status) {
        switch(status) {
            case 'validee': return 'Validée';
            case 'en_attente': return 'En Attente';
            case 'annulee': return 'Annulée';
            default: return status;
        }
    }

    // Fonction pour charger les données de la vente
    async function loadVenteData() {
        const venteId = getVenteId();
        if (!venteId) {
            showError('ID de vente non trouvé');
            return;
        }

        try {
            const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
            
            const response = await fetch(`/api/ventes/${venteId}`, {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                credentials: 'include'
            });

            if (response.ok) {
                const result = await response.json();
                if (result.success && result.data) {
                    venteData = result.data;
                    populateForm();
                } else {
                    showError('Erreur lors du chargement des données de la vente');
                }
            } else {
                showError('Erreur lors du chargement des données de la vente');
            }
        } catch (error) {
            console.error('Erreur lors du chargement de la vente:', error);
            showError('Erreur lors du chargement des données de la vente');
        }
    }

    // Fonction pour peupler le formulaire
    function populateForm() {
        if (!venteData) return;

        // Remplir les champs de base
        document.getElementById('numero_vente').value = venteData.numero_vente || '';
        document.getElementById('date_vente').value = venteData.date_vente ? venteData.date_vente.replace(' ', 'T').substring(0, 16) : '';
        document.getElementById('client_id').value = venteData.client_id || '';
        document.getElementById('entrepot_id').value = venteData.entrepot_id || '';
        document.getElementById('montant_total').value = venteData.montant_total || '';
        document.getElementById('remise').value = venteData.remise || '0';
        document.getElementById('status').value = venteData.status || 'en_attente';
        document.getElementById('note').value = venteData.note || '';

        // Calculer le montant net
        calculateNetAmount();

        // Charger les détails des produits si disponibles
        if (venteData.details && venteData.details.length > 0) {
            loadVenteDetails();
        }
    }

    // Fonction pour charger les détails de la vente
    async function loadVenteDetails() {
        const venteId = getVenteId();
        if (!venteId) return;

        try {
            const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
            
            const response = await fetch(`/api/vente-details/vente/${venteId}`, {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                credentials: 'include'
            });

            if (response.ok) {
                const result = await response.json();
                if (result.success && result.data) {
                    populateProducts(result.data);
                }
            }
        } catch (error) {
            console.error('Erreur lors du chargement des détails:', error);
        }
    }

    // Fonction pour peupler les produits
    function populateProducts(details) {
        const container = document.getElementById('productsContainer');
        container.innerHTML = '';

        details.forEach((detail, index) => {
            addProductToForm(detail, index);
        });
    }

    // Fonction pour ajouter un produit au formulaire
    function addProductToForm(detail = null, index = null) {
        const container = document.getElementById('productsContainer');
        const productId = `product_${productCounter++}`;
        
        const productDiv = document.createElement('div');
        productDiv.className = 'product-item';
        productDiv.id = productId;
        
        productDiv.innerHTML = `
            <div class="product-header">
                <span class="product-name">Produit ${(index !== null ? index + 1 : productCounter)}</span>
                <button type="button" class="btn-remove-product" onclick="removeProduct('${productId}')">
                    <i class="bi-trash"></i>
                </button>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Produit</label>
                        <select class="form-select product-select" name="products[${index !== null ? index : productCounter - 1}][product_id]" required>
                            <option value="">Sélectionner un produit</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label">Quantité</label>
                        <input type="number" class="form-control product-quantity" name="products[${index !== null ? index : productCounter - 1}][quantite]" min="1" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label">Prix Unitaire</label>
                        <input type="number" class="form-control product-price" name="products[${index !== null ? index : productCounter - 1}][prix_unitaire]" step="0.01" min="0" required>
                    </div>
                </div>
            </div>
        `;
        
        container.appendChild(productDiv);
        
        // Peupler le select des produits
        const select = productDiv.querySelector('.product-select');
        produitsData.forEach(produit => {
            const option = document.createElement('option');
            option.value = produit.product_id;
            option.textContent = `${produit.name} - ${formatPrice(produit.prix_vente)}`;
            if (detail && detail.product_id === produit.product_id) {
                option.selected = true;
            }
            select.appendChild(option);
        });
        
        // Remplir les valeurs si c'est un détail existant
        if (detail) {
            productDiv.querySelector('.product-quantity').value = detail.quantite || '';
            productDiv.querySelector('.product-price').value = detail.prix_unitaire || '';
        }
        
        // Ajouter les événements
        addProductEvents(productDiv);
    }

    // Fonction pour ajouter un produit
    function addProduct() {
        addProductToForm();
    }

    // Fonction pour supprimer un produit
    function removeProduct(productId) {
        const productDiv = document.getElementById(productId);
        if (productDiv) {
            productDiv.remove();
            updateSummary();
        }
    }

    // Fonction pour ajouter les événements aux produits
    function addProductEvents(productDiv) {
        const quantityInput = productDiv.querySelector('.product-quantity');
        const priceInput = productDiv.querySelector('.product-price');
        
        quantityInput.addEventListener('input', calculateTotal);
        priceInput.addEventListener('input', calculateTotal);
    }

    // Fonction pour calculer le total
    function calculateTotal() {
        let total = 0;
        const products = document.querySelectorAll('.product-item');
        
        products.forEach(product => {
            const quantity = parseFloat(product.querySelector('.product-quantity').value) || 0;
            const price = parseFloat(product.querySelector('.product-price').value) || 0;
            total += quantity * price;
        });
        
        document.getElementById('montant_total').value = total.toFixed(2);
        calculateNetAmount();
    }

    // Fonction pour charger les clients
    async function loadClients() {
        try {
            const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
            
            const response = await fetch('/api/clients?per_page=100', {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                credentials: 'include'
            });

            if (response.ok) {
                const result = await response.json();
                if (result.success && result.data) {
                    clientsData = result.data.data || [];
                    populateClientsSelect();
                }
            }
        } catch (error) {
            console.error('Erreur lors du chargement des clients:', error);
        }
    }

    // Fonction pour peupler le select des clients
    function populateClientsSelect() {
        const select = document.getElementById('client_id');
        select.innerHTML = '<option value="">Sélectionner un client</option>';
        
        clientsData.forEach(client => {
            const option = document.createElement('option');
            option.value = client.client_id;
            option.textContent = `${client.name} - ${client.email}`;
            select.appendChild(option);
        });
    }

    // Fonction pour charger les entrepôts
    async function loadEntrepots() {
        try {
            const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
            
            const response = await fetch('/api/entrepots?per_page=100', {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                credentials: 'include'
            });

            if (response.ok) {
                const result = await response.json();
                if (result.data) {
                    entrepotsData = result.data || [];
                    populateEntrepotsSelect();
                }
            }
        } catch (error) {
            console.error('Erreur lors du chargement des entrepôts:', error);
        }
    }

    // Fonction pour peupler le select des entrepôts
    function populateEntrepotsSelect() {
        const select = document.getElementById('entrepot_id');
        select.innerHTML = '<option value="">Sélectionner un entrepôt</option>';
        
        entrepotsData.forEach(entrepot => {
            const option = document.createElement('option');
            option.value = entrepot.entrepot_id;
            option.textContent = `${entrepot.name} - ${entrepot.code}`;
            select.appendChild(option);
        });
    }

    // Fonction pour charger les produits
    async function loadProduits() {
        try {
            const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
            
            const response = await fetch('/api/produits?per_page=100', {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                credentials: 'include'
            });

            if (response.ok) {
                const result = await response.json();
                if (result.success && result.data) {
                    produitsData = result.data.data || [];
                }
            }
        } catch (error) {
            console.error('Erreur lors du chargement des produits:', error);
        }
    }

    // Fonction pour gérer la soumission du formulaire
    function handleSubmit(event) {
        event.preventDefault();
        
        const formData = new FormData(event.target);
        const data = {
            client_id: formData.get('client_id'),
            entrepot_id: formData.get('entrepot_id'),
            date_vente: formData.get('date_vente'),
            montant_total: parseFloat(formData.get('montant_total')),
            remise: parseFloat(formData.get('remise')) || 0,
            status: formData.get('status'),
            note: formData.get('note'),
            details: []
        };

        // Collecter les produits
        const products = document.querySelectorAll('.product-item');
        products.forEach(product => {
            const productId = product.querySelector('.product-select').value;
            const quantity = parseInt(product.querySelector('.product-quantity').value);
            const price = parseFloat(product.querySelector('.product-price').value);
            
            if (productId && quantity && price) {
                data.details.push({
                    product_id: productId,
                    quantite: quantity,
                    prix_unitaire: price
                });
            }
        });

        if (data.details.length === 0) {
            showError('Veuillez ajouter au moins un produit');
            return;
        }

        updateVente(data);
    }

    // Fonction pour mettre à jour la vente
    async function updateVente(data) {
        const venteId = getVenteId();
        if (!venteId) return;

        try {
            const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
            
            const response = await fetch(`/api/ventes/${venteId}`, {
                method: 'PUT',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                credentials: 'include',
                body: JSON.stringify(data)
            });

            if (response.ok) {
                const result = await response.json();
                if (result.success) {
                    showSuccess('Vente modifiée avec succès !');
                    setTimeout(() => {
                        window.location.href = `/vente/${venteId}`;
                    }, 2000);
                } else {
                    showError(result.message || 'Erreur lors de la modification de la vente');
                }
            } else {
                const errorData = await response.json();
                showError(errorData.message || 'Erreur lors de la modification de la vente');
            }
        } catch (error) {
            console.error('Erreur lors de la modification:', error);
            showError('Erreur lors de la modification de la vente');
        }
    }

    // Fonctions utilitaires
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }

    function showError(message) {
        document.getElementById('errorMessage').textContent = message;
        document.getElementById('errorState').style.display = 'block';
        document.getElementById('successState').style.display = 'none';
    }

    function showSuccess(message) {
        document.getElementById('successMessage').textContent = message;
        document.getElementById('successState').style.display = 'block';
        document.getElementById('errorState').style.display = 'none';
    }

    function hideMessages() {
        document.getElementById('errorState').style.display = 'none';
        document.getElementById('successState').style.display = 'none';
    }

    // Initialisation
    document.addEventListener('DOMContentLoaded', async function() {
        console.log('🚀 Initialisation de la page de modification de vente');
        
        // Vérifier l'ID de vente
        const venteId = getVenteId();
        console.log('📋 ID de vente:', venteId);
        
        if (!venteId) {
            showError('ID de vente non trouvé dans l\'URL');
            return;
        }

        try {
            // Charger les données de base
            console.log('📦 Chargement des données de base...');
            await Promise.all([
                loadClients(),
                loadEntrepots(),
                loadProduits()
            ]);

            // Charger les données de la vente
            console.log('💰 Chargement des données de la vente...');
            await loadVenteData();

            // Afficher le formulaire
            console.log('✅ Affichage du formulaire');
            document.getElementById('loadingState').style.display = 'none';
            document.getElementById('formContainer').style.display = 'block';

            // Ajouter les événements
            document.getElementById('montant_total').addEventListener('input', calculateNetAmount);
            document.getElementById('remise').addEventListener('input', calculateNetAmount);
            document.getElementById('client_id').addEventListener('change', updateSummary);
            document.getElementById('entrepot_id').addEventListener('change', updateSummary);
            document.getElementById('status').addEventListener('change', updateSummary);
            document.getElementById('venteForm').addEventListener('submit', handleSubmit);
            
            console.log('🎉 Page de modification initialisée avec succès');
        } catch (error) {
            console.error('❌ Erreur lors de l\'initialisation:', error);
            showError('Erreur lors de l\'initialisation de la page');
        }
    });
</script>

<?php $content = ob_get_clean(); ?>
<?php require './views/layouts/app-layout.php'; ?>
