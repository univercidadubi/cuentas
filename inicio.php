<?php
include_once('model/Cuentas.php');
 getenv('REQUEST_METHOD');
switch($type){
    case('GET'): 
        echo json_encode($model->obtener());
    break;
	case('POST'): 
	    //$json = file_get_contents('php://input');

        echo  "ddd";

		//echo $model->crear($_POST);
	break;	
	case('PUT'): 
		$model->modificar();
	break;	
	
	case('DELETE'): 
		$model->eliminar(1);
	break;	
	
	case('PATH'): 
		$model->modificaropcion();
	break;	
}