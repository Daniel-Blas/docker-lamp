<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arbitro</title>
</head>
<body>
    <?php
        require "./Arbitro.php";
        $arbitro1 = new Arbitro("Lucas", 34, 9);
        $arbitro2 = new Arbitro("Miguel", 21, 2);
        $arbitro1->mostrar();
        $arbitro2->mostrar();
        $arbitro1->setEdad(45);
        $arbitro1->setAnhos(22);
        $arbitro2->setNombre("Alberto");
        $arbitro1->mostrar();
        $arbitro2->mostrar();
    ?>
    
</body>
</html>