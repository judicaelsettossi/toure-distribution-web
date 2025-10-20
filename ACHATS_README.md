# Gestion des Achats - Toure Distribution

## Vue d'ensemble

Le système de gestion des achats a été migré de l'API vers une base de données locale pour offrir plus de contrôle et de performance. Cette migration inclut :

- **Achats** : Gestion complète des commandes fournisseurs
- **Ventes** : Gestion des ventes clients (à venir)
- **Stock** : Gestion des mouvements de stock (à venir)
- **Entrepôts** : Gestion des stocks par entrepôt (à venir)

## Installation et Configuration

### 🚀 Installation Automatique (Recommandée)

**L'application s'initialise automatiquement au premier accès !**

1. **Configurez la base de données** dans `configs/database-config.php` :
   ```php
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'toure_distribution');
   define('DB_USER', 'votre_utilisateur');
   define('DB_PASS', 'votre_mot_de_passe');
   ```

2. **Accédez à l'application** via votre navigateur :
   - L'application créera automatiquement la base de données
   - Les tables seront créées automatiquement
   - Les produits seront synchronisés depuis l'API
   - Des données de test seront insérées si nécessaire

3. **Vérifiez l'installation** en accédant à `/check_installation.php`

### 🔧 Installation Manuelle (Optionnelle)

Si vous préférez initialiser manuellement :

```bash
# 1. Initialiser la base de données
php init_database.php

# 2. Synchroniser les produits
php sync_products.php

# 3. Tester l'installation
php test_achats.php
```

## Fonctionnalités des Achats

### 1. Liste des Achats (`/achats`)

- **Filtres** : Recherche, statut, fournisseur, entrepôt
- **Pagination** : Navigation par pages
- **Actions** : Voir détails, modifier statut
- **Statuts** : En attente, Confirmé, Partiellement reçu, Reçu, Annulé

### 2. Créer un Achat (`/achat/creer`)

- **Sélection** : Fournisseur, entrepôt de destination
- **Dates** : Date d'achat, date de livraison prévue
- **Produits** : Ajout dynamique de produits avec quantités et prix
- **Calculs** : Total automatique
- **Validation** : Contrôles de cohérence

### 3. Détails d'un Achat (`/achat/{id}/details`)

- **Informations générales** : Numéro, dates, montants
- **Fournisseur** : Détails du fournisseur
- **Entrepôt** : Informations de destination
- **Produits** : Liste détaillée avec quantités commandées/reçues
- **Suivi** : Historique des modifications

### 4. Modifier le Statut (`/achat/{id}/modifier-statut`)

- **Statuts disponibles** : Tous les statuts possibles
- **Date de livraison** : Mise à jour de la livraison effective
- **Notes** : Ajout de commentaires
- **Mise à jour automatique** : Des stocks lors de la réception

## Structure de la Base de Données

### Tables Principales

- **`purchases`** : Achats principaux
- **`purchase_details`** : Détails des produits achetés
- **`suppliers`** : Fournisseurs
- **`warehouses`** : Entrepôts
- **`products`** : Produits (synchronisés avec l'API)
- **`warehouse_stock`** : Stock par entrepôt
- **`stock_movements`** : Historique des mouvements

### Vues Utiles

- **`v_total_stock_by_product`** : Stock total par produit
- **`v_warehouse_inventory`** : Inventaire par entrepôt
- **`v_pending_purchases`** : Achats en attente
- **`v_pending_sales`** : Ventes en attente

## Workflow des Achats

1. **Création** : L'utilisateur crée un achat avec fournisseur, entrepôt et produits
2. **Confirmation** : Le statut passe à "Confirmé" après validation
3. **Réception** : Lors de la livraison, le statut passe à "Reçu"
4. **Mise à jour stock** : Les quantités sont automatiquement ajoutées au stock
5. **Mouvements** : Un mouvement de stock est créé pour traçabilité

## Gestion des Erreurs

- **Validation** : Contrôles côté client et serveur
- **Transactions** : Utilisation de transactions pour la cohérence
- **Logs** : Enregistrement des erreurs dans les logs
- **Messages** : Feedback utilisateur clair

## Sécurité

- **Sanitisation** : Nettoyage de tous les inputs
- **Validation** : Vérification des données
- **Permissions** : Contrôle d'accès basé sur les rôles
- **SQL Injection** : Utilisation de requêtes préparées

## Performance

- **Index** : Index sur les colonnes fréquemment utilisées
- **Pagination** : Limitation du nombre d'enregistrements
- **Cache** : Mise en cache des requêtes fréquentes
- **Optimisation** : Requêtes optimisées

## Maintenance

### Synchronisation des Produits

Exécutez régulièrement `sync_products.php` pour maintenir les produits à jour :

```bash
# Synchronisation manuelle
php sync_products.php

# Ou via cron (quotidien)
0 2 * * * cd /path/to/toure && php sync_products.php
```

### Sauvegarde

Sauvegardez régulièrement la base de données :

```bash
# Sauvegarde complète
mysqldump -u root -p toure_distribution > backup_$(date +%Y%m%d).sql

# Restauration
mysql -u root -p toure_distribution < backup_20240101.sql
```

## Prochaines Étapes

1. **Ventes** : Migration de la gestion des ventes
2. **Stock** : Interface de gestion des stocks
3. **Rapports** : Tableaux de bord et rapports
4. **API** : API REST pour intégration externe
5. **Notifications** : Alertes de stock bas

## Support

Pour toute question ou problème :

1. Vérifiez les logs d'erreur
2. Consultez la documentation de l'API
3. Contactez l'équipe de développement

---

**Note** : Ce système est conçu pour fonctionner en parallèle avec l'API existante. Les données sensibles (achats, ventes, stock) sont gérées localement, tandis que les données de référence (clients, fournisseurs) peuvent continuer à utiliser l'API.
