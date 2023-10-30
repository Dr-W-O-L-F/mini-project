<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send_message'])) {
    // Form submitted, process and send the email

    // Retrieve form data
    $recipientEmail = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $attachment = $_FILES['attachment'];

    // Initialize PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'shareasmile2023@gmail.com'; // Replace with your email
        $mail->Password = 'pgrl kcec sile kcwx'; // Replace with your password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption
        $mail->Port = 587; // Port for TLS (587) or SSL (465)

        // Sender and recipient
        $mail->setFrom('shareasmile2023@gmail.com', 'SHAREaSMILE'); // Replace with your name and email
        $mail->addAddress($recipientEmail);

        // Email content
        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body = $message;

        if (!empty($attachment['tmp_name'])) {
            $mail->addAttachment($attachment['tmp_name'], $attachment['name']);
        }

        $mail->send();
        // Email sent successfully

        // Redirect to a success page or display a success message here
        ?>
        <html>
        <head>
          <script type="text/javascript" src="swal/jquery.min.js"></script>
          <script type="text/javascript" src="swal/bootstrap.min.js"></script>
          <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
        </head>
        <body>
        <script>
  Swal.fire({
    icon: 'success',
    text: 'Email Successfully Send!!!',
    didClose: () => {
      window.location.replace('donors.php');
    }
  });
</script>

</body>
</html>
<?php        exit;
    } catch (Exception $e) {
        // Email could not be sent, handle the error
        echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    }
}
?>
