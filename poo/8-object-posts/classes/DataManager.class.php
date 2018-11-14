<?php

class DataManager {

    /*****************
    * ! CONSTANTES
    ******************/

    /*****************
    * ! PROPRIETES
    ******************/

    /**
    * Propriété précisant le mode de connexion. Ici via l'instanciation de l'objet PDO.
    */
    private $_connexion;


    /*****************
    * ! METHODES
    ******************/

    //* CONSTRUCTEUR
    function __construct(PDO $connexion){
        $this->setConnexion($connexion);
    }
    
    //* SETTER
    public function setConnexion($connexion){
        $this->_connexion = $connexion;
        return $this;
    }

    //* GETTER
    
    //* ACTIONS

    public function create(){

    }

    public function read(){

    }

    public function readAll(){
        
    }

    public function update(){
        
    }

    public function delete(){
        
    }





}