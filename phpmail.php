<?php
/**
 This sends emails via smtp
 */
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'libraries/phpmailer/src/Exception.php';
require 'libraries/phpmailer/src/PHPMailer.php';
require 'libraries/phpmailer/src/SMTP.php';

//import vars
$name = $_POST['name'];

$email_address = $_POST['email'];

$msg = $_POST['message'];

$number = $_POST['phone'];

$headers = "From:" . $email_address;

$messages = "You have a new contact request from " . $name . "\r\n" . "Their email address is " . $email_address . ", and their phone number is " . $number . "\r\n" . "Message contents:" . "\r\n" . $msg;

$body = "<!DOCTYPE html>
<html>
<body>

<h1>You Have a New Contact Request From $name</h1>

<p>Their email address is $email_address and their phone number is $number</p>

<p><b>Message Contents: </b></p><p>$msg</p>

</body>
</html>";











//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
//$mail->Host = gethostbyname('smtp.office365.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "cdform9876@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "Safeguard3941";
//Set who the message is to be sent from
$mail->setFrom('cdform9876@gmail.com', 'cd form');
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress('chrismartin@cdtraining.co.uk', 'Info');
//Set the subject line
$mail->Subject = "Contact Form " . $name;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);
//user:chris Added body
$mail->Body = $body;
$mail->IsHTML(true);
//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors

if (!$mail->send()) {
    $sent = "Message failed to send";
    $sentalt ="Please contact us using another method";
} else {
    $sent = "Message Sent Successfully";
    $sentalt ="We will aim to get back to you as soon as possible. Pleae be aware our opening times are 9:30am to 3:30p";
}
    ?>
    


