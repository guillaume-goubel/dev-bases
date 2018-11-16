<?php

namespace Models;

abstract class Model{

    private $_db;

    function __construct()
    {


        //instance de PDO
        try{

            $this->_db = new \PDO ('mysql:host=localhost;dbname=blog;charset=UTF8', 'root' , '');
            $this->_db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->_db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE , \PDO::FETCH_ASSOC);      
        } 
         
         catch (\Exception $e)
        {
            echo 'connexion échouée !' .$e->getMessage();
        } 
        
    }


    private function GetTable()
    {
        $table = get_called_class();

        // Met sous la forme de tableau
        $table = explode("\\", $table);
        /* $table = $table [count($table)-1]; */
        
        // garde le dernier index du tableau
        $table = end($table);

        //remplace Model par ""
        $table = str_replace("Model", null, $table);

        //Met en minuscule
        $table = strtolower($table);

        return $table;
    }
    
    public function getAll(){

        $query = $this->_db->query("SELECT * FROM article");
        return $query->fetchAll(\PDO::FETCH_OBJ);
    }

        


    public function create(){

    }

    public function getOne(){

    }


    public function update(){
        
    }


    public function delete(){

        
    }



}