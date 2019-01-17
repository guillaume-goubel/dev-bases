<?php

$passIsValid = NULL;

if (isset($_COOKIE['user'])) {

    $email = $_COOKIE['user']['email'];
    $password = $_COOKIE['user']['password'];

    $AutoLoginUserSQL = 'SELECT * FROM `users` WHERE `user_email` = :user_email';

    $query =  $db -> prepare($AutoLoginUserSQL);
    $query -> bindValue(':user_email', $email, PDO::PARAM_STR );
    $query -> execute();
    $result = $query->fetch();
    
     // 1 on vérifie le password et le mail
     $passVerify = password_verify($password, $result['user_password']); // renvoi un boolean 

     if($passVerify){ 
         $passIsValid = true;
     } else {
        $db = NULL;
     }

    if($passIsValid){

    }
    var_dump($result);





}

