<?php


class Auto extends Vehicule {

    /*****************
    * ! CONSTANTES
    ******************/
     const ROUES = 4;

    /*****************
    * ! PROPRIETES
    ******************/

    /*****************
    * ! METHODES
    ******************/

    //* CONSTRUCTEUR
    //* SETTER
    //* GETTER

    public function get_marque()
    {
        /* return "====".$this->_marque ."====";  *//* il faut que $_marque soit en protected dans la parent véhicule */
        return "====". parent::get_marque() ."====";
    }
    //* ACTIONS

}
