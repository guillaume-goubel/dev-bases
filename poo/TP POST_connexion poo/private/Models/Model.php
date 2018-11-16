<?php

namespace Models;

abstract class Model {

    // Stock l'instance de PDO
    private $db;

    public function __construct()
    {
        //instance de PDO
        try{

            $this->db = new \PDO ('mysql:host=localhost;dbname=blog;charset=UTF8', 'root' , '');
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE , \PDO::FETCH_ASSOC);      
        } 
         
         catch (\Exception $e)
        {
            echo 'connexion échouée !' .$e->getMessage();
        } 
    }

    private function getTable()
    {
        // Récupère le namespace de la classe (Models\ArticleModel)
        $table = get_called_class();

        // Explose la chaine sur les backslaches du namspace
        // - Models
        // - ArticleModel
        $table = explode("\\", $table);

        // Récupère la derniere entrée du table (ArticleModel)
        $table = end($table);

        // Remplace la chaine "Model" par rien.. (Article)
        $table = str_replace("Model", null, $table);

        // Formate la chaine "Article" en "article"
        $table = strtolower($table);

        return $table;
    }

    // List / Retrieve All
    public function getAll()
    {
        $query = $this->db->query("SELECT * FROM ".$this->getTable());
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