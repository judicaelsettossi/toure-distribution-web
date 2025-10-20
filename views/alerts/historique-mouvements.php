<?php
$pageTitle = 'Historique des Mouvements';
include __DIR__ . '/../layouts/app-layout.php';
?>

<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Historique des Mouvements</h1>
            <p class="text-muted mb-0">Traçabilité des mouvements de stock</p>
        </div>
        <div>
            <a href="/alerts/stock" class="btn btn-outline-primary me-2">
                <i class="bi bi-exclamation-triangle me-1"></i>Alertes Stock
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
                    <label for="search" class="form-label">Recherche</label>
                    <input type="text" class="form-control" id="search" name="search" 
                           value="<?= htmlspecialchars($filters['search']) ?>" 
                           placeholder="Produit, raison...">
                </div>
                <div class="col-md-2">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-select" id="type" name="type">
                        <option value="">Tous les types</option>
                        <?php foreach ($movementTypes as $value => $label): ?>
                            <option value="<?= $value ?>" <?= $filters['type'] === $value ? 'selected' : '' ?>>
                                <?= $label ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-2">
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
                <div class="col-md-2">
                    <label for="product" class="form-label">Produit</label>
                    <select class="form-select" id="product" name="product">
                        <option value="">Tous les produits</option>
                        <?php foreach ($products as $product): ?>
                            <option value="<?= $product['id_product'] ?>" 
                                    <?= $filters['product'] == $product['id_product'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($product['product_name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-1">
                    <label for="date_from" class="form-label">Du</label>
                    <input type="date" class="form-control" id="date_from" name="date_from" 
                           value="<?= htmlspecialchars($filters['date_from']) ?>">
                </div>
                <div class="col-md-1">
                    <label for="date_to" class="form-label">Au</label>
                    <input type="date" class="form-control" id="date_to" name="date_to" 
                           value="<?= htmlspecialchars($filters['date_to']) ?>">
                </div>
                <div class="col-md-1 d-flex align-items-end">
                    <button type="submit" class="btn btn-outline-primary me-2">
                        <i class="bi bi-search me-1"></i>Filtrer
                    </button>
                    <a href="/alerts/mouvements" class="btn btn-outline-secondary">
                        <i class="bi bi-x-circle"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Tableau des mouvements -->
    <div class="card">
        <div class="card-body">
            <?php if (empty($movements)): ?>
                <div class="text-center py-5">
                    <i class="bi bi-clock-history display-1 text-muted"></i>
                    <h4 class="mt-3">Aucun mouvement trouvé</h4>
                    <p class="text-muted">Aucun mouvement de stock ne correspond aux critères sélectionnés.</p>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Produit</th>
                                <th>Entrepôt</th>
                                <th>Type</th>
                                <th>Quantité</th>
                                <th>Avant</th>
                                <th>Après</th>
                                <th>Raison</th>
                                <th>Référence</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($movements as $movement): ?>
                                <tr>
                                    <td>
                                        <small><?= formatDate($movement['movement_date'], 'd/m/Y H:i') ?></small>
                                    </td>
                                    <td>
                                        <div>
                                            <strong><?= htmlspecialchars($movement['product_name']) ?></strong><br>
                                            <code class="text-muted"><?= htmlspecialchars($movement['product_code']) ?></code>
                                        </div>
                                    </td>
                                    <td><?= htmlspecialchars($movement['warehouse_name']) ?></td>
                                    <td>
                                        <?php
                                        $typeLabels = [
                                            'purchase' => 'Achat',
                                            'sale' => 'Vente',
                                            'adjustment' => 'Ajustement',
                                            'transfer' => 'Transfert',
                                            'return' => 'Retour',
                                            'damage' => 'Dégât',
                                            'inventory' => 'Inventaire'
                                        ];
                                        $typeClass = [
                                            'purchase' => 'success',
                                            'sale' => 'danger',
                                            'adjustment' => 'info',
                                            'transfer' => 'primary',
                                            'return' => 'warning',
                                            'damage' => 'dark',
                                            'inventory' => 'secondary'
                                        ];
                                        $label = $typeLabels[$movement['movement_type']] ?? $movement['movement_type'];
                                        $class = $typeClass[$movement['movement_type']] ?? 'secondary';
                                        ?>
                                        <span class="badge bg-<?= $class ?>"><?= $label ?></span>
                                    </td>
                                    <td>
                                        <?php
                                        $quantity = (int)$movement['quantity_change'];
                                        $direction = $movement['movement_direction'];
                                        
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
                                        <?php if ($movement['unit_measure']): ?>
                                            <br><small class="text-muted"><?= htmlspecialchars($movement['unit_measure']) ?></small>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark"><?= number_format($movement['quantity_before']) ?></span>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary"><?= number_format($movement['quantity_after']) ?></span>
                                    </td>
                                    <td>
                                        <small><?= htmlspecialchars($movement['reason']) ?></small>
                                    </td>
                                    <td>
                                        <?php if ($movement['reference_id']): ?>
                                            <code><?= $movement['reference_type'] ?> #<?= $movement['reference_id'] ?></code>
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
                    <nav aria-label="Pagination des mouvements">
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
