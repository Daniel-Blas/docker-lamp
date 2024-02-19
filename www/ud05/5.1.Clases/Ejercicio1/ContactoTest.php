<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require "Contacto.php";
    $contacto1 = new Contacto("Daniel", "Blas", 678939876);
    $contacto2 = new Contacto("Carlos", "Andrade", 687673648);
    $contacto3 = new Contacto("Manuel", "Lopez", 645273648);
    echo "El nombre del contacto 1 es: " . $contacto1->get_nombre();
    echo '</br>';
    echo "Los apellidos del contacto 2 son: " . $contacto2->get_apellidos();
    echo '</br>';
    echo "El número del contacto 3 es: " . $contacto1->get_numero();
    echo '</br>';
    echo "Esta es la información completa de los contactos:";
    echo '</br>';
    $contacto1->muestraInformacion();
    $contacto2->muestraInformacion();
    $contacto3->muestraInformacion();


    ?>
</body>
</html>