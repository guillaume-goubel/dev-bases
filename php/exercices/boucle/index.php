<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

    <form method="POST" action="#">
        <div>
            <label for="example">Veuillez saisir un texte</label>
            <input id="example" type="text" name="text">
        </div>
        <div>
            <input type="submit" value="Envoyer">
        </div>
    </form>

</body>

</html>

<?php

$text = null;
$essais = 3;
$number = random_int(1, 120000);
echo $number."<br>";

if(empty($_POST)){
    echo "A vous de jouer, Vous avez $essais essais";
}

if (!empty($_POST)){
    $text = $_POST['text'];
    echo $text."<br>";
    
    if($number == $text){
        echo "Gagné";
    }

    if($number != $text){
        $essais = $essais +1 ;
        echo $essais;
    }
    
}




    






