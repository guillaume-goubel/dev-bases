<?php

/*
1. Créer une boucle qui affiche 10 étoiles (*)
2. Imbriquer la boucle dans une autre boucle afin d'afficher 10 lignes de 10 étoiles
3. Nous obtenons un carré. Trouver un moyen de modifier le code pour obtenir
un triangle rectangle.
*/

echo '<h2>1. carre </h2>';
for ($i=0 ; $i<10; $i++){
   
    echo '⭐';

    for ($j=0 ; $j < 9; $j++){
    
    echo '⭐';
    }

    echo "<br>";
}


echo '<h2>2. triangle </h2>';
$fullStar = 1; // Nombre d'étoiles pleines
$indexStar = 5; // Position

for ($x = 0; $x < 6; $x++) {
    
    for ($y = 0; $y <=10; $y++) {
        
        if ($y == $indexStar) {
            for ($z = 0; $z < $fullStar; $z++) {
                echo '★';
            }
            $y += $fullStar - 1;
        } else {
            echo '☆';
        }
    }

    $fullStar += 2;
    $indexStar--;
    echo '<br />';
}

echo '<h2>2. table multiplication </h2>';

echo '<table cellspacing="0" cellpadding="3px" rules="rows"
style="border:solid 1px #777777; border-collapse:collapse; font-family:verdana; font-size:11px;"> ';


//1ere ligne du tableau avec le 'x'
echo '<tr><td>x</td>';

for ($z = 1; $z<11; $z++ ){
    // on affiche a chaque fois la valeur de $z en blanc
    echo '<td>'.$z.'</td>';
}

echo '</tr>';


for ($i=1; $i<11; $i++){

    // on affiche a chaque fois la valeur de $1 en blanc
    echo '<tr>' .'<td>'.$i.'</td>';
    
    for ($j=1; $j<11; $j++){

    echo '<td style="background-color:grey";>' . $i * $j.'</td>';
    }

    echo "</tr>";
}


