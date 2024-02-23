<?php

trait MostrarCalculos{
    function Saludo(){
        echo "Bienvenido al centro de cálculo. </br>";
    }
    function showCalculusStudyCenter($aprobados, $suspensos, $media){
        echo "Número de aprobados:" . $aprobados;
        echo "</br>";
        echo "Número de suspensos: " . $suspensos;
        echo "</br>";
        echo "Nota media: " . $media;
        echo "</br>";
    }
}