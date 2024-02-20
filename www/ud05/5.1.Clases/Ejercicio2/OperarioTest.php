<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OperarioTest</title>
</head>
<body>
    <?php
    require "Operario.php";
    $operario1 = new Operario("Daniel", 1345);
    $operario2 = new Operario("Carlos", 3765);
    $operario1->setTurno("nocturno");
    $operario2->setTurno("por la mañana");
    echo "Operario 1:</br>";
    echo $operario1->getNombre();
    echo "</br>";
    echo "Salario: " . $operario1->getSalario();
    echo "</br>";
    echo "Turno: " . $operario1->getTurno();
    echo "</br>";
    echo "Operario 2:</br>";
    echo $operario2->getNombre();
    echo "</br>";
    echo "Salario: " . $operario2->getSalario();
    echo "</br>";
    echo "Turno: " . $operario2->getTurno();
    echo "</br>";
    ?>
    
</body>
</html>