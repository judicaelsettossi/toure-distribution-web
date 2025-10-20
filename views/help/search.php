<?php
$title = 'Recherche - Centre d\'Aide';
ob_start();
?>

<style>
    :root {
        --primary-color: #f00480;
        --secondary-color: #010768;
        --accent-color: #010068;
        --light-primary: rgba(240, 4, 128, 0.1);
    }

    .search-result {
        background: white;
        border-radius: 8px;
        padding: 1.5rem;
        margin-bottom: 1rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.06);
        border: 1px solid #f0f0f0;
        transition: all 0.3s ease;
    }

    .search-result:hover {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        border-color: var(--primary-color);
    }

    .search-result-title {
        color: var(--secondary-color);
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .search-result-excerpt {
        color: #666;
        line-height: 1.6;
        margin-bottom: 1rem;
    }

    .search-result-meta {
        display: flex;
        align-items: center;
        gap: 1rem;
        font-size: 0.875rem;
        color: #999;
    }

    .search-result-type {
        background-color: var(--light-primary);
        color: var(--primary-color);
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-weight: 600;
    }

    .search-section {
        background: linear-gradient(135deg, var(--secondary-color) 0%, var(--accent-color) 100%);
        color: white;
        border-radius: 16px;
        padding: 2rem;
        margin-bottom: 2rem;
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

    .filter-section {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        margin-bottom: 2rem;
    }

    .filter-tag {
        display: inline-block;
        padding: 0.5rem 1rem;
        background-color: #f8f9fa;
        color: #666;
        border-radius: 20px;
        margin: 0.25rem;
        cursor: pointer;
        transition: all 0.3s ease;
        border: 1px solid #e9ecef;
    }

    .filter-tag:hover {
        background-color: var(--light-primary);
        color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .filter-tag.active {
        background-color: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
    }

    .no-results {
        text-align: center;
        padding: 3rem;
        color: #666;
    }

    .no-results i {
        font-size: 4rem;
        color: #ddd;
        margin-bottom: 1rem;
    }
</style>

<main id="content" role="main" class="main">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="page-header-title text-secondary-custom">
                        <i class="bi-search me-2"></i>
                        Recherche dans l'Aide
                    </h1>
                    <p class="text-muted mb-0">Trouvez rapidement les informations dont vous avez besoin</p>
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
                        Que recherchez-vous ?
                    </h2>
                    <p class="lead mb-4">
                        Tapez votre question ou mot-clé pour trouver la réponse.
                    </p>
                </div>
                <div class="col-lg-4">
                    <div class="input-group">
                        <input type="text" class="form-control search-input" placeholder="Tapez votre recherche..." id="searchInput" value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>">
                        <button class="btn btn-light" type="button" id="searchBtn">
                            <i class="bi-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filtres -->
        <div class="filter-section">
            <h5 class="text-secondary-custom mb-3">Filtrer par Type</h5>
            <div class="filter-tags">
                <span class="filter-tag active" data-type="all">Tout</span>
                <span class="filter-tag" data-type="faq">Questions Fréquentes</span>
                <span class="filter-tag" data-type="guide">Guides</span>
                <span class="filter-tag" data-type="tutorial">Tutoriels</span>
                <span class="filter-tag" data-type="api">API</span>
                <span class="filter-tag" data-type="troubleshooting">Dépannage</span>
            </div>
        </div>

        <!-- Résultats de Recherche -->
        <div id="searchResults">
            <!-- Les résultats seront chargés ici via JavaScript -->
        </div>

        <!-- Message Aucun Résultat -->
        <div id="noResults" class="no-results" style="display: none;">
            <i class="bi-search"></i>
            <h4>Aucun résultat trouvé</h4>
            <p>Essayez avec d'autres mots-clés ou parcourez nos catégories d'aide.</p>
            <div class="mt-4">
                <a href="/help/faq" class="btn btn-primary-custom me-2">Questions Fréquentes</a>
                <a href="/help/guides" class="btn btn-outline-primary">Guides d'Utilisation</a>
            </div>
        </div>
    </div>
</main>

<script>
    // Données de recherche simulées
    const searchData = [
        {
            id: 1,
            title: "Comment créer une nouvelle vente ?",
            excerpt: "Guide complet pour créer une vente dans le système. Sélection du client, ajout des produits, calcul des totaux et validation.",
            type: "faq",
            category: "Ventes",
            url: "/help/faq#vente-creation"
        },
        {
            id: 2,
            title: "Gestion des stocks par entrepôt",
            excerpt: "Apprenez à consulter et gérer les stocks dans différents entrepôts. Transferts, ajustements et rapports de stock.",
            type: "guide",
            category: "Stocks",
            url: "/help/guides#stock-management"
        },
        {
            id: 3,
            title: "Configuration de l'API",
            excerpt: "Guide technique pour configurer et utiliser l'API Toure Distribution. Authentification, endpoints et exemples de code.",
            type: "api",
            category: "Intégration",
            url: "/help/guides#api-configuration"
        },
        {
            id: 4,
            title: "Résolution des problèmes de connexion",
            excerpt: "Solutions pour résoudre les problèmes de connexion et d'authentification dans l'application.",
            type: "troubleshooting",
            category: "Support",
            url: "/help/faq#connection-issues"
        },
        {
            id: 5,
            title: "Tutoriel vidéo : Premiers pas",
            excerpt: "Vidéo de démonstration complète pour commencer à utiliser la plateforme Toure Distribution.",
            type: "tutorial",
            category: "Formation",
            url: "/help/guides#video-tutorial"
        },
        {
            id: 6,
            title: "Comment planifier une livraison ?",
            excerpt: "Processus complet pour planifier et gérer les livraisons. Assignation des chauffeurs et suivi des expéditions.",
            type: "faq",
            category: "Livraisons",
            url: "/help/faq#livraison-planning"
        },
        {
            id: 7,
            title: "Gestion des paiements",
            excerpt: "Guide pour gérer les paiements des ventes. Modes de paiement, suivi des encaissements et rapports financiers.",
            type: "guide",
            category: "Finances",
            url: "/help/guides#payment-management"
        },
        {
            id: 8,
            title: "Intégration avec systèmes externes",
            excerpt: "Comment intégrer Toure Distribution avec vos systèmes existants via l'API et les webhooks.",
            type: "api",
            category: "Intégration",
            url: "/help/guides#external-integration"
        },
        {
            id: 9,
            title: "Rapports et analytics avancés",
            excerpt: "Création de rapports personnalisés et analyse des données de vente et de stock.",
            type: "guide",
            category: "Rapports",
            url: "/help/guides#advanced-reports"
        },
        {
            id: 10,
            title: "Problèmes de performance",
            excerpt: "Solutions pour optimiser les performances de l'application et résoudre les lenteurs.",
            type: "troubleshooting",
            category: "Support",
            url: "/help/faq#performance-issues"
        }
    ];

    let currentFilter = 'all';
    let currentSearchTerm = '';

    // Initialisation
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const searchTerm = urlParams.get('q');
        
        if (searchTerm) {
            document.getElementById('searchInput').value = searchTerm;
            performSearch(searchTerm);
        } else {
            showAllResults();
        }

        // Gestion des filtres
        document.querySelectorAll('.filter-tag').forEach(tag => {
            tag.addEventListener('click', function() {
                // Retirer la classe active de tous les tags
                document.querySelectorAll('.filter-tag').forEach(t => t.classList.remove('active'));
                // Ajouter la classe active au tag cliqué
                this.classList.add('active');
                
                currentFilter = this.dataset.type;
                if (currentSearchTerm) {
                    performSearch(currentSearchTerm);
                } else {
                    showAllResults();
                }
            });
        });

        // Gestion de la recherche
        document.getElementById('searchBtn').addEventListener('click', function() {
            const searchTerm = document.getElementById('searchInput').value.trim();
            if (searchTerm) {
                performSearch(searchTerm);
            } else {
                showAllResults();
            }
        });

        // Recherche avec Enter
        document.getElementById('searchInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                document.getElementById('searchBtn').click();
            }
        });
    });

    // Fonction de recherche
    function performSearch(searchTerm) {
        currentSearchTerm = searchTerm.toLowerCase();
        
        const filteredResults = searchData.filter(item => {
            const matchesSearch = item.title.toLowerCase().includes(currentSearchTerm) || 
                                item.excerpt.toLowerCase().includes(currentSearchTerm) ||
                                item.category.toLowerCase().includes(currentSearchTerm);
            
            const matchesFilter = currentFilter === 'all' || item.type === currentFilter;
            
            return matchesSearch && matchesFilter;
        });

        displayResults(filteredResults);
    }

    // Fonction pour afficher tous les résultats
    function showAllResults() {
        const filteredResults = searchData.filter(item => {
            return currentFilter === 'all' || item.type === currentFilter;
        });
        displayResults(filteredResults);
    }

    // Fonction pour afficher les résultats
    function displayResults(results) {
        const resultsContainer = document.getElementById('searchResults');
        const noResultsDiv = document.getElementById('noResults');
        
        if (results.length === 0) {
            resultsContainer.innerHTML = '';
            noResultsDiv.style.display = 'block';
            return;
        }
        
        noResultsDiv.style.display = 'none';
        
        const resultsHTML = results.map(item => `
            <div class="search-result">
                <h5 class="search-result-title">
                    <a href="${item.url}" class="text-decoration-none">${highlightSearchTerm(item.title)}</a>
                </h5>
                <p class="search-result-excerpt">${highlightSearchTerm(item.excerpt)}</p>
                <div class="search-result-meta">
                    <span class="search-result-type">${getTypeLabel(item.type)}</span>
                    <span>${item.category}</span>
                    <span><i class="bi-clock me-1"></i>${getReadingTime(item.type)}</span>
                </div>
            </div>
        `).join('');
        
        resultsContainer.innerHTML = resultsHTML;
    }

    // Fonction pour surligner les termes de recherche
    function highlightSearchTerm(text) {
        if (!currentSearchTerm) return text;
        
        const regex = new RegExp(`(${currentSearchTerm})`, 'gi');
        return text.replace(regex, '<mark>$1</mark>');
    }

    // Fonction pour obtenir le label du type
    function getTypeLabel(type) {
        const labels = {
            'faq': 'FAQ',
            'guide': 'Guide',
            'tutorial': 'Tutoriel',
            'api': 'API',
            'troubleshooting': 'Dépannage'
        };
        return labels[type] || type;
    }

    // Fonction pour obtenir le temps de lecture estimé
    function getReadingTime(type) {
        const times = {
            'faq': '2 min',
            'guide': '5-10 min',
            'tutorial': '15-30 min',
            'api': '10-20 min',
            'troubleshooting': '3-5 min'
        };
        return times[type] || '5 min';
    }
</script>

<?php
$content = ob_get_clean();
require('./views/layouts/app-layout.php');
?>
