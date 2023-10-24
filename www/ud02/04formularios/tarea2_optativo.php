<html>
    <head>
        <meta charset="utf-8">
        <title>HTML</title> 
    </head>
    <body>
        <div>
            <!-- Aquí va el formulario-->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <p>Elija una bebida:</p>
            <select name="bebidas">
                <option value="cocacola">Coca Cola</option>
                <option value="pepsicola">Pepsi Cola</option>
                <option value="fanta">Fanta Naranja</option>
                <option value="trina">Trina Manzana</option>
            </select>
            <p>Elija la cantidad:</p>
            <input type="number" name="cantidad" min="0" value="0">
            <input type="submit" value="Solicitar">
        </form>
<?php 
/*
Crea un formulario para solicitar una de las siguientes bebidas:

    Bebida|PVP
    :-|:-:
    Coca Cola|1 €
    Pepsi Cola|0,80 €
    Fanta Naranja|0,90 €
    Trina Manzana|1,10 €
    
    A mayores, necesitamos un campo adicional con la cantidad de bebidas a comprar y un botón de <kbd>Solicitar</kbd>.
    
    La aplicación mostrará algo como:

    Pediste 3 botellas de Coca Cola. Precio total a pagar: 3 Euros.
    Puedes utilizar sentencias `switch` o `if`.
    */

    //Aquí va el código PHP que muestra la información solicitada.


    switch ($_POST["bebidas"]){
        case "cocacola" : {
            $bebida = "Coca Cola";
            $precio = 1;
            break;
        }
        case "pepsicola" : {
            $bebida = "Pepsi Cola";
            $precio = 0.80;
            break;
        }
        case "fanta" : {
            $bebida = "Fanta Naranja";
            $precio = 0.90;
            break;
        }
        case "trina" : {
            $bebida = "Trina Manzana";
            $precio = 1.10;
            break;
        }
        default: {
            $bebida = "nada";
            $precio = 0;
        }
    }

    $cantidad = $_POST["cantidad"];
    echo $_POST["bebidas"];

    echo "<p>Pediste ", $cantidad, " botellas de ", $bebida, ". Precio total a pagar: ", ($cantidad * $precio), " Euros.";
?>
</body>
</html>