<?php
$mes  = rand( 1, 12 );
$anyo = rand( 1900, 2021 );
?>
<!DOCTYPE html>
<html lang="ES">
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Álvaro García Fuentes">
        <title>Días del mes</title>
    </head>
    <body>
        <header><h1>Días del mes</h1></header>
        <main>
            <?php
                echo "<p>mes: ".$mes." Año: ".$anyo."</p><p>";
                switch($mes){
                    case 1: case 3: case 5: case 8: case 10: case 12:
                        echo "31 dias";
                        break;
                    case 4: case 6: case 9: case 11:
                        echo "30 días";
                        break;
                    case 2:
                        if( $anyo%4 == 0 && !( $anyo%100 == 0 ) )
                            echo "29 días";
                        else
                            echo "28 días";
                            break;
                    default:
                        echo "Mes érroneo";
                }
                echo "</p>";
            ?>
       </main>
        <footer><a href='../index.html'>Atrás</a></footer>
    </body>
</html>