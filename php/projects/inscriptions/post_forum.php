<?php require 'inc/header.php';?>
<?php require_once 'inc/functions.php'; ?>

<!--Cookie pour le pseudo-->
<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Page2</title>
</head>
<body>
    <!--Préparation requete en PHP-->
	<?php 
	require_once 'inc/bdd.php';

	$req = $pdo->prepare('SELECT usernames FROM insciption WHERE usernames = ?');
	$donnees = $req->fetch();

	if ($_POST['pseudonyme'] != $_SESSION['pseudo'])
	{
		die ('<div class="alert alert-danger"> Attention, pseudo inconnu !!! <br/> Merci d\'utiliser votre bon pseudo ! </div> ');
	}


	else 
	{
	$req = $pdo->prepare('INSERT INTO mini_chat(pseudonyme,message,date_message) VALUES (?,?,NOW())' );
	
	$req->execute(array(

		$_POST['pseudonyme'],
		$_POST['message']

	));
	}

	header('Location: chat.php');

	 ?>


<?php require 'inc/footer.php';?>