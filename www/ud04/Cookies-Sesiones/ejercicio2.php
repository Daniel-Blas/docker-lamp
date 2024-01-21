<?php
    session_start();
    $_SESSION['idioma'] = "galego";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION['idioma'] = $_POST['idioma'];
    }
    $benvida = "Benvido a miña páxina!";;
    if ($_SESSION['idioma'] == "galego") {
        $benvida = "Benvido a miña páxina!";
    }
    else if ($_SESSION['idioma'] == "castellano"){
        $benvida = "Bienvenido a mi página!";
    }else if ($_SESSION['idioma'] == "english"){
        $benvida = "Welcome to my page!";
    }
    
    echo "<h3>$benvida</h3>";

    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <select name="idioma" id="idioma">
            <option value="galego">Galego</option>
            <option value="castellano">Castellano</option>
            <option value="english">English</option>
        </select>
        <input type="submit" value="Aceptar">
    </form>

</body>
</html>