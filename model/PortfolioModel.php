<?php

class PortfolioModel
{
    private $conexion;
    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function getSkills(){
        $skills = "SELECT * FROM skill";
        return $this->conexion->query($skills);
    }
}