<?php
include_once "./ExcepcionPropiaClase.php";

$ex1 = new ExcepcionPropiaClase();
try {
    $ex1->testNumber(34);

} catch (ExcepcionPropia $e){
    echo "Excepción capturada.</br>";
}

try {
    $ex1->testNumber(0);

} catch (ExcepcionPropia $e){
    echo "Excepción capturada.</br>";
}

try {
    $ex1->testNumber("Hola");

} catch (ExcepcionPropia $e){
    echo "Excepción capturada.</br>";
}

try {
    $ex1->testNumber(0);

} catch (ExcepcionPropia $e){
    echo "Excepción capturada.</br>";
}
?>