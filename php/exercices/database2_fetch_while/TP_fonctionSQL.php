<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<?php 

$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','');

$reponse = $bdd->query('SELECT SUM(prix) AS prix_total,possesseur FROM jeux_video GROUP BY possesseur ORDER BY prix_total DESC');

while ($donnees = $reponse->fetch()) 
{
	echo ' '.$donnees['possesseur'].'  -------------->  '.$donnees['prix_total'].' € <br/>';
}

$reponse->closeCursor();

 ?>
	
</body>
</html>