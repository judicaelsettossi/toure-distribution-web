<?php
$title = 'Centre d\'Aide - Toure Distribution';
ob_start();
?>

<style>
    :root {
        --primary-color: #f00480;
        --secondary-color: #010768;
        --accent-color: #010068;
        --light-primary: rgba(240, 4, 128, 0.1);
        --light-secondary: rgba(1, 7, 104, 0.1);
        --success-color: #28a745;
        --warning-color: #ffc107;
        --danger-color: #dc3545;
        --info-color: #17a2b8;
    }

    .font-public-sans {
        font-family: 'Public Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    }

    .text-primary-custom {
        color: var(--primary-color) !important;
    }

    .text-secondary-custom {
        color: var(--secondary-color) !important;
    }

    .bg-primary-custom {
        background-color: var(--primary-color) !important;
    }

    .bg-secondary-custom {
        background-color: var(--secondary-color) !important;
    }

    .bg-light-primary {
        background-color: var(--light-primary) !important;
    }

    .btn-primary-custom {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary-custom:hover {
        background-color: #d1036d;
        border-color: #d1036d;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(240, 4, 128, 0.3);
    }

    .help-card {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        border: none;
        transition: all 0.3s ease;
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .help-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
    }

    .help-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
    }

    .help-icon {
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

    .search-section {
        background: linear-gradient(135deg, var(--secondary-color) 0%, var(--accent-color) 100%);
        color: white;
        border-radius: 16px;
        padding: 3rem 2rem;
        margin-bottom: 3rem;
        position: relative;
        overflow: hidden;
    }

    .search-section::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 40%;
        height: 200%;
        background: radial-gradient(circle, rgba(240, 4, 128, 0.1) 0%, transparent 70%);
        transform: rotate(15deg);
    }

    .search-content {
        position: relative;
        z-index: 2;
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

    .faq-item {
        background: white;
        border-radius: 8px;
        margin-bottom: 1rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.06);
        border: 1px solid #f0f0f0;
        transition: all 0.3s ease;
    }

    .faq-item:hover {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        border-color: var(--primary-color);
    }

    .faq-question {
        padding: 1.5rem;
        cursor: pointer;
        border: none;
        background: none;
        width: 100%;
        text-align: left;
        font-weight: 600;
        color: var(--secondary-color);
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: all 0.3s ease;
    }

    .faq-question:hover {
        color: var(--primary-color);
    }

    .faq-answer {
        padding: 0 1.5rem 1.5rem;
        color: #666;
        line-height: 1.6;
        display: none;
    }

    .faq-answer.show {
        display: block;
    }

    .faq-icon {
        transition: transform 0.3s ease;
    }

    .faq-icon.rotated {
        transform: rotate(180deg);
    }

    .category-card {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        border: none;
        transition: all 0.3s ease;
        height: 100%;
        text-decoration: none;
        color: inherit;
    }

    .category-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        text-decoration: none;
        color: inherit;
    }

    .category-icon {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: white;
        margin-bottom: 1rem;
    }

    .contact-form {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(240, 4, 128, 0.25);
    }

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

    .stats-card {
        background: white;
        border-radius: 8px;
        padding: 1.5rem;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        border: none;
        transition: all 0.3s ease;
        position: relative;
        border-left: 4px solid var(--primary-color);
    }

    .stats-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(240, 4, 128, 0.2);
    }

    .stats-icon {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: white;
        margin-bottom: 1rem;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .search-section {
            padding: 2rem 1rem;
        }
        
        .help-card {
            margin-bottom: 1rem;
        }
    }
</style>

<main id="content" role="main" class="main font-public-sans">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="page-header-title text-secondary-custom">
                        <i class="bi-question-circle me-2"></i>
                        Centre d'Aide
                    </h1>
                    <p class="text-muted mb-0">Trouvez rapidement les réponses à vos questions</p>
                </div>
            </div>
        </div>

        <!-- Section de Recherche -->
        <div class="search-section">
            <div class="search-content">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h2 class="display-6 fw-bold mb-3">
                            Comment pouvons-nous vous aider ?
                        </h2>
                        <p class="lead mb-4">
                            Recherchez dans notre base de connaissances ou parcourez nos guides détaillés.
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group">
                            <input type="text" class="form-control search-input" placeholder="Tapez votre question..." id="searchInput">
                            <button class="btn btn-light" type="button" id="searchBtn">
                                <i class="bi-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistiques Rapides -->
        <div class="row mb-5">
            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="stats-card">
                    <div class="stats-icon bg-primary-custom">
                        <i class="bi-question-circle"></i>
                    </div>
                    <h6 class="text-muted mb-2">Questions Fréquentes</h6>
                    <h3 class="text-secondary-custom mb-0">25+</h3>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="stats-card">
                    <div class="stats-icon bg-secondary-custom">
                        <i class="bi-book"></i>
                    </div>
                    <h6 class="text-muted mb-2">Guides Disponibles</h6>
                    <h3 class="text-secondary-custom mb-0">12+</h3>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="stats-card">
                    <div class="stats-icon" style="background-color: var(--accent-color);">
                        <i class="bi-headset"></i>
                    </div>
                    <h6 class="text-muted mb-2">Support 24/7</h6>
                    <h3 class="text-secondary-custom mb-0">Disponible</h3>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="stats-card">
                    <div class="stats-icon bg-success">
                        <i class="bi-check-circle"></i>
                    </div>
                    <h6 class="text-muted mb-2">Taux de Résolution</h6>
                    <h3 class="text-secondary-custom mb-0">98%</h3>
                </div>
            </div>
        </div>

        <!-- Catégories d'Aide -->
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="section-title">
                    <i class="bi-grid-3x3-gap"></i>
                    Catégories d'Aide
                </h2>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="/help/faq" class="category-card">
                    <div class="category-icon bg-primary-custom">
                        <i class="bi-question-circle"></i>
                    </div>
                    <h5 class="mb-3">Questions Fréquentes</h5>
                    <p class="text-muted mb-3">
                        Trouvez rapidement les réponses aux questions les plus courantes sur l'utilisation de la plateforme.
                    </p>
                    <div class="d-flex align-items-center">
                        <span class="text-primary-custom fw-bold">25 questions</span>
                        <i class="bi-arrow-right ms-auto"></i>
                    </div>
                </a>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="/help/guides" class="category-card">
                    <div class="category-icon bg-secondary-custom">
                        <i class="bi-book"></i>
                    </div>
                    <h5 class="mb-3">Guides d'Utilisation</h5>
                    <p class="text-muted mb-3">
                        Apprenez à utiliser toutes les fonctionnalités avec nos guides détaillés et tutoriels.
                    </p>
                    <div class="d-flex align-items-center">
                        <span class="text-primary-custom fw-bold">12 guides</span>
                        <i class="bi-arrow-right ms-auto"></i>
                    </div>
                </a>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="/help/contact" class="category-card">
                    <div class="category-icon" style="background-color: var(--accent-color);">
                        <i class="bi-headset"></i>
                    </div>
                    <h5 class="mb-3">Contact Support</h5>
                    <p class="text-muted mb-3">
                        Contactez notre équipe de support pour une assistance personnalisée et rapide.
                    </p>
                    <div class="d-flex align-items-center">
                        <span class="text-primary-custom fw-bold">24/7 disponible</span>
                        <i class="bi-arrow-right ms-auto"></i>
                    </div>
                </a>
            </div>
        </div>

        <!-- Questions Fréquentes Rapides -->
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="section-title">
                    <i class="bi-lightning-charge"></i>
                    Questions Fréquentes
                </h2>
            </div>
            
            <div class="col-lg-8">
                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFaq(this)">
                        Comment créer une nouvelle vente ?
                        <i class="bi-chevron-down faq-icon"></i>
                    </button>
                    <div class="faq-answer">
                        <p>Pour créer une nouvelle vente, cliquez sur "Nouvelle Vente" dans le tableau de bord, sélectionnez le client, l'entrepôt, ajoutez les produits et validez la vente. Le système mettra automatiquement à jour les stocks.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFaq(this)">
                        Comment gérer les stocks ?
                        <i class="bi-chevron-down faq-icon"></i>
                    </button>
                    <div class="faq-answer">
                        <p>Les stocks sont gérés automatiquement lors des ventes et commandes. Vous pouvez également effectuer des mouvements manuels via la section "Stock" pour les ajustements et transferts entre entrepôts.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFaq(this)">
                        Comment planifier une livraison ?
                        <i class="bi-chevron-down faq-icon"></i>
                    </button>
                    <div class="faq-answer">
                        <p>Allez dans "Nouvelle Livraison", sélectionnez la vente, assignez un chauffeur et un camion, puis planifiez la date de livraison. Le système suivra automatiquement le statut de la livraison.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFaq(this)">
                        Comment accéder à l'API ?
                        <i class="bi-chevron-down faq-icon"></i>
                    </button>
                    <div class="faq-answer">
                        <p>L'API est accessible via <a href="https://toure.gestiem.com/docs" target="_blank">https://toure.gestiem.com/docs</a>. Vous y trouverez toute la documentation pour intégrer l'API dans vos applications.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="help-card">
                    <div class="help-icon bg-info">
                        <i class="bi-telephone"></i>
                    </div>
                    <h5 class="mb-3">Besoin d'Aide Immédiate ?</h5>
                    <p class="text-muted mb-3">
                        Notre équipe de support est disponible 24/7 pour vous aider.
                    </p>
                    <div class="d-grid gap-2">
                        <a href="tel:+22997000000" class="btn btn-primary-custom">
                            <i class="bi-telephone me-2"></i> Appeler le Support
                        </a>
                        <a href="mailto:support@toure.gestiem.com" class="btn btn-outline-primary">
                            <i class="bi-envelope me-2"></i> Envoyer un Email
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Rapide -->
        <div class="row">
            <div class="col-12">
                <h2 class="section-title">
                    <i class="bi-chat-dots"></i>
                    Contactez-Nous
                </h2>
            </div>
            
            <div class="col-lg-8">
                <div class="contact-form">
                    <form id="contactForm">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Nom complet</label>
                                <input type="text" class="form-control" id="name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Sujet</label>
                            <select class="form-select" id="subject" required>
                                <option value="">Sélectionnez un sujet</option>
                                <option value="bug">Signaler un bug</option>
                                <option value="feature">Demande de fonctionnalité</option>
                                <option value="billing">Facturation</option>
                                <option value="technical">Support technique</option>
                                <option value="other">Autre</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary-custom">
                            <i class="bi-send me-2"></i> Envoyer le Message
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="help-card">
                    <div class="help-icon bg-success">
                        <i class="bi-info-circle"></i>
                    </div>
                    <h5 class="mb-3">Informations de Contact</h5>
                    <div class="mb-3">
                        <h6 class="text-muted">Téléphone</h6>
                        <p class="mb-0">+229 97 00 00 00</p>
                    </div>
                    <div class="mb-3">
                        <h6 class="text-muted">Email</h6>
                        <p class="mb-0">support@toure.gestiem.com</p>
                    </div>
                    <div class="mb-3">
                        <h6 class="text-muted">Heures d'Ouverture</h6>
                        <p class="mb-0">24/7 - Support disponible</p>
                    </div>
                    <div class="mb-3">
                        <h6 class="text-muted">Temps de Réponse</h6>
                        <p class="mb-0">Moins de 2 heures</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    // Fonction pour basculer l'affichage des FAQ
    function toggleFaq(button) {
        const answer = button.nextElementSibling;
        const icon = button.querySelector('.faq-icon');
        
        if (answer.classList.contains('show')) {
            answer.classList.remove('show');
            icon.classList.remove('rotated');
        } else {
            // Fermer toutes les autres FAQ
            document.querySelectorAll('.faq-answer.show').forEach(item => {
                item.classList.remove('show');
            });
            document.querySelectorAll('.faq-icon.rotated').forEach(item => {
                item.classList.remove('rotated');
            });
            
            // Ouvrir la FAQ sélectionnée
            answer.classList.add('show');
            icon.classList.add('rotated');
        }
    }

    // Fonction de recherche
    document.getElementById('searchBtn').addEventListener('click', function() {
        const searchTerm = document.getElementById('searchInput').value;
        if (searchTerm.trim()) {
            // Rediriger vers la page de recherche avec le terme
            window.location.href = `/help/search?q=${encodeURIComponent(searchTerm)}`;
        }
    });

    // Recherche avec Enter
    document.getElementById('searchInput').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            document.getElementById('searchBtn').click();
        }
    });

    // Gestion du formulaire de contact
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Récupérer les données du formulaire
        const formData = {
            name: document.getElementById('name').value,
            email: document.getElementById('email').value,
            subject: document.getElementById('subject').value,
            message: document.getElementById('message').value
        };
        
        // Simuler l'envoi du message
        alert('Message envoyé avec succès ! Notre équipe vous répondra dans les plus brefs délais.');
        
        // Réinitialiser le formulaire
        this.reset();
    });

    // Animation des cartes au survol
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.help-card, .category-card, .stats-card');
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
