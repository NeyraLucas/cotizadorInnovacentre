<?php

$nombre = $_POST["nombre"];
$empresa = $_POST["empresa"];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];
$servicio = $_POST["servicio"];
$especialidad = $_POST["especialidad"];
$fecha = $_POST["fecha"];

$body  =  "Nombre: " . $nombre ."<br/>Correo: " . $correo . "<br/>Empresa: " . $empresa . "<br/>Telefono: " .$telefono. "<br/>Servicio: " .$servicio. " Especialidad: " .$especialidad. "<br/>Fecha de entrega: " .$fecha;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);


try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'c41nll@gmail.com';                     // SMTP username
    $mail->Password   = '32669427242t';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients AQUIEN SE ENVIA
    $mail->setFrom('c41nll@gmail.com', $nombre);
    $mail->addAddress($correo, $nombre);     // Add a recipient


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Cotización';
    $mail->Body    = $body;
    $mail->CharSet = 'UTF-8';
    $mail->send();
    echo '<script>
        alert("El mensaje se envío correctamente");
        window.history.go(-1);
        </script>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>