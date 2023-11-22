<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/PHPMailer.php';
require './PHPMailer/SMTP.php';
require './PHPMailer/Exception.php';

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_OFF; // Set debugging level
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'your_username';
    $mail->Password = 'your_password';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS
    $mail->Port = 587;

    $mail->setFrom('sender@example.com', 'Sender Name');
    $mail->addAddress('recipient@example.com', 'Recipient Name');
    $mail->isHTML(true);
    $mail->Subject = 'Subject of the email';
    $mail->Body = 'This is the HTML message body';

    $mail->send();
    echo 'Email sent successfully';
} catch (Exception $e) {
    echo "Email could not be sent. Error: {$mail->ErrorInfo}";
}
?>
