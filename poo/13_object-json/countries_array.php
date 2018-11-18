<?php
/**
 * TP PHP POO
 * 
 * Pays et Capitales
 * 
 * Partie 1 : Déclaration de la classe
 * Partie 2 : Utilisation de la classe
 */


/**
 * Partie 1 : Déclaration de la classe
 */

// Déclaration de la classe CountryCapital
class CountryCapital {

    /**
     * Chemin du fichier contenant la liste des pays/capitales
     *
     * @var string
     */
    private $_file;

    /**
     * Tableau contenant la liste des pays/capitales, aprés récupération du
     * contenu du fichier $this->file
     *
     * @var array
     */
    private $_countriesCapital_array;

    /**
     * Le constructteur récupère le chemine du fichier et exécute la procédure 
     * de récupération et d'affectation de la liste des pays/capitales dans la 
     * propriété $this->countries
     *
     * @param string $file
     */
    public function __construct(string $file)
    {
        $this->_file = $file;
        $this->getFile();
    }

    /**
     * Vérification de l'existence du fichier source, Si oui: procédure 
     * de récupération et d'affectation de la liste des pays/capitales dans la 
     * propriété $this->countries
     *
     * @return void
     */
    private function getFile()
    {
        if (file_exists($this->_file))
        {
            $file_content = file_get_contents($this->_file);
            $file_content = json_decode($file_content, true);

            $this->_countriesCapital_array = $file_content;
        }

        // Affiche une erreur si le fichier est introuvable
        else {
            echo "Le fichier ".$this->_file." est introuvable";
        }
    }


    /**
     * Lit et affiche la liste complète des pays/capitales incrite dans le 
     * fichier source
     *
     * @return void
     */
    public function getCapitals()
    {
        foreach ($this->_countriesCapital_array as $values) 
        {
            echo $values['capital'] ." est la capitale du pays ". $values['country'] ."<br>";
        }
    }

    /**
     * Recherche et affiche la capital du pays donnés entrée de la méthode
     *
     * @param string $countryName Nom du pays pour lequel on recherche la capital
     * @return void
     */
    public function getCapitalByCountry(string $countryName)
    {
        foreach ($this->_countriesCapital_array as $values) 
        {
            if ($countryName === $values['country']) 
            {
                echo "La capitale du pays <strong>".$countryName."</strong> est <strong>".$values['capital']."</strong><br>";
            }
        }
    }

    /**
     * Recherche et affiche le pays de la capitale donnés entrée de la méthode
     *
     * @param string $capitalName Nom de la capital pour laquel on recherche le pays
     * @return void
     */
    public function getCountryByCapital(string $capitalName)
    {
        foreach ($this->_countriesCapital_array as $values) 
        {
            if ($capitalName == $values['capital']) 
            {
                echo "<strong>".$capitalName ."</strong> est la capitale du pays <strong>".$values['country']."</strong><br>";
            }
        }
    }
}



/**
 * Partie 2 : Utilisation de la classe
 */

$europa = new CountryCapital("europa.json");
/* $europa->getCapitals(); */
$europa->getCapitalByCountry("France");
$europa->getCountryByCapital("Paris"); 


$america = new CountryCapital("america.json");