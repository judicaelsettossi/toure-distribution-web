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
    .fournisseurs-wrapper {
        margin-left: 250px;
        margin-top: 70px;
        padding: 2rem;
        min-height: calc(100vh - 70px);
        background: #f8f9fa;
    }

    @media (max-width: 991px) {
        .fournisseurs-wrapper {
            margin-left: 0;
            margin-top: 60px;
            padding: 1rem;
        }
    }

    /* Header moderne */
    .fournisseurs-header {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .fournisseurs-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    }

    .fournisseurs-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--secondary-color);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .fournisseurs-icon {
        width: 60px;
        height: 60px;
        border-radius: 15px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        box-shadow: 0 8px 25px rgba(240, 4, 128, 0.3);
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
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px var(--light-primary);
    }

    .filter-actions {
        display: flex;
        gap: 1rem;
        justify-content: flex-end;
    }

    /* Data container */
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

    /* Cards grid */
    .fournisseurs-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 2rem;
    }

    .fournisseur-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        border: 2px solid transparent;
    }

    .fournisseur-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .fournisseur-card:hover::before {
        transform: scaleX(1);
    }

    .fournisseur-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.12);
        border-color: var(--light-primary);
    }

    .fournisseur-card.inactive {
        opacity: 0.7;
        border-color: #e5e7eb;
    }

    .fournisseur-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 1.5rem;
    }

    .fournisseur-info h3 {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin: 0 0 0.25rem 0;
    }

    .fournisseur-code {
        color: var(--primary-color);
        font-weight: 600;
        font-size: 0.9rem;
    }

    .fournisseur-status {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .fournisseur-status.active {
        background: rgba(16, 185, 129, 0.1);
        color: var(--success-color);
    }

    .fournisseur-status.inactive {
        background: rgba(239, 68, 68, 0.1);
        color: var(--danger-color);
    }

    .fournisseur-details {
        margin-bottom: 1.5rem;
    }

    .detail-row {
        display: flex;
        align-items: center;
        margin-bottom: 0.75rem;
        font-size: 0.9rem;
    }

    .detail-row:last-child {
        margin-bottom: 0;
    }

    .detail-icon {
        width: 20px;
        color: var(--primary-color);
        margin-right: 0.75rem;
        font-size: 1rem;
    }

    .detail-text {
        color: #6b7280;
        flex: 1;
    }

    .detail-text strong {
        color: var(--secondary-color);
        font-weight: 600;
    }

    .fournisseur-actions {
        display: flex;
        gap: 0.5rem;
        justify-content: flex-end;
    }

    /* Buttons */
    .btn-modern {
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.85rem;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
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

    .btn-success-modern {
        background: var(--success-color);
        color: white;
    }

    .btn-success-modern:hover {
        background: #059669;
        transform: translateY(-2px);
    }

    .btn-danger-modern {
        background: var(--danger-color);
        color: white;
    }

    .btn-danger-modern:hover {
        background: #dc2626;
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
        border-top-color: var(--primary-color);
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
        border-color: var(--primary-color);
        background: var(--light-primary);
    }

    .pagination-btn.active {
        background: var(--primary-color);
        border-color: var(--primary-color);
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
        .fournisseurs-grid {
            grid-template-columns: 1fr;
        }
        
        .data-header {
            flex-direction: column;
            gap: 1rem;
            align-items: stretch;
        }
        
        .fournisseurs-title {
            font-size: 2rem;
        }
        
        .filters-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="fournisseurs-wrapper font-public-sans">
    <!-- Header -->
    <div class="fournisseurs-header fade-in">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="fournisseurs-title">
                <div class="fournisseurs-icon">
                    <i class="bi bi-truck"></i>
                </div>
                Fournisseurs
            </h1>
            <a href="/fournisseur/ajouter" class="btn-modern btn-primary-modern">
                <i class="bi bi-plus-circle"></i> Nouveau Fournisseur
            </a>
        </div>
        <p class="text-muted mb-0">Gérez vos fournisseurs et partenaires commerciaux</p>
    </div>

    <!-- Filters -->
    <div class="filters-container fade-in">
        <h3 class="filters-title">
            <i class="bi bi-funnel"></i>
            Filtres et Recherche
        </h3>
        
        <div class="filters-grid">
            <div class="filter-group">
                <label class="filter-label">Recherche</label>
                <input type="text" id="searchInput" class="filter-control" placeholder="Nom, code ou email...">
            </div>
            
            <div class="filter-group">
                <label class="filter-label">Ville</label>
                <input type="text" id="cityFilter" class="filter-control" placeholder="Filtrer par ville...">
            </div>
            
            <div class="filter-group">
                <label class="filter-label">Statut</label>
                <select id="statusFilter" class="filter-control">
                    <option value="">Tous les statuts</option>
                    <option value="1">Actifs</option>
                    <option value="0">Inactifs</option>
                </select>
            </div>
            
            <div class="filter-group">
                <label class="filter-label">Trier par</label>
                <select id="sortByFilter" class="filter-control">
                    <option value="name">Nom</option>
                    <option value="code">Code</option>
                    <option value="created_at">Date de création</option>
                    <option value="city">Ville</option>
                </select>
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
                <span id="fournisseursCount">0</span> fournisseurs trouvés
            </h3>
            <div class="data-actions">
                <button type="button" class="btn-modern btn-outline-modern" onclick="exportFournisseurs()">
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
            <div class="loading-text">Chargement des fournisseurs...</div>
        </div>

        <!-- Fournisseurs Grid -->
        <div id="fournisseursGrid" class="fournisseurs-grid" style="display: none;">
            <!-- Les cartes de fournisseurs seront chargées ici -->
        </div>

        <!-- Pagination -->
        <div class="pagination-modern" id="paginationContainer" style="display: none;">
            <!-- La pagination sera générée ici -->
        </div>

        <!-- Empty state -->
        <div id="emptyState" class="empty-state" style="display: none;">
            <div class="empty-state-icon">
                <i class="bi bi-truck"></i>
            </div>
            <h3>Aucun fournisseur trouvé</h3>
            <p>Aucun fournisseur ne correspond à vos critères de recherche.</p>
            <a href="/fournisseur/ajouter" class="btn-modern btn-primary-modern">
                <i class="bi bi-plus-circle"></i>
                Créer le premier fournisseur
            </a>
        </div>
    </div>
</div>

<script>
    let currentPage = 1;
    let totalPages = 1;
    let perPage = 12;
    let fournisseurs = [];
    let filteredFournisseurs = [];

    document.addEventListener('DOMContentLoaded', function() {
        // Charger les données
        loadFournisseurs();
        
        // Event listeners
        setupEventListeners();
    });

    function setupEventListeners() {
        // Filtres
        document.getElementById('searchInput').addEventListener('input', debounce(applyFilters, 300));
        document.getElementById('cityFilter').addEventListener('input', debounce(applyFilters, 300));
        document.getElementById('statusFilter').addEventListener('change', applyFilters);
        document.getElementById('sortByFilter').addEventListener('change', applyFilters);
    }

    async function loadFournisseurs() {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            
            if (!accessToken) {
                console.error('Token d\'accès manquant');
                return;
            }

            const response = await fetch('https://toure.gestiem.com/api/fournisseurs?per_page=1000', {
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });

            if (response.ok) {
                const result = await response.json();
                fournisseurs = result.data || [];
                applyFilters();
                
                document.getElementById('loadingContainer').style.display = 'none';
                document.getElementById('fournisseursGrid').style.display = 'grid';
            } else {
                throw new Error('Erreur lors du chargement des fournisseurs');
            }
        } catch (error) {
            console.error('Erreur:', error);
            document.getElementById('loadingContainer').style.display = 'none';
            document.getElementById('emptyState').style.display = 'block';
        }
    }

    function applyFilters() {
        const searchTerm = document.getElementById('searchInput').value.toLowerCase();
        const cityFilter = document.getElementById('cityFilter').value.toLowerCase();
        const statusFilter = document.getElementById('statusFilter').value;
        const sortBy = document.getElementById('sortByFilter').value;

        filteredFournisseurs = fournisseurs.filter(fournisseur => {
            // Filtre par recherche
            if (searchTerm) {
                const searchMatch = 
                    (fournisseur.name && fournisseur.name.toLowerCase().includes(searchTerm)) ||
                    (fournisseur.code && fournisseur.code.toLowerCase().includes(searchTerm)) ||
                    (fournisseur.email && fournisseur.email.toLowerCase().includes(searchTerm)) ||
                    (fournisseur.responsable && fournisseur.responsable.toLowerCase().includes(searchTerm));
                
                if (!searchMatch) return false;
            }

            // Filtre par ville
            if (cityFilter && (!fournisseur.city || !fournisseur.city.toLowerCase().includes(cityFilter))) {
                return false;
            }

            // Filtre par statut
            if (statusFilter !== '' && fournisseur.is_active != statusFilter) {
                return false;
            }

            return true;
        });

        // Tri
        filteredFournisseurs.sort((a, b) => {
            let aVal, bVal;
            
            switch (sortBy) {
                case 'name':
                    aVal = a.name || '';
                    bVal = b.name || '';
                    break;
                case 'code':
                    aVal = a.code || '';
                    bVal = b.code || '';
                    break;
                case 'created_at':
                    aVal = new Date(a.created_at || 0);
                    bVal = new Date(b.created_at || 0);
                    break;
                case 'city':
                    aVal = a.city || '';
                    bVal = b.city || '';
                    break;
                default:
                    return 0;
            }
            
            if (aVal < bVal) return -1;
            if (aVal > bVal) return 1;
            return 0;
        });

        currentPage = 1;
        totalPages = Math.ceil(filteredFournisseurs.length / perPage);
        displayFournisseurs();
        updatePagination();
        updateCount();
    }

    function displayFournisseurs() {
        const grid = document.getElementById('fournisseursGrid');
        const startIndex = (currentPage - 1) * perPage;
        const endIndex = startIndex + perPage;
        const fournisseursToShow = filteredFournisseurs.slice(startIndex, endIndex);

        if (fournisseursToShow.length === 0) {
            grid.style.display = 'none';
            document.getElementById('paginationContainer').style.display = 'none';
            document.getElementById('emptyState').style.display = 'block';
            return;
        }

        grid.style.display = 'grid';
        document.getElementById('paginationContainer').style.display = 'flex';
        document.getElementById('emptyState').style.display = 'none';

        grid.innerHTML = fournisseursToShow.map(fournisseur => `
            <div class="fournisseur-card ${!fournisseur.is_active ? 'inactive' : ''}" data-id="${fournisseur.fournisseur_id}">
                <div class="fournisseur-header">
                    <div class="fournisseur-info">
                        <h3>${fournisseur.name || 'Fournisseur sans nom'}</h3>
                        <div class="fournisseur-code">${fournisseur.code || 'Code non défini'}</div>
                    </div>
                    <div class="fournisseur-status ${fournisseur.is_active ? 'active' : 'inactive'}">
                        ${fournisseur.is_active ? 'Actif' : 'Inactif'}
                    </div>
                </div>

                <div class="fournisseur-details">
                    ${fournisseur.responsable ? `
                        <div class="detail-row">
                            <i class="bi bi-person detail-icon"></i>
                            <div class="detail-text">
                                <strong>Responsable:</strong> ${fournisseur.responsable}
                            </div>
                        </div>
                    ` : ''}
                    
                    ${fournisseur.email ? `
                        <div class="detail-row">
                            <i class="bi bi-envelope detail-icon"></i>
                            <div class="detail-text">
                                <strong>Email:</strong> ${fournisseur.email}
                            </div>
                        </div>
                    ` : ''}
                    
                    ${fournisseur.phone ? `
                        <div class="detail-row">
                            <i class="bi bi-telephone detail-icon"></i>
                            <div class="detail-text">
                                <strong>Téléphone:</strong> ${fournisseur.phone}
                            </div>
                        </div>
                    ` : ''}
                    
                    ${fournisseur.city ? `
                        <div class="detail-row">
                            <i class="bi bi-geo-alt detail-icon"></i>
                            <div class="detail-text">
                                <strong>Ville:</strong> ${fournisseur.city}
                            </div>
                        </div>
                    ` : ''}
                    
                    ${fournisseur.payment_terms ? `
                        <div class="detail-row">
                            <i class="bi bi-credit-card detail-icon"></i>
                            <div class="detail-text">
                                <strong>Paiement:</strong> ${fournisseur.payment_terms}
                            </div>
                        </div>
                    ` : ''}
                </div>

                <div class="fournisseur-actions">
                    <a href="/fournisseur/${fournisseur.fournisseur_id}/details" class="btn-modern btn-outline-modern">
                        <i class="bi bi-eye"></i>
                        Détails
                    </a>
                    <a href="/fournisseur/${fournisseur.fournisseur_id}/edit" class="btn-modern btn-primary-modern">
                        <i class="bi bi-pencil"></i>
                        Modifier
                    </a>
                </div>
            </div>
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
        displayFournisseurs();
        updatePagination();
    }

    function updateCount() {
        document.getElementById('fournisseursCount').textContent = filteredFournisseurs.length;
    }

    function resetFilters() {
        document.getElementById('searchInput').value = '';
        document.getElementById('cityFilter').value = '';
        document.getElementById('statusFilter').value = '';
        document.getElementById('sortByFilter').value = 'name';
        
        applyFilters();
    }

    function refreshData() {
        document.getElementById('loadingContainer').style.display = 'flex';
        document.getElementById('fournisseursGrid').style.display = 'none';
        document.getElementById('paginationContainer').style.display = 'none';
        document.getElementById('emptyState').style.display = 'none';
        
        loadFournisseurs();
    }

    function exportFournisseurs() {
        // TODO: Implémenter l'export
        alert('Fonctionnalité d\'export à implémenter');
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
