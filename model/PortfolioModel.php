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
        $result = $this->conexion->query($query);

        if (!$result || empty($result)) {
            return [];
        }

        $skills = [];
        while ($row = $result->fetch_assoc()) {
            $skills[] = $row;
        }

        return $skills;
    }
}