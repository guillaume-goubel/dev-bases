<?php 

session_start();
unset($_SESSION['authenticatedUserId']);
setcookie('userIdAuth', $result['id_user'], time()-3600, null,null,false,true);
$_SESSION['flash']['warning'] = "Vous êtes déconnecté";
header('Location: http://localhost/dev-bases/php/projects/bateaux/index.php');
exit();
?>