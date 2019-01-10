<!-- Jumbotron -->
<div class="jumbotron text-center">
    <h2 class="card-title h2">Création de compte</h2>
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 pb-2">
            <p class="blue-text my-4 font-weight-bold">Merci de remplir le formulaire</p>
        </div>
    </div>
</div>

<!-- START Default form register -->
<div class="container">

    <!-- MODAL ERRORS -->
    <div id="errorsContainer-<?= !empty($errorsArray) ? 'actived' : 'default' ?>" class="container">
        <div class="modal-dialog modal-frame modal-bottom" role="document">
            <div class="modal-content">
                <div class="modal-body" id="errorsModal">
                    <div class="row d-flex justify-content-center align-items-center">
                        <?php foreach ($errorsArray as $key => $error) {echo $error. "<br>";} ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FORMULAIRE D'INSCRIPTION -->
    <div class="row" id="registerForm">

        <form class="text-center border border-light p-5" method="POST" action="#">

            <!-- First name -->
            <input name="name" type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="Votre pseudo"
                value="<?= $formIsSend ? $name : null ?>">
            <small id="formInfo" class="form-text text-muted"> Lettres et chiffres seulement </small>

            <!-- E-mail -->
            <input name="email" type="email" id="defaultRegisterFormEmail" class="form-control" placeholder="Votre mail"
                value="<?= $formIsSend ? $email : null ?>">
            <small id="formInfo" class="form-text text-muted"> Votre Email servira pour vous loger </small>

            <!-- Password -->
            <input name="password" type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Mot de passe"
                aria-describedby="defaultRegisterFormPasswordHelpBlock">
            <small id="formInfo" class="form-text text-muted"> Au moins 3 caractères</small>

            <!-- Vérif Password -->
            <input name="verifPassword" type="password" id="defaultVerifierFormPassword" class="form-control"
                placeholder="Vérification du mot de passe" aria-describedby="defaultRegisterFormPasswordHelpBlock">
            <small id="formInfo" class="form-text text-muted"></small>

            <!-- Newsletter -->
            <div class="custom-control custom-checkbox">
                <input name="newsLetter" type="checkbox" class="custom-control-input" id="defaultRegisterFormNewsletter"
                    <?=isset($_POST['newsLetter']) ? 'checked' : null ?>>

                <label class="custom-control-label" for="defaultRegisterFormNewsletter">Souscrire à notre Newsletter</label>
            </div>

            <hr>

            <!-- Recpatcha -->
            <div class="g-recaptcha" data-sitekey="6LdOSogUAAAAADZjoXxsS5pejF-ZogcLZ7h7IS8P"></div>

            <!-- Sign up button -->
            <button class="btn btn-info my-4 btn-block" type="submit">Créer son compte</button>

            <!-- Terms of service -->
            <p>By clicking
                <em>Créer son compte</em> you agree to our
                <a href="" target="_blank">terms of service</a>
        </form>
    </div>
</div>
<!-- END Default form register -->