-- ========================================
-- SCHÉMA DE BASE DE DONNÉES ERP COMPLET
-- Système de Gestion - Stock, Ventes, Commandes
-- ========================================

SET FOREIGN_KEY_CHECKS = 0;

-- ========================================
-- TABLE: UTILISATEURS
-- ========================================
CREATE TABLE IF NOT EXISTS `users` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(100) NOT NULL UNIQUE,
    `email` VARCHAR(150) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `firstname` VARCHAR(100),
    `lastname` VARCHAR(100),
    `phone` VARCHAR(20),
    `role` ENUM('admin', 'manager', 'user', 'stock_manager', 'sales_manager') DEFAULT 'user',
    `is_active` TINYINT(1) DEFAULT 1,
    `last_login_at` TIMESTAMP NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `deleted_at` TIMESTAMP NULL,
    INDEX `idx_email` (`email`),
    INDEX `idx_username` (`username`),
    INDEX `idx_role` (`role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- TABLE: CATÉGORIES DE PRODUITS
-- ========================================
CREATE TABLE IF NOT EXISTS `product_categories` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(150) NOT NULL,
    `code` VARCHAR(50) UNIQUE,
    `description` TEXT,
    `parent_id` INT UNSIGNED NULL,
    `is_active` TINYINT(1) DEFAULT 1,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `deleted_at` TIMESTAMP NULL,
    FOREIGN KEY (`parent_id`) REFERENCES `product_categories`(`id`) ON DELETE SET NULL,
    INDEX `idx_parent` (`parent_id`),
    INDEX `idx_code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- TABLE: UNITÉS DE MESURE
-- ========================================
CREATE TABLE IF NOT EXISTS `units` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `symbol` VARCHAR(20) NOT NULL,
    `type` ENUM('weight', 'length', 'volume', 'piece', 'time', 'other') DEFAULT 'piece',
    `is_active` TINYINT(1) DEFAULT 1,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX `idx_type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- TABLE: PRODUITS
-- ========================================
CREATE TABLE IF NOT EXISTS `products` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(200) NOT NULL,
    `code` VARCHAR(100) NOT NULL UNIQUE,
    `barcode` VARCHAR(100) UNIQUE,
    `description` TEXT,
    `category_id` INT UNSIGNED,
    `unit_id` INT UNSIGNED,
    `prix_achat` DECIMAL(15,2) DEFAULT 0.00,
    `prix_vente` DECIMAL(15,2) DEFAULT 0.00,
    `prix_vente_min` DECIMAL(15,2) DEFAULT 0.00,
    `tva` DECIMAL(5,2) DEFAULT 0.00,
    `stock_alert` INT DEFAULT 10,
    `stock_min` INT DEFAULT 0,
    `stock_max` INT DEFAULT 0,
    `is_perishable` TINYINT(1) DEFAULT 0,
    `shelf_life_days` INT DEFAULT NULL,
    `image_url` VARCHAR(255),
    `status` ENUM('actif', 'inactif', 'discontinue') DEFAULT 'actif',
    `notes` TEXT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `deleted_at` TIMESTAMP NULL,
    FOREIGN KEY (`category_id`) REFERENCES `product_categories`(`id`) ON DELETE SET NULL,
    FOREIGN KEY (`unit_id`) REFERENCES `units`(`id`) ON DELETE SET NULL,
    INDEX `idx_code` (`code`),
    INDEX `idx_barcode` (`barcode`),
    INDEX `idx_category` (`category_id`),
    INDEX `idx_status` (`status`),
    FULLTEXT INDEX `idx_search` (`name`, `description`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- TABLE: ENTREPÔTS
-- ========================================
CREATE TABLE IF NOT EXISTS `entrepots` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(150) NOT NULL,
    `code` VARCHAR(50) NOT NULL UNIQUE,
    `type` ENUM('principal', 'secondaire', 'transit', 'externe') DEFAULT 'secondaire',
    `address` VARCHAR(255),
    `city` VARCHAR(100),
    `country` VARCHAR(100) DEFAULT 'Sénégal',
    `phone` VARCHAR(20),
    `email` VARCHAR(150),
    `manager_id` INT UNSIGNED,
    `capacity` DECIMAL(15,2),
    `capacity_unit` VARCHAR(50),
    `is_active` TINYINT(1) DEFAULT 1,
    `notes` TEXT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `deleted_at` TIMESTAMP NULL,
    FOREIGN KEY (`manager_id`) REFERENCES `users`(`id`) ON DELETE SET NULL,
    INDEX `idx_code` (`code`),
    INDEX `idx_type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- TABLE: STOCKS PAR ENTREPÔT
-- ========================================
CREATE TABLE IF NOT EXISTS `stocks` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `product_id` INT UNSIGNED NOT NULL,
    `entrepot_id` INT UNSIGNED NOT NULL,
    `quantite_disponible` DECIMAL(15,2) DEFAULT 0.00,
    `quantite_reservee` DECIMAL(15,2) DEFAULT 0.00,
    `quantite_en_transit` DECIMAL(15,2) DEFAULT 0.00,
    `cout_moyen_unitaire` DECIMAL(15,2) DEFAULT 0.00,
    `valeur_stock` DECIMAL(15,2) DEFAULT 0.00,
    `emplacement` VARCHAR(100),
    `derniere_entree` TIMESTAMP NULL,
    `derniere_sortie` TIMESTAMP NULL,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`entrepot_id`) REFERENCES `entrepots`(`id`) ON DELETE CASCADE,
    UNIQUE KEY `unique_product_entrepot` (`product_id`, `entrepot_id`),
    INDEX `idx_product` (`product_id`),
    INDEX `idx_entrepot` (`entrepot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- TABLE: FOURNISSEURS
-- ========================================
CREATE TABLE IF NOT EXISTS `fournisseurs` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `code` VARCHAR(50) NOT NULL UNIQUE,
    `name` VARCHAR(200) NOT NULL,
    `type` ENUM('personne', 'entreprise') DEFAULT 'entreprise',
    `email` VARCHAR(150),
    `phone` VARCHAR(20),
    `mobile` VARCHAR(20),
    `website` VARCHAR(200),
    `address` VARCHAR(255),
    `city` VARCHAR(100),
    `postal_code` VARCHAR(20),
    `country` VARCHAR(100) DEFAULT 'Sénégal',
    `ninea` VARCHAR(50),
    `registre_commerce` VARCHAR(100),
    `contact_person` VARCHAR(150),
    `contact_phone` VARCHAR(20),
    `delai_paiement_jours` INT DEFAULT 30,
    `credit_autorise` DECIMAL(15,2) DEFAULT 0.00,
    `solde_compte` DECIMAL(15,2) DEFAULT 0.00,
    `notes` TEXT,
    `is_active` TINYINT(1) DEFAULT 1,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `deleted_at` TIMESTAMP NULL,
    INDEX `idx_code` (`code`),
    INDEX `idx_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- TABLE: CLIENTS
-- ========================================
CREATE TABLE IF NOT EXISTS `clients` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `code` VARCHAR(50) NOT NULL UNIQUE,
    `name` VARCHAR(200) NOT NULL,
    `type` ENUM('particulier', 'entreprise', 'revendeur') DEFAULT 'particulier',
    `email` VARCHAR(150),
    `phone` VARCHAR(20),
    `mobile` VARCHAR(20),
    `address` VARCHAR(255),
    `city` VARCHAR(100),
    `postal_code` VARCHAR(20),
    `country` VARCHAR(100) DEFAULT 'Sénégal',
    `ninea` VARCHAR(50),
    `registre_commerce` VARCHAR(100),
    `credit_autorise` DECIMAL(15,2) DEFAULT 0.00,
    `solde_compte` DECIMAL(15,2) DEFAULT 0.00,
    `remise_generale` DECIMAL(5,2) DEFAULT 0.00,
    `delai_paiement_jours` INT DEFAULT 0,
    `notes` TEXT,
    `is_active` TINYINT(1) DEFAULT 1,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `deleted_at` TIMESTAMP NULL,
    INDEX `idx_code` (`code`),
    INDEX `idx_name` (`name`),
    INDEX `idx_type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- TABLE: TYPES DE MOUVEMENTS DE STOCK
-- ========================================
CREATE TABLE IF NOT EXISTS `stock_movement_types` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `code` VARCHAR(50) NOT NULL UNIQUE,
    `name` VARCHAR(150) NOT NULL,
    `type` ENUM('entree', 'sortie', 'transfert', 'ajustement') NOT NULL,
    `affects_stock` TINYINT(1) DEFAULT 1,
    `requires_validation` TINYINT(1) DEFAULT 0,
    `description` TEXT,
    `is_active` TINYINT(1) DEFAULT 1,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX `idx_code` (`code`),
    INDEX `idx_type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- TABLE: MOUVEMENTS DE STOCK
-- ========================================
CREATE TABLE IF NOT EXISTS `stock_movements` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `numero` VARCHAR(100) NOT NULL UNIQUE,
    `movement_type_id` INT UNSIGNED NOT NULL,
    `entrepot_from_id` INT UNSIGNED,
    `entrepot_to_id` INT UNSIGNED,
    `fournisseur_id` INT UNSIGNED,
    `client_id` INT UNSIGNED,
    `user_id` INT UNSIGNED,
    `reference_type` ENUM('commande', 'vente', 'retour', 'ajustement', 'autre'),
    `reference_id` INT UNSIGNED,
    `date_mouvement` DATE NOT NULL,
    `statut` ENUM('brouillon', 'valide', 'annule', 'en_transit', 'complete') DEFAULT 'brouillon',
    `montant_total` DECIMAL(15,2) DEFAULT 0.00,
    `note` TEXT,
    `validated_by` INT UNSIGNED,
    `validated_at` TIMESTAMP NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `deleted_at` TIMESTAMP NULL,
    FOREIGN KEY (`movement_type_id`) REFERENCES `stock_movement_types`(`id`) ON DELETE RESTRICT,
    FOREIGN KEY (`entrepot_from_id`) REFERENCES `entrepots`(`id`) ON DELETE SET NULL,
    FOREIGN KEY (`entrepot_to_id`) REFERENCES `entrepots`(`id`) ON DELETE SET NULL,
    FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseurs`(`id`) ON DELETE SET NULL,
    FOREIGN KEY (`client_id`) REFERENCES `clients`(`id`) ON DELETE SET NULL,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE SET NULL,
    FOREIGN KEY (`validated_by`) REFERENCES `users`(`id`) ON DELETE SET NULL,
    INDEX `idx_numero` (`numero`),
    INDEX `idx_date` (`date_mouvement`),
    INDEX `idx_statut` (`statut`),
    INDEX `idx_reference` (`reference_type`, `reference_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- TABLE: DÉTAILS DES MOUVEMENTS DE STOCK
-- ========================================
CREATE TABLE IF NOT EXISTS `stock_movement_details` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `stock_movement_id` INT UNSIGNED NOT NULL,
    `product_id` INT UNSIGNED NOT NULL,
    `quantite` DECIMAL(15,2) NOT NULL,
    `prix_unitaire` DECIMAL(15,2) DEFAULT 0.00,
    `cout_unitaire` DECIMAL(15,2) DEFAULT 0.00,
    `montant` DECIMAL(15,2) DEFAULT 0.00,
    `lot_number` VARCHAR(100),
    `date_expiration` DATE,
    `emplacement` VARCHAR(100),
    `note` TEXT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`stock_movement_id`) REFERENCES `stock_movements`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE RESTRICT,
    INDEX `idx_movement` (`stock_movement_id`),
    INDEX `idx_product` (`product_id`),
    INDEX `idx_lot` (`lot_number`),
    INDEX `idx_expiration` (`date_expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- TABLE: COMMANDES D'ACHAT
-- ========================================
CREATE TABLE IF NOT EXISTS `commandes` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `numero_commande` VARCHAR(100) NOT NULL UNIQUE,
    `fournisseur_id` INT UNSIGNED NOT NULL,
    `entrepot_id` INT UNSIGNED,
    `user_id` INT UNSIGNED,
    `date_commande` DATE NOT NULL,
    `date_livraison_prevue` DATE,
    `date_livraison_reelle` DATE,
    `status` ENUM('brouillon', 'envoyee', 'confirmee', 'en_cours', 'partielle', 'livree', 'annulee') DEFAULT 'brouillon',
    `montant_ht` DECIMAL(15,2) DEFAULT 0.00,
    `montant_tva` DECIMAL(15,2) DEFAULT 0.00,
    `montant_ttc` DECIMAL(15,2) DEFAULT 0.00,
    `remise` DECIMAL(15,2) DEFAULT 0.00,
    `frais_transport` DECIMAL(15,2) DEFAULT 0.00,
    `montant_total` DECIMAL(15,2) DEFAULT 0.00,
    `conditions_paiement` TEXT,
    `notes` TEXT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `deleted_at` TIMESTAMP NULL,
    FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseurs`(`id`) ON DELETE RESTRICT,
    FOREIGN KEY (`entrepot_id`) REFERENCES `entrepots`(`id`) ON DELETE SET NULL,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE SET NULL,
    INDEX `idx_numero` (`numero_commande`),
    INDEX `idx_fournisseur` (`fournisseur_id`),
    INDEX `idx_status` (`status`),
    INDEX `idx_date_commande` (`date_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- TABLE: DÉTAILS DES COMMANDES
-- ========================================
CREATE TABLE IF NOT EXISTS `detail_commandes` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `commande_id` INT UNSIGNED NOT NULL,
    `product_id` INT UNSIGNED NOT NULL,
    `quantite` DECIMAL(15,2) NOT NULL,
    `quantite_recue` DECIMAL(15,2) DEFAULT 0.00,
    `prix_unitaire` DECIMAL(15,2) NOT NULL,
    `remise` DECIMAL(15,2) DEFAULT 0.00,
    `tva` DECIMAL(5,2) DEFAULT 0.00,
    `sous_total` DECIMAL(15,2) DEFAULT 0.00,
    `notes` TEXT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`commande_id`) REFERENCES `commandes`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE RESTRICT,
    INDEX `idx_commande` (`commande_id`),
    INDEX `idx_product` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- TABLE: VENTES
-- ========================================
CREATE TABLE IF NOT EXISTS `ventes` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `numero_vente` VARCHAR(100) NOT NULL UNIQUE,
    `client_id` INT UNSIGNED,
    `entrepot_id` INT UNSIGNED,
    `user_id` INT UNSIGNED,
    `date_vente` DATE NOT NULL,
    `date_livraison` DATE,
    `type_vente` ENUM('comptant', 'credit', 'mixte') DEFAULT 'comptant',
    `status` ENUM('brouillon', 'confirmee', 'en_preparation', 'prete', 'livree', 'annulee') DEFAULT 'brouillon',
    `montant_ht` DECIMAL(15,2) DEFAULT 0.00,
    `montant_tva` DECIMAL(15,2) DEFAULT 0.00,
    `montant_ttc` DECIMAL(15,2) DEFAULT 0.00,
    `remise_pourcentage` DECIMAL(5,2) DEFAULT 0.00,
    `remise_montant` DECIMAL(15,2) DEFAULT 0.00,
    `frais_livraison` DECIMAL(15,2) DEFAULT 0.00,
    `montant_total` DECIMAL(15,2) DEFAULT 0.00,
    `montant_paye` DECIMAL(15,2) DEFAULT 0.00,
    `montant_restant` DECIMAL(15,2) DEFAULT 0.00,
    `statut_paiement` ENUM('non_paye', 'partiel', 'paye', 'rembourse') DEFAULT 'non_paye',
    `notes` TEXT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `deleted_at` TIMESTAMP NULL,
    FOREIGN KEY (`client_id`) REFERENCES `clients`(`id`) ON DELETE SET NULL,
    FOREIGN KEY (`entrepot_id`) REFERENCES `entrepots`(`id`) ON DELETE SET NULL,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE SET NULL,
    INDEX `idx_numero` (`numero_vente`),
    INDEX `idx_client` (`client_id`),
    INDEX `idx_status` (`status`),
    INDEX `idx_date_vente` (`date_vente`),
    INDEX `idx_statut_paiement` (`statut_paiement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- TABLE: DÉTAILS DES VENTES
-- ========================================
CREATE TABLE IF NOT EXISTS `detail_ventes` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `vente_id` INT UNSIGNED NOT NULL,
    `product_id` INT UNSIGNED NOT NULL,
    `quantite` DECIMAL(15,2) NOT NULL,
    `prix_unitaire` DECIMAL(15,2) NOT NULL,
    `remise` DECIMAL(15,2) DEFAULT 0.00,
    `tva` DECIMAL(5,2) DEFAULT 0.00,
    `sous_total` DECIMAL(15,2) DEFAULT 0.00,
    `cout_unitaire` DECIMAL(15,2) DEFAULT 0.00,
    `marge` DECIMAL(15,2) DEFAULT 0.00,
    `notes` TEXT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`vente_id`) REFERENCES `ventes`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE RESTRICT,
    INDEX `idx_vente` (`vente_id`),
    INDEX `idx_product` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- TABLE: PAIEMENTS DES VENTES
-- ========================================
CREATE TABLE IF NOT EXISTS `paiement_ventes` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `vente_id` INT UNSIGNED NOT NULL,
    `numero_paiement` VARCHAR(100) NOT NULL UNIQUE,
    `date_paiement` DATE NOT NULL,
    `montant` DECIMAL(15,2) NOT NULL,
    `mode_paiement` ENUM('especes', 'cheque', 'virement', 'carte', 'mobile_money', 'autre') DEFAULT 'especes',
    `reference` VARCHAR(150),
    `notes` TEXT,
    `user_id` INT UNSIGNED,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`vente_id`) REFERENCES `ventes`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE SET NULL,
    INDEX `idx_vente` (`vente_id`),
    INDEX `idx_date` (`date_paiement`),
    INDEX `idx_numero` (`numero_paiement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- TABLE: PAIEMENTS DES COMMANDES
-- ========================================
CREATE TABLE IF NOT EXISTS `paiement_commandes` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `commande_id` INT UNSIGNED NOT NULL,
    `numero_paiement` VARCHAR(100) NOT NULL UNIQUE,
    `date_paiement` DATE NOT NULL,
    `montant` DECIMAL(15,2) NOT NULL,
    `mode_paiement` ENUM('especes', 'cheque', 'virement', 'carte', 'mobile_money', 'autre') DEFAULT 'especes',
    `reference` VARCHAR(150),
    `notes` TEXT,
    `user_id` INT UNSIGNED,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`commande_id`) REFERENCES `commandes`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE SET NULL,
    INDEX `idx_commande` (`commande_id`),
    INDEX `idx_date` (`date_paiement`),
    INDEX `idx_numero` (`numero_paiement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- TABLE: FACTURES
-- ========================================
CREATE TABLE IF NOT EXISTS `factures` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `numero_facture` VARCHAR(100) NOT NULL UNIQUE,
    `vente_id` INT UNSIGNED,
    `client_id` INT UNSIGNED NOT NULL,
    `date_facture` DATE NOT NULL,
    `date_echeance` DATE,
    `montant_ht` DECIMAL(15,2) DEFAULT 0.00,
    `montant_tva` DECIMAL(15,2) DEFAULT 0.00,
    `montant_ttc` DECIMAL(15,2) DEFAULT 0.00,
    `montant_paye` DECIMAL(15,2) DEFAULT 0.00,
    `montant_restant` DECIMAL(15,2) DEFAULT 0.00,
    `statut` ENUM('brouillon', 'emise', 'envoyee', 'payee', 'partiellement_payee', 'en_retard', 'annulee') DEFAULT 'brouillon',
    `notes` TEXT,
    `user_id` INT UNSIGNED,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `deleted_at` TIMESTAMP NULL,
    FOREIGN KEY (`vente_id`) REFERENCES `ventes`(`id`) ON DELETE SET NULL,
    FOREIGN KEY (`client_id`) REFERENCES `clients`(`id`) ON DELETE RESTRICT,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE SET NULL,
    INDEX `idx_numero` (`numero_facture`),
    INDEX `idx_client` (`client_id`),
    INDEX `idx_date_facture` (`date_facture`),
    INDEX `idx_statut` (`statut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- TABLE: LIVRAISONS
-- ========================================
CREATE TABLE IF NOT EXISTS `livraisons` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `numero_livraison` VARCHAR(100) NOT NULL UNIQUE,
    `vente_id` INT UNSIGNED,
    `commande_id` INT UNSIGNED,
    `entrepot_id` INT UNSIGNED,
    `client_id` INT UNSIGNED,
    `fournisseur_id` INT UNSIGNED,
    `date_livraison` DATE NOT NULL,
    `date_livraison_prevue` DATE,
    `type` ENUM('vente', 'commande', 'retour', 'autre') DEFAULT 'vente',
    `statut` ENUM('planifiee', 'en_preparation', 'en_transit', 'livree', 'retournee', 'annulee') DEFAULT 'planifiee',
    `transporteur` VARCHAR(150),
    `numero_suivi` VARCHAR(150),
    `adresse_livraison` TEXT,
    `notes` TEXT,
    `user_id` INT UNSIGNED,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `deleted_at` TIMESTAMP NULL,
    FOREIGN KEY (`vente_id`) REFERENCES `ventes`(`id`) ON DELETE SET NULL,
    FOREIGN KEY (`commande_id`) REFERENCES `commandes`(`id`) ON DELETE SET NULL,
    FOREIGN KEY (`entrepot_id`) REFERENCES `entrepots`(`id`) ON DELETE SET NULL,
    FOREIGN KEY (`client_id`) REFERENCES `clients`(`id`) ON DELETE SET NULL,
    FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseurs`(`id`) ON DELETE SET NULL,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE SET NULL,
    INDEX `idx_numero` (`numero_livraison`),
    INDEX `idx_date` (`date_livraison`),
    INDEX `idx_statut` (`statut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- TABLE: CHAUFFEURS
-- ========================================
CREATE TABLE IF NOT EXISTS `chauffeurs` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `nom` VARCHAR(100) NOT NULL,
    `prenom` VARCHAR(100) NOT NULL,
    `telephone` VARCHAR(20),
    `email` VARCHAR(150),
    `numero_permis` VARCHAR(100),
    `type_permis` VARCHAR(50),
    `date_expiration_permis` DATE,
    `address` VARCHAR(255),
    `is_active` TINYINT(1) DEFAULT 1,
    `notes` TEXT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `deleted_at` TIMESTAMP NULL,
    INDEX `idx_nom` (`nom`, `prenom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- TABLE: CAMIONS/VÉHICULES
-- ========================================
CREATE TABLE IF NOT EXISTS `camions` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `immatriculation` VARCHAR(50) NOT NULL UNIQUE,
    `marque` VARCHAR(100),
    `modele` VARCHAR(100),
    `annee` INT,
    `type` ENUM('camion', 'camionnette', 'fourgon', 'autre') DEFAULT 'camion',
    `capacite` DECIMAL(10,2),
    `capacite_unite` VARCHAR(20),
    `date_acquisition` DATE,
    `date_assurance` DATE,
    `date_visite_technique` DATE,
    `kilometrage` INT DEFAULT 0,
    `is_active` TINYINT(1) DEFAULT 1,
    `notes` TEXT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `deleted_at` TIMESTAMP NULL,
    INDEX `idx_immatriculation` (`immatriculation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- TABLE: INVENTAIRES
-- ========================================
CREATE TABLE IF NOT EXISTS `inventaires` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `numero_inventaire` VARCHAR(100) NOT NULL UNIQUE,
    `entrepot_id` INT UNSIGNED NOT NULL,
    `date_inventaire` DATE NOT NULL,
    `statut` ENUM('planifie', 'en_cours', 'complete', 'valide', 'annule') DEFAULT 'planifie',
    `type` ENUM('complet', 'partiel', 'cyclique') DEFAULT 'complet',
    `user_id` INT UNSIGNED,
    `validated_by` INT UNSIGNED,
    `validated_at` TIMESTAMP NULL,
    `notes` TEXT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (`entrepot_id`) REFERENCES `entrepots`(`id`) ON DELETE RESTRICT,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE SET NULL,
    FOREIGN KEY (`validated_by`) REFERENCES `users`(`id`) ON DELETE SET NULL,
    INDEX `idx_numero` (`numero_inventaire`),
    INDEX `idx_date` (`date_inventaire`),
    INDEX `idx_statut` (`statut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- TABLE: DÉTAILS DES INVENTAIRES
-- ========================================
CREATE TABLE IF NOT EXISTS `inventaire_details` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `inventaire_id` INT UNSIGNED NOT NULL,
    `product_id` INT UNSIGNED NOT NULL,
    `quantite_theorique` DECIMAL(15,2) DEFAULT 0.00,
    `quantite_comptee` DECIMAL(15,2) DEFAULT 0.00,
    `ecart` DECIMAL(15,2) DEFAULT 0.00,
    `cout_unitaire` DECIMAL(15,2) DEFAULT 0.00,
    `valeur_ecart` DECIMAL(15,2) DEFAULT 0.00,
    `notes` TEXT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`inventaire_id`) REFERENCES `inventaires`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE RESTRICT,
    INDEX `idx_inventaire` (`inventaire_id`),
    INDEX `idx_product` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- TABLE: HISTORIQUE DES PRIX
-- ========================================
CREATE TABLE IF NOT EXISTS `prix_history` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `product_id` INT UNSIGNED NOT NULL,
    `type` ENUM('achat', 'vente') NOT NULL,
    `ancien_prix` DECIMAL(15,2),
    `nouveau_prix` DECIMAL(15,2),
    `date_changement` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `user_id` INT UNSIGNED,
    `raison` TEXT,
    FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE SET NULL,
    INDEX `idx_product` (`product_id`),
    INDEX `idx_date` (`date_changement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- TABLE: LOGS D'ACTIVITÉS
-- ========================================
CREATE TABLE IF NOT EXISTS `activity_logs` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT UNSIGNED,
    `action` VARCHAR(100) NOT NULL,
    `entity_type` VARCHAR(100),
    `entity_id` INT UNSIGNED,
    `description` TEXT,
    `ip_address` VARCHAR(45),
    `user_agent` VARCHAR(255),
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE SET NULL,
    INDEX `idx_user` (`user_id`),
    INDEX `idx_action` (`action`),
    INDEX `idx_entity` (`entity_type`, `entity_id`),
    INDEX `idx_created` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================
-- TABLE: PARAMÈTRES SYSTÈME
-- ========================================
CREATE TABLE IF NOT EXISTS `system_settings` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `key` VARCHAR(100) NOT NULL UNIQUE,
    `value` TEXT,
    `type` ENUM('string', 'number', 'boolean', 'json') DEFAULT 'string',
    `description` VARCHAR(255),
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX `idx_key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SET FOREIGN_KEY_CHECKS = 1;

-- ========================================
-- DONNÉES INITIALES
-- ========================================

-- Types de mouvements de stock par défaut
INSERT INTO `stock_movement_types` (`code`, `name`, `type`, `affects_stock`, `requires_validation`, `description`) VALUES
('ENTR_ACHAT', 'Entrée par achat', 'entree', 1, 1, 'Réception de marchandises suite à une commande fournisseur'),
('ENTR_RETOUR', 'Entrée par retour client', 'entree', 1, 1, 'Retour de produits par un client'),
('ENTR_AJUST', 'Entrée par ajustement', 'entree', 1, 1, 'Ajustement positif du stock'),
('SORT_VENTE', 'Sortie par vente', 'sortie', 1, 0, 'Sortie de stock pour une vente'),
('SORT_RETOUR', 'Sortie par retour fournisseur', 'sortie', 1, 1, 'Retour de marchandises au fournisseur'),
('SORT_AJUST', 'Sortie par ajustement', 'sortie', 1, 1, 'Ajustement négatif du stock'),
('SORT_CASSE', 'Sortie par casse/perte', 'sortie', 1, 1, 'Produits cassés ou perdus'),
('TRANSF', 'Transfert entre entrepôts', 'transfert', 1, 1, 'Transfert de marchandises entre deux entrepôts'),
('AJUST_INV', 'Ajustement après inventaire', 'ajustement', 1, 1, 'Correction du stock suite à un inventaire')
ON DUPLICATE KEY UPDATE name=VALUES(name);

-- Unités de mesure par défaut
INSERT INTO `units` (`name`, `symbol`, `type`) VALUES
('Unité', 'U', 'piece'),
('Kilogramme', 'kg', 'weight'),
('Gramme', 'g', 'weight'),
('Litre', 'L', 'volume'),
('Millilitre', 'ml', 'volume'),
('Mètre', 'm', 'length'),
('Centimètre', 'cm', 'length'),
('Pièce', 'pcs', 'piece'),
('Carton', 'ctn', 'piece'),
('Palette', 'plt', 'piece'),
('Boîte', 'box', 'piece'),
('Sac', 'sac', 'piece')
ON DUPLICATE KEY UPDATE name=VALUES(name);

-- Paramètres système par défaut
INSERT INTO `system_settings` (`key`, `value`, `type`, `description`) VALUES
('company_name', 'Mon Entreprise', 'string', 'Nom de l\'entreprise'),
('company_address', '', 'string', 'Adresse de l\'entreprise'),
('company_phone', '', 'string', 'Téléphone de l\'entreprise'),
('company_email', '', 'string', 'Email de l\'entreprise'),
('currency', 'FCFA', 'string', 'Devise par défaut'),
('tax_rate', '18', 'number', 'Taux de TVA par défaut (%)'),
('stock_alert_enabled', 'true', 'boolean', 'Activer les alertes de stock'),
('auto_generate_codes', 'true', 'boolean', 'Générer automatiquement les codes'),
('date_format', 'd/m/Y', 'string', 'Format de date'),
('decimal_separator', ',', 'string', 'Séparateur décimal'),
('thousands_separator', ' ', 'string', 'Séparateur de milliers')
ON DUPLICATE KEY UPDATE value=VALUES(value);

-- ========================================
-- FIN DU SCHÉMA
-- ========================================
