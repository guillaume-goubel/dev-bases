<?php
require_once __DIR__.'/Utils.php';
require_once __DIR__.'/Vehicule.php';
require_once __DIR__.'/Moto.php';
require_once __DIR__.'/Auto.php';

$moto1 = new Moto("HONDA", "Spirit", "Noire");
var_dump($moto1);
$auto1 = new Auto("Renault", "Twingo", "rouge");
var_dump($auto1);
$auto2 = new Auto("BMW", "Twingo", "rouge");

echo $auto1->get_marque();
echo $auto1->get_couleur();

echo Moto::ROUES;






