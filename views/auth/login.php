<?php ob_start(); ?>

<!-- ========== HEADER ========== -->
<header class="position-absolute top-0 start-0 end-0 mt-3 mx-3">
    <div class="d-flex d-lg-none justify-content-between">
        <a href="/">
            <img class="w-100" src="/assets/svg/logos/logo.png" alt="Logo" style="min-width: 7rem; max-width: 7rem;">
        </a>

        <!-- Select -->
        <div class="tom-select-custom tom-select-custom-end zi-2">
            <select class="js-select form-select form-select-sm form-select-borderless" data-hs-tom-select-options='{
                  "searchInDropdown": false,
                  "hideSearch": true,
                  "dropdownWidth": "12rem",
                  "placeholder": "Pays"
                }'>
                <option label="empty"></option>
                <option value="language1"
                    data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle me-2" src="/assets/vendor/flag-icon-css/flags/1x1/bj.svg" width="16"/><span>Benin (BJ)</span></span>'>
                    Benin (BJ)</option>
                <option value="language2" selected
                    data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle me-2" src="/assets/vendor/flag-icon-css/flags/1x1/bj.svg" width="16"/><span>Benin (BJ)</span></span>'>
                    Benin (BJ)</option>
            </select>
        </div>
        <!-- End Select -->
    </div>
</header>
<!-- ========== END HEADER ========== -->

<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main" class="main pt-0">
    <div class="container-fluid" style="padding-left: 12px; padding-right:12px;">
        <div class="row">
            <!-- Côté illustration -->
            <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center min-vh-lg-100 position-relative px-0" style="background-color: #010768;">
                <div style="max-width: 23rem;" class="text-center text-white">
                    <div class="mb-5">
                        <img class="img-fluid" src="/assets/svg/illustrations-light/login-page.png" alt="Illustration" style="width: 25rem;">
                    </div>

                    <div class="mb-5">
                        <h2 class="display-5 text-white">Gérez toute votre distribution en un seul espace :</h2>
                    </div>

                    <ul class="list-checked list-checked-lg list-checked-primary list-py-2">
                        <li class="list-checked-item text-white">
                            <span class="d-block fw-semibold mb-1">Suivez et contrôlez facilement</span>
                            Vos stocks, ventes, achats et fournisseurs en temps réel.
                        </li>
                        <li class="list-checked-item text-white">
                            <span class="d-block fw-semibold mb-1">Simplifiez votre gestion</span>
                            Avec la facturation, la comptabilité, la trésorerie et les rapports financiers automatisés.
                        </li>
                        <li class="list-checked-item text-white">
                            <span class="d-block fw-semibold mb-1">Optimisez vos performances</span>
                            Grâce à une plateforme unique, moderne et adaptée à vos besoins.
                        </li>
                    </ul>



                </div>
            </div>
            <!-- End illustration -->


            <!-- Côté formulaire -->
            <div class="col-lg-6 d-flex justify-content-center align-items-center min-vh-lg-100"
                style="background-color: #ffffff;">
                <div class="w-100 content-space-t-4 content-space-t-lg-2 content-space-b-1" style="max-width: 25rem;">

                    <!-- Logo au-dessus du formulaire -->
                    <div class="text-center mb-4">
                        <a href="/">
                            <img src="/assets/svg/logos/logo.png" alt="Logo" style="max-width: 8rem;">
                        </a>
                    </div>

                    <!-- Form -->
                    <form action="/login" method="POST" novalidate>
                        <div class="text-center mb-5">
                            <h1 class="display-5" style="color: #010068;">Connexion</h1>
                            <p>Vous n'avez pas de compte? <a class="link" href="/register" style="color: #f00480;">Créer
                                    un compte</a></p>
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label class="form-label" for="signinSrEmail">Votre adresse mail</label>
                            <input type="email" class="form-control form-control-lg" name="email" id="signinSrEmail"
                                placeholder="email@address.com" required style="border-color: #010068;">
                            <span class="invalid-feedback">Veuillez entrer une adresse mail valide.</span>
                        </div>

                        <!-- Mot de passe -->
                        <div class="mb-4">
                            <label class="form-label w-100" for="signupSrPassword">
                                <span class="d-flex justify-content-between align-items-center">
                                    <span>Mot de passe</span>
                                    <a class="form-label-link mb-0" href="/forgot-password" style="color: #f00480;">Mot
                                        de passe oublié</a>
                                </span>
                            </label>
                            <div class="input-group input-group-merge">
                                <input type="password" class="js-toggle-password form-control form-control-lg"
                                    name="password" id="signupSrPassword" placeholder="8 caractères minimum" required
                                    minlength="8" style="border-color: #010068;">
                                <a id="changePassTarget" class="input-group-append input-group-text"
                                    href="javascript:;">
                                    <i id="changePassIcon" class="bi-eye" style="color: #010068;"></i>
                                </a>
                            </div>
                            <span class="invalid-feedback">Veuillez entrer un mot de passe valide.</span>
                        </div>

                        <!-- Checkbox -->
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" value="" id="termsCheckbox"
                                style="border-color: #010068;">
                            <label class="form-check-label" for="termsCheckbox">Se souvenir de moi</label>
                        </div>

                        <!-- Bouton -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-lg"
                                style="background-color: #f00480; border-color: #f00480; color: #ffffff;">
                                Connexion
                            </button>
                        </div>
                    </form>
                    <!-- End Form -->

                </div>
            </div>
            <!-- End formulaire -->

        </div>
        <!-- End Row -->
    </div>
    <!-- End Content -->
</main>
<!-- ========== END MAIN CONTENT ========== -->

<?php
$content = ob_get_clean();
require('./views/layouts/auth-layout.php');
?>