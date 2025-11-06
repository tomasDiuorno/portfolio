<?php

class PortfolioController
{
    private $model;

    private $renderer;

    public function __construct($model, $renderer)
    {
        $this->model = $model;
        $this->renderer = $renderer;
    }

    public function base(){
        $this->home();
    }

    private function home()
    {
        $this->renderer->render("home");
    }
}