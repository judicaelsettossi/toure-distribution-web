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

    .vente-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, #d1036d 100%);
        color: white;
        padding: 2rem;
        border-radius: 12px 12px 0 0;
    }

    .vente-icon-large {
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

    .badge-annulee {
        background-color: #f8d7da;
        color: #721c24;
    }

    .table-modern {
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .table-modern thead {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        color: black;
    }

    .table-modern thead th {
        border: none;
        font-weight: 600;
        padding: 1rem;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .table-modern tbody td {
        border: none;
        padding: 1rem;
        vertical-align: middle;
        border-bottom: 1px solid #f1f3f4;
    }

    .table-modern tbody tr:last-child td {
        border-bottom: none;
    }

    .table-modern tbody tr:hover {
        background-color: #f8f9fa;
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

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stats-card {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        border: none;
        text-align: center;
    }

    .stats-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin: 0 auto 1rem;
    }

    .stats-icon.primary {
        background: var(--light-primary);
        color: var(--primary-color);
    }

    .stats-icon.success {
        background: #d4edda;
        color: #28a745;
    }

    .stats-icon.warning {
        background: #fff3cd;
        color: #ffc107;
    }

    .stats-icon.info {
        background: #d1ecf1;
        color: #17a2b8;
    }

    .stats-value {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .stats-label {
        color: #6c757d;
        font-size: 0.875rem;
        font-weight: 500;
    }
</style>

<main class="main">
    <div class="content px-4 py-4">
        <!-- Loading State -->
        <div class="loading-spinner text-center py-5" id="loadingState">
            <div class="spinner-border text-primary-custom" role="status">
                <span class="visually-hidden">Chargement...</span>
            </div>
            <p class="mt-3 text-muted">Chargement des détails de la vente...</p>
        </div>

        <!-- Error State -->
        <div class="error-message alert alert-danger-custom alert-custom" id="errorState">
            <i class="bi-exclamation-triangle me-2"></i>
            <span id="errorMessage">Une erreur est survenue lors du chargement des détails de la vente.</span>
        </div>

        <!-- Success State -->
        <div class="success-message alert alert-success-custom alert-custom" id="successState">
            <i class="bi-check-circle me-2"></i>
            <span id="successMessage">Action effectuée avec succès !</span>
        </div>

        <!-- Vente Details Container -->
        <div id="venteDetailsContainer" style="display: none;">
            <!-- Header -->
            <div class="card card-custom mb-4">
                <div class="vente-header">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="d-flex align-items-center">
                                <div class="vente-icon-large me-4">
                                    <i class="bi-cart-check"></i>
                                </div>
                                <div>
                                    <h1 class="h2 mb-2 font-public-sans" id="venteTitle">Détails de la Vente</h1>
                                    <p class="mb-0 opacity-75" id="venteSubtitle">Informations complètes de la vente</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-end">
                            <div class="d-flex gap-2 justify-content-end">
                                <button class="btn btn-outline-modern" onclick="window.history.back()">
                                    <i class="bi-arrow-left me-1"></i> Retour
                                </button>
                                <button class="btn btn-outline-modern" onclick="window.location.href='/vente'">
                                    <i class="bi-list me-1"></i> Liste des Ventes
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="stats-grid" id="statsCards">
                <div class="stats-card">
                    <div class="stats-icon primary">
                        <i class="bi-cart-check"></i>
                    </div>
                    <div class="stats-value text-primary-custom" id="totalAmount">0 F CFA</div>
                    <div class="stats-label">Montant Total</div>
                </div>
                <div class="stats-card">
                    <div class="stats-icon success">
                        <i class="bi-person-check"></i>
                    </div>
                    <div class="stats-value text-success" id="clientName">-</div>
                    <div class="stats-label">Client</div>
                </div>
                <div class="stats-card">
                    <div class="stats-icon info">
                        <i class="bi-building"></i>
                    </div>
                    <div class="stats-value text-info" id="entrepotName">-</div>
                    <div class="stats-label">Entrepôt</div>
                </div>
                <div class="stats-card">
                    <div class="stats-icon warning">
                        <i class="bi-flag"></i>
                    </div>
                    <div class="stats-value text-warning" id="venteStatus">-</div>
                    <div class="stats-label">Statut</div>
                </div>
            </div>

            <!-- Informations principales -->
            <div class="row">
                <div class="col-lg-8">
                    <!-- Informations de la vente -->
                    <div class="card card-custom mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi-info-circle me-2"></i>Informations de la Vente
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">Numéro de Vente</div>
                                        <div class="info-value" id="numeroVente">-</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">Date de Vente</div>
                                        <div class="info-value" id="dateVente">-</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">Client</div>
                                        <div class="info-value" id="clientInfo">-</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">Entrepôt Source</div>
                                        <div class="info-value" id="entrepotInfo">-</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">Montant Total</div>
                                        <div class="info-value fw-bold text-success" id="montantTotal">-</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">Remise</div>
                                        <div class="info-value" id="remise">-</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">Statut</div>
                                        <div class="info-value">
                                            <span class="badge-status" id="statusBadge">-</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">Date de Création</div>
                                        <div class="info-value" id="dateCreation">-</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="noteRow" style="display: none;">
                                <div class="col-12">
                                    <div class="info-item">
                                        <div class="info-label">Notes</div>
                                        <div class="info-value" id="note">-</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Produits vendus -->
                    <div class="card card-custom mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi-box me-2"></i>Produits Vendus
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
                                            <th>Sous-total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="produitsTableBody">
                                        <tr>
                                            <td colspan="4" class="text-center py-4">
                                                <div class="spinner-border text-primary" role="status">
                                                    <span class="visually-hidden">Chargement...</span>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions rapides -->
                <div class="col-lg-4">
                    <div class="card card-custom mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi-lightning me-2"></i>Actions Rapides
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary-custom" onclick="editVente()" id="editVenteBtn">
                                    <i class="bi-pencil me-2"></i>Modifier la Vente
                                </button>
                                <button class="btn btn-success" onclick="openPaymentModal()" id="payVenteBtn">
                                    <i class="bi-credit-card me-2"></i>Payer la Facture
                                </button>
                                <button class="btn btn-info" onclick="viewPayments()" id="viewPaymentsBtn">
                                    <i class="bi-list-check me-2"></i>Liste des Paiements
                                </button>
                                <button class="btn btn-outline-modern" onclick="printVente()">
                                    <i class="bi-printer me-2"></i>Imprimer
                                </button>
                                <button class="btn btn-outline-modern" onclick="exportVente()">
                                    <i class="bi-download me-2"></i>Exporter PDF
                                </button>
                                <button class="btn btn-outline-danger" onclick="deleteVente()" id="deleteVenteBtn">
                                    <i class="bi-trash me-2"></i>Supprimer
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Informations système -->
                    <div class="card card-custom">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi-gear me-2"></i>Informations Système
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="info-item">
                                <div class="info-label">ID de la Vente</div>
                                <div class="info-value font-monospace small" id="venteId">-</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Créé le</div>
                                <div class="info-value" id="createdAt">-</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Modifié le</div>
                                <div class="info-value" id="updatedAt">-</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modal de Paiement -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">
                    <i class="bi-credit-card me-2"></i>Payer la Facture
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="paymentForm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="montantPaiement" class="form-label">Montant à Payer <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="montantPaiement" name="montant" step="0.01" min="0" required>
                                <div class="form-text">Montant restant: <span id="montantRestant">0 F CFA</span></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="modePaiement" class="form-label">Mode de Paiement <span class="text-danger">*</span></label>
                                <select class="form-select" id="modePaiement" name="mode_paiement" required>
                                    <option value="">Sélectionner un mode</option>
                                    <option value="especes">Espèces</option>
                                    <option value="cheque">Chèque</option>
                                    <option value="virement">Virement</option>
                                    <option value="carte_bancaire">Carte Bancaire</option>
                                    <option value="mobile_money">Mobile Money</option>
                                    <option value="credit">Crédit</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="datePaiement" class="form-label">Date de Paiement <span class="text-danger">*</span></label>
                                <input type="datetime-local" class="form-control" id="datePaiement" name="date_paiement" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="statutPaiement" class="form-label">Statut du Paiement</label>
                                <select class="form-select" id="statutPaiement" name="statut">
                                    <option value="en_attente">En Attente</option>
                                    <option value="valide" selected>Validé</option>
                                    <option value="refuse">Refusé</option>
                                    <option value="annule">Annulé</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Champs conditionnels -->
                    <div id="transactionFields" style="display: none;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="numeroTransaction" class="form-label">Numéro de Transaction</label>
                                    <input type="text" class="form-control" id="numeroTransaction" name="numero_transaction">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="chequeFields" style="display: none;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="numeroCheque" class="form-label">Numéro de Chèque</label>
                                    <input type="text" class="form-control" id="numeroCheque" name="numero_cheque">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="banque" class="form-label">Banque</label>
                                    <input type="text" class="form-control" id="banque" name="banque">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="notePaiement" class="form-label">Notes</label>
                        <textarea class="form-control" id="notePaiement" name="note" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-success" onclick="submitPayment()">
                    <i class="bi-check-circle me-2"></i>Enregistrer le Paiement
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Liste des Paiements -->
<div class="modal fade" id="paymentsModal" tabindex="-1" aria-labelledby="paymentsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentsModalLabel">
                    <i class="bi-list-check me-2"></i>Liste des Paiements
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-modern">
                        <thead>
                            <tr>
                                <th>Référence</th>
                                <th>Montant</th>
                                <th>Mode</th>
                                <th>Statut</th>
                                <th>Date</th>
                                <th>Transaction</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="paymentsTableBody">
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="visually-hidden">Chargement...</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Variables globales
    let venteData = null;
    let venteId = null;

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
        document.getElementById('venteDetailsContainer').style.display = 'none';
        document.getElementById('errorState').style.display = 'none';
        document.getElementById('successState').style.display = 'none';
    }

    // Fonction pour masquer le loading
    function hideLoading() {
        document.getElementById('loadingState').style.display = 'none';
        document.getElementById('venteDetailsContainer').style.display = 'block';
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

    // Fonction pour charger les détails de la vente
    async function loadVenteDetails() {
        try {
            const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
            
            if (!accessToken) {
                showError('Token d\'authentification manquant');
                return;
            }

            const response = await fetch(`/api/ventes/${venteId}`, {
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

            const result = await response.json();
            console.log('Réponse API vente:', result); // Debug log
            
            if (result.success && result.data) {
                venteData = result.data;
                displayVenteDetails();
                await loadVenteProducts();
            } else {
                throw new Error(result.message || 'Erreur lors du chargement des détails de la vente');
            }

        } catch (error) {
            console.error('Erreur lors du chargement des détails:', error);
            showError('Erreur lors du chargement des détails: ' + error.message);
        }
    }

    // Fonction pour charger les produits de la vente
    async function loadVenteProducts() {
        try {
            const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
            
            const response = await fetch(`/api/detail-ventes/vente/${venteId}`, {
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
                console.log('Réponse API produits:', result); // Debug log
                
                if (result.success && result.data) {
                    // Vérifier si result.data est un tableau
                    if (Array.isArray(result.data)) {
                        displayVenteProducts(result.data);
                    } else {
                        console.warn('Les données des produits ne sont pas un tableau:', result.data);
                        displayVenteProducts([]);
                    }
                } else {
                    console.warn('Aucune donnée de produits trouvée:', result);
                    displayVenteProducts([]);
                }
            } else {
                console.error('Erreur HTTP lors du chargement des produits:', response.status);
                displayVenteProducts([]);
            }

        } catch (error) {
            console.error('Erreur lors du chargement des produits:', error);
            displayVenteProducts([]);
        }
    }

    // Fonction pour afficher les détails de la vente
    function displayVenteDetails() {
        if (!venteData) return;

        // Titre et sous-titre
        document.getElementById('venteTitle').textContent = `Vente ${venteData.numero_vente || 'N/A'}`;
        document.getElementById('venteSubtitle').textContent = `Créée le ${formatDate(venteData.created_at)}`;

        // Stats cards
        document.getElementById('totalAmount').textContent = formatPrice(venteData.montant_total);
        document.getElementById('clientName').textContent = venteData.client?.name || 'N/A';
        document.getElementById('entrepotName').textContent = venteData.entrepot?.name || 'N/A';
        document.getElementById('venteStatus').textContent = getStatusLabel(venteData.status);

        // Informations principales
        document.getElementById('numeroVente').textContent = venteData.numero_vente || 'N/A';
        document.getElementById('dateVente').textContent = formatDate(venteData.date_vente);
        document.getElementById('clientInfo').textContent = venteData.client?.name || 'N/A';
        document.getElementById('entrepotInfo').textContent = venteData.entrepot?.name || 'N/A';
        document.getElementById('montantTotal').textContent = formatPrice(venteData.montant_total);
        document.getElementById('remise').textContent = formatPrice(venteData.remise || 0);
        document.getElementById('statusBadge').textContent = getStatusLabel(venteData.status);
        document.getElementById('statusBadge').className = `badge-status badge-${getStatusClass(venteData.status)}`;
        document.getElementById('dateCreation').textContent = formatDate(venteData.created_at);

        // Note
        if (venteData.note) {
            document.getElementById('note').textContent = venteData.note;
            document.getElementById('noteRow').style.display = 'block';
        }

        // Informations système
        document.getElementById('venteId').textContent = venteData.vente_id;
        document.getElementById('createdAt').textContent = formatDateTime(venteData.created_at);
        document.getElementById('updatedAt').textContent = formatDateTime(venteData.updated_at);
    }

    // Fonction pour afficher les produits de la vente
    function displayVenteProducts(products) {
        const tbody = document.getElementById('produitsTableBody');
        
        // Vérifier si products est un tableau
        if (!products || !Array.isArray(products) || products.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="4" class="text-center py-4 text-muted">
                        <i class="bi-box me-2"></i>Aucun produit trouvé
                    </td>
                </tr>
            `;
            return;
        }

        tbody.innerHTML = products.map(product => `
            <tr>
                <td>
                    <div class="fw-semibold">${product.product?.name || 'N/A'}</div>
                    <small class="text-muted">${product.product?.code || ''}</small>
                </td>
                <td>${product.quantite}</td>
                <td>${formatPrice(product.prix_unitaire)}</td>
                <td class="fw-semibold text-success">${formatPrice(product.quantite * product.prix_unitaire)}</td>
            </tr>
        `).join('');
    }

    // Fonctions utilitaires
    function formatPrice(price) {
        if (!price) return '0 F CFA';
        return new Intl.NumberFormat('fr-FR').format(parseFloat(price)) + ' F CFA';
    }

    function formatDate(dateString) {
        if (!dateString) return 'N/A';
        return new Date(dateString).toLocaleDateString('fr-FR');
    }

    function formatDateTime(dateString) {
        if (!dateString) return 'N/A';
        return new Date(dateString).toLocaleString('fr-FR');
    }

    function getStatusLabel(status) {
        const labels = {
            'en_attente': 'En Attente',
            'validee': 'Validée',
            'annulee': 'Annulée'
        };
        return labels[status] || status;
    }

    function getStatusClass(status) {
        const classes = {
            'en_attente': 'en-attente',
            'validee': 'validee',
            'annulee': 'annulee'
        };
        return classes[status] || 'en-attente';
    }

    // Actions
    function editVente() {
        window.location.href = `/vente/${venteId}/edit`;
    }

    // Fonctions de paiement
    function openPaymentModal() {
        if (!venteData) {
            showToast('Aucune donnée de vente disponible', 'warning');
            return;
        }

        // Calculer le montant restant
        const montantTotal = parseFloat(venteData.montant_total) || 0;
        const montantPaye = parseFloat(venteData.montant_paye) || 0;
        const montantRestant = montantTotal - montantPaye;

        // Mettre à jour l'affichage
        document.getElementById('montantRestant').textContent = formatPrice(montantRestant);
        document.getElementById('montantPaiement').max = montantRestant;
        document.getElementById('montantPaiement').value = montantRestant;

        // Définir la date actuelle
        const now = new Date();
        const dateString = now.toISOString().slice(0, 16);
        document.getElementById('datePaiement').value = dateString;

        // Afficher la modal
        const modal = new bootstrap.Modal(document.getElementById('paymentModal'));
        modal.show();
    }

    function submitPayment() {
        const form = document.getElementById('paymentForm');
        const formData = new FormData(form);
        
        // Validation
        const montant = parseFloat(formData.get('montant'));
        const modePaiement = formData.get('mode_paiement');
        const datePaiement = formData.get('date_paiement');

        if (!montant || montant <= 0) {
            showToast('Veuillez saisir un montant valide', 'warning');
            return;
        }

        if (!modePaiement) {
            showToast('Veuillez sélectionner un mode de paiement', 'warning');
            return;
        }

        if (!datePaiement) {
            showToast('Veuillez saisir une date de paiement', 'warning');
            return;
        }

        // Préparer les données
        const paymentData = {
            vente_id: venteId,
            montant: montant,
            mode_paiement: modePaiement,
            statut: formData.get('statut') || 'valide',
            date_paiement: datePaiement,
            numero_transaction: formData.get('numero_transaction') || null,
            numero_cheque: formData.get('numero_cheque') || null,
            banque: formData.get('banque') || null,
            note: formData.get('note') || null
        };

        // Envoyer le paiement
        createPayment(paymentData);
    }

    async function createPayment(paymentData) {
        try {
            const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
            
            const response = await fetch('/api/paiement-ventes', {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                credentials: 'include',
                body: JSON.stringify(paymentData)
            });

            const result = await response.json();

            if (response.ok && result.success) {
                showToast('Paiement enregistré avec succès', 'success');
                
                // Fermer la modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('paymentModal'));
                modal.hide();
                
                // Recharger les détails de la vente
                await loadVenteDetails();
                
                // Réinitialiser le formulaire
                document.getElementById('paymentForm').reset();
            } else {
                let errorMessage = result.message || 'Erreur lors de l\'enregistrement du paiement';
                
                if (result.errors) {
                    const errorDetails = Object.entries(result.errors)
                        .map(([field, messages]) => `${field}: ${Array.isArray(messages) ? messages.join(', ') : messages}`)
                        .join('\n');
                    errorMessage += '\n\nDétails:\n' + errorDetails;
                }
                
                throw new Error(errorMessage);
            }

        } catch (error) {
            console.error('Erreur lors de la création du paiement:', error);
            showToast('Erreur lors de la création du paiement: ' + error.message, 'error');
        }
    }

    function viewPayments() {
        const modal = new bootstrap.Modal(document.getElementById('paymentsModal'));
        modal.show();
        loadPayments();
    }

    async function loadPayments() {
        try {
            const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
            
            const response = await fetch(`/api/paiement-ventes?vente_id=${venteId}&per_page=50`, {
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
                displayPayments(result.data?.data || []);
            } else {
                throw new Error(`Erreur HTTP: ${response.status}`);
            }

        } catch (error) {
            console.error('Erreur lors du chargement des paiements:', error);
            displayPayments([]);
        }
    }

    function displayPayments(payments) {
        const tbody = document.getElementById('paymentsTableBody');
        
        if (!payments || payments.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="7" class="text-center py-4 text-muted">
                        <i class="bi-credit-card me-2"></i>Aucun paiement trouvé
                    </td>
                </tr>
            `;
            return;
        }

        tbody.innerHTML = payments.map(payment => `
            <tr>
                <td>
                    <div class="fw-semibold">${payment.reference_paiement || 'N/A'}</div>
                </td>
                <td class="fw-semibold text-success">${formatPrice(payment.montant)}</td>
                <td>
                    <span class="badge bg-info">${getPaymentModeLabel(payment.mode_paiement)}</span>
                </td>
                <td>
                    <span class="badge ${getPaymentStatusClass(payment.statut)}">${getPaymentStatusLabel(payment.statut)}</span>
                </td>
                <td>${formatDateTime(payment.date_paiement)}</td>
                <td>
                    ${payment.numero_transaction ? `<small class="text-muted">${payment.numero_transaction}</small>` : '-'}
                </td>
                <td>
                    <button class="btn btn-sm btn-outline-primary" onclick="viewPaymentDetails('${payment.paiement_vente_id}')">
                        <i class="bi-eye"></i>
                    </button>
                </td>
            </tr>
        `).join('');
    }

    function getPaymentModeLabel(mode) {
        const labels = {
            'especes': 'Espèces',
            'cheque': 'Chèque',
            'virement': 'Virement',
            'carte_bancaire': 'Carte Bancaire',
            'mobile_money': 'Mobile Money',
            'credit': 'Crédit'
        };
        return labels[mode] || mode;
    }

    function getPaymentStatusLabel(status) {
        const labels = {
            'en_attente': 'En Attente',
            'valide': 'Validé',
            'refuse': 'Refusé',
            'annule': 'Annulé'
        };
        return labels[status] || status;
    }

    function getPaymentStatusClass(status) {
        const classes = {
            'en_attente': 'bg-warning',
            'valide': 'bg-success',
            'refuse': 'bg-danger',
            'annule': 'bg-secondary'
        };
        return classes[status] || 'bg-secondary';
    }

    function viewPaymentDetails(paymentId) {
        // TODO: Implémenter la vue des détails d'un paiement
        showToast('Fonctionnalité de détails de paiement en cours de développement', 'info');
    }

    function printVente() {
        if (!venteData) {
            showToast('Aucune donnée de vente à imprimer', 'warning');
            return;
        }

        try {
            // Récupérer les produits de la vente
            const produits = document.querySelectorAll('#produitsTableBody tr');
            let produitsHtml = '';
            
            if (produits.length > 0 && !produits[0].querySelector('.text-muted')) {
                produits.forEach(tr => {
                    const cells = tr.querySelectorAll('td');
                    if (cells.length >= 4) {
                        const produit = cells[0].textContent.trim();
                        const quantite = cells[1].textContent.trim();
                        const prixUnitaire = cells[2].textContent.trim();
                        const sousTotal = cells[3].textContent.trim();
                        
                        produitsHtml += `
                            <tr>
                                <td>${produit}</td>
                                <td>${quantite}</td>
                                <td>${prixUnitaire}</td>
                                <td>${sousTotal}</td>
                            </tr>
                        `;
                    }
                });
            }

            // Générer le contenu HTML pour l'impression
            const htmlContent = `
                <!DOCTYPE html>
                <html>
                <head>
                    <meta charset="utf-8">
                    <title>Détails de la Vente - ${venteData.numero_vente || 'N/A'}</title>
                    <style>
                        @media print {
                            body { margin: 0; }
                            .no-print { display: none !important; }
                        }
                        body { 
                            font-family: Arial, sans-serif; 
                            margin: 20px; 
                            color: #333;
                        }
                        .header { 
                            text-align: center; 
                            margin-bottom: 30px; 
                            border-bottom: 3px solid #f00480;
                            padding-bottom: 20px;
                        }
                        .header h1 { 
                            color: #f00480; 
                            margin: 0 0 10px 0;
                            font-size: 28px;
                        }
                        .header p { 
                            color: #666; 
                            margin: 0;
                            font-size: 14px;
                        }
                        .info-section {
                            margin-bottom: 25px;
                        }
                        .info-section h3 {
                            color: #f00480;
                            border-bottom: 2px solid #f00480;
                            padding-bottom: 5px;
                            margin-bottom: 15px;
                        }
                        .info-grid {
                            display: grid;
                            grid-template-columns: 1fr 1fr;
                            gap: 15px;
                            margin-bottom: 20px;
                        }
                        .info-item {
                            padding: 10px;
                            background: #f8f9fa;
                            border-radius: 5px;
                        }
                        .info-label {
                            font-weight: bold;
                            color: #666;
                            font-size: 12px;
                            text-transform: uppercase;
                            margin-bottom: 5px;
                        }
                        .info-value {
                            font-size: 14px;
                            color: #333;
                        }
                        .table {
                            width: 100%;
                            border-collapse: collapse;
                            margin-top: 20px;
                        }
                        .table th {
                            background: #f00480;
                            color: white;
                            padding: 12px;
                            text-align: left;
                            font-weight: bold;
                            font-size: 12px;
                            text-transform: uppercase;
                        }
                        .table td {
                            padding: 10px 12px;
                            border-bottom: 1px solid #ddd;
                            font-size: 13px;
                        }
                        .table tr:nth-child(even) {
                            background-color: #f8f9fa;
                        }
                        .total-section {
                            margin-top: 20px;
                            text-align: right;
                        }
                        .total-item {
                            display: flex;
                            justify-content: space-between;
                            margin-bottom: 5px;
                            padding: 5px 0;
                        }
                        .total-final {
                            font-size: 18px;
                            font-weight: bold;
                            color: #f00480;
                            border-top: 2px solid #f00480;
                            padding-top: 10px;
                            margin-top: 10px;
                        }
                        .footer {
                            margin-top: 40px;
                            text-align: center;
                            color: #666;
                            font-size: 12px;
                            border-top: 1px solid #ddd;
                            padding-top: 20px;
                        }
                        .status-badge {
                            display: inline-block;
                            padding: 4px 12px;
                            border-radius: 15px;
                            font-size: 11px;
                            font-weight: bold;
                            text-transform: uppercase;
                        }
                        .status-en-attente {
                            background-color: #fff3cd;
                            color: #856404;
                        }
                        .status-validee {
                            background-color: #d4edda;
                            color: #155724;
                        }
                        .status-annulee {
                            background-color: #f8d7da;
                            color: #721c24;
                        }
                    </style>
                </head>
                <body>
                    <div class="header">
                        <h1>Détails de la Vente</h1>
                        <p>Numéro: ${venteData.numero_vente || 'N/A'} | Généré le ${new Date().toLocaleDateString('fr-FR')} à ${new Date().toLocaleTimeString('fr-FR')}</p>
                    </div>

                    <div class="info-section">
                        <h3>Informations de la Vente</h3>
                        <div class="info-grid">
                            <div class="info-item">
                                <div class="info-label">Numéro de Vente</div>
                                <div class="info-value">${venteData.numero_vente || 'N/A'}</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Date de Vente</div>
                                <div class="info-value">${formatDate(venteData.date_vente)}</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Client</div>
                                <div class="info-value">${venteData.client?.name || 'N/A'}</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Entrepôt Source</div>
                                <div class="info-value">${venteData.entrepot?.name || 'N/A'}</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Statut</div>
                                <div class="info-value">
                                    <span class="status-badge status-${getStatusClass(venteData.status)}">
                                        ${getStatusLabel(venteData.status)}
                                    </span>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Date de Création</div>
                                <div class="info-value">${formatDateTime(venteData.created_at)}</div>
                            </div>
                        </div>
                        ${venteData.note ? `
                            <div class="info-item">
                                <div class="info-label">Notes</div>
                                <div class="info-value">${venteData.note}</div>
                            </div>
                        ` : ''}
                    </div>

                    <div class="info-section">
                        <h3>Produits Vendus</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Produit</th>
                                    <th>Quantité</th>
                                    <th>Prix Unitaire</th>
                                    <th>Sous-total</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${produitsHtml || `
                                    <tr>
                                        <td colspan="4" style="text-align: center; color: #666; font-style: italic;">
                                            Aucun produit trouvé
                                        </td>
                                    </tr>
                                `}
                            </tbody>
                        </table>
                    </div>

                    <div class="total-section">
                        <div class="total-item">
                            <span>Montant Total:</span>
                            <span>${formatPrice(venteData.montant_total)}</span>
                        </div>
                        ${venteData.remise && parseFloat(venteData.remise) > 0 ? `
                            <div class="total-item">
                                <span>Remise:</span>
                                <span>-${formatPrice(venteData.remise)}</span>
                            </div>
                        ` : ''}
                        <div class="total-item total-final">
                            <span>Total Final:</span>
                            <span>${formatPrice(venteData.montant_total - (parseFloat(venteData.remise) || 0))}</span>
                        </div>
                    </div>

                    <div class="footer">
                        <p>Document généré automatiquement par le système de gestion des ventes</p>
                        <p>ID de la vente: ${venteData.vente_id}</p>
                    </div>
                </body>
                </html>
            `;

            // Ouvrir dans une nouvelle fenêtre et imprimer
            const printWindow = window.open('', '_blank');
            printWindow.document.write(htmlContent);
            printWindow.document.close();
            printWindow.focus();
            
            // Attendre que le contenu soit chargé puis imprimer
            printWindow.onload = function() {
                setTimeout(() => {
                    printWindow.print();
                }, 500);
            };
            
            showToast('Impression lancée avec succès', 'success');

        } catch (error) {
            console.error('Erreur lors de l\'impression:', error);
            showToast('Erreur lors de l\'impression: ' + error.message, 'error');
        }
    }

    function exportVente() {
        if (!venteData) {
            showToast('Aucune donnée de vente à exporter', 'warning');
            return;
        }

        try {
            // Récupérer les produits de la vente
            const produits = document.querySelectorAll('#produitsTableBody tr');
            let produitsHtml = '';
            
            if (produits.length > 0 && !produits[0].querySelector('.text-muted')) {
                produits.forEach(tr => {
                    const cells = tr.querySelectorAll('td');
                    if (cells.length >= 4) {
                        const produit = cells[0].textContent.trim();
                        const quantite = cells[1].textContent.trim();
                        const prixUnitaire = cells[2].textContent.trim();
                        const sousTotal = cells[3].textContent.trim();
                        
                        produitsHtml += `
                            <tr>
                                <td>${produit}</td>
                                <td>${quantite}</td>
                                <td>${prixUnitaire}</td>
                                <td>${sousTotal}</td>
                            </tr>
                        `;
                    }
                });
            }

            // Générer le contenu HTML du PDF
            const htmlContent = `
                <!DOCTYPE html>
                <html>
                <head>
                    <meta charset="utf-8">
                    <title>Détails de la Vente - ${venteData.numero_vente || 'N/A'}</title>
                    <style>
                        body { 
                            font-family: Arial, sans-serif; 
                            margin: 20px; 
                            color: #333;
                        }
                        .header { 
                            text-align: center; 
                            margin-bottom: 30px; 
                            border-bottom: 3px solid #f00480;
                            padding-bottom: 20px;
                        }
                        .header h1 { 
                            color: #f00480; 
                            margin: 0 0 10px 0;
                            font-size: 28px;
                        }
                        .header p { 
                            color: #666; 
                            margin: 0;
                            font-size: 14px;
                        }
                        .info-section {
                            margin-bottom: 25px;
                        }
                        .info-section h3 {
                            color: #f00480;
                            border-bottom: 2px solid #f00480;
                            padding-bottom: 5px;
                            margin-bottom: 15px;
                        }
                        .info-grid {
                            display: grid;
                            grid-template-columns: 1fr 1fr;
                            gap: 15px;
                            margin-bottom: 20px;
                        }
                        .info-item {
                            padding: 10px;
                            background: #f8f9fa;
                            border-radius: 5px;
                        }
                        .info-label {
                            font-weight: bold;
                            color: #666;
                            font-size: 12px;
                            text-transform: uppercase;
                            margin-bottom: 5px;
                        }
                        .info-value {
                            font-size: 14px;
                            color: #333;
                        }
                        .table {
                            width: 100%;
                            border-collapse: collapse;
                            margin-top: 20px;
                        }
                        .table th {
                            background: #f00480;
                            color: white;
                            padding: 12px;
                            text-align: left;
                            font-weight: bold;
                            font-size: 12px;
                            text-transform: uppercase;
                        }
                        .table td {
                            padding: 10px 12px;
                            border-bottom: 1px solid #ddd;
                            font-size: 13px;
                        }
                        .table tr:nth-child(even) {
                            background-color: #f8f9fa;
                        }
                        .total-section {
                            margin-top: 20px;
                            text-align: right;
                        }
                        .total-item {
                            display: flex;
                            justify-content: space-between;
                            margin-bottom: 5px;
                            padding: 5px 0;
                        }
                        .total-final {
                            font-size: 18px;
                            font-weight: bold;
                            color: #f00480;
                            border-top: 2px solid #f00480;
                            padding-top: 10px;
                            margin-top: 10px;
                        }
                        .footer {
                            margin-top: 40px;
                            text-align: center;
                            color: #666;
                            font-size: 12px;
                            border-top: 1px solid #ddd;
                            padding-top: 20px;
                        }
                        .status-badge {
                            display: inline-block;
                            padding: 4px 12px;
                            border-radius: 15px;
                            font-size: 11px;
                            font-weight: bold;
                            text-transform: uppercase;
                        }
                        .status-en-attente {
                            background-color: #fff3cd;
                            color: #856404;
                        }
                        .status-validee {
                            background-color: #d4edda;
                            color: #155724;
                        }
                        .status-annulee {
                            background-color: #f8d7da;
                            color: #721c24;
                        }
                    </style>
                </head>
                <body>
                    <div class="header">
                        <h1>Détails de la Vente</h1>
                        <p>Numéro: ${venteData.numero_vente || 'N/A'} | Généré le ${new Date().toLocaleDateString('fr-FR')} à ${new Date().toLocaleTimeString('fr-FR')}</p>
                    </div>

                    <div class="info-section">
                        <h3>Informations de la Vente</h3>
                        <div class="info-grid">
                            <div class="info-item">
                                <div class="info-label">Numéro de Vente</div>
                                <div class="info-value">${venteData.numero_vente || 'N/A'}</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Date de Vente</div>
                                <div class="info-value">${formatDate(venteData.date_vente)}</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Client</div>
                                <div class="info-value">${venteData.client?.name || 'N/A'}</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Entrepôt Source</div>
                                <div class="info-value">${venteData.entrepot?.name || 'N/A'}</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Statut</div>
                                <div class="info-value">
                                    <span class="status-badge status-${getStatusClass(venteData.status)}">
                                        ${getStatusLabel(venteData.status)}
                                    </span>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Date de Création</div>
                                <div class="info-value">${formatDateTime(venteData.created_at)}</div>
                            </div>
                        </div>
                        ${venteData.note ? `
                            <div class="info-item">
                                <div class="info-label">Notes</div>
                                <div class="info-value">${venteData.note}</div>
                            </div>
                        ` : ''}
                    </div>

                    <div class="info-section">
                        <h3>Produits Vendus</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Produit</th>
                                    <th>Quantité</th>
                                    <th>Prix Unitaire</th>
                                    <th>Sous-total</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${produitsHtml || `
                                    <tr>
                                        <td colspan="4" style="text-align: center; color: #666; font-style: italic;">
                                            Aucun produit trouvé
                                        </td>
                                    </tr>
                                `}
                            </tbody>
                        </table>
                    </div>

                    <div class="total-section">
                        <div class="total-item">
                            <span>Montant Total:</span>
                            <span>${formatPrice(venteData.montant_total)}</span>
                        </div>
                        ${venteData.remise && parseFloat(venteData.remise) > 0 ? `
                            <div class="total-item">
                                <span>Remise:</span>
                                <span>-${formatPrice(venteData.remise)}</span>
                            </div>
                        ` : ''}
                        <div class="total-item total-final">
                            <span>Total Final:</span>
                            <span>${formatPrice(venteData.montant_total - (parseFloat(venteData.remise) || 0))}</span>
                        </div>
                    </div>

                    <div class="footer">
                        <p>Document généré automatiquement par le système de gestion des ventes</p>
                        <p>ID de la vente: ${venteData.vente_id}</p>
                    </div>
                </body>
                </html>
            `;

            // Ouvrir dans une nouvelle fenêtre et imprimer
            const printWindow = window.open('', '_blank');
            printWindow.document.write(htmlContent);
            printWindow.document.close();
            printWindow.focus();
            
            // Attendre que le contenu soit chargé puis imprimer
            printWindow.onload = function() {
                setTimeout(() => {
                    printWindow.print();
                    printWindow.close();
                }, 500);
            };
            
            showToast('Export PDF lancé avec succès', 'success');

        } catch (error) {
            console.error('Erreur lors de l\'export PDF:', error);
            showToast('Erreur lors de l\'export PDF: ' + error.message, 'error');
        }
    }

    function deleteVente() {
        if (confirm('Êtes-vous sûr de vouloir supprimer cette vente ?')) {
            // TODO: Implémenter la suppression
            showToast('Fonctionnalité de suppression en cours de développement', 'info');
        }
    }

    // Fonction pour afficher les toasts
    function showToast(message, type = 'info') {
        const toastContainer = document.getElementById('toastContainer') || createToastContainer();
        
        const toast = document.createElement('div');
        toast.className = `toast align-items-center text-white bg-${type === 'success' ? 'success' : type === 'error' ? 'danger' : type === 'warning' ? 'warning' : 'info'} border-0`;
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
        // Récupérer l'ID de la vente depuis l'URL
        const pathParts = window.location.pathname.split('/');
        venteId = pathParts[pathParts.length - 1];
        
        if (!venteId) {
            showError('ID de vente manquant');
            return;
        }

        // Gestion des champs conditionnels dans la modal de paiement
        const modePaiementSelect = document.getElementById('modePaiement');
        if (modePaiementSelect) {
            modePaiementSelect.addEventListener('change', function() {
                const selectedMode = this.value;
                const transactionFields = document.getElementById('transactionFields');
                const chequeFields = document.getElementById('chequeFields');
                
                // Masquer tous les champs conditionnels
                if (transactionFields) transactionFields.style.display = 'none';
                if (chequeFields) chequeFields.style.display = 'none';
                
                // Afficher les champs appropriés
                if (['mobile_money', 'carte_bancaire', 'virement'].includes(selectedMode)) {
                    if (transactionFields) transactionFields.style.display = 'block';
                } else if (selectedMode === 'cheque') {
                    if (chequeFields) chequeFields.style.display = 'block';
                }
            });
        }

        // Charger les détails
        showLoading();
        loadVenteDetails().then(() => {
            hideLoading();
        });
    });
</script>

<?php $content = ob_get_clean(); ?>
<?php require './views/layouts/app-layout.php'; ?>
