<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>



    <form name="choix" method="post" action="#">
        Entrez votre choix de pizza: <input type="text" name="choix" /> <br />
        <input type="submit" name="valider" value="OK" />
    </form>





    <?php



////////////////////////////
////// CONNECTION A LA BASE DE DONNEES
////////////////////////////

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_ASSOC,
];

try{
    
    $db = new PDO ('mysql:host=localhost;dbname=pizzastore;charset=UTF8', 'root' , '', $options); // 1er temps CONNECTION


} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
    header('https://www.google.com/search?q='.$e->getMessage());
}




////////////////////////////
////// DEFINITON DES VARIABLES 
////////////////////////////

$choix = $_POST['choix'];



////////////////////////////
////// DEFINITON DE LA REQUETE
////////////////////////////

echo ("<h2> 3. Requete préparée </h2>");

$query = $db->prepare('SELECT * FROM pizza WHERE id = :id');

$query -> bindValue(':id', $choix, PDO::PARAM_INT);
$query -> execute();

$pizza = $query -> fetch();
echo $pizza['name'] .'<br/>'; 

?>

</body>

</html>