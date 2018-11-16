
<?php require_once __DIR__.'/public/partials/header.php'; 

function autoload_controllers($class) {
    include_once 'private/'.$class .'.php';
}
spl_autoload_register('autoload_controllers');

use \Controllers\UserController ;

$verification = new UserController; 
$verification->verifyUser();

?>



<div class="container-fluid">

    <div class="row">

        <div class="col-3" id="gauche">
            <form method="POST" action="#">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                </div>
<!--                 <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> -->
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
            <br>

             <button class="btn btn-outline-success my-2 my-sm-0" id="afficher">Afficher</button>

            <div id="result-connexion"></div>

        </div>

    
        <div class="col-8" id="droite">
            <div class="result-ajax"> </div>
        </div>



    </div>

</div>






<?php require_once __DIR__.'/public/partials/footer.php'; ?>