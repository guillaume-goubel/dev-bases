<?php

/**
 * We need to retrive categories from database.
 */
function getCategories()
{
	global $db;

	$query = $db->query('SELECT * FROM category ORDER BY name');

	return $query->fetchAll();
}

/**
 * We need to retrive categories randomly.
 */
function getRandomCategories()
{
	global $db;

	$query = $db->query('SELECT * FROM category ORDER BY RAND() LIMIT 3');
	$categories = $query->fetchAll();

	return $categories;
}

/**
 * We need to retrieve movies from database.
 * @param int $category_id A category id
 *
 * @return array
 */
function getMovies($category_id = null, $limit = null)
{
	global $db;

	$sql = 'SELECT * FROM movie';

	if (null !== $category_id) {
		$sql .= ' WHERE category_id = :category_id';
	}

	$sql .= ' ORDER BY title';

	if (is_numeric($limit)) {
		$sql .= ' LIMIT :limit';
	}

	$query = $db->prepare($sql);

	if (null !== $category_id) {
		$query->bindValue(':category_id', $category_id, PDO::PARAM_INT);
	}

	if (is_numeric($limit)) {
		$query->bindValue(':limit', $limit, PDO::PARAM_INT);
	}

	$query->execute();
	$movies = $query->fetchAll();

	return $movies;
}

/**
 * We need to retrive a movie from database.
 */
function getMovie($movie_id)
{
	global $db;

	$sql = 'SELECT * FROM movie WHERE id = :id';
	$query = $db->prepare($sql);
	$query->bindValue(':id', $movie_id);
	$query->execute();
	$movie = $query->fetch();

	return $movie;
}

/**
 * Add a movie in database.
 */
function addMovie($title, $description, $video_link, $cover, $released_at, $category)
{
	global $db;

	$query = $db->prepare('
		INSERT INTO movie (title, description, video_link, cover, released_at, category_id)
		VALUES (:title, :description, :video_link, :cover, :released_at, :category_id)
	');
	$query->bindValue(':title', $title, PDO::PARAM_STR);
	$query->bindValue(':description', $description, PDO::PARAM_STR);
	$query->bindValue(':video_link', $video_link, PDO::PARAM_STR);
	$query->bindValue(':cover', $cover, PDO::PARAM_STR);
	$query->bindValue(':released_at', $released_at, PDO::PARAM_STR);
	$query->bindValue(':category_id', $category, PDO::PARAM_STR);

	return $query->execute();
}

/**
 * Edit a movie in database.
 */
function editMovie($id, $title, $description, $video_link, $cover, $released_at, $category)
{
	global $db;

	$query = $db->prepare('
		UPDATE movie SET
			   title = :title,
			   description = :description,
			   video_link = :video_link,
			   cover = :cover,
			   released_at = :released_at,
			   category_id = :category_id
		WHERE id = :id
	');
	$query->bindValue(':title', $title, PDO::PARAM_STR);
	$query->bindValue(':description', $description, PDO::PARAM_STR);
	$query->bindValue(':video_link', $video_link, PDO::PARAM_STR);
	$query->bindValue(':cover', $cover, PDO::PARAM_STR);
	$query->bindValue(':released_at', $released_at, PDO::PARAM_STR);
	$query->bindValue(':category_id', $category, PDO::PARAM_STR);
	$query->bindValue(':id', $id, PDO::PARAM_INT);

	return $query->execute();
}

/**
 * Delete a movie in database.
 */
function deleteMovie($id)
{
	global $db;

	$query = $db->prepare('
		DELETE FROM movie WHERE id = :id
	');
	$query->bindValue(':id', $id, PDO::PARAM_INT);

	return $query->execute();
}
