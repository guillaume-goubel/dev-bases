<?php

//SESSION

/* $country_array = ['fr', 'it'];

session_start();
var_dump($_SESSION); // tableau est vide en début de session

$_SESSION['$country_array'] = $country_array  ; //définition de la variable  retenir dans la session
var_dump($_SESSION);  */

/* unset($_SESSION['$country_array']); */ // destruction de la session précise contry_array
/* session_destroy(); */ // destruction de toutes les sessions

//COOKIES///////////////////

/* var_dump($_COOKIE);
 */

$expiration = 365 * 3600 * 24;
setcookie('pseudo', 'toto', time() + $expiration );

echo "salut " .$_COOKIE['pseudo'];
