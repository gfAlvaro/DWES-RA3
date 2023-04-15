<?php
    $mensaje = "";
    if(  isset( $_POST ) && isset( $_POST['superior'] ) && isset( $_POST['superior'] )  ){
        srand( time() );
        $mensaje = rand( $_POST['inferior'], $_POST['superior']);
    }
?>
<!DOCTYPE html>
<html lang="ES">
    <head>
        <meta name="author" content="Álvaro García Fuentes">
        <meta charset="utf-8">
        <title>Números aleatorios</title>
    </head>
    <body>
        <header><h1>Números aleatorios</h1></header>
        <main>
            <form method=POST action=''>
                <label>Límite inferior: <input name='inferior' id='inferior' type='number'></label><br>
                <label>Límite superior: <input name='superior' id='superior' type='number'></label><br>
                <button type='submit'>Enviar</button><br>
            </form>
        <?php
            if(  isset( $_POST ) && isset( $_POST['superior'] ) && isset( $_POST['superior'] )  )
                echo "<p>Número aleatorio entre ".$_POST['inferior']." y ". $_POST['superior'].": ".$mensaje."</p>";
        ?>
        </main>
        <footer>
            <a href="../index.php">Atrás</a>
        </footer>
    </body>
</html>