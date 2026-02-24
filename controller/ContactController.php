<?php

class ContactController
{

    private $mailservice;
    private $renderer;

    public function __construct($mailservice, $renderer)
    {
        $this->mailservice = $mailservice;
        $this->renderer = $renderer;
    }

    public function contactMe(){
        if($_SERVER['REQUEST_METHOD'] !== 'POST'){
            $this->renderer->render("home", ["error" => "Algo salio mal"]);
            return;
        }
        $email = $_POST["email"];
        $name = $_POST["name"];
        $mensaje = $_POST["message"];
        $subject = $_POST["subject"];
        $this->mailservice->sendMail($email, $name, $mensaje, $subject);
    }
}