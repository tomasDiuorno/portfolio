<?php

class HomeController
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
        $skillsArray = $this->model->skills();
        $technologiesArray = $this->model->technologies();

        $data = ["skills" => $skillsArray, "technologies" => $technologiesArray];

        $this->renderer->render("home", $data);
    }
}