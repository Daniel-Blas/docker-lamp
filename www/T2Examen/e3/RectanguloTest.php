<?php
namespace e3;
require_once "Rectangulo.php";

$rectangulo1 = new Rectangulo(23, 15);
$rectangulo1->dibujar();
$rectangulo1->agrandar(2);
$rectangulo1->dibujar();
$rectangulo1->encoger(3);
$rectangulo1->dibujar();