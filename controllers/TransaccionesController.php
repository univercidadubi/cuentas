<?php


class TransaccionesController {

    function obtSaldo($cuenta_id=""){
        $cnt = new Transaccion();
        $r = $cnt->saldo($cuenta_id);
        if($r[0]->saldo == null) $r[0]->saldo=0;
        return json_encode($r[0]);
    }
    function registrar($cuenta_id="", $monto=0){
        $cnt = new Transaccion();
        $r = $cnt->registro($cuenta_id, $monto);
        $r = $cnt->saldo($cuenta_id);
        if($r[0]->saldo == null) $r[0]->saldo=0;
        return json_encode($r[0]);
    }

}
