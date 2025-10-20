<?php
$pageTitle = 'Stock par Produit';
include __DIR__ . '/../layouts/app-layout.php';
?>

<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Stock par Produit</h1>
            <p class="text-muted mb-0">Gestion des stocks par produit</p>
        </div>
        <div>
            <a href="/stock/par-entrepot" class="btn btn-outline-primary me-2">
                <i class="bi bi-building me-1"></i>Vue par Entrepôt
            </a>
            <a href="/stock/transfert" class="btn btn-primary">
                <i class="bi bi-arrow-left-right me-1"></i>Transfert
            </a>
        </div>
    </div>

    <?php if (isset($product)): ?>
        <!-- Détail d'un produit -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"><?= htmlspecialchars($product['product_name']) ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Code:</strong> <code><?= htmlspecialchars($product['product_code']) ?></code>
                            </div>
                            <div class="col-md-6">
                                <strong>Prix unitaire:</strong> <?= formatPrice($product['unit_price']) ?>
                            </div>
                        </div>
                        <?php if ($product['description']): ?>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <strong>Description:</strong> <?= htmlspecialchars($product['description']) ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stock du produit dans tous les entrepôts -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Stock du produit dans les entrepôts</h5>
            </div>
            <div class="card-body">
                <?php if (empty($stock)): ?>
                    <div class="text-center py-4">
                        <i class="bi bi-inbox display-4 text-muted"></i>
                        <p class="text-muted mt-2">Aucun stock trouvé pour ce produit</p>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Entrepôt</th>
                                    <th>Localisation</th>
                                    <th>Stock Actuel</th>
                                    <th>Réservé</th>
                                    <th>Disponible</th>
                                    <th>Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($stock as $item): ?>
                                    <tr>
                                        <td>
                                            <strong><?= htmlspecialchars($item['warehouse_name']) ?></strong>
                                        </td>
                                        <td><?= htmlspecialchars($item['location']) ?></td>
                                        <td>
                                            <span class="badge bg-primary"><?= number_format($item['current_quantity']) ?></span>
                                            <?php if ($item['unit_measure']): ?>
                                                <small class="text-muted"><?= htmlspecialchars($item['unit_measure']) ?></small>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span class="badge bg-warning"><?= number_format($item['reserved_quantity']) ?></span>
                                        </td>
                                        <td>
                                            <span class="badge bg-success"><?= number_format($item['available_quantity']) ?></span>
                                        </td>
                                        <td>
                                            <?php
                                            $statusClass = [
                                                'low' => 'danger',
                                                'normal' => 'success',
                                                'high' => 'warning'
                                            ];
                                            $statusLabels = [
                                                'low' => 'Stock faible',
                                                'normal' => 'Normal',
                                                'high' => 'Stock élevé'
                                            ];
                                            $class = $statusClass[$item['stock_status']] ?? 'secondary';
                                            $label = $statusLabels[$item['stock_status']] ?? $item['stock_status'];
                                            ?>
                                            <span class="badge bg-<?= $class ?>"><?= $label ?></span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr class="table-light">
                                    <th colspan="2">Total</th>
                                    <th><?= number_format($totals['current']) ?></th>
                                    <th><?= number_format($totals['reserved']) ?></th>
                                    <th><?= number_format($totals['available']) ?></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    <?php else: ?>
        <!-- Vue d'ensemble des produits -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Vue d'ensemble des produits</h5>
            </div>
            <div class="card-body">
                <?php if (empty($overview)): ?>
                    <div class="text-center py-4">
                        <i class="bi bi-box display-4 text-muted"></i>
                        <p class="text-muted mt-2">Aucun produit trouvé</p>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Produit</th>
                                    <th>Code</th>
                                    <th>Unité</th>
                                    <th>Stock Total</th>
                                    <th>Réservé</th>
                                    <th>Disponible</th>
                                    <th>Entrepôts</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($overview as $item): ?>
                                    <tr>
                                        <td>
                                            <strong><?= htmlspecialchars($item['product_name']) ?></strong>
                                        </td>
                                        <td>
                                            <code><?= htmlspecialchars($item['product_code']) ?></code>
                                        </td>
                                        <td><?= htmlspecialchars($item['unit_measure']) ?></td>
                                        <td>
                                            <span class="badge bg-primary"><?= number_format($item['total_current']) ?></span>
                                        </td>
                                        <td>
                                            <span class="badge bg-warning"><?= number_format($item['total_reserved']) ?></span>
                                        </td>
                                        <td>
                                            <span class="badge bg-success"><?= number_format($item['total_available']) ?></span>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-dark"><?= $item['warehouse_count'] ?> entrepôt(s)</span>
                                        </td>
                                        <td>
                                            <?php
                                            $status = 'normal';
                                            if ($item['total_current'] <= $item['min_stock_level']) {
                                                $status = 'low';
                                            } elseif ($item['total_current'] >= $item['max_stock_level']) {
                                                $status = 'high';
                                            }
                                            
                                            $statusClass = [
                                                'low' => 'danger',
                                                'normal' => 'success',
                                                'high' => 'warning'
                                            ];
                                            $statusLabels = [
                                                'low' => 'Stock faible',
                                                'normal' => 'Normal',
                                                'high' => 'Stock élevé'
                                            ];
                                            $class = $statusClass[$status];
                                            $label = $statusLabels[$status];
                                            ?>
                                            <span class="badge bg-<?= $class ?>"><?= $label ?></span>
                                        </td>
                                        <td>
                                            <a href="/stock/par-produit/<?= $item['id_product'] ?>" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- Sélecteur de produit -->
    <?php if (isset($products) && !empty($products)): ?>
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Sélectionner un produit</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php foreach ($products as $p): ?>
                        <div class="col-md-3 mb-2">
                            <a href="/stock/par-produit/<?= $p['id_product'] ?>" 
                               class="btn btn-outline-secondary w-100 <?= (isset($product) && $product['id_product'] == $p['id_product']) ? 'active' : '' ?>">
                                <?= htmlspecialchars($p['product_name']) ?>
                                <br><small class="text-muted"><?= htmlspecialchars($p['product_code']) ?></small>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
