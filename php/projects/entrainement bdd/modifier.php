<?php 
require_once __DIR__.'/partials/header.php';

if(!empty($_POST)){

    $name = $_POST['name'];
    $price = $_POST['price'];
    $id = isset($_GET['id']) ? $_GET['id'] : 0; 

    $sql = "UPDATE products SET 
                names = :name, 
                prices = :price
                WHERE id_products = :id ";

    $update = $db->prepare($sql);
    $update->bindValue(':id', $id, PDO::PARAM_INT);
    $update->bindValue(':name', $name, PDO::PARAM_STR);
    $update->bindValue(':price', $_POST['price'], PDO::PARAM_INT);
    $update->execute();  
}


?>

<div class="container">
    <div class="row">

        <div class="col-lg-4">

            <form action="#" method="POST">

                <label for="name"> Nom du produit à modifier </label>
                <input type="text" class="form-control" name="name" placeholder="Nom du produit" id="" value="">

                <label for="price"> prix à a modifier </label>
                <input type="text" class="form-control" name="price" placeholder="prix du produit" id="" value="">

                <button class="btn btn-info btn-block my-4" type="submit">Modifier</button>

            </form>

            <form action="#" method="POST">

                <a href="delete.php?id=<?= $_GET['id'] ;?>" class="btn btn-danger btn-block my-4" type="submit">Supprimer</button></a>

            </form>
        </div>
    </div>
</div>





<?php 
require_once __DIR__.'/partials/footer.php';
?>