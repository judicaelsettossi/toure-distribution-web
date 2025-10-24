<?php
$pageTitle = 'Créer une Vente';
include __DIR__ . '/../layouts/app-layout.php';
?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Créer une vente</h1>
            <p class="text-muted mb-0">Sélectionnez le client, l'entrepôt et les produits</p>
        </div>
        <div>
            <a href="/ventes" class="btn btn-outline-secondary"><i class="bi bi-arrow-left me-1"></i>Retour</a>
        </div>
    </div>

    <form method="POST" id="saleForm">
        <input type="hidden" name="csrf_token" value="<?= csrfTokenEnsure(); ?>">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header"><h5 class="card-title mb-0">Informations</h5></div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Client <span class="text-danger">*</span></label>
                            <select class="form-select" name="client_api_id" id="client_api_id" required>
                                <option value="">Sélectionner un client</option>
                                <?php foreach ($clients as $c): ?>
                                    <option value="<?= htmlspecialchars($c['id']) ?>">
                                        <?= htmlspecialchars($c['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <input type="hidden" name="client_name" id="client_name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Entrepôt <span class="text-danger">*</span></label>
                            <select class="form-select" name="warehouse_id" id="warehouse_id" required>
                                <option value="">Sélectionner un entrepôt</option>
                                <?php foreach ($warehouses as $w): ?>
                                    <option value="<?= $w['id_warehouse'] ?>"><?= htmlspecialchars($w['warehouse_name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date de vente <span class="text-danger">*</span></label>
                            <input class="form-control" type="date" name="sale_date" value="<?= date('Y-m-d') ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date de livraison</label>
                            <input class="form-control" type="date" name="delivery_date">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Notes</label>
                            <textarea class="form-control" name="notes" rows="3" placeholder="Notes sur la vente..."></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Produits</h5>
                        <button type="button" class="btn btn-sm btn-primary" id="addProduct"><i class="bi bi-plus-circle me-1"></i>Ajouter</button>
                    </div>
                    <div class="card-body">
                        <div id="productsContainer"></div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="d-grid">
                                    <button type="button" class="btn btn-outline-primary" id="addProduct2"><i class="bi bi-plus-circle me-1"></i>Ajouter un autre produit</button>
                                </div>
                            </div>
                            <div class="col-md-6 text-end">
                                <h6>Total: <span id="totalAmount">0</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-end">
                        <a href="/ventes" class="btn btn-outline-secondary me-2"><i class="bi bi-x-circle me-1"></i>Annuler</a>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle me-1"></i>Enregistrer</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<template id="productTemplate">
    <div class="product-row border rounded p-3 mb-3">
        <div class="row g-3 align-items-end">
            <div class="col-md-5">
                <label class="form-label">Produit <span class="text-danger">*</span></label>
                <select class="form-select product-select" name="products[INDEX][product_id]" required>
                    <option value="">Sélectionner un produit</option>
                    <?php foreach ($products as $p): ?>
                        <option value="<?= $p['id_product'] ?>" data-price="<?= (float)$p['unit_price'] ?>">
                            <?= htmlspecialchars($p['product_name']) ?> (<?= htmlspecialchars($p['product_code']) ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
                <small class="text-muted stock-hint"></small>
            </div>
            <div class="col-md-2">
                <label class="form-label">Quantité <span class="text-danger">*</span></label>
                <input type="number" class="form-control quantity-input" name="products[INDEX][quantity]" value="1" min="1" required>
            </div>
            <div class="col-md-2">
                <label class="form-label">PU</label>
                <input type="number" class="form-control unit-price-input" name="products[INDEX][unit_price]" step="0.01" min="0" value="0">
            </div>
            <div class="col-md-2">
                <label class="form-label">Total</label>
                <input type="text" class="form-control total-line" readonly>
            </div>
            <div class="col-md-1">
                <div class="d-grid">
                    <button type="button" class="btn btn-outline-danger remove-product"><i class="bi bi-trash"></i></button>
                </div>
            </div>
        </div>
    </div>
    
</template>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const clientSelect = document.getElementById('client_api_id');
    const clientName = document.getElementById('client_name');
    const productsContainer = document.getElementById('productsContainer');
    const productTemplate = document.getElementById('productTemplate');
    const addProductBtn = document.getElementById('addProduct');
    const addProductBtn2 = document.getElementById('addProduct2');
    const totalAmountEl = document.getElementById('totalAmount');
    const warehouseSelect = document.getElementById('warehouse_id');

    clientSelect.addEventListener('change', function() {
        const label = this.options[this.selectedIndex]?.text || '';
        clientName.value = label.trim();
    });

    function addProduct() {
        const index = document.querySelectorAll('.product-row').length;
        const html = productTemplate.innerHTML.replace(/INDEX/g, index);
        productsContainer.insertAdjacentHTML('beforeend', html);
        const row = productsContainer.lastElementChild;
        hookRow(row);
        updateTotals();
    }

    function hookRow(row) {
        const productSelect = row.querySelector('.product-select');
        const qtyInput = row.querySelector('.quantity-input');
        const unitPriceInput = row.querySelector('.unit-price-input');
        const totalLine = row.querySelector('.total-line');
        const stockHint = row.querySelector('.stock-hint');
        const removeBtn = row.querySelector('.remove-product');

        function updateLine() {
            const q = parseFloat(qtyInput.value || '0');
            const up = parseFloat(unitPriceInput.value || '0');
            totalLine.value = (q * up).toFixed(2);
            updateTotals();
        }

        function updateUnitPriceFromProduct() {
            const price = parseFloat(productSelect.selectedOptions[0]?.dataset.price || '0');
            if (price > 0) {
                unitPriceInput.value = price.toFixed(2);
            }
            updateLine();
        }

        function checkStock() {
            stockHint.textContent = '';
            const productId = productSelect.value;
            const warehouseId = warehouseSelect.value;
            const qty = parseInt(qtyInput.value || '0');
            if (!productId || !warehouseId || qty <= 0) return;
            stockHint.textContent = 'Vérification du stock...';
            // Placeholder: côté serveur, la vérification se fait dans le contrôleur
            setTimeout(() => {
                stockHint.textContent = 'Stock vérifié côté serveur lors de la soumission.';
            }, 300);
        }

        productSelect.addEventListener('change', () => { updateUnitPriceFromProduct(); checkStock(); });
        qtyInput.addEventListener('input', () => { updateLine(); checkStock(); });
        unitPriceInput.addEventListener('input', updateLine);
        removeBtn.addEventListener('click', () => { row.remove(); updateTotals(); });

        updateUnitPriceFromProduct();
    }

    function updateTotals() {
        let total = 0;
        document.querySelectorAll('.product-row').forEach(row => {
            const val = parseFloat(row.querySelector('.total-line').value || '0');
            total += val;
        });
        totalAmountEl.textContent = new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'XOF' }).format(total);
    }

    addProductBtn.addEventListener('click', addProduct);
    addProductBtn2?.addEventListener('click', addProduct);
    addProduct();
});
</script>


