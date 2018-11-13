<?php

require_once __DIR__.'/Voiture.php';

// $compteur_voiture1 = [0];
// $compteur_voiture2 = [0];
// $compteur_voiture3 = [0];

$voiture1 = new Voiture('Ford', 'Ranger', 'Noire', 'Michel');
$voiture2 = new Voiture('Toyota', 'Hillux', 'Blanc', 'Jean');
$voiture3 = new Voiture('Doge', 'RAM 1500', 'Rouge', 'Janine');


echo "<strong>Démarrer les véhicules 1 et 3</strong>" ."<br>";
echo $voiture1->demarrer("on") ."<br>";
echo $voiture3->demarrer("on") ."<br>"; 

echo "<strong>le véhicule 1 accélère jusqu'à 50km/h</strong>". "<br>";
echo "La " .$voiture1->get_marque() ." avance à la vitesse de "  .$voiture1->avancer(50) ."Km/h" ."<br>";
// array_push($compteur_voiture1,$voiture1->_vitesse);

echo "<strong>le véhicule 3 accélère jusqu'à 30km/h</strong>". "<br>";
echo  "La " .$voiture3->get_marque() ." avance à la vitesse de "  .$voiture3->avancer(30) ."Km/h" ."<br>";
// array_push($compteur_voiture3,$voiture3->_vitesse);

echo "<strong>les deux véhicules tournent à droite</strong>". "<br>";
echo  "La " .$voiture1->get_marque() ." tente de tourner" ."<br>";
echo  "La " .$voiture3->get_marque() ." tente de tourner" ."<br>";

echo  $voiture1->tourner("droite")."<br>";
echo  $voiture3->tourner("droite")."<br>"; 

echo "<strong>le véhicule 1 ralenti de 30km/h</strong>". "<br>";
echo  $voiture1->freiner(30)."<br>";
// array_push($compteur_voiture1,$voiture1->_vitesse);

echo "<strong>le véhicule 3 accélère de 40km/h</strong>". "<br>";
echo  "La " .$voiture3->get_marque() ." avance à la vitesse de "  .$voiture3->avancer(40) ."Km/h" ."<br>";
// array_push($compteur_voiture3,$voiture3->_vitesse);

echo "<strong>le véhicule 1 tourne à gauche</strong>". "<br>";
echo  "La " .$voiture1->get_marque() ." tente de tourner" ."<br>";
echo  $voiture1->tourner("gauche")."<br>"; 

echo "<strong>On arrête tous les véhicules</strong>". "<br>";
echo  "La " .$voiture1->get_marque() ." semble s'arreter et diminue sa vitesse de " .$voiture1->get_vitesse() ." km/h pour être définitivement à " .$voiture1->arret() ." km/h" ."<br>";
// array_push($compteur_voiture1,$voiture1->_vitesse);

echo  "La " .$voiture3->get_marque() ." semble s'arreter et diminue sa vitesse de " .$voiture3->get_vitesse() ." km/h pour être définitivement à " .$voiture3->arret() ." km/h" ."<br>";
// array_push($compteur_voiture3,$voiture3->_vitesse);

echo $voiture1->demarrer("off") ."<br>";
echo $voiture3->demarrer("off") ."<br>"; 

echo "<h2>" .$voiture1->get_conducteur() ." au volant de son véhicule " .$voiture1->get_marque() ." a été à un maximum de " .$voiture1->get_vitesseMax(). "km/h <h2> <br>" ;
echo "<h2>" .$voiture2->get_conducteur() ." au volant de son véhicule " .$voiture2->get_marque() ." a été à un maximum de " .$voiture2->get_vitesseMax(). "km/h <h2> <br>" ;
echo "<h2>" .$voiture3->get_conducteur() ." au volant de son véhicule " .$voiture3->get_marque() ." a été à un maximum de " .$voiture3->get_vitesseMax(). "km/h <h2> <br>" ;





