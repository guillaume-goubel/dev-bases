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
// 1. Si le formulaire a été envoyé, les variables = les posts
if(!empty($_POST)){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verifPassword =  $_POST['verifPassword'];
}

// 2 .Si le formualire a été envoyé ,on peut le vérifier
if(isset($name, $email, $password, $verifPassword  )){
    $formIsSend = true;
}


// 3. Vérification de l'envoi complet du formulaire
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


}


require_once __DIR__.'/recaptcha/autoload.php';

if(isset($_POST)){

    if(isset($_POST['g-recaptcha-response'])){

        $recaptcha = new \ReCaptcha\ReCaptcha('6LdOSogUAAAAAAW7WbEfrwGxxJ-9zBlF0bW5Vlfs');
        $resp = $recaptcha->verify($_POST['g-recaptcha-response']); //, $remoteIp en option           
    if ($resp->isSuccess()) {
        var_dump('Captcha valide');
    } else {
        $errors = $resp->getErrorCodes();
        var_dump('Captcha invalide');
        var_dump($errors);
    }
    
    
    } else{
        var_dump('Captcha non rempli');
    }
    
} else{
    var_dump('Formulaire non rempli');
}






// 4. si le formulaire et Valide et si l'email est dispo alors on enregistre le user
if($formIsValid && $emailIsAvailable ){

    $insertSql = 'INSERT INTO `users`
                  (`user_name`, `user_email`, `user_password`, `user_role`,  `news_letter`, `date_creation` , `confirmation_token` ) 
                  VALUES (:user_name, :user_email, :user_password, :user_role, :news_letter, :date_creation , :confirmation_token )' ;
            
    $query = $db->prepare($insertSql);
    
    $name = htmlspecialchars($name); // Sécurisation et hachage
    $email = htmlspecialchars($email);
    $password = password_hash($password, PASSWORD_BCRYPT);

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


// 5. Préparation de l'envoi du mail
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

<!-- 6  Envoi vers l'index -->
<script>
     setTimeout(function () {
        window.location = 'index.php';
     }, 4000);
</script>

<?php } 


require_once __DIR__.'/view/createAccountUserView.php';

require_once __DIR__.'/partials/footer.php';
?>