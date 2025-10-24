<?php

require_once __DIR__ . '/../configs/database-config.php';
require_once __DIR__ . '/../configs/utils.php';

class DashboardController {

    public function __construct() {
        autoInitializeDatabase();
    }

    public function index() {
        try {
            // KPIs
            $kpis = [
                'total_sales' => (float)(fetchLocalOne("SELECT COALESCE(SUM(total_amount),0) AS s FROM sales")['s'] ?? 0),
                'pending_sales' => (int)(fetchLocalOne("SELECT COUNT(*) AS c FROM sales WHERE statut='pending'")['c'] ?? 0),
                'delivered_sales' => (int)(fetchLocalOne("SELECT COUNT(*) AS c FROM sales WHERE statut='delivered'")['c'] ?? 0),
                'products' => (int)(fetchLocalOne("SELECT COUNT(*) AS c FROM products WHERE is_active=1")['c'] ?? 0),
                'warehouses' => (int)(fetchLocalOne("SELECT COUNT(*) AS c FROM warehouses WHERE is_active=1")['c'] ?? 0),
                'low_stock' => (int)(fetchLocalOne("SELECT COUNT(*) AS c FROM warehouse_stock ws JOIN products p ON p.id_product=ws.id_product WHERE ws.current_quantity <= p.min_stock_level")['c'] ?? 0)
            ];

            // Recent data
            $recentSales = fetchLocalAll(
                "SELECT id_sale, sale_number, client_name, total_amount, statut, sale_date FROM sales ORDER BY created_at DESC LIMIT 10"
            );
            $recentPurchases = fetchLocalAll(
                "SELECT id_purchase, purchase_number, supplier_name, total_amount, statut, purchase_date FROM purchases ORDER BY created_at DESC LIMIT 10"
            );

            // Stock overview
            $stockOverview = fetchLocalAll(
                "SELECT p.product_name, p.product_code, SUM(ws.current_quantity) AS qty
                 FROM products p LEFT JOIN warehouse_stock ws ON ws.id_product=p.id_product
                 GROUP BY p.id_product ORDER BY qty DESC NULLS LAST LIMIT 10"
            );

            // Alerts
            $alerts = fetchLocalAll(
                "SELECT sa.*, p.product_name, w.warehouse_name
                 FROM stock_alerts sa LEFT JOIN products p ON p.id_product=sa.id_product LEFT JOIN warehouses w ON w.id_warehouse=sa.id_warehouse
                 WHERE sa.is_resolved=0 ORDER BY sa.created_at DESC LIMIT 10"
            );

            $this->renderView('dashboard/index', [
                'kpis' => $kpis,
                'recentSales' => $recentSales,
                'recentPurchases' => $recentPurchases,
                'stockOverview' => $stockOverview,
                'alerts' => $alerts
            ]);
        } catch (Exception $e) {
            $this->handleError('Erreur chargement tableau de bord: ' . $e->getMessage());
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
        http_response_code(500);
        echo $message;
        exit;
    }
}

?>


