<?php

/*
* Permet de formatter un prix.
* Exemple: 13.00 devient 13,oo
*/
function formatPrice($price) {
	$explodedPrice = explode('.', $price);

	return $explodedPrice[0].'<span class="card-price-cents">€'.$explodedPrice[1].'</span>';
}
