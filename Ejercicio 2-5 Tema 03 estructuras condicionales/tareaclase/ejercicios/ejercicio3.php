<?php
    $signos = [  "capricornio" => [ "minimo" => ["dia" => 22, "mes" => 12 ],
                                    "maximo" => ["dia" => 19, "mes" =>  1 ] ],
                 "acuario"     => [ "minimo" => ["dia" => 20, "mes" =>  1 ],
                                    "maximo" => ["dia" => 18, "mes" =>  2 ] ],
                 "piscis"      => [ "minimo" => ["dia" => 19, "mes" =>  2 ],
                                    "maximo" => ["dia" => 20, "mes" =>  3 ] ],
                 "aries"       => [ "minimo" => ["dia" => 21, "mes" =>  3 ],
                                    "maximo" => ["dia" => 19, "mes" =>  4 ] ],
                 "tauro"       => [ "minimo" => ["dia" => 20, "mes" =>  4 ],
                                    "maximo" => ["dia" => 21, "mes" =>  5 ] ],
                 "geminis"     => [ "minimo" => ["dia" => 21, "mes" =>  5 ],
                                    "maximo" => ["dia" => 20, "mes" =>  6 ] ],
                 "cancer"      => [ "minimo" => ["dia" => 21, "mes" =>  6 ],
                                    "maximo" => ["dia" => 22, "mes" =>  7 ] ],
                 "leo"         => [ "minimo" => ["dia" => 23, "mes" =>  7 ],
                                    "maximo" => ["dia" => 22, "mes" =>  8 ] ],
                 "virgo"       => [ "minimo" => ["dia" => 23, "mes" =>  8 ],
                                    "maximo" => ["dia" => 22, "mes" =>  9 ] ],
                 "libra"       => [ "minimo" => ["dia" => 23, "mes" =>  9 ],
                                    "maximo" => ["dia" => 22, "mes" => 10 ] ],
                 "escorpio"    => [ "minimo" => ["dia" => 23, "mes" => 10 ],
                                    "maximo" => ["dia" => 21, "mes" => 11 ] ],
                 "sagitario"   => [ "minimo" => ["dia" => 22, "mes" => 11 ],
                                    "maximo" => ["dia" => 21, "mes" => 12 ] ]  ];

    $anyo = rand( 1900, 2021 );
    $mes = rand( 1, 12 );

    do{
        $dia = rand( 1, 31 );
    }while(  ( ( $mes==4 || $mes==6 || $mes==9 || $mes==11 ) && $dia>30 )
          || ( ( $mes==2) && ( ( $dia>29 && $anyo%4==0 && !$anyo%100==0 ) || $dia>28) )  );
?>
<!DOCTYPE html>
<html lang="ES">
    <head>
        <meta name="author" content="Álvaro García Fuentes" />
        <meta charset="UTF-8" />
        <title>Fecha de nacimiento y signo zodiacal</title>
    </head>
    <body>
        <header><h1>Fecha de nacimiento y signo zodiacal</h1></header>
        <main>
            <?php
                echo "<p>Fecha de nacimiento: ".$dia."/".$mes."/".$anyo."</p>";
                foreach( $signos as $signo => $intervalo )
                    if(  ( $mes == $intervalo["minimo"]["mes"] && $dia >= $intervalo["minimo"]["dia"] )
                      || ( $mes == $intervalo["maximo"]["mes"] && $dia <= $intervalo["maximo"]["dia"] )
                      || ( $mes >  $intervalo["minimo"]["mes"] && $mes <  $intervalo["maximo"]["mes"] )  )
                        break;

                echo "<p>Signo zodiacal: ".$signo."</p>";
                echo "<img src='imagenes/$signo.jpg' width='160' height='160'></img>";
            ?>
        </main>
        <footer><a href="../index.html">Atrás</a></footer>
    </body>
</html>