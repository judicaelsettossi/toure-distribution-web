<?php
$pageTitle = 'Créer un Achat';
include __DIR__ . '/../layouts/app-layout.php';
?>

<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Créer un Achat</h1>
            <p class="text-muted mb-0">Nouvel achat fournisseur</p>
        </div>
        <div>
            <a href="/achats" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>Retour à la liste
            </a>
        </div>
    </div>

    <form method="POST" id="purchaseForm">
        <div class="row">
            <!-- Informations générales -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Informations Générales</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="supplier_id" class="form-label">Fournisseur <span class="text-danger">*</span></label>
                            <select class="form-select" id="supplier_id" name="supplier_id" required>
                                <option value="">Sélectionner un fournisseur</option>
                                <?php foreach ($suppliers as $supplier): ?>
                                    <option value="<?= $supplier['id_supplier'] ?>">
                                        <?= htmlspecialchars($supplier['supplier_name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="warehouse_id" class="form-label">Entrepôt de destination <span class="text-danger">*</span></label>
                            <select class="form-select" id="warehouse_id" name="warehouse_id" required>
                                <option value="">Sélectionner un entrepôt</option>
                                <?php foreach ($warehouses as $warehouse): ?>
                                    <option value="<?= $warehouse['id_warehouse'] ?>">
                                        <?= htmlspecialchars($warehouse['warehouse_name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="purchase_date" class="form-label">Date d'achat <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="purchase_date" name="purchase_date" 
                                   value="<?= date('Y-m-d') ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="expected_delivery_date" class="form-label">Date de livraison prévue</label>
                            <input type="date" class="form-control" id="expected_delivery_date" name="expected_delivery_date">
                        </div>

                        <div class="mb-3">
                            <label for="notes" class="form-label">Notes</label>
                            <textarea class="form-control" id="notes" name="notes" rows="3" 
                                      placeholder="Notes additionnelles..."></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Produits -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Produits</h5>
                        <button type="button" class="btn btn-sm btn-primary" id="addProduct">
                            <i class="bi bi-plus-circle me-1"></i>Ajouter un produit
                        </button>
                    </div>
                    <div class="card-body">
                        <div id="productsContainer">
                            <!-- Les produits seront ajoutés dynamiquement -->
                        </div>
                        
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="d-grid">
                                    <button type="button" class="btn btn-outline-primary" id="addProduct">
                                        <i class="bi bi-plus-circle me-2"></i>Ajouter un autre produit
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-end">
                                    <h5>Total: <span id="totalAmount">0 FCFA</span></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-end">
                        <a href="/achats" class="btn btn-outline-secondary me-2">
                            <i class="bi bi-x-circle me-1"></i>Annuler
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-1"></i>Créer l'achat
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Template pour un produit -->
<template id="productTemplate">
    <div class="product-row border rounded p-3 mb-3">
        <div class="row">
            <div class="col-md-4">
                <label class="form-label">Produit <span class="text-danger">*</span></label>
                <select class="form-select product-select" name="products[INDEX][product_id]" required>
                    <option value="">Sélectionner un produit</option>
                    <?php foreach ($products as $product): ?>
                        <option value="<?= $product['id_product'] ?>" 
                                data-price="<?= $product['cost_price'] ?>"
                                data-unit="<?= htmlspecialchars($product['unit_measure']) ?>">
                            <?= htmlspecialchars($product['product_name']) ?> 
                            (<?= htmlspecialchars($product['product_code']) ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Quantité <span class="text-danger">*</span></label>
                <input type="number" class="form-control quantity-input" name="products[INDEX][quantity]" 
                       min="1" value="1" required>
            </div>
            <div class="col-md-2">
                <label class="form-label">Prix unitaire <span class="text-danger">*</span></label>
                <input type="number" class="form-control price-input" name="products[INDEX][unit_price]" 
                       step="0.01" min="0" required>
            </div>
            <div class="col-md-2">
                <label class="form-label">Total</label>
                <input type="text" class="form-control total-input" readonly>
            </div>
            <div class="col-md-2">
                <label class="form-label">&nbsp;</label>
                <div class="d-grid">
                    <button type="button" class="btn btn-outline-danger remove-product">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <label class="form-label">Notes produit</label>
                <input type="text" class="form-control" name="products[INDEX][notes]" 
                       placeholder="Notes spécifiques à ce produit...">
            </div>
        </div>
    </div>
</template>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let productIndex = 0;
    const productsContainer = document.getElementById('productsContainer');
    const productTemplate = document.getElementById('productTemplate');
    const totalAmountElement = document.getElementById('totalAmount');
    
    // Ajouter le premier produit
    addProduct();
    
    // Gestion de l'ajout de produits
    document.getElementById('addProduct').addEventListener('click', addProduct);
    
    function addProduct() {
        const clone = productTemplate.content.cloneNode(true);
        const html = clone.querySelector('div').outerHTML;
        const newHtml = html.replace(/INDEX/g, productIndex);
        
        productsContainer.insertAdjacentHTML('beforeend', newHtml);
        
        // Attacher les événements au nouveau produit
        const newProduct = productsContainer.lastElementChild;
        attachProductEvents(newProduct);
        
        productIndex++;
    }
    
    function attachProductEvents(productElement) {
        const productSelect = productElement.querySelector('.product-select');
        const quantityInput = productElement.querySelector('.quantity-input');
        const priceInput = productElement.querySelector('.price-input');
        const totalInput = productElement.querySelector('.total-input');
        const removeBtn = productElement.querySelector('.remove-product');
        
        // Charger le prix du produit sélectionné
        productSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            if (selectedOption.value) {
                priceInput.value = selectedOption.dataset.price;
                calculateTotal();
            }
        });
        
        // Calculer le total quand quantité ou prix change
        quantityInput.addEventListener('input', calculateTotal);
        priceInput.addEventListener('input', calculateTotal);
        
        // Supprimer le produit
        removeBtn.addEventListener('click', function() {
            productElement.remove();
            calculateTotal();
        });
        
        function calculateTotal() {
            const quantity = parseFloat(quantityInput.value) || 0;
            const price = parseFloat(priceInput.value) || 0;
            const total = quantity * price;
            totalInput.value = total.toFixed(2);
            updateGrandTotal();
        }
    }
    
    function updateGrandTotal() {
        let grandTotal = 0;
        const totalInputs = document.querySelectorAll('.total-input');
        
        totalInputs.forEach(input => {
            const value = parseFloat(input.value) || 0;
            grandTotal += value;
        });
        
        totalAmountElement.textContent = new Intl.NumberFormat('fr-FR').format(grandTotal) + ' FCFA';
    }
    
    // Validation du formulaire
    document.getElementById('purchaseForm').addEventListener('submit', function(e) {
        const productRows = document.querySelectorAll('.product-row');
        
        if (productRows.length === 0) {
            e.preventDefault();
            alert('Veuillez ajouter au moins un produit.');
            return;
        }
        
        // Vérifier que tous les produits ont des données valides
        let hasValidProduct = false;
        productRows.forEach(row => {
            const productSelect = row.querySelector('.product-select');
            const quantityInput = row.querySelector('.quantity-input');
            const priceInput = row.querySelector('.price-input');
            
            if (productSelect.value && quantityInput.value && priceInput.value) {
                hasValidProduct = true;
            }
        });
        
        if (!hasValidProduct) {
            e.preventDefault();
            alert('Veuillez remplir tous les champs obligatoires pour au moins un produit.');
            return;
        }
    });
});
</script>
