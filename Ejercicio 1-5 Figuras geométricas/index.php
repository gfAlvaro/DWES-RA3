<?php
    session_start();
    if(  isset( $_POST['figura'] )  ){
        $_SESSION['figura'] = $_POST['figura'];
        header('Location: elegirMedidas.php');
    }

    $figuras = [ 'circulo', 'rectangulo', 'cuadrado' ];
?>
<!DOCTYPE html>
<html lang="ES">
    <head>
        <meta name="author" content="Álvaro García Fuentes">
        <meta charset="utf-8">
        <title>Figuras geométricas</title>
    </head>
    <body>
        <header><h1>Figuras geométricas</h1></header>
        <main>
            <form method='POST' action=''>
                <?php
                    foreach( $figuras as $figura )
                        echo "<label>$figura: <input name='figura' type='radio' value=$figura><br>";
                ?>
            <button type='submit'>Aceptar</button><br>
            </form>
            <br>
        </main>
        <footer>
            <a href="../index.php">Atrás</a>
        </footer>
    </body>
</html>