<?php require 'inc/header.php';?>

<?php 

if (!empty($_POST))
{	
	
    // Création du tableau d'erreurs
	$errors = array();

	//Connection à la Bdd via PDO
	require_once 'inc/bdd.php';


	// travail sur le pseudo
	if (empty($_POST['usernames']) OR !preg_match("#^[a-zA-Z0-9_-]+$#",$_POST['usernames']) ) 
	{
		$errors['usernames'] = "vous n'avez pas rentré de pseudo valide";
	}	

	else		
	{
		$req = $pdo->prepare('SELECT usernames FROM insciption WHERE usernames = ?');
		$req->execute(array($_POST['usernames']));

		$donnees = $req->fetch();

		if ($donnees['usernames'] == $_POST['usernames'] ) 
		{
		 	$errors['usernames'] = "Le compte existe deja";
		} 
	}


	// travail sur les mails
	if (empty($_POST['email']) OR !preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])) 
	{
		$errors['email'] = "vous n'avez pas rentré de mail valide";
	}

	else		
	{
		$req = $pdo->prepare('SELECT email FROM insciption WHERE email = ?');
		$req->execute(array($_POST['email']));

		$donnees = $req->fetch();

		if ($donnees['email'] == $_POST['email'] ) 
		{
		 	$errors['email'] = "Le mail est deja pris";
		} 
	}


	// travail sur le password
	if (empty($_POST['password']) OR $_POST['password'] != $_POST['password_confirm']) 
	{
		$errors['password'] = "vous n'avez pas rentré de mot de passe valide";
	}




//inscription des nouvelles entrées dans les champs appropriés
	if (empty($errors)) 
	{	
		$req = $pdo->prepare('INSERT INTO insciption(usernames,email,password) VALUES (?,?,?)'); 

		$usernames_XSS = htmlspecialchars($_POST['usernames']);
		$email_XSS = htmlspecialchars($_POST['email']);
		$password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
		
		$req->execute(array($usernames_XSS, $email_XSS, $password_hash));
	}


}


 ?>

<button class="btn btn-link"><a href="register.php"">S'inscrire</a></button>

<button class="btn btn-link"><a href="login.php">Se connecter</a></button>


<h1>Inscription</h1>

<?php if(!empty($errors)): ?>

	<div class="alert alert-danger">
		<p>Vous n'avez pas bien renseigné le formulaire !</p>
		 
		<?php foreach($errors as $key => $error): ?>
			<ul>
				<li> <?php echo $key.' '.$error; ?> </li>
			</ul>
		<?php endforeach; ?>		 		
	</div>

<?php endif; ?>




<?php if( empty($errors) AND !empty($_POST['usernames']) AND !empty($_POST['email']) AND !empty($_POST['password'])): ?>

	<div class="alert alert-success">
		<p>Vous êtes inscrit(e)! Félicitations !</p>
		<p>Vous pouvez maintenant vous <strong>CONNECTER</strong> à votre compte</p>	 		
	</div>

<?php endif; ?>


<form action="" method="POST">
	
	<div class="class-group">
		<label for="pseudo">Pseudo</label>
		<input type="text" name="usernames" class="form-control" required/>
	</div>
	<div class="class-group">
		<label for="email">Email</label>
		<input type="text" name="email" class="form-control" required />
	</div>
	<div class="class-group">
		<label for="password">Mot de passe</label>
		<input type="text" name="password" class="form-control" required/>
	</div>
	<div class="class-group">
		<label for="password_confirm">Confirmation du mot de passe</label>
		<input type="text" name="password_confirm" class="form-control" required/>
	</div>
	<button type="submit" class="btn btn-primary">M'inscrire</button>
</form>

<?php require 'inc/footer.php';?>