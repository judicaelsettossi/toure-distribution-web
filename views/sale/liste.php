<?php
$pageTitle = 'Ventes - Liste';
include __DIR__ . '/../layouts/app-layout.php';
?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Ventes</h1>
            <p class="text-muted mb-0">Liste des ventes enregistrées</p>
        </div>
        <div>
            <a href="/vente/creer" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i>Nouvelle vente
            </a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" class="row g-3">
                <div class="col-md-5">
                    <label class="form-label" for="search">Recherche</label>
                    <input type="text" class="form-control" id="search" name="search" value="<?= htmlspecialchars($filters['search']) ?>" placeholder="N° vente, client, notes...">
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="statut">Statut</label>
                    <select class="form-select" id="statut" name="statut">
                        <option value="">Tous</option>
                        <?php $opts = ['pending'=>'En attente','confirmed'=>'Confirmée','partially_delivered'=>'Partiellement livrée','delivered'=>'Livrée','cancelled'=>'Annulée','returned'=>'Retournée'];
                        foreach ($opts as $k=>$v): ?>
                            <option value="<?= $k ?>" <?= $filters['statut']===$k?'selected':'' ?>><?= $v ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-outline-primary me-2">
                        <i class="bi bi-search me-1"></i>Filtrer
                    </button>
                    <a href="/ventes" class="btn btn-outline-secondary">
                        <i class="bi bi-x-circle me-1"></i>Effacer
                    </a>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <?php if (empty($ventes)): ?>
                <div class="text-center py-5">
                    <i class="bi bi-inbox display-1 text-muted"></i>
                    <h4 class="mt-3">Aucune vente trouvée</h4>
                    <p class="text-muted">Créez votre première vente pour commencer.</p>
                    <a href="/vente/creer" class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i>Nouvelle vente</a>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Client</th>
                                <th>Date</th>
                                <th>Montant</th>
                                <th>Articles</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ventes as $v): ?>
                                <tr>
                                    <td><strong><?= htmlspecialchars($v['sale_number']) ?></strong></td>
                                    <td><?= htmlspecialchars($v['client_name']) ?></td>
                                    <td><?= formatDate($v['sale_date'], 'd/m/Y') ?></td>
                                    <td><span class="badge bg-success"><?= formatPrice($v['total_amount']) ?></span></td>
                                    <td><span class="badge bg-light text-dark"><?= (int)$v['item_count'] ?></span></td>
                                    <td>
                                        <?php $cls=['pending'=>'warning','confirmed'=>'info','partially_delivered'=>'secondary','delivered'=>'success','cancelled'=>'danger','returned'=>'dark'];
                                        $lbl=['pending'=>'En attente','confirmed'=>'Confirmée','partially_delivered'=>'Part. livrée','delivered'=>'Livrée','cancelled'=>'Annulée','returned'=>'Retournée'];
                                        $c=$cls[$v['statut']]??'secondary'; $l=$lbl[$v['statut']]??$v['statut']; ?>
                                        <span class="badge bg-<?= $c ?>"><?= $l ?></span>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-sm btn-outline-primary" href="/vente/<?= $v['id_sale'] ?>/details"><i class="bi bi-eye"></i></a>
                                            <a class="btn btn-sm btn-outline-secondary" href="/vente/<?= $v['id_sale'] ?>/modifier-statut"><i class="bi bi-pencil"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <?php if ($pagination['total_pages'] > 1): ?>
                    <nav aria-label="Pagination">
                        <ul class="pagination justify-content-center">
                            <?php if ($pagination['current_page'] > 1): ?>
                                <li class="page-item"><a class="page-link" href="?page=<?= $pagination['current_page']-1 ?>&<?= http_build_query($filters) ?>"><i class="bi bi-chevron-left"></i></a></li>
                            <?php endif; ?>
                            <?php for ($i=max(1,$pagination['current_page']-2); $i<=min($pagination['total_pages'],$pagination['current_page']+2); $i++): ?>
                                <li class="page-item <?= $i===$pagination['current_page']?'active':'' ?>">
                                    <a class="page-link" href="?page=<?= $i ?>&<?= http_build_query($filters) ?>"><?= $i ?></a>
                                </li>
                            <?php endfor; ?>
                            <?php if ($pagination['current_page'] < $pagination['total_pages']): ?>
                                <li class="page-item"><a class="page-link" href="?page=<?= $pagination['current_page']+1 ?>&<?= http_build_query($filters) ?>"><i class="bi bi-chevron-right"></i></a></li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>


