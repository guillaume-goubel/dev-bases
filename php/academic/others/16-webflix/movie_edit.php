<?php
// Le fichier header.php est inclus sur la page
require_once(__DIR__.'/partials/header.php');

$movie = getMovie($_GET['id'] ?? 0);

if (!$movie) {
    httpNotFound();
}

$title = $movie['title'];
$description = $movie['description'];
$video_link = $movie['video_link'];
$cover = $movie['cover'];
$released_at = $movie['released_at'];
$category = $movie['category_id'];

$categories = getCategories();
$id_categories = array_map(function ($category) {
	return $category['id'];
}, $categories);

if (isSubmit()) {
	foreach ($_POST as $variable => $value) {
		$$variable = $value;
	}

    $errors = [];

    if (empty($title)) {
        $errors['title'] = 'Le titre est vide.';
    }

    if (empty($description)) {
        $errors['description'] = 'La description est vide.';
    }

    if (empty($video_link)) {
        $errors['video_link'] = 'Le lien de la vidéo n\'est pas correct.';
    }

    if (!isValidDate($released_at)) {
    	$errors['released_at'] = 'La date n\'est pas valide';
    }

    if (!in_array($category, $id_categories)) {
    	$errors['category'] = 'La catégorie n\'existe pas';
    }

    if (empty($errors)) {
    	if (editMovie($movie['id'], $title, $description, $video_link, slug($title).'.jpg', $released_at, $category)) {
    		redirect('.');
    	}
    }
}

?>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Modifier <?= $movie['title']; ?></h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="offset-3 col-md-6">
                <form method="POST">
                    <div class="form-group">
                        <label for="title">Titre</label>
                        <input class="form-control <?php echo isset($errors['title']) ? 'is-invalid' : null; ?>" type="text" name="title" value="<?php echo $title; ?>">
                        <?php if (isset($errors['title'])) { ?>
                            <div class="invalid-feedback"><?php echo $errors['title']; ?></div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control <?php echo isset($errors['description']) ? 'is-invalid' : null; ?>" name="description"><?php echo $description; ?></textarea>
                        <?php if (isset($errors['description'])) { ?>
                            <div class="invalid-feedback"><?php echo $errors['description']; ?></div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="video_link">Lien de la vidéo</label>
                        <input class="form-control <?php echo isset($errors['video_link']) ? 'is-invalid' : null; ?>" type="text" name="video_link" value="<?php echo $video_link; ?>">
                        <?php if (isset($errors['video_link'])) { ?>
                            <div class="invalid-feedback"><?php echo $errors['video_link']; ?></div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="cover">Jaquette</label>
                        <input class="form-control <?php echo isset($errors['cover']) ? 'is-invalid' : null; ?>" type="file" name="cover">
                        <?php if (isset($errors['cover'])) { ?>
                            <div class="invalid-feedback"><?php echo $errors['cover']; ?></div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="released_at">Date de sortie</label>
                        <input class="form-control <?php echo isset($errors['released_at']) ? 'is-invalid' : null; ?>" type="date" name="released_at" value="<?php echo $released_at; ?>">
                        <?php if (isset($errors['released_at'])) { ?>
                            <div class="invalid-feedback"><?php echo $errors['released_at']; ?></div>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="category">Catégorie</label>
                        <select class="form-control <?php echo isset($errors['category']) ? 'is-invalid' : null; ?>" name="category">
                        	<?php foreach ($categories as $categoryOnDb) { ?>
                        		<option <?php echo $category == $categoryOnDb['id'] ? 'selected' : null; ?> value="<?= $categoryOnDb['id']; ?>"><?= $categoryOnDb['name']; ?></option>
                        	<?php } ?>
                        </select>
                        <?php if (isset($errors['category'])) { ?>
                            <div class="invalid-feedback"><?php echo $errors['category']; ?></div>
                        <?php } ?>
                    </div>
                    <button class="btn btn-block btn-primary">Modifier le film</button>
                </form>
            </div>
        </div>
    </div>

<?php
// Le fichier footer.php est inclus sur la page
require_once(__DIR__.'/partials/footer.php'); ?>
