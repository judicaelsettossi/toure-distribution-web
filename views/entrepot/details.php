<?php
ob_start();
$entrepot_id = $id ?? '';
?>

<style>
    :root {
        --primary-color: #f00480;
        --secondary-color: #010768;
        --accent-color: #010068;
        --light-primary: rgba(240, 4, 128, 0.1);
        --light-secondary: rgba(1, 7, 104, 0.1);
    }

    .font-public-sans {
        font-family: 'Public Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    }

    /* Fix chevauchement */
    .warehouse-detail-wrapper {
        margin-left: 250px;
        margin-top: 70px;
        padding: 2rem;
        min-height: calc(100vh - 70px);
        background: #f8f9fa;
    }

    @media (max-width: 991px) {
        .warehouse-detail-wrapper {
            margin-left: 0;
            margin-top: 60px;
            padding: 1rem;
        }
    }

    /* Action bar sticky */
    .action-bar {
        position: sticky;
        top: 70px;
        background: white;
        padding: 1.5rem;
        border-radius: 20px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        margin-bottom: 2rem;
        z-index: 100;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .breadcrumb-modern {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .breadcrumb-modern li {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #6c757d;
        font-size: 0.9rem;
    }

    .breadcrumb-modern li a {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .breadcrumb-modern li a:hover {
        color: var(--secondary-color);
    }

    /* Hero card */
    .warehouse-hero {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        margin-bottom: 2rem;
    }

    .hero-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        padding: 3rem 2.5rem;
        position: relative;
        overflow: hidden;
    }

    .hero-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 400px;
        height: 400px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
    }

    .hero-header::after {
        content: '';
        position: absolute;
        bottom: -30%;
        left: -5%;
        width: 300px;
        height: 300px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 50%;
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .warehouse-icon-large {
        width: 80px;
        height: 80px;
        border-radius: 20px;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        color: white;
        margin-bottom: 1.5rem;
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-10px);
        }
    }

    .warehouse-code {
        font-size: 1rem;
        color: rgba(255, 255, 255, 0.9);
        font-weight: 600;
        margin-bottom: 0.5rem;
        letter-spacing: 2px;
    }

    .warehouse-name {
        font-size: 2.5rem;
        font-weight: 800;
        color: white;
        margin: 0 0 1rem 0;
        line-height: 1.2;
    }

    .warehouse-address {
        font-size: 1.2rem;
        color: rgba(255, 255, 255, 0.95);
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 1.5rem;
    }

    .status-badge-hero {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 10px 20px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.95rem;
        backdrop-filter: blur(10px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .status-active {
        background: rgba(40, 167, 69, 0.9);
        color: white;
    }

    .status-inactive {
        background: rgba(220, 53, 69, 0.9);
        color: white;
    }

    /* Info sections */
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .info-card-modern {
        background: white;
        border-radius: 16px;
        padding: 2rem;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        border-top: 4px solid transparent;
    }

    .info-card-modern:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(240, 4, 128, 0.15);
        border-top-color: var(--primary-color);
    }

    .card-header-modern {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #f0f0f0;
    }

    .card-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    .card-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin: 0;
    }

    .info-item-row {
        display: flex;
        align-items: flex-start;
        padding: 1rem;
        background: #f8f9fa;
        border-radius: 10px;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
    }

    .info-item-row:hover {
        background: var(--light-primary);
        transform: translateX(5px);
    }

    .info-item-row:last-child {
        margin-bottom: 0;
    }

    .info-icon-small {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: white;
        color: var(--primary-color);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        margin-right: 1rem;
        flex-shrink: 0;
    }

    .info-content {
        flex: 1;
    }

    .info-label {
        font-size: 0.85rem;
        color: #6c757d;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.25rem;
    }

    .info-value {
        font-size: 1.1rem;
        color: #212529;
        font-weight: 600;
    }

    /* User card special */
    .user-card {
        background: linear-gradient(135deg, var(--light-primary), var(--light-secondary));
        border: 2px solid var(--primary-color);
    }

    .user-avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .user-name {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 0.5rem;
    }

    .user-email {
        font-size: 1rem;
        color: #6c757d;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    /* Buttons */
    .btn-modern {
        padding: 12px 24px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.95rem;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
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
        color: var(--primary-color);
        border: 2px solid var(--primary-color);
    }

    .btn-outline-modern:hover {
        background: var(--primary-color);
        color: white;
        transform: translateY(-2px);
    }

    .btn-danger-modern {
        background: #dc3545;
        color: white;
    }

    .btn-danger-modern:hover {
        background: #c82333;
        transform: translateY(-2px);
    }

    /* Loading */
    .loading-modern {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 60vh;
        gap: 1rem;
    }

    .spinner-modern {
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

    /* Alert */
    .alert-modern {
        background: white;
        border-radius: 16px;
        padding: 2rem;
        box-shadow: 0 5px 20px rgba(220, 53, 69, 0.15);
        border-left: 4px solid #dc3545;
    }

    .alert-modern-title {
        color: #dc3545;
        font-weight: 700;
        font-size: 1.3rem;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    /* Stats mini */
    .mini-stat {
        text-align: center;
        padding: 1rem;
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .mini-stat-value {
        font-size: 2rem;
        font-weight: 800;
        color: var(--primary-color);
        margin-bottom: 0.25rem;
    }

    .mini-stat-label {
        font-size: 0.9rem;
        color: #6c757d;
        font-weight: 600;
    }
</style>

<div class="warehouse-detail-wrapper font-public-sans">
    <!-- Action bar -->
    <div class="action-bar">
        <nav>
            <ol class="breadcrumb-modern">
                <li><a href="/dashboard"><i class="bi bi-house-door"></i> Accueil</a></li>
                <li><i class="bi bi-chevron-right"></i></li>
                <li><a href="/entrepot/liste">Entrepôts</a></li>
                <li><i class="bi bi-chevron-right"></i></li>
                <li class="active">Détails</li>
            </ol>
        </nav>
        <div id="actionButtons" class="d-flex gap-2" style="display: none !important;">
            <button id="editBtn" class="btn-modern btn-primary-modern">
                <i class="bi bi-pencil"></i> Modifier
            </button>
            <button id="deleteBtn" class="btn-modern btn-danger-modern">
                <i class="bi bi-trash"></i> Supprimer
            </button>
            <a href="/entrepot/liste" class="btn-modern btn-outline-modern">
                <i class="bi bi-arrow-left"></i> Retour
            </a>
        </div>
    </div>

    <!-- Loading -->
    <div id="loadingContainer" class="loading-modern">
        <div class="spinner-modern"></div>
        <div class="loading-text">Chargement de l'entrepôt...</div>
    </div>

    <!-- Error -->
    <div id="errorContainer" style="display: none;">
        <div class="alert-modern">
            <div class="alert-modern-title">
                <i class="bi bi-exclamation-triangle-fill"></i>
                Erreur
            </div>
            <p id="errorMessage" class="mb-0"></p>
        </div>
    </div>

    <!-- Content -->
    <div id="warehouseContainer" style="display: none;">
        <!-- Hero card -->
        <div class="warehouse-hero">
            <div class="hero-header">
                <div class="hero-content">
                    <div class="warehouse-icon-large">
                        <i class="bi bi-building"></i>
                    </div>
                    <div class="warehouse-code" id="warehouseCode">-</div>
                    <h1 class="warehouse-name" id="warehouseName">-</h1>
                    <div class="warehouse-address" id="warehouseAddress">
                        <i class="bi bi-geo-alt-fill"></i>
                        <span>-</span>
                    </div>
                    <span id="statusBadge" class="status-badge-hero"></span>
                </div>
            </div>
        </div>

        <!-- Info grid -->
        <div class="info-grid">
            <!-- User card -->
            <div class="info-card-modern user-card" id="userCard" style="display: none;">
                <div class="card-header-modern">
                    <div class="card-icon">
                        <i class="bi bi-person-circle"></i>
                    </div>
                    <h3 class="card-title">Responsable</h3>
                </div>
                <div class="text-center">
                    <div class="user-avatar" id="userAvatar">?</div>
                    <div class="user-name" id="userName">-</div>
                    <div class="user-email" id="userEmail">
                        <i class="bi bi-envelope"></i>
                        <span>-</span>
                    </div>
                </div>
            </div>

            <!-- System info -->
            <div class="info-card-modern">
                <div class="card-header-modern">
                    <div class="card-icon">
                        <i class="bi bi-info-circle"></i>
                    </div>
                    <h3 class="card-title">Informations Système</h3>
                </div>

                <div class="info-item-row">
                    <div class="info-icon-small">
                        <i class="bi bi-calendar-plus"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Date de création</div>
                        <div class="info-value" id="createdAt">-</div>
                    </div>
                </div>

                <div class="info-item-row">
                    <div class="info-icon-small">
                        <i class="bi bi-calendar-check"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Dernière modification</div>
                        <div class="info-value" id="updatedAt">-</div>
                    </div>
                </div>

                <div class="info-item-row">
                    <div class="info-icon-small">
                        <i class="bi bi-fingerprint"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Identifiant</div>
                        <div class="info-value" id="warehouseId" style="font-size: 0.85rem; word-break: break-all;">-</div>
                    </div>
                </div>
            </div>

            <!-- Quick stats (placeholder for future features) -->
            <div class="info-card-modern">
                <div class="card-header-modern">
                    <div class="card-icon">
                        <i class="bi bi-bar-chart"></i>
                    </div>
                    <h3 class="card-title">Statistiques Rapides</h3>
                </div>

                <div class="row g-3">
                    <div class="col-6">
                        <div class="mini-stat">
                            <div class="mini-stat-value">0</div>
                            <div class="mini-stat-label">Produits en stock</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mini-stat">
                            <div class="mini-stat-value">0</div>
                            <div class="mini-stat-label">Mouvements ce mois</div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mini-stat">
                            <div class="mini-stat-value">0 FCFA</div>
                            <div class="mini-stat-label">Valeur totale du stock</div>
                        </div>
                    </div>
                </div>

                <div class="alert alert-info mt-3 mb-0" style="border-radius: 10px; border-left: 4px solid #17a2b8;">
                    <small><i class="bi bi-info-circle"></i> Statistiques détaillées à venir</small>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const entrepotId = '<?php echo $entrepot_id; ?>';

        if (!entrepotId) {
            showError('ID de l\'entrepôt manquant dans l\'URL');
            return;
        }

        loadWarehouseDetails(entrepotId);
    });

    async function loadWarehouseDetails(entrepotId) {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';

            if (!accessToken) {
                window.location.href = '/login';
                return;
            }

            const response = await fetch(`https://toure.gestiem.com/api/entrepots/${entrepotId}?with_user=1`, {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            });

            if (!response.ok) {
                if (response.status === 401) {
                    window.location.href = '/login';
                    return;
                }
                if (response.status === 404) {
                    throw new Error('Cet entrepôt n\'existe pas ou a été supprimé');
                }

                const errorResult = await response.json();
                throw new Error(errorResult.message || 'Impossible de charger les détails de l\'entrepôt');
            }

            const warehouse = await response.json();

            console.log('Warehouse data:', warehouse);

            displayWarehouseDetails(warehouse);

            document.getElementById('loadingContainer').style.display = 'none';
            document.getElementById('warehouseContainer').style.display = 'block';
            document.getElementById('actionButtons').style.display = 'flex';

        } catch (error) {
            console.error('Erreur lors du chargement:', error);
            showError(error.message);
        }
    }

    function displayWarehouseDetails(warehouse) {
        // Informations principales
        document.getElementById('warehouseCode').textContent = `Ref: ${warehouse.code || 'N/A'}`;
        document.getElementById('warehouseName').textContent = warehouse.name || 'Entrepôt sans nom';
        document.getElementById('warehouseAddress').innerHTML = `
        <i class="bi bi-geo-alt-fill"></i>
        <span>${warehouse.adresse || 'Adresse non renseignée'}</span>
    `;

        // Badge statut
        const statusBadge = document.getElementById('statusBadge');
        if (warehouse.is_active) {
            statusBadge.innerHTML = '<i class="bi bi-check-circle-fill"></i> Actif';
            statusBadge.className = 'status-badge-hero status-active';
        } else {
            statusBadge.innerHTML = '<i class="bi bi-x-circle-fill"></i> Inactif';
            statusBadge.className = 'status-badge-hero status-inactive';
        }

        // Informations système
        document.getElementById('warehouseId').textContent = warehouse.entrepot_id || '-';
        document.getElementById('createdAt').textContent = formatDate(warehouse.created_at);
        document.getElementById('updatedAt').textContent = formatDate(warehouse.updated_at);

        // Informations utilisateur si disponibles
        if (warehouse.user) {
            document.getElementById('userCard').style.display = 'block';
            document.getElementById('userName').textContent = warehouse.user.name || 'Non défini';
            document.getElementById('userEmail').innerHTML = `
            <i class="bi bi-envelope"></i>
            <span>${warehouse.user.email || 'Non défini'}</span>
        `;

            // Avatar avec initiales
            const initials = getInitials(warehouse.user.name);
            document.getElementById('userAvatar').textContent = initials;
        }

        // Boutons d'action
        document.getElementById('editBtn').onclick = () => {
            window.location.href = `/entrepot/${warehouse.entrepot_id}/edit`;
        };

        document.getElementById('deleteBtn').onclick = () => {
            if (confirm(`⚠️ ATTENTION : Voulez-vous vraiment supprimer l'entrepôt "${warehouse.name}" ?\n\nCette action est irréversible !`)) {
                deleteWarehouse(warehouse.entrepot_id);
            }
        };

        // Mettre à jour le titre de la page
        document.title = `${warehouse.name} - Détails de l'entrepôt`;
    }

    function getInitials(name) {
        if (!name) return '?';
        const parts = name.trim().split(' ');
        if (parts.length >= 2) {
            return (parts[0][0] + parts[1][0]).toUpperCase();
        }
        return name.substring(0, 2).toUpperCase();
    }

    function formatDate(dateString) {
        if (!dateString) return 'Non disponible';
        const date = new Date(dateString);
        return new Intl.DateTimeFormat('fr-FR', {
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        }).format(date);
    }

    function showError(message) {
        document.getElementById('loadingContainer').style.display = 'none';
        document.getElementById('warehouseContainer').style.display = 'none';
        document.getElementById('errorContainer').style.display = 'block';
        document.getElementById('errorMessage').textContent = message;
    }

    async function deleteWarehouse(entrepotId) {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';

            const response = await fetch(`https://toure.gestiem.com/api/entrepots/${entrepotId}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            });

            if (response.ok) {
                alert('✓ Entrepôt supprimé avec succès');
                window.location.href = '/entrepot/liste';
            } else {
                const errorResult = await response.json();
                alert('Erreur : ' + (errorResult.message || 'Impossible de supprimer l\'entrepôt'));
            }
        } catch (error) {
            alert('Erreur de connexion au serveur');
        }
    }
</script>

<?php
$content = ob_get_clean();
require('./views/layouts/app-layout.php');
?>