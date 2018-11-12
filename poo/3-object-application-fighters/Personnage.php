<?php


class Personnage {


    /*****************
    * ! CONSTANTES
    ******************/
    /******************
    * Niveau de l'expérience 
    *******************/
    const NOVICE = 1; 
    const MEDIUM = 2; 
    const EXPERT = 3; 


    /******************
    * ! PROPRIETES
    *******************/
    /**
    * @param string 
    */
    public $_name;

    /**
    * @param int
    * @defautl 100
    */
    public $_life = 100;

    /**
    * @param int
    */
    public $_experience;


    /******************
    * ! METHODES
    *******************/
    // CONSTRUCTOR
    function __construct(string $name, int $experience)
    {
        $this->set_name($name);
        $this->set_experience($experience);
    }  

    // SETTER
    function set_name($name){
        $this->_name = $name;
    }

    function set_experience($experience){

        if (in_array($experience, [self::NOVICE, self::MEDIUM, self::EXPERT]))
        {
          $this->_experience = $experience;
        }
    }

    // GETTER
    function get_name(){
        return $this->_name;
    }

    function get_life(){
        return $this->_life;
    }




    
    /**
    * Saluer l'adversaire
    * @param string $name qui est le nom de l'adversaire
    * @return string Perso A salue l'opponent
    */

    public function sayHello(string $opponent)
    {
        return $this->_name . " salue " .$opponent;
    }


    /**
    * On attaque l'adversaire 
    */

    public function attack($opponent, $coef = 1)
    {
        switch($this->_experience)
        
        {
            case self::NOVICE:
            $opponent->_life -= 10 * $coef ;
            break;

            case self::MEDIUM:
            $opponent->_life -= 20 * $coef;
            break;

            case self::EXPERT:
            $opponent->_life -= 30 * $coef;
            break;
        }
        
    }

     /**
    * Superattack sur l'adversaire 
    */

    public function SuperAttack($opponent)
    {
        $this->attack($opponent,2);
    }


     /**
    * L'un des personnages se soigne 
    */
    public function seSoigner()
    {
        $this->_life += 10;
    }


    /**
    * L'un des personnages fait une attaque secrete réussie si l'&adversaire à moins de 50 de vie
    * @return string Echec en cas d'échec
    */
    public function secretAttack($opponent)
    {
        if ($opponent->_life < 50){
            $opponent->_life = 0 ;
            return "Réussite de l'attaque secrete ! <br>" ;
        }

        else{
            return "Echec de l'attaque secrete ! <br>" ;
        }
    }


    /**
    * L'un des personnages gagne en experience
    */
    public function levelUp()
    {
        switch($this->_experience){

            case self::NOVICE:
            $this->_experience = self:: MEDIUM;
            break;

            case self::MEDIUM:
            $this->_experience = self:: EXPERT;
            break;


            default:
            $this->_experience = self:: NOVICE;

        }
    }



    // Attaque secrète






    








}