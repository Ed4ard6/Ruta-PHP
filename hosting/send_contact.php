<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Dirección de correo a donde se enviará el mensaje
    $to = "eduardo@eduardomachacon.com"; 
    $subject = "Nuevo mensaje de contacto de " . $name;
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

    $body = "Nombre: " . $name . "\n";
    $body .= "Correo: " . $email . "\n\n";
    $body .= "Mensaje:\n" . $message;

    if (mail($to, $subject, $body, $headers)) {
        // Éxito: puedes redirigir a una página de agradecimiento
        header('Location: index.php?status=success');
    } else {
        // Fallo: redirigir con un mensaje de error
        header('Location: index.php?status=error');
    }
    exit;
}
?>