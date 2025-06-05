<?php

 
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.guarulhos.sp.gov.br';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'williamferreira@guarulhos.sp.gov.br';                     //SMTP username
    $mail->Password   = '326890658@Bc';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;

    $mail->SMTPDebug = 0;
    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('williamferreira@guarulhos.sp.gov.br', 'Mailer');
    $mail->addAddress('jtcwilliam@gmail.com', 'william ferreira');     //Add a recipient
    $mail->addAddress('williamferreira@guarulhos.sp.gov.brm');               //Name is optional
    $mail->addReplyTo('williamferreira@guarulhos.sp.gov.br', 'Information');
    $mail->addCC('williamferreira@guarulhos.sp.gov.br');
    $mail->addBCC('williamferreira@guarulhos.sp.gov.br');



    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Alessandro Imbaçado';
    $mail->Body    = 'Se liga no envio de email <b>in bold!</b>';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
