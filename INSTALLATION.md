# 📦 Guide d'Installation - Système ERP

## 🎯 Vue d'ensemble

Vous avez maintenant un système ERP complet avec:
- ✅ Base de données locale pour stock, ventes et commandes
- ✅ API REST locale pour remplacer l'API externe
- ✅ Modèles PHP orientés objet (OOP)
- ✅ Gestion complète des transactions
- ✅ Système de soft delete
- ✅ Logs d'activités

## 📋 Prérequis

- PHP 7.4 ou supérieur
- MySQL 5.7+ ou MariaDB 10.2+
- Extension PDO PHP activée
- Serveur web (Apache/Nginx)

## 🚀 Installation en 5 étapes

### Étape 1: Installer la base de données

```bash
cd /workspace
php database/install.php
```

Ce script va automatiquement:
- Créer la base de données `erp_gestion`
- Créer toutes les tables (30+ tables)
- Insérer les données initiales
- Configurer les index et contraintes

### Étape 2: Configurer la connexion

Ouvrez `configs/database-config.php` et modifiez si nécessaire:

```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'erp_gestion');
define('DB_USER', 'root');
define('DB_PASS', 'votre_mot_de_passe');
```

### Étape 3: Tester la connexion

Créez un fichier de test:

```php
<?php
require_once 'configs/database-config.php';

try {
    $db = Database::getInstance()->getConnection();
    echo "✓ Connexion réussie à la base de données!";
} catch (Exception $e) {
    echo "✗ Erreur: " . $e->getMessage();
}
?>
```

### Étape 4: Configurer l'API locale

L'API locale est déjà créée dans `api/local-api.php`. Pour l'utiliser, ajoutez cette ligne dans votre fichier `.htaccess`:

```apache
# Redirection vers l'API locale pour les routes spécifiques
RewriteRule ^api/(products|ventes|commandes|stocks|clients|fournisseurs|entrepots) api/local-api.php [QSA,L]
```

### Étape 5: Migrer progressivement

Vous pouvez maintenant utiliser soit:
- **L'API externe** (comme avant): `https://toure.gestiem.com/api`
- **L'API locale** (nouvelle): `/api/local-api.php`

## 📊 Structure du Projet

```
/workspace/
├── api/
│   └── local-api.php          # API REST locale
├── configs/
│   ├── api-config.php         # Config API externe (existante)
│   └── database-config.php    # Config base de données locale (nouvelle)
├── models/                     # Modèles de données (nouveau)
│   ├── Product.php
│   ├── Stock.php
│   ├── StockMovement.php
│   ├── Vente.php
│   ├── Commande.php
│   ├── Client.php
│   ├── Fournisseur.php
│   └── Entrepot.php
├── database/                   # Scripts de base de données (nouveau)
│   ├── schema.sql
│   ├── install.php
│   └── README.md
└── controllers/               # Contrôleurs existants
    ├── vente-controller.php
    ├── commande-controller.php
    └── stock-controller.php
```

## 🔄 Migration Progressive

### Option 1: Utiliser uniquement la base de données locale

Modifiez vos contrôleurs pour utiliser les modèles:

**Avant (API externe):**
```php
$apiUrl = 'https://toure.gestiem.com/api/ventes';
$response = makeApiCall($apiUrl);
```

**Après (Base de données locale):**
```php
require_once 'models/Vente.php';
$venteModel = new Vente();
$ventes = $venteModel->getVentes($filters, $page, $perPage);
```

### Option 2: Mode hybride

Gardez l'API externe pour certaines fonctionnalités et utilisez la base locale pour d'autres:

```php
// Utiliser la base locale pour les ventes et commandes
require_once 'models/Vente.php';
$venteModel = new Vente();

// Utiliser l'API externe pour les autres fonctionnalités
require_once 'configs/api-config.php';
$users = makeApiCall('/users');
```

## 📝 Exemples d'utilisation

### Créer une vente

```php
require_once 'models/Vente.php';

$venteModel = new Vente();

$venteData = [
    'client_id' => 1,
    'entrepot_id' => 1,
    'user_id' => 1,
    'date_vente' => date('Y-m-d'),
    'type_vente' => 'comptant',
    'status' => 'confirmee'
];

$details = [
    [
        'product_id' => 1,
        'quantite' => 2,
        'prix_unitaire' => 50000,
        'tva' => 18,
        'sous_total' => 100000
    ]
];

$venteId = $venteModel->createVente($venteData, $details);
```

### Créer une commande

```php
require_once 'models/Commande.php';

$commandeModel = new Commande();

$commandeData = [
    'fournisseur_id' => 1,
    'entrepot_id' => 1,
    'user_id' => 1,
    'date_commande' => date('Y-m-d'),
    'status' => 'envoyee'
];

$details = [
    [
        'product_id' => 1,
        'quantite' => 100,
        'prix_unitaire' => 30000,
        'tva' => 18,
        'sous_total' => 3000000
    ]
];

$commandeId = $commandeModel->createCommande($commandeData, $details);
```

### Gérer les mouvements de stock

```php
require_once 'models/StockMovement.php';

$movementModel = new StockMovement();

// Créer un mouvement d'entrée
$movementData = [
    'movement_type_id' => 1, // ENTR_ACHAT
    'entrepot_to_id' => 1,
    'fournisseur_id' => 1,
    'user_id' => 1,
    'date_mouvement' => date('Y-m-d')
];

$details = [
    [
        'product_id' => 1,
        'quantite' => 100,
        'prix_unitaire' => 30000,
        'cout_unitaire' => 30000
    ]
];

$movementId = $movementModel->createMovement($movementData, $details);

// Valider le mouvement (met à jour le stock automatiquement)
$movementModel->validateMovement($movementId, 1);
```

## 🔧 Configuration Apache/Nginx

### Apache (.htaccess)

```apache
RewriteEngine On

# Rediriger l'API locale
RewriteRule ^api/(.*)$ api/local-api.php/$1 [QSA,L]

# Autres règles...
```

### Nginx

```nginx
location /api/ {
    try_files $uri $uri/ /api/local-api.php?$args;
}
```

## 🛠️ Maintenance

### Backup de la base de données

```bash
mysqldump -u root -p erp_gestion > backup_$(date +%Y%m%d).sql
```

### Restauration

```bash
mysql -u root -p erp_gestion < backup_20231215.sql
```

## 🆘 Dépannage

### Erreur de connexion

Vérifiez:
1. MySQL est démarré: `sudo service mysql status`
2. Les credentials dans `database-config.php`
3. La base de données existe: `SHOW DATABASES;`

### Erreur "Table doesn't exist"

Réinstallez la base:
```bash
php database/install.php
```

### Erreur de permissions

```bash
sudo chmod -R 755 /workspace
sudo chown -R www-data:www-data /workspace
```

## 📚 Documentation complète

Consultez `database/README.md` pour:
- Structure détaillée de la base
- Tous les modèles disponibles
- Exemples avancés
- Meilleures pratiques

## 🎉 Prochaines étapes

1. ✅ Installez la base de données
2. ✅ Testez avec quelques ventes
3. ✅ Migrez progressivement vos contrôleurs
4. ✅ Configurez les backups automatiques
5. ✅ Formez votre équipe

## 💬 Support

Pour toute question:
1. Consultez `database/README.md`
2. Vérifiez les logs PHP et MySQL
3. Testez avec les exemples fournis

---

**Bon courage avec votre nouveau système ERP! 🚀**
