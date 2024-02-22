<?php
include_once "./Data.php";

$data = new Data();
echo "Usamos el calendario: " . $data->getCalendar();
echo "</br>";
echo $data->getDataHora();