<?php
$pageTitle = 'Modifier Statut - ' . $sale['sale_number'];
include __DIR__ . '/../layouts/app-layout.php';
?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Modifier le statut</h1>
            <p class="text-muted mb-0"><?= htmlspecialchars($sale['sale_number']) ?></p>
        </div>
        <div>
            <a href="/vente/<?= $sale['id_sale'] ?>/details" class="btn btn-outline-secondary"><i class="bi bi-arrow-left me-1"></i>Retour</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label" for="statut">Statut</label>
                        <select class="form-select" id="statut" name="statut" required>
                            <?php $opts=['pending'=>'En attente','confirmed'=>'Confirmée','partially_delivered'=>'Partiellement livrée','delivered'=>'Livrée','cancelled'=>'Annulée','returned'=>'Retournée'];
                            foreach ($opts as $k=>$v): ?>
                                <option value="<?= $k ?>" <?= $sale['statut']===$k?'selected':'' ?>><?= $v ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="delivery_date">Date de livraison</label>
                        <input type="date" class="form-control" id="delivery_date" name="delivery_date" value="<?= htmlspecialchars($sale['delivery_date']) ?>">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="notes">Notes</label>
                        <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="Notes..."><?= htmlspecialchars($sale['notes']) ?></textarea>
                    </div>
                </div>

                <div class="text-end mt-4">
                    <a href="/vente/<?= $sale['id_sale'] ?>/details" class="btn btn-outline-secondary me-2"><i class="bi bi-x-circle me-1"></i>Annuler</a>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle me-1"></i>Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
</div>


