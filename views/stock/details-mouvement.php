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
    .movement-details-wrapper {
        margin-left: 250px;
        margin-top: 70px;
        padding: 2rem;
        min-height: calc(100vh - 70px);
        background: #f8f9fa;
    }

    @media (max-width: 991px) {
        .movement-details-wrapper {
            margin-left: 0;
            margin-top: 60px;
            padding: 1rem;
        }
    }

    /* Header */
    .movement-details-header {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .movement-details-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, var(--info-color) 0%, #2563eb 100%);
    }

    .movement-details-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--secondary-color);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .movement-details-icon {
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

    /* Content */
    .movement-details-content {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        margin-bottom: 2rem;
    }

    .details-section {
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 2px solid #f0f0f0;
    }

    .details-section:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }

    .section-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .section-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: linear-gradient(135deg, var(--info-color), #2563eb);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }

    .details-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
    }

    .detail-item {
        display: flex;
        flex-direction: column;
    }

    .detail-label {
        font-weight: 600;
        color: var(--secondary-color);
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .detail-value {
        font-size: 1rem;
        color: #374151;
        padding: 0.75rem;
        background: #f8f9fa;
        border-radius: 8px;
        border-left: 4px solid var(--info-color);
    }

    /* Status badges */
    .status-badge {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: inline-block;
    }

    .status-pending {
        background: rgba(245, 158, 11, 0.1);
        color: var(--warning-color);
    }

    .status-completed {
        background: rgba(16, 185, 129, 0.1);
        color: var(--success-color);
    }

    .status-cancelled {
        background: rgba(239, 68, 68, 0.1);
        color: var(--danger-color);
    }

    /* Movement type badges */
    .movement-type {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: inline-block;
    }

    .movement-type.entrée {
        background: rgba(16, 185, 129, 0.1);
        color: var(--success-color);
    }

    .movement-type.sortie {
        background: rgba(239, 68, 68, 0.1);
        color: var(--danger-color);
    }

    .movement-type.transfert {
        background: rgba(59, 130, 246, 0.1);
        color: var(--info-color);
    }

    .movement-type.ajustement {
        background: rgba(245, 158, 11, 0.1);
        color: var(--warning-color);
    }

    /* Products table */
    .products-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1rem;
    }

    .products-table th,
    .products-table td {
        padding: 1rem;
        text-align: left;
        border-bottom: 1px solid #f0f0f0;
    }

    .products-table th {
        background: #f8f9fa;
        font-weight: 700;
        color: var(--secondary-color);
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .products-table tbody tr:hover {
        background: var(--light-primary);
    }

    .product-info {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .product-image {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        object-fit: cover;
        background: #f0f0f0;
    }

    .product-details h6 {
        margin: 0;
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--secondary-color);
    }

    .product-details small {
        color: #6b7280;
        font-size: 0.8rem;
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
        .details-grid {
            grid-template-columns: 1fr;
        }
        
        .movement-details-title {
            font-size: 2rem;
        }
    }
</style>

<div class="movement-details-wrapper font-public-sans">
    <!-- Header -->
    <div class="movement-details-header fade-in">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="movement-details-title">
                <div class="movement-details-icon">
                    <i class="bi bi-file-text"></i>
                </div>
                Détails du Mouvement
            </h1>
            <a href="/mouvements-stock" class="btn-modern btn-outline-modern">
                <i class="bi bi-arrow-left"></i> Retour
            </a>
        </div>
        <p class="text-muted mb-0">Informations détaillées du mouvement de stock</p>
    </div>

    <!-- Loading -->
    <div id="loadingContainer" class="loading-container">
        <div class="loading-spinner"></div>
        <div class="loading-text">Chargement des détails...</div>
    </div>

    <!-- Content -->
    <div id="movementDetailsContent" class="movement-details-content fade-in" style="display: none;">
        <!-- Informations générales -->
        <div class="details-section">
            <h3 class="section-title">
                <div class="section-icon">
                    <i class="bi bi-info-circle"></i>
                </div>
                Informations Générales
            </h3>
            
            <div class="details-grid">
                <div class="detail-item">
                    <label class="detail-label">Référence</label>
                    <div class="detail-value" id="movementReference">-</div>
                </div>
                
                <div class="detail-item">
                    <label class="detail-label">Type de Mouvement</label>
                    <div class="detail-value">
                        <span id="movementType" class="movement-type">-</span>
                    </div>
                </div>
                
                <div class="detail-item">
                    <label class="detail-label">Statut</label>
                    <div class="detail-value">
                        <span id="movementStatus" class="status-badge">-</span>
                    </div>
                </div>
                
                <div class="detail-item">
                    <label class="detail-label">Date de Création</label>
                    <div class="detail-value" id="movementDate">-</div>
                </div>
            </div>
        </div>

        <!-- Détails des produits -->
        <div class="details-section">
            <h3 class="section-title">
                <div class="section-icon">
                    <i class="bi bi-box-seam"></i>
                </div>
                Produits Concernés
            </h3>
            
            <table class="products-table" id="productsTable">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Prix Unitaire</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody id="productsTableBody">
                    <!-- Les produits seront chargés ici -->
                </tbody>
            </table>
        </div>

        <!-- Informations supplémentaires -->
        <div class="details-section">
            <h3 class="section-title">
                <div class="section-icon">
                    <i class="bi bi-geo-alt"></i>
                </div>
                Informations Supplémentaires
            </h3>
            
            <div class="details-grid">
                <div class="detail-item" id="fromWarehouseSection" style="display: none;">
                    <label class="detail-label">Entrepôt Source</label>
                    <div class="detail-value" id="fromWarehouse">-</div>
                </div>
                
                <div class="detail-item" id="toWarehouseSection">
                    <label class="detail-label">Entrepôt Destination</label>
                    <div class="detail-value" id="toWarehouse">-</div>
                </div>
                
                <div class="detail-item" id="supplierSection" style="display: none;">
                    <label class="detail-label">Fournisseur</label>
                    <div class="detail-value" id="supplier">-</div>
                </div>
                
                <div class="detail-item" id="clientSection" style="display: none;">
                    <label class="detail-label">Client</label>
                    <div class="detail-value" id="client">-</div>
                </div>
            </div>
        </div>

        <!-- Notes -->
        <div class="details-section" id="notesSection" style="display: none;">
            <h3 class="section-title">
                <div class="section-icon">
                    <i class="bi bi-chat-text"></i>
                </div>
                Notes et Commentaires
            </h3>
            
            <div class="detail-item">
                <label class="detail-label">Notes</label>
                <div class="detail-value" id="movementNotes">-</div>
            </div>
        </div>

        <!-- Actions -->
        <div class="details-section">
            <div class="d-flex gap-2">
                <a href="/modifier-mouvement-stock/<?php echo $movement_id; ?>" class="btn-modern btn-primary-modern">
                    <i class="bi bi-pencil"></i>
                    Modifier
                </a>
                <button type="button" class="btn-modern btn-secondary-modern" onclick="window.print()">
                    <i class="bi bi-printer"></i>
                    Imprimer
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    const movementId = '<?php echo $movement_id; ?>';
    let movementData = null;

    document.addEventListener('DOMContentLoaded', function() {
        loadMovementDetails();
    });

    async function loadMovementDetails() {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            
            if (!accessToken) {
                console.error('Token d\'accès manquant');
                return;
            }

            const response = await fetch(`https://toure.gestiem.com/api/stock-movements/${movementId}`, {
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });

            if (response.ok) {
                const result = await response.json();
                console.log('Détails du mouvement:', result);
                
                movementData = result.data;
                displayMovementDetails();
                
                document.getElementById('loadingContainer').style.display = 'none';
                document.getElementById('movementDetailsContent').style.display = 'block';
            } else {
                console.error('Erreur API:', response.status, response.statusText);
                const errorResult = await response.json();
                console.error('Détails erreur:', errorResult);
                throw new Error('Erreur lors du chargement des détails');
            }
        } catch (error) {
            console.error('Erreur:', error);
            document.getElementById('loadingContainer').style.display = 'none';
            // Afficher un message d'erreur
        }
    }

    function displayMovementDetails() {
        if (!movementData) return;

        // Informations générales
        document.getElementById('movementReference').textContent = movementData.reference || 'N/A';
        document.getElementById('movementType').textContent = getMovementTypeLabel(movementData.movement_type);
        document.getElementById('movementType').className = `movement-type ${movementData.movement_type?.toLowerCase() || 'default'}`;
        document.getElementById('movementStatus').textContent = getStatusLabel(movementData.statut);
        document.getElementById('movementStatus').className = `status-badge status-${movementData.statut || 'pending'}`;
        document.getElementById('movementDate').textContent = formatDateTime(movementData.created_at);

        // Détails des produits
        displayProducts();

        // Informations supplémentaires
        displayAdditionalInfo();

        // Notes
        if (movementData.note) {
            document.getElementById('movementNotes').textContent = movementData.note;
            document.getElementById('notesSection').style.display = 'block';
        }
    }

    function displayProducts() {
        const tbody = document.getElementById('productsTableBody');
        
        if (movementData.details && movementData.details.length > 0) {
            tbody.innerHTML = movementData.details.map(detail => `
                <tr>
                    <td>
                        <div class="product-info">
                            ${detail.product?.picture ? `<img src="https://toure.gestiem.com/storage/${detail.product.picture}" class="product-image" alt="Image produit">` : ''}
                            <div class="product-details">
                                <h6>${detail.product?.name || 'Produit supprimé'}</h6>
                                <small>Code: ${detail.product?.code || 'N/A'}</small>
                            </div>
                        </div>
                    </td>
                    <td>${detail.quantity || 0}</td>
                    <td>${detail.unit_price ? formatCurrency(detail.unit_price) : 'N/A'}</td>
                    <td>${detail.unit_price ? formatCurrency(detail.unit_price * detail.quantity) : 'N/A'}</td>
                </tr>
            `).join('');
        } else {
            tbody.innerHTML = '<tr><td colspan="4" class="text-center">Aucun produit trouvé</td></tr>';
        }
    }

    function displayAdditionalInfo() {
        // Entrepôt source
        if (movementData.entrepot_from) {
            document.getElementById('fromWarehouse').textContent = movementData.entrepot_from.name || 'N/A';
            document.getElementById('fromWarehouseSection').style.display = 'block';
        }

        // Entrepôt destination
        if (movementData.entrepot_to) {
            document.getElementById('toWarehouse').textContent = movementData.entrepot_to.name || 'N/A';
        }

        // Fournisseur
        if (movementData.fournisseur) {
            document.getElementById('supplier').textContent = movementData.fournisseur.name || 'N/A';
            document.getElementById('supplierSection').style.display = 'block';
        }

        // Client
        if (movementData.client) {
            document.getElementById('client').textContent = movementData.client.name || 'N/A';
            document.getElementById('clientSection').style.display = 'block';
        }
    }

    function getMovementTypeLabel(type) {
        const labels = {
            'entrée': 'Entrée',
            'sortie': 'Sortie',
            'transfert': 'Transfert',
            'ajustement': 'Ajustement'
        };
        return labels[type] || type;
    }

    function getStatusLabel(status) {
        const labels = {
            'pending': 'En attente',
            'completed': 'Terminé',
            'cancelled': 'Annulé'
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

    function formatCurrency(amount) {
        return new Intl.NumberFormat('fr-FR', {
            style: 'currency',
            currency: 'XOF'
        }).format(amount);
    }
</script>

<?php
$content = ob_get_clean();
require './views/layouts/app-layout.php';
?>
