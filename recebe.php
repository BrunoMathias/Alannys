
<?php

//VARS
$uemail = $_POST['myemail'];

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.sendgrid.net';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'apikey';                     // SMTP username
    $mail->Password   = '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';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('alannyssalon@gmail.com', 'Allanys Site');
    $mail->addAddress('alannyssalon@gmail.com');     // Add a recipient
    $mail->addReplyTo('alannyssalon@gmail.com');
    //$mail->addCC('alannyssalon@gmail.com');
    $mail->addBCC('brunomathiaslima@hotmail.com');




    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Alannys Newsletter - Novo ';
    $mail->Body    = 'O seguinte e-mail gostaria de receber noticias: <strong> '.$uemail.'</strong>';
    $mail->AltBody = 'O seguinte e-mail gostaria de receber noticias: '.$uemail;

    $mail->send();
    echo 'E-mail enviado com sucesso';

    exit;
} catch (Exception $e) {
    echo 'Erro ao Enviar';
}
