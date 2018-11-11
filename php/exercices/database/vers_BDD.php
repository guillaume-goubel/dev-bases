<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
<?php
// connexion à BDD
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','');
?>

<?php 
$bdd ->exec('UPDATE jeux_video SET possesseur = \'Patrick\' WHERE possesseur =\'Florent\'');
?>





<?php
$reponse = $bdd->query('SELECT * FROM jeux_video ORDER BY nom ASC');

while ($donnees = $reponse->fetch()){

	echo ''.$donnees['ID'].' --> '.$donnees['nom'].' --> '.$donnees['possesseur'].'<br/>';
}	

$reponse->closeCursor();
?>



</body>
</html>

