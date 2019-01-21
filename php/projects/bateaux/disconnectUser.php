<?php 

session_start();
unset($_SESSION['authenticatedUserId']);

//unset de toutes les sessions avec étapes
unset($_SESSION['Step1']);
unset($_SESSION['Step2']);
unset($_SESSION['Step3']);

setcookie('userIdAuth', '', time() -3600, null,null,false,true);

$_SESSION['flash']['warning'] = "Vous êtes déconnecté";
header('Location: http://localhost/dev-bases/php/projects/bateaux/index.php');
exit();