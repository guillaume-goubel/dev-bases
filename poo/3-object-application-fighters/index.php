<?php

require_once __DIR__.'/Personnage.php'; 

//INSTANCIATIONS DES PERSOS
$batman = new Personnage('Batman', Personnage::MEDIUM );
$superman = new Personnage('Superman', Personnage::NOVICE);

echo '<h1>' .$batman->get_name() ." VERSUS " .$superman->get_name()   .'<h1>';

echo  '<h2>' .$batman->get_name()  .'</h2>';
echo '<div>' .'- ' .$batman->_experience . " d'experience" .'</div>' .'<br>'; 
echo '<div>' .'- ' .$batman->_life . " de vie" .'</div>'.'<br>';  

echo  '<h2>' .$superman->get_name()  .'</h2>';
echo '<div>' .'- ' .$superman->_experience . " d'experience" .'</div>' .'<br>'; 
echo '<div>' .'- ' .$superman->_life . " de vie" .'</div>'.'<br>';  

echo "<hr>";


//INTERACTIONS
echo $batman->sayHello($superman->_name) .'<br>';
echo $superman->sayHello($batman->_name) .'<br>';

echo "<strong> Score : Batman " .$batman->_life. "/ superman " .$superman->_life .'<br></strong>';  

$superman->attack($batman);
echo "Batman attaque lachement Superman <br> ";
echo "<strong> Score : Batman " .$batman->_life. "/ superman " .$superman->_life .'<br></strong>';  

echo "Batman riposte d'une attaque suivi d'une super attaque <br> ";
$batman->attack($superman);
$batman->SuperAttack($superman);
echo "<strong> Score : Batman " .$batman->_life. "/ superman " .$superman->_life .'<br></strong>';  

echo "Batman – Furax – fait une super attaque <br> ";
$superman->SuperAttack($batman);
echo "<strong> Score : Batman " .$batman->_life. "/ superman " .$superman->_life .'<br></strong>';

echo "Superman se soigne  <br> ";
$superman->seSoigner();
echo "<strong> Score : Batman " .$batman->_life. "/ superman " .$superman->_life .'<br></strong>';

echo "Batman tente une attaque secrète <br> ";
echo $batman->secretAttack($superman);
echo "<strong> Score : Batman " .$batman->_life. "/ superman " .$superman->_life .'<br></strong>';

echo "Superman encore affaiblie lance une double attaque <br> ";
$superman->SuperAttack($batman);
$superman->SuperAttack($batman);
echo "<strong> Score : Batman " .$batman->_life. "/ superman " .$superman->_life .'<br></strong>';

echo "Batman répond d'une attaque simple suivi d'une attaque secrète  <br> ";
$batman->attack($superman);
echo $batman->secretAttack($superman);
echo "<strong> Score : Batman " .$batman->_life. "/ superman " .$superman->_life .'<br></strong>';

echo "Superman est au tapie et Batman gagne un point d'expérience <br> ";
$batman->levelUp();
/* $batman->_experience = Personnage::EXPERT; */

echo '<div>' .$batman->_name . " a maintenant " .$batman->_experience . " d'experience" .'</div>' .'<br>'; 










