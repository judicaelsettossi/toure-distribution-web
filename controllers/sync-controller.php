<?php

require_once __DIR__ . '/../configs/database-config.php';
require_once __DIR__ . '/../configs/api-config.php';
require_once __DIR__ . '/../configs/utils.php';
require_once __DIR__ . '/../services/invoice-service.php';

class SyncController {
    
    public function __construct() {
        autoInitializeDatabase();
    }
    
    // Dashboard de synchronisation
    public function dashboardSync() {
        try {
            // Statistiques de synchronisation
            $stats = [
                'products_local' => fetchLocalOne("SELECT COUNT(*) as count FROM products WHERE is_active = 1")['count'] ?? 0,
                'products_api' => 0,
                'clients_local' => fetchLocalOne("SELECT COUNT(*) as count FROM clients WHERE is_active = 1")['count'] ?? 0,
                'clients_api' => 0,
                'invoices_created' => fetchLocalOne("SELECT COUNT(*) as count FROM sales WHERE invoice_created = 1")['count'] ?? 0,
                'last_sync' => fetchLocalOne("SELECT MAX(updated_at) as last_sync FROM products")['last_sync'] ?? null
            ];
            
            // Tentative de récupération des données API
            try {
                $apiProducts = makeApiCall('/products?limit=1');
                $stats['products_api'] = $apiProducts['total'] ?? 0;
                
                $apiClients = makeApiCall('/clients?limit=1');
                $stats['clients_api'] = $apiClients['total'] ?? 0;
            } catch (Exception $e) {
                // API non disponible, on garde les valeurs par défaut
            }
            
            // Dernières synchronisations
            $recentSyncs = fetchLocalAll(
                "SELECT 'products' as type, COUNT(*) as count, MAX(updated_at) as last_sync 
                 FROM products WHERE updated_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)
                 UNION ALL
                 SELECT 'clients' as type, COUNT(*) as count, MAX(updated_at) as last_sync 
                 FROM clients WHERE updated_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)
                 ORDER BY last_sync DESC"
            );
            
            $data = [
                'stats' => $stats,
                'recentSyncs' => $recentSyncs
            ];
            
            $this->renderView('sync/dashboard', $data);
            
        } catch (Exception $e) {
            $this->handleError('Erreur chargement dashboard: ' . $e->getMessage());
        }
    }
    
    // Synchroniser les produits depuis l'API
    public function syncProducts() {
        try {
            $page = 1;
            $limit = 100;
            $totalImported = 0;
            $totalUpdated = 0;
            $errors = [];
            
            do {
                $apiData = makeApiCall("/products?page={$page}&limit={$limit}");
                
                if (empty($apiData['data'])) {
                    break;
                }
                
                foreach ($apiData['data'] as $apiProduct) {
                    try {
                        $existingProduct = fetchLocalOne(
                            "SELECT id_product FROM products WHERE product_code = ?",
                            [$apiProduct['code']]
                        );
                        
                        if ($existingProduct) {
                            // Mettre à jour le produit existant
                            executeLocalQuery(
                                "UPDATE products SET 
                                    product_name = ?, 
                                    description = ?, 
                                    unit_price = ?, 
                                    cost_price = ?,
                                    unit_measure = ?,
                                    min_stock_level = ?,
                                    max_stock_level = ?,
                                    is_active = ?,
                                    updated_at = CURRENT_TIMESTAMP
                                 WHERE product_code = ?",
                                [
                                    $apiProduct['name'],
                                    $apiProduct['description'] ?? '',
                                    $apiProduct['unit_price'] ?? 0,
                                    $apiProduct['cost_price'] ?? 0,
                                    $apiProduct['unit_measure'] ?? 'pièce',
                                    $apiProduct['min_stock_level'] ?? 0,
                                    $apiProduct['max_stock_level'] ?? 0,
                                    $apiProduct['is_active'] ? 1 : 0,
                                    $apiProduct['code']
                                ]
                            );
                            $totalUpdated++;
                        } else {
                            // Créer un nouveau produit
                            executeLocalQuery(
                                "INSERT INTO products (product_name, product_code, description, unit_price, cost_price, unit_measure, min_stock_level, max_stock_level, is_active) 
                                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)",
                                [
                                    $apiProduct['name'],
                                    $apiProduct['code'],
                                    $apiProduct['description'] ?? '',
                                    $apiProduct['unit_price'] ?? 0,
                                    $apiProduct['cost_price'] ?? 0,
                                    $apiProduct['unit_measure'] ?? 'pièce',
                                    $apiProduct['min_stock_level'] ?? 0,
                                    $apiProduct['max_stock_level'] ?? 0,
                                    $apiProduct['is_active'] ? 1 : 0
                                ]
                            );
                            $totalImported++;
                        }
                    } catch (Exception $e) {
                        $errors[] = "Erreur produit {$apiProduct['code']}: " . $e->getMessage();
                    }
                }
                
                $page++;
                
            } while (count($apiData['data']) === $limit);
            
            $message = "Synchronisation terminée: {$totalImported} produits importés, {$totalUpdated} produits mis à jour";
            if (!empty($errors)) {
                $message .= ". " . count($errors) . " erreurs rencontrées.";
            }
            
            $_SESSION['success_message'] = $message;
            header('Location: /sync');
            exit;
            
        } catch (Exception $e) {
            $this->handleError('Erreur synchronisation produits: ' . $e->getMessage());
        }
    }
    
    // Synchroniser les clients depuis l'API
    public function syncClients() {
        try {
            $page = 1;
            $limit = 100;
            $totalImported = 0;
            $totalUpdated = 0;
            $errors = [];
            
            do {
                $apiData = makeApiCall("/clients?page={$page}&limit={$limit}");
                
                if (empty($apiData['data'])) {
                    break;
                }
                
                foreach ($apiData['data'] as $apiClient) {
                    try {
                        $existingClient = fetchLocalOne(
                            "SELECT id_client FROM clients WHERE client_code = ?",
                            [$apiClient['code']]
                        );
                        
                        if ($existingClient) {
                            // Mettre à jour le client existant
                            executeLocalQuery(
                                "UPDATE clients SET 
                                    client_name = ?, 
                                    email = ?, 
                                    phone = ?,
                                    address = ?,
                                    city = ?,
                                    country = ?,
                                    is_active = ?,
                                    updated_at = CURRENT_TIMESTAMP
                                 WHERE client_code = ?",
                                [
                                    $apiClient['name'],
                                    $apiClient['email'] ?? '',
                                    $apiClient['phone'] ?? '',
                                    $apiClient['address'] ?? '',
                                    $apiClient['city'] ?? '',
                                    $apiClient['country'] ?? '',
                                    $apiClient['is_active'] ? 1 : 0,
                                    $apiClient['code']
                                ]
                            );
                            $totalUpdated++;
                        } else {
                            // Créer un nouveau client
                            executeLocalQuery(
                                "INSERT INTO clients (client_name, client_code, email, phone, address, city, country, is_active) 
                                 VALUES (?, ?, ?, ?, ?, ?, ?, ?)",
                                [
                                    $apiClient['name'],
                                    $apiClient['code'],
                                    $apiClient['email'] ?? '',
                                    $apiClient['phone'] ?? '',
                                    $apiClient['address'] ?? '',
                                    $apiClient['city'] ?? '',
                                    $apiClient['country'] ?? '',
                                    $apiClient['is_active'] ? 1 : 0
                                ]
                            );
                            $totalImported++;
                        }
                    } catch (Exception $e) {
                        $errors[] = "Erreur client {$apiClient['code']}: " . $e->getMessage();
                    }
                }
                
                $page++;
                
            } while (count($apiData['data']) === $limit);
            
            $message = "Synchronisation terminée: {$totalImported} clients importés, {$totalUpdated} clients mis à jour";
            if (!empty($errors)) {
                $message .= ". " . count($errors) . " erreurs rencontrées.";
            }
            
            $_SESSION['success_message'] = $message;
            header('Location: /sync');
            exit;
            
        } catch (Exception $e) {
            $this->handleError('Erreur synchronisation clients: ' . $e->getMessage());
        }
    }
    
    // Créer des factures via l'API
    public function creerFactures() {
        try {
            // Récupérer les ventes livrées sans facture
            $sales = fetchLocalAll(
                "SELECT s.*, s.client_name, s.client_api_id as client_code
                 FROM sales s
                 WHERE s.statut = 'delivered' AND (s.invoice_created = 0 OR s.invoice_created IS NULL)
                 ORDER BY s.sale_date DESC"
            );
            
            if (empty($sales)) {
                $_SESSION['info_message'] = 'Aucune vente à facturer';
                header('Location: /sync');
                exit;
            }
            
            $totalCreated = 0;
            $errors = [];
            
            foreach ($sales as $sale) {
                try {
                    $res = createInvoiceForSaleId((int)$sale['id_sale']);
                    if ($res['success'] ?? false) {
                        $totalCreated++;
                    } else {
                        $errors[] = "Erreur création facture pour vente #{$sale['sale_number']}: " . ($res['message'] ?? 'Erreur inconnue');
                    }
                    
                } catch (Exception $e) {
                    $errors[] = "Erreur facture vente #{$sale['sale_number']}: " . $e->getMessage();
                }
            }
            
            $message = "Création terminée: {$totalCreated} factures créées";
            if (!empty($errors)) {
                $message .= ". " . count($errors) . " erreurs rencontrées.";
            }
            
            $_SESSION['success_message'] = $message;
            header('Location: /sync');
            exit;
            
        } catch (Exception $e) {
            $this->handleError('Erreur création factures: ' . $e->getMessage());
        }
    }
    
    // Liste des factures créées
    public function listeFactures() {
        try {
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $limit = 20;
            $offset = ($page - 1) * $limit;
            
            $search = isset($_GET['search']) ? sanitizeInput($_GET['search']) : '';
            $dateFrom = isset($_GET['date_from']) ? $_GET['date_from'] : '';
            $dateTo = isset($_GET['date_to']) ? $_GET['date_to'] : '';
            
            $where = [];
            $params = [];
            
            if ($search !== '') {
                $where[] = "(s.sale_number LIKE ? OR c.client_name LIKE ? OR s.invoice_id LIKE ?)";
                $term = "%{$search}%";
                array_push($params, $term, $term, $term);
            }
            
            if ($dateFrom !== '') {
                $where[] = "DATE(s.sale_date) >= ?";
                $params[] = $dateFrom;
            }
            
            if ($dateTo !== '') {
                $where[] = "DATE(s.sale_date) <= ?";
                $params[] = $dateTo;
            }
            
            $where[] = "s.invoice_created = 1";
            $whereSql = 'WHERE ' . implode(' AND ', $where);
            
            $sql = "SELECT 
                        s.*,
                        s.client_name,
                        s.client_api_id as client_code
                    FROM sales s
                    {$whereSql}
                    ORDER BY s.sale_date DESC
                    LIMIT {$limit} OFFSET {$offset}";
            
            $invoices = fetchLocalAll($sql, $params);
            
            $countSql = "SELECT COUNT(*) as total FROM sales s {$whereSql}";
            $total = fetchLocalOne($countSql, $params)['total'] ?? 0;
            $totalPages = (int)ceil($total / $limit);
            
            $data = [
                'invoices' => $invoices,
                'pagination' => [
                    'current_page' => $page,
                    'total_pages' => $totalPages,
                    'total_items' => $total,
                    'items_per_page' => $limit
                ],
                'filters' => [
                    'search' => $search,
                    'date_from' => $dateFrom,
                    'date_to' => $dateTo
                ]
            ];
            
            $this->renderView('sync/factures', $data);
            
        } catch (Exception $e) {
            $this->handleError('Erreur chargement factures: ' . $e->getMessage());
        }
    }
    
    // Détails d'une facture
    public function detailsFacture($id) {
        try {
            $sale = fetchLocalOne(
                "SELECT s.*, s.client_name, s.client_api_id as client_code
                 FROM sales s
                 WHERE s.id_sale = ? AND s.invoice_created = 1",
                [(int)$id]
            );
            
            if (!$sale) {
                throw new Exception('Facture introuvable');
            }
            
            $details = fetchLocalAll(
                "SELECT sd.*, p.product_name, p.product_code, p.unit_measure
                 FROM sale_details sd
                 LEFT JOIN products p ON sd.id_product = p.id_product
                 WHERE sd.id_sale = ?
                 ORDER BY sd.id_sale_detail",
                [(int)$id]
            );
            
            $data = [
                'sale' => $sale,
                'details' => $details
            ];
            
            $this->renderView('sync/details-facture', $data);
            
        } catch (Exception $e) {
            $this->handleError('Erreur chargement détails: ' . $e->getMessage());
        }
    }
    
    // Synchronisation complète
    public function syncComplete() {
        try {
            $results = [
                'products' => ['imported' => 0, 'updated' => 0, 'errors' => 0],
                'clients' => ['imported' => 0, 'updated' => 0, 'errors' => 0],
                'invoices' => ['created' => 0, 'errors' => 0]
            ];
            
            // Synchroniser les produits
            try {
                $this->syncProducts();
                $results['products']['imported'] = 1; // Simplifié pour l'exemple
            } catch (Exception $e) {
                $results['products']['errors'] = 1;
            }
            
            // Synchroniser les clients
            try {
                $this->syncClients();
                $results['clients']['imported'] = 1; // Simplifié pour l'exemple
            } catch (Exception $e) {
                $results['clients']['errors'] = 1;
            }
            
            // Créer les factures
            try {
                $this->creerFactures();
                $results['invoices']['created'] = 1; // Simplifié pour l'exemple
            } catch (Exception $e) {
                $results['invoices']['errors'] = 1;
            }
            
            $data = ['results' => $results];
            $this->renderView('sync/resultat-sync', $data);
            
        } catch (Exception $e) {
            $this->handleError('Erreur synchronisation complète: ' . $e->getMessage());
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
        header('Location: /sync');
        exit;
    }
}

?>
