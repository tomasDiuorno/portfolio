<?php
include_once("helper/Database.php");
include_once("helper/Router.php");
include_once ("helper/MustacheRenderer.php");
include_once("model/PortfolioModel.php");
include_once("service/MailService.php");
include_once("controller/PortfolioController.php");
include_once("controller/ContactController.php");
class Factory
{
    private $config;
    private $objetos;
    private $conexion;
    private $renderer;

    public function __construct()
    {
        $this->config = parse_ini_file("config/config.ini");

        $this->conexion = new Database(
            $this->config["server"],
            $this->config["user"],
            $this->config["pass"],
            $this->config["database"]
        );
        $this->renderer = new MustacheRenderer("vista");

        $this->objetos["mailservice"] = new MailService();

        $this->objetos["router"] = new Router($this, "PortfolioController", "base");
        $this->objetos["portfoliocontroller"] = new PortfolioController(new PortfolioModel($this->conexion), $this->renderer);
        $this->objetos["contactcontroller"] = new ContactController($this->objetos["mailservice"], $this->renderer);
    }

    public function get($string)
    {
        $string = strtolower($string);
        if (isset($this->objetos[$string])) {
            return $this->objetos[$string];
        }
        return null;
    }
}