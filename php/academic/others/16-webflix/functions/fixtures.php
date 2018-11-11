<?php

require_once(__DIR__.'/../config/database.php');

$categories = [
	'Comédie', 'Action', 'Drame'
];

$movies = [
	[
		'title' => 'The Amazing Spider-Man',
		'description' => 'Peter Parker est un adolescent combattant le crime sous le nom de Spider-Man après avoir été mordu par une araignée transgénique dans les laboratoires Oscorp. Chassé par les autorités sous les ordres du capitaine Stacy, le père de sa petite amie Gwen, Peter tente de sauver New York du Docteur Connors, l\'ex-associé de son père métamorphosé en créature reptilienne, le Lézard.',
		'video_link' => 'iUw1O12JyEQ',
		'cover' => 'the-amazing-spider-man.jpg',
		'released_at' => '2012-07-04',
		'category_id' => 3
	],
	[
		'title' => 'Tonnerre sous les tropiques',
		'description' => 'Tonnerre sous les tropiques, le livre de John « Four Leaf » Tayback, un vétéran de la guerre du Viêt Nam dont les mains, arrachées par une grenade, ont été remplacées par des crochets, est adapté au cinéma.',
		'video_link' => 'B2lXd0Us6SM',
		'cover' => 'tropic-thunder.jpg',
		'released_at' => '2008-10-15',
		'category_id' => 1
	],
	[
		'title' => 'Narcos',
		'description' => 'À la fin des années 1970, les États-Unis et la Colombie se lancent dans une lutte acharnée contre le cartel de drogue de Medellín. Steve Murphy, jeune agent de la DEA fait son possible en compagnie de Javier Peña pour faire tomber Pablo Escobar et ses hommes, malgré l\'importante corruption policière qui gangrène la Colombie. Cette lutte se mêle à celle des États-Unis contre le communisme et à de nombreux autres intérêts politiques.',
		'video_link' => 'VBLcYJ7C4F0',
		'cover' => 'narcos.jpg',
		'released_at' => '2015-08-28',
		'category_id' => 2
	]
];

$db->query('TRUNCATE TABLE movie');
$db->query('SET FOREIGN_KEY_CHECKS = 0; TRUNCATE TABLE category');

$query = $db->prepare('
	INSERT INTO category (name) VALUES (:name)
');
$query->bindParam(':name', $name, PDO::PARAM_STR);

foreach ($categories as $category) {
	$name = $category;
	$query->execute();
}

$query = $db->prepare('
	INSERT INTO movie (title, description, video_link, cover, released_at, category_id)
	VALUES (:title, :description, :video_link, :cover, :released_at, :category_id)
');
$query->bindParam(':title', $title, PDO::PARAM_STR);
$query->bindParam(':description', $description, PDO::PARAM_STR);
$query->bindParam(':video_link', $video_link, PDO::PARAM_STR);
$query->bindParam(':cover', $cover, PDO::PARAM_STR);
$query->bindParam(':released_at', $released_at, PDO::PARAM_STR);
$query->bindParam(':category_id', $category_id, PDO::PARAM_INT);

for ($i = 0; $i < 10; $i++) {
	foreach ($movies as $movie) {
		$title = $movie['title'];
		$description = $movie['description'];
		$video_link = $movie['video_link'];
		$cover = $movie['cover'];
		$released_at = $movie['released_at'];
		$category_id = $movie['category_id'];
		$query->execute();
	}
}
