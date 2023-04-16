<?php
    function existeCoordenada($a, $b, $unArray){

        foreach( $unArray as $elemento )
            if( $elemento['f'] == $a && $elemento['c'] == $b )
                return true;

        return false;
    }