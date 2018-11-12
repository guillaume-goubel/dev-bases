<?php

class Personnage {

    /***********************
    * * ATTRIBUTS   
    ************************/
    private $_force;
    private $_degats;
    private $_experience;
    private $_name;
    private $_vitalite;


    /***********************
    * * CONSTRUCTOR 
    ************************/
    public function __construct($force, $degats, $name, $vitalite)
    {
    $this->set_force($force); 
    $this->set_degat($degats);
    $this->set_name($name); 
    $this->set_vitalite($vitalite); 

    $this->_experience = 1;
    }  


    /***********************
    * * METHODS
    ************************/
    // SETTERS
    public function set_force($force) {
    
        if (!is_int($force)) {
            trigger_error('La force d\'un personnage doit être un chiffre', E_USER_WARNING);
            return;
        }

        if ($force > 100) {
            trigger_error('La force d\'un personnage ne peut dépasser 100', E_USER_WARNING);
            return;
        } 

        else{
            $this->_force = $force;
        }
            
    }

    public function set_degat($degats) {

        if (!is_int($degats)) // S'il ne s'agit pas d'un nombre entier.
        {
        trigger_error('Le niveau de dégâts d\'un personnage doit être un nombre entier', E_USER_WARNING);
        return;
        }

        else{
            $this->_degats = $degats;
        }
    }

    public function set_name($name){

        if (!is_string($name))
        { 
        trigger_error('Le nom doit être une chaine de caractère', E_USER_WARNING);
        return;
        }

        else{
            $this->_name = $name;
        }

    } 

    public function set_vitalite($vitalite){

        if (!is_int($vitalite))
        { 
        trigger_error('La vitalité doit être un chiffre', E_USER_WARNING);
        return;
        }

        else{
            $this->_vitalite = $vitalite;
        }

    } 


    // GETTERS
    public function get_degats() {
        return $this ->_degats;
    }

    public function get_experience() {
        return $this ->_experience;
    }

    public function get_force() {
        return $this ->_force;
    }

    public function get_name() {
        return $this ->_name;
    }

    public function get_vitalite() {
        return $this ->_vitalite;
    }

    // ACTIONS
    public function frapper(Personnage $persoQuiEstFrappe) {
       return $persoQuiEstFrappe->_degats = $this->_force;

       if($persoQuiEstFrappe ->_vitalite <=0){
        return "le personnage est mort" ;
    }

    }


    public function gagnerExperience() {
        return $this ->_experience += 1;
    }

    public function VitaliteRestante(Personnage $persoQuiFrappe) {
        
        if($this->_vitalite > 0) {
            return $this ->_vitalite -= $persoQuiFrappe->_degats ;
        }

        if($this->_vitalite <=0){
            return "le personnage est mort" ;
        }
        
    }
}
