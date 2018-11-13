<?php

class Form{

    
    /*****************
    * ! CONSTANTES
    ******************/

    /*****************
    * ! PROPRIETES
    ******************/
    /**
    * @param array
    */
    private $_data;

    /**
    * @param string
    */
    private $_surround = '<p>';


    /*****************
    * ! METHODES
    ******************/

    //* CONSTRUCTEUR
    public function __construct(array $data){
        $this->set_data($data);
    }

    //* SETTER
    private function set_data($data){
        $this->_data = $data;
    } 

    //* GETTER


    //* ACTIONS
    public function surround($html){
        return "{$this->_surround} $html {$this->_surround}" ;     
    } 

    public function inputText($inputName){
        return $this->surround("<input type='text' name=".$inputName." placeholder=".$inputName." value=".$this->_data["$inputName"] .">");       
    } 

    public function submit(){
        return "<button type='submit'>Envoyer</button>";       
    } 

}