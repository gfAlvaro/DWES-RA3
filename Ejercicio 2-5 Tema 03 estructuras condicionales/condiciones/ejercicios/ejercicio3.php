<?php
    $nAnyo = rand( 1900, 2021 );
    $nMes  = rand( 1, 12 );

    do{
        $nDia = rand( 1, 31 );
    }while( ( ($nMes==4 || $nMes==6 || $nMes==9 || $nMes==11 ) && $nDia>30 )
         || ( ($nMes==2) && (($nDia>29 && $nAnyo%4==0 && !$nAnyo%100==0 ) || $nDia>28) ) );

    $dia = getdate()["mday"];
    $mes = getdate()["mon"];
    $anyo = getdate()["year"];
    $fechaActual = "$anyo-$mes-$dia";
    $fechaNacimiento = "$nAnyo-$nMes-$nDia";
    $edad = floor(  abs( strtotime( $fechaActual ) - strtotime( $fechaNacimiento ) )
                    / ( 365 * 60 * 60 * 24 )  );
?>
<!DOCTYPE html>
<html lang="ES">
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Álvaro García Fuentes">
        <title>Calcular edad</title>
    </head>
    <body>
        <header><h1>Calcular edad</h1></header>
        <main>
            <?php
                echo "<p>Fecha de nacimiento: ".$nDia."/".$nMes."/".$nAnyo."</p>";
                echo "<p>Edad: ".$edad."</p>";
            ?>
        </main>
        <footer><a href='../index.html'>Atrás</a></footer>
    </body>
</html>