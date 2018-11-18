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
    public $_countries_objet;

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
            $file_content = json_decode($file_content);
            return $this->_countries_objet = $file_content; // ! file_content sous la forme d'un tableau d'objets
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
        foreach ($this->_countries_objet as $country) 
        {
            echo $country->capital ." est la capital du pays ". $country->country ."<br>";
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
        $countryName = $this->Param($countryName);

        foreach ($this->_countries_objet as $country) 
        {
            if ($this->Param($countryName) === $country->country) 
            {
                echo "La capitale du pays <strong>".$countryName."</strong> est <strong>".$country->capital."</strong><br>";
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
        $capitalName = $this->Param($capitalName);

        foreach ($this->_countries_objet as $country) 
        {
            if ($capitalName === $country->capital) 
            {
                echo "<strong>".$capitalName ."</strong> est la capitale du pays <strong>".$country->country."</strong><br>";
            }
        }
    }

    public function Param($text){

        return $text = ucfirst(strtolower($text));
    }

}


/**
 * Partie 2 : Utilisation de la classe
 */

$europa = new CountryCapital("europa.json");
/* $List = $europa->_countries_objet;
foreach ($List as $key => $value) {
    echo $value->country."<br>";
}
 */

$europa->getCapitalByCountry("france");
$europa->getCountryByCapital("paris");
/* $europa->getCapitals();   */

$america = new CountryCapital("america.json");