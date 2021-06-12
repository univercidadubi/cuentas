<?php

include_once('model/Cuentas.php');

class TransaccionesController
{

    public $model;

    public function __construct()
    {
        $this->model = new Cuentas();
    }

    public function actionCreate()
    {
        $val = $_POST;
        $resp = $this->model->crearTran($val["monto"], $val["tipo"], $val["tipomoneda"], $val["cuenta"]);
        return json_encode($resp);
    }

}
