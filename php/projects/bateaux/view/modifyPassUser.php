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

            <div> 2. Changement de password </div>

            <!-- Code pour changer password -->


            <input name="password" type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Code de changement de mail"
            aria-describedby="defaultRegisterFormPasswordHelpBlock">
            <small id="formInfo" class="form-text text-muted"> Inscrire le code reçu par mail</small>

            <!-- Password -->
            <input name="password" type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Mot de passe actuel"
                aria-describedby="defaultRegisterFormPasswordHelpBlock">
            <small id="formInfo" class="form-text text-muted"> Votre mot de passe utilisé actuellement</small>

            <!-- Vérif Password -->
            <input name="NewPassword" type="password"  class="form-control"
                placeholder="Nouveau mot de passe" aria-describedby="defaultRegisterFormPasswordHelpBlock">
            <small id="formInfo" class="form-text text-muted"> Au moins 3 caractères</small>

            <!-- Vérif Password -->
            <input name="NewVerifPassword" type="password"  class="form-control"
                placeholder="Vérification du nouveau mot de passe" aria-describedby="defaultRegisterFormPasswordHelpBlock">
            <small id="formInfo" class="form-text text-muted"></small>

            <!-- Sign up button -->
            <button class="btn btn-info my-4 btn-block" type="submit">Modifier son compte</button>

        </form>
    </div>
</div>