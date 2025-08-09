<?php
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    $to = "retronihon@gmail.com";
    $subject = "Nuevo mensaje de contacto";
    $headers = "From: noreply@retronihon.com\r\n" .
               "Reply-To: $email\r\n" .
               "Content-Type: text/plain; charset=utf-8";

    $body = "Nombre: $name\nCorreo: $email\n\nMensaje:\n$message";
    
    if (mail($to, $subject, $body, $headers)) {
        echo "Gracias por contactarnos! Nos pondremos en contacto contigo lo más rápido posible.";
    } else {
        http_response_code(500); 
        echo "Error: El correu no se ha podido enviar.";
    }
}
?>

