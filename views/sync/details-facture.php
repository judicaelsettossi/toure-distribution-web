<?php
$pageTitle = 'Détails Facture - ' . $sale['sale_number'];
include __DIR__ . '/../layouts/app-layout.php';
?>

<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Détails de la Facture</h1>
            <p class="text-muted mb-0"><?= htmlspecialchars($sale['sale_number']) ?></p>
        </div>
        <div>
            <a href="/sync/factures" class="btn btn-outline-secondary me-2">
                <i class="bi bi-arrow-left me-1"></i>Retour à la liste
            </a>
            <?php if ($sale['invoice_id']): ?>
                <a href="https://toure.gestiem.com/invoices/<?= $sale['invoice_id'] ?>" 
                   target="_blank" class="btn btn-primary">
                    <i class="bi bi-box-arrow-up-right me-1"></i>Voir sur l'API
                </a>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <!-- Informations de la vente -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Informations de la Vente</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-6">
                            <strong>Numéro:</strong><br>
                            <span class="text-primary"><?= htmlspecialchars($sale['sale_number']) ?></span>
                        </div>
                        <div class="col-6">
                            <strong>Statut:</strong><br>
                            <?php
                            $statusClass = [
                                'pending' => 'warning',
                                'delivered' => 'success',
                                'cancelled' => 'danger'
                            ];
                            $statusLabels = [
                                'pending' => 'En attente',
                                'delivered' => 'Livrée',
                                'cancelled' => 'Annulée'
                            ];
                            $class = $statusClass[$sale['statut']] ?? 'secondary';
                            $label = $statusLabels[$sale['statut']] ?? $sale['statut'];
                            ?>
                            <span class="badge bg-<?= $class ?> fs-6"><?= $label ?></span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <strong>Date de vente:</strong><br>
                            <?= formatDate($sale['sale_date'], 'd/m/Y H:i') ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <strong>Montant total:</strong><br>
                            <span class="h5 text-success"><?= formatPrice($sale['total_amount']) ?></span>
                        </div>
                    </div>

                    <?php if ($sale['invoice_id']): ?>
                    <div class="row mb-3">
                        <div class="col-12">
                            <strong>ID Facture API:</strong><br>
                            <code><?= htmlspecialchars($sale['invoice_id']) ?></code>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if ($sale['notes']): ?>
                    <div class="row">
                        <div class="col-12">
                            <strong>Notes:</strong><br>
                            <p class="text-muted"><?= nl2br(htmlspecialchars($sale['notes'])) ?></p>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Informations du client -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Informations du Client</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-12">
                            <strong>Nom:</strong><br>
                            <span class="text-primary"><?= htmlspecialchars($sale['client_name']) ?></span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <strong>Code:</strong><br>
                            <code><?= htmlspecialchars($sale['client_code']) ?></code>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <strong>Informations client:</strong><br>
                            <small class="text-muted">
                                Code: <?= htmlspecialchars($sale['client_code']) ?>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Détails des produits -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Résumé</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-6">
                            <strong>Produits:</strong><br>
                            <span class="text-primary"><?= count($details) ?></span>
                        </div>
                        <div class="col-6">
                            <strong>Quantité totale:</strong><br>
                            <span class="text-primary"><?= number_format(array_sum(array_column($details, 'quantity'))) ?></span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <strong>Montant HT:</strong><br>
                            <span class="text-success"><?= formatPrice($sale['total_amount'] * 0.8) ?></span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <strong>TVA (20%):</strong><br>
                            <span class="text-warning"><?= formatPrice($sale['total_amount'] * 0.2) ?></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <strong>Total TTC:</strong><br>
                            <span class="h5 text-success"><?= formatPrice($sale['total_amount']) ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Détails des produits -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Détails des Produits</h5>
                </div>
                <div class="card-body">
                    <?php if (empty($details)): ?>
                        <div class="text-center py-4">
                            <i class="bi bi-inbox display-4 text-muted"></i>
                            <p class="text-muted mt-2">Aucun produit dans cette vente</p>
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Produit</th>
                                        <th>Code</th>
                                        <th>Quantité</th>
                                        <th>Prix unitaire</th>
                                        <th>Total</th>
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
                                                <span class="badge bg-primary"><?= number_format($detail['quantity']) ?></span>
                                                <?php if ($detail['unit_measure']): ?>
                                                    <br><small class="text-muted"><?= htmlspecialchars($detail['unit_measure']) ?></small>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= formatPrice($detail['unit_price']) ?></td>
                                            <td>
                                                <span class="badge bg-success"><?= formatPrice($detail['total_price']) ?></span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr class="table-light">
                                        <th colspan="4">Total</th>
                                        <th><?= formatPrice($sale['total_amount']) ?></th>
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
