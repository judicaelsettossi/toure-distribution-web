<?php

require_once __DIR__ . '/../configs/database-config.php';
require_once __DIR__ . '/../configs/utils.php';
require_once __DIR__ . '/../configs/api-config.php';

class SaleController {

    public function __construct() {
        autoInitializeDatabase();
        autoSyncProducts();
    }

    public function listeVentes() {
        try {
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $limit = 20;
            $offset = ($page - 1) * $limit;

            $search = isset($_GET['search']) ? sanitizeInput($_GET['search']) : '';
            $statut = isset($_GET['statut']) ? sanitizeInput($_GET['statut']) : '';

            $where = [];
            $params = [];
            if ($search !== '') {
                $where[] = "(sa.sale_number LIKE ? OR sa.client_name LIKE ? OR sa.notes LIKE ?)";
                $term = "%{$search}%";
                array_push($params, $term, $term, $term);
            }
            if ($statut !== '') {
                $where[] = "sa.statut = ?";
                $params[] = $statut;
            }
            $whereSql = empty($where) ? '' : ('WHERE ' . implode(' AND ', $where));

            $sql = "SELECT sa.*, COUNT(sd.id_sale_detail) as item_count
                    FROM sales sa
                    LEFT JOIN sale_details sd ON sa.id_sale = sd.id_sale
                    {$whereSql}
                    GROUP BY sa.id_sale
                    ORDER BY sa.created_at DESC
                    LIMIT {$limit} OFFSET {$offset}";
            $ventes = fetchLocalAll($sql, $params);

            $countSql = "SELECT COUNT(DISTINCT sa.id_sale) as total FROM sales sa {$whereSql}";
            $total = fetchLocalOne($countSql, $params)['total'] ?? 0;
            $totalPages = (int)ceil($total / $limit);

            $data = [
                'ventes' => $ventes,
                'pagination' => [
                    'current_page' => $page,
                    'total_pages' => $totalPages,
                    'total_items' => $total,
                    'items_per_page' => $limit
                ],
                'filters' => [ 'search' => $search, 'statut' => $statut ]
            ];

            $this->renderView('sale/liste', $data);
        } catch (Exception $e) {
            $this->handleError('Erreur chargement ventes: ' . $e->getMessage());
        }
    }

    public function creerVente() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $this->processCreateSale();
            } catch (Exception $e) {
                $this->handleError("Erreur création vente: " . $e->getMessage());
            }
            return;
        }
        try {
            $warehouses = fetchLocalAll("SELECT id_warehouse, warehouse_name FROM warehouses WHERE is_active = 1 ORDER BY warehouse_name");
            $products = fetchLocalAll("SELECT id_product, product_name, product_code, unit_price, unit_measure FROM products WHERE is_active = 1 ORDER BY product_name");
            $clients = $this->fetchClientsFromApi();
            $this->renderView('sale/creer', [ 'warehouses' => $warehouses, 'products' => $products, 'clients' => $clients ]);
        } catch (Exception $e) {
            $this->handleError('Erreur chargement formulaire: ' . $e->getMessage());
        }
    }

    private function processCreateSale() {
        beginLocalTransaction();
        try {
            $clientId = sanitizeInput($_POST['client_api_id']);
            $clientName = sanitizeInput($_POST['client_name']);
            $warehouseId = (int)$_POST['warehouse_id'];
            $saleDate = $_POST['sale_date'];
            $deliveryDate = $_POST['delivery_date'] ?? null;
            $notes = sanitizeInput($_POST['notes'] ?? '');

            if (!isValidUUID($clientId) || $warehouseId <= 0 || empty($saleDate)) {
                throw new Exception('Client, entrepôt et date requis');
            }
            $warehouse = fetchLocalOne("SELECT id_warehouse FROM warehouses WHERE id_warehouse = ? AND is_active = 1", [$warehouseId]);
            if (!$warehouse) throw new Exception('Entrepôt invalide');

            $items = $_POST['products'] ?? [];
            if (empty($items)) throw new Exception('Au moins un produit requis');

            // Vérifier le stock disponible
            $totalAmount = 0;
            foreach ($items as $item) {
                $productId = (int)$item['product_id'];
                $quantity = (int)$item['quantity'];
                $unitPrice = (float)$item['unit_price'];
                if ($productId <= 0 || $quantity <= 0) throw new Exception('Produit/quantité invalide');
                $stock = fetchLocalOne("SELECT current_quantity, reserved_quantity FROM warehouse_stock WHERE id_warehouse = ? AND id_product = ?", [$warehouseId, $productId]);
                $current = $stock['current_quantity'] ?? 0;
                $reserved = $stock['reserved_quantity'] ?? 0;
                $available = $current - $reserved;
                if ($available < $quantity) {
                    throw new Exception("Stock insuffisant pour le produit {$productId} (dispo: {$available}, demandé: {$quantity})");
                }
                $totalAmount += $quantity * $unitPrice;
            }

            // Créer la vente
            $saleNumber = generateSaleNumber();
            $userId = $_COOKIE['user_id'] ?? null;
            $saleId = insertLocalAndGetId(
                "INSERT INTO sales (sale_number, client_api_id, client_name, sale_date, delivery_date, total_amount, paid_amount, discount_amount, tax_rate, transport_cost, statut, notes, user_id)
                 VALUES (?, ?, ?, ?, ?, ?, 0, 0, 0, 0, 'pending', ?, ?)",
                [$saleNumber, $clientId, $clientName, $saleDate, $deliveryDate, $totalAmount, $notes, $userId]
            );

            // Créer les détails et réserver le stock
            foreach ($items as $item) {
                $productId = (int)$item['product_id'];
                $quantity = (int)$item['quantity'];
                $unitPrice = (float)$item['unit_price'];
                $totalPrice = $quantity * $unitPrice;
                $productNotes = sanitizeInput($item['notes'] ?? '');

                executeLocalQuery(
                    "INSERT INTO sale_details (id_sale, id_product, quantity_ordered, unit_price, total_price, notes) VALUES (?, ?, ?, ?, ?, ?)",
                    [$saleId, $productId, $quantity, $unitPrice, $totalPrice, $productNotes]
                );

                // Réserver le stock
                $stock = fetchLocalOne("SELECT id_warehouse_stock, current_quantity, reserved_quantity FROM warehouse_stock WHERE id_warehouse = ? AND id_product = ?", [$warehouseId, $productId]);
                if ($stock) {
                    $newReserved = ((int)$stock['reserved_quantity']) + $quantity;
                    $newAvailable = ((int)$stock['current_quantity']) - $newReserved;
                    executeLocalQuery("UPDATE warehouse_stock SET reserved_quantity = ?, available_quantity = ?, updated_at = CURRENT_TIMESTAMP WHERE id_warehouse = ? AND id_product = ?", [$newReserved, $newAvailable, $warehouseId, $productId]);
                } else {
                    // Pas de stock existant -> impossible d'avoir de l dispo, mais par sécurité créer la ligne avec réservation
                    $newReserved = $quantity;
                    $newAvailable = 0 - $newReserved;
                    executeLocalQuery("INSERT INTO warehouse_stock (id_warehouse, id_product, current_quantity, reserved_quantity, available_quantity, last_stock_update) VALUES (?, ?, 0, ?, ?, CURRENT_TIMESTAMP)", [$warehouseId, $productId, $newReserved, $newAvailable]);
                }
            }

            commitLocalTransaction();
            $_SESSION['success_message'] = 'Vente créée avec succès';
            header('Location: /ventes');
            exit;
        } catch (Exception $e) {
            rollbackLocalTransaction();
            throw $e;
        }
    }

    public function detailsVente($id) {
        try {
            $sale = fetchLocalOne("SELECT * FROM sales WHERE id_sale = ?", [(int)$id]);
            if (!$sale) throw new Exception('Vente introuvable');
            $details = fetchLocalAll("SELECT sd.*, p.product_name, p.product_code, p.unit_measure FROM sale_details sd LEFT JOIN products p ON p.id_product = sd.id_product WHERE id_sale = ? ORDER BY id_sale_detail", [(int)$id]);
            $this->renderView('sale/details', [ 'sale' => $sale, 'details' => $details ]);
        } catch (Exception $e) {
            $this->handleError('Erreur chargement détails: ' . $e->getMessage());
        }
    }

    public function modifierStatut($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $this->processUpdateStatus((int)$id);
            } catch (Exception $e) {
                $this->handleError('Erreur modification statut: ' . $e->getMessage());
            }
            return;
        }
        try {
            $sale = fetchLocalOne("SELECT * FROM sales WHERE id_sale = ?", [(int)$id]);
            if (!$sale) throw new Exception('Vente introuvable');
            $this->renderView('sale/modifier-statut', [ 'sale' => $sale ]);
        } catch (Exception $e) {
            $this->handleError('Erreur chargement: ' . $e->getMessage());
        }
    }

    private function processUpdateStatus($id) {
        $newStatus = sanitizeInput($_POST['statut'] ?? '');
        $deliveryDate = $_POST['delivery_date'] ?? null;
        $notes = sanitizeInput($_POST['notes'] ?? '');
        $valid = ['pending','confirmed','partially_delivered','delivered','cancelled','returned'];
        if (!in_array($newStatus, $valid)) throw new Exception('Statut invalide');

        $sale = fetchLocalOne("SELECT * FROM sales WHERE id_sale = ?", [$id]);
        if (!$sale) throw new Exception('Vente introuvable');

        beginLocalTransaction();
        try {
            executeLocalQuery("UPDATE sales SET statut = ?, delivery_date = ?, notes = ?, updated_at = CURRENT_TIMESTAMP WHERE id_sale = ?", [$newStatus, $deliveryDate, $notes, $id]);

            if ($newStatus === 'delivered' || $newStatus === 'partially_delivered') {
                $this->applyDeliveryStockImpact($sale['id_sale']);
                if ($newStatus === 'delivered') {
                    // Tenter de créer une facture via l'API (meilleure-effort)
                    $this->createInvoiceForSale($sale['id_sale']);
                }
            } elseif ($newStatus === 'cancelled') {
                $this->releaseReservations($sale['id_sale']);
            }

            commitLocalTransaction();
            $_SESSION['success_message'] = 'Statut mis à jour';
            header('Location: /vente/' . $id . '/details');
            exit;
        } catch (Exception $e) {
            rollbackLocalTransaction();
            throw $e;
        }
    }

    private function applyDeliveryStockImpact($saleId) {
        // For simplicity, deliver all ordered that isn't yet delivered
        $details = fetchLocalAll("SELECT sd.*, s.client_api_id FROM sale_details sd JOIN sales s ON s.id_sale = sd.id_sale WHERE sd.id_sale = ?", [$saleId]);
        // Determine warehouse by movement reference: we need warehouse; ask user selected at creation stored only in sales. Not stored; fallback to the first matching stock line per product
        foreach ($details as $d) {
            $qtyDeliver = max(0, ((int)$d['quantity_ordered']) - ((int)($d['quantity_delivered'] ?? 0)));
            if ($qtyDeliver <= 0) continue;

            // Find a warehouse stock record with reserved qty
            $stockLine = fetchLocalOne("SELECT * FROM warehouse_stock WHERE id_product = ? AND reserved_quantity >= ? ORDER BY id_warehouse_stock LIMIT 1", [$d['id_product'], $qtyDeliver]);
            if (!$stockLine) {
                // Fallback: find any warehouse with enough current to ship
                $stockLine = fetchLocalOne("SELECT * FROM warehouse_stock WHERE id_product = ? AND current_quantity >= ? ORDER BY id_warehouse_stock LIMIT 1", [$d['id_product'], $qtyDeliver]);
                if (!$stockLine) continue;
            }

            $before = (int)$stockLine['current_quantity'];
            $newCurrent = $before - $qtyDeliver;
            $newReserved = max(0, ((int)$stockLine['reserved_quantity']) - $qtyDeliver);
            $newAvailable = $newCurrent - $newReserved;

            executeLocalQuery("UPDATE warehouse_stock SET current_quantity = ?, reserved_quantity = ?, available_quantity = ?, last_stock_update = CURRENT_TIMESTAMP WHERE id_warehouse_stock = ?", [$newCurrent, $newReserved, $newAvailable, $stockLine['id_warehouse_stock']]);

            // Update detail delivered
            executeLocalQuery("UPDATE sale_details SET quantity_delivered = quantity_ordered WHERE id_sale_detail = ?", [$d['id_sale_detail']]);

            // Record movement
            executeLocalQuery(
                "INSERT INTO stock_movements (id_warehouse, id_product, movement_type, quantity_change, quantity_before, quantity_after, reference_id, reference_type, reason, user_id) VALUES (?, ?, 'sale', ?, ?, ?, ?, 'sale', 'Livraison vente', ?)",
                [$stockLine['id_warehouse'], $d['id_product'], -$qtyDeliver, $before, $newCurrent, $saleId, $_COOKIE['user_id'] ?? null]
            );
        }
    }

    private function releaseReservations($saleId) {
        $details = fetchLocalAll("SELECT * FROM sale_details WHERE id_sale = ?", [$saleId]);
        foreach ($details as $d) {
            // Find any reserved line for this product and release quantity_ordered if available
            $stockLine = fetchLocalOne("SELECT * FROM warehouse_stock WHERE id_product = ? AND reserved_quantity > 0 ORDER BY id_warehouse_stock LIMIT 1", [$d['id_product']]);
            if ($stockLine) {
                $release = min((int)$d['quantity_ordered'], (int)$stockLine['reserved_quantity']);
                $newReserved = (int)$stockLine['reserved_quantity'] - $release;
                $newAvailable = ((int)$stockLine['current_quantity']) - $newReserved;
                executeLocalQuery("UPDATE warehouse_stock SET reserved_quantity = ?, available_quantity = ?, updated_at = CURRENT_TIMESTAMP WHERE id_warehouse_stock = ?", [$newReserved, $newAvailable, $stockLine['id_warehouse_stock']]);
            }
        }
    }

    private function createInvoiceForSale($saleId) {
        try {
            $sale = fetchLocalOne("SELECT * FROM sales WHERE id_sale = ?", [$saleId]);
            if (!$sale) return;
            $payload = [
                'client_id' => $sale['client_api_id'],
                'reference' => $sale['sale_number'],
                'amount' => (float)$sale['total_amount'],
                'notes' => 'Facture générée automatiquement depuis la vente locale'
            ];
            // Endpoint à adapter selon l'API
            $res = makeApiCall('/factures', 'POST', $payload);
            if (!($res['success'] ?? false)) {
                error_log('Echec création facture API: ' . json_encode($res));
            }
        } catch (Exception $e) {
            error_log('Erreur facture API: ' . $e->getMessage());
        }
    }

    private function fetchClientsFromApi() {
        try {
            $resp = makeApiCall('/clients?limit=100');
            if (($resp['success'] ?? false) && isset($resp['data']['data'])) {
                $list = [];
                foreach ($resp['data']['data'] as $c) {
                    $list[] = [ 'id' => $c['id'], 'name' => $c['name'] ?? ($c['raison_sociale'] ?? 'Client') ];
                }
                return $list;
            }
        } catch (Exception $e) {
            // ignore
        }
        return [];
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
        header('Location: /ventes');
        exit;
    }
}

?>


