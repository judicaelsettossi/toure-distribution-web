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

    .form-section {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        border-left: 4px solid var(--primary-color);
    }

    .form-section h5 {
        color: var(--secondary-color);
        margin-bottom: 1rem;
        font-weight: 600;
    }

    .form-label {
        font-weight: 600;
        color: var(--secondary-color);
        margin-bottom: 0.5rem;
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(240, 4, 128, 0.25);
    }

    .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(240, 4, 128, 0.25);
    }

    .btn-outline-modern {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        border: 2px solid var(--primary-color);
        background: white;
        color: var(--primary-color);
        border-radius: 8px;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-outline-modern:hover {
        background-color: var(--primary-color);
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 3px 10px rgba(240, 4, 128, 0.3);
    }

    .btn-secondary-modern {
        background-color: #6c757d;
        border-color: #6c757d;
        color: white;
        border-radius: 8px;
        font-weight: 500;
        padding: 0.5rem 1rem;
    }

    .btn-secondary-modern:hover {
        background-color: #5a6268;
        border-color: #5a6268;
        color: white;
    }

    .loading-spinner {
        display: none;
    }

    .error-message {
        display: none;
    }

    .success-message {
        display: none;
    }

    .alert-custom {
        border-radius: 8px;
        border: none;
        font-weight: 500;
    }

    .alert-success-custom {
        background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
        color: #155724;
        border-left: 4px solid #28a745;
    }

    .alert-danger-custom {
        background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
        color: #721c24;
        border-left: 4px solid #dc3545;
    }

    .alert-warning-custom {
        background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
        color: #856404;
        border-left: 4px solid #ffc107;
    }

    .alert-info-custom {
        background: linear-gradient(135deg, #d1ecf1 0%, #bee5eb 100%);
        color: #0c5460;
        border-left: 4px solid #17a2b8;
    }
</style>

<main class="main">
    <div class="content px-4 py-4">
        <div class="page-header mb-4">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="page-title text-primary-custom font-public-sans">
                        <i class="bi-cart-plus me-2"></i>
                        Nouvelle Commande
                    </h1>
                    <p class="page-description text-muted">Créer une nouvelle commande d'achat auprès d'un fournisseur</p>
                </div>
                <div class="col-sm-auto">
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-modern" onclick="window.history.back()">
                            <i class="bi-arrow-left me-1"></i> Retour
                        </button>
                        <button class="btn btn-outline-modern" onclick="window.location.href='/commandes'">
                            <i class="bi-list me-1"></i> Liste des Commandes
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Loading State -->
        <div class="loading-spinner text-center py-5" id="loadingState">
            <div class="spinner-border text-primary-custom" role="status">
                <span class="visually-hidden">Chargement...</span>
            </div>
            <p class="mt-3 text-muted">Chargement des données...</p>
        </div>

        <!-- Error State -->
        <div class="error-message alert alert-danger-custom alert-custom" id="errorState">
            <i class="bi-exclamation-triangle me-2"></i>
            <span id="errorMessage">Une erreur est survenue lors du chargement des données.</span>
        </div>

        <!-- Success State -->
        <div class="success-message alert alert-success-custom alert-custom" id="successState">
            <i class="bi-check-circle me-2"></i>
            <span id="successMessage">Commande créée avec succès !</span>
        </div>

        <!-- Form Container -->
        <div class="card card-custom" id="formContainer">
            <div class="card-body p-4 mx-2">
                <form id="createCommandeForm">
                    <!-- Informations de base -->
                    <div class="form-section">
                        <h5><i class="bi-info-circle me-2"></i>Informations de base</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="fournisseur_id" class="form-label">Fournisseur <span class="text-danger">*</span></label>
                                <select class="form-select" id="fournisseur_id" name="fournisseur_id" required>
                                    <option value="">Sélectionner un fournisseur</option>
                                </select>
                                <div class="invalid-feedback" id="fournisseur_id_error"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="date_achat" class="form-label">Date d'achat <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="date_achat" name="date_achat" required>
                                <div class="invalid-feedback" id="date_achat_error"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="date_livraison_prevue" class="form-label">Date de livraison prévue <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="date_livraison_prevue" name="date_livraison_prevue" required>
                                <div class="invalid-feedback" id="date_livraison_prevue_error"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="date_livraison_effective" class="form-label">Date de livraison effective</label>
                                <input type="date" class="form-control" id="date_livraison_effective" name="date_livraison_effective">
                                <div class="invalid-feedback" id="date_livraison_effective_error"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Éléments de la commande -->
                    <div class="form-section">
                        <h5><i class="bi-box me-2"></i>Éléments de la commande</h5>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="product_id" class="form-label">Produit</label>
                                <select class="form-select" id="product_id">
                                    <option value="">Sélectionner un produit</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="quantite" class="form-label">Quantité</label>
                                <input type="number" class="form-control" id="quantite" min="1" value="1">
                            </div>
                            <div class="col-md-3">
                                <label for="prix_unitaire" class="form-label">Prix unitaire</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="prix_unitaire" step="0.01" min="0">
                                    <span class="input-group-text">FCFA</span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">&nbsp;</label>
                                <div class="d-grid">
                                    <button type="button" class="btn btn-primary-custom" onclick="addProduct()">
                                        <i class="bi-plus-circle"></i> Ajouter
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Liste des produits ajoutés -->
                        <div class="table-responsive" id="productsTableContainer" style="display: none;">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Produit</th>
                                        <th>Quantité</th>
                                        <th>Prix unitaire</th>
                                        <th>Sous-total</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="productsTableBody">
                                    <!-- Les produits seront ajoutés ici -->
                                </tbody>
                                <tfoot>
                                    <tr class="fw-bold">
                                        <td colspan="3">Total</td>
                                        <td id="totalAmount">0 FCFA</td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <!-- Statut -->
                    <div class="form-section">
                        <h5><i class="bi-flag me-2"></i>Statut de la commande</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">Statut</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="en_attente">En Attente</option>
                                    <option value="validee">Validée</option>
                                    <option value="en_cours">En Cours</option>
                                    <option value="livree">Livrée</option>
                                    <option value="partiellement_livree">Partiellement Livrée</option>
                                    <option value="annulee">Annulée</option>
                                </select>
                                <div class="invalid-feedback" id="status_error"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Notes -->
                    <div class="form-section">
                        <h5><i class="bi-sticky me-2"></i>Notes et observations</h5>
                        <div class="mb-3">
                            <label for="note" class="form-label">Notes</label>
                            <textarea class="form-control" id="note" name="note" rows="4" placeholder="Ajoutez des notes ou observations sur cette commande..."></textarea>
                            <div class="invalid-feedback" id="note_error"></div>
                        </div>
                    </div>

                    <!-- Champ caché pour le montant total -->
                    <input type="hidden" id="montant" name="montant" value="0">

                    <!-- Actions -->
                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <button type="button" class="btn btn-secondary-modern" onclick="window.history.back()">
                            <i class="bi-x-circle me-1"></i> Annuler
                        </button>
                        <button type="submit" class="btn btn-primary-custom" id="submitBtn">
                            <i class="bi-check-circle me-1"></i> Créer la Commande
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
    // Variables globales
    let fournisseurs = [];
    let produits = [];
    let commandeItems = [];

    // Fonction pour récupérer un cookie
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
    }

    // Fonction pour afficher le loading
    function showLoading() {
        document.getElementById('loadingState').style.display = 'block';
        document.getElementById('formContainer').style.display = 'none';
        document.getElementById('errorState').style.display = 'none';
        document.getElementById('successState').style.display = 'none';
    }

    // Fonction pour masquer le loading
    function hideLoading() {
        document.getElementById('loadingState').style.display = 'none';
        document.getElementById('formContainer').style.display = 'block';
    }

    // Fonction pour afficher une erreur
    function showError(message) {
        document.getElementById('errorState').style.display = 'block';
        document.getElementById('errorMessage').textContent = message;
        document.getElementById('successState').style.display = 'none';
    }

    // Fonction pour afficher un succès
    function showSuccess(message) {
        document.getElementById('successState').style.display = 'block';
        document.getElementById('successMessage').textContent = message;
        document.getElementById('errorState').style.display = 'none';
    }

    // Fonction pour charger les fournisseurs
    async function loadFournisseurs() {
        try {
            const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
            
            if (!accessToken) {
                showError('Token d\'authentification manquant');
                return;
            }

            const response = await fetch('/api/fournisseur', {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                credentials: 'include'
            });

            if (!response.ok) {
                throw new Error(`Erreur HTTP: ${response.status}`);
            }

            const data = await response.json();
            
            // L'API externe retourne directement un tableau de fournisseurs
            if (data.data && Array.isArray(data.data)) {
                fournisseurs = data.data;
                populateFournisseurSelect();
            } else {
                throw new Error(data.message || 'Erreur lors du chargement des fournisseurs');
            }

        } catch (error) {
            console.error('Erreur lors du chargement des fournisseurs:', error);
            showError('Erreur lors du chargement des fournisseurs: ' + error.message);
        }
    }

    // Fonction pour charger les produits
    async function loadProduits() {
        try {
            const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
            
            if (!accessToken) {
                showError('Token d\'authentification manquant');
                return;
            }

            const response = await fetch('/api/produits', {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                credentials: 'include'
            });

            if (!response.ok) {
                throw new Error(`Erreur HTTP: ${response.status}`);
            }

            const data = await response.json();
            
            // L'API externe retourne directement un tableau de produits
            if (data.data && Array.isArray(data.data)) {
                produits = data.data;
                populateProductSelect();
            } else {
                throw new Error(data.message || 'Erreur lors du chargement des produits');
            }

        } catch (error) {
            console.error('Erreur lors du chargement des produits:', error);
            showError('Erreur lors du chargement des produits: ' + error.message);
        }
    }

    // Fonction pour peupler le select des fournisseurs
    function populateFournisseurSelect() {
        const select = document.getElementById('fournisseur_id');
        select.innerHTML = '<option value="">Sélectionner un fournisseur</option>';
        
        fournisseurs.forEach(fournisseur => {
            const option = document.createElement('option');
            option.value = fournisseur.fournisseur_id;
            option.textContent = `${fournisseur.name} (${fournisseur.code})`;
            select.appendChild(option);
        });
    }

    // Fonction pour peupler le select des produits
    function populateProductSelect() {
        const select = document.getElementById('product_id');
        select.innerHTML = '<option value="">Sélectionner un produit</option>';
        
        produits.forEach(produit => {
            const option = document.createElement('option');
            option.value = produit.product_id;
            option.textContent = `${produit.name} (${produit.code})`;
            option.setAttribute('data-price', produit.unit_price || 0);
            select.appendChild(option);
        });
    }

    // Fonction pour mettre à jour le prix unitaire quand un produit est sélectionné
    function updatePrixUnitaire() {
        const productSelect = document.getElementById('product_id');
        const prixUnitaireInput = document.getElementById('prix_unitaire');
        
        if (productSelect.value) {
            const selectedOption = productSelect.options[productSelect.selectedIndex];
            const price = selectedOption.getAttribute('data-price');
            prixUnitaireInput.value = price;
        } else {
            prixUnitaireInput.value = '';
        }
    }

    // Fonction pour ajouter un produit à la commande
    function addProduct() {
        const productId = document.getElementById('product_id').value;
        const quantite = parseInt(document.getElementById('quantite').value);
        const prixUnitaire = parseFloat(document.getElementById('prix_unitaire').value);

        if (!productId) {
            showToast('Veuillez sélectionner un produit', 'warning');
            return;
        }

        if (!quantite || quantite <= 0) {
            showToast('Veuillez saisir une quantité valide', 'warning');
            return;
        }

        if (!prixUnitaire || prixUnitaire <= 0) {
            showToast('Veuillez saisir un prix unitaire valide', 'warning');
            return;
        }

        // Vérifier si le produit n'est pas déjà ajouté
        const existingItem = commandeItems.find(item => item.product_id === productId);
        if (existingItem) {
            showToast('Ce produit est déjà dans la commande', 'warning');
            return;
        }

        // Trouver le produit sélectionné
        const produit = produits.find(p => p.product_id === productId);
        if (!produit) {
            showToast('Produit non trouvé', 'error');
            return;
        }

        // Ajouter l'élément à la commande
        const item = {
            product_id: productId,
            quantite: quantite,
            prix_unitaire: prixUnitaire,
            sous_total: quantite * prixUnitaire,
            product: produit
        };

        commandeItems.push(item);
        updateProductsTable();
        updateTotalAmount();
        clearProductForm();

        showToast('Produit ajouté à la commande', 'success');
    }

    // Fonction pour supprimer un produit de la commande
    function removeProduct(index) {
        commandeItems.splice(index, 1);
        updateProductsTable();
        updateTotalAmount();
        showToast('Produit supprimé de la commande', 'info');
    }

    // Fonction pour mettre à jour le tableau des produits
    function updateProductsTable() {
        const container = document.getElementById('productsTableContainer');
        const tbody = document.getElementById('productsTableBody');

        if (commandeItems.length === 0) {
            container.style.display = 'none';
            return;
        }

        container.style.display = 'block';
        tbody.innerHTML = commandeItems.map((item, index) => `
            <tr>
                <td>
                    <div class="fw-semibold">${item.product.name}</div>
                    <small class="text-muted">${item.product.code}</small>
                </td>
                <td>${item.quantite}</td>
                <td>${formatPrice(item.prix_unitaire)}</td>
                <td class="fw-semibold text-success">${formatPrice(item.sous_total)}</td>
                <td>
                    <button class="btn btn-outline-danger btn-sm" onclick="removeProduct(${index})" title="Supprimer">
                        <i class="bi-trash"></i>
                    </button>
                </td>
            </tr>
        `).join('');
    }

    // Fonction pour mettre à jour le montant total
    function updateTotalAmount() {
        const total = commandeItems.reduce((sum, item) => sum + item.sous_total, 0);
        document.getElementById('totalAmount').textContent = formatPrice(total);
        document.getElementById('montant').value = total;
    }

    // Fonction pour vider le formulaire de produit
    function clearProductForm() {
        document.getElementById('product_id').value = '';
        document.getElementById('quantite').value = '1';
        document.getElementById('prix_unitaire').value = '';
    }

    // Fonction pour formater le prix
    function formatPrice(price) {
        if (!price) return '0 F CFA';
        return new Intl.NumberFormat('fr-FR').format(parseFloat(price)) + ' F CFA';
    }

    // Fonction pour valider le formulaire
    function validateForm() {
        let isValid = true;
        
        // Réinitialiser les erreurs
        document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        document.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');

        // Validation des champs requis
        const requiredFields = ['fournisseur_id', 'date_achat', 'date_livraison_prevue'];
        
        requiredFields.forEach(fieldName => {
            const field = document.getElementById(fieldName);
            if (!field.value.trim()) {
                field.classList.add('is-invalid');
                document.getElementById(`${fieldName}_error`).textContent = 'Ce champ est requis';
                isValid = false;
            }
        });

        // Validation des éléments de commande
        if (commandeItems.length === 0) {
            showToast('Veuillez ajouter au moins un produit à la commande', 'warning');
            isValid = false;
        }

        // Validation de la date de livraison effective
        const dateAchat = document.getElementById('date_achat').value;
        const dateLivraisonPrevue = document.getElementById('date_livraison_prevue').value;
        const dateLivraisonEffective = document.getElementById('date_livraison_effective').value;

        if (dateLivraisonEffective && dateLivraisonEffective < dateAchat) {
            document.getElementById('date_livraison_effective').classList.add('is-invalid');
            document.getElementById('date_livraison_effective_error').textContent = 'La date de livraison effective ne peut pas être antérieure à la date d\'achat';
            isValid = false;
        }

        if (dateLivraisonPrevue && dateLivraisonPrevue < dateAchat) {
            document.getElementById('date_livraison_prevue').classList.add('is-invalid');
            document.getElementById('date_livraison_prevue_error').textContent = 'La date de livraison prévue ne peut pas être antérieure à la date d\'achat';
            isValid = false;
        }

        return isValid;
    }

    // Fonction pour soumettre le formulaire
    async function handleSubmit(event) {
        event.preventDefault();
        
        if (!validateForm()) {
            return;
        }

        const submitBtn = document.getElementById('submitBtn');
        const originalText = submitBtn.innerHTML;
        
        try {
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="bi-hourglass-split me-1"></i> Création...';

            const formData = new FormData(event.target);
            const data = Object.fromEntries(formData.entries());
            
            // Calculer le montant total
            data.montant = commandeItems.reduce((sum, item) => sum + item.sous_total, 0);

            const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
            
            // Créer la commande
            const response = await fetch('/api/commandes', {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            });

            const result = await response.json();

            if (response.ok && result.success) {
                const commandeId = result.data.commande_id;
                
                // Créer les détails de commande
                await createCommandeDetails(commandeId, accessToken);
                
                showSuccess('Commande créée avec succès !');
                document.getElementById('createCommandeForm').reset();
                commandeItems = [];
                updateProductsTable();
                updateTotalAmount();
                
                // Rediriger vers la liste après 2 secondes
                setTimeout(() => {
                    window.location.href = '/commandes';
                }, 2000);
            } else {
                throw new Error(result.message || 'Erreur lors de la création de la commande');
            }

        } catch (error) {
            console.error('Erreur lors de la création:', error);
            showError('Erreur lors de la création de la commande: ' + error.message);
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        }
    }

    // Fonction pour créer les détails de commande
    async function createCommandeDetails(commandeId, accessToken) {
        for (const item of commandeItems) {
            const detailData = {
                commande_id: commandeId,
                product_id: item.product_id,
                quantite: item.quantite,
                prix_unitaire: item.prix_unitaire
            };

            const response = await fetch('/api/detail-commandes', {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(detailData)
            });

            if (!response.ok) {
                const error = await response.json();
                throw new Error(`Erreur lors de la création du détail: ${error.message}`);
            }
        }
    }

    // Fonction pour afficher les toasts
    function showToast(message, type = 'info') {
        const toastContainer = document.getElementById('toastContainer') || createToastContainer();
        
        const toast = document.createElement('div');
        toast.className = `toast align-items-center text-white bg-${type === 'success' ? 'success' : type === 'error' ? 'danger' : 'info'} border-0`;
        toast.setAttribute('role', 'alert');
        toast.innerHTML = `
            <div class="d-flex">
                <div class="toast-body">${message}</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        `;
        
        toastContainer.appendChild(toast);
        
        const bsToast = new bootstrap.Toast(toast);
        bsToast.show();
        
        toast.addEventListener('hidden.bs.toast', () => {
            toast.remove();
        });
    }

    function createToastContainer() {
        const container = document.createElement('div');
        container.id = 'toastContainer';
        container.className = 'toast-container position-fixed top-0 end-0 p-3';
        container.style.zIndex = '9999';
        document.body.appendChild(container);
        return container;
    }

    // Initialisation
    document.addEventListener('DOMContentLoaded', function() {
        // Définir la date d'aujourd'hui par défaut
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('date_achat').value = today;
        
        // Charger les fournisseurs et produits
        Promise.all([loadFournisseurs(), loadProduits()]).then(() => {
            hideLoading();
        });
        
        // Attacher les événements
        document.getElementById('createCommandeForm').addEventListener('submit', handleSubmit);
        document.getElementById('product_id').addEventListener('change', updatePrixUnitaire);
    });
</script>

<?php $content = ob_get_clean(); ?>
<?php require './views/layouts/app-layout.php'; ?>