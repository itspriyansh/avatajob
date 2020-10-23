<html>
<script type="text/javascript" src="../js/sweetalert.min.js"></script>
<script>
    function navigateBack() {
        window.history.back();
    }
</script>
<?php
require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

function sendEmail($name, $fromAddress, $subject, $body, $attachment) {
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'priyanshbh@gmail.com';
        $mail->Password   = 'XXXXXXXXXXX';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom($fromAddress, $name);
        $mail->addAddress('priyanshbh@gmail.com');

        // Attachments
        if($attachment != null) {
            $mail->addAttachment($_FILES[$attachment]['tmp_name'], $_FILES[$attachment]['name']);
        }

        // Content  
        $mail->isHtml(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;

        $mail->send();
        echo '<script>swal("Success", "Message has been sent", "success").then(navigateBack);</script>';
    } catch (Exception $e) {
        echo '<script>swal("Something Went Wrong!", "Message could not be sent. Mailer Error: '.$mail->ErrorInfo.'", "error").then(navigateBack);</script>';
    }
}
?>
</html>