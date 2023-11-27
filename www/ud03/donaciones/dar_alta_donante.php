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
    <?php
        //Comprobar se veñen datos polo $_POST
        $id = $nombre = $apellidos = $edad = $grupo = $codigo = $telefono = "";
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include("lib/base_datos.php");
            include("lib/utilidades.php");
            //Conexión
            $conexion = get_conexion();
            //Seleccionar bd
            seleccionar_bd_donacion($conexion);

            $id = test_input($_POST["id"]);
            $nombre = test_input($_POST["nombre"]);
            $apellidos = test_input($_POST["apellidos"]);
            $edad = test_input($_POST["edad"]);
            $grupo = test_input($_POST["grupo"]);
            $codigo = test_input($_POST["codigo"]);
            $telefono = test_input($_POST["telefono"]);
            
            if ($edad >= 18 && strlen($codigo) == 5 && strlen($telefono) == 9){
                $stmt = $conexion->prepare("INSERT INTO donantes (id, nombre, apellidos, edad, grupo_sanguineo, codigo_postal, telefono) VALUES (:id, :nombre, :apellidos, :edad, :grupo, :codigo, :telefono)");
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':apellidos', $apellidos);
                $stmt->bindParam(':edad', $edad);
                $stmt->bindParam(':grupo', $grupo);
                $stmt->bindParam(':codigo', $codigo);
                $stmt->bindParam(':telefono', $telefono);
                $stmt->execute();
                echo "Donante añadido con éxito.";
            } else {
                echo "Se ha producido un error. Vuelva a intentarlo";
            }

            //Executar o INSERT
            // $sql = "INSERT INTO usuarios (nombre, apellidos, edad, provincia) VALUES ('$nombre', '$apellidos', '$edad', '$provincia')";
        
        }
 



    ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <br>
    <h1>Alta de donante</h1>
    <div>
        Formulario para dar de alta un donante
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <p>ID: <input type="text" name="id" id="id" required maxlength="50"></p>
        <p>Nombre: <input type="text" name="nombre" id="nombre" required maxlength="50"></p>
        <p>Apellidos: <input type="text" name="apellidos" id="apellidos" required maxlength="100"></p>
        <p>Edad: <input type="number" name="edad" id="edad" required></p>
        <p>Grupo sanguineo: <select name="grupo" id="grupo" required>
            <option value="0-">0-</option>
            <option value="0+">0+</option>
            <option value="A-">A-</option>
            <option value="A+">A+</option>
            <option value="B-">B-</option>
            <option value="B+">B+</option>
            <option value="AB-">AB-</option>
            <option value="AB+">AB+</option>
        </select></p>
        <p>Código Postal: <input type="number" name="codigo" id="codigo" ></p>
        <p>Teléfono: <input type="number" name="telefono" id="telefono" ></p>
        
        <input type="submit" value="Dar de alta">
    </form>
    </div>

    <footer>
        <p><a href='index.php'>Página de inicio</a></p>
    </footer>

</body>

</html>