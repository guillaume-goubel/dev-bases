<?php require_once __DIR__.'/partials/header.php'; 

///VARIBALES
$titre = $adresse = $ville = $cp = $surface = $prix = $photo = $type = $description = null ;

$formIsValid= false;
$confirmation = false;

$array_errors = [];

// TODO

if(!empty($_POST)){

    $titre = $_POST['titre'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $cp = $_POST['cp'];
    $surface = $_POST['surface'];
    $prix = $_POST['prix'];
    $photo = $_FILES['photo'];
    $type = $_POST['type'];
    $description = $_POST['description'];

    if(empty($titre )){
        $formIsValid= false;
        $array_errors['titre-lack'] = "Il manque le titre";
    }

    if(empty($adresse )){
        $formIsValid= false;
        $array_errors['adresse-lack'] = "Il manque l'adresse";
    }

    if(empty($ville )){
        $formIsValid= false;
        $array_errors['ville-lack'] = "Il manque la villle";
    }

    if(empty($cp)){
        $formIsValid= false;
        $array_errors['cp-lack'] = "Il manque le code postale";
    }

    if(!empty($cp) && !preg_match ("^(([0-9][0-9])|(9[0-5]))[0-9]{3}$^", $cp)  ){
        $formIsValid= false;
        $array_errors['cp-no-correct'] = "Le code postale renseigné n'est pas correct";
    }

    if(empty($surface)){
        $formIsValid= false;
        $array_errors['surface-lack'] = "Il manque la surface";
    }

    if(empty($prix)){
        $formIsValid= false;
        $array_errors['prix-lack'] = "Il manque le prix ";
    }
    
    ///////PHOTO NON OBLIGATOIRE
    /* if ($photo['error'] === 4 ) { 
        $isValid = false;
        $errors_array['photo-lack'] = "Il manque une photo";  
    } */

    $file = $photo['tmp_name'];   // emplacement du fichie temporaire
    $allowedExtentions = ['image/gif', 'image/png', 'image/jpeg', 'image/bmp', 'image/jpg' ];
  
     if(!in_array($photo['type'], $allowedExtentions) && $photo['error'] !== 4 ){
        $formIsValid = false;
        $errors_array['photo-type'] = "Ce type de fichier image n'est pas autorisé";   
    } 

    if ($photo['size'] / 1024 > 2000 ){
        $formIsValid = false;
        $errors_array['photo-weight'] = "l'image est trop lourde";   
    } 

    if(empty($type)){
        $formIsValid= false;
        $array_errors['type-lack'] = "Il manque le type";
    }

    if(!empty($_POST) && empty($array_errors))
    {
        $formIsValid = true;
    }
}
    

    if($formIsValid === true){

        $file = $photo['tmp_name']; 
        move_uploaded_file($file, __DIR__ ."/assets/images/".$photo['name']);

        $sql = "INSERT INTO logement 
                     (titre,adresse,ville,cp,surface,prix,photo,type,description)  
                VALUES
                    (:titre,:adresse,:ville,:cp,:surface, :prix, :photo, :type, :description)";



                $update = $db->prepare($sql);

                $titre = htmlspecialchars($titre);
                $update->bindValue(':titre', $titre, PDO::PARAM_STR);

                $adresse = htmlspecialchars($adresse);
                $update->bindValue(':adresse', $adresse, PDO::PARAM_STR);

                $ville = htmlspecialchars($ville);
                $update->bindValue(':ville', $ville, PDO::PARAM_STR);

                $cp = htmlspecialchars($cp);
                $update->bindValue(':cp', $cp, PDO::PARAM_STR);

                $update->bindValue(':surface', $surface, PDO::PARAM_INT);
                $update->bindValue(':prix', $prix, PDO::PARAM_INT);

                $update->bindValue(':photo', $photo['name'], PDO::PARAM_STR);

                $update->bindValue(':type', $type, PDO::PARAM_STR);

                $description = htmlspecialchars($description);
                $update->bindValue(':description', $description, PDO::PARAM_STR);

                $update->execute();  

                $confirmation = true;

               /*  $taille = $photo['size']; 
                $width = 400; 
                $height = 400; 
                $infos_img = getimagesize($photo['tmp_name']); */
                // On vérifie les dimensions et taille de l'image : if image est inférieure à $width et $height


}


?>

<main role="main">

    <section class="jumbotron text-center">

        <div class="container">

            <h1 class="jumbotron-heading">Modifier un produit.</h1>
            <p class="lead text-muted">Trouver votre logment.</p>
            <p>
                <a href="add.php" class="btn btn-primary my-2">Ajouter un produit</a>
            </p>
        </div>

    </section>


    <div class="container" id="form-update">

        <div class="row" id="update">

            <div class="col-6" id="form-left">

                <form method="POST" action="#" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="userPseudo">Titre</label>
                        <input type="text" class="form-control" id="itre" name="titre" placeholder="Titre de l'annonce"
                            value="<?= $titre ;?>">
                        <div class="feedback">
                            <?php echo (isset($array_errors['titre-lack']))?$array_errors['titre-lack'] : ""  ;?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse" value="<?= $adresse;?>">
                        <div class="feedback">
                            <?php echo (isset($array_errors['adresse-lack']))?$array_errors['adresse-lack'] : ""  ;?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ville">Ville</label>
                        <input type="text" class="form-control" id="ville" placeholder="Ville" name="ville" value="<?= $ville;?>">
                        <div class="feedback">
                            <?php echo (isset($array_errors['ville-lack']))?$array_errors['ville-lack'] : ""  ;?>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="code Postale">Code postale</label>
                        <input type="text" class="form-control" id="cp" placeholder="Code Postale" name="cp" value="<?= $cp;?>">
                        <div class="feedback">

                            <?php echo (isset($array_errors['cp-lack']))?$array_errors['cp-lack'] : ""  ;?>
                            <?php echo (isset($array_errors['cp-no-correct']))?$array_errors['cp-no-correct'] : ""  ;?>

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="surface">Surface</label>
                        <input type="number" class="form-control" id="surface" placeholder="Surface" name="surface"
                            value="<?= $surface;?>">
                        <div class="feedback">
                            <?php echo (isset($array_errors['surface-lack']))?$array_errors['surface-lack'] : ""  ;?>
                        </div>

                    </div>
            </div>

            <div class="col-6" id="form-right">

                <div class="form-group">
                    <label for="ville">Prix</label>
                    <input type="number" class="form-control" id="prix" placeholder="Prix" name="prix" value="<?= $prix;?>">
                    <div class="feedback">
                        <?php echo (isset($array_errors['prix-lack']))?$array_errors['prix-lack'] : ""  ;?>
                    </div>

                </div>


                <div class="form-group">
                    <label for="ville">Photo</label>
                    <input type="file" class="form-control" id="photo" placeholder="photo" name="photo">
                    <div class="feedback">
                        <?php echo (isset($array_errors['photo-type']))?$array_errors['photo-type'] : "" ;?>
                        <?php echo (isset($array_errors['photo-weight']))?$array_errors['photo-weight'] : "" ;?>


                        <div class="form-group">
                            <label for="type">Type</label>
                            <select class="form-control" name="type">
                                <option selected></option>
                                <option>Location</option>
                                <option>Vente</option>
                            </select>
                            <div class="feedback">
                                <?php echo (isset($array_errors['type-lack']))?$array_errors['type-lack'] : ""  ;?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" placeholder="Description du bien" name="description"
                                value="<?= $description;?>"></textarea>
                            <div class="feedback">
                                <?php echo (isset($array_errors['description']))?$array_errors['description'] : ""  ;?>
                            </div>
                        </div>

                        <button type="submit" id="btn-message">Confirmer</button>

                        </form>

                        <!-- Central Modal Medium Success -->
                        <div tabindex="-1" role="dialog" id="message-<?php echo ($confirmation)? 'success' : 'failed' ?>">

                            <div class="modal-dialog modal-notify modal-success" role="document">
                                <!--Content-->
                                <div class="modal-content">
                                    <!--Header-->
                                    <div class="modal-header">
                                    </div>

                                    <!--Body-->
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <i class="fa fa-check fa-4x mb-3 animated rotateIn"></i>
                                            <p>le bien a été rajouté à la base de données</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>






                    </div>
                </div>

            </div>
</main>



<?php require_once __DIR__.'/partials/footer.php'; ?>