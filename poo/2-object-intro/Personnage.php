<?php

class Personnage{

    /*******************
    * ! CONSTANTES
    ********************/
    const FOO = "foo";
    const BAR = "bar";


    /*******************
    * ! PROPRIETES
    ********************/
    private $_name;
    private $_age;


    /*******************
    * ! METHODES
    ********************/

    /*******************
    * * constructor
    ********************/
    function __construct($name, $age)
    {
    $this->set_Name($name); 
    $this->set_Age($age); 
    }  

/*     public function Methode_1(string $input) {
        $output = strtoupper($input);
        return $output ;
    } 

    public function direBonjour(string $nom){
        $bonjour = "bonjour".$nom;
        return $bonjour;
    }

    public function auRevoir(){
        $auRevoir = "Au revoir";
        return $auRevoir;
    }  */

    //SETTER
    private function set_Name($name){
        $this->_name = $name;
    }

    private function set_Age($age){
        $this->_age = $age;
    }


    
    //GETTER
    public function get_Name(){
        return $this->_name;
    }

    public function get_Age(){
        return $this->_name;
    }
    
}

