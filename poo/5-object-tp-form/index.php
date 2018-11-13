<?php


spl_autoload_register(function ($class) {
    require_once $class .'.php';
});


/*************************** */
$username = $lastname = $age = null;


/*************************** */
if(!empty($_POST)){

$username = $_POST['username'];
$lastname = $_POST['lastname'];
$age = $_POST['age'];

}

$form1 = new Form([
    "username" => $username,
    "lastname" => $lastname ,
    "age" => $age ,
]);
?>

<form action="#" method="POST">

    <?php
    var_dump($form1);

    echo $form1->inputText("username");
    echo $form1->inputText("lastname");
    echo $form1->inputText("age");
    echo $form1->submit();

    var_dump($form1);
    ?>

</form>