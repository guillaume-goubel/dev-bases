<?php require_once __DIR__.'/partials/header.php'; ?>

<main>

    <?php

$name = $last_name = $year = null;

$file = "data/users.csv";

$open_file = file_get_contents($file);
$exp = explode("\n" , $open_file);
var_dump($exp);

unset($exp[0]);

 foreach ($exp as $key => $value) {

    if (!empty($value)){

        $sql = "INSERT INTO users
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

<div id="result"></div>

<button id="btn">GO</button>

</main>

<?php require_once __DIR__.'/partials/footer.php'; ?>