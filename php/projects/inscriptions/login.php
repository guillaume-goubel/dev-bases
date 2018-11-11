<?php require 'inc/header.php';?>

<?php  

$errors = array();

if (!empty($_POST))
{

	require_once 'inc/bdd.php';
	require_once 'inc/functions.php';
	
	if (empty($_POST['usernames'])) 
	{
		$errors['usernames'] = 'Attention, merci de renseigner le pseudo';
	}

	else
	{
			$req = $pdo->prepare('SELECT usernames FROM insciption WHERE usernames = ?');
			$req->execute(array($_POST['usernames']));

			$donnees = $req->fetch();

			if ($_POST['usernames'] != $donnees['usernames'])
			{
				$errors['usernames'] = 'Attention, pseudo inconnu';
			}
	}



	if (empty($_POST['password'])) 
	{
		$errors['password'] = 'Attention, merci de renseigner le mot de passe';
	}
	
	else 	
	{ 		
			$req = $pdo->prepare('SELECT password FROM insciption WHERE usernames = ?');
			$req->execute(array($_POST['usernames']));

			$donnees = $req->fetch();

			if (password_verify($_POST['password'], $donnees['password']) != true)
			{
				$errors['password'] = 'Attention, mot de passe inconnu';
			}
	}


	if  ($_POST['ouvrir_session'] == "oui" AND empty($errors) ) 
	{
		session_start();

		$_SESSION['pseudo'] = $_POST['usernames'];
	}

}

?>



<button class="btn btn-link"><a href="register.php"">S'inscrire</a></button>

<button class="btn btn-link"><a href="login.php">Se connecter</a></button>


<?php if(!empty($errors)): ?>

	<div class="alert alert-danger">
		<p>Vous n'avez pas bien renseigné le formulaire !</p>
		 
		<?php foreach($errors as $error): ?>
			<ul>
				<li> <?php echo ''.$error.''; ?> </li>
			</ul>
		<?php endforeach; ?>		 		
	</div>

<?php endif; ?>



<?php if( empty($errors) AND !empty($_POST['usernames']) AND !empty($_POST['password'])): ?>

	<div class="alert alert-success">
		<p>Vous êtes maintenant connecté à votre compte !	
		<p><a href="chat.php">Vous pouvez vous rendre sur le forum</a></p>	
	</div>
<?php endif; ?>



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


<?php require 'inc/footer.php';?>