
<!--Cookie pour le pseudo-->
<?php
setcookie('pseudo', $_POST['pseudonyme'], time() + 365*24*3600, null, null, false, true); // On écrit un cookie
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
	try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=mini_chat;charset=utf8', 'root', '');
		}
		catch(Exception $e)
		{
		        die('Erreur : '.$e->getMessage());
		}


	$req = $bdd->prepare('INSERT INTO mini_chat(pseudonyme,message,date_message) VALUES (?,?,NOW())' );
	
	/*Préparation requete en PHP*/

	$req->execute(array(

		$_POST['pseudonyme'],
		$_POST['message']

	));

	header('Location: main.php');

	 ?>
	
</body>
</html>