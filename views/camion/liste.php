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
    .camions-wrapper {
        margin-left: 250px;
        margin-top: 70px;
        padding: 2rem;
        min-height: calc(100vh - 70px);
        background: #f8f9fa;
    }

    @media (max-width: 991px) {
        .camions-wrapper {
            margin-left: 0;
            margin-top: 60px;
            padding: 1rem;
        }
    }

    /* Header */
    .camions-header {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .camions-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, var(--info-color) 0%, #2563eb 100%);
    }

    .camions-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--secondary-color);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .camions-icon {
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

    /* Status badges */
    .status-badge {
        padding: 0.4rem 0.8rem;
        border-radius: 15px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: inline-block;
    }

    .status-disponible {
        background: rgba(16, 185, 129, 0.1);
        color: var(--success-color);
    }

    .status-en_mission {
        background: rgba(59, 130, 246, 0.1);
        color: var(--info-color);
    }

    .status-en_maintenance {
        background: rgba(245, 158, 11, 0.1);
        color: var(--warning-color);
    }

    .status-hors_service {
        background: rgba(239, 68, 68, 0.1);
        color: var(--danger-color);
    }

    /* Action buttons */
    .action-buttons {
        display: flex;
        gap: 0.5rem;
    }

    .btn-action {
        padding: 0.4rem 0.6rem;
        border-radius: 8px;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .btn-view {
        background: rgba(59, 130, 246, 0.1);
        color: var(--info-color);
    }

    .btn-view:hover {
        background: var(--info-color);
        color: white;
    }

    .btn-edit {
        background: rgba(245, 158, 11, 0.1);
        color: var(--warning-color);
    }

    .btn-edit:hover {
        background: var(--warning-color);
        color: white;
    }

    .btn-delete {
        background: rgba(239, 68, 68, 0.1);
        color: var(--danger-color);
    }

    .btn-delete:hover {
        background: var(--danger-color);
        color: white;
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
        
        .camions-title {
            font-size: 2rem;
        }
    }
</style>

<div class="camions-wrapper font-public-sans">
    <!-- Header -->
    <div class="camions-header fade-in">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="camions-title">
                <div class="camions-icon">
                    <i class="bi bi-truck"></i>
                </div>
                Gestion des Camions
            </h1>
            <a href="/camion/creer" class="btn-modern btn-primary-modern">
                <i class="bi bi-plus-circle"></i> Nouveau Camion
            </a>
        </div>
        <p class="text-muted mb-0">Gérez votre flotte de camions et véhicules de transport</p>
    </div>

    <!-- Filters -->
    <div class="filters-container fade-in">
        <h3 class="filters-title">
            <i class="bi bi-funnel"></i>
            Filtres
        </h3>
        
        <div class="filters-grid">
            <div class="filter-group">
                <label class="filter-label">Recherche</label>
                <input type="text" id="searchFilter" class="filter-control" placeholder="Numéro d'immatriculation ou marque...">
            </div>
            
            <div class="filter-group">
                <label class="filter-label">Statut</label>
                <select id="statusFilter" class="filter-control">
                    <option value="">Tous les statuts</option>
                    <option value="disponible">Disponible</option>
                    <option value="en_mission">En mission</option>
                    <option value="en_maintenance">En maintenance</option>
                    <option value="hors_service">Hors service</option>
                </select>
            </div>
            
            <div class="filter-group">
                <label class="filter-label">Marque</label>
                <input type="text" id="marqueFilter" class="filter-control" placeholder="Marque du camion...">
            </div>
            
            <div class="filter-group">
                <label class="filter-label">Capacité min (tonnes)</label>
                <input type="number" id="capaciteMinFilter" class="filter-control" placeholder="0" min="0" step="0.1">
            </div>
            
            <div class="filter-group">
                <label class="filter-label">Capacité max (tonnes)</label>
                <input type="number" id="capaciteMaxFilter" class="filter-control" placeholder="100" min="0" step="0.1">
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
                <span id="camionsCount">0</span> camions trouvés
            </h3>
            <div class="data-actions">
                <a href="/camions/supprimes" class="btn-modern btn-outline-modern">
                    <i class="bi bi-trash"></i>
                    Camions supprimés
                </a>
                <a href="/camions/statistiques" class="btn-modern btn-outline-modern">
                    <i class="bi bi-bar-chart"></i>
                    Statistiques
                </a>
                <button type="button" class="btn-modern btn-secondary-modern" onclick="refreshData()">
                    <i class="bi bi-arrow-clockwise"></i>
                    Actualiser
                </button>
            </div>
        </div>

        <!-- Loading -->
        <div id="loadingContainer" class="loading-container">
            <div class="loading-spinner"></div>
            <div class="loading-text">Chargement des camions...</div>
        </div>

        <!-- Table -->
        <div id="dataTableContainer" style="display: none;">
            <table class="table-modern">
                <thead>
                    <tr>
                        <th>Immatriculation</th>
                        <th>Marque/Modèle</th>
                        <th>Capacité</th>
                        <th>Statut</th>
                        <th>Date d'ajout</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="camionsTableBody">
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
                <i class="bi bi-truck"></i>
            </div>
            <h3>Aucun camion trouvé</h3>
            <p>Aucun camion ne correspond à vos critères de recherche.</p>
        </div>
    </div>
</div>

<script>
    let currentPage = 1;
    let totalPages = 1;
    let perPage = 15;
    let camions = [];
    let filteredCamions = [];

    document.addEventListener('DOMContentLoaded', function() {
        // Charger les données
        loadCamions();
        
        // Event listeners
        setupEventListeners();
    });

    function setupEventListeners() {
        // Filtres
        document.getElementById('searchFilter').addEventListener('input', debounce(applyFilters, 300));
        document.getElementById('statusFilter').addEventListener('change', applyFilters);
        document.getElementById('marqueFilter').addEventListener('input', debounce(applyFilters, 300));
        document.getElementById('capaciteMinFilter').addEventListener('change', applyFilters);
        document.getElementById('capaciteMaxFilter').addEventListener('change', applyFilters);
    }

    async function loadCamions() {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            
            if (!accessToken) {
                console.error('Token d\'accès manquant');
                return;
            }

            // Construire les paramètres de requête basés sur les filtres
            const params = new URLSearchParams();
            params.append('per_page', perPage);
            params.append('page', currentPage);
            
            // Ajouter les filtres depuis l'URL PHP
            <?php if (!empty($filters['search'])): ?>
            params.append('search', '<?php echo htmlspecialchars($filters['search']); ?>');
            <?php endif; ?>
            <?php if (!empty($filters['status'])): ?>
            params.append('status', '<?php echo htmlspecialchars($filters['status']); ?>');
            <?php endif; ?>
            <?php if (!empty($filters['marque'])): ?>
            params.append('marque', '<?php echo htmlspecialchars($filters['marque']); ?>');
            <?php endif; ?>
            <?php if (!empty($filters['capacite_min'])): ?>
            params.append('capacite_min', '<?php echo htmlspecialchars($filters['capacite_min']); ?>');
            <?php endif; ?>
            <?php if (!empty($filters['capacite_max'])): ?>
            params.append('capacite_max', '<?php echo htmlspecialchars($filters['capacite_max']); ?>');
            <?php endif; ?>

            const response = await fetch(`https://toure.gestiem.com/api/camions?${params.toString()}`, {
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });

            if (response.ok) {
                const result = await response.json();
                console.log('Réponse API camions:', result);
                
                // Gérer la structure de réponse avec pagination
                if (result.data && result.data.data) {
                    camions = result.data.data || [];
                    totalPages = Math.ceil(result.data.total / perPage);
                } else {
                    camions = result.data || [];
                }
                
                applyFilters();
                
                document.getElementById('loadingContainer').style.display = 'none';
                document.getElementById('dataTableContainer').style.display = 'block';
            } else {
                console.error('Erreur API:', response.status, response.statusText);
                const errorResult = await response.json();
                console.error('Détails erreur:', errorResult);
                throw new Error('Erreur lors du chargement des camions');
            }
        } catch (error) {
            console.error('Erreur:', error);
            document.getElementById('loadingContainer').style.display = 'none';
            document.getElementById('emptyState').style.display = 'block';
        }
    }

    function applyFilters() {
        const searchFilter = document.getElementById('searchFilter').value.toLowerCase();
        const statusFilter = document.getElementById('statusFilter').value;
        const marqueFilter = document.getElementById('marqueFilter').value.toLowerCase();
        const capaciteMin = parseFloat(document.getElementById('capaciteMinFilter').value) || 0;
        const capaciteMax = parseFloat(document.getElementById('capaciteMaxFilter').value) || Infinity;

        filteredCamions = camions.filter(camion => {
            // Filtre par recherche
            if (searchFilter && 
                !camion.numero_immat?.toLowerCase().includes(searchFilter) &&
                !camion.marque?.toLowerCase().includes(searchFilter)) {
                return false;
            }

            // Filtre par statut
            if (statusFilter && camion.status !== statusFilter) {
                return false;
            }

            // Filtre par marque
            if (marqueFilter && !camion.marque?.toLowerCase().includes(marqueFilter)) {
                return false;
            }

            // Filtre par capacité
            const capacite = parseFloat(camion.capacite) || 0;
            if (capacite < capaciteMin || capacite > capaciteMax) {
                return false;
            }

            return true;
        });

        currentPage = 1;
        totalPages = Math.ceil(filteredCamions.length / perPage);
        displayCamions();
        updatePagination();
        updateCount();
    }

    function displayCamions() {
        const tbody = document.getElementById('camionsTableBody');
        const startIndex = (currentPage - 1) * perPage;
        const endIndex = startIndex + perPage;
        const camionsToShow = filteredCamions.slice(startIndex, endIndex);

        if (camionsToShow.length === 0) {
            document.getElementById('dataTableContainer').style.display = 'none';
            document.getElementById('emptyState').style.display = 'block';
            return;
        }

        document.getElementById('dataTableContainer').style.display = 'block';
        document.getElementById('emptyState').style.display = 'none';

        tbody.innerHTML = camionsToShow.map(camion => `
            <tr>
                <td><strong>${camion.numero_immat || 'N/A'}</strong></td>
                <td>${camion.marque || 'N/A'} ${camion.modele ? `- ${camion.modele}` : ''}</td>
                <td>${camion.capacite || '0'} tonnes</td>
                <td>
                    <span class="status-badge status-${camion.status || 'disponible'}">
                        ${getStatusLabel(camion.status)}
                    </span>
                </td>
                <td class="date-cell">${formatDateTime(camion.created_at)}</td>
                <td class="actions-cell">
                    <div class="action-buttons">
                        <a href="/camion/${camion.camion_id || camion.id}" 
                           class="btn-action btn-view" title="Voir les détails">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="/camion/${camion.camion_id || camion.id}/modifier" 
                           class="btn-action btn-edit" title="Modifier">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <a href="/camion/${camion.camion_id || camion.id}/supprimer" 
                           class="btn-action btn-delete" title="Supprimer">
                            <i class="bi bi-trash"></i>
                        </a>
                    </div>
                </td>
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
        displayCamions();
        updatePagination();
    }

    function updateCount() {
        document.getElementById('camionsCount').textContent = filteredCamions.length;
    }

    function resetFilters() {
        document.getElementById('searchFilter').value = '';
        document.getElementById('statusFilter').value = '';
        document.getElementById('marqueFilter').value = '';
        document.getElementById('capaciteMinFilter').value = '';
        document.getElementById('capaciteMaxFilter').value = '';
        
        applyFilters();
    }

    function refreshData() {
        document.getElementById('loadingContainer').style.display = 'flex';
        document.getElementById('dataTableContainer').style.display = 'none';
        document.getElementById('emptyState').style.display = 'none';
        
        loadCamions();
    }

    function getStatusLabel(status) {
        const labels = {
            'disponible': 'Disponible',
            'en_mission': 'En mission',
            'en_maintenance': 'En maintenance',
            'hors_service': 'Hors service'
        };
        return labels[status] || status;
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
