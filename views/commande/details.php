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

    .commande-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, #d1036d 100%);
        color: white;
        padding: 2rem;
        border-radius: 12px 12px 0 0;
    }

    .commande-icon-large {
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

    .badge-status {
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.875rem;
    }

    .badge-en-attente {
        background-color: #fff3cd;
        color: #856404;
    }

    .badge-validee {
        background-color: #d4edda;
        color: #155724;
    }

    .badge-en-cours {
        background-color: #d1ecf1;
        color: #0c5460;
    }

    .badge-livree {
        background-color: #d4edda;
        color: #155724;
    }

    .badge-partiellement-livree {
        background-color: #fff3cd;
        color: #856404;
    }

    .badge-annulee {
        background-color: #f8d7da;
        color: #721c24;
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

    .table-modern {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
    }

    .table-modern thead {
        background: linear-gradient(135deg, var(--primary-color) 0%, #d1036d 100%);
        color: black;
    }

    .table-modern th {
        border: none;
        font-weight: 600;
        padding: 1rem;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .table-modern td {
        padding: 1rem;
        border-bottom: 1px solid #e9ecef;
        vertical-align: middle;
    }

    .table-modern tbody tr:hover {
        background-color: var(--light-primary);
        transform: scale(1.01);
    }

    .action-btn {
        padding: 0.375rem 0.75rem;
        border-radius: 6px;
        font-size: 0.875rem;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .action-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .btn-view {
        background-color: #17a2b8;
        border-color: #17a2b8;
        color: white;
    }

    .btn-view:hover {
        background-color: #138496;
        border-color: #117a8b;
        color: white;
    }

    .btn-edit {
        background-color: #ffc107;
        border-color: #ffc107;
        color: #212529;
    }

    .btn-edit:hover {
        background-color: #e0a800;
        border-color: #d39e00;
        color: #212529;
    }

    .btn-delete {
        background-color: #dc3545;
        border-color: #dc3545;
        color: white;
    }

    .btn-delete:hover {
        background-color: #c82333;
        border-color: #bd2130;
        color: white;
    }

    /* Modal de confirmation personnalisé */
    .modal.show {
        z-index: 1055;
    }
    
    .modal-content {
        border: none;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }
    
    .modal-header {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 12px 12px 0 0;
    }
    
    .modal-title {
        font-weight: 600;
    }
    
    .modal-body {
        padding: 1.5rem;
    }
    
    .modal-footer {
        padding: 1rem 1.5rem;
        background-color: #f8f9fa;
        border-radius: 0 0 12px 12px;
    }
    
    .btn-close {
        background: none;
        border: none;
        font-size: 1.2rem;
        opacity: 0.7;
    }
    
    .btn-close:hover {
        opacity: 1;
    }
</style>

<main id="content" role="main" class="main font-public-sans">
    <div class="content container-fluid px-4 py-4">
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link text-primary-custom" href="/">Tableau de Bord</a></li>
                            <li class="breadcrumb-item"><a class="breadcrumb-link text-primary-custom" href="/commandes">Commandes</a></li>
                            <li class="breadcrumb-item active" id="commandeNumberBreadcrumb">Détails</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-sm-auto">
                    <button class="btn btn-outline-secondary me-2" onclick="window.history.back()">
                        <i class="bi-arrow-left me-1"></i> Retour
                    </button>
                    <button class="btn btn-primary-custom" onclick="editCommande()">
                        <i class="bi-pencil me-1"></i> Modifier
                    </button>
        </div>
    </div>
    </div>

        <div id="loadingState" class="text-center py-5">
            <div class="spinner-border text-primary-custom" role="status">
                <span class="visually-hidden">Chargement...</span>
                </div>
            <p class="mt-3 text-muted">Chargement des détails de la commande...</p>
                </div>
                
        <div id="errorMessage" class="alert alert-danger" style="display: none;">
            <i class="bi-exclamation-triangle me-2"></i>
            <span id="errorText"></span>
                </div>
                
        <div id="commandeContent" style="display: none;">
            <!-- Commande Header Card -->
            <div class="card card-custom mb-4">
                <div class="commande-header">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="commande-icon-large">
                                <i class="bi-cart-check"></i>
                </div>
                </div>
                        <div class="col">
                            <h2 class="mb-1" id="commandeNumber">-</h2>
                            <p class="mb-2 opacity-75">
                                <i class="bi-building me-2"></i>
                                <span id="fournisseurName">-</span>
                            </p>
                            <div class="d-flex align-items-center gap-3">
                                <span class="badge badge-status" id="statusBadge">-</span>
                                <span class="badge bg-light text-dark" id="montantBadge">-</span>
            </div>
        </div>
                        <div class="col-auto text-end">
                            <div class="btn-group">
                                <button class="btn btn-success" onclick="downloadBonCommande()">
                                    <i class="bi-download me-1"></i> Télécharger PDF
                                </button>
                                <button class="btn btn-light" onclick="editCommande()">
                                    <i class="bi-pencil me-1"></i> Modifier
                                </button>
                                <button class="btn btn-danger" onclick="confirmDeleteCommande()">
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
                                <div class="info-label">Numéro de Commande</div>
                                <div class="info-value" id="numeroCommande">-</div>
                </div>
                            <div class="info-item">
                                <div class="info-label">Fournisseur</div>
                                <div class="info-value" id="fournisseurInfo">-</div>
            </div>
                            <div class="info-item">
                                <div class="info-label">Date d'Achat</div>
                                <div class="info-value" id="dateAchat">-</div>
        </div>
                            <div class="info-item">
                                <div class="info-label">Date de Livraison Prévue</div>
                                <div class="info-value" id="dateLivraisonPrevue">-</div>
                </div>
                            <div class="info-item">
                                <div class="info-label">Date de Livraison Effective</div>
                                <div class="info-value" id="dateLivraisonEffective">-</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Montant Total</div>
                                <div class="info-value" id="montantTotal">-</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Statut</div>
                                <div class="info-value" id="statutInfo">-</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Notes</div>
                                <div class="info-value" id="notesInfo">-</div>
                            </div>
                        </div>
                </div>
                
                    <!-- Produits de la Commande -->
                    <div class="card card-custom mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi-box-seam me-2 text-primary-custom"></i>
                                Produits Commandés
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-modern mb-0">
                                    <thead>
                                        <tr>
                                            <th>Produit</th>
                                            <th>Quantité</th>
                                            <th>Prix Unitaire</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="produitsTableBody">
                                        <tr>
                                            <td colspan="4" class="text-center py-4">
                                                <div class="spinner-border text-primary" role="status">
                                                    <span class="visually-hidden">Chargement...</span>
                                                </div>
                                                <p class="mt-2 mb-0">Chargement des produits...</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
            
                <!-- Statistiques et Actions -->
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
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="stat-box">
                                        <div class="stat-value" id="totalProduits">-</div>
                                        <div class="stat-label">Produits</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="stat-box">
                                        <div class="stat-value" id="montantStat">-</div>
                                        <div class="stat-label">Montant Total</div>
                                    </div>
                                </div>
                            </div>
            </div>
        </div>

                    <!-- Actions Rapides -->
                    <div class="card card-custom">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi-lightning me-2 text-primary-custom"></i>
                                Actions Rapides
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <button class="btn btn-success" onclick="downloadBonCommande()">
                                    <i class="bi-file-earmark-pdf me-2"></i> Bon de Commande PDF
                </button>
                                <!-- Bouton pour créer un mouvement de stock (visible seulement si livrée) -->
                                <button id="createStockMovementBtn" class="btn btn-warning" onclick="openStockMovementModal()" style="display: none;">
                                    <i class="bi-box-seam me-2"></i> Créer Mouvement de Stock
                </button>
                                <!-- Bouton pour démarrer un transfert vers un entrepôt (visible seulement si livrée) -->
                                <button id="startTransferBtn" class="btn btn-info" onclick="openTransferModal()" style="display: block;">
                                    <i class="bi-arrow-right-circle me-2"></i> Recevoir en Entrepôt
                                </button>
                                <!-- Bouton pour payer la commande -->
                                <button id="payCommandeBtn" class="btn btn-success" onclick="openPaymentModal()" style="display: block;">
                                    <i class="bi-credit-card me-2"></i> Payer la Commande
                                </button>
                                <!-- Bouton pour lister les paiements -->
                                <button id="listPaymentsBtn" class="btn btn-outline-info" onclick="openPaymentsListModal()" style="display: block;">
                                    <i class="bi-list-ul me-2"></i> Voir les Paiements
                                </button>
                                <button class="btn btn-primary-custom" onclick="editCommande()">
                                    <i class="bi-pencil me-2"></i> Modifier la Commande
                                </button>
                                <button class="btn btn-outline-danger" onclick="confirmDeleteCommande()">
                                    <i class="bi-trash me-2"></i> Supprimer
                </button>
            </div>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>
</main>

<script>
// Variables globales
let commandeId = null;
    let commandeData = null;

// Fonctions utilitaires
function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
    return null;
}

function showLoading() {
    document.getElementById('loadingState').style.display = 'block';
    document.getElementById('commandeContent').style.display = 'none';
    document.getElementById('errorMessage').style.display = 'none';
}

function hideLoading() {
    document.getElementById('loadingState').style.display = 'none';
    document.getElementById('commandeContent').style.display = 'block';
}

function showError(message) {
    document.getElementById('errorMessage').style.display = 'block';
    document.getElementById('errorText').textContent = message;
    document.getElementById('loadingState').style.display = 'none';
    document.getElementById('commandeContent').style.display = 'none';
}

function showToast(message, type = 'info') {
    // Créer le conteneur de toast s'il n'existe pas
    let toastContainer = document.getElementById('toastContainer');
    if (!toastContainer) {
        toastContainer = document.createElement('div');
        toastContainer.id = 'toastContainer';
        toastContainer.className = 'position-fixed top-0 end-0 p-3';
        toastContainer.style.zIndex = '9999';
        document.body.appendChild(toastContainer);
    }

    const toastId = 'toast-' + Date.now();
    const toastHTML = `
        <div id="${toastId}" class="toast align-items-center text-white bg-${type === 'error' ? 'danger' : type} border-0" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-triangle' : 'info-circle'} me-2"></i>
                    ${message}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    `;
    
    toastContainer.insertAdjacentHTML('beforeend', toastHTML);
    
    const toastElement = document.getElementById(toastId);
    const toast = new bootstrap.Toast(toastElement);
    toast.show();
    
    // Supprimer l'élément après fermeture
    toastElement.addEventListener('hidden.bs.toast', () => {
        toastElement.remove();
    });
}

// Fonction pour charger les détails de la commande
    async function loadCommandeDetails() {
        try {
        showLoading();
            
        const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
            if (!accessToken) {
            throw new Error('Token d\'accès manquant');
            }

        const response = await fetch(`/api/commandes/${commandeId}`, {
            method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });

        if (!response.ok) {
            throw new Error(`Erreur ${response.status}: ${response.statusText}`);
        }

        const data = await response.json();
        if (!data.success) {
            throw new Error(data.message || 'Erreur lors du chargement des détails');
        }

        commandeData = data.data;
                displayCommandeDetails();
        hideLoading();
        
        } catch (error) {
        console.error('Erreur lors du chargement des détails:', error);
        showError('Erreur lors du chargement des détails: ' + error.message);
        }
    }

// Fonction pour afficher les détails de la commande
    function displayCommandeDetails() {
        if (!commandeData) return;

        // Informations générales
    document.getElementById('commandeNumber').textContent = commandeData.numero_commande || 'N/A';
    document.getElementById('commandeNumberBreadcrumb').textContent = commandeData.numero_commande || 'Détails';
    document.getElementById('fournisseurName').textContent = commandeData.fournisseur?.name || 'N/A';
    
    // Badges
    updateStatusBadge(commandeData.status);
    document.getElementById('montantBadge').textContent = formatPrice(commandeData.montant);
    
    // Informations détaillées
        document.getElementById('numeroCommande').textContent = commandeData.numero_commande || 'N/A';
    document.getElementById('fournisseurInfo').textContent = commandeData.fournisseur?.name || 'N/A';
        document.getElementById('dateAchat').textContent = formatDate(commandeData.date_achat);
    document.getElementById('dateLivraisonPrevue').textContent = formatDate(commandeData.date_livraison_prevue);
    document.getElementById('dateLivraisonEffective').textContent = formatDate(commandeData.date_livraison_effective) || 'Non livrée';
    document.getElementById('montantTotal').textContent = formatPrice(commandeData.montant);
    document.getElementById('statutInfo').innerHTML = getStatusBadge(commandeData.status);
    document.getElementById('notesInfo').textContent = commandeData.note || 'Aucune note';
    
    // Statistiques
    document.getElementById('totalProduits').textContent = '-'; // Sera mis à jour avec les produits
    document.getElementById('montantStat').textContent = formatPrice(commandeData.montant);
    
    // Charger les produits
    loadCommandeProduits();
    
    // Afficher les boutons de mouvement de stock si la commande est livrée
    if (commandeData.status === 'livree') {
        document.getElementById('createStockMovementBtn').style.display = 'block';
    }
    
    // Afficher le bouton de transfert pour les commandes livrées ou validées
    if (commandeData.status === 'livree' || commandeData.status === 'validee') {
        document.getElementById('startTransferBtn').style.display = 'block';
    }
    
    // Debug: afficher le statut de la commande et vérifier les éléments
    console.log('Statut de la commande:', commandeData.status);
    console.log('Bouton transfert existe:', document.getElementById('startTransferBtn') !== null);
    console.log('Bouton mouvement existe:', document.getElementById('createStockMovementBtn') !== null);
}

// Fonction pour charger les produits de la commande
async function loadCommandeProduits() {
    try {
        const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
        const response = await fetch(`/api/detail-commandes/commande/${commandeId}`, {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${accessToken}`,
                'Accept': 'application/json'
            }
        });

        if (response.ok) {
            const data = await response.json();
            console.log('Réponse API produits:', data); // Debug
            if (data.success && data.data && data.data.details && Array.isArray(data.data.details)) {
                displayCommandeProduits(data.data.details);
            } else {
                console.log('Aucun produit trouvé ou format incorrect:', data);
                displayNoProduits();
            }
        } else {
            console.log('Erreur HTTP:', response.status, response.statusText);
            displayNoProduits();
        }
    } catch (error) {
        console.error('Erreur lors du chargement des produits:', error);
        displayNoProduits();
    }
}

// Fonction pour afficher les produits
function displayCommandeProduits(produits) {
    const tbody = document.getElementById('produitsTableBody');
    
    // Vérifier si produits est un tableau
    if (!produits || !Array.isArray(produits) || produits.length === 0) {
        displayNoProduits();
        return;
    }
    
    let html = '';
    let totalProduits = 0;
    
    produits.forEach(produit => {
        const total = parseFloat(produit.sous_total || 0);
        totalProduits += parseFloat(produit.quantite || 0);
        
        html += `
            <tr>
                <td>
                    <div class="fw-bold">${produit.product?.name || 'Produit inconnu'}</div>
                    <small class="text-muted">${produit.product?.code || 'N/A'}</small>
                </td>
                <td>
                    <span class="badge bg-primary">${produit.quantite || 0}</span>
                </td>
                <td>${formatPrice(produit.prix_unitaire)}</td>
                <td class="fw-bold">${formatPrice(produit.sous_total)}</td>
            </tr>
        `;
    });
    
    tbody.innerHTML = html;
    document.getElementById('totalProduits').textContent = totalProduits;
}

// Fonction pour afficher "Aucun produit"
function displayNoProduits() {
    const tbody = document.getElementById('produitsTableBody');
    tbody.innerHTML = `
        <tr>
            <td colspan="4" class="text-center py-4">
                <i class="bi-box-seam text-muted" style="font-size: 2rem;"></i>
                <p class="mt-2 mb-0 text-muted">Aucun produit trouvé pour cette commande</p>
            </td>
        </tr>
    `;
    document.getElementById('totalProduits').textContent = '0';
}

// Variables globales pour le mouvement de stock
let entrepots = [];
let commandeProduits = [];

// Fonction pour ouvrir le modal de mouvement de stock
async function openStockMovementModal() {
    try {
        // Charger les entrepôts
        await loadEntrepots();
        
        // Charger les produits de la commande
        await loadCommandeProduitsForStock();
        
        // Afficher le modal
        const modal = new bootstrap.Modal(document.getElementById('stockMovementModal'));
        modal.show();
        
    } catch (error) {
        console.error('Erreur lors de l\'ouverture du modal:', error);
        showToast('Erreur lors du chargement des données', 'error');
    }
}

// Fonction pour charger les entrepôts
async function loadEntrepots() {
    try {
        const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
        const response = await fetch('/api/entrepots?per_page=100&is_active=1', {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${accessToken}`,
                'Accept': 'application/json'
            }
        });

        if (response.ok) {
            const data = await response.json();
            entrepots = data.data || [];
            console.log('Entrepôts chargés:', entrepots);
            populateEntrepotSelect();
        } else {
            throw new Error('Erreur lors du chargement des entrepôts');
        }
    } catch (error) {
        console.error('Erreur lors du chargement des entrepôts:', error);
        throw error;
    }
}

// Fonction pour peupler le select des entrepôts
function populateEntrepotSelect() {
    const select = document.getElementById('entrepotSelect');
    select.innerHTML = '<option value="">Sélectionner un entrepôt...</option>';
    
    entrepots.forEach(entrepot => {
        const option = document.createElement('option');
        option.value = entrepot.entrepot_id;
        option.textContent = `${entrepot.name} - ${entrepot.adresse || 'N/A'}`;
        select.appendChild(option);
    });
}

// Fonction pour charger les produits de la commande pour le stock
async function loadCommandeProduitsForStock() {
    try {
        const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
        const response = await fetch(`/api/detail-commandes/commande/${commandeId}`, {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${accessToken}`,
                'Accept': 'application/json'
            }
        });

        if (response.ok) {
            const data = await response.json();
            commandeProduits = data.data?.details || [];
            populateProductsTable();
        } else {
            throw new Error('Erreur lors du chargement des produits');
        }
    } catch (error) {
        console.error('Erreur lors du chargement des produits:', error);
        throw error;
    }
}

// Fonction pour peupler le tableau des produits
function populateProductsTable() {
    const tbody = document.getElementById('productsTableBody');
    tbody.innerHTML = '';
    
    commandeProduits.forEach(produit => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>
                <div class="fw-bold">${produit.product?.name || 'Produit inconnu'}</div>
                <small class="text-muted">${produit.product?.code || 'N/A'}</small>
            </td>
            <td>
                <span class="badge bg-primary">${produit.quantite || 0}</span>
            </td>
            <td>
                <input type="number" class="form-control form-control-sm" 
                       value="${produit.quantite || 0}" 
                       min="1" 
                       max="${produit.quantite || 0}"
                       data-product-id="${produit.product?.product_id || ''}"
                       onchange="validateQuantity(this)">
            </td>
        `;
        tbody.appendChild(row);
    });
}

// Fonction pour valider la quantité
function validateQuantity(input) {
    const maxQuantity = parseInt(input.getAttribute('max'));
    const value = parseInt(input.value);
    
    if (value > maxQuantity) {
        input.value = maxQuantity;
        showToast(`Quantité maximale: ${maxQuantity}`, 'warning');
    } else if (value < 1) {
        input.value = 1;
    }
}

// Fonction pour créer le mouvement de stock
async function createStockMovement() {
    try {
        const entrepotId = document.getElementById('entrepotSelect').value;
        const note = document.getElementById('movementNote').value;
        const validateImmediately = document.getElementById('validateImmediately').checked;
        
        if (!entrepotId) {
            showToast('Veuillez sélectionner un entrepôt', 'error');
            return;
        }
        
        // Collecter les détails des produits
        const details = [];
        const inputs = document.querySelectorAll('#productsTableBody input[type="number"]');
        
        inputs.forEach(input => {
            const productId = input.getAttribute('data-product-id');
            const quantite = parseInt(input.value);
            
            if (productId && quantite > 0) {
                details.push({
                    product_id: productId,
                    quantite: quantite
                });
            }
        });
        
        if (details.length === 0) {
            showToast('Veuillez spécifier au moins un produit à recevoir', 'error');
            return;
        }
        
        // Préparer les données
        const data = {
            movement_type: 'entrée',
            fournisseur_id: commandeData.fournisseur?.fournisseur_id,
            entrepot_to_id: entrepotId,
            note: note || `Réception commande ${commandeData.numero_commande}`,
            validate_immediately: validateImmediately,
            details: details
        };
        
        showLoading();
        
        const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
        const response = await fetch('/api/stock-movements/receipt/supplier', {
            method: 'POST',
            headers: {
                'Authorization': `Bearer ${accessToken}`,
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(data)
        });
        
        hideLoading();
        
        if (response.ok) {
            const result = await response.json();
            showToast('Mouvement de stock créé avec succès', 'success');
            
            // Fermer le modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('stockMovementModal'));
            modal.hide();
            
            // Optionnel: recharger les détails de la commande
            // loadCommandeDetails();
            
        } else {
            const error = await response.json();
            showToast(error.message || 'Erreur lors de la création du mouvement', 'error');
        }
        
    } catch (error) {
        hideLoading();
        console.error('Erreur lors de la création du mouvement:', error);
        showToast('Erreur lors de la création du mouvement', 'error');
    }
}

// Variables globales pour le transfert
let transferEntrepots = [];
let transferProduits = [];

// Fonction pour ouvrir le modal de transfert
async function openTransferModal() {
    try {
        // Charger les entrepôts
        await loadTransferEntrepots();
        
        // Charger les produits de la commande
        await loadTransferProduits();
        
        // Afficher le modal
        const modal = new bootstrap.Modal(document.getElementById('transferModal'));
        modal.show();
        
    } catch (error) {
        console.error('Erreur lors de l\'ouverture du modal de transfert:', error);
        showToast('Erreur lors du chargement des données', 'error');
    }
}

// Fonction pour charger les entrepôts pour le transfert
async function loadTransferEntrepots() {
    try {
        const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
        const response = await fetch('/api/entrepots?per_page=100&is_active=1', {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${accessToken}`,
                'Accept': 'application/json'
            }
        });

        if (response.ok) {
            const data = await response.json();
            transferEntrepots = data.data || [];
            console.log('Entrepôts chargés:', transferEntrepots);
            populateTransferEntrepotSelects();
        } else {
            throw new Error('Erreur lors du chargement des entrepôts');
        }
        } catch (error) {
        console.error('Erreur lors du chargement des entrepôts:', error);
        throw error;
    }
}

// Fonction pour peupler le select des entrepôts et afficher le fournisseur
function populateTransferEntrepotSelects() {
    const destinationSelect = document.getElementById('destinationEntrepotSelect');
    
    destinationSelect.innerHTML = '<option value="">Sélectionner l\'entrepôt destination...</option>';
    
    transferEntrepots.forEach(entrepot => {
        const option = document.createElement('option');
        option.value = entrepot.entrepot_id;
        option.textContent = `${entrepot.name} - ${entrepot.adresse || 'N/A'}`;
        destinationSelect.appendChild(option);
    });
    
    // Afficher le nom du fournisseur
    if (commandeData && commandeData.fournisseur) {
        document.getElementById('fournisseurInfo').value = commandeData.fournisseur.name || 'N/A';
    }
}

// Fonction pour charger les produits pour le transfert
async function loadTransferProduits() {
    try {
        const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
        const response = await fetch(`/api/detail-commandes/commande/${commandeId}`, {
            method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });

            if (response.ok) {
            const data = await response.json();
            transferProduits = data.data?.details || [];
            populateTransferProductsTable();
        } else {
            throw new Error('Erreur lors du chargement des produits');
        }
    } catch (error) {
        console.error('Erreur lors du chargement des produits:', error);
        throw error;
    }
}

// Fonction pour peupler le tableau des produits de transfert
function populateTransferProductsTable() {
    const tbody = document.getElementById('transferProductsTableBody');
    tbody.innerHTML = '';
    
    transferProduits.forEach(produit => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>
                <div class="fw-bold">${produit.product?.name || 'Produit inconnu'}</div>
                <small class="text-muted">${produit.product?.code || 'N/A'}</small>
            </td>
            <td>
                <span class="badge bg-success" id="stock-${produit.product?.product_id || ''}">Chargement...</span>
            </td>
            <td>
                <input type="number" class="form-control form-control-sm" 
                       value="0" 
                       min="0" 
                       data-product-id="${produit.product?.product_id || ''}"
                       onchange="validateTransferQuantity(this)">
            </td>
        `;
        tbody.appendChild(row);
    });
}

// Fonction pour valider la quantité de transfert
function validateTransferQuantity(input) {
    const value = parseInt(input.value);
    
    if (value < 0) {
        input.value = 0;
    }
}

// Fonction pour créer la réception
async function createTransfer() {
    try {
        const destinationEntrepotId = document.getElementById('destinationEntrepotSelect').value;
        const note = document.getElementById('transferNote').value;
        const validateImmediately = document.getElementById('validateTransferImmediately').checked;
        
        if (!destinationEntrepotId) {
            showToast('Veuillez sélectionner un entrepôt de destination', 'error');
            return;
        }
        
        // Collecter les détails des produits
        const details = [];
        const inputs = document.querySelectorAll('#transferProductsTableBody input[type="number"]');
        
        inputs.forEach(input => {
            const productId = input.getAttribute('data-product-id');
            const quantite = parseInt(input.value);
            
            if (productId && quantite > 0) {
                details.push({
                    product_id: productId,
                    quantite: quantite
                });
            }
        });
        
        if (details.length === 0) {
            showToast('Veuillez spécifier au moins un produit à recevoir', 'error');
            return;
        }
        
        // Préparer les données pour la réception fournisseur
        const data = {
            movement_type: 'entrée',
            fournisseur_id: commandeData.fournisseur?.fournisseur_id,
            entrepot_to_id: destinationEntrepotId,
            note: note || `Réception commande ${commandeData.numero_commande}`,
            validate_immediately: validateImmediately,
            details: details
        };
        
        // Log des données pour debug
        console.log('Données envoyées à l\'API:', data);
        console.log('Fournisseur ID:', commandeData.fournisseur?.fournisseur_id);
        console.log('Entrepôt ID:', destinationEntrepotId);
        console.log('Détails produits:', details);
        
        showLoading();
        
        const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
        const response = await fetch('/api/stock-movements/receipt/supplier', {
            method: 'POST',
            headers: {
                'Authorization': `Bearer ${accessToken}`,
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(data)
        });
        
        hideLoading();
        
        if (response.ok) {
            const result = await response.json();
            showToast('Réception créée avec succès', 'success');
            
            // Fermer le modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('transferModal'));
            modal.hide();
            
        } else {
            const error = await response.json();
            showToast(error.message || 'Erreur lors de la création de la réception', 'error');
        }
        
    } catch (error) {
        hideLoading();
        console.error('Erreur lors de la création de la réception:', error);
        showToast('Erreur lors de la création de la réception', 'error');
    }
}

// Fonction pour ouvrir le modal de paiement
function openPaymentModal() {
    try {
        // Remplir les informations de base
        document.getElementById('remainingAmount').textContent = formatPrice(commandeData.montant || 0);
        document.getElementById('paymentAmount').max = commandeData.montant || 0;
        document.getElementById('paymentAmount').value = commandeData.montant || 0;
        
        // Définir la date actuelle
        const now = new Date();
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        document.getElementById('paymentDate').value = `${year}-${month}-${day}T${hours}:${minutes}`;
        
        // Réinitialiser les champs conditionnels
        document.getElementById('mobileMoneyFields').style.display = 'none';
        document.getElementById('bankFields').style.display = 'none';
        
        // Ouvrir le modal
        const modal = new bootstrap.Modal(document.getElementById('paymentModal'));
        modal.show();
        
    } catch (error) {
        console.error('Erreur lors de l\'ouverture du modal de paiement:', error);
        showToast('Erreur lors du chargement du modal de paiement', 'error');
    }
}

// Fonction pour gérer le changement de mode de paiement
function togglePaymentFields() {
    const paymentMethod = document.getElementById('paymentMethod').value;
    const mobileMoneyFields = document.getElementById('mobileMoneyFields');
    const bankFields = document.getElementById('bankFields');
    
    // Masquer tous les champs conditionnels
    mobileMoneyFields.style.display = 'none';
    bankFields.style.display = 'none';
    
    // Afficher les champs appropriés
    if (paymentMethod === 'mobile_money') {
        mobileMoneyFields.style.display = 'block';
    } else if (paymentMethod === 'virement' || paymentMethod === 'cheque') {
        bankFields.style.display = 'block';
    }
}

// Fonction pour ouvrir le modal de liste des paiements
async function openPaymentsListModal() {
    try {
        // Ouvrir le modal
        const modal = new bootstrap.Modal(document.getElementById('paymentsListModal'));
        modal.show();
        
        // Charger les paiements
        await loadPaymentsList();
        
    } catch (error) {
        console.error('Erreur lors de l\'ouverture du modal des paiements:', error);
        showToast('Erreur lors du chargement des paiements', 'error');
    }
}

// Fonction pour charger la liste des paiements
async function loadPaymentsList() {
    try {
        showLoading();
        
        const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
        const response = await fetch(`/api/paiement-commandes/commande/${commandeData.commande_id}`, {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${accessToken}`,
                'Accept': 'application/json'
            }
        });
        
        hideLoading();
        
        if (response.ok) {
            const result = await response.json();
            console.log('Paiements chargés:', result);
            
            if (result.success && result.data) {
                displayPaymentsList(result.data);
            } else {
                showNoPaymentsMessage();
            }
        } else {
            const error = await response.json();
            showToast(error.message || 'Erreur lors du chargement des paiements', 'error');
            showNoPaymentsMessage();
        }
        
    } catch (error) {
        hideLoading();
        console.error('Erreur lors du chargement des paiements:', error);
        showToast('Erreur lors du chargement des paiements', 'error');
        showNoPaymentsMessage();
    }
}

// Fonction pour afficher la liste des paiements
function displayPaymentsList(data) {
    const { commande, paiements } = data;
    
    // Mettre à jour le résumé
    document.getElementById('totalAmount').textContent = formatPrice(commande.montant);
    document.getElementById('paidAmount').textContent = formatPrice(commande.montant_paye || 0);
    document.getElementById('remainingAmountSummary').textContent = formatPrice(commande.montant_restant || 0);
    
    // Déterminer le statut
    let statusText = 'Non payée';
    let statusClass = 'bg-danger';
    
    if (commande.is_totalement_payee) {
        statusText = 'Totalement payée';
        statusClass = 'bg-success';
    } else if (commande.is_partiellement_payee) {
        statusText = 'Partiellement payée';
        statusClass = 'bg-warning';
    }
    
    const statusElement = document.getElementById('paymentStatus');
    statusElement.textContent = statusText;
    statusElement.className = statusClass;
    
    // Afficher le tableau des paiements
    const tbody = document.getElementById('paymentsTableBody');
    tbody.innerHTML = '';
    
    if (paiements && paiements.length > 0) {
        paiements.forEach(paiement => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>
                    <span class="badge bg-primary">${paiement.reference_paiement}</span>
                </td>
                <td>
                    <strong class="text-success">${formatPrice(paiement.montant)}</strong>
                </td>
                <td>
                    <span class="badge bg-info">${getPaymentMethodLabel(paiement.mode_paiement)}</span>
                </td>
                <td>
                    <span class="badge ${getStatusBadgeClass(paiement.statut)}">${getStatusLabel(paiement.statut)}</span>
                </td>
                <td>${formatDateTime(paiement.date_paiement)}</td>
                <td>${paiement.note || '-'}</td>
            `;
            tbody.appendChild(row);
        });
        
        // Masquer le message "aucun paiement"
        document.getElementById('noPaymentsMessage').style.display = 'none';
    } else {
        showNoPaymentsMessage();
    }
}

// Fonction pour afficher le message "aucun paiement"
function showNoPaymentsMessage() {
    document.getElementById('paymentsTableBody').innerHTML = '';
    document.getElementById('noPaymentsMessage').style.display = 'block';
    
    // Réinitialiser le résumé
    document.getElementById('totalAmount').textContent = '0 F CFA';
    document.getElementById('paidAmount').textContent = '0 F CFA';
    document.getElementById('remainingAmountSummary').textContent = '0 F CFA';
    document.getElementById('paymentStatus').textContent = 'Non payée';
    document.getElementById('paymentStatus').className = 'bg-danger';
}

// Fonctions utilitaires pour les paiements
function getPaymentMethodLabel(method) {
    const labels = {
        'especes': 'Espèces',
        'mobile_money': 'Mobile Money',
        'virement': 'Virement',
        'cheque': 'Chèque',
        'carte': 'Carte bancaire'
    };
    return labels[method] || method;
}

function getStatusLabel(status) {
    const labels = {
        'valide': 'Validé',
        'en_attente': 'En attente',
        'echec': 'Échec'
    };
    return labels[status] || status;
}

function getStatusBadgeClass(status) {
    const classes = {
        'valide': 'bg-success',
        'en_attente': 'bg-warning',
        'echec': 'bg-danger'
    };
    return classes[status] || 'bg-secondary';
}

function formatDateTime(dateString) {
    if (!dateString) return 'N/A';
    const date = new Date(dateString);
    return date.toLocaleString('fr-FR', {
        year: 'numeric',
        month: '2-digit',
        day: '2-digit',
        hour: '2-digit',
        minute: '2-digit'
    });
}

// Fonction pour créer le paiement
async function createPayment() {
    try {
        const amount = parseFloat(document.getElementById('paymentAmount').value);
        const paymentMethod = document.getElementById('paymentMethod').value;
        const paymentDate = document.getElementById('paymentDate').value;
        const paymentStatus = document.getElementById('paymentStatus').value;
        const paymentNote = document.getElementById('paymentNote').value;
        
        if (!amount || amount <= 0) {
            showToast('Veuillez saisir un montant valide', 'error');
            return;
        }
        
        if (!paymentMethod) {
            showToast('Veuillez sélectionner un mode de paiement', 'error');
            return;
        }
        
        if (amount > commandeData.montant) {
            showToast('Le montant du paiement ne peut pas dépasser le montant de la commande', 'error');
            return;
        }
        
        // Préparer les données
        const data = {
            commande_id: commandeData.commande_id,
            montant: amount.toString(),
            mode_paiement: paymentMethod,
            statut: paymentStatus,
            date_paiement: paymentDate,
            note: paymentNote || `Paiement commande ${commandeData.numero_commande}`
        };
        
        // Ajouter les champs conditionnels
        if (paymentMethod === 'mobile_money') {
            const transactionNumber = document.getElementById('transactionNumber').value;
            const operator = document.getElementById('operator').value;
            if (transactionNumber) data.numero_transaction = transactionNumber;
            if (operator) data.operateur = operator;
        } else if (paymentMethod === 'virement' || paymentMethod === 'cheque') {
            const bankName = document.getElementById('bankName').value;
            const checkNumber = document.getElementById('checkNumber').value;
            if (bankName) data.banque = bankName;
            if (checkNumber) data.numero_cheque = checkNumber;
        }
        
        // Log des données pour debug
        console.log('Données de paiement envoyées:', data);
        
        showLoading();
        
        const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
        const response = await fetch('/api/paiement-commandes', {
            method: 'POST',
            headers: {
                'Authorization': `Bearer ${accessToken}`,
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(data)
        });
        
        hideLoading();
        
        if (response.ok) {
            const result = await response.json();
            showToast('Paiement enregistré avec succès', 'success');
            
            // Fermer le modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('paymentModal'));
            modal.hide();
            
            // Recharger les détails de la commande pour mettre à jour les montants
            await loadCommandeDetails();
            
            // Recharger la liste des paiements si le modal est ouvert
            const paymentsModal = bootstrap.Modal.getInstance(document.getElementById('paymentsListModal'));
            if (paymentsModal && paymentsModal._isShown) {
                await loadPaymentsList();
            }
            
        } else {
            const error = await response.json();
            showToast(error.message || 'Erreur lors de l\'enregistrement du paiement', 'error');
        }
        
    } catch (error) {
        hideLoading();
        console.error('Erreur lors de la création du paiement:', error);
        showToast('Erreur lors de la création du paiement', 'error');
    }
}

// Fonctions utilitaires
function formatDate(dateString) {
    if (!dateString) return 'N/A';
    const date = new Date(dateString);
    return date.toLocaleDateString('fr-FR');
}

function formatPrice(price) {
    if (!price) return '0 F CFA';
    return new Intl.NumberFormat('fr-FR').format(parseFloat(price)) + ' F CFA';
}

function updateStatusBadge(status) {
    const badge = document.getElementById('statusBadge');
    badge.className = `badge badge-status badge-${status}`;
    badge.textContent = getStatusText(status);
}

function getStatusBadge(status) {
    return `<span class="badge badge-status badge-${status}">${getStatusText(status)}</span>`;
}

function getStatusText(status) {
    const statusMap = {
        'en_attente': 'En Attente',
        'validee': 'Validée',
        'en_cours': 'En Cours',
        'livree': 'Livrée',
        'partiellement_livree': 'Partiellement Livrée',
        'annulee': 'Annulée'
    };
    return statusMap[status] || status;
}

// Fonctions d'action
function editCommande() {
    if (commandeId) {
        window.location.href = `/commande/${commandeId}/modifier`;
    }
}

function downloadBonCommande() {
    if (!commandeId) {
        showToast('ID de commande manquant', 'error');
        return;
    }
    
    showToast('Génération du bon de commande en cours...', 'info');
    
    // Créer un lien de téléchargement vers l'API
    const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
    const downloadUrl = `/api/commandes/${commandeId}/pdf?token=${accessToken}`;
    
    // Créer un élément de lien temporaire pour déclencher le téléchargement
    const link = document.createElement('a');
    link.href = downloadUrl;
    link.download = `bon-commande-${commandeData?.numero_commande || commandeId}.pdf`;
    link.style.display = 'none';
    
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    
    showToast('Téléchargement du bon de commande démarré', 'success');
}


function confirmDeleteCommande() {
    const modal = document.createElement('div');
    modal.className = 'modal fade show';
    modal.style.display = 'block';
    modal.style.backgroundColor = 'rgba(0,0,0,0.5)';
    modal.innerHTML = `
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title text-danger">
                        <i class="bi-exclamation-triangle me-2"></i>
                        Confirmer la suppression
                    </h5>
                    <button type="button" class="btn-close" onclick="closeDeleteModal()"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-3">Êtes-vous sûr de vouloir supprimer cette commande ?</p>
                    <div class="alert alert-warning d-flex align-items-center">
                        <i class="bi-info-circle me-2"></i>
                        <small>Cette action est irréversible. La commande sera marquée comme supprimée.</small>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" onclick="closeDeleteModal()">
                        <i class="bi-x-circle me-1"></i>
                        Annuler
                    </button>
                    <button type="button" class="btn btn-danger" onclick="deleteCommande()">
                        <i class="bi-trash me-1"></i>
                        Supprimer
                    </button>
                </div>
            </div>
        </div>
    `;
    
    document.body.appendChild(modal);
    document.body.style.overflow = 'hidden';
}

function closeDeleteModal() {
    const modal = document.querySelector('.modal.show');
    if (modal) {
        modal.remove();
        document.body.style.overflow = '';
    }
}

async function deleteCommande() {
    closeDeleteModal();
    
    try {
        const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
        const response = await fetch(`/api/commandes/${commandeId}`, {
            method: 'DELETE',
            headers: {
                'Authorization': `Bearer ${accessToken}`,
                'Accept': 'application/json'
            }
        });

        if (response.ok) {
            showToast('Commande supprimée avec succès', 'success');
            setTimeout(() => {
                window.location.href = '/commandes';
            }, 1500);
        } else {
            const data = await response.json();
            throw new Error(data.message || 'Erreur lors de la suppression');
        }
    } catch (error) {
        console.error('Erreur lors de la suppression:', error);
        showToast('Erreur lors de la suppression: ' + error.message, 'error');
    }
}

// Initialisation
document.addEventListener('DOMContentLoaded', function() {
    // Récupérer l'ID de la commande depuis l'URL
    const path = window.location.pathname;
    const matches = path.match(/\/commande\/([^\/]+)/);
    
    if (matches && matches[1]) {
        commandeId = matches[1];
        loadCommandeDetails();
    } else {
        showError('ID de commande manquant dans l\'URL');
    }
});
</script>

<!-- Modal pour créer un mouvement de stock -->
<div class="modal fade" id="stockMovementModal" tabindex="-1" aria-labelledby="stockMovementModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="stockMovementModalLabel">
                    <i class="bi-box-seam me-2 text-warning"></i>
                    Créer un Mouvement de Stock
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="stockMovementForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="entrepotSelect" class="form-label">Entrepôt de Destination <span class="text-danger">*</span></label>
                            <select class="form-select" id="entrepotSelect" required>
                                <option value="">Sélectionner un entrepôt...</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="movementNote" class="form-label">Note</label>
                            <input type="text" class="form-control" id="movementNote" placeholder="Ex: Réception commande #CMD-2025-001">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Produits à recevoir</label>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Produit</th>
                                        <th>Quantité Commandée</th>
                                        <th>Quantité à Recevoir</th>
                                    </tr>
                                </thead>
                                <tbody id="productsTableBody">
                                    <!-- Les produits seront ajoutés dynamiquement -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="validateImmediately" checked>
                        <label class="form-check-label" for="validateImmediately">
                            Valider immédiatement (mise à jour du stock en temps réel)
                        </label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-warning" onclick="createStockMovement()">
                    <i class="bi-box-seam me-1"></i> Créer le Mouvement
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal pour recevoir en entrepôt -->
<div class="modal fade" id="transferModal" tabindex="-1" aria-labelledby="transferModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transferModalLabel">
                    <i class="bi-arrow-right-circle me-2 text-info"></i>
                    Recevoir en Entrepôt
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="transferForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="fournisseurInfo" class="form-label">Fournisseur</label>
                            <input type="text" class="form-control" id="fournisseurInfo" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="destinationEntrepotSelect" class="form-label">Entrepôt de Destination <span class="text-danger">*</span></label>
                            <select class="form-select" id="destinationEntrepotSelect" required>
                                <option value="">Sélectionner l'entrepôt destination...</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="transferNote" class="form-label">Note</label>
                        <input type="text" class="form-control" id="transferNote" placeholder="Ex: Réception commande #CMD-2025-001">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Produits à recevoir</label>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Produit</th>
                                        <th>Quantité Commandée</th>
                                        <th>Quantité à Recevoir</th>
                                    </tr>
                                </thead>
                                <tbody id="transferProductsTableBody">
                                    <!-- Les produits seront ajoutés dynamiquement -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="validateTransferImmediately" checked>
                        <label class="form-check-label" for="validateTransferImmediately">
                            Valider immédiatement (mise à jour du stock en temps réel)
                        </label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-info" onclick="createTransfer()">
                    <i class="bi-arrow-right-circle me-1"></i> Créer la Réception
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal pour payer la commande -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">
                    <i class="bi-credit-card me-2 text-success"></i>
                    Payer la Commande
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="paymentForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="paymentAmount" class="form-label">Montant à Payer <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="paymentAmount" step="0.01" min="0" required>
                                <span class="input-group-text">F CFA</span>
                            </div>
                            <div class="form-text">Montant restant: <span id="remainingAmount">0</span> F CFA</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="paymentMethod" class="form-label">Mode de Paiement <span class="text-danger">*</span></label>
                            <select class="form-select" id="paymentMethod" onchange="togglePaymentFields()" required>
                                <option value="">Sélectionner un mode de paiement...</option>
                                <option value="especes">Espèces</option>
                                <option value="mobile_money">Mobile Money</option>
                                <option value="virement">Virement bancaire</option>
                                <option value="cheque">Chèque</option>
                                <option value="carte">Carte bancaire</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="paymentDate" class="form-label">Date de Paiement <span class="text-danger">*</span></label>
                            <input type="datetime-local" class="form-control" id="paymentDate" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="paymentStatus" class="form-label">Statut <span class="text-danger">*</span></label>
                            <select class="form-select" id="paymentStatus" required>
                                <option value="valide">Validé</option>
                                <option value="en_attente">En attente</option>
                                <option value="echec">Échec</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Champs conditionnels selon le mode de paiement -->
                    <div id="mobileMoneyFields" class="row" style="display: none;">
                        <div class="col-md-6 mb-3">
                            <label for="transactionNumber" class="form-label">Numéro de Transaction</label>
                            <input type="text" class="form-control" id="transactionNumber" placeholder="Ex: TRX123456789">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="operator" class="form-label">Opérateur</label>
                            <select class="form-select" id="operator">
                                <option value="">Sélectionner un opérateur...</option>
                                <option value="MTN">MTN</option>
                                <option value="Orange">Orange</option>
                                <option value="Moov">Moov</option>
                            </select>
                        </div>
                    </div>
                    
                    <div id="bankFields" class="row" style="display: none;">
                        <div class="col-md-6 mb-3">
                            <label for="bankName" class="form-label">Nom de la Banque</label>
                            <input type="text" class="form-control" id="bankName" placeholder="Ex: Bank of Africa">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="checkNumber" class="form-label">Numéro de Chèque</label>
                            <input type="text" class="form-control" id="checkNumber" placeholder="Ex: CHQ987654">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="paymentNote" class="form-label">Note</label>
                        <textarea class="form-control" id="paymentNote" rows="3" placeholder="Ex: Paiement partiel de la commande #CMD-2025-001"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-success" onclick="createPayment()">
                    <i class="bi-credit-card me-1"></i> Enregistrer le Paiement
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal pour lister les paiements -->
<div class="modal fade" id="paymentsListModal" tabindex="-1" aria-labelledby="paymentsListModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentsListModalLabel">
                    <i class="bi-list-ul me-2 text-info"></i>
                    Paiements de la Commande
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Résumé des paiements -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body text-center">
                                <h6 class="card-title">Montant Total</h6>
                                <h4 id="totalAmount">0 F CFA</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-success text-white">
                            <div class="card-body text-center">
                                <h6 class="card-title">Montant Payé</h6>
                                <h4 id="paidAmount">0 F CFA</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-warning text-white">
                            <div class="card-body text-center">
                                <h6 class="card-title">Montant Restant</h6>
                                <h4 id="remainingAmountSummary">0 F CFA</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-info text-white">
                            <div class="card-body text-center">
                                <h6 class="card-title">Statut</h6>
                                <h4 id="paymentStatus">-</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tableau des paiements -->
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Référence</th>
                                <th>Montant</th>
                                <th>Mode de Paiement</th>
                                <th>Statut</th>
                                <th>Date de Paiement</th>
                                <th>Note</th>
                            </tr>
                        </thead>
                        <tbody id="paymentsTableBody">
                            <tr>
                                <td colspan="6" class="text-center">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="visually-hidden">Chargement...</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Message si aucun paiement -->
                <div id="noPaymentsMessage" class="text-center py-4" style="display: none;">
                    <i class="bi-credit-card text-muted" style="font-size: 3rem;"></i>
                    <h5 class="text-muted mt-3">Aucun paiement enregistré</h5>
                    <p class="text-muted">Cette commande n'a pas encore de paiements enregistrés.</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-success" onclick="openPaymentModal()">
                    <i class="bi-plus-circle me-1"></i> Nouveau Paiement
                </button>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require './views/layouts/app-layout.php'; ?>