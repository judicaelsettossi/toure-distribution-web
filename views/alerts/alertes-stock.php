<?php
$pageTitle = 'Alertes de Stock';
include __DIR__ . '/../layouts/app-layout.php';
?>

<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Alertes de Stock</h1>
            <p class="text-muted mb-0">Surveillance des niveaux de stock</p>
        </div>
        <div>
            <a href="/alerts/mouvements" class="btn btn-outline-primary me-2">
                <i class="bi bi-clock-history me-1"></i>Historique Mouvements
            </a>
            <a href="/alerts/generer" class="btn btn-success me-2">
                <i class="bi bi-arrow-clockwise me-1"></i>Générer Alertes
            </a>
            <a href="/alerts" class="btn btn-primary">
                <i class="bi bi-speedometer2 me-1"></i>Dashboard
            </a>
        </div>
    </div>

    <!-- Filtres -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" class="row g-3">
                <div class="col-md-3">
                    <label for="type" class="form-label">Type d'alerte</label>
                    <select class="form-select" id="type" name="type">
                        <option value="">Tous les types</option>
                        <?php foreach ($alertTypes as $value => $label): ?>
                            <option value="<?= $value ?>" <?= $filters['type'] === $value ? 'selected' : '' ?>>
                                <?= $label ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="warehouse" class="form-label">Entrepôt</label>
                    <select class="form-select" id="warehouse" name="warehouse">
                        <option value="">Tous les entrepôts</option>
                        <?php foreach ($warehouses as $warehouse): ?>
                            <option value="<?= $warehouse['id_warehouse'] ?>" 
                                    <?= $filters['warehouse'] == $warehouse['id_warehouse'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($warehouse['warehouse_name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="resolved" class="form-label">Statut</label>
                    <select class="form-select" id="resolved" name="resolved">
                        <option value="">Tous les statuts</option>
                        <option value="0" <?= $filters['resolved'] === '0' ? 'selected' : '' ?>>Non résolues</option>
                        <option value="1" <?= $filters['resolved'] === '1' ? 'selected' : '' ?>>Résolues</option>
                    </select>
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-outline-primary me-2">
                        <i class="bi bi-search me-1"></i>Filtrer
                    </button>
                    <a href="/alerts/stock" class="btn btn-outline-secondary">
                        <i class="bi bi-x-circle me-1"></i>Effacer
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Tableau des alertes -->
    <div class="card">
        <div class="card-body">
            <?php if (empty($alerts)): ?>
                <div class="text-center py-5">
                    <i class="bi bi-check-circle display-1 text-success"></i>
                    <h4 class="mt-3">Aucune alerte trouvée</h4>
                    <p class="text-muted">Toutes les alertes sont résolues ou aucun problème détecté.</p>
                    <a href="/alerts/generer" class="btn btn-primary">
                        <i class="bi bi-arrow-clockwise me-2"></i>Générer les alertes
                    </a>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Produit</th>
                                <th>Entrepôt</th>
                                <th>Stock Actuel</th>
                                <th>Seuil</th>
                                <th>Statut</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($alerts as $alert): ?>
                                <tr class="<?= $alert['is_resolved'] ? 'table-light' : '' ?>">
                                    <td>
                                        <?php
                                        $typeClass = [
                                            'low_stock' => 'warning',
                                            'out_of_stock' => 'danger',
                                            'overstock' => 'info',
                                            'expiry_soon' => 'secondary'
                                        ];
                                        $typeLabels = [
                                            'low_stock' => 'Stock faible',
                                            'out_of_stock' => 'Rupture',
                                            'overstock' => 'Surstock',
                                            'expiry_soon' => 'Péremption'
                                        ];
                                        $class = $typeClass[$alert['alert_type']] ?? 'secondary';
                                        $label = $typeLabels[$alert['alert_type']] ?? $alert['alert_type'];
                                        ?>
                                        <span class="badge bg-<?= $class ?>">
                                            <i class="bi bi-exclamation-triangle me-1"></i><?= $label ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div>
                                            <strong><?= htmlspecialchars($alert['product_name']) ?></strong><br>
                                            <code class="text-muted"><?= htmlspecialchars($alert['product_code']) ?></code>
                                        </div>
                                    </td>
                                    <td><?= htmlspecialchars($alert['warehouse_name']) ?></td>
                                    <td>
                                        <span class="badge bg-primary"><?= number_format($alert['current_quantity']) ?></span>
                                        <?php if ($alert['unit_measure']): ?>
                                            <br><small class="text-muted"><?= htmlspecialchars($alert['unit_measure']) ?></small>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark"><?= number_format($alert['threshold_quantity']) ?></span>
                                    </td>
                                    <td>
                                        <?php if ($alert['is_resolved']): ?>
                                            <span class="badge bg-success">
                                                <i class="bi bi-check-circle me-1"></i>Résolue
                                            </span>
                                        <?php else: ?>
                                            <span class="badge bg-warning">
                                                <i class="bi bi-clock me-1"></i>En attente
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <small>
                                            <?= formatDate($alert['created_at'], 'd/m/Y H:i') ?>
                                            <?php if ($alert['resolved_at']): ?>
                                                <br><span class="text-success">Résolue: <?= formatDate($alert['resolved_at'], 'd/m/Y H:i') ?></span>
                                            <?php endif; ?>
                                        </small>
                                    </td>
                                    <td>
                                        <?php if (!$alert['is_resolved']): ?>
                                            <a href="/alerts/<?= $alert['id_alert'] ?>/resoudre" 
                                               class="btn btn-sm btn-outline-success" 
                                               title="Marquer comme résolue"
                                               onclick="return confirm('Marquer cette alerte comme résolue ?')">
                                                <i class="bi bi-check-circle"></i>
                                            </a>
                                        <?php else: ?>
                                            <span class="text-muted">-</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <?php if ($pagination['total_pages'] > 1): ?>
                    <nav aria-label="Pagination des alertes">
                        <ul class="pagination justify-content-center">
                            <?php if ($pagination['current_page'] > 1): ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?= $pagination['current_page'] - 1 ?>&<?= http_build_query($filters) ?>">
                                        <i class="bi bi-chevron-left"></i>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php for ($i = max(1, $pagination['current_page'] - 2); $i <= min($pagination['total_pages'], $pagination['current_page'] + 2); $i++): ?>
                                <li class="page-item <?= $i === $pagination['current_page'] ? 'active' : '' ?>">
                                    <a class="page-link" href="?page=<?= $i ?>&<?= http_build_query($filters) ?>">
                                        <?= $i ?>
                                    </a>
                                </li>
                            <?php endfor; ?>

                            <?php if ($pagination['current_page'] < $pagination['total_pages']): ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?= $pagination['current_page'] + 1 ?>&<?= http_build_query($filters) ?>">
                                        <i class="bi bi-chevron-right"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
// Auto-submit du formulaire de filtres
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form[method="GET"]');
    const selects = form.querySelectorAll('select');
    
    selects.forEach(select => {
        select.addEventListener('change', function() {
            form.submit();
        });
    });
});
</script>
