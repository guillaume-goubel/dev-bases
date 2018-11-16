<?php

function autoload_controllers($class) {
    /* $class = preg_repalce("") Mettre le preg_replace() */ 
    include_once '../private/'.$class . '.php'; // on enlève Controllers sinon Controllers est applé deux foix
}
spl_autoload_register('autoload_controllers');


function autoload_models($class) {
    include_once '../private/'.$class . '.php'; // on enlève Models sinon Models est applé deux foix
}
spl_autoload_register('autoload_models');




use \Controllers\ArticleController as Article;
use \Controllers\User;
use \Models\ArticleModel;

$articles = new Article;
$articles->ViewAll();

var_dump($articles);

// // Prépare un tableau pour afficher (plus tard) tous les articles
// $articles = [];

// // --- Création des données


