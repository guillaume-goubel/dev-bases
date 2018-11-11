<?php

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_ASSOC,
];

try{
    
    $db = new PDO ('mysql:host=localhost;dbname=pizzastore;charset=UTF8', 'root' , '', $options); // 1er temps CONNECTION
/*     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_ASSOC); */

/* } catch (Exception $e){
    echo $e ->getMessage();
    //redirection vers GOOGLE
    header('https://www.google.com/search?q='.$e->getMessage());
} */

} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}




// écrire la requete pour recupérer l'id de la pizza 3
echo ("<h2> 1. Récupèrer une pizza spécifique </h2>");
$query = $db->query('SELECT * FROM pizza WHERE id = 3');
$pizza = $query->fetch();
echo    $pizza['id'] .$pizza['name'] .'<br/>';

 
//Récupérer l'id dynamique dans l'URL (ex , si je saisis pizza.php?id=7)
echo ("<h2> 2. Récupèrer une pizza spécifique dans url </h2>");
/* var_dump($_GET['id']); */

if(!empty($_GET['id'])){
    $id = $_GET['id'];
} else{
    $id = 0;
}

if (is_numeric($id) === false)
{
    exit('Merci de choisir une proposition numérique !');
} 


if ($id < 0  ||  $id >7  ||  $id === 0  )
{
    exit('Choix de la pizza inexistant !');
} 

else
{
    $query = $db->query('SELECT * FROM pizza WHERE id = '.$id);
}

/* $pizzas = $query->fetchAll();

foreach($pizzas as $key => $pizza)
{
   var_dump('http://localhost/php2/12-pdo/pizza.php?id='.$id);
   echo $pizza['name'].'<br/>';
}   */

$pizzas = $query->fetch();
var_dump('http://localhost/php2/12-pdo/pizza.php?id='.$id);
echo $pizzas['id'] .$pizzas['name'] .'<br/>'; 



//Requete préparée)
echo ("<h2> 3. Requete préparée </h2>");

$query = $db -> prepare('SELECT * FROM pizzza WHERE :id');

$query -> bindValue(':id', 5, PDO::PARAM_INT);
$query -> execute();

$result = $query -> fetch();
echo $pizzas['id'] .$pizzas['name'] .'<br/>'; 






?>