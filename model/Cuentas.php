<?php 
require_once("utils/Conexion.php");
class cuentas extends conexion{
	
	public function obtener(){	
		try{
			$this->getConexion();
			$sql="SELECT * FROM cuentas";
			$resultado = $this->cnx->query($sql) or die ($sql);
			$resultado->execute();	
	                return  ($resultado->fetchAll(PDO::FETCH_ASSOC));
		} catch (PDOException $e){
			echo "Error : ".$e->getMessage();			
		}
	}
	
	public function crear($vencimiento,$created, $tipo){
			$f = DateTime::createFromFormat('Y-m-d', $created);
			$v = DateTime::createFromFormat('Y-m-d', $created);

			$sql = "INSERT INTO `cuentas` (`idcuenta`, `numerocuenta`, `vencimiento`, `created`, `estado`, `tipo`) VALUES (NULL, '".date("U")."', '".$vencimiento."', '".$f->format('Y-m-d')."', 'activo', '".$tipo."');";
			$this->getConexion();
			return $resultado = $this->cnx->query($sql) or die ($sql);
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
