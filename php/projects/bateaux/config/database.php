<?php
//////////////////////////
///CONNECTION TO DATA BASE
/////////////////////////

try{
    $db = new PDO ('mysql:host=localhost;dbname=bateaux;charset=UTF8', 'root' , '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_ASSOC); 
    $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_WARNING); 

} 
 
 catch(Exception $e){
    echo $e ->getMessage();
    //redirection vers GOOGLE
    header('https://www.google.com/search?q='.$e->getMessage());
} 

 catch(PDOException $e){
    echo "Database connection failed: " . $e->getMessage();
    echo '<img src="assets/images/giphy.gif">';
    die('Aie Aie Aie');
}


