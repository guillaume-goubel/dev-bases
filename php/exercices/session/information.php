<?php 

session_start();

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Information</title>
</head>
<body>
	
<p>

Bonjour :

<?php 
echo $_SESSION['prenom'];
echo $_SESSION['nom'];

?>

</p>	

<p>
Ton age est de <?php echo ' '.$_SESSION['age'].' ans' ?>

</p>

 

<pre>
<?php print_r($_SESSION);?>
<pre>
 


</body>
</html>