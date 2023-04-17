<?php
    include( 'config/conf.php' );
    include( 'lib/cargaOcupadas.php' );

    $ocupadas = cargaOcupadas( nAbonos );
   
    $contador = 0;
    $equipos = [];
    $muestraEntradas = false;
    $muestraPrecioTotal = false;
    $precioEntrada = 0;
    $precioTotal = 0;

    foreach( $tarifas as $equipo => $zonas )
        array_push( $equipos, $equipo );

    if(  isset( $_POST["muestraEntradas"] )  ){
        $equipo = $_POST["equipo"];
        if(  !empty( $_POST["zona"] )  ){
            $contador = [ 'A' => 0, 'B' => 100, 'C' => 200, 'D' => 300 ][$_POST["zona"]];
            $muestraEntradas = true;
            $precioEntrada = $tarifas[$equipo][$_POST["zona"]];
        }
    }

    if(  isset( $_POST["compra"] )  )
        if(  isset( $_POST["entradas"] )  ){
            $muestraPrecioTotal = true;
            $precioEntrada = $_POST["precioEntrada"]; // Se envía en un input hidden
            $precioTotal = is_array( $_POST["entradas"] )?
                $precioEntrada * count( $_POST["entradas"] )
            :   0;
        }
?>
<!DOCTYPE html>
<html lang="ES">
    <head>
        <meta name="author" content="Álvaro García Fuentes">
        <meta charset="UTF-8">
        <title>Examen UD3</title>
    </head>
    <body>
        <header><h1>Examen UD3</h1></header>
        <main>
            <form action="" method="POST">
                <label>Equipo visitante: 
                <select name="equipo">
                    <?php
                        foreach( $equipos as $valor )
                            echo "<option value='$valor'>$valor</option>";
                    ?>
                </select></label>
                <br>
                <?php
                    foreach( [ 'A', 'B', 'C', 'D' ] as $valor )
                        echo "<label>Zona $valor<input type='radio' name='zona' value='$valor'> </label>";
                ?>
                <br>
                <button type="submit" name="muestraEntradas">Mostrar entradas</button>
            </form>
            <?php
                if( $muestraEntradas ){
                    echo "<form action='' method='POST'>"
                        ."<h3>Partido contra $equipo</h3>"
                        ."<table border='2px'>";
                    for( $f = 1; $f < 11; $f++ ){
                        echo "<tr>";
                        for( $c = 1; $c < 11; $c++ ){
                            $contador++;
                            echo in_array( $contador, $ocupadas )?
                                "<td id='sitioAbonado'>$contador</td></tr>"
                            :   "<td id='sitio'>"
                                ."<input type='checkbox' name='entradas[]' value='$contador'> $contador</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table><br/>"
                        ."<input type='hidden' name='equipoSeleccionado' value='$equipo'>"
                        ."<input type='hidden' name='precioEntrada' value='$precioEntrada'>"
                        ."<button type='submit' name='compra'>Comprar</button>"
                        ."</form>";
                }

                if( $muestraPrecioTotal ){
                    echo "<h2>Localidades adquiridas:</h2><ul>";
                    foreach( $_POST["entradas"] as $entrada )
                        echo "<li>Localidad $entrada</li>";
                    echo "</ul><b>Importe total:</b> $precioTotal €";
                }
            ?>
            <br><br>
        </main>
        <footer><a href='../index.php'>Atrás</footer>
    </body>
</html>