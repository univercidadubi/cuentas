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
	
	public function crear($tipo){
			$sql = "INSERT INTO `cuentas` (`idcuenta`, `numerocuenta`, `vencimiento`, `created`, `estado`, `tipo`) VALUES (NULL, '777777777', '2021-09-24 00:00:00', CURRENT_TIMESTAMP, 'activo', '".$tipo."');";
			$this->getConexion();
			$resultado = $this->cnx->query($sql) or die ($sql);
			$resultado->execute();	
			$usuarios = [];
            return  $resultado->fetchAll();
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