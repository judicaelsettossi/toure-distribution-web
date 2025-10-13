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
    .stock-wrapper {
        margin-left: 250px;
        margin-top: 70px;
        padding: 2rem;
        min-height: calc(100vh - 70px);
        background: #f8f9fa;
    }

    @media (max-width: 991px) {
        .stock-wrapper {
            margin-left: 0;
            margin-top: 60px;
            padding: 1rem;
        }
    }

    /* Header moderne */
    .stock-header {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .stock-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    }

    .stock-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--secondary-color);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .stock-title-icon {
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

    /* Cards d'action */
    .action-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }

    .action-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        cursor: pointer;
    }

    .action-card::before {
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

    .action-card:hover::before {
        transform: scaleX(1);
    }

    .action-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.12);
    }

    .action-card.entree {
        border-left: 4px solid var(--success-color);
    }

    .action-card.sortie {
        border-left: 4px solid var(--danger-color);
    }

    .action-card.mouvements {
        border-left: 4px solid var(--info-color);
    }

    .action-card.inventaire {
        border-left: 4px solid var(--warning-color);
    }

    .action-icon {
        width: 80px;
        height: 80px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
        color: white;
    }

    .action-icon.entree {
        background: linear-gradient(135deg, var(--success-color), #059669);
    }

    .action-icon.sortie {
        background: linear-gradient(135deg, var(--danger-color), #dc2626);
    }

    .action-icon.mouvements {
        background: linear-gradient(135deg, var(--info-color), #2563eb);
    }

    .action-icon.inventaire {
        background: linear-gradient(135deg, var(--warning-color), #d97706);
    }

    .action-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 0.5rem;
    }

    .action-description {
        color: #6b7280;
        font-size: 0.95rem;
        line-height: 1.5;
        margin-bottom: 1.5rem;
    }

    .action-btn {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .action-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.5s;
    }

    .action-btn:hover::before {
        left: 100%;
    }

    .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(240, 4, 128, 0.3);
    }

    /* Statistiques rapides */
    .stats-section {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        margin-bottom: 2rem;
    }

    .stats-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
    }

    .stat-card {
        background: #f8f9fa;
        border-radius: 15px;
        padding: 1.5rem;
        text-align: center;
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        background: var(--light-primary);
        transform: translateY(-2px);
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 800;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
    }

    .stat-label {
        color: #6b7280;
        font-size: 0.9rem;
        font-weight: 600;
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

    .slide-in-left {
        animation: slideInLeft 0.8s ease-out;
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .slide-in-right {
        animation: slideInRight 0.8s ease-out;
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .stock-title {
            font-size: 2rem;
        }
        
        .action-cards {
            grid-template-columns: 1fr;
        }
        
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
</style>

<div class="stock-wrapper font-public-sans">
    <!-- Header -->
    <div class="stock-header fade-in">
        <h1 class="stock-title">
            <div class="stock-title-icon">
                <i class="bi bi-boxes"></i>
            </div>
            Gestion de Stock
        </h1>
        <p class="text-muted mb-0">Gérez vos entrées, sorties et mouvements de stock en toute simplicité</p>
    </div>

    <!-- Actions principales -->
    <div class="action-cards">
        <div class="action-card entree slide-in-left" onclick="window.location.href='/stock/entree'">
            <div class="action-icon entree">
                <i class="bi bi-box-arrow-in-down"></i>
            </div>
            <h3 class="action-title">Entrée de Stock</h3>
            <p class="action-description">
                Enregistrez les nouveaux produits reçus, les retours clients ou les ajustements positifs de stock.
            </p>
            <button class="action-btn">
                <i class="bi bi-plus-circle me-2"></i>
                Nouvelle Entrée
            </button>
        </div>

        <div class="action-card sortie slide-in-right" onclick="window.location.href='/stock/sortie'">
            <div class="action-icon sortie">
                <i class="bi bi-box-arrow-up"></i>
            </div>
            <h3 class="action-title">Sortie de Stock</h3>
            <p class="action-description">
                Enregistrez les ventes, les transferts, les pertes ou les ajustements négatifs de stock.
            </p>
            <button class="action-btn">
                <i class="bi bi-dash-circle me-2"></i>
                Nouvelle Sortie
            </button>
        </div>

        <div class="action-card mouvements slide-in-left" onclick="window.location.href='/stock/mouvements'">
            <div class="action-icon mouvements">
                <i class="bi bi-arrow-left-right"></i>
            </div>
            <h3 class="action-title">Mouvements</h3>
            <p class="action-description">
                Consultez l'historique complet des mouvements de stock avec filtres avancés.
            </p>
            <button class="action-btn">
                <i class="bi bi-list-ul me-2"></i>
                Voir l'Historique
            </button>
        </div>

        <div class="action-card inventaire slide-in-right" onclick="showInventoryModal()">
            <div class="action-icon inventaire">
                <i class="bi bi-clipboard-check"></i>
            </div>
            <h3 class="action-title">Inventaire</h3>
            <p class="action-description">
                Effectuez un inventaire physique et ajustez les écarts avec le stock théorique.
            </p>
            <button class="action-btn">
                <i class="bi bi-clipboard-data me-2"></i>
                Nouvel Inventaire
            </button>
        </div>
    </div>

    <!-- Statistiques rapides -->
    <div class="stats-section fade-in">
        <h3 class="stats-title">
            <i class="bi bi-graph-up"></i>
            Statistiques Rapides
        </h3>
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number" id="totalProducts">-</div>
                <div class="stat-label">Produits en Stock</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" id="totalValue">-</div>
                <div class="stat-label">Valeur Totale (FCFA)</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" id="lowStock">-</div>
                <div class="stat-label">Stock Faible</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" id="todayMovements">-</div>
                <div class="stat-label">Mouvements Aujourd'hui</div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Ajouter des animations séquentielles
        const cards = document.querySelectorAll('.action-card');
        cards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.1}s`;
        });

        // Charger les statistiques
        loadQuickStats();
    });

    async function loadQuickStats() {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            
            if (!accessToken) {
                console.error('Token d\'accès manquant');
                return;
            }

            // Charger les statistiques depuis l'API
            const response = await fetch('https://toure.gestiem.com/api/stock/statistics', {
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });

            if (response.ok) {
                const stats = await response.json();
                updateStatsDisplay(stats);
            } else {
                // En cas d'erreur, afficher des valeurs par défaut
                setDefaultStats();
            }
        } catch (error) {
            console.error('Erreur lors du chargement des statistiques:', error);
            setDefaultStats();
        }
    }

    function updateStatsDisplay(stats) {
        document.getElementById('totalProducts').textContent = stats.total_products || '0';
        document.getElementById('totalValue').textContent = formatCurrency(stats.total_value || 0);
        document.getElementById('lowStock').textContent = stats.low_stock_count || '0';
        document.getElementById('todayMovements').textContent = stats.today_movements || '0';
    }

    function setDefaultStats() {
        document.getElementById('totalProducts').textContent = '0';
        document.getElementById('totalValue').textContent = '0 FCFA';
        document.getElementById('lowStock').textContent = '0';
        document.getElementById('todayMovements').textContent = '0';
    }

    function formatCurrency(amount) {
        return new Intl.NumberFormat('fr-FR', {
            style: 'currency',
            currency: 'XOF',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        }).format(amount).replace('XOF', 'FCFA');
    }

    function showInventoryModal() {
        // TODO: Implémenter le modal d'inventaire
        alert('Fonctionnalité d\'inventaire à implémenter');
    }
</script>

<?php
$content = ob_get_clean();
require './views/layouts/app-layout.php';
?>
