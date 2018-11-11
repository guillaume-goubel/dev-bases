<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>commentaires</title>
</head>
<body>
	
	<?php include('inc.php');?>

	<h1>MON BLOG</h1>

	<h2>Les commentaires !</h2>

	<p>
	
	<?php 

	$req = $bdd->prepare('SELECT * FROM billet WHERE ID=?');
	$req->execute(array($_GET['num_billet']));

	$donnees = $req->fetch();  

		echo ' <h3>'.$donnees['titre'].'  le  '.$donnees['date_billet'].'</h3>';
		echo ' <p>'.$donnees['contenu_billet'].'</p>';
	
	?>

	</p>


	<?php

	$req2 = $bdd->prepare('SELECT * FROM commentaire WHERE ID_billet=?');
	$req2->execute(array($_GET['num_billet']));

	while ($donnees = $req2->fetch()) 
	{
		echo ' <h3>'.$donnees['auteur'].'  le  '.$donnees['date_commentaire'].'</h3>';
		echo ' <p>'.$donnees['contenu_commentaire'].'</p>';
	}

	$req2->closeCursor();


	?>
	



</body>
</html>