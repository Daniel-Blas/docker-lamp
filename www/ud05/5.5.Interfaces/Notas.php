<?php

abstract class Notas {
    private $notas = array();

    function getNotas(){
        return $this->notas;
    }
    function setNotas($notas){
        $this->notas = $notas;
    }

    abstract function toString();

}

