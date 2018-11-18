<?php

// Je déclare une variable et je lui affecte une valeur (entier, int, integer)
$age = 26;

// Je veux afficher le contenu de la variable
echo 'Tu as ' . $age . ' ans';


$comptage = 0;
$donnees = array();
$donnees[] = 'John';
var_dump($donnees);
$donnees[] = 'Peter';
var_dump($donnees);
$donnees[] = 'Jack';
var_dump($donnees);
$donnees[1] = 'Matthew';
var_dump($donnees);
$comptage += count($donnees);
echo $comptage;



function calculSoldes($prix, $reduc = 20)
{
$prix_solde = $prix * ( (100-$reduc) / 100 );
return $prix_solde;
}

echo calculSoldes(100);
echo calculSoldes(100,25);
echo calculSolde(100,50);
