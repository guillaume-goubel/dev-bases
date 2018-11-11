<?php
// Le fichier header.php est inclus sur la page
require_once(__DIR__.'/partials/header.php');

$movie = getMovie($_GET['id'] ?? 0);

if (!$movie) {
	httpNotFound();
}

?>

	<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"><?= $movie['title']; ?></h1>
    </div>

    <div class="py-5 bg-light">
        <div class="container">
        	<div class="row">
        		<div class="col-md-6">
        			<img class="img-fluid" src="assets/img/movies/<?= $movie['cover']; ?>" alt="<?= $movie['title']; ?>">
        		</div>
        		<div class="col-md-6">
        			<div>
        				<?= $movie['description']; ?>
        			</div>
        		</div>
        	</div>

        	<div class="row mt-5">
        		<div class="col-md-12">
        			<div class="embed-responsive embed-responsive-16by9">
	        			<iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $movie['video_link']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="embed-responsive-item"></iframe>
	        		</div>
        		</div>
        	</div>
        </div>
    </div>

<?php
// Le fichier footer.php est inclus sur la page
require_once(__DIR__.'/partials/footer.php'); ?>
