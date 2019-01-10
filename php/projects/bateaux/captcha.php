<?php
//rendu en image de la page php
header('Content-type: image/jpeg');
$nb = mt_rand(1000, 9999);

// création du rectangle contenant l'image
$img = imagecreate(150,70);

//background color du rectangle
$bg = imagecolorallocate($img, 255, 255 ,255);
$textcolor = imagecolorallocate($img, 0, 0, 0);

//construction de l'image avec ses parametres de positionnement
imagettftext($img, 40, 0, 28, 62, $textcolor, 'C:\wamp64\www\dev-bases\php\projects\bateaux\assets\font\28DaysLater.ttf', $nb );
//création de l'image
imagejpeg($img);

//création d'une session avec le chiffre obtenu
session_start();
$_SESSION['captcha'] = $nb;

//destruction de l'image
imagedestroy($img);

//PS : l'image apparait dans une balise (notamment celle de usercreate Account)
















