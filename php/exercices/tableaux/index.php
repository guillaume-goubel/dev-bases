<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<?php
$eleves = [
    
    0 => [
        'nom' => 'Matthieu',
        'notes' => [10, 8, 16, 20, 17, 16, 15, 2]
    ],
    1 => [
        'nom' => 'Thomas',
        'notes' => [4, 18, 12, 15, 13, 7]
    ],
    2 => [
        'nom' => 'Jean',
        'notes' => [17, 14, 6, 2, 16, 18, 9]
    ],
    3 => [
        'nom' => 'Enzo',
        'notes' => [1, 14, 6, 2, 1, 8, 9]
    ]

];

    foreach ($eleves as $key => $eleve) {
    echo($eleve['nom']);

        foreach ($eleve['notes'] as $key2 => $note) {            
            
            
            echo($note) .", ";
    } 
    
    echo "<br>";

}



$sum = 0;

foreach ($eleves[2]['notes'] as $key => $value) {
    $sum += $value;
}

$nbNotes = count($eleves[2]['notes']) ;

$moyenne = $sum / $nbNotes ;
echo round($moyenne,1);



echo "<h1>Moyenne</h1>";


foreach ($eleves as $key => $eleve) {

    echo array_sum($eleve['notes']);
        
    foreach ($eleve['notes'] as $key2 => $note) {            
            
    } 
    
    echo "<br>";

}








?>





    
</body>
</html>