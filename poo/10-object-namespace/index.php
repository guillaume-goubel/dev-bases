<?php
/*     spl_autoload_register(function ($class) {
    include 'classes/namespaces/A/'.$class .'.php';
    include 'classes/namespaces/B/'.$class .'.php';
    include 'classes/namespaces/C/'.$class .'.php';
    include 'classes/namespaces/D/'.$class .'.php';
});  */ 

include "classes/namespaces/A/MaClass.php"; 
include "classes/namespaces/B/MaClass.php"; 

use \A\MaClass as mc1;
$object1 = new mc1; 
$object1->maMethode();

use \B\MaClass as mc2;
$object2 = new mc2; 
$object2->maMethode();



