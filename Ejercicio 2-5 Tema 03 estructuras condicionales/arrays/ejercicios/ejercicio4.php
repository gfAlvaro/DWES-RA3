<?php
    $carta = [  "primeros" => [ "primero1" => ["foto" => "fotoPrimero1.jpg", "precio" => 4.5],
                                "primero2" => ["foto" => "fotoPrimero2.jpg", "precio" => 5.5],
                                "primero3" => ["foto" => "fotoPrimero3.jpg", "precio" => 3.5] ],
                "segundos" => [ "segundo1" => ["foto" => "fotoSegundo1.jpg", "precio" => 5], 
                                "segundo2" => ["foto" => "fotoSegundo2.jpg", "precio" => 7],
                                "segundo3" => ["foto" => "fotoSegundo3.jpg", "precio" => 6],
                                "segundo4" => ["foto" => "fotoSegundo4.jpg", "precio" => 4],
                                "segundo5" => ["foto" => "fotoSegundo5.jpg", "precio" => 4.5] ],
                "postres"  => [ "postre1"  => ["foto" => "fotoPostre1.jpg", "precio" => 2.5],
                                "postre2"  => ["foto" => "fotoPostre2.jpg", "precio" => 3],
                                "postre3"  => ["foto" => "fotoPostre3.jpg", "precio" => 2] ]  ];
?>
<!DOCTYPE html>
<html lang="ES">
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Álvaro García Fuentes">
        <title>Menú</title>
    </head>
    <body>
        <headaer><h1>Menú</h1></header>
        <main>
            <?php
                foreach( $carta["primeros"] as $primero => $datos1 )
                    foreach( $carta["segundos"] as $segundo => $datos2 )
                        foreach( $carta["postres"] as $postre => $datos3 ){
                            $precioMenu = $datos1["precio"] + $datos2["precio"] + $datos3["precio"];
                            $precioMenu = $precioMenu - $precioMenu*20/100;
                            echo "primero: ".$primero.", segundo: ".$segundo.", postre: ".$postre.". Precio: ".$precioMenu."€";
                            echo "<img src='".$datos1["foto"]."'>";
                            echo "<img src='".$datos2["foto"]."'>";
                            echo "<img src='".$datos3["foto"]."'><br><br>";
                        }
            ?>
        </main>
    </body>
</html>