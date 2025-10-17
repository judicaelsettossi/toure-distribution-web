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

    .warehouse-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, #d1036d 100%);
        color: white;
        padding: 2rem;
        border-radius: 12px 12px 0 0;
    }

    .warehouse-avatar-large {
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

    .capacity-progress {
        height: 30px;
        border-radius: 8px;
        background-color: #e9ecef;
        position: relative;
        overflow: hidden;
    }

    .capacity-progress-bar {
        background: linear-gradient(90deg, var(--primary-color) 0%, #d1036d 100%);
        height: 100%;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        font-size: 0.875rem;
        transition: width 0.3s ease;
    }

    .badge-type {
        background-color: var(--light-primary);
        color: var(--primary-color);
        border-radius: 8px;
        padding: 0.5rem 1rem;
        font-weight: 500;
    }

    .badge-status {
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 500;
    }

    .stat-box {
        padding: 1.5rem;
        background: linear-gradient(135deg, var(--light-primary) 0%, #f8f9fa 100%);
        border-radius: 10px;
        text-align: center;
        border: 1px solid #e9ecef;
    }

    .stat-value {
        font-size: 2rem;
        color: var(--secondary-color);
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .stat-label {
        color: #6c757d;
        font-size: 0.875rem;
        margin-top: 0.5rem;
    }

    .section-coming-soon {
        opacity: 0.7;
    }

    .section-coming-soon .card-header {
        background-color: #f8f9fa;
    }

    .section-coming-soon .card-title {
        color: #6c757d;
    }

    /* Modal styles */
    .modal-content {
        border-radius: 12px;
        border: none;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .modal-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, #d1036d 100%);
        color: white;
        border-radius: 12px 12px 0 0;
        padding: 1.5rem 2rem;
        border-bottom: none;
    }

    .modal-title {
        font-weight: 600;
        font-size: 1.25rem;
    }

    .modal-body {
        padding: 2rem;
    }

    .modal-footer {
        padding: 1rem 2rem 2rem;
    }

    .modal-footer .btn {
        border-radius: 8px;
        font-weight: 500;
        padding: 0.75rem 1.5rem;
    }

    .modal-footer .btn-danger {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        border: none;
        box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
    }

    .modal-footer .btn-danger:hover {
        background: linear-gradient(135deg, #c82333 0%, #bd2130 100%);
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(220, 53, 69, 0.4);
    }

    .modal-footer .btn-outline-secondary {
        border-color: #6c757d;
        color: #6c757d;
    }

    .modal-footer .btn-outline-secondary:hover {
        background-color: #6c757d;
        border-color: #6c757d;
        color: white;
    }

    /* Modal de toggle status */
    .modal-footer .btn-success {
        background: linear-gradient(135deg, #198754 0%, #157347 100%);
        border: none;
        box-shadow: 0 4px 15px rgba(25, 135, 84, 0.3);
    }

    .modal-footer .btn-success:hover {
        background: linear-gradient(135deg, #157347 0%, #146c43 100%);
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(25, 135, 84, 0.4);
    }

    .modal-footer .btn-warning {
        background: linear-gradient(135deg, #ffc107 0%, #ffb300 100%);
        border: none;
        box-shadow: 0 4px 15px rgba(255, 193, 7, 0.3);
    }

    .modal-footer .btn-warning:hover {
        background: linear-gradient(135deg, #ffb300 0%, #ffa000 100%);
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(255, 193, 7, 0.4);
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
                                    href="/liste-entrepot">Entrepôts</a></li>
                            <li class="breadcrumb-item active" id="warehouseNameBreadcrumb">Détails</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-sm-auto">
                    <button class="btn btn-outline-secondary me-2" onclick="window.history.back()">
                        <i class="bi-arrow-left me-1"></i> Retour
                    </button>
                    <button class="btn btn-primary-custom" onclick="editWarehouse()">
                        <i class="bi-pencil me-1"></i> Modifier
                    </button>
                </div>
            </div>
        </div>

        <div id="loadingState" class="text-center py-5">
            <div class="spinner-border text-primary-custom" role="status">
                <span class="visually-hidden">Chargement...</span>
            </div>
            <p class="mt-3 text-muted">Chargement des informations de l'entrepôt...</p>
        </div>

        <div id="warehouseContent" style="display: none;">
            <!-- Warehouse Header Card -->
            <div class="card card-custom mb-4">
                <div class="warehouse-header">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="warehouse-avatar-large" id="warehouseAvatar">E</div>
                        </div>
                        <div class="col">
                            <h2 class="mb-1" id="warehouseName">-</h2>
                            <p class="mb-2 opacity-75">
                                <i class="bi-tag me-2"></i>
                                <span id="warehouseCode">-</span>
                            </p>
                            <div class="d-flex align-items-center gap-3">
                                <span class="badge badge-type" id="warehouseTypeBadge">Entrepôt</span>
                                <span class="badge badge-status" id="warehouseStatusBadge">-</span>
                            </div>
                        </div>
                        <div class="col-auto text-end">
                            <div class="btn-group">
                                <button class="btn btn-light" onclick="toggleWarehouseStatus()" id="toggleStatusBtn">
                                    <i class="bi-toggle-off me-1"></i> Activer/Désactiver
                                </button>
                                <button class="btn btn-danger" onclick="confirmDeleteWarehouse()">
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
                                <i class="bi-building me-2 text-primary-custom"></i>
                                Informations Générales
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="info-item">
                                <div class="info-label">Nom de l'Entrepôt</div>
                                <div class="info-value" id="name">-</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Code</div>
                                <div class="info-value" id="code">-</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Description</div>
                                <div class="info-value" id="description">-</div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact & Localisation -->
                    <div class="card card-custom mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi-geo-alt me-2 text-primary-custom"></i>
                                Contact & Localisation
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="info-item">
                                <div class="info-label">Email</div>
                                <div class="info-value">
                                    <a href="mailto:" id="email" class="text-primary-custom">-</a>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Téléphone</div>
                                <div class="info-value">
                                    <a href="tel:" id="phone" class="text-primary-custom">-</a>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Adresse</div>
                                <div class="info-value" id="adresse">-</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Ville</div>
                                <div class="info-value" id="city">-</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Code Postal</div>
                                <div class="info-value" id="postal_code">-</div>
                            </div>
                        </div>
                    </div>

                    <!-- Historique des Mouvements -->
                    <div class="card card-custom mb-4 section-coming-soon">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi-arrow-left-right me-2"></i>
                                Historique des Mouvements
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="text-center text-muted py-4">
                                <i class="bi-arrow-left-right fs-1"></i>
                                <p class="mt-2">Aucun mouvement disponible</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Capacité -->
                    <div class="card card-custom mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi-box-seam me-2 text-primary-custom"></i>
                                Capacité
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted small">Capacité Totale</span>
                                    <span class="fw-bold" id="totalCapacity">-</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted small">Stock Actuel</span>
                                    <span class="fw-bold" id="currentStock">-</span>
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <span class="text-muted small">Espace Disponible</span>
                                    <span class="fw-bold text-success" id="availableSpace">-</span>
                                </div>

                                <label class="small text-muted mb-2">Utilisation de l'Espace</label>
                                <div class="capacity-progress">
                                    <div class="capacity-progress-bar" id="capacityProgressBar" style="width: 0%;">
                                        0%
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
                                <div class="col-6">
                                    <div class="stat-box">
                                        <div class="stat-value" id="totalProducts">0</div>
                                        <div class="stat-label">Produits</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="stat-box">
                                        <div class="stat-value" id="totalMovements">0</div>
                                        <div class="stat-label">Mouvements</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informations Système -->
                    <div class="card card-custom mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi-info-circle me-2 text-primary-custom"></i>
                                Informations Système
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="info-item">
                                <div class="info-label">Date de Création</div>
                                <div class="info-value" id="created_at">-</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Dernière Modification</div>
                                <div class="info-value" id="updated_at">-</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Error State -->
        <div id="errorState" class="text-center py-5" style="display: none;">
            <div class="text-danger mb-3">
                <i class="bi-exclamation-triangle fs-1"></i>
            </div>
            <h5 class="text-danger mb-3">Erreur de chargement</h5>
            <p class="text-muted mb-4" id="errorMessage">Une erreur est survenue lors du chargement des informations de l'entrepôt.</p>
            <button class="btn btn-primary-custom" onclick="loadWarehouseData()">
                <i class="bi-arrow-clockwise me-1"></i> Réessayer
            </button>
        </div>
    </div>
</main>

<!-- Modal de confirmation de suppression -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmModalLabel">
                    <i class="bi-exclamation-triangle me-2"></i>
                    Confirmer la suppression
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mb-3">Êtes-vous sûr de vouloir supprimer cet entrepôt ?</p>
                <div class="alert alert-warning">
                    <i class="bi-exclamation-triangle me-2"></i>
                    <strong>Attention :</strong> Cette action est irréversible et supprimera toutes les données associées à cet entrepôt.
                </div>
                <p class="mb-0"><strong>Entrepôt :</strong> <span id="deleteWarehouseName">-</span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Supprimer</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de confirmation de changement de statut -->
<div class="modal fade" id="toggleStatusModal" tabindex="-1" aria-labelledby="toggleStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="toggleStatusModalLabel">
                    <i class="bi-toggle-on me-2"></i>
                    Changer le statut
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mb-3" id="toggleStatusMessage">-</p>
                <div class="alert alert-info">
                    <i class="bi-info-circle me-2"></i>
                    <span id="toggleStatusInfo">-</span>
                </div>
                <p class="mb-0"><strong>Entrepôt :</strong> <span id="toggleWarehouseName">-</span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn" id="confirmToggleBtn">Confirmer</button>
            </div>
        </div>
    </div>
</div>

<script>
    let currentWarehouseId = null;
    let currentWarehouse = null;

    // Fonction pour récupérer un cookie
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Vérifier l'authentification
        const accessToken = getCookie('access_token');
        const connected = getCookie('connected');
        
        if (!connected || !accessToken) {
            window.location.href = '/login';
            return;
        }
        
        // Récupérer l'ID de l'entrepôt depuis l'URL
        const pathParts = window.location.pathname.split('/');
        console.log('URL actuelle:', window.location.pathname);
        console.log('Parties de l\'URL:', pathParts);
        
        currentWarehouseId = pathParts[pathParts.length - 2]; // /entrepot/{id}/details
        console.log('ID extrait:', currentWarehouseId);
        
        if (currentWarehouseId && currentWarehouseId !== 'details') {
            loadWarehouseData();
        } else {
            showError('ID de l\'entrepôt non trouvé dans l\'URL');
        }
    });

    async function loadWarehouseData() {
        try {
            showLoading();
            
            // Récupérer le token depuis les cookies
            const accessToken = getCookie('access_token');
            console.log('Token récupéré:', accessToken ? 'Présent' : 'Manquant');
            
            if (!accessToken) {
                throw new Error('Token d\'authentification manquant. Veuillez vous reconnecter.');
            }

            const apiUrl = `https://toure.gestiem.com/api/entrepots/${currentWarehouseId}`;
            console.log('URL de l\'API:', apiUrl);
            console.log('ID de l\'entrepôt:', currentWarehouseId);

            const response = await fetch(apiUrl, {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            console.log('Réponse HTTP:', response.status, response.statusText);

            if (!response.ok) {
                const errorText = await response.text();
                console.error('Erreur de réponse:', errorText);
                
                if (response.status === 404) {
                    throw new Error('Entrepôt non trouvé');
                } else if (response.status === 401) {
                    throw new Error('Session expirée. Veuillez vous reconnecter.');
                } else {
                    throw new Error(`Erreur HTTP ${response.status}: ${errorText}`);
                }
            }

            const result = await response.json();
            console.log('Données reçues:', result);
            
            // L'API retourne directement les données de l'entrepôt
            if (result.entrepot_id || result.id) {
                currentWarehouse = result;
                displayWarehouseData(currentWarehouse);
                hideLoading();
            } else if (result.success && result.data) {
                // Structure alternative avec success/data
                currentWarehouse = result.data;
                displayWarehouseData(currentWarehouse);
                hideLoading();
            } else {
                console.error('Structure de réponse invalide:', result);
                throw new Error(result.message || 'Erreur lors du chargement des données');
            }

        } catch (error) {
            console.error('Erreur lors du chargement de l\'entrepôt:', error);
            showError(error.message);
        }
    }

    function displayWarehouseData(warehouse) {
        // Header
        document.getElementById('warehouseAvatar').textContent = getWarehouseInitials(warehouse.name || 'Entrepôt');
        document.getElementById('warehouseName').textContent = warehouse.name || 'Nom non défini';
        document.getElementById('warehouseCode').textContent = warehouse.code || 'Code non défini';
        document.getElementById('warehouseNameBreadcrumb').textContent = warehouse.name || 'Détails';

        // Status badge (is_active peut être 1/0 ou true/false)
        const statusBadge = document.getElementById('warehouseStatusBadge');
        const isActive = warehouse.is_active === 1 || warehouse.is_active === true;
        if (isActive) {
            statusBadge.textContent = 'Actif';
            statusBadge.className = 'badge badge-status bg-success';
        } else {
            statusBadge.textContent = 'Inactif';
            statusBadge.className = 'badge badge-status bg-secondary';
        }

        // Toggle button
        const toggleBtn = document.getElementById('toggleStatusBtn');
        if (isActive) {
            toggleBtn.innerHTML = '<i class="bi-toggle-on me-1"></i> Désactiver';
        } else {
            toggleBtn.innerHTML = '<i class="bi-toggle-off me-1"></i> Activer';
        }

        // Informations générales
        document.getElementById('name').textContent = warehouse.name || '-';
        document.getElementById('code').textContent = warehouse.code || '-';
        document.getElementById('description').textContent = warehouse.description || 'Aucune description';

        // Contact & Localisation
        const emailLink = document.getElementById('email');
        if (warehouse.email) {
            emailLink.textContent = warehouse.email;
            emailLink.href = `mailto:${warehouse.email}`;
        } else {
            emailLink.textContent = '-';
            emailLink.href = '#';
        }

        const phoneLink = document.getElementById('phone');
        if (warehouse.phone) {
            phoneLink.textContent = warehouse.phone;
            phoneLink.href = `tel:${warehouse.phone}`;
        } else {
            phoneLink.textContent = '-';
            phoneLink.href = '#';
        }

        document.getElementById('adresse').textContent = warehouse.adresse || '-';
        document.getElementById('city').textContent = warehouse.city || '-';
        document.getElementById('postal_code').textContent = warehouse.postal_code || '-';

        // Capacité (données fictives pour l'instant)
        document.getElementById('totalCapacity').textContent = '1000 m³';
        document.getElementById('currentStock').textContent = '250 m³';
        document.getElementById('availableSpace').textContent = '750 m³';
        
        const capacityProgress = 25; // 25% d'utilisation
        const progressBar = document.getElementById('capacityProgressBar');
        progressBar.style.width = `${capacityProgress}%`;
        progressBar.textContent = `${capacityProgress}%`;

        // Statistiques (données fictives pour l'instant)
        document.getElementById('totalProducts').textContent = '45';
        document.getElementById('totalMovements').textContent = '12';

        // Informations système
        document.getElementById('created_at').textContent = warehouse.created_at ? 
            new Date(warehouse.created_at).toLocaleDateString('fr-FR') : '-';
        document.getElementById('updated_at').textContent = warehouse.updated_at ? 
            new Date(warehouse.updated_at).toLocaleDateString('fr-FR') : '-';
    }

    function getWarehouseInitials(name) {
        if (!name) return 'E';
        const words = name.split(' ');
        if (words.length >= 2) {
            return (words[0][0] + words[1][0]).toUpperCase();
        }
        return name.substring(0, 2).toUpperCase();
    }

    function showLoading() {
        document.getElementById('loadingState').style.display = 'block';
        document.getElementById('warehouseContent').style.display = 'none';
        document.getElementById('errorState').style.display = 'none';
    }

    function hideLoading() {
        document.getElementById('loadingState').style.display = 'none';
        document.getElementById('warehouseContent').style.display = 'block';
        document.getElementById('errorState').style.display = 'none';
    }

    function showError(message) {
        document.getElementById('loadingState').style.display = 'none';
        document.getElementById('warehouseContent').style.display = 'none';
        document.getElementById('errorState').style.display = 'block';
        document.getElementById('errorMessage').textContent = message;
    }

    function editWarehouse() {
        if (currentWarehouseId) {
            window.location.href = `/entrepot/${currentWarehouseId}/modifier`;
        }
    }

    function confirmDeleteWarehouse() {
        if (!currentWarehouse) return;
        
        document.getElementById('deleteWarehouseName').textContent = currentWarehouse.name || 'Entrepôt';
        
        const modal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
        modal.show();

        // Gérer la confirmation
        document.getElementById('confirmDeleteBtn').onclick = function() {
            deleteWarehouse();
        };
    }

    async function deleteWarehouse() {
        try {
            const accessToken = getCookie('access_token');
            console.log('Suppression de l\'entrepôt:', currentWarehouseId);
            
            const response = await fetch(`https://toure.gestiem.com/api/entrepots/${currentWarehouseId}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            console.log('Réponse suppression:', response.status, response.statusText);

            if (!response.ok) {
                const errorText = await response.text();
                console.error('Erreur de réponse suppression:', errorText);
                throw new Error(`Erreur HTTP ${response.status}: ${errorText}`);
            }

            // Vérifier si la réponse contient du contenu
            const responseText = await response.text();
            console.log('Réponse texte:', responseText);

            let result;
            if (responseText.trim()) {
                try {
                    result = JSON.parse(responseText);
                    console.log('Résultat JSON:', result);
                } catch (jsonError) {
                    console.error('Erreur parsing JSON:', jsonError);
                    // Si ce n'est pas du JSON valide mais que le statut est 200, considérer comme succès
                    if (response.status === 200) {
                        result = { success: true };
                    } else {
                        throw new Error('Réponse invalide du serveur');
                    }
                }
            } else {
                // Réponse vide, mais statut 200 = succès
                console.log('Réponse vide, mais statut 200 - considéré comme succès');
                result = { success: true };
            }
            
            if (result.success || response.status === 200) {
                showToast('Entrepôt supprimé avec succès', 'success');
                setTimeout(() => {
                    window.location.href = '/entrepots';
                }, 1500);
            } else {
                throw new Error(result.message || 'Erreur lors de la suppression');
            }

        } catch (error) {
            console.error('Erreur lors de la suppression:', error);
            showToast('Erreur lors de la suppression: ' + error.message, 'danger');
        }
    }

    function toggleWarehouseStatus() {
        if (!currentWarehouse) return;
        
        const currentStatus = currentWarehouse.is_active === 1 || currentWarehouse.is_active === true;
        const newStatus = !currentStatus;
        const modal = new bootstrap.Modal(document.getElementById('toggleStatusModal'));
        
        // Mettre à jour le contenu du modal
        document.getElementById('toggleStatusModalLabel').innerHTML = 
            newStatus ? '<i class="bi-toggle-on me-2"></i> Activer l\'entrepôt' : 
                       '<i class="bi-toggle-off me-2"></i> Désactiver l\'entrepôt';
        
        document.getElementById('toggleStatusMessage').textContent = 
            newStatus ? 'Voulez-vous activer cet entrepôt ?' : 
                       'Voulez-vous désactiver cet entrepôt ?';
        
        document.getElementById('toggleStatusInfo').textContent = 
            newStatus ? 'L\'entrepôt sera disponible pour les opérations.' : 
                       'L\'entrepôt sera indisponible pour les opérations.';
        
        document.getElementById('toggleWarehouseName').textContent = currentWarehouse.name || 'Entrepôt';
        
        // Style du bouton de confirmation
        const confirmBtn = document.getElementById('confirmToggleBtn');
        if (newStatus) {
            confirmBtn.className = 'btn btn-success';
            confirmBtn.innerHTML = '<i class="bi-toggle-on me-1"></i> Activer';
        } else {
            confirmBtn.className = 'btn btn-warning';
            confirmBtn.innerHTML = '<i class="bi-toggle-off me-1"></i> Désactiver';
        }
        
        modal.show();

        // Gérer la confirmation
        confirmBtn.onclick = function() {
            performToggleStatus();
        };
    }

    async function performToggleStatus() {
        try {
            const accessToken = getCookie('access_token');
            const currentStatus = currentWarehouse.is_active === 1 || currentWarehouse.is_active === true;
            const newStatus = !currentStatus;
            
            const response = await fetch(`https://toure.gestiem.com/api/entrepots/${currentWarehouseId}`, {
                method: 'PUT',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    is_active: newStatus
                })
            });

            if (!response.ok) {
                throw new Error(`Erreur HTTP: ${response.status}`);
            }

            // Vérifier si la réponse contient du contenu
            const responseText = await response.text();
            console.log('Réponse toggle texte:', responseText);

            let result;
            if (responseText.trim()) {
                try {
                    result = JSON.parse(responseText);
                    console.log('Résultat toggle JSON:', result);
                } catch (jsonError) {
                    console.error('Erreur parsing JSON toggle:', jsonError);
                    // Si ce n'est pas du JSON valide mais que le statut est 200, considérer comme succès
                    if (response.status === 200) {
                        result = { success: true };
                    } else {
                        throw new Error('Réponse invalide du serveur');
                    }
                }
            } else {
                // Réponse vide, mais statut 200 = succès
                console.log('Réponse toggle vide, mais statut 200 - considéré comme succès');
                result = { success: true };
            }
            
            if (result.success || result.entrepot_id || response.status === 200) {
                currentWarehouse.is_active = newStatus ? 1 : 0;
                displayWarehouseData(currentWarehouse);
                showToast(`Entrepôt ${newStatus ? 'activé' : 'désactivé'} avec succès`, 'success');
                
                // Fermer le modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('toggleStatusModal'));
                modal.hide();
            } else {
                throw new Error(result.message || 'Erreur lors du changement de statut');
            }

        } catch (error) {
            console.error('Erreur lors du changement de statut:', error);
            showToast('Erreur lors du changement de statut: ' + error.message, 'danger');
        }
    }

    function showToast(message, type = 'info') {
        // Create toast element
        const toast = document.createElement('div');
        toast.className = `toast align-items-center text-white bg-${type === 'success' ? 'success' : type === 'danger' ? 'danger' : 'primary'} border-0`;
        toast.setAttribute('role', 'alert');
        toast.innerHTML = `
            <div class="d-flex">
                <div class="toast-body">
                    ${message}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        `;
        
        // Add to container
        let toastContainer = document.getElementById('toastContainer');
        if (!toastContainer) {
            toastContainer = document.createElement('div');
            toastContainer.id = 'toastContainer';
            toastContainer.className = 'toast-container position-fixed top-0 end-0 p-3';
            toastContainer.style.zIndex = '9999';
            document.body.appendChild(toastContainer);
        }
        
        toastContainer.appendChild(toast);
        
        // Initialize and show toast
        const bsToast = new bootstrap.Toast(toast);
        bsToast.show();
        
        // Remove from DOM after hiding
        toast.addEventListener('hidden.bs.toast', () => {
            toast.remove();
        });
    }
</script>

<?php
$content = ob_get_clean();
require('./views/layouts/app-layout.php');
?>