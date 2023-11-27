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
    <h1>Eliminar donante</h1>
  

    <?php

use function PHPSTORM_META\type;

        include("lib/base_datos.php");
        $conexion = get_conexion();
        seleccionar_bd_donacion($conexion);

        if ($_SERVER["REQUEST_METHOD"] == 'GET'){
            $id = $_GET['id'];
            $stmt = $conexion->prepare("SELECT * FROM donantes WHERE id = $id");
            $stmt->execute();
            $donante = $stmt->fetch(PDO::FETCH_ASSOC);
            echo "Va a eliminar el donante ".$donante['nombre']." ".$donante['apellidos']." ¿Está seguro?";
            $postLink = htmlspecialchars($_SERVER["PHP_SELF"]);
            echo "<form action=\"$postLink\" method=\"post\">";
            echo "<input type='hidden' name='id' value='$id'>";
            echo "<input type='submit' value='Eliminar'></form>";

        }

        if ($_SERVER["REQUEST_METHOD"] == 'POST'){
            $id = $_POST['id'];
            $sql = "DELETE from donantes WHERE id = $id";
            $conexion->exec($sql);
            $sql = "DELETE from historico WHERE id = $id";
            $conexion->exec($sql);
        }
    ?>

    <footer>
        <p><a href='index.php'>Página de inicio</a></p>
    </footer>

</body>

</html>
