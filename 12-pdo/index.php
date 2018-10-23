<?php

//on créé une connection PDO


try{
    $db = new PDO ('mysql:host=localhost;dbname=pizzastore;charset=UTF8', 'root' , '' , [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,] );
} catch (Exception $e){
    echo $e ->getMessage();
    //redirection vers GOOGLE
    header('https://www.google.com/search?q='.$e->getMessage());
}

// on créé une requete pour récupérer les pizza
$query = $db->query('SELECT * FROM pizza');
var_dump($query);

//on récupère une pizza
$pizzas2 = $query->fetch(); 
/* var_dump($pizza2);  */

//on récupère une pizza
/* $pizzas = $query->fetchAll(); 
var_dump($pizzas);   */


//parcourir toutes les pizzas avec fetchAll
/* foreach($pizzas as $key => $pizza)
{
    echo $key .'<h2>'. $pizza['name'].'<br/>' .'</h2>';
} */

//parcourir toutes les pizzas avec le fetch

while($pizza = $query->fetch()){
    echo $pizza['name'].'<br/>';
}


?>