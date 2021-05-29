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
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public function crear($created, $tipo) {
        $v = DateTime::createFromFormat('Y-m-d', $created);
        $sql = "INSERT INTO cuentas (idcuenta, numerocuenta, vencimiento, created, estado, tipo) "
                . "VALUES (NULL, '" . date("U") . "', '" . $v->format("Y-m-d") . "', '" . date("Y-m-d H:i:s") . "', 'activo', '" . $tipo . "');";
        $this->getConexion();
        $this->cnx->query($sql) or die($sql);
        $sqlx = "SELECT * FROM  {$this->tableName} ORDER BY 1 DESC LIMIT 1";
        $this->getConexion();
        $resultado = $this->cnx->query($sqlx) or die($sqlx);
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function transacciones($id = 0) {
        try {
            $sql = "SELECT * FROM transacciones WHERE idcuenta = {$id} ORDER BY 1 DESC";
            $this->getConexion();
            $resultado = $this->cnx->query($sql) or die($sql);
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public function saldos($id = 0) {
        try {
            $sql = "SELECT * FROM listadocuenta WHERE idcuenta = {$id}";
            $this->getConexion();
            $resultado = $this->cnx->query($sql) or die($sql);
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    /*     * ******************************** */

    public function crearTran($monto, $tipo, $mon, $cuenta) {
        $sql = "INSERT INTO transacciones(idtransacciones, fecha, hora, monto, tipo, estado, idcuenta, tipomoneda, cambio) "
                . "VALUES (NULL,'" . date("Y-m-d") . "','" . date("H:i:s") . "'," . $monto . ",'" . $tipo . "','realizado'," . $cuenta . ",'" . $mon . "',0)";
        $this->getConexion();
        $this->cnx->query($sql) or die($sql);
        $sqlx = "SELECT * FROM  transacciones ORDER BY 1 DESC LIMIT 1";
        $this->getConexion();
        $resultado = $this->cnx->query($sqlx) or die($sqlx);
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

}
