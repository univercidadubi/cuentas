<?php
include_once('model/Cuentas.php');
$type =  getenv('REQUEST_METHOD');
$model = new Cuentas();
switch($type){
    case('GET'): 
        echo json_encode($model->obtener());
    break;
	case('POST'):
		$json = file_get_contents('php://input');
		$data = json_decode($json);
		$val = (array)$data;
		echo $model->crear($val["tipo"]);
	break;	
	case('PUT'): 
		$model->modificar();
	break;	
	
	case('DELETE'): 
		$model->eliminar(1);
	break;	

}