<?php
$pageTitle = 'Liste des Transferts';
include __DIR__ . '/../layouts/app-layout.php';
?>

<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Liste des Transferts</h1>
            <p class="text-muted mb-0">Historique des transferts entre entrepôts</p>
        </div>
        <div>
            <a href="/stock/transfert" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>Nouveau Transfert
            </a>
        </div>
    </div>

    <!-- Filtres -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" class="row g-3">
                <div class="col-md-4">
                    <label for="search" class="form-label">Recherche</label>
                    <input type="text" class="form-control" id="search" name="search" 
                           value="<?= htmlspecialchars($filters['search']) ?>" 
                           placeholder="Numéro, notes...">
                </div>
                <div class="col-md-3">
                    <label for="statut" class="form-label">Statut</label>
                    <select class="form-select" id="statut" name="statut">
                        <option value="">Tous les statuts</option>
                        <option value="pending" <?= $filters['statut'] === 'pending' ? 'selected' : '' ?>>En attente</option>
                        <option value="in_transit" <?= $filters['statut'] === 'in_transit' ? 'selected' : '' ?>>En transit</option>
                        <option value="received" <?= $filters['statut'] === 'received' ? 'selected' : '' ?>>Reçu</option>
                        <option value="cancelled" <?= $filters['statut'] === 'cancelled' ? 'selected' : '' ?>>Annulé</option>
                    </select>
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-outline-primary me-2">
                        <i class="bi bi-search me-1"></i>Filtrer
                    </button>
                    <a href="/stock/transferts" class="btn btn-outline-secondary">
                        <i class="bi bi-x-circle me-1"></i>Effacer
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Tableau des transferts -->
    <div class="card">
        <div class="card-body">
            <?php if (empty($transfers)): ?>
                <div class="text-center py-5">
                    <i class="bi bi-inbox display-1 text-muted"></i>
                    <h4 class="mt-3">Aucun transfert trouvé</h4>
                    <p class="text-muted">Commencez par créer votre premier transfert.</p>
                    <a href="/stock/transfert" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i>Créer un transfert
                    </a>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Numéro</th>
                                <th>De</th>
                                <th>Vers</th>
                                <th>Date</th>
                                <th>Produits</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($transfers as $transfer): ?>
                                <tr>
                                    <td>
                                        <strong><?= htmlspecialchars($transfer['transfer_number']) ?></strong>
                                    </td>
                                    <td><?= htmlspecialchars($transfer['from_warehouse']) ?></td>
                                    <td><?= htmlspecialchars($transfer['to_warehouse']) ?></td>
                                    <td><?= formatDate($transfer['transfer_date'], 'd/m/Y') ?></td>
                                    <td>
                                        <span class="badge bg-light text-dark"><?= $transfer['product_count'] ?> produit(s)</span>
                                    </td>
                                    <td>
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
                                        <span class="badge bg-<?= $class ?>"><?= $label ?></span>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="/stock/transfert/<?= $transfer['id_transfer'] ?>/details" 
                                               class="btn btn-sm btn-outline-primary" title="Voir détails">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <?php if ($transfer['statut'] === 'pending'): ?>
                                                <a href="/stock/transfert/<?= $transfer['id_transfer'] ?>/confirmer" 
                                                   class="btn btn-sm btn-outline-success" title="Confirmer">
                                                    <i class="bi bi-check-circle"></i>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <?php if ($pagination['total_pages'] > 1): ?>
                    <nav aria-label="Pagination des transferts">
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
