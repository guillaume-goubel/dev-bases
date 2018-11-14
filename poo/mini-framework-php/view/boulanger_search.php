<h2>Liste de boulanger</h2>
<a href="/mini-framework-php/view/boulanger_create.php">Ajouter</a><br><hr>
<?php 
include_once('../entity/boulanger.php');

if(isset($_GET['data']))
{
	// déencoder l'url
	$data = urldecode(($_GET['data']));
	$data = unserialize($data);

	foreach ($data as $key => $value) 
	{
		?>
			<a href="/mini-framework-php/controller/boulanger.php?action=read&id=<?=$value->get_id()?>"><?=$value->get_nom()?></a><br>
		<?php
	}
}

?>