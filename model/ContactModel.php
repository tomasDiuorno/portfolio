<?php

class ContactModel
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }
}