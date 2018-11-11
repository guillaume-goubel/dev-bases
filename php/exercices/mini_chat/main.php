<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Main</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<!--1. Préparer le formulaire-->
<body>
	
<div id="corp">

	<form action="bdd.php" method="post">
		<p><label for="pseudo"> Pseudo : </label> <input type="text" name ="pseudo" id="pseudo"></p>		
		<p><label for="message"> Message : </label> <input type="textarea" name ="message" id="message"></p>	
		<p><input type="submit" value="Envoyer" id="bouton"></p>	
	</form>


	<h1>Bonjour et bienvenue sur le Chat de notre site !</h1>


	<section>
	<?php 

	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');

	$req_afficher_chat = $bdd->query('SELECT * FROM mini_chat ORDER BY ID DESC LIMIT 0,10');

	while ($donnees = $req_afficher_chat->fetch())
	{
		echo ' <p> Message N°:     '.htmlspecialchars($donnees['ID']).' --> '.htmlspecialchars($donnees['pseudo']).' </br> '.htmlspecialchars($donnees['message']).' </p>';
	}

	$req_afficher_chat->closeCursor();

 	?>
	</section>

</div>

<!--2. Afficher le chat-->



</body>
</html>