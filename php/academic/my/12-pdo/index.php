<?php

//on créé une connection PDO


try{
    
    $db = new PDO ('mysql:host=localhost;dbname=pizzastore;charset=UTF8', 'root' , '' ); // 1er temps CONNECTION
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_ASSOC);

} catch (Exception $e){
    echo $e ->getMessage();
    //redirection vers GOOGLE
    header('https://www.google.com/search?q='.$e->getMessage());
}

// on créé une requete pour récupérer les pizza
$query = $db  ->  query ('SELECT * FROM pizza');   // 2eme temps  REQUETE SQL
var_dump($query);

//on récupère une pizza
/* $pizzas2 = $query->fetch(); */   // 3eme temps RECUPERATION
/* var_dump($pizza2);  */

//on récupère une pizza

/* $pizzas->fetchAll(PDO::FETCH_ASSOC ou NAMED ou NUM) */ //utilisation de fetch QUE avec les valuers associatives et non les valeurs numériques
$pizzas = $query->fetchAll(); 
var_dump($pizzas);  


//parcourir toutes les pizzas avec fetchAll
foreach($pizzas as $key => $pizza)
{
    echo '<h2>'. $pizza['name'].'<br/>' .'</h2>';
} 

//parcourir toutes les pizzas avec le fetch

/* while($pizza = $query->fetch()){
    echo $pizza['name'].'<br/>';
} */


?>