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
         return $this->conexion->query($sql);
    }
}