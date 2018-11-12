<?php

class Personnage2 {

    /***********************
    * * ATTRIBUTS   
    ************************/

    // Variables
    private $_force;

    // Static
    const FORCE_PETITE = 20;
    const FORCE_MOYENNE = 50;
    const FORCE_GRANDE = 80;
    const FORCE_COLOSSALE = 120;

    private static $_race = "C'est nous les humains";

    /***********************
    * * CONSTRUCTOR 
    ************************/

    public function __construct($force)
    {
    $this->set_force($force); 
    }  


    /***********************
    * * METHODS
    ************************/

    //  Variables SETTERS
    public function set_force($force) {
    
        if (in_array($force, [self::FORCE_PETITE, self::FORCE_MOYENNE, self::FORCE_GRANDE, self::FORCE_COLOSSALE ]))
        {
          $this->_force = $force;
        }
    }

    
    //  Static SETTERS
    public static function parler(){
        return self::$_race;
    } 


}
