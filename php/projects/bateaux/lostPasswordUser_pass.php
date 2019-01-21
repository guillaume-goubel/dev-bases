<?php 
require_once __DIR__.'/partials/header.php';

/***********************************
 * I VERIFICATION DU TOKEN
 ***********************************/
// On récupère l'id et le token renvoyé via le mail de l'utilisateur
$idToken = $_GET['id'];
$tokenSerial = $_GET['token'];

$passToChange = false;// a defaut cette varible est fausse. elle devient true si la vérification token est ok et permet ainsi de rentrer un nouveau pass



//Vérification token
$queryUserSql = 'SELECT * FROM `users`
                 WHERE id_user = :id_user';

$query = $db->prepare($queryUserSql);
$query->bindValue(':id_user', $idToken, PDO::PARAM_INT);
$query->execute();

$result = $query->fetch();

// Si les parametres en get === ceux en base, c'est la même personne
if($result['id_user'] === $idToken && $result['confirmation_token'] === $tokenSerial ){
    $passToChange = true;
}else{
    $_SESSION['flash']['danger'] = "Vous n'êtes pas authentifié";
    header('Location: http://localhost/dev-bases/php/projects/bateaux/lostPasswordUserView_mail.php'); // on redirige l'utilisateur avec en session son Id   
}

/*************************************************
 * II VERIFICATION ET INSCRIPTION DU NEW PASSWORD
 *************************************************/
//Tableau d'erreurs lors de la vérification du formulaire
$errorsArray = [];
$formIsValid = $formIsSend = false;
$password = $verifPassword = null;  

if($passToChange){ 

    // 1. Si le formulaire a été envoyé, les variables = les posts
    if(isset($_POST['NewPassword']) && isset($_POST['NewPasswordVerif']) ){
        $password = $_POST['NewPassword'];
        $verifPassword =  $_POST['NewPasswordVerif'];
    }

    if(isset($password, $verifPassword )){
        $formIsSend = true;
    }

    // 2 .Si le formualire a été envoyé ,on peut le vérifier
    if($formIsSend){

        $formIsValid = true;

        if(strlen($password)<3){
            $formIsValid = false;
            $errorsArray['nameLengh'] = "Le passeword doit contenir au moins 3 caratères";  
        }

        if($password != $verifPassword) {
            $formIsValid = false;
            $errorsArray['verifPassword'] = "Le password n'est pas identique au pass envoyé";  
        }
    }

    // 2 .Si le formualire a été validé, on enregistre en base
    if($formIsValid){

        $UpdateDbSql = 'UPDATE `users` SET `user_password` = :user_password , `confirmation_token` = NULL , `last_change_pass_date` = NOW()
                        WHERE id_user = :id_user'; // on annule le token

        $query = $db->prepare($UpdateDbSql);
        $query->bindValue(':id_user', $_GET['id'], PDO::PARAM_INT);

        $password = password_hash($password, PASSWORD_BCRYPT);
        $query->bindValue(':user_password', $password, PDO::PARAM_STR);

        $query->execute();

        if(isset($_COOKIE['userIdAuth'])){        
            // comme il y a modification du pass , la clé de l'autolog est changée
            // j'efface les éventuels cookies correspondant à l'ancien mot de passe
            setcookie('userIdAuth', '', time() -3600, null,null,false,true);
        }
        
        $_SESSION['flash']['success'] = "Votre mot de passe est modifié";
        header('Location: http://localhost/dev-bases/php/projects/bateaux/loginUser.php'); // on redirige l'utilisateur pour tester son log
    }

};








require_once __DIR__.'/view/lostPasswordUserView_pass.php';
require_once __DIR__.'/partials/footer.php';