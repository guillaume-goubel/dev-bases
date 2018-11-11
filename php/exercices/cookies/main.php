<?php 

setcookie('pseudo', 'guixou', time()+ 365*24*3600 , null ,null ,false ,true);

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

</head>
<body>
	<p>
	<a href="cookies.php">vers l'autre page</a>
	</p>

	<p>
	<?php 

	if (isset($_COOKIE['pseudo'])){

		echo $_COOKIE['pseudo'];
	}

	
	 ?>
	</p>

</body>
</html>