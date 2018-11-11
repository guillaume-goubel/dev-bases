<?php
require_once __DIR__.'/../config/config.php'; 
require_once __DIR__.'/../config/database.php';
require_once __DIR__.'/../config/functions.php';

?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="data/favicon/favicon-16x16.png">
    <link rel="manifest" href="data/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="data/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">


    <title>

        <?php 

        if (empty($currentPageTitle)) { // si on est sur la page d'accueil
        echo $siteName. '- notre pizzeria en ligne';
        } else { // si on est pas sur la page d'accueil
        echo $siteName . " - " .$currentPageTitle ;
        }

        ?>

    </title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
        
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/octicons/4.4.0/font/octicons.min.css">

    

    <link rel="stylesheet" href="assets/styles/css/styles.min.css">

</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark" id="header-nav">
        <a class="navbar-brand" href="#"><?= $siteName ?> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbar-pizzastore">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?= ($currentPageUrl  === 'index')? 'active' : ''; ?>"  >
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <li class="nav-item  <?= ($currentPageUrl  === 'pizza_list') ? 'active' : ''; ?>" >
                    <a class="nav-link" href="pizza_list.php">Liste des pizzas</a>
                </li>

                <li class="nav-item  <?= ($currentPageUrl  === 'pizza_update') ? 'active' : ''; ?>" >
                    <a class="nav-link" href="pizza_update.php">Ajouter des produits</a>
                </li>

            </ul>
        </div>
    </nav>





