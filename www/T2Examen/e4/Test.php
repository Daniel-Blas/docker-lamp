<?php
require_once "Perro.php";
require_once "Gato.php";


// Creación de los objetos
$gato1 = new Gato("Lin", 5);
$perro1 = new Perro("Cora", 7);

// Prueba
echo "Nombre del gato: ";
echo $gato1->obtenerNombre();
echo "<br>";
echo "Nombre del perro: ";
echo $perro1->obtenerNombre();
echo "<br>";

$gato1->emitirSonido();
$perro1->emitirSonido();



?>