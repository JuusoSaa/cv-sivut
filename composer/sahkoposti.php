<?php

composer require league/oauth2-google

use League\OAuth2\Client\Provider\Google;
$provider = new Google([
    'clientId'     => '{google-client-id}',
    'clientSecret' => '{google-client-secret}',
    'redirectUri'  => 'https://example.com/callback-url',
    'accessType' => 'offline',
]);
        if (!empty($_GET['error'])) {
            // Got an error; probably user denied access
            exit('Got error: ' . htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8'));
        } elseif (empty($_GET['code'])) {
            // If we don't have an authorization code, then get one
            $authUrl = $provider->getAuthorizationUrl([
                'scope' => [
                    'https://mail.google.com/'
                ]
            ]);
            header('Location: ' . $authUrl);
            exit;
        } else {
            // Try to get an access token (using the authorization code grant)
            $token = $provider->getAccessToken('authorization_code', [
                'code' => $_GET['code']
            ]);
            // Use this to get a new access token if the old one expires
            $refreshToken = $token->getRefreshToken();
        }

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