<?php 

session_start();
unset($_SESSION['authenticatedUserId']);
$_SESSION['flash']['warning'] = "Vous êtes déconnecté";
header('Location: http://localhost/dev-bases/php/projects/bateaux/index.php');


?>