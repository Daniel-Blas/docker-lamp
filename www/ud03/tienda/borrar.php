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
    <h1>Borrar usuario </h1>

    <?php
    //Obter conexión
    include("lib/base_datos.php");
    include("lib/utilidades.php");

    //Conexión
    $conexion = get_conexion();
    //Seleccionar bd
    seleccionar_bd_tienda($conexion);
    //Ler o id de $_GET
    if ($_SERVER["REQUEST_METHOD"] == 'GET'){
        $id = $_GET['id'];
        echo "<p>¿Está seguro que quiere borrar este usuario?</p>";
        $sql = "SELECT nombre, apellidos, edad, provincia FROM usuarios WHERE id = $id";
        if ($resultado = $conexion->query($sql)){
            $datos = $resultado->fetch_assoc();
            echo "<p>Nombre: ".$datos['nombre']."</br>";
            echo "Apellidos: ".$datos['apellidos']."</br>";
            echo "Edad: ".$datos['edad']."</br>";
            echo "Provincia: ".$datos['provincia']."</p>";
            $postLink = htmlspecialchars($_SERVER["PHP_SELF"]);
            echo "<form action=\"$postLink\" method=\"post\">";
            echo "<input type='hidden' name='id' value='$id'>";
            echo "<input type='Submit' value='Borrar'>";
            echo "</form>";
            
            } else {
                echo "Se ha producido un error";
            }
        }

    //Executar consulta de borrado (delete)
    if ($_SERVER["REQUEST_METHOD"] == 'POST'){
        $id = $_POST['id'];
        $sql = "DELETE from usuarios WHERE id = $id";
        if ($conexion->query($sql)){
            echo "El usuario se ha eliminado con exito";
        } else {
            echo "no se pudo eliminar al usuario";
        }
    }

    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>


    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
            <a href='listar.php'>Volver a lista</a>
        </p>
    </footer>
</body>

</html>