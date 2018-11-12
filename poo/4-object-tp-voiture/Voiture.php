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

    
    //GETTER
    public function get_marque()
    {
        return $this->_marque;
    }

    public function get_modele()
    {
        return $this->_modele;
    }

    public function get_couleur()
    {
        return $this->_couleur;
    }

    public function get_conducteur()
    {
        return $this->_conducteur;
    }


    //ACTION

    /* Démarrer (le véhicule doit être à l'arrêt)
    Avancer (le véhicule doit être démarrer)
    Freiner (le véhicule doit avancer)
    Tourner (la vitesse ne doit pas être > à 30 km/h)
    S'arrêter (le véhicule doit être en marche et à une vitesse de 0km/h) */

    public function demarrer(string $contact)
    {
    if($this->_marche === false && $contact === "on"){
        $this->_marche = true;
        return "Le moteur "  .$this->_marque ." a demarré";
    }
   
    else if ($this->_marche === true && $contact === "on")
    {
        return "Le moteur a déjà demarré";
    }

    else if($this->_marche === true && $contact === "off") {
        $this->_marche = false;
        return "Le moteur de la voiture ". $this->_marque  ." est maintenant arreté ";
    }

    } 

    public function avancer(int $vitesse_indique)
   {   
        if($this->_marche === true){
            return $this->_vitesse += $vitesse_indique;
        }
    }

    public function freiner(int $vitesse_indique)
    {

        if(!is_numeric($vitesse_indique)) {
            trigger_error('La vitesse indiquée doit être un chiffre', E_USER_WARNING);
        }

        if($this->_marche === false){
            return "La voiture doit être demarée pour freiner!";
        }
        if($this->_marche === true && $this->_vitesse >0){
            $this->_vitesse -= $vitesse_indique;
            return "La voiture " .$this->get_marque() ." freine pour aller à " .$this->_vitesse ." km/h";
        }

        if($this->_marche === true && $this->_vitesse = 0){
            return "La voiture doit rouler pour freiner !";
        }


    }

    
    public function tourner(string $direction)
    {
        
        if($this->_vitesse <= 30){

            switch($direction)
        
            {
                case "gauche":
                return "Roulant en dessous de 30km/h , le véhicule " .$this->get_marque() ." tourne à gauche";
                break;
    
                case "droite":
                return "Roulant en dessous de 30km/h , le véhicule " .$this->get_marque() ." tourne à droite";
                break;
            }
        }

        else{
            return "La voiture " .$this->get_marque() ." va trop vite pour tourner!";
        }
     
    }

    public function arret()
    {
        return $this->_vitesse -= $this->_vitesse ;
    }

}
