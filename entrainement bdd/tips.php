

<h1>Inscription</h1>

<?php if(!empty($errors_array)): ?>

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







	if  ($_POST['ouvrir_session'] === "oui" AND empty($errors_array) ) 
	{
		session_start();

		$_SESSION['pseudo'] = $users; 

	}