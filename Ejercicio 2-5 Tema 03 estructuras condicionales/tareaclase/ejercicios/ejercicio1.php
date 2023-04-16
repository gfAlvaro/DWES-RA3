<?php
    $arrayNumeros = array();
    $mayor = 0;
    $menor = 101;
    $media = 0;
?>
<!DOCTYPE html>
<html lang="ES">
    <head>
        <meta name="author" content="Álvaro García Fuentes" />
        <meta charset="UTF-8" />
        <title>Números aleatorios</title>
    </head>
    <body>
        <header><h1>Números aleatorios</h1></header>
        <main>
            <?php
                for( $x = 0; $x < 20; $x++ )
                    $arrayNumeros[] = rand( 0, 100 );
                echo "<p>";
                foreach( $arrayNumeros as $num ){
                    echo $num." ";
                    if( $mayor < $num )
                        $mayor = $num;
                    if( $menor > $num )
                        $menor = $num;
                    $media = $media + $num;
                }
                echo "</p>";

                $media = $media / 20;

                echo "<p>Mayor: ".$mayor."</p>";
                echo "<p>Menor: ".$menor."</p>";
                echo "<p>Media: ".$media."</p>";
            ?>
        </main>
        <footer><a href="../index.html">Atrás</a></footer>
    </body>
</html>