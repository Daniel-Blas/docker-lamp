<?php

function isPar($arr){
    for ($i = 0; $i < sizeof($arr); $i++){
        if ((int) $arr[$i] && ($arr[$i] %2 == 0)){
            $arrPar[$i] = "true";
        } else {
            $arrPar[$i] = "false";

        }
    }
    return $arrPar;
}

function isImpar($arr){
    for ($i = 0; $i < sizeof($arr); $i++){
        if ((int) $arr[$i] && ($arr[$i] %2 != 0)){
            $arrPar[$i] = "true";
        } else {
            $arrPar[$i] = "false";

        }
    }
    return $arrPar;
}