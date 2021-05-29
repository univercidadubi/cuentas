<?php
header('Content-Type: application/json');
include_once('model/Cuentas.php');
$type =  $_SERVER['REQUEST_METHOD'];
$model = new Cuentas();
switch($type){
    case('GET'): 
        echo json_encode($model->obtener());
    break;
	case('POST'):
		$json = file_get_contents('php://input');
		$data = json_decode($json);
		$val = (array)$data;
		echo $model->crear($val["vencimiento"],$val["created"],$val["tipo"]);
	break;	
	case('PUT'): 
		$model->modificar();
	break;	
	
	case('DELETE'): 
		$model->eliminar(1);
	break;	

}
