<?php 

require_once __DIR__.'/partials/header.php';

$categories_id = null;

if(empty($_GET['category'])){

  $_GET['category'] = null;

}


?>

<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">Gallerie des produits</h1>
      <p class="lead text-muted"></p>
      <p>

        <!--Dropdown primary-->
        <div class="dropdown">
          <!--Trigger-->
          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1-1" data-toggle="dropdown">PRODUITS</button>

          <!--Menu-->
          <div class="dropdown-menu dropdown-primary" id="your-custom-id">
            <a class="dropdown-item mdb-dropdownLink-1" href="index.php?category=1">Les Ordinateurs</a>
            <a class="dropdown-item mdb-dropdownLink-1" href="index.php?category=2">Les chaines hi-fi</a>
            <a class="dropdown-item mdb-dropdownLink-1" href="index.php?category=3">Les télévisions</a>
          </div>
        </div>
        <!--/Dropdown primary-->

        <a href="ajouter.php"><button type="button" class="btn btn-primary">Ajouter</button></a>
          
      </p>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">



  <?php
  /* $query = $db ->query('SELECT * FROM `products`');
  $products = $query ->fetchAll(); */

  $prepare = $db -> prepare('SELECT * FROM products WHERE categories_id = :category');
  
  $categories_id = $_GET['category'];

  $prepare->bindValue(':category', $categories_id, PDO::PARAM_INT);
  $prepare->execute();

  $results = $prepare->fetchAll();

  foreach ( $results as $key => $result) { ?>

        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">

            <div class="view overlay zoom">

            <img class="card-img-top img-fluid" alt="Card image cap"   src="assets/images/<?= $result['images']; ?>">           

            </div>
          
            <div class="card-body">
              <p class="card-text"><?= $result['names']; ?></p>
                <div class="d-flex justify-content-between align-items-center">

                <div class="btn-group">
                <a href="single.php?id=<?php echo $result['id_products']?>&name=<?php echo $result['names']?>&price=<?php echo $result['prices']?>"><button type="button" class="btn btn-sm btn-outline-secondary">Edit</button></a>
                  
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php }?>

      </div>
    </div>
  </div>

</main>



<?php 
require_once __DIR__.'/partials/footer.php';
?>