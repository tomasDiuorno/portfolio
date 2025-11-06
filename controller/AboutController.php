<?php

class AboutController
{

    private $renderer;

    public function __construct($renderer)
    {
        $this->renderer = $renderer;
    }

    public function base(){
        $this->about();
    }

    public function about(){
        $this->renderer->render("about");
    }
}