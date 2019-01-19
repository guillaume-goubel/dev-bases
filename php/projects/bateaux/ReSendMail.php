<?php

session_start();
unset($_SESSION['Step1']);
unset($_SESSION['Step2']);
unset($_SESSION['Step3']);
$_SESSION['flash']['success'] = "Vous pouvez renvoyer une demande de mail";
header('Location: http://localhost/dev-bases/php/projects/bateaux/modifyPassUser.php');

