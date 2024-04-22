<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Adjust based on your installation method

$mail = new PHPMailer(true); // Enable exceptions

// SMTP Configuration
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com'; // Your SMTP server
$mail->SMTPAuth = true;
$mail->Username = 'juuso.saario07@gmail.com'; // Your Mailtrap username
$mail->Password = 'Jewso223'; // Your Mailtrap password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port = 465;

// Sender and recipient settings
$email = $_POST["email"];
$mail->setFrom($email, 'From Name');
$mail->addAddress('juuso.saario07@gmail.com', 'Recipient Name');

// Sending plain text email
$mail->isHTML(false); // Set email format to plain text
$mail->Subject = $_POST['subject'];
$mail->Body    = $_POST['message'];

// Send the email
if(!$mail->send()){
    echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>