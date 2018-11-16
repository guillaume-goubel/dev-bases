<?php

namespace Controllers;

use \Models\UserModel;

class UserController {

    private $model;

    public function __construct()
    {
        $this->model = new UserModel;
    }

    public function viewAll()
    {
        foreach ($this->model->getAll() as $user) {
            echo "<div>".$user->firstname."</div>";
            echo "<div>".$user->lastname."</div>";
            echo "<hr>";
        }
    }
    
}