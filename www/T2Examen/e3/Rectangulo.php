<?php

namespace e3;
require_once "Figura.php";

class Rectangulo extends Figura
{

    private $ancho;
    private $alto;

   
    function __construct($ancho, $alto){
        $this->ancho = $ancho;
        $this->alto = $alto;
    }

    public function dibujar(){
        echo "Se dibuja la figura: <br> ancho: $this->ancho <br> alto: $this->alto. <br>";
    }
    public function agrandar($factor){
        $this->ancho *= $factor;
        $this->alto *= $factor;

    }
    public function encoger($factor){
        $this->ancho /= $factor;
        $this->alto /= $factor;
    }
}
