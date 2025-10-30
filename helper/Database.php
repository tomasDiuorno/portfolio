<?php

class Database
{
    private $conexion;
    public function __construct($server, $user, $pass, $database)
    {
        $this->conexion = new mysqli($server, $user, $pass, $database);
    }
}