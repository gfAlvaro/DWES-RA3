<?php
    function sumatorio( $cantidad ){

        $sumatorio = 0;
        $mensaje = "";

        for( $i = 1; $i <= $cantidad; $i++ ){
            $sumatorio += $i;
            $mensaje .= $i;
            if( $i < $cantidad )
                $mensaje .= " + ";
        }

        $mensaje .= " = ".$sumatorio;

        return $mensaje;
    }
?>
<!DOCTYPE html>
<html lang="ES">
    <head>
        <meta name="author" content="Álvaro García Fuentes">
        <meta charset="utf-8">
        <title>Formularios ejercicio 4</title>
        <style>
            #error {
                color: red;
            }
        </style>
    </head>
    <body>
        <header><h1>Formularios ejercicio 4</h1></header>
        <main>
            <form name="sumatorio" action="form4.php" method="POST">
                <label>Introduzca cantidad de números para sumar: <input type="number" name="cantidad"></label>
                <button type="submit">Enviar</button>
            </form>
            <?php
                if( $_POST ){
                    if( $_POST['cantidad'] > 0 )
                        echo "<p>".sumatorio($_POST['cantidad'])."</p>";
                    else
                        echo "<p id='error'>La cantidad debe ser mayor que cero.</p>";
                }
            ?>
        </main>
        <footer><a href="../index.html">Atrás</a></footer>
    </body>
</html>