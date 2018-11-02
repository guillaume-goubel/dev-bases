<?php 

require_once __DIR__.'/partials/header.php';

$users = null;
$password = null;

$errors_array = [];

var_dump($errors_array);


if (!empty($_POST))
{

	$users = $_POST['usernames'];
	$password  = $_POST['password']; 


	if (empty($_POST['usernames'])) 
	{
		$errors_array['usernames'] = 'Attention, merci de renseigner le pseudo';
	}

/* 	else
	{
			$query = $db->prepare('SELECT users FROM users WHERE users = :users');
			$query->bindValue(':users', $users, PDO::PARAM_STR);

			$results = $query->fetch();

			if ($_POST['usernames'] !== $results['usernames'])
			{
				$errors_array['usernames'] = 'Attention, pseudo inconnu';
			}
	}



	if (empty($_POST['password'])) 
	{
		$errors_array['password'] = 'Attention, merci de renseigner le mot de passe';
	}
	
	else 	
	{ 		
			$query = $db->prepare('SELECT passwords FROM users WHERE passwords = :passwords');
			$query->bindValue(':passwords', $password, PDO::PARAM_STR);

			$results = $query->fetch();

			if (password_verify($_POST['password'], $results['password']) != true)
			{
				$errors_array['password'] = 'Attention, mot de passe inconnu';
			}
	}


	if  ($_POST['ouvrir_session'] === "oui" AND empty($errors_array) ) 
	{
		session_start();

		$_SESSION['pseudo'] = $users;

	}
 */

var_dump($errors_array);
}



/* if(empty($errors_array) AND !empty($_POST['usernames']) AND !empty($_POST['password'])){

	echo 'vous etes connecté';
	var_dump($_SESSION['pseudo']);	
	}
	 */
?>


<h1>Connexion compte</h1>

<form action="" method="POST">
	
	<div class="class-group">
		<label for="pseudo">Connexion pseudo</label>
		<input type="text" name="usernames" class="form-control" />
	</div>

	<div class="class-group">
		<label for="password">Mot de passe</label>
		<input type="text" name="password" class="form-control" />
	</div>
	<div class="class-group">
		<label for="password">Se souvenir de moi ?</label> 
		oui<input type="radio" name="ouvrir_session" value="oui" checked="checked">
		non<input type="radio" name="ouvrir_session" value="non">
	</div>
		<button type="submit" class="btn btn-primary">Me connecter</button>

</form>


<?php 
require_once __DIR__.'/partials/footer.php';
?>