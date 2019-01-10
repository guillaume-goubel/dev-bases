<?php 
require_once __DIR__.'/partials/header.php';

$userId = $_SESSION['authenticatedUserId']; // on récupère l'id de la session

$userInfo = getUserAuthenticated($userId); // on récupère le return de la fonction avec l'id de la session via la variable $userInfo

require_once __DIR__.'/view/accountUserView.php';

require_once __DIR__.'/partials/footer.php';
