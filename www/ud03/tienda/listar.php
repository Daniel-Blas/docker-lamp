<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda IES San Clemente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <h1>Lista de usuarios</h1>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <p>Lista de usuarios con enlaces para borrar y editar</p>
    <?php
        include('lib/base_datos.php');
        //Obter conexión
        $conexion = get_conexion();
        //Seleccionar bd
        seleccionar_bd_tienda($conexion);
        //Consulta obtención dos usuarios (array)
        $sql = "SELECT * FROM usuarios";
        $resultados = $conexion->query($sql);
        if ($resultados->num_rows > 0){
            //Crear lista de usuarios
            echo "<table>
            <tr> <th>id</th> <th>Nombre</th> <th>Apellidos</th> <th>edad</th> <th>Provincia</th> <th>Editar</th> <th>Borrar</th> </tr>";
            while ($row = $resultados->fetch_assoc()){
                //  - cada usuario mostra dous enlaces (editar e borrar)
                //  - editar.php?id=4
                //  - borrar.php?id=7
                echo "<tr>
                <td>$row[id] </td> <td>$row[nombre] </td> <td>$row[apellidos] </td> <td>$row[edad] </td> <td>$row[provincia] </td>
                <td><a href='editar.php?id=$row[id]'>Editar</a></td> 
                <td><a href='borrar.php?id=$row[id]'>Borrar</a></td>
                </tr>";
            }
            echo "</table>";
        } else {
            echo "Non hay resultados.";
        }
        ?>
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>