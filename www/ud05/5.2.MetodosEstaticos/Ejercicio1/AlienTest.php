<?php
require_once "./Alien.php";

$alien1 = new Alien("Pedro");
echo $alien1->getNumberOfAliens() . "</br>";
$alien2 = new Alien("Manuel");
$alien3 = new Alien("Ines");
$alien4 = new Alien("Laura");
echo $alien3->getNumberOfAliens();
?>