<?php

class Conexion {

    public $manejador = "mysql";
    public $servidor = "sql176.main-hosting.eu";
    public $usuario = "u868164586_ubi";
    public $pass = 'c^=Ui@$M#9j';
    public $db_name = "u868164586_pruebaUBI";
    public $cnx;

    function getConexion() {
        try {
            $cadena = $this->manejador . ':host=' . $this->servidor. ';dbname=' . $this->db_name;
            $this->cnx = new PDO($cadena, $this->usuario, $this->pass);
            return $this->cnx;
        } catch (PDOException $ex) {
             echo "Error en la conexion : " . $ex->getMessage();
        }
    }
}
?>

