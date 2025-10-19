# Base de Données ERP - Guide d'Installation et d'Utilisation

## 📋 Description

Ce système de gestion ERP complet comprend une base de données MySQL avec toutes les fonctionnalités nécessaires pour gérer:
- **Stock** : Produits, entrepôts, mouvements de stock, inventaires
- **Ventes** : Clients, ventes, factures, paiements
- **Achats** : Fournisseurs, commandes, réceptions
- **Logistique** : Livraisons, camions, chauffeurs

## 🚀 Installation

### Prérequis
- PHP 7.4 ou supérieur
- MySQL 5.7 ou supérieur (ou MariaDB 10.2+)
- Extension PDO PHP activée

### Méthode 1 : Installation automatique

```bash
php database/install.php
```

Ce script va:
1. Se connecter à MySQL
2. Créer la base de données `erp_gestion`
3. Exécuter le schéma SQL
4. Insérer les données initiales

### Méthode 2 : Installation manuelle

1. Créer la base de données:
```sql
CREATE DATABASE erp_gestion CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

2. Importer le schéma:
```bash
mysql -u root -p erp_gestion < database/schema.sql
```

### Configuration

Après l'installation, mettez à jour les paramètres de connexion dans `configs/database-config.php`:

```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'erp_gestion');
define('DB_USER', 'root');
define('DB_PASS', 'votre_mot_de_passe');
```

## 📊 Structure de la Base de Données

### Tables Principales

#### Gestion des Produits
- `products` - Catalogue de produits
- `product_categories` - Catégories de produits
- `units` - Unités de mesure

#### Gestion du Stock
- `stocks` - Stock par produit et entrepôt
- `entrepots` - Liste des entrepôts
- `stock_movements` - Mouvements de stock
- `stock_movement_details` - Détails des mouvements
- `stock_movement_types` - Types de mouvements

#### Gestion des Ventes
- `ventes` - Ventes
- `detail_ventes` - Lignes de ventes
- `paiement_ventes` - Paiements des ventes
- `clients` - Clients
- `factures` - Factures

#### Gestion des Achats
- `commandes` - Commandes fournisseurs
- `detail_commandes` - Lignes de commandes
- `paiement_commandes` - Paiements des commandes
- `fournisseurs` - Fournisseurs

#### Logistique
- `livraisons` - Livraisons
- `chauffeurs` - Chauffeurs
- `camions` - Véhicules

#### Inventaire
- `inventaires` - Inventaires physiques
- `inventaire_details` - Détails des inventaires

#### Système
- `users` - Utilisateurs
- `activity_logs` - Journal d'activités
- `system_settings` - Paramètres système
- `prix_history` - Historique des prix

## 💻 Utilisation des Modèles

### Exemple 1: Créer un produit

```php
require_once 'models/Product.php';

$productModel = new Product();

$productId = $productModel->create([
    'name' => 'iPhone 15 Pro',
    'code' => 'PROD-000001',
    'category_id' => 1,
    'unit_id' => 1,
    'prix_achat' => 800000,
    'prix_vente' => 1200000,
    'stock_alert' => 5
]);
```

### Exemple 2: Créer une vente

```php
require_once 'models/Vente.php';

$venteModel = new Vente();

$venteData = [
    'client_id' => 1,
    'entrepot_id' => 1,
    'user_id' => 1,
    'date_vente' => date('Y-m-d'),
    'type_vente' => 'comptant'
];

$details = [
    [
        'product_id' => 1,
        'quantite' => 2,
        'prix_unitaire' => 1200000,
        'tva' => 18,
        'sous_total' => 2400000
    ]
];

$venteId = $venteModel->createVente($venteData, $details);
```

### Exemple 3: Mouvements de stock

```php
require_once 'models/StockMovement.php';

$movementModel = new StockMovement();

// Créer un mouvement d'entrée
$movementData = [
    'movement_type_id' => 1,
    'entrepot_to_id' => 1,
    'fournisseur_id' => 1,
    'user_id' => 1,
    'date_mouvement' => date('Y-m-d'),
    'statut' => 'brouillon'
];

$details = [
    [
        'product_id' => 1,
        'quantite' => 100,
        'prix_unitaire' => 800000,
        'cout_unitaire' => 800000
    ]
];

$movementId = $movementModel->createMovement($movementData, $details);

// Valider le mouvement (met à jour le stock)
$movementModel->validateMovement($movementId, 1);
```

### Exemple 4: Créer une commande

```php
require_once 'models/Commande.php';

$commandeModel = new Commande();

$commandeData = [
    'fournisseur_id' => 1,
    'entrepot_id' => 1,
    'user_id' => 1,
    'date_commande' => date('Y-m-d'),
    'date_livraison_prevue' => date('Y-m-d', strtotime('+7 days'))
];

$details = [
    [
        'product_id' => 1,
        'quantite' => 50,
        'prix_unitaire' => 800000,
        'tva' => 18,
        'sous_total' => 40000000
    ]
];

$commandeId = $commandeModel->createCommande($commandeData, $details);
```

## 🔧 Fonctionnalités de la Classe BaseModel

Toutes les classes de modèles héritent de `BaseModel` qui fournit:

### Méthodes CRUD de base
- `all($conditions, $orderBy, $limit)` - Récupérer tous les enregistrements
- `find($id)` - Récupérer par ID
- `findWhere($conditions)` - Récupérer selon conditions
- `create($data)` - Créer un enregistrement
- `update($id, $data)` - Mettre à jour
- `delete($id)` - Supprimer (soft delete si possible)
- `restore($id)` - Restaurer un enregistrement supprimé

### Méthodes utilitaires
- `count($conditions)` - Compter les enregistrements
- `paginate($page, $perPage, $conditions, $orderBy)` - Pagination
- `query($sql, $params)` - Requête personnalisée
- `beginTransaction()`, `commit()`, `rollback()` - Transactions

## 📝 Types de Mouvements de Stock Prédéfinis

| Code | Type | Description |
|------|------|-------------|
| ENTR_ACHAT | Entrée | Réception suite à commande |
| ENTR_RETOUR | Entrée | Retour client |
| ENTR_AJUST | Entrée | Ajustement positif |
| SORT_VENTE | Sortie | Sortie pour vente |
| SORT_RETOUR | Sortie | Retour fournisseur |
| SORT_AJUST | Sortie | Ajustement négatif |
| SORT_CASSE | Sortie | Casse/perte |
| TRANSF | Transfert | Entre entrepôts |
| AJUST_INV | Ajustement | Après inventaire |

## 🔒 Sécurité

- Toutes les requêtes utilisent des requêtes préparées (prepared statements)
- Les mots de passe sont hashés avec `password_hash()`
- Soft delete pour la plupart des tables (colonne `deleted_at`)
- Journal d'activités (`activity_logs`)
- Gestion des transactions pour les opérations complexes

## 📈 Performance

- Index sur les colonnes fréquemment recherchées
- Index FULLTEXT pour la recherche de produits
- Clés étrangères pour l'intégrité référentielle
- Pagination intégrée dans les modèles

## 🆘 Support

Pour toute question ou problème:
1. Vérifiez les logs PHP et MySQL
2. Assurez-vous que les extensions PDO sont activées
3. Vérifiez les permissions de la base de données

## 📄 Licence

Ce système est développé pour un usage interne.
