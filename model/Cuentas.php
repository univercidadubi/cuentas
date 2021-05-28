<?php 
require_once("utils/Conexion.php");
class cuentas extends conexion{
	
	public function obtener(){	
		try{
			$this->getConexion();
			$sql="SELECT * FROM cuentas";
			$resultado = $this->cnx->query($sql) or die ($sql);
			$resultado->execute();	
			$usuarios = [];
            return  $resultado->fetchAll();


		/*	foreach($resultado as $res){
				$usuarios[] = $res;
			}
			return $usuarios;*/
		}catch (PDOException $e){
			echo "Error : ".$e->getMessage();			
		}
	}
	
	public function crear($data){
		return json_encode($data);
	}
	
	public function modificar(){
		return "modificar" ;
	}
	
	public function eliminar($id){
		return "eliminar" . $id ;
	}
	
	public function modificaropcion(){
		return "modificaropcion" ;
	}
	
	
	
}