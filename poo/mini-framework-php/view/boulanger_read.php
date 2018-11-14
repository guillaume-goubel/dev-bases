<?php 
$id = (isset($_GET['id'])) ? $_GET['id'] : 0;
$nom = (isset($_GET['nom'])) ? $_GET['nom'] : "inconnu";
$nb_vendu = (isset($_GET['nb_vendu'])) ? $_GET['nb_vendu'] : 0;
 ?>
<h2>Voir un boulanger</h2>
<a href="/mini-framework-php/">Liste</a> | <a href="/mini-framework-php/view/boulange_create.php">Ajouter</a><br><hr>
<p>Le boulanger numéro  <strong><?= $id ?></strong> s'appelle <strong><?= $nom ?></strong> et à vendu <strong><?= $nb_vendu ?></strong> pain(s)</p>

