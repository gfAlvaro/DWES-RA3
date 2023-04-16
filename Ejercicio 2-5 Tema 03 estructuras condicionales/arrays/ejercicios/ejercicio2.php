<?php
    $alumnos = [ [ 'nombre'=>"Pepe", 'foto'=>"fotoPepe.jpg"],
                 [ 'nombre'=>"Maria", 'foto'=>"fotoMaria.jpg"],
                 [ 'nombre'=>"Fernando", 'foto'=>"fotoFernando.jpg"],
                 [ 'nombre'=>"Ana", 'foto'=>"fotoAna.jpg"] ];

    $seleccion = rand(0,3);
?>
<!DOCTYPE html>
<html lang="ES">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Álvaro García Fuentes">
        <title>Alumno</title>
    </head>
    <body>
        <header><h1>Alumno</h1></header>
        <main>
            <?php
                echo "<p>Nombre: ".$alumnos[$seleccion]['nombre']."</p>";
                echo "<img src=".$alumnos[$seleccion]['foto'].">";
            ?>
        </main>
    </body>
</html>