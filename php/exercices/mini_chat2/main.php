
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mini chat</title>

	<h1>bienvenue sur la mini chat !</h1>

	<form method="post" action="mini_chat.php">
	
	<label for="pseudo"> Pseudo </label> <input type="text" name="pseudo" id="pseudo"> <br>
	<label for="message"> Message </label> <input type="text" name="message" id="message"> <br>
	
	<input type="submit" value="VALIDER!">
	
	</form>

	<?php 

	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
	$requete = $bdd->query('SELECT * FROM mini_chat');

	while ($donnee = $requete->fetch()) 
	{
		echo ''.$donnee["pseudo"].' --> '.$donnee["message"].' <br/>';
	}

 	?>

</head>
<body>
	
</body>
</html>