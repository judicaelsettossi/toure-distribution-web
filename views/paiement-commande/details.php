<?php
$title = 'Détails du Paiement';
ob_start();
?>

<div class="container-fluid">
    <?php if ($paiement): ?>
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-1 text-dark">Détails du Paiement</h1>
                <p class="text-body"><?php echo htmlspecialchars($paiement['reference_paiement']); ?></p>
            </div>
            <div>
                <a href="/paiement-commande" class="btn btn-outline-secondary me-2">
                    <i class="bi bi-arrow-left me-2"></i>Retour à la liste
                </a>
                <a href="/paiement-commande/<?php echo $paiement['paiement_commande_id']; ?>/modifier" class="btn btn-warning me-2">
                    <i class="bi bi-pencil me-2"></i>Modifier
                </a>
                <button type="button" class="btn btn-danger" onclick="confirmDelete()">
                    <i class="bi bi-trash me-2"></i>Supprimer
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <!-- Informations du Paiement -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-credit-card me-2"></i>Informations du Paiement
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Référence du Paiement</label>
                                <div class="form-control-plaintext">
                                    <span class="badge bg-primary fs-6">
                                        <?php echo htmlspecialchars($paiement['reference_paiement']); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Montant</label>
                                <div class="form-control-plaintext">
                                    <span class="fs-5 text-success fw-bold">
                                        <?php echo number_format($paiement['montant'], 0, ',', ' '); ?> FCFA
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Mode de Paiement</label>
                                <div class="form-control-plaintext">
                                    <span class="badge bg-info fs-6">
                                        <?php echo ucfirst(str_replace('_', ' ', $paiement['mode_paiement'])); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Statut</label>
                                <div class="form-control-plaintext">
                                    <?php
                                    $statusClass = match($paiement['statut']) {
                                        'valide' => 'bg-success',
                                        'en_attente' => 'bg-warning',
                                        'refuse' => 'bg-danger',
                                        'annule' => 'bg-secondary',
                                        default => 'bg-secondary'
                                    };
                                    ?>
                                    <span class="badge <?php echo $statusClass; ?> fs-6">
                                        <?php echo ucfirst(str_replace('_', ' ', $paiement['statut'])); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Date de Paiement</label>
                                <div class="form-control-plaintext">
                                    <i class="bi bi-calendar-event me-2"></i>
                                    <?php echo date('d/m/Y à H:i', strtotime($paiement['date_paiement'])); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Date de Création</label>
                                <div class="form-control-plaintext">
                                    <i class="bi bi-clock me-2"></i>
                                    <?php echo date('d/m/Y à H:i', strtotime($paiement['created_at'])); ?>
                                </div>
                            </div>
                        </div>

                        <?php if (!empty($paiement['numero_transaction'])): ?>
                            <hr>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Numéro de Transaction</label>
                                    <div class="form-control-plaintext">
                                        <code><?php echo htmlspecialchars($paiement['numero_transaction']); ?></code>
                                    </div>
                                </div>
                                <?php if (!empty($paiement['numero_cheque'])): ?>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Numéro de Chèque</label>
                                        <div class="form-control-plaintext">
                                            <code><?php echo htmlspecialchars($paiement['numero_cheque']); ?></code>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($paiement['banque'])): ?>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Banque Émettrice</label>
                                        <div class="form-control-plaintext">
                                            <?php echo htmlspecialchars($paiement['banque']); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($paiement['note'])): ?>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label fw-bold">Notes</label>
                                    <div class="form-control-plaintext">
                                        <div class="alert alert-light">
                                            <?php echo nl2br(htmlspecialchars($paiement['note'])); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Informations de la Commande -->
                <?php if (isset($paiement['commande'])): ?>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi bi-cart-check me-2"></i>Commande Associée
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Numéro de Commande</label>
                                    <div class="form-control-plaintext">
                                        <a href="/commande/<?php echo $paiement['commande']['commande_id']; ?>" 
                                           class="text-decoration-none">
                                            <i class="bi bi-box-arrow-up-right me-2"></i>
                                            <?php echo htmlspecialchars($paiement['commande']['numero_commande']); ?>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Montant Total de la Commande</label>
                                    <div class="form-control-plaintext">
                                        <span class="fs-6">
                                            <?php echo number_format($paiement['commande']['montant'], 0, ',', ' '); ?> FCFA
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Montant Déjà Payé</label>
                                    <div class="form-control-plaintext">
                                        <span class="text-success">
                                            <?php echo number_format($paiement['commande']['montant_paye'] ?? 0, 0, ',', ' '); ?> FCFA
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Montant Restant</label>
                                    <div class="form-control-plaintext">
                                        <span class="text-warning fw-bold">
                                            <?php echo number_format($paiement['commande']['montant_restant'] ?? 0, 0, ',', ' '); ?> FCFA
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <?php if (isset($paiement['commande']['fournisseur'])): ?>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label fw-bold">Fournisseur</label>
                                        <div class="form-control-plaintext">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-building me-2"></i>
                                                <div>
                                                    <div class="fw-bold"><?php echo htmlspecialchars($paiement['commande']['fournisseur']['name']); ?></div>
                                                    <small class="text-muted"><?php echo htmlspecialchars($paiement['commande']['fournisseur']['code']); ?></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-lg-4">
                <!-- Actions Rapides -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-lightning me-2"></i>Actions Rapides
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="/commande/<?php echo $paiement['commande_id']; ?>" class="btn btn-outline-primary">
                                <i class="bi bi-eye me-2"></i>Voir la Commande
                            </a>
                            <a href="/commande/<?php echo $paiement['commande_id']; ?>/paiements" class="btn btn-outline-info">
                                <i class="bi bi-list-check me-2"></i>Voir tous les Paiements
                            </a>
                            <button type="button" class="btn btn-outline-success" onclick="window.print()">
                                <i class="bi bi-printer me-2"></i>Imprimer
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Statut du Paiement -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-info-circle me-2"></i>État du Paiement
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <?php if ($paiement['statut'] === 'valide'): ?>
                                <i class="bi bi-check-circle-fill text-success" style="font-size: 3rem;"></i>
                                <h5 class="mt-2 text-success">Paiement Validé</h5>
                                <p class="text-muted">Ce paiement a été confirmé et accepté.</p>
                            <?php elseif ($paiement['statut'] === 'en_attente'): ?>
                                <i class="bi bi-clock-fill text-warning" style="font-size: 3rem;"></i>
                                <h5 class="mt-2 text-warning">En Attente</h5>
                                <p class="text-muted">Ce paiement est en cours de validation.</p>
                            <?php elseif ($paiement['statut'] === 'refuse'): ?>
                                <i class="bi bi-x-circle-fill text-danger" style="font-size: 3rem;"></i>
                                <h5 class="mt-2 text-danger">Paiement Refusé</h5>
                                <p class="text-muted">Ce paiement a été rejeté.</p>
                            <?php else: ?>
                                <i class="bi bi-dash-circle-fill text-secondary" style="font-size: 3rem;"></i>
                                <h5 class="mt-2 text-secondary">Paiement Annulé</h5>
                                <p class="text-muted">Ce paiement a été annulé.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Informations Système -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-gear me-2"></i>Informations Système
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-2 small">
                            <div class="col-6"><strong>ID:</strong></div>
                            <div class="col-6"><code><?php echo substr($paiement['paiement_commande_id'], 0, 8); ?>...</code></div>
                            
                            <div class="col-6"><strong>Créé le:</strong></div>
                            <div class="col-6"><?php echo date('d/m/Y', strtotime($paiement['created_at'])); ?></div>
                            
                            <div class="col-6"><strong>Modifié le:</strong></div>
                            <div class="col-6"><?php echo date('d/m/Y', strtotime($paiement['updated_at'])); ?></div>
                        </div>
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

<script>
    function confirmDelete() {
        if (confirm('Êtes-vous sûr de vouloir supprimer ce paiement ? Cette action est irréversible.')) {
            window.location.href = '/paiement-commande/<?php echo $paiement['paiement_commande_id'] ?? ''; ?>/supprimer';
        }
    }
</script>

<style>
    .form-label {
        color: #5e6e82;
        font-size: 0.875rem;
    }

    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
    }

    .form-control-plaintext {
        padding: 0.375rem 0;
        margin-bottom: 0;
        line-height: 1.5;
        background-color: transparent;
        border: solid transparent;
        border-width: 1px 0;
    }

    .badge {
        font-size: 0.875rem;
    }

    .btn {
        border-radius: 0.375rem;
    }

    .alert-light {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        color: #495057;
    }

    code {
        background-color: #f8f9fa;
        padding: 0.25rem 0.5rem;
        border-radius: 0.25rem;
        font-size: 0.875rem;
    }

    @media print {
        .btn, .card-header, .d-print-none {
            display: none !important;
        }
        
        .container-fluid {
            max-width: none !important;
        }
    }
</style>

<?php
$content = ob_get_clean();
require './views/layouts/app-layout.php';
?>
