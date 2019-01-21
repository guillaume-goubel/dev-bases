<?php 
require_once __DIR__.'/partials/header.php';

// unset($_SESSION['Step1']);

$errorsArray = [];

/*****************************
 * I DEMANDE DU MAIL DE L'UTILISATEUR
 *****************************/
$email = $password = null;
$formIsSend = $formIsValid = $emailIsValid = $mailToSend = false; 

if(!empty($_POST)){
    $email = $_POST['email'];
}

if(isset($_POST['email'])){
    $formIsSend  = true;
}


//Formulaire envoyé
if($formIsSend){

    $formIsValid = true;

    if(empty($email)){
        $formIsValid = false;
        $errorsArray['emailLack'] = "Il manque l'email";  
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !isset($errorsArray['email'])){
        $formIsValid = false;
        $errorsArray['emailFalse'] = "L'email n'est pas valide";  
    }
}

//Vérification du mail
if($formIsValid){
    
    $emailIsValid = true;

    $loginUserSQL = 'SELECT * FROM `users` WHERE `user_email` = :user_email';

    $query =  $db -> prepare($loginUserSQL);
    $query -> bindValue(':user_email', $email, PDO::PARAM_STR);
    $query -> execute();

    $count = $query->rowCount(); 
        
    if($count === 0 && !isset($errorsArray['emailLack'])){  
        $errorsArray['verifEmail'] = "L'email n'est pas connu";
        $emailIsValid = false;
    }
}


if($emailIsValid){

    if(isset($_SESSION['Step1'])){
        unset($_SESSION['Step1']);
    }
    
    $UpdateDbSql = 'UPDATE `users` SET `confirmation_token` = :confirmation_token 
                    WHERE `user_email` = :user_email';

    $query = $db->prepare($UpdateDbSql);

    $query -> bindValue(':user_email', $email, PDO::PARAM_STR);
    // Un token est envoyé en base de données
    $confirmationToken = str_token(60);
    $query->bindValue(':confirmation_token', $confirmationToken, PDO::PARAM_STR);   
    $query->execute();

    $mailToSend = true; // on peut alors envoyer le mail de confirmation

    $_SESSION['Step1'] = true;
    
if($mailToSend){

    $userInfo = getUserAuthenticatedByEmail($email);
    
        $UserId = $userInfo['id_user'];
        $UserName = $userInfo['user_name'];
        $UserEmail = $userInfo['user_email'];

        $header="MIME-Version: 1.0\r\n";
        $header.='From:"Bot-location.com"'."\n";
        $header.='Content-Type:text/html; charset="uft-8"'."\n";
        $header.='Content-Transfer-Encoding: 8bit';
    
        $subject = "demande de changement de mot de passe";

        $message='
        <html>
            <body>
    
                <div align="center">
                    <br />
                    Vous avez perdu votre mot de passe : merci de cliquer sur le lien suivant
                    <br />
                    <hr>
                </div>
    
                <div align="center">
                   Cher abonné : <strong>'.$UserName .' </strong>
                   <br />
                   Merci de confirmer votrte nouveau mot de passe via ce lien :  <a href="http://localhost/dev-bases/php/projects/bateaux/lostPasswordUser_pass.php?id='.$UserId.'&amp;token='.$confirmationToken.'">lien</a>                                                       
                   <br />
                   <hr>
                </div>
            </body>
        </html>
        ';

        $SendEmailOK = mail($UserEmail, $subject , $message, $header);
        
        unset($_SESSION['Step1']);
        
        $_SESSION['flash']['success'] = "Un courrier a été envoyé sur votre adresse mail <br> Merci de suivre les indications";
        header('Location: http://localhost/dev-bases/php/projects/bateaux/index.php');
        exit();

    }
}

require_once __DIR__.'/view/lostPasswordUserView_mail.php';
require_once __DIR__.'/partials/footer.php';