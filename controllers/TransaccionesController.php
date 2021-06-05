<?php


class TransaccionesController {

    function obtSaldo($cuenta_id=""){
        $cnt = new Transaccion();
        $r = $cnt->saldo($cuenta_id);
        return json_encode($r[0]);
    }
    function registrar($cuenta_id="", $monto=0){
        $cnt = new Transaccion();
        $r = $cnt->registro($cuenta_id, $monto);
        obtSaldo($cuenta_id);
    }

}
