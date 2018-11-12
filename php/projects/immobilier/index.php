<?php require_once __DIR__.'/partials/header.php'; ?>



<main role="main">

    <section class="jumbotron text-center">
        <div class="container" id="presentation">
            <img src="assets/images/house.png" alt="logo">
            <h1 class="jumbotron-heading">Logement.com</h1>
        </div>
        <a href="add.php" class="btn btn-primary my-2">Ajouter un produit</a>
    </section>


    <div class="album py-5 bg-light">

        <div class="container-fluid">



            <?php
//Requete BD

$sql = "SELECT * FROM logement";
$query = $db->query($sql);
$results = $query->fetchAll();

foreach ($results  as $key => $result) {?>

            <div class="row">

                <div class="col-md-12" id="product">

                    <div id="img-delete">
                    <div class="view overlay zoom">
                        <img class="card-img-top img-fluid pattern-1" width="50" src="assets/images/<?php echo $result['photo'];?>" alt="Card image cap">
                    </div>
                    </div>

                    <div class="card-body" id="details-produit">

                        <div id="menu-gauche">
                            <h4 class="card-text">
                                <?= $result['titre'] ?>
                            </h4>
                            <p class="card-text"><strong>Type</strong> :
                                <?= $result['type'] ?>
                            </p>
                            <p class="card-text"><strong>Adresse</strong> :
                                <?= $result['adresse'] ?>
                            </p>
                            <p class="card-text"><strong>Ville</strong> :
                                <?= $result['ville'] ?>
                            </p>
                            <p class="card-text"><strong>Code Postale</strong> :
                                <?= $result['cp'] ?>
                            </p>
                        </div>

                        <div id="menu-droit">
                            <p class="card-text"><strong>Surface</strong> :<?= $result['surface'] ?> m2 </p>
                            <p class="card-text"><strong>Prix</strong> : <?= $result['prix'] ?> : € </p>
                        </div>

                        <div id="menu-description">
                            <p class="card-text">
                                <?= $result['description'] ?>
                            </p>
                        </div>

                    </div>

                </div>

                </div>

                <?php  } ?>

            












        </div>
    </div>







</main>


<?php require_once __DIR__.'/partials/footer.php'; ?>