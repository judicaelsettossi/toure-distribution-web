<?php

require_once __DIR__ . '/../configs/database-config.php';
require_once __DIR__ . '/../configs/utils.php';

class AlertsController {
    
    public function __construct() {
        autoInitializeDatabase();
        autoSyncProducts();
    }
    
    // Historique des mouvements de stock
    public function historiqueMouvements() {
        try {
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $limit = 20;
            $offset = ($page - 1) * $limit;
            
            $search = isset($_GET['search']) ? sanitizeInput($_GET['search']) : '';
            $type = isset($_GET['type']) ? sanitizeInput($_GET['type']) : '';
            $warehouse = isset($_GET['warehouse']) ? (int)$_GET['warehouse'] : 0;
            $product = isset($_GET['product']) ? (int)$_GET['product'] : 0;
            $dateFrom = isset($_GET['date_from']) ? $_GET['date_from'] : '';
            $dateTo = isset($_GET['date_to']) ? $_GET['date_to'] : '';
            
            $where = [];
            $params = [];
            
            if ($search !== '') {
                $where[] = "(p.product_name LIKE ? OR p.product_code LIKE ? OR sm.reason LIKE ?)";
                $term = "%{$search}%";
                array_push($params, $term, $term, $term);
            }
            
            if ($type !== '') {
                $where[] = "sm.movement_type = ?";
                $params[] = $type;
            }
            
            if ($warehouse > 0) {
                $where[] = "sm.id_warehouse = ?";
                $params[] = $warehouse;
            }
            
            if ($product > 0) {
                $where[] = "sm.id_product = ?";
                $params[] = $product;
            }
            
            if ($dateFrom !== '') {
                $where[] = "DATE(sm.movement_date) >= ?";
                $params[] = $dateFrom;
            }
            
            if ($dateTo !== '') {
                $where[] = "DATE(sm.movement_date) <= ?";
                $params[] = $dateTo;
            }
            
            $whereSql = empty($where) ? '' : ('WHERE ' . implode(' AND ', $where));
            
            $sql = "SELECT 
                        sm.*,
                        p.product_name,
                        p.product_code,
                        p.unit_measure,
                        w.warehouse_name,
                        CASE 
                            WHEN sm.quantity_change > 0 THEN 'in'
                            WHEN sm.quantity_change < 0 THEN 'out'
                            ELSE 'neutral'
                        END as movement_direction
                    FROM stock_movements sm
                    LEFT JOIN products p ON sm.id_product = p.id_product
                    LEFT JOIN warehouses w ON sm.id_warehouse = w.id_warehouse
                    {$whereSql}
                    ORDER BY sm.movement_date DESC
                    LIMIT {$limit} OFFSET {$offset}";
            
            $movements = fetchLocalAll($sql, $params);
            
            $countSql = "SELECT COUNT(*) as total FROM stock_movements sm {$whereSql}";
            $total = fetchLocalOne($countSql, $params)['total'] ?? 0;
            $totalPages = (int)ceil($total / $limit);
            
            // Récupérer les filtres
            $warehouses = fetchLocalAll("SELECT id_warehouse, warehouse_name FROM warehouses WHERE is_active = 1 ORDER BY warehouse_name");
            $products = fetchLocalAll("SELECT id_product, product_name, product_code FROM products WHERE is_active = 1 ORDER BY product_name");
            
            $movementTypes = [
                'purchase' => 'Achat',
                'sale' => 'Vente',
                'adjustment' => 'Ajustement',
                'transfer' => 'Transfert',
                'return' => 'Retour',
                'damage' => 'Dégât',
                'inventory' => 'Inventaire'
            ];
            
            $data = [
                'movements' => $movements,
                'pagination' => [
                    'current_page' => $page,
                    'total_pages' => $totalPages,
                    'total_items' => $total,
                    'items_per_page' => $limit
                ],
                'filters' => [
                    'search' => $search,
                    'type' => $type,
                    'warehouse' => $warehouse,
                    'product' => $product,
                    'date_from' => $dateFrom,
                    'date_to' => $dateTo
                ],
                'warehouses' => $warehouses,
                'products' => $products,
                'movementTypes' => $movementTypes
            ];
            
            $this->renderView('alerts/historique-mouvements', $data);
            
        } catch (Exception $e) {
            $this->handleError('Erreur chargement historique: ' . $e->getMessage());
        }
    }
    
    // Alertes de stock
    public function alertesStock() {
        try {
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $limit = 20;
            $offset = ($page - 1) * $limit;
            
            $type = isset($_GET['type']) ? sanitizeInput($_GET['type']) : '';
            $warehouse = isset($_GET['warehouse']) ? (int)$_GET['warehouse'] : 0;
            $resolved = isset($_GET['resolved']) ? $_GET['resolved'] : '';
            
            $where = [];
            $params = [];
            
            if ($type !== '') {
                $where[] = "sa.alert_type = ?";
                $params[] = $type;
            }
            
            if ($warehouse > 0) {
                $where[] = "sa.id_warehouse = ?";
                $params[] = $warehouse;
            }
            
            if ($resolved !== '') {
                $where[] = "sa.is_resolved = ?";
                $params[] = $resolved === '1' ? 1 : 0;
            }
            
            $whereSql = empty($where) ? '' : ('WHERE ' . implode(' AND ', $where));
            
            $sql = "SELECT 
                        sa.*,
                        p.product_name,
                        p.product_code,
                        p.unit_measure,
                        w.warehouse_name
                    FROM stock_alerts sa
                    LEFT JOIN products p ON sa.id_product = p.id_product
                    LEFT JOIN warehouses w ON sa.id_warehouse = w.id_warehouse
                    {$whereSql}
                    ORDER BY sa.created_at DESC
                    LIMIT {$limit} OFFSET {$offset}";
            
            $alerts = fetchLocalAll($sql, $params);
            
            $countSql = "SELECT COUNT(*) as total FROM stock_alerts sa {$whereSql}";
            $total = fetchLocalOne($countSql, $params)['total'] ?? 0;
            $totalPages = (int)ceil($total / $limit);
            
            // Récupérer les filtres
            $warehouses = fetchLocalAll("SELECT id_warehouse, warehouse_name FROM warehouses WHERE is_active = 1 ORDER BY warehouse_name");
            
            $alertTypes = [
                'low_stock' => 'Stock faible',
                'out_of_stock' => 'Rupture de stock',
                'overstock' => 'Surstock',
                'expiry_soon' => 'Péremption proche'
            ];
            
            $data = [
                'alerts' => $alerts,
                'pagination' => [
                    'current_page' => $page,
                    'total_pages' => $totalPages,
                    'total_items' => $total,
                    'items_per_page' => $limit
                ],
                'filters' => [
                    'type' => $type,
                    'warehouse' => $warehouse,
                    'resolved' => $resolved
                ],
                'warehouses' => $warehouses,
                'alertTypes' => $alertTypes
            ];
            
            $this->renderView('alerts/alertes-stock', $data);
            
        } catch (Exception $e) {
            $this->handleError('Erreur chargement alertes: ' . $e->getMessage());
        }
    }
    
    // Marquer une alerte comme résolue
    public function resoudreAlerte($id) {
        try {
            $alertId = (int)$id;
            
            $alert = fetchLocalOne("SELECT * FROM stock_alerts WHERE id_alert = ?", [$alertId]);
            if (!$alert) {
                throw new Exception('Alerte introuvable');
            }
            
            if ($alert['is_resolved']) {
                throw new Exception('Alerte déjà résolue');
            }
            
            executeLocalQuery(
                "UPDATE stock_alerts SET is_resolved = 1, resolved_at = CURRENT_TIMESTAMP WHERE id_alert = ?",
                [$alertId]
            );
            
            $_SESSION['success_message'] = 'Alerte marquée comme résolue';
            header('Location: /alerts/stock');
            exit;
            
        } catch (Exception $e) {
            $this->handleError('Erreur résolution alerte: ' . $e->getMessage());
        }
    }
    
    // Générer les alertes de stock
    public function genererAlertes() {
        try {
            // Supprimer les anciennes alertes non résolues
            executeLocalQuery("DELETE FROM stock_alerts WHERE is_resolved = 0");
            
            // Récupérer tous les stocks
            $sql = "SELECT 
                        ws.*,
                        p.product_name,
                        p.product_code,
                        p.min_stock_level,
                        p.max_stock_level
                    FROM warehouse_stock ws
                    JOIN products p ON ws.id_product = p.id_product
                    JOIN warehouses w ON ws.id_warehouse = w.id_warehouse
                    WHERE p.is_active = 1 AND w.is_active = 1";
            
            $stocks = fetchLocalAll($sql);
            
            $alertsCreated = 0;
            
            foreach ($stocks as $stock) {
                $currentQuantity = (int)$stock['current_quantity'];
                $minLevel = (int)$stock['min_stock_level'];
                $maxLevel = (int)$stock['max_stock_level'];
                
                // Stock faible
                if ($currentQuantity <= $minLevel && $currentQuantity > 0) {
                    $this->createAlert($stock, 'low_stock', $currentQuantity, $minLevel);
                    $alertsCreated++;
                }
                
                // Rupture de stock
                if ($currentQuantity <= 0) {
                    $this->createAlert($stock, 'out_of_stock', $currentQuantity, 0);
                    $alertsCreated++;
                }
                
                // Surstock
                if ($maxLevel > 0 && $currentQuantity >= $maxLevel) {
                    $this->createAlert($stock, 'overstock', $currentQuantity, $maxLevel);
                    $alertsCreated++;
                }
            }
            
            $_SESSION['success_message'] = "{$alertsCreated} alertes générées avec succès";
            header('Location: /alerts/stock');
            exit;
            
        } catch (Exception $e) {
            $this->handleError('Erreur génération alertes: ' . $e->getMessage());
        }
    }
    
    private function createAlert($stock, $type, $currentQuantity, $thresholdQuantity) {
        executeLocalQuery(
            "INSERT INTO stock_alerts (id_warehouse, id_product, alert_type, current_quantity, threshold_quantity, is_resolved) 
             VALUES (?, ?, ?, ?, ?, 0)",
            [$stock['id_warehouse'], $stock['id_product'], $type, $currentQuantity, $thresholdQuantity]
        );
    }
    
    // Dashboard des alertes
    public function dashboardAlertes() {
        try {
            // Statistiques générales
            $stats = [
                'total_alerts' => fetchLocalOne("SELECT COUNT(*) as count FROM stock_alerts")['count'] ?? 0,
                'unresolved_alerts' => fetchLocalOne("SELECT COUNT(*) as count FROM stock_alerts WHERE is_resolved = 0")['count'] ?? 0,
                'low_stock_alerts' => fetchLocalOne("SELECT COUNT(*) as count FROM stock_alerts WHERE alert_type = 'low_stock' AND is_resolved = 0")['count'] ?? 0,
                'out_of_stock_alerts' => fetchLocalOne("SELECT COUNT(*) as count FROM stock_alerts WHERE alert_type = 'out_of_stock' AND is_resolved = 0")['count'] ?? 0,
                'overstock_alerts' => fetchLocalOne("SELECT COUNT(*) as count FROM stock_alerts WHERE alert_type = 'overstock' AND is_resolved = 0")['count'] ?? 0
            ];
            
            // Alertes récentes
            $recentAlerts = fetchLocalAll(
                "SELECT sa.*, p.product_name, p.product_code, w.warehouse_name
                 FROM stock_alerts sa
                 LEFT JOIN products p ON sa.id_product = p.id_product
                 LEFT JOIN warehouses w ON sa.id_warehouse = w.id_warehouse
                 WHERE sa.is_resolved = 0
                 ORDER BY sa.created_at DESC
                 LIMIT 10"
            );
            
            // Mouvements récents
            $recentMovements = fetchLocalAll(
                "SELECT sm.*, p.product_name, p.product_code, w.warehouse_name
                 FROM stock_movements sm
                 LEFT JOIN products p ON sm.id_product = p.id_product
                 LEFT JOIN warehouses w ON sm.id_warehouse = w.id_warehouse
                 ORDER BY sm.movement_date DESC
                 LIMIT 10"
            );
            
            // Produits avec stock faible
            $lowStockProducts = fetchLocalAll(
                "SELECT 
                    p.product_name,
                    p.product_code,
                    w.warehouse_name,
                    ws.current_quantity,
                    p.min_stock_level
                 FROM warehouse_stock ws
                 JOIN products p ON ws.id_product = p.id_product
                 JOIN warehouses w ON ws.id_warehouse = w.id_warehouse
                 WHERE ws.current_quantity <= p.min_stock_level 
                 AND p.is_active = 1 AND w.is_active = 1
                 ORDER BY (ws.current_quantity - p.min_stock_level) ASC
                 LIMIT 10"
            );
            
            $data = [
                'stats' => $stats,
                'recentAlerts' => $recentAlerts,
                'recentMovements' => $recentMovements,
                'lowStockProducts' => $lowStockProducts
            ];
            
            $this->renderView('alerts/dashboard', $data);
            
        } catch (Exception $e) {
            $this->handleError('Erreur chargement dashboard: ' . $e->getMessage());
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
        header('Location: /alerts');
        exit;
    }
}

?>
