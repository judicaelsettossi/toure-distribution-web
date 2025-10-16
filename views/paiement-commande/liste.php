<?php
$title = 'Liste des Paiements';
ob_start();
?>

<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1 text-dark">Gestion des Paiements</h1>
            <p class="text-body">Liste de tous les paiements de commandes</p>
        </div>
        <div>
            <a href="/paiement-commande/creer" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>Nouveau Paiement
            </a>
        </div>
    </div>

    <!-- Filtres -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-title mb-0">
                <i class="bi bi-funnel me-2"></i>Filtres de Recherche
            </h5>
        </div>
        <div class="card-body">
            <form method="GET" action="/paiement-commande" id="filtersForm">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="search" class="form-label">Recherche</label>
                        <input type="text" class="form-control" id="search" name="search" 
                               value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>" 
                               placeholder="Référence de paiement...">
                    </div>
                    <div class="col-md-3">
                        <label for="commande_id" class="form-label">Commande</label>
                        <select class="form-select" id="commande_id" name="commande_id">
                            <option value="">Toutes les commandes</option>
                            <?php foreach ($commandes as $commande): ?>
                                <option value="<?php echo $commande['commande_id']; ?>" 
                                        <?php echo (($_GET['commande_id'] ?? '') === $commande['commande_id']) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($commande['numero_commande']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="statut" class="form-label">Statut</label>
                        <select class="form-select" id="statut" name="statut">
                            <option value="">Tous les statuts</option>
                            <option value="en_attente" <?php echo (($_GET['statut'] ?? '') === 'en_attente') ? 'selected' : ''; ?>>En attente</option>
                            <option value="valide" <?php echo (($_GET['statut'] ?? '') === 'valide') ? 'selected' : ''; ?>>Validé</option>
                            <option value="refuse" <?php echo (($_GET['statut'] ?? '') === 'refuse') ? 'selected' : ''; ?>>Refusé</option>
                            <option value="annule" <?php echo (($_GET['statut'] ?? '') === 'annule') ? 'selected' : ''; ?>>Annulé</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="mode_paiement" class="form-label">Mode de Paiement</label>
                        <select class="form-select" id="mode_paiement" name="mode_paiement">
                            <option value="">Tous les modes</option>
                            <option value="especes" <?php echo (($_GET['mode_paiement'] ?? '') === 'especes') ? 'selected' : ''; ?>>Espèces</option>
                            <option value="cheque" <?php echo (($_GET['mode_paiement'] ?? '') === 'cheque') ? 'selected' : ''; ?>>Chèque</option>
                            <option value="virement" <?php echo (($_GET['mode_paiement'] ?? '') === 'virement') ? 'selected' : ''; ?>>Virement</option>
                            <option value="carte_bancaire" <?php echo (($_GET['mode_paiement'] ?? '') === 'carte_bancaire') ? 'selected' : ''; ?>>Carte bancaire</option>
                            <option value="mobile_money" <?php echo (($_GET['mode_paiement'] ?? '') === 'mobile_money') ? 'selected' : ''; ?>>Mobile Money</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="per_page" class="form-label">Par page</label>
                        <select class="form-select" id="per_page" name="per_page">
                            <option value="15" <?php echo (($_GET['per_page'] ?? '15') === '15') ? 'selected' : ''; ?>>15</option>
                            <option value="25" <?php echo (($_GET['per_page'] ?? '15') === '25') ? 'selected' : ''; ?>>25</option>
                            <option value="50" <?php echo (($_GET['per_page'] ?? '15') === '50') ? 'selected' : ''; ?>>50</option>
                        </select>
                    </div>
                </div>
                <div class="row g-3 mt-2">
                    <div class="col-md-3">
                        <label for="date_debut" class="form-label">Date de début</label>
                        <input type="date" class="form-control" id="date_debut" name="date_debut" 
                               value="<?php echo htmlspecialchars($_GET['date_debut'] ?? ''); ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="date_fin" class="form-label">Date de fin</label>
                        <input type="date" class="form-control" id="date_fin" name="date_fin" 
                               value="<?php echo htmlspecialchars($_GET['date_fin'] ?? ''); ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="montant_min" class="form-label">Montant minimum</label>
                        <input type="number" class="form-control" id="montant_min" name="montant_min" 
                               value="<?php echo htmlspecialchars($_GET['montant_min'] ?? ''); ?>" 
                               placeholder="0" step="0.01">
                    </div>
                    <div class="col-md-3">
                        <label for="montant_max" class="form-label">Montant maximum</label>
                        <input type="number" class="form-control" id="montant_max" name="montant_max" 
                               value="<?php echo htmlspecialchars($_GET['montant_max'] ?? ''); ?>" 
                               placeholder="0" step="0.01">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary me-2">
                            <i class="bi bi-search me-2"></i>Rechercher
                        </button>
                        <a href="/paiement-commande" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-clockwise me-2"></i>Réinitialiser
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Résultats -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">
                <i class="bi bi-list-ul me-2"></i>Liste des Paiements
            </h5>
            <div class="text-muted">
                <?php if ($pagination['total'] > 0): ?>
                    Affichage de <?php echo $pagination['from']; ?> à <?php echo $pagination['to']; ?> 
                    sur <?php echo $pagination['total']; ?> paiement(s)
                <?php else: ?>
                    Aucun paiement trouvé
                <?php endif; ?>
            </div>
        </div>
        <div class="card-body p-0">
            <?php if (!empty($paiements)): ?>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Référence</th>
                                <th>Commande</th>
                                <th>Montant</th>
                                <th>Mode de Paiement</th>
                                <th>Statut</th>
                                <th>Date de Paiement</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($paiements as $paiement): ?>
                                <tr>
                                    <td>
                                        <span class="fw-bold text-primary">
                                            <?php echo htmlspecialchars($paiement['reference_paiement']); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="/commande/<?php echo $paiement['commande_id']; ?>" 
                                           class="text-decoration-none">
                                            <?php echo htmlspecialchars($paiement['commande']['numero_commande']); ?>
                                        </a>
                                    </td>
                                    <td>
                                        <span class="fw-bold text-success">
                                            <?php echo number_format($paiement['montant'], 0, ',', ' '); ?> FCFA
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-info">
                                            <?php echo ucfirst(str_replace('_', ' ', $paiement['mode_paiement'])); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php
                                        $statusClass = match($paiement['statut']) {
                                            'valide' => 'bg-success',
                                            'en_attente' => 'bg-warning',
                                            'refuse' => 'bg-danger',
                                            'annule' => 'bg-secondary',
                                            default => 'bg-secondary'
                                        };
                                        ?>
                                        <span class="badge <?php echo $statusClass; ?>">
                                            <?php echo ucfirst(str_replace('_', ' ', $paiement['statut'])); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php echo date('d/m/Y H:i', strtotime($paiement['date_paiement'])); ?>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="/paiement-commande/<?php echo $paiement['paiement_commande_id']; ?>" 
                                               class="btn btn-sm btn-outline-primary" title="Voir détails">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="/paiement-commande/<?php echo $paiement['paiement_commande_id']; ?>/modifier" 
                                               class="btn btn-sm btn-outline-warning" title="Modifier">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="/commande/<?php echo $paiement['commande_id']; ?>/paiements" 
                                               class="btn btn-sm btn-outline-info" title="Voir paiements de la commande">
                                                <i class="bi bi-list-check"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <?php if ($pagination['last_page'] > 1): ?>
                    <div class="card-footer">
                        <nav aria-label="Pagination des paiements">
                            <ul class="pagination justify-content-center mb-0">
                                <!-- Page précédente -->
                                <?php if ($pagination['current_page'] > 1): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?<?php echo http_build_query(array_merge($_GET, ['page' => $pagination['current_page'] - 1])); ?>">
                                            <i class="bi bi-chevron-left"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <!-- Pages -->
                                <?php
                                $start = max(1, $pagination['current_page'] - 2);
                                $end = min($pagination['last_page'], $pagination['current_page'] + 2);
                                ?>

                                <?php for ($i = $start; $i <= $end; $i++): ?>
                                    <li class="page-item <?php echo $i === $pagination['current_page'] ? 'active' : ''; ?>">
                                        <a class="page-link" href="?<?php echo http_build_query(array_merge($_GET, ['page' => $i])); ?>">
                                            <?php echo $i; ?>
                                        </a>
                                    </li>
                                <?php endfor; ?>

                                <!-- Page suivante -->
                                <?php if ($pagination['current_page'] < $pagination['last_page']): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?<?php echo http_build_query(array_merge($_GET, ['page' => $pagination['current_page'] + 1])); ?>">
                                            <i class="bi bi-chevron-right"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="text-center py-5">
                    <i class="bi bi-credit-card display-1 text-muted"></i>
                    <h4 class="mt-3 text-muted">Aucun paiement trouvé</h4>
                    <p class="text-muted">Aucun paiement ne correspond aux critères de recherche.</p>
                    <a href="/paiement-commande/creer" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i>Créer un nouveau paiement
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
    .table th {
        border-top: none;
        font-weight: 600;
        color: #5e6e82;
        font-size: 0.875rem;
    }

    .table td {
        vertical-align: middle;
        font-size: 0.875rem;
    }

    .badge {
        font-size: 0.75rem;
    }

    .btn-group .btn {
        border-radius: 0.375rem;
        margin-right: 2px;
    }

    .btn-group .btn:last-child {
        margin-right: 0;
    }

    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
    }

    .form-label {
        font-weight: 600;
        color: #5e6e82;
        font-size: 0.875rem;
    }

    .pagination .page-link {
        color: #6c757d;
        border-color: #dee2e6;
    }

    .pagination .page-item.active .page-link {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }

    .pagination .page-link:hover {
        color: #0d6efd;
        background-color: #e9ecef;
        border-color: #dee2e6;
    }
</style>

<?php
$content = ob_get_clean();
require './views/layouts/app-layout.php';
?>
