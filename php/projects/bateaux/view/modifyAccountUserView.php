<!-- FORMULAIRE D'INSCRIPTION -->
<div class="jumbotron text-center">
    <h2 class="card-title h2">Modification du compte</h2>
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 pb-2">
            <p class="blue-text my-4 font-weight-bold">Merci de remplir le formulaire</p>
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

    <div class="row" id="registerForm">

        <form class="text-center border border-light p-5" method="POST" action="#" style="width: 50rem;">

            <div> 1. Informations personnelles </div>
            <!-- First name -->
            <input name="name" type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="Votre pseudo"
                value="<?=$userInfo['user_name']?>">
            <small id="formInfo" class="form-text text-muted"> Lettres et chiffres seulement </small>

            <!-- E-mail -->
            <input name="email" type="email" id="defaultRegisterFormEmail" class="form-control" placeholder="Votre mail"
                value="<?=$userInfo['user_email']?>">
            <small id="formInfo" class="form-text text-muted"> Votre Email sert pour vous logger </small>

            <br>
            <hr>
            <br>

            <!-- Newsletter -->
            <div> 2. Abonnement News Letter</div>
            <!-- Group of default radios - option 1 -->
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="defaultGroupExample1" name="newsLetter" value="yes">
                <label class="custom-control-label" for="defaultGroupExample1">Je souhaite recevoir la News Letter</label>
            </div>

            <!-- Group of default radios - option 2 -->
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="defaultGroupExample2" name="newsLetter" value="no">
                <label class="custom-control-label" for="defaultGroupExample2">Je ne souhaite pas recevoir la News
                    Letter</label>
            </div>

            <!-- Sign up button -->
            <button class="btn btn-info my-4 btn-block" type="submit">Modifier ses informations personnelles</button>

        </form>
    </div>
</div>