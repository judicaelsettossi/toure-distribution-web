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

    .card-custom {
        border-radius: 12px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        border: none;
    }

    .form-section {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        border: none;
    }

    .section-title {
        color: var(--primary-color);
        font-weight: 600;
        margin-bottom: 1.5rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid var(--light-primary);
    }

    .form-label {
        font-weight: 600;
        color: #495057;
        margin-bottom: 0.5rem;
    }

    .form-control, .form-select {
        border-radius: 8px;
        border: 2px solid #e9ecef;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(240, 4, 128, 0.25);
    }

    .btn-outline-modern {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        border: 2px solid var(--primary-color);
        background: white;
        color: var(--primary-color);
        border-radius: 8px;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-outline-modern:hover {
        background-color: var(--primary-color);
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 3px 10px rgba(240, 4, 128, 0.3);
    }

    .loading-spinner {
        display: none;
    }

    .error-message {
        display: none;
    }

    .success-message {
        display: none;
    }

    .alert-custom {
        border-radius: 8px;
        border: none;
        font-weight: 500;
    }

    .alert-success-custom {
        background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
        color: #155724;
        border-left: 4px solid #28a745;
    }

    .alert-danger-custom {
        background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
        color: #721c24;
        border-left: 4px solid #dc3545;
    }

    .alert-warning-custom {
        background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
        color: #856404;
        border-left: 4px solid #ffc107;
    }

    .alert-info-custom {
        background: linear-gradient(135deg, #d1ecf1 0%, #bee5eb 100%);
        color: #0c5460;
        border-left: 4px solid #17a2b8;
    }

    .vente-item {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 1rem;
        border: 1px solid #e9ecef;
    }

    .vente-item-header {
        display: flex;
        justify-content: between;
        align-items: center;
        margin-bottom: 1rem;
    }

    .vente-item-title {
        font-weight: 600;
        color: var(--primary-color);
        margin: 0;
    }

    .remove-vente-btn {
        background: #dc3545;
        color: white;
        border: none;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .remove-vente-btn:hover {
        background: #c82333;
        transform: scale(1.1);
    }

    .total-section {
        background: linear-gradient(135deg, var(--light-primary) 0%, rgba(240, 4, 128, 0.05) 100%);
        border-radius: 12px;
        padding: 2rem;
        margin-top: 2rem;
        border: 2px solid var(--primary-color);
    }

    .total-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
        font-size: 1.1rem;
    }

    .total-final {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary-color);
        border-top: 2px solid var(--primary-color);
        padding-top: 1rem;
        margin-top: 1rem;
    }
</style>

<main class="main">
    <div class="content px-4 py-4">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-1 font-public-sans text-primary-custom">Créer une Livraison</h1>
                <p class="text-muted mb-0">Créer une nouvelle livraison à partir d'une vente validée</p>
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-outline-modern" onclick="window.history.back()">
                    <i class="bi-arrow-left me-1"></i> Retour
                </button>
                <button class="btn btn-outline-modern" onclick="window.location.href='/livraison'">
                    <i class="bi-list me-1"></i> Liste des Livraisons
                </button>
            </div>
        </div>

        <!-- Loading State -->
        <div class="loading-spinner text-center py-5" id="loadingState">
            <div class="spinner-border text-primary-custom" role="status">
                <span class="visually-hidden">Chargement...</span>
            </div>
            <p class="mt-3 text-muted">Chargement des données...</p>
        </div>

        <!-- Error State -->
        <div class="error-message alert alert-danger-custom alert-custom" id="errorState">
            <i class="bi-exclamation-triangle me-2"></i>
            <span id="errorMessage">Une erreur est survenue lors du chargement des données.</span>
        </div>

        <!-- Success State -->
        <div class="success-message alert alert-success-custom alert-custom" id="successState">
            <i class="bi-check-circle me-2"></i>
            <span id="successMessage">Livraison créée avec succès !</span>
        </div>

        <!-- Form Container -->
        <div id="formContainer" style="display: none;">
            <form id="createLivraisonForm">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Informations de base -->
                        <div class="form-section">
                            <h4 class="section-title">
                                <i class="bi-info-circle me-2"></i>Informations de Base
                            </h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="vente_id" class="form-label">Vente <span class="text-danger">*</span></label>
                                        <select class="form-select" id="vente_id" name="vente_id" required>
                                            <option value="">Sélectionner une vente</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="entrepot_id" class="form-label">Entrepôt Source <span class="text-danger">*</span></label>
                                        <select class="form-select" id="entrepot_id" name="entrepot_id" required>
                                            <option value="">Sélectionner un entrepôt</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="chauffeur_id" class="form-label">Chauffeur</label>
                                        <select class="form-select" id="chauffeur_id" name="chauffeur_id">
                                            <option value="">Sélectionner un chauffeur</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="camion_id" class="form-label">Camion</label>
                                        <select class="form-select" id="camion_id" name="camion_id">
                                            <option value="">Sélectionner un camion</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="date_livraison_prevue" class="form-label">Date de Livraison Prévue</label>
                                        <input type="datetime-local" class="form-control" id="date_livraison_prevue" name="date_livraison_prevue">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Informations de livraison -->
                        <div class="form-section">
                            <h4 class="section-title">
                                <i class="bi-geo-alt me-2"></i>Informations de Livraison
                            </h4>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="adresse_livraison" class="form-label">Adresse de Livraison</label>
                                        <textarea class="form-control" id="adresse_livraison" name="adresse_livraison" rows="3" placeholder="Adresse complète de livraison"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="contact_livraison" class="form-label">Contact sur Place</label>
                                        <input type="text" class="form-control" id="contact_livraison" name="contact_livraison" placeholder="Nom du contact">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="telephone_livraison" class="form-label">Téléphone du Contact</label>
                                        <input type="tel" class="form-control" id="telephone_livraison" name="telephone_livraison" placeholder="Numéro de téléphone">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="note" class="form-label">Notes</label>
                                        <textarea class="form-control" id="note" name="note" rows="3" placeholder="Notes ou observations sur la livraison"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Résumé -->
                    <div class="col-lg-4">
                        <div class="form-section">
                            <h4 class="section-title">
                                <i class="bi-file-text me-2"></i>Résumé de la Livraison
                            </h4>
                            <div id="livraisonSummary">
                                <div class="text-center text-muted py-4">
                                    <i class="bi-info-circle me-2"></i>
                                    Sélectionnez une vente pour voir le résumé
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="form-section">
                            <h4 class="section-title">
                                <i class="bi-lightning me-2"></i>Actions
                            </h4>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary-custom" id="submitBtn">
                                    <i class="bi-check-circle me-2"></i>Créer la Livraison
                                </button>
                                <button type="button" class="btn btn-outline-modern" onclick="resetForm()">
                                    <i class="bi-arrow-clockwise me-2"></i>Réinitialiser
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
    // Variables globales
    let ventesData = [];
    let entrepotsData = [];
    let chauffeursData = [];
    let camionsData = [];

    // Fonction pour récupérer un cookie
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
        return null;
    }

    // Fonction pour afficher le loading
    function showLoading() {
        document.getElementById('loadingState').style.display = 'block';
        document.getElementById('formContainer').style.display = 'none';
        document.getElementById('errorState').style.display = 'none';
        document.getElementById('successState').style.display = 'none';
    }

    // Fonction pour masquer le loading
    function hideLoading() {
        document.getElementById('loadingState').style.display = 'none';
        document.getElementById('formContainer').style.display = 'block';
    }

    // Fonction pour afficher une erreur
    function showError(message) {
        document.getElementById('errorState').style.display = 'block';
        document.getElementById('errorMessage').textContent = message;
        document.getElementById('successState').style.display = 'none';
    }

    // Fonction pour afficher un succès
    function showSuccess(message) {
        document.getElementById('successState').style.display = 'block';
        document.getElementById('successMessage').textContent = message;
        document.getElementById('errorState').style.display = 'none';
    }

    // Fonction pour charger les ventes
    async function loadVentes() {
        try {
            const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
            console.log('Token d\'accès pour ventes:', accessToken ? 'Présent' : 'Absent');
            
            const response = await fetch('/api/ventes?per_page=100', {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                credentials: 'include'
            });

            console.log('Réponse ventes:', response.status, response.statusText);

            if (response.ok) {
                const result = await response.json();
                console.log('Données ventes reçues:', result);
                if (result.success && result.data) {
                    ventesData = result.data.data || [];
                    console.log('Ventes data:', ventesData);
                    populateVentesSelect();
                } else {
                    console.warn('Structure de données ventes inattendue:', result);
                }
            } else {
                console.error('Erreur HTTP ventes:', response.status, response.statusText);
                const errorText = await response.text();
                console.error('Détails erreur ventes:', errorText);
            }

        } catch (error) {
            console.error('Erreur lors du chargement des ventes:', error);
        }
    }

    // Fonction pour charger les entrepôts
    async function loadEntrepots() {
        try {
            const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
            console.log('Token d\'accès pour entrepôts:', accessToken ? 'Présent' : 'Absent');
            
            const response = await fetch('/api/entrepots?per_page=100', {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                credentials: 'include'
            });

            console.log('Réponse entrepôts:', response.status, response.statusText);

            if (response.ok) {
                const result = await response.json();
                console.log('Données entrepôts reçues:', result);
                // La structure des entrepôts est différente selon la documentation
                if (result.data) {
                    entrepotsData = result.data || [];
                    console.log('Entrepôts data:', entrepotsData);
                    populateEntrepotsSelect();
                } else {
                    console.warn('Structure de données entrepôts inattendue:', result);
                }
            } else {
                console.error('Erreur HTTP entrepôts:', response.status, response.statusText);
                const errorText = await response.text();
                console.error('Détails erreur entrepôts:', errorText);
            }

        } catch (error) {
            console.error('Erreur lors du chargement des entrepôts:', error);
        }
    }

    // Fonction pour charger les chauffeurs
    async function loadChauffeurs() {
        try {
            const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
            
            const response = await fetch('/api/chauffeurs?per_page=100', {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                credentials: 'include'
            });

            if (response.ok) {
                const result = await response.json();
                console.log('Données chauffeurs reçues:', result);
                if (result.success && result.data) {
                    chauffeursData = result.data.data || [];
                    console.log('Chauffeurs data:', chauffeursData);
                    populateChauffeursSelect();
                }
            }

        } catch (error) {
            console.error('Erreur lors du chargement des chauffeurs:', error);
        }
    }

    // Fonction pour charger les camions
    async function loadCamions() {
        try {
            const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
            
            const response = await fetch('/api/camions?per_page=100', {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                credentials: 'include'
            });

            if (response.ok) {
                const result = await response.json();
                console.log('Données camions reçues:', result);
                if (result.success && result.data) {
                    camionsData = result.data.data || [];
                    console.log('Camions data:', camionsData);
                    populateCamionsSelect();
                }
            }

        } catch (error) {
            console.error('Erreur lors du chargement des camions:', error);
        }
    }

    // Fonction pour peupler le select des ventes
    function populateVentesSelect() {
        const select = document.getElementById('vente_id');
        select.innerHTML = '<option value="">Sélectionner une vente</option>';
        
        console.log('Peuplement des ventes avec', ventesData.length, 'éléments');
        
        if (ventesData.length === 0) {
            const option = document.createElement('option');
            option.value = '';
            option.textContent = 'Aucune vente disponible';
            option.disabled = true;
            select.appendChild(option);
            return;
        }
        
        ventesData.forEach(vente => {
            const option = document.createElement('option');
            option.value = vente.vente_id;
            const clientName = vente.client?.name || vente.client_name || 'Client inconnu';
            const montant = vente.montant_total || vente.montant || 0;
            option.textContent = `${vente.numero_vente} - ${clientName} (${formatPrice(montant)})`;
            select.appendChild(option);
        });
    }

    // Fonction pour peupler le select des entrepôts
    function populateEntrepotsSelect() {
        const select = document.getElementById('entrepot_id');
        select.innerHTML = '<option value="">Sélectionner un entrepôt</option>';
        
        console.log('Peuplement des entrepôts avec', entrepotsData.length, 'éléments');
        
        entrepotsData.forEach(entrepot => {
            const option = document.createElement('option');
            option.value = entrepot.entrepot_id;
            const name = entrepot.name || entrepot.nom || 'Entrepôt inconnu';
            const code = entrepot.code || entrepot.code_entrepot || 'N/A';
            option.textContent = `${name} - ${code}`;
            select.appendChild(option);
        });
    }

    // Fonction pour peupler le select des chauffeurs
    function populateChauffeursSelect() {
        const select = document.getElementById('chauffeur_id');
        select.innerHTML = '<option value="">Sélectionner un chauffeur</option>';
        
        chauffeursData.forEach(chauffeur => {
            const option = document.createElement('option');
            option.value = chauffeur.chauffeur_id;
            const name = chauffeur.name || chauffeur.nom || 'Nom inconnu';
            const phone = chauffeur.phone || chauffeur.telephone || 'Téléphone inconnu';
            option.textContent = `${name} - ${phone}`;
            select.appendChild(option);
        });
    }

    // Fonction pour peupler le select des camions
    function populateCamionsSelect() {
        const select = document.getElementById('camion_id');
        select.innerHTML = '<option value="">Sélectionner un camion</option>';
        
        camionsData.forEach(camion => {
            const option = document.createElement('option');
            option.value = camion.camion_id;
            const immat = camion.numero_immat || camion.immatriculation || 'Immat inconnue';
            const marque = camion.marque || 'Marque inconnue';
            const modele = camion.modele || 'Modèle inconnu';
            option.textContent = `${immat} - ${marque} ${modele}`;
            select.appendChild(option);
        });
    }

    // Fonction pour mettre à jour le résumé
    function updateSummary() {
        const venteId = document.getElementById('vente_id').value;
        const entrepotId = document.getElementById('entrepot_id').value;
        const chauffeurId = document.getElementById('chauffeur_id').value;
        const camionId = document.getElementById('camion_id').value;
        const dateLivraison = document.getElementById('date_livraison_prevue').value;
        const adresse = document.getElementById('adresse_livraison').value;
        const contact = document.getElementById('contact_livraison').value;
        const telephone = document.getElementById('telephone_livraison').value;

        const summaryDiv = document.getElementById('livraisonSummary');
        
        if (!venteId) {
            summaryDiv.innerHTML = `
                <div class="text-center text-muted py-4">
                    <i class="bi-info-circle me-2"></i>
                    Sélectionnez une vente pour voir le résumé
                </div>
            `;
            return;
        }

        const vente = ventesData.find(v => v.vente_id === venteId);
        const entrepot = entrepotsData.find(e => e.entrepot_id === entrepotId);
        const chauffeur = chauffeursData.find(c => c.chauffeur_id === chauffeurId);
        const camion = camionsData.find(c => c.camion_id === camionId);

        summaryDiv.innerHTML = `
            <div class="mb-3">
                <h6 class="text-primary-custom mb-2">Vente Sélectionnée</h6>
                <div class="small">
                    <div><strong>Numéro:</strong> ${vente?.numero_vente || 'N/A'}</div>
                    <div><strong>Client:</strong> ${vente?.client?.name || 'N/A'}</div>
                    <div><strong>Montant:</strong> ${formatPrice(vente?.montant_total || 0)}</div>
                </div>
            </div>
            
            <div class="mb-3">
                <h6 class="text-primary-custom mb-2">Entrepôt</h6>
                <div class="small">
                    <div><strong>Nom:</strong> ${entrepot?.name || 'Non sélectionné'}</div>
                    <div><strong>Code:</strong> ${entrepot?.code || 'N/A'}</div>
                </div>
            </div>
            
            <div class="mb-3">
                <h6 class="text-primary-custom mb-2">Équipe</h6>
                <div class="small">
                    <div><strong>Chauffeur:</strong> ${chauffeur ? (chauffeur.name || chauffeur.nom || 'Nom inconnu') : 'Non sélectionné'}</div>
                    <div><strong>Camion:</strong> ${camion ? `${camion.numero_immat || camion.immatriculation || 'Immat inconnue'} - ${camion.marque || 'Marque inconnue'}` : 'Non sélectionné'}</div>
                </div>
            </div>
            
            <div class="mb-3">
                <h6 class="text-primary-custom mb-2">Livraison</h6>
                <div class="small">
                    <div><strong>Date:</strong> ${dateLivraison ? formatDateTime(dateLivraison) : 'Non définie'}</div>
                    <div><strong>Adresse:</strong> ${adresse || 'Non définie'}</div>
                    <div><strong>Contact:</strong> ${contact || 'Non défini'}</div>
                    <div><strong>Téléphone:</strong> ${telephone || 'Non défini'}</div>
                </div>
            </div>
        `;
    }

    // Fonction pour valider le formulaire
    function validateForm() {
        const venteId = document.getElementById('vente_id').value;
        const entrepotId = document.getElementById('entrepot_id').value;

        if (!venteId) {
            showError('Veuillez sélectionner une vente');
            return false;
        }

        if (!entrepotId) {
            showError('Veuillez sélectionner un entrepôt');
            return false;
        }

        return true;
    }

    // Fonction pour gérer la soumission du formulaire
    async function handleSubmit(event) {
        event.preventDefault();
        
        if (!validateForm()) {
            return;
        }

        const submitBtn = document.getElementById('submitBtn');
        const originalText = submitBtn.innerHTML;
        
        try {
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="bi-hourglass-split me-1"></i> Création...';

            const formData = new FormData(event.target);
            const data = Object.fromEntries(formData.entries());
            
            // Nettoyer les données vides
            Object.keys(data).forEach(key => {
                if (data[key] === '') {
                    delete data[key];
                }
            });

            console.log('Données envoyées:', data);

            const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
            
            const response = await fetch('/api/livraisons', {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${accessToken}`,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                credentials: 'include',
                body: JSON.stringify(data)
            });

            const result = await response.json();

            if (response.ok && result.success) {
                showSuccess('Livraison créée avec succès !');
                document.getElementById('createLivraisonForm').reset();
                updateSummary();
                
                // Rediriger vers la liste après 2 secondes
                setTimeout(() => {
                    window.location.href = '/livraison';
                }, 2000);
            } else {
                let errorMessage = result.message || 'Erreur lors de la création de la livraison';
                
                if (result.errors) {
                    const errorDetails = Object.entries(result.errors)
                        .map(([field, messages]) => `${field}: ${Array.isArray(messages) ? messages.join(', ') : messages}`)
                        .join('\n');
                    errorMessage += '\n\nDétails:\n' + errorDetails;
                }
                
                throw new Error(errorMessage);
            }

        } catch (error) {
            console.error('Erreur lors de la création:', error);
            showError('Erreur lors de la création de la livraison: ' + error.message);
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        }
    }

    // Fonction pour réinitialiser le formulaire
    function resetForm() {
        document.getElementById('createLivraisonForm').reset();
        updateSummary();
    }

    // Fonctions utilitaires
    function formatPrice(price) {
        return new Intl.NumberFormat('fr-FR', {
            style: 'currency',
            currency: 'XOF'
        }).format(price || 0);
    }

    function formatDateTime(dateString) {
        if (!dateString) return 'N/A';
        return new Date(dateString).toLocaleString('fr-FR');
    }

    // Fonction pour afficher les toasts
    function showToast(message, type = 'info') {
        const toastContainer = document.getElementById('toastContainer') || createToastContainer();
        
        const toast = document.createElement('div');
        toast.className = `toast align-items-center text-white bg-${type === 'success' ? 'success' : type === 'error' ? 'danger' : type === 'warning' ? 'warning' : 'info'} border-0`;
        toast.setAttribute('role', 'alert');
        toast.innerHTML = `
            <div class="d-flex">
                <div class="toast-body">${message}</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        `;
        
        toastContainer.appendChild(toast);
        
        const bsToast = new bootstrap.Toast(toast);
        bsToast.show();
        
        toast.addEventListener('hidden.bs.toast', () => {
            toast.remove();
        });
    }

    function createToastContainer() {
        const container = document.createElement('div');
        container.id = 'toastContainer';
        container.className = 'toast-container position-fixed top-0 end-0 p-3';
        container.style.zIndex = '9999';
        document.body.appendChild(container);
        return container;
    }

    // Initialisation
    document.addEventListener('DOMContentLoaded', function() {
        showLoading();
        
        // Charger toutes les données en parallèle
        Promise.all([
            loadVentes(),
            loadEntrepots(),
            loadChauffeurs(),
            loadCamions()
        ]).then(() => {
            hideLoading();
        }).catch(error => {
            console.error('Erreur lors du chargement initial:', error);
            showError('Erreur lors du chargement des données: ' + error.message);
        });

        // Event listeners
        document.getElementById('createLivraisonForm').addEventListener('submit', handleSubmit);
        
        // Mettre à jour le résumé quand les champs changent
        ['vente_id', 'entrepot_id', 'chauffeur_id', 'camion_id', 'date_livraison_prevue', 'adresse_livraison', 'contact_livraison', 'telephone_livraison'].forEach(fieldId => {
            document.getElementById(fieldId).addEventListener('change', updateSummary);
            document.getElementById(fieldId).addEventListener('input', updateSummary);
        });

        // Définir la date actuelle par défaut
        const now = new Date();
        const dateString = now.toISOString().slice(0, 16);
        document.getElementById('date_livraison_prevue').value = dateString;
    });
</script>

<?php $content = ob_get_clean(); ?>
<?php require './views/layouts/app-layout.php'; ?>
