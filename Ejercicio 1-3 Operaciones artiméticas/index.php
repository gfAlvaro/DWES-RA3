<?php
    $operaciones = [ "+", "-", "*", "/" ];
    srand( time() );    
    
    if(  !isset( $_POST )  )
        setcookie( "seleccionada", $operaciones[ rand( 0, 3) ] );
?>
<!DOCTYPE html>
<html lang="ES">
    <head>
        <meta name="author" content="Álvaro García Fuentes">
        <meta charset="utf-8">
        <title>Operaciones aritméticas</title>
    </head>
    <body>
        <header><h1>Operaciones artiméticas</h1></header>
        <main>
            <form method='POST' action=''>
            <label><input name='num1' id='num1' type='number'></label>
            <?php echo " ".$_COOKIE['seleccionada']." " ?>
            <label><input name='num2' id='num2' type='number'></label><br>
            <button type='submit'>Enviar</button><br>
            </form>
        <?php
            if(  isset( $_POST ) && isset( $_POST['num1'] ) && isset( $_POST['num2'] )  ){
                $resultado = $_COOKIE['seleccionada'] == '+'?
                        $_POST['num1'] + $_POST['num2']
                    :(   $_COOKIE['seleccionada'] == '-'?
                            $_POST['num1'] - $_POST['num2']
                    :(   $_COOKIE['seleccionada'] == '*'?
                            $_POST['num1'] * $_POST['num2']
                    :(   $_COOKIE['seleccionada'] == '/'?
                        $_POST['num1'] / $_POST['num2']
                    :
                        "" )));

                echo "<p>".$_POST['num1']." ".$_COOKIE['seleccionada']." ".$_POST['num2']." = ".$resultado."</p>";
            }
        ?>
        </main>
        <footer>
            <a href="../index.php">Atrás</a>
        </footer>
    </body>
</html>