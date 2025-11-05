<?php

class PortfolioModel
{
    private $conexion;
    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function skills(){
        $query = "SELECT title, image FROM skill";
        return $this->conexion->query($query);
    }
    public function technologies(){
        $query = "SELECT title, image FROM technology";
        return $this->conexion->query($query);

    }
}