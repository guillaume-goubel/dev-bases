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

$errors_array = [];  // Tableaux des erreurs dans le formaulaire (PS , doit être empty ppur pouvoir être envoyé à la base de données)
$success_array = array();  // Tableau de succées , pour envoyuer le message de succés

// Détermine les variables de chaque partie du formulaire à null afin de ne pas être non déclarée à la 1ere lecture de phph
$admin_pizza_name = null;
$admin_pizza_price = null;
$admin_pizza_image = null;
$admin_pizza_categorie = null;
$admin_pizza_description = null;


// Si les variables sonbt toutes renseignées dans le POST , les variables corrspodnet à son POST correspodnant
if(!empty($_POST)) { 
    $admin_pizza_name = $_POST['admin_pizza_name'];
    $admin_pizza_price = $_POST['admin_pizza_price'];
    $admin_pizza_image = $_FILES['admin_pizza_image']; // tableau avec les informations sur le fichier envoyé
    $admin_pizza_categorie = $_POST['admin_pizza_categorie'];
    $admin_pizza_description = $_POST['admin_pizza_description']; 
}


///VALIDATIONS POUR CREER LES MESSAGES D'ALERTE EN DESSOUS DE CHAQUE PARTIE DU FORMULAIRE

$admin_pizza_name_validation = false;
$admin_pizza_price_validation = false;
$admin_pizza_image_validation = false;
$admin_pizza_categorie_validation = false;
$admin_pizza_description_validation = false;

$isValid = false;


if (!empty($admin_pizza_name) && $isValid === true ){  // Si la validatrion est true , le feedback en dessous de chaque formulaire passe en validate (green) sinon invalidate (rouge)
    $admin_pizza_name_validation = true;
}

if (!empty($admin_pizza_price) && $isValid === true){
    $admin_pizza_price_validation = true;
}

if (!empty($admin_pizza_image) && $isValid === true){
    $admin_pizza_image_validation = true;
}

if (!empty($admin_pizza_categorie) && $isValid === true){
    $admin_pizza_categorie_validation = true;
}

if (!empty($admin_pizza_description) && $isValid === true){
    $admin_pizza_description_validation = true;
}

?>

<?php


//////////////VERIFICATION DE CHAQUE PARTIE DU FORMULAIRE
if(!empty($_POST)){ // si au moins un des POST a été envoyé donc on rentre dans la boucle et on commence les vérificartions

    if (empty($admin_pizza_name)) { 
        $isValid = false;
        $errors_array['pizzaName'] = "Il manque le nom de la pizza";  
    }

    if (empty($admin_pizza_price)) { 
        $isValid = false;
       $errors_array['pizzaPrice'] = "Il manque le prix de la pizza";  
    }

    if (!empty($admin_pizza_price) && is_numeric($admin_pizza_price) === false) { 
        $isValid = false;
        $errors_array['pizzaPriceType'] = "Il faut indiquer un prix par un chiffre";   
    }

    if ($admin_pizza_image['error'] === 4 ) { //si erreur 4 ; pas de fichier envoyé
        $isValid = false;
        $errors_array['pizzaImage'] = "Il manque le fichier de la pizza";  
    }

    if (empty($admin_pizza_categorie)) { 
        $isValid = false;
        $errors_array['pizzaCategory'] = "Il manque la catégorie de la pizza";   
    }

    if (empty($admin_pizza_description)) { 
        $isValid = false;
        $errors_array['pizzaDescription'] = "Il manque la description de la pizza";   
    }

        // upload de l'image 
        $file = $admin_pizza_image['tmp_name'];   // emplacement du fichie temporaire
        
        /* $finfo = finfo_open(FILEINFO_MIME_TYPE); */
        /* $mimeType = finfo_file($finfo , $file); */

        $allowedExtentions = ['image/gif', 'image/png', 'image/jpeg', 'image/bmp', 'image/jpg' ];
      
        // Si extension n'est pas autorisée , il ya une erreur

         if(!in_array($admin_pizza_image['type'], $allowedExtentions) && $admin_pizza_image['error'] !== 4  ){
            $isValid = false;
            $errors_array['pizzaImageType'] = "Ce type de fichier image n\'est pas autorisé";   
        } 

        if ($admin_pizza_image['size'] / 1024 > 2000 ){
            $isValid = false;
            $errors_array['pizzaImagePoid'] = "l'image est trop lourde";   
        } 

        if (empty($errors_array)){
            $isValid = true;
        }
    }   

    var_dump($isValid);

        if($isValid === true){


            // upload de l'image
            move_uploaded_file($file, __DIR__ ."/data/pictures/" .$admin_pizza_image['name']);

            // renseignement de la base de données
            $query = $db->prepare('INSERT INTO `pizza` (`name`, `price`, `image`, `categories`, `descriptions`) VALUES (:admin_pizza_name, :admin_pizza_price, :admin_pizza_image, :admin_pizza_categorie, :admin_pizza_description )');

            $query->bindValue(':admin_pizza_name', $admin_pizza_name, PDO::PARAM_STR);
            $query->bindValue(':admin_pizza_price', $admin_pizza_price, PDO::PARAM_INT);
            $query->bindValue(':admin_pizza_image', $admin_pizza_image['name'], PDO::PARAM_STR);


            //Equivalence français Anglais dans la base de données
            if ($admin_pizza_categorie === "Aucune"){
                $admin_pizza_categorie = "none";
            }

            if ($admin_pizza_categorie === "Végétarienne"){
                $admin_pizza_categorie = "vegetarian";
            }

            if ($admin_pizza_categorie === "Charcuterie"){
                $admin_pizza_categorie = "ham";
            }

            if ($admin_pizza_categorie === "Epicée"){
                $admin_pizza_categorie = "chili";
            }

            $query->bindValue(':admin_pizza_categorie', $admin_pizza_categorie, PDO::PARAM_STR);
            $query->bindValue(':admin_pizza_description', $admin_pizza_description, PDO::PARAM_STR);
            $query ->execute();
        
            // message de confirmation
            array_push($success_array,"Votre produit à l'identifiant " ."<strong>" .$db->lastInsertId()."</strong>" ." a été rajouté avec succès");  
        }


?>


<main class="container" id="update">

    <h1>Ajouter une pizza</h1>

    <hr color="blue">

    <form action="#" method="POST" enctype="multipart/form-data">

        <div class="form-group"> 


            <label for="exampleFormControlInput1">Nom de la pizza</label>
            <input type="text" class="form-control" id="<?php
        
        if(empty($_POST))
        {
            echo "default";
        }

        else if (!empty($errors_array['pizzaName']))
        {        
                echo "invalid";
        } 

        else if (empty($errors_array['pizzaName']))
        {        
                echo "valid";
        } 
        
        ;?>"
            
        
            placeholder="Nom de la pizza" name="admin_pizza_name"
                value="<?php echo $admin_pizza_name; ?>">
            <div class="feedback-<?= ($admin_pizza_name_validation === true) ? " valid" : "invalid" ;?>">
                <?php echo (isset($errors_array['pizzaName'])) ? $errors_array['pizzaName'] : "" ;?>
            </div>
        </div>

            <div class="form-group">


                <label for="exampleFormControlInput1">Prix - Euros</label>
                <input type="text" class="form-control" id="<?php
        
        if(empty($_POST))
        {
            echo "default";
        }

        else if (!empty($errors_array['pizzaPrice']) || !empty($errors_array['pizzaPriceType']) )
        {        
                echo "invalid";
        } 

        else if (empty($errors_array['pizzaPrice']) && empty($errors_array['pizzaPriceType']) )
        {        
                echo "valid";
        } 
        
        ;?>"
                
            
                 placeholder="Prix de la pizza"
                    name="admin_pizza_price" value="<?php echo $admin_pizza_price; ?>">

                <div class="feedback-<?= ($admin_pizza_price_validation === true) ? "valid" : "invalid" ;?>">
                    <?php echo (isset($errors_array['pizzaPrice'])) ? $errors_array['pizzaPrice'] : "" ;?>
                    <?php echo (isset($errors_array['pizzaPriceType'])) ? $errors_array['pizzaPriceType'] : "" ;?>
                </div>
            </div>


            <div class="form-group" id="upload"> 

                <label for="exampleFormControlInput1">Image</label><br>
                <input type="file" class="form-control" 
                
                id="<?php
        
                if(empty($_POST))
                {
                    echo "default";
                }

                else if (!empty($errors_array['pizzaImage']) || !empty($errors_array['pizzaImageType']) || !empty($errors_array['pizzaImagePoid']) )
                {        
                        echo "invalid";
                } 

                else if (empty($errors_array['pizzaImage']) && empty($errors_array['pizzaImageType']) && empty($errors_array['pizzaImagePoid'])  )
                {        
                        echo "valid";
                } 
                
                ;?>"
                
                name="admin_pizza_image">
            </div>

            <div class="feedback-<?= ($admin_pizza_image_validation === true) ? "valid" : "invalid" ;?>">
                <?php echo (isset($errors_array['pizzaImage'])) ? $errors_array['pizzaImage'] : "" ;?>
                <?php echo (isset($errors_array['pizzaImageType'])) ? $errors_array['pizzaImageType'] : "" ;?>
                <?php echo (isset($errors_array['pizzaImagePoid'])) ? $errors_array['pizzaImagePoid'] : "" ;?>
            </div>

            <div class="form-group"> 
        
                <label for="exampleFormControlSelect2">Choix de la catégorie</label>
                <select class="form-control" id="<?php
        
        if(empty($_POST))
        {
            echo "default";
        }

        else if (!empty($errors_array['pizzaCategory'])  )
        {        
                echo "invalid";
        } 

        else if (empty($errors_array['pizzaCategory'])  )
        {        
                echo "valid";
        } 
        
        ;?>"
                     
                name="admin_pizza_categorie">
                    <option selected></option>
                    <option <?php echo ($admin_pizza_categorie==='none' ) ? "selected" : "" ;?> > Aucune </option>
                    <option <?php echo ($admin_pizza_categorie==='vegetarian' ) ? "selected" : "" ;?>>
                        Végétarienne </option>
                    <option <?php echo ($admin_pizza_categorie==='ham' ) ? "selected" : "" ;?>> Charcuterie
                    </option>
                    <option <?php echo ($admin_pizza_categorie==='chili' ) ? "selected" : "" ;?>> Epicée </option>
                </select>
                <div class="feedback-<?= ($admin_pizza_categorie_validation === true) ? " valid" : "invalid" ;?>">
                    <?php echo (isset($errors_array['pizzaCategory'])) ? $errors_array['pizzaCategory'] : "" ;?>
                </div>
            </div>


            <div class="form-group"> 
            
                <label for="exampleFormControlTextarea1">Description de la pizza</label>
                <textarea class="form-control" id="<?php
        
        if(empty($_POST))
        {
            echo "default";
        }

        else if (!empty($errors_array['pizzaDescription'])  )
        {        
                echo "invalid";
        } 

        else if (empty($errors_array['pizzaDescription'])  )
        {        
                echo "valid";
        } 
        
        ;?>"
                    
                rows="3" name="admin_pizza_description"
                    placeholder="La description de la pizza"><?php echo $admin_pizza_description; ?></textarea>
                <div class="feedback-<?= ($admin_pizza_description_validation === true) ? " valid" : "invalid" ;?>">
                    <?php echo (isset($errors_array['pizzaDescription'])) ? $errors_array['pizzaDescription'] : "" ;?>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter le produit</button>

    </form>

</main>

<div class="container" id="success">

<div id="activate-<?php echo (!empty($success_array)) ? "on" : '' ; ?>" class="alert alert-success" role="alert">

    <?php // Affichage du succès
foreach ($success_array as $key => $value) {

echo "<br>";
echo $value ."<br>";
echo "<br>";

die();
}
?>

</div>



<?php
require_once __DIR__.'/partials/footer.php';
?>