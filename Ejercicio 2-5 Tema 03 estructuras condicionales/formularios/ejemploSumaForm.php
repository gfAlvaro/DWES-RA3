<!DOCTYPE html>
<html lang="ES">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Álvaro García Fuentes">
        <title>Formulario suma</title>
    </head>
    <body>
        <header><h1>Formulario suma</h1></header>
        <main>
            <form method='POST' action='ejemploSumaForm.php'>
                <input type='number' name='n1'><br>
                <input type='number' name='n2'><br>
                <input type='submit' value='Sumar'>
            </form>
            <?php
                if( $_POST ){
                    $n1 = $_POST['n1'];
                    $n2 = $_POST['n2'];
                    $suma = $n1 + $n2;
                    echo "<p>",$n1," + ",$n2," = ",$suma,"</p>";
                }
            ?>
        </main>
    </body>
</html>