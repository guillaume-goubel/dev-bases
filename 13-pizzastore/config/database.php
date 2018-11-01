
<?php
//////////////////////////
///CONNECTION TO DATA BASE
/////////////////////////

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try{
    
    $db = new PDO ('mysql:host=localhost;dbname=pizzastore;charset=UTF8', 'root' , '', $options);
/*     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_ASSOC); */

/* } catch (Exception $e){
    echo $e ->getMessage();
    //redirection vers GOOGLE
    header('https://www.google.com/search?q='.$e->getMessage());
} */

} catch(PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
    echo '<img src="data/pictures/giphy.gif">';
    die('Aie Aie Aie');
}

define('HOST', 'localhost'); // Domaine ou IP du serveur ou est située la base de données
define('USER', 'root'); // Nom d'utilisateur autorisé à se connecter à la base
define('PASS', ''); // Mot de passe de connexion à la base
define('DB', 'db_name'); // Base de données sur laquelle on va faire les requêtes

// Tableau d'options supplémentaires pour la connexion
$db_options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", // On force l'encodage en utf8
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // On récupère tous les résultats en tableau associatif
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING // On affiche des warnings pour les erreurs, à commenter en prod (valeur par défaut PDO::ERRMODE_SILENT)
);

// On crée la connexion à la base de données
$db = new PDO('mysql:host='.HOST.';dbname='.DB, USER, PASS, $db_options);
