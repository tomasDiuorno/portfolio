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
        $data["skills"] = $this->model->skills();
        $data["technologies"] = $this->model->technologies();
        $data["projects"] = $this->model->projects();
        $this->renderer->render("home", $data);
    }
}