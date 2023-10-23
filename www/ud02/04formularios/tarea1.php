<html>
    <head>
        <meta charset="utf-8">
        <title>HTML</title> 
    </head>
    <body>
        <div>
            <!-- Aquí va el formulario-->
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre">
            <br/>
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos">
            <br/>
            <input type="submit">
            </form>
        </div>

            <div>
                <?php 
                    /**  Cree un formulario que solicite su nombre y apellido. Cuando se reciben los datos, se debe mostrar la siguiente información:
                     * Nombre: `xxxxxxxxx`
                     *  Apellidos: `xxxxxxxxx`
                     * Nombre y apellidos: `xxxxxxxxxxxx xxxxxxxxxxxx`
                     * Su nombre tiene caracteres `X`.
                     * Los 3 primeros caracteres de tu nombre son: `xxx`
                     * La letra A fue encontrada en sus apellidos en la posición: `X`
                     * Tu nombre en mayúsculas es: `XXXXXXXXX`
                     * Sus apellidos en minúsculas son: `xxxxxx`
                     * Su nombre y apellido en mayúsculas: `XXXXXX XXXXXXXXXX`
                     * Tu nombre escrito al revés es: `xxxxxx`
                    */
                    
                    //Aquí el código php que muestra la información solicitada.
                    echo "<br/>
                        Nombre: '", $_POST['nombre'], "'";
                    echo "<br/>
                        Apellidos: '", $_POST['apellidos'], "'";
                    echo "<br/>
                        Nombre y apellidos: '", $_POST['nombre'], " ", $_POST['apellidos'], "'";
                    echo "<br/>
                        Su nombre tiene caracteres '", strlen($_POST['nombre']), "'";
                    echo "<br/>
                        Los 3 primeros caracteres de tu nombre son: '",substr($_POST['nombre'], 0, 3), "'";
                    echo "<br/>
                        La letra A fue encontrada en sus apellidos en la posición: '", (strpos(strtoupper($_POST['apellidos']), 'A') + 1), "'";
                    echo "<br/>
                        Tu nombre en mayúsculas es: '", strtoupper($_POST['nombre']), "'";
                    echo "<br/>
                        Sus apellidos en minúsculas son: '", strtolower($_POST['apellidos']), "'";
                    echo "<br/>
                        Su nombre y apellidos en mayúsculas: '", strtoupper($_POST['nombre']), " ", strtoupper($_POST['apellidos']), "'";
                    echo "<br/>
                        Tu nombre escrito al revés es: '", strrev($_POST['nombre']), "'";


                    
                ?>
        </div>
    </body>
</html>
