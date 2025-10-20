<?php
$pageTitle = 'Détails du Transfert - ' . $transfer['transfer_number'];
include __DIR__ . '/../layouts/app-layout.php';
?>

<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Détails du Transfert</h1>
            <p class="text-muted mb-0"><?= htmlspecialchars($transfer['transfer_number']) ?></p>
        </div>
        <div>
            <a href="/stock/transferts" class="btn btn-outline-secondary me-2">
                <i class="bi bi-arrow-left me-1"></i>Retour à la liste
            </a>
            <?php if ($transfer['statut'] === 'pending'): ?>
                <a href="/stock/transfert/<?= $transfer['id_transfer'] ?>/confirmer" class="btn btn-success">
                    <i class="bi bi-check-circle me-1"></i>Confirmer le transfert
                </a>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <!-- Informations générales -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Informations du Transfert</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-6">
                            <strong>Numéro:</strong><br>
                            <span class="text-primary"><?= htmlspecialchars($transfer['transfer_number']) ?></span>
                        </div>
                        <div class="col-6">
                            <strong>Statut:</strong><br>
                            <?php
                            $statusClass = [
                                'pending' => 'warning',
                                'in_transit' => 'info',
                                'received' => 'success',
                                'cancelled' => 'danger'
                            ];
                            $statusLabels = [
                                'pending' => 'En attente',
                                'in_transit' => 'En transit',
                                'received' => 'Reçu',
                                'cancelled' => 'Annulé'
                            ];
                            $class = $statusClass[$transfer['statut']] ?? 'secondary';
                            $label = $statusLabels[$transfer['statut']] ?? $transfer['statut'];
                            ?>
                            <span class="badge bg-<?= $class ?> fs-6"><?= $label ?></span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <strong>Date de transfert:</strong><br>
                            <?= formatDate($transfer['transfer_date'], 'd/m/Y') ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <strong>De:</strong><br>
                            <span class="text-primary"><?= htmlspecialchars($transfer['from_warehouse']) ?></span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <strong>Vers:</strong><br>
                            <span class="text-success"><?= htmlspecialchars($transfer['to_warehouse']) ?></span>
                        </div>
                    </div>

                    <?php if ($transfer['notes']): ?>
                    <div class="row mb-3">
                        <div class="col-12">
                            <strong>Notes:</strong><br>
                            <p class="text-muted"><?= nl2br(htmlspecialchars($transfer['notes'])) ?></p>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-6">
                            <strong>Créé le:</strong><br>
                            <?= formatDate($transfer['created_at'], 'd/m/Y H:i') ?>
                        </div>
                        <div class="col-6">
                            <strong>Modifié le:</strong><br>
                            <?= formatDate($transfer['updated_at'], 'd/m/Y H:i') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Détails des produits -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Produits Transférés</h5>
                </div>
                <div class="card-body">
                    <?php if (empty($details)): ?>
                        <div class="text-center py-4">
                            <i class="bi bi-inbox display-4 text-muted"></i>
                            <p class="text-muted mt-2">Aucun produit dans ce transfert</p>
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Produit</th>
                                        <th>Code</th>
                                        <th>Quantité Envoyée</th>
                                        <th>Quantité Reçue</th>
                                        <th>Statut</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($details as $detail): ?>
                                        <tr>
                                            <td>
                                                <strong><?= htmlspecialchars($detail['product_name']) ?></strong>
                                            </td>
                                            <td>
                                                <code><?= htmlspecialchars($detail['product_code']) ?></code>
                                            </td>
                                            <td>
                                                <span class="badge bg-primary"><?= number_format($detail['quantity_sent']) ?></span>
                                                <?php if ($detail['unit_measure']): ?>
                                                    <small class="text-muted"><?= htmlspecialchars($detail['unit_measure']) ?></small>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($detail['quantity_received'] > 0): ?>
                                                    <span class="badge bg-success"><?= number_format($detail['quantity_received']) ?></span>
                                                <?php else: ?>
                                                    <span class="badge bg-warning">0</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php
                                                $sent = $detail['quantity_sent'];
                                                $received = $detail['quantity_received'];
                                                
                                                if ($received == 0) {
                                                    $statusClass = 'warning';
                                                    $statusText = 'En attente';
                                                } elseif ($received < $sent) {
                                                    $statusClass = 'info';
                                                    $statusText = 'Partiel';
                                                } elseif ($received == $sent) {
                                                    $statusClass = 'success';
                                                    $statusText = 'Complet';
                                                } else {
                                                    $statusClass = 'primary';
                                                    $statusText = 'Surplus';
                                                }
                                                ?>
                                                <span class="badge bg-<?= $statusClass ?>"><?= $statusText ?></span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr class="table-light">
                                        <th colspan="2">Total:</th>
                                        <th><?= number_format(array_sum(array_column($details, 'quantity_sent'))) ?></th>
                                        <th><?= number_format(array_sum(array_column($details, 'quantity_received'))) ?></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
