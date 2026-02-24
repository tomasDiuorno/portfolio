<?php

class MailService
{
    public function sendMail($email, $name, $mensaje, $subject)
    {
        require_once __DIR__ . "/../vendor/autoload.php";

        $mail = new PHPMailer\PHPMailer\PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'tom.diuorno99@gmail.com';
            $mail->Password   = 'kgre lcrs yksv udon';
            $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom($email, $name);

            $mail->addAddress('tom.diuorno99@gmail.com', 'Tomas Diuorno');

            $mail->isHTML(true);
            $mail->Subject = "Contacto Portfolio - $subject";

            $mail->Body = "
            <h2>$name</h2>
            <p>$mensaje</p>
            <br><br>
            <p>Enviado desde $email.</p>
        ";

            $mail->send();

        } catch (Exception $e) {
            throw new \Exception("No se pudo enviar el email de verificación: " . $mail->ErrorInfo);
        }
    }
}