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
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .btn-primary-custom:hover {
        background-color: #d1036d;
        border-color: #d1036d;
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(240, 4, 128, 0.3);
    }

    /* Grille pour les cartes de stats */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .stats-card {
        background: white;
        border-radius: 12px;
        padding: 1rem;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        border: none;
        border-left: 4px solid var(--primary-color);
        transition: all 0.3s ease;
        min-height: 80px;
        display: flex;
        flex-direction: column;
    }

    .stats-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 25px rgba(0, 0, 0, 0.15);
    }

    /* Responsive pour les cartes de stats */
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

    @media (min-width: 769px) and (max-width: 992px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (min-width: 993px) {
        .stats-grid {
            grid-template-columns: repeat(4, 1fr);
        }
    }

    .client-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        color: white;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    }

    .filter-card {
        background: linear-gradient(135deg, var(--light-primary) 0%, #f8f9fa 100%);
        border-left: 4px solid var(--primary-color);
    }

    .table-hover tbody tr:hover {
        background-color: var(--light-primary);
        cursor: pointer;
    }

    .badge-type {
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 600;
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

    .badge-indefini {
        background-color: #f5f5f5;
        color: #757575;
    }

    .action-btn {
        width: 35px;
        height: 35px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .action-btn:hover {
        transform: scale(1.1);
    }

    /* Styles pour les badges de statut */
    .badge-success {
        background-color: #d4edda !important;
        color: #155724 !important;
        border: 1px solid #c3e6cb;
    }

    .badge-danger {
        background-color: #f8d7da !important;
        color: #721c24 !important;
        border: 1px solid #f5c6cb;
    }

    .badge-warning {
        background-color: #fff3cd !important;
        color: #856404 !important;
        border: 1px solid #ffeaa7;
    }

    .badge-info {
        background-color: #d1ecf1 !important;
        color: #0c5460 !important;
        border: 1px solid #bee5eb;
    }

    .btn-outline-modern {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        font-weight: 500;
        border-radius: 6px;
        transition: all 0.3s ease;
        border: 1px solid #e9ecef;
        background: white;
        color: #6c757d;
        font-size: 0.9rem;
    }

    .btn-outline-modern:hover {
        background-color: #f8f9fa;
        border-color: var(--primary-color);
        color: var(--primary-color);
        transform: translateY(-1px);
        box-shadow: 0 3px 10px rgba(240, 4, 128, 0.3);
    }

    .btn-secondary-modern {
        background-color: #6c757d;
        border-color: #6c757d;
        color: white;
        font-weight: 600;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        font-size: 0.9rem;
    }

    .btn-secondary-modern:hover {
        background-color: #5a6268;
        border-color: #545b62;
        color: white;
        transform: translateY(-1px);
    }

    .card-custom {
        border-radius: 12px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        border: none;
    }

    .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        font-weight: 600;
        color: white;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    }

    .status-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .badge-active {
        background-color: #e8f5e9;
        color: #388e3c;
    }

    .badge-inactive {
        background-color: #ffebee;
        color: #d32f2f;
    }

    .badge-verified {
        background-color: #e3f2fd;
        color: #1976d2;
    }

    .badge-unverified {
        background-color: #fff3e0;
        color: #f57c00;
    }

    .search-container {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        margin-bottom: 1.5rem;
    }

    .form-control-modern {
        border: 1px solid #e9ecef;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        background-color: #fff;
    }

    .form-control-modern:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(240, 4, 128, 0.25);
        background-color: #fff;
    }

    .table-modern {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
    }

    .table-modern thead {
        background: linear-gradient(135deg, var(--primary-color) 0%, #d1036d 100%);
    }

    .table-modern th {
        border: none;
        font-weight: 600;
        color: white;
        padding: 1rem;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .table-modern td {
        border: none;
        padding: 1rem;
        vertical-align: middle;
        border-bottom: 1px solid #e9ecef;
    }

    .table-modern tbody tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    .table-modern tbody tr:hover {
        background-color: var(--light-primary);
        transform: scale(1.01);
        transition: all 0.2s ease;
    }

    .pagination-modern {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.5rem;
        margin-top: 2rem;
    }

    .page-link-modern {
        padding: 0.5rem 0.75rem;
        border: 1px solid #e9ecef;
        background: white;
        color: #6c757d;
        text-decoration: none;
        border-radius: 6px;
        transition: all 0.3s ease;
    }

    .page-link-modern:hover {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
    }

    .page-link-modern.active {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
    }

    .loading-spinner {
        text-align: center;
        padding: 3rem;
    }

    .error-message {
        text-align: center;
        padding: 3rem;
        color: #dc3545;
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }

    .btn-sm-modern {
        padding: 0.375rem 0.75rem;
        font-size: 0.8rem;
        border-radius: 4px;
    }

    @media (max-width: 768px) {
        .search-container {
            padding: 1rem;
        }

        .table-modern {
            font-size: 0.8rem;
        }

        .table-modern th,
        .table-modern td {
            padding: 0.75rem 0.5rem;
        }

        .action-buttons {
            flex-direction: column;
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
                            <li class="breadcrumb-item active">Utilisateurs</li>
                        </ol>
                    </nav>
                    <h1 class="page-header-title text-secondary-custom">
                        <i class="bi-people-fill me-2"></i>Liste des Utilisateurs
                    </h1>
                    <p class="text-muted mb-0">Gérez les utilisateurs de la plateforme</p>
                </div>
                <div class="col-sm-auto">
                    <button class="btn btn-primary-custom" onclick="window.location.href='/utilisateur/creer'">
                        <i class="bi-person-plus me-1"></i> Nouvel Utilisateur
                    </button>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="stats-grid" id="statsContainer">
            <div class="stats-card">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <div>
                        <span class="d-block text-muted small mb-1">Total Utilisateurs</span>
                        <h4 class="mb-0 text-secondary-custom" id="totalUsers">-</h4>
                    </div>
                    <div class="client-avatar" style="width: 40px; height: 40px;">
                        <i class="bi-people fs-5"></i>
                    </div>
                </div>
            </div>

            <div class="stats-card" style="border-left-color: #28a745;">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <div>
                        <span class="d-block text-muted small mb-1">Utilisateurs Actifs</span>
                        <h4 class="mb-0 text-success" id="activeUsers">-</h4>
                    </div>
                    <div class="client-avatar" style="width: 40px; height: 40px; background: linear-gradient(135deg, #28a745 0%, #20c997 100%);">
                        <i class="bi-check-circle fs-5"></i>
                    </div>
                </div>
            </div>

            <div class="stats-card" style="border-left-color: #17a2b8;">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <div>
                        <span class="d-block text-muted small mb-1">Emails Vérifiés</span>
                        <h4 class="mb-0 text-info" id="verifiedEmails">-</h4>
                    </div>
                    <div class="client-avatar" style="width: 40px; height: 40px; background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);">
                        <i class="bi-envelope-check fs-5"></i>
                    </div>
                </div>
            </div>

            <div class="stats-card" style="border-left-color: #dc3545;">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <div>
                        <span class="d-block text-muted small mb-1">Comptes Bloqués</span>
                        <h4 class="mb-0 text-danger" id="lockedAccounts">-</h4>
                    </div>
                    <div class="client-avatar" style="width: 40px; height: 40px; background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);">
                        <i class="bi-lock fs-5"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="card card-custom filter-card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label small fw-semibold">Recherche Globale</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi-search"></i></span>
                            <input type="text" class="form-control" id="searchInput" placeholder="Nom, email, username...">
                        </div>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label class="form-label small fw-semibold">Statut</label>
                        <select class="form-select" id="statusFilter">
                            <option value="">Tous</option>
                            <option value="1">Actifs</option>
                            <option value="0">Inactifs</option>
                        </select>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label class="form-label small fw-semibold">Poste</label>
                        <input type="text" class="form-control" id="posteFilter" placeholder="Filtrer par poste...">
                    </div>

                    <div class="col-md-2 mb-3">
                        <label class="form-label small fw-semibold">Par page</label>
                        <select class="form-select" id="perPageSelect">
                            <option value="15">15</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>

                    <div class="col-md-2 mb-3 d-flex align-items-end">
                        <button class="btn btn-primary-custom w-100" onclick="loadUsers()">
                            <i class="bi-search me-1"></i> Rechercher
                        </button>
                    </div>

                    <div class="col-md-1 mb-3 d-flex align-items-end">
                        <button class="btn btn-success w-100" onclick="exportToExcel()" title="Exporter en Excel">
                            <i class="bi-file-earmark-excel"></i>
                        </button>
                    </div>

                    <div class="col-md-1 mb-3 d-flex align-items-end">
                        <button class="btn btn-danger w-100" onclick="exportToPDF()" title="Exporter en PDF">
                            <i class="bi-file-earmark-pdf"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Loading State -->
        <div class="loading-spinner" id="loadingSpinner">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Chargement...</span>
            </div>
            <p class="mt-3">Chargement des utilisateurs...</p>
        </div>

        <!-- Error State -->
        <div class="error-message d-none" id="errorMessage">
            <i class="bi-exclamation-triangle-fill fs-1"></i>
            <h5>Erreur de chargement</h5>
            <p id="errorText">Une erreur s'est produite lors du chargement des utilisateurs.</p>
            <button class="btn btn-primary-custom mt-3" onclick="loadUsers()">
                <i class="bi-arrow-clockwise me-1"></i> Réessayer
            </button>
        </div>

        <!-- Users Table -->
        <div class="card card-custom d-none" id="usersTable">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-nowrap align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Utilisateur</th>
                                <th>Email</th>
                                <th>Poste</th>
                                <th>Statut</th>
                                <th>Email Vérifié</th>
                                <th>Dernière Connexion</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="usersTableBody">
                            <!-- Loading skeleton -->
                            <tr class="skeleton-row">
                                <td colspan="7" class="text-center py-5">
                                    <div class="spinner-border text-primary-custom" role="status">
                                        <span class="visually-hidden">Chargement...</span>
                                    </div>
                                    <p class="mt-3 text-muted">Chargement des utilisateurs...</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="pagination-modern d-none" id="paginationContainer">
            <!-- Pagination will be loaded here -->
        </div>
    </div>
</main>

<script>
    // Variables globales
    let currentUsers = [];
    let currentPage = 1;
    let totalPages = 1;
    let perPage = 15;
    let currentFilters = {
        search: '',
        is_active: '',
        poste: ''
    };

    // Fonction pour récupérer un cookie
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
    }

    // Fonction de debug avancée pour les cookies
    function debugCookies() {
        console.log('=== DEBUG COOKIES ===');
        console.log('document.cookie:', document.cookie);

        // Tester différentes méthodes de récupération
        const methods = {
            'getCookie': getCookie,
            'splitMethod': (name) => {
                const cookies = document.cookie.split(';');
                for (let cookie of cookies) {
                    const [key, value] = cookie.trim().split('=');
                    if (key === name) return value;
                }
                return null;
            },
            'regexMethod': (name) => {
                const match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
                return match ? match[2] : null;
            }
        };

        const testCookies = ['connected', 'access_token', 'user_id'];
        testCookies.forEach(cookieName => {
            console.log(`\n--- ${cookieName} ---`);
            Object.entries(methods).forEach(([methodName, method]) => {
                const result = method(cookieName);
                console.log(`${methodName}:`, result);
            });
        });
        console.log('=== FIN DEBUG ===');
    }

    // Fonction pour obtenir les initiales d'un utilisateur
    function getUserInitials(firstname, lastname) {
        const firstInitial = (firstname || '').charAt(0);
        const lastInitial = (lastname || '').charAt(0);
        const initials = (firstInitial + lastInitial).toUpperCase();
        return initials || 'U';
    }

    // Fonction pour formater la date
    function formatDate(dateString) {
        if (!dateString) return '-';
        const date = new Date(dateString);
        return date.toLocaleDateString('fr-FR');
    }

    // Fonction pour formater la date et l'heure
    function formatDateTime(dateString) {
        if (!dateString) return '-';
        const date = new Date(dateString);
        return date.toLocaleString('fr-FR');
    }

    // Fonction pour charger les statistiques
    async function loadStatistics() {
        try {
            const accessToken = getCookie('access_token') || localStorage.getItem('access_token');

            if (!accessToken) {
                console.warn('Aucun token d\'authentification trouvé pour les statistiques');
                return;
            }

            console.log('Debug - Token utilisé pour les statistiques:', accessToken.substring(0, 20) + '...');

            const response = await fetch('/api/users/statistics', {
                method: 'GET',
                headers: {
                    'Accept': 'application/json'
                }
            });

            if (response.ok) {
                const data = await response.json();
                if (data.success && data.data) {
                    document.getElementById('totalUsers').textContent = data.data.total_users || 0;
                    document.getElementById('activeUsers').textContent = data.data.active_users || 0;
                    document.getElementById('verifiedEmails').textContent = data.data.verified_emails || 0;
                    document.getElementById('lockedAccounts').textContent = data.data.locked_accounts || 0;
                    document.getElementById('statsContainer').style.display = 'grid';
                }
            } else {
                console.warn('Erreur API statistiques:', response.status, response.statusText);
                // Afficher des valeurs par défaut
                document.getElementById('totalUsers').textContent = '-';
                document.getElementById('activeUsers').textContent = '-';
                document.getElementById('verifiedEmails').textContent = '-';
                document.getElementById('lockedAccounts').textContent = '-';
            }
        } catch (error) {
            console.error('Erreur lors du chargement des statistiques:', error);
            // Afficher des valeurs par défaut
            document.getElementById('totalUsers').textContent = '-';
            document.getElementById('activeUsers').textContent = '-';
            document.getElementById('verifiedEmails').textContent = '-';
            document.getElementById('lockedAccounts').textContent = '-';
        }
    }

    // Fonction pour charger les utilisateurs
    async function loadUsers(page = 1) {
        try {
            showLoading(true);
            hideError();

            const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
            if (!accessToken) {
                throw new Error('Token d\'authentification manquant');
            }

            console.log('Debug - Token utilisé pour les utilisateurs:', accessToken.substring(0, 20) + '...');

            // Récupérer les filtres
            currentFilters.search = document.getElementById('searchInput').value;
            currentFilters.is_active = document.getElementById('statusFilter').value;
            currentFilters.poste = document.getElementById('posteFilter').value;
            perPage = parseInt(document.getElementById('perPageSelect').value);

            // Construire l'URL avec les paramètres
            const params = new URLSearchParams({
                per_page: perPage,
                page: page,
                sort_by: 'created_at',
                sort_order: 'desc'
            });

            if (currentFilters.search) params.append('search', currentFilters.search);
            if (currentFilters.is_active) params.append('is_active', currentFilters.is_active);
            if (currentFilters.poste) params.append('poste', currentFilters.poste);

            const response = await fetch(`/api/users?${params}`, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json'
                }
            });

            if (!response.ok) {
                if (response.status === 401) {
                    console.warn('Token d\'authentification invalide ou expiré');
                    showError('Token d\'authentification invalide. Veuillez vous reconnecter.');
                    return;
                }
                throw new Error(`Erreur HTTP: ${response.status}`);
            }

            const data = await response.json();

            if (data.success && data.data) {
                currentUsers = data.data.users || [];
                currentPage = data.data.pagination.current_page;
                totalPages = data.data.pagination.last_page;

                displayUsers(currentUsers);
                displayPagination(data.data.pagination);
                showUsersTable();
            } else {
                throw new Error(data.message || 'Erreur lors du chargement des utilisateurs');
            }

        } catch (error) {
            console.error('Erreur lors du chargement des utilisateurs:', error);

            // Si l'erreur est liée à l'authentification, proposer des données de démonstration
            if (error.message.includes('Token') || error.message.includes('401')) {
                console.log('Chargement des données de démonstration...');
                loadDemoData();
            } else {
                showError('Erreur lors du chargement des utilisateurs: ' + error.message);
            }
        } finally {
            showLoading(false);
        }
    }

    // Fonction pour charger des données de démonstration
    function loadDemoData() {
        console.log('Chargement des données de démonstration...');

        // Données de démonstration
        const demoUsers = [{
                user_id: 'demo-1',
                firstname: 'Jean',
                lastname: 'DUPONT',
                username: 'jean.dupont',
                email: 'jean.dupont@example.com',
                phonenumber: '+33612345678',
                poste: 'Développeur',
                is_active: true,
                email_verified_at: '2024-01-10 10:00:00',
                last_login_at: '2024-01-15 14:30:00',
                created_at: '2024-01-10 09:15:00'
            },
            {
                user_id: 'demo-2',
                firstname: 'Marie',
                lastname: 'MARTIN',
                username: 'marie.martin',
                email: 'marie.martin@example.com',
                phonenumber: '+33687654321',
                poste: 'Designer',
                is_active: false,
                email_verified_at: '2024-01-12 11:00:00',
                last_login_at: '2024-01-14 16:45:00',
                created_at: '2024-01-12 08:30:00'
            },
            {
                user_id: 'demo-3',
                firstname: 'Pierre',
                lastname: 'DURAND',
                username: 'pierre.durand',
                email: 'pierre.durand@example.com',
                phonenumber: '+33698765432',
                poste: 'Manager',
                is_active: true,
                email_verified_at: '2024-01-08 14:20:00',
                last_login_at: '2024-01-16 09:15:00',
                created_at: '2024-01-08 10:45:00'
            }
        ];

        // Mettre à jour les statistiques avec des valeurs de démonstration
        document.getElementById('totalUsers').textContent = '3';
        document.getElementById('activeUsers').textContent = '2';
        document.getElementById('verifiedEmails').textContent = '3';
        document.getElementById('lockedAccounts').textContent = '0';
        document.getElementById('statsContainer').style.display = 'grid';

        // Afficher les utilisateurs de démonstration
        currentUsers = demoUsers;
        currentPage = 1;
        totalPages = 1;

        displayUsers(currentUsers);
        displayPagination({
            current_page: 1,
            last_page: 1,
            total: 3,
            per_page: 15
        });
        showUsersTable();

        // Afficher un message d'information
        showToast('Mode démonstration - Données simulées', 'info');
    }

    // Fonction pour afficher les utilisateurs
    function displayUsers(users) {
        console.log('=== DEBUG displayUsers ===');
        console.log('Nombre d\'utilisateurs:', users.length);
        console.log('Premier utilisateur:', users[0]);
        console.log('=== FIN DEBUG ===');

        const tbody = document.getElementById('usersTableBody');
        tbody.innerHTML = '';

        if (users.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="7" class="text-center py-4">
                        <i class="bi-inbox fs-1 text-muted"></i>
                        <p class="mt-2 text-muted">Aucun utilisateur trouvé</p>
                    </td>
                </tr>
            `;
            return;
        }

        users.forEach(user => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>
                    <div class="d-flex align-items-center">
                        <div class="client-avatar me-3" style="width: 40px; height: 40px;">
                            ${getUserInitials(user.firstname, user.lastname)}
                        </div>
                        <div>
                            <div class="fw-semibold text-dark">${user.firstname || user.name || 'N/A'} ${user.lastname || user.surname || ''}</div>
                            <small class="text-muted">@${user.username || user.user_name || 'N/A'}</small>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="d-flex align-items-center">
                        <i class="bi-envelope me-2 text-muted"></i>
                        <span>${user.email}</span>
                    </div>
                </td>
                <td>
                    <span class="badge badge-type ${user.poste ? 'badge-long-terme' : 'badge-indefini'}">
                        ${user.poste || 'Non défini'}
                    </span>
                </td>
                <td>
                    <span class="badge ${user.is_active ? 'badge-success' : 'badge-danger'}">
                        ${user.is_active ? 'Actif' : 'Inactif'}
                    </span>
                </td>
                <td>
                    <span class="badge ${user.email_verified_at ? 'badge-success' : 'badge-warning'}">
                        <i class="bi-${user.email_verified_at ? 'check-circle' : 'clock'} me-1"></i>
                        ${user.email_verified_at ? 'Vérifié' : 'En attente'}
                    </span>
                </td>
                <td>
                    <div class="d-flex align-items-center">
                        <i class="bi-clock me-2 text-muted"></i>
                        <span class="text-muted">${formatDateTime(user.last_login_at)}</span>
                    </div>
                </td>
                <td class="text-end">
                    <div class="d-flex gap-1 justify-content-end">
                        <button class="btn btn-outline-primary btn-sm action-btn" onclick="viewUser('${user.user_id}')" title="Voir">
                            <i class="bi-eye"></i>
                        </button>
                        ${!user.is_active ? `
                            <button class="btn btn-success btn-sm action-btn" onclick="activateUser('${user.user_id}')" title="Activer">
                                <i class="bi-check-circle"></i>
                            </button>
                        ` : ''}
                        ${user.failed_login_attempts > 0 ? `
                            <button class="btn btn-warning btn-sm action-btn" onclick="unlockUser('${user.user_id}')" title="Déverrouiller">
                                <i class="bi-unlock"></i>
                            </button>
                        ` : ''}
                    </div>
                </td>
            `;
            tbody.appendChild(row);
        });
    }

    // Fonction pour afficher la pagination
    function displayPagination(pagination) {
        const container = document.getElementById('paginationContainer');
        container.innerHTML = '';

        if (pagination.last_page <= 1) return;

        // Bouton précédent
        if (pagination.current_page > 1) {
            const prevBtn = document.createElement('a');
            prevBtn.href = '#';
            prevBtn.className = 'page-link-modern';
            prevBtn.innerHTML = '<i class="bi-chevron-left"></i>';
            prevBtn.onclick = (e) => {
                e.preventDefault();
                loadUsers(pagination.current_page - 1);
            };
            container.appendChild(prevBtn);
        }

        // Pages
        const startPage = Math.max(1, pagination.current_page - 2);
        const endPage = Math.min(pagination.last_page, pagination.current_page + 2);

        for (let i = startPage; i <= endPage; i++) {
            const pageBtn = document.createElement('a');
            pageBtn.href = '#';
            pageBtn.className = `page-link-modern ${i === pagination.current_page ? 'active' : ''}`;
            pageBtn.textContent = i;
            pageBtn.onclick = (e) => {
                e.preventDefault();
                loadUsers(i);
            };
            container.appendChild(pageBtn);
        }

        // Bouton suivant
        if (pagination.current_page < pagination.last_page) {
            const nextBtn = document.createElement('a');
            nextBtn.href = '#';
            nextBtn.className = 'page-link-modern';
            nextBtn.innerHTML = '<i class="bi-chevron-right"></i>';
            nextBtn.onclick = (e) => {
                e.preventDefault();
                loadUsers(pagination.current_page + 1);
            };
            container.appendChild(nextBtn);
        }

        container.classList.remove('d-none');
    }

    // Fonction pour afficher/masquer le loading
    function showLoading(show) {
        const loadingSpinner = document.getElementById('loadingSpinner');
        const usersTable = document.getElementById('usersTable');

        if (!loadingSpinner || !usersTable) {
            console.warn('Éléments de loading non trouvés dans le DOM');
            return;
        }

        if (show) {
            loadingSpinner.style.display = 'block';
            usersTable.classList.add('d-none');
        } else {
            loadingSpinner.style.display = 'none';
        }
    }

    // Fonction pour afficher le tableau des utilisateurs
    function showUsersTable() {
        const usersTable = document.getElementById('usersTable');
        usersTable.classList.remove('d-none');
    }

    // Fonction pour afficher une erreur
    function showError(message) {
        const errorMessage = document.getElementById('errorMessage');
        const errorText = document.getElementById('errorText');
        errorText.textContent = message;
        errorMessage.classList.remove('d-none');
    }

    // Fonction pour masquer l'erreur
    function hideError() {
        const errorMessage = document.getElementById('errorMessage');
        errorMessage.classList.add('d-none');
    }

    // Fonctions d'action
    function viewUser(userId) {
        window.location.href = `/utilisateur/${userId}`;
    }


    async function activateUser(userId) {
        if (!confirm('Êtes-vous sûr de vouloir activer cet utilisateur ?')) return;

        try {
            const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
            const response = await fetch(`/api/users/${userId}/activate`, {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });

            if (response.ok) {
                showToast('Utilisateur activé avec succès', 'success');
                loadUsers(currentPage);
            } else {
                const error = await response.json();
                throw new Error(error.message || 'Erreur lors de l\'activation');
            }
        } catch (error) {
            console.error('Erreur lors de l\'activation:', error);
            showToast('Erreur lors de l\'activation: ' + error.message, 'error');
        }
    }

    async function unlockUser(userId) {
        if (!confirm('Êtes-vous sûr de vouloir déverrouiller ce compte ?')) return;

        try {
            const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
            const response = await fetch(`/api/users/${userId}/unlock`, {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });

            if (response.ok) {
                showToast('Compte déverrouillé avec succès', 'success');
                loadUsers(currentPage);
            } else {
                const error = await response.json();
                throw new Error(error.message || 'Erreur lors du déverrouillage');
            }
        } catch (error) {
            console.error('Erreur lors du déverrouillage:', error);
            showToast('Erreur lors du déverrouillage: ' + error.message, 'error');
        }
    }

    // Fonction pour afficher les notifications toast
    function showToast(message, type = 'info') {
        // Créer le conteneur s'il n'existe pas
        let toastContainer = document.getElementById('toastContainer');
        if (!toastContainer) {
            toastContainer = document.createElement('div');
            toastContainer.id = 'toastContainer';
            toastContainer.className = 'toast-container';
            toastContainer.style.cssText = `
                position: fixed;
                top: 2rem;
                right: 2rem;
                z-index: 10000;
                display: flex;
                flex-direction: column;
                gap: 1rem;
                max-width: 400px;
            `;
            document.body.appendChild(toastContainer);
        }

        const toastId = 'toast-' + Date.now();

        const icons = {
            success: 'bi-check-circle-fill',
            error: 'bi-exclamation-triangle-fill',
            warning: 'bi-exclamation-circle-fill',
            info: 'bi-info-circle-fill'
        };

        const toast = document.createElement('div');
        toast.id = toastId;
        toast.className = `toast toast-${type}`;
        toast.style.cssText = `
            background: white;
            border-radius: 12px;
            padding: 1rem 1.25rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            border-left: 4px solid ${type === 'success' ? '#10b981' : type === 'error' ? '#ef4444' : type === 'warning' ? '#f59e0b' : '#3b82f6'};
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            transform: translateX(100%);
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        `;
        toast.innerHTML = `
            <i class="bi ${icons[type]} toast-icon"></i>
            <div class="toast-content">
                <div class="toast-title">${type.charAt(0).toUpperCase() + type.slice(1)}</div>
                <div class="toast-message">${message}</div>
            </div>
            <button class="toast-close" onclick="closeToast('${toastId}')" style="background: none; border: none; font-size: 1rem; color: #9ca3af; cursor: pointer; padding: 0; width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; border-radius: 50%;">
                <i class="bi-x"></i>
            </button>
        `;

        toastContainer.appendChild(toast);

        // Trigger animation
        setTimeout(() => {
            toast.style.transform = 'translateX(0)';
            toast.style.opacity = '1';
        }, 100);

        // Auto remove after 5 seconds
        setTimeout(() => closeToast(toastId), 5000);
    }

    function closeToast(toastId) {
        const toast = document.getElementById(toastId);
        if (toast) {
            toast.style.transform = 'translateX(100%)';
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 300);
        }
    }

    // Fonction pour vérifier l'authentification avec retry
    function checkAuthentication(retryCount = 0) {
        // Debug avancé des cookies
        if (retryCount === 0) {
            debugCookies();
        }

        const accessToken = getCookie('access_token');
        const connected = getCookie('connected');

        // Debug: Afficher les cookies détectés
        console.log(`Debug - Tentative ${retryCount + 1} - Cookies détectés:`);
        console.log('connected:', connected);
        console.log('access_token:', accessToken ? accessToken.substring(0, 20) + '...' : 'null');
        console.log('Domain actuel:', window.location.hostname);
        console.log('Protocol actuel:', window.location.protocol);

        // Vérification alternative : essayer de récupérer les cookies depuis localStorage
        const localAccessToken = localStorage.getItem('access_token');
        const localConnected = localStorage.getItem('connected');
        console.log('localStorage access_token:', localAccessToken ? localAccessToken.substring(0, 20) + '...' : 'null');
        console.log('localStorage connected:', localConnected);

        // Essayer localStorage si les cookies ne sont pas disponibles
        const finalAccessToken = accessToken || localAccessToken;
        const finalConnected = connected || localConnected;

        if (!finalConnected || !finalAccessToken) {
            if (retryCount < 3) {
                console.log(`Debug - Authentification échouée, retry dans 500ms (${retryCount + 1}/3)`);
                setTimeout(() => checkAuthentication(retryCount + 1), 500);
                return;
            }
            console.log('Debug - Authentification échouée après 3 tentatives, affichage du message de connexion');
            showLoginRequired();
            return;
        }

        // Utiliser les données finales (cookies ou localStorage)
        console.log('Debug - Utilisation des données d\'authentification:', finalConnected ? 'cookies' : 'localStorage');

        console.log('Debug - Authentification réussie, chargement des données');
        // Charger les données
        loadStatistics();
        loadUsers();
    }

    // Event listeners
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Debug - Page chargée, vérification de l\'authentification');
        console.log('Debug - getCookie disponible:', typeof getCookie);
        console.log('Debug - window.getCookie disponible:', typeof window.getCookie);

        // Vérifier l'authentification avec retry
        checkAuthentication();

        // Event listeners pour les filtres
        document.getElementById('searchInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                loadUsers();
            }
        });

        document.getElementById('statusFilter').addEventListener('change', loadUsers);
        document.getElementById('posteFilter').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                loadUsers();
            }
        });
        document.getElementById('perPageSelect').addEventListener('change', loadUsers);
    });

    // Fonction pour afficher le message de connexion requise
    function showLoginRequired() {
        const content = document.querySelector('.content');
        content.innerHTML = `
            <div class="text-center py-5">
                <div class="card card-custom mx-auto" style="max-width: 500px;">
                    <div class="card-body p-5">
                        <i class="bi-person-lock fs-1 text-primary-custom mb-3"></i>
                        <h4 class="text-secondary-custom mb-3">Connexion requise</h4>
                        <p class="text-muted mb-4">
                            Vous devez être connecté pour accéder à la gestion des utilisateurs.
                        </p>
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="/login" class="btn btn-primary-custom">
                                <i class="bi-box-arrow-in-right me-1"></i> Se connecter
                            </a>
                            <a href="/" class="btn btn-outline-modern">
                                <i class="bi-house me-1"></i> Accueil
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }

    // Fonction pour exporter en Excel
    function exportToExcel() {
        if (!currentUsers || currentUsers.length === 0) {
            showToast('Aucune donnée à exporter', 'warning');
            return;
        }

        // Créer les données CSV
        let csvContent = "Nom,Email,Username,Poste,Statut,Email Vérifié,Dernière Connexion\n";
        
        currentUsers.forEach(user => {
            const nom = `${user.firstname || user.name || 'N/A'} ${user.lastname || user.surname || ''}`;
            const email = user.email || 'N/A';
            const username = user.username || user.user_name || 'N/A';
            const poste = user.poste || 'Non défini';
            const statut = user.is_active ? 'Actif' : 'Inactif';
            const emailVerifie = user.email_verified_at ? 'Oui' : 'Non';
            const derniereConnexion = formatDateTime(user.last_login_at);
            
            csvContent += `"${nom}","${email}","${username}","${poste}","${statut}","${emailVerifie}","${derniereConnexion}"\n`;
        });

        // Créer et télécharger le fichier
        const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement('a');
        const url = URL.createObjectURL(blob);
        link.setAttribute('href', url);
        link.setAttribute('download', `utilisateurs_${new Date().toISOString().split('T')[0]}.csv`);
        link.style.visibility = 'hidden';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        
        showToast('Export Excel réussi', 'success');
    }

    // Fonction pour exporter en PDF
    function exportToPDF() {
        if (!currentUsers || currentUsers.length === 0) {
            showToast('Aucune donnée à exporter', 'warning');
            return;
        }

        // Créer le contenu HTML pour le PDF
        let htmlContent = `
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset="utf-8">
                <title>Liste des Utilisateurs</title>
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
                    <h1>Liste des Utilisateurs</h1>
                    <p class="date">Généré le ${new Date().toLocaleDateString('fr-FR')} à ${new Date().toLocaleTimeString('fr-FR')}</p>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Poste</th>
                            <th>Statut</th>
                            <th>Email Vérifié</th>
                            <th>Dernière Connexion</th>
                        </tr>
                    </thead>
                    <tbody>
        `;

        currentUsers.forEach(user => {
            const nom = `${user.firstname || user.name || 'N/A'} ${user.lastname || user.surname || ''}`;
            const email = user.email || 'N/A';
            const username = user.username || user.user_name || 'N/A';
            const poste = user.poste || 'Non défini';
            const statut = user.is_active ? 'Actif' : 'Inactif';
            const emailVerifie = user.email_verified_at ? 'Oui' : 'Non';
            const derniereConnexion = formatDateTime(user.last_login_at);
            
            htmlContent += `
                <tr>
                    <td>${nom}</td>
                    <td>${email}</td>
                    <td>${username}</td>
                    <td>${poste}</td>
                    <td>${statut}</td>
                    <td>${emailVerifie}</td>
                    <td>${derniereConnexion}</td>
                </tr>
            `;
        });

        htmlContent += `
                    </tbody>
                </table>
            </body>
            </html>
        `;

        // Ouvrir dans une nouvelle fenêtre pour impression
        const printWindow = window.open('', '_blank');
        printWindow.document.write(htmlContent);
        printWindow.document.close();
        printWindow.focus();
        
        // Attendre que le contenu soit chargé puis imprimer
        printWindow.onload = function() {
            printWindow.print();
            printWindow.close();
        };
        
        showToast('Export PDF lancé', 'success');
    }
</script>

<?php
$content = ob_get_clean();
require('./views/layouts/app-layout.php');
?>