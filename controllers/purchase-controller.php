<?php

require_once __DIR__ . '/../configs/database-config.php';
require_once __DIR__ . '/../configs/utils.php';

class PurchaseController {
    
    // Constructeur pour auto-initialisation
    public function __construct() {
        // Auto-initialiser la base de données au premier accès
        autoInitializeDatabase();
        // Synchroniser les produits si nécessaire
        autoSyncProducts();
    }
    
    // Lister tous les achats
    public function listeAchats() {
        try {
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $limit = 20;
            $offset = ($page - 1) * $limit;
            
            $search = isset($_GET['search']) ? sanitizeInput($_GET['search']) : '';
            $statut = isset($_GET['statut']) ? sanitizeInput($_GET['statut']) : '';
            $supplier = isset($_GET['supplier']) ? (int)$_GET['supplier'] : 0;
            $warehouse = isset($_GET['warehouse']) ? (int)$_GET['warehouse'] : 0;
            
            // Construction de la requête avec filtres
            $whereConditions = [];
            $params = [];
            
            if (!empty($search)) {
                $whereConditions[] = "(p.purchase_number LIKE ? OR s.supplier_name LIKE ? OR p.notes LIKE ?)";
                $searchTerm = "%{$search}%";
                $params[] = $searchTerm;
                $params[] = $searchTerm;
                $params[] = $searchTerm;
            }
            
            if (!empty($statut)) {
                $whereConditions[] = "p.statut = ?";
                $params[] = $statut;
            }
            
            if ($supplier > 0) {
                $whereConditions[] = "p.id_supplier = ?";
                $params[] = $supplier;
            }
            
            if ($warehouse > 0) {
                $whereConditions[] = "p.id_warehouse = ?";
                $params[] = $warehouse;
            }
            
            $whereClause = !empty($whereConditions) ? 'WHERE ' . implode(' AND ', $whereConditions) : '';
            
            // Requête principale
            $sql = "SELECT 
                        p.id_purchase,
                        p.purchase_number,
                        p.purchase_date,
                        p.expected_delivery_date,
                        p.actual_delivery_date,
                        p.total_amount,
                        p.paid_amount,
                        p.statut,
                        p.notes,
                        s.supplier_name,
                        w.warehouse_name,
                        p.created_at,
                        COUNT(pd.id_purchase_detail) as item_count
                    FROM purchases p
                    LEFT JOIN suppliers s ON p.id_supplier = s.id_supplier
                    LEFT JOIN warehouses w ON p.id_warehouse = w.id_warehouse
                    LEFT JOIN purchase_details pd ON p.id_purchase = pd.id_purchase
                    {$whereClause}
                    GROUP BY p.id_purchase
                    ORDER BY p.created_at DESC
                    LIMIT {$limit} OFFSET {$offset}";
            
            $purchases = fetchLocalAll($sql, $params);
            
            // Compter le total pour la pagination
            $countSql = "SELECT COUNT(DISTINCT p.id_purchase) as total
                        FROM purchases p
                        LEFT JOIN suppliers s ON p.id_supplier = s.id_supplier
                        LEFT JOIN warehouses w ON p.id_warehouse = w.id_warehouse
                        {$whereClause}";
            
            $totalResult = fetchLocalOne($countSql, $params);
            $totalPurchases = $totalResult['total'];
            $totalPages = ceil($totalPurchases / $limit);
            
            // Récupérer les fournisseurs et entrepôts pour les filtres
            $suppliers = fetchLocalAll("SELECT id_supplier, supplier_name FROM suppliers WHERE is_active = 1 ORDER BY supplier_name");
            $warehouses = fetchLocalAll("SELECT id_warehouse, warehouse_name FROM warehouses WHERE is_active = 1 ORDER BY warehouse_name");
            
            $data = [
                'purchases' => $purchases,
                'pagination' => [
                    'current_page' => $page,
                    'total_pages' => $totalPages,
                    'total_items' => $totalPurchases,
                    'items_per_page' => $limit
                ],
                'filters' => [
                    'search' => $search,
                    'statut' => $statut,
                    'supplier' => $supplier,
                    'warehouse' => $warehouse
                ],
                'suppliers' => $suppliers,
                'warehouses' => $warehouses
            ];
            
            $this->renderView('purchase/liste', $data);
            
        } catch (Exception $e) {
            $this->handleError('Erreur lors du chargement des achats: ' . $e->getMessage());
        }
    }
    
    // Créer un nouvel achat
    public function creerAchat() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $this->processCreatePurchase();
            } catch (Exception $e) {
                $this->handleError('Erreur lors de la création de l\'achat: ' . $e->getMessage());
            }
        } else {
            try {
                // Récupérer les données nécessaires pour le formulaire
                $suppliers = fetchLocalAll("SELECT id_supplier, supplier_name FROM suppliers WHERE is_active = 1 ORDER BY supplier_name");
                $warehouses = fetchLocalAll("SELECT id_warehouse, warehouse_name FROM warehouses WHERE is_active = 1 ORDER BY warehouse_name");
                $products = fetchLocalAll("SELECT id_product, product_name, product_code, unit_price, cost_price, unit_measure FROM products WHERE is_active = 1 ORDER BY product_name");
                
                $data = [
                    'suppliers' => $suppliers,
                    'warehouses' => $warehouses,
                    'products' => $products
                ];
                
                $this->renderView('purchase/creer', $data);
                
            } catch (Exception $e) {
                $this->handleError('Erreur lors du chargement du formulaire: ' . $e->getMessage());
            }
        }
    }
    
    // Traiter la création d'un achat
    private function processCreatePurchase() {
        beginLocalTransaction();
        
        try {
            // Validation des données
            $supplierId = (int)$_POST['supplier_id'];
            $warehouseId = (int)$_POST['warehouse_id'];
            $purchaseDate = $_POST['purchase_date'];
            $expectedDeliveryDate = $_POST['expected_delivery_date'] ?? null;
            $notes = sanitizeInput($_POST['notes'] ?? '');
            
            if ($supplierId <= 0 || $warehouseId <= 0) {
                throw new Exception('Fournisseur et entrepôt requis');
            }
            
            if (empty($purchaseDate)) {
                throw new Exception('Date d\'achat requise');
            }
            
            // Vérifier que le fournisseur et l'entrepôt existent
            $supplier = fetchLocalOne("SELECT id_supplier FROM suppliers WHERE id_supplier = ? AND is_active = 1", [$supplierId]);
            $warehouse = fetchLocalOne("SELECT id_warehouse FROM warehouses WHERE id_warehouse = ? AND is_active = 1", [$warehouseId]);
            
            if (!$supplier || !$warehouse) {
                throw new Exception('Fournisseur ou entrepôt invalide');
            }
            
            // Générer le numéro d'achat
            $purchaseNumber = generatePurchaseNumber();
            
            // Calculer le montant total
            $totalAmount = 0;
            $products = $_POST['products'] ?? [];
            
            if (empty($products)) {
                throw new Exception('Au moins un produit est requis');
            }
            
            foreach ($products as $product) {
                $quantity = (int)$product['quantity'];
                $unitPrice = (float)$product['unit_price'];
                $totalAmount += $quantity * $unitPrice;
            }
            
            // Créer l'achat
            $sql = "INSERT INTO purchases (purchase_number, id_supplier, id_warehouse, purchase_date, expected_delivery_date, total_amount, notes, user_id) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            
            $userId = $_COOKIE['user_id'] ?? null;
            $purchaseId = insertLocalAndGetId($sql, [
                $purchaseNumber,
                $supplierId,
                $warehouseId,
                $purchaseDate,
                $expectedDeliveryDate,
                $totalAmount,
                $notes,
                $userId
            ]);
            
            // Créer les détails d'achat
            foreach ($products as $product) {
                $productId = (int)$product['product_id'];
                $quantity = (int)$product['quantity'];
                $unitPrice = (float)$product['unit_price'];
                $totalPrice = $quantity * $unitPrice;
                $productNotes = sanitizeInput($product['notes'] ?? '');
                
                // Vérifier que le produit existe
                $productExists = fetchLocalOne("SELECT id_product FROM products WHERE id_product = ? AND is_active = 1", [$productId]);
                if (!$productExists) {
                    throw new Exception("Produit ID {$productId} introuvable");
                }
                
                $detailSql = "INSERT INTO purchase_details (id_purchase, id_product, quantity_ordered, unit_price, total_price, notes) 
                             VALUES (?, ?, ?, ?, ?, ?)";
                
                executeLocalQuery($detailSql, [
                    $purchaseId,
                    $productId,
                    $quantity,
                    $unitPrice,
                    $totalPrice,
                    $productNotes
                ]);
            }
            
            commitLocalTransaction();
            
            // Rediriger vers la liste avec un message de succès
            $_SESSION['success_message'] = 'Achat créé avec succès';
            header('Location: /achats');
            exit;
            
        } catch (Exception $e) {
            rollbackLocalTransaction();
            throw $e;
        }
    }
    
    // Détails d'un achat
    public function detailsAchat($id) {
        try {
            $purchaseId = (int)$id;
            
            // Récupérer les détails de l'achat
            $sql = "SELECT 
                        p.*,
                        s.supplier_name,
                        s.contact_person,
                        s.email as supplier_email,
                        s.phone as supplier_phone,
                        w.warehouse_name,
                        w.location as warehouse_location
                    FROM purchases p
                    LEFT JOIN suppliers s ON p.id_supplier = s.id_supplier
                    LEFT JOIN warehouses w ON p.id_warehouse = w.id_warehouse
                    WHERE p.id_purchase = ?";
            
            $purchase = fetchLocalOne($sql, [$purchaseId]);
            
            if (!$purchase) {
                throw new Exception('Achat introuvable');
            }
            
            // Récupérer les détails des produits
            $detailsSql = "SELECT 
                            pd.*,
                            pr.product_name,
                            pr.product_code,
                            pr.unit_measure
                          FROM purchase_details pd
                          LEFT JOIN products pr ON pd.id_product = pr.id_product
                          WHERE pd.id_purchase = ?
                          ORDER BY pd.id_purchase_detail";
            
            $details = fetchLocalAll($detailsSql, [$purchaseId]);
            
            $data = [
                'purchase' => $purchase,
                'details' => $details
            ];
            
            $this->renderView('purchase/details', $data);
            
        } catch (Exception $e) {
            $this->handleError('Erreur lors du chargement des détails: ' . $e->getMessage());
        }
    }
    
    // Modifier le statut d'un achat
    public function modifierStatut($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $this->processUpdateStatus($id);
            } catch (Exception $e) {
                $this->handleError('Erreur lors de la modification du statut: ' . $e->getMessage());
            }
        } else {
            try {
                $purchaseId = (int)$id;
                
                // Récupérer l'achat
                $sql = "SELECT p.*, s.supplier_name, w.warehouse_name 
                        FROM purchases p
                        LEFT JOIN suppliers s ON p.id_supplier = s.id_supplier
                        LEFT JOIN warehouses w ON p.id_warehouse = w.id_warehouse
                        WHERE p.id_purchase = ?";
                
                $purchase = fetchLocalOne($sql, [$purchaseId]);
                
                if (!$purchase) {
                    throw new Exception('Achat introuvable');
                }
                
                $data = ['purchase' => $purchase];
                $this->renderView('purchase/modifier-statut', $data);
                
            } catch (Exception $e) {
                $this->handleError('Erreur lors du chargement: ' . $e->getMessage());
            }
        }
    }
    
    // Traiter la modification du statut
    private function processUpdateStatus($id) {
        $purchaseId = (int)$id;
        $newStatus = sanitizeInput($_POST['statut']);
        $actualDeliveryDate = $_POST['actual_delivery_date'] ?? null;
        $notes = sanitizeInput($_POST['notes'] ?? '');
        
        $validStatuses = ['pending', 'confirmed', 'partially_received', 'received', 'cancelled'];
        
        if (!in_array($newStatus, $validStatuses)) {
            throw new Exception('Statut invalide');
        }
        
        // Récupérer l'achat actuel
        $purchase = fetchLocalOne("SELECT * FROM purchases WHERE id_purchase = ?", [$purchaseId]);
        if (!$purchase) {
            throw new Exception('Achat introuvable');
        }
        
        beginLocalTransaction();
        
        try {
            // Mettre à jour le statut
            $updateSql = "UPDATE purchases SET statut = ?, actual_delivery_date = ?, notes = ?, updated_at = CURRENT_TIMESTAMP WHERE id_purchase = ?";
            executeLocalQuery($updateSql, [$newStatus, $actualDeliveryDate, $notes, $purchaseId]);
            
            // Si le statut est "received", mettre à jour les quantités reçues
            if ($newStatus === 'received') {
                $this->updateReceivedQuantities($purchaseId);
            }
            
            commitLocalTransaction();
            
            $_SESSION['success_message'] = 'Statut mis à jour avec succès';
            header('Location: /achat/' . $purchaseId . '/details');
            exit;
            
        } catch (Exception $e) {
            rollbackLocalTransaction();
            throw $e;
        }
    }
    
    // Mettre à jour les quantités reçues
    private function updateReceivedQuantities($purchaseId) {
        $details = fetchLocalAll("SELECT * FROM purchase_details WHERE id_purchase = ?", [$purchaseId]);
        
        foreach ($details as $detail) {
            // Mettre à jour la quantité reçue
            $updateDetailSql = "UPDATE purchase_details SET quantity_received = quantity_ordered WHERE id_purchase_detail = ?";
            executeLocalQuery($updateDetailSql, [$detail['id_purchase_detail']]);
            
            // Créer un mouvement de stock
            $this->createStockMovement($detail);
        }
    }
    
    // Créer un mouvement de stock pour un produit reçu
    private function createStockMovement($detail) {
        // Récupérer le stock actuel
        $currentStock = fetchLocalOne(
            "SELECT current_quantity FROM warehouse_stock WHERE id_warehouse = ? AND id_product = ?",
            [$detail['id_warehouse'], $detail['id_product']]
        );
        
        $quantityBefore = $currentStock ? $currentStock['current_quantity'] : 0;
        $quantityAfter = $quantityBefore + $detail['quantity_received'];
        
        // Mettre à jour ou créer le stock
        if ($currentStock) {
            $updateStockSql = "UPDATE warehouse_stock SET current_quantity = ?, available_quantity = ?, last_stock_update = CURRENT_TIMESTAMP WHERE id_warehouse = ? AND id_product = ?";
            executeLocalQuery($updateStockSql, [$quantityAfter, $quantityAfter, $detail['id_warehouse'], $detail['id_product']]);
        } else {
            $insertStockSql = "INSERT INTO warehouse_stock (id_warehouse, id_product, current_quantity, available_quantity, last_stock_update) VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP)";
            executeLocalQuery($insertStockSql, [$detail['id_warehouse'], $detail['id_product'], $quantityAfter, $quantityAfter]);
        }
        
        // Créer le mouvement de stock
        $movementSql = "INSERT INTO stock_movements (id_warehouse, id_product, movement_type, quantity_change, quantity_before, quantity_after, reference_id, reference_type, reason, user_id) 
                       VALUES (?, ?, 'purchase', ?, ?, ?, ?, 'purchase', 'Réception d\'achat', ?)";
        
        executeLocalQuery($movementSql, [
            $detail['id_warehouse'],
            $detail['id_product'],
            $detail['quantity_received'],
            $quantityBefore,
            $quantityAfter,
            $detail['id_purchase'],
            $_COOKIE['user_id'] ?? null
        ]);
    }
    
    // Rendu des vues
    private function renderView($view, $data = []) {
        extract($data);
        $viewFile = __DIR__ . '/../views/' . $view . '.php';
        
        if (file_exists($viewFile)) {
            include $viewFile;
        } else {
            throw new Exception("Vue {$view} introuvable");
        }
    }
    
    // Gestion des erreurs
    private function handleError($message) {
        $_SESSION['error_message'] = $message;
        header('Location: /achats');
        exit;
    }
}

?>
