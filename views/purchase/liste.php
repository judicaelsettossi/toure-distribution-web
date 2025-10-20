<?php
$pageTitle = 'Liste des Achats';
include __DIR__ . '/../layouts/app-layout.php';
?>

<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Gestion des Achats</h1>
            <p class="text-muted mb-0">Liste et gestion des achats fournisseurs</p>
        </div>
        <div>
            <a href="/achat/creer" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>Nouvel Achat
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
                           placeholder="Numéro, fournisseur, notes...">
                </div>
                <div class="col-md-2">
                    <label for="statut" class="form-label">Statut</label>
                    <select class="form-select" id="statut" name="statut">
                        <option value="">Tous les statuts</option>
                        <option value="pending" <?= $filters['statut'] === 'pending' ? 'selected' : '' ?>>En attente</option>
                        <option value="confirmed" <?= $filters['statut'] === 'confirmed' ? 'selected' : '' ?>>Confirmé</option>
                        <option value="partially_received" <?= $filters['statut'] === 'partially_received' ? 'selected' : '' ?>>Partiellement reçu</option>
                        <option value="received" <?= $filters['statut'] === 'received' ? 'selected' : '' ?>>Reçu</option>
                        <option value="cancelled" <?= $filters['statut'] === 'cancelled' ? 'selected' : '' ?>>Annulé</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="supplier" class="form-label">Fournisseur</label>
                    <select class="form-select" id="supplier" name="supplier">
                        <option value="">Tous les fournisseurs</option>
                        <?php foreach ($suppliers as $supplier): ?>
                            <option value="<?= $supplier['id_supplier'] ?>" 
                                    <?= $filters['supplier'] == $supplier['id_supplier'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($supplier['supplier_name']) ?>
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
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-outline-primary me-2">
                        <i class="bi bi-search me-1"></i>Filtrer
                    </button>
                    <a href="/achats" class="btn btn-outline-secondary">
                        <i class="bi bi-x-circle me-1"></i>Effacer
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Tableau des achats -->
    <div class="card">
        <div class="card-body">
            <?php if (empty($purchases)): ?>
                <div class="text-center py-5">
                    <i class="bi bi-inbox display-1 text-muted"></i>
                    <h4 class="mt-3">Aucun achat trouvé</h4>
                    <p class="text-muted">Commencez par créer votre premier achat.</p>
                    <a href="/achat/creer" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i>Créer un achat
                    </a>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Numéro</th>
                                <th>Fournisseur</th>
                                <th>Entrepôt</th>
                                <th>Date Achat</th>
                                <th>Livraison Prévue</th>
                                <th>Montant Total</th>
                                <th>Statut</th>
                                <th>Articles</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($purchases as $purchase): ?>
                                <tr>
                                    <td>
                                        <strong><?= htmlspecialchars($purchase['purchase_number']) ?></strong>
                                    </td>
                                    <td><?= htmlspecialchars($purchase['supplier_name']) ?></td>
                                    <td><?= htmlspecialchars($purchase['warehouse_name']) ?></td>
                                    <td><?= formatDate($purchase['purchase_date'], 'd/m/Y') ?></td>
                                    <td>
                                        <?php if ($purchase['expected_delivery_date']): ?>
                                            <?= formatDate($purchase['expected_delivery_date'], 'd/m/Y') ?>
                                        <?php else: ?>
                                            <span class="text-muted">-</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <strong><?= formatPrice($purchase['total_amount']) ?></strong>
                                        <?php if ($purchase['paid_amount'] > 0): ?>
                                            <br><small class="text-success">
                                                Payé: <?= formatPrice($purchase['paid_amount']) ?>
                                            </small>
                                        <?php endif; ?>
                                    </td>
                                    <td>
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
                                        <span class="badge bg-<?= $class ?>"><?= $label ?></span>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark"><?= $purchase['item_count'] ?> article(s)</span>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="/achat/<?= $purchase['id_purchase'] ?>/details" 
                                               class="btn btn-sm btn-outline-primary" title="Voir détails">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="/achat/<?= $purchase['id_purchase'] ?>/modifier-statut" 
                                               class="btn btn-sm btn-outline-warning" title="Modifier statut">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <?php if ($pagination['total_pages'] > 1): ?>
                    <nav aria-label="Pagination des achats">
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
