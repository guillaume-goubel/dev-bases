<?php 
require_once __DIR__.'/partials/header.php';

/****************************************
 * VARIABLES
 *****************************************/
// variable dans le formulaire d'inscription
$name = $email = $password = $verifPassword = null;

// l'abonnement est par défaut 0 , soit faux (boolean)
$confirmationToNewsLetter = 0;
// le role par défaut des users (role admin est à créer dans la Bdd)
$role = "user";

/*******************************************************************
 * CHECK DES ETAPES DE LA VERIFICATION ET VALIDATION DU FORMULAIRE
********************************************************************/
//vérification si fortmulaire envoyé
$formIsSend = false;
//Tableau d'erreurs lors de la vérification du formulaire
$errorsArray = [];

//vérification formulaire complet avant enregistrement et les vérifications ci-dessous
$formIsValid = false;

//vérification pas de doublon de mail dans Bdd
$emailIsAvailable = false;

//envoi mail confirmation de création de compte à utilisateur
$mailToSend = false;

//message de confirmation affiché à utilisateur , si vrai , on lui indique le succe de son inscritopn
$confirmationToSchow = false;


/*******************************************************************
 * ETAPES DU FORMULAIRE
********************************************************************/
if(!empty($_POST)){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verifPassword =  $_POST['verifPassword'];
}

// $confirmNewsLetter existe seulement si la check box a été checké
if (isset($_POST['newsLetter'])){
    $confirmNewsLetter = $_POST['newsLetter'];
}

//Si le formualire a été envoyé ,on peut le vérifier
if(isset($name, $email, $password, $verifPassword  )){
    $formIsSend = true;
}

// Vérification de l'envoi complet du formulaire
if($formIsSend){

    $formIsValid = true;

    if(empty($name)){
        $formIsValid = false;
        $errorsArray['nameLack'] = "Il manque le nom";  
    }

    if(empty($email)){
        $formIsValid = false;
        $errorsArray['email'] = "Il manque l'email";  
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !isset($errorsArray['email'])){
        $formIsValid = false;
        $errorsArray['emailFalse'] = "L'email n'est pas valide";  
    }

    if(strlen($password)<3){
        $formIsValid = false;
        $errorsArray['nameLengh'] = "Le passeword doit contenir au moins 3 caratères";  
    }

    if($password != $verifPassword) {
        $formIsValid = false;
        $errorsArray['verifPassword'] = "Le password n'est pas identique au pass envoyé";  
    }

    // Vérification de la disponibilité de l'email SI LE MAIL A ETE REMPLI PAR L'UTILISATEUR !
    if(!empty($email)){
        
        $emailIsAvailable = true;
    
        $querySql = 'SELECT user_email FROM `users`
                    WHERE user_email = :user_email';
    
        $query =  $db -> prepare($querySql);
        $query -> bindValue(':user_email', $email, PDO::PARAM_STR );
    
        $query -> execute();
        $count = $query->rowCount(); 
       
        if($count === 1 && !isset($errorsArray['email'])) 
        { 
        // Mail déjà utilisé 
        $formIsValid = false;
        $emailIsAvailable = false;
        $errorsArray['verifEmail'] = "L'email est deja utilisé";  
        } 
    }
}

// si le formulaire et Valide et si l'email est dispo alors on enregistre le user
if($formIsValid && $emailIsAvailable ){

    $insertSql = 'INSERT INTO `users`
                  (`user_name`, `user_email`, `user_password`, `user_role`) 
                  VALUES (:user_name, :user_email, :user_password, :user_role)' ;
            
    $query = $db->prepare($insertSql);

    $query->bindValue(':user_name', $name, PDO::PARAM_STR);
    $query->bindValue(':user_email', $email, PDO::PARAM_STR);

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query->bindValue(':user_password', $password, PDO::PARAM_STR);
    $query->bindValue(':user_role', $role, PDO::PARAM_STR);
    
    $query->execute();
    // Fermeture de la connextion à la base de données
    $query = null;
   
    // on peut envoyer le mail de confirmation
    $mailToSend = true;   
}
    
//Envoi du mail
if($mailToSend){

        $lastIdUser = $db->lastInsertId();
        $queryUserSql = 'SELECT * FROM `users`
                         WHERE id_user = :id_user';

        $query = $db->prepare($queryUserSql);
        $query->bindValue(':id_user', $lastIdUser, PDO::PARAM_INT);
        $query->execute();

        $result = $query->fetch();

        $UserName = $result['user_name'];
        $UserEmail = $result['user_email'];

        $header="MIME-Version: 1.0\r\n";
        $header.='From:"Bot-location.com"'."\n";
        $header.='Content-Type:text/html; charset="uft-8"'."\n";
        $header.='Content-Transfer-Encoding: 8bit';
    
        $subject = "confirmation de votre inscription";


        if (isset($_POST['newsLetter'])){
            $NewsLetterConfirmation = "Vous avez confirmé votre inscription à notre Newsletter";
        }
        else{
            $NewsLetterConfirmation = "Vous n'avez pas souhaité recevoir notre Newsletter";
            }
    
        $message='
        <html>
            <body>
    
                <div align="center">
                    <br />
                    Votre inscription est confirmée !
                    <br />
                    <hr>
                </div>
    
                <div align="center">
                   Cher nouvel abonné : <strong>'.$UserName .' </strong>
                   <br />
                   Bienvenue sur notre site !
                   <br />
                   <hr>
                </div>

                <div align="center">'
                .$NewsLetterConfirmation.'
                </div>
            </body>
        </html>
        ';
    
        $SendEmailOK = mail($UserEmail, $subject , $message, $header);

        // on peut envoyer le message de confirmation si le mail a bien été envoyé
        if($SendEmailOK){
            $confirmationToSchow = true;
            // Fermeture de la connextion à la base de données
            $query = null;
        }?>

<script>
    // setTimeout(function () {
    //         window.location = 'index.php';
    //     }, 4000);
    //     </script>

<?php } ?>

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

    <!-- MODAL CONFIRMATION INSCRIPTION -->
    <div id="inscriptionContainer-<?= $confirmationToSchow ? 'success' : 'default' ?>" class="container">
        <div class="modal-dialog modal-frame modal-bottom" role="document">
            <div class="modal-content">
                <div class="modal-body" id="inscriptionModal">
                    <div class="row d-flex justify-content-center align-items-center">
                        <p class="pt-3 pr-2">Votre compte est bien enregistré <br>
                            Un email de confirmation a été envoyé</p>
                        <p class="pt-3 pr-2">Vous pouvez maintenant vous connecter à votre compte</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FORMULAIRE D'INSCRIPTION -->
    <div class="row" id="registerForm">

        <form class="text-center border border-light p-5" method="POST" action="#">

            <div class="form-row mb-4">
                <div class="col">
                    <!-- First name -->
                    <input name="name" type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="<?= $formIsSend ? $name : 'Votre pseudo' ?>">
                </div>
            </div>

            <!-- E-mail -->
            <input name="email" type="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="<?= $formIsSend ? $email : 'Votre email' ?>">

            <!-- Password -->
            <input name="password" type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Mot de passe"
                aria-describedby="defaultRegisterFormPasswordHelpBlock">
            <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                Au moins 3 caractères
            </small>

            <!-- Vérif Password -->
            <input name="verifPassword" type="password" id="defaultVerifierFormPassword" class="form-control"
                placeholder="Vérification du mot de passe" aria-describedby="defaultRegisterFormPasswordHelpBlock">
            <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
            </small>

            <!-- Newsletter -->
            <div class="custom-control custom-checkbox">
                <input name="newsLetter" type="checkbox" class="custom-control-input" id="defaultRegisterFormNewsletter">
                <label class="custom-control-label" for="defaultRegisterFormNewsletter">Souscrire à notre Newsletter</label>
            </div>

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





<?php 
require_once __DIR__.'/partials/footer.php';
?>