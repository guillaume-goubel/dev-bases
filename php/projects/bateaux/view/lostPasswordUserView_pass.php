<div class="jumbotron text-center">
    <h2 class="card-title h2">Reinitialisation du mot de passe</h2>
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
</div>


<div class="container">
    <div class="row" id="registerForm">
        <form class="text-center border border-light p-5" method="POST" action="#" style="width: 50rem;">
            <!-- 
            <input name="password" type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Mot de passe actuel"
                aria-describedby="defaultRegisterFormPasswordHelpBlock">
            <small id="formInfo" class="form-text text-muted"> Votre mot de passe utilisé actuellement</small> Password -->

            <!-- New Password -->
            <input name="NewPassword" type="password" class="form-control" placeholder="Nouveau mot de passe"
                aria-describedby="defaultRegisterFormPasswordHelpBlock">
            <small id="formInfo" class="form-text text-muted"> Au moins 3 caractères</small>

            <!-- Vérif Password -->
            <input name="NewPasswordVerif" type="password" class="form-control" placeholder="Vérification du nouveau mot de passe"
                aria-describedby="defaultRegisterFormPasswordHelpBlock">
            <small id="formInfo" class="form-text text-muted"></small>

            <!-- Sign up button -->
            <button id="btnPass" class="btn btn-info" type="submit">Modifier son mot de passe</button>
        </form>
    </div>
</div>

