<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>regex</title>
</head>
<body>

<p>
	<?php 

	if (empty($_POST['tel']))
				{
					echo "Merci de renseigner votre numéro de téléphone !";
				}


	else if (isset($_POST['tel'])) 
		{

				$_POST['tel'] = htmlspecialchars($_POST['tel']);

				if (preg_match('#^0[1-68]([-_. ]?[0-9]{2}){4}$#',$_POST['tel']))
				{
					echo "tel valide";
				}

				else
				{
					echo "tel invalide";
				}
	
		}



	

	?>
</p>
		
		<form method="post" action="test_regex.php">
		<label for="tel">Numéro de telephone :</label><input name="tel" id="tel">
		<input type="submit" value="Vérification!">
		</form>



</body>
</html>