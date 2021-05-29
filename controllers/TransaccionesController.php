<?php

include_once('model/Cuentas.php');

class TransaccionesController {

    public $model;

    public function __construct() {
        $this->model = new Cuentas();
    }

    public function actionCreate() {
        $json = file_get_contents('php://input');
        $data = json_decode($json);
        $val = (array) $data;
        $resp = $this->model->crearTran($val["monto"], $val["tipo"], $val["tipomoneda"], $val["cuenta"]);
        return json_encode($resp);
    }

}
