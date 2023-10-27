
<?php
$email = $_GET['email'];

?>
<?php
require 'vendor/autoload.php';

$otp = rand(100000, 999999);
$recipientEmail = $email;
$subject = "OTP";
// Email message
$message = "Hi,\n";
$message .= "This is your OTP to reset your password. ";
$message .= "\n Do not share it with anyone.\n";
$message .= "\nHere is your OTP: $otp\n";
$message .= "Regards,\nSHAREaSMILE";



$smtpHost = 'smtp.gmail.com';
$smtpPort = 587;
$smtpUsername = 'shareasmile2023@gmail.com';
$smtpPassword = 'pgrl kcec sile kcwx';

// Create a PHPMailer instance

$mail = new PHPMailer\PHPMailer\PHPMailer(); // Enable SMTP
$mail->isSMTP();
$mail->Host = $smtpHost;
$mail->SMTPAuth = true;
$mail->Username = $smtpUsername;
$mail->Password = $smtpPassword;
$mail->SMTPSecure = 'tls'; // Enable TLS encryption
$mail->Port = $smtpPort;

// Sender and recipient email addresses
$mail->setFrom($smtpUsername);
$mail->addAddress($recipientEmail);

// Email content
$mail->isHTML(false); // Set to false if your email content is plain text
$mail->Subject = $subject;
$mail->Body = $message;

// Send the email
if ($mail->send()) {

  $_SESSION['otp'] = $otp;
  ?>
<html>
<head>
    <script type="text/javascript" src="swal/jquery.min.js"></script>
    <script type="text/javascript" src="swal/bootstrap.min.js"></script>
    <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>
<body>
    <form id="otpForm" action="otpverification.php" method="post">
        <input type="hidden" name="otp" value="<?= $otp ?>">
        <input type="hidden" name="email" value="<?= $email ?>">
    </form>
    <script>
        Swal.fire({
            icon: 'success',
            text: 'OTP Sent To Your Email!!!',
            didClose: () => {
                // Submit the form programmatically
                document.getElementById('otpForm').submit();
            }
        });
    </script>
</body>
</html>

  <?php
  return true;
} else {
  return false;
}
?>