<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Base de Données - ERP</title>
    <link rel="stylesheet" href="/assets/css/theme.min.css">
    <style>
        .db-card {
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s;
            height: 100%;
            background: white;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        }
        .db-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 25px rgba(0,0,0,0.15);
        }
        .db-icon {
            font-size: 48px;
            margin-bottom: 20px;
        }
        .db-card h3 {
            margin-bottom: 15px;
            color: #333;
        }
        .db-card p {
            color: #666;
            margin-bottom: 20px;
        }
        .btn-db {
            display: inline-block;
            padding: 10px 25px;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.3s;
            font-weight: 600;
        }
        .btn-install {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .btn-test {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
        }
        .btn-docs {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
        }
        .btn-db:hover {
            transform: scale(1.05);
        }
        .status-badge {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .status-active {
            background: #d4edda;
            color: #155724;
        }
        .status-pending {
            background: #fff3cd;
            color: #856404;
        }
    </style>
</head>
<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl">
    <?php include './views/includes/header.php'; ?>
    <?php include './views/includes/sidebar.php'; ?>
    
    <main id="content" role="main" class="main">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm mb-2 mb-sm-0">
                        <h1 class="page-header-title">
                            <i class="bi-database"></i> Gestion Base de Données
                        </h1>
                        <p class="page-header-text">Configuration et gestion du système de base de données local</p>
                    </div>
                </div>
            </div>
            
            <!-- Cards -->
            <div class="row mb-4">
                <!-- Installation -->
                <div class="col-md-4 mb-3">
                    <div class="db-card">
                        <div class="db-icon">🚀</div>
                        <span class="status-badge status-pending">Configuration requise</span>
                        <h3>Installer la Base</h3>
                        <p>Créer et initialiser toutes les tables nécessaires pour le système ERP</p>
                        <a href="/install-database.php" class="btn-db btn-install">
                            Lancer l'installation
                        </a>
                    </div>
                </div>
                
                <!-- Test -->
                <div class="col-md-4 mb-3">
                    <div class="db-card">
                        <div class="db-icon">🧪</div>
                        <span class="status-badge status-active">Prêt</span>
                        <h3>Tester la Connexion</h3>
                        <p>Vérifier que tous les composants de la base de données fonctionnent correctement</p>
                        <a href="/test-db.php" class="btn-db btn-test">
                            Exécuter les tests
                        </a>
                    </div>
                </div>
                
                <!-- Documentation -->
                <div class="col-md-4 mb-3">
                    <div class="db-card">
                        <div class="db-icon">📚</div>
                        <span class="status-badge status-active">Disponible</span>
                        <h3>Documentation</h3>
                        <p>Guide complet d'utilisation et référence des modèles de données</p>
                        <a href="/database/README.md" target="_blank" class="btn-db btn-docs">
                            Voir la documentation
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Fonctionnalités -->
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-header-title">
                        <i class="bi-check2-circle"></i> Fonctionnalités Disponibles
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="mb-3">📦 Gestion du Stock</h5>
                            <ul class="list-unstyled">
                                <li class="mb-2">✓ Produits et catégories</li>
                                <li class="mb-2">✓ Multi-entrepôts</li>
                                <li class="mb-2">✓ Mouvements de stock</li>
                                <li class="mb-2">✓ Inventaires physiques</li>
                                <li class="mb-2">✓ Alertes de stock</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h5 class="mb-3">💰 Ventes & Achats</h5>
                            <ul class="list-unstyled">
                                <li class="mb-2">✓ Gestion des ventes</li>
                                <li class="mb-2">✓ Commandes fournisseurs</li>
                                <li class="mb-2">✓ Clients et fournisseurs</li>
                                <li class="mb-2">✓ Factures et paiements</li>
                                <li class="mb-2">✓ Livraisons</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Structure de la Base -->
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-header-title">
                        <i class="bi-diagram-3"></i> Structure de la Base de Données
                    </h3>
                </div>
                <div class="card-body">
                    <div class="alert alert-soft-info" role="alert">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <i class="bi-info-circle fs-3"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h4 class="alert-heading">30+ Tables créées</h4>
                                <p class="mb-2">La base de données comprend toutes les tables nécessaires pour:</p>
                                <ul class="mb-0">
                                    <li>Gestion complète des stocks et mouvements</li>
                                    <li>Système de ventes avec paiements et factures</li>
                                    <li>Gestion des commandes et réceptions</li>
                                    <li>Clients, fournisseurs et entrepôts</li>
                                    <li>Logs d'activités et traçabilité complète</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Guide Rapide -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-header-title">
                        <i class="bi-lightning"></i> Guide Rapide
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="mb-3">Étapes d'installation</h5>
                            <ol class="list-group list-group-numbered list-group-flush">
                                <li class="list-group-item border-0">
                                    <strong>Installer la base de données</strong> - Cliquez sur "Lancer l'installation"
                                </li>
                                <li class="list-group-item border-0">
                                    <strong>Tester la connexion</strong> - Vérifiez que tout fonctionne avec les tests
                                </li>
                                <li class="list-group-item border-0">
                                    <strong>Configurer si nécessaire</strong> - Modifiez <code>configs/database-config.php</code>
                                </li>
                                <li class="list-group-item border-0">
                                    <strong>Utiliser l'API locale</strong> - Les contrôleurs peuvent maintenant utiliser la base locale
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <script src="/assets/js/vendor.min.js"></script>
    <script src="/assets/js/theme.min.js"></script>
</body>
</html>
