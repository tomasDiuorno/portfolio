<?php

class HomeModel
{
    private $conexion;
    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }
}