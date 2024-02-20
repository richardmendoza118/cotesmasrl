<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../assets/PHPMailer/src/Exception.php';
require '../assets/PHPMailer/src/PHPMailer.php';
require '../assets/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopila los datos del formulario
    $nombre = htmlspecialchars($_POST["name"]);
    $correo = htmlspecialchars($_POST["email"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $mensaje = htmlspecialchars($_POST["message"]);

    // Configuración de PHPMailer
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'mail.cotesmasrl.com'; // Reemplaza con tu servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'soporteti@cotesmasrl.com'; // Reemplaza con tu usuario SMTP
        $mail->Password = 'dac12$cla35'; // Reemplaza con tu contraseña SMTP
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Configuración de correo
        $mail->setFrom($correo, $nombre);
        $mail->addAddress('soporteti@cotesmasrl.com'); // Reemplaza con el correo de destino
        $mail->Subject = $subject;
        $mail->Body = $mensaje;

        // Enviar el correo
        $mail->send();

        echo "¡Gracias por ponerte en contacto con nosotros!";

    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
} else {
    echo "Acceso no autorizado";
}
?>
