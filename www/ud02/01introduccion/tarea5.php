<?php
/*1. Escribe un programa que pase de grados Fahrenheit a Celsius. 
Para pasar de Fahrenheit a Celsius se resta 32 a la temperatura, 
se multiplica por 5 y se divide entre 9.*/

$far = 67;
$cel = (($far - 32) * 5) / 9;
echo "Grados farhrenheit: $far <br>";
echo "Grados celsius: $cel";


/*2. Crea un programa en PHP que declare e inicialice dos 
variables x e y con los valores 20 y 10 respectivamente y
muestre la suma, la resta, la multiplicación, 
la división y el módulo de ambas variables. */
/*(Optativo) Haz dos versiones de este ejercicios.
    - Guarda los resultados en nuevas variables.
    - Sin utilizar variables intermedias. */

$x = 20;
$y = 10;

echo "<br>";


echo "X = $x";
echo "<br>";
echo "Y = $y";
echo "<br>";

// Versión con variables
$xMasy = $x + $y;
$xMenosy = $x - $y;
$xPory = $x * $y;
$xDivy = $x / $y;
$xMody = $x % $y;

echo "X + Y = $xMasy";
echo "<br>";
echo "X - Y = $xMenosy";
echo "<br>";
echo "X * Y = $xPory";
echo "<br>";
echo "X / Y = $xDivy";
echo "<br>";
echo "X % Y = $xMody";
echo "<br>";

// Versión sin variables
echo "X + Y = ", $x + $y;
echo "<br>";
echo "X - Y = ", $x - $y;
echo "<br>";
echo "X * Y = ", $x * $y;
echo "<br>";
echo "X / Y = ", $x / $y;
echo "<br>";
echo "X % Y = ", $x % $y;
echo "<br>";

/*3. (Optativo) Escribe un programa que imprima por pantalla los cuadrados de los 
30 primeros números naturales.*/ 

for ($i = 1; $i<=30; $i++) {
    echo "$i * $i = ", $i * $i;
    echo "<br>";
}

/*4. Hacer un programa php que calcule el área y el perímetro de un rectángulo
 (```área=base*altura``` y (```perímetro=2*base+2*altura```). Debéis declarar 
 las variables base=20 y altura=10. */

 $base = 20;
 $altura = 10;

 echo "Área: ", area($base, $altura);
 echo "<br>";
 echo "Perímetro: ", perimetro($base, $altura);

 function area($b, $a){
    return $b * $a;
 }
function perimetro($b, $a){
    return (2 * $b) + (2 * $a);
}
?>