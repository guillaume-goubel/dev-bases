<?php 
require_once __DIR__.'/partials/header.php';


$name = $price = null;





//////////////////////PRESENTER SIGLE

$choice = $_GET['id'];

$query = $db->prepare("SELECT * FROM `products` WHERE id_products = :choice");
$query->bindValue(':choice', $choice, PDO::PARAM_INT);
$query->execute();

$products = $query ->fetch();



?>

<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">

            <div class="col-lg-4">

                <!-- Card -->
                <div class="card">

                    <!-- Card image -->
                    <img class="card-img-top" src="assets/images/<?= $products['images']; ?>" alt="Card image cap">

                    <!-- Card content -->
                    <div class="card-body">

                        <!-- Title -->
                        <h4 class="card-title"><a>
                                <?= $products['names'] ?> </a></h4>
                        <!-- Text -->
                        <p class="card-text">
                            <?= $products['prices']; ?> : Euros </p>
                        <!-- Button -->
                        <a href="modifier.php?id=<?php echo $products['id_products']?>&name=<?php echo $products['names']?>&price=<?php echo $products['prices']?>"><button type="button" class="btn btn-primary">Primary</button></a>


                    </div>

                </div>
                <!-- Card -->




            </div>


        </div>

    </div>



</div>







<?php 
require_once __DIR__.'/partials/footer.php';
?>