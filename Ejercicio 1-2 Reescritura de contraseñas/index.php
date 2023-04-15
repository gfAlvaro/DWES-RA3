<!DOCTYPE html>
<html lang="ES">
    <head>
        <meta name="author" content="Álvaro García Fuentes">
        <meta charset="utf-8">
        <title>Reescritura de contraseñas</title>
    </head>
    <body>
        <header><h1>Reescritura de contraseñas</h1></header>
        <main>
            <form method=POST action=''>
                <label>Introduzca contraseña: <input name='pass1' id='pass1' type='password'></label><br>
                <label>Repita contraseña: <input name='pass2' id='pass2' type='password'></label><br>
                <button type='submit'>Enviar</button><br>
            </form>
        <?php
            if(  isset( $_POST ) && isset( $_POST['pass1'] ) && isset( $_POST['pass2'] )  ){
                echo $_POST['pass1'] == $_POST['pass2']?
                    "<p>Las contraseñas son iguales</p>"
                :   "<p>Las contraseñas no son iguales</p>";
            }
        ?>
        </main>
        <footer>
            <a href="../index.php">Atrás</a>
        </footer>
    </body>
</html>