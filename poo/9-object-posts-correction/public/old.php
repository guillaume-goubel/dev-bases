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

use \Controllers\ArticleController as Controller;
use \Controllers\User;
use \Models\ArticleModel;




// Prépare un tableau pour afficher (plus tard) tous les articles
$articles = [];

// --- Création des données

// Création des utilisateurs
$user_1 = new User("Clark", "KENT");

// Création de l'article 1
$article_1 = new ArticleController();
$article_1
    ->setTitle("Mon premier article avec PHP Objet")
    ->setContent("Lorem ipsum, bla bla bla....")
    ->setUser($user_1->getFirstname()." ".$user_1->getLastname());
array_push($articles, $article_1);

// Création de l'article 2
$article_2 = new ArticleController();
$article_2->setTitle("C'est l'heure d'envoyer ta lettre au père Noël.");
$article_2->setContent("Lorem ipsum, bla bla bla....");
$article_2->setUser($user_1->getFirstname()." ".$user_1->getLastname());
array_push($articles, $article_2);


// --- Affichage

// On affiche tous les articles
foreach ($articles as $article) {
    echo "<h3>".$article->getTitle()."</h3>";
    echo "<div>slug : ".$article->getSlug()."</div>";
    echo "<div>author : ".$article->getUser()."</div>";
    echo "<div>".$article->getContent()."</div>";
    echo "<hr>";
}