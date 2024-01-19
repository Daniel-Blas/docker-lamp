<?php

  require "lib/base_datos.php";
  require "lib/utilidades.php";
  require "lib/funciones.php";

?>
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
    <h1>Introducir producto</h1>

<?php

$mensajes = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    if (empty($_POST["name"]) || empty($_POST["descripcion"]) || empty($_POST["precio"]) || empty($_POST["unidades"]) || empty($_FILES["foto"])) {
        $mensajes =  "Falta algún dato obligatorio del formulario </br>";
    } else {
        $nombre = test_input($_POST["name"]);
        $descripcion = test_input($_POST["descripcion"]);
        $precio =$_POST["precio"];
        $unidades = $_POST["unidades"];
        $foto = $_FILES['foto'];
        $target_dir = "images/";
        $target_foto = $target_dir . basename($foto["name"]);
        if (compruebaExtension($foto)){
            if (compruebaTamanho($foto)){
                if (move_uploaded_file($foto['tmp_name'], $target_foto)) {
                    $mensajes =  "El fichero ". htmlspecialchars( basename( $foto["name"])). "ha sido subido.";
                    $conexion = get_conexion();
                    seleccionar_bd_tienda($conexion);
                    introducir_producto($conexion, $nombre, $descripcion, $precio, $unidades, $foto);
                    $mensajes = "Producto introducido correctamente";
                    cerrar_conexion($conexion);
                } else {
                    $mensajes =  "Hubo un error subiendo el fichero";
                }
            } else {
                $mensajes = "El archivo sobrepasa el tamaño de 50 MB </br>";
            }
        } else {
            $mensajes = "Solo se admiten archivos jpg, png, jpeg o gif</br>";
        }

    }
}
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <?= $mensajes;?>

    <p>Formulario de alta</p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
      Nombre: <input type="text" name="name">
      <br><br>
      Descripción: <input type="text" name="descripcion">
      <br><br>
      Precio: <input type="number" step="0.01" name="precio">
      <br><br>
      Unidades: <input type="number" step="0.01" name="unidades">
      <br><br>
      Foto: <input type="file" name="foto">
      
      <input type="submit" name="submit" value="Submit">
    </form>
    
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>