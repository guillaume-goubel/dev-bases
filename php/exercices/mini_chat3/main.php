<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Main</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>

		<!--Formulaires-->
		<header>
			<h1>Mon Mini-Chat</h1>
			<form method="post" action="page2.php">
				<!--Prise en compte du pseudo déclaré en cookie-->
				<p><label for="pseudonyme"> Entrez votre pseudonyme : </label><input type="text" name="pseudonyme" id="pseudonyme" 
					value=
					"<?php if (isset($_COOKIE['pseudo']))
					{
						echo $_COOKIE['pseudo'];
					}
					else
					{
						echo "pseudo";
					}
					?>">
					 </p>
					
				<p><label for="message"> Entrez votre message : </label><input type="text" name="message" id="message" 
					value=
					"<?php if (empty($_POST['message']))
					{
						echo "veuillez écrire votre message";
					}
					?>">
					</p>

				<input type="submit" value="Confirmez">
			</form>
		</header>
		

		<!--Connection Bdd + Préparation requete en PHP + boucle-->
		<section>
					<?php
					try
					{
						$bdd = new PDO('mysql:host=localhost;dbname=mini_chat;charset=utf8', 'root', '');
					}
					catch(Exception $e)
					{
					die('Erreur : '.$e->getMessage());
					}
					$req = $bdd->query('SELECT pseudonyme,message,DATE_FORMAT(date_message, \'%d/%m/%Y à %Hh%imin%ss\') AS date_message_fr FROM mini_chat ORDER BY date_message_fr DESC');
					while ($donnees = $req->fetch())
					{
					?>

		<!--Affichage des messages-->
			<div class=message>
					<em><?php echo htmlspecialchars('Message du '.$donnees['date_message_fr']);?></em> : <strong><?php echo htmlspecialchars($donnees['pseudonyme']).'</br>';?></strong>
					<p><?php echo htmlspecialchars($donnees['message']).'</br>';?></p>	
			</div>
			
		<!--Fin de la boucle-->
				<?php
				}
				$req->closeCursor();
				?>

		</section>

		</body>
	</html>