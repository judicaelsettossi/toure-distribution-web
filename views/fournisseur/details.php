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

    .fournisseur-header {
        background: linear-gradient(135deg, var(--secondary-color) 0%, var(--accent-color) 100%);
        color: white;
        padding: 2rem;
        border-radius: 12px 12px 0 0;
    }

    .fournisseur-header h2 {
        color: white !important;
    }

    .fournisseur-avatar-large {
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

    .badge-type {
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.875rem;
    }

    .badge-fournisseur {
        background-color: #e3f2fd;
        color: #1976d2;
    }

    .badge-actif {
        background-color: #e8f5e9;
        color: #388e3c;
    }

    .badge-inactif {
        background-color: #ffebee;
        color: #d32f2f;
    }

    .action-card {
        border: 2px dashed #e9ecef;
        border-radius: 12px;
        padding: 1.5rem;
        text-align: center;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .action-card:hover {
        border-color: var(--primary-color);
        background-color: var(--light-primary);
        transform: translateY(-3px);
    }

    .section-coming-soon {
        opacity: 0.5;
        pointer-events: none;
        position: relative;
    }

    .section-coming-soon::after {
        content: 'Bientôt disponible';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: var(--primary-color);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 600;
        z-index: 10;
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

    /* Modal styles - cohérent avec les autres pages */
    .modal-content {
        border-radius: 12px;
        border: none;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    .modal-header {
        padding: 1.5rem 1.5rem 0 1.5rem;
        border-bottom: none;
    }

    .modal-title {
        font-weight: 600;
        font-size: 1.1rem;
        color: #212529;
    }

    .modal-body {
        padding: 0 1.5rem 1.5rem 1.5rem;
        text-align: center;
    }

    .modal-footer {
        padding: 0 1.5rem 1.5rem 1.5rem;
        border-top: none;
        display: flex;
        gap: 0.5rem;
        justify-content: center;
    }

    .btn-close {
        background: none;
        border: none;
        font-size: 1.25rem;
        opacity: 0.5;
        transition: opacity 0.2s ease;
    }

    .btn-close:hover {
        opacity: 0.75;
    }

    /* Boutons de la modal */
    .modal-footer .btn {
        font-weight: 500;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        transition: all 0.2s ease;
        min-width: 100px;
    }

    .modal-footer .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .modal-footer .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
    }

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

    .modal-footer .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .modal-footer .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
        transform: translateY(-1px);
    }

    /* Icône dans la modal */
    .modal-body .icon {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        display: block;
    }

    .modal-body .icon.success {
        color: #28a745;
    }

    .modal-body .icon.warning {
        color: #ffc107;
    }

    .modal-body .icon.danger {
        color: #dc3545;
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
                                    href="/fournisseurs">Fournisseurs</a></li>
                            <li class="breadcrumb-item active" id="fournisseurNameBreadcrumb">Détails</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-sm-auto">
                    <button class="btn btn-outline-secondary me-2" onclick="window.history.back()">
                        <i class="bi-arrow-left me-1"></i> Retour
                    </button>
                    <button class="btn btn-primary-custom" onclick="editFournisseur()">
                        <i class="bi-pencil me-1"></i> Modifier
                    </button>
                </div>
            </div>
        </div>

        <div id="loadingState" class="text-center py-5">
            <div class="spinner-border text-primary-custom" role="status">
                <span class="visually-hidden">Chargement...</span>
            </div>
            <p class="mt-3 text-muted">Chargement des informations du fournisseur...</p>
        </div>

        <div id="fournisseurContent" style="display: none;">
            <!-- Fournisseur Header Card -->
            <div class="card card-custom mb-4">
                <div class="fournisseur-header">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="fournisseur-avatar-large" id="fournisseurAvatar">F</div>
                        </div>
                        <div class="col">
                            <h2 class="mb-1" id="fournisseurName">-</h2>
                            <p class="mb-2 opacity-75">
                                <i class="bi-tag me-2"></i>
                                <span id="fournisseurCode">-</span>
                            </p>
                            <div class="d-flex align-items-center gap-3">
                                <span class="badge badge-type badge-fournisseur">Fournisseur</span>
                                <span class="badge" id="fournisseurStatusBadge">-</span>
                            </div>
                        </div>
                        <div class="col-auto text-end">
                            <div class="btn-group">
                                <button class="btn btn-light" onclick="toggleFournisseurStatus()" id="toggleStatusBtn">
                                    <i class="bi-toggle-off me-1"></i> Activer/Désactiver
                                </button>
                                <button class="btn btn-danger" onclick="confirmDeleteFournisseur()">
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
                                <i class="bi-person-vcard me-2 text-primary-custom"></i>
                                Informations Générales
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="info-item">
                                <div class="info-label">Responsable</div>
                                <div class="info-value" id="responsable">-</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Conditions de Paiement</div>
                                <div class="info-value" id="payment_terms">-</div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact -->
                    <div class="card card-custom mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi-telephone me-2 text-primary-custom"></i>
                                Contact
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
                        </div>
                    </div>

                    <!-- Historique (À venir) -->
                    <div class="card card-custom mb-4 section-coming-soon">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi-clock-history me-2"></i>
                                Historique des Commandes
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="text-center text-muted py-4">
                                <i class="bi-receipt fs-1"></i>
                                <p class="mt-2">Aucune commande disponible</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Informations Système -->
                    <div class="card card-custom mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi-info-circle me-2 text-primary-custom"></i>
                                Informations Système
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="info-item">
                                <div class="info-label">ID Fournisseur</div>
                                <div class="info-value">
                                    <code class="small" id="fournisseurId">-</code>
                                </div>
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

                    <!-- Statistiques -->
                    <div class="card card-custom mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi-graph-up me-2 text-primary-custom"></i>
                                Statistiques
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="stat-box mb-3">
                                <div class="stat-value">0</div>
                                <div class="stat-label">Commandes Totales</div>
                            </div>
                            <div class="stat-box mb-3">
                                <div class="stat-value">0 FCFA</div>
                                <div class="stat-label">Chiffre d'Affaires</div>
                            </div>
                            <div class="stat-box">
                                <div class="stat-value" id="createdAtStat">-</div>
                                <div class="stat-label">Fournisseur depuis</div>
                            </div>
                        </div>
                    </div>

                    <!-- Actions Rapides -->
                    <div class="card card-custom mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi-lightning me-2 text-primary-custom"></i>
                                Actions Rapides
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="action-card mb-3" onclick="createCommande()">
                                <i class="bi-cart fs-1 text-primary-custom"></i>
                                <h6 class="mt-2 mb-0">Nouvelle Commande</h6>
                            </div>
                            <div class="action-card" onclick="viewStock()">
                                <i class="bi-boxes fs-1 text-primary-custom"></i>
                                <h6 class="mt-2 mb-0">Voir le Stock</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modal de confirmation Bootstrap -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <i id="modalIcon" class="bi bi-question-circle icon warning"></i>
                <p id="modalMessage">Êtes-vous sûr de vouloir effectuer cette action ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi-x-circle me-1"></i> Annuler
                </button>
                <button type="button" id="modalConfirmBtn" class="btn btn-primary" onclick="confirmModalAction()">
                    <i class="bi-check-circle me-1"></i> Confirmer
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    let fournisseurData = null;

    document.addEventListener('DOMContentLoaded', function() {
        // Extraire l'ID du fournisseur depuis l'URL
        const pathParts = window.location.pathname.split('/');
        let fournisseurId = null;
        
        // Chercher l'ID dans différents formats d'URL
        if (pathParts.includes('fournisseur') && pathParts.length > 2) {
            const fournisseurIndex = pathParts.indexOf('fournisseur');
            fournisseurId = pathParts[fournisseurIndex + 1];
        }
        
        // Si pas trouvé, essayer la méthode directe
        if (!fournisseurId) {
            fournisseurId = pathParts[pathParts.length - 1];
        }
        
        console.log('URL pathname:', window.location.pathname);
        console.log('Path parts:', pathParts);
        console.log('Fournisseur ID extrait:', fournisseurId);
        
        if (!fournisseurId || fournisseurId === 'details') {
            showError('ID du fournisseur manquant dans l\'URL');
            return;
        }
        
        loadFournisseurDetails(fournisseurId);
    });

    async function loadFournisseurDetails(fournisseurId) {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            if (!accessToken) {
                window.location.href = '/login';
                return;
            }

            console.log('Chargement des détails pour le fournisseur:', fournisseurId);
            const response = await fetch(`https://toure.gestiem.com/api/fournisseurs/${fournisseurId}`, {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            if (response.ok) {
                const result = await response.json();
                fournisseurData = result;
                displayFournisseurDetails(result);
            } else if (response.status === 404) {
                showError(`Fournisseur avec l'ID "${fournisseurId}" non trouvé`);
            } else if (response.status === 401) {
                window.location.href = '/login';
                return;
            } else {
                const errorResult = await response.json().catch(() => ({ message: 'Erreur inconnue' }));
                showError(`Erreur ${response.status}: ${errorResult.message || 'Erreur lors du chargement des informations'}`);
            }
        } catch (error) {
            console.error('Error:', error);
            showError('Erreur de connexion au serveur');
        }
    }

    function displayFournisseurDetails(fournisseur) {
        document.getElementById('loadingState').style.display = 'none';
        document.getElementById('fournisseurContent').style.display = 'block';

        // Header
        document.getElementById('fournisseurAvatar').textContent = getInitials(fournisseur.name);
        document.getElementById('fournisseurName').textContent = fournisseur.name;
        document.getElementById('fournisseurCode').textContent = fournisseur.code;
        document.getElementById('fournisseurNameBreadcrumb').textContent = fournisseur.name;

        // Status
        const statusBadge = document.getElementById('fournisseurStatusBadge');
        statusBadge.textContent = fournisseur.is_active ? 'Actif' : 'Inactif';
        statusBadge.className = `badge ${fournisseur.is_active ? 'badge-actif' : 'badge-inactif'}`;

        // Informations
        document.getElementById('responsable').textContent = fournisseur.responsable || 'Non renseigné';
        document.getElementById('payment_terms').textContent = fournisseur.payment_terms || 'Non définies';

        // Contact
        const emailLink = document.getElementById('email');
        if (fournisseur.email) {
            emailLink.textContent = fournisseur.email;
            emailLink.href = `mailto:${fournisseur.email}`;
        } else {
            emailLink.textContent = 'Non renseigné';
            emailLink.removeAttribute('href');
        }

        const phoneLink = document.getElementById('phone');
        if (fournisseur.phone) {
            phoneLink.textContent = fournisseur.phone;
            phoneLink.href = `tel:${fournisseur.phone}`;
        } else {
            phoneLink.textContent = 'Non renseigné';
            phoneLink.removeAttribute('href');
        }

        document.getElementById('adresse').textContent = fournisseur.adresse || 'Non renseignée';
        document.getElementById('city').textContent = fournisseur.city || 'Non renseignée';

        // Système
        document.getElementById('fournisseurId').textContent = fournisseur.fournisseur_id;
        
        const createdDate = new Date(fournisseur.created_at);
        document.getElementById('createdAt').textContent = createdDate.toLocaleDateString('fr-FR');
        document.getElementById('createdAtStat').textContent = createdDate.toLocaleDateString('fr-FR');
        
        const updatedDate = new Date(fournisseur.updated_at);
        document.getElementById('updatedAt').textContent = updatedDate.toLocaleDateString('fr-FR');
    }

    let currentModalAction = null;

    function toggleFournisseurStatus() {
        if (!fournisseurData) return;

        const newStatus = !fournisseurData.is_active;
        const isActivating = newStatus;
        
        // Configuration de la modal
        document.getElementById('confirmationModalLabel').textContent = isActivating ? 'Activer le fournisseur' : 'Désactiver le fournisseur';
        document.getElementById('modalMessage').textContent = isActivating ? 
            `Voulez-vous activer le fournisseur "${fournisseurData.name}" ?` :
            `Voulez-vous désactiver le fournisseur "${fournisseurData.name}" ?`;
        
        // Icône et couleur
        const modalIcon = document.getElementById('modalIcon');
        const confirmBtn = document.getElementById('modalConfirmBtn');
        
        if (isActivating) {
            modalIcon.className = 'bi bi-check-circle icon success';
            confirmBtn.className = 'btn btn-success';
            confirmBtn.innerHTML = '<i class="bi-check-circle me-1"></i> Activer';
        } else {
            modalIcon.className = 'bi bi-x-circle icon warning';
            confirmBtn.className = 'btn btn-warning';
            confirmBtn.innerHTML = '<i class="bi-x-circle me-1"></i> Désactiver';
        }
        
        // Stocker l'action à exécuter
        currentModalAction = () => executeToggleStatus(newStatus);
        
        // Afficher la modal
        showModal();
    }

    async function executeToggleStatus(newStatus) {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            const currentFournisseurId = getFournisseurIdFromUrl();
            const response = await fetch(`https://toure.gestiem.com/api/fournisseurs/${currentFournisseurId}`, {
                method: 'PUT',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    ...fournisseurData,
                    is_active: newStatus
                })
            });

            const result = await response.json();

            if (response.ok) {
                showNotification('success', 'Statut mis à jour avec succès');
                loadFournisseurDetails(getFournisseurIdFromUrl());
            } else {
                showNotification('error', result.message || 'Erreur lors de la mise à jour');
            }
        } catch (error) {
            showNotification('error', 'Erreur de connexion au serveur');
        }
    }

    function confirmDeleteFournisseur() {
        if (!fournisseurData) return;

        // Configuration de la modal pour la suppression
        document.getElementById('confirmationModalLabel').textContent = 'Supprimer le fournisseur';
        document.getElementById('modalMessage').textContent = `Êtes-vous sûr de vouloir supprimer le fournisseur "${fournisseurData.name}" ?\n\nCette action est irréversible.`;
        
        // Icône et couleur pour la suppression
        const modalIcon = document.getElementById('modalIcon');
        const confirmBtn = document.getElementById('modalConfirmBtn');
        
        modalIcon.className = 'bi bi-trash icon danger';
        confirmBtn.className = 'btn btn-danger';
        confirmBtn.innerHTML = '<i class="bi-trash me-1"></i> Supprimer';
        
        // Stocker l'action à exécuter
        currentModalAction = executeDeleteFournisseur;
        
        // Afficher la modal
        showModal();
    }

    async function executeDeleteFournisseur() {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            const currentFournisseurId = getFournisseurIdFromUrl();
            const response = await fetch(`https://toure.gestiem.com/api/fournisseurs/${currentFournisseurId}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            if (response.ok) {
                showNotification('success', 'Fournisseur supprimé avec succès');
                setTimeout(() => {
                    window.location.href = '/fournisseurs';
                }, 1500);
            } else {
                const result = await response.json();
                showNotification('error', result.message || 'Erreur lors de la suppression');
            }
        } catch (error) {
            showNotification('error', 'Erreur de connexion au serveur');
        }
    }

    function editFournisseur() {
        window.location.href = `/fournisseur/${getFournisseurIdFromUrl()}/edit`;
    }

    function createCommande() {
        window.location.href = `/commande/creer?fournisseur_id=${getFournisseurIdFromUrl()}`;
    }

    function viewStock() {
        window.location.href = `/stock/mouvements?fournisseur_id=${getFournisseurIdFromUrl()}`;
    }

    function getFournisseurIdFromUrl() {
        const pathParts = window.location.pathname.split('/');
        if (pathParts.includes('fournisseur') && pathParts.length > 2) {
            const fournisseurIndex = pathParts.indexOf('fournisseur');
            return pathParts[fournisseurIndex + 1];
        }
        return pathParts[pathParts.length - 1];
    }

    function getInitials(name) {
        return name.split(' ').map(n => n[0]).join('').substring(0, 2).toUpperCase();
    }

    // Fonctions pour gérer la modal Bootstrap
    function showModal() {
        const modal = new bootstrap.Modal(document.getElementById('confirmationModal'));
        modal.show();
    }

    function confirmModalAction() {
        if (currentModalAction) {
            currentModalAction();
        }
        // Fermer la modal
        const modal = bootstrap.Modal.getInstance(document.getElementById('confirmationModal'));
        if (modal) {
            modal.hide();
        }
    }

    // Réinitialiser l'action quand la modal se ferme
    document.getElementById('confirmationModal').addEventListener('hidden.bs.modal', function () {
        currentModalAction = null;
    });

    function showNotification(type, message) {
        const toast = document.createElement('div');
        toast.className = `alert alert-${type === 'success' ? 'success' : 'danger'} position-fixed top-0 end-0 m-3`;
        toast.style.zIndex = '9999';
        toast.style.minWidth = '350px';

        const icon = type === 'success' ? 'check-circle-fill' : 'exclamation-triangle-fill';
        toast.innerHTML = `
        <div class="d-flex align-items-start">
            <i class="bi-${icon} me-2 fs-5"></i>
            <div class="flex-grow-1">${message}</div>
            <button type="button" class="btn-close" onclick="this.parentElement.parentElement.remove()"></button>
        </div>
    `;

        document.body.appendChild(toast);

        setTimeout(() => {
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 300);
        }, 5000);
    }

    function showError(message) {
        document.getElementById('loadingState').innerHTML = `
        <i class="bi-exclamation-triangle fs-1 text-danger"></i>
        <p class="mt-3 text-danger">${message}</p>
        <div class="d-flex gap-2 justify-content-center">
            <button class="btn btn-primary-custom" onclick="location.reload()">
                <i class="bi-arrow-clockwise me-1"></i> Réessayer
            </button>
            <button class="btn btn-outline-secondary" onclick="window.location.href='/fournisseurs'">
                <i class="bi-arrow-left me-1"></i> Retour à la liste
            </button>
        </div>
    `;
    }
</script>

<?php
$content = ob_get_clean();
require('./views/layouts/app-layout.php');
?>