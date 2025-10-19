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

    .form-section {
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
        border-left: 4px solid var(--primary-color);
    }

    .form-section-header {
        background-color: var(--light-primary);
        padding: 1rem 1.5rem;
        border-radius: 10px 10px 0 0;
        border-bottom: 1px solid #e9ecef;
    }

    .form-section-body {
        padding: 2rem;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(240, 4, 128, 0.25);
    }

    .required-field::after {
        content: " *";
        color: var(--primary-color);
    }

    /* Icon Selection */
    .icon-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));
        gap: 1rem;
        margin-top: 1rem;
    }

    .icon-option {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 1rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .icon-option:hover {
        border-color: var(--primary-color);
        background-color: var(--light-primary);
        transform: translateY(-2px);
    }

    .icon-option.selected {
        border-color: var(--primary-color);
        background-color: var(--light-primary);
        box-shadow: 0 4px 15px rgba(240, 4, 128, 0.2);
    }

    .icon-option i {
        font-size: 2rem;
        color: var(--secondary-color);
    }

    .icon-option.selected i {
        color: var(--primary-color);
    }

    .icon-option span {
        display: block;
        font-size: 0.75rem;
        margin-top: 0.5rem;
        color: #6c757d;
    }

    /* Color Picker */
    .color-options {
        display: flex;
        gap: 1rem;
        margin-top: 1rem;
    }

    .color-option {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        cursor: pointer;
        border: 3px solid transparent;
        transition: all 0.3s ease;
    }

    .color-option:hover {
        transform: scale(1.1);
    }

    .color-option.selected {
        border-color: var(--secondary-color);
        box-shadow: 0 0 0 3px rgba(1, 7, 104, 0.2);
    }

    /* Preview Card */
    .category-preview {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 2rem;
        text-align: center;
        background: linear-gradient(135deg, var(--light-primary) 0%, white 100%);
    }

    .preview-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        background-color: var(--secondary-color);
    }

    .preview-icon i {
        font-size: 2.5rem;
        color: white;
    }

    .info-box {
        background-color: #f8f9fa;
        border-left: 4px solid #17a2b8;
        padding: 1rem;
        border-radius: 5px;
        margin-top: 1rem;
    }

    /* Loading Spinner */
    .spinner-border-sm {
        width: 1rem;
        height: 1rem;
        border-width: 0.15rem;
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
                            <li class="breadcrumb-item"><a href="dashboard.php" class="text-primary-custom">Tableau de Bord</a></li>
                            <li class="breadcrumb-item"><a href="product-categories.php" class="text-primary-custom">Catégories</a></li>
                            <li class="breadcrumb-item active">Nouvelle Catégorie</li>
                        </ol>
                    </nav>
                    <h1 class="page-header-title text-secondary-custom">
                        <i class="bi-grid-3x3-gap me-2"></i>
                        Créer une Nouvelle Catégorie
                    </h1>
                    <p class="text-muted mb-0">Organisez vos produits par catégorie</p>
                </div>
                <div class="col-auto">
                    <a href="product-categories.php" class="btn btn-outline-secondary me-2">
                        <i class="bi-arrow-left me-1"></i> Retour
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Formulaire -->
            <div class="col-lg-8">
                <form id="categoryForm">
                    <!-- Informations de Base -->
                    <div class="form-section">
                        <div class="form-section-header">
                            <h5 class="mb-0 text-secondary-custom">
                                <i class="bi-info-circle me-2"></i>
                                Informations de la Catégorie
                            </h5>
                        </div>
                        <div class="form-section-body">
                            <div class="mb-4">
                                <label for="categoryLabel" class="form-label required-field">Nom de la Catégorie</label>
                                <input type="text" class="form-control form-control-lg" id="categoryLabel" name="label"
                                    placeholder="Ex: RIZ, SUCRE, FARINE..." required>
                                <div class="form-text">Nom court et descriptif de la catégorie</div>
                            </div>

                            <div class="mb-4">
                                <label for="categoryDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="categoryDescription" name="description" rows="4"
                                    placeholder="Description détaillée de la catégorie et des produits qu'elle contient..."></textarea>
                                <div class="form-text">Informations complémentaires (optionnel)</div>
                            </div>

                            <div class="mb-4">
                                <label for="categoryStatus" class="form-label">Statut</label>
                                <select class="form-select" id="categoryStatus" name="is_active">
                                    <option value="1" selected>Active - Visible dans le système</option>
                                    <option value="0">Inactive - Masquée temporairement</option>
                                </select>
                                <div class="form-text">Une catégorie inactive n'apparaît pas dans les listes de sélection</div>
                            </div>

                            <div class="info-box">
                                <small class="text-info">
                                    <i class="bi-lightbulb me-1"></i>
                                    <strong>Conseil :</strong> Choisissez un nom clair et concis. Les catégories existantes incluent : RIZ, SUCRE, FARINE, LAIT, HUILE, DIVERS, DEGILARE
                                </small>
                            </div>
                        </div>
                    </div>

                    <!-- Sélection d'icône (optionnel mais pour l'UX) -->
                    <div class="form-section">
                        <div class="form-section-header">
                            <h5 class="mb-0 text-secondary-custom">
                                <i class="bi-palette me-2"></i>
                                Personnalisation (Optionnel)
                            </h5>
                        </div>
                        <div class="form-section-body">
                            <label class="form-label">Icône de la catégorie</label>
                            <div class="icon-grid">
                                <div class="icon-option" data-icon="basket">
                                    <i class="bi-basket"></i>
                                    <span>Panier</span>
                                </div>
                                <div class="icon-option" data-icon="box">
                                    <i class="bi-box"></i>
                                    <span>Boîte</span>
                                </div>
                                <div class="icon-option" data-icon="cup-straw">
                                    <i class="bi-cup-straw"></i>
                                    <span>Boisson</span>
                                </div>
                                <div class="icon-option" data-icon="egg">
                                    <i class="bi-egg"></i>
                                    <span>Œuf</span>
                                </div>
                                <div class="icon-option" data-icon="droplet">
                                    <i class="bi-droplet"></i>
                                    <span>Liquide</span>
                                </div>
                                <div class="icon-option" data-icon="moisture">
                                    <i class="bi-moisture"></i>
                                    <span>Huile</span>
                                </div>
                                <div class="icon-option" data-icon="gift">
                                    <i class="bi-gift"></i>
                                    <span>Cadeau</span>
                                </div>
                                <div class="icon-option selected" data-icon="grid">
                                    <i class="bi-grid"></i>
                                    <span>Défaut</span>
                                </div>
                            </div>
                            <input type="hidden" id="selectedIcon" name="icon" value="grid">

                            <div class="mt-4">
                                <label class="form-label">Couleur de la catégorie</label>
                                <div class="color-options">
                                    <div class="color-option" data-color="#f00480" style="background-color: #f00480;" title="Rose"></div>
                                    <div class="color-option" data-color="#010768" style="background-color: #010768;" title="Bleu foncé"></div>
                                    <div class="color-option selected" data-color="#010068" style="background-color: #010068;" title="Bleu nuit"></div>
                                    <div class="color-option" data-color="#17a2b8" style="background-color: #17a2b8;" title="Cyan"></div>
                                    <div class="color-option" data-color="#28a745" style="background-color: #28a745;" title="Vert"></div>
                                    <div class="color-option" data-color="#ffc107" style="background-color: #ffc107;" title="Jaune"></div>
                                    <div class="color-option" data-color="#fd7e14" style="background-color: #fd7e14;" title="Orange"></div>
                                    <div class="color-option" data-color="#6f42c1" style="background-color: #6f42c1;" title="Violet"></div>
                                </div>
                                <input type="hidden" id="selectedColor" name="color" value="#010068">
                            </div>

                            <div class="form-text mt-2">
                                <i class="bi-info-circle me-1"></i>
                                Ces paramètres visuels aident à identifier rapidement les catégories dans l'interface
                            </div>
                        </div>
                    </div>

                    <!-- Boutons d'Action -->
                    <div class="d-flex justify-content-between align-items-center mb-5">
                        <a href="product-categories.php" class="btn btn-outline-secondary">
                            <i class="bi-x-circle me-1"></i> Annuler
                        </a>

                        <button type="submit" class="btn btn-primary-custom" id="submitBtn">
                            <i class="bi-check-circle me-1"></i> Créer la Catégorie
                        </button>
                    </div>
                </form>
            </div>

            <!-- Aperçu en temps réel -->
            <div class="col-lg-4">
                <div class="position-sticky" style="top: 2rem;">
                    <div class="form-section">
                        <div class="form-section-header">
                            <h6 class="mb-0 text-secondary-custom">
                                <i class="bi-eye me-2"></i>
                                Aperçu
                            </h6>
                        </div>
                        <div class="form-section-body">
                            <div class="category-preview" id="categoryPreview">
                                <div class="preview-icon" id="previewIcon">
                                    <i class="bi-grid"></i>
                                </div>
                                <h4 class="text-secondary-custom mb-2" id="previewLabel">Nouvelle Catégorie</h4>
                                <p class="text-muted mb-3" id="previewDescription">Description de la catégorie</p>
                                <span class="badge bg-success" id="previewStatus">Active</span>
                            </div>

                            <div class="mt-4">
                                <h6 class="text-secondary-custom mb-3">Catégories Existantes</h6>
                                <div class="d-flex flex-wrap gap-2">
                                    <span class="badge bg-secondary">RIZ</span>
                                    <span class="badge bg-secondary">SUCRE</span>
                                    <span class="badge bg-secondary">FARINE</span>
                                    <span class="badge bg-secondary">LAIT</span>
                                    <span class="badge bg-secondary">HUILE</span>
                                    <span class="badge bg-secondary">DIVERS</span>
                                    <span class="badge bg-secondary">DEGILARE</span>
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
                                Les catégories permettent d'organiser vos produits de manière logique.
                                Créez des catégories claires pour faciliter la navigation et la gestion de votre inventaire.
                            </p>
                            <a href="#" class="btn btn-sm btn-outline-primary">
                                <i class="bi-book me-1"></i> Guide d'utilisation
                            </a>
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
        const form = document.getElementById('categoryForm');
        const labelInput = document.getElementById('categoryLabel');
        const descriptionInput = document.getElementById('categoryDescription');
        const statusSelect = document.getElementById('categoryStatus');

        // Aperçu en temps réel
        labelInput.addEventListener('input', updatePreview);
        descriptionInput.addEventListener('input', updatePreview);
        statusSelect.addEventListener('change', updatePreview);

        // Sélection d'icône
        const iconOptions = document.querySelectorAll('.icon-option');
        const selectedIconInput = document.getElementById('selectedIcon');
        const previewIcon = document.getElementById('previewIcon');

        iconOptions.forEach(option => {
            option.addEventListener('click', function() {
                iconOptions.forEach(opt => opt.classList.remove('selected'));
                this.classList.add('selected');
                const icon = this.dataset.icon;
                selectedIconInput.value = icon;
                previewIcon.innerHTML = `<i class="bi-${icon}"></i>`;
            });
        });

        // Sélection de couleur
        const colorOptions = document.querySelectorAll('.color-option');
        const selectedColorInput = document.getElementById('selectedColor');

        colorOptions.forEach(option => {
            option.addEventListener('click', function() {
                colorOptions.forEach(opt => opt.classList.remove('selected'));
                this.classList.add('selected');
                const color = this.dataset.color;
                selectedColorInput.value = color;
                previewIcon.style.backgroundColor = color;
            });
        });

        // Soumission du formulaire
        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            const submitBtn = document.getElementById('submitBtn');
            const originalBtnText = submitBtn.innerHTML;

            // Désactiver le bouton et afficher le loader
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Création...';

            // Préparer les données
            const formData = {
                label: labelInput.value.trim(),
                description: descriptionInput.value.trim() || null,
                is_active: statusSelect.value === '1'
            };

            try {
                const response = await fetch('https://toure.gestiem.com/api/product-categories', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(formData)
                });

                const result = await response.json();

                if (response.ok) {
                    // Succès
                    showNotification('success', 'Catégorie créée avec succès');

                    // Réinitialiser le formulaire
                    form.reset();
                    updatePreview();

                    // Redirection après 2 secondes
                    setTimeout(() => {
                        window.location.href = '/categories-produits-liste';
                    }, 2000);
                } else {
                    // Erreur
                    if (result.errors) {
                        let errorMsg = 'Erreurs de validation:\n';
                        Object.keys(result.errors).forEach(field => {
                            errorMsg += `\n• ${result.errors[field].join('\n• ')}`;
                        });
                        showNotification('error', errorMsg);
                    } else {
                        showNotification('error', result.message || 'Erreur lors de la création de la catégorie');
                    }

                    // Réactiver le bouton
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnText;
                }
            } catch (error) {
                showNotification('error', 'Erreur de connexion au serveur');
                console.error('Error:', error);

                // Réactiver le bouton
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
            }
        });

        // Validation en temps réel
        labelInput.addEventListener('blur', function() {
            if (this.value.trim().length < 2) {
                this.classList.add('is-invalid');
            } else {
                this.classList.remove('is-invalid');
            }
        });
    });

    function updatePreview() {
        const label = document.getElementById('categoryLabel').value || 'Nouvelle Catégorie';
        const description = document.getElementById('categoryDescription').value || 'Description de la catégorie';
        const isActive = document.getElementById('categoryStatus').value === '1';

        document.getElementById('previewLabel').textContent = label;
        document.getElementById('previewDescription').textContent = description;

        const statusBadge = document.getElementById('previewStatus');
        if (isActive) {
            statusBadge.className = 'badge bg-success';
            statusBadge.textContent = 'Active';
        } else {
            statusBadge.className = 'badge bg-secondary';
            statusBadge.textContent = 'Inactive';
        }
    }

    function showNotification(type, message) {
        const toast = document.createElement('div');
        toast.className = `alert alert-${type === 'success' ? 'success' : 'danger'} position-fixed top-0 end-0 m-3`;
        toast.style.zIndex = '9999';
        toast.style.minWidth = '300px';
        toast.style.maxWidth = '500px';

        const icon = type === 'success' ? 'check-circle' : 'exclamation-triangle';
        toast.innerHTML = `
        <div class="d-flex align-items-center">
            <i class="bi-${icon} me-2"></i>
            <div>${message}</div>
        </div>
    `;

        document.body.appendChild(toast);

        // Animation d'entrée
        setTimeout(() => {
            toast.style.opacity = '1';
        }, 10);

        // Suppression après 4 secondes
        setTimeout(() => {
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 300);
        }, 4000);
    }

    // Protection contre la perte de données - Désactivée après soumission
    let formModified = false;
    let formSubmitted = false;
    
    document.getElementById('categoryForm').addEventListener('input', function() {
        if (!formSubmitted) {
            formModified = true;
        }
    });

    // Marquer le formulaire comme soumis lors de la soumission
    document.getElementById('categoryForm').addEventListener('submit', function() {
        formSubmitted = true;
        formModified = false;
    });

    window.addEventListener('beforeunload', function(e) {
        if (formModified && !formSubmitted) {
            e.preventDefault();
            e.returnValue = '';
        }
    });
</script>

<?php
$content = ob_get_clean();
require('./views/layouts/app-layout.php');
?>