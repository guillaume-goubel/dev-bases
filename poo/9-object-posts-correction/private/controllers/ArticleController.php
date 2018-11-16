<?php

namespace Controllers;

use\Models\ArticleModel;

class ArticleController extends Post {
    
    const TYPE = "article";
    
    // proprétie de l'article
    // Tableau de la liste des articles déclaré dans le construteur
    private $_articles = [];

    private $_model;


    public function __construct(){   
        $this->_model = new ArticleModel;
        var_dump($this->_model->getAll());
    }
    
    /**
    * Boucle sur les articles et les affiches
    */
    public function ViewAll()
    {   
        foreach ($this->_model->getAll() as $article) {
        }
    }



}