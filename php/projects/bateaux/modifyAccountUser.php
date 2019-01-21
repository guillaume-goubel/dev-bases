<?php 
require_once __DIR__.'/partials/header.php';

$userId = $_SESSION['authenticatedUserId']; // on récupère l'id de la session
$userInfo = getUserAuthenticatedById($userId); // on récupère le return de la fonction avec l'id de la session via la variable $userInfo

//Voir les étapes dans createUserAccount

/****************************************
 * DECLARATION DES VARIABLES PAR DEFAUT
 *****************************************/
$idUser = $userInfo['id_user']; // L'id sera utilise lors de l'Update de la bdd
$name = $userInfo['user_name']; 
$email  = $userInfo['user_email']; 
$newsLetter =  null;

/*******************************************************************
 * CHECK DES ETAPES DE LA VERIFICATION ET VALIDATION DU FORMULAIRE
********************************************************************/
$errorsArray = [];
$formIsSend = false;
$formIsValid = false;
$emailIsAvailable = false;

/************************************
 * ETAPES DU FORMULAIRE
*************************************/
if(!empty($_POST)){
    $name = $_POST['name'];
    $email = $_POST['email'];
}

        /****************************
         * Vérif de la news letter
        *****************************/
        // La vérif concerannt la News Letter se fait en premier car il n'est pas checké au lancement du formulaire
        if(isset($_POST['newsLetter'])){
            $newsLetter = $_POST['newsLetter'];
        } 

        if(!isset($_POST['newsLetter']) && !empty($_POST)){ // l'erreur ne se lance que si le formaulaire a été envoyé
            $_POST['newsLetter'] = null;
            $errorsArray['newsLetterLack'] = "Il manque votre choix concernant la News Letter";  
        }

if(isset($name, $email, $newsLetter ) && $newsLetter != null ){
    $formIsSend = true;
}

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
        $errorsArray['emailLack'] = "Il manque l'email";  
    }
}

    // Vérification de la disponibilité de l'email SI L'EMAIL A ETE REMPLI PAR L'UTILISATEUR !
    if(!empty($email)){
        
        $emailIsAvailable = true;
    
        $querySql = 'SELECT `user_email` FROM `users`
                     WHERE user_email = :user_email';
    
        $query =  $db -> prepare($querySql);
        $query -> bindValue(':user_email', $email, PDO::PARAM_STR );
        $query -> execute();

        $count = $query->rowCount(); 
        
        if($email != $userInfo['user_email'] && $count === 1 && !isset($errorsArray['emailLack'])){  // Vérifie en base si mail existe deja /!\ Et si il est différent de l'actuel /!\
        $formIsValid = false;
        $emailIsAvailable = false;
        $errorsArray['verifEmail'] = "L'email est deja utilisé";
        $db = null;  
        } 
    }

if($formIsValid){

        // ici on effece le token et on rajoute la date d'authnetification : le user est authentifié
        $UpdateDbSql = 'UPDATE `users` SET `user_name` = :user_name , `user_email` = :user_email , `news_letter` = :news_letter ,  `last_modification_date` = NOW()
        WHERE id_user = :id_user';

        $query = $db->prepare($UpdateDbSql);
        $query->bindValue(':id_user', $idUser, PDO::PARAM_INT);
        $query->bindValue(':user_name', $name, PDO::PARAM_STR);
        $query->bindValue(':user_email', $email, PDO::PARAM_STR);
        $query->bindValue(':news_letter', $newsLetter, PDO::PARAM_STR);
        $query ->execute();
        
        if(isset($_COOKIE['userIdAuth'])){        
            // comme il y a modification du pass , la clé de l'autolog est changée
            // j'efface le cookie correspondant à l'ancien mot de passe
            setcookie('userIdAuth', '', time() -3600, null,null,false,true);
            
            $userInfo = getUserAuthenticatedById($_SESSION['authenticatedUserId']); 
            $cryptageCookie = $userInfo['id_user'].'---'.sha1($userInfo['user_name'].$userInfo['user_password'].$_SERVER['REMOTE_ADDR']);
            
            // puis je set le newcookie avec la nouvelle clé contenant le new password
            setcookie('userIdAuth', $cryptageCookie , time()+365*24*3600, null, null, false, true);
            header('Location: http://localhost/dev-bases/php/projects/bateaux/accountUser.php');
            
        }

        $db = null;  

        $_SESSION['flash']['success'] = "Vos modifications ont été appliquées";
        header('Location: http://localhost/dev-bases/php/projects/bateaux/accountUser.php'); 
        exit();
}


require_once __DIR__.'/view/modifyAccountUserView.php';
require_once __DIR__.'/partials/footer.php';
?>
