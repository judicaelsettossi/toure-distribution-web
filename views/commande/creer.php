<?php
$title = 'Nouvelle Commande';
ob_start();
?>

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
        --gradient-primary: linear-gradient(135deg, #f00480 0%, #010768 100%);
        --gradient-light: linear-gradient(135deg, rgba(240, 4, 128, 0.1) 0%, rgba(1, 7, 104, 0.1) 100%);
    }

    .create-commande-wrapper {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        min-height: 100vh;
        padding: 2rem 0;
    }

    .create-commande-header {
        background: var(--gradient-primary);
        color: white;
        border-radius: 20px;
        padding: 2.5rem;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }

    .create-commande-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 200px;
        height: 200px;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
        z-index: 1;
    }

    .create-commande-header::after {
        content: '';
        position: absolute;
        bottom: -30%;
        left: -10%;
        width: 150px;
        height: 150px;
        background: rgba(255,255,255,0.05);
        border-radius: 50%;
        z-index: 1;
    }

    .create-commande-header .header-content {
        position: relative;
        z-index: 2;
    }

    .create-commande-header h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .create-commande-header p {
        font-size: 1.1rem;
        opacity: 0.9;
        margin-bottom: 0;
    }

    .btn-modern {
        background: rgba(255,255,255,0.2);
        border: 2px solid rgba(255,255,255,0.3);
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .btn-modern:hover {
        background: rgba(255,255,255,0.3);
        border-color: rgba(255,255,255,0.5);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }

    .form-container {
        background: white;
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: 0 20px 40px rgba(0,0,0,0.08);
        border: 1px solid rgba(0,0,0,0.05);
    }

    .form-section {
        margin-bottom: 2.5rem;
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        position: relative;
    }

    .section-title::after {
        content: '';
        flex: 1;
        height: 2px;
        background: var(--gradient-light);
        margin-left: 1rem;
        border-radius: 1px;
    }

    .section-icon {
        width: 50px;
        height: 50px;
        background: var(--gradient-primary);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        color: white;
        font-size: 1.2rem;
    }

    .form-group-modern {
        margin-bottom: 1.5rem;
    }

    .form-label-modern {
        font-weight: 600;
        color: var(--secondary-color);
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
        display: block;
    }

    .form-control-modern {
        border: 2px solid #e9ecef;
        border-radius: 12px;
        padding: 0.875rem 1rem;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: #fafbfc;
    }

    .form-control-modern:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(240, 4, 128, 0.15);
        background: white;
    }

    .form-select-modern {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m1 6 7 7 7-7'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 0.75rem center;
        background-size: 16px 12px;
        padding-right: 2.5rem;
    }

    .input-group-modern {
        position: relative;
    }

    .input-group-modern .input-group-text {
        background: var(--gradient-primary);
        color: white;
        border: none;
        border-radius: 0 12px 12px 0;
        font-weight: 600;
        padding: 0.875rem 1rem;
    }

    .input-group-modern .form-control-modern {
        border-radius: 12px 0 0 12px;
    }

    .btn-primary-modern {
        background: var(--gradient-primary);
        border: none;
        color: white;
        padding: 1rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 10px 20px rgba(240, 4, 128, 0.3);
    }

    .btn-primary-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 30px rgba(240, 4, 128, 0.4);
        color: white;
    }

    .btn-outline-modern {
        background: transparent;
        border: 2px solid #e9ecef;
        color: #6c757d;
        padding: 1rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .btn-outline-modern:hover {
        background: #f8f9fa;
        border-color: var(--primary-color);
        color: var(--primary-color);
        transform: translateY(-2px);
    }

    .required::after {
        content: " *";
        color: var(--danger-color);
        font-weight: 700;
    }

    .form-text-modern {
        font-size: 0.8rem;
        color: #6c757d;
        margin-top: 0.5rem;
        font-style: italic;
    }

    .alert-modern {
        border: none;
        border-radius: 15px;
        padding: 1rem 1.5rem;
        margin-bottom: 1.5rem;
        font-weight: 500;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .alert-success-modern {
        background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
        color: #155724;
        border-left: 4px solid var(--success-color);
    }

    .alert-danger-modern {
        background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
        color: #721c24;
        border-left: 4px solid var(--danger-color);
    }

    .alert-info-modern {
        background: linear-gradient(135deg, #d1ecf1 0%, #bee5eb 100%);
        color: #0c5460;
        border-left: 4px solid var(--info-color);
    }

    .form-actions {
        background: var(--gradient-light);
        border-radius: 15px;
        padding: 1.5rem;
        margin-top: 2rem;
        text-align: center;
    }

    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        backdrop-filter: blur(5px);
    }

    .loading-content {
        background: white;
        padding: 2rem;
        border-radius: 20px;
        text-align: center;
        box-shadow: 0 20px 40px rgba(0,0,0,0.3);
    }

    .loading-spinner {
        width: 50px;
        height: 50px;
        border: 4px solid #f3f3f3;
        border-top: 4px solid var(--primary-color);
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin: 0 auto 1rem;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .fade-in {
        animation: fadeIn 0.6s ease-in;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .card-modern {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.08);
        border: 1px solid rgba(0,0,0,0.05);
        overflow: hidden;
    }

    .card-header-modern {
        background: var(--gradient-light);
        border-bottom: 1px solid rgba(0,0,0,0.05);
        padding: 1.5rem 2rem;
    }

    .card-body-modern {
        padding: 2rem;
    }

    @media (max-width: 768px) {
        .create-commande-wrapper {
            padding: 1rem 0;
        }
        
        .create-commande-header {
            padding: 1.5rem;
            margin-bottom: 1rem;
        }
        
        .create-commande-header h1 {
            font-size: 2rem;
        }
        
        .form-container {
            padding: 1.5rem;
        }
    }
</style>

<div class="create-commande-wrapper">
    <div class="container-fluid">
        <!-- Header -->
        <div class="create-commande-header">
            <div class="header-content">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="mb-2">
                            <i class="bi bi-plus-circle me-3"></i>Nouvelle Commande
                        </h1>
                        <p class="mb-0">Créez une nouvelle commande auprès d'un fournisseur</p>
                    </div>
                    <div>
                        <a href="/commandes" class="btn-modern">
                            <i class="bi bi-arrow-left me-2"></i>Retour à la liste
                        </a>
                    </div>
                </div>
            </div>
        </div>

    <!-- Alerts -->
    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-2"></i>
            <?php echo htmlspecialchars($_GET['error']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            Commande créée avec succès !
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- Formulaire -->
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">
                <i class="bi bi-plus-circle me-2"></i>Informations de la Commande
            </h5>
        </div>
        <div class="card-body">
            <form method="POST" id="commandeForm">
                <div class="row g-3">
                    <!-- Fournisseur -->
                    <div class="col-md-6">
                        <label for="fournisseur_id" class="form-label required">Fournisseur</label>
                        <select class="form-select" id="fournisseur_id" name="fournisseur_id" required>
                            <option value="">Sélectionner un fournisseur</option>
                            <?php if (!empty($fournisseurs)): ?>
                                <?php foreach ($fournisseurs as $fournisseur): ?>
                                    <option value="<?php echo htmlspecialchars($fournisseur['fournisseur_id'] ?? $fournisseur['id']); ?>">
                                        <?php echo htmlspecialchars($fournisseur['name']); ?> 
                                        (<?php echo htmlspecialchars($fournisseur['code'] ?? 'N/A'); ?>)
                                    </option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="" disabled>Aucun fournisseur disponible</option>
                            <?php endif; ?>
                        </select>
                        <div class="form-text">Sélectionnez le fournisseur pour cette commande</div>
                    </div>

                    <!-- Date d'achat -->
                    <div class="col-md-6">
                        <label for="date_achat" class="form-label required">Date d'achat</label>
                        <input type="date" class="form-control" id="date_achat" name="date_achat" required>
                        <div class="form-text">Date à laquelle la commande a été passée</div>
                    </div>

                    <!-- Date de livraison prévue -->
                    <div class="col-md-6">
                        <label for="date_livraison_prevue" class="form-label required">Date de livraison prévue</label>
                        <input type="date" class="form-control" id="date_livraison_prevue" name="date_livraison_prevue" required>
                        <div class="form-text">Date prévue pour la livraison</div>
                    </div>

                    <!-- Date de livraison effective -->
                    <div class="col-md-6">
                        <label for="date_livraison_effective" class="form-label">Date de livraison effective</label>
                        <input type="date" class="form-control" id="date_livraison_effective" name="date_livraison_effective">
                        <div class="form-text">Date réelle de livraison (optionnel)</div>
                    </div>

                    <!-- Montant -->
                    <div class="col-md-6">
                        <label for="montant" class="form-label required">Montant total</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="montant" name="montant" 
                                   step="0.01" min="0" placeholder="0.00" required>
                            <span class="input-group-text">FCFA</span>
                        </div>
                        <div class="form-text">Montant total de la commande</div>
                    </div>

                    <!-- Statut -->
                    <div class="col-md-6">
                        <label for="status" class="form-label">Statut</label>
                        <select class="form-select" id="status" name="status">
                            <option value="en_attente" selected>En attente</option>
                            <option value="validee">Validée</option>
                            <option value="en_cours">En cours</option>
                            <option value="livree">Livrée</option>
                            <option value="partiellement_livree">Partiellement livrée</option>
                            <option value="annulee">Annulée</option>
                        </select>
                        <div class="form-text">Statut initial de la commande</div>
                    </div>

                    <!-- Notes -->
                    <div class="col-12">
                        <label for="note" class="form-label">Notes / Observations</label>
                        <textarea class="form-control" id="note" name="note" rows="4" 
                                  placeholder="Informations complémentaires sur la commande..."></textarea>
                        <div class="form-text">Notes ou observations sur cette commande</div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="row mt-4">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary me-2">
                            <i class="bi bi-check-circle me-2"></i>Créer la Commande
                        </button>
                        <a href="/commandes" class="btn btn-outline-secondary">
                            <i class="bi bi-x-circle me-2"></i>Annuler
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .required::after {
        content: " *";
        color: #dc3545;
    }

    .form-label {
        font-weight: 600;
        color: #5e6e82;
        font-size: 0.875rem;
    }

    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
    }

    .form-text {
        font-size: 0.8rem;
    }

    .input-group-text {
        background-color: #e9ecef;
        border-color: #ced4da;
    }

    .btn {
        border-radius: 0.375rem;
    }

    .alert {
        border-radius: 0.5rem;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Définir la date d'aujourd'hui par défaut
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('date_achat').value = today;
        
        // Définir la date de livraison prévue à 7 jours
        const futureDate = new Date();
        futureDate.setDate(futureDate.getDate() + 7);
        document.getElementById('date_livraison_prevue').value = futureDate.toISOString().split('T')[0];

        // Validation du formulaire
        document.getElementById('commandeForm').addEventListener('submit', function(e) {
            const fournisseurId = document.getElementById('fournisseur_id').value;
            const dateAchat = document.getElementById('date_achat').value;
            const dateLivraisonPrevue = document.getElementById('date_livraison_prevue').value;
            const montant = document.getElementById('montant').value;

            if (!fournisseurId) {
                e.preventDefault();
                alert('Veuillez sélectionner un fournisseur');
                return;
            }

            if (!dateAchat) {
                e.preventDefault();
                alert('Veuillez saisir la date d\'achat');
                return;
            }

            if (!dateLivraisonPrevue) {
                e.preventDefault();
                alert('Veuillez saisir la date de livraison prévue');
                return;
            }

            if (!montant || parseFloat(montant) <= 0) {
                e.preventDefault();
                alert('Veuillez saisir un montant valide');
                return;
            }

            // Validation de la date de livraison effective si renseignée
            const dateLivraisonEffective = document.getElementById('date_livraison_effective').value;
            if (dateLivraisonEffective && dateLivraisonEffective < dateAchat) {
                e.preventDefault();
                alert('La date de livraison effective ne peut pas être antérieure à la date d\'achat');
                return;
            }

            // Si tout est valide, afficher un message de confirmation
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Création en cours...';
            submitBtn.disabled = true;
        });
    });
</script>

<?php
$content = ob_get_clean();
require './views/layouts/app-layout.php';
?>