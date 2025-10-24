<?php
$pageTitle = 'Factures Créées';
include __DIR__ . '/../layouts/app-layout.php';
?>

<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Factures Créées</h1>
            <p class="text-muted mb-0">Factures générées via l'API</p>
        </div>
        <div>
            <a href="/sync/invoices" class="btn btn-warning me-2">
                <i class="bi bi-plus-circle me-1"></i>Créer Factures
            </a>
            <a href="/sync" class="btn btn-outline-primary">
                <i class="bi bi-arrow-left me-1"></i>Retour Sync
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
                           placeholder="Numéro vente, client, facture...">
                </div>
                <div class="col-md-3">
                    <label for="date_from" class="form-label">Du</label>
                    <input type="date" class="form-control" id="date_from" name="date_from" 
                           value="<?= htmlspecialchars($filters['date_from']) ?>">
                </div>
                <div class="col-md-3">
                    <label for="date_to" class="form-label">Au</label>
                    <input type="date" class="form-control" id="date_to" name="date_to" 
                           value="<?= htmlspecialchars($filters['date_to']) ?>">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-outline-primary me-2">
                        <i class="bi bi-search me-1"></i>Filtrer
                    </button>
                    <a href="/sync/factures" class="btn btn-outline-secondary">
                        <i class="bi bi-x-circle me-1"></i>Effacer
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Tableau des factures -->
    <div class="card">
        <div class="card-body">
            <?php if (empty($invoices)): ?>
                <div class="text-center py-5">
                    <i class="bi bi-receipt display-1 text-muted"></i>
                    <h4 class="mt-3">Aucune facture trouvée</h4>
                    <p class="text-muted">Aucune facture ne correspond aux critères sélectionnés.</p>
                    <a href="/sync/invoices" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i>Créer des factures
                    </a>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Vente</th>
                                <th>Client</th>
                                <th>Date</th>
                                <th>Montant</th>
                                <th>Facture API</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($invoices as $invoice): ?>
                                <tr>
                                    <td>
                                        <strong><?= htmlspecialchars($invoice['sale_number']) ?></strong>
                                    </td>
                                    <td>
                                        <div>
                                            <strong><?= htmlspecialchars($invoice['client_name']) ?></strong><br>
                                            <small class="text-muted"><?= htmlspecialchars($invoice['client_code']) ?></small>
                                        </div>
                                    </td>
                                    <td><?= formatDate($invoice['sale_date'], 'd/m/Y') ?></td>
                                    <td>
                                        <span class="badge bg-success"><?= formatPrice($invoice['total_amount']) ?></span>
                                    </td>
                                    <td>
                                        <?php if ($invoice['invoice_id']): ?>
                                            <code><?= htmlspecialchars($invoice['invoice_id']) ?></code>
                                        <?php else: ?>
                                            <span class="text-muted">-</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
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
                                        $class = $statusClass[$invoice['statut']] ?? 'secondary';
                                        $label = $statusLabels[$invoice['statut']] ?? $invoice['statut'];
                                        ?>
                                        <span class="badge bg-<?= $class ?>"><?= $label ?></span>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="/sync/facture/<?= $invoice['id_sale'] ?>/details" 
                                               class="btn btn-sm btn-outline-primary" title="Voir détails">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <?php if ($invoice['invoice_id']): ?>
                                                <a href="https://toure.gestiem.com/invoices/<?= $invoice['invoice_id'] ?>" 
                                                   target="_blank" class="btn btn-sm btn-outline-success" title="Voir sur l'API">
                                                    <i class="bi bi-box-arrow-up-right"></i>
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
                    <nav aria-label="Pagination des factures">
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
