<!-- FORMULAIRE MODIFICATION -->
<div class="jumbotron text-center">
    <h2 class="card-title h2">Modification du mot de passe</h2>

    <div class="container" id="stepsContainer">
        <ul class="steps">
            <li class="step etape1 active">
                <span class="stepNumber">1</span>Envoi de la demande par mail
            </li>
            <li class="step etape2">
                <span class="stepNumber">2</span>Inscription du code secret
            </li>
            <li class="step etape3">
                <span class="stepNumber">3</span>Changement du mot de passe
            </li>
        </ul>
    </div>


    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 pb-2">

            <?php if(isset($_SESSION['Step1'])): ?>
            <a href="ReSendMail.php">Vous n'avez pas reçu votre mail ?</a>
            <?php endif; ?>

        </div>
    </div>
</div>

<?php if(!isset($_SESSION['Step1']) && !isset($_SESSION['Step2']) && !isset($_SESSION['Step3']) ): ?>
<div class="container">
    <div class="row" id="registerForm">
        <form id="formCheckSendMail" class="text-center border border-light p-5" method="POST" action="#" style="width: 50rem;">
            <div class="custom-control custom-checkbox">
                <input name="demandChangePass" type="checkbox" class="custom-control-input" id="checkSendMail">
                <label class="custom-control-label" for="checkSendMail">Je souhaite changer mon mot de
                    passe</label>
                <small id="formInfo" class="form-text text-muted"> un code va être envoyé sur votre mail</small>
            </div>

            <!-- Sign up button -->
            <button id="btnMail" class="btn btn-dark btn-sm" type="submit">Valider l'envoi sur votre mail</button>
        </form>
    </div>
</div>
<?php endif; ?>


<?php if(isset($_SESSION['Step1']) && !isset($_SESSION['Step2']) && !isset($_SESSION['Step3']) ): ?>
<div class="container">
    <div class="row" id="registerForm">
        <form class="text-center border border-light p-5" method="POST" action="#" style="width: 50rem;">

            <input name="CodeIsTest" type="text" id="defaultRegisterFormPassword" class="form-control" placeholder="Code de changement de mail"
                aria-describedby="defaultRegisterFormPasswordHelpBlock">
            <small id="formInfo" class="form-text text-muted"> Inscrire le code reçu par mail</small>

            <!-- Sign up button -->
            <button id="btnCode" class="btn btn-dark btn-sm" type="submit">Vérification du code</button>
        </form>

    </div>
</div>
<?php endif; ?>

<?php if(isset($_SESSION['Step1']) && isset($_SESSION['Step2']) && !isset($_SESSION['Step3'])): ?>
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
<?php endif; ?>

<?php 
unset($_SESSION['Step1']);
unset($_SESSION['Step2']);
unset($_SESSION['Step3']);