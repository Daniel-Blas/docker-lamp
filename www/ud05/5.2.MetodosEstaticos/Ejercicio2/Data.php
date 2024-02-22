<?php
class Data
{
    private static $dias = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado' , 'Domingo' ];
    private static $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre' ];


    private static $calendario = "Calendario gregoriano";

    function getCalendar(){
        return self::$calendario;
    }


    public static function getHora(){
        return date('H:i:s');
    }

    public static function getData(){
        $ano = date('Y'); //Nos da el año actual 
        $mes = date('n');
        $diaNum = date('d');
        $dia = date('w');
        return  self::$dias[$dia] . " " . $diaNum . ' de ' . self::$meses[$mes -1] . ' del ' . $ano;
    }

    function getDataHora(){
        return "Hoy es " . $this->getData() . " y son las " . $this->getHora();
    }
}