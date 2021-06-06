<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
include_once('./../controllers/TransaccionesController.php');
include_once('./../model/Transaccion.php');
include_once('./../utils/Conexion.php');
$type = getenv('REQUEST_METHOD');
$cuentas = new TransaccionesController();
switch ($type) {
    case('GET'):
            echo $cuentas->obtSaldo($_GET["cuenta_id"]);
        break;
    case('POST'):
        $v = file_get_contents('php://input');
        $_POST = json_decode($v, true);
        echo $cuentas->registrar($_POST["cuenta_id"], $_POST["monto"]);
    break;
}

