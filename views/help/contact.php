<?php
$title = 'Contact Support - Centre d\'Aide';
ob_start();
?>

<style>
    :root {
        --primary-color: #f00480;
        --secondary-color: #010768;
        --accent-color: #010068;
        --light-primary: rgba(240, 4, 128, 0.1);
    }

    .contact-card {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        border: none;
        transition: all 0.3s ease;
        height: 100%;
    }

    .contact-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
    }

    .contact-icon {
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

    .form-select:focus {
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

    .priority-badge {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .priority-low { background-color: #d4edda; color: #155724; }
    .priority-medium { background-color: #fff3cd; color: #856404; }
    .priority-high { background-color: #f8d7da; color: #721c24; }
    .priority-urgent { background-color: #f5c6cb; color: #721c24; }

    .contact-method {
        background: white;
        border-radius: 8px;
        padding: 1.5rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.06);
        border: 1px solid #f0f0f0;
        transition: all 0.3s ease;
        text-decoration: none;
        color: inherit;
    }

    .contact-method:hover {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        border-color: var(--primary-color);
        text-decoration: none;
        color: inherit;
    }

    .response-time {
        background: linear-gradient(135deg, var(--secondary-color) 0%, var(--accent-color) 100%);
        color: white;
        border-radius: 16px;
        padding: 2rem;
        margin-bottom: 2rem;
    }
</style>

<main id="content" role="main" class="main">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="page-header-title text-secondary-custom">
                        <i class="bi-headset me-2"></i>
                        Contact Support
                    </h1>
                    <p class="text-muted mb-0">Notre équipe est là pour vous aider 24/7</p>
                </div>
                <div class="col-auto">
                    <a href="/help" class="btn btn-outline-secondary">
                        <i class="bi-arrow-left me-1"></i> Retour au Centre d'Aide
                    </a>
                </div>
            </div>
        </div>

        <!-- Temps de Réponse -->
        <div class="response-time">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="display-6 fw-bold mb-3">
                        <i class="bi-clock me-2"></i>
                        Support 24/7 Disponible
                    </h2>
                    <p class="lead mb-0">
                        Notre équipe de support technique est disponible en permanence pour vous assister.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <div class="h1 mb-0">Moins de 2h</div>
                    <p class="mb-0">Temps de réponse moyen</p>
                </div>
            </div>
        </div>

        <!-- Méthodes de Contact -->
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="section-title">
                    <i class="bi-telephone"></i>
                    Méthodes de Contact
                </h2>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <a href="tel:+22997000000" class="contact-method">
                    <div class="contact-icon bg-primary-custom">
                        <i class="bi-telephone"></i>
                    </div>
                    <h5 class="mb-3">Appel Téléphonique</h5>
                    <p class="text-muted mb-3">
                        Appelez-nous directement pour une assistance immédiate.
                    </p>
                    <div class="d-flex align-items-center">
                        <span class="text-primary-custom fw-bold">+229 97 00 00 00</span>
                        <i class="bi-arrow-right ms-auto"></i>
                    </div>
                </a>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <a href="mailto:support@toure.gestiem.com" class="contact-method">
                    <div class="contact-icon bg-secondary-custom">
                        <i class="bi-envelope"></i>
                    </div>
                    <h5 class="mb-3">Email Support</h5>
                    <p class="text-muted mb-3">
                        Envoyez-nous un email détaillé avec votre demande.
                    </p>
                    <div class="d-flex align-items-center">
                        <span class="text-primary-custom fw-bold">support@toure.gestiem.com</span>
                        <i class="bi-arrow-right ms-auto"></i>
                    </div>
                </a>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <a href="#" class="contact-method" onclick="openChat()">
                    <div class="contact-icon" style="background-color: var(--accent-color);">
                        <i class="bi-chat-dots"></i>
                    </div>
                    <h5 class="mb-3">Chat en Direct</h5>
                    <p class="text-muted mb-3">
                        Chattez avec notre équipe en temps réel.
                    </p>
                    <div class="d-flex align-items-center">
                        <span class="text-primary-custom fw-bold">Disponible maintenant</span>
                        <i class="bi-arrow-right ms-auto"></i>
                    </div>
                </a>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <a href="#" class="contact-method" onclick="openTicket()">
                    <div class="contact-icon bg-success">
                        <i class="bi-ticket"></i>
                    </div>
                    <h5 class="mb-3">Créer un Ticket</h5>
                    <p class="text-muted mb-3">
                        Créez un ticket de support pour un suivi détaillé.
                    </p>
                    <div class="d-flex align-items-center">
                        <span class="text-primary-custom fw-bold">Suivi garanti</span>
                        <i class="bi-arrow-right ms-auto"></i>
                    </div>
                </a>
            </div>
        </div>

        <!-- Formulaire de Contact -->
        <div class="row mb-5">
            <div class="col-lg-8">
                <div class="contact-form">
                    <h3 class="text-secondary-custom mb-4">
                        <i class="bi-send me-2"></i>
                        Envoyer un Message
                    </h3>
                    
                    <form id="contactForm">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Nom complet *</label>
                                <input type="text" class="form-control" id="name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email *</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Téléphone</label>
                                <input type="tel" class="form-control" id="phone">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="company" class="form-label">Entreprise</label>
                                <input type="text" class="form-control" id="company">
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="subject" class="form-label">Sujet *</label>
                            <select class="form-select" id="subject" required>
                                <option value="">Sélectionnez un sujet</option>
                                <option value="bug">Signaler un bug</option>
                                <option value="feature">Demande de fonctionnalité</option>
                                <option value="billing">Facturation</option>
                                <option value="technical">Support technique</option>
                                <option value="integration">Intégration API</option>
                                <option value="training">Formation</option>
                                <option value="other">Autre</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="priority" class="form-label">Priorité</label>
                            <select class="form-select" id="priority">
                                <option value="low">Faible</option>
                                <option value="medium" selected>Moyenne</option>
                                <option value="high">Élevée</option>
                                <option value="urgent">Urgente</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="message" class="form-label">Message détaillé *</label>
                            <textarea class="form-control" id="message" rows="6" required placeholder="Décrivez votre problème ou votre demande en détail..."></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="urgent" value="1">
                                <label class="form-check-label" for="urgent">
                                    <strong>Urgent</strong> - Problème critique affectant les opérations
                                </label>
                            </div>
                        </div>
                        
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-outline-secondary me-md-2" onclick="resetForm()">
                                <i class="bi-arrow-clockwise me-1"></i> Réinitialiser
                            </button>
                            <button type="submit" class="btn btn-primary-custom">
                                <i class="bi-send me-2"></i> Envoyer le Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="col-lg-4">
                <!-- Informations de Contact -->
                <div class="contact-card mb-4">
                    <div class="contact-icon bg-info">
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

                <!-- Niveaux de Priorité -->
                <div class="contact-card">
                    <h5 class="mb-3">Niveaux de Priorité</h5>
                    <div class="mb-2">
                        <span class="priority-badge priority-low">Faible</span>
                        <span class="text-muted ms-2">Demandes générales</span>
                    </div>
                    <div class="mb-2">
                        <span class="priority-badge priority-medium">Moyenne</span>
                        <span class="text-muted ms-2">Problèmes standards</span>
                    </div>
                    <div class="mb-2">
                        <span class="priority-badge priority-high">Élevée</span>
                        <span class="text-muted ms-2">Problèmes importants</span>
                    </div>
                    <div class="mb-2">
                        <span class="priority-badge priority-urgent">Urgente</span>
                        <span class="text-muted ms-2">Problèmes critiques</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Rapide -->
        <div class="row">
            <div class="col-12">
                <h2 class="section-title">
                    <i class="bi-question-circle"></i>
                    Questions Fréquentes
                </h2>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="contact-card">
                    <h6 class="text-secondary-custom mb-2">Quel est le temps de réponse moyen ?</h6>
                    <p class="text-muted mb-0">Notre équipe répond généralement dans les 2 heures, même pour les demandes non urgentes.</p>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="contact-card">
                    <h6 class="text-secondary-custom mb-2">Puis-je joindre le support par téléphone ?</h6>
                    <p class="text-muted mb-0">Oui, notre ligne téléphonique est disponible 24/7 au +229 97 00 00 00.</p>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="contact-card">
                    <h6 class="text-secondary-custom mb-2">Comment suivre mon ticket de support ?</h6>
                    <p class="text-muted mb-0">Vous recevrez un numéro de ticket par email pour suivre l'avancement de votre demande.</p>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="contact-card">
                    <h6 class="text-secondary-custom mb-2">Le support est-il disponible en français ?</h6>
                    <p class="text-muted mb-0">Oui, notre équipe de support est entièrement francophone.</p>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    // Gestion du formulaire de contact
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Récupérer les données du formulaire
        const formData = {
            name: document.getElementById('name').value,
            email: document.getElementById('email').value,
            phone: document.getElementById('phone').value,
            company: document.getElementById('company').value,
            subject: document.getElementById('subject').value,
            priority: document.getElementById('priority').value,
            message: document.getElementById('message').value,
            urgent: document.getElementById('urgent').checked
        };
        
        // Générer un numéro de ticket
        const ticketNumber = 'TKT-' + Date.now();
        
        // Afficher le message de confirmation
        alert(`Message envoyé avec succès !\n\nNuméro de ticket: ${ticketNumber}\n\nNotre équipe vous répondra dans les plus brefs délais.`);
        
        // Réinitialiser le formulaire
        this.reset();
    });

    // Fonction pour réinitialiser le formulaire
    function resetForm() {
        document.getElementById('contactForm').reset();
    }

    // Fonction pour ouvrir le chat (simulation)
    function openChat() {
        alert('Chat en direct bientôt disponible !\n\nEn attendant, vous pouvez nous contacter par téléphone ou email.');
    }

    // Fonction pour ouvrir la création de ticket (simulation)
    function openTicket() {
        alert('Système de tickets bientôt disponible !\n\nUtilisez le formulaire ci-dessous pour nous contacter.');
    }

    // Animation des cartes au survol
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.contact-card, .contact-method');
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
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
