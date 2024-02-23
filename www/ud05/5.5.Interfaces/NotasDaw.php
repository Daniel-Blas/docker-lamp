<?php
include_once "./Notas.php";
include_once "./CalculosCentroEstudio.php";

class NotasDaw extends Notas implements CalculosCentroEstudio{
    function numeroDeAprobados(){
        $aprobados = 0;
        foreach($this->getNotas() as $nota){
            if($nota >= 5){
                $aprobados ++;
            }
        }
        return $aprobados;
    }
    function numeroDeSuspensos(){
        $suspensos = 0;
        foreach($this->getNotas() as $nota){
            if($nota < 5){
                $suspensos ++;
            }
        }
        return $suspensos;
    }
    function notaMedia(){
        $notaMedia = 0;
        foreach($this->getNotas() as $nota){
            $notaMedia += $nota;
        }
        $notaMedia = $notaMedia / sizeof($this->getNotas());
        return $notaMedia;
    }

    function toString(){
        $listaDeNotas = "";
        foreach ($this->getNotas() as $nota) {
            $listaDeNotas .= "[$nota]";
        }
        return $listaDeNotas;
    }

}