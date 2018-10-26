<?php

// inclure la bd avant le haeder car besoin avant

/* $id = isset($_GET['id']) ? $_GET['id'] : 0; */

if(!empty($_GET['id'])){
    $id = $_GET['id'];
} else{
    $id = 0;
}


$currentPageTitle = 'Commander nos pizzas';
require_once __DIR__.'/config/database.php';

//récupérer les infos de la pizza
$query = $db->prepare('SELECT * FROM pizza WHERE id = :id');// id est un parametre
$query -> bindValue(':id', $id , PDO::PARAM_INT); // on s'assure que l'id est un parametre
$query -> execute();
$pizza = $query -> fetch();


if($pizza === false){
    http_response_code(404);
    require_once __DIR__.'/partials/header.php';
    echo ('<h1> 404 </h1>');?>

<script>
    setTimeout(function () {
        window.location = 'pizza_list.php';
    }, 5000);
</script>

<?php
    die();
    require_once __DIR__.'/partials/footer.php';
} 
/* //on peut aussi le rediriger vers la page des la liste
header('location : pizza_list_php ') */



/* $currentPageTitle = 'Nos pizzas'; */
require_once __DIR__.'/partials/header.php';


?>

<main role="main" class="container-fluid" id="pizza-detail-container">

    <div class="row">


        <div class="card" style="width: 18rem;">

            <img class="card-img-top" src="data/pictures/<?php echo $pizza['image']?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">
                    <?php echo $pizza['name']?>
                </h5>
                <p class="card-text">
                    <?php echo $pizza['descriptions']?>
                </p>
                
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Détails de la commande
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Tailles</a>
                        <a class="dropdown-item" href="#">Quantités</a>
                    </div>
                </div>

            </div>

        </div>

    </div>

</main>


<?php
require_once __DIR__.'/partials/footer.php';
?>