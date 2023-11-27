<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donación Sangre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <br>
    <h1>Gestión donacion de Sangre</h1>
    <div>
        Listado de donaciones
    </div>
    <?php

        include('lib/base_datos.php');
        $conexion = get_conexion();
        seleccionar_bd_donacion($conexion);
        $id = $_GET['id'];
        $stmt = $conexion->prepare("SELECT * FROM historico WHERE donante = '$id'");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $donaciones = $stmt->fetchAll();
        echo "<table><tr> <th>Nombre</th> <th>Fecha</th> <th>Fecha siguiente donación</th></tr>";
        foreach ($donaciones as $donacion){
            echo " <tr> ";
            echo "<td>". $donacion['donante']. "</td> "; 
            echo "<td>". $donacion['fecha_donacion']. "</td> "; 
            echo "<td>". $donacion['fecha_proxima_donacion']. "</td> ";
            echo "</tr> ";
        }
        echo "</table>"
        ?>

    <footer>
        <p><a href='index.php'>Página de inicio</a><a href='listar_donantes.php'>Volver a lista</a></p>
    </footer>

</body>

</html>