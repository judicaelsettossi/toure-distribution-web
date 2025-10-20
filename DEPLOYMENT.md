# Guide de Déploiement - Toure Distribution

## Déploiement sur Serveur Mutualisé

### 1. Prérequis

- PHP 7.4 ou supérieur
- MySQL 5.7 ou MariaDB 10.2+
- Extensions PHP : PDO, cURL, JSON, Session
- Accès FTP/SFTP au serveur

### 2. Configuration de la Base de Données

#### Option A : Via cPanel/Plesk
1. Créer une base de données MySQL
2. Créer un utilisateur avec tous les privilèges sur cette base
3. Noter les identifiants de connexion

#### Option B : Via ligne de commande
```sql
CREATE DATABASE toure_distribution CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'toure_user'@'localhost' IDENTIFIED BY 'secure_password';
GRANT ALL PRIVILEGES ON toure_distribution.* TO 'toure_user'@'localhost';
FLUSH PRIVILEGES;
```

### 3. Configuration des Paramètres

Modifiez le fichier `configs/database-config.php` :

```php
define('DB_HOST', 'localhost'); // ou l'IP de votre serveur MySQL
define('DB_NAME', 'toure_distribution');
define('DB_USER', 'votre_utilisateur');
define('DB_PASS', 'votre_mot_de_passe');
```

### 4. Upload des Fichiers

1. Compressez tous les fichiers du projet
2. Uploadez sur votre serveur via FTP/SFTP
3. Décompressez dans le dossier public_html (ou équivalent)

### 5. Permissions

```bash
# Rendre le dossier logs accessible en écriture
chmod 755 logs/
chmod 644 logs/*.log

# Permissions pour les fichiers PHP
chmod 644 *.php
chmod 644 configs/*.php
chmod 644 controllers/*.php
chmod 644 views/**/*.php
```

### 6. Test du Déploiement

1. Accédez à votre site : `https://votre-domaine.com`
2. Naviguez vers `/achats` pour tester le système d'achats
3. Vérifiez que la base de données s'initialise automatiquement

### 7. Configuration Avancée

#### Variables d'Environnement (si supportées)
Créez un fichier `.env` à la racine :

```env
DB_HOST=localhost
DB_NAME=toure_distribution
DB_USER=votre_utilisateur
DB_PASS=votre_mot_de_passe
API_BASE_URL=https://toure.gestiem.com/api
APP_URL=https://votre-domaine.com
DEBUG_MODE=false
```

#### Configuration Apache (.htaccess)
Le fichier `.htaccess` est déjà configuré pour :
- Réécriture d'URL
- Sécurité
- Compression
- Cache
- Limitation des ressources

### 8. Sécurité

#### Fichiers à Protéger
- `configs/` : Contient les configurations sensibles
- `database/` : Contient les scripts SQL
- `logs/` : Contient les logs d'application
- `vendor/` : Contient les dépendances

#### Recommandations
- Changez les mots de passe par défaut
- Activez HTTPS
- Configurez un firewall
- Sauvegardez régulièrement la base de données

### 9. Maintenance

#### Sauvegarde Automatique
Créez un script de sauvegarde :

```bash
#!/bin/bash
# backup.sh
DATE=$(date +%Y%m%d_%H%M%S)
mysqldump -u votre_utilisateur -p votre_mot_de_passe toure_distribution > backup_$DATE.sql
```

#### Monitoring
- Surveillez les logs dans `logs/`
- Vérifiez l'espace disque
- Contrôlez les performances

### 10. Dépannage

#### Problèmes Courants

**Erreur de connexion à la base de données**
- Vérifiez les identifiants dans `configs/database-config.php`
- Testez la connexion MySQL
- Vérifiez que l'utilisateur a les bonnes permissions

**Erreur 500**
- Vérifiez les logs d'erreur PHP
- Vérifiez les permissions des fichiers
- Vérifiez la configuration PHP

**Pages blanches**
- Activez `DEBUG_MODE=true` temporairement
- Vérifiez les logs dans `logs/error.log`
- Vérifiez la syntaxe PHP

#### Logs à Consulter
- `logs/app.log` : Logs de l'application
- `logs/error.log` : Logs d'erreur PHP
- Logs du serveur web (Apache/Nginx)

### 11. Mise à Jour

Pour mettre à jour l'application :

1. Sauvegardez la base de données
2. Sauvegardez les fichiers modifiés
3. Uploadez les nouveaux fichiers
4. Testez le fonctionnement
5. Restaurez si nécessaire

### 12. Support

En cas de problème :

1. Consultez les logs
2. Vérifiez la configuration
3. Testez en mode debug
4. Contactez l'équipe de développement

---

**Note** : L'application s'initialise automatiquement au premier accès. Aucun script manuel n'est nécessaire.
