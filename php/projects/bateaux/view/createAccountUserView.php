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

        <form class="text-center border border-light p-5 needs-validation" method="POST" action="#" validate>

            <!-- First name -->
            <input name="name" type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="Votre pseudo"
                value="<?= $formIsSend ? $name : null ?>" >
            <small id="formInfo" class="form-text text-muted"> Lettres et chiffres seulement </small>

            <!-- E-mail -->
            <input name="email" type="email" id="defaultRegisterFormEmail" class="form-control" placeholder="Votre mail"
                value="<?= $formIsSend ? $email : null ?>" >
            <small id="formInfo" class="form-text text-muted"> Votre Email servira pour vous logger </small>

            <!-- Password -->
            <input name="password" type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Mot de passe"
                aria-describedby="defaultRegisterFormPasswordHelpBlock"  >
            <small id="formInfo" class="form-text text-muted"> Au moins 3 caractères</small>

            <!-- Vérif Password -->
            <input name="verifPassword" type="password" id="defaultVerifierFormPassword" class="form-control"
                placeholder="Vérification du mot de passe" aria-describedby="defaultRegisterFormPasswordHelpBlock" >
            <small id="formInfo" class="form-text text-muted"></small>

            <!-- Newsletter -->
            <div class="custom-control custom-checkbox">
                <input name="newsLetter" type="checkbox" class="custom-control-input" id="defaultRegisterFormNewsletter"
                    <?=isset($_POST['newsLetter']) ? 'checked' : null ?>>
                <label class="custom-control-label" for="defaultRegisterFormNewsletter">Souscrire à notre Newsletter ?</label>
            </div>

            <div class="custom-control custom-checkbox">
                <input name="rememberMe" type="checkbox" class="custom-control-input" id="defaultRegisterFormRemember">
                <label class="custom-control-label" for="defaultRegisterFormRemember">Se souvenir de moi ?</label>
            </div>

            <br>
            <hr>

            <!-- Captcha MY -->
            <div>
                <img src="captcha.php" style="margin-bottom:5px;" alt="">
                <input maxlength="4"  name="captcha" type="text" class="form-control" placeholder="Mettre le code de validation ici" > 
                <small id="formInfo" class="form-text text-muted"> Code à 4 chiffres anti-spam </small>
            </div>

            <!-- Sign up button -->
            <button class="btn btn-info" type="submit" style="margin-bottom:20px;">Créer son compte</button>

            <!-- Terms of service -->
            <p>En validant vous
                <em>Créer un compte</em> en accord avec les 
                <a href="" target="_blank">termes du service</a></p>
        </form>
    </div>
</div>
<!-- END Default form register -->