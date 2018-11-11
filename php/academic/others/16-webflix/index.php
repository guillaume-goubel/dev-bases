<?php
// Le fichier header.php est inclus sur la page
require_once(__DIR__.'/partials/header.php');

$categories = getCategories();

?>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Webflix</h1>
    </div>

    <div class="py-5 bg-light">
        <div class="container">
            <?php foreach ($categories as $category) {
                $movies = getMovies($category['id']);

                if (empty($movies)) { continue; }

                ?>
                <h2 class="display-4"><?= $category['name']; ?></h2>
                <div class="row">
                    <?php foreach ($movies as $movie) { ?>

                        <div class="col-md-3">
                            <div class="card mb-4 shadow-sm">
                                <a href="movie_single.php?id=<?= $movie['id']; ?>">
                                    <div class="background-movie" style="background-image: url(assets/img/movies/<?= $movie['cover']; ?>)"></div>
                                    <img style="display: none" class="card-img-top" src="assets/img/movies/<?= $movie['cover']; ?>" alt="<?= $movie['title']; ?>">
                                </a>

                                <?php if ($user = isLogged()) { ?>
                                    <div class="card-body">
                                        <div class="btn-group">
                                            <a href="movie_edit.php?id=<?= $movie['id']; ?>" class="btn btn-sm btn-outline-secondary">Modifier</a>
                                            <a href="movie_delete.php?id=<?= $movie['id']; ?>" class="btn btn-sm btn-outline-danger">Supprimer</a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>

<?php
// Le fichier footer.php est inclus sur la page
require_once(__DIR__.'/partials/footer.php'); ?>
