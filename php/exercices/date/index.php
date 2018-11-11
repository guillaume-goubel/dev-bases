<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>



    <div class="container-fluid">


        <!---------------Date actuelle--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
        <?php
        // Date 
        echo '<div id="jour">' ;
        echo '<h2>Date actuelle</h2>';

        $jour_fr = ["Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"]; 
        $mois_fr = ["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre", "Octobre", "Novembre", "Décembre"]; 

        echo '<p>Nous sommes ' .$jour_fr[date('w')] . ' ' .date('d') . ' '  . $mois_fr[date('m')]. ' ' .date('Y') .'</p>' ; 
        echo '<p>Il est '.date('H\h i\m s\s').'</p>';

        var_dump(date('w'));
        echo '</div>';

    ?>



        

        <!---------------Date dans x jours--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

        <div id="date-x-jours">
        <h2>Date dans x jours</h2>
            <form method="POST" action="index.php">

                <input type="number" name="range">
                <br>
                <button type="submit" class="btn btn-primary btn-sm">Choisir</button>

            </form>

            <?php

        if (empty($_POST['range']) || $_POST['range'] <= 0 )
        {
            echo '<p>Merci de choisir un chiffre supérieur à 0 !</p>';
        } 

        elseif ($_POST['range'] === 0){

            echo "Nous sommes aujourd'hui";
        }
        
        
        else {

        $days_number_choice = $_POST['range'];

        $day_choice = strtotime('+' .$days_number_choice .'days' ); 
        $day_choice_index = date('w', $day_choice );

        $day_choice_day = $jour_fr[$day_choice_index];
        echo 'Dans ' .'<strong>'.$days_number_choice .'</strong>' .' jours, nous serons un ' .'<strong>' .$day_choice_day .'</strong>';
        }
    ?>
        </div>





        


        <!-------------------compte à rebours anniversaire--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

        <div id="date-evenement">
        <h2>Date rebours événement</h2>

<!--                <form action="index.php" method="POST">
                
               <input type="number" name="range2" min="1" max="31" value="1" >
                <br> 
               
                <div class="col-auto my-1">
                    <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                    <select name="mois" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        <option selected>Choisir le mois</option>
                        <option value="January">Janvier</option>
                        <option value="February">Février</option>
                        <option value="March">Mars</option>
                        <option value="April">Avril</option>
                        <option value="May">Mai</option>
                        <option value="June">Juin</option>
                        <option value="July'">Juillet</option>
                        <option value="August">Aout</option>
                        <option value="September">Septembre</option>
                        <option value="October">Octobre</option>
                        <option value="November">Novembre</option>
                        <option value="December">Décembre</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Choisir évènement</button>
            </form>  -->

            <?php


    $timestamp= strtotime('now');
    $day_choice2 = 25;
    $mounth_choice2 = 'June';

    switch ($mounth_choice2) {
        case 'January':
        $mounth_fr2 = 'Janvier';
        break;

        case 'February':
        $mounth_fr2 = 'Février';
        break;

        case 'March':
        $mounth_fr2 = 'Mars';
        break;

        case 'April':
        $mounth_fr2 = 'Avril';
        break;

        case 'May':
        $mounth_fr2 = 'Mai';
        break;

        case 'June':
        $mounth_fr2 = 'Juin';
        break;

        case 'July':
        $mounth_fr2 = 'Juillet';
        break;

        case 'August':
        $mounth_fr2 = 'Aout';
        break;

        case 'September':
        $mounth_fr2 = 'Septembre';
        break;

        case 'October':
        $mounth_fr2 = 'Octobre';
        break;

        case 'November':
        $mounth_fr2 = 'Novembre';
        break;

        case 'December':
        $mounth_fr2 = 'Décembre';
        break;
}

    $year_choice2 = 2019;
    
    $time_date_futur = strtotime($day_choice2 .$mounth_choice2 .$year_choice2); 
    $sec = $time_date_futur - $timestamp;

    $min = $sec / 60;   
    $heures = $sec / 3600; 
    $jours = $heures / 24;

    echo "<p><strong> Il reste " .$sec ." secondes </strong></p>";
    echo "<p> Jusqu'à l'évènement du $day_choice2 $mounth_fr2 $year_choice2 </p>";

    $min1=round($min);
    $heures1=round($heures);
    $jours1=round($jours);
    ?>

            Vous pouvez convertir ce résultat en:
            <form method="POST" action="index.php">
                <input type="radio" name="rebour" value="minutes">Minutes
                <br>
                <input type="radio" name="rebour" value="heures">Heures
                <br>
                <input type="radio" name="rebour" value="jours">Jours
                <br>
                <button type="submit" class="btn btn-primary btn-sm">Choisir</button>
            </form>
            <?php




if (empty($_POST['rebour'])){

    echo 'merci de rentrer un choix !';

} else {

    $convertion = $_POST['rebour'];
    if ($convertion === 'minutes')  
    {
        echo 'il reste' .$min1 .' minutes' ;
    } 
      
    elseif ($convertion === 'heures')  
    {
        echo 'il reste' .$heures1 .'heures' ;
    } 
    
    elseif ($convertion === 'jours')   
    {
        echo 'il reste' .$jours1 .'jours' ;
    }

}

?>



    </div>



</body>

</html>