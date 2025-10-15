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

    .facture-header {
        background: linear-gradient(135deg, var(--secondary-color) 0%, var(--accent-color) 100%);
        color: white;
        padding: 2rem;
        border-radius: 12px 12px 0 0;
    }

    .facture-number {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .facture-status-badge {
        padding: 0.75rem 1.5rem;
        border-radius: 25px;
        font-weight: 600;
        font-size: 1rem;
    }

    .badge-pending { background-color: #fff3cd; color: #856404; }
    .badge-paid { background-color: #d1edff; color: #0c5460; }
    .badge-partially-paid { background-color: #d4edda; color: #155724; }
    .badge-cancelled { background-color: #f8d7da; color: #721c24; }
    .badge-overdue { background-color: #f5c6cb; color: #721c24; }

    .info-item {
        padding: 1rem;
        border-bottom: 1px solid #e9ecef;
    }
    .info-item:last-child { border-bottom: none; }

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

    .amount-card {
        background: linear-gradient(135deg, var(--light-primary) 0%, #f8f9fa 100%);
        border-radius: 12px;
        padding: 1.5rem;
        text-align: center;
        margin-bottom: 1rem;
    }

    .amount-value {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 0.5rem;
    }

    .amount-label {
        color: #6c757d;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.875rem;
    }

    .details-table {
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
    }

    .details-table th {
        background: #f8f9fa;
        border: none;
        padding: 1rem;
        font-weight: 600;
        color: var(--secondary-color);
    }

    .details-table td {
        border: none;
        padding: 1rem;
        border-bottom: 1px solid #f8f9fa;
    }

    .details-table tbody tr:hover {
        background-color: var(--light-primary);
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

    .btn-danger-modern {
        background-color: #dc3545;
        color: white;
        border: 2px solid #dc3545;
    }

    .btn-danger-modern:hover {
        background-color: #c82333;
        border-color: #bd2130;
        color: white;
    }

    .payment-section {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 1.5rem;
        margin-top: 1rem;
    }

    .progress-bar-custom {
        height: 8px;
        background-color: #e9ecef;
        border-radius: 4px;
        overflow: hidden;
    }

    .progress-custom {
        height: 100%;
        background: linear-gradient(90deg, var(--primary-color) 0%, #d1036d 100%);
        transition: width 0.3s ease;
    }

    @media (max-width: 768px) {
        .facture-header {
            padding: 1rem;
        }
        
        .facture-number {
            font-size: 1.5rem;
        }
        
        .amount-value {
            font-size: 2rem;
        }
        
        .btn-modern {
            width: 100%;
            justify-content: center;
            margin-bottom: 0.5rem;
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
                            <li class="breadcrumb-item active" id="factureNumberBreadcrumb">Détails</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-sm-auto">
                    <button class="btn btn-outline-modern me-2" onclick="window.history.back()">
                        <i class="bi-arrow-left me-1"></i> Retour
                    </button>
                    <button class="btn btn-primary-custom" onclick="editFacture()">
                        <i class="bi-pencil me-1"></i> Modifier
                    </button>
                </div>
            </div>
        </div>

        <div id="loadingState" class="text-center py-5">
            <div class="spinner-border text-primary-custom" role="status">
                <span class="visually-hidden">Chargement...</span>
            </div>
            <p class="mt-3 text-muted">Chargement des détails de la facture...</p>
        </div>

        <div id="factureContent" style="display: none;">
            <!-- Header Card -->
            <div class="card card-custom mb-4">
                <div class="facture-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="facture-number" id="factureNumber">-</div>
                            <div class="opacity-75" id="factureReference">-</div>
                        </div>
                        <div class="col-auto">
                            <span class="facture-status-badge" id="factureStatusBadge">-</span>
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
                                <div class="info-label">Client</div>
                                <div class="info-value" id="factureClient">-</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Date de facturation</div>
                                <div class="info-value" id="factureDate">-</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Date d'échéance</div>
                                <div class="info-value" id="factureDueDate">-</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Adresse de livraison</div>
                                <div class="info-value" id="factureDeliveryAddress">-</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Note</div>
                                <div class="info-value" id="factureNote">-</div>
                            </div>
                        </div>
                    </div>

                    <!-- Détails de la Facture -->
                    <div class="card card-custom mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi-list-ul me-2 text-primary-custom"></i>
                                Détails de la Facture
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table details-table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Produit</th>
                                            <th>Quantité</th>
                                            <th>Prix unitaire</th>
                                            <th>Réduction</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="factureDetailsBody">
                                        <!-- Les détails seront chargés ici -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Paiements -->
                    <div class="card card-custom mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi-credit-card me-2 text-primary-custom"></i>
                                Historique des Paiements
                            </h5>
                        </div>
                        <div class="card-body">
                            <div id="paymentsContainer">
                                <!-- Les paiements seront chargés ici -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Montants -->
                    <div class="card card-custom mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi-calculator me-2 text-primary-custom"></i>
                                Montants
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="amount-card">
                                <div class="amount-value" id="totalAmount">-</div>
                                <div class="amount-label">Montant Total</div>
                            </div>
                            <div class="amount-card">
                                <div class="amount-value" id="paidAmount">-</div>
                                <div class="amount-label">Montant Payé</div>
                            </div>
                            <div class="amount-card">
                                <div class="amount-value" id="remainingAmount">-</div>
                                <div class="amount-label">Reste à Payer</div>
                            </div>
                            <div class="payment-section">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="fw-bold">Progression</span>
                                    <span id="paymentProgressText">0%</span>
                                </div>
                                <div class="progress-bar-custom">
                                    <div class="progress-custom" id="paymentProgress" style="width: 0%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informations Système -->
                    <div class="card card-custom mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi-gear me-2 text-primary-custom"></i>
                                Informations Système
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="info-item">
                                <div class="info-label">ID Facture</div>
                                <div class="info-value font-monospace small" id="factureId">-</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Créé le</div>
                                <div class="info-value" id="factureCreatedAt">-</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Modifié le</div>
                                <div class="info-value" id="factureUpdatedAt">-</div>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="card card-custom mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi-lightning me-2 text-primary-custom"></i>
                                Actions
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary-custom" onclick="editFacture()">
                                    <i class="bi-pencil me-1"></i> Modifier la Facture
                                </button>
                                <button class="btn btn-outline-modern" onclick="printFacture()">
                                    <i class="bi-printer me-1"></i> Imprimer
                                </button>
                                <button class="btn btn-outline-modern" onclick="duplicateFacture()">
                                    <i class="bi-files me-1"></i> Dupliquer
                                </button>
                                <button class="btn btn-outline-modern" onclick="sendFacture()">
                                    <i class="bi-send me-1"></i> Envoyer par Email
                                </button>
                                <button class="btn btn-danger-modern" onclick="deleteFacture()">
                                    <i class="bi-trash me-1"></i> Supprimer
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="errorState" class="text-center py-5" style="display: none;">
            <i class="bi-exclamation-triangle fs-1 text-danger"></i>
            <p class="mt-3 text-danger" id="errorMessage">Erreur lors du chargement</p>
            <div class="d-flex gap-2 justify-content-center">
                <button class="btn btn-primary-custom" onclick="location.reload()">
                    <i class="bi-arrow-clockwise me-1"></i> Réessayer
                </button>
                <button class="btn btn-outline-modern" onclick="window.location.href='/factures'">
                    <i class="bi-arrow-left me-1"></i> Retour à la liste
                </button>
            </div>
        </div>
    </div>
</main>

<script>
    let factureData = null;

    document.addEventListener('DOMContentLoaded', function() {
        const factureId = getFactureIdFromUrl();
        
        if (!factureId || factureId === 'details') {
            showError('ID de la facture manquant dans l\'URL');
            return;
        }
        
        loadFactureDetails(factureId);
    });

    function getFactureIdFromUrl() {
        const pathParts = window.location.pathname.split('/');
        if (pathParts.includes('facture') && pathParts.length > 2) {
            const factureIndex = pathParts.indexOf('facture');
            return pathParts[factureIndex + 1];
        }
        return pathParts[pathParts.length - 1];
    }

    async function loadFactureDetails(factureId) {
        try {
            const response = await fetch(`https://toure.gestiem.com/api/factures/${factureId}?with_client=1&with_details=1&with_payments=1`, {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            if (response.ok) {
                const result = await response.json();
                factureData = result.data;
                displayFactureDetails(factureData);
                
                document.getElementById('loadingState').style.display = 'none';
                document.getElementById('factureContent').style.display = 'block';
                
                document.getElementById('factureNumberBreadcrumb').textContent = factureData.facture_number;
                document.title = `${factureData.facture_number} - Détails de la Facture`;
            } else if (response.status === 404) {
                showError(`Facture avec l'ID "${factureId}" non trouvée`);
            } else {
                showError('Erreur lors du chargement des informations');
            }
        } catch (error) {
            console.error('Error:', error);
            showError('Erreur de connexion au serveur');
        }
    }

    function displayFactureDetails(facture) {
        // Header
        document.getElementById('factureNumber').textContent = facture.facture_number;
        document.getElementById('factureReference').textContent = facture.reference || '';
        
        const statusBadge = document.getElementById('factureStatusBadge');
        statusBadge.textContent = getStatutLabel(facture.statut);
        statusBadge.className = `facture-status-badge badge-${facture.statut}`;

        // Informations générales
        document.getElementById('factureClient').textContent = facture.client ? facture.client.name_client : 'Client supprimé';
        document.getElementById('factureDate').textContent = formatDate(facture.facture_date);
        document.getElementById('factureDueDate').textContent = formatDate(facture.due_date);
        document.getElementById('factureDeliveryAddress').textContent = facture.delivery_adresse || 'Non renseignée';
        document.getElementById('factureNote').textContent = facture.note || 'Aucune note';

        // Montants
        document.getElementById('totalAmount').textContent = formatCurrency(facture.total_amount);
        document.getElementById('paidAmount').textContent = formatCurrency(facture.paid_amount);
        
        const remaining = parseFloat(facture.total_amount) - parseFloat(facture.paid_amount);
        document.getElementById('remainingAmount').textContent = formatCurrency(remaining);
        
        // Progression du paiement
        const progress = parseFloat(facture.total_amount) > 0 ? 
            (parseFloat(facture.paid_amount) / parseFloat(facture.total_amount)) * 100 : 0;
        document.getElementById('paymentProgress').style.width = `${progress}%`;
        document.getElementById('paymentProgressText').textContent = `${Math.round(progress)}%`;

        // Détails de la facture
        displayFactureDetails(facture.details || []);

        // Paiements
        displayPayments(facture.payments || []);

        // Informations système
        document.getElementById('factureId').textContent = facture.facture_id;
        document.getElementById('factureCreatedAt').textContent = formatDate(facture.created_at);
        document.getElementById('factureUpdatedAt').textContent = formatDate(facture.updated_at);
    }

    function displayFactureDetails(details) {
        const tbody = document.getElementById('factureDetailsBody');
        
        if (details.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="5" class="text-center text-muted py-4">
                        <i class="bi-inbox fs-1"></i>
                        <p class="mt-2">Aucun détail disponible</p>
                    </td>
                </tr>
            `;
            return;
        }

        tbody.innerHTML = details.map(detail => `
            <tr>
                <td>
                    <div class="fw-bold">${detail.product ? detail.product.name : 'Produit supprimé'}</div>
                    ${detail.product && detail.product.description ? `<small class="text-muted">${detail.product.description}</small>` : ''}
                </td>
                <td>${detail.quantite}</td>
                <td>${formatCurrency(detail.prix_unitaire)}</td>
                <td>${formatCurrency(detail.discount_amount || 0)}</td>
                <td class="fw-bold">${formatCurrency(detail.montant_total)}</td>
            </tr>
        `).join('');
    }

    function displayPayments(payments) {
        const container = document.getElementById('paymentsContainer');
        
        if (payments.length === 0) {
            container.innerHTML = `
                <div class="text-center text-muted py-4">
                    <i class="bi-credit-card fs-1"></i>
                    <p class="mt-2">Aucun paiement enregistré</p>
                </div>
            `;
            return;
        }

        container.innerHTML = payments.map(payment => `
            <div class="border rounded p-3 mb-3">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="fw-bold">${formatCurrency(payment.amount)}</div>
                        <div class="text-muted small">${formatDate(payment.payment_date)}</div>
                    </div>
                    <span class="badge bg-success">${payment.payment_method || 'Non spécifié'}</span>
                </div>
                ${payment.note ? `<div class="text-muted small mt-2">${payment.note}</div>` : ''}
            </div>
        `).join('');
    }

    function getStatutLabel(statut) {
        const labels = {
            'pending': 'En attente',
            'paid': 'Payée',
            'partially_paid': 'Partiellement payée',
            'cancelled': 'Annulée',
            'overdue': 'En retard'
        };
        return labels[statut] || statut;
    }

    function formatCurrency(amount) {
        return new Intl.NumberFormat('fr-FR', {
            style: 'currency',
            currency: 'XOF',
            minimumFractionDigits: 0
        }).format(amount).replace('XOF', 'FCFA');
    }

    function formatDate(dateString) {
        if (!dateString) return '-';
        return new Date(dateString).toLocaleDateString('fr-FR');
    }

    function editFacture() {
        window.location.href = `/facture/${getFactureIdFromUrl()}/edit`;
    }

    function printFacture() {
        window.print();
    }

    function duplicateFacture() {
        if (confirm('Voulez-vous dupliquer cette facture ?')) {
            // TODO: Implémenter la duplication
            showNotification('info', 'Fonctionnalité de duplication à venir');
        }
    }

    function sendFacture() {
        if (confirm('Voulez-vous envoyer cette facture par email ?')) {
            // TODO: Implémenter l'envoi par email
            showNotification('info', 'Fonctionnalité d\'envoi par email à venir');
        }
    }

    async function deleteFacture() {
        if (!confirm('Êtes-vous sûr de vouloir supprimer cette facture ? Cette action est irréversible.')) {
            return;
        }

        try {
            const factureId = getFactureIdFromUrl();
            const response = await fetch(`https://toure.gestiem.com/api/factures/${factureId}`, {
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            if (response.ok) {
                showNotification('success', 'Facture supprimée avec succès');
                setTimeout(() => {
                    window.location.href = '/factures';
                }, 1500);
            } else {
                const result = await response.json();
                showNotification('error', result.message || 'Erreur lors de la suppression');
            }
        } catch (error) {
            console.error('Erreur:', error);
            showNotification('error', 'Erreur de connexion au serveur');
        }
    }

    function showNotification(type, message) {
        const toast = document.createElement('div');
        toast.className = `alert alert-${type === 'success' ? 'success' : type === 'info' ? 'info' : 'danger'} position-fixed top-0 end-0 m-3`;
        toast.style.zIndex = '9999';
        toast.style.minWidth = '350px';

        const icon = type === 'success' ? 'check-circle-fill' : type === 'info' ? 'info-circle-fill' : 'exclamation-triangle-fill';
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
        document.getElementById('loadingState').style.display = 'none';
        document.getElementById('errorMessage').textContent = message;
        document.getElementById('errorState').style.display = 'block';
    }
</script>

<?php
$content = ob_get_clean();
require('./views/layouts/app-layout.php');
?>
