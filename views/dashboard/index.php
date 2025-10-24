<?php
$pageTitle = 'Tableau de bord';
include __DIR__ . '/../layouts/app-layout.php';
?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Tableau de bord</h1>
            <p class="text-muted mb-0">Vue d'ensemble des ventes, achats, stocks et alertes</p>
        </div>
        <div>
            <a href="/sync" class="btn btn-outline-primary me-2"><i class="bi bi-cloud-arrow-down me-1"></i>Synchronisation</a>
            <a href="/alerts" class="btn btn-outline-warning"><i class="bi bi-exclamation-triangle me-1"></i>Alertes</a>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="text-white-50 small">Chiffre d'affaires</div>
                            <div class="text-lg fw-bold"><?= formatPrice($kpis['total_sales']) ?></div>
                        </div>
                        <div class="align-self-center"><i class="bi bi-cash fa-2x"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="text-white-50 small">Ventes en attente</div>
                            <div class="text-lg fw-bold"><?= number_format($kpis['pending_sales']) ?></div>
                        </div>
                        <div class="align-self-center"><i class="bi bi-hourglass fa-2x"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="text-white-50 small">Ventes livrées</div>
                            <div class="text-lg fw-bold"><?= number_format($kpis['delivered_sales']) ?></div>
                        </div>
                        <div class="align-self-center"><i class="bi bi-truck fa-2x"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="text-white-50 small">Alertes stock</div>
                            <div class="text-lg fw-bold"><?= number_format($kpis['low_stock']) ?></div>
                        </div>
                        <div class="align-self-center"><i class="bi bi-exclamation-triangle fa-2x"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Ventes récentes</h5>
                    <a href="/ventes" class="btn btn-sm btn-outline-primary">Voir toutes</a>
                </div>
                <div class="card-body">
                    <?php if (empty($recentSales)): ?>
                        <div class="text-center py-3"><i class="bi bi-inbox text-muted fa-2x"></i><p class="text-muted mt-2 mb-0">Aucune vente récente</p></div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead><tr><th>N°</th><th>Client</th><th>Date</th><th>Montant</th><th>Statut</th></tr></thead>
                                <tbody>
                                    <?php foreach ($recentSales as $s): ?>
                                        <tr>
                                            <td><a href="/vente/<?= $s['id_sale'] ?>/details" class="text-decoration-none"><?= htmlspecialchars($s['sale_number']) ?></a></td>
                                            <td><?= htmlspecialchars($s['client_name']) ?></td>
                                            <td><?= formatDate($s['sale_date'],'d/m/Y') ?></td>
                                            <td><?= formatPrice($s['total_amount']) ?></td>
                                            <td>
                                                <?php $cls=['pending'=>'warning','confirmed'=>'info','partially_delivered'=>'secondary','delivered'=>'success','cancelled'=>'danger','returned'=>'dark'];
                                                $c=$cls[$s['statut']]??'secondary'; ?>
                                                <span class="badge bg-<?= $c ?>"><?= htmlspecialchars($s['statut']) ?></span>
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
        <div class="col-lg-4 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Top stock</h5>
                    <a href="/stock/par-produit" class="btn btn-sm btn-outline-primary">Voir</a>
                </div>
                <div class="card-body">
                    <?php if (empty($stockOverview)): ?>
                        <div class="text-center py-3"><i class="bi bi-inbox text-muted fa-2x"></i><p class="text-muted mt-2 mb-0">Pas de données</p></div>
                    <?php else: ?>
                        <div class="list-group list-group-flush">
                            <?php foreach ($stockOverview as $st): ?>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="fw-bold"><?= htmlspecialchars($st['product_name']) ?></div>
                                        <small class="text-muted"><code><?= htmlspecialchars($st['product_code']) ?></code></small>
                                    </div>
                                    <span class="badge bg-light text-dark"><?= number_format($st['qty'] ?? 0) ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Achats récents</h5>
                    <a href="/achats" class="btn btn-sm btn-outline-primary">Voir tous</a>
                </div>
                <div class="card-body">
                    <?php if (empty($recentPurchases)): ?>
                        <div class="text-center py-3"><i class="bi bi-inbox text-muted fa-2x"></i><p class="text-muted mt-2 mb-0">Aucun achat récent</p></div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead><tr><th>N°</th><th>Fournisseur</th><th>Date</th><th>Montant</th><th>Statut</th></tr></thead>
                                <tbody>
                                    <?php foreach ($recentPurchases as $p): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($p['purchase_number']) ?></td>
                                            <td><?= htmlspecialchars($p['supplier_name']) ?></td>
                                            <td><?= htmlspecialchars($p['purchase_date']) ?></td>
                                            <td><?= formatPrice($p['total_amount']) ?></td>
                                            <td><span class="badge bg-secondary"><?= htmlspecialchars($p['statut']) ?></span></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Alertes récentes</h5>
                    <a href="/alerts/stock" class="btn btn-sm btn-outline-warning">Voir</a>
                </div>
                <div class="card-body">
                    <?php if (empty($alerts)): ?>
                        <div class="text-center py-3"><i class="bi bi-check-circle text-success fa-2x"></i><p class="text-muted mt-2 mb-0">Aucune alerte</p></div>
                    <?php else: ?>
                        <div class="list-group list-group-flush">
                            <?php foreach ($alerts as $a): ?>
                                <div class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold"><?= htmlspecialchars($a['product_name']) ?></div>
                                        <small class="text-muted"><?= htmlspecialchars($a['warehouse_name']) ?></small>
                                    </div>
                                    <?php $types=['low_stock'=>'warning','out_of_stock'=>'danger','overstock'=>'info']; $c=$types[$a['alert_type']]??'secondary'; ?>
                                    <span class="badge bg-<?= $c ?>"><?= htmlspecialchars($a['alert_type']) ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>


