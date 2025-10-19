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

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(240, 4, 128, 0.25);
    }

    .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(240, 4, 128, 0.25);
    }

    .page-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, #d1036d 100%);
        color: white;
        border-radius: 12px;
        padding: 2rem;
        margin-bottom: 2rem;
    }

    .breadcrumb {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 8px;
        padding: 0.5rem 1rem;
    }

    .breadcrumb-item a {
        color: white;
        text-decoration: none;
    }

    .breadcrumb-item.active {
        color: rgba(255, 255, 255, 0.8);
    }

    /* Correction pour éviter le chevauchement avec la sidebar */
    .content {
        margin-left: 0 !important;
        padding-left: 2rem !important;
        min-height: 100vh;
    }

    @media (min-width: 768px) {
        .content {
            margin-left: 250px !important;
            padding-left: 2rem !important;
        }
    }
</style>

<div class="content px-4 py-4" style="margin-left: 0; padding-left: 2rem;">
    <!-- En-tête de la page -->
    <div class="page-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-2">
                        <li class="breadcrumb-item"><a href="/commandes">Commandes</a></li>
                        <li class="breadcrumb-item active">Modifier Commande</li>
                    </ol>
                </nav>
                <h1 class="h3 mb-0 font-public-sans">Modifier Commande</h1>
                <p class="mb-0 opacity-75">Modifier les informations de la commande</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-custom">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="bi-pencil me-2 text-primary-custom"></i>
                        Informations de la Commande
                    </h5>
                </div>
                <div class="card-body">
                    <form id="editCommandeForm">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="numeroCommande" class="form-label">Numéro de Commande</label>
                                <input type="text" class="form-control" id="numeroCommande" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fournisseurSelect" class="form-label">Fournisseur <span class="text-danger">*</span></label>
                                <select class="form-select" id="fournisseurSelect" required>
                                    <option value="">Sélectionner un fournisseur...</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="dateAchat" class="form-label">Date d'Achat <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="dateAchat" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="dateLivraisonPrevue" class="form-label">Date de Livraison Prévue</label>
                                <input type="date" class="form-control" id="dateLivraisonPrevue">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="dateLivraisonEffective" class="form-label">Date de Livraison Effective</label>
                                <input type="date" class="form-control" id="dateLivraisonEffective">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="montant" class="form-label">Montant Total <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="montant" step="0.01" min="0" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">Statut</label>
                                <select class="form-select" id="status">
                                    <option value="en_attente">En Attente</option>
                                    <option value="validee">Validée</option>
                                    <option value="en_cours">En Cours</option>
                                    <option value="livree">Livrée</option>
                                    <option value="partiellement_livree">Partiellement Livrée</option>
                                    <option value="annulee">Annulée</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="note" class="form-label">Note</label>
                            <textarea class="form-control" id="note" rows="3" placeholder="Notes ou observations sur la commande..."></textarea>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-secondary" onclick="cancelEdit()">
                                <i class="bi-x-circle me-1"></i> Annuler
                            </button>
                            <button type="submit" class="btn btn-primary-custom">
                                <i class="bi-check-circle me-1"></i> Enregistrer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let commandeId = '';
let fournisseurs = [];
let commandeData = null;

// Fonction pour obtenir un cookie
function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
    return null;
}

// Fonction pour afficher un toast
function showToast(message, type = 'info') {
    // Créer le conteneur de toast s'il n'existe pas
    let toastContainer = document.getElementById('toast-container');
    if (!toastContainer) {
        toastContainer = document.createElement('div');
        toastContainer.id = 'toast-container';
        toastContainer.className = 'toast-container position-fixed top-0 end-0 p-3';
        toastContainer.style.zIndex = '9999';
        document.body.appendChild(toastContainer);
    }

    const toastId = 'toast-' + Date.now();
    const toastHtml = `
        <div id="${toastId}" class="toast align-items-center text-white bg-${type === 'error' ? 'danger' : type === 'success' ? 'success' : 'info'} border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    ${message}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    `;
    
    toastContainer.insertAdjacentHTML('beforeend', toastHtml);
    
    const toastElement = document.getElementById(toastId);
    const toast = new bootstrap.Toast(toastElement);
    toast.show();
    
    // Supprimer l'élément après la fermeture
    toastElement.addEventListener('hidden.bs.toast', () => {
        toastElement.remove();
    });
}

// Fonction pour charger les fournisseurs
async function loadFournisseurs() {
    try {
        const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
        const response = await fetch('/api/fournisseur', {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${accessToken}`,
                'Accept': 'application/json'
            },
            credentials: 'include'
        });

        if (response.ok) {
            const data = await response.json();
            fournisseurs = data.data || [];
            populateFournisseurSelect();
        } else {
            throw new Error('Erreur lors du chargement des fournisseurs');
        }
    } catch (error) {
        console.error('Erreur lors du chargement des fournisseurs:', error);
        showToast('Erreur lors du chargement des fournisseurs', 'error');
    }
}

// Fonction pour peupler le select des fournisseurs
function populateFournisseurSelect() {
    const select = document.getElementById('fournisseurSelect');
    select.innerHTML = '<option value="">Sélectionner un fournisseur...</option>';
    
    fournisseurs.forEach(fournisseur => {
        const option = document.createElement('option');
        option.value = fournisseur.fournisseur_id;
        option.textContent = fournisseur.name;
        select.appendChild(option);
    });
}

// Fonction pour charger les détails de la commande
async function loadCommandeDetails() {
    try {
        const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
        const response = await fetch(`/api/commandes/${commandeId}`, {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${accessToken}`,
                'Accept': 'application/json'
            }
        });

        if (response.ok) {
            const data = await response.json();
            if (data.success) {
                commandeData = data.data;
                populateForm();
            } else {
                throw new Error(data.message || 'Erreur lors du chargement de la commande');
            }
        } else {
            throw new Error('Erreur lors du chargement de la commande');
        }
    } catch (error) {
        console.error('Erreur lors du chargement de la commande:', error);
        showToast('Erreur lors du chargement de la commande', 'error');
    }
}

// Fonction pour peupler le formulaire
function populateForm() {
    if (!commandeData) return;

    document.getElementById('numeroCommande').value = commandeData.numero_commande || '';
    document.getElementById('fournisseurSelect').value = commandeData.fournisseur_id || '';
    document.getElementById('dateAchat').value = commandeData.date_achat || '';
    document.getElementById('dateLivraisonPrevue').value = commandeData.date_livraison_prevue || '';
    document.getElementById('dateLivraisonEffective').value = commandeData.date_livraison_effective || '';
    document.getElementById('montant').value = commandeData.montant || '';
    document.getElementById('status').value = commandeData.status || 'en_attente';
    document.getElementById('note').value = commandeData.note || '';
}

// Fonction pour valider le formulaire
function validateForm() {
    const fournisseur = document.getElementById('fournisseurSelect').value;
    const dateAchat = document.getElementById('dateAchat').value;
    const montant = document.getElementById('montant').value;

    if (!fournisseur) {
        showToast('Veuillez sélectionner un fournisseur', 'error');
        return false;
    }

    if (!dateAchat) {
        showToast('Veuillez saisir la date d\'achat', 'error');
        return false;
    }

    if (!montant || parseFloat(montant) <= 0) {
        showToast('Veuillez saisir un montant valide', 'error');
        return false;
    }

    return true;
}

// Fonction pour soumettre le formulaire
async function handleSubmit(event) {
    event.preventDefault();

    if (!validateForm()) {
        return;
    }

    try {
        const formData = {
            fournisseur_id: document.getElementById('fournisseurSelect').value,
            date_achat: document.getElementById('dateAchat').value,
            date_livraison_prevue: document.getElementById('dateLivraisonPrevue').value || null,
            date_livraison_effective: document.getElementById('dateLivraisonEffective').value || null,
            montant: parseFloat(document.getElementById('montant').value),
            status: document.getElementById('status').value,
            note: document.getElementById('note').value || null
        };

        const accessToken = getCookie('access_token') || localStorage.getItem('access_token');
        const response = await fetch(`/api/commandes/${commandeId}`, {
            method: 'PUT',
            headers: {
                'Authorization': `Bearer ${accessToken}`,
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(formData)
        });

        if (response.ok) {
            const result = await response.json();
            showToast('Commande modifiée avec succès', 'success');
            setTimeout(() => {
                window.location.href = `/commande/${commandeId}`;
            }, 1500);
        } else {
            const error = await response.json();
            showToast(error.message || 'Erreur lors de la modification', 'error');
        }
    } catch (error) {
        console.error('Erreur lors de la modification:', error);
        showToast('Erreur lors de la modification', 'error');
    }
}

// Fonction pour annuler
function cancelEdit() {
    window.location.href = `/commande/${commandeId}`;
}

// Initialisation
document.addEventListener('DOMContentLoaded', function() {
    // Extraire l'ID de la commande de l'URL
    const path = window.location.pathname;
    const matches = path.match(/\/commande\/([^\/]+)\/modifier/);
    
    if (matches && matches[1]) {
        commandeId = matches[1];
        loadFournisseurs();
        loadCommandeDetails();
    } else {
        showToast('ID de commande manquant dans l\'URL', 'error');
    }

    // Attacher l'événement de soumission du formulaire
    document.getElementById('editCommandeForm').addEventListener('submit', handleSubmit);
});
</script>

<?php $content = ob_get_clean(); ?>
<?php require './views/layouts/app-layout.php'; ?>
