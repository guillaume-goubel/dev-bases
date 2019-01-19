<?php 
require_once __DIR__.'/partials/header.php';


/****************************************
 * DECLARATION DES VARIABLES
 *****************************************/
// variable dans le formulaire d'inscription à null dès le lancement du script
$name = $email = $password = $verifPassword = $confirmationToken = $captcha = null;
// l'abonnement est par défaut 0 , soit faux (boolean). L'utilisateur doit cocher pour accepter (et le faire passer en valuer1)
$confirmationToNewsLetter = 0;
// le cookie est par défaut 0 , soit faux (boolean). L'utilisateur doit cocher pour accepter (et le faire passer en valuer1)
$confirmationToCookie = 0;
// le role par défaut des users (role admin est à créer dans la Bdd)
$role = "user";
// la date de création du compte. Il faudra la transformer en string pour la mettre en base
date_default_timezone_set('Europe/Paris'); // précision du fuseau horaire de PAris
$dateCreation_dateFormat = new \Datetime();


/*******************************************************************
 * CHECK DES ETAPES DE LA VERIFICATION ET VALIDATION DU FORMULAIRE
********************************************************************/
//vérification si formulaire envoyé
$formIsSend = false;
//Tableau d'erreurs lors de la vérification du formulaire
$errorsArray = [];
//vérification formulaire complet avant enregistrement et les vérifications ci-dessous
$formIsValid = false;
//vérification pas de doublon de mail dans Bdd
$emailIsAvailable = false;
//envoi mail confirmation de création de compte à utilisateur
$mailToSend = false;
//variable captcha envoyé
$recaptchaSend = false; 
//variable captcha valide
$recaptchaValid = false;
//A défaut les cookies sont désactivés.le user active ou non via la checkbox se souvenir de moi
$cookieIsValid = false;


/*******************************************************************
 * ETAPES DU FORMULAIRE
********************************************************************/
// 1. Si le formulaire a été envoyé, les variables = les posts
if(!empty($_POST)){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verifPassword =  $_POST['verifPassword'];
    $captcha = $_POST['captcha'];
}

// 2 .Si le formualire a été envoyé ,on peut le vérifier
if(isset($name, $email, $password, $verifPassword, $captcha )){
    $formIsSend = true;
}


// 3. Vérification de l'envoi complet du formulaire
if($formIsSend){

    $formIsValid = true;

    if(empty($name)){
        $formIsValid = false;
        $errorsArray['nameLack'] = "Il manque le nom";  
    }

    if( !preg_match(" /^[a-zA-Z0-9]+$/ ", $name ) && !isset($errorsArray['nameLack'])){
        $formIsValid = false;
        $errorsArray['nameFalse'] = "Le nom n'est pas correct";  
    }

    if(empty($email)){
        $formIsValid = false;
        $errorsArray['emailLack'] = "Il manque l'email";  
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
        
        if($count === 1 && !isset($errorsArray['emailLack'])){  // Vérifie en base si mail existe deja , si 1 oui
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

    if(!preg_match(" /^[0-9]{4}$/ ", $captcha)) {
        $formIsValid = false;
        $errorsArray['verifCaptcha'] = "Le code doit comporter 4 chiffres";  
    }

    if($captcha != $_SESSION['captcha'] && !isset($captcha)){
        $formIsValid = false;
        $errorsArray['validCaptcha'] = "Les codes ne sont pas identiques";  
    }
}

// 4. si le formulaire et Valide et si l'email est dispo alors on enregistre le user
if($formIsValid && $emailIsAvailable){   // && $recaptchaValid

    $insertSql = 'INSERT INTO `users`
                  (`user_name`, `user_email`, `user_password`, `user_role`,  `news_letter`, `date_creation` , `confirmation_token`, `accept_cookie`  ) 
                  VALUES (:user_name, :user_email, :user_password, :user_role, :news_letter, :date_creation , :confirmation_token, :accept_cookie )' ;
            
    $query = $db->prepare($insertSql);
    
    $name = htmlspecialchars($name); // Sécurisation et hachage
    $email = htmlspecialchars($email);
    $password = password_hash($password, PASSWORD_BCRYPT);

    $query->bindValue(':user_name', $name, PDO::PARAM_STR);
    $query->bindValue(':user_email', $email, PDO::PARAM_STR);
    $query->bindValue(':user_password', $password, PDO::PARAM_STR);
    $query->bindValue(':user_role', $role, PDO::PARAM_STR); // Role est 'user' par défaut

    if (isset($_POST['newsLetter'])){
        $confirmationToNewsLetter = 1;// si l'utilisateur a coché oui : alors il est signalé 1 dans la base de donnée (true car boolean)
    }  
    
    $query->bindValue(':news_letter', $confirmationToNewsLetter, PDO::PARAM_INT);

    if (isset($_POST['rememberMe'])){
        $confirmationToCookie = 1;// si l'utilisateur a coché oui : alors il est signalé 1 dans la base de donnée (true car boolean) ET cookieIsValid est true
        $cookieIsValid = true; 
    }
    
    $query->bindValue(':accept_cookie', $confirmationToCookie, PDO::PARAM_INT);

    $dateCreation = $dateCreation_dateFormat->format('Y-m-d H:i:s');// La date de cration du compte convertie en string
    $query->bindValue(':date_creation', $dateCreation, PDO::PARAM_STR); 

    // Un token est envoyé en base de données
    $confirmationToken = str_token(60);
    $query->bindValue(':confirmation_token', $confirmationToken, PDO::PARAM_STR);

    $query->execute();
    $query = null; // Fermeture de la requete (et non de la base de donnée)
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

            //normalement session lancée dans le header mais si non en lancer une
            if(session_status() == PHP_SESSION_NONE ){
                session_start();
            }
            $_SESSION['waitingForValidation'] = true;
            $_SESSION['flash']['warning'] = "Votre inscription doit être maintenant validée par mail";
            header('Location: http://localhost/dev-bases/php/projects/bateaux/index.php'); // on redirige l'utilisateur avec en session son Id
            // Fermeture de la connextion à la base de données
            $db = null;
            exit();


        }
} 


require_once __DIR__.'/view/createAccountUserView.php';

require_once __DIR__.'/partials/footer.php';
?>