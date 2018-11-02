<?php
////////////////
//Variables
///////////////

$currentPageTitle = 'Nos pizzas';
/* $price="13.00"; */

////////////////
//Include
///////////////
require_once __DIR__.'/partials/header.php';

////////////////
//Developpement
///////////////
$query = $db->query('SELECT * FROM pizza');
$pizzas = $query->fetchAll();


?>

<main class="container" id="list">

    <h1 id="title">La carte</h1>

    <div class="row">
        <img class="img-fluid" src="data/pictures/drapeaux" alt="" id="italie">
    </div>

    <div class="row">

        <?php foreach ($pizzas as $key => $pizza) { ?>

        <div class="card" style="width: 18rem;">

            <div class="image-container">
                <img class="card-img-top" src="data/pictures/<?=$pizza['image'];?>" alt="Card image cap">
                <div class="price"><?= formatPrice($pizza['price']) ?></div>
            </div>

            <div class="card-body">
                <h5 class="card-title"><?=$pizza['name'];?></h5>      
                <p><img src="data/pictures/<?=$pizza['categories'].".png";?>"></p>      
                <a href="pizza_detail.php?id=<?php echo $pizza['id'] ?>" class="btn btn-success btn-sm">Commande</a>
            </div>

        </div>

        <?php };  ?>

    </div>


</main>


<?php



require_once __DIR__.'/partials/footer.php';
?>