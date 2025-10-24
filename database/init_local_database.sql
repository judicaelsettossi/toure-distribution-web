-- ============================================
-- BASE DE DONNÉES LOCALE - TOURE DISTRIBUTION
-- Gestion autonome: Achats, Ventes, Stock
-- ============================================

-- Créer la base de données si elle n'existe pas
CREATE DATABASE IF NOT EXISTS toure_distribution CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE toure_distribution;

-- TABLE DES ENTREPÔTS
CREATE TABLE IF NOT EXISTS warehouses (
    id_warehouse INT PRIMARY KEY AUTO_INCREMENT,
    warehouse_name VARCHAR(100) NOT NULL UNIQUE,
    location VARCHAR(255) NOT NULL,
    capacity INT DEFAULT 0,
    phone VARCHAR(20),
    email VARCHAR(100),
    manager_name VARCHAR(100),
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- TABLE DES PRODUITS LOCAUX (référence l'API via product_id)
CREATE TABLE IF NOT EXISTS products (
    id_product INT PRIMARY KEY AUTO_INCREMENT,
    product_api_id VARCHAR(36),  -- UUID de l'API
    product_name VARCHAR(100) NOT NULL,
    product_code VARCHAR(50) UNIQUE NOT NULL,
    description TEXT,
    unit_price DECIMAL(15,2) NOT NULL,
    cost_price DECIMAL(15,2) NOT NULL,
    unit_measure VARCHAR(20),
    min_stock_level INT DEFAULT 0,
    max_stock_level INT DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_api_id (product_api_id),
    INDEX idx_code (product_code)
);

-- TABLE DES STOCKS PAR ENTREPÔT
CREATE TABLE IF NOT EXISTS warehouse_stock (
    id_warehouse_stock INT PRIMARY KEY AUTO_INCREMENT,
    id_warehouse INT NOT NULL,
    id_product INT NOT NULL,
    current_quantity INT DEFAULT 0,
    reserved_quantity INT DEFAULT 0,  -- Réservé pour les ventes
    available_quantity INT DEFAULT 0, -- Disponible = current - reserved
    last_stock_update TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_warehouse) REFERENCES warehouses(id_warehouse) ON DELETE CASCADE,
    FOREIGN KEY (id_product) REFERENCES products(id_product) ON DELETE CASCADE,
    UNIQUE KEY unique_warehouse_product (id_warehouse, id_product),
    INDEX idx_warehouse (id_warehouse),
    INDEX idx_product (id_product)
);

-- TABLE DES FOURNISSEURS
CREATE TABLE IF NOT EXISTS suppliers (
    id_supplier INT PRIMARY KEY AUTO_INCREMENT,
    supplier_name VARCHAR(100) NOT NULL UNIQUE,
    contact_person VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(20),
    address TEXT,
    city VARCHAR(50),
    country VARCHAR(50),
    payment_terms VARCHAR(100),
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_name (supplier_name)
);

-- TABLE DES CLIENTS
CREATE TABLE IF NOT EXISTS clients (
    id_client INT PRIMARY KEY AUTO_INCREMENT,
    client_name VARCHAR(255) NOT NULL,
    client_code VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(255),
    phone VARCHAR(20),
    address TEXT,
    city VARCHAR(100),
    country VARCHAR(100),
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_name (client_name),
    INDEX idx_code (client_code)
);

-- TABLE DES ACHATS (Commandes fournisseurs)
CREATE TABLE IF NOT EXISTS purchases (
    id_purchase INT PRIMARY KEY AUTO_INCREMENT,
    purchase_number VARCHAR(50) UNIQUE NOT NULL,
    id_supplier INT NOT NULL,
    id_warehouse INT NOT NULL,
    purchase_date DATE NOT NULL,
    expected_delivery_date DATE,
    actual_delivery_date DATE,
    total_amount DECIMAL(15,2) NOT NULL,
    paid_amount DECIMAL(15,2) DEFAULT 0,
    statut ENUM('pending', 'confirmed', 'partially_received', 'received', 'cancelled') DEFAULT 'pending',
    notes TEXT,
    user_id VARCHAR(36),  -- UUID de l'utilisateur API
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_supplier) REFERENCES suppliers(id_supplier),
    FOREIGN KEY (id_warehouse) REFERENCES warehouses(id_warehouse),
    INDEX idx_number (purchase_number),
    INDEX idx_supplier (id_supplier),
    INDEX idx_statut (statut),
    INDEX idx_date (purchase_date)
);

-- TABLE DES DÉTAILS D'ACHATS
CREATE TABLE IF NOT EXISTS purchase_details (
    id_purchase_detail INT PRIMARY KEY AUTO_INCREMENT,
    id_purchase INT NOT NULL,
    id_product INT NOT NULL,
    quantity_ordered INT NOT NULL,
    quantity_received INT DEFAULT 0,
    unit_price DECIMAL(15,2) NOT NULL,
    total_price DECIMAL(15,2) NOT NULL,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_purchase) REFERENCES purchases(id_purchase) ON DELETE CASCADE,
    FOREIGN KEY (id_product) REFERENCES products(id_product),
    INDEX idx_purchase (id_purchase),
    INDEX idx_product (id_product)
);

-- TABLE DES VENTES (Commandes clients)
CREATE TABLE IF NOT EXISTS sales (
    id_sale INT PRIMARY KEY AUTO_INCREMENT,
    sale_number VARCHAR(50) UNIQUE NOT NULL,
    warehouse_id INT,
    client_api_id VARCHAR(36) NOT NULL,  -- UUID du client via l'API
    client_name VARCHAR(100),
    sale_date DATE NOT NULL,
    delivery_date DATE,
    total_amount DECIMAL(15,2) NOT NULL,
    paid_amount DECIMAL(15,2) DEFAULT 0,
    discount_amount DECIMAL(15,2) DEFAULT 0,
    tax_rate DECIMAL(5,2) DEFAULT 0,
    transport_cost DECIMAL(15,2) DEFAULT 0,
    statut ENUM('pending', 'confirmed', 'partially_delivered', 'delivered', 'cancelled', 'returned') DEFAULT 'pending',
    notes TEXT,
    invoice_created BOOLEAN DEFAULT FALSE,
    invoice_id VARCHAR(50),
    user_id VARCHAR(36),  -- UUID de l'utilisateur API
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_number (sale_number),
    INDEX idx_client (client_api_id),
    INDEX idx_statut (statut),
    INDEX idx_date (sale_date)
);

-- TABLE DES DÉTAILS DE VENTES
CREATE TABLE IF NOT EXISTS sale_details (
    id_sale_detail INT PRIMARY KEY AUTO_INCREMENT,
    id_sale INT NOT NULL,
    id_product INT NOT NULL,
    quantity_ordered INT NOT NULL,
    quantity_delivered INT DEFAULT 0,
    unit_price DECIMAL(15,2) NOT NULL,
    total_price DECIMAL(15,2) NOT NULL,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_sale) REFERENCES sales(id_sale) ON DELETE CASCADE,
    FOREIGN KEY (id_product) REFERENCES products(id_product),
    INDEX idx_sale (id_sale),
    INDEX idx_product (id_product)
);

-- TABLE DES MOUVEMENTS DE STOCK
CREATE TABLE IF NOT EXISTS stock_movements (
    id_movement INT PRIMARY KEY AUTO_INCREMENT,
    id_warehouse INT NOT NULL,
    id_product INT NOT NULL,
    movement_type ENUM('purchase', 'sale', 'adjustment', 'transfer', 'return', 'damage', 'inventory') DEFAULT 'adjustment',
    quantity_change INT NOT NULL,  -- Positif ou négatif
    quantity_before INT NOT NULL,
    quantity_after INT NOT NULL,
    reference_id INT,  -- ID de l'achat ou vente
    reference_type VARCHAR(50),  -- 'purchase', 'sale', 'transfer'
    reason TEXT,
    user_id VARCHAR(36),
    movement_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_warehouse (id_warehouse),
    INDEX idx_product (id_product),
    INDEX idx_type (movement_type),
    INDEX idx_date (movement_date),
    FOREIGN KEY (id_warehouse) REFERENCES warehouses(id_warehouse),
    FOREIGN KEY (id_product) REFERENCES products(id_product)
);

-- TABLE DE TRANSFERT DE STOCK ENTRE ENTREPÔTS
CREATE TABLE IF NOT EXISTS stock_transfers (
    id_transfer INT PRIMARY KEY AUTO_INCREMENT,
    transfer_number VARCHAR(50) UNIQUE NOT NULL,
    id_warehouse_from INT NOT NULL,
    id_warehouse_to INT NOT NULL,
    transfer_date DATE NOT NULL,
    statut ENUM('pending', 'in_transit', 'received', 'cancelled') DEFAULT 'pending',
    notes TEXT,
    user_id VARCHAR(36),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_warehouse_from) REFERENCES warehouses(id_warehouse),
    FOREIGN KEY (id_warehouse_to) REFERENCES warehouses(id_warehouse),
    INDEX idx_number (transfer_number),
    INDEX idx_from (id_warehouse_from),
    INDEX idx_to (id_warehouse_to)
);

-- TABLE DES DÉTAILS DE TRANSFERT
CREATE TABLE IF NOT EXISTS transfer_details (
    id_transfer_detail INT PRIMARY KEY AUTO_INCREMENT,
    id_transfer INT NOT NULL,
    id_product INT NOT NULL,
    quantity_sent INT NOT NULL,
    quantity_received INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_transfer) REFERENCES stock_transfers(id_transfer) ON DELETE CASCADE,
    FOREIGN KEY (id_product) REFERENCES products(id_product),
    INDEX idx_transfer (id_transfer)
);

-- TABLE DES ALERTES DE STOCK
CREATE TABLE IF NOT EXISTS stock_alerts (
    id_alert INT PRIMARY KEY AUTO_INCREMENT,
    id_warehouse INT NOT NULL,
    id_product INT NOT NULL,
    alert_type ENUM('low_stock', 'out_of_stock', 'overstock', 'expiry_soon') DEFAULT 'low_stock',
    current_quantity INT,
    threshold_quantity INT,
    is_resolved BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    resolved_at TIMESTAMP NULL,
    FOREIGN KEY (id_warehouse) REFERENCES warehouses(id_warehouse),
    FOREIGN KEY (id_product) REFERENCES products(id_product),
    INDEX idx_warehouse (id_warehouse),
    INDEX idx_resolved (is_resolved)
);

-- VUES UTILES

-- Vue: Stock total par produit (tous entrepôts)
CREATE OR REPLACE VIEW v_total_stock_by_product AS
SELECT 
    p.id_product,
    p.product_name,
    p.product_code,
    SUM(ws.current_quantity) as total_quantity,
    SUM(ws.reserved_quantity) as total_reserved,
    SUM(ws.available_quantity) as total_available
FROM products p
LEFT JOIN warehouse_stock ws ON p.id_product = ws.id_product
GROUP BY p.id_product;

-- Vue: Stock par entrepôt
CREATE OR REPLACE VIEW v_warehouse_inventory AS
SELECT 
    w.id_warehouse,
    w.warehouse_name,
    p.id_product,
    p.product_name,
    p.product_code,
    ws.current_quantity,
    ws.reserved_quantity,
    ws.available_quantity,
    p.min_stock_level,
    p.max_stock_level
FROM warehouses w
JOIN warehouse_stock ws ON w.id_warehouse = ws.id_warehouse
JOIN products p ON ws.id_product = p.id_product
WHERE w.is_active = TRUE AND p.is_active = TRUE;

-- Vue: Achats en attente de livraison
CREATE OR REPLACE VIEW v_pending_purchases AS
SELECT 
    pu.id_purchase,
    pu.purchase_number,
    s.supplier_name,
    w.warehouse_name,
    pu.purchase_date,
    pu.expected_delivery_date,
    pu.total_amount,
    pu.statut,
    COUNT(pd.id_purchase_detail) as item_count
FROM purchases pu
JOIN suppliers s ON pu.id_supplier = s.id_supplier
JOIN warehouses w ON pu.id_warehouse = w.id_warehouse
LEFT JOIN purchase_details pd ON pu.id_purchase = pd.id_purchase
WHERE pu.statut IN ('pending', 'confirmed', 'partially_received')
GROUP BY pu.id_purchase;

-- Vue: Ventes en attente de livraison
CREATE OR REPLACE VIEW v_pending_sales AS
SELECT 
    sa.id_sale,
    sa.sale_number,
    sa.client_name,
    sa.sale_date,
    sa.delivery_date,
    sa.total_amount,
    sa.statut,
    COUNT(sd.id_sale_detail) as item_count
FROM sales sa
LEFT JOIN sale_details sd ON sa.id_sale = sd.id_sale
WHERE sa.statut IN ('pending', 'confirmed', 'partially_delivered')
GROUP BY sa.id_sale;

-- Données de test (optionnel)
-- Insérer quelques données de test pour commencer

-- Entrepôts de test
INSERT IGNORE INTO warehouses (warehouse_name, location, capacity, phone, email, manager_name) VALUES
('Entrepôt Principal', 'Abidjan, Côte d\'Ivoire', 10000, '+225 20 30 40 50', 'entrepot@toure.com', 'Jean Kouassi'),
('Entrepôt Secondaire', 'Bouaké, Côte d\'Ivoire', 5000, '+225 20 30 40 51', 'entrepot2@toure.com', 'Marie Traoré');

-- Fournisseurs de test
INSERT IGNORE INTO suppliers (supplier_name, contact_person, email, phone, address, city, country) VALUES
('Fournisseur ABC', 'M. Diallo', 'contact@abc.com', '+225 20 30 40 60', 'Zone Industrielle', 'Abidjan', 'Côte d\'Ivoire'),
('Distributeur XYZ', 'Mme Koné', 'info@xyz.com', '+225 20 30 40 61', 'Marcory', 'Abidjan', 'Côte d\'Ivoire');

-- Produits de test
INSERT IGNORE INTO products (product_name, product_code, description, unit_price, cost_price, unit_measure, min_stock_level, max_stock_level) VALUES
('Riz Basmati 5kg', 'RIZ001', 'Riz basmati de qualité supérieure', 15000.00, 12000.00, 'Sac', 10, 100),
('Huile de Palme 1L', 'HUI001', 'Huile de palme raffinée', 2500.00, 2000.00, 'Bouteille', 20, 200),
('Sucre en Poudre 1kg', 'SUC001', 'Sucre blanc cristallisé', 1500.00, 1200.00, 'Sachet', 15, 150),
('Farine de Blé 2kg', 'FAR001', 'Farine de blé T45', 3000.00, 2500.00, 'Sachet', 12, 120);

-- Stock initial
INSERT IGNORE INTO warehouse_stock (id_warehouse, id_product, current_quantity, available_quantity) VALUES
(1, 1, 50, 50),  -- Riz dans l'entrepôt principal
(1, 2, 100, 100), -- Huile dans l'entrepôt principal
(1, 3, 80, 80),   -- Sucre dans l'entrepôt principal
(1, 4, 60, 60),   -- Farine dans l'entrepôt principal
(2, 1, 25, 25),   -- Riz dans l'entrepôt secondaire
(2, 2, 50, 50);   -- Huile dans l'entrepôt secondaire
