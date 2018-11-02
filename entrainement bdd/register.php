<?php 

require_once __DIR__.'/partials/header.php';


$users = null;
$emails = null;
$password = null;

$errors_array = [];

var_dump($errors_array);

if (!empty($_POST))
{	
	
	$users = $_POST['usernames'];
	$emails = $_POST['email'];
	$password  = $_POST['password']; 
	$password_confirm = $_POST['password_confirm'];


    // Création du tableau d'erreurs

	// travail sur le pseudo
	if (empty($_POST['usernames']) OR !preg_match("#^[a-zA-Z0-9_-]+$#", $users) ) 
	{
		$errors_array['usernames'] = "vous n'avez pas rentré de pseudo valide";
	}	


	else		
	{
		$query = $db->prepare('SELECT users FROM users WHERE users = :users');
		$query->bindValue(':users', $users, PDO::PARAM_STR);		
		$result = $query->fetch();

		if ($result['users'] === $users) 
		{
			$errors_array['usernames'] = "Le compte existe deja";
		} 
	}


	// travail sur les mails
	if (empty($emails) OR !preg_match ("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $emails )   ) 
	{
		$errors_array['email'] = "vous n'avez pas rentré de mail valide";
	}

	else		
	{
		$query = $db->prepare('SELECT emails FROM users WHERE email = :emails');
		$query->bindValue(':emails', $emails, PDO::PARAM_STR);
		$result = $query->fetch();

		if ($result['email'] === $emails) 
		{
			$errors_array['email'] = "Le mail est deja pris";
		} 
	}


	// travail sur le password
	if (empty($password) OR $password !== $password_confirm) 
	{
		$errors_array['password'] = "vous n'avez pas rentré de mot de passe bien confirmé";
	}
}


//inscription des nouvelles entrées dans les champs appropriés
	if (empty($errors_array)) 

	{	
		$query = $db->prepare('INSERT INTO users (users ,emails ,passwords) VALUES (:users, :email, :password )'); 

		$users = htmlspecialchars($users);
		$emails = htmlspecialchars($emails);
		$password = password_hash($password, PASSWORD_DEFAULT);

		$query->bindValue(':users', $users, PDO::PARAM_STR);
		$query->bindValue(':email', $emails, PDO::PARAM_STR);
		$query->bindValue(':password', $password, PDO::PARAM_STR);

		$query -> execute();
	}

 ?>

<form action="" method="POST">
	
	<div class="class-group">
		<label for="pseudo">Pseudo</label>
		<input type="text" name="usernames" class="form-control">
	</div>
	<div class="class-group">
		<label for="email">Email</label>
		<input type="text" name="email" class="form-control">
	</div>
	<div class="class-group">
		<label for="password">Mot de passe</label>
		<input type="text" name="password" class="form-control">
	</div>
	<div class="class-group">
		<label for="password_confirm">Confirmation du mot de passe</label>
		<input type="text" name="password_confirm" class="form-control">
	</div>
	<button type="submit" class="btn btn-primary">M'inscrire</button>
</form>



<?php 
require_once __DIR__.'/partials/footer.php';
?>