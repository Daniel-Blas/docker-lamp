<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda IES San Clemente </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <h1>Editar usuario </h1>
    <?php
        include("lib/base_datos.php");
        include("lib/utilidades.php");

        //Obter id de $_GET
        if ($_SERVER["REQUEST_METHOD"] == "GET"){
            $id = $_GET['id'];
       
            
            //Conexión
            $conexion = get_conexion();
            //Seleccionar bd
            seleccionar_bd_tienda($conexion);
            //Consultar datos de ese id
            $sql = "SELECT nombre, apellidos, edad, provincia FROM usuarios WHERE id = $id";
            if ($datos = $conexion->query($sql)){
                $dato = $datos->fetch_assoc();
                echo '<p>Estos es el usuario que desea editar:</br>';
                echo "Nombre: $dato[nombre]</br>";
                echo "Apellidos: $dato[apellidos]</br>";
                echo "Edad: $dato[edad]</br>";
                echo "Provincia: $dato[provincia]</p>";
            } else {
                echo "Se ha producido un error";
            }
        }
        //Obter os datos de $_POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id'];
            $nombre = test_input($_POST["nombre"]);
            $apellidos = test_input($_POST["apellidos"]);
            $edad = test_input($_POST["edad"]);
            $provincia = test_input($_POST["provincia"]);

            $conexion = get_conexion();
            //Seleccionar bd
            seleccionar_bd_tienda($conexion);

            //Executar UPDATE
            $sql = "UPDATE usuarios SET nombre = '$nombre', apellidos =  '$apellidos', edad =  '$edad', provincia = '$provincia' WHERE id = $id";
            if($conexion->query($sql)){
                echo "<p>Se ha actualizado con éxito.</p>";
            }else{
                echo "<p>No se ha podido actualizar ".$conexion->error."</p>";
            }

            
            $sql = "SELECT nombre, apellidos, edad, provincia FROM usuarios WHERE id = $id";
            if ($datos = $conexion->query($sql)){
                $dato = $datos->fetch_assoc();
                echo '<p>Este es el usuario que desea editar:</br>';
                echo "Nombre: $dato[nombre]</br>";
                echo "Apellidos: $dato[apellidos]</br>";
                echo "Edad: $dato[edad]</br>";
                echo "Provincia: $dato[provincia]</p>";
            } else {
                echo "Se ha producido un error";
            }
        }

    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <p>Introduce los datos que desea editar:</p>
    <!-- o "action" chama a editar.php de xeito reflexivo-->

    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required maxlength="50" value=<?php echo "$dato[nombre]";?>></br>
        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" id="apellidos" required maxlength="100" value='<?php echo "$dato[apellidos]";?>'></br>
        <label for="edad">Edad:</label>
        <input type="number" name="edad" id="edad" required value=<?php echo "$dato[edad]";?>></br>
        <label for="provincia">Provincia:</label>
        <input type="text" name="provincia" id="provincia" required maxlength="50" value='<?php echo "$dato[provincia]";?>'></br>
        <input type="hidden" name="id" id="id" required value='<?php echo "$id";?>' ></br>
        
        <input type="submit" value="Enviar">
    </form>
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
            <a href='listar.php'>Volver a lista</a>
        </p>
    </footer>
</body>

</html>