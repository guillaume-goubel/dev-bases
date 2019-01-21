<!-- FORMULAIRE MODIFICATION -->
<div class="jumbotron text-center">
    <h2 class="card-title h2">Reinitialisation du mot de passe</h2>

    <div class="container" id="stepsContainer">
        <ul class="steps">
            <!-- en fonction des états de variables de sessions , les étapes sont rouges ou grises-->
            <li class="step etape1">
                <span class="stepNumber<?= isset($_SESSION['Step1']) ? "-disabled" : "-enabled" ?>">1</span>Renseignement de votre mail
            </li>
        </ul>
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
</div>

<?php if(!isset($_SESSION['Step1'])): ?>

<div class="container">
    <div class="row" id="registerForm">
        <form class="text-center border border-light p-5" method="POST" action="#" style="width: 50rem;">
            <input name="email" type="email" id="email" class="form-control" placeholder="Votre adresse mail">            
            <label for="mailChangePass">Renseigner votre adresse mail lié à votre compte</label><br>
            <!-- Sign up button -->
            <button id="btnCode" class="btn btn-deep-purple btn-sm" type="submit">Valider</button>
        </form>
    </div>
</div>

<?php endif; ?>


<?php if(isset($_SESSION['Step1'])): ?>

<div class="container">
    <div class="row" id="registerForm">
            Merci de suivre les indications envoyées sur votre adresse liée à votre compte
    </div>
</div>

<?php endif; ?>