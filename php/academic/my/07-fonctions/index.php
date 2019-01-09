
<?php session_start(); 
// SESSION POUR ENREGISTRER LE NOMBRE DE CAMIONS (exercice 4)
?> 

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>

<body>

<?php



echo "<h1>1. Fonction simple</h1>";
function addition($a, $b) {
	return $a + $b;
}
echo addition(4, 6).'<br />';
echo addition(3, 9).'<br />';
echo addition(2, 0) + addition(9, 1).'<br />';


echo "<h1>2. Afficher ingrédients (splat operator) </h1>";
function ShowMenu(...$ingrédients){
echo "Votre plat est composé de " . implode(',', $ingrédients);
}
ShowMenu('tomates', 'fromages', "crèmes");




echo "<h1>3. Afficher identité (retourner plusieurs variables) </h1>";
function identite($nom, $prenom, $adresse){

	$personnes = [
	
		0 => [
			'nom' => $nom,
			'prenom' => $prenom,
			'adresse' => $adresse,
		],
	];
	
	foreach (
		$personnes as $key => $personne) {
			echo ucfirst($personne['nom'] ."</br>");
			echo ucfirst($personne['prenom'] ."</br>");
			echo ucfirst($personne['adresse'] ."</br>");
	}
	
}

$nom = 'dupont';
$prenom = 'toto';
$adresse = 'rue du parc';
echo identite($nom, $prenom, $adresse);

echo "<h1>4. Afficher nombre camions (portée globale / statique) </h1>";

$string = 'La flotte contient un nombre de camions de : ';

$sessionDestroy = null;
if (isset($_GET['session'])){
	$_SESSION = array();
}

if (!empty($_GET['nb']) AND isset($_GET['mod'])){
	$newNb = $_GET['nb'];
	flotteCamions(true);

} elseif (!empty($_GET['nb']) AND !isset($_GET['mod'])) {
	$newNb = $_GET['nb'];
	flotteCamions();
}

function flotteCamions($mod = false){

	global $newNb;
	global $string;
	
	static $nb = 0;

	if(!is_numeric($newNb)){
		$newNb = 0;
	}

	elseif (is_numeric($newNb)){
		$nb += $newNb;
		$_SESSION['flotte'] += $nb;
	}	
	
	if($mod){
		echo $string .$_SESSION['flotte'];
	}
}

?>

	<form action="#" method="GET">

		<input name="nb" type="text">
		<input type="radio" name="mod" value="true">
		<input type="radio" name="session" value="destroy" id="session">
		<button type="submit">POUR AFFICHER</button>

	</form>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
	 crossorigin="anonymous"></script>
	<script type="text/javascript" src="js.js"></script>
</body>

</html>