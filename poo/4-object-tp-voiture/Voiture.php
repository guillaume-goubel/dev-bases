<?php

class Voiture {

    /*****************
    * ! CONSTANTES
    ******************/

    /*****************
    * ! PROPRIETES
    ******************/

    /**
    * @param string 
    */
    public $_marque;

    /**
    * @param string 
    */
    public $_modele;

    /**
    * @param string 
    */
    public $_couleur;

    /**
    * @param bool
    * @defautl false 
    */
    public $_marche = false;

    /**
    * @param int 
    * @defautl 0
    */
    public $_vitesse = 0;

    /**
    * @param int 
    */
    public $_conducteur;

    /*****************
    * ! METHODES
    ******************/
    // CONSTRUCTOR

    function __construct(string $marque, string $modele, string $couleur, string $conducteur)
    {
        $this->set_marque($marque);
        $this->set_modele($modele);
        $this->set_couleur($couleur);
        $this->set_conducteur($conducteur);
    }

    //SETTER
    private function set_marque($marque)
    {
        $this->_marque = $marque;
    }

    private function set_modele($modele)
    {
        $this->_modele = $modele;
    }

    private function set_couleur($couleur)
    {
        $this->_couleur = $couleur;
    }

    private function set_conducteur($conducteur)
    {
        $this->_conducteur = $conducteur;
    }



    //ACTION

    /* Démarrer (le véhicule doit être à l'arrêt)
    Avancer (le véhicule doit être démarrer)
    Freiner (le véhicule doit avancer)
    Tourner (la vitesse ne doit pas être > à 30 km/h)
    S'arrêter (le véhicule doit être en marche et à une vitesse de 0km/h) */

    public function demarrer()
    {
        if($this->_marche === false){
            $this->_marche = true;
            return "la voiture a demarrer";
    }
   
    else
    {
        return "la voiture est à l'arret";
    }

    } 




    public function avancer(int $vitesse_indique)
    {
        if($this->_marche === true){
            $this->_vitesse = $vitesse_indique;
        }
    }




    public function freiner(int $vitesse_indique)
    {
        if($this->_marche === true && $this->_vitesse >0){
            $this->_vitesse -= $vitesse_indique;
        }
    }

    
    public function tourner(string $direction)
    {
        
        if($this->_vitesse < 30){

            switch($direction)
        
            {
                case "gauche":
                return "la voiture tourne à gauche";
                break;
    
                case "droite":
                return "la voiture tourne à droite";
                break;
            }
        }

        else{
            return "la voiture va trop vite!";
        }
        

        
    }


}
