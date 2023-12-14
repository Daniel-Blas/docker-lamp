<?php

$coches = array (
    array("Volvo", 22, 18),
    array("BMW", 15, 13),
    array("Saab", 5, 2),
    array("Land Rover", 17, 15),
);

function imprimirTabla($arr){
    echo "<table><tr><th>Nombre</th><th>Stock</th><th>Ventas</th></tr>";
    foreach ($arr as $coche){
        if (strlen($coche[0]) > 4 && $coche[2] > 10){
            echo "<tr>";
            foreach($coche as $dato){
                echo "<td>$dato</td>";
            }            
            echo "<tr>";
        }
    }
    echo "</table>";
}