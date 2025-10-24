<?php
$pageTitle = 'Résultat Synchronisation';
include __DIR__ . '/../layouts/app-layout.php';
?>

<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Résultat de la Synchronisation</h1>
            <p class="text-muted mb-0">Résumé des opérations effectuées</p>
        </div>
        <div>
            <a href="/sync" class="btn btn-outline-primary me-2">
                <i class="bi bi-arrow-left me-1"></i>Retour au Dashboard
            </a>
            <a href="/sync/factures" class="btn btn-primary">
                <i class="bi bi-receipt me-1"></i>Voir les Factures
            </a>
        </div>
    </div>

    <!-- Résultats -->
    <div class="row">
        <!-- Produits -->
        <div class="col-lg-4 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Produits</h5>
                    <i class="bi bi-box text-primary fa-2x"></i>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6">
                            <div class="text-success fw-bold fs-3"><?= $results['products']['imported'] ?></div>
                            <small class="text-muted">Importés</small>
                        </div>
                        <div class="col-6">
                            <div class="text-info fw-bold fs-3"><?= $results['products']['updated'] ?></div>
                            <small class="text-muted">Mis à jour</small>
                        </div>
                    </div>
                    
                    <?php if ($results['products']['errors'] > 0): ?>
                        <div class="mt-3">
                            <div class="alert alert-warning">
                                <i class="bi bi-exclamation-triangle me-1"></i>
                                <?= $results['products']['errors'] ?> erreur(s) rencontrée(s)
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="mt-3">
                            <div class="alert alert-success">
                                <i class="bi bi-check-circle me-1"></i>
                                Synchronisation réussie
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Clients -->
        <div class="col-lg-4 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Clients</h5>
                    <i class="bi bi-people text-success fa-2x"></i>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6">
                            <div class="text-success fw-bold fs-3"><?= $results['clients']['imported'] ?></div>
                            <small class="text-muted">Importés</small>
                        </div>
                        <div class="col-6">
                            <div class="text-info fw-bold fs-3"><?= $results['clients']['updated'] ?></div>
                            <small class="text-muted">Mis à jour</small>
                        </div>
                    </div>
                    
                    <?php if ($results['clients']['errors'] > 0): ?>
                        <div class="mt-3">
                            <div class="alert alert-warning">
                                <i class="bi bi-exclamation-triangle me-1"></i>
                                <?= $results['clients']['errors'] ?> erreur(s) rencontrée(s)
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="mt-3">
                            <div class="alert alert-success">
                                <i class="bi bi-check-circle me-1"></i>
                                Synchronisation réussie
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Factures -->
        <div class="col-lg-4 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Factures</h5>
                    <i class="bi bi-receipt text-warning fa-2x"></i>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-12">
                            <div class="text-success fw-bold fs-3"><?= $results['invoices']['created'] ?></div>
                            <small class="text-muted">Créées</small>
                        </div>
                    </div>
                    
                    <?php if ($results['invoices']['errors'] > 0): ?>
                        <div class="mt-3">
                            <div class="alert alert-warning">
                                <i class="bi bi-exclamation-triangle me-1"></i>
                                <?= $results['invoices']['errors'] ?> erreur(s) rencontrée(s)
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="mt-3">
                            <div class="alert alert-success">
                                <i class="bi bi-check-circle me-1"></i>
                                Création réussie
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Actions suivantes -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Actions Suivantes</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <div class="d-grid">
                                <a href="/sync/factures" class="btn btn-outline-primary">
                                    <i class="bi bi-receipt me-2"></i>Voir les Factures
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="d-grid">
                                <a href="/stock" class="btn btn-outline-info">
                                    <i class="bi bi-box me-2"></i>Gestion Stock
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="d-grid">
                                <a href="/alerts" class="btn btn-outline-warning">
                                    <i class="bi bi-exclamation-triangle me-2"></i>Alertes
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="d-grid">
                                <a href="/sync" class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-left me-2"></i>Dashboard Sync
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Détails techniques -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Détails Techniques</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Informations de synchronisation</h6>
                            <ul class="list-unstyled">
                                <li><strong>Date:</strong> <?= date('d/m/Y H:i:s') ?></li>
                                <li><strong>Durée:</strong> < 1 minute</li>
                                <li><strong>API:</strong> Toure Distribution</li>
                                <li><strong>Base de données:</strong> MySQL Local</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6>Statut des services</h6>
                            <ul class="list-unstyled">
                                <li>
                                    <i class="bi bi-check-circle text-success me-1"></i>
                                    API Toure Distribution
                                </li>
                                <li>
                                    <i class="bi bi-check-circle text-success me-1"></i>
                                    Base de données locale
                                </li>
                                <li>
                                    <i class="bi bi-check-circle text-success me-1"></i>
                                    Système de fichiers
                                </li>
                                <li>
                                    <i class="bi bi-check-circle text-success me-1"></i>
                                    Logs d'application
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
