<?php
    require_once( 'include/functions.php' );

    $nRand;
    if( !$_POST )
        $nRand = rand( 1, 10 );

    if( $_POST ){
        
    }
?>
<!DOCTYPE html>
<html lang="ES">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Álvaro García Fuentes">
        <title>Tablas de multiplicar</title>
        <link rel='stylesheet' href='css/estilos.css'>
    </head>
    <body>
        <header><h1>Tablas de multiplicar</h1></header>
        <main>
            <form method='POST' action='index.php' id='formulario'>
                <div id='tablero'>
                    <div class='casilla marco'>*</div>
                    <?php
                        for( $i = 1; $i < 11; $i++ )
                            echo "<div class='casilla marco'>$i</div>";

                        for( $i = 1; $i < 11; $i++ ){
                            echo "<div class='casilla marco'>$i</div>";
                            for( $j = 1; $j < 11; $j++ )
                                echo "<div class='casilla'><input type='text' name='$i-$j' class='input'></div>";
                        }
                    ?>
                </div>
                <button type='submit'>Enviar</button>
            </form>
            <?php
                if( $POST ){
                    //Respuestas
                }
            ?>
        </main>
        <footer>
            <p><a href='.../index.php' class='footlink'>Atrás</a></p>
            <p><a href='https://github.com/gfAlvaro/DWES-2022-2023/tree/main/Tema%2003%20estructuras%20condicionales/tablaMultiplicar' class='footlink'>Código fuente</a></p>
        </footer>
    </body>
</html>