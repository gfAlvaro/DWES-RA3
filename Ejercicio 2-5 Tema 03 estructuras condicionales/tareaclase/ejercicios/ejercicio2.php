<?php
    $valor = rand( 1000, 9999 );
    $numeros = array();
    $colores = ['red', 'green', 'blue', 'yellow'];
?>
<!DOCTYPE html>
<html lang="ES">
    <head>
        <meta name="author" content="Álvaro García Fuentes" />
        <meta charset="UTF-8" />
        <title>Tarea de clase Tema 3</title>
    </head>
    <body>
        <header><h1>Tarea de clase Tema 3</h1></header>
        <main>
            <?php
                echo $valor." ";

                foreach( $colores as $color ){
                    $numeros[$color] = $valor % 10;
                    $valor = intval( $valor / 10 );
                }

                foreach( $numeros as $color => $numero )
                    echo "<p style='color:$color'>".$numero."</p>";
            ?>
        </main>
        <footer><a href="../index.html">Atrás</a></footer>
    </body>
</html>