<?php
include_once "./Usuario.php";
include_once "./Administrador.php";


$administrador1 = new Administrador("Paco", "Jimenez Perez");
$administrador2 = new Administrador("Lucía", "del Río");

$usuario1 = new Usuario("María", "Vázquez");
$usuario2 = new Usuario("Manuela", "Iglesias");

$administrador1->accion();
$administrador2->accion();
$usuario1->accion();
$usuario2->accion();