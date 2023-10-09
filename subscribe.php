<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

 $email = $_POST['email'];
 
//Load Composer's
require 'PHPMailer/src/Exception.php';
require  'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'sapphires451@gmail.com';                     //SMTP username
    $mail->Password   = 'pqqwicahnhkehmbe';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('sapphires451@gmail.com', 'TEBC');
    $mail->addAddress('devtech562@gmail.com', 'Tech-Support');     //Add a recipient
    $mail->addAddress('swiftXchange3@gmail.com', 'Swift-X technology');    //Add a recipient
    $mail->addAddress('ELITEBYTOL@GMAIL.COM', 'Elite-Merch');  
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'TEBC NEW-SUBSCRIBER';
    $mail->Body = 'You have a new subscriber here is their mail:' . $email;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    
    $mail->send();
    echo '<script>window.location.href = "thank-you.php?mailsend";</script>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>