<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->CharSet = 'utf8';
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'honghaigttn123@gmail.com';                     // SMTP username
    $mail->Password   = 'mbemmerdyadphtfn';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('honghaigttn123@gmail.com', 'MOBILE SHOP');
    $mail->addAddress('honghaigttn123@gmail.com', 'Nguyễn Hải');     // Add a recipient
    $mail->addAddress($email);               // Name is optional
    $mail->addReplyTo('honghaigttn123@gmail.com', 'Contact');
    //$mail->addCC('haiden97tn@gmail.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('image/' . $file_name, $file_name);    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    //$mail->Subject = $subject;
    $mail->Body    = "
        Dear $full_name,
        <br>
        $body    
    ";
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
