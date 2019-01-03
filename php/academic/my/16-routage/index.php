<?php
 $path = pathinfo($_SERVER["SCRIPT_FILENAME"]);
 if($path["extension"] == "php"){
     error_log("requete OK pour" .$_SERVER["SCRIPT_FILENAME"]);
    header("Content-Type : text/html");
    highlight_file($_SERVER["SCRIPT_FILENAME"], false);
  } else{
     return false;
}

?>


<p>

  bonjour

  <br>Voici du
  <?= "PHP" ?>

</p>

<?php
// phpinfo();
?>


<?php

echo(ini_get('session.save_handler'));

?>