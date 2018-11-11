<?php require 'inc/header.php';?>
<?php require_once 'inc/functions.php'; ?>
<?php 
session_start();

 ?>

<button class="btn btn-link"><a href="deconnec.php">Se déconnecter</a></button>

<h1>Le forum</h1>

<form method="POST" action="post_forum.php">

	<!--Prise en compte du pseudo déclaré en cookie-->
				
				<p><label for="pseudonyme"> Entrez votre pseudo : </label><input type="text" name="pseudonyme" id="pseudonyme " 
					value=
					"<?php if (isset($_SESSION['pseudo']))
					{
						echo $_SESSION['pseudo'];
					}
					else
					{
						echo "Votre pseudo !";
					}
					?>" required>
					 </p>
					
				<p><label for="message"> Entrez votre message : </label><input type="text" name="message" id="message" required></p>
				<input type="submit" value="Confirmez">
			</form>
					
					<?php
					require_once 'inc/bdd.php';

					$req = $pdo->query('SELECT pseudonyme,message,DATE_FORMAT(date_message, \'%d/%m/%Y à %Hh%imin%ss\') AS date_message_fr FROM mini_chat ORDER BY date_message_fr DESC LIMIT 0,5');
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

		


<?php require 'inc/footer.php';?>