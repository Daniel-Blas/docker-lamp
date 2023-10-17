<?php 

//1. Almacena en un array los 10 primeros números pares. Imprímelos cada uno en una línea utilizando los valores contenidos en el array.

for ($i=0; $i<10; $i++){
    $pares[$i] = $i * 2;
}
foreach ($pares as $n){
    echo $n, "<br />";
}

echo "<br/>";

/* 2. Imprime los valores del array asociativo siguiente usando un foreach:*/
$v[1]=90;
$v[10] = 200;
$v['hola']=43;
$v[9]='e';

foreach($v as $n){
    echo $n, "<br/>";
}

?>