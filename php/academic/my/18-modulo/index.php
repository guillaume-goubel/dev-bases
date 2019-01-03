<?php

$i=1;

echo "<table style='width:100%';>";

while($i<=10){
    
    //si modulo = 0 alors pair donc rouge
    if($i % 2 === 0 ){
        echo "<tr style='background-color:#ff0000';>";
    }
    else {
        echo "<tr style='background-color:#46a5e0';>";
    }

    echo "<td>".$i."</td>";
    echo "</tr>";
    $i++;
}

echo "</table>";

