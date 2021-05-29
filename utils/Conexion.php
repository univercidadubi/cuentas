<?php
abstract class conexion{
	protected $manejador		=	"mysql";
	private static $servidor	=	"localhost";
	private static $usuario		=	"irra";
	private static $pass 		=	"123456";
	protected $db_name			=	"transacciones";
	protected $cnx;
    
	protected function getConexion(){
		try
		{
			$params = array(PDO::ATTR_PERSISTENT=>true,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"); 
			$this->cnx = new PDO($this->manejador.":host=".self::$servidor.";dbname=".$this->db_name,self::$usuario,self::$pass,$params);			
			return $this->cnx;
		}catch (PDOException $ex){
			echo "Error en la conexión : ".$ex->getMessage();			
		}		
	}
}
?>
