<?php

session_start();
unset($_SESSION['demandChangePass']);
$_SESSION['flash']['success'] = "Vous pouvez renvoyer une demande de mail";
header('Location: http://localhost/dev-bases/php/projects/bateaux/modifyPassUser.php');

