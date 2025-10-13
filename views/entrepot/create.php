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

    .info-box {
        background: linear-gradient(135deg, #e3f2fd 0%, #f3e5f5 100%);
        border-left: 4px solid #2196f3;
        padding: 1rem;
        border-radius: 8px;
        margin-top: 1rem;
    }

    .warehouse-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
    }

    .preview-card {
        background: linear-gradient(135deg, var(--light-primary) 0%, white 100%);
        border: 2px solid var(--primary-color);
        border-radius: 12px;
        padding: 2rem;
        text-align: center;
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
                            <li class="breadcrumb-item"><a href="/entrepots" class="text-primary-custom">Entrepôts</a></li>
                            <li class="breadcrumb-item active">Nouvel Entrepôt</li>
                        </ol>
                    </nav>
                    <h1 class="page-header-title text-secondary-custom">
                        <i class="bi-building me-2"></i>
                        Créer un Nouvel Entrepôt
                    </h1>
                    <p class="text-muted mb-0">Ajoutez un nouveau point de stockage à votre réseau</p>
                </div>
                <div class="col-auto">
                    <a href="/entrepots" class="btn btn-outline-secondary me-2">
                        <i class="bi-arrow-left me-1"></i> Retour
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Formulaire -->
            <div class="col-lg-8">
                <form id="warehouseForm">
                    <!-- Informations de Base -->
                    <div class="form-section">
                        <div class="form-section-header">
                            <h5 class="mb-0 text-secondary-custom">
                                <i class="bi-info-circle-fill me-2"></i>
                                Informations de l'Entrepôt
                            </h5>
                        </div>
                        <div class="form-section-body">
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label for="warehouseName" class="form-label required-field">Nom de l'Entrepôt</label>
                                    <div class="position-relative">
                                        <i class="bi-building input-icon"></i>
                                        <input type="text" class="form-control form-control-lg has-icon" id="warehouseName" name="name"
                                            placeholder="Ex: Entrepôt Central, Dépôt Abidjan..." required>
                                    </div>
                                    <div class="form-text">Nom descriptif pour identifier facilement l'entrepôt</div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label for="warehouseAddress" class="form-label">Adresse Complète</label>
                                    <div class="position-relative">
                                        <i class="bi-geo-alt input-icon" style="top: 20px;"></i>
                                        <textarea class="form-control has-icon" id="warehouseAddress" name="adresse" rows="3"
                                            placeholder="Adresse complète de l'entrepôt..."></textarea>
                                    </div>
                                    <div class="form-text">Localisation précise pour les livraisons et inventaires</div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="warehouseStatus" class="form-label">Statut</label>
                                    <div class="position-relative">
                                        <i class="bi-toggle-on input-icon"></i>
                                        <select class="form-select form-select-lg has-icon" id="warehouseStatus" name="is_active">
                                            <option value="1" selected>Actif - Opérationnel</option>
                                            <option value="0">Inactif - Hors service</option>
                                        </select>
                                    </div>
                                    <div class="form-text">Un entrepôt inactif n'accepte pas de nouvelles entrées</div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="warehouseManager" class="form-label">Responsable</label>
                                    <div class="position-relative">
                                        <i class="bi-person-badge input-icon"></i>
                                        <select class="form-select form-select-lg has-icon" id="warehouseManager" name="user_id">
                                            <option value="">Aucun responsable assigné</option>
                                            <!-- Les utilisateurs seront chargés dynamiquement -->
                                        </select>
                                    </div>
                                    <div class="form-text">Gestionnaire principal de l'entrepôt</div>
                                </div>
                            </div>

                            <div class="info-box">
                                <small>
                                    <i class="bi-lightbulb-fill me-2"></i>
                                    <strong>Conseil :</strong> Le code de l'entrepôt sera généré automatiquement lors de la création. Choisissez un nom clair et unique pour faciliter l'identification.
                                </small>
                            </div>
                        </div>
                    </div>

                    <!-- Boutons d'Action -->
                    <div class="d-flex justify-content-between align-items-center mb-5">
                        <a href="/entrepots" class="btn btn-outline-secondary btn-lg">
                            <i class="bi-x-circle me-1"></i> Annuler
                        </a>

                        <button type="submit" class="btn btn-primary-custom btn-lg" id="submitBtn">
                            <i class="bi-check-circle me-1"></i> Créer l'Entrepôt
                        </button>
                    </div>
                </form>
            </div>

            <!-- Aperçu -->
            <div class="col-lg-4">
                <div class="position-sticky" style="top: 2rem;">
                    <!-- Aperçu en temps réel -->
                    <div class="form-section">
                        <div class="form-section-header">
                            <h6 class="mb-0 text-secondary-custom">
                                <i class="bi-eye me-2"></i>
                                Aperçu
                            </h6>
                        </div>
                        <div class="form-section-body">
                            <div class="preview-card">
                                <div class="warehouse-icon">
                                    <i class="bi-building fs-1 text-white"></i>
                                </div>
                                <h5 class="text-secondary-custom mb-2" id="previewName">Nouvel Entrepôt</h5>
                                <p class="text-muted small mb-3" id="previewAddress">Adresse non renseignée</p>
                                <div class="d-flex justify-content-center gap-2">
                                    <span class="badge bg-secondary" id="previewCode">Code: AUTO</span>
                                    <span class="badge" id="previewStatus">Actif</span>
                                </div>
                            </div>

                            <div class="mt-4">
                                <h6 class="text-secondary-custom mb-3">
                                    <i class="bi-info-circle me-2"></i>
                                    Informations
                                </h6>
                                <div class="small">
                                    <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                        <span class="text-muted">Responsable:</span>
                                        <span class="fw-semibold" id="previewManager">Non assigné</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-muted">Statut:</span>
                                        <span class="fw-semibold" id="previewStatusText">Actif</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Aide -->
                    <div class="card border-0 bg-light">
                        <div class="card-body">
                            <h6 class="card-title text-secondary-custom">
                                <i class="bi-question-circle me-2"></i>
                                Besoin d'aide ?
                            </h6>
                            <p class="card-text small">
                                Les entrepôts permettent de gérer vos stocks par localisation géographique.
                                Vous pourrez ensuite effectuer des transferts entre entrepôts et suivre les inventaires séparément.
                            </p>
                            <ul class="small mb-0">
                                <li>Un entrepôt actif accepte les entrées/sorties</li>
                                <li>Le code est unique et auto-généré</li>
                                <li>Le responsable reçoit les notifications</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    document.addEventListener('DOMContentLoaded', function() {
        // Charger la liste des utilisateurs pour le responsable
        loadUsers();

        // Aperçu en temps réel
        document.getElementById('warehouseName').addEventListener('input', updatePreview);
        document.getElementById('warehouseAddress').addEventListener('input', updatePreview);
        document.getElementById('warehouseStatus').addEventListener('change', updatePreview);
        document.getElementById('warehouseManager').addEventListener('change', updatePreview);

        // Soumission du formulaire
        document.getElementById('warehouseForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const submitBtn = document.getElementById('submitBtn');
            const originalBtnText = submitBtn.innerHTML;

            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Création en cours...';

            const formData = {
                name: document.getElementById('warehouseName').value.trim(),
                adresse: document.getElementById('warehouseAddress').value.trim() || null,
                is_active: document.getElementById('warehouseStatus').value === '1',
                user_id: document.getElementById('warehouseManager').value || null
            };

            try {
                const response = await fetch('https://toure.gestiem.com/api/entrepots', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(formData)
                });

                const result = await response.json();

                if (response.ok) {
                    showNotification('success', 'Entrepôt créé avec succès');
                    setTimeout(() => {
                        window.location.href = '/entrepots';
                    }, 1500);
                } else {
                    if (result.errors) {
                        let errorMsg = '<div class="mb-2"><strong>Erreurs de validation :</strong></div>';
                        Object.keys(result.errors).forEach(field => {
                            errorMsg += `<div class="mb-1">• ${result.errors[field].join('<br>• ')}</div>`;
                        });
                        showNotification('error', errorMsg);
                    } else {
                        showNotification('error', result.message || 'Erreur lors de la création de l\'entrepôt');
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
    });

    async function loadUsers() {
        try {
            // Cette route devra être disponible dans votre API
            const response = await fetch('https://toure.gestiem.com/api/users', {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            });

            if (response.ok) {
                const result = await response.json();
                const select = document.getElementById('warehouseManager');

                result.data.forEach(user => {
                    const option = document.createElement('option');
                    option.value = user.user_id;
                    option.textContent = user.name || `${user.firstname} ${user.lastname}`;
                    select.appendChild(option);
                });
            }
        } catch (error) {
            console.log('Impossible de charger la liste des utilisateurs');
        }
    }

    function updatePreview() {
        const name = document.getElementById('warehouseName').value || 'Nouvel Entrepôt';
        const address = document.getElementById('warehouseAddress').value || 'Adresse non renseignée';
        const isActive = document.getElementById('warehouseStatus').value === '1';
        const managerSelect = document.getElementById('warehouseManager');
        const managerName = managerSelect.options[managerSelect.selectedIndex].text;

        document.getElementById('previewName').textContent = name;
        document.getElementById('previewAddress').textContent = address;

        const statusBadge = document.getElementById('previewStatus');
        statusBadge.textContent = isActive ? 'Actif' : 'Inactif';
        statusBadge.className = `badge ${isActive ? 'bg-success' : 'bg-secondary'}`;

        document.getElementById('previewStatusText').textContent = isActive ? 'Actif' : 'Inactif';
        document.getElementById('previewManager').textContent = managerName;
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
</script>

<?php
$content = ob_get_clean();
require('./views/layouts/app-layout.php');
?>