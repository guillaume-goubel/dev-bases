<?php
// Récupérer l'ID de la pizza dans l'URL
$id = isset($_GET['id']) ? $_GET['id'] : 0;

// Inclus la base de données
require_once(__DIR__.'/config/database.php');

// Récupérer les informations de la pizza
$query = $db->prepare('SELECT * FROM pizza WHERE id = :id'); // :id est un paramètre
$query->bindValue(':id', $id, PDO::PARAM_INT); // on s'assure que l'id est bien un entier
$query->execute(); // Execute la requête
$pizza = $query->fetch();

// Renvoyer une 404 si la pizza n'existe pas
if ($pizza === false) {
	http_response_code(404);
	// On pourrait aussi rediriger l'utilisateur vers la liste des pizzas
	// header('Location: pizza_list.php');
	require_once(__DIR__.'/partials/header.php'); ?>
	<h1>404. Redirection dans 5 secondes...</h1>
	<script>
		setTimeout(function () {
			window.location = 'pizza_list.php';
		}, 5000);
	</script>
	<?php require_once(__DIR__.'/partials/footer.php');
	die();
}

$currentPageTitle = $pizza['name'];
// Le fichier header.php est inclus sur la page
require_once(__DIR__.'/partials/header.php'); ?>

    <main class="container">
        <div class="row">
        	<div class="col-md-6">
        		<img class="img-fluid" src="assets/<?php echo $pizza['image']; ?>" alt="<?php echo $pizza['name']; ?>">
        	</div>
        	<div class="col-md-6">
        		<h1><?php echo $pizza['name']; ?></h1>
        	</div>
        </div>
    </main>

<?php
// Le fichier footer.php est inclus sur la page
require_once(__DIR__.'/partials/footer.php'); ?>
