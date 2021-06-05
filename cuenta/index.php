<?php

include_once('./../controllers/CuentasController.php');
include_once('./../model/Cuenta.php');
include_once('./../utils/Conexion.php');
$type = getenv('REQUEST_METHOD');
$cuentas = new CuentasControler();
switch ($type) {
    case('GET'):
            echo $cuentas->obtCuenta($_GET["codigo"]);
        break;
}

