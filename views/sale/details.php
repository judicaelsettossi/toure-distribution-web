<?php
$pageTitle = 'Vente - Détails ' . $sale['sale_number'];
include __DIR__ . '/../layouts/app-layout.php';
?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Détails de la vente</h1>
            <p class="text-muted mb-0"><?= htmlspecialchars($sale['sale_number']) ?></p>
        </div>
        <div>
            <a href="/ventes" class="btn btn-outline-secondary me-2"><i class="bi bi-arrow-left me-1"></i>Retour</a>
            <a href="/vente/<?= $sale['id_sale'] ?>/modifier-statut" class="btn btn-primary"><i class="bi bi-pencil me-1"></i>Modifier statut</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header"><h5 class="card-title mb-0">Informations</h5></div>
                <div class="card-body">
                    <div class="mb-3"><strong>Client:</strong><br><span class="text-primary"><?= htmlspecialchars($sale['client_name']) ?></span></div>
                    <div class="mb-3"><strong>Date de vente:</strong><br><?= formatDate($sale['sale_date'],'d/m/Y') ?></div>
                    <?php if ($sale['delivery_date']): ?>
                    <div class="mb-3"><strong>Date de livraison:</strong><br><?= formatDate($sale['delivery_date'],'d/m/Y') ?></div>
                    <?php endif; ?>
                    <div class="mb-3"><strong>Montant total:</strong><br><span class="h5 text-success"><?= formatPrice($sale['total_amount']) ?></span></div>
                    <div class="mb-3"><strong>Statut:</strong><br>
                        <?php $cls=['pending'=>'warning','confirmed'=>'info','partially_delivered'=>'secondary','delivered'=>'success','cancelled'=>'danger','returned'=>'dark'];
                        $lbl=['pending'=>'En attente','confirmed'=>'Confirmée','partially_delivered'=>'Partiellement livrée','delivered'=>'Livrée','cancelled'=>'Annulée','returned'=>'Retournée'];
                        $c=$cls[$sale['statut']]??'secondary'; $l=$lbl[$sale['statut']]??$sale['statut']; ?>
                        <span class="badge bg-<?= $c ?>"><?= $l ?></span>
                    </div>
                    <?php if ($sale['notes']): ?>
                    <div class="mb-0"><strong>Notes:</strong><br><small class="text-muted"><?= nl2br(htmlspecialchars($sale['notes'])) ?></small></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header"><h5 class="card-title mb-0">Articles</h5></div>
                <div class="card-body">
                    <?php if (empty($details)): ?>
                        <div class="text-center py-4">
                            <i class="bi bi-inbox display-4 text-muted"></i>
                            <p class="text-muted mt-2">Aucun article</p>
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Produit</th>
                                        <th>Code</th>
                                        <th>Qté commandée</th>
                                        <th>Qté livrée</th>
                                        <th>PU</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($details as $d): ?>
                                        <tr>
                                            <td><strong><?= htmlspecialchars($d['product_name']) ?></strong></td>
                                            <td><code><?= htmlspecialchars($d['product_code']) ?></code></td>
                                            <td><span class="badge bg-primary"><?= number_format($d['quantity_ordered']) ?></span></td>
                                            <td><span class="badge bg-success"><?= number_format($d['quantity_delivered'] ?? 0) ?></span></td>
                                            <td><?= formatPrice($d['unit_price']) ?></td>
                                            <td><span class="badge bg-success"><?= formatPrice($d['total_price']) ?></span></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr class="table-light">
                                        <th colspan="5">Total</th>
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


