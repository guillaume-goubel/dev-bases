
<?php



$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try{
    
    $db = new PDO ('mysql:host=localhost;dbname=users;charset=UTF8', 'root' , '', $options);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_ASSOC); 

 } 
  
 catch (Exception $e)
{
    echo $e ->getMessage();
    //redirection vers GOOGLE
    header('https://www.google.com/search?q='.$e->getMessage());
} 

 catch(PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
    echo '<img src="data/pictures/giphy.gif">';
    die('Aie Aie Aie');
}


$sql = "SELECT * FROM informations";

$query = $db->query($sql);

$results = $query->fetchAll();
header("Content-type:application/json"); 
$results = json_decode($results);

echo($results);

















