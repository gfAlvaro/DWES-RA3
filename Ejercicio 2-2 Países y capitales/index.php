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
    $columnasSopa = count( $sopa[$filasSopa-1] );

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
    while( count( $capitalesSeleccionadas ) > 0 ){

        $horizontal =  rand( 0 , 1 ) == 1;
        //$invertido =  rand( 0 , 1 ) == 1;

        // coordenadas donde se inicia la escritura de la capital
        $i = rand( 0, $filasSopa - 1 );
        $j = rand( 0, $columnasSopa - 1 );
        $capitalSeleccionada = strToUpper( end( $capitalesSeleccionadas )  );
        $longitudCapital = strlen( $capitalSeleccionada );

        if( $horizontal ){
            // comprobar que hay espacio suficiente para introducir la capital
            // desde la casilla seleccionada
            if( $longitudCapital <= $columnasSopa - $j){
                //comprobar que la línea no está ocupada por otra capital
                $casillaLineaLibre = true;
                $indiceCadena = 0;
                for( $l = $j; $l < $longitudCapital + $j; $l++ ){
                    if(  isset( $insertadas[$i][$l] ) && $insertadas[$i][$l] != $capitalSeleccionada[$indiceCadena]  ){
                        $casillaLineaLibre = false;
                        break;
                    }
                    $indiceCadena++;
                }

                // insertar capital en la sopa
                if( $casillaLineaLibre ){
                    $indice = 0;
                    for( $l = $j; $l < $longitudCapital + $j; $l++ ){
                        //insertar en sopa
                        $sopa[$i][$l] = $capitalSeleccionada[$indice];
                        //añadir al array de insertadas para futuras comprobaciones
                        $insertadas[$i][$l] = $sopa[$i][$l];
                        $indice++;
                    }
                    array_pop( $capitalesSeleccionadas );
                }
            }
        } else
            // comprobar que hay espacio suficiente para introducir la capital
            // desde la casilla seleccionada
            if( $longitudCapital <= $filasSopa - $i ){
                //comprobar que la línea no está ocupada por otra capital
                $casillaLineaLibre = true;
                $indiceCadena = 0;
                for( $k = $i; $k < $longitudCapital + $i; $k++ ){
                    if(  isset( $insertadas[$k][$j] ) && $insertadas[$k][$j] != $capitalSeleccionada[$indiceCadena]  ){
                        $casillaLineaLibre = false;
                        break;
                    }
                    $indiceCadena++;
                }

                // insertar capital en la sopa
                if( $casillaLineaLibre ){
                    $indice = 0;
                    for( $k = $i; $k < $longitudCapital + $i; $k++ ){
                        //insertar en sopa
                        $sopa[$k][$j] = $capitalSeleccionada[$indice];
                        //añadir al array de insertadas para futuras comprobaciones
                        $insertadas[$k][$j] = $sopa[$k][$j];
                        $indice++;
                    }
                    array_pop( $capitalesSeleccionadas );
                }
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
                        echo "<td".(isset( $insertadas[$i][$j] ) && $sopa[$i][$j] == $insertadas[$i][$j]?
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