<?php
    $a = rand( 0, 99 );
    $b = rand( 0, 99 );
    $c = rand( 0, 99 );

    if( $a <= $b && $a <= $c )
        $min = $a;
    else if( $b < $a && $b < $c )
        $min = $b;
    else
        $min = $c;

    if( $a > $b && $a > $c )
        $max = $a;
    else if( $b > $a && $b > $c )
        $max = $b;
    else
        $max = $c;

    if( $a < $max && $a > $min )
        $med = $a;
    else if( $b < $max && $b > $min )
        $med = $b;
    else
        $med = $c;
?>
<!DOCTYPE html>
<html lang="ES">
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Álvaro García Fuentes">
        <title>Ordenar números aleatorios</title>
    </head>
    <body>
        <header><h1>Ordenar números aleatorios</h1></header>
        <main>
            <?php
                echo "<p>$min $med $max</p>";
            ?>
        </main>
        <footer><a href='../index.html'>Atrás</a></footer>
    </body>
</html>