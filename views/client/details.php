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

    .client-header {
        background: linear-gradient(135deg, var(--secondary-color) 0%, var(--accent-color) 100%);
        color: white;
        padding: 2rem;
        border-radius: 12px 12px 0 0;
    }

    .client-avatar-large {
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

    .credit-progress {
        height: 30px;
        border-radius: 8px;
        background-color: #e9ecef;
        position: relative;
        overflow: hidden;
    }

    .credit-progress-bar {
        height: 100%;
        transition: width 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        font-size: 0.875rem;
    }

    .badge-type {
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.875rem;
    }

    .badge-long-terme {
        background-color: #e3f2fd;
        color: #1976d2;
    }

    .badge-court-terme {
        background-color: #fff3e0;
        color: #f57c00;
    }

    .badge-comptant {
        background-color: #e8f5e9;
        color: #388e3c;
    }

    .badge-litigieux {
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
                                    href="/liste-client">Clients</a></li>
                            <li class="breadcrumb-item active" id="clientNameBreadcrumb">Détails</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-sm-auto">
                    <button class="btn btn-outline-secondary me-2" onclick="window.history.back()">
                        <i class="bi-arrow-left me-1"></i> Retour
                    </button>
                    <button class="btn btn-primary-custom" onclick="editClient()">
                        <i class="bi-pencil me-1"></i> Modifier
                    </button>
                </div>
            </div>
        </div>

        <div id="loadingState" class="text-center py-5">
            <div class="spinner-border text-primary-custom" role="status">
                <span class="visually-hidden">Chargement...</span>
            </div>
            <p class="mt-3 text-muted">Chargement des informations du client...</p>
        </div>

        <div id="clientContent" style="display: none;">
            <!-- Client Header Card -->
            <div class="card card-custom mb-4">
                <div class="client-header">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="client-avatar-large" id="clientAvatar">JD</div>
                        </div>
                        <div class="col">
                            <h2 class="mb-1" id="clientName">-</h2>
                            <p class="mb-2 opacity-75">
                                <i class="bi-tag me-2"></i>
                                <span id="clientCode">-</span>
                            </p>
                            <div class="d-flex align-items-center gap-3">
                                <span class="badge badge-type" id="clientTypeBadge">-</span>
                                <span class="badge" id="clientStatusBadge">-</span>
                            </div>
                        </div>
                        <div class="col-auto text-end">
                            <div class="btn-group">
                                <button class="btn btn-light" onclick="toggleClientStatus()" id="toggleStatusBtn">
                                    <i class="bi-toggle-off me-1"></i> Activer/Désactiver
                                </button>
                                <button class="btn btn-light" onclick="openBalanceModal()">
                                    <i class="bi-wallet2 me-1"></i> Ajuster Solde
                                </button>
                                <button class="btn btn-danger" onclick="confirmDeleteClient()">
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
                                <div class="info-label">Nom du Représentant</div>
                                <div class="info-value" id="nameRepresentant">-</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Marketteur Assigné</div>
                                <div class="info-value" id="marketteur">-</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Numéro IFU</div>
                                <div class="info-value" id="ifu">-</div>
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
                                    <a href="tel:" id="phonenumber" class="text-primary-custom">-</a>
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
                                Historique des Factures
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="text-center text-muted py-4">
                                <i class="bi-receipt fs-1"></i>
                                <p class="mt-2">Aucune facture disponible</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Conditions Financières -->
                    <div class="card card-custom mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi-cash-stack me-2 text-primary-custom"></i>
                                Conditions Financières
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted small">Limite de Crédit</span>
                                    <span class="fw-bold" id="creditLimit">-</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-muted small">Solde Actuel</span>
                                    <span class="fw-bold" id="currentBalance">-</span>
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <span class="text-muted small">Crédit Disponible</span>
                                    <span class="fw-bold text-success" id="availableCredit">-</span>
                                </div>

                                <label class="small text-muted mb-2">Utilisation du Crédit</label>
                                <div class="credit-progress">
                                    <div class="credit-progress-bar" id="creditProgressBar" style="width: 0%;">
                                        0%
                                    </div>
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-label">Réduction de Base</div>
                                <div class="info-value">
                                    <span class="badge bg-info" id="baseReduction">0%</span>
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
                            <div class="stat-box mb-3">
                                <div class="stat-value">0</div>
                                <div class="stat-label">Factures Totales</div>
                            </div>
                            <div class="stat-box mb-3">
                                <div class="stat-value">0 FCFA</div>
                                <div class="stat-label">Chiffre d'Affaires</div>
                            </div>
                            <div class="stat-box">
                                <div class="stat-value" id="createdAt">-</div>
                                <div class="stat-label">Client depuis</div>
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
                            <div class="action-card mb-3" onclick="createInvoice()">
                                <i class="bi-receipt fs-1 text-primary-custom"></i>
                                <h6 class="mt-2 mb-0">Nouvelle Facture</h6>
                            </div>
                            <div class="action-card" onclick="createDelivery()">
                                <i class="bi-truck fs-1 text-primary-custom"></i>
                                <h6 class="mt-2 mb-0">Nouvelle Livraison</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modal Ajuster Solde -->
<div class="modal fade" id="balanceModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-light-primary">
                <h5 class="modal-title text-secondary-custom">
                    <i class="bi-wallet2 me-2"></i>Ajuster le Solde
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="balanceForm">
                    <div class="mb-3">
                        <label class="form-label">Montant (FCFA)</label>
                        <input type="number" class="form-control form-control-lg" id="balanceAmount" step="0.01"
                            required>
                        <div class="form-text">
                            Entrez un montant positif pour ajouter, négatif pour soustraire
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" id="balanceDescription" rows="3"
                            placeholder="Motif de l'ajustement..."></textarea>
                    </div>
                    <div class="alert alert-info">
                        <small>
                            <i class="bi-info-circle me-1"></i>
                            Solde actuel : <strong id="currentBalanceModal">-</strong>
                        </small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary-custom" onclick="updateBalance()">
                    <i class="bi-check-circle me-1"></i> Valider
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    let clientData = null;

    document.addEventListener('DOMContentLoaded', function() {
        // Extraire l'ID du client depuis l'URL
        const pathParts = window.location.pathname.split('/');
        let clientId = null;
        
        // Chercher l'ID dans différents formats d'URL
        if (pathParts.includes('client') && pathParts.length > 2) {
            const clientIndex = pathParts.indexOf('client');
            clientId = pathParts[clientIndex + 1];
        }
        
        // Si pas trouvé, essayer la méthode directe
        if (!clientId) {
            clientId = pathParts[pathParts.length - 1];
        }
        
        console.log('URL pathname:', window.location.pathname);
        console.log('Path parts:', pathParts);
        console.log('Client ID extrait:', clientId);
        
        if (!clientId || clientId === 'details') {
            showError('ID du client manquant dans l\'URL');
            return;
        }
        
        loadClientDetails(clientId);
    });

    async function loadClientDetails(clientId) {
        try {
            console.log('Chargement des détails pour le client:', clientId);
            const response = await fetch(`https://toure.gestiem.com/api/clients/${clientId}?with_client_type=1`, {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            if (response.ok) {
                const result = await response.json();
                clientData = result.data;
                displayClientDetails(clientData);
            } else if (response.status === 404) {
                showError(`Client avec l'ID "${clientId}" non trouvé`);
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

    function displayClientDetails(client) {
        document.getElementById('loadingState').style.display = 'none';
        document.getElementById('clientContent').style.display = 'block';

        // Header
        document.getElementById('clientAvatar').textContent = getInitials(client.name_client);
        document.getElementById('clientName').textContent = client.name_client;
        document.getElementById('clientCode').textContent = client.code;
        document.getElementById('clientNameBreadcrumb').textContent = client.name_client;

        // Type et statut
        const typeBadge = document.getElementById('clientTypeBadge');
        typeBadge.textContent = getClientType(client.client_type_id);
        typeBadge.className = `badge badge-type ${getTypeBadgeClass(client.client_type_id)}`;

        const statusBadge = document.getElementById('clientStatusBadge');
        statusBadge.textContent = client.is_active ? 'Actif' : 'Inactif';
        statusBadge.className = `badge ${client.is_active ? 'bg-success' : 'bg-secondary'}`;

        // Informations
        document.getElementById('nameRepresentant').textContent = client.name_representant || 'Non renseigné';
        document.getElementById('marketteur').textContent = client.marketteur || 'Non assigné';
        document.getElementById('ifu').textContent = client.ifu || 'Non renseigné';

        // Contact
        const emailLink = document.getElementById('email');
        if (client.email) {
            emailLink.textContent = client.email;
            emailLink.href = `mailto:${client.email}`;
        } else {
            emailLink.textContent = 'Non renseigné';
            emailLink.removeAttribute('href');
        }

        const phoneLink = document.getElementById('phonenumber');
        if (client.phonenumber) {
            phoneLink.textContent = client.phonenumber;
            phoneLink.href = `tel:${client.phonenumber}`;
        } else {
            phoneLink.textContent = 'Non renseigné';
            phoneLink.removeAttribute('href');
        }

        document.getElementById('adresse').textContent = client.adresse || 'Non renseignée';
        document.getElementById('city').textContent = client.city || 'Non renseignée';

        // Finances
        const creditLimit = parseFloat(client.credit_limit);
        const currentBalance = parseFloat(client.current_balance);
        const availableCredit = creditLimit - currentBalance;
        const usagePercent = creditLimit > 0 ? (currentBalance / creditLimit * 100).toFixed(1) : 0;

        document.getElementById('creditLimit').textContent = formatCurrency(creditLimit);
        document.getElementById('currentBalance').textContent = formatCurrency(currentBalance);
        document.getElementById('availableCredit').textContent = formatCurrency(availableCredit);
        document.getElementById('baseReduction').textContent = `${client.base_reduction}%`;

        // Progress bar
        const progressBar = document.getElementById('creditProgressBar');
        progressBar.style.width = `${Math.min(usagePercent, 100)}%`;
        progressBar.textContent = `${usagePercent}%`;

        if (usagePercent >= 90) {
            progressBar.style.background = 'linear-gradient(90deg, #dc3545 0%, #c82333 100%)';
        } else if (usagePercent >= 70) {
            progressBar.style.background = 'linear-gradient(90deg, #ffc107 0%, #ff9800 100%)';
        } else {
            progressBar.style.background = 'linear-gradient(90deg, #28a745 0%, #20c997 100%)';
        }

        // Date création
        const createdDate = new Date(client.created_at);
        document.getElementById('createdAt').textContent = createdDate.toLocaleDateString('fr-FR');
    }

    async function toggleClientStatus() {
        if (!clientData) return;

        const newStatus = !clientData.is_active;
        const confirmMsg = newStatus ?
            'Voulez-vous activer ce client ?' :
            'Voulez-vous désactiver ce client ?';

        if (!confirm(confirmMsg)) return;

        try {
            const currentClientId = getClientIdFromUrl();
            const response = await fetch(`https://toure.gestiem.com/api/clients/${currentClientId}/toggle-status`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    is_active: newStatus
                })
            });

            const result = await response.json();

            if (response.ok) {
                showNotification('success', result.message);
                loadClientDetails(getClientIdFromUrl());
            } else {
                showNotification('error', result.message || 'Erreur lors de la mise à jour');
            }
        } catch (error) {
            showNotification('error', 'Erreur de connexion au serveur');
        }
    }

    function openBalanceModal() {
        if (!clientData) return;

        document.getElementById('balanceAmount').value = '';
        document.getElementById('balanceDescription').value = '';
        document.getElementById('currentBalanceModal').textContent = formatCurrency(clientData.current_balance);

        new bootstrap.Modal(document.getElementById('balanceModal')).show();
    }

    async function updateBalance() {
        const amount = parseFloat(document.getElementById('balanceAmount').value);
        const description = document.getElementById('balanceDescription').value;

        if (isNaN(amount) || amount === 0) {
            showNotification('error', 'Veuillez entrer un montant valide');
            return;
        }

        try {
            const currentClientId = getClientIdFromUrl();
            const response = await fetch(`https://toure.gestiem.com/api/clients/${currentClientId}/update-balance`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    amount,
                    description
                })
            });

            const result = await response.json();

            if (response.ok) {
                showNotification('success', result.message);
                bootstrap.Modal.getInstance(document.getElementById('balanceModal')).hide();
                loadClientDetails(getClientIdFromUrl());
            } else {
                showNotification('error', result.message || 'Erreur lors de la mise à jour');
            }
        } catch (error) {
            showNotification('error', 'Erreur de connexion au serveur');
        }
    }

    async function confirmDeleteClient() {
        if (!confirm(
                `Êtes-vous sûr de vouloir supprimer ${clientData.name_client} ?\n\nCette action est irréversible.`)) {
            return;
        }

        try {
            const currentClientId = getClientIdFromUrl();
            const response = await fetch(`https://toure.gestiem.com/api/clients/${currentClientId}`, {
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            const result = await response.json();

            if (response.ok) {
                showNotification('success', result.message);
                setTimeout(() => {
                    window.location.href = '/liste-client';
                }, 1500);
            } else {
                showNotification('error', result.message || 'Erreur lors de la suppression');
            }
        } catch (error) {
            showNotification('error', 'Erreur de connexion au serveur');
        }
    }

    function editClient() {
        window.location.href = `/client/${getClientIdFromUrl()}/modifier`;
    }

    function createInvoice() {
        window.location.href = `/nouvelle-facture?client_id=${getClientIdFromUrl()}`;
    }

    function createDelivery() {
        window.location.href = `/nouvelle-livraison?client_id=${getClientIdFromUrl()}`;
    }

    function getClientIdFromUrl() {
        const pathParts = window.location.pathname.split('/');
        if (pathParts.includes('client') && pathParts.length > 2) {
            const clientIndex = pathParts.indexOf('client');
            return pathParts[clientIndex + 1];
        }
        return pathParts[pathParts.length - 1];
    }

    function getInitials(name) {
        return name.split(' ').map(n => n[0]).join('').substring(0, 2).toUpperCase();
    }

    function getClientType(typeId) {
        const types = {
            '0199a5c7-c6b0-72f4-a050-56c10dc7a258': 'Long terme',
            '0199a5c9-21b3-734f-b30d-b71b01c4f7b7': 'Court terme',
            '0199a5ca-c426-7246-b3f1-e7f1a79a9477': 'Comptant',
            '0199a5cc-186a-73d6-b840-7872901a0e30': 'Litigieux'
        };
        return types[typeId] || 'Non défini';
    }

    function getTypeBadgeClass(typeId) {
        const classes = {
            '0199a5c7-c6b0-72f4-a050-56c10dc7a258': 'badge-long-terme',
            '0199a5c9-21b3-734f-b30d-b71b01c4f7b7': 'badge-court-terme',
            '0199a5ca-c426-7246-b3f1-e7f1a79a9477': 'badge-comptant',
            '0199a5cc-186a-73d6-b840-7872901a0e30': 'badge-litigieux'
        };
        return classes[typeId] || '';
    }

    function formatCurrency(amount) {
        return new Intl.NumberFormat('fr-FR', {
            style: 'currency',
            currency: 'XOF',
            minimumFractionDigits: 0
        }).format(amount).replace('XOF', 'FCFA');
    }

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
            <button class="btn btn-outline-secondary" onclick="window.location.href='/liste-client'">
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