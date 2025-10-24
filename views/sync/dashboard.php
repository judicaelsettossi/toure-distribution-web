<?php
$pageTitle = 'Synchronisation API';
include __DIR__ . '/../layouts/app-layout.php';
?>

<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Synchronisation API</h1>
            <p class="text-muted mb-0">Synchronisation avec l'API Toure Distribution</p>
        </div>
        <div>
            <a href="/sync/complete" class="btn btn-primary me-2">
                <i class="bi bi-arrow-clockwise me-1"></i>Synchronisation Complète
            </a>
            <a href="/sync/factures" class="btn btn-outline-primary">
                <i class="bi bi-receipt me-1"></i>Factures
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
                            <div class="text-white-50 small">Produits Locaux</div>
                            <div class="text-lg fw-bold"><?= number_format($stats['products_local']) ?></div>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-box fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="text-white-50 small">Produits API</div>
                            <div class="text-lg fw-bold"><?= number_format($stats['products_api']) ?></div>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-cloud fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="text-white-50 small">Clients Locaux</div>
                            <div class="text-lg fw-bold"><?= number_format($stats['clients_local']) ?></div>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-people fa-2x"></i>
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
                            <div class="text-white-50 small">Factures Créées</div>
                            <div class="text-lg fw-bold"><?= number_format($stats['invoices_created']) ?></div>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-receipt fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Actions de synchronisation -->
        <div class="col-lg-8 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Actions de Synchronisation</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="card border-primary">
                                <div class="card-body text-center">
                                    <i class="bi bi-box text-primary fa-3x mb-3"></i>
                                    <h5 class="card-title">Synchroniser Produits</h5>
                                    <p class="card-text">Importer et mettre à jour les produits depuis l'API</p>
                                    <a href="/sync/products" class="btn btn-primary" onclick="return confirm('Synchroniser les produits ?')">
                                        <i class="bi bi-arrow-down-circle me-1"></i>Lancer la sync
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <div class="card border-success">
                                <div class="card-body text-center">
                                    <i class="bi bi-people text-success fa-3x mb-3"></i>
                                    <h5 class="card-title">Synchroniser Clients</h5>
                                    <p class="card-text">Importer et mettre à jour les clients depuis l'API</p>
                                    <a href="/sync/clients" class="btn btn-success" onclick="return confirm('Synchroniser les clients ?')">
                                        <i class="bi bi-arrow-down-circle me-1"></i>Lancer la sync
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <div class="card border-warning">
                                <div class="card-body text-center">
                                    <i class="bi bi-receipt text-warning fa-3x mb-3"></i>
                                    <h5 class="card-title">Créer Factures</h5>
                                    <p class="card-text">Créer les factures pour les ventes livrées</p>
                                    <a href="/sync/invoices" class="btn btn-warning" onclick="return confirm('Créer les factures ?')">
                                        <i class="bi bi-plus-circle me-1"></i>Créer factures
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <div class="card border-info">
                                <div class="card-body text-center">
                                    <i class="bi bi-arrow-clockwise text-info fa-3x mb-3"></i>
                                    <h5 class="card-title">Sync Complète</h5>
                                    <p class="card-text">Synchronisation complète de tous les éléments</p>
                                    <a href="/sync/complete" class="btn btn-info" onclick="return confirm('Lancer la synchronisation complète ?')">
                                        <i class="bi bi-arrow-clockwise me-1"></i>Sync complète
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informations de synchronisation -->
        <div class="col-lg-4 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Informations</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Dernière synchronisation:</strong><br>
                        <small class="text-muted">
                            <?= $stats['last_sync'] ? formatDate($stats['last_sync'], 'd/m/Y H:i') : 'Jamais' ?>
                        </small>
                    </div>
                    
                    <div class="mb-3">
                        <strong>API Status:</strong><br>
                        <span class="badge bg-success">
                            <i class="bi bi-check-circle me-1"></i>Connectée
                        </span>
                    </div>
                    
                    <div class="mb-3">
                        <strong>Base de données:</strong><br>
                        <span class="badge bg-success">
                            <i class="bi bi-check-circle me-1"></i>Opérationnelle
                        </span>
                    </div>
                    
                    <hr>
                    
                    <h6>Actions rapides</h6>
                    <div class="d-grid gap-2">
                        <a href="/sync/factures" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-receipt me-1"></i>Voir les factures
                        </a>
                        <a href="/alerts" class="btn btn-outline-warning btn-sm">
                            <i class="bi bi-exclamation-triangle me-1"></i>Alertes
                        </a>
                        <a href="/stock" class="btn btn-outline-info btn-sm">
                            <i class="bi bi-box me-1"></i>Gestion stock
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Historique des synchronisations -->
    <?php if (!empty($recentSyncs)): ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Historique des Synchronisations</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Éléments</th>
                                    <th>Dernière sync</th>
                                    <th>Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recentSyncs as $sync): ?>
                                    <tr>
                                        <td>
                                            <?php if ($sync['type'] === 'products'): ?>
                                                <i class="bi bi-box text-primary me-1"></i>Produits
                                            <?php else: ?>
                                                <i class="bi bi-people text-success me-1"></i>Clients
                                            <?php endif; ?>
                                        </td>
                                        <td><?= number_format($sync['count']) ?> éléments</td>
                                        <td><?= formatDate($sync['last_sync'], 'd/m/Y H:i') ?></td>
                                        <td>
                                            <span class="badge bg-success">
                                                <i class="bi bi-check-circle me-1"></i>À jour
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
