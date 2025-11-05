<?php

class Database
{
    private $conexion;
    public function __construct($server, $user, $pass, $database)
    {
        $this->conexion = new mysqli($server, $user, $pass, $database);
        if ($this->conexion->error) {die("Error en la conexion: " . $this->conexion->error);}
    }

    public function query($sql){
        $result = $this->conexion->query($sql);

        if (!$result) {
            echo "Error en la consulta: " . $this->conexion->error;
            return false;
        }

        return $result;
    }
}