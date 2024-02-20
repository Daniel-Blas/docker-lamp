<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmpleadoTests</title>
</head>
<body>
    <?php
    require "Empleado.php";
    $empleado1 = new Empleado("Manuel", 99);
    $empleado2 = new Empleado("Alberto", 34765);
    echo "Empleado 1:</br>";
    echo $empleado1->getNombre();
    echo "</br>";
    echo "Salario: " . $empleado1->getSalario();
    echo "</br>";
    echo "Empleado 2:</br>";
    echo $empleado2->getNombre();
    echo "</br>";
    echo "Salario: " . $empleado2->getSalario();
    echo "</br>";
    ?>
    
</body>
</html>