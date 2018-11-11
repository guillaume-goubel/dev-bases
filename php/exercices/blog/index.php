<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>index</title>
	<link rel="stylesheet" href="style.css">
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

			<section class="billet">

					    <?php
						$requete = $bdd->query('SELECT ID,titre,date_billet,contenu_billet FROM billet ORDER BY date_billet ASC LIMIT 0, 5');
						
						while ($donnees = $requete->fetch()) 		
						{
						?>
							<h3>
								<?php echo $donnees['titre'];?>
								<em><?php echo $donnees['date_billet'];?></em>
							</h3>

							<p>
								<?php echo nl2br($donnees['contenu_billet']);?>
							</p>
							<br/>

							<em><a href="commentaires.php  ?numbillet=         <?php echo$donnees['ID'];       ?>   ">Commentaires</a></em>

						<?php 
						}

						$requete->closeCursor();

						 ?>

	        </section>


	
</body>
</html>