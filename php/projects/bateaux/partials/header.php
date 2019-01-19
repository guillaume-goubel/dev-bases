<?php 

require_once __DIR__.'/../config/database.php'; 
require_once __DIR__.'/../config/functions.php';
require_once __DIR__.'/../autoLoginUser.php';

if(session_status() == PHP_SESSION_NONE ){
    session_start();
}


/********************************
 * COOKIE
 ********************************/
// if(isset($_COOKIE['userIdAuth'])){
//     var_dump('COOKIE : '.$_COOKIE['userIdAuth']);
// }else{
//     echo 'pas de cookie <br>';
// }

if(isset($_SESSION['authenticatedUserId'])){
    $userId = $_SESSION['authenticatedUserId']; 
    $userInfo = getUserAuthenticated($userId);
} 
    // var_dump($userInfo);  
//     var_dump('SESSION : ' . $userId);
// }else{
//     echo 'pas de session <br>';
// }
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>

    </title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/styles/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles/css/mdb.css">
    <link rel="stylesheet" href="assets/styles/css/styles.css"> 
</head>

<body>
    <header>
        <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">

                    <div class="col-sm-4 offset-md-1 py-4">
                        <h4 class="text-white">Menu</h4>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white">Menu1</a></li>
                            <li><a href="#" class="text-white">Menu2</a></li>
                            <li><a href="#" class="text-white">Menu3</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container d-flex justify-content-between">
                <a href="index.php" class="navbar-brand d-flex align-items-center">
                    <strong>Accueil</strong>
                </a>

                <!-- Si le user est connecté , alors on affiche son nom et la date de connexion -->
                <?php if(isset($userInfo['user_name'])):?>
                    <span href="index.php" class="navbar-brand d-flex align-items-center"> 
                        Bienvenue : <?= $userInfo['user_name']?>
                    </span>
                <?php endif;?>
 
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader"
                    aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>

    <!-- MESSAGE FLASH -->
    <div id="flashContainer" class="container">

        <?php if(isset($_SESSION['flash'])) { 

        foreach($_SESSION['flash'] as $type => $message){ ?>

        <div id="flashMessage" class="alert alert-<?= $type ?>" role="alert">
             <?= $message ?>
        </div>

        <?php } }
        unset($_SESSION['flash']); // Le message est ensuite détruit - lors du rafraichissement il disparait
        ?>
</div>