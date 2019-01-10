<?php 
require_once __DIR__.'/partials/header.php';

/****************************************
 * DECLARATION DES VARIABLES
*****************************************/
$email = $password = null;

/*******************************************************************
 * CHECK DES ETAPES DE LA VERIFICATION ET VALIDATION DU FORMULAIRE
*******************************************************************/
//vérification si fortmulaire envoyé
$formIsSend = false;
//Tableau d'erreurs lors de la vérification du formulaire
$errorsArray = [];
//vérification formulaire complet avant enregistrement et les vérifications ci-dessous
$formIsValid = false;
//Vérification info et password
$LogIsValid = false;

/****************************************
 * ETAPES DU FORMULAIRE
****************************************/
if(!empty($_POST)){
    $email = $_POST['email'];
    $password = $_POST['password'];
}

//Si le formualire a été envoyé ,on peut le vérifier
if(isset($email, $password)){
    $formIsSend = true;
}


if($formIsSend){

    $formIsValid = true;

    if(empty($email)){
        $formIsValid = false;
        $errorsArray['email'] = "Il manque l'email";  
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !isset($errorsArray['email'])){
        $formIsValid = false;
        $errorsArray['emailFalse'] = "L'email n'est pas valide";  
    }

    if(empty($password)){
        $formIsValid = false;
        $errorsArray['passwordLack'] = "Il manque le password";  
    }

}

if($formIsValid){

    $query =  $db -> prepare('SELECT * FROM `users` WHERE `user_email` = :user_email');
    $query -> bindValue(':user_email', $email, PDO::PARAM_STR );
    $query -> execute();
    $result = $query->fetch();

    // 1 : On vérifie si la date de validation est en base (date crée lor de l'authentification via le token)
    if(!empty($result['confirmed_at'])){
        // 2 : On  vérification entre les deux passwords via l'email envoyé
        $passVerify = password_verify($password, $result['user_password']); // renvoi true ou false
        $db = NULL;
    } else {
        $_SESSION['flash']['danger'] = "Votre inscription n'a pas été validée via votre mail !";
        header('Location: http://localhost/dev-bases/php/projects/bateaux/loginUser.php');

    }

    if($passVerify){ // Si true alors le log est valide
        $LogIsValid = true;
    } else {
        $_SESSION['flash']['danger'] = "Le mail ou mot de passe n'est pas correct !";
        header('Location: http://localhost/dev-bases/php/projects/bateaux/loginUser.php');

    }
}

if($LogIsValid){
    session_start();
    $_SESSION['authenticatedUserId'] = $result['id_user'];
    $_SESSION['flash']['success'] = "Vous êtes connecté ";
    header('Location: http://localhost/dev-bases/php/projects/bateaux/index.php');

}


require_once __DIR__.'/view/loginUserView.php';

require_once __DIR__.'/partials/footer.php';
