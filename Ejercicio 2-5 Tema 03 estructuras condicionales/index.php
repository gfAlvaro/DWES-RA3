<!DOCTYPE html>
<html lang="ES">
    <head>
        <meta name="author" content="Álvaro García Fuentes">
        <meta charset="UTF-8">
        <title>Tema 3</title>
    </head>
    <body>
        <header><h1>Tema 3</h1></header>
        <main>
            <p>Lista de ejercicios:</p>
            <?php
                echo "<ul>";
                foreach( scandir(getcwd() ) as $file )
                    if( $file != 'css'
                     && $file != 'index.php'
                     && $file != '.'
                     && $file != '..' )
                        echo "<li><a href='$file/index.php'>$file</a></li>";
                echo "</ul>";
            ?>
        </main>
        <footer>
            <p><a href="../index.php" class='footlink'>Atrás</a></p>
            <p><a href="https://github.com/gfAlvaro/DWES-2022-2023/tree/main/Tema%2003%20estructuras%20condicionales" class='footlink'>Código fuente</a></p>
        </footer>
    </body>
</html>