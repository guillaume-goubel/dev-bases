<?php

require_once __DIR__.'/Voiture.php';

$voiture1 = new Voiture('Ford', 'Ranger', 'Noire', 'Michel');
$voiture2 = new Voiture('Toyota', 'Hillux', 'Blanc', 'Jean');
$voiture3 = new Voiture('Doge', 'RAM 1500', 'Rouge', 'Janine');


$voiture2->demarrer();
var_dump($voiture2);

$voiture2->avancer(50);
var_dump($voiture2);
