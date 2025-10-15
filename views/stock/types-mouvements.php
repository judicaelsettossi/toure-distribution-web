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

    .type-card {
        background: #fff;
        border-radius: 12px;
        padding: 1.5rem;
        border: 2px solid #e9ecef;
        transition: all 0.3s ease;
        margin-bottom: 1rem;
        cursor: pointer;
    }

    .type-card:hover {
        border-color: var(--primary-color);
        background: var(--light-primary);
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(240, 4, 128, 0.15);
    }

    .type-card.active {
        border-color: var(--primary-color);
        background: var(--light-primary);
    }

    .type-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
        margin-bottom: 1rem;
    }

    .type-icon.in {
        background: linear-gradient(135deg, #28a745, #20c997);
    }

    .type-icon.out {
        background: linear-gradient(135deg, #dc3545, #fd7e14);
    }

    .type-icon.transfer {
        background: linear-gradient(135deg, #007bff, #6f42c1);
    }

    .type-icon.adjustment {
        background: linear-gradient(135deg, #ffc107, #fd7e14);
    }

    .type-name {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--secondary-color);
        margin-bottom: 0.5rem;
    }

    .type-description {
        color: #6c757d;
        font-size: 0.9rem;
        margin-bottom: 1rem;
        line-height: 1.5;
    }

    .type-status {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .status-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .status-badge.active {
        background-color: #d1edff;
        color: #0c5460;
    }

    .status-badge.inactive {
        background-color: #f8d7da;
        color: #721c24;
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

    .btn-success-modern {
        background-color: #28a745;
        color: white;
        border: 2px solid #28a745;
    }

    .btn-success-modern:hover {
        background-color: #218838;
        border-color: #1e7e34;
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

    .loading-spinner {
        display: inline-block;
        width: 1rem;
        height: 1rem;
        border: 2px solid transparent;
        border-top: 2px solid currentColor;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: #6c757d;
    }

    .empty-state i {
        font-size: 4rem;
        margin-bottom: 1rem;
        color: #dee2e6;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: linear-gradient(135deg, var(--light-primary) 0%, #f8f9fa 100%);
        border-radius: 12px;
        padding: 1.5rem;
        text-align: center;
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(240, 4, 128, 0.15);
    }

    .stat-value {
        font-size: 2rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 0.5rem;
    }

    .stat-label {
        color: #6c757d;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.875rem;
        letter-spacing: 0.5px;
    }

    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .type-card {
            margin-bottom: 1rem;
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
                            <li class="breadcrumb-item"><a class="breadcrumb-link text-primary-custom" href="/entree-sortie-stock">Gestion de Stock</a></li>
                            <li class="breadcrumb-item active">Types de Mouvements</li>
                        </ol>
                    </nav>
                    <h2 class="mb-0 text-secondary-custom">Types de Mouvements de Stock</h2>
                </div>
                <div class="col-sm-auto">
                    <button class="btn btn-outline-modern me-2" onclick="window.location.href='/stock/gestion'">
                        <i class="bi-arrow-left me-1"></i> Retour
                    </button>
                    <button class="btn btn-primary-custom" onclick="window.location.href='/stock/type-mouvement/creer'">
                        <i class="bi-plus-circle me-1"></i> Nouveau Type
                    </button>
                </div>
            </div>
        </div>

        <!-- Statistiques -->
        <div class="stats-grid" id="statsContainer">
            <div class="stat-card">
                <div class="stat-value" id="totalTypes">-</div>
                <div class="stat-label">Types Actifs</div>
            </div>
            <div class="stat-card">
                <div class="stat-value" id="totalMovements">-</div>
                <div class="stat-label">Mouvements Total</div>
            </div>
            <div class="stat-card">
                <div class="stat-value" id="activeTypes">-</div>
                <div class="stat-label">Types Utilisés</div>
            </div>
        </div>

        <!-- Liste des Types -->
        <div class="card card-custom">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="bi-gear me-2 text-primary-custom"></i>
                    Types de Mouvements Configurés
                    <span class="badge bg-secondary ms-2" id="typesCount">0</span>
                </h5>
            </div>
            <div class="card-body">
                <div id="loadingContainer" class="text-center py-5">
                    <div class="spinner-border text-primary-custom" role="status">
                        <span class="visually-hidden">Chargement...</span>
                    </div>
                    <p class="mt-3 text-muted">Chargement des types de mouvements...</p>
                </div>

                <div id="typesContainer" style="display: none;">
                    <div id="typesGrid" class="row">
                        <!-- Les types seront chargés ici -->
                    </div>
                </div>

                <div id="emptyState" class="empty-state" style="display: none;">
                    <i class="bi-gear"></i>
                    <h5>Aucun type de mouvement configuré</h5>
                    <p>Créez votre premier type de mouvement pour commencer à gérer vos stocks.</p>
                    <button class="btn btn-primary-custom" onclick="window.location.href='/stock/type-mouvement/creer'">
                        <i class="bi-plus-circle me-1"></i> Créer un Type
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    let movementTypes = [];

    document.addEventListener('DOMContentLoaded', function() {
        loadMovementTypes();
    });

    async function loadMovementTypes() {
        try {
            const response = await fetch('https://toure.gestiem.com/api/stock-movement-types', {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            if (response.ok) {
                const result = await response.json();
                movementTypes = result.data || [];
                displayMovementTypes();
                updateStatistics();
                
                document.getElementById('loadingContainer').style.display = 'none';
                document.getElementById('typesContainer').style.display = 'block';
            } else {
                showError('Erreur lors du chargement des types de mouvements');
            }
        } catch (error) {
            console.error('Erreur:', error);
            showError('Erreur de connexion au serveur');
        }
    }

    function displayMovementTypes() {
        const container = document.getElementById('typesGrid');
        
        if (movementTypes.length === 0) {
            document.getElementById('typesContainer').style.display = 'none';
            document.getElementById('emptyState').style.display = 'block';
            return;
        }

        document.getElementById('typesContainer').style.display = 'block';
        document.getElementById('emptyState').style.display = 'none';

        container.innerHTML = movementTypes.map(type => `
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="type-card" onclick="viewTypeDetails('${type.stock_movement_type_id}')">
                    <div class="type-icon ${getTypeIconClass(type.movement_type)}">
                        <i class="bi ${getTypeIcon(type.movement_type)}"></i>
                    </div>
                    <h5 class="type-name">${type.name}</h5>
                    <p class="type-description">${type.description || 'Aucune description'}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="type-status">
                            <span class="status-badge ${type.is_active ? 'active' : 'inactive'}">
                                ${type.is_active ? 'Actif' : 'Inactif'}
                            </span>
                        </div>
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-outline-primary" onclick="event.stopPropagation(); editType('${type.stock_movement_type_id}')" title="Modifier">
                                <i class="bi-pencil"></i>
                            </button>
                            <button class="btn btn-outline-danger" onclick="event.stopPropagation(); deleteType('${type.stock_movement_type_id}')" title="Supprimer">
                                <i class="bi-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `).join('');

        document.getElementById('typesCount').textContent = movementTypes.length;
    }

    function updateStatistics() {
        const totalTypes = movementTypes.length;
        const activeTypes = movementTypes.filter(type => type.is_active).length;
        
        // Pour les mouvements totaux, on pourrait faire un appel API séparé
        // Pour l'instant, on utilise une estimation basée sur les types actifs
        const estimatedMovements = activeTypes * 10; // Estimation

        document.getElementById('totalTypes').textContent = totalTypes;
        document.getElementById('activeTypes').textContent = activeTypes;
        document.getElementById('totalMovements').textContent = estimatedMovements;
    }

    function getTypeIconClass(movementType) {
        const iconClasses = {
            'in': 'in',
            'out': 'out',
            'transfer': 'transfer',
            'adjustment': 'adjustment'
        };
        return iconClasses[movementType] || 'in';
    }

    function getTypeIcon(movementType) {
        const icons = {
            'in': 'arrow-down-circle',
            'out': 'arrow-up-circle',
            'transfer': 'arrow-left-right',
            'adjustment': 'sliders'
        };
        return icons[movementType] || 'arrow-down-circle';
    }

    function viewTypeDetails(typeId) {
        // Pour l'instant, on redirige vers l'édition
        // On pourrait créer une page de détails dédiée
        window.location.href = `/stock/type-mouvement/${typeId}/edit`;
    }

    function editType(typeId) {
        window.location.href = `/stock/type-mouvement/${typeId}/edit`;
    }

    async function deleteType(typeId) {
        const type = movementTypes.find(t => t.stock_movement_type_id === typeId);
        if (!type) return;

        if (!confirm(`Êtes-vous sûr de vouloir supprimer le type "${type.name}" ?\n\nCette action est irréversible.`)) {
            return;
        }

        try {
            const response = await fetch(`https://toure.gestiem.com/api/stock-movement-types/${typeId}`, {
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            if (response.ok) {
                showNotification('success', 'Type de mouvement supprimé avec succès');
                loadMovementTypes(); // Recharger la liste
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
        document.getElementById('loadingContainer').innerHTML = `
            <i class="bi-exclamation-triangle fs-1 text-danger"></i>
            <p class="mt-3 text-danger">${message}</p>
            <button class="btn btn-primary-custom" onclick="location.reload()">
                <i class="bi-arrow-clockwise me-1"></i> Réessayer
            </button>
        `;
    }
</script>

<?php
$content = ob_get_clean();
require('./views/layouts/app-layout.php');
?>
