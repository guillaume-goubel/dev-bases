<?php


////////////////
///Variables
////////////////
$currentPageTitle = 'Ajouter des pizzas';

////////////////
//Include
///////////////
require_once __DIR__.'/partials/header.php';


////////////////
//Développement
///////////////

$errors_array = array(); 

$admin_pizza_name = null;
$admin_pizza_price = null;
$admin_pizza_image = null;
$admin_pizza_categorie = null;
$admin_pizza_description = null;


if(!empty($_POST)) { 
    $admin_pizza_name = $_POST['admin_pizza_name'];
    $admin_pizza_price = $_POST['admin_pizza_price'];
    $admin_pizza_image = $_FILES['admin_pizza_image']; // tableau avec les informations sur le fichier envoyé
    $admin_pizza_categorie = $_POST['admin_pizza_categorie'];
    $admin_pizza_description = $_POST['admin_pizza_description']; 
}


?>

<main class="container">

    <h1>Ajouter une pizza</h1>

    <hr color="blue">

    <form action="#" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleFormControlInput1">Nom de la pizza</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nom de la pizza" name="admin_pizza_name"
                value="<?php echo $admin_pizza_name; ?>">
        </div>
        <div class="form-group">

            <div class="form-group">
                <label for="exampleFormControlInput1">Prix - Euros</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Prix de la pizza"
                    name="admin_pizza_price" value="<?php echo $admin_pizza_price; ?>">
            </div>
            <div class="form-group">

                <div class="form-group">
                    <label for="exampleFormControlInput1">Image</label><br>
                    <input type="file" class="" id="exampleFormControlInput1" placeholder="Image de la pizza"
                        name="admin_pizza_image">
                </div>
                <div class="form-group">

                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Choix de la catégorie</label>
                    <select class="form-control" id="exampleFormControlSelect2" name="admin_pizza_categorie">
                        <option selected></option>
                        <option <?php echo ($admin_pizza_categorie==='Aucune' ) ? "selected" : "" ;?> > aucune </option>
                        <option <?php echo ($admin_pizza_categorie==='végétarienne' ) ? "selected" : "" ;?>>
                            végétarienne</option>
                        <option <?php echo ($admin_pizza_categorie==='charcuterie' ) ? "selected" : "" ;?>> charcuterie</option>
                        <option <?php echo ($admin_pizza_categorie==='epicée' ) ? "selected" : "" ;?> > epicée</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description de la pizza</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="admin_pizza_description"
                        placeholder="La description de la pizza"><?php echo $admin_pizza_description; ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Ajouter le produit</button>

    </form>

</main>


<?php

if (!empty($_POST)) { // Si le formulaire est soumis
    $isValid = true;

    if (empty($admin_pizza_name)) { 
        $isValid = false;
        array_push($errors_array, "Il manque le nom de la pizza");
        /* echo 'Il manque le nom de la pizza'."<br>";  */
    }

    if (empty($admin_pizza_price)) { 
        $isValid = false;
        array_push($errors_array, "Il manque le prix de la pizza");
        /* echo 'Il manque le prix de la pizza'."<br>"; */
    }

    if ($admin_pizza_image['error'] === 4 ) { //si erreur 4 ; pas de fichier envoyé
        $isValid = false;
        array_push($errors_array, "Vous n'avez pas envoyé de fichier");
    }

    if (empty($admin_pizza_categorie)) { 
        $isValid = false;
        array_push($errors_array, "Il manque la catégorie de la pizza");
    }

    if (empty($admin_pizza_description)) { 
        $isValid = false;
        array_push($errors_array, "Il manque la description de la pizza");
    }

    // upload de l'image
        $file = $admin_pizza_image['tmp_name']; // emplacement du fichie temporaire
        $fileName = $admin_pizza_image['name']; // variable pour la base de données

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo , $file);
        $allowedExtentions = ['image/gif', 'image/png', 'image/jpeg', 'image/bmp', 'image/jpg' ];
        // Si extension n'est pas autoirisée , il ya une erreur

        if(!in_array($mimeType , $allowedExtentions)){
            array_push($errors_array, 'ce type de fichier est pas autorié');
        }

        if ($admin_pizza_image['size'] / 1024 > 30){
            array_push($errors_array, "l'image est trop lourde");
        }

        // upload de l'image
        // le 30 est défini en kilos 
        if(empty($errors_array )){
            move_uploaded_file($file, __DIR__ ."/data/pictures/" .$fileName);
        }

    

    if ($isValid && empty($errors_array)) {
        $query = $db->prepare('INSERT INTO `pizza` (`name`, `price`, `image`, `categories`, `descriptions`) VALUES (:admin_pizza_name, :admin_pizza_price, :admin_pizza_image, :admin_pizza_categorie, :admin_pizza_description )');

        $query->bindValue(':admin_pizza_name', $admin_pizza_name, PDO::PARAM_STR);
        $query->bindValue(':admin_pizza_price', $admin_pizza_price, PDO::PARAM_INT);
        $query->bindValue(':admin_pizza_image', $fileName, PDO::PARAM_STR);
        $query->bindValue(':admin_pizza_categorie', $admin_pizza_categorie, PDO::PARAM_STR);
        $query->bindValue(':admin_pizza_description', $admin_pizza_description, PDO::PARAM_STR);
        $query -> execute();

        /* $insert_id = $db->lastInsertId(); */
        echo "Votre article est bien enregistré";      
    }
}

?>


<div id="activate-<?php echo (!empty($errors_array)) ? " on" : '' ; ?>" class="alert alert-danger" role="alert">

    <?php
foreach ($errors_array as $key => $value) {
echo $value ."<br>";
}
?>

</div>



<?php
require_once __DIR__.'/partials/footer.php';
?>