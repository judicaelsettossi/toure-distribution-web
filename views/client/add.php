<?php ob_start(); ?>

<style>
:root {
    --primary-color: #f00480;
    --secondary-color: #010768;
    --accent-color: #010068;
    --light-primary: rgba(240, 4, 128, 0.1);
    --light-secondary: rgba(1, 7, 104, 0.1);
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
}

.btn-primary-custom:hover {
    background-color: #d1036d;
    border-color: #d1036d;
    color: white;
}

.btn-secondary-custom {
    background-color: var(--secondary-color);
    border-color: var(--secondary-color);
    color: white;
}

.btn-secondary-custom:hover {
    background-color: #020a7a;
    border-color: #020a7a;
    color: white;
}

/* Steps Indicator */
.steps-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 3rem;
    position: relative;
}

.step-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    flex: 1;
    max-width: 250px;
}

.step-number {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background-color: #e9ecef;
    color: #6c757d;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 1.3rem;
    border: 3px solid #e9ecef;
    transition: all 0.3s ease;
    position: relative;
    z-index: 2;
}

.step-item.active .step-number {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
    color: white;
    box-shadow: 0 0 0 4px rgba(240, 4, 128, 0.2);
}

.step-item.completed .step-number {
    background-color: var(--secondary-color);
    border-color: var(--secondary-color);
    color: white;
}

.step-item.completed .step-number i {
    font-size: 1.8rem;
}

.step-label {
    margin-top: 0.75rem;
    font-size: 0.95rem;
    font-weight: 600;
    color: #6c757d;
    text-align: center;
}

.step-item.active .step-label {
    color: var(--primary-color);
}

.step-item.completed .step-label {
    color: var(--secondary-color);
}

.step-line {
    position: absolute;
    top: 30px;
    left: 50%;
    width: 100%;
    height: 3px;
    background-color: #e9ecef;
    z-index: 1;
}

.step-item.completed .step-line {
    background-color: var(--secondary-color);
}

.step-item:last-child .step-line {
    display: none;
}

/* Form Sections */
.form-step {
    display: none;
    animation: fadeIn 0.3s ease;
}

.form-step.active {
    display: block;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.form-section {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 2rem;
    border-left: 4px solid var(--primary-color);
}

.form-section-header {
    background-color: var(--light-primary);
    padding: 1.25rem 1.5rem;
    border-radius: 12px 12px 0 0;
    border-bottom: 1px solid #e9ecef;
}

.form-section-body {
    padding: 2rem;
}

.form-control:focus,
.form-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(240, 4, 128, 0.15);
}

.required-field::after {
    content: " *";
    color: var(--primary-color);
    font-weight: bold;
}

.client-type-card {
    border: 2px solid #e9ecef;
    border-radius: 12px;
    padding: 1.5rem;
    cursor: pointer;
    transition: all 0.3s ease;
    text-align: center;
    height: 100%;
}

.client-type-card:hover {
    border-color: var(--primary-color);
    background-color: var(--light-primary);
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(240, 4, 128, 0.15);
}

.client-type-card.selected {
    border-color: var(--primary-color);
    background-color: var(--light-primary);
    box-shadow: 0 6px 20px rgba(240, 4, 128, 0.2);
}

.client-type-icon {
    font-size: 2.5rem;
    color: var(--secondary-color);
    margin-bottom: 1rem;
}

.client-type-card.selected .client-type-icon {
    color: var(--primary-color);
}

.info-box {
    background: linear-gradient(135deg, #e3f2fd 0%, #f3e5f5 100%);
    border-left: 4px solid #2196f3;
    padding: 1rem;
    border-radius: 8px;
    margin-top: 1rem;
}

.progress-bar-custom {
    height: 8px;
    background-color: #e9ecef;
    border-radius: 10px;
    margin-bottom: 2rem;
    overflow: hidden;
}

.progress-bar-fill {
    height: 100%;
    background: linear-gradient(90deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    transition: width 0.3s ease;
    border-radius: 10px;
}

.form-navigation {
    display: flex;
    justify-content: space-between;
    margin-top: 2rem;
    padding-top: 2rem;
    border-top: 2px solid #e9ecef;
}

.input-icon {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--secondary-color);
}

.has-icon {
    padding-left: 38px;
}
</style>

<main id="content" role="main" class="main font-public-sans">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="row align-items-center">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/" class="text-primary-custom">Tableau de Bord</a></li>
                            <li class="breadcrumb-item"><a href="/clients" class="text-primary-custom">Clients</a></li>
                            <li class="breadcrumb-item active">Nouveau Client</li>
                        </ol>
                    </nav>
                    <h1 class="page-header-title text-secondary-custom">
                        <i class="bi-person-plus-fill me-2"></i>
                        Créer un Nouveau Client
                    </h1>
                    <p class="text-muted mb-0">Ajoutez un nouveau client en 4 étapes simples</p>
                </div>
                <div class="col-auto">
                    <a href="/clients" class="btn btn-outline-secondary me-2">
                        <i class="bi-arrow-left me-1"></i> Retour
                    </a>
                </div>
            </div>
        </div>

        <!-- Progress Bar -->
        <div class="progress-bar-custom">
            <div class="progress-bar-fill" id="progressBar" style="width: 25%"></div>
        </div>

        <!-- Steps Indicator -->
        <div class="steps-container">
            <div class="step-item active" data-step="1">
                <div class="step-number">1</div>
                <div class="step-label">Informations<br>de Base</div>
                <div class="step-line"></div>
            </div>
            <div class="step-item" data-step="2">
                <div class="step-number">2</div>
                <div class="step-label">Type de<br>Client</div>
                <div class="step-line"></div>
            </div>
            <div class="step-item" data-step="3">
                <div class="step-number">3</div>
                <div class="step-label">Adresse &<br>Contact</div>
                <div class="step-line"></div>
            </div>
            <div class="step-item" data-step="4">
                <div class="step-number">4</div>
                <div class="step-label">Conditions<br>Commerciales</div>
            </div>
        </div>

        <!-- Formulaire Multi-étapes -->
        <form id="clientForm">

            <!-- STEP 1: Informations de Base -->
            <div class="form-step active" data-step="1">
                <div class="form-section">
                    <div class="form-section-header">
                        <h5 class="mb-0 text-secondary-custom">
                            <i class="bi-info-circle-fill me-2"></i>
                            Informations de Base du Client
                        </h5>
                    </div>
                    <div class="form-section-body">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="nameClient" class="form-label required-field">Nom du Client</label>
                                <div class="position-relative">
                                    <i class="bi-person input-icon"></i>
                                    <input type="text" class="form-control form-control-lg has-icon" id="nameClient"
                                        name="name_client" placeholder="Nom complet ou raison sociale" required>
                                </div>
                                <div class="form-text">Nom officiel tel qu'il apparaîtra sur les documents</div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="nameRepresentant" class="form-label">Nom du Représentant</label>
                                <div class="position-relative">
                                    <i class="bi-person-badge input-icon"></i>
                                    <input type="text" class="form-control form-control-lg has-icon"
                                        id="nameRepresentant" name="name_representant"
                                        placeholder="Personne de contact principale">
                                </div>
                                <div class="form-text">Contact principal chez le client</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="marketteur" class="form-label">Marketteur Assigné</label>
                                <div class="position-relative">
                                    <i class="bi-person-check input-icon"></i>
                                    <input type="text" class="form-control form-control-lg has-icon" id="marketteur"
                                        name="marketteur" placeholder="Commercial en charge">
                                </div>
                                <div class="form-text">Agent commercial responsable du compte</div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="ifu" class="form-label">Numéro IFU</label>
                                <div class="position-relative">
                                    <i class="bi-card-text input-icon"></i>
                                    <input type="text" class="form-control form-control-lg has-icon" id="ifu" name="ifu"
                                        placeholder="Identifiant Fiscal Unique" maxlength="13">
                                </div>
                                <div class="form-text">Identifiant fiscal à 13 chiffres</div>
                            </div>
                        </div>

                        <div class="info-box">
                            <small>
                                <i class="bi-lightbulb-fill me-2"></i>
                                <strong>Conseil :</strong> Assurez-vous que le nom du client est exact car il sera
                                utilisé dans toutes les factures et documents officiels.
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- STEP 2: Type de Client -->
            <div class="form-step" data-step="2">
                <div class="form-section">
                    <div class="form-section-header">
                        <h5 class="mb-0 text-secondary-custom">
                            <i class="bi-tags-fill me-2"></i>
                            Sélectionnez le Type de Client
                        </h5>
                    </div>
                    <div class="form-section-body">
                        <p class="text-muted mb-4">Choisissez la catégorie qui correspond le mieux à votre client. Cela
                            déterminera les conditions commerciales par défaut.</p>

                        <div class="row g-3">
                            <div class="col-md-3 col-sm-6">
                                <div class="client-type-card" data-type="0199a5c7-c6b0-72f4-a050-56c10dc7a258">
                                    <div class="client-type-icon">
                                        <i class="bi-calendar-check"></i>
                                    </div>
                                    <h6 class="fw-bold">Long Terme</h6>
                                    <p class="small text-muted mb-0">Contrat durable avec conditions préférentielles</p>
                                    <input type="radio" name="client_type_id"
                                        value="0199a5c7-c6b0-72f4-a050-56c10dc7a258" class="d-none" required>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div class="client-type-card" data-type="0199a5c9-21b3-734f-b30d-b71b01c4f7b7">
                                    <div class="client-type-icon">
                                        <i class="bi-calendar2-week"></i>
                                    </div>
                                    <h6 class="fw-bold">Court Terme</h6>
                                    <p class="small text-muted mb-0">Achats ponctuels ou saisonniers</p>
                                    <input type="radio" name="client_type_id"
                                        value="0199a5c9-21b3-734f-b30d-b71b01c4f7b7" class="d-none">
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div class="client-type-card" data-type="0199a5ca-c426-7246-b3f1-e7f1a79a9477">
                                    <div class="client-type-icon">
                                        <i class="bi-cash-coin"></i>
                                    </div>
                                    <h6 class="fw-bold">Comptant</h6>
                                    <p class="small text-muted mb-0">Paiement immédiat à la livraison</p>
                                    <input type="radio" name="client_type_id"
                                        value="0199a5ca-c426-7246-b3f1-e7f1a79a9477" class="d-none">
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div class="client-type-card" data-type="0199a5cc-186a-73d6-b840-7872901a0e30">
                                    <div class="client-type-icon">
                                        <i class="bi-exclamation-triangle"></i>
                                    </div>
                                    <h6 class="fw-bold">Litigieux</h6>
                                    <p class="small text-muted mb-0">Compte nécessitant une surveillance</p>
                                    <input type="radio" name="client_type_id"
                                        value="0199a5cc-186a-73d6-b840-7872901a0e30" class="d-none">
                                </div>
                            </div>
                        </div>

                        <div class="info-box mt-4">
                            <small>
                                <i class="bi-info-circle-fill me-2"></i>
                                <strong>À savoir :</strong> Le type de client influence la limite de crédit, le délai de
                                paiement et les réductions applicables.
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- STEP 3: Adresse & Contact -->
            <div class="form-step" data-step="3">
                <div class="form-section">
                    <div class="form-section-header">
                        <h5 class="mb-0 text-secondary-custom">
                            <i class="bi-geo-alt-fill me-2"></i>
                            Adresse et Coordonnées
                        </h5>
                    </div>
                    <div class="form-section-body">
                        <div class="row">
                            <div class="col-12 mb-4">
                                <label for="adresse" class="form-label">Adresse Complète</label>
                                <div class="position-relative">
                                    <i class="bi-house input-icon" style="top: 20px;"></i>
                                    <textarea class="form-control has-icon" id="adresse" name="adresse" rows="3"
                                        placeholder="Adresse de livraison et de facturation"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="city" class="form-label">Ville</label>
                                <div class="position-relative">
                                    <i class="bi-pin-map input-icon"></i>
                                    <select class="form-select form-select-lg has-icon" id="city" name="city">
                                        <option value="">Sélectionner une ville</option>
                                        <option value="Abidjan">Abidjan</option>
                                        <option value="Yamoussoukro">Yamoussoukro</option>
                                        <option value="Bouaké">Bouaké</option>
                                        <option value="Daloa">Daloa</option>
                                        <option value="San-Pédro">San-Pédro</option>
                                        <option value="Korhogo">Korhogo</option>
                                        <option value="Man">Man</option>
                                        <option value="Divo">Divo</option>
                                        <option value="Gagnoa">Gagnoa</option>
                                        <option value="Abengourou">Abengourou</option>
                                        <option value="Anyama">Anyama</option>
                                        <option value="Agboville">Agboville</option>
                                        <option value="Dabou">Dabou</option>
                                        <option value="Grand-Bassam">Grand-Bassam</option>
                                        <option value="Bondoukou">Bondoukou</option>
                                        <option value="Séguéla">Séguéla</option>
                                        <option value="Odienné">Odienné</option>
                                        <option value="Ferkessédougou">Ferkessédougou</option>
                                        <option value="Soubré">Soubré</option>
                                        <option value="Boundiali">Boundiali</option>
                                        <option value="Tingréla">Tingréla</option>
                                        <option value="Issia">Issia</option>
                                        <option value="Bingerville">Bingerville</option>
                                        <option value="Danané">Danané</option>
                                        <option value="Adzopé">Adzopé</option>
                                        <option value="Sassandra">Sassandra</option>
                                        <option value="Tiassalé">Tiassalé</option>
                                        <option value="Toumodi">Toumodi</option>
                                        <option value="Dimbokro">Dimbokro</option>
                                        <option value="Bongouanou">Bongouanou</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="phonenumber" class="form-label">Téléphone</label>
                                <div class="position-relative">
                                    <i class="bi-telephone input-icon"></i>
                                    <input type="tel" class="form-control form-control-lg has-icon" id="phonenumber"
                                        name="phonenumber" placeholder="+225 XX XX XX XX">
                                </div>
                                <div class="form-text">Format: +225 XX XX XX XX</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label for="email" class="form-label">Email</label>
                                <div class="position-relative">
                                    <i class="bi-envelope input-icon"></i>
                                    <input type="email" class="form-control form-control-lg has-icon" id="email"
                                        name="email" placeholder="exemple@email.com">
                                </div>
                                <div class="form-text">Pour l'envoi automatique des factures</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- STEP 4: Conditions Commerciales -->
            <div class="form-step" data-step="4">
                <div class="form-section">
                    <div class="form-section-header">
                        <h5 class="mb-0 text-secondary-custom">
                            <i class="bi-credit-card-fill me-2"></i>
                            Conditions Commerciales
                        </h5>
                    </div>
                    <div class="form-section-body">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="creditLimit" class="form-label">Limite de Crédit (FCFA)</label>
                                <div class="position-relative">
                                    <i class="bi-cash-stack input-icon"></i>
                                    <input type="number" class="form-control form-control-lg has-icon" id="creditLimit"
                                        name="credit_limit" value="0" min="0" step="1000" placeholder="0">
                                </div>
                                <div class="form-text">Montant maximum de crédit autorisé</div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="currentBalance" class="form-label">Solde Initial (FCFA)</label>
                                <div class="position-relative">
                                    <i class="bi-wallet2 input-icon"></i>
                                    <input type="number" class="form-control form-control-lg has-icon"
                                        id="currentBalance" name="current_balance" value="0" step="0.01"
                                        placeholder="0">
                                </div>
                                <div class="form-text">Solde de départ du compte</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="baseReduction" class="form-label">Réduction de Base (%)</label>
                                <div class="position-relative">
                                    <i class="bi-percent input-icon"></i>
                                    <input type="number" class="form-control form-control-lg has-icon"
                                        id="baseReduction" name="base_reduction" value="0" min="0" max="100" step="0.1"
                                        placeholder="0">
                                </div>
                                <div class="form-text">Pourcentage de remise appliqué automatiquement</div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="isActive" class="form-label">Statut du Client</label>
                                <div class="position-relative">
                                    <i class="bi-check-circle input-icon"></i>
                                    <select class="form-select form-select-lg has-icon" id="isActive" name="is_active">
                                        <option value="1" selected>Actif</option>
                                        <option value="0">Inactif</option>
                                    </select>
                                </div>
                                <div class="form-text">Un client inactif ne peut pas passer de commandes</div>
                            </div>
                        </div>

                        <div class="info-box">
                            <small>
                                <i class="bi-calculator-fill me-2"></i>
                                <strong>Recommandations :</strong><br>
                                • Long terme : 500 000 - 2 000 000 FCFA<br>
                                • Court terme : 100 000 - 500 000 FCFA<br>
                                • Comptant/Litigieux : 0 FCFA
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="form-navigation">
                <button type="button" class="btn btn-outline-secondary btn-lg" id="prevBtn" onclick="changeStep(-1)"
                    style="display: none;">
                    <i class="bi-arrow-left me-2"></i> Précédent
                </button>

                <div>
                    <button type="button" class="btn btn-outline-primary btn-lg me-2" onclick="saveDraft()">
                        <i class="bi-save me-2"></i> Sauvegarder Brouillon
                    </button>
                    <button type="button" class="btn btn-primary-custom btn-lg" id="nextBtn" onclick="changeStep(1)">
                        Suivant <i class="bi-arrow-right ms-2"></i>
                    </button>
                    <button type="submit" class="btn btn-primary-custom btn-lg d-none" id="submitBtn">
                        <i class="bi-check-circle me-2"></i> Créer le Client
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <div class="footer mt-5">
        <div class="row justify-content-between align-items-center">
            <div class="col">
                <p class="fs-6 mb-0 text-muted">&copy; <?= date('Y') ?> Toure Distribution. Tous droits réservés.</p>
            </div>
        </div>
    </div>
</main>

<script>
let currentStep = 1;
const totalSteps = 4;

document.addEventListener('DOMContentLoaded', function() {
    // Gestion des types de clients
    const clientTypeCards = document.querySelectorAll('.client-type-card');
    clientTypeCards.forEach(card => {
        card.addEventListener('click', function() {
            clientTypeCards.forEach(c => c.classList.remove('selected'));
            this.classList.add('selected');
            const radio = this.querySelector('input[type="radio"]');
            radio.checked = true;
            updateCreditRecommendation(this.dataset.type);
        });
    });

    // Formatage du numéro de téléphone
    const phoneInput = document.getElementById('phonenumber');
    phoneInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.startsWith('229')) {
            value = value.substring(3);
        }
        if (value.length >= 2) {
            value = value.replace(/(\d{2})(\d{2})(\d{2})(\d{2})/, '$1 $2 $3 $4');
        }
        e.target.value = '+225 ' + value;
    });

    // Soumission du formulaire
    document.getElementById('clientForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        const submitBtn = document.getElementById('submitBtn');
        const originalBtnText = submitBtn.innerHTML;

        submitBtn.disabled = true;
        submitBtn.innerHTML =
            '<span class="spinner-border spinner-border-sm me-2"></span>Création en cours...';

        const formData = {
            name_client: document.getElementById('nameClient').value,
            name_representant: document.getElementById('nameRepresentant').value || null,
            marketteur: document.getElementById('marketteur').value || null,
            client_type_id: document.querySelector('input[name="client_type_id"]:checked')
                ?.value || null,
            adresse: document.getElementById('adresse').value || null,
            city: document.getElementById('city').value || null,
            email: document.getElementById('email').value || null,
            ifu: document.getElementById('ifu').value || null,
            phonenumber: document.getElementById('phonenumber').value || null,
            credit_limit: parseFloat(document.getElementById('creditLimit').value) || 0,
            current_balance: parseFloat(document.getElementById('currentBalance').value) || 0,
            base_reduction: parseFloat(document.getElementById('baseReduction').value) || 0,
            is_active: document.getElementById('isActive').value === '1'
        };

        try {
            const response = await fetch('https://toure.gestiem.com/api/clients', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(formData)
            });

            const result = await response.json();

            if (response.ok) {
                showNotification('success', result.message || 'Client créé avec succès');
                formModified = false; // Désactiver la protection avant redirection
                setTimeout(() => {
                    window.location.href = '/liste-client';
                }, 1500);
            } else {
                if (result.errors) {
                    let errorMsg =
                        '<div class="mb-2"><strong>Erreurs de validation :</strong></div>';
                    Object.keys(result.errors).forEach(field => {
                        errorMsg +=
                            `<div class="mb-1">• ${result.errors[field].join('<br>• ')}</div>`;
                    });
                    showNotification('error', errorMsg);
                } else {
                    showNotification('error', result.message ||
                        'Erreur lors de la création du client');
                }

                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
            }
        } catch (error) {
            showNotification('error', 'Erreur de connexion au serveur');
            console.error('Error:', error);

            submitBtn.disabled = false;
            submitBtn.innerHTML = originalBtnText;
        }
    });

    updateNavigation();
});

function changeStep(direction) {
    const steps = document.querySelectorAll('.form-step');
    const stepItems = document.querySelectorAll('.step-item');

    if (direction > 0 && !validateStep(currentStep)) {
        return;
    }

    steps[currentStep - 1].classList.remove('active');

    if (direction > 0) {
        stepItems[currentStep - 1].classList.add('completed');
        stepItems[currentStep - 1].querySelector('.step-number').innerHTML = '<i class="bi-check2"></i>';
    }

    currentStep += direction;

    steps[currentStep - 1].classList.add('active');
    stepItems[currentStep - 1].classList.add('active');

    stepItems.forEach((item, index) => {
        if (index + 1 !== currentStep) {
            item.classList.remove('active');
        }
    });

    updateNavigation();
    updateProgressBar();

    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

function validateStep(step) {
    const currentStepElement = document.querySelector(`.form-step[data-step="${step}"]`);
    const requiredInputs = currentStepElement.querySelectorAll('[required]');

    for (let input of requiredInputs) {
        if (!input.value.trim()) {
            input.focus();
            input.classList.add('is-invalid');
            showNotification('error', 'Veuillez remplir tous les champs obligatoires marqués d\'un astérisque (*)');
            return false;
        }
        input.classList.remove('is-invalid');
    }

    if (step === 2) {
        const selectedType = document.querySelector('input[name="client_type_id"]:checked');
        if (!selectedType) {
            showNotification('error', 'Veuillez sélectionner un type de client');
            return false;
        }
    }

    return true;
}

function updateNavigation() {
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const submitBtn = document.getElementById('submitBtn');

    prevBtn.style.display = currentStep === 1 ? 'none' : 'inline-block';

    if (currentStep === totalSteps) {
        nextBtn.classList.add('d-none');
        submitBtn.classList.remove('d-none');
    } else {
        nextBtn.classList.remove('d-none');
        submitBtn.classList.add('d-none');
    }
}

function updateProgressBar() {
    const progress = (currentStep / totalSteps) * 100;
    document.getElementById('progressBar').style.width = progress + '%';
}

function updateCreditRecommendation(typeId) {
    const creditLimit = document.getElementById('creditLimit');

    const recommendations = {
        '0199a5c7-c6b0-72f4-a050-56c10dc7a258': 1000000, // Long terme
        '0199a5c9-21b3-734f-b30d-b71b01c4f7b7': 300000, // Court terme
        '0199a5ca-c426-7246-b3f1-e7f1a79a9477': 0, // Comptant
        '0199a5cc-186a-73d6-b840-7872901a0e30': 0 // Litigieux
    };

    creditLimit.value = recommendations[typeId] || 0;
}

function saveDraft() {
    const formData = new FormData(document.getElementById('clientForm'));
    const data = Object.fromEntries(formData);
    data.currentStep = currentStep;
    localStorage.setItem('clientDraft', JSON.stringify(data));

    showNotification('success', 'Brouillon sauvegardé avec succès');
}

function showNotification(type, message) {
    const toast = document.createElement('div');
    toast.className = `alert alert-${type === 'success' ? 'success' : 'danger'} position-fixed top-0 end-0 m-3`;
    toast.style.zIndex = '9999';
    toast.style.minWidth = '350px';
    toast.style.maxWidth = '500px';

    const icon = type === 'success' ? 'check-circle-fill' : 'exclamation-triangle-fill';
    toast.innerHTML = `
        <div class="d-flex align-items-start">
            <i class="bi-${icon} me-2 fs-5"></i>
            <div class="flex-grow-1">${message}</div>
            <button type="button" class="btn-close" onclick="this.parentElement.parentElement.remove()"></button>
        </div>
    `;

    document.body.appendChild(toast);

    setTimeout(() => {
        toast.style.opacity = '0';
        setTimeout(() => toast.remove(), 300);
    }, 5000);
}

// Restaurer le brouillon
window.addEventListener('load', function() {
    const draft = localStorage.getItem('clientDraft');
    if (draft && confirm('Un brouillon a été trouvé. Voulez-vous le restaurer ?')) {
        const data = JSON.parse(draft);

        Object.keys(data).forEach(key => {
            if (key === 'currentStep') {
                currentStep = parseInt(data[key]);
                return;
            }

            const element = document.querySelector(`[name="${key}"]`);
            if (element) {
                if (element.type === 'radio') {
                    const radio = document.querySelector(`[name="${key}"][value="${data[key]}"]`);
                    if (radio) {
                        radio.checked = true;
                        radio.closest('.client-type-card')?.classList.add('selected');
                    }
                } else {
                    element.value = data[key];
                }
            }
        });

        if (currentStep > 1) {
            for (let i = 1; i < currentStep; i++) {
                document.querySelector(`.step-item[data-step="${i}"]`).classList.add('completed');
            }
            document.querySelectorAll('.form-step').forEach(step => step.classList.remove('active'));
            document.querySelector(`.form-step[data-step="${currentStep}"]`).classList.add('active');
        }

        updateNavigation();
        updateProgressBar();
        localStorage.removeItem('clientDraft');
    }
});

// Protection perte de données
let formModified = false;
document.getElementById('clientForm').addEventListener('input', function() {
    formModified = true;
});

window.addEventListener('beforeunload', function(e) {
    if (formModified) {
        e.preventDefault();
        e.returnValue = '';
    }
});
</script>

<?php
$content = ob_get_clean();
require('./views/layouts/app-layout.php');
?>