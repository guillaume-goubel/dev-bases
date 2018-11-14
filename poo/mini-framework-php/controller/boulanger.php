<?php namespace controller;

include_once('../common/view.php');
include_once('../entity/boulanger.php');
include_once('../dao/factory.php');

use common\View;
use entity\Boulanger;
use dao\Factory;

// vérifier si la méthode est GET 
// et appeler la méthode en fonction de l'action
if(isset($_GET['action']))
{
	$action = $_GET['action'];
	BoulangerController::$action($_GET);
}

// vérifier si la méthode est POST 
// et appeler la méthode en fonction de l'action
if(isset($_POST['action']))
{
	$action = $_POST['action'];
	BoulangerController::$action($_POST);
}

class BoulangerController
{
	public static function search($req)
	{
		$boul = new Boulanger();
		$facto = new Factory();
		$list = serialize($facto->search($boul, ""));
		View::show('boulanger_search', array('data' => urlencode($list)));
	}

	public static function create($req)
	{
		// récupérer les paramètres de la requête
		$nom = $req['nom'];
		$nb_vendu = $req['nb_vendu'];

		// instantancier les objects Factory et Boulanger
		$boul = new Boulanger();
		$facto = new Factory();

		// initialiser les propriétés du boulanger
		$boul->set_nom($nom);
		$boul->set_nb_vendu($nb_vendu);

		// ajouter le boulanger dans la base
		$facto->create($boul);

		// rediriger vers la liste de boulangers
		header('Location:/mini-framework-php/controller/boulanger.php?action=search');
	}

	public static function read($req)
	{
		// instancier un object Boulanger
		$boul = new Boulanger();
		// initialiser l'id
		$boul->set_id($req['id']);
		// effectuer la recherche dans la base
		$facto = new Factory();
		$found = $facto->read($boul);
		// envoyer les données à la vue et l'afficher
		View::show('boulanger_read', array('id' => $found->get_id(), 'nom' => $found->get_nom(), 'nb_vendu' => $found->get_nb_vendu()));
	}

	public static function update($req)
	{

	}

	public static function delete($req)
	{

	}
}

 ?>