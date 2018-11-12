<?php require_once __DIR__.'/partials/header.php'; ?>

<main>

    <?php

$file = "data/users.csv";
$name = $last_name = $year = null;
$open_file = file_get_contents($file);


// $open_file = fopen($file, "r");
// var_dump($open_file);

// $data = fgetcsv($open_file, 1000, ",");
// var_dump($data);

// $num = count($data);
// $row = 1;



// if ($open_file !== FALSE) {
    
// /*      while ($data !== FALSE) {
       
//         $num = count($data);
//         echo "<p> $num champs à la ligne $row: <br /></p>\n";
//         $row++;
//   */      
//         for ($i=0; $i < $num; $i++) {
//             echo $data[$i] . "<br />\n"; 
//         }
    
// }  

$exp = explode("\n" , $open_file);
// var_dump($exp);

unset($exp[0]);

foreach ($exp as $key => $value) {
    // $exp[0];
    // $value = strstr("\n", null, $value);

   /*  $value = preg_replace("@(\s)?\n(\s)?@", null, $value ); */


    /* var_dump(strlen($value)); */
    if (!empty($value)){

        $sql = "INSERT INTO informations 
        (name,last_name,year)  
        VALUES
        (:name,:last_name,:year)";

        $update = $db->prepare($sql);

        $user = explode(",", $value);
    
        $name = $user[0];
        $last_name = $user[1];
        $year = $user[2];

        $update->bindValue(':name', $name, PDO::PARAM_STR);
        $update->bindValue(':last_name', $last_name, PDO::PARAM_STR);
        $update->bindValue(':year', $year, PDO::PARAM_STR);

        $update->execute();  
 
    }

}


?>




</main>

<?php require_once __DIR__.'/partials/footer.php'; ?>