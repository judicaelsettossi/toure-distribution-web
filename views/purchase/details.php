<?php
$pageTitle = 'Détails de l\'Achat - ' . $purchase['purchase_number'];
include __DIR__ . '/../layouts/app-layout.php';
?>

<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Détails de l'Achat</h1>
            <p class="text-muted mb-0"><?= htmlspecialchars($purchase['purchase_number']) ?></p>
        </div>
        <div>
            <a href="/achats" class="btn btn-outline-secondary me-2">
                <i class="bi bi-arrow-left me-1"></i>Retour à la liste
            </a>
            <a href="/achat/<?= $purchase['id_purchase'] ?>/modifier-statut" class="btn btn-warning">
                <i class="bi bi-pencil me-1"></i>Modifier le statut
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Informations générales -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Informations Générales</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-6">
                            <strong>Numéro d'achat:</strong><br>
                            <span class="text-primary"><?= htmlspecialchars($purchase['purchase_number']) ?></span>
                        </div>
                        <div class="col-6">
                            <strong>Statut:</strong><br>
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

                    <?php if ($purchase['actual_delivery_date']): ?>
                    <div class="row mb-3">
                        <div class="col-12">
                            <strong>Livraison effective:</strong><br>
                            <span class="text-success"><?= formatDate($purchase['actual_delivery_date'], 'd/m/Y') ?></span>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="row mb-3">
                        <div class="col-12">
                            <strong>Montant total:</strong><br>
                            <span class="h5 text-primary"><?= formatPrice($purchase['total_amount']) ?></span>
                        </div>
                    </div>

                    <?php if ($purchase['paid_amount'] > 0): ?>
                    <div class="row mb-3">
                        <div class="col-12">
                            <strong>Montant payé:</strong><br>
                            <span class="text-success"><?= formatPrice($purchase['paid_amount']) ?></span>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if ($purchase['notes']): ?>
                    <div class="row mb-3">
                        <div class="col-12">
                            <strong>Notes:</strong><br>
                            <p class="text-muted"><?= nl2br(htmlspecialchars($purchase['notes'])) ?></p>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Informations fournisseur -->
            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="card-title mb-0">Fournisseur</h5>
                </div>
                <div class="card-body">
                    <h6><?= htmlspecialchars($purchase['supplier_name']) ?></h6>
                    <?php if ($purchase['contact_person']): ?>
                        <p class="mb-1"><strong>Contact:</strong> <?= htmlspecialchars($purchase['contact_person']) ?></p>
                    <?php endif; ?>
                    <?php if ($purchase['supplier_email']): ?>
                        <p class="mb-1"><strong>Email:</strong> <?= htmlspecialchars($purchase['supplier_email']) ?></p>
                    <?php endif; ?>
                    <?php if ($purchase['supplier_phone']): ?>
                        <p class="mb-1"><strong>Téléphone:</strong> <?= htmlspecialchars($purchase['supplier_phone']) ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Informations entrepôt -->
            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="card-title mb-0">Entrepôt de destination</h5>
                </div>
                <div class="card-body">
                    <h6><?= htmlspecialchars($purchase['warehouse_name']) ?></h6>
                    <?php if ($purchase['warehouse_location']): ?>
                        <p class="mb-0"><strong>Localisation:</strong> <?= htmlspecialchars($purchase['warehouse_location']) ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Détails des produits -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Détails des Produits</h5>
                </div>
                <div class="card-body">
                    <?php if (empty($details)): ?>
                        <div class="text-center py-4">
                            <i class="bi bi-inbox display-4 text-muted"></i>
                            <p class="text-muted mt-2">Aucun produit dans cet achat</p>
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Produit</th>
                                        <th>Code</th>
                                        <th>Quantité Commandée</th>
                                        <th>Quantité Reçue</th>
                                        <th>Prix Unitaire</th>
                                        <th>Total</th>
                                        <th>Statut</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($details as $detail): ?>
                                        <tr>
                                            <td>
                                                <strong><?= htmlspecialchars($detail['product_name']) ?></strong>
                                                <?php if ($detail['notes']): ?>
                                                    <br><small class="text-muted"><?= htmlspecialchars($detail['notes']) ?></small>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <code><?= htmlspecialchars($detail['product_code']) ?></code>
                                            </td>
                                            <td>
                                                <span class="badge bg-light text-dark"><?= $detail['quantity_ordered'] ?></span>
                                                <?php if ($detail['unit_measure']): ?>
                                                    <small class="text-muted"><?= htmlspecialchars($detail['unit_measure']) ?></small>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($detail['quantity_received'] > 0): ?>
                                                    <span class="badge bg-success"><?= $detail['quantity_received'] ?></span>
                                                <?php else: ?>
                                                    <span class="badge bg-warning">0</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= formatPrice($detail['unit_price']) ?></td>
                                            <td>
                                                <strong><?= formatPrice($detail['total_price']) ?></strong>
                                            </td>
                                            <td>
                                                <?php
                                                $received = $detail['quantity_received'];
                                                $ordered = $detail['quantity_ordered'];
                                                
                                                if ($received == 0) {
                                                    $statusClass = 'warning';
                                                    $statusText = 'En attente';
                                                } elseif ($received < $ordered) {
                                                    $statusClass = 'info';
                                                    $statusText = 'Partiel';
                                                } elseif ($received == $ordered) {
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
                                        <th colspan="5" class="text-end">Total:</th>
                                        <th><?= formatPrice($purchase['total_amount']) ?></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Historique des modifications -->
            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="card-title mb-0">Informations de Suivi</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Créé le:</strong><br>
                            <?= formatDate($purchase['created_at'], 'd/m/Y H:i') ?>
                        </div>
                        <div class="col-md-6">
                            <strong>Modifié le:</strong><br>
                            <?= formatDate($purchase['updated_at'], 'd/m/Y H:i') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
