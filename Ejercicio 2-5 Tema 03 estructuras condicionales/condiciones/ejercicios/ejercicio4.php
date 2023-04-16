<?php
    $estaciones = [  "Primavera" => [ "minimo" => [ "dia" => 20, "mes" => 3 ],
                                      "maximo" => [ "dia" => 20, "mes" => 6 ] ],
                     "Verano"    => [ "minimo" => [ "dia" => 21, "mes" => 6 ],
                                      "maximo" => [ "dia" => 21, "mes" => 9 ] ],
                     "Otoño"     => [ "minimo" => [ "dia" => 22, "mes" => 9 ],
                                      "maximo" => [ "dia" => 20, "mes" => 12 ] ],
                     "Invierno"  => [ "minimo" => [ "dia" => 21, "mes" => 12 ],
                                      "maximo" => [ "dia" => 19, "mes" => 3 ] ]  ];

    $anyo = rand( 1900, 2021 );
    $mes  = rand( 1, 12 );

    do{
        $dia = rand( 1, 31 );
    }while( (($mes==4 || $mes==6 || $mes==9 || $mes==11 ) && $dia>30)
        || (($mes==2) && (($dia>29 && $anyo%4==0 && !$anyo%100==0 ) || $dia>28)) );

    $fecha = [ "year" => $anyo,
               "mon"  => $mes,
               "mday" => $dia ];

    $arrayColores = [ "dia" => "lightyellow",
                      "tarde" => "orange",
                      "noche" => "cyan" ];

    $hora = date('H');
?>
<!DOCTYPE html>
<html lang="ES">
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Álvaro García Fuentes">
        <title>Estaciones del año</title>
    </head>
    <body>
        <header><h1>Estaciones del año</h1></header>
        <main>
            <?php
                foreach( $estaciones as $estacion => $intervalo )
                    if( ($fecha["mon"]  == $intervalo["minimo"]["mes"] && $fecha["mday"] >= $intervalo["minimo"]["dia"])
                     || ($fecha["mon"]  == $intervalo["maximo"]["mes"] && $fecha["mday"] <= $intervalo["maximo"]["dia"])
                     || ($fecha["mon"]  >  $intervalo["minimo"]["mes"] && $fecha["mon"]  <  $intervalo["maximo"]["mes"]) )
                        break;
                
                echo "<p>Fecha:".$fecha['mday']."/".$fecha['mon']."/".$fecha['year']."</p>";
                echo "<p>Estamos en ".$estacion."</p>";
                echo "<style>header{background: url(imagenes/$estacion.jpg) no-repeat;background-size: 160px 106px;padding:0.5em}</style>";
                

                if( ($hora >= 6) && ($hora < 12) ){ // día
                    echo "<style>body{background-color:".$arrayColores['dia']."}</style>";
                    echo "<p>Hora: ".$hora." es de ".array_search('lightyellow', $arrayColores)."</p>";
                    echo "Color elegido: ".$arrayColores['dia'];
                } if( ($hora >= 12) && ($hora < 18) ){ // tarde
                    echo "<style>body{background-color:".$arrayColores['tarde']."}</style>";
                    echo "<p>Hora: ".$hora." es de ".array_search('orange', $arrayColores)."</p>";
                    echo "<p>Color elegido: ".$arrayColores['tarde']."</p>";
                } else { // noche
                    echo "<style>body{background-color:".$arrayColores['noche']."}</style>";
                    echo "<p>Hora: ".$hora."h. Es de ".array_search('cyan', $arrayColores)."</p>";
                    echo "Color elegido: ".$arrayColores['noche'];
                }
            ?>
        </main>
        <footer><a href='../index.html'>Atrás</a></footer>
    </body>
</html>