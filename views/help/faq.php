<?php
$title = 'Questions Fréquentes - Centre d\'Aide';
ob_start();
?>

<style>
    :root {
        --primary-color: #f00480;
        --secondary-color: #010768;
        --accent-color: #010068;
        --light-primary: rgba(240, 4, 128, 0.1);
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

    .category-section {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .category-title {
        color: var(--secondary-color);
        font-weight: 700;
        font-size: 1.25rem;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .category-title i {
        color: var(--primary-color);
    }
</style>

<main id="content" role="main" class="main">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="page-header-title text-secondary-custom">
                        <i class="bi-question-circle me-2"></i>
                        Questions Fréquentes
                    </h1>
                    <p class="text-muted mb-0">Trouvez rapidement les réponses à vos questions</p>
                </div>
                <div class="col-auto">
                    <a href="/help" class="btn btn-outline-secondary">
                        <i class="bi-arrow-left me-1"></i> Retour au Centre d'Aide
                    </a>
                </div>
            </div>
        </div>

        <!-- FAQ par Catégories -->
        <div class="row">
            <div class="col-12">
                <!-- Gestion des Ventes -->
                <div class="category-section">
                    <h2 class="category-title">
                        <i class="bi-cart"></i>
                        Gestion des Ventes
                    </h2>
                    
                    <div class="faq-item">
                        <button class="faq-question" onclick="toggleFaq(this)">
                            Comment créer une nouvelle vente ?
                            <i class="bi-chevron-down faq-icon"></i>
                        </button>
                        <div class="faq-answer">
                            <p>Pour créer une nouvelle vente :</p>
                            <ol>
                                <li>Cliquez sur "Nouvelle Vente" dans le tableau de bord</li>
                                <li>Sélectionnez le client dans la liste déroulante</li>
                                <li>Choisissez l'entrepôt source</li>
                                <li>Ajoutez les produits avec leurs quantités</li>
                                <li>Vérifiez le montant total et appliquez une remise si nécessaire</li>
                                <li>Cliquez sur "Créer la Vente"</li>
                            </ol>
                            <p>Le système mettra automatiquement à jour les stocks.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question" onclick="toggleFaq(this)">
                            Comment modifier une vente existante ?
                            <i class="bi-chevron-down faq-icon"></i>
                        </button>
                        <div class="faq-answer">
                            <p>Pour modifier une vente :</p>
                            <ol>
                                <li>Allez dans la liste des ventes</li>
                                <li>Cliquez sur "Modifier" pour la vente souhaitée</li>
                                <li>Apportez les modifications nécessaires</li>
                                <li>Sauvegardez les changements</li>
                            </ol>
                            <p><strong>Note :</strong> Les modifications peuvent affecter les stocks selon le statut de la vente.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question" onclick="toggleFaq(this)">
                            Comment gérer les paiements des ventes ?
                            <i class="bi-chevron-down faq-icon"></i>
                        </button>
                        <div class="faq-answer">
                            <p>Pour gérer les paiements :</p>
                            <ol>
                                <li>Allez dans les détails de la vente</li>
                                <li>Cliquez sur "Payer la Facture"</li>
                                <li>Sélectionnez le mode de paiement</li>
                                <li>Entrez le montant et la date</li>
                                <li>Confirmez le paiement</li>
                            </ol>
                            <p>Vous pouvez également consulter l'historique des paiements via "Liste des Paiements".</p>
                        </div>
                    </div>
                </div>

                <!-- Gestion des Stocks -->
                <div class="category-section">
                    <h2 class="category-title">
                        <i class="bi-box"></i>
                        Gestion des Stocks
                    </h2>
                    
                    <div class="faq-item">
                        <button class="faq-question" onclick="toggleFaq(this)">
                            Comment effectuer un mouvement de stock ?
                            <i class="bi-chevron-down faq-icon"></i>
                        </button>
                        <div class="faq-answer">
                            <p>Pour effectuer un mouvement de stock :</p>
                            <ol>
                                <li>Allez dans "Stock" > "Gestion des Mouvements"</li>
                                <li>Cliquez sur "Nouveau Mouvement"</li>
                                <li>Sélectionnez le type de mouvement (entrée, sortie, transfert)</li>
                                <li>Choisissez l'entrepôt concerné</li>
                                <li>Ajoutez les produits et quantités</li>
                                <li>Validez le mouvement</li>
                            </ol>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question" onclick="toggleFaq(this)">
                            Comment consulter les stocks par entrepôt ?
                            <i class="bi-chevron-down faq-icon"></i>
                        </button>
                        <div class="faq-answer">
                            <p>Pour consulter les stocks :</p>
                            <ol>
                                <li>Allez dans "Stock" > "Par Entrepôt"</li>
                                <li>Sélectionnez l'entrepôt souhaité</li>
                                <li>Consultez la liste des produits avec leurs quantités</li>
                            </ol>
                            <p>Vous pouvez également filtrer par produit ou exporter les données.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question" onclick="toggleFaq(this)">
                            Comment transférer des produits entre entrepôts ?
                            <i class="bi-chevron-down faq-icon"></i>
                        </button>
                        <div class="faq-answer">
                            <p>Pour transférer des produits :</p>
                            <ol>
                                <li>Allez dans "Entrepôt" > "Transfert"</li>
                                <li>Sélectionnez l'entrepôt source</li>
                                <li>Choisissez l'entrepôt de destination</li>
                                <li>Ajoutez les produits à transférer</li>
                                <li>Validez le transfert</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <!-- Gestion des Livraisons -->
                <div class="category-section">
                    <h2 class="category-title">
                        <i class="bi-truck"></i>
                        Gestion des Livraisons
                    </h2>
                    
                    <div class="faq-item">
                        <button class="faq-question" onclick="toggleFaq(this)">
                            Comment planifier une livraison ?
                            <i class="bi-chevron-down faq-icon"></i>
                        </button>
                        <div class="faq-answer">
                            <p>Pour planifier une livraison :</p>
                            <ol>
                                <li>Cliquez sur "Nouvelle Livraison"</li>
                                <li>Sélectionnez la vente à livrer</li>
                                <li>Choisissez le chauffeur et le camion</li>
                                <li>Planifiez la date de livraison</li>
                                <li>Ajoutez des notes si nécessaire</li>
                                <li>Créez la livraison</li>
                            </ol>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question" onclick="toggleFaq(this)">
                            Comment suivre le statut d'une livraison ?
                            <i class="bi-chevron-down faq-icon"></i>
                        </button>
                        <div class="faq-answer">
                            <p>Pour suivre une livraison :</p>
                            <ol>
                                <li>Allez dans "Livraisons" > "Liste des Livraisons"</li>
                                <li>Trouvez la livraison souhaitée</li>
                                <li>Consultez le statut (En attente, En cours, Livrée, Annulée)</li>
                                <li>Cliquez sur "Détails" pour plus d'informations</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <!-- API et Intégration -->
                <div class="category-section">
                    <h2 class="category-title">
                        <i class="bi-code-slash"></i>
                        API et Intégration
                    </h2>
                    
                    <div class="faq-item">
                        <button class="faq-question" onclick="toggleFaq(this)">
                            Comment accéder à l'API ?
                            <i class="bi-chevron-down faq-icon"></i>
                        </button>
                        <div class="faq-answer">
                            <p>L'API est accessible via :</p>
                            <ul>
                                <li><strong>URL :</strong> <a href="https://toure.gestiem.com/docs" target="_blank">https://toure.gestiem.com/docs</a></li>
                                <li><strong>Authentification :</strong> Token Bearer requis</li>
                                <li><strong>Format :</strong> JSON</li>
                                <li><strong>Documentation :</strong> Swagger/OpenAPI disponible</li>
                            </ul>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question" onclick="toggleFaq(this)">
                            Comment obtenir un token d'API ?
                            <i class="bi-chevron-down faq-icon"></i>
                        </button>
                        <div class="faq-answer">
                            <p>Pour obtenir un token d'API :</p>
                            <ol>
                                <li>Connectez-vous à votre compte</li>
                                <li>Allez dans "Mon Profil"</li>
                                <li>Section "API Access"</li>
                                <li>Générez un nouveau token</li>
                                <li>Copiez et sauvegardez le token</li>
                            </ol>
                            <p><strong>Important :</strong> Gardez votre token secret et ne le partagez pas.</p>
                        </div>
                    </div>
                </div>

                <!-- Support et Contact -->
                <div class="category-section">
                    <h2 class="category-title">
                        <i class="bi-headset"></i>
                        Support et Contact
                    </h2>
                    
                    <div class="faq-item">
                        <button class="faq-question" onclick="toggleFaq(this)">
                            Comment contacter le support ?
                            <i class="bi-chevron-down faq-icon"></i>
                        </button>
                        <div class="faq-answer">
                            <p>Vous pouvez nous contacter :</p>
                            <ul>
                                <li><strong>Téléphone :</strong> +229 97 00 00 00</li>
                                <li><strong>Email :</strong> support@toure.gestiem.com</li>
                                <li><strong>Heures :</strong> 24/7 disponible</li>
                                <li><strong>Temps de réponse :</strong> Moins de 2 heures</li>
                            </ul>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question" onclick="toggleFaq(this)">
                            Que faire en cas de problème technique ?
                            <i class="bi-chevron-down faq-icon"></i>
                        </button>
                        <div class="faq-answer">
                            <p>En cas de problème technique :</p>
                            <ol>
                                <li>Vérifiez votre connexion internet</li>
                                <li>Actualisez la page (F5)</li>
                                <li>Videz le cache de votre navigateur</li>
                                <li>Essayez avec un autre navigateur</li>
                                <li>Contactez le support si le problème persiste</li>
                            </ol>
                        </div>
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
</script>

<?php
$content = ob_get_clean();
require('./views/layouts/app-layout.php');
?>
