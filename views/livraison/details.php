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

    .livraison-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, #d1036d 100%);
        color: white;
        padding: 2rem;
        border-radius: 12px 12px 0 0;
    }

    .livraison-icon-large {
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

    .badge-en-preparation {
        background-color: #fff3cd;
        color: #856404;
    }

    .badge-prete {
        background-color: #d1ecf1;
        color: #0c5460;
    }

    .badge-en-transit {
        background-color: #cce5ff;
        color: #004085;
    }

    .badge-livree {
        background-color: #d4edda;
        color: #155724;
    }

    .badge-annulee {
        background-color: #f8d7da;
        color: #721c24;
    }

    .badge-en-retard {
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
            <p class="mt-3 text-muted">Chargement des détails de la livraison...</p>
        </div>

        <!-- Error State -->
        <div class="error-message alert alert-danger-custom alert-custom" id="errorState">
            <i class="bi-exclamation-triangle me-2"></i>
            <span id="errorMessage">Une erreur est survenue lors du chargement des détails de la livraison.</span>
        </div>

        <!-- Success State -->
        <div class="success-message alert alert-success-custom alert-custom" id="successState">
            <i class="bi-check-circle me-2"></i>
            <span id="successMessage">Action effectuée avec succès !</span>
        </div>

        <!-- Livraison Details Container -->
        <div id="livraisonDetailsContainer" style="display: none;">
            <!-- Header -->
            <div class="card card-custom mb-4">
                <div class="livraison-header">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="d-flex align-items-center">
                                <div class="livraison-icon-large me-4">
                                    <i class="bi-truck"></i>
                                </div>
                                <div>
                                    <h1 class="h2 mb-2 font-public-sans" id="livraisonTitle">Détails de la Livraison</h1>
                                    <p class="mb-0 opacity-75" id="livraisonSubtitle">Informations complètes de la livraison</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-end">
                            <div class="d-flex gap-2 justify-content-end">
                                <button class="btn btn-outline-modern" onclick="window.history.back()">
                                    <i class="bi-arrow-left me-1"></i> Retour
                                </button>
                                <button class="btn btn-outline-modern" onclick="window.location.href='/livraison'">
                                    <i class="bi-list me-1"></i> Liste des Livraisons
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
                        <i class="bi-truck"></i>
                    </div>
                    <div class="stats-value text-primary-custom" id="referenceLivraison">-</div>
                    <div class="stats-label">Référence</div>
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
                        <i class="bi-person-badge"></i>
                    </div>
                    <div class="stats-value text-info" id="chauffeurName">-</div>
                    <div class="stats-label">Chauffeur</div>
                </div>
                <div class="stats-card">
                    <div class="stats-icon warning">
                        <i class="bi-flag"></i>
                    </div>
                    <div class="stats-value text-warning" id="livraisonStatus">-</div>
                    <div class="stats-label">Statut</div>
                </div>
            </div>

            <!-- Informations principales -->
            <div class="row">
                <div class="col-lg-8">
                    <!-- Informations de la livraison -->
                    <div class="card card-custom mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi-info-circle me-2"></i>Informations de la Livraison
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">Référence</div>
                                        <div class="info-value" id="reference">-</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">Date de Livraison Prévue</div>
                                        <div class="info-value" id="dateLivraisonPrevue">-</div>
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
                                        <div class="info-label">Chauffeur</div>
                                        <div class="info-value" id="chauffeurInfo">-</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">Camion</div>
                                        <div class="info-value" id="camionInfo">-</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">Statut</div>
                                        <div class="info-value">
                                            <span class="badge-status" id="statusBadge">-</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="info-item">
                                        <div class="info-label">Adresse de Livraison</div>
                                        <div class="info-value" id="adresseLivraison">-</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">Contact sur Place</div>
                                        <div class="info-value" id="contactLivraison">-</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">Téléphone</div>
                                        <div class="info-value" id="telephoneLivraison">-</div>
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

                    <!-- Produits à livrer -->
                    <div class="card card-custom mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi-box me-2"></i>Produits à Livrer
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-modern mb-0">
                                    <thead>
                                        <tr>
                                            <th>Produit</th>
                                            <th>Quantité Commandée</th>
                                            <th>Quantité Préparée</th>
                                            <th>Quantité Livrée</th>
                                            <th>Quantité Retournée</th>
                                            <th>Statut</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="produitsTableBody">
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
                                <button class="btn btn-primary-custom" onclick="editLivraison()" id="editLivraisonBtn">
                                    <i class="bi-pencil me-2"></i>Modifier la Livraison
                                </button>
                                <button class="btn btn-success" onclick="startDelivery()" id="startDeliveryBtn" style="display: none;">
                                    <i class="bi-play-circle me-2"></i>Démarrer la Livraison
                                </button>
                                <button class="btn btn-warning" onclick="completeDelivery()" id="completeDeliveryBtn" style="display: none;">
                                    <i class="bi-check-circle me-2"></i>Terminer la Livraison
                                </button>
                                <button class="btn btn-danger" onclick="cancelDelivery()" id="cancelDeliveryBtn" style="display: none;">
                                    <i class="bi-x-circle me-2"></i>Annuler la Livraison
                                </button>
                                <button class="btn btn-outline-modern" onclick="printLivraison()">
                                    <i class="bi-printer me-2"></i>Imprimer
                                </button>
                                <button class="btn btn-outline-modern" onclick="exportLivraison()">
                                    <i class="bi-download me-2"></i>Exporter PDF
                                </button>
                                <button class="btn btn-outline-danger" onclick="deleteLivraison()" id="deleteLivraisonBtn">
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
                                <div class="info-label">ID de la Livraison</div>
                                <div class="info-value font-monospace small" id="livraisonId">-</div>
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

<script>
    // Variables globales
    let livraisonData = null;
    let livraisonId = null;

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
        document.getElementById('livraisonDetailsContainer').style.display = 'none';
        document.getElementById('errorState').style.display = 'none';
        document.getElementById('successState').style.display = 'none';
    }

    // Fonction pour masquer le loading
    function hideLoading() {
        document.getElementById('loadingState').style.display = 'none';
        document.getElementById('livraisonDetailsContainer').style.display = 'block';
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

    // Fonction pour charger les détails de la livraison
    async function loadLivraisonDetails() {
        try {
            const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
            
            if (!accessToken) {
                showError('Token d\'authentification manquant');
                return;
            }

            const response = await fetch(`/api/livraisons/${livraisonId}`, {
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
            console.log('Réponse API livraison:', result); // Debug log
            
            if (result.success && result.data) {
                livraisonData = result.data;
                displayLivraisonDetails();
                await loadDeliveryDetails();
            } else {
                throw new Error(result.message || 'Erreur lors du chargement des détails de la livraison');
            }

        } catch (error) {
            console.error('Erreur lors du chargement des détails:', error);
            showError('Erreur lors du chargement des détails: ' + error.message);
        }
    }

    // Fonction pour charger les détails de livraison (produits)
    async function loadDeliveryDetails() {
        try {
            const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
            
            const response = await fetch(`/api/delivery-details/delivery/${livraisonId}`, {
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
                console.log('Réponse API détails livraison:', result); // Debug log
                
                if (result.success && result.data) {
                    // Vérifier si result.data est un tableau
                    if (Array.isArray(result.data)) {
                        displayDeliveryDetails(result.data);
                    } else {
                        console.warn('Les données des détails de livraison ne sont pas un tableau:', result.data);
                        displayDeliveryDetails([]);
                    }
                } else {
                    console.warn('Aucune donnée de détails de livraison trouvée:', result);
                    displayDeliveryDetails([]);
                }
            } else {
                console.error('Erreur HTTP lors du chargement des détails de livraison:', response.status);
                displayDeliveryDetails([]);
            }

        } catch (error) {
            console.error('Erreur lors du chargement des détails de livraison:', error);
            displayDeliveryDetails([]);
        }
    }

    // Fonction pour afficher les détails de la livraison
    function displayLivraisonDetails() {
        if (!livraisonData) return;

        // Titre et sous-titre
        document.getElementById('livraisonTitle').textContent = `Livraison ${livraisonData.reference || 'N/A'}`;
        document.getElementById('livraisonSubtitle').textContent = `Créée le ${formatDate(livraisonData.created_at)}`;

        // Stats cards
        document.getElementById('referenceLivraison').textContent = livraisonData.reference || 'N/A';
        document.getElementById('clientName').textContent = livraisonData.vente?.client?.name || 'N/A';
        document.getElementById('chauffeurName').textContent = livraisonData.chauffeur?.nom || 'N/A';
        document.getElementById('livraisonStatus').textContent = getStatusLabel(livraisonData.statut);

        // Informations principales
        document.getElementById('reference').textContent = livraisonData.reference || 'N/A';
        document.getElementById('dateLivraisonPrevue').textContent = formatDateTime(livraisonData.date_livraison_prevue);
        document.getElementById('clientInfo').textContent = livraisonData.vente?.client?.name || 'N/A';
        document.getElementById('chauffeurInfo').textContent = livraisonData.chauffeur?.nom || 'N/A';
        document.getElementById('camionInfo').textContent = livraisonData.camion?.immatriculation || 'N/A';
        document.getElementById('statusBadge').textContent = getStatusLabel(livraisonData.statut);
        document.getElementById('statusBadge').className = `badge-status badge-${getStatusClass(livraisonData.statut)}`;
        document.getElementById('adresseLivraison').textContent = livraisonData.adresse_livraison || 'N/A';
        document.getElementById('contactLivraison').textContent = livraisonData.contact_livraison || 'N/A';
        document.getElementById('telephoneLivraison').textContent = livraisonData.telephone_livraison || 'N/A';

        // Note
        if (livraisonData.note) {
            document.getElementById('note').textContent = livraisonData.note;
            document.getElementById('noteRow').style.display = 'block';
        }

        // Informations système
        document.getElementById('livraisonId').textContent = livraisonData.livraison_id;
        document.getElementById('createdAt').textContent = formatDateTime(livraisonData.created_at);
        document.getElementById('updatedAt').textContent = formatDateTime(livraisonData.updated_at);

        // Afficher/masquer les boutons selon le statut
        updateActionButtons(livraisonData.statut);
    }

    // Fonction pour afficher les détails de livraison (produits)
    function displayDeliveryDetails(details) {
        const tbody = document.getElementById('produitsTableBody');
        
        if (!details || details.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="7" class="text-center py-4 text-muted">
                        <i class="bi-box me-2"></i>Aucun produit trouvé
                    </td>
                </tr>
            `;
            return;
        }

        tbody.innerHTML = details.map(detail => `
            <tr>
                <td>
                    <div class="fw-semibold">${detail.product?.name || 'N/A'}</div>
                    <small class="text-muted">${detail.product?.code || ''}</small>
                </td>
                <td>${detail.quantite_commandee || 0}</td>
                <td>${detail.quantite_preparee || 0}</td>
                <td>${detail.quantite_livree || 0}</td>
                <td>${detail.quantite_retournee || 0}</td>
                <td>
                    <span class="badge ${getDetailStatusClass(detail.statut)}">${getDetailStatusLabel(detail.statut)}</span>
                </td>
                <td>
                    <div class="d-flex gap-1">
                        <button class="btn btn-sm btn-outline-primary" onclick="viewDetail('${detail.delivery_detail_id}')" title="Voir">
                            <i class="bi-eye"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-success" onclick="prepareProduct('${detail.delivery_detail_id}')" title="Préparer">
                            <i class="bi-check-circle"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-warning" onclick="deliverProduct('${detail.delivery_detail_id}')" title="Livrer">
                            <i class="bi-truck"></i>
                        </button>
                    </div>
                </td>
            </tr>
        `).join('');
    }

    // Fonction pour mettre à jour les boutons d'action selon le statut
    function updateActionButtons(statut) {
        const startBtn = document.getElementById('startDeliveryBtn');
        const completeBtn = document.getElementById('completeDeliveryBtn');
        const cancelBtn = document.getElementById('cancelDeliveryBtn');

        // Masquer tous les boutons d'action
        startBtn.style.display = 'none';
        completeBtn.style.display = 'none';
        cancelBtn.style.display = 'none';

        // Afficher les boutons selon le statut
        switch (statut) {
            case 'en_preparation':
            case 'prete':
                startBtn.style.display = 'block';
                cancelBtn.style.display = 'block';
                break;
            case 'en_transit':
                completeBtn.style.display = 'block';
                cancelBtn.style.display = 'block';
                break;
        }
    }

    // Fonctions utilitaires
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
            'en_preparation': 'En Préparation',
            'prete': 'Prête',
            'en_transit': 'En Transit',
            'livree': 'Livrée',
            'annulee': 'Annulée',
            'en_retard': 'En Retard'
        };
        return labels[status] || status;
    }

    function getStatusClass(status) {
        const classes = {
            'en_preparation': 'en-preparation',
            'prete': 'prete',
            'en_transit': 'en-transit',
            'livree': 'livree',
            'annulee': 'annulee',
            'en_retard': 'en-retard'
        };
        return classes[status] || 'en-preparation';
    }

    function getDetailStatusLabel(status) {
        const labels = {
            'en_attente': 'En Attente',
            'prete': 'Prêt',
            'livree': 'Livré',
            'retourne': 'Retourné'
        };
        return labels[status] || status;
    }

    function getDetailStatusClass(status) {
        const classes = {
            'en_attente': 'bg-warning',
            'prete': 'bg-info',
            'livree': 'bg-success',
            'retourne': 'bg-danger'
        };
        return classes[status] || 'bg-secondary';
    }

    // Actions
    function editLivraison() {
        window.location.href = `/livraison/${livraisonId}/edit`;
    }

    function startDelivery() {
        if (confirm('Êtes-vous sûr de vouloir démarrer cette livraison ?')) {
            // TODO: Implémenter le démarrage de livraison
            showToast('Fonctionnalité de démarrage de livraison en cours de développement', 'info');
        }
    }

    function completeDelivery() {
        if (confirm('Êtes-vous sûr de vouloir terminer cette livraison ?')) {
            // TODO: Implémenter la finalisation de livraison
            showToast('Fonctionnalité de finalisation de livraison en cours de développement', 'info');
        }
    }

    function cancelDelivery() {
        if (confirm('Êtes-vous sûr de vouloir annuler cette livraison ?')) {
            // TODO: Implémenter l'annulation de livraison
            showToast('Fonctionnalité d\'annulation de livraison en cours de développement', 'info');
        }
    }

    function printLivraison() {
        window.print();
    }

    function exportLivraison() {
        // TODO: Implémenter l'export PDF
        showToast('Fonctionnalité d\'export PDF en cours de développement', 'info');
    }

    function deleteLivraison() {
        if (confirm('Êtes-vous sûr de vouloir supprimer cette livraison ?')) {
            // TODO: Implémenter la suppression
            showToast('Fonctionnalité de suppression en cours de développement', 'info');
        }
    }

    function viewDetail(detailId) {
        // TODO: Implémenter la vue des détails d'un produit
        showToast('Fonctionnalité de détails de produit en cours de développement', 'info');
    }

    function prepareProduct(detailId) {
        // TODO: Implémenter la préparation d'un produit
        showToast('Fonctionnalité de préparation de produit en cours de développement', 'info');
    }

    function deliverProduct(detailId) {
        // TODO: Implémenter la livraison d'un produit
        showToast('Fonctionnalité de livraison de produit en cours de développement', 'info');
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
        // Récupérer l'ID de la livraison depuis l'URL
        const pathParts = window.location.pathname.split('/');
        livraisonId = pathParts[pathParts.length - 1];
        
        if (!livraisonId) {
            showError('ID de livraison manquant');
            return;
        }

        // Charger les détails
        showLoading();
        loadLivraisonDetails().then(() => {
            hideLoading();
        });
    });
</script>

<?php $content = ob_get_clean(); ?>
<?php require './views/layouts/app-layout.php'; ?>

