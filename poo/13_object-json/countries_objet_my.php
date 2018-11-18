<?php

require_once 'Utils.php';

class Europa {

    private $_file; // le fichier json d'origine

    private $_file_json_decode; // retourne le fichier json d'orignine sous la forme decoder afin de pouvoir le parcourir dans un foreach

    function __construct($file){

        $this->_file = $file;
        $this->get_file_json_decode($this->_file);
    }

    function get_file_json_decode($file){

        $file_json_decode = file_get_contents($file);
        $file_json_decode = json_decode($file_json_decode);
        return $this->_file_json_decode = $file_json_decode ;
    }


    function getAll(){

        foreach ($this->_file_json_decode as $key => $value) {
            echo $value->country;
        }

        return;
    }


    function getCountry($country_choice){

        $country_choice = $this->Param_choices($country_choice);

        foreach ($this->_file_json_decode as $key => $value) {
            
            if($country_choice === $value->country ){
                return $value->capital; 
            }
        }
    }


    function getCapital($capital_choice){

        $capital_choice = $this->Param_choices($capital_choice);

        foreach ($this->_file_json_decode as $key => $value) {
            
            if($capital_choice === $value->capital ){
                return $value->country; 
            }
        }
    }

    function Param_choices($choice){

        $choice = Utils::Param($choice);
        return $choice;
    }
}

$europa = new Europa("europa.json");
/* echo $europa->getAll() ; */
echo $europa->getCountry("france");
echo $europa->getCapital("rome");

/* $europa->getCapitalByCountry("France"); */
