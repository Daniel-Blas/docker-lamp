<?php 

/*
1. Crea una matriz con 30 posiciones y que contenga números aleatorios entre 0 y 20 (inclusive).
Uso de la función [rand](https://www.php.net/manual/es/function.rand.php). 
Imprima la matriz creada anteriormente.
*/

for ($i = 0; $i < 30; $i++){
    $aleatorios[$i] = rand(0, 20);
}

foreach ($aleatorios as $n){
    echo $n, "<br/>";
}

echo "<br/>";

/* 
2. (Optativo) Cree una matriz con los siguientes datos: 
`Batman`, `Superman`, `Krusty`, `Bob`, `Mel` y `Barney`.
    - Elimine la última posición de la matriz. 
    - Imprima la posición donde se encuentra la cadena 'Superman'. 
    - Agregue los siguientes elementos al final de la matriz: `Carl`, `Lenny`, `Burns` y `Lisa`. 
    - Ordene los elementos de la matriz e imprima la matriz ordenada. 
    - Agregue los siguientes elementos al comienzo de la matriz: `Apple`, `Melon`, `Watermelon`.
*/

$array = array('Batman', 'Superman', 'Krusty', 'Bob', 'Barney');
unset($array[sizeof($array)-1]);
echo array_search('Superman', $array), "<br/>";
array_push($array, 'Carl', 'Lenny', 'Burns', 'Lisa');
sort($array);

foreach ($array as $a){
    echo $a, "<br/>";
}

array_unshift($array, 'Apple', 'Melon', 'Watermelon');


/*3. (Optativo) Cree una copia de la matriz con el nombre `copia` con elementos del 3 al 5.
    - Agregue el elemento 'Pera' al final de la matriz. */ 


$copia = array_splice($array, 3, 3);
array_push($copia, 'Pera');

?>