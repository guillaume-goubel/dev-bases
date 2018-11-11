<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>index</title>
</head>
<body>

	<?php include('inc.php');?>

	<h1>MON BLOG</h1>

	<h2>Les derniers billets du blog !</h2>

	<?php 

	$req = $bdd->query('SELECT * FROM billet ORDER BY date_billet DESC LIMIT 0,5');

	while ($donnees = $req->fetch())
	{
		echo ' <h3>'.$donnees['titre'].'  le  '.$donnees['date_billet'].'</h3>';
		echo ' <p>'.$donnees['contenu_billet'].'</p>';
	?>

	<a href="commentaires2.php?num_billet=<?php echo $donnees['ID'];?>&amp?test=">vos commentaires</a>

	<?php 
	
	}

	$req->closeCursor();

	?>

</body>
</html>