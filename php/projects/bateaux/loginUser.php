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
//Vérification du pass et mail
$passIsValid = false;
//Vérification info et password
$logIsValid = false;
//A défaut les cookies sont désactivés.le user active ou non via la checkbox se souvenir de moi
$CookieIsActivated = false;


/****************************************
 * ETAPES DU FORMULAIRE
****************************************/
if(!empty($_POST)){
    $email = $_POST['email'];
    $password = $_POST['password'];
}
// Par défaut les forms checkbox ont une seule valeur 'on' SSI elles sont activées
if(isset($_POST['rememberMe'])){
    $CookieIsActivated = true;
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

    $loginUserSQL = 'SELECT * FROM `users` WHERE `user_email` = :user_email';

    $query =  $db -> prepare($loginUserSQL);
    $query -> bindValue(':user_email', $email, PDO::PARAM_STR );
    $query -> execute();
    $result = $query->fetch();

    // 1 on vérifie le password et le mail
    $passVerify = password_verify($password, $result['user_password']); // renvoi un boolean 

    if($passVerify){ 
        $passIsValid = true;
    } else {
        $_SESSION['flash']['danger'] = "Le mail ou mot de passe n'est pas correct !";
        header('Location: http://localhost/dev-bases/php/projects/bateaux/loginUser.php');
    }

    // 2 on vérifie si le user et en attente d'une validation par mail
    if($passIsValid){ 

        if(empty($result['confirmed_at'])){ //si oui
            $_SESSION['flash']['danger'] = "Votre inscription n'a pas été validée via votre mail !";         
            header('Location: http://localhost/dev-bases/php/projects/bateaux/index.php');
        }

        if(!empty($result['confirmed_at'])){ //si non
            $logIsValid = true;
        }
    }

    // 3 on créé une session et éventuellement les cookies
    if($logIsValid){

        //les cookies
        if($CookieIsActivated){

            if(isset($_COOKIE['userIdAuth'])){        
                // comme il y a modification du pass , la clé de l'autolog est changée
                // j'efface les éventuels cookies correspondant à l'ancien mot de passe
                setcookie('userIdAuth', '', time() -3600, null,null,false,true);
            }

            $cryptageCookie = $result['id_user'].'---'.sha1($result['user_name'].$result['user_password'].$_SERVER['REMOTE_ADDR']);
            setcookie('userIdAuth', $cryptageCookie , time()+365*24*3600, null, null, false, true);
        }

        //les sessions
        $_SESSION['authenticatedUserId'] = $result['id_user'];
        $_SESSION['flash']['success'] = "Vous êtes connecté ";
        $db = null;
        header('Location: http://localhost/dev-bases/php/projects/bateaux/index.php');
        exit();
    }
}


require_once __DIR__.'/view/loginUserView.php';
require_once __DIR__.'/partials/footer.php';
