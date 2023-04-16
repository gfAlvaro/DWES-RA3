<!DOCTYPE html>
<html lang="ES">
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Álvaro García Fuentes">
        <title>Tablas de multiplicar</title>
    </head>
    <body>
        <header><h1>Tablas de multiplicar</h1></header>
        <main>
            <?php
                echo "<div id='tablas'>";
                for( $i = 1; $i < 11; $i++ ){
                    echo "<div class='tabla'>";
                    echo "<p>Tabla del $i</p>";
                    for( $j = 1; $j < 11; $j++ )
                        echo "<div class='fila'>".$i." * ".$j." = ".$i*$j."</div>";
                    echo "</div>";
                }
                echo "</div>";
            ?>
        </main>
        <footer><a href='../index.html'>Atrás</a></footer>
    </body>
</html>