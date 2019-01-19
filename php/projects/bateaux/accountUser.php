<?php 
require_once __DIR__.'/partials/header.php';

$userInfo = getUserAuthenticated($_SESSION['authenticatedUserId']); // on récupère le return de la fonction avec l'id de la session via la variable $userInfo

require_once __DIR__.'/view/accountUserView.php';
require_once __DIR__.'/partials/footer.php';
