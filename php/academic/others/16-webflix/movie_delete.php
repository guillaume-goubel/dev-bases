<?php
// Le fichier header.php est inclus sur la page
require_once(__DIR__.'/partials/header.php');

$movie = getMovie($_GET['id'] ?? 0);

if (!$movie) {
	httpNotFound();
}

deleteMovie($movie['id']);
redirect('.');
