<?php
/**
 * Función que devuelve un array 
 * con las localidades ocupadas por abonados
 * de forma aleatoria
 * 
 * @author Álvaro García Fuentes
 */
function cargaOcupadas( $numeroAbonados ){
    $ocupadas = [];
    for( $i = 0; $i < $numeroAbonados; $i++ ){ 
        do {
            $numero = rand( 1, 400 );
        } while(  in_array( $numero, $ocupadas )  );
        $ocupadas[$i] = $numero;
    }
    return $ocupadas;
}