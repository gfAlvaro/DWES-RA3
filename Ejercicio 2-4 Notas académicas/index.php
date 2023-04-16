<?php
    $daw2 = [   "Pepe" => [ "DWES"  => [ "7", "8.5" ],
                            "DWEC"  => [ "4", "7" ],
                            "DAWEB" => [ "5", "6" ],
                            "DIW"   => [ "7", "5" ],
                            "EIE"   => [ "3", "4" ],
                            "HLC"   => [ "7", "7" ] ],

                "Carmen" => [ "DWES"  => [ "6", "7" ],
                              "DWEC"  => [ "5", "9" ],
                              "DAWEB" => [ "4", "5" ] ],

                "Maria" => [ "DWEC"  => [ "5", "6" ],
                             "DAWEB" => [ "6", "5" ],
                             "DIW"   => [ "8", "4" ],
                             "HLC"   => [ "8", "6" ] ],

                "Antonio" => [ "DWES"  => [ "7", "8.5" ],
                               "HLC"   => [ "7", "7" ] ],

                "Manuel" => [ "DWES"  => [ "6", "7" ],
                              "DWEC"  => [ "3", "6" ],
                              "DAWEB" => [ "4", "5" ],
                              "DIW"   => [ "6", "4.5" ],
                              "EIE"   => [ "2", "7" ],
                              "HLC"   => [ "6", "8" ] ]  ];

    function media( $num1, $num2 ){ return ( $num1 + $num2 ) / 2; }
?>
<!DOCTYPE html>
<html lang="ES">
    <head>
        <meta name="author" content="Álvaro García Fuentes">
        <meta charset="utf-8">
        <title>Notas académicas</title>
    </head>
    <body>
        <header><h1>Notas Académicas</h1></header>
        <main>
            <p>Seleccione la opción deseada: </p>
            <form method='POST' action=''>
                <button name='menu' type='submit' value='listado'>Listado de Alumnos</button>
                <button name='menu' type='submit' value='aprobados'>Asignatura con más aprobados</button><br>
                <button name='menu' type='submit' value='suspensos'>Asignatura con más suspensos</button>
                <button name='menu' type='submit' value='numero'>Número de aprobados en cada asignatura</button><br>
                <select name='evaluacion'>
                    <option value='0'>1ª Evaluación</option>
                    <option value='1'>2ª Evaluación</option>
                </select>
                <button name='menu' type='submit' value='boletin'>Crear boletín de notas</button>
            </form>
            <?php
                if(  isset( $_POST['menu'] )   )
                    switch( $_POST['menu'] ){
                        case 'listado':
                            foreach( $daw2 as $alumno => $datos ){
                                echo "<p>".$alumno.":<br>";
                                foreach($datos as $asignatura => $notas )
                                    echo "&nbsp&nbsp&nbsp&nbsp".$asignatura.":<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp1ª ev.: $notas[0], 2ª ev.:$notas[1], nota media: ".media($notas[0], $notas[1]).".<br>";
                                echo "</p>";
                            }
                            break;
                        case 'aprobados':
                            $asignaturas = [ "DWES", "DWEC", "DAWEB", "DIW", "EIE", "HLC" ];
                            foreach( $daw2 as $alumno => $datos ){
                                foreach( $datos as $asignatura => $notas ){
                                    foreach( $asignaturas as $elemento ){
                                        $media = media( $notas[0], $notas[1] );
                                        if( $asignatura == $elemento && $media >= 5 )
                                            $asignaturas[$elemento] = $media;
                                    }
                                }

                                foreach( $asignaturas as $asig => $aprobados )
                                    echo "<p>".$asig.": $aprobados aprobados.</p>";
                            }
                            break;

                        case 'suspensos':
                            foreach( $daw2 as $alumno => $datos ){
                                echo "<p>".$alumno.":<br>";
                                foreach($datos as $asignatura => $notas )
                                    echo "&nbsp&nbsp&nbsp&nbsp".$asignatura.":<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp1ª ev.: $notas[0], 2ª ev.:$notas[1], nota media: .<br>";
                                echo "</p>";
                            }
                            break;

                        case 'numero':
                            $asignaturas = [ "DWES", "DWEC", "DAWEB", "DIW", "EIE", "HLC" ];
                            foreach( $daw2 as $alumno => $datos ){
                                foreach( $datos as $asignatura => $notas ){
                                    foreach( $asignaturas as $elemento ){
                                        $media = media( $notas[0], $notas[1] );
                                        if( $asignatura == $elemento && $media >= 5 )
                                            $asignaturas[$elemento] = $media;
                                    }
                                }

                                foreach( $asignaturas as $aprobados => $asig )
                                    echo "<p>".$asig.": $aprobados aprobados.</p>";
                            }
                            break;

                        case 'boletin':
                            foreach( $daw2 as $alumno => $datos ){
                                echo "<p>".$alumno.":<br>";
                                foreach($datos as $asignatura => $notas )
                                    echo "&nbsp&nbsp&nbsp&nbsp".$asignatura.":<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".($_POST['evaluacion']+1)."ª ev.: ".$notas[$_POST['evaluacion']].".<br>";
                                echo "</p>";
                            }
                    }
            ?>
            <br>
        </main>
        <footer>
            <a href="../index.php">Atrás</a>
        </footer>
    </body>
</html>