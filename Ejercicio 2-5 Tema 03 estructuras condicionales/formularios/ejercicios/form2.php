<!--
    form2.php
    formulario curriculum vitae
-->
<?php
    function clearData( $cadena ){
        $cadena_limpia = trim( $cadena );
        $cadena_limpia = htmlspecialchars( $cadena_limpia );
        $cadena_limpia = stripslashes( $cadena_limpia );
        return $cadena_limpia;
    }

    $errores = array();
    $mensajes = array();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Álvaro García Fuentes"/>
        <title>Ejercicio 2 formularios</title>
    </head>
    <body>
        <header><h1>Formularios</h1></header>
        <form name="cv" action="form2.php" method="POST">
            <label>Nombre: <input type="text" name="nombre"></label><br>
            <label>Apellidos: <input type="text" name="apellidos"></label><br>
            <label>Email: <input type="text" name="email"></label><br>
            <label>Tipo formación: <select name="formacion">
                <option value="Universitarios">Universitaria</option>
                <option value="Formacion profesional">Formación profesional</option>
                <option value="Bachiller">Bachiller</option>
                <option value="Sin formacion">Sin formación</option>
            </select></label><br>
            <label>Competencias: <textarea name="competencias"></textarea></label><br>
            <button name="validar" value="validar">Validar</button>
            <input type="submit" name="enviar" value="Enviar">
        </form>
        <?php            
            if( $_POST ){
                if( !$_POST['nombre'] )
                    $errores[] = "<p style='color:red'>Debe especificar el nombre.</p>";
                else {
                    $mensajes[] = "<p>".clearData($_POST['nombre'])."<p>";
                    if( !$_POST['apellidos'] )
                        $errores[] = "<p style='color:red'>Debe especificar los apellidos.</p>";
                    else {
                        $mensajes[] = "<p>".clearData($_POST['apellidos'])."<p>";
            
                        if( !preg_match("/[a-zA-Z0-9]{1,}@[a-z,A-Z]+.[a-zA-Z]+/", clearData($_POST['email'])) )
                            $errores[] = "<p style='color:red'>El email no es válido:<br> ej: miemail@correo.com</p>";
                        else
                            $mensajes[] = "<p>".clearData($_POST['email'])."</p>"
                                         ."<p>Estudios: ".$_POST['formacion']."</p>"
                                         ."<p>Competencias:</p>"
                                         .$_POST['competencias'];
                    }
                }

                if(  count( $errores ) != 0  )
                    foreach( $errores as $contador )
                        echo $contador;
                else
                    foreach( $mensajes as $contador )
                        echo $contador;
            }
        ?>
        <footer><a href="../index.html">Atras</a></footer>
    </body>
</html>