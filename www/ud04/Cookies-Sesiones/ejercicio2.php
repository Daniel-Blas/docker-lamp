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
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $_SESSION['idioma'] = $_GET['idioma'];
    }
    $benvida;
    switch ($_SESSION['idioma']){
        
        case "galego" :
            $benvida = "Benvido a miña páxina!";
        case "castellano" :
            $benvida = "Bienvenido a mi página!";
        case "english" :
            $benvida = "Welcome to my page!";
        default :
            $benvida = "Benvido a miña páxina!";
        }
    echo "<h3>$benvida</h3>";

    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
        <select name="idioma" id="idioma">
            <option value="galego">Galego</option>
            <option value="castellano">Castellano</option>
            <option value="english">English</option>
        </select>
        <input type="submit" value="Aceptar">
    </form>

</body>
</html>