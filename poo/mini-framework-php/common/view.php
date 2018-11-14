<?php namespace common;

// redirige vers la bonne vue

class View
{
	public static function show($view, $data)
	{
		$nb_param = count($data);
		$index = 0;
		$params = "";
		foreach ($data as $key => $value) {
			$index ++;
			// créer une chaine de paramètres pour l'url
			$params .= "$key=$value&";
		}

		// $params .= "view=$view";
		
		$url = "/mini-framework-php/view/$view.php?$params";
		// echo $url;
		header('Location:'.$url);
	}
}

?>
