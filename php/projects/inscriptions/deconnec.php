<?php require 'inc/header.php';?>

<h1>Se deconnecter</h1>

<?php 
session_start();

// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();

header('Location: login.php');

?>


<?php require 'inc/footer.php';?>