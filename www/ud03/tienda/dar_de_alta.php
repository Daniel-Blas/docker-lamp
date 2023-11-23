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
    <h1>Alta de usuario </h1>
    <?php
        //Comprobar se veñen datos polo $_POST
        $nombre = $apellidos = $edad = $provincia = "";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include("lib/base_datos.php");
            $conexion = get_conexion();
            seleccionar_bd_tienda($conexion);

            $nombre = test_input($_POST["nombre"]);
            $apellidos = test_input($_POST["apellidos"]);
            $edad = test_input($_POST["edad"]);
            $provincia = test_input($_POST["provincia"]);

            $sql = "INSERT INTO usuarios (nombre, apellidos, edad, provincia) VALUES ('$nombre', '$apellidos', '$edad', '$provincia')";
            if($conexion->query($sql)){
                echo "Se ha creado un nuevo registro";
            }else{
                echo "No se pudo crear el registro".$conexion->error;
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        //Conexión
        //Seleccionar bd
        //Executar o INSERT
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <p>Formulario de alta</p>
    <!-- o "action" chama a dar_de_alta.php de xeito reflexivo-->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <p>Nombre: <input type="text" name="nombre" id="nombre" required maxlength="50"></p>
        <p>Apellidos: <input type="text" name="apellidos" id="apellidos" required maxlength="100"></p>
        <p>Edad: <input type="number" name="edad" id="edad" required></p>
        <p>Provincia: <input type="text" name="provincia" id="provincia" required maxlength="50"></p>
        <input type="submit" value="Enviar">
    </form>
    
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>