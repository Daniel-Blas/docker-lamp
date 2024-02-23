<?php
trait CalculosCentroEstudio {
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

}
