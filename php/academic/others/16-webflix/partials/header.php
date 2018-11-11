<?php
  // Inclusion du fichier functions
  require_once(__DIR__.'/../functions/common.php');
  // Inclusion du fichier config
  // require_once(__DIR__.'/../config/config.php');
  require_once(__DIR__.'/../functions/movie.php');
  require_once(__DIR__.'/../functions/user.php');
  // Inclusion du fichier database
  require_once(__DIR__.'/../config/database.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.ico">

        <title>Webflix</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
    </head>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <?php $user = isLogged(); ?>
        <h5 class="my-0 mr-md-auto font-weight-normal">
            <a class="navbar-brand" href=".">Webflix</a>
        </h5>
        <?php if ($user) { ?>
          <nav class="my-2 my-md-0 mr-md-auto">
            <a class="p-2 text-dark" href="movie_add.php">Ajouter un film</a>
          </nav>
        <?php } ?>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="#">Catalogue</a>
            <a class="p-2 text-dark" href="#">Tarifs</a>
            <?php if ($user) { ?>
              <strong>Hello <?= $user['username']; ?> !</strong>
              <a class="btn btn-outline-primary" href="logout.php">Se déconnecter</a>
            <?php } else { ?>
              <a class="btn btn-outline-primary" href="register.php">S'inscrire</a>
              <a class="btn btn-outline-primary" href="login.php">Se connecter</a>
            <?php } ?>
        </nav>
    </div>
