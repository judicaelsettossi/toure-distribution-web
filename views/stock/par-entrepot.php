<?php
$pageTitle = 'Stock par Entrepôt';
include __DIR__ . '/../layouts/app-layout.php';
?>

<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Stock par Entrepôt</h1>
            <p class="text-muted mb-0">Gestion des stocks par entrepôt</p>
        </div>
        <div>
            <a href="/stock/transfert" class="btn btn-primary me-2">
                <i class="bi bi-arrow-left-right me-1"></i>Transfert
            </a>
            <a href="/stock/par-produit" class="btn btn-outline-primary">
                <i class="bi bi-box me-1"></i>Vue par Produit
            </a>
        </div>
    </div>

    <?php if (isset($warehouse)): ?>
        <!-- Détail d'un entrepôt -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"><?= htmlspecialchars($warehouse['warehouse_name']) ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Localisation:</strong> <?= htmlspecialchars($warehouse['location']) ?>
                            </div>
                            <div class="col-md-6">
                                <strong>Capacité:</strong> <?= number_format($warehouse['capacity']) ?> unités
                            </div>
                        </div>
                        <?php if ($warehouse['phone']): ?>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <strong>Téléphone:</strong> <?= htmlspecialchars($warehouse['phone']) ?>
                                </div>
                                <div class="col-md-6">
                                    <strong>Email:</strong> <?= htmlspecialchars($warehouse['email']) ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stock de l'entrepôt -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Stock de l'entrepôt</h5>
            </div>
            <div class="card-body">
                <?php if (empty($stock)): ?>
                    <div class="text-center py-4">
                        <i class="bi bi-inbox display-4 text-muted"></i>
                        <p class="text-muted mt-2">Aucun stock dans cet entrepôt</p>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Produit</th>
                                    <th>Code</th>
                                    <th>Stock Actuel</th>
                                    <th>Réservé</th>
                                    <th>Disponible</th>
                                    <th>Stock Min</th>
                                    <th>Stock Max</th>
                                    <th>Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($stock as $item): ?>
                                    <tr>
                                        <td>
                                            <strong><?= htmlspecialchars($item['product_name']) ?></strong>
                                        </td>
                                        <td>
                                            <code><?= htmlspecialchars($item['product_code']) ?></code>
                                        </td>
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
                                        <td><?= number_format($item['min_stock_level']) ?></td>
                                        <td><?= number_format($item['max_stock_level']) ?></td>
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
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    <?php else: ?>
        <!-- Vue d'ensemble des entrepôts -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Vue d'ensemble des entrepôts</h5>
            </div>
            <div class="card-body">
                <?php if (empty($overview)): ?>
                    <div class="text-center py-4">
                        <i class="bi bi-building display-4 text-muted"></i>
                        <p class="text-muted mt-2">Aucun entrepôt trouvé</p>
                    </div>
                <?php else: ?>
                    <div class="row">
                        <?php foreach ($overview as $entrepot): ?>
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h6 class="card-title"><?= htmlspecialchars($entrepot['warehouse_name']) ?></h6>
                                        <p class="text-muted small"><?= htmlspecialchars($entrepot['location']) ?></p>
                                        
                                        <div class="row text-center">
                                            <div class="col-4">
                                                <div class="text-primary fw-bold"><?= number_format($entrepot['product_count']) ?></div>
                                                <small class="text-muted">Produits</small>
                                            </div>
                                            <div class="col-4">
                                                <div class="text-success fw-bold"><?= number_format($entrepot['total_available']) ?></div>
                                                <small class="text-muted">Disponible</small>
                                            </div>
                                            <div class="col-4">
                                                <div class="text-warning fw-bold"><?= number_format($entrepot['total_reserved']) ?></div>
                                                <small class="text-muted">Réservé</small>
                                            </div>
                                        </div>
                                        
                                        <div class="mt-3">
                                            <a href="/stock/par-entrepot/<?= $entrepot['id_warehouse'] ?>" class="btn btn-outline-primary btn-sm w-100">
                                                <i class="bi bi-eye me-1"></i>Voir le stock
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- Sélecteur d'entrepôt -->
    <?php if (isset($warehouses) && !empty($warehouses)): ?>
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Sélectionner un entrepôt</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php foreach ($warehouses as $w): ?>
                        <div class="col-md-3 mb-2">
                            <a href="/stock/par-entrepot/<?= $w['id_warehouse'] ?>" 
                               class="btn btn-outline-secondary w-100 <?= (isset($warehouse) && $warehouse['id_warehouse'] == $w['id_warehouse']) ? 'active' : '' ?>">
                                <?= htmlspecialchars($w['warehouse_name']) ?>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
