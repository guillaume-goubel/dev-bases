<?php namespace dao;

// liste des types de base de données disponibles de notre framework

define('MYSQL', 'mysql');
define('FIREBIRD', 'firebird');

/* 
    Variable super globale 
    Elle doit être modifiée en fonction du type de base de données
*/
$GLOBALS['database_type'] = MYSQL;
	
// L'extention mysqli est utilisée pour la gestion des requêtes mysql

class Database
{
	private $_connection;

    // crée la chaine de connexion
    public function load() 
    {	
		switch ($GLOBALS['database_type']) {
    		case MYSQL:
    			$this->_load_mysql();
    			break;
    		
            case FIREBIRD:
                // code ...
                break;
    		
            /* 
                autres cas 
                ...
            */

            default:
    			break;
    	}
    }

	// connexion à une base de données MySQL
	private function _load_mysql()
	{
		$host = "localhost"; // nom du serveur MySQL
		$user = "root";
		$password = "";
		$db_name = "tutoriel_supinfo"; // nom de la base de donnée

        $this->_connection = mysqli_connect($host, $user, $password, $db_name);
        
        // Vérification de la connexion
        if (mysqli_connect_errno()) 
        {
        	// afficher l'erreur en cas d'exception
            printf("Échec de la connexion : %s\n", mysqli_connect_error()); 
            exit();
        }		
	}

	// connexion à une base de données Firebird
	private function _load_firebird()
	{
		// code de connexion à une base de données Firebird
	}

	// retourner la chaine de connexion de la base
	public function get_connection()
	{
		return $this->_connection;
	}    

	// fermer la connexion en fonction du type de base
    public function close() 
    {
    	switch ($GLOBALS['database_type']) {
    		case MYSQL:
    			mysqli_close($this->_connection);
    			break;
    		
    		case FIREBIRD:
    			// fermer la connexion à firebird
    			break;    		
    		
    		default:
    			break;
    	}
    }
}

?>
