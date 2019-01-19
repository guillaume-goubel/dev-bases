<?php
require_once __DIR__.'/config/database.php'; 
/****************************************
 * VARIABLES
 *****************************************/
$logIsValid = false;

if(isset($_COOKIE['userIdAuth'])){

    //1 on explose le userIdAuth crypté en sha1 en confirmUser.php pour récupérer le nom et le pass 
    $userIdAuth = $_COOKIE['userIdAuth'];
    
    $userIdAuth = explode("---", $userIdAuth);

    // 1 on vérifie en base
    $AutoLoginUserSQL = 'SELECT * FROM `users` WHERE `id_user` = :id_user';

    $query =  $db -> prepare($AutoLoginUserSQL);
    $query -> bindValue(':id_user', $userIdAuth[0], PDO::PARAM_STR);
    $query -> execute();
    $result = $query->fetch();
    
    //2.2 On vérifie le cryptage en comparant à une clé qui recode les informations nécessaires
    $key = sha1($result['user_name'].$result['user_password'].$_SERVER['REMOTE_ADDR']);
    var_dump($key);
    var_dump($userIdAuth[1]);

    if($key == $userIdAuth[1]){
        $logIsValid = true;
    }

        // 3 on créé une session et éventuellement les cookies
        if($logIsValid){  
            // setcookie('userIdAuth', $result['id_user'] , time()+365*24*3600, null, null, false, true);
            session_start();
            $_SESSION['authenticatedUserId'] = $result['id_user'];
        }
}












