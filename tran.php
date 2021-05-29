<?php

include_once('controllers/CuentasController.php');
include_once('controllers/TransaccionesController.php');
$type = getenv('REQUEST_METHOD');
$ra = strtoupper($_SERVER['REQUEST_METHOD']);
$uri = $_SERVER['REQUEST_URI'];
$url = str_replace("/", "", $uri);
$cuentas = new CuentasControler();
$transax = new TransaccionesController();
switch ($type) {
    case('GET'):
        $urx = explode("?", $url);
        if ($urx[0] == 'cuentas') {
            if (count($urx) == 1) {
                echo $cuentas->actionIndex();
            } else {
                echo $cuentas->actionView($_GET["id"]);
            }
        }
        break;
    case('POST'):
        echo $transax->actionCreate();
        break;
    case('PUT'):
        $model->modificar();
        break;

    case('DELETE'):
        $model->eliminar(1);
        break;
}

