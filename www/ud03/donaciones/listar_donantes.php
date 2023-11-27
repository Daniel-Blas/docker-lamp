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
        Listado de donantes
        <?php

        include('lib/base_datos.php');
        $conexion = get_conexion();
        seleccionar_bd_donacion($conexion);
        $stmt = $conexion->prepare("SELECT * FROM donantes");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $donantes = $stmt->fetchAll();
        echo "<table><tr> <th>id</th> <th>Nombre</th> <th>Apellidos</th> <th>edad</th> <th>Grupo Sanguineo</th> <th>Codigo postal</th> <th>Telefono</th> <th>Registrar donacion</th> <th>Eliminar</th> <th>Listar donaciones</th> </tr>";
        foreach ($donantes as $donante){
            echo " <tr> ";
            echo "<td>". $donante['id']. "</td> "; 
            echo "<td>". $donante['nombre']. "</td> "; 
            echo "<td>". $donante['apellidos']. "</td> ";
            echo "<td>". $donante['edad']. "</td> ";
            echo "<td>". $donante['grupo_sanguineo']. "</td> ";
            echo "<td>". $donante['codigo_postal']. "</td> ";
            echo "<td>". $donante['telefono']. "</td> ";
            echo "<td><a href='donar.php?id=".$donante['id']."'>Registrar</a></td> ";
            echo "<td><a href='borrar_donante.php?id=".$donante['id']."'>Eliminar</a></td> ";
            echo "<td><a href='listar_donaciones.php?id=".$donante['id']."'>Listar</a></td> ";
            echo "</tr> ";
        }
        echo "</table>"
        ?>
    </div>

    <footer>
        <p><a href='index.php'>Página de inicio</a></p>
    </footer>

</body>

</html>