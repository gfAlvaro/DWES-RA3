<?php
    session_start();

    if(  !isset( $_SESSION['figura'] )  )
        header('Location: index.php');
?>
<!DOCTYPE html>
<html lang='ES'>
    <head>
        <meta name='author' content='Álvaro García Fuentes'>
        <meta charset='utf-8'>
        <title>Medidas del <?php echo $_SESSION['figura'];?></title>
    </head>
    <body>
        <header><h1>Medidas del <?php echo $_SESSION['figura'];?></h1></header>
        <main>
        <form action='' method='POST'>
    <?php
        switch( $_SESSION['figura'] ){
            case 'circulo':
                echo "<label>Radio: <input name='radio' type='number'></label>";
                break;
            case 'rectangulo':
                echo "<label>Alto: <input name='alto' type='number'></label>";
                echo "<label>Ancho: <input name='ancho' type='number'></label>";
                break;
            case 'cuadrado':
                echo "<label>Lado: <input name='lado' type='number'></label>";
                break;
            default:
                header('Location: index.php');
        }
    ?>
    <button type='submit'>Aceptar</button>
    </form>
    <?php
    if(  isset( $_POST )  ){
        echo '<?xml version="1.0" encoding="utf-8"?>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="200" height="200">';
        if(  isset( $_SESSION['figura'] )  )
            switch( $_SESSION['figura'] ){
                case 'circulo':
                    if(  isset( $_POST['radio'] )  )
                        echo "<circle cx='100' cy='100' r='".$_POST['radio']."'/>";
                    break;
                case 'rectangulo':
                    if(  isset( $_POST['alto'] ) && isset( $_POST['ancho'] )  )
                        echo "<rect x='10' y='10' width=".$_POST['ancho']." height=".$_POST['alto']." rx='0' ry='0'/>";
                    break;
                case 'cuadrado':
                    if(  isset( $_POST['lado'] )  )
                        echo "<rect x='10' y='10' width=".$_POST['lado']." height=".$_POST['lado']." rx='0' ry='0'/>";
                    break;
                default:
                    header('Location: index.php');
            }
        echo "</svg>";
    }
    ?>
    </main>
    <footer><a href='index.php'>Atrás</a></footer>
</body>
</html>