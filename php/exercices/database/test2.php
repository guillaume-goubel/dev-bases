<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	

<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$requete = $bdd->query('SELECT COUNT(DISTINCT possesseur) AS nb_possesseur FROM jeux_video WHERE possesseur=\'Patrick\'');
while ($donnees = $requete->fetch()) 
{
	echo ' '.$donnees['nb_possesseur'].'</br>';	
}

$requete->closeCursor();

?>