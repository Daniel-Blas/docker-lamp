<?php
include_once "./ExcepcionPropia.php";
class ExcepcionPropiaClase {
    static function testNumber($n){
        if ($n == 0){
            throw new ExcepcionPropia();
        }
    }
}