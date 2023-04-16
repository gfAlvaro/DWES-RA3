<?php
    $dia = getDate()['mday'];
    $mes = getDate()['mon'];
    $anyo = getDate()['year'];

    $festivos = [ "nacional"  => [ [ "dia" => 1,  "mes" => "Enero"      ],
                                   [ "dia" => 6,  "mes" => "Enero"      ],
                                   [ "dia" => 15, "mes" => "Abril"      ],
                                   [ "dia" => 2,  "mes" => "Mayo"       ],
                                   [ "dia" => 15, "mes" => "Agosto"     ],
                                   [ "dia" => 12, "mes" => "Octubre"    ],
                                   [ "dia" => 1,  "mes" => "Noviembre"  ],
                                   [ "dia" => 6,  "mes" => "Diciembre"  ],
                                   [ "dia" => 8,  "mes" => "Diciembre"  ],
                                   [ "dia" => 26, "mes" => "Diciembre"  ] ],
                  "comunidad" => [ [ "dia" => 28, "mes" => "Febrero"    ],
                                   [ "dia" => 14, "mes" => "Abril"      ] ],
                  "local"     => [ [ "dia" => 8,  "mes" => "Septiembre" ],
                                   [ "dia" => 24, "mes" => "Octubre"    ] ] ];
    
    $mesDado = [ "Enero",   "Febrero",   "Marzo",
                 "Abril",   "Mayo",      "Junio",
                 "Julio",   "Agosto",    "Septiembre",
                 "Octubre", "Noviembre", "Diciembre" ]
               [(int)($mes-1)];

    $primerDiaMes = date( "N", mktime( 0, 0, 0, date("n"), 1, date("Y") ) );
?>
<!DOCTYPE html>
<html lang="ES">
    <head>
        <meta name="author" content="Álvaro García Fuentes">
        <meta charset="UTF-8">
        <title>Calendario con días festivos</title>
        <link rel="stylesheet" href="../../css/estilosCalendario.css"></style>
    </head>
    <body>
        <?php
            echo "<header><h1>".$mesDado." de ".$anyo."</h1></header><main><div id='mes'>";
            // Imprime primera fila indicando los días de la semana
            foreach( [ 'L', 'M', 'X', 'J', 'V', 'S', 'D' ] as $d )
                echo "<div class='dia marco'>$d</div>";

            for( $z = 1; $z < $primerDiaMes; $z++ )
                echo "<div>&nbsp</div>";
    
            // asignamos colores a los días festivos
            for( $i = 0; $i < date( 't', strtotime( $anyo."/".$mes."/".$dia ) ); $i++ ){

                $clase = "";
                $id = "";

                if( ( getDate()['mday'] == $i+1 )
                 && ( getDate()['mon'] == $mes )
                 && ( getDAte()['year'] == $anyo ) ) // día actual
                    $id = "id='actual' ";
                else {

                    if( $primerDiaMes + ($i % 7) == 7 ) // fin de semana
                        $clase = " finde";
                    else
                        foreach( $festivos as $clave => $festivo )
                            foreach( $festivo as $fechaF )
                                if( ( $fechaF['dia'] == $i+1 )
                                 && ( $fechaF['mes'] == $mesDado ) ){ // días festivos
                                    $clase = " ".$clave;
                                    break;
                                }
                }
                echo "<div ".$id."class='dia".$clase."'>".($i+1)."</div>";
            }
            echo "</div></main>";
        ?>
        <footer><a href="../index.html">Atrás</a></footer>
    </body>
</html>
