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

function vogal($a){
    switch($a){
        case 'a';
        case 'A';
        case 'e';
        case 'E';
        case 'i';
        case 'I';
        case 'o';
        case 'O';
        case 'u';
        case 'U' :
            return true;
        default :
        return false;
    }
}

// 5. Crea una función que reciba un número e devolva se o número é par ou impar.

function par($n){
    if ($n%2 == 0){
        return true;
    } else {
        return false;
    }
}

// 6. Crea una función que reciba un string e devolva o string en maiúsculas.

function maiusculas($s){
    return strtoupper($s);
}

// 7. Crea una función que imprima a zona horaria (*timezone*) por defecto utilizada en PHP.

function zonah(){
    echo date_default_timezone_get();
}

/* 8. Crea una función que imprima a hora á que sae e se pon o sol para a 
localización por defecto. Debes comprobar como axustar as coordenadas (latitude e lonxitude)
 predeterminadas do teu servidor.
*/

function atardecer(){
    date_default_timezone_set("Europe/Madrid");
    // Coordenadas de Santiago de Compostela
    ini_set("date.default_latitude", 42.5249);
    ini_set("date.default_longitude", 8.3242);
    echo date_sunset(time(), SUNFUNCS_RET_STRING, ini_get("date.default_latitude"), ini_get("date.default_longitude"), ini_get("date.sunset_zenith"));
}
?>