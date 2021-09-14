<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function send_mail($to, $name, $subject, $body){



require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'skyrocap.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'support@skyrocap.com';                 // SMTP username
    $mail->Password = 'LGDrF4sPaSwv';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                   // TCP port to connect to
    $strhgc = "Skyro Capital";
    //Recipients
    $mail->setFrom('support@skyrocap.com', $strhgc);
    $mail->addAddress($to, $name);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('support@skyrocap.com', 'No Reply');
    //$mail->addCC('cc@example.com'); 
    //$mail->addBCC('email@domain.com', '');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->AltBody = "Please, enable HTML email on your email account. Thank you!";

    $mail->send();
    return true;
} 
catch (Exception $e) {
    // echo 'Message could not be sent.';
    // $errors =  'Mailer Error: ' . $mail->ErrorInfo;
    return false;
}

}



	


