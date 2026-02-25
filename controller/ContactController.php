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

    public function contactMe()
    {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(["status" => "error", "message" => "Method not allowed"]);
            return;
        }

        try {
            $email   = $_POST["email"] ?? '';
            $name    = $_POST["name"] ?? '';
            $mensaje = $_POST["message"] ?? '';
            $subject = $_POST["subject"] ?? 'Contacto';

            if (!$email || !$name || !$mensaje) {
                http_response_code(400);
                echo json_encode(["status" => "error", "message" => "Missing fields"]);
                return;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                http_response_code(400);
                echo json_encode(["status" => "error", "message" => "Invalid email"]);
                return;
            }

            $this->mailservice->sendMail($email, $name, $mensaje, $subject);

            http_response_code(200);
            echo json_encode(["status" => "success", "message" => "Message sent"]);

        } catch (\Exception $e) {
            http_response_code(500);
            echo json_encode(["status" => "error", "message" => "Server error"]);
        }
    }
}