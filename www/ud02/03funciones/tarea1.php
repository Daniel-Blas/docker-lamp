<?php 

// 1. Crea una función que reciba un carácter e imprima se o carácter é un díxito entre 0 e 9.

function dixito($char){
    if ($char >= 0 && $char <= 10){
        echo "O carácter é un díxito entre 0 e 9";
    } else {
        echo "O caracter non é un díxito entre 0 e 9";
    }
}

// 2. Crea una función que reciba un string e devolva a súa lonxitude.

function lonxitude($cadea){
    return strlen($cadea);
}

// 3. Crea una función que reciba dous número `a` e `b` e devolva o número `a` elevado a `b`.

function elevado($a, $b){
    $resultado = $a;
    for ($i = 1; $i<$b; $i++){
        $resultado *= $a; 
    }
    return $resultado;
}

// 4. Crea una función que reciba un carácter e devolva `true` se o carácter é unha vogal.



// 5. Crea una función que reciba un número e devolva se o número é par ou impar.
// 6. Crea una función que reciba un string e devolva o string en maiúsculas.
// 7. Crea una función que imprima a zona horaria (*timezone*) por defecto utilizada en PHP.
/* 8. Crea una función que imprima a hora á que sae e se pon o sol para a 
localización por defecto. Debes comprobar como axustar as coordenadas (latitude e lonxitude)
 predeterminadas do teu servidor.
*/


?>