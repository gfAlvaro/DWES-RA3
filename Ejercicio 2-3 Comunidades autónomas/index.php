<?php
    $comunidades = [  "Andalucía"          => [ "Huelva", "Sevilla", "Cádiz",   "Córdoba",
                                                "Jaén",   "Málaga",  "Granada", "Almería" ],
                      "Extremadura"        => [ "Cáceres", "Badajoz" ],
                      "Murcia"             => [ "Murcia" ],
                      "Castilla-La Mancha" => [ "Ciudad Real", "Albacete", "Cuenca", "Guadalajara", "Toledo"],
                      "Islas Canarias"     => [ "Las Palmas", "Santa Cruz de Tenerife" ]  ];

    
    $comunidad = array_keys( $comunidades )[rand( 0, 4 )];
    $aciertos = 0;
    $fallos = 0;
?>
<!DOCTYPE html>
<html lang="ES">
    <head>
        <meta name="author" content="Álvaro García Fuentes">
        <meta charset="utf-8">
        <title>Comunidades autónomas</title>
    </head>
    <body>
        <header><h1>Comunidades autónomas</h1></header>
        <main>
            <form method='POST' action=''>
                <?php
                    echo "<p>$comunidad</p>";
                    foreach( $comunidades[$comunidad] as $indice => $provincia ){
                        echo "<label>$provincia: <input name='$indice' type='checkbox'></label>";
                        echo "<span style='color: red;'></span><br>";
                    }

                    for( $i = 0; $i < 4; $i++ ){
                        do{
                            $indice = array_keys( $comunidades )[rand( 0, 4 )];
                        } while($indice == $comunidad);
                        $co = $comunidades[$indice][ rand( 0, count( $comunidades[$indice] ) - 1  )];
                        echo "<label>$co: <input name=$indice type='checkbox'></label>";
                        echo "<span style='color: red;'></span><br>";
                    }
                ?>
                <button type='submit'>Enviar</button>
            </form>
            <?php
                if(  isset( $_POST )  ){

                    foreach( $comunidades[$comunidad] as $provincia ){
                        if($provincia == $_POST[''] )
                            $aciertos++;
                        
                    }

                    echo "<p>Aciertos: $aciertos.<br>Fallos: $fallos.</p>";
                }
            ?>
        </main>
        <footer>
            <a href="../index.php">Atrás</a>
        </footer>
    </body>
</html>