
<?php
//////////////////////////
///CONNECTION TO DATA BASE
/////////////////////////

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

?>
