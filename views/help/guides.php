<?php
$title = 'Guides d\'Utilisation - Centre d\'Aide';
ob_start();
?>

<style>
    :root {
        --primary-color: #f00480;
        --secondary-color: #010768;
        --accent-color: #010068;
        --light-primary: rgba(240, 4, 128, 0.1);
    }

    .guide-card {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        border: none;
        transition: all 0.3s ease;
        height: 100%;
        text-decoration: none;
        color: inherit;
        position: relative;
        overflow: hidden;
    }

    .guide-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
    }

    .guide-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        text-decoration: none;
        color: inherit;
    }

    .guide-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        color: white;
        margin-bottom: 1.5rem;
    }

    .guide-level {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .level-beginner { background-color: #d4edda; color: #155724; }
    .level-intermediate { background-color: #fff3cd; color: #856404; }
    .level-advanced { background-color: #f8d7da; color: #721c24; }

    .section-title {
        color: var(--secondary-color);
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .section-title i {
        color: var(--primary-color);
    }

    .search-section {
        background: linear-gradient(135deg, var(--secondary-color) 0%, var(--accent-color) 100%);
        color: white;
        border-radius: 16px;
        padding: 2rem;
        margin-bottom: 3rem;
    }

    .search-input {
        border: none;
        border-radius: 12px;
        padding: 1rem 1.5rem;
        font-size: 1.1rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .search-input:focus {
        outline: none;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
        transform: translateY(-2px);
    }
</style>

<main id="content" role="main" class="main">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="page-header-title text-secondary-custom">
                        <i class="bi-book me-2"></i>
                        Guides d'Utilisation
                    </h1>
                    <p class="text-muted mb-0">Apprenez à utiliser toutes les fonctionnalités de la plateforme</p>
                </div>
                <div class="col-auto">
                    <a href="/help" class="btn btn-outline-secondary">
                        <i class="bi-arrow-left me-1"></i> Retour au Centre d'Aide
                    </a>
                </div>
            </div>
        </div>

        <!-- Section de Recherche -->
        <div class="search-section">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="display-6 fw-bold mb-3">
                        Trouvez le Guide Qu'il Vous Faut
                    </h2>
                    <p class="lead mb-4">
                        Parcourez nos guides détaillés pour maîtriser toutes les fonctionnalités.
                    </p>
                </div>
                <div class="col-lg-4">
                    <div class="input-group">
                        <input type="text" class="form-control search-input" placeholder="Rechercher un guide..." id="searchInput">
                        <button class="btn btn-light" type="button" id="searchBtn">
                            <i class="bi-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Guides par Catégorie -->
        <div class="row">
            <div class="col-12">
                <h2 class="section-title">
                    <i class="bi-grid-3x3-gap"></i>
                    Guides par Catégorie
                </h2>
            </div>
        </div>

        <!-- Guides de Base -->
        <div class="row mb-5">
            <div class="col-12">
                <h3 class="text-secondary-custom mb-4">Guides de Base</h3>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="#" class="guide-card">
                    <div class="guide-level level-beginner">Débutant</div>
                    <div class="guide-icon bg-primary-custom">
                        <i class="bi-play-circle"></i>
                    </div>
                    <h5 class="mb-3">Premiers Pas</h5>
                    <p class="text-muted mb-3">
                        Guide complet pour commencer à utiliser la plateforme Toure Distribution. Configuration initiale, navigation et fonctionnalités de base.
                    </p>
                    <div class="d-flex align-items-center">
                        <span class="text-primary-custom fw-bold">15 min de lecture</span>
                        <i class="bi-arrow-right ms-auto"></i>
                    </div>
                </a>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="#" class="guide-card">
                    <div class="guide-level level-beginner">Débutant</div>
                    <div class="guide-icon bg-secondary-custom">
                        <i class="bi-person-plus"></i>
                    </div>
                    <h5 class="mb-3">Gestion des Clients</h5>
                    <p class="text-muted mb-3">
                        Apprenez à créer, modifier et gérer vos clients. Types de clients, soldes, historique des transactions et plus encore.
                    </p>
                    <div class="d-flex align-items-center">
                        <span class="text-primary-custom fw-bold">20 min de lecture</span>
                        <i class="bi-arrow-right ms-auto"></i>
                    </div>
                </a>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="#" class="guide-card">
                    <div class="guide-level level-beginner">Débutant</div>
                    <div class="guide-icon" style="background-color: var(--accent-color);">
                        <i class="bi-box"></i>
                    </div>
                    <h5 class="mb-3">Gestion des Produits</h5>
                    <p class="text-muted mb-3">
                        Créez et gérez votre catalogue de produits. Catégories, prix, descriptions et organisation de votre inventaire.
                    </p>
                    <div class="d-flex align-items-center">
                        <span class="text-primary-custom fw-bold">25 min de lecture</span>
                        <i class="bi-arrow-right ms-auto"></i>
                    </div>
                </a>
            </div>
        </div>

        <!-- Guides Intermédiaires -->
        <div class="row mb-5">
            <div class="col-12">
                <h3 class="text-secondary-custom mb-4">Guides Intermédiaires</h3>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="#" class="guide-card">
                    <div class="guide-level level-intermediate">Intermédiaire</div>
                    <div class="guide-icon bg-success">
                        <i class="bi-cart"></i>
                    </div>
                    <h5 class="mb-3">Processus de Vente Complet</h5>
                    <p class="text-muted mb-3">
                        Maîtrisez le processus complet de vente : création, modification, paiements, facturation et suivi des commandes.
                    </p>
                    <div class="d-flex align-items-center">
                        <span class="text-primary-custom fw-bold">30 min de lecture</span>
                        <i class="bi-arrow-right ms-auto"></i>
                    </div>
                </a>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="#" class="guide-card">
                    <div class="guide-level level-intermediate">Intermédiaire</div>
                    <div class="guide-icon bg-info">
                        <i class="bi-building"></i>
                    </div>
                    <h5 class="mb-3">Gestion Multi-Entrepôts</h5>
                    <p class="text-muted mb-3">
                        Gérez plusieurs entrepôts, transferts entre sites, stocks par emplacement et optimisation des livraisons.
                    </p>
                    <div class="d-flex align-items-center">
                        <span class="text-primary-custom fw-bold">35 min de lecture</span>
                        <i class="bi-arrow-right ms-auto"></i>
                    </div>
                </a>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="#" class="guide-card">
                    <div class="guide-level level-intermediate">Intermédiaire</div>
                    <div class="guide-icon bg-warning">
                        <i class="bi-truck"></i>
                    </div>
                    <h5 class="mb-3">Logistique et Livraisons</h5>
                    <p class="text-muted mb-3">
                        Planifiez et gérez vos livraisons, assignez chauffeurs et camions, suivez les expéditions en temps réel.
                    </p>
                    <div class="d-flex align-items-center">
                        <span class="text-primary-custom fw-bold">40 min de lecture</span>
                        <i class="bi-arrow-right ms-auto"></i>
                    </div>
                </a>
            </div>
        </div>

        <!-- Guides Avancés -->
        <div class="row mb-5">
            <div class="col-12">
                <h3 class="text-secondary-custom mb-4">Guides Avancés</h3>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="#" class="guide-card">
                    <div class="guide-level level-advanced">Avancé</div>
                    <div class="guide-icon bg-danger">
                        <i class="bi-code-slash"></i>
                    </div>
                    <h5 class="mb-3">Intégration API</h5>
                    <p class="text-muted mb-3">
                        Intégrez l'API dans vos applications. Authentification, endpoints, webhooks et bonnes pratiques de développement.
                    </p>
                    <div class="d-flex align-items-center">
                        <span class="text-primary-custom fw-bold">60 min de lecture</span>
                        <i class="bi-arrow-right ms-auto"></i>
                    </div>
                </a>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="#" class="guide-card">
                    <div class="guide-level level-advanced">Avancé</div>
                    <div class="guide-icon" style="background-color: #6f42c1;">
                        <i class="bi-graph-up"></i>
                    </div>
                    <h5 class="mb-3">Rapports et Analytics</h5>
                    <p class="text-muted mb-3">
                        Créez des rapports personnalisés, analysez vos données, exports avancés et tableaux de bord personnalisés.
                    </p>
                    <div class="d-flex align-items-center">
                        <span class="text-primary-custom fw-bold">45 min de lecture</span>
                        <i class="bi-arrow-right ms-auto"></i>
                    </div>
                </a>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="#" class="guide-card">
                    <div class="guide-level level-advanced">Avancé</div>
                    <div class="guide-icon" style="background-color: #20c997;">
                        <i class="bi-gear"></i>
                    </div>
                    <h5 class="mb-3">Configuration Avancée</h5>
                    <p class="text-muted mb-3">
                        Configuration système, paramètres avancés, personnalisation de l'interface et optimisation des performances.
                    </p>
                    <div class="d-flex align-items-center">
                        <span class="text-primary-custom fw-bold">50 min de lecture</span>
                        <i class="bi-arrow-right ms-auto"></i>
                    </div>
                </a>
            </div>
        </div>

        <!-- Tutoriels Vidéo -->
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="section-title">
                    <i class="bi-play-circle"></i>
                    Tutoriels Vidéo
                </h2>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="guide-card">
                    <div class="guide-icon bg-primary-custom">
                        <i class="bi-play-btn"></i>
                    </div>
                    <h5 class="mb-3">Démonstration Complète</h5>
                    <p class="text-muted mb-3">
                        Vidéo de démonstration complète de la plateforme Toure Distribution. Parfait pour comprendre le flux de travail complet.
                    </p>
                    <div class="d-flex align-items-center">
                        <span class="text-primary-custom fw-bold">25 min de vidéo</span>
                        <button class="btn btn-primary-custom btn-sm ms-auto">
                            <i class="bi-play me-1"></i> Regarder
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="guide-card">
                    <div class="guide-icon bg-secondary-custom">
                        <i class="bi-camera-video"></i>
                    </div>
                    <h5 class="mb-3">Formation API</h5>
                    <p class="text-muted mb-3">
                        Tutoriel vidéo détaillé sur l'utilisation de l'API. Exemples pratiques et cas d'usage réels.
                    </p>
                    <div class="d-flex align-items-center">
                        <span class="text-primary-custom fw-bold">40 min de vidéo</span>
                        <button class="btn btn-primary-custom btn-sm ms-auto">
                            <i class="bi-play me-1"></i> Regarder
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ressources Supplémentaires -->
        <div class="row">
            <div class="col-12">
                <h2 class="section-title">
                    <i class="bi-collection"></i>
                    Ressources Supplémentaires
                </h2>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="guide-card">
                    <div class="guide-icon bg-info">
                        <i class="bi-file-earmark-pdf"></i>
                    </div>
                    <h5 class="mb-3">Manuel Utilisateur PDF</h5>
                    <p class="text-muted mb-3">
                        Téléchargez le manuel utilisateur complet au format PDF pour consultation hors ligne.
                    </p>
                    <div class="d-flex align-items-center">
                        <span class="text-primary-custom fw-bold">120 pages</span>
                        <button class="btn btn-outline-primary btn-sm ms-auto">
                            <i class="bi-download me-1"></i> Télécharger
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="guide-card">
                    <div class="guide-icon bg-success">
                        <i class="bi-code-square"></i>
                    </div>
                    <h5 class="mb-3">Documentation API</h5>
                    <p class="text-muted mb-3">
                        Documentation technique complète de l'API avec exemples de code et références.
                    </p>
                    <div class="d-flex align-items-center">
                        <span class="text-primary-custom fw-bold">API Reference</span>
                        <a href="https://toure.gestiem.com/docs" target="_blank" class="btn btn-outline-primary btn-sm ms-auto">
                            <i class="bi-arrow-right me-1"></i> Consulter
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="guide-card">
                    <div class="guide-icon bg-warning">
                        <i class="bi-chat-dots"></i>
                    </div>
                    <h5 class="mb-3">Communauté</h5>
                    <p class="text-muted mb-3">
                        Rejoignez notre communauté d'utilisateurs pour échanger et obtenir de l'aide.
                    </p>
                    <div class="d-flex align-items-center">
                        <span class="text-primary-custom fw-bold">Forum actif</span>
                        <button class="btn btn-outline-primary btn-sm ms-auto">
                            <i class="bi-arrow-right me-1"></i> Rejoindre
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    // Fonction de recherche
    document.getElementById('searchBtn').addEventListener('click', function() {
        const searchTerm = document.getElementById('searchInput').value;
        if (searchTerm.trim()) {
            // Filtrer les guides par terme de recherche
            filterGuides(searchTerm);
        }
    });

    // Recherche avec Enter
    document.getElementById('searchInput').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            document.getElementById('searchBtn').click();
        }
    });

    // Fonction de filtrage des guides
    function filterGuides(searchTerm) {
        const guides = document.querySelectorAll('.guide-card');
        const term = searchTerm.toLowerCase();
        
        guides.forEach(guide => {
            const title = guide.querySelector('h5').textContent.toLowerCase();
            const description = guide.querySelector('p').textContent.toLowerCase();
            
            if (title.includes(term) || description.includes(term)) {
                guide.style.display = 'block';
            } else {
                guide.style.display = 'none';
            }
        });
    }

    // Animation des cartes au survol
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.guide-card');
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-4px)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    });
</script>

<?php
$content = ob_get_clean();
require('./views/layouts/app-layout.php');
?>
