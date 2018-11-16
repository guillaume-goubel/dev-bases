<?php namespace Controllers;

class UserController {

    public $_connexion;

    /**
    * fonction de vérification de la personne qui se connecte au site.
    * On vérifie son mail et son password
    * Si le fortmulaire est rempli, la connexion à la bd est effectuée
    */

    public function verifyUser()
    {

        $email = $password  = null;

        if (!empty($_POST)){
            echo "formulaire envoyé";
            $email = $_POST['email'];
            $password = $_POST['password'];

            /* return $this->connexion(); */
        }

        if (empty($_POST)){
           echo "formulaire non envoyé";
        }



        
    }

}