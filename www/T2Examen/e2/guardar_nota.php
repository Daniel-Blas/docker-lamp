<?php
// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el nombre y el contenido de la nota desde el formulario
    $nombre = $_POST['nombre'] ?? '';
    $contenido = $_POST['contenido'] ?? '';

    //Guardar la nota en un archivo
    $directorio_notas = "notas/";

    $nota = fopen($directorio_notas . $nombre, "w");
    fwrite($nota, $contenido);
    // $prueba = fopen("nota1", "w");
    // fwrite($prueba, "contenido");


    echo "La nota se ha guardado correctamente en el archivo: $directorio_notas$nombre.txt";
} else {
    // Si no se han enviado los datos del formulario, redirigir al formulario
    header('Location: formulario.html');
    exit();
}
