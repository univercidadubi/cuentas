<?php

//require_once("./../utils/Conexion.php");

class Cuenta {

    public $tableName = 'cuenta';

    public function obtener($clave = "") {
        try {
            $where = "";
            if ($clave != '')
                $where = " WHERE codigo = '{$clave}' ";
            $sql = "SELECT id FROM {$this->tableName} {$where};";
            $cnx = new Conexion();
            $c = $cnx->getConexion();
            $resultado = $c->query($sql) or die($sql);
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }

    public function crear($clave) {
        $sql = "INSERT INTO {$this->tableName} (id, codigo)"
                . " VALUES (UUID(), '" . $clave . "');";
        $cnx = new Conexion();
        $c = $cnx->getConexion();
        $c->query($sql) or die($sql);
    }
}
