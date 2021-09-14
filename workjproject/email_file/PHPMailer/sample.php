<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.sendgrid.net';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'aptech-web';                 // SMTP username
    $mail->Password = 'secretpassword123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('From email', 'From name');
    $mail->addAddress('To email', 'Name');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('noreply email address', 'Reply to name');
    //$mail->addCC('cc@example.com'); 
    //$mail->addBCC('email@domain.com', '');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "Subject";
    $mail->Body    = "HTML Email body";
    $mail->AltBody = "Please, enable HTML email on your email account. Thank you!";

    $mail->send();
} 
catch (Exception $e) {
    // echo 'Message could not be sent.';
    // echo 'Mailer Error: ' . $mail->ErrorInfo;
}





	


