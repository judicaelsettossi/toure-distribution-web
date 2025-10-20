# 🚀 Installation Simple - Toure Distribution

## Installation en 3 Étapes

### 1. Configuration de la Base de Données

Modifiez le fichier `configs/database-config.php` avec vos paramètres :

```php
define('DB_HOST', 'localhost');           // Votre serveur MySQL
define('DB_NAME', 'toure_distribution');  // Nom de votre base de données
define('DB_USER', 'votre_utilisateur');   // Votre nom d'utilisateur MySQL
define('DB_PASS', 'votre_mot_de_passe');  // Votre mot de passe MySQL
```

### 2. Accès à l'Application

Ouvrez votre navigateur et accédez à :
- **Votre site** : `https://votre-domaine.com`
- **Vérification** : `https://votre-domaine.com/check_installation.php`

### 3. C'est Tout ! 🎉

L'application s'initialise automatiquement :
- ✅ Création de la base de données
- ✅ Création des tables
- ✅ Synchronisation des produits
- ✅ Insertion des données de test

## Fonctionnalités Disponibles

### Gestion des Achats
- **Liste** : `/achats` - Voir tous les achats
- **Créer** : `/achat/creer` - Nouvel achat
- **Détails** : `/achat/{id}/details` - Détails d'un achat
- **Statut** : `/achat/{id}/modifier-statut` - Modifier le statut

### Autres Modules
- **Fournisseurs** : `/fournisseurs`
- **Produits** : `/produit/liste`
- **Entrepôts** : `/entrepots`

## Dépannage

### Problème de Connexion à la Base de Données
1. Vérifiez les paramètres dans `configs/database-config.php`
2. Testez la connexion MySQL
3. Vérifiez les permissions de l'utilisateur

### Erreur 500
1. Consultez les logs dans `logs/error.log`
2. Vérifiez les permissions des fichiers
3. Activez temporairement `DEBUG_MODE=true` dans `configs/hosting-config.php`

### Pages Blanches
1. Vérifiez la syntaxe PHP
2. Consultez les logs d'erreur
3. Vérifiez que toutes les extensions PHP sont installées

## Fichiers de Configuration

- `configs/database-config.php` - Configuration de la base de données
- `configs/api-config.php` - Configuration de l'API
- `configs/hosting-config.php` - Configuration d'hébergement

## Fichiers de Vérification

- `check_installation.php` - Vérification complète de l'installation
- `deploy.php` - Script de déploiement simple

## Sécurité

- Supprimez `check_installation.php` et `deploy.php` après installation
- Changez les mots de passe par défaut
- Activez HTTPS
- Sauvegardez régulièrement la base de données

## Support

En cas de problème :
1. Consultez `DEPLOYMENT.md` pour plus de détails
2. Vérifiez les logs dans `logs/`
3. Contactez l'équipe de développement

---

**Note** : Aucun script en ligne de commande n'est nécessaire. L'application s'initialise automatiquement au premier accès !
