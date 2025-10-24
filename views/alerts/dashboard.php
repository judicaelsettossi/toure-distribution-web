<?php
$pageTitle = 'Dashboard Alertes';
include __DIR__ . '/../layouts/app-layout.php';
?>

<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Dashboard Alertes</h1>
            <p class="text-muted mb-0">Vue d'ensemble des alertes et mouvements de stock</p>
        </div>
        <div>
            <a href="/alerts/generer" class="btn btn-success me-2">
                <i class="bi bi-arrow-clockwise me-1"></i>Générer Alertes
            </a>
            <a href="/alerts/mouvements" class="btn btn-outline-primary me-2">
                <i class="bi bi-clock-history me-1"></i>Historique
            </a>
            <a href="/alerts/stock" class="btn btn-outline-warning">
                <i class="bi bi-exclamation-triangle me-1"></i>Alertes
            </a>
        </div>
    </div>

    <!-- Statistiques -->
    <div class="row mb-4">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="text-white-50 small">Total Alertes</div>
                            <div class="text-lg fw-bold"><?= number_format($stats['total_alerts']) ?></div>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-exclamation-triangle fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="text-white-50 small">Non Résolues</div>
                            <div class="text-lg fw-bold"><?= number_format($stats['unresolved_alerts']) ?></div>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-clock fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="text-white-50 small">Stock Faible</div>
                            <div class="text-lg fw-bold"><?= number_format($stats['low_stock_alerts']) ?></div>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-arrow-down-circle fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-dark">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="text-white-50 small">Rupture Stock</div>
                            <div class="text-lg fw-bold"><?= number_format($stats['out_of_stock_alerts']) ?></div>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-x-circle fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Alertes récentes -->
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Alertes Récentes</h5>
                    <a href="/alerts/stock" class="btn btn-sm btn-outline-primary">Voir toutes</a>
                </div>
                <div class="card-body">
                    <?php if (empty($recentAlerts)): ?>
                        <div class="text-center py-3">
                            <i class="bi bi-check-circle text-success fa-2x"></i>
                            <p class="text-muted mt-2 mb-0">Aucune alerte active</p>
                        </div>
                    <?php else: ?>
                        <div class="list-group list-group-flush">
                            <?php foreach ($recentAlerts as $alert): ?>
                                <div class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">
                                            <?= htmlspecialchars($alert['product_name']) ?>
                                            <small class="text-muted">(<?= htmlspecialchars($alert['product_code']) ?>)</small>
                                        </div>
                                        <small class="text-muted"><?= htmlspecialchars($alert['warehouse_name']) ?></small>
                                    </div>
                                    <div class="text-end">
                                        <?php
                                        $typeClass = [
                                            'low_stock' => 'warning',
                                            'out_of_stock' => 'danger',
                                            'overstock' => 'info'
                                        ];
                                        $typeLabels = [
                                            'low_stock' => 'Stock faible',
                                            'out_of_stock' => 'Rupture',
                                            'overstock' => 'Surstock'
                                        ];
                                        $class = $typeClass[$alert['alert_type']] ?? 'secondary';
                                        $label = $typeLabels[$alert['alert_type']] ?? $alert['alert_type'];
                                        ?>
                                        <span class="badge bg-<?= $class ?>"><?= $label ?></span>
                                        <br>
                                        <small class="text-muted"><?= formatDate($alert['created_at'], 'd/m H:i') ?></small>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Mouvements récents -->
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Mouvements Récents</h5>
                    <a href="/alerts/mouvements" class="btn btn-sm btn-outline-primary">Voir tous</a>
                </div>
                <div class="card-body">
                    <?php if (empty($recentMovements)): ?>
                        <div class="text-center py-3">
                            <i class="bi bi-clock-history text-muted fa-2x"></i>
                            <p class="text-muted mt-2 mb-0">Aucun mouvement récent</p>
                        </div>
                    <?php else: ?>
                        <div class="list-group list-group-flush">
                            <?php foreach ($recentMovements as $movement): ?>
                                <div class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">
                                            <?= htmlspecialchars($movement['product_name']) ?>
                                            <small class="text-muted">(<?= htmlspecialchars($movement['product_code']) ?>)</small>
                                        </div>
                                        <small class="text-muted"><?= htmlspecialchars($movement['warehouse_name']) ?></small>
                                    </div>
                                    <div class="text-end">
                                        <?php
                                        $quantity = (int)$movement['quantity_change'];
                                        $direction = $quantity > 0 ? 'in' : ($quantity < 0 ? 'out' : 'neutral');
                                        
                                        if ($direction === 'in') {
                                            $icon = 'bi-arrow-up-circle text-success';
                                            $sign = '+';
                                        } elseif ($direction === 'out') {
                                            $icon = 'bi-arrow-down-circle text-danger';
                                            $sign = '';
                                        } else {
                                            $icon = 'bi-dash-circle text-muted';
                                            $sign = '';
                                        }
                                        ?>
                                        <span class="<?= $icon ?>">
                                            <i class="bi <?= $icon ?>"></i>
                                            <?= $sign ?><?= number_format(abs($quantity)) ?>
                                        </span>
                                        <br>
                                        <small class="text-muted"><?= formatDate($movement['movement_date'], 'd/m H:i') ?></small>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Produits avec stock faible -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Produits avec Stock Faible</h5>
                    <a href="/stock/par-produit" class="btn btn-sm btn-outline-primary">Voir tous</a>
                </div>
                <div class="card-body">
                    <?php if (empty($lowStockProducts)): ?>
                        <div class="text-center py-3">
                            <i class="bi bi-check-circle text-success fa-2x"></i>
                            <p class="text-muted mt-2 mb-0">Tous les stocks sont suffisants</p>
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Produit</th>
                                        <th>Entrepôt</th>
                                        <th>Stock Actuel</th>
                                        <th>Stock Min</th>
                                        <th>Déficit</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($lowStockProducts as $product): ?>
                                        <tr>
                                            <td>
                                                <div>
                                                    <strong><?= htmlspecialchars($product['product_name']) ?></strong><br>
                                                    <code class="text-muted"><?= htmlspecialchars($product['product_code']) ?></code>
                                                </div>
                                            </td>
                                            <td><?= htmlspecialchars($product['warehouse_name']) ?></td>
                                            <td>
                                                <span class="badge bg-danger"><?= number_format($product['current_quantity']) ?></span>
                                            </td>
                                            <td>
                                                <span class="badge bg-light text-dark"><?= number_format($product['min_stock_level']) ?></span>
                                            </td>
                                            <td>
                                                <?php
                                                $deficit = $product['min_stock_level'] - $product['current_quantity'];
                                                if ($deficit > 0) {
                                                    echo '<span class="badge bg-warning">-' . number_format($deficit) . '</span>';
                                                } else {
                                                    echo '<span class="text-muted">-</span>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="/stock/par-produit/<?= $product['id_product'] ?>" 
                                                   class="btn btn-sm btn-outline-primary">
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
        </div>
    </div>
</div>
