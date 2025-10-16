<?php
$title = 'Modifier le Paiement';
ob_start();
?>

<div class="container-fluid">
    <?php if ($paiement): ?>
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-1 text-dark">Modifier le Paiement</h1>
                <p class="text-body"><?php echo htmlspecialchars($paiement['reference_paiement']); ?></p>
            </div>
            <div>
                <a href="/paiement-commande/<?php echo $paiement['paiement_commande_id']; ?>" class="btn btn-outline-secondary me-2">
                    <i class="bi bi-arrow-left me-2"></i>Retour aux détails
                </a>
                <a href="/paiement-commande" class="btn btn-outline-secondary">
                    <i class="bi bi-list me-2"></i>Liste des paiements
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <!-- Formulaire -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-pencil-square me-2"></i>Modifier les Informations du Paiement
                        </h5>
                    </div>
                    <div class="card-body">
                        <form id="paiementForm" method="POST">
                            <div class="row g-3">
                                <!-- Référence (lecture seule) -->
                                <div class="col-md-6">
                                    <label for="reference_paiement" class="form-label">Référence du Paiement</label>
                                    <input type="text" class="form-control" id="reference_paiement" 
                                           value="<?php echo htmlspecialchars($paiement['reference_paiement']); ?>" 
                                           readonly style="background-color: #f8f9fa;">
                                    <div class="form-text">La référence ne peut pas être modifiée</div>
                                </div>

                                <!-- Montant -->
                                <div class="col-md-6">
                                    <label for="montant" class="form-label required">Montant du Paiement</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="montant" name="montant" 
                                               step="0.01" min="0.01" required 
                                               value="<?php echo $paiement['montant']; ?>">
                                        <span class="input-group-text">FCFA</span>
                                    </div>
                                    <?php if (isset($paiement['commande'])): ?>
                                        <div class="form-text">
                                            Montant total de la commande: 
                                            <strong><?php echo number_format($paiement['commande']['montant'], 0, ',', ' '); ?> FCFA</strong>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Mode de Paiement -->
                                <div class="col-md-6">
                                    <label for="mode_paiement" class="form-label required">Mode de Paiement</label>
                                    <select class="form-select" id="mode_paiement" name="mode_paiement" required>
                                        <option value="especes" <?php echo $paiement['mode_paiement'] === 'especes' ? 'selected' : ''; ?>>Espèces</option>
                                        <option value="cheque" <?php echo $paiement['mode_paiement'] === 'cheque' ? 'selected' : ''; ?>>Chèque</option>
                                        <option value="virement" <?php echo $paiement['mode_paiement'] === 'virement' ? 'selected' : ''; ?>>Virement</option>
                                        <option value="carte_bancaire" <?php echo $paiement['mode_paiement'] === 'carte_bancaire' ? 'selected' : ''; ?>>Carte bancaire</option>
                                        <option value="mobile_money" <?php echo $paiement['mode_paiement'] === 'mobile_money' ? 'selected' : ''; ?>>Mobile Money</option>
                                    </select>
                                </div>

                                <!-- Statut -->
                                <div class="col-md-6">
                                    <label for="statut" class="form-label">Statut</label>
                                    <select class="form-select" id="statut" name="statut">
                                        <option value="en_attente" <?php echo $paiement['statut'] === 'en_attente' ? 'selected' : ''; ?>>En attente</option>
                                        <option value="valide" <?php echo $paiement['statut'] === 'valide' ? 'selected' : ''; ?>>Validé</option>
                                        <option value="refuse" <?php echo $paiement['statut'] === 'refuse' ? 'selected' : ''; ?>>Refusé</option>
                                        <option value="annule" <?php echo $paiement['statut'] === 'annule' ? 'selected' : ''; ?>>Annulé</option>
                                    </select>
                                </div>

                                <!-- Date de Paiement -->
                                <div class="col-md-6">
                                    <label for="date_paiement" class="form-label required">Date et Heure de Paiement</label>
                                    <input type="datetime-local" class="form-control" id="date_paiement" 
                                           name="date_paiement" required 
                                           value="<?php echo date('Y-m-d\TH:i', strtotime($paiement['date_paiement'])); ?>">
                                </div>

                                <!-- Numéro de Transaction -->
                                <div class="col-md-6">
                                    <label for="numero_transaction" class="form-label">Numéro de Transaction</label>
                                    <input type="text" class="form-control" id="numero_transaction" 
                                           name="numero_transaction" 
                                           value="<?php echo htmlspecialchars($paiement['numero_transaction'] ?? ''); ?>"
                                           placeholder="TRX123456789">
                                    <div class="form-text">Pour les paiements électroniques</div>
                                </div>

                                <!-- Numéro de Chèque -->
                                <div class="col-md-6" id="numero-cheque-field" 
                                     style="display: <?php echo $paiement['mode_paiement'] === 'cheque' ? 'block' : 'none'; ?>;">
                                    <label for="numero_cheque" class="form-label">Numéro de Chèque</label>
                                    <input type="text" class="form-control" id="numero_cheque" 
                                           name="numero_cheque" 
                                           value="<?php echo htmlspecialchars($paiement['numero_cheque'] ?? ''); ?>"
                                           placeholder="CHQ987654">
                                </div>

                                <!-- Banque -->
                                <div class="col-md-6" id="banque-field" 
                                     style="display: <?php echo $paiement['mode_paiement'] === 'cheque' ? 'block' : 'none'; ?>;">
                                    <label for="banque" class="form-label">Banque Émettrice</label>
                                    <input type="text" class="form-control" id="banque" 
                                           name="banque" 
                                           value="<?php echo htmlspecialchars($paiement['banque'] ?? ''); ?>"
                                           placeholder="Bank of Africa">
                                </div>

                                <!-- Notes -->
                                <div class="col-12">
                                    <label for="note" class="form-label">Notes</label>
                                    <textarea class="form-control" id="note" name="note" rows="3" 
                                              placeholder="Notes ou observations sur ce paiement..."><?php echo htmlspecialchars($paiement['note'] ?? ''); ?></textarea>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-warning me-2">
                                        <i class="bi bi-check-circle me-2"></i>Mettre à Jour
                                    </button>
                                    <a href="/paiement-commande/<?php echo $paiement['paiement_commande_id']; ?>" class="btn btn-outline-secondary">
                                        <i class="bi bi-x-circle me-2"></i>Annuler
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Informations de la Commande -->
                <?php if (isset($paiement['commande'])): ?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi bi-info-circle me-2"></i>Commande Associée
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-2">
                                <div class="col-6"><strong>Commande :</strong></div>
                                <div class="col-6">
                                    <a href="/commande/<?php echo $paiement['commande']['commande_id']; ?>" 
                                       class="text-decoration-none">
                                        <?php echo htmlspecialchars($paiement['commande']['numero_commande']); ?>
                                    </a>
                                </div>
                                
                                <div class="col-6"><strong>Montant total :</strong></div>
                                <div class="col-6"><?php echo number_format($paiement['commande']['montant'], 0, ',', ' '); ?> FCFA</div>
                                
                                <div class="col-6"><strong>Déjà payé :</strong></div>
                                <div class="col-6 text-success"><?php echo number_format($paiement['commande']['montant_paye'] ?? 0, 0, ',', ' '); ?> FCFA</div>
                                
                                <div class="col-6"><strong>Restant :</strong></div>
                                <div class="col-6 text-warning fw-bold"><?php echo number_format($paiement['commande']['montant_restant'] ?? 0, 0, ',', ' '); ?> FCFA</div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Historique des Modifications -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-clock-history me-2"></i>Historique
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="timeline">
                            <div class="timeline-item">
                                <div class="timeline-marker bg-primary"></div>
                                <div class="timeline-content">
                                    <h6 class="timeline-title">Paiement créé</h6>
                                    <p class="timeline-text"><?php echo date('d/m/Y à H:i', strtotime($paiement['created_at'])); ?></p>
                                </div>
                            </div>
                            <?php if ($paiement['updated_at'] !== $paiement['created_at']): ?>
                                <div class="timeline-item">
                                    <div class="timeline-marker bg-warning"></div>
                                    <div class="timeline-content">
                                        <h6 class="timeline-title">Dernière modification</h6>
                                        <p class="timeline-text"><?php echo date('d/m/Y à H:i', strtotime($paiement['updated_at'])); ?></p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Aide -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-question-circle me-2"></i>Conseils
                        </h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled small">
                            <li class="mb-2">
                                <i class="bi bi-info-circle text-primary me-2"></i>
                                La référence du paiement ne peut pas être modifiée
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-info-circle text-primary me-2"></i>
                                Vérifiez le montant avant de valider
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-info-circle text-primary me-2"></i>
                                Le statut "Validé" confirme le paiement
                            </li>
                            <li>
                                <i class="bi bi-info-circle text-primary me-2"></i>
                                Les champs chèque apparaissent si le mode est "Chèque"
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    <?php else: ?>
        <!-- Paiement non trouvé -->
        <div class="text-center py-5">
            <i class="bi bi-exclamation-triangle display-1 text-warning"></i>
            <h4 class="mt-3 text-warning">Paiement non trouvé</h4>
            <p class="text-muted">Le paiement demandé n'existe pas ou a été supprimé.</p>
            <a href="/paiement-commande" class="btn btn-primary">
                <i class="bi bi-arrow-left me-2"></i>Retour à la liste
            </a>
        </div>
    <?php endif; ?>
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

    /* Timeline styles */
    .timeline {
        position: relative;
        padding-left: 30px;
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 15px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #dee2e6;
    }

    .timeline-item {
        position: relative;
        margin-bottom: 20px;
    }

    .timeline-marker {
        position: absolute;
        left: -22px;
        top: 5px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        border: 2px solid #fff;
    }

    .timeline-content {
        padding-left: 15px;
    }

    .timeline-title {
        font-size: 0.875rem;
        font-weight: 600;
        margin-bottom: 5px;
        color: #495057;
    }

    .timeline-text {
        font-size: 0.75rem;
        color: #6c757d;
        margin: 0;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modePaiementSelect = document.getElementById('mode_paiement');
        const numeroChequeField = document.getElementById('numero-cheque-field');
        const banqueField = document.getElementById('banque-field');
        const form = document.getElementById('paiementForm');

        // Gestion du changement de mode de paiement
        modePaiementSelect.addEventListener('change', function() {
            const mode = this.value;
            
            if (mode === 'cheque') {
                numeroChequeField.style.display = 'block';
                banqueField.style.display = 'block';
                document.getElementById('numero_cheque').required = true;
                document.getElementById('banque').required = true;
            } else {
                numeroChequeField.style.display = 'none';
                banqueField.style.display = 'none';
                document.getElementById('numero_cheque').required = false;
                document.getElementById('banque').required = false;
            }
        });

        // Validation du formulaire
        form.addEventListener('submit', function(e) {
            const montant = parseFloat(document.getElementById('montant').value);
            
            if (montant <= 0) {
                e.preventDefault();
                alert('Le montant doit être supérieur à 0.');
                return;
            }

            // Afficher un indicateur de chargement
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Mise à jour...';
            submitBtn.disabled = true;

            // Le formulaire sera soumis normalement
        });
    });
</script>

<?php
$content = ob_get_clean();
require './views/layouts/app-layout.php';
?>
