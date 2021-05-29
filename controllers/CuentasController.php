<?php

include_once('model/Cuentas.php');

class CuentasControler {

    public $model;

    public function __construct() {
        $this->model = new Cuentas();
    }

    public function actionIndex() {
        return json_encode($this->model->obtener());
    }

    public function actionView(int $id) {
        $arr = [
            "cuenta" => $this->model->obtener($id),
            "saldos" => [],
            "transacciones" => [],
        ];
        return json_encode($arr);
    }

    public function actionCreate() {
        $json = file_get_contents('php://input');
        $data = json_decode($json);
        $val = (array) $data;
        $resp = $this->model->crear($val["tipo"]);
        return json_encode($resp);
    }

}

?>