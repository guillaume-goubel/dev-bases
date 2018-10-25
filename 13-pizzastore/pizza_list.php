<?php

////////////////
//Variables
///////////////

$currentPageTitle = 'Nos pizzas';

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

<main class="container-fluid">

    <h1 id="title">NOS PIZZAS</h1>

    <div class="container2">

        <div class="italie">
            <div class="italie-flag">
                <img src="data/pictures/drapeaux" alt="" id="italie">
            </div>

            <div class="italie-carte"></div>

        </div>

        <div class="row">


            <?php foreach ($pizzas as $key => $pizza) { ?>

            <div id="card">

                <div class="card">

                    <div class="container-image">
                        <img id="pizza-pictures" class="card-img-top" src="data/pictures/<?php echo $pizza['image'];?>">
                    </div>

                    <div class="price">

                        <?php echo $pizza['price'] . '€';  ?>

                    </div>


                    <div class="card-body" id="card-command">
                        <h2 class="card-title">
                            <?php echo $pizza['name']; ?>
                        </h2>


                        <!-- Quand on clique sur le lien on va sur vers pizza detail.php
                            L'URL doit ressembler à pizza_detail.php?id=id de la pizza -->

                        <a href="pizza_detail.php?id=<?php echo $pizza['id'] ?>" class="btn btn-info">Commandez</a>


                    </div>

                </div>
            </div>

            <?php }  ?>

        </div>

    </div>

</main>


<?php
require_once __DIR__.'/partials/footer.php';
?>