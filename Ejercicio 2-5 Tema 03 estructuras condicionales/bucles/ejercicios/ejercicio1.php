<!DOCTYPE html>
<html lang="ES">
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Álvaro García Fuentes">
        <title>Mostrar números del 1 al 10</title>
    </head>
    <body>
        <header><h1>Mostrar números del 1 al 10</h1></header>
        <main>
            <?php
                echo "<p>";
                for( $i = 1; $i <= 10; $i++ )
                    echo "$i ";
                echo "</p>";
            ?>
        </main>
        <footer><a href='../index.html'>Atrás</a></footer>
    </body>
</html>