<?php require_once __DIR__.'/partials/header.php'; 

spl_autoload_register(function ($class) {
    require_once 'classes/'.$class .'.class.php';
}); 


if (!empty($_POST)){
    $title = $_POST["title"];
    $author = $_POST["author"];
    $category = $_POST["category"];
    $keyword = $_POST["keyword"];
    $content = $_POST["content"];

    } else {
    $title = $author = $category = $keyword = $content = "";
    }

$post1 = new Post($title, $author,  $category, $keyword,  $content ); 
var_dump($post1);


// $connexion = new PDO ('mysql:host=localhost;dbname=blog;charset=UTF8', 'root' , '');
// $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_ASSOC); 

// $dataManager = new DataManager($connexion);
// $connexion->query('SELECT * FROM users');

// var_dump($dataManager); 

?>

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">BLOG</h1>
    </div>
</section>

<main id="main-container">

    <div class="gauche">

        <form action="#" method="POST">

            <p><input type="text" placeholder="Titre" name="title"></p>
            <p><input type="text" placeholder="Auteurs" name="author"></p>
            <p><input type="text" placeholder="Categorie" name="category"></p>
            <p><input type="text" placeholder="Mots clés" name="keyword"></p>
            <p><textarea rows="10" cols="50" type="textaera" placeholder="Contenu" name="content"></textarea></p>
            <button type='submit' class="btn btn-primary">Ajouter un post</button>

        </form>

    </div>

    <div class="droite">

        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <p class="card-text">This is a wider card with supporting text below as a natural
                                lead-in to additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">Auteur</small>
                                <small class="text-muted">Date création</small>
                                <small class="text-muted">Date publication</small>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</main>


<?php require_once __DIR__.'/partials/footer.php'; ?>