<?php 

require_once __DIR__.'/partials/header.php';

///VARIBALES
$name = $price = $image = $category = null;

$formIsValid = false;

if(!empty($_POST)){

    $name = $_POST['name'] ;
    $price = $_POST['price'];
    $image = $_FILES['image'];
    $category = $_POST['category'];

}


if(!empty($_POST)){

    $formIsValid = true;

    if(empty($_POST['name'])){
        $formIsValid = false;
        echo 'manque le nom' ."<br>";
    }

    if(empty($_POST['price'])){
        $formIsValid = false;
        echo 'manque le prix' ."<br>";
    }

    if(empty($_POST['category'])){
        $formIsValid = false;
        echo "manque la category" ."<br>";
    }

    if($image['error'] === 4 ){
        $formIsValid = false;
        echo "manque l'image" ."<br>";
    }
    
}


var_dump($formIsValid);

if ($formIsValid === true){
    $file = $image['tmp_name']; 
    move_uploaded_file($file, __DIR__ ."/assets/images/".$image['name']);

    $query = $db->prepare('INSERT INTO products (`names`, `prices`, `images`, `categories_id`) VALUES (:names, :prices, :images, :categories_id)');

    $query->bindValue(':names', $name, PDO::PARAM_STR);
    $query->bindValue(':prices', $price, PDO::PARAM_INT);
    $query->bindValue(':images', $image['name'], PDO::PARAM_STR);

    if($category === "ordinateur"){
        $category = 1;
    }
    if($category === "chaine hifi"){
        $category = 2;
    }
    if($category === "tv"){
        $category = 3;
    }

    $query->bindValue(':categories_id', $category, PDO::PARAM_INT);

    $query->execute();

    var_dump($category);
    var_dump($_POST);


}






?>


<main role="main">


    <div class="container">

        <div class="row">

            <div class="col-5">

                <form action="ajouter.php" method="POST" enctype="multipart/form-data">

                    <label for="name"> Nom du produit à ajouter </label>
                    <input type="text" class="form-control" name="name" placeholder="Nom du produit" id="" value="<?= $name ?>">


                    <label for="name"> prix à ajouter </label>
                    <input type="text" class="form-control" name="price" placeholder="prix du produit" id="" value="<?= $price?>">

                    <label for="name"> image à ajouter </label>
                    <input type="file" class="form-control" name="image" placeholder="image" id="" value="">


                    <label for="name">Catégorie</label>
                    <select class="form-control" name="category" placeholder="category" id="" value="<?= $category?>">
                        <option selected></option>
                        <option>ordinateur</option>
                        <option>chaine hifi</option>
                        <option>tv</option>
                    </select>

                    <button class="btn btn-info btn-block my-4" type="submit">Ajouter</button>

                </form>

            </div>



        </div>
    </div>


</main>

















<?php 
require_once __DIR__.'/partials/footer.php';
?>