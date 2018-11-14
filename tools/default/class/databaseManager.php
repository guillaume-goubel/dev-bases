<?php 

class databaseManager  
{

    public $_connexion;
    public $_object;
    public $_dataBase;


    public function load($object) 
    {
        $host = "localhost;"; 
        $db_name = "pizzastore"; 
        $user = "root";
		$password = "";
       
        $this->object = new PDO ('mysql:host=localhost;dbname=webflix;charset=UTF8', 'root' , '');
    }

    public function get_connexion()
	{
		return $this->_dataBase;
    }  

}

$test = new databaseManager ;

$test->load($object); 


