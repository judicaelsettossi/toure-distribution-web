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
    .commandes-wrapper {
        margin-left: 250px;
        margin-top: 70px;
        padding: 2rem;
        min-height: calc(100vh - 70px);
        background: #f8f9fa;
    }

    @media (max-width: 991px) {
        .commandes-wrapper {
            margin-left: 0;
            margin-top: 60px;
            padding: 1rem;
        }
    }

    /* Header */
    .commandes-header {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .commandes-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, var(--info-color) 0%, #2563eb 100%);
    }

    .commandes-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--secondary-color);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .commandes-icon {
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

    .status-en_attente {
        background: rgba(245, 158, 11, 0.1);
        color: var(--warning-color);
    }

    .status-validee {
        background: rgba(59, 130, 246, 0.1);
        color: var(--info-color);
    }

    .status-en_cours {
        background: rgba(16, 185, 129, 0.1);
        color: var(--success-color);
    }

    .status-livree {
        background: rgba(16, 185, 129, 0.1);
        color: var(--success-color);
    }

    .status-partiellement_livree {
        background: rgba(245, 158, 11, 0.1);
        color: var(--warning-color);
    }

    .status-annulee {
        background: rgba(239, 68, 68, 0.1);
        color: var(--danger-color);
    }

    /* Retard badge */
    .retard-badge {
        padding: 0.3rem 0.6rem;
        border-radius: 12px;
        font-size: 0.7rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: inline-block;
        margin-top: 0.5rem;
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
        
        .commandes-title {
            font-size: 2rem;
        }
    }
</style>

<div class="commandes-wrapper font-public-sans">
    <!-- Header -->
    <div class="commandes-header fade-in">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="commandes-title">
                <div class="commandes-icon">
                    <i class="bi bi-cart-check"></i>
                </div>
                Gestion des Commandes
            </h1>
            <a href="/commande/creer" class="btn-modern btn-primary-modern">
                <i class="bi bi-plus-circle"></i> Nouvelle Commande
            </a>
        </div>
        <p class="text-muted mb-0">Gérez vos commandes auprès des fournisseurs</p>
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
                <input type="text" id="searchFilter" class="filter-control" placeholder="Numéro de commande...">
            </div>
            
            <div class="filter-group">
                <label class="filter-label">Statut</label>
                <select id="statusFilter" class="filter-control">
                    <option value="">Tous les statuts</option>
                    <option value="en_attente">En attente</option>
                    <option value="validee">Validée</option>
                    <option value="en_cours">En cours</option>
                    <option value="livree">Livrée</option>
                    <option value="partiellement_livree">Partiellement livrée</option>
                    <option value="annulee">Annulée</option>
                </select>
            </div>
            
            <div class="filter-group">
                <label class="filter-label">Fournisseur</label>
                <input type="text" id="fournisseurFilter" class="filter-control" placeholder="Nom du fournisseur...">
            </div>
            
            <div class="filter-group">
                <label class="filter-label">Date d'achat - Début</label>
                <input type="date" id="dateAchatDebutFilter" class="filter-control">
            </div>
            
            <div class="filter-group">
                <label class="filter-label">Date d'achat - Fin</label>
                <input type="date" id="dateAchatFinFilter" class="filter-control">
            </div>
            
            <div class="filter-group">
                <label class="filter-label">Montant min</label>
                <input type="number" id="montantMinFilter" class="filter-control" placeholder="0" min="0" step="0.01">
            </div>
            
            <div class="filter-group">
                <label class="filter-label">Montant max</label>
                <input type="number" id="montantMaxFilter" class="filter-control" placeholder="100000" min="0" step="0.01">
            </div>
            
            <div class="filter-group">
                <label class="filter-label">En retard</label>
                <select id="enRetardFilter" class="filter-control">
                    <option value="">Toutes</option>
                    <option value="1">En retard</option>
                    <option value="0">À jour</option>
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
                <span id="commandesCount">0</span> commandes trouvées
            </h3>
            <div class="data-actions">
                <a href="/commandes/supprimees" class="btn-modern btn-outline-modern">
                    <i class="bi bi-trash"></i>
                    Commandes supprimées
                </a>
                <a href="/commandes/statistiques" class="btn-modern btn-outline-modern">
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
            <div class="loading-text">Chargement des commandes...</div>
        </div>

        <!-- Table -->
        <div id="dataTableContainer" style="display: none;">
            <table class="table-modern">
                <thead>
                    <tr>
                        <th>N° Commande</th>
                        <th>Fournisseur</th>
                        <th>Date d'achat</th>
                        <th>Livraison prévue</th>
                        <th>Montant</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="commandesTableBody">
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
                <i class="bi bi-cart-check"></i>
            </div>
            <h3>Aucune commande trouvée</h3>
            <p>Aucune commande ne correspond à vos critères de recherche.</p>
        </div>
    </div>
</div>

<script>
    let currentPage = 1;
    let totalPages = 1;
    let perPage = 15;
    let commandes = [];
    let filteredCommandes = [];

    document.addEventListener('DOMContentLoaded', function() {
        // Charger les données
        loadCommandes();
        
        // Event listeners
        setupEventListeners();
    });

    function setupEventListeners() {
        // Filtres
        document.getElementById('searchFilter').addEventListener('input', debounce(applyFilters, 300));
        document.getElementById('statusFilter').addEventListener('change', applyFilters);
        document.getElementById('fournisseurFilter').addEventListener('input', debounce(applyFilters, 300));
        document.getElementById('dateAchatDebutFilter').addEventListener('change', applyFilters);
        document.getElementById('dateAchatFinFilter').addEventListener('change', applyFilters);
        document.getElementById('montantMinFilter').addEventListener('change', applyFilters);
        document.getElementById('montantMaxFilter').addEventListener('change', applyFilters);
        document.getElementById('enRetardFilter').addEventListener('change', applyFilters);
    }

    async function loadCommandes() {
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
            <?php if (!empty($filters['fournisseur_id'])): ?>
            params.append('fournisseur_id', '<?php echo htmlspecialchars($filters['fournisseur_id']); ?>');
            <?php endif; ?>
            <?php if (!empty($filters['date_achat_debut'])): ?>
            params.append('date_achat_debut', '<?php echo htmlspecialchars($filters['date_achat_debut']); ?>');
            <?php endif; ?>
            <?php if (!empty($filters['date_achat_fin'])): ?>
            params.append('date_achat_fin', '<?php echo htmlspecialchars($filters['date_achat_fin']); ?>');
            <?php endif; ?>
            <?php if (!empty($filters['montant_min'])): ?>
            params.append('montant_min', '<?php echo htmlspecialchars($filters['montant_min']); ?>');
            <?php endif; ?>
            <?php if (!empty($filters['montant_max'])): ?>
            params.append('montant_max', '<?php echo htmlspecialchars($filters['montant_max']); ?>');
            <?php endif; ?>
            <?php if (!empty($filters['en_retard'])): ?>
            params.append('en_retard', '<?php echo htmlspecialchars($filters['en_retard']); ?>');
            <?php endif; ?>

            const response = await fetch(`https://toure.gestiem.com/api/commandes?${params.toString()}`, {
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });

            if (response.ok) {
                const result = await response.json();
                console.log('Réponse API commandes:', result);
                
                // Gérer la structure de réponse avec pagination
                if (result.data && result.data.data) {
                    commandes = result.data.data || [];
                    totalPages = Math.ceil(result.data.total / perPage);
                } else {
                    commandes = result.data || [];
                }
                
                applyFilters();
                
                document.getElementById('loadingContainer').style.display = 'none';
                document.getElementById('dataTableContainer').style.display = 'block';
            } else {
                console.error('Erreur API:', response.status, response.statusText);
                const errorResult = await response.json();
                console.error('Détails erreur:', errorResult);
                throw new Error('Erreur lors du chargement des commandes');
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
        const fournisseurFilter = document.getElementById('fournisseurFilter').value.toLowerCase();
        const dateAchatDebut = document.getElementById('dateAchatDebutFilter').value;
        const dateAchatFin = document.getElementById('dateAchatFinFilter').value;
        const montantMin = parseFloat(document.getElementById('montantMinFilter').value) || 0;
        const montantMax = parseFloat(document.getElementById('montantMaxFilter').value) || Infinity;
        const enRetardFilter = document.getElementById('enRetardFilter').value;

        filteredCommandes = commandes.filter(commande => {
            // Filtre par recherche
            if (searchFilter && 
                !commande.numero_commande?.toLowerCase().includes(searchFilter)) {
                return false;
            }

            // Filtre par statut
            if (statusFilter && commande.status !== statusFilter) {
                return false;
            }

            // Filtre par fournisseur
            if (fournisseurFilter && 
                !commande.fournisseur?.name?.toLowerCase().includes(fournisseurFilter)) {
                return false;
            }

            // Filtre par date d'achat
            if (dateAchatDebut && commande.date_achat < dateAchatDebut) {
                return false;
            }
            if (dateAchatFin && commande.date_achat > dateAchatFin) {
                return false;
            }

            // Filtre par montant
            const montant = parseFloat(commande.montant) || 0;
            if (montant < montantMin || montant > montantMax) {
                return false;
            }

            // Filtre par retard
            if (enRetardFilter !== '') {
                const isEnRetard = isCommandeEnRetard(commande);
                if (enRetardFilter === '1' && !isEnRetard) {
                    return false;
                }
                if (enRetardFilter === '0' && isEnRetard) {
                    return false;
                }
            }

            return true;
        });

        currentPage = 1;
        totalPages = Math.ceil(filteredCommandes.length / perPage);
        displayCommandes();
        updatePagination();
        updateCount();
    }

    function displayCommandes() {
        const tbody = document.getElementById('commandesTableBody');
        const startIndex = (currentPage - 1) * perPage;
        const endIndex = startIndex + perPage;
        const commandesToShow = filteredCommandes.slice(startIndex, endIndex);

        if (commandesToShow.length === 0) {
            document.getElementById('dataTableContainer').style.display = 'none';
            document.getElementById('emptyState').style.display = 'block';
            return;
        }

        document.getElementById('dataTableContainer').style.display = 'block';
        document.getElementById('emptyState').style.display = 'none';

        tbody.innerHTML = commandesToShow.map(commande => `
            <tr>
                <td><strong>${commande.numero_commande || 'N/A'}</strong></td>
                <td>${commande.fournisseur?.name || 'N/A'}</td>
                <td class="date-cell">${formatDate(commande.date_achat)}</td>
                <td class="date-cell">
                    ${formatDate(commande.date_livraison_prevue)}
                    ${isCommandeEnRetard(commande) ? '<span class="retard-badge">En retard</span>' : ''}
                </td>
                <td>${formatCurrency(commande.montant)}</td>
                <td>
                    <span class="status-badge status-${commande.status || 'en_attente'}">
                        ${getStatusLabel(commande.status)}
                    </span>
                </td>
                <td class="actions-cell">
                    <div class="action-buttons">
                        <a href="/commande/${commande.commande_id || commande.id}" 
                           class="btn-action btn-view" title="Voir les détails">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="/commande/${commande.commande_id || commande.id}/items" 
                           class="btn-action btn-view" title="Voir les articles">
                            <i class="bi bi-list"></i>
                        </a>
                        <a href="/commande/${commande.commande_id || commande.id}/modifier" 
                           class="btn-action btn-edit" title="Modifier">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <a href="/commande/${commande.commande_id || commande.id}/supprimer" 
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
        displayCommandes();
        updatePagination();
    }

    function updateCount() {
        document.getElementById('commandesCount').textContent = filteredCommandes.length;
    }

    function resetFilters() {
        document.getElementById('searchFilter').value = '';
        document.getElementById('statusFilter').value = '';
        document.getElementById('fournisseurFilter').value = '';
        document.getElementById('dateAchatDebutFilter').value = '';
        document.getElementById('dateAchatFinFilter').value = '';
        document.getElementById('montantMinFilter').value = '';
        document.getElementById('montantMaxFilter').value = '';
        document.getElementById('enRetardFilter').value = '';
        
        applyFilters();
    }

    function refreshData() {
        document.getElementById('loadingContainer').style.display = 'flex';
        document.getElementById('dataTableContainer').style.display = 'none';
        document.getElementById('emptyState').style.display = 'none';
        
        loadCommandes();
    }

    function getStatusLabel(status) {
        const labels = {
            'en_attente': 'En attente',
            'validee': 'Validée',
            'en_cours': 'En cours',
            'livree': 'Livrée',
            'partiellement_livree': 'Partiellement livrée',
            'annulee': 'Annulée'
        };
        return labels[status] || status;
    }

    function formatDate(dateString) {
        if (!dateString) return 'N/A';
        const date = new Date(dateString);
        return new Intl.DateTimeFormat('fr-FR', {
            year: 'numeric',
            month: '2-digit',
            day: '2-digit'
        }).format(date);
    }

    function formatCurrency(amount) {
        if (!amount) return '0,00 FCFA';
        return new Intl.NumberFormat('fr-FR', {
            style: 'currency',
            currency: 'XOF',
            minimumFractionDigits: 2
        }).format(amount).replace('XOF', 'FCFA');
    }

    function isCommandeEnRetard(commande) {
        if (!commande.date_livraison_prevue) return false;
        const dateLivraisonPrevue = new Date(commande.date_livraison_prevue);
        const today = new Date();
        today.setHours(0, 0, 0, 0);
        
        // Une commande est en retard si la date de livraison prévue est dépassée
        // et qu'elle n'est pas encore livrée
        return dateLivraisonPrevue < today && 
               commande.status !== 'livree' && 
               commande.status !== 'annulee';
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
