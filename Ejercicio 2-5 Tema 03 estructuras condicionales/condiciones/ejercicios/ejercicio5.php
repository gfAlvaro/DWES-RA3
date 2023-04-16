<?php
    $perfiles = [ "administrador" => [ "pagina1", "pagina2", "pagina3", "pagina4" ],
                  "usuario" => [ "pagina1", "pagina2"] ];

    $usuarios = [ "perfil1" => "administrador",
                  "perfil2" => "usuario" ];
?>
<!DOCTYPE html>
<html lang="ES">
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Álvaro García Fuentes">
        <title>Perfil de usuarios</title>
    </head>
    <body>
        <header><h1>Perfil de usuarios</h1></header>
        <main>
            <?php
                foreach( $perfiles as $perfil => $paginas )
                    foreach( $usuarios as $usuario => $categoria )
                        if( $categoria == $perfil ){
                            echo "<p>El perfil de $categoria tiene acceso a: </p>";
                            echo "<ul>";
                            foreach( $paginas as $pagina )
                                echo "<li><a href='$pagina.html'>$pagina</a></li>";
                            echo "</ul>";
                        }
            ?>
        </main>
        <footer><a href='../index.html'>Atrás</a></footer>
    </body>
</html>