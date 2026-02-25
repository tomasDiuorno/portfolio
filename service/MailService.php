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
            $mail->Username   = $_ENV["SMTP_USER"];
            $mail->Password   = $_ENV["SMTP_PASS"];
            $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom($email, "Portfolio Contact");
            $mail->addReplyTo($email, $name);

            $mail->addAddress($_ENV["SMTP_USER"], 'Tomas Diuorno');

            $mail->isHTML(true);
            $mail->Subject = "Contacto Portfolio - $subject";

            $mail->Body = "
                <h3>Nuevo mensaje desde el portfolio</h3>
                <p><strong>Nombre:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Mensaje:</strong><br>$mensaje</p>
            ";

            $mail->send();

        } catch (Exception $e) {
            throw new \Exception("No se pudo enviar el email de verificación: " . $mail->ErrorInfo);
        }
    }
}