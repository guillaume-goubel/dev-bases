<?php

require_once 'Formatext.php';

$hello = "Hello World";
$text = new FormatText();

echo $text->set($hello)->print(). "<br>";
echo $text->set($hello)->bold()->print(). "<br>";
echo $text->set($hello)->italic()->print(). "<br>";
echo $text->set($hello)->strike()->print(). "<br>";
echo $text->set($hello)->italic()->bold()->strike()->print(). "<br>";






