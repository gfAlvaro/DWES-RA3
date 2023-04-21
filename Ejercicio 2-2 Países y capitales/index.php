<?php
    //
    // CAPA DE NEGOCIO PAÍSES
    //

    $paises = [ "España"      => "Madrid",
                "Portugal"    => "Lisboa",
                "Francia"     => "Paris",
                "Reino Unido" => "Londres",
                "Italia"      => "Roma",
                "Alemania"    => "Berlin",
                "Marruecos"   => "Rabat",
                "Argelia"     => "Argel",
                "Belgica"     => "Bruselas",
                "Irlanda"     => "Dublin" ];
    $aciertos = 0;
    $fallos = 0;

    function creaRespuestas($capitales = []){
        $salida = [];

        foreach( $GLOBALS["paises"] as $pais => $capital )
            if($capital == ucfirst(  strtolower( $capitales[$pais] )  ) ){
                $salida[$pais] ="Correcto.";
                $GLOBALS["aciertos"]++;
            } else {
                $salida[$pais] ="Incorrecto. Capital de $pais: $capital";
                $GLOBALS["fallos"]++;
            }

        return $salida;
    }

    $respuestas = !isset( $_POST['capitales'] )?
        array_fill_keys(array_keys($paises), "" )
    :   creaRespuestas( $_POST['capitales'] );

    //
    //CAPA DE NEGOCIO SOPA DE LETRAS
    //

    // crea array bidimensional con letras aleatorias
    $letras = [ "A", "B", "C", "D", "E", "F", "G",
                "H", "I", "J", "K", "L", "M", "N",
                "Ñ", "O", "P", "Q", "R", "S", "T",
                "U", "V", "W", "X", "Y", "Z" ];
    $numeroLetras = count($letras);
    $sopa = [];
    for( $i = 0; $i < 10; $i++ )
        for( $j = 0; $j < 10; $j++ )
            $sopa[$i][$j] = $letras[ rand(0, $numeroLetras - 1) ];

    $filasSopa = count( $sopa );
    $columnasSopa = $filasSopa;

    // selecciona capitales para introducir en la sopa
    $capitales = array_values( $paises );
    $capitalesSeleccionadas = [];
    while( count( $capitalesSeleccionadas ) < 5 ){
        $indice = rand(0, 9);
        if( !isset( $capitalesSeleccionadas[$indice] )  )
            $capitalesSeleccionadas[$indice] = $capitales[$indice];
    } 

    // introduce capitales en la sopa
    $insertadas = [];
    $tablaIncrementos = [  [ 'x' => 0,  'y' => -1 ],
                           [ 'x' => 0,  'y' => 1  ],
                           [ 'x' => 1,  'y' => -1 ],
                           [ 'x' => 1,  'y' => 0  ],
                           [ 'x' => 1,  'y' => 1  ],
                           [ 'x' => -1, 'y' => -1 ],
                           [ 'x' => -1, 'y' => 0  ],
                           [ 'x' => -1, 'y' => 1  ]  ];
    while( count( $capitalesSeleccionadas ) > 0 ){

        $incremento = rand( 0, 7 );
        $i = rand( 0, $filasSopa - 1 );
        $j = rand( 0, $columnasSopa - 1 );
        $capitalSeleccionada = strToUpper( end( $capitalesSeleccionadas )  );
        $longitudCapital = strlen( $capitalSeleccionada );

        // comprobar que hay espacio suficiente para introducir la capital
        // desde la casilla seleccionada
        // y cada casilla a escribir no está ocupcada por una letra de capital distinta
        $casillaLineaLibre = true;
        for( $k = $i, $l = $j, $indice = 0;
        $k < $filasSopa && $k >= 0 && $l < $columnasSopa && $l >= 0 && $indice < $longitudCapital;
        $k += $tablaIncrementos[$incremento]['x'], $l += $tablaIncrementos[$incremento]['y'], $indice++ ){
            if( ( ( $k == 0 || $l == 0 || $k == $filasSopa-1 || $l == $columnasSopa-1 )
            && $indice < $longitudCapital-1 )
            || ( isset( $insertadas[$k][$l] ) && $insertadas[$k][$l] != $capitalSeleccionada[$indice] )  ){
                $casillaLineaLibre = false;
                break;
            }
        }

        // insertar capital en la sopa
        if( $casillaLineaLibre ){
            for( $k = $i, $l = $j, $indice = 0;
            $k < $filasSopa && $k >= 0 && $l < $columnasSopa && $l >= 0 && $indice < $longitudCapital;
            $k += $tablaIncrementos[$incremento]['x'], $l += $tablaIncrementos[$incremento]['y'], $indice++ ){
                //insertar en sopa
                $sopa[$k][$l] = $capitalSeleccionada[$indice];
                //añadir al array de insertadas para futuras comprobaciones
                $insertadas[$k][$l] = $sopa[$k][$l];
            }
            array_pop( $capitalesSeleccionadas );
        }
    }
?>
<!DOCTYPE html>
<html lang="ES">
    <head>
        <meta name="author" content="Álvaro García Fuentes">
        <meta charset="utf-8">
        <title>Países y capitales</title>
    </head>
    <body>
        <header><h1>Países y capitales</h1></header>
        <main>
            <form method='POST' action=''>
                <?php
                    foreach( $paises as $pais => $capital ){
                        echo "<label>$pais: <input name='capitales[$pais]' type='text'></label>";
                        echo "<span style='color: red;'> $respuestas[$pais]</span><br>";
                    }
                ?>
            <button type='submit'>Enviar</button>
            </form>
            <?php
                if(  isset( $_POST['capitales'] )  )
                    echo "<p>Aciertos: $aciertos. <br>Fallos: $fallos.</p>";

                echo "<h2>SOPA DE LETRAS</h2>";
            ?>
            <table>
            <?php
                // muestra sopa de letras
                for( $i = 0; $i < $filasSopa; $i++ ){
                    echo "<tr>";
                    for( $j = 0; $j < $columnasSopa; $j++ )
                        echo "<td".( isset($insertadas[$i][$j]) && $sopa[$i][$j] == $insertadas[$i][$j]?
                                     " style='color:red'" : "").">".$sopa[$i][$j]."</td>";
                    echo "</tr>";
                }
            ?>
            </table><br>
        </main>
        <footer>
            <a href="../index.php">Atrás</a>
        </footer>
    </body>
</html>