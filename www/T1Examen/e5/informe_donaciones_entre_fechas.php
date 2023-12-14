<?php

include "lib/base_datos.php";
include "lib/utilidades.php";
include "lib/donaciones.php";

$conexion = get_conexion();
seleccionar_bd_donacion($conexion);

$fechaInicio = 0; 
$fechaFin = 0;



$mensajes = array();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Informes entre Fechas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <h1>Informes entre Fechas</h1>

    <?= get_mensajes_html_format($mensajes); ?>
    
    <div>
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label for="fechaInicio">Fecha de Inicio</label>
        <input type="date" name="fechaInicio">
        <label for="fechaFinal">Fecha de Final</label>
        <input type="date" name="fechaFin">
        <input type="submit" name="submit" value="Submit">

    </form>
    </div>

    <table class='table table-hover table-sm text-center'>
        <thead class='thead-light'>
          <tr>
              <th scope='col'>Nombre</th>
              <th scope='col'>Apellidos</th>
              <th scope='col'>Fecha de donación</th>
              <th scope='col'>Fecha próxima donación</th>
          </tr>
          </thead>
          <tbody>

          <?php
          if (isset($_POST['submit'])) {
            if (!empty($_POST['fechaInicio'])){
                $fechaInicio = test_input($_POST['fechaInicio']);
            } else {
                $mensajes[] = array("error", "Introduce una fecha de inicio");
            }
            if (!empty($_POST['fechaFin'])){
                $fechaFin = test_input($_POST['fechaFin']);
            } else {
                $mensajes[] = array("error", "Introduce una fecha de Fin");
            }
            
            $donaciones = get_donacion_fechas($conexion);
            foreach ($donaciones as $d){
                if ($d['fechaDonacion'] > $_POST['fechaInicio'] && $d['fechaDonacion'] < $_POST['fechaFin']){
                    $fechaDonacion = date_create($d['fechaDonacion']);
                    $fechaDonacionFormateada = date_format($fechaDonacion, 'd/m/Y');
                    $proxDonacion = date_create($d['proximaDonacion']);
                    $proxDonacionFormateada = date_format($proxDonacion, 'd/m/Y');
        
                    echo "<tr>";
                    echo "<td>" . $d['nombre'] . "</td>";
                    echo "<td>" . $d['apellidos'] . "</td>";
                    echo "<td>" . $d['fechaDonacion'] . "</td>";
                    echo "<td>" . $d['proximaDonacion'] . "</td>";
                    echo "</tr>";
                }
            }
            // imprimir_donaciones($donaciones);
        
            
        }

        ?>

    <footer>
        <p><a href='index.php'>Página de inicio</a></p>
    </footer>

    <?php cerrar_conexion($conexion);?>

</body>

</html>
