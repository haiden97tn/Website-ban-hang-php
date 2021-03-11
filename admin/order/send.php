
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
    $mail->Subject = $title;
    $mail->Body    = "


        <h3>Cảm ơn khách hàng $full_name</h3>
        <br>
        Đơn hàng của quý khách sẽ được vẫn chuyển trong khoảng từ 3 - 5 ngày, vui lòng chú ý điện thoại để nhận hàng.
        <br>
        <table border=1 style='width:600px; border:1px solid gray; min-height:200px; text-align:center; padding:5px;' >
        <tr style='background-color: rgb(190, 48, 5); color:white; text-align:center;'>
            <td colspan=2><h2>Hóa đơn đặt hàng</h2></td>
        </tr>
        <tr>
            <td>Sản phẩm đã order:</td>
            <td style='color:blue;'>$body</td>
        </tr>
        <tr>
            <td>Tổng tiền đơn hàng là:</td>
            <td style='color:blue;'> $totalPrice; </td>
        </tr>
        </table>
        <br>
        Xin cảm ơn quý khách.
        <br>

    ";
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
