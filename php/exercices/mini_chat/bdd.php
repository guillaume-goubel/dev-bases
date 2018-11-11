<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Base de données</title>
	<link rel="stylesheet" href="style.css"/>
</head>
<body>
	
	<?php 

	// connexion à la Base de données
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

	// Préparer la requete
	$requete = $bdd->prepare('INSERT INTO mini_chat (pseudo, message) VALUES (?, ?)');
	
	$requete->execute(array
	(
		$_POST['pseudo'],
		$_POST['message']
	));
	

	header('Location: main.php');

	?>



</body>
</html>