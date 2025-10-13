<?php
ob_start();
$product_id = $id ?? '';
?>

<style>
    :root {
        --primary-color: #f00480;
        --secondary-color: #010768;
        --accent-color: #010068;
        --light-primary: rgba(240, 4, 128, 0.1);
        --light-secondary: rgba(1, 7, 104, 0.1);
    }

    .font-public-sans {
        font-family: 'Public Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    }

    /* Fix pour éviter le chevauchement avec header et sidebar */
    .product-detail-wrapper {
        margin-left: 250px;
        /* Largeur du sidebar */
        margin-top: 70px;
        /* Hauteur du header */
        padding: 2rem;
        min-height: calc(100vh - 70px);
        background: #f8f9fa;
    }

    @media (max-width: 991px) {
        .product-detail-wrapper {
            margin-left: 0;
            margin-top: 60px;
            padding: 1rem;
        }
    }

    /* Hero section moderne */
    .product-hero {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        margin-bottom: 2rem;
    }

    .hero-image-section {
        position: relative;
        background: linear-gradient(135deg, #f00480 0%, #010768 100%);
        padding: 3rem;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 500px;
    }

    .hero-image-wrapper {
        position: relative;
        max-width: 100%;
        animation: fadeInScale 0.6s ease-out;
    }

    @keyframes fadeInScale {
        from {
            opacity: 0;
            transform: scale(0.9);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .hero-image {
        max-width: 100%;
        max-height: 450px;
        border-radius: 15px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        transition: transform 0.3s ease;
    }

    .hero-image:hover {
        transform: scale(1.05);
    }

    .status-badge-modern {
        position: absolute;
        top: 20px;
        right: 20px;
        padding: 12px 24px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.9rem;
        backdrop-filter: blur(10px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        animation: slideInRight 0.5s ease-out;
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(50px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .status-active {
        background: rgba(40, 167, 69, 0.95);
        color: white;
    }

    .status-inactive {
        background: rgba(220, 53, 69, 0.95);
        color: white;
    }

    .hero-content {
        padding: 2.5rem;
    }

    .product-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--secondary-color);
        margin-bottom: 0.5rem;
        line-height: 1.2;
    }

    .product-code {
        font-size: 1.1rem;
        color: #6c757d;
        margin-bottom: 1.5rem;
        font-weight: 500;
    }

    .category-pill {
        display: inline-flex;
        align-items: center;
        background: linear-gradient(135deg, var(--light-primary), var(--light-secondary));
        padding: 10px 20px;
        border-radius: 50px;
        font-weight: 600;
        color: var(--primary-color);
        font-size: 0.95rem;
        margin-bottom: 1.5rem;
        border: 2px solid var(--primary-color);
    }

    .category-pill i {
        margin-right: 8px;
    }

    .product-description {
        font-size: 1.05rem;
        color: #495057;
        line-height: 1.7;
        margin-bottom: 2rem;
    }

    /* Cards de prix modernes */
    .price-cards-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .price-card-modern {
        background: white;
        border-radius: 16px;
        padding: 2rem;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        border: 2px solid transparent;
        position: relative;
        overflow: hidden;
    }

    .price-card-modern::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
    }

    .price-card-modern:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(240, 4, 128, 0.15);
        border-color: var(--primary-color);
    }

    .price-card-modern.featured {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        transform: scale(1.05);
    }

    .price-card-modern.featured:hover {
        transform: scale(1.08) translateY(-5px);
    }

    .price-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }

    .price-card-modern:not(.featured) .price-icon {
        background: var(--light-primary);
        color: var(--primary-color);
    }

    .price-card-modern.featured .price-icon {
        background: rgba(255, 255, 255, 0.2);
        color: white;
    }

    .price-label-modern {
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 600;
        opacity: 0.8;
        margin-bottom: 0.5rem;
    }

    .price-value-modern {
        font-size: 1.8rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
    }

    .price-subtitle {
        font-size: 0.9rem;
        opacity: 0.7;
    }

    /* Section informations */
    .info-section {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        margin-bottom: 2rem;
    }

    .section-header {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #f0f0f0;
    }

    .section-icon {
        width: 45px;
        height: 45px;
        border-radius: 12px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        margin-right: 1rem;
    }

    .section-title-modern {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--secondary-color);
        margin: 0;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
    }

    .info-item {
        display: flex;
        align-items: flex-start;
        padding: 1rem;
        background: #f8f9fa;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .info-item:hover {
        background: var(--light-primary);
        transform: translateX(5px);
    }

    .info-item-icon {
        width: 35px;
        height: 35px;
        border-radius: 8px;
        background: white;
        color: var(--primary-color);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        font-size: 1.1rem;
        flex-shrink: 0;
    }

    .info-item-content {
        flex: 1;
    }

    .info-item-label {
        font-size: 0.85rem;
        color: #6c757d;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.25rem;
    }

    .info-item-value {
        font-size: 1.1rem;
        color: #212529;
        font-weight: 600;
    }

    /* Boutons d'action modernes */
    .action-bar {
        position: sticky;
        top: 70px;
        background: white;
        padding: 1.5rem;
        border-radius: 20px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        margin-bottom: 2rem;
        z-index: 100;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .breadcrumb-modern {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .breadcrumb-modern li {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #6c757d;
        font-size: 0.9rem;
    }

    .breadcrumb-modern li a {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .breadcrumb-modern li a:hover {
        color: var(--secondary-color);
    }

    .btn-modern {
        padding: 12px 24px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.95rem;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-primary-modern {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        box-shadow: 0 4px 15px rgba(240, 4, 128, 0.3);
    }

    .btn-primary-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(240, 4, 128, 0.4);
    }

    .btn-outline-modern {
        background: white;
        color: var(--primary-color);
        border: 2px solid var(--primary-color);
    }

    .btn-outline-modern:hover {
        background: var(--primary-color);
        color: white;
        transform: translateY(-2px);
    }

    .btn-success-modern {
        background: #28a745;
        color: white;
    }

    .btn-success-modern:hover {
        background: #218838;
        transform: translateY(-2px);
    }

    .btn-danger-modern {
        background: #dc3545;
        color: white;
    }

    .btn-danger-modern:hover {
        background: #c82333;
        transform: translateY(-2px);
    }

    /* Loading moderne */
    .loading-modern {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 60vh;
        gap: 1rem;
    }

    .spinner-modern {
        width: 60px;
        height: 60px;
        border: 4px solid #f0f0f0;
        border-top-color: var(--primary-color);
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    .loading-text {
        color: var(--secondary-color);
        font-weight: 600;
        font-size: 1.1rem;
    }

    .loading-progress {
        width: 200px;
        height: 4px;
        background: rgba(240, 4, 128, 0.1);
        border-radius: 2px;
        overflow: hidden;
        margin-top: 1rem;
    }

    .progress-bar {
        height: 100%;
        background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        border-radius: 2px;
        animation: loadingProgress 2s ease-in-out infinite;
    }

    @keyframes loadingProgress {
        0% {
            width: 0%;
            transform: translateX(-100%);
        }
        50% {
            width: 70%;
            transform: translateX(0%);
        }
        100% {
            width: 100%;
            transform: translateX(100%);
        }
    }

    /* Alert moderne */
    .alert-modern {
        background: white;
        border-radius: 16px;
        padding: 2rem;
        box-shadow: 0 5px 20px rgba(220, 53, 69, 0.15);
        border-left: 4px solid #dc3545;
    }

    .alert-modern-title {
        color: #dc3545;
        font-weight: 700;
        font-size: 1.3rem;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    /* Margin profit indicator */
    .margin-indicator {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 8px 16px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.95rem;
    }

    .margin-positive {
        background: rgba(40, 167, 69, 0.1);
        color: #28a745;
    }

    .margin-negative {
        background: rgba(220, 53, 69, 0.1);
        color: #dc3545;
    }

    /* Animations et effets avancés */
    .fade-in {
        animation: fadeIn 0.6s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .slide-in-left {
        animation: slideInLeft 0.8s ease-out;
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .slide-in-right {
        animation: slideInRight 0.8s ease-out;
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Effet de glassmorphism */
    .glass-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }

    /* Effet de hover avancé pour les cartes */
    .hover-lift {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .hover-lift:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    /* Gradient animé pour les boutons */
    .gradient-animated {
        background: linear-gradient(-45deg, var(--primary-color), var(--secondary-color), #d1036d, #020a7a);
        background-size: 400% 400%;
        animation: gradientShift 3s ease infinite;
    }

    @keyframes gradientShift {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }

    /* Effet de shimmer pour le loading */
    .shimmer {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: shimmer 1.5s infinite;
    }

    @keyframes shimmer {
        0% {
            background-position: -200% 0;
        }
        100% {
            background-position: 200% 0;
        }
    }

    /* Indicateur de stock avec animation */
    .stock-indicator {
        position: relative;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .stock-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        animation: pulse 2s infinite;
    }

    .stock-dot.good {
        background: #10b981;
        box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
    }

    .stock-dot.warning {
        background: #f59e0b;
        box-shadow: 0 0 0 0 rgba(245, 158, 11, 0.7);
    }

    .stock-dot.critical {
        background: #ef4444;
        box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.7);
    }

    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
        }
        70% {
            box-shadow: 0 0 0 10px rgba(16, 185, 129, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(16, 185, 129, 0);
        }
    }

    /* Tooltip personnalisé */
    .tooltip-custom {
        position: relative;
        cursor: help;
    }

    .tooltip-custom::before {
        content: attr(data-tooltip);
        position: absolute;
        bottom: 125%;
        left: 50%;
        transform: translateX(-50%);
        background: var(--gray-800);
        color: white;
        padding: 8px 12px;
        border-radius: 8px;
        font-size: 0.85rem;
        white-space: nowrap;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        z-index: 1000;
    }

    .tooltip-custom::after {
        content: '';
        position: absolute;
        bottom: 115%;
        left: 50%;
        transform: translateX(-50%);
        border: 5px solid transparent;
        border-top-color: var(--gray-800);
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }

    .tooltip-custom:hover::before,
    .tooltip-custom:hover::after {
        opacity: 1;
        visibility: visible;
    }

    /* Effet de particules flottantes */
    .floating-particles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        pointer-events: none;
    }

    .particle {
        position: absolute;
        background: rgba(240, 4, 128, 0.1);
        border-radius: 50%;
        animation: float 6s ease-in-out infinite;
    }

    .particle:nth-child(1) {
        width: 6px;
        height: 6px;
        left: 10%;
        animation-delay: 0s;
    }

    .particle:nth-child(2) {
        width: 8px;
        height: 8px;
        left: 20%;
        animation-delay: 1s;
    }

    .particle:nth-child(3) {
        width: 4px;
        height: 4px;
        left: 30%;
        animation-delay: 2s;
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0px) rotate(0deg);
            opacity: 0.5;
        }
        50% {
            transform: translateY(-20px) rotate(180deg);
            opacity: 1;
        }
    }

    /* Améliorations responsive */
    @media (max-width: 768px) {
        .product-detail-wrapper {
            padding: 1rem;
        }
        
        .hero-title {
            font-size: 1.8rem;
        }
        
        .price-cards-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }
        
        .info-grid {
            grid-template-columns: 1fr;
        }
    }

    /* Dark mode support */
    @media (prefers-color-scheme: dark) {
        .modern-card {
            background: #1f2937;
            color: #f9fafb;
        }
        
        .info-section {
            background: #1f2937;
            color: #f9fafb;
        }
        
        .product-hero {
            background: #1f2937;
        }
    }
</style>

<div class="product-detail-wrapper font-public-sans">
    <!-- Barre d'actions sticky -->
    <div class="action-bar">
        <nav>
            <ol class="breadcrumb-modern">
                <li><a href="/dashboard"><i class="bi bi-house-door"></i> Accueil</a></li>
                <li><i class="bi bi-chevron-right"></i></li>
                <li><a href="/produit/liste">Produits</a></li>
                <li><i class="bi bi-chevron-right"></i></li>
                <li class="active">Détails</li>
            </ol>
        </nav>
        <div id="actionButtons" class="d-flex gap-2" style="display: none !important;">
            <button id="editBtn" class="btn-modern btn-primary-modern hover-lift gradient-animated">
                <i class="bi bi-pencil"></i> Modifier
            </button>
            <button id="duplicateBtn" class="btn-modern btn-success-modern hover-lift">
                <i class="bi bi-files"></i> Dupliquer
            </button>
            <button id="deleteBtn" class="btn-modern btn-danger-modern hover-lift">
                <i class="bi bi-trash"></i> Supprimer
            </button>
            <a href="/produit/liste" class="btn-modern btn-outline-modern hover-lift">
                <i class="bi bi-arrow-left"></i> Retour
            </a>
        </div>
    </div>

    <!-- Loading -->
    <div id="loadingContainer" class="loading-modern">
        <div class="spinner-modern"></div>
        <div class="loading-text shimmer">Chargement des détails...</div>
        <div class="loading-progress">
            <div class="progress-bar shimmer"></div>
        </div>
    </div>

    <!-- Erreur -->
    <div id="errorContainer" style="display: none;">
        <div class="alert-modern">
            <div class="alert-modern-title">
                <i class="bi bi-exclamation-triangle-fill"></i>
                Erreur
            </div>
            <p id="errorMessage" class="mb-0"></p>
        </div>
    </div>

    <!-- Contenu du produit -->
    <div id="productContainer" style="display: none;">
        <!-- Hero Section -->
        <div class="product-hero fade-in">
            <div class="floating-particles">
                <div class="particle"></div>
                <div class="particle"></div>
                <div class="particle"></div>
            </div>
            <div class="row g-0">
                <div class="col-lg-6">
                    <div class="hero-image-section slide-in-left">
                        <span id="statusBadge" class="status-badge-modern"></span>
                        <div class="hero-image-wrapper">
                            <img id="productImage" src="" alt="Image du produit" class="hero-image hover-lift">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-content slide-in-right">
                        <div class="product-code tooltip-custom" id="productCode" data-tooltip="Code unique du produit">-</div>
                        <h1 class="product-title" id="productName">-</h1>
                        <div id="productCategory"></div>
                        <p class="product-description" id="productDescription">-</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cards de prix -->
        <div class="price-cards-grid fade-in">
            <div class="price-card-modern featured hover-lift">
                <div class="price-icon">
                    <i class="bi bi-tag-fill"></i>
                </div>
                <div class="price-label-modern">Prix de vente</div>
                <div class="price-value-modern" id="unitPrice">0 FCFA</div>
                <div class="price-subtitle">Prix unitaire TTC</div>
            </div>

            <div class="price-card-modern hover-lift">
                <div class="price-icon">
                    <i class="bi bi-currency-exchange"></i>
                </div>
                <div class="price-label-modern">Coût d'achat</div>
                <div class="price-value-modern" id="productCost">0 FCFA</div>
                <div class="price-subtitle">Prix d'acquisition</div>
            </div>

            <div class="price-card-modern hover-lift">
                <div class="price-icon">
                    <i class="bi bi-graph-up-arrow"></i>
                </div>
                <div class="price-label-modern">Marge bénéficiaire</div>
                <div class="price-value-modern" id="profitMargin">0 FCFA</div>
                <div class="price-subtitle" id="profitPercentage">0%</div>
            </div>

            <div class="price-card-modern hover-lift">
                <div class="price-icon">
                    <i class="bi bi-dash-circle"></i>
                </div>
                <div class="price-label-modern">Coût minimum</div>
                <div class="price-value-modern" id="minimumCost">0 FCFA</div>
                <div class="price-subtitle">Seuil de rentabilité</div>
            </div>
        </div>

        <!-- Informations de stock -->
        <div class="info-section glass-card hover-lift">
            <div class="section-header">
                <div class="section-icon">
                    <i class="bi bi-box-seam"></i>
                </div>
                <h3 class="section-title-modern">Gestion du Stock</h3>
            </div>
            <div class="info-grid">
                <div class="info-item hover-lift">
                    <div class="info-item-icon">
                        <i class="bi bi-box"></i>
                    </div>
                    <div class="info-item-content">
                        <div class="info-item-label">Stock minimum</div>
                        <div class="info-item-value stock-indicator" id="minStockLevel">
                            <div class="stock-dot good"></div>
                            -
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informations système -->
        <div class="info-section glass-card hover-lift">
            <div class="section-header">
                <div class="section-icon">
                    <i class="bi bi-info-circle"></i>
                </div>
                <h3 class="section-title-modern">Informations Système</h3>
            </div>
            <div class="info-grid">
                <div class="info-item hover-lift">
                    <div class="info-item-icon">
                        <i class="bi bi-calendar-plus"></i>
                    </div>
                    <div class="info-item-content">
                        <div class="info-item-label">Date de création</div>
                        <div class="info-item-value" id="createdAt">-</div>
                    </div>
                </div>
                <div class="info-item hover-lift">
                    <div class="info-item-icon">
                        <i class="bi bi-calendar-check"></i>
                    </div>
                    <div class="info-item-content">
                        <div class="info-item-label">Dernière modification</div>
                        <div class="info-item-value" id="updatedAt">-</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const productId = '<?php echo $product_id; ?>';

        if (!productId) {
            showError('ID du produit manquant dans l\'URL');
            return;
        }

        // Ajouter des animations séquentielles
        addSequentialAnimations();
        loadProductDetails(productId);
    });

    function addSequentialAnimations() {
        // Animation séquentielle pour les éléments
        const animatedElements = document.querySelectorAll('.fade-in, .slide-in-left, .slide-in-right');
        
        animatedElements.forEach((element, index) => {
            element.style.animationDelay = `${index * 0.1}s`;
        });

        // Animation pour les cartes de prix
        const priceCards = document.querySelectorAll('.price-card-modern');
        priceCards.forEach((card, index) => {
            card.style.animationDelay = `${0.5 + index * 0.1}s`;
            card.classList.add('fade-in');
        });
    }

    async function loadProductDetails(productId) {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';

            if (!accessToken) {
                window.location.href = '/login';
                return;
            }

            const response = await fetch(`https://toure.gestiem.com/api/products/${productId}`, {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            });

            if (!response.ok) {
                if (response.status === 401) {
                    window.location.href = '/login';
                    return;
                }
                if (response.status === 404) {
                    throw new Error('Ce produit n\'existe pas ou a été supprimé');
                }

                const errorResult = await response.json();
                throw new Error(errorResult.message || 'Impossible de charger les détails du produit');
            }

            const result = await response.json();

            if (!result.data) {
                throw new Error('Les données du produit sont indisponibles');
            }

            displayProductDetails(result.data);

            document.getElementById('loadingContainer').style.display = 'none';
            document.getElementById('productContainer').style.display = 'block';
            document.getElementById('actionButtons').style.display = 'flex';
            
            // Animation d'entrée pour le conteneur
            const container = document.getElementById('productContainer');
            container.classList.add('fade-in');
            
            // Animation pour les éléments de données
            animateDataElements();

        } catch (error) {
            console.error('Erreur lors du chargement:', error);
            showError(error.message);
        }
    }

    function displayProductDetails(product) {
        // Image
        const productImage = document.getElementById('productImage');
        if (product.picture) {
            productImage.src = `https://toure.gestiem.com/storage/${product.picture}`;
            productImage.onerror = function() {
                this.src = 'https://via.placeholder.com/600x600/f00480/ffffff?text=Pas+d%27image';
            };
        } else {
            productImage.src = 'https://via.placeholder.com/600x600/f00480/ffffff?text=Pas+d%27image';
        }

        // Badge statut
        const statusBadge = document.getElementById('statusBadge');
        if (product.is_active) {
            statusBadge.textContent = '✓ Actif';
            statusBadge.className = 'status-badge-modern status-active';
        } else {
            statusBadge.textContent = '✕ Inactif';
            statusBadge.className = 'status-badge-modern status-inactive';
        }

        // Informations principales
        document.getElementById('productCode').textContent = `Ref: ${product.code || 'N/A'}`;
        document.getElementById('productName').textContent = product.name || 'Produit sans nom';
        document.getElementById('productDescription').textContent = product.description || 'Aucune description disponible pour ce produit.';

        // Catégorie
        const categoryElement = document.getElementById('productCategory');
        if (product.category && product.category.label) {
            categoryElement.innerHTML = `<span class="category-pill"><i class="bi bi-tag"></i> ${product.category.label}</span>`;
        } else {
            categoryElement.innerHTML = '<span class="category-pill"><i class="bi bi-tag"></i> Non catégorisé</span>';
        }

        // Prix et calculs
        const unitPrice = parseFloat(product.unit_price) || 0;
        const cost = parseFloat(product.cost) || 0;
        const minimumCost = parseFloat(product.minimum_cost) || 0;

        document.getElementById('unitPrice').textContent = formatCurrency(unitPrice);
        document.getElementById('productCost').textContent = formatCurrency(cost);
        document.getElementById('minimumCost').textContent = formatCurrency(minimumCost);

        // Marge
        const profitAmount = unitPrice - cost;
        const profitPercentage = cost > 0 ? ((profitAmount / cost) * 100).toFixed(1) : 0;

        document.getElementById('profitMargin').textContent = formatCurrency(profitAmount);
        document.getElementById('profitPercentage').textContent = `${profitPercentage >= 0 ? '+' : ''}${profitPercentage}%`;

        // Stock
        const minStock = product.min_stock_level || 0;
        const minStockElement = document.getElementById('minStockLevel');

        if (minStock === 0) {
            minStockElement.innerHTML = `<span style="color: #dc3545;">${minStock} unités <i class="bi bi-exclamation-triangle-fill"></i></span>`;
        } else if (minStock < 10) {
            minStockElement.innerHTML = `<span style="color: #ffc107;">${minStock} unités <i class="bi bi-exclamation-circle-fill"></i></span>`;
        } else {
            minStockElement.innerHTML = `<span style="color: #28a745;">${minStock} unités <i class="bi bi-check-circle-fill"></i></span>`;
        }

        // Dates
        document.getElementById('createdAt').textContent = formatDate(product.created_at);
        document.getElementById('updatedAt').textContent = formatDate(product.updated_at);

        // Boutons d'action
        document.getElementById('editBtn').onclick = () => {
            window.location.href = `/produit/${product.product_id}/edit`;
        };

        document.getElementById('duplicateBtn').onclick = () => {
            if (confirm(`Voulez-vous dupliquer le produit "${product.name}" ?`)) {
                duplicateProduct(product.product_id);
            }
        };

        document.getElementById('deleteBtn').onclick = () => {
            if (confirm(`⚠️ ATTENTION : Voulez-vous vraiment supprimer "${product.name}" ?\n\nCette action est irréversible !`)) {
                deleteProduct(product.product_id);
            }
        };

        document.title = `${product.name} - Détails`;
    }

    function formatCurrency(amount) {
        return new Intl.NumberFormat('fr-FR', {
            style: 'decimal',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        }).format(amount) + ' FCFA';
    }

    function formatDate(dateString) {
        if (!dateString) return 'Non disponible';
        const date = new Date(dateString);
        return new Intl.DateTimeFormat('fr-FR', {
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        }).format(date);
    }

    function animateDataElements() {
        // Animation pour les valeurs numériques
        const priceElements = document.querySelectorAll('.price-value-modern');
        priceElements.forEach((element, index) => {
            const originalValue = element.textContent;
            element.textContent = '0';
            element.style.opacity = '0.5';
            
            setTimeout(() => {
                element.textContent = originalValue;
                element.style.opacity = '1';
                element.style.transition = 'all 0.5s ease';
            }, index * 200);
        });

        // Animation pour les indicateurs de stock
        const stockIndicator = document.getElementById('minStockLevel');
        if (stockIndicator) {
            const stockDot = stockIndicator.querySelector('.stock-dot');
            if (stockDot) {
                setTimeout(() => {
                    stockDot.style.animation = 'pulse 2s infinite';
                }, 1000);
            }
        }

        // Animation pour les cartes d'information
        const infoItems = document.querySelectorAll('.info-item');
        infoItems.forEach((item, index) => {
            item.style.opacity = '0';
            item.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                item.style.transition = 'all 0.5s ease';
                item.style.opacity = '1';
                item.style.transform = 'translateY(0)';
            }, 1500 + index * 100);
        });
    }

    function showError(message) {
        document.getElementById('loadingContainer').style.display = 'none';
        document.getElementById('productContainer').style.display = 'none';
        document.getElementById('errorContainer').style.display = 'block';
        document.getElementById('errorMessage').textContent = message;
    }

    async function duplicateProduct(productId) {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';

            const response = await fetch(`https://toure.gestiem.com/api/products/${productId}/duplicate`, {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            });

            if (response.ok) {
                alert('✓ Produit dupliqué avec succès !');
                window.location.href = '/produit/liste';
            } else {
                const errorResult = await response.json();
                alert('Erreur : ' + (errorResult.message || 'Impossible de dupliquer le produit'));
            }
        } catch (error) {
            alert('Erreur de connexion au serveur');
        }
    }

    async function deleteProduct(productId) {
        try {
            const accessToken = '<?php echo $_COOKIE['access_token'] ?? ''; ?>';

            const response = await fetch(`https://toure.gestiem.com/api/products/${productId}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            });

            if (response.ok) {
                alert('✓ Produit supprimé avec succès');
                window.location.href = '/produit/liste';
            } else {
                const errorResult = await response.json();
                alert('Erreur : ' + (errorResult.message || 'Impossible de supprimer le produit'));
            }
        } catch (error) {
            alert('Erreur de connexion au serveur');
        }
    }
</script>

<?php
$content = ob_get_clean();
require('./views/layouts/app-layout.php');
?>