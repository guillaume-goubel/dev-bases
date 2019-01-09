<?php 
session_start();
require_once __DIR__.'/partials/header.php';


$userId = $_SESSION['authenticatedUserId']; // on récupère l'id de la session

$userInfo = getUserAuthenticated($userId); // on récupère le return de la fonction avec l'id de la session via la variable $userInfo

?>
<!-- Jumbotron -->
<div class="jumbotron text-center">
    <h2 class="card-title h2">Votre compte</h2>
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 pb-2">
            <p class="blue-text my-4 font-weight-bold">Bonjour <?= $userInfo['user_name']  ?>  </p> 
        </div>
    </div>
</div>


<?php 
require_once __DIR__.'/partials/footer.php';
?>