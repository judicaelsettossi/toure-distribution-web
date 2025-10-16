<?php
$title = 'Nouveau Paiement';
ob_start();
?>

<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1 text-dark">Nouveau Paiement</h1>
            <p class="text-body">Enregistrer un nouveau paiement de commande</p>
        </div>
        <div>
            <a href="/paiement-commande" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>Retour à la liste
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <!-- Formulaire -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-credit-card me-2"></i>Informations du Paiement
                    </h5>
                </div>
                <div class="card-body">
                    <form id="paiementForm" method="POST">
                        <div class="row g-3">
                            <!-- Commande -->
                            <div class="col-md-6">
                                <label for="commande_id" class="form-label required">Commande</label>
                                <select class="form-select" id="commande_id" name="commande_id" required>
                                    <option value="">Sélectionner une commande</option>
                                    <?php foreach ($commandes as $commande): ?>
                                        <option value="<?php echo $commande['commande_id']; ?>" 
                                                data-montant="<?php echo $commande['montant']; ?>"
                                                data-montant-paye="<?php echo $commande['montant_paye'] ?? 0; ?>">
                                            <?php echo htmlspecialchars($commande['numero_commande']); ?> 
                                            - <?php echo number_format($commande['montant'], 0, ',', ' '); ?> FCFA
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="form-text">Sélectionnez la commande concernée par ce paiement</div>
                            </div>

                            <!-- Montant -->
                            <div class="col-md-6">
                                <label for="montant" class="form-label required">Montant du Paiement</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" id="montant" name="montant" 
                                           step="0.01" min="0.01" required placeholder="0.00">
                                    <span class="input-group-text">FCFA</span>
                                </div>
                                <div class="form-text">
                                    <span id="montant-restant-info" class="text-muted">Montant restant à payer: 0 FCFA</span>
                                </div>
                            </div>

                            <!-- Mode de Paiement -->
                            <div class="col-md-6">
                                <label for="mode_paiement" class="form-label required">Mode de Paiement</label>
                                <select class="form-select" id="mode_paiement" name="mode_paiement" required>
                                    <option value="">Sélectionner un mode</option>
                                    <option value="especes">Espèces</option>
                                    <option value="cheque">Chèque</option>
                                    <option value="virement">Virement</option>
                                    <option value="carte_bancaire">Carte bancaire</option>
                                    <option value="mobile_money">Mobile Money</option>
                                </select>
                            </div>

                            <!-- Statut -->
                            <div class="col-md-6">
                                <label for="statut" class="form-label">Statut</label>
                                <select class="form-select" id="statut" name="statut">
                                    <option value="en_attente">En attente</option>
                                    <option value="valide" selected>Validé</option>
                                    <option value="refuse">Refusé</option>
                                    <option value="annule">Annulé</option>
                                </select>
                            </div>

                            <!-- Date de Paiement -->
                            <div class="col-md-6">
                                <label for="date_paiement" class="form-label required">Date et Heure de Paiement</label>
                                <input type="datetime-local" class="form-control" id="date_paiement" 
                                       name="date_paiement" required>
                            </div>

                            <!-- Numéro de Transaction -->
                            <div class="col-md-6">
                                <label for="numero_transaction" class="form-label">Numéro de Transaction</label>
                                <input type="text" class="form-control" id="numero_transaction" 
                                       name="numero_transaction" placeholder="TRX123456789">
                                <div class="form-text">Pour les paiements électroniques</div>
                            </div>

                            <!-- Numéro de Chèque -->
                            <div class="col-md-6" id="numero-cheque-field" style="display: none;">
                                <label for="numero_cheque" class="form-label">Numéro de Chèque</label>
                                <input type="text" class="form-control" id="numero_cheque" 
                                       name="numero_cheque" placeholder="CHQ987654">
                            </div>

                            <!-- Banque -->
                            <div class="col-md-6" id="banque-field" style="display: none;">
                                <label for="banque" class="form-label">Banque Émettrice</label>
                                <input type="text" class="form-control" id="banque" 
                                       name="banque" placeholder="Bank of Africa">
                            </div>

                            <!-- Notes -->
                            <div class="col-12">
                                <label for="note" class="form-label">Notes</label>
                                <textarea class="form-control" id="note" name="note" rows="3" 
                                          placeholder="Notes ou observations sur ce paiement..."></textarea>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary me-2">
                                    <i class="bi bi-check-circle me-2"></i>Enregistrer le Paiement
                                </button>
                                <a href="/paiement-commande" class="btn btn-outline-secondary">
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
            <div class="card" id="commande-info-card" style="display: none;">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-info-circle me-2"></i>Informations de la Commande
                    </h5>
                </div>
                <div class="card-body">
                    <div id="commande-details">
                        <!-- Les détails seront chargés dynamiquement -->
                    </div>
                </div>
            </div>

            <!-- Aide -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-question-circle me-2"></i>Aide
                    </h5>
                </div>
                <div class="card-body">
                    <h6>Modes de Paiement :</h6>
                    <ul class="list-unstyled small">
                        <li><strong>Espèces :</strong> Paiement en liquide</li>
                        <li><strong>Chèque :</strong> Paiement par chèque bancaire</li>
                        <li><strong>Virement :</strong> Transfert bancaire</li>
                        <li><strong>Carte bancaire :</strong> Paiement par carte</li>
                        <li><strong>Mobile Money :</strong> Paiement mobile (MTN, Moov, etc.)</li>
                    </ul>

                    <h6 class="mt-3">Statuts :</h6>
                    <ul class="list-unstyled small">
                        <li><strong>En attente :</strong> Paiement non encore confirmé</li>
                        <li><strong>Validé :</strong> Paiement confirmé et accepté</li>
                        <li><strong>Refusé :</strong> Paiement rejeté</li>
                        <li><strong>Annulé :</strong> Paiement annulé</li>
                    </ul>
                </div>
            </div>
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
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const commandeSelect = document.getElementById('commande_id');
        const montantInput = document.getElementById('montant');
        const modePaiementSelect = document.getElementById('mode_paiement');
        const numeroChequeField = document.getElementById('numero-cheque-field');
        const banqueField = document.getElementById('banque-field');
        const commandeInfoCard = document.getElementById('commande-info-card');
        const commandeDetails = document.getElementById('commande-details');
        const montantRestantInfo = document.getElementById('montant-restant-info');
        const form = document.getElementById('paiementForm');

        // Définir la date actuelle par défaut
        const now = new Date();
        now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
        document.getElementById('date_paiement').value = now.toISOString().slice(0, 16);

        // Gestion du changement de commande
        commandeSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            
            if (selectedOption.value) {
                const montant = parseFloat(selectedOption.dataset.montant);
                const montantPaye = parseFloat(selectedOption.dataset.montantPaye || 0);
                const montantRestant = montant - montantPaye;

                // Afficher les informations de la commande
                commandeInfoCard.style.display = 'block';
                commandeDetails.innerHTML = `
                    <div class="row g-2">
                        <div class="col-6"><strong>Commande :</strong></div>
                        <div class="col-6">${selectedOption.textContent.split(' - ')[0]}</div>
                        
                        <div class="col-6"><strong>Montant total :</strong></div>
                        <div class="col-6">${montant.toLocaleString('fr-FR')} FCFA</div>
                        
                        <div class="col-6"><strong>Déjà payé :</strong></div>
                        <div class="col-6">${montantPaye.toLocaleString('fr-FR')} FCFA</div>
                        
                        <div class="col-6"><strong>Restant :</strong></div>
                        <div class="col-6 text-danger fw-bold">${montantRestant.toLocaleString('fr-FR')} FCFA</div>
                    </div>
                `;

                // Mettre à jour l'info du montant restant
                montantRestantInfo.textContent = `Montant restant à payer: ${montantRestant.toLocaleString('fr-FR')} FCFA`;
                montantRestantInfo.className = montantRestant > 0 ? 'text-warning' : 'text-success';

                // Définir le montant maximum
                montantInput.max = montantRestant;
                montantInput.placeholder = montantRestant.toFixed(2);
            } else {
                commandeInfoCard.style.display = 'none';
                montantRestantInfo.textContent = 'Montant restant à payer: 0 FCFA';
                montantRestantInfo.className = 'text-muted';
            }
        });

        // Gestion du changement de mode de paiement
        modePaiementSelect.addEventListener('change', function() {
            const mode = this.value;
            
            // Afficher/masquer les champs selon le mode
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

            // Suggestions pour le numéro de transaction
            const numeroTransactionInput = document.getElementById('numero_transaction');
            if (mode === 'mobile_money' && !numeroTransactionInput.value) {
                numeroTransactionInput.placeholder = 'TRX' + Date.now().toString().slice(-8);
            } else if (mode === 'virement' && !numeroTransactionInput.value) {
                numeroTransactionInput.placeholder = 'VIR' + Date.now().toString().slice(-8);
            } else if (mode === 'carte_bancaire' && !numeroTransactionInput.value) {
                numeroTransactionInput.placeholder = 'CARD' + Date.now().toString().slice(-8);
            }
        });

        // Validation du formulaire
        form.addEventListener('submit', function(e) {
            const montant = parseFloat(montantInput.value);
            const selectedOption = commandeSelect.options[commandeSelect.selectedIndex];
            
            if (selectedOption.value) {
                const montantRestant = parseFloat(selectedOption.dataset.montant) - parseFloat(selectedOption.dataset.montantPaye || 0);
                
                if (montant > montantRestant) {
                    e.preventDefault();
                    alert(`Le montant du paiement (${montant.toLocaleString('fr-FR')} FCFA) ne peut pas dépasser le montant restant à payer (${montantRestant.toLocaleString('fr-FR')} FCFA).`);
                    return;
                }
            }

            // Afficher un indicateur de chargement
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Enregistrement...';
            submitBtn.disabled = true;

            // Le formulaire sera soumis normalement
        });
    });
</script>

<?php
$content = ob_get_clean();
require './views/layouts/app-layout.php';
?>
