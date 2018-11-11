
<div class="container" id="errors">

<div id="activate-<?php echo (!empty($errors_array)) ? " on" : '' ; ?>" class="alert alert-danger" role="alert">

    <?php 
foreach ($errors_array as $key => $value) {
echo $value ."<br>";
}
?>

</div>

</div>


<div class="container" id="success">

<div id="activate-<?php echo (!empty($success_array)) ? " on" : '' ; ?>" class="alert alert-success" role="alert">

    <?php // Affichage du succès
foreach ($success_array as $key => $value) {
echo $value ."<br>";
}
?>

</div>

</div>
