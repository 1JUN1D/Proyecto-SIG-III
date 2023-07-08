<?php

class conexion{
    private $servidor = "localhost";
    private $usuario = "root";
    private $contrasenia = "";
    private $conexion;

    public function __construct(){
        try{
            $this->conexion= new PDO("mysql:host=$this->servidor;dbname=mus", $this->usuario, $this->contrasenia);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e ){
            return "falla de conexion".$e;

        }
    }

    public function getConexion() {
        return $this->conexion;
    }

    public function ejecutar($sql){
        if ($this->conexion) {
            return $this->conexion->exec($sql);
        } else {
            // Manejar el caso en que la conexión no es válida
            die("No se puede ejecutar la consulta, la conexión no es válida.");
        }
    }
}

?> 