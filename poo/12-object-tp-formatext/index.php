<?php

require_once 'Formatext.php';

$hello = "hello world";
$text = new FormatText;

echo $text->set($hello);
