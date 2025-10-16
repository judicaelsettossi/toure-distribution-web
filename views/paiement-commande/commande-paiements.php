<?php
$title = 'Paiements de la Commande';
ob_start();
?>

<div class="container-fluid">
    <?php if ($commande): ?>
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-1 text-dark">Paiements de la Commande</h1>
                <p class="text-body"><?php echo htmlspecialchars($commande['numero_commande']); ?></p>
            </div>
            <div>
                <a href="/commande/<?php echo $commande['commande_id']; ?>" class="btn btn-outline-secondary me-2">
                    <i class="bi bi-arrow-left me-2"></i>Retour à la commande
                </a>
                <a href="/paiement-commande/creer?commande_id=<?php echo $commande['commande_id']; ?>" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-2"></i>Nouveau Paiement
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <!-- Résumé des Paiements -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-calculator me-2"></i>Résumé des Paiements
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="text-center">
                                    <div class="display-6 text-primary fw-bold">
                                        <?php echo number_format($commande['montant'], 0, ',', ' '); ?>
                                    </div>
                                    <div class="text-muted">Montant Total (FCFA)</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center">
                                    <div class="display-6 text-success fw-bold">
                                        <?php echo number_format($commande['montant_paye'] ?? 0, 0, ',', ' '); ?>
                                    </div>
                                    <div class="text-muted">Montant Payé (FCFA)</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center">
                                    <div class="display-6 text-warning fw-bold">
                                        <?php echo number_format($commande['montant_restant'] ?? 0, 0, ',', ' '); ?>
                                    </div>
                                    <div class="text-muted">Montant Restant (FCFA)</div>
                                </div>
                            </div>
                        </div>

                        <!-- Barre de progression -->
                        <div class="mt-4">
                            <div class="d-flex justify-content-between mb-1">
                                <span class="text-muted">Progression du paiement</span>
                                <span class="text-muted">
                                    <?php 
                                    $pourcentage = $commande['montant'] > 0 ? (($commande['montant_paye'] ?? 0) / $commande['montant']) * 100 : 0;
                                    echo number_format($pourcentage, 1); 
                                    ?>%
                                </span>
                            </div>
                            <div class="progress" style="height: 20px;">
                                <div class="progress-bar <?php echo $pourcentage >= 100 ? 'bg-success' : ($pourcentage > 0 ? 'bg-warning' : 'bg-secondary'); ?>" 
                                     role="progressbar" 
                                     style="width: <?php echo min($pourcentage, 100); ?>%"
                                     aria-valuenow="<?php echo $pourcentage; ?>" 
                                     aria-valuemin="0" 
                                     aria-valuemax="100">
                                    <?php echo number_format($pourcentage, 1); ?>%
                                </div>
                            </div>
                        </div>

                        <!-- Statut -->
                        <div class="mt-3 text-center">
                            <?php if (isset($commande['is_totalement_payee']) && $commande['is_totalement_payee']): ?>
                                <span class="badge bg-success fs-6">
                                    <i class="bi bi-check-circle me-2"></i>Commande Totalement Payée
                                </span>
                            <?php elseif (isset($commande['is_partiellement_payee']) && $commande['is_partiellement_payee']): ?>
                                <span class="badge bg-warning fs-6">
                                    <i class="bi bi-clock me-2"></i>Paiement Partiel
                                </span>
                            <?php else: ?>
                                <span class="badge bg-danger fs-6">
                                    <i class="bi bi-exclamation-circle me-2"></i>Aucun Paiement
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Liste des Paiements -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-list-ul me-2"></i>Historique des Paiements
                        </h5>
                    </div>
                    <div class="card-body p-0">
                        <?php if (!empty($paiements)): ?>
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Référence</th>
                                            <th>Montant</th>
                                            <th>Mode</th>
                                            <th>Statut</th>
                                            <th>Date</th>
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
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <div class="text-center py-5">
                                <i class="bi bi-credit-card display-1 text-muted"></i>
                                <h4 class="mt-3 text-muted">Aucun paiement enregistré</h4>
                                <p class="text-muted">Aucun paiement n'a encore été enregistré pour cette commande.</p>
                                <a href="/paiement-commande/creer?commande_id=<?php echo $commande['commande_id']; ?>" class="btn btn-primary">
                                    <i class="bi bi-plus-circle me-2"></i>Enregistrer un paiement
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Informations de la Commande -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-info-circle me-2"></i>Informations de la Commande
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col-6"><strong>Commande :</strong></div>
                            <div class="col-6">
                                <a href="/commande/<?php echo $commande['commande_id']; ?>" 
                                   class="text-decoration-none">
                                    <?php echo htmlspecialchars($commande['numero_commande']); ?>
                                </a>
                            </div>
                            
                            <div class="col-6"><strong>Montant total :</strong></div>
                            <div class="col-6"><?php echo number_format($commande['montant'], 0, ',', ' '); ?> FCFA</div>
                            
                            <div class="col-6"><strong>Paiements :</strong></div>
                            <div class="col-6"><?php echo count($paiements); ?> paiement(s)</div>
                            
                            <div class="col-6"><strong>Statut :</strong></div>
                            <div class="col-6">
                                <?php if (isset($commande['is_totalement_payee']) && $commande['is_totalement_payee']): ?>
                                    <span class="badge bg-success">Payée</span>
                                <?php elseif (isset($commande['is_partiellement_payee']) && $commande['is_partiellement_payee']): ?>
                                    <span class="badge bg-warning">Partielle</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">Impayée</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions Rapides -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-lightning me-2"></i>Actions Rapides
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="/commande/<?php echo $commande['commande_id']; ?>" class="btn btn-outline-primary">
                                <i class="bi bi-eye me-2"></i>Voir la Commande
                            </a>
                            <a href="/paiement-commande/creer?commande_id=<?php echo $commande['commande_id']; ?>" class="btn btn-success">
                                <i class="bi bi-plus-circle me-2"></i>Nouveau Paiement
                            </a>
                            <button type="button" class="btn btn-outline-secondary" onclick="window.print()">
                                <i class="bi bi-printer me-2"></i>Imprimer
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Statistiques -->
                <?php if (!empty($paiements)): ?>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi bi-bar-chart me-2"></i>Statistiques
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-2 small">
                                <?php
                                $paiementsValides = array_filter($paiements, fn($p) => $p['statut'] === 'valide');
                                $paiementsEnAttente = array_filter($paiements, fn($p) => $p['statut'] === 'en_attente');
                                $paiementsRefuses = array_filter($paiements, fn($p) => $p['statut'] === 'refuse');
                                
                                $totalValides = array_sum(array_column($paiementsValides, 'montant'));
                                $totalEnAttente = array_sum(array_column($paiementsEnAttente, 'montant'));
                                $totalRefuses = array_sum(array_column($paiementsRefuses, 'montant'));
                                ?>
                                
                                <div class="col-6"><strong>Validés :</strong></div>
                                <div class="col-6 text-success"><?php echo number_format($totalValides, 0, ',', ' '); ?> FCFA</div>
                                
                                <div class="col-6"><strong>En attente :</strong></div>
                                <div class="col-6 text-warning"><?php echo number_format($totalEnAttente, 0, ',', ' '); ?> FCFA</div>
                                
                                <div class="col-6"><strong>Refusés :</strong></div>
                                <div class="col-6 text-danger"><?php echo number_format($totalRefuses, 0, ',', ' '); ?> FCFA</div>
                                
                                <div class="col-6"><strong>Nombre total :</strong></div>
                                <div class="col-6"><?php echo count($paiements); ?> paiement(s)</div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    <?php else: ?>
        <!-- Commande non trouvée -->
        <div class="text-center py-5">
            <i class="bi bi-exclamation-triangle display-1 text-warning"></i>
            <h4 class="mt-3 text-warning">Commande non trouvée</h4>
            <p class="text-muted">La commande demandée n'existe pas ou a été supprimée.</p>
            <a href="/paiement-commande" class="btn btn-primary">
                <i class="bi bi-arrow-left me-2"></i>Retour à la liste des paiements
            </a>
        </div>
    <?php endif; ?>
</div>

<style>
    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
    }

    .badge {
        font-size: 0.875rem;
    }

    .btn-group .btn {
        border-radius: 0.375rem;
        margin-right: 2px;
    }

    .btn-group .btn:last-child {
        margin-right: 0;
    }

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

    .progress {
        background-color: #e9ecef;
    }

    .progress-bar {
        transition: width 0.6s ease;
    }

    .display-6 {
        font-size: 2rem;
    }

    @media print {
        .btn, .card-header, .d-print-none {
            display: none !important;
        }
        
        .container-fluid {
            max-width: none !important;
        }
    }
</style>

<?php
$content = ob_get_clean();
require './views/layouts/app-layout.php';
?>
