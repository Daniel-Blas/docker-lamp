<?php
require_once "./NotasTrait.php";

$clase = new NotasTrait();
$clase->setNotas([1, 2, 3, 6, 3, 8, 3, 8, 3, 9, 5, 5, 2, 7, 8, 4, 1, 8, 6, 6, 4]);

$clase->Saludo();
$clase->showCalculusStudyCenter($clase->numeroDeAprobados(), $clase->numeroDeSuspensos(), $clase->notaMedia());

?>