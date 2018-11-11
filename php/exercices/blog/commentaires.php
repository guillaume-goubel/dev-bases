<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>commentaires</title>
</head>


<body>

	<?php
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
		}
		catch (Exception $e)
		{
		    die('Erreur : ' . $e->getMessage());
		}
		?>

		<p>
		<?php

			$requete = $bdd->prepare('SELECT ID,titre,date_billet,contenu_billet FROM billet WHERE ID=?');
			$requete->execute(array($_GET['numbillet']));

			while ($donnees = $requete->fetch())
			{
			echo $donnees['contenu_billet'];
			echo $donnees['date_billet'];
		
			}

			$requete->closeCursor();

		?>
		</p>


		<br/>
		<?php 

			$requete2 = $bdd->prepare('SELECT * FROM commentaire WHERE ID_billet =?');
			$requete2->execute(array($_GET['numbillet']));

			while ($donnees2 = $requete2->fetch()) 
			{
				echo ''.$donnees2['contenu_commentaire'].'<br/>';
			}

			$requete2->closeCursor();
		 ?>




</body>
</html>