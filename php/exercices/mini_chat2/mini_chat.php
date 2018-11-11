<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	<?php 

	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
	$requete = $bdd->prepare('INSERT INTO mini_chat( pseudo, message) VALUES (?,?)');

	$requete->execute(array(

		$_POST['pseudo'],
		$_POST['message']

	));

	header('Location: main.php');

	 ?>
	
</body>
</html>