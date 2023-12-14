<?php
include "e1.php";
$arrayCualquiera = array(4, 7, 4.5, "hola");

$resultadoPar = isPar($arrayCualquiera);
$resultadoImpar = isImpar($arrayCualquiera);

foreach ($resultadoPar as $r){
    echo $r;
}

echo "</br>";

foreach ($resultadoImpar as $r){
    echo $r;
}