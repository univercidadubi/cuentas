<?php

require_once("utils/Conexion.php");

class cuentas extends conexion {

    public $tableName = 'cuentas';

    public function obtener($id = 0) {
        try {
            $where = "";
            if ($id > 0)
                $where = " WHERE idcuenta = {$id} ";
            $sql = "SELECT * FROM {$this->tableName} {$where}";
            $this->getConexion();
            $resultado = $this->cnx->query($sql) or die($sql);
            return $resultado->fetchAll();
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public function crear($tipo) {
        $sql = "INSERT INTO  {$this->tableName} (idcuenta, numerocuenta, vencimiento, created, estado, tipo) "
                . "VALUES (NULL, '" . date("U") . "', '" . date("Y-m-d") . "', '" . date("Y-m-d") . "', 'activo', '" . $tipo . "');";
        $this->getConexion();
        $this->cnx->query($sql) or die($sql);
        $sqlx = "SELECT * FROM  {$this->tableName} ORDER BY 1 DESC LIMIT 1";
        $this->getConexion();
        $resultado = $this->cnx->query($sqlx) or die($sqlx);
        return $resultado->fetchAll();
    }
}
