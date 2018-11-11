<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>secret</title>
</head>
<body>

<?php 

if (    isset($_POST['mot_passe']) AND ($_POST['mot_passe'] =='kangourou')  )
{
?>

<p>Voici le secret :</p>
<strong>Je t'aime</strong>

<?php 
}

else

{

	echo 'Ce n\'est pas le bon mot de passe !!';
}


?>
	


<p>
</p>

</body>
</html>