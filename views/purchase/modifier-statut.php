<?php
$pageTitle = 'Modifier le Statut - ' . $purchase['purchase_number'];
include __DIR__ . '/../layouts/app-layout.php';
?>

<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Modifier le Statut</h1>
            <p class="text-muted mb-0"><?= htmlspecialchars($purchase['purchase_number']) ?></p>
        </div>
        <div>
            <a href="/achat/<?= $purchase['id_purchase'] ?>/details" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i>Retour aux détails
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Formulaire de modification -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Modifier le Statut</h5>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="mb-3">
                            <label for="statut" class="form-label">Nouveau statut <span class="text-danger">*</span></label>
                            <select class="form-select" id="statut" name="statut" required>
                                <option value="">Sélectionner un statut</option>
                                <option value="pending" <?= $purchase['statut'] === 'pending' ? 'selected' : '' ?>>En attente</option>
                                <option value="confirmed" <?= $purchase['statut'] === 'confirmed' ? 'selected' : '' ?>>Confirmé</option>
                                <option value="partially_received" <?= $purchase['statut'] === 'partially_received' ? 'selected' : '' ?>>Partiellement reçu</option>
                                <option value="received" <?= $purchase['statut'] === 'received' ? 'selected' : '' ?>>Reçu</option>
                                <option value="cancelled" <?= $purchase['statut'] === 'cancelled' ? 'selected' : '' ?>>Annulé</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="actual_delivery_date" class="form-label">Date de livraison effective</label>
                            <input type="date" class="form-control" id="actual_delivery_date" name="actual_delivery_date" 
                                   value="<?= $purchase['actual_delivery_date'] ? date('Y-m-d', strtotime($purchase['actual_delivery_date'])) : '' ?>">
                            <div class="form-text">Renseignez cette date si l'achat a été livré</div>
                        </div>

                        <div class="mb-3">
                            <label for="notes" class="form-label">Notes de modification</label>
                            <textarea class="form-control" id="notes" name="notes" rows="3" 
                                      placeholder="Notes sur le changement de statut..."><?= htmlspecialchars($purchase['notes']) ?></textarea>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="/achat/<?= $purchase['id_purchase'] ?>/details" class="btn btn-outline-secondary me-md-2">
                                <i class="bi bi-x-circle me-1"></i>Annuler
                            </a>
                            <button type="submit" class="btn btn-warning">
                                <i class="bi bi-check-circle me-1"></i>Mettre à jour le statut
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Informations actuelles -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Informations Actuelles</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-6">
                            <strong>Fournisseur:</strong><br>
                            <?= htmlspecialchars($purchase['supplier_name']) ?>
                        </div>
                        <div class="col-6">
                            <strong>Entrepôt:</strong><br>
                            <?= htmlspecialchars($purchase['warehouse_name']) ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <strong>Date d'achat:</strong><br>
                            <?= formatDate($purchase['purchase_date'], 'd/m/Y') ?>
                        </div>
                        <div class="col-6">
                            <strong>Livraison prévue:</strong><br>
                            <?php if ($purchase['expected_delivery_date']): ?>
                                <?= formatDate($purchase['expected_delivery_date'], 'd/m/Y') ?>
                            <?php else: ?>
                                <span class="text-muted">Non définie</span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <strong>Montant total:</strong><br>
                            <span class="h5 text-primary"><?= formatPrice($purchase['total_amount']) ?></span>
                        </div>
                        <div class="col-6">
                            <strong>Statut actuel:</strong><br>
                            <?php
                            $statusClass = [
                                'pending' => 'warning',
                                'confirmed' => 'info',
                                'partially_received' => 'primary',
                                'received' => 'success',
                                'cancelled' => 'danger'
                            ];
                            $statusLabels = [
                                'pending' => 'En attente',
                                'confirmed' => 'Confirmé',
                                'partially_received' => 'Partiellement reçu',
                                'received' => 'Reçu',
                                'cancelled' => 'Annulé'
                            ];
                            $class = $statusClass[$purchase['statut']] ?? 'secondary';
                            $label = $statusLabels[$purchase['statut']] ?? $purchase['statut'];
                            ?>
                            <span class="badge bg-<?= $class ?> fs-6"><?= $label ?></span>
                        </div>
                    </div>

                    <?php if ($purchase['actual_delivery_date']): ?>
                    <div class="row mb-3">
                        <div class="col-12">
                            <strong>Livraison effective:</strong><br>
                            <span class="text-success"><?= formatDate($purchase['actual_delivery_date'], 'd/m/Y') ?></span>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Guide des statuts -->
            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="card-title mb-0">Guide des Statuts</h5>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <span class="badge bg-warning me-2">En attente</span>
                        <small>Commande créée, en attente de confirmation</small>
                    </div>
                    <div class="mb-2">
                        <span class="badge bg-info me-2">Confirmé</span>
                        <small>Commande confirmée par le fournisseur</small>
                    </div>
                    <div class="mb-2">
                        <span class="badge bg-primary me-2">Partiellement reçu</span>
                        <small>Une partie des produits a été livrée</small>
                    </div>
                    <div class="mb-2">
                        <span class="badge bg-success me-2">Reçu</span>
                        <small>Tous les produits ont été livrés</small>
                    </div>
                    <div class="mb-0">
                        <span class="badge bg-danger me-2">Annulé</span>
                        <small>Commande annulée</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const statutSelect = document.getElementById('statut');
    const deliveryDateInput = document.getElementById('actual_delivery_date');
    
    // Auto-remplir la date de livraison si le statut est "received"
    statutSelect.addEventListener('change', function() {
        if (this.value === 'received' && !deliveryDateInput.value) {
            deliveryDateInput.value = new Date().toISOString().split('T')[0];
        }
    });
    
    // Validation du formulaire
    document.querySelector('form').addEventListener('submit', function(e) {
        const statut = statutSelect.value;
        const deliveryDate = deliveryDateInput.value;
        
        if (statut === 'received' && !deliveryDate) {
            e.preventDefault();
            alert('Veuillez renseigner la date de livraison effective pour le statut "Reçu".');
            deliveryDateInput.focus();
            return;
        }
        
        if (statut === 'cancelled') {
            if (!confirm('Êtes-vous sûr de vouloir annuler cet achat ? Cette action peut affecter les stocks.')) {
                e.preventDefault();
                return;
            }
        }
    });
});
</script>
