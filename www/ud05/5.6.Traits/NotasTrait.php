<?php
require_once "./CalculosCentroEstudio.php";
require_once "./MostrarCalculos.php";

class NotasTrait{
    private $notas = array();

    function getNotas(){
        return $this->notas;
    }
    function setNotas($notas){
        $this->notas = $notas;
    }

    Use CalculosCentroEstudio;
    Use MostrarCalculos;
}