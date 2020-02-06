<?php

class Conexion {

    private $BaseDatos;
    private $Servidor;
    private $Usuario;
    private $Clave;
    private $conn;

    public function __construct() {
        $this->BaseDatos = "Producto";
        $this->Servidor = "localhost";
        $this->Usuario = "root";
        $this->Clave = "";
    }

    private function conectar() {
        $connect = true;
        $this->conn = new mysqli($this->Servidor, $this->Usuario, $this->Clave, $this->BaseDatos);
        if ($this->conn->connect_error)
            $connect = false;
        return $connect;
    }

    public function ejecutar($script) {
        $ok = false;
        if ($this->conectar()) {
            $this->conn->query($script);
            $this->conn->close();
            $ok = true;
        }
        return $ok;
    }

    public function consultar($script) {
        $resultado = NULL;
        if ($this->conectar()) {
            $resultado = $this->conn->query($script);
            $this->conn->close();
        }
        return $resultado;
    }

}
