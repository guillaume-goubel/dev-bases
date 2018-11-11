<?php

/* $price ='13.00';
$first = substr($price, 0, -2); //13
$cents = substr($price, -2); //00
echo $first.'<span style ="font-size : 12px"'. $cents.'</span>';  */



function formatPrice($price){
    
    $explodedPrice = explode('.', $price);
    return  $explodedPrice[0] .',<span class="card-price-cents">' .$explodedPrice[1]  .'</span> €';
}


?>

