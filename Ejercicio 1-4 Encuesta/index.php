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
            <p>Valores &nbsp1 &nbsp&nbsp&nbsp2 &nbsp&nbsp3 &nbsp&nbsp&nbsp4 &nbsp&nbsp&nbsp5</p>
            <form method='POST' action=''>
                <?php
                    for( $i = 1; $i < 11; $i++ ){
                        echo "<label>Item ".( $i < 10? "0".$i : $i );
                        for( $j = 1; $j < 6; $j++ )
                            echo "<input name='item$i' type='radio' value='$j'>";
                        echo "</label><br>";
                    }
                ?>
            <button type='submit'>Enviar</button><br>
            </form>
        <?php
            if( isset($_POST) ){
                $valor = 0;
                $listaItems = [];

                for( $k = 1; $k < 11; $k++ )
                    if( isset( $_POST['item'.$k] ) && $_POST[ 'item'.$k ] > $valor ){
                        $valor = $_POST[ 'item'.$k ];
                        array_push( $listaItems, 'item'.$k );
                    }
                
                $lista = '';
                forEach( $listaItems as $clave => $elemento ){
                    $lista .= $elemento;
                    if($clave < count($listaItems)-1 )
                        $lista .= ', ';
                    else if($clave == count($listaItems)-2 )
                        $lista .= ' e ';
                }

                echo "<p>El valor más alto corresponde a ".$lista." y su valor es ".$valor."</p>";    
            }
        ?>
        </main>
        <footer>
            <a href="../index.php">Atrás</a>
        </footer>
    </body>
</html>