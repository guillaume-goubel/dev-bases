<?php

namespace Controllers;

use \Models\ArticleModel;

class ArticleController extends PostController {
    
    const TYPE = "article";

    private $model;

    public function __construct()
    {
        $this->model = new ArticleModel;
    }

    /**
     * Boucle sur la liste des articles et les affiche
     */
    public function viewAll()
    {
        foreach ($this->model->getAll() as $article) {
            echo "<h3>".$article->title."</h3>";
            echo "<div>slug : ".$article->slug."</div>";
            echo "<div>".$article->content."</div>";
            echo "<hr>";
        }
    }
}