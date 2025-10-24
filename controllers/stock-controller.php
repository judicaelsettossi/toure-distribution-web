<?php

require_once __DIR__ . '/../configs/database-config.php';
require_once __DIR__ . '/../configs/utils.php';

class StockController {
    
    public function __construct() {
        autoInitializeDatabase();
        autoSyncProducts();
    }
    
    // Stock par entrepôt
    public function stockParEntrepot($entrepotId = null) {
        try {
            $warehouses = fetchLocalAll("SELECT id_warehouse, warehouse_name FROM warehouses WHERE is_active = 1 ORDER BY warehouse_name");
            
            if ($entrepotId) {
                $entrepotId = (int)$entrepotId;
                $warehouse = fetchLocalOne("SELECT * FROM warehouses WHERE id_warehouse = ? AND is_active = 1", [$entrepotId]);
                if (!$warehouse) {
                    throw new Exception('Entrepôt introuvable');
                }
                
                // Récupérer le stock de cet entrepôt
                $sql = "SELECT 
                            ws.*,
                            p.product_name,
                            p.product_code,
                            p.unit_measure,
                            p.min_stock_level,
                            p.max_stock_level,
                            CASE 
                                WHEN ws.current_quantity <= p.min_stock_level THEN 'low'
                                WHEN ws.current_quantity >= p.max_stock_level THEN 'high'
                                ELSE 'normal'
                            END as stock_status
                        FROM warehouse_stock ws
                        JOIN products p ON ws.id_product = p.id_product
                        WHERE ws.id_warehouse = ? AND p.is_active = 1
                        ORDER BY p.product_name";
                
                $stock = fetchLocalAll($sql, [$entrepotId]);
                
                $data = [
                    'warehouse' => $warehouse,
                    'stock' => $stock,
                    'warehouses' => $warehouses
                ];
            } else {
                // Vue d'ensemble de tous les entrepôts
                $sql = "SELECT 
                            w.id_warehouse,
                            w.warehouse_name,
                            w.location,
                            COUNT(ws.id_product) as product_count,
                            SUM(ws.current_quantity) as total_quantity,
                            SUM(ws.reserved_quantity) as total_reserved,
                            SUM(ws.available_quantity) as total_available
                        FROM warehouses w
                        LEFT JOIN warehouse_stock ws ON w.id_warehouse = ws.id_warehouse
                        WHERE w.is_active = 1
                        GROUP BY w.id_warehouse
                        ORDER BY w.warehouse_name";
                
                $overview = fetchLocalAll($sql);
                
                $data = [
                    'overview' => $overview,
                    'warehouses' => $warehouses
                ];
            }
            
            $this->renderView('stock/par-entrepot', $data);
            
        } catch (Exception $e) {
            $this->handleError('Erreur chargement stock entrepôt: ' . $e->getMessage());
        }
    }
    
    // Stock par produit
    public function stockParProduit($produitId = null) {
        try {
            $products = fetchLocalAll("SELECT id_product, product_name, product_code FROM products WHERE is_active = 1 ORDER BY product_name");
            
            if ($produitId) {
                $produitId = (int)$produitId;
                $product = fetchLocalOne("SELECT * FROM products WHERE id_product = ? AND is_active = 1", [$produitId]);
                if (!$product) {
                    throw new Exception('Produit introuvable');
                }
                
                // Récupérer le stock de ce produit dans tous les entrepôts
                $sql = "SELECT 
                            ws.*,
                            w.warehouse_name,
                            w.location,
                            CASE 
                                WHEN ws.current_quantity <= p.min_stock_level THEN 'low'
                                WHEN ws.current_quantity >= p.max_stock_level THEN 'high'
                                ELSE 'normal'
                            END as stock_status
                        FROM warehouse_stock ws
                        JOIN warehouses w ON ws.id_warehouse = w.id_warehouse
                        JOIN products p ON ws.id_product = p.id_product
                        WHERE ws.id_product = ? AND w.is_active = 1
                        ORDER BY w.warehouse_name";
                
                $stock = fetchLocalAll($sql, [$produitId]);
                
                // Calculer le total
                $totalCurrent = array_sum(array_column($stock, 'current_quantity'));
                $totalReserved = array_sum(array_column($stock, 'reserved_quantity'));
                $totalAvailable = array_sum(array_column($stock, 'available_quantity'));
                
                $data = [
                    'product' => $product,
                    'stock' => $stock,
                    'totals' => [
                        'current' => $totalCurrent,
                        'reserved' => $totalReserved,
                        'available' => $totalAvailable
                    ],
                    'products' => $products
                ];
            } else {
                // Vue d'ensemble de tous les produits
                $sql = "SELECT 
                            p.id_product,
                            p.product_name,
                            p.product_code,
                            p.unit_measure,
                            p.min_stock_level,
                            p.max_stock_level,
                            SUM(ws.current_quantity) as total_current,
                            SUM(ws.reserved_quantity) as total_reserved,
                            SUM(ws.available_quantity) as total_available,
                            COUNT(ws.id_warehouse) as warehouse_count
                        FROM products p
                        LEFT JOIN warehouse_stock ws ON p.id_product = ws.id_product
                        WHERE p.is_active = 1
                        GROUP BY p.id_product
                        ORDER BY p.product_name";
                
                $overview = fetchLocalAll($sql);
                
                $data = [
                    'overview' => $overview,
                    'products' => $products
                ];
            }
            
            $this->renderView('stock/par-produit', $data);
            
        } catch (Exception $e) {
            $this->handleError('Erreur chargement stock produit: ' . $e->getMessage());
        }
    }
    
    // Transfert de stock
    public function transfertStock() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                csrfValidateOrFail();
                $this->processTransfer();
            } catch (Exception $e) {
                $this->handleError('Erreur transfert: ' . $e->getMessage());
            }
            return;
        }
        
        try {
            $warehouses = fetchLocalAll("SELECT id_warehouse, warehouse_name FROM warehouses WHERE is_active = 1 ORDER BY warehouse_name");
            $products = fetchLocalAll("SELECT id_product, product_name, product_code FROM products WHERE is_active = 1 ORDER BY product_name");
            
            $data = [
                'warehouses' => $warehouses,
                'products' => $products
            ];
            
            $this->renderView('stock/transfert', $data);
            
        } catch (Exception $e) {
            $this->handleError('Erreur chargement formulaire: ' . $e->getMessage());
        }
    }
    
    private function processTransfer() {
        $warehouseFrom = (int)$_POST['warehouse_from'];
        $warehouseTo = (int)$_POST['warehouse_to'];
        $transferDate = $_POST['transfer_date'];
        $notes = sanitizeInput($_POST['notes'] ?? '');
        $products = $_POST['products'] ?? [];
        
        if ($warehouseFrom <= 0 || $warehouseTo <= 0 || $warehouseFrom === $warehouseTo) {
            throw new Exception('Entrepôts invalides');
        }
        
        if (empty($products)) {
            throw new Exception('Aucun produit à transférer');
        }
        
        if (empty($transferDate)) {
            throw new Exception('Date de transfert requise');
        }
        
        // Vérifier que les entrepôts existent
        $warehouseFromData = fetchLocalOne("SELECT * FROM warehouses WHERE id_warehouse = ? AND is_active = 1", [$warehouseFrom]);
        $warehouseToData = fetchLocalOne("SELECT * FROM warehouses WHERE id_warehouse = ? AND is_active = 1", [$warehouseTo]);
        
        if (!$warehouseFromData || !$warehouseToData) {
            throw new Exception('Entrepôt introuvable');
        }
        
        beginLocalTransaction();
        
        try {
            // Générer le numéro de transfert
            $transferNumber = generateTransferNumber();
            $userId = $_COOKIE['user_id'] ?? null;
            
            // Créer le transfert
            $transferId = insertLocalAndGetId(
                "INSERT INTO stock_transfers (transfer_number, id_warehouse_from, id_warehouse_to, transfer_date, statut, notes, user_id) 
                 VALUES (?, ?, ?, ?, 'pending', ?, ?)",
                [$transferNumber, $warehouseFrom, $warehouseTo, $transferDate, $notes, $userId]
            );
            
            // Traiter chaque produit
            foreach ($products as $product) {
                $productId = (int)$product['product_id'];
                $quantity = (int)$product['quantity'];
                
                if ($productId <= 0 || $quantity <= 0) {
                    throw new Exception('Produit ou quantité invalide');
                }
                
                // Vérifier le stock disponible dans l'entrepôt source
                $stockFrom = fetchLocalOne(
                    "SELECT * FROM warehouse_stock WHERE id_warehouse = ? AND id_product = ?",
                    [$warehouseFrom, $productId]
                );
                
                if (!$stockFrom || $stockFrom['available_quantity'] < $quantity) {
                    throw new Exception("Stock insuffisant pour le produit {$productId} (disponible: " . ($stockFrom['available_quantity'] ?? 0) . ", demandé: {$quantity})");
                }
                
                // Créer le détail de transfert
                executeLocalQuery(
                    "INSERT INTO transfer_details (id_transfer, id_product, quantity_sent) VALUES (?, ?, ?)",
                    [$transferId, $productId, $quantity]
                );
                
                // Réserver le stock dans l'entrepôt source
                $newReserved = (int)$stockFrom['reserved_quantity'] + $quantity;
                $newAvailable = (int)$stockFrom['current_quantity'] - $newReserved;
                
                executeLocalQuery(
                    "UPDATE warehouse_stock SET reserved_quantity = ?, available_quantity = ?, updated_at = CURRENT_TIMESTAMP WHERE id_warehouse = ? AND id_product = ?",
                    [$newReserved, $newAvailable, $warehouseFrom, $productId]
                );
            }
            
            commitLocalTransaction();

            // Mettre à jour alertes de stock
            try { generateStockAlerts(); } catch (Exception $e) {}
            
            $_SESSION['success_message'] = 'Transfert créé avec succès';
            header('Location: /stock/transfert');
            exit;
            
        } catch (Exception $e) {
            rollbackLocalTransaction();
            throw $e;
        }
    }
    
    // Liste des transferts
    public function listeTransferts() {
        try {
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $limit = 20;
            $offset = ($page - 1) * $limit;
            
            $search = isset($_GET['search']) ? sanitizeInput($_GET['search']) : '';
            $statut = isset($_GET['statut']) ? sanitizeInput($_GET['statut']) : '';
            
            $where = [];
            $params = [];
            
            if ($search !== '') {
                $where[] = "(st.transfer_number LIKE ? OR st.notes LIKE ?)";
                $term = "%{$search}%";
                array_push($params, $term, $term);
            }
            
            if ($statut !== '') {
                $where[] = "st.statut = ?";
                $params[] = $statut;
            }
            
            $whereSql = empty($where) ? '' : ('WHERE ' . implode(' AND ', $where));
            
            $sql = "SELECT 
                        st.*,
                        wf.warehouse_name as from_warehouse,
                        wt.warehouse_name as to_warehouse,
                        COUNT(td.id_product) as product_count
                    FROM stock_transfers st
                    LEFT JOIN warehouses wf ON st.id_warehouse_from = wf.id_warehouse
                    LEFT JOIN warehouses wt ON st.id_warehouse_to = wt.id_warehouse
                    LEFT JOIN transfer_details td ON st.id_transfer = td.id_transfer
                    {$whereSql}
                    GROUP BY st.id_transfer
                    ORDER BY st.created_at DESC
                    LIMIT {$limit} OFFSET {$offset}";
            
            $transfers = fetchLocalAll($sql, $params);
            
            $countSql = "SELECT COUNT(DISTINCT st.id_transfer) as total FROM stock_transfers st {$whereSql}";
            $total = fetchLocalOne($countSql, $params)['total'] ?? 0;
            $totalPages = (int)ceil($total / $limit);
            
            $data = [
                'transfers' => $transfers,
                'pagination' => [
                    'current_page' => $page,
                    'total_pages' => $totalPages,
                    'total_items' => $total,
                    'items_per_page' => $limit
                ],
                'filters' => ['search' => $search, 'statut' => $statut]
            ];
            
            $this->renderView('stock/transferts', $data);
            
        } catch (Exception $e) {
            $this->handleError('Erreur chargement transferts: ' . $e->getMessage());
        }
    }
    
    // Détails d'un transfert
    public function detailsTransfert($id) {
        try {
            $transfer = fetchLocalOne(
                "SELECT st.*, wf.warehouse_name as from_warehouse, wt.warehouse_name as to_warehouse
                 FROM stock_transfers st
                 LEFT JOIN warehouses wf ON st.id_warehouse_from = wf.id_warehouse
                 LEFT JOIN warehouses wt ON st.id_warehouse_to = wt.id_warehouse
                 WHERE st.id_transfer = ?",
                [(int)$id]
            );
            
            if (!$transfer) {
                throw new Exception('Transfert introuvable');
            }
            
            $details = fetchLocalAll(
                "SELECT td.*, p.product_name, p.product_code, p.unit_measure
                 FROM transfer_details td
                 LEFT JOIN products p ON td.id_product = p.id_product
                 WHERE td.id_transfer = ?
                 ORDER BY td.id_transfer_detail",
                [(int)$id]
            );
            
            $data = [
                'transfer' => $transfer,
                'details' => $details
            ];
            
            $this->renderView('stock/details-transfert', $data);
            
        } catch (Exception $e) {
            $this->handleError('Erreur chargement détails: ' . $e->getMessage());
        }
    }
    
    // Confirmer un transfert
    public function confirmerTransfert($id) {
        try {
            $transfer = fetchLocalOne("SELECT * FROM stock_transfers WHERE id_transfer = ?", [(int)$id]);
            if (!$transfer) {
                throw new Exception('Transfert introuvable');
            }
            
            if ($transfer['statut'] !== 'pending') {
                throw new Exception('Transfert déjà traité');
            }
            
            beginLocalTransaction();
            
            try {
                // Marquer comme en transit
                executeLocalQuery(
                    "UPDATE stock_transfers SET statut = 'in_transit', updated_at = CURRENT_TIMESTAMP WHERE id_transfer = ?",
                    [$id]
                );
                
                // Récupérer les détails
                $details = fetchLocalAll("SELECT * FROM transfer_details WHERE id_transfer = ?", [$id]);
                
                foreach ($details as $detail) {
                    $productId = $detail['id_product'];
                    $quantity = $detail['quantity_sent'];
                    
                    // Retirer du stock source
                    $stockFrom = fetchLocalOne(
                        "SELECT * FROM warehouse_stock WHERE id_warehouse = ? AND id_product = ?",
                        [$transfer['id_warehouse_from'], $productId]
                    );
                    
                    if ($stockFrom) {
                        $newCurrent = (int)$stockFrom['current_quantity'] - $quantity;
                        $newReserved = (int)$stockFrom['reserved_quantity'] - $quantity;
                        $newAvailable = $newCurrent - $newReserved;
                        
                        executeLocalQuery(
                            "UPDATE warehouse_stock SET current_quantity = ?, reserved_quantity = ?, available_quantity = ?, updated_at = CURRENT_TIMESTAMP WHERE id_warehouse = ? AND id_product = ?",
                            [$newCurrent, $newReserved, $newAvailable, $transfer['id_warehouse_from'], $productId]
                        );
                        
                        // Créer un mouvement de sortie
                        executeLocalQuery(
                            "INSERT INTO stock_movements (id_warehouse, id_product, movement_type, quantity_change, quantity_before, quantity_after, reference_id, reference_type, reason, user_id) 
                             VALUES (?, ?, 'transfer', ?, ?, ?, ?, 'transfer', 'Transfert sortant', ?)",
                            [$transfer['id_warehouse_from'], $productId, -$quantity, $stockFrom['current_quantity'], $newCurrent, $id, $_COOKIE['user_id'] ?? null]
                        );
                    }
                    
                    // Ajouter au stock destination
                    $stockTo = fetchLocalOne(
                        "SELECT * FROM warehouse_stock WHERE id_warehouse = ? AND id_product = ?",
                        [$transfer['id_warehouse_to'], $productId]
                    );
                    
                    if ($stockTo) {
                        $newCurrent = (int)$stockTo['current_quantity'] + $quantity;
                        $newAvailable = $newCurrent - (int)$stockTo['reserved_quantity'];
                        
                        executeLocalQuery(
                            "UPDATE warehouse_stock SET current_quantity = ?, available_quantity = ?, updated_at = CURRENT_TIMESTAMP WHERE id_warehouse = ? AND id_product = ?",
                            [$newCurrent, $newAvailable, $transfer['id_warehouse_to'], $productId]
                        );
                    } else {
                        executeLocalQuery(
                            "INSERT INTO warehouse_stock (id_warehouse, id_product, current_quantity, available_quantity, last_stock_update) 
                             VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP)",
                            [$transfer['id_warehouse_to'], $productId, $quantity, $quantity]
                        );
                    }
                    
                    // Créer un mouvement d'entrée
                    executeLocalQuery(
                        "INSERT INTO stock_movements (id_warehouse, id_product, movement_type, quantity_change, quantity_before, quantity_after, reference_id, reference_type, reason, user_id) 
                         VALUES (?, ?, 'transfer', ?, ?, ?, ?, 'transfer', 'Transfert entrant', ?)",
                        [$transfer['id_warehouse_to'], $productId, $quantity, $stockTo['current_quantity'] ?? 0, $stockTo['current_quantity'] + $quantity, $id, $_COOKIE['user_id'] ?? null]
                    );
                    
                    // Marquer comme reçu
                    executeLocalQuery(
                        "UPDATE transfer_details SET quantity_received = ? WHERE id_transfer_detail = ?",
                        [$quantity, $detail['id_transfer_detail']]
                    );
                }
                
                // Marquer comme reçu
                executeLocalQuery(
                    "UPDATE stock_transfers SET statut = 'received', updated_at = CURRENT_TIMESTAMP WHERE id_transfer = ?",
                    [$id]
                );
                
                commitLocalTransaction();

                // MAJ alertes
                try { generateStockAlerts(); } catch (Exception $e) {}
                
                $_SESSION['success_message'] = 'Transfert confirmé et traité';
                header('Location: /stock/transfert/' . $id . '/details');
                exit;
                
            } catch (Exception $e) {
                rollbackLocalTransaction();
                throw $e;
            }
            
        } catch (Exception $e) {
            $this->handleError('Erreur confirmation: ' . $e->getMessage());
        }
    }
    
    private function renderView($view, $data = []) {
        extract($data);
        $viewFile = __DIR__ . '/../views/' . $view . '.php';
        if (file_exists($viewFile)) {
            include $viewFile;
        } else {
            throw new Exception("Vue {$view} introuvable");
        }
    }
    
    private function handleError($message) {
        $_SESSION['error_message'] = $message;
        header('Location: /stock');
        exit;
    }
}

?>