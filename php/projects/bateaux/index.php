<?php 
require_once __DIR__.'/partials/header.php';
require_once __DIR__.'/autoLoginUser.php';
?>
    <!-- Jumbotron -->
    <div class="jumbotron text-center">
        <h2 class="card-title h2">Bot - Le site de location de bateaux </h2>
        <p class="blue-text my-4 font-weight-bold">La liberté de louer</p>
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 pb-2">
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga aliquid dolorem ea
                    distinctio exercitationem delectus qui.</p>
            </div>
        </div>

        <hr class="my-4">

        <!-- Vérification de l'existence d'un user authentifié et affichege des boutons en conséquence -->
        
        <!-- Si session authentifiée existe  -->
        <?php if(isset($_SESSION['authenticatedUserId'])): ?>

            <div class="pt-2">
               <a href="accountUser.php"><button type="button" class="btn btn-blue waves-effect">Accès au compte</button></a>
               <a href="disconnectUser.php"><button type="button" class="btn btn-red waves-effect">Se deconnecter</button></a>
            </div>

        <!-- Si session authentifiée n'existe pas  -->
        <?php else: ?>

            <div class="pt-2">
                <a href="createAccountUser.php"><button type="button" class="btn btn-blue waves-effect">Créer un compte</button></a>
                <a href="loginUser.php"><button type="button" class="btn btn-green waves-effect">Login</button></a>
            </div>

        <?php endif; ?>

    </div>

<?php 
require_once __DIR__.'/partials/footer.php';
?>



