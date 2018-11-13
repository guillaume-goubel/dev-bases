<?php

class Voiture{

    
    /*****************
    * ! CONSTANTES
    ******************/

    /*****************
    * ! PROPRIETES
    ******************/
    private $_brand;
    private $_model;

    /*****************
    * ! METHODES
    ******************/

    //* CONSTRUCTEUR
    function __construct(string $brand, string $model){
        
        $this->set_brand($brand);
        $this->set_model($model);
    }

    // Ici on veut que le nom soit en minuscule SAUF la première lettre qui est en majuscule
    // Utilisation des statics avec une classe utils

    //* SETTER
    function set_brand($brand){
        $this->_brand = Utils::myUcFirst($brand);
        return $this;
    }

    function set_model($model){
        $this->_model = $model;
        return $this;
    }

    //* GETTER
    function get_brand(){
        return $this->_brand;
    }

    function get_model(){
        return $this->_model;
    }

    //* ACTIONS


}