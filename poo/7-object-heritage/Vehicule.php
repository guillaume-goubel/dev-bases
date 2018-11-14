<?php
require_once __DIR__.'/Utils.php';

abstract class Vehicule {

    /*****************
    * ! CONSTANTES
    ******************/

    /*****************
    * ! PROPRIETES
    ******************/

    /**
    * @param string 
    */
    private $_marque;


    /**
    * @param string 
    */
    private $_modele;


    /**
    * @param string 
    */
    private $_couleur;


    /**
    * @param bool
    * @defautl false 
    */
    private $_marche = false;


    /**
    * @param int 
    * @defautl 0
    */
    private $_vitesse = 0;


    /**
    * @param int 
    */
    private $_conducteur;


    /**
    * @param int 
    */
    private $_vitesseMax = 0;


    /*****************
    * ! METHODES
    ******************/

    //*CONSTRUCTOR
    function __construct(string $marque, string $modele, string $couleur, string $conducteur = "")
    {
        $this->set_marque($marque);
        $this->set_modele($modele);
        $this->set_couleur($couleur);
        $this->set_conducteur($conducteur);


        //EXEMPLE DE VARIABLES DANS LE CONSTRUCTEUR
        /* $p = $this->getPuissance(); */
        $f = fopen("voiture.txt", "a+");
        fwrite($f, date("Y-m-d H:i:s"). " Nouvelle voiture crée : ".$marque ."\n");
        fclose($f);
    }


    //******************************* */
     private function set_marque($marque)
    {
        $this->_marque = $this->Format_set_marque($marque);
        return $this;   
    }

    public function get_marque()
    {
        return $this->_marque;
    }
 
    private function Format_set_marque($marque)
    {
        // return strtoupper($marque); 
        return Utils::myUcfirst($marque);
    }



    //******************************* */
    protected function set_modele($modele)
    {
        $this->_modele = $modele;
        return $this;
    }

    public function get_modele()
    {
        return $this->_modele;
    }


    //******************************* */
    private function set_couleur($couleur)
    {
        $this->_couleur = $this->Format_set_couleur($couleur);
        return $this;
    }

    public function get_couleur()
    {
        return $this->_couleur;
    }

    private function Format_set_couleur($couleur)
    {
        // return strtoupper($marque); 
        return Utils::myUcfirst($couleur); 
    }


    //******************************* */
    private function set_conducteur($conducteur)
    {
        $this->_conducteur = $conducteur;
        return $this;
    }

    public function get_conducteur()
    {
        return $this->_conducteur;
    }

    //******************************* */
    private function set_vitesseMax($vitesseMax)
    {
        $this->_vitesseMax = $vitesseMax;
        return $this;
    }

    public function get_vitesseMax()
    {
        return $this->_vitesseMax;
    }


    //******************************* */
    public function get_vitesse()
    {
        return $this->_vitesse;
    }


    //*ACTIONS
    public function demarrer()
    {

        $contact = null;

        if (empty($this->_conducteur))
        {
            $contact = false;

            return "la voiture ne peut pas demarrer car il n'y a pas de chauffeur !";

        } else if (!empty($this->_conducteur)) {
            $contact = true;
    }


    if($contact){
        $this->_marche = true;
        
        return "Le moteur ".$this->_marque ." a demarré";
    }
   
        else if ($this->_marche && $contact)
        {
            return "Le moteur a déjà demarré";
        }

            else if($this->_marche && !$contact) {
                $this->_marche = false;
                return "Le moteur de la voiture ". $this->_marque  ." est maintenant arreté ";
            }
    } 


    public function avancer(int $vitesse_indique)
   {   

    if ($this->_marche){     
          $this->_vitesse += $vitesse_indique;
          
          if ($this->_vitesse > $this->_vitesseMax ) {
            return $this->_vitesseMax = $this->_vitesse;
           }
        }
    }

    
    public function freiner(int $vitesse_indique)
    {
        if(!is_numeric($vitesse_indique)) {
            trigger_error('La vitesse indiquée doit être un chiffre', E_USER_WARNING);
        }

        if(!$this->_marche){
            return "La voiture doit être demarée pour freiner!";
        }
        if($this->_marche && $this->_vitesse >0){
            $this->_vitesse -= $vitesse_indique;
            return "La voiture " .$this->get_marque() ." freine pour aller à " .$this->_vitesse ." km/h";
        }

        if($this->_marche && $this->_vitesse = 0){
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
