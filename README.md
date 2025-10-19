# 🚀 Système ERP de Gestion

## Vue d'ensemble

Système ERP complet avec **base de données locale** pour la gestion de stock, ventes et commandes.

## ⚡ Démarrage Rapide

### Option 1 : Interface Web (Recommandé)

Ouvrez dans votre navigateur :
```
http://votre-domaine/START_HERE.html
```

Suivez les 3 étapes simples pour installer et configurer votre système.

### Option 2 : Installation Manuelle

1. **Installer la base de données** :
   ```
   http://votre-domaine/install-database.php
   ```

2. **Tester la connexion** :
   ```
   http://votre-domaine/test-db.php
   ```

3. **Accéder au système** :
   ```
   http://votre-domaine/
   ```

## 📦 Fonctionnalités

### ✅ Gestion du Stock
- Multi-entrepôts
- Mouvements de stock automatiques
- Inventaires physiques
- Alertes de stock
- Calcul du coût moyen pondéré

### ✅ Gestion des Ventes
- Création de ventes
- Factures et paiements
- Gestion des clients
- Mise à jour automatique du stock

### ✅ Gestion des Achats
- Commandes fournisseurs
- Réception de marchandises
- Paiements fournisseurs
- Mise à jour automatique du stock

### ✅ Logistique
- Livraisons
- Camions et chauffeurs
- Suivi des expéditions

## 📊 Structure du Projet

```
/workspace/
├── api/                    # API REST locale
├── configs/                # Configuration (DB + API)
├── controllers/            # Contrôleurs
├── models/                 # Modèles de données (OOP)
├── database/              # Scripts SQL et installation
├── views/                 # Vues et templates
├── START_HERE.html        # 👈 COMMENCEZ ICI !
└── README.md             # Ce fichier
```

## 🗄️ Base de Données

### Tables Créées (30+)
- **Produits** : products, product_categories, units
- **Stock** : stocks, entrepots, stock_movements, inventaires
- **Ventes** : ventes, detail_ventes, paiement_ventes, clients, factures
- **Achats** : commandes, detail_commandes, paiement_commandes, fournisseurs
- **Logistique** : livraisons, chauffeurs, camions
- **Système** : users, activity_logs, system_settings

### Configuration

Éditez `configs/database-config.php` si nécessaire :

```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'erp_gestion');
define('DB_USER', 'root');
define('DB_PASS', '');
```

## 💻 Utilisation

### Exemple : Créer une vente

```php
require_once 'models/Vente.php';

$venteModel = new Vente();

$venteId = $venteModel->createVente([
    'client_id' => 1,
    'entrepot_id' => 1,
    'user_id' => 1,
    'date_vente' => date('Y-m-d'),
    'status' => 'confirmee'
], [
    [
        'product_id' => 1,
        'quantite' => 2,
        'prix_unitaire' => 50000,
        'tva' => 18,
        'sous_total' => 100000
    ]
]);

// ✅ Vente créée
// ✅ Stock mis à jour automatiquement
// ✅ Mouvement de stock créé
```

### Exemple : Utiliser l'API

```javascript
// Récupérer les ventes
fetch('/api/local-api.php/ventes?page=1&per_page=15')
    .then(response => response.json())
    .then(data => console.log(data));

// Créer une vente
fetch('/api/local-api.php/ventes', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'Authorization': 'Bearer ' + token
    },
    body: JSON.stringify({
        client_id: 1,
        entrepot_id: 1,
        details: [...]
    })
});
```

## 🌐 API REST

### Endpoints Disponibles

#### Produits
- `GET /api/local-api.php/products` - Liste
- `GET /api/local-api.php/products/{id}` - Détails
- `POST /api/local-api.php/products` - Créer
- `PUT /api/local-api.php/products/{id}` - Modifier
- `DELETE /api/local-api.php/products/{id}` - Supprimer

#### Ventes
- `GET /api/local-api.php/ventes` - Liste
- `GET /api/local-api.php/ventes/{id}` - Détails
- `POST /api/local-api.php/ventes` - Créer
- `PUT /api/local-api.php/ventes/{id}` - Modifier
- `DELETE /api/local-api.php/ventes/{id}` - Supprimer

#### Stocks
- `GET /api/local-api.php/stocks` - État des stocks
- `GET /api/local-api.php/stocks/alerts` - Alertes

[Voir la documentation complète de l'API](./INTEGRATION_COMPLETE.md#routes-api-disponibles)

## 📚 Documentation

- **[START_HERE.html](./START_HERE.html)** - Page de démarrage rapide
- **[INTEGRATION_COMPLETE.md](./INTEGRATION_COMPLETE.md)** - Guide complet d'utilisation
- **[database/README.md](./database/README.md)** - Documentation de la base de données
- **[INSTALLATION.md](./INSTALLATION.md)** - Guide d'installation détaillé

## 🔧 Maintenance

### Backup de la base

```bash
mysqldump -u root -p erp_gestion > backup_$(date +%Y%m%d).sql
```

### Restauration

```bash
mysql -u root -p erp_gestion < backup_20231215.sql
```

### Réinstallation

Si nécessaire, accédez à :
```
http://votre-domaine/install-database.php
```

## 🆘 Dépannage

### La base de données n'existe pas
→ Exécutez `install-database.php`

### Erreur de connexion
1. Vérifiez `configs/database-config.php`
2. Assurez-vous que MySQL est démarré
3. Vérifiez les permissions

### Tests échouent
→ Exécutez `test-db.php` pour diagnostiquer

### Besoin d'aide
1. Consultez `INTEGRATION_COMPLETE.md`
2. Lisez `database/README.md`
3. Vérifiez les logs PHP et MySQL

## ✨ Avantages

✅ **Performance** - Plus rapide que l'API externe  
✅ **Fiabilité** - Fonctionne même sans internet  
✅ **Indépendance** - Pas de dépendance à l'API pour stock/ventes  
✅ **Contrôle** - Contrôle total sur vos données  
✅ **Sécurité** - Données stockées localement  
✅ **Extensible** - Facilement personnalisable  

## 📝 Prérequis

- PHP 7.4+
- MySQL 5.7+ ou MariaDB 10.2+
- Extension PDO PHP activée
- Serveur web (Apache/Nginx)

## 🎯 Prochaines Étapes

1. ✅ Ouvrez `START_HERE.html`
2. ✅ Installez la base de données
3. ✅ Testez la connexion
4. ✅ Commencez à utiliser votre système !

---

**🚀 Votre système ERP est prêt à l'emploi !**

Pour commencer, ouvrez simplement [START_HERE.html](./START_HERE.html) dans votre navigateur.
