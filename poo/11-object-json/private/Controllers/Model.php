<?php

namespace Models;

abstract class Model {

    // Stock l'instance de PDO
    private $_db;

    function __construct()
    {

        //instance de PDO
        try{

            $this->_db = new \PDO ('mysql:host=localhost;dbname=users;charset=UTF8', 'root' , '');
            $this->_db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->_db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE , \PDO::FETCH_ASSOC);      
        } 
         
         catch (\Exception $e)
        {
            echo 'connexion échouée !' .$e->getMessage();
        } 
        
    }


    // List / Retrieve All
    public function getAll()
    {
        $query = $this->_db->query("SELECT * FROM informations ");
        return $query->fetchAll(\PDO::FETCH_OBJ);
    }

    // C - Create - Insert
    public function create()
    {
    }

    // R - Read /Retrieve One
    public function getOne(int $id)
    {
    }

    // U - Update
    public function update(int $id)
    {
    }

    // D - Delete
    public function delete(int $id)
    {
    }
}