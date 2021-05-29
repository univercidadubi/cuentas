<?php

include_once('controllers/CuentasController.php');
$type = getenv('REQUEST_METHOD');
$ra = strtoupper($_SERVER['REQUEST_METHOD']);
$uri = $_SERVER['REQUEST_URI'];
$url = str_replace("/", "", $uri);
$cuentas = new CuentasControler();
switch ($type) {
    case('GET'):
        $urx = explode("?", $url);
        if ($urx[0] == 'cuentas') {
            if (count($urx) == 1) {
                echo $cuentas->actionIndex();
            } else {
                echo $cuentas->actionView($_GET["id"]);
            }
        } else {
            
        }
        break;
    case('POST'):
        if ($url == 'cuentas') {
            echo $cuentas->actionCreate();
        } else {
            
        }
        break;
    case('PUT'):
        $model->modificar();
        break;

    case('DELETE'):
        $model->eliminar(1);
        break;
}