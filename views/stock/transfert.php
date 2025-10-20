<?php
$pageTitle = 'Transfert de Stock';
include __DIR__ . '/../layouts/app-layout.php';
?>

<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Transfert de Stock</h1>
            <p class="text-muted mb-0">Transférer des produits entre entrepôts</p>
        </div>
        <div>
            <a href="/stock/transferts" class="btn btn-outline-primary me-2">
                <i class="bi bi-list me-1"></i>Liste des transferts
            </a>
            <a href="/stock/par-entrepot" class="btn btn-outline-secondary">
                <i class="bi bi-building me-1"></i>Stock par Entrepôt
            </a>
        </div>
    </div>

    <form method="POST" id="transferForm">
        <div class="row">
            <!-- Informations générales -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Informations du Transfert</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="warehouse_from" class="form-label">Entrepôt source <span class="text-danger">*</span></label>
                            <select class="form-select" id="warehouse_from" name="warehouse_from" required>
                                <option value="">Sélectionner l'entrepôt source</option>
                                <?php foreach ($warehouses as $warehouse): ?>
                                    <option value="<?= $warehouse['id_warehouse'] ?>">
                                        <?= htmlspecialchars($warehouse['warehouse_name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="warehouse_to" class="form-label">Entrepôt destination <span class="text-danger">*</span></label>
                            <select class="form-select" id="warehouse_to" name="warehouse_to" required>
                                <option value="">Sélectionner l'entrepôt destination</option>
                                <?php foreach ($warehouses as $warehouse): ?>
                                    <option value="<?= $warehouse['id_warehouse'] ?>">
                                        <?= htmlspecialchars($warehouse['warehouse_name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="transfer_date" class="form-label">Date de transfert <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="transfer_date" name="transfer_date" 
                                   value="<?= date('Y-m-d') ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="notes" class="form-label">Notes</label>
                            <textarea class="form-control" id="notes" name="notes" rows="3" 
                                      placeholder="Notes sur le transfert..."></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Produits à transférer -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Produits à transférer</h5>
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
                                    <h6>Total articles: <span id="totalItems">0</span></h6>
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
                        <a href="/stock" class="btn btn-outline-secondary me-2">
                            <i class="bi bi-x-circle me-1"></i>Annuler
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-1"></i>Créer le transfert
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
            <div class="col-md-6">
                <label class="form-label">Produit <span class="text-danger">*</span></label>
                <select class="form-select product-select" name="products[INDEX][product_id]" required>
                    <option value="">Sélectionner un produit</option>
                    <?php foreach ($products as $product): ?>
                        <option value="<?= $product['id_product'] ?>">
                            <?= htmlspecialchars($product['product_name']) ?> 
                            (<?= htmlspecialchars($product['product_code']) ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Quantité <span class="text-danger">*</span></label>
                <input type="number" class="form-control quantity-input" name="products[INDEX][quantity]" 
                       min="1" value="1" required>
            </div>
            <div class="col-md-2">
                <label class="form-label">Stock dispo</label>
                <input type="text" class="form-control stock-display" readonly>
            </div>
            <div class="col-md-1">
                <label class="form-label">&nbsp;</label>
                <div class="d-grid">
                    <button type="button" class="btn btn-outline-danger remove-product">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let productIndex = 0;
    const productsContainer = document.getElementById('productsContainer');
    const productTemplate = document.getElementById('productTemplate');
    const totalItemsElement = document.getElementById('totalItems');
    const warehouseFromSelect = document.getElementById('warehouse_from');
    const warehouseToSelect = document.getElementById('warehouse_to');
    
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
        updateTotalItems();
    }
    
    function attachProductEvents(productElement) {
        const productSelect = productElement.querySelector('.product-select');
        const quantityInput = productElement.querySelector('.quantity-input');
        const stockDisplay = productElement.querySelector('.stock-display');
        const removeBtn = productElement.querySelector('.remove-product');
        
        // Mettre à jour le stock disponible quand le produit change
        productSelect.addEventListener('change', function() {
            updateStockDisplay(productElement);
        });
        
        // Mettre à jour le stock quand la quantité change
        quantityInput.addEventListener('input', function() {
            updateStockDisplay(productElement);
        });
        
        // Supprimer le produit
        removeBtn.addEventListener('click', function() {
            productElement.remove();
            updateTotalItems();
        });
    }
    
    function updateStockDisplay(productElement) {
        const productSelect = productElement.querySelector('.product-select');
        const quantityInput = productElement.querySelector('.quantity-input');
        const stockDisplay = productElement.querySelector('.stock-display');
        
        const productId = productSelect.value;
        const warehouseId = warehouseFromSelect.value;
        
        if (productId && warehouseId) {
            // Ici, vous pourriez faire un appel AJAX pour récupérer le stock
            // Pour l'instant, on affiche juste un placeholder
            stockDisplay.value = 'Vérification...';
            
            // Simuler la vérification du stock
            setTimeout(() => {
                stockDisplay.value = 'Disponible';
                stockDisplay.classList.remove('text-danger');
                stockDisplay.classList.add('text-success');
            }, 500);
        } else {
            stockDisplay.value = '';
            stockDisplay.classList.remove('text-success', 'text-danger');
        }
    }
    
    function updateTotalItems() {
        const productRows = document.querySelectorAll('.product-row');
        totalItemsElement.textContent = productRows.length;
    }
    
    // Validation du formulaire
    document.getElementById('transferForm').addEventListener('submit', function(e) {
        const warehouseFrom = warehouseFromSelect.value;
        const warehouseTo = warehouseToSelect.value;
        const productRows = document.querySelectorAll('.product-row');
        
        if (warehouseFrom === warehouseTo) {
            e.preventDefault();
            alert('L\'entrepôt source et destination doivent être différents.');
            return;
        }
        
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
            
            if (productSelect.value && quantityInput.value) {
                hasValidProduct = true;
            }
        });
        
        if (!hasValidProduct) {
            e.preventDefault();
            alert('Veuillez remplir tous les champs obligatoires pour au moins un produit.');
            return;
        }
    });
    
    // Mettre à jour le stock quand l'entrepôt source change
    warehouseFromSelect.addEventListener('change', function() {
        const productRows = document.querySelectorAll('.product-row');
        productRows.forEach(row => {
            updateStockDisplay(row);
        });
    });
});
</script>
