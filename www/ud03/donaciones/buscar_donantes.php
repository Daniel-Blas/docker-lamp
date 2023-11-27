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
    <h1>Buscar donantes</h1>
    <div>
        Formulario para buscar donantes
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET">
        <label for="codigo_postal">Código Postal:</label>
        <input type="text" name="codigo_postal" required>
        
        <label for="grupo_sanguineo">Tipo de Sangre (opcional):</label>
        <select name="grupo_sanguineo">
            <option value="">-- Todos --</option>
            <option value="0-">0-</option>
            <option value="0+">0+</option>
            <option value="A-">A-</option>
            <option value="A+">A+</option>
            <option value="B-">B-</option>
            <option value="B+">B+</option>
            <option value="AB-">AB-</option>
            <option value="AB+">AB+</option>
        </select>

        <button type="submit">Buscar</button>
    </form>
<?php

    include("lib/base_datos.php");
    $conexion = get_conexion();
    seleccionar_bd_donacion($conexion);

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $codigo_postal = $_GET['codigo_postal'];
        $tipo_sangre = isset($_GET['tipo_sangre']) ? $_GET['tipo_sangre'] : null;

        $sql = "SELECT * FROM donantes WHERE codigo_postal = :codigo_postal";

        if (!empty($tipo_sangre)) {
            $sql = $sql +" AND grupo_sanguineo = :tipo_sangre";
        }

        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':codigo_postal', $codigo_postal);

        if (!empty($tipo_sangre)) {
            $stmt->bindParam(':tipo_sangre', $tipo_sangre);
        }

        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);


        if (count($resultados) > 0) {
            echo "<ul>";
            foreach ($resultados as $donante) {
                echo "<li>{$donante['nombre']} {$donante['apellidos']} - Edad: {$donante['edad']}, Grupo Sanguíneo: {$donante['grupo_sanguineo']}</li>";
            }
            echo "</ul>";
        } else {
            echo "No se encontraron donantes con los criterios de búsqueda.";
        }
    }
?>

    <footer>
        <p><a href='index.php'>Página de inicio</a></p>
    </footer>

</body>

</html>