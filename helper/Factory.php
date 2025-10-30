<?php
include_once ("helper/Database.php");
include_once ("helper/Router.php");
include_once ('vendor/mustache/src/Mustache/Autoloader.php');
include_once ("helper/MustacheRenderer.php");
include_once ("model/HomeModel.php");
include_once ("controller/HomeController.php");
class Factory
{
    private $config;
    private $objetos;
    private $conexion;
    private $renderer;

    public function __construct()
    {
        $this->config = parse_ini_file("config/config.ini");

        $this->conexion["database"] = new Database(
            $this->config["server"],
            $this->config["user"],
            $this->config["pass"],
            $this->config["database"]
        );
        $this->renderer = new MustacheRenderer("vista");
        $this->objetos["router"] = new Router($this, "HomeController", "base");
        $this->objetos["homecontroller"] = new HomeController(new HomeModel($this->conexion), $this->renderer);
    }

    public function get($string)
    {
        $string = strtolower($string);
        $objeto = null;
        if(isset($this->objetos[$string])){
            $objeto = $this->objetos[$string];
        }
        return $objeto;
    }
}