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

    .form-container {
        background: white;
        border-radius: 16px;
        padding: 2.5rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        margin-bottom: 2rem;
    }

    .form-section {
        margin-bottom: 2.5rem;
        padding-bottom: 2rem;
        border-bottom: 2px solid #f0f0f0;
    }

    .form-section:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }

    .section-title {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
        color: var(--secondary-color);
        font-weight: 600;
        font-size: 1.25rem;
    }

    .section-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.1rem;
    }

    .form-group-modern {
        margin-bottom: 1.5rem;
    }

    .form-label-modern {
        display: block;
        font-weight: 600;
        color: var(--secondary-color);
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
    }

    .label-required::after {
        content: " *";
        color: #dc3545;
        font-weight: bold;
    }

    .form-control-modern {
        width: 100%;
        padding: 0.875rem 1rem;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background-color: #fff;
    }

    .form-control-modern:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(240, 4, 128, 0.15);
    }

    .form-control-modern:invalid {
        border-color: #dc3545;
    }

    .form-control-modern:valid {
        border-color: #28a745;
    }

    .btn-modern {
        padding: 0.875rem 2rem;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        font-size: 0.95rem;
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
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
    }

    .btn-outline-modern {
        background-color: transparent;
        color: var(--primary-color);
        border: 2px solid var(--primary-color);
    }

    .btn-outline-modern:hover {
        background-color: var(--primary-color);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(240, 4, 128, 0.3);
    }

    .direction-options {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-top: 1rem;
    }

    .direction-option {
        background: white;
        border: 2px solid #e9ecef;
        border-radius: 12px;
        padding: 1.5rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
    }

    .direction-option:hover {
        border-color: var(--primary-color);
        background: var(--light-primary);
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(240, 4, 128, 0.15);
    }

    .direction-option.selected {
        border-color: var(--primary-color);
        background: var(--light-primary);
    }

    .direction-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
        margin: 0 auto 1rem;
    }

    .direction-icon.in {
        background: linear-gradient(135deg, #28a745, #20c997);
    }

    .direction-icon.out {
        background: linear-gradient(135deg, #dc3545, #fd7e14);
    }

    .direction-icon.transfer {
        background: linear-gradient(135deg, #007bff, #6f42c1);
    }

    .direction-icon.adjustment {
        background: linear-gradient(135deg, #ffc107, #fd7e14);
    }

    .direction-name {
        font-weight: 600;
        color: var(--secondary-color);
        margin-bottom: 0.5rem;
    }

    .direction-description {
        color: #6c757d;
        font-size: 0.9rem;
        line-height: 1.4;
    }

    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.9);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        flex-direction: column;
    }

    .loading-spinner {
        width: 3rem;
        height: 3rem;
        border: 4px solid #f3f3f3;
        border-top: 4px solid var(--primary-color);
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin-bottom: 1rem;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .loading-text {
        color: var(--secondary-color);
        font-weight: 600;
    }

    .fade-in {
        animation: fadeIn 0.5s ease-in;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .form-help {
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 8px;
        padding: 1rem;
        margin-top: 1rem;
        font-size: 0.9rem;
        color: #6c757d;
    }

    .form-help i {
        color: var(--primary-color);
        margin-right: 0.5rem;
    }

    @media (max-width: 768px) {
        .form-container {
            padding: 1.5rem;
            margin: 1rem;
        }
        
        .direction-options {
            grid-template-columns: 1fr;
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
                            <li class="breadcrumb-item"><a class="breadcrumb-link text-primary-custom" href="/stock/gestion">Gestion de Stock</a></li>
                            <li class="breadcrumb-item"><a class="breadcrumb-link text-primary-custom" href="/stock/types-mouvements">Types de Mouvements</a></li>
                            <li class="breadcrumb-item active">Créer un Type</li>
                        </ol>
                    </nav>
                    <h2 class="mb-0 text-secondary-custom">Créer un Type de Mouvement</h2>
                    <p class="mb-0 text-muted">Définissez un nouveau type de mouvement pour votre gestion de stock</p>
                </div>
                <div class="col-sm-auto">
                    <button class="btn btn-outline-modern me-2" onclick="window.location.href='/stock/types-mouvements'">
                        <i class="bi-arrow-left me-1"></i> Retour
                    </button>
                </div>
            </div>
        </div>

        <!-- Alerts -->
        <div id="alertContainer"></div>

        <!-- Form -->
        <form id="movementTypeForm" class="form-container fade-in">
            <!-- Section Informations Générales -->
            <div class="form-section">
                <h3 class="section-title">
                    <div class="section-icon">
                        <i class="bi-info-circle"></i>
                    </div>
                    Informations Générales
                </h3>

                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group-modern">
                            <label class="form-label-modern label-required" for="name">Nom du type de mouvement</label>
                            <input type="text" id="name" name="name" class="form-control-modern" placeholder="Ex: Réception, Transfert, Ajustement..." required>
                            <div class="form-help">
                                <i class="bi-lightbulb"></i>
                                Choisissez un nom clair et descriptif pour identifier facilement ce type de mouvement.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Direction -->
            <div class="form-section">
                <h3 class="section-title">
                    <div class="section-icon">
                        <i class="bi-arrow-repeat"></i>
                    </div>
                    Direction du Mouvement
                </h3>

                <div class="form-group-modern">
                    <label class="form-label-modern label-required">Sélectionnez la direction</label>
                    <div class="direction-options">
                        <div class="direction-option" data-direction="in">
                            <div class="direction-icon in">
                                <i class="bi-arrow-down-circle"></i>
                            </div>
                            <div class="direction-name">Entrée</div>
                            <div class="direction-description">
                                Mouvement d'entrée de stock<br>
                                <small>Ex: Réception fournisseur, Retour client</small>
                            </div>
                        </div>

                        <div class="direction-option" data-direction="out">
                            <div class="direction-icon out">
                                <i class="bi-arrow-up-circle"></i>
                            </div>
                            <div class="direction-name">Sortie</div>
                            <div class="direction-description">
                                Mouvement de sortie de stock<br>
                                <small>Ex: Vente, Don, Perte</small>
                            </div>
                        </div>

                        <div class="direction-option" data-direction="transfer">
                            <div class="direction-icon transfer">
                                <i class="bi-arrow-left-right"></i>
                            </div>
                            <div class="direction-name">Transfert</div>
                            <div class="direction-description">
                                Transfert entre entrepôts<br>
                                <small>Ex: Transfert A → B, Relocalisation</small>
                            </div>
                        </div>

                        <div class="direction-option" data-direction="adjustment">
                            <div class="direction-icon adjustment">
                                <i class="bi-sliders"></i>
                            </div>
                            <div class="direction-name">Ajustement</div>
                            <div class="direction-description">
                                Ajustement de stock<br>
                                <small>Ex: Inventaire, Correction</small>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="direction" name="direction" required>
                    <div class="form-help">
                        <i class="bi-info-circle"></i>
                        La direction détermine l'impact du mouvement sur les quantités de stock.
                    </div>
                </div>
            </div>

            <!-- Section Description -->
            <div class="form-section">
                <h3 class="section-title">
                    <div class="section-icon">
                        <i class="bi-file-text"></i>
                    </div>
                    Description (Optionnel)
                </h3>

                <div class="form-group-modern">
                    <label class="form-label-modern" for="description">Description détaillée</label>
                    <textarea id="description" name="description" class="form-control-modern" rows="4" placeholder="Décrivez en détail ce type de mouvement, son utilisation, ses règles spécifiques..."></textarea>
                    <div class="form-help">
                        <i class="bi-lightbulb"></i>
                        Une description claire aidera les utilisateurs à choisir le bon type de mouvement.
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="form-section">
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-outline-modern w-100" onclick="window.location.href='/stock/types-mouvements'">
                            <i class="bi-x-circle me-1"></i> Annuler
                        </button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success-modern w-100" id="submitBtn">
                            <i class="bi-check-circle me-1"></i> Créer le Type
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Loading Overlay -->
<div id="loadingOverlay" class="loading-overlay">
    <div class="loading-spinner"></div>
    <div class="loading-text">Création du type de mouvement...</div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        setupEventListeners();
    });

    function setupEventListeners() {
        // Sélection de direction
        document.querySelectorAll('.direction-option').forEach(option => {
            option.addEventListener('click', function() {
                // Retirer la sélection précédente
                document.querySelectorAll('.direction-option').forEach(opt => opt.classList.remove('selected'));
                
                // Sélectionner l'option cliquée
                this.classList.add('selected');
                
                // Mettre à jour le champ caché
                const direction = this.dataset.direction;
                document.getElementById('direction').value = direction;
                
                console.log('Direction sélectionnée:', direction);
            });
        });

        // Soumission du formulaire
        document.getElementById('movementTypeForm').addEventListener('submit', handleSubmit);
    }

    async function handleSubmit(e) {
        e.preventDefault();
        
        console.log('=== DÉBUT DE LA CRÉATION ===');
        
        // Validation côté client
        const name = document.getElementById('name').value.trim();
        const direction = document.getElementById('direction').value;
        const description = document.getElementById('description').value.trim();
        
        if (!name) {
            showAlert('Le nom du type de mouvement est obligatoire', 'danger');
            document.getElementById('name').focus();
            return;
        }
        
        if (!direction) {
            showAlert('Veuillez sélectionner une direction', 'danger');
            return;
        }
        
        try {
            // Afficher le loading
            document.getElementById('loadingOverlay').style.display = 'flex';
            
            // Préparer les données
            const formData = {
                name: name,
                direction: direction,
                description: description || null
            };
            
            console.log('Données à envoyer:', formData);
            
            // Appel API
            const response = await fetch('https://toure.gestiem.com/api/stock-movement-types', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'Authorization': `Bearer <?php echo $_COOKIE['access_token'] ?? ''; ?>`
                },
                body: JSON.stringify(formData)
            });
            
            console.log('Réponse du serveur:', response.status, response.statusText);
            
            if (response.ok) {
                const result = await response.json();
                console.log('Succès:', result);
                
                showAlert('✓ Type de mouvement créé avec succès !', 'success');
                
                // Rediriger vers la liste après 2 secondes
                setTimeout(() => {
                    window.location.href = '/stock/types-mouvements';
                }, 2000);
                
            } else {
                const errorData = await response.json();
                console.error('Erreur du serveur:', errorData);
                
                if (response.status === 422 && errorData.errors) {
                    console.log('Détails de l\'erreur:', JSON.stringify(errorData.errors, null, 2));
                    const errorMessages = Object.values(errorData.errors).flat();
                    showAlert(`Erreur de validation: ${errorMessages.join(', ')}`, 'danger');
                } else {
                    showAlert(`Erreur: ${errorData.message || 'Erreur inconnue'}`, 'danger');
                }
            }
            
        } catch (error) {
            console.error('Erreur:', error);
            showAlert('Erreur de connexion au serveur', 'danger');
        } finally {
            document.getElementById('loadingOverlay').style.display = 'none';
        }
    }

    function showAlert(message, type) {
        const alertContainer = document.getElementById('alertContainer');
        const alertId = 'alert-' + Date.now();
        
        const alertHtml = `
            <div id="${alertId}" class="alert alert-${type} alert-dismissible fade show" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bi-${type === 'success' ? 'check-circle-fill' : 'exclamation-triangle-fill'} me-2"></i>
                    <span>${message}</span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;
        
        alertContainer.insertAdjacentHTML('beforeend', alertHtml);
        
        // Auto-remove après 5 secondes
        setTimeout(() => {
            const alertElement = document.getElementById(alertId);
            if (alertElement) {
                alertElement.remove();
            }
        }, 5000);
        
        // Scroll vers le haut pour voir l'alerte
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
</script>

<?php
$content = ob_get_clean();
require('./views/layouts/app-layout.php');
?>
