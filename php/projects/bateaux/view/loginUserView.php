<div class="jumbotron text-center">
        <h2 class="card-title h2">Login</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 pb-2">
                <p class="blue-text my-4 font-weight-bold"></p>
            </div>
        </div>
    </div>

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
                <!-- E-mail -->
                <input name="email" type="email" id="defaultRegisterFormEmail" class="form-control" placeholder="Votre mail"
                    value="<?= $formIsSend ? $email : null ?>">
                <small id="formInfo" class="form-text text-muted"> Votre Email servira pour vous loger </small>

                <!-- Password -->
                <input name="password" type="password" id="defaultRegisterFormPassword" class="form-control"
                    placeholder="Mot de passe" aria-describedby="defaultRegisterFormPasswordHelpBlock">
                <small id="formInfo" class="form-text text-muted"> Au moins 3 caractères</small>

                <!-- Sign up button -->
                <button class="btn btn-info my-4 btn-block" type="submit">Se connecter</button>
            </form>
        </div>
</div>