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
    .camion-details-wrapper {
        margin-left: 250px;
        margin-top: 70px;
        padding: 2rem;
        min-height: calc(100vh - 70px);
        background: #f8f9fa;
    }

    @media (max-width: 991px) {
        .camion-details-wrapper {
            margin-left: 0;
            margin-top: 60px;
            padding: 1rem;
        }
    }

    /* Header */
    .camion-details-header {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .camion-details-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, var(--info-color) 0%, #2563eb 100%);
    }

    .camion-details-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--secondary-color);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .camion-details-icon {
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
    .camion-details-content {
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
        
        .camion-details-title {
            font-size: 2rem;
        }
    }
</style>

<div class="camion-details-wrapper font-public-sans">
    <!-- Header -->
    <div class="camion-details-header fade-in">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="camion-details-title">
                <div class="camion-details-icon">
                    <i class="bi bi-truck"></i>
                </div>
                Détails du Camion
            </h1>
            <a href="/camions" class="btn-modern btn-outline-modern">
                <i class="bi bi-arrow-left"></i> Retour
            </a>
        </div>
        <p class="text-muted mb-0">Informations détaillées du camion</p>
    </div>

    <!-- Loading -->
    <div id="loadingContainer" class="loading-container">
        <div class="loading-spinner"></div>
        <div class="loading-text">Chargement des détails...</div>
    </div>

    <!-- Content -->
    <div id="camionDetailsContent" class="camion-details-content fade-in" style="display: none;">
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
                    <label class="detail-label">Numéro d'immatriculation</label>
                    <div class="detail-value" id="numeroImmat">-</div>
                </div>
                
                <div class="detail-item">
                    <label class="detail-label">Marque</label>
                    <div class="detail-value" id="marque">-</div>
                </div>
                
                <div class="detail-item">
                    <label class="detail-label">Modèle</label>
                    <div class="detail-value" id="modele">-</div>
                </div>
                
                <div class="detail-item">
                    <label class="detail-label">Capacité</label>
                    <div class="detail-value" id="capacite">-</div>
                </div>
            </div>
        </div>

        <!-- Statut et dates -->
        <div class="details-section">
            <h3 class="section-title">
                <div class="section-icon">
                    <i class="bi bi-gear"></i>
                </div>
                Statut et Dates
            </h3>
            
            <div class="details-grid">
                <div class="detail-item">
                    <label class="detail-label">Statut</label>
                    <div class="detail-value">
                        <span id="status" class="status-badge">-</span>
                    </div>
                </div>
                
                <div class="detail-item">
                    <label class="detail-label">Date de création</label>
                    <div class="detail-value" id="createdAt">-</div>
                </div>
                
                <div class="detail-item">
                    <label class="detail-label">Dernière mise à jour</label>
                    <div class="detail-value" id="updatedAt">-</div>
                </div>
            </div>
        </div>

        <!-- Notes -->
        <div class="details-section" id="notesSection" style="display: none;">
            <h3 class="section-title">
                <div class="section-icon">
                    <i class="bi bi-chat-text"></i>
                </div>
                Notes et Observations
            </h3>
            
            <div class="detail-item">
                <label class="detail-label">Notes</label>
                <div class="detail-value" id="note">-</div>
            </div>
        </div>

        <!-- Actions -->
        <div class="details-section">
            <div class="d-flex gap-2 flex-wrap">
                <a href="/camion/<?php echo $camion_id; ?>/modifier" class="btn-modern btn-primary-modern">
                    <i class="bi bi-pencil"></i>
                    Modifier
                </a>
                <button type="button" class="btn-modern btn-danger-modern" onclick="confirmDelete()">
                    <i class="bi bi-trash"></i>
                    Supprimer
                </button>
                <button type="button" class="btn-modern btn-secondary-modern" onclick="window.print()">
                    <i class="bi bi-printer"></i>
                    Imprimer
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    const camionId = '<?php echo $camion_id; ?>';
    let camionData = null;

    document.addEventListener('DOMContentLoaded', function() {
        loadCamionDetails();
    });

    async function loadCamionDetails() {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';
            
            if (!accessToken) {
                console.error('Token d\'accès manquant');
                return;
            }

            const response = await fetch(`https://toure.gestiem.com/api/camions/${camionId}`, {
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json'
                }
            });

            if (response.ok) {
                const result = await response.json();
                console.log('Détails du camion:', result);
                
                camionData = result.data;
                displayCamionDetails();
                
                document.getElementById('loadingContainer').style.display = 'none';
                document.getElementById('camionDetailsContent').style.display = 'block';
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

    function displayCamionDetails() {
        if (!camionData) return;

        // Informations générales
        document.getElementById('numeroImmat').textContent = camionData.numero_immat || 'N/A';
        document.getElementById('marque').textContent = camionData.marque || 'N/A';
        document.getElementById('modele').textContent = camionData.modele || 'N/A';
        document.getElementById('capacite').textContent = `${camionData.capacite || '0'} tonnes`;

        // Statut et dates
        document.getElementById('status').textContent = getStatusLabel(camionData.status);
        document.getElementById('status').className = `status-badge status-${camionData.status || 'disponible'}`;
        document.getElementById('createdAt').textContent = formatDateTime(camionData.created_at);
        document.getElementById('updatedAt').textContent = formatDateTime(camionData.updated_at);

        // Notes
        if (camionData.note) {
            document.getElementById('note').textContent = camionData.note;
            document.getElementById('notesSection').style.display = 'block';
        }
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

    function confirmDelete() {
        if (confirm('Êtes-vous sûr de vouloir supprimer ce camion ? Cette action est irréversible.')) {
            // Rediriger vers la page de suppression
            window.location.href = `/camion/${camionId}/supprimer`;
        }
    }
</script>

<?php
$content = ob_get_clean();
require './views/layouts/app-layout.php';
?>
