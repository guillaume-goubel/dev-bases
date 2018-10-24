<?php

////////////////
//Variables
///////////////

$currentPageTitle = 'Nos pizzas';


////////////////
//Include
///////////////
require_once __DIR__.'/partials/header.php';


////////////////
//Developpement
///////////////
$query = $db -> query('SELECT * FROM pizza');
$pizzas = $query->fetchAll();
?>

<main> 

<h1>PIZZAS LISTES</h1>

<?php


foreach ($pizzas as $key => $pizza) {
    echo "<h2>"  .$pizza['name']  ."</h2>" . "<br>";
} 
?>

</main>


        


