<?php ob_start(); ?>

<style>
    :root {
        --primary-color: #f00480;
        --secondary-color: #010768;
        --accent-color: #010068;
        --light-primary: rgba(240, 4, 128, 0.1);
        --light-secondary: rgba(1, 7, 104, 0.1);
        --success-color: #10b981;
        --warning-color: #f59e0b;
        --danger-color: #ef4444;
        --info-color: #3b82f6;
    }

    .font-public-sans {
        font-family: 'Public Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    }

    /* Fix chevauchement */
    .stock-movements-wrapper {
        margin-left: 250px;
        margin-top: 70px;
        padding: 2rem;
        min-height: calc(100vh - 70px);
        background: #f8f9fa;
    }

    @media (max-width: 991px) {
        .stock-movements-wrapper {
            margin-left: 0;
            margin-top: 60px;
            padding: 1rem;
        }
    }

    /* Header */
    .stock-movements-header {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .stock-movements-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, var(--info-color) 0%, #2563eb 100%);
    }

    .stock-movements-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--secondary-color);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .stock-movements-icon {
        width: 60px;
        height: 60px;
        border-radius: 15px;
        background: linear-gradient(135deg, var(--info-color), #2563eb);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
    }

    /* Filters */
    .filters-container {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        margin-bottom: 2rem;
    }

    .filters-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .filters-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .filter-group {
        display: flex;
        flex-direction: column;
    }

    .filter-label {
        font-weight: 600;
        color: var(--secondary-color);
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .filter-control {
        padding: 0.75rem 1rem;
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: white;
    }

    .filter-control:focus {
        outline: none;
        border-color: var(--info-color);
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .filter-actions {
        display: flex;
        gap: 1rem;
        justify-content: flex-end;
    }

    /* Data table */
    .data-container {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }

    .data-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .data-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin: 0;
    }

    .data-actions {
        display: flex;
        gap: 1rem;
    }

    /* Table */
    .table-modern {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1rem;
    }

    .table-modern th,
    .table-modern td {
        padding: 1rem;
        text-align: left;
        border-bottom: 1px solid #f0f0f0;
    }

    .table-modern th {
        background: #f8f9fa;
        font-weight: 700;
        color: var(--secondary-color);
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .table-modern tbody tr {
        transition: background-color 0.2s ease;
    }

    .table-modern tbody tr:hover {
        background: var(--light-primary);
    }

    /* Movement type badges */
    .movement-type {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .movement-type.in {
        background: rgba(16, 185, 129, 0.1);
        color: var(--success-color);
    }

    .movement-type.out {
        background: rgba(239, 68, 68, 0.1);
        color: var(--danger-color);
    }

    .movement-type.transfer {
        background: rgba(59, 130, 246, 0.1);
        color: var(--info-color);
    }

    .movement-type.adjustment {
        background: rgba(245, 158, 11, 0.1);
        color: var(--warning-color);
    }

    /* Product info */
    .product-info-cell {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .product-image-small {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        object-fit: cover;
        background: #f0f0f0;
    }

    .product-details-small h6 {
        margin: 0;
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--secondary-color);
    }

    .product-details-small small {
        color: #6b7280;
        font-size: 0.8rem;
    }

    /* Quantity */
    .quantity-cell {
        font-weight: 700;
        font-size: 1.1rem;
    }

    .quantity-cell.positive {
        color: var(--success-color);
    }

    .quantity-cell.negative {
        color: var(--danger-color);
    }

    /* Date */
    .date-cell {
        font-size: 0.9rem;
        color: #6b7280;
    }

    /* Pagination */
    .pagination-modern {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.5rem;
        margin-top: 2rem;
    }

    .pagination-btn {
        padding: 0.5rem 1rem;
        border: 2px solid #e5e7eb;
        background: white;
        color: var(--secondary-color);
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 600;
    }

    .pagination-btn:hover:not(:disabled) {
        border-color: var(--info-color);
        background: var(--light-primary);
    }

    .pagination-btn.active {
        background: var(--info-color);
        border-color: var(--info-color);
        color: white;
    }

    .pagination-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    /* Buttons */
    .btn-modern {
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.95rem;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
    }

    .btn-primary-modern {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        box-shadow: 0 4px 15px rgba(240, 4, 128, 0.3);
    }

    .btn-primary-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(240, 4, 128, 0.4);
    }

    .btn-outline-modern {
        background: white;
        color: var(--secondary-color);
        border: 2px solid var(--secondary-color);
    }

    .btn-outline-modern:hover {
        background: var(--secondary-color);
        color: white;
        transform: translateY(-2px);
    }

    .btn-secondary-modern {
        background: #6b7280;
        color: white;
    }

    .btn-secondary-modern:hover {
        background: #4b5563;
        transform: translateY(-2px);
    }

    /* Loading */
    .loading-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 400px;
        flex-direction: column;
        gap: 1rem;
    }

    .loading-spinner {
        width: 60px;
        height: 60px;
        border: 4px solid #f0f0f0;
        border-top-color: var(--info-color);
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    .loading-text {
        color: var(--secondary-color);
        font-weight: 600;
        font-size: 1.1rem;
    }

    /* Empty state */
    .empty-state {
        text-align: center;
        padding: 3rem;
        color: #6b7280;
    }

    .empty-state-icon {
        font-size: 4rem;
        color: #d1d5db;
        margin-bottom: 1rem;
    }

    .empty-state h3 {
        color: var(--secondary-color);
        margin-bottom: 0.5rem;
    }

    /* Animations */
    .fade-in {
        animation: fadeIn 0.6s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .filters-grid {
            grid-template-columns: 1fr;
        }
        
        .data-header {
            flex-direction: column;
            gap: 1rem;
            align-items: stretch;
        }
        
        .table-modern {
            font-size: 0.85rem;
        }
        
        .table-modern th,
        .table-modern td {
            padding: 0.75rem 0.5rem;
        }
        
        .stock-movements-title {
            font-size: 2rem;
        }
    }
</style>

<div class="stock-movements-wrapper font-public-sans">
    <!-- Header -->
    <div class="stock-movements-header fade-in">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="stock-movements-title">
                <div class="stock-movements-icon">
                    <i class="bi bi-arrow-left-right"></i>
                </div>
                Mouvements de Stock
            </h1>
            <a href="/entree-sortie-stock" class="btn-modern btn-outline-modern">
                <i class="bi bi-arrow-left"></i> Retour
            </a>
        </div>
        <p class="text-muted mb-0">Historique complet des mouvements de stock</p>
    </div>

    <!-- Filters -->
    <div class="filters-container fade-in">
        <h3 class="filters-title">
            <i class="bi bi-funnel"></i>
            Filtres
        </h3>
        
        <div class="filters-grid">
            <div class="filter-group">
                <label class="filter-label">Type de mouvement</label>
                <select id="movementTypeFilter" class="filter-control">
                    <option value="">Tous les types</option>
                    <option value="in">Entrées</option>
                    <option value="out">Sorties</option>
                    <option value="transfer">Transferts</option>
                    <option value="adjustment">Ajustements</option>
                </select>
            </div>
            
            <div class="filter-group">
                <label class="filter-label">Produit</label>
                <input type="text" id="productFilter" class="filter-control" placeholder="Rechercher un produit...">
            </div>
            
            <div class="filter-group">
                <label class="filter-label">Date de début</label>
                <input type="date" id="startDateFilter" class="filter-control">
            </div>
            
            <div class="filter-group">
                <label class="filter-label">Date de fin</label>
                <input type="date" id="endDateFilter" class="filter-control">
            </div>
        </div>
        
        <div class="filter-actions">
            <button type="button" class="btn-modern btn-secondary-modern" onclick="resetFilters()">
                <i class="bi bi-arrow-clockwise"></i>
                Réinitialiser
            </button>
            <button type="button" class="btn-modern btn-primary-modern" onclick="applyFilters()">
                <i class="bi bi-search"></i>
                Filtrer
            </button>
        </div>
    </div>

    <!-- Data container -->
    <div class="data-container fade-in">
        <div class="data-header">
            <h3 class="data-title">
                <span id="movementsCount">0</span> mouvements trouvés
            </h3>
            <div class="data-actions">
                <button type="button" class="btn-modern btn-outline-modern" onclick="exportMovements()">
                    <i class="bi bi-download"></i>
                    Exporter
                </button>
                <button type="button" class="btn-modern btn-primary-modern" onclick="refreshData()">
                    <i class="bi bi-arrow-clockwise"></i>
                    Actualiser
                </button>
            </div>
        </div>

        <!-- Loading -->
        <div id="loadingContainer" class="loading-container">
            <div class="loading-spinner"></div>
            <div class="loading-text">Chargement des mouvements...</div>
        </div>

        <!-- Table -->
        <div id="dataTableContainer" style="display: none;">
            <table class="table-modern">
                <thead>
                    <tr>
                        <th>Date/Heure</th>
                        <th>Type</th>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Motif</th>
                        <th>Référence</th>
                        <th>Utilisateur</th>
                    </tr>
                </thead>
                <tbody id="movementsTableBody">
                    <!-- Les données seront chargées ici -->
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="pagination-modern" id="paginationContainer">
                <!-- La pagination sera générée ici -->
            </div>
        </div>

        <!-- Empty state -->
        <div id="emptyState" class="empty-state" style="display: none;">
            <div class="empty-state-icon">
                <i class="bi bi-inbox"></i>
            </div>
            <h3>Aucun mouvement trouvé</h3>
            <p>Aucun mouvement de stock ne correspond à vos critères de recherche.</p>
        </div>
    </div>
</div>

<script>
    let currentPage = 1;
    let totalPages = 1;
    let perPage = 20;
    let movements = [];
    let filteredMovements = [];

    document.addEventListener('DOMContentLoaded', function() {
        // Définir les dates par défaut (30 derniers jours)
        const endDate = new Date();
        const startDate = new Date();
        startDate.setDate(startDate.getDate() - 30);
        
        document.getElementById('startDateFilter').value = startDate.toISOString().split('T')[0];
        document.getElementById('endDateFilter').value = endDate.toISOString().split('T')[0];

        // Charger les données
        loadMovements();
        
        // Event listeners
        setupEventListeners();
    });

    function setupEventListeners() {
        // Filtres
        document.getElementById('movementTypeFilter').addEventListener('change', applyFilters);
        document.getElementById('productFilter').addEventListener('input', debounce(applyFilters, 300));
        document.getElementById('startDateFilter').addEventListener('change', applyFilters);
        document.getElementById('endDateFilter').addEventListener('change', applyFilters);
    }

    async function loadMovements() {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            
            if (!accessToken) {
                console.error('Token d\'accès manquant');
                return;
            }

            const response = await fetch('https://toure.gestiem.com/api/stock/movements?per_page=1000', {
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });

            if (response.ok) {
                const result = await response.json();
                movements = result.data || [];
                applyFilters();
                
                document.getElementById('loadingContainer').style.display = 'none';
                document.getElementById('dataTableContainer').style.display = 'block';
            } else {
                throw new Error('Erreur lors du chargement des mouvements');
            }
        } catch (error) {
            console.error('Erreur:', error);
            document.getElementById('loadingContainer').style.display = 'none';
            document.getElementById('emptyState').style.display = 'block';
        }
    }

    function applyFilters() {
        const typeFilter = document.getElementById('movementTypeFilter').value;
        const productFilter = document.getElementById('productFilter').value.toLowerCase();
        const startDate = document.getElementById('startDateFilter').value;
        const endDate = document.getElementById('endDateFilter').value;

        filteredMovements = movements.filter(movement => {
            // Filtre par type
            if (typeFilter && movement.type !== typeFilter) {
                return false;
            }

            // Filtre par produit
            if (productFilter && !movement.product?.name?.toLowerCase().includes(productFilter)) {
                return false;
            }

            // Filtre par date
            if (startDate || endDate) {
                const movementDate = new Date(movement.created_at);
                const start = startDate ? new Date(startDate) : null;
                const end = endDate ? new Date(endDate + 'T23:59:59') : null;

                if (start && movementDate < start) return false;
                if (end && movementDate > end) return false;
            }

            return true;
        });

        currentPage = 1;
        totalPages = Math.ceil(filteredMovements.length / perPage);
        displayMovements();
        updatePagination();
        updateCount();
    }

    function displayMovements() {
        const tbody = document.getElementById('movementsTableBody');
        const startIndex = (currentPage - 1) * perPage;
        const endIndex = startIndex + perPage;
        const movementsToShow = filteredMovements.slice(startIndex, endIndex);

        if (movementsToShow.length === 0) {
            document.getElementById('dataTableContainer').style.display = 'none';
            document.getElementById('emptyState').style.display = 'block';
            return;
        }

        document.getElementById('dataTableContainer').style.display = 'block';
        document.getElementById('emptyState').style.display = 'none';

        tbody.innerHTML = movementsToShow.map(movement => `
            <tr>
                <td class="date-cell">${formatDateTime(movement.created_at)}</td>
                <td><span class="movement-type ${movement.type}">${getMovementTypeLabel(movement.type)}</span></td>
                <td class="product-info-cell">
                    ${movement.product?.picture ? `<img src="https://toure.gestiem.com/storage/${movement.product.picture}" class="product-image-small" alt="Image produit">` : ''}
                    <div class="product-details-small">
                        <h6>${movement.product?.name || 'Produit supprimé'}</h6>
                        <small>Code: ${movement.product?.code || 'N/A'}</small>
                    </div>
                </td>
                <td class="quantity-cell ${movement.type === 'in' ? 'positive' : 'negative'}">
                    ${movement.type === 'in' ? '+' : '-'}${movement.quantity}
                </td>
                <td>${movement.reason || '-'}</td>
                <td>${movement.reference || '-'}</td>
                <td>${movement.user?.name || 'Système'}</td>
            </tr>
        `).join('');
    }

    function updatePagination() {
        const container = document.getElementById('paginationContainer');
        
        if (totalPages <= 1) {
            container.style.display = 'none';
            return;
        }

        container.style.display = 'flex';
        
        let paginationHTML = '';
        
        // Bouton précédent
        paginationHTML += `
            <button class="pagination-btn" ${currentPage === 1 ? 'disabled' : ''} onclick="changePage(${currentPage - 1})">
                <i class="bi bi-chevron-left"></i>
            </button>
        `;
        
        // Pages
        const startPage = Math.max(1, currentPage - 2);
        const endPage = Math.min(totalPages, currentPage + 2);
        
        for (let i = startPage; i <= endPage; i++) {
            paginationHTML += `
                <button class="pagination-btn ${i === currentPage ? 'active' : ''}" onclick="changePage(${i})">
                    ${i}
                </button>
            `;
        }
        
        // Bouton suivant
        paginationHTML += `
            <button class="pagination-btn" ${currentPage === totalPages ? 'disabled' : ''} onclick="changePage(${currentPage + 1})">
                <i class="bi bi-chevron-right"></i>
            </button>
        `;
        
        container.innerHTML = paginationHTML;
    }

    function changePage(page) {
        if (page < 1 || page > totalPages) return;
        currentPage = page;
        displayMovements();
        updatePagination();
    }

    function updateCount() {
        document.getElementById('movementsCount').textContent = filteredMovements.length;
    }

    function resetFilters() {
        document.getElementById('movementTypeFilter').value = '';
        document.getElementById('productFilter').value = '';
        
        // Réinitialiser les dates
        const endDate = new Date();
        const startDate = new Date();
        startDate.setDate(startDate.getDate() - 30);
        
        document.getElementById('startDateFilter').value = startDate.toISOString().split('T')[0];
        document.getElementById('endDateFilter').value = endDate.toISOString().split('T')[0];
        
        applyFilters();
    }

    function refreshData() {
        document.getElementById('loadingContainer').style.display = 'flex';
        document.getElementById('dataTableContainer').style.display = 'none';
        document.getElementById('emptyState').style.display = 'none';
        
        loadMovements();
    }

    function exportMovements() {
        // TODO: Implémenter l'export
        alert('Fonctionnalité d\'export à implémenter');
    }

    function getMovementTypeLabel(type) {
        const labels = {
            'in': 'Entrée',
            'out': 'Sortie',
            'transfer': 'Transfert',
            'adjustment': 'Ajustement'
        };
        return labels[type] || type;
    }

    function formatDateTime(dateString) {
        const date = new Date(dateString);
        return new Intl.DateTimeFormat('fr-FR', {
            year: 'numeric',
            month: '2-digit',
            day: '2-digit',
            hour: '2-digit',
            minute: '2-digit'
        }).format(date);
    }

    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
</script>

<?php
$content = ob_get_clean();
require './views/layouts/app-layout.php';
?>
