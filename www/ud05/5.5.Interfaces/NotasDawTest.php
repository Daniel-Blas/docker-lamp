<?php
include_once "./NotasDaw.php";

$clase = new NotasDaw();
$arrNotas = [3, 6, 7, 2, 4, 6, 7, 9, 2, 5, 3, 4, 0];
$clase->setNotas($arrNotas);

echo "Número de aprobados:" . $clase->numeroDeAprobados();
echo "</br>";
echo "Número de suspensos: " . $clase->numeroDeSuspensos();
echo "</br>";
echo "Nota media: " . $clase->notaMedia();
echo "</br>";
echo "Notas: " . $clase->toString();


?>