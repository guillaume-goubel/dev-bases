<?php

require_once __DIR__.'/config/database.php'; 

/****************************************
 * VARIABLES
 *****************************************/
// On récupère l'id et le token renvoyé via le mail de l'utilisateur
$idToken = $_GET['id'];
$tokenSerial = $_GET['token'];

/****************************************
 * TRAITEMENTS
 ****************************************/
// Selection en base de l'id user
$queryUserSql = 'SELECT * FROM `users`
                 WHERE id_user = :id_user';

$query = $db->prepare($queryUserSql);
$query->bindValue(':id_user', $idToken, PDO::PARAM_INT);
$query->execute();

$result = $query->fetch();

// Si les parametres en get === ceux en base, c'est la même personne
if($result['id_user'] === $idToken && $result['confirmation_token'] === $tokenSerial ){
    
    
    $UpdateDbSql = 'UPDATE `users` SET `confirmation_token` = NULL , `confirmed_at` = NOW() 
                    WHERE id_user = :id_user';
    
    $query = $db->prepare($UpdateDbSql);
    $query->bindValue(':id_user', $idToken, PDO::PARAM_INT);
    $query->execute(); //On efface en base le token + on met la date Now de validation

    session_start(); //On demarre la session
    $_SESSION['authenticatedUserId'] = $result['id_user'];
    header('Location: http://localhost/dev-bases/php/projects/bateaux/accountUser.php'); // on redirige l'utilisateur avec en session son Id
    
    $db = null; // Fermeture de la connextion à la base de données
} else {
    echo '<img src="assets/images/giphy.gif">';
}
