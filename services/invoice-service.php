<?php

require_once __DIR__ . '/../configs/database-config.php';
require_once __DIR__ . '/../configs/api-config.php';
require_once __DIR__ . '/../configs/utils.php';

function createInvoiceForSaleId(int $saleId): array {
    $sale = fetchLocalOne("SELECT * FROM sales WHERE id_sale = ?", [$saleId]);
    if (!$sale) {
        return ['success' => false, 'message' => 'Vente introuvable'];
    }

    // Récupérer les détails
    $saleDetails = fetchLocalAll(
        "SELECT sd.*, p.product_name, p.product_code, p.unit_price
         FROM sale_details sd
         LEFT JOIN products p ON sd.id_product = p.id_product
         WHERE sd.id_sale = ?",
        [$saleId]
    );

    $invoiceData = [
        'client_code' => $sale['client_api_id'],
        'client_name' => $sale['client_name'],
        'invoice_date' => $sale['sale_date'],
        'due_date' => date('Y-m-d', strtotime($sale['sale_date'] . ' +30 days')),
        'notes' => $sale['notes'] ?? '',
        'reference' => $sale['sale_number'],
        'items' => []
    ];

    foreach ($saleDetails as $detail) {
        $invoiceData['items'][] = [
            'product_code' => $detail['product_code'],
            'product_name' => $detail['product_name'],
            'quantity' => $detail['quantity_ordered'],
            'unit_price' => $detail['unit_price'],
            'total_price' => $detail['total_price']
        ];
    }

    try {
        $apiResponse = makeApiCall('/invoices', 'POST', $invoiceData);
        if ($apiResponse && isset($apiResponse['id'])) {
            executeLocalQuery(
                "UPDATE sales SET invoice_created = 1, invoice_id = ?, updated_at = CURRENT_TIMESTAMP WHERE id_sale = ?",
                [$apiResponse['id'], $saleId]
            );
            return ['success' => true, 'id' => $apiResponse['id']];
        }
        return ['success' => false, 'message' => $apiResponse['message'] ?? 'Réponse API invalide'];
    } catch (Exception $e) {
        return ['success' => false, 'message' => $e->getMessage()];
    }
}

?>


