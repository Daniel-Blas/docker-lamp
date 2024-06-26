<?php

/**Busca en la documentación de PHP las funciones de [manejo de variables](http://www.php.net/manual/es/funcref.php)

Comprueba el resultado devuelto por los siguientes fragmentos de código y analiza el resultado:
```php
*/
$a = "true"; // imprime el valor devuelto por is_bool($a)...
echo is_bool($a);
$c = "false"; // imprime el valor devuelto por gettype($c);
echo gettype($c);
$d = ""; // el valor devuelto por empty($d);
echo empty($d);
$e = 0.0; // el valor devuelto por empty($e);
echo empty($e);
$f = 0; // el valor devuelto por empty($f);
echo empty($f);
$g = false; // el valor devuelto por empty($g);
echo empty($g);
$h; // el valor devuelto por empty($h);
echo empty($h);
$i = "0"; // el valor devuelto por empty($i);
echo empty($i);
$j = "0.0"; // el valor devuelto por empty($j);
echo empty($j);
$k = true; // el valor devuelto por isset($k);
echo isset($k);
$l = false; // el valor devuelto por isset($l);
echo isset($l);
$m = true; // el valor devuelto por is_numeric($m);
echo is_numeric($m);
$n = ""; // el valor devuelto por is_numeric($n);
echo is_numeric($n);

?>