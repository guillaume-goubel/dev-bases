<?php 
require_once __DIR__.'/partials/header.php';

$userId = $_SESSION['authenticatedUserId']; // on récupère l'id de la session
$userInfo = getUserAuthenticated($userId); // on récupère le return de la fonction avec l'id de la session via la variable $userInfo

//Voir les étapes dans createUserAccount

/****************************************
 * DECLARATION DES VARIABLES
 *****************************************/
$name = $email  = $newsLetter = null;

/*******************************************************************
 * CHECK DES ETAPES DE LA VERIFICATION ET VALIDATION DU FORMULAIRE
********************************************************************/
$formIsSend = false;
$errorsArray = [];
$formIsValid = false;
$emailIsAvailable = false;

/*******************************************************************
 * ETAPES DU FORMULAIRE
********************************************************************/
if(!empty($_POST)){
    $name = $_POST['name'];
    $email = $_POST['email'];

}

if(isset($_POST['newsLetter'])){
    $newsLetter = $_POST['newsLetter'];
} else{
    $_POST['newsLetter'] = null;
    $errorsArray['newsLetterLack'] = "Il manque votre choix concernant la News Letter";  
}

if(isset($name, $email, $newsLetter )){
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

    // Vérification de la disponibilité de l'email SI LE MAIL A ETE REMPLI PAR L'UTILISATEUR !
    if(!empty($email)){
        
        $emailIsAvailable = true;
    
        $querySql = 'SELECT `user_email` FROM `users`
                     WHERE user_email = :user_email';
    
        $query =  $db -> prepare($querySql);
        $query -> bindValue(':user_email', $email, PDO::PARAM_STR );
    
        $query -> execute();
        $count = $query->rowCount(); 
        
        if($email != $userInfo['user_email'] && $count === 1 && !isset($errorsArray['emailLack'])){  // Vérifie en base si mail existe deja Et si il est différent de l'actuel
        $formIsValid = false;
        $emailIsAvailable = false;
        $errorsArray['verifEmail'] = "L'email est deja utilisé";  
        } 
    }



var_dump($_POST);
var_dump($newsLetter);
var_dump($formIsValid);





require_once __DIR__.'/view/modifyAccountUserView.php';
require_once __DIR__.'/partials/footer.php';
?>
