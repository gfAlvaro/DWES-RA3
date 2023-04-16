<!DOCTYPE html>
<html lang="ES">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Álvaro García Fuentes">
        <title>Suma los tres primeros números pares</title>
    </head>
    <body>
        <header><h1>Suma los tres primeros números pares</h1></header>
        <main>
            <?php
                $suma = 0;
                echo "<p>";
                for( $i = 2; $i < 7; $i = $i + 2 ){
                        echo "$i ";
                        if( $i < 6 )
                            echo "+ ";
                        $suma += $i;
                    }
                echo "= $suma</p>";
            ?>
        </main>
    </body>
    <footer><a href=".../index.html">Atrás</a></footer>
</html>