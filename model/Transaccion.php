<?php

class Transaccion {

    public $tableName = 'transaccion';

    public function saldo($id = "") {
        try {
            $sql = "SELECT SUM(monto) saldo FROM {$this->tableName} WHERE cuenta_id = '{$id}';";
            $cnx = new Conexion();
            $c = $cnx->getConexion();
            $resultado = $c->query($sql) or die($sql);
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public function registro($cuenta, $monto) {
        $sql = "INSERT INTO {$this->tableName} (cuenta_id, monto) VALUES ('" . $cuenta . "',".$monto.");";
        $cnx = new Conexion();
        $c = $cnx->getConexion();
        $c->query($sql) or die($sql);
    }
}