<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugador</title>
</head>
<body>
    <?php
        require "./Jugador.php";
        $jugador1 = new Jugador("Rodrigo", 34, "Portero");
        $jugador2 = new Jugador("Raúl", 21, "Delantero");
        $jugador1->mostrar();
        $jugador2->mostrar();
        $jugador1->setEdad(18);
        $jugador1->setNombre("María");
        $jugador2->setPosicion("Defensa");
        $jugador1->mostrar();
        $jugador2->mostrar();
    ?>
    
</body>
</html>