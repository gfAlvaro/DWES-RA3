<?php
    $mes = getdate()["mon"];
    $anyo = getdate()["year"];
    $dia = getdate()["mday"];
    
    // Establece con qué día de la semana empieza el mes
    $primerDiaMes = date( "N", mktime( 0, 0, 0, date("n"), 1, date("Y") ) ) - 1;

    $mesDado = [ "Enero",   "Febrero",   "Marzo", 
                 "Abril",   "Mayo",      "Junio",
                 "Julio",   "Agosto",    "Septiembre",
                 "Octubre", "Noviembre", "Diciembre" ]
               [$mes - 1];    
?>
<!DOCTYPE html>
<html lang="ES">
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Álvaro García Fuentes">
        <title>Calendario</title>
        <link rel="stylesheet" href="../../css/estilosCalendario.css"></link>
    </head>
    <body>
        <?php
            echo "<header><h1>".$mesDado." de ".$anyo."</h1></header>";
            echo "<main><div id='mes'>";
    
            // Imprime primera fila indicando los días de la semana
            foreach([ 'L', 'M', 'X', 'J', 'V', 'S', 'D' ] as $d )
                echo "<div class='dia marco'>",$d,"</div>";

            for( $z = 0; $z < $primerDiaMes; $z++ )
                echo "<div>&nbsp;</div>";

            // Añade estilos al día actual y a los festivos
            for( $i = 1; $i <= date( 't', strtotime( $anyo."/".$mes."/".$dia ) ); $i++ ){
                $id = "";
                $clase = "";
                $fecha = date_create_from_format( 'd-m-y', "$i-$mes-$anyo" );
        
                if( $i == $dia ) // verde para el día actual
                    $id = "id='actual' ";
                else if(  $primerDiaMes + ($i % 7) == 7 ) // rojo para fin de semana
                    $clase = " finde";

                echo "<div ".$id."class='dia".$clase."'>".$i."</div>";
            }
            echo "</div></main>";
        ?>
        <footer><a href='../index.html'>Atrás</a></footer>
    </body>
</html>