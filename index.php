<!DOCTYPE html>
<html lang="ES">
    <head>
        <meta name="author" content="Álvaro García Fuentes">
        <meta charset="utf-8">
        <title>Repaso UD3</title>
    </head>
    <body>
        <header><h1>Repaso UD3</h1></header>
        <main>
            <p>Relación de actividades de repaso de la Unidad 3</p>
            <ul>
            <?php
                foreach(  scandir( getcwd() ) as $file )
                    if( $file != 'index.php'
                     && $file != 'css'
                     && $file != '.'
                     && $file != '..'
                     && $file != "README.md" )
                        echo "<li><a href='$file/index.php'><b>$file</b></a></li>";
            ?>
            </ul>
        </main>
    </body>
</html>