<?php
    $r = 1;
    $g = 1;
    $b = 1;

    $from = intval( '10001', 16 );
    $to = intval( '1000f', 16 );
?>
<!DOCTYPE html>
<html lang="ES">
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Álvaro García Fuentes">
        <title>Paleta de colores</title>
        <link rel="stylesheet" href="../../css/paleta.css">
            
        </link>
    </head>
    <body>
        <header><h1>Paleta de colores</h1></header>
        <main>
            <?php
                echo "<div class='paleta'>";
                for( $i = $from; $i <= $to; $i++ ){
                    echo "<div class='casilla' style='background-color:".dechex($i*16).";'>";
                    echo "#".dechex($r*$i*16 + $g*$i*16 + $b*$i)."</div>";
                    }
                echo "</div>";
            ?>
       </main>
        <footer><a href='../index.html'>Atrás</a></footer>
    </body>
</html>