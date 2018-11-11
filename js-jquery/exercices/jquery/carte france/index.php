<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    

    <div class="mapAndInfos">

        
        <div class="map">

            <?php

            require_once('carteregionsdefrance.svg');

            ?>

        </div>

        <div class="regionPresentation"></div>

    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="jquery.elevateZoom-3.0.8.min.js"></script>
    <script src="app.js"></script>
</body>
</html>