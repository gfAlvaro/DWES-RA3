<?php
    $paises = [ "españa"  => ["capital" => "Madrid",  "bandera" => "espanya.jpg"],
                "francia"  => ["capital" => "Paris",   "bandera" => "francia.jpg"],
                "uk"       => ["capital" => "Londres", "bandera" => "uk.jpg"],
                "portugal" => ["capital" => "Lisboa",  "bandera" => "portugal.jpg"],
                "alemania" => ["capital" => "Berlin",  "bandera" => "alemania.jpg"] ];
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Álvaro García Fuentes">
        <title>Formularios ejercicio 3</title>
    </head>
    <body>
        <header><h1>Formularios ejercicio 3</h1></header>
        <form name="paises" action="form3.php" method="POST">
            <label>Seleccione país: <select name="pais">
                <option value="espanya">España</option>
                <option value="francia">Francia</option>
                <option value="uk">Reino Unido</option>
                <option value="portugal">Portugal</option>
                <option value="alemania">Alemania</option>
            </select></label>
            <input type="submit" value="enviar">
        </form>
        <?php
            if( $_POST ){
                echo "<p>Capital: ".$paises[$_POST['pais']]['capital']."</p>";
                echo "<p>Bandera:</p><img src='banderas/".$paises[$_POST['pais']]['bandera']."'>";
            }
        ?>
        <footer><a href="../index.html">atrás</a></footer>
    </body>
</html>