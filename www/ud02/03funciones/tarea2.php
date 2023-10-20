<?php 
/**
 * Crea unha función chamada `comprobar_nif()` que reciba un NIF e devolva:
 *  `true` se o NIF é correcto.
 *  false` se o NIF non é correcto.
 * A letra do DNI é unha letra para comprobar que o número introducido anteriormente é correcto. 
 * Para obter a letra do DNI débense levar a cabo os seguintes pasos:
 * Dividimos o número entre 23.
 * Co resto da división anterior, obtemos a letra corresponde na seguinte táboa: 
 */


function comprobar_nif($dni){
    if (gettype($dni) == "string" && strlen($dni) == 9 ){
        $correspondencia = array("T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E");
        $letra = strtoupper(substr($dni, 8, 1));
        $numero = (int)substr($dni, 0, 8);
        if ($correspondencia[($numero % 23)] == $letra){
            echo "El DNI es correcto";
        } else {
            echo "El DNI no es correcto";
        }
    } else {
        echo "El DNI no es correcto";
    }
}


?>