<?php

class Post{

    /*****************
    * ! CONSTANTES
    ******************/

    /*****************
    * ! PROPRIETES
    ******************/

    private $_title;

    private $_slug;

    private $_content;

    private $_author;

    private $creationDate;

    private $_publicationDate;

    private $_category;

    private $_keyword;

    
    /*****************
    * ! METHODES
    ******************/

    //* CONSTRUCTEUR

    function __construct(string $title , string $author, string $content, string $category, string $keyword){

        $this->setTitle($title);
        // // $this->setSlug($slug);
        $this->setAuthor($author);
        // // $this->setCreationDate($creationDate);
        // // $this->setPublicationDate($publicationDate);
        $this->setContent($content);
        $this->setCategory($category);
        $this->setKeyword($keyword); 

    }

    //******************************* */
    private function setTitle($title)
    {
        $this->_title = $title;
        return $this;
    }
    
        public function getTitle()
    {
        return $this->_title;
    }


    //******************************* */
    private function setSlug($slug)
    {
        $this->_slug = $slug;
        return $this;
    }
        
        public function getSlug()
    {
        return $this->_slug;
    }


    //******************************* */
    private function setContent($content)
    {
        $this->_content = $content;
        return $this;
    }
    
        public function getContent()
    {
        return $this->_content;
    }


    //******************************* */
    private function setAuthor($author)
    {
        $this->_author = $author;
        return $this;
    }
    
        public function getAuthor()
    {
        return $this->_author;
    }



    //******************************* */
    private function setCreationDate($creationDate)
    {
        $this->_creationDate = $creationDate;
        return $this;
    }
    
        public function getCreationDate()
    {
        return $this->_creationDate;
    }


    //******************************* */
    private function setPublicationDate($publicationDate)
    {
        $this->_publicationDate = $publicationDate;
        return $this;
    }
    
        public function getPublicationDate()
    {
        return $this->_publicationDate;
    }


    //******************************* */
    private function setCategory($categories)
    {
        $this->_categories = $categories;
        return $this;
    }
    
        public function getCategory()
    {
        return $this->_categories;
    }


    //******************************* */
    private function setKeyword($keywords)
    {
        $this->_keywords = $keywords;
        return $this;
    }
    
        public function getKeyword()
    {
        return $this->_keywords;
    }


    //* ACTIONS

    public function inputText($data){
        return $this->surround("<input type='text' name=".$inputName." placeholder=".$inputName." value=".$this->_data["$inputName"] .">");       
    } 


}