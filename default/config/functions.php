<?php


function FrenchDate($usDate){

$usDateExplode = explode('-', $usDate);
$frenchDate = $usDateExplode[2]."-".$usDateExplode[1]."-".$usDateExplode[0];
return $frenchDate ;
}



