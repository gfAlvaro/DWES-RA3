<?php
    $N = rand( 10000, 99999 );
?>
<!DOCTYPE html>
<html lang="ES">
    <head>
        <meta name="author" content="Álvaro García Fuentes">
        <meta charset="UTF-8">
        <title>Leer cifras de número entero</title>
    </head>
    <body>
        <header><h1>Leer cifras de número entero</h1></header>
        <main>
            <?php
                echo "<p>".$N."</p>";
                for( $z = 1; $z <= 5; $z++ )
                    echo "<p>".$N % pow( 10, $z )."</p>";
            ?>
        </main>
        <footer><a href="../index.html">Atrás</a></footer>
    </body>
</html>