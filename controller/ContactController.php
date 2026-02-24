<?php

class ContactController
{

    private $contactmodel;
    private $renderer;

    public function __construct($contactmodel, $renderer)
    {
        $this->contactmodel = $contactmodel;
        $this->renderer = $renderer;
    }

    public function contact(){

        $this->mailservice->sendMail();
    }
}