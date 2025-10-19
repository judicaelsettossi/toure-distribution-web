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

    .filter-card {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border: 1px solid #dee2e6;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .stats-item {
        display: flex;
    }

    .stats-card {
        height: 100%;
        min-height: 50px;
        padding: 0.5rem;
        flex: 1;
    }

    .table-modern {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
    }

    .table-modern thead {
        background-color: #f8f9fa;
    }

    .table-modern th {
        border: none;
        font-weight: 600;
        color: #000;
        padding: 1rem;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .table-modern tbody tr {
        transition: all 0.2s ease;
    }

    .table-modern tbody tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    .table-modern tbody tr:hover {
        background-color: var(--light-primary);
        transform: scale(1.01);
    }

    .badge-status {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .badge-en-attente {
        background-color: #fff3cd;
        color: #856404;
        border: 1px solid #ffeaa7;
    }

    .badge-validee {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .badge-annulee {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
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

    .action-btn {
        padding: 0.375rem 0.75rem;
        border-radius: 6px;
        font-size: 0.875rem;
        transition: all 0.2s ease;
    }

    .action-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    }

    .loading-spinner {
        display: none;
    }

    .error-message {
        display: none;
    }

    /* Responsive for stats cards */
    @media (max-width: 576px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (min-width: 577px) and (max-width: 768px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (min-width: 769px) {
        .stats-grid {
            grid-template-columns: repeat(4, 1fr);
        }
    }
</style>

<main class="main">
    <div class="content px-4 py-4">
        <div class="page-header mb-4">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="page-title text-primary-custom font-public-sans">
                        <i class="bi-cart-check me-2"></i>
                        Gestion des Ventes
                    </h1>
                    <p class="page-description text-muted">Gérez les ventes aux clients avec mise à jour automatique des stocks</p>
                </div>
                <div class="col-sm-auto">
                    <div class="d-flex gap-2">
                        <button class="btn btn-primary-custom" onclick="window.location.href='/vente/creer'">
                            <i class="bi-plus-circle me-1"></i> Nouvelle Vente
                        </button>
                        <button class="btn btn-outline-secondary" onclick="window.location.href='/ventes/supprimees'">
                            <i class="bi-trash me-1"></i> Ventes Supprimées
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cartes de statistiques -->
        <div class="stats-grid">
            <div class="stats-item">
                <div class="card card-custom stats-card">
                    <div class="card-body d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="card-title text-muted mb-1">Total Ventes</h6>
                            <h3 class="mb-0 text-primary-custom" id="totalVentes">0</h3>
                        </div>
                        <div class="text-primary-custom">
                            <i class="bi-cart-check fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="stats-item">
                <div class="card card-custom stats-card">
                    <div class="card-body d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="card-title text-muted mb-1">Ventes Validées</h6>
                            <h3 class="mb-0 text-success" id="ventesValidees">0</h3>
                        </div>
                        <div class="text-success">
                            <i class="bi-check-circle fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="stats-item">
                <div class="card card-custom stats-card">
                    <div class="card-body d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="card-title text-muted mb-1">En Attente</h6>
                            <h3 class="mb-0 text-warning" id="ventesEnAttente">0</h3>
                        </div>
                        <div class="text-warning">
                            <i class="bi-clock fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="stats-item">
                <div class="card card-custom stats-card">
                    <div class="card-body d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="card-title text-muted mb-1">Chiffre d'Affaires</h6>
                            <h3 class="mb-0 text-info" id="chiffreAffaires">0 F CFA</h3>
                        </div>
                        <div class="text-info">
                            <i class="bi-currency-exchange fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filtres et recherche -->
        <div class="card filter-card mb-4">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="searchInput" class="form-label fw-semibold">Rechercher</label>
                        <input type="text" class="form-control" id="searchInput" placeholder="Numéro de vente...">
                    </div>
                    <div class="col-md-2">
                        <label for="statusFilter" class="form-label fw-semibold">Statut</label>
                        <select class="form-select" id="statusFilter">
                            <option value="">Tous les statuts</option>
                            <option value="en_attente">En attente</option>
                            <option value="validee">Validée</option>
                            <option value="annulee">Annulée</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="clientFilter" class="form-label fw-semibold">Client</label>
                        <select class="form-select" id="clientFilter">
                            <option value="">Tous les clients</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="entrepotFilter" class="form-label fw-semibold">Entrepôt</label>
                        <select class="form-select" id="entrepotFilter">
                            <option value="">Tous les entrepôts</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="dateDebut" class="form-label fw-semibold">Date début</label>
                        <input type="date" class="form-control" id="dateDebut">
                    </div>
                    <div class="col-md-1">
                        <label class="form-label">&nbsp;</label>
                        <button class="btn btn-primary-custom w-100" onclick="applyFilters()">
                            <i class="bi-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tableau des ventes -->
        <div class="card card-custom">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 text-primary-custom">
                    <i class="bi-list-ul me-2"></i> Liste des Ventes
                </h5>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-outline-success btn-sm" onclick="exportToExcel()">
                        <i class="bi-file-earmark-excel me-1"></i> Excel
                    </button>
                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="exportToPDF()">
                        <i class="bi-file-earmark-pdf me-1"></i> PDF
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-modern table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Numéro</th>
                                <th>Client</th>
                                <th>Entrepôt</th>
                                <th>Date</th>
                                <th>Montant Total</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="ventesTableBody">
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
            <div class="card-footer">
                <nav aria-label="Pagination des ventes">
                    <ul class="pagination pagination-sm justify-content-center mb-0" id="pagination">
                        <!-- La pagination sera générée dynamiquement -->
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</main>

<!-- Modal de confirmation de suppression -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">
                    <i class="bi-exclamation-triangle text-warning me-2"></i>
                    Confirmer la suppression
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir supprimer cette vente ?</p>
                <p class="text-muted small">Cette action est irréversible et les stocks seront restaurés si la vente était validée.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">
                    <i class="bi-trash me-1"></i> Supprimer
                </button>
            </div>
        </div>
    </div>
</div>

<script>
let ventesData = [];
let currentPage = 1;
let totalPages = 1;
let clients = [];
let entrepots = [];

// Chargement initial
document.addEventListener('DOMContentLoaded', function() {
    loadVentes();
    loadClients();
    loadEntrepots();
});

// Charger les ventes
async function loadVentes() {
    try {
        showLoading();
        
        const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
        const response = await fetch('/api/ventes?per_page=15&page=' + currentPage, {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${accessToken}`,
                'Accept': 'application/json'
            }
        });
        
        hideLoading();
        
        if (response.ok) {
            const result = await response.json();
            ventesData = result.data.data || [];
            totalPages = result.data.last_page || 1;
            
            displayVentes();
            updatePagination();
            updateStats();
        } else {
            showToast('Erreur lors du chargement des ventes', 'error');
        }
        
    } catch (error) {
        hideLoading();
        console.error('Erreur lors du chargement des ventes:', error);
        showToast('Erreur lors du chargement des ventes', 'error');
    }
}

// Afficher les ventes
function displayVentes() {
    const tbody = document.getElementById('ventesTableBody');
    tbody.innerHTML = '';
    
    if (ventesData.length === 0) {
        tbody.innerHTML = `
            <tr>
                <td colspan="7" class="text-center py-4">
                    <i class="bi-cart-x text-muted" style="font-size: 3rem;"></i>
                    <h5 class="text-muted mt-3">Aucune vente trouvée</h5>
                    <p class="text-muted">Commencez par créer votre première vente.</p>
                </td>
            </tr>
        `;
        return;
    }
    
        ventesData.forEach(vente => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>
                    <span class="fw-semibold text-primary-custom">${vente.numero_vente || 'N/A'}</span>
                </td>
                <td>
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm bg-primary-custom text-white rounded-circle d-flex align-items-center justify-content-center me-2">
                            <i class="bi-person"></i>
                        </div>
                        <div>
                            <div class="fw-semibold">${vente.client?.name || 'N/A'}</div>
                            <small class="text-muted">${vente.client?.email || ''}</small>
                        </div>
                    </div>
                </td>
                <td>
                    <span class="badge bg-info">${vente.entrepot?.name || 'N/A'}</span>
                </td>
                <td>${formatDate(vente.date_vente)}</td>
                <td>
                    <span class="fw-semibold text-success">${formatPrice(vente.montant_total)}</span>
                </td>
                <td>
                    <span class="badge-status badge-${getStatusClass(vente.status)}">${getStatusLabel(vente.status)}</span>
                </td>
                <td>
                    <div class="btn-group" role="group">
                        <button class="btn btn-outline-primary btn-sm action-btn" onclick="viewVente('${vente.vente_id}')" title="Voir">
                            <i class="bi-eye"></i>
                        </button>
                        <button class="btn btn-outline-warning btn-sm action-btn" onclick="editVente('${vente.vente_id}')" title="Modifier">
                            <i class="bi-pencil"></i>
                        </button>
                        <button class="btn btn-outline-danger btn-sm action-btn" onclick="deleteVente('${vente.vente_id}')" title="Supprimer">
                            <i class="bi-trash"></i>
                        </button>
                    </div>
                </td>
            `;
            tbody.appendChild(row);
        });
}

// Charger les clients
async function loadClients() {
    try {
        const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
        const response = await fetch('/api/client?per_page=100', {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${accessToken}`,
                'Accept': 'application/json'
            }
        });
        
        if (response.ok) {
            const result = await response.json();
            clients = result.data || [];
            populateClientFilter();
        }
    } catch (error) {
        console.error('Erreur lors du chargement des clients:', error);
    }
}

// Charger les entrepôts
async function loadEntrepots() {
    try {
        const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
        const response = await fetch('/api/entrepots?per_page=100', {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${accessToken}`,
                'Accept': 'application/json'
            }
        });
        
        if (response.ok) {
            const result = await response.json();
            entrepots = result.data || [];
            populateEntrepotFilter();
        }
    } catch (error) {
        console.error('Erreur lors du chargement des entrepôts:', error);
    }
}

// Peupler le filtre des clients
function populateClientFilter() {
    const select = document.getElementById('clientFilter');
    select.innerHTML = '<option value="">Tous les clients</option>';
    
    clients.forEach(client => {
        const option = document.createElement('option');
        option.value = client.client_id;
        option.textContent = client.name;
        select.appendChild(option);
    });
}

// Peupler le filtre des entrepôts
function populateEntrepotFilter() {
    const select = document.getElementById('entrepotFilter');
    select.innerHTML = '<option value="">Tous les entrepôts</option>';
    
    entrepots.forEach(entrepot => {
        const option = document.createElement('option');
        option.value = entrepot.entrepot_id;
        option.textContent = entrepot.name;
        select.appendChild(option);
    });
}

// Appliquer les filtres
function applyFilters() {
    currentPage = 1;
    loadVentes();
}

// Mettre à jour la pagination
function updatePagination() {
    const pagination = document.getElementById('pagination');
    pagination.innerHTML = '';
    
    // Bouton précédent
    const prevLi = document.createElement('li');
    prevLi.className = `page-item ${currentPage === 1 ? 'disabled' : ''}`;
    prevLi.innerHTML = `
        <a class="page-link" href="#" onclick="changePage(${currentPage - 1})">
            <i class="bi-chevron-left"></i>
        </a>
    `;
    pagination.appendChild(prevLi);
    
    // Numéros de page
    for (let i = 1; i <= totalPages; i++) {
        const li = document.createElement('li');
        li.className = `page-item ${i === currentPage ? 'active' : ''}`;
        li.innerHTML = `
            <a class="page-link" href="#" onclick="changePage(${i})">${i}</a>
        `;
        pagination.appendChild(li);
    }
    
    // Bouton suivant
    const nextLi = document.createElement('li');
    nextLi.className = `page-item ${currentPage === totalPages ? 'disabled' : ''}`;
    nextLi.innerHTML = `
        <a class="page-link" href="#" onclick="changePage(${currentPage + 1})">
            <i class="bi-chevron-right"></i>
        </a>
    `;
    pagination.appendChild(nextLi);
}

// Changer de page
function changePage(page) {
    if (page >= 1 && page <= totalPages) {
        currentPage = page;
        loadVentes();
    }
}

// Mettre à jour les statistiques
function updateStats() {
    const totalVentes = ventesData.length;
    const ventesValidees = ventesData.filter(v => v.status === 'validee').length;
    const ventesEnAttente = ventesData.filter(v => v.status === 'en_attente').length;
    const chiffreAffaires = ventesData.reduce((sum, v) => sum + parseFloat(v.montant_total || 0), 0);
    
    document.getElementById('totalVentes').textContent = totalVentes;
    document.getElementById('ventesValidees').textContent = ventesValidees;
    document.getElementById('ventesEnAttente').textContent = ventesEnAttente;
    document.getElementById('chiffreAffaires').textContent = formatPrice(chiffreAffaires);
}

// Fonctions utilitaires
function getStatusClass(status) {
    const classes = {
        'en_attente': 'en-attente',
        'validee': 'validee',
        'annulee': 'annulee'
    };
    return classes[status] || 'secondary';
}

function getStatusLabel(status) {
    const labels = {
        'en_attente': 'En attente',
        'validee': 'Validée',
        'annulee': 'Annulée'
    };
    return labels[status] || status;
}

function formatDate(dateString) {
    if (!dateString) return 'N/A';
    const date = new Date(dateString);
    return date.toLocaleDateString('fr-FR');
}

function formatPrice(price) {
    if (!price) return '0 F CFA';
    return new Intl.NumberFormat('fr-FR').format(parseFloat(price)) + ' F CFA';
}

// Actions
function viewVente(id) {
    window.location.href = `/vente/${id}`;
}

function editVente(id) {
    window.location.href = `/vente/${id}/edit`;
}

let venteToDelete = null;

function deleteVente(id) {
    venteToDelete = id;
    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}

// Gérer la confirmation de suppression
document.getElementById('confirmDeleteBtn').addEventListener('click', async function() {
    if (venteToDelete) {
        try {
            showLoading();
            
            const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
            const response = await fetch(`/api/ventes/${venteToDelete}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });
            
            hideLoading();
            
            if (response.ok) {
                showToast('Vente supprimée avec succès', 'success');
                // Fermer le modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('deleteModal'));
                modal.hide();
                // Recharger la liste
                await loadVentes();
            } else {
                const error = await response.json();
                showToast(error.message || 'Erreur lors de la suppression', 'error');
            }
        } catch (error) {
            hideLoading();
            console.error('Erreur lors de la suppression:', error);
            showToast('Erreur lors de la suppression', 'error');
        }
    }
});

function exportToExcel() {
    if (!ventesData || ventesData.length === 0) {
        showToast('Aucune donnée à exporter', 'warning');
        return;
    }
    
    let csvContent = "Numéro,Client,Entrepôt,Date Vente,Montant Total,Statut\n";
    ventesData.forEach(vente => {
        const numero = vente.numero_vente || 'N/A';
        const client = vente.client?.name || 'N/A';
        const entrepot = vente.entrepot?.name || 'N/A';
        const dateVente = formatDate(vente.date_vente);
        const montant = vente.montant_total || '0';
        const statut = getStatusLabel(vente.status);
        
        csvContent += `"${numero}","${client}","${entrepot}","${dateVente}","${montant}","${statut}"\n`;
    });
    
    const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
    const link = document.createElement('a');
    const url = URL.createObjectURL(blob);
    link.setAttribute('href', url);
    link.setAttribute('download', `ventes_${new Date().toISOString().split('T')[0]}.csv`);
    link.style.visibility = 'hidden';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    showToast('Export Excel réussi', 'success');
}

function exportToPDF() {
    if (!ventesData || ventesData.length === 0) {
        showToast('Aucune donnée à exporter', 'warning');
        return;
    }
    
    let htmlContent = `
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <title>Liste des Ventes</title>
            <style>
                body { font-family: Arial, sans-serif; margin: 20px; }
                h1 { color: #f00480; text-align: center; margin-bottom: 30px; }
                table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
                th { background-color: #f00480; color: white; }
                tr:nth-child(even) { background-color: #f2f2f2; }
                .header { text-align: center; margin-bottom: 20px; }
                .date { color: #666; font-size: 12px; }
            </style>
        </head>
        <body>
            <div class="header">
                <h1>Liste des Ventes</h1>
                <p class="date">Généré le ${new Date().toLocaleDateString('fr-FR')} à ${new Date().toLocaleTimeString('fr-FR')}</p>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Numéro</th>
                        <th>Client</th>
                        <th>Entrepôt</th>
                        <th>Date Vente</th>
                        <th>Montant Total</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
    `;
    
    ventesData.forEach(vente => {
        const numero = vente.numero_vente || 'N/A';
        const client = vente.client?.name || 'N/A';
        const entrepot = vente.entrepot?.name || 'N/A';
        const dateVente = formatDate(vente.date_vente);
        const montant = formatPrice(vente.montant_total);
        const statut = getStatusLabel(vente.status);
        
        htmlContent += `
            <tr>
                <td>${numero}</td>
                <td>${client}</td>
                <td>${entrepot}</td>
                <td>${dateVente}</td>
                <td>${montant}</td>
                <td>${statut}</td>
            </tr>
        `;
    });
    
    htmlContent += `
                </tbody>
            </table>
        </body>
        </html>
    `;
    
    const printWindow = window.open('', '_blank');
    printWindow.document.write(htmlContent);
    printWindow.document.close();
    printWindow.focus();
    printWindow.onload = function() {
        printWindow.print();
        printWindow.close();
    };
    showToast('Export PDF lancé', 'success');
}

function showLoading() {
    const tbody = document.getElementById('ventesTableBody');
    if (tbody) {
        tbody.innerHTML = `
            <tr>
                <td colspan="7" class="text-center py-4">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Chargement...</span>
                    </div>
                </td>
            </tr>
        `;
    }
}

function hideLoading() {
    // Le loading sera masqué automatiquement quand les données sont chargées
}

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
    
    // Supprimer le toast du DOM après qu'il soit caché
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

function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
    return null;
}
</script>

<?php $content = ob_get_clean(); ?>
<?php require './views/layouts/app-layout.php'; ?>
