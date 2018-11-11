<?php
$currentPageTitle = 'Nos pizzas';
// Le fichier header.php est inclus sur la page
require_once(__DIR__.'/partials/header.php');

// Récupérer la liste des pizzas
$query = $db->query('SELECT * FROM pizza');
$pizzas = $query->fetchAll();


// Transformer 13.00 en 13,oo
// Méthode 1
$price = '13.00';
$price = str_replace('.', ',', $price);
$explodedPrice = explode(',', $price);
// echo $explodedPrice[0].',<span style="font-size: 12px">'.$explodedPrice[1].'</span>';
// Méthode 2
$price = '13.00';
$first = substr($price, 0, -2); // 13
$cents = substr($price, -2); // 00
// echo $first.',<span style="font-size: 12px">'.$cents.'</span>';
// Méthode 3
/*echo preg_replace(
	'/\.(\d+)/',
	'<span class="card-price-cents">€${1}</span>',
	$pizza['price']
);*/
?>

    <main class="container">
        <h1 class="page-title">Liste des pizzas</h1>

        <div class="row">
	    	<?php
	    	// On affiche les pizzas
	    	foreach ($pizzas as $pizza) { ?>

	    		<div class="col-md-3">
	    			<div class="card mb-4">
	    				<div class="card-img-top-container">
	    					<img class="card-img-top card-img-top-zoom-effect" src="assets/<?php echo $pizza['image']; ?>" alt="<?php echo $pizza['name']; ?>">

	    					<span class="card-price">
	    						<?php echo formatPrice($pizza['price']); ?>
	    					</span>
	    				</div>
	    				
		    			<div class="card-body">
		    				<h5 class="card-title"><?php echo $pizza['name']; ?></h5>
		    				<!--
								Quand on clique sur le lien, on doit se rendre sur pizza_single.php
								L'URL doit ressembler à pizza_single.php?id=IDDELAPIZZA
		    				-->
		    				<a href="pizza_single.php?id=<?php echo $pizza['id']; ?>" class="btn btn-danger">Commandez</a>
		    			</div>
		    		</div>
	    		</div>

	    	<?php } ?>
    	</div>
    </main>

<?php
// Le fichier footer.php est inclus sur la page
require_once(__DIR__.'/partials/footer.php'); ?>
