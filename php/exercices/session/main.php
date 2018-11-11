<?php 

session_start();

$_SESSION['prenom'] = 'Jean';
$_SESSION['nom'] = 'BODAR';
$_SESSION['age'] = 45;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Main</title>
</head>
<body>

<p>Tu veux en savoir plus ?</p>

<a href="information.php"/> Lien vers les informations </a>

</body>
</html>