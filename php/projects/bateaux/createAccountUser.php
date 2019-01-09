<?php 
require_once __DIR__.'/partials/header.php';

/****************************************
 * DECLARATION DES VARIABLES
 *****************************************/
// variable dans le formulaire d'inscription à null dès le lancement du script
$name = $email = $password = $verifPassword = $confirmationToken = null;
// l'abonnement est par défaut 0 , soit faux (boolean). L'utilisateur doit cocher pour accepter (et le faire passer en valuer1)
$confirmationToNewsLetter = 0;
// le role par défaut des users (role admin est à créer dans la Bdd)
$role = "user";
// la date de création du compte. Il faudra la transformer en string pour la mettre en base
date_default_timezone_set('Europe/Paris'); // précision du fuseau horaire de PAris
$dateCreation_dateFormat = new \Datetime();

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

    if( !preg_match(" /^[a-z0-9]+$/ ", $name ) && !isset($errorsArray['nameLack'])){
        $formIsValid = false;
        $errorsArray['nameFalse'] = "Le nom n'est pas correct";  
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
    
        $querySql = 'SELECT `user_email` FROM `users`
                    WHERE user_email = :user_email';
    
        $query =  $db -> prepare($querySql);
        $query -> bindValue(':user_email', $email, PDO::PARAM_STR );
    
        $query -> execute();
        $count = $query->rowCount(); 
       
        if($count === 1 && !isset($errorsArray['email'])){  // Vérifie en base si mail existe deja
        $formIsValid = false;
        $emailIsAvailable = false;
        $errorsArray['verifEmail'] = "L'email est deja utilisé";  
        } 
    }
}

// si le formulaire et Valide et si l'email est dispo alors on enregistre le user
if($formIsValid && $emailIsAvailable ){

    $insertSql = 'INSERT INTO `users`
                  (`user_name`, `user_email`, `user_password`, `user_role`,  `news_letter`, `date_creation` , `confirmation_token` ) 
                  VALUES (:user_name, :user_email, :user_password, :user_role, :news_letter, :date_creation , :confirmation_token )' ;
            
    $query = $db->prepare($insertSql);
    
    $name = htmlspecialchars($name); // Sécurisation et hachage
    $email = htmlspecialchars($email);
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query->bindValue(':user_name', $name, PDO::PARAM_STR);
    $query->bindValue(':user_email', $email, PDO::PARAM_STR);
    $query->bindValue(':user_password', $password, PDO::PARAM_STR);
    $query->bindValue(':user_role', $role, PDO::PARAM_STR); // Role est 'user' par défaut

    if (isset($_POST['newsLetter'])){$confirmationToNewsLetter = 1;}  // si l'utilisateur a coché oui : alors il est signalé 1 dans la base de donnée (true car boolean)
    $query->bindValue(':news_letter', $confirmationToNewsLetter, PDO::PARAM_INT);

    $dateCreation = $dateCreation_dateFormat->format('Y-m-d H:i:s');// La date de cration du compte convertie en string
    $query->bindValue(':date_creation', $dateCreation, PDO::PARAM_STR); 

    // Un token est envoyé en base de données
    $confirmationToken = str_random(60);
    $query->bindValue(':confirmation_token', $confirmationToken, PDO::PARAM_STR);

    $query->execute();
    $query = null; // Fermeture de la connextion à la base de données
    $mailToSend = true; // on peut alors envoyer le mail de confirmation  
}

// var_dump($confirmationToken);
    
if($mailToSend){ //Envoi du mail vers le dernier id effectué

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

        if (isset($_POST['newsLetter'])){ // Si utilisateur a cocher alors il y a un contenu "on" , sinon il n'y a rien d'envoyé
            $NewsLetterConfirmation = "Vous avez confirmé votre inscription à notre Newsletter";
        }else{
            $NewsLetterConfirmation = "Vous n'avez pas souhaité recevoir notre Newsletter";
            }
    
            // var_dump($confirmationToken);

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
                   Merci de confirmer votrte inscription en cliquant sur ce lien : <a href="http://localhost/dev-bases/php/projects/bateaux/confirmUser.php?id='.$lastIdUser.'&amp;token='.$confirmationToken.'">lien</a>                            
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
         setTimeout(function () {
            window.location = 'index.php';
         }, 4000);
    </script>
<?php } 

?>


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
                        <p class="pt-3 pr-2">Votre demande a bien été prise en compte<br>
                                             Un email vous a été envoyé. </p>
                        <p class="pt-3 pr-2">Merci de confirmer via le lien envoyé</p>
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