<?php

class CuentasControler {
    function obtCuenta($codigo=""){
        $cnt = new Cuenta();
        $r = $cnt->obtener($codigo);
        if(count($r) == 0){
            $cnt->crear($codigo);
            $r = $cnt->obtener($codigo);
        }
        return json_encode($r[0]);
    }

}

?>