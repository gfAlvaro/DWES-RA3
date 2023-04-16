<?php
    $festivos = [ "nacional"   => [ [ "dia" => 1,  "mes" => "Enero"      ], 
                                    [ "dia" => 6,  "mes" => "Enero"      ],
                                    [ "dia" => 15, "mes" => "Abril"      ],
                                    [ "dia" => 2,  "mes" => "Mayo"       ],
                                    [ "dia" => 15, "mes" => "Agosto"     ],
                                    [ "dia" => 12, "mes" => "Octubre"    ],
                                    [ "dia" => 1,  "mes" => "Noviembre"  ],
                                    [ "dia" => 6,  "mes" => "Diciembre"  ],
                                    [ "dia" => 8,  "mes" => "Diciembre"  ],
                                    [ "dia" => 26, "mes" => "Diciembre"  ] ],
                  "comunidad"  => [ [ "dia" => 28, "mes" => "Febrero"    ],
                                    [ "dia" => 14, "mes" => "Abril"      ] ],
                  "local"      => [ [ "dia" => 8,  "mes" => "Septiembre" ],
                                    [ "dia" => 24, "mes" => "Octubre"    ] ] ];

    function creaCalendario( $dia, $mes, $anyo ){

        global $festivos;

        $mesDado = [ "Enero",   "Febrero",   "Marzo",
                     "Abril",   "Mayo",      "Junio",
                     "Julio",   "Agosto",    "Septiembre",
                     "Octubre", "Noviembre", "Diciembre" ]
                   [(int)($mes-1)];

        echo "<p>".$mesDado." de ".$anyo."</p><div id='mes'>";

        // Escribimos la fila inicial
        foreach( [ 'L', 'M', 'X', 'J', 'V', 'S', 'D' ] as $d )
            echo "<div class='dia marco'>".$d."</div>";
    
        // Averigüamos con qué día de la semana empieza el mes
        for( $z = 1; $z < date( "w", mktime( 0, 0, 0, $mes, 1, $anyo ) ) % 7; $z++ )
            echo "<div>&nbsp;</div>";

        // asignamos colores a los días festivos
        for( $i = 1; $i <= date( 't', strtotime( $anyo."/".$mes."/".$dia ) ); $i++ ){
            $clase = "";
            $id = "";
            $diaSemana = date( "w", mktime( 0, 0, 0, $mes, $i, $anyo ) );

            if(  ( getDate()['mday'] == $i )
              && ( getDate()['mon'] == $mes )
              && ( getDAte()['year'] == $anyo )  )
                $id = " id='actual'";
            else if( $diaSemana == 6 || $diaSemana == 0 )
                $clase = "finde";
            else
                foreach( $festivos as $clave => $festivo )
                    foreach( $festivo as $fechaF )
                        if( ( $fechaF['dia'] == $i )
                         && ( $fechaF['mes'] == $mesDado ) ){ // días festivos
                            $clase = $clave;
                            break;
                        }

            echo "<div$id class='dia $clase'>$i</div>";
        }
        echo "</div>";
    }
?>
<!DOCTYPE html>
<html lang="ES">
    <head>
        <meta name="author" content="Álvaro García Fuentes">
        <meta charset="UTF-8">
        <title>Ejercicio 1 Formularios</title>
        <link rel="stylesheet" href="../../css/estilosCalendario.css">
    </head>
    <body>
        <header><h1>Ejercicio 1 Formularios</h1></header>
        <main>
            <?php
                if( $_POST )
                    creaCalendario( (int)$_POST['dia'], (int)$_POST['mes'], (int)$_POST['anyo'] );
                else
                    creaCalendario( getDate()['mday'],getDate()['mon'],getDate()['year'] );
            ?>
            <form method="POST" action="form1.php">
                <br><label>Introduzca día: <input type="number" name="dia"></label>
                <br><label>Introduzca mes: <input type="number" name="mes"></label>
                <br><label>Introduzca año: <input type="number" name="anyo"></label>
                <br><input type="submit" value="Enviar">
            </form>
        </main>
        <footer>
            <p><a href='https://github.com/gfAlvaro/DWES-2022-2023/blob/main/tema3/formularios/ejercicios/form1.php'>Código fuente</a></p>
            <p><a href="../index.html">Atrás</a></p>
        </footer>
    </body>
</html>