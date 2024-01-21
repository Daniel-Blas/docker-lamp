<?php 
session_start();
    require "lib/base_datos.php";
    $mensajes = "";
    $error = false;
    function comprobarUsuario($nombre, $pass){
        if (buscarUsuario($nombre)){
            $passBD = contrasenha($nombre);
            if(password_verify($pass, $passBD)){
                $usuario['nombre']=$nombre;
                $mensajes = "logueado con exito";
                return true;

             }else {
                $mensajes = "Contraseña incorrecta";
                return false;
             }

            } else {
            $mensajes = "No se ha encontrado el usuario"; 
            return false;
        }
        
       }
       
       //Comprobar si se reciben los datos
       if($_SERVER["REQUEST_METHOD"]=="POST"){
           $usuario = $_POST["usuario"];
           $pass = $_POST["pass"];
           $user = comprobarUsuario($usuario, $pass);
           if(!$user){
               $error = true;
            }else{
                $_SESSION['usuario'] = $user;
                //Redirigimos a index.php
                header('Location: index.php');
            }
        }
        ?>
        <!DOCTYPE html>
        <html lang="en">
            
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Tienda IES San Clemente</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
            </head>
            
            <body>
            <h1>Login Tienda IES San Clemente</h1>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
            crossorigin="anonymous">
            </script>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    Usuario: <input name="usuario" id="usuario" type="text">
    Contraseña:<input name="pass" id="pass" type="password">
    <input type="submit">
    <?php
    if ($error){
        echo "<p> El nombre de usuario o contraseña es incorrecto.";
    }
    ?>
</form>
<?= $mensajes;?>


<footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>
