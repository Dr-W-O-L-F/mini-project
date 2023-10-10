<?php
include("header.php");
?>
<div id="page-wrapper">
    <div class="main-page">
        <h2 class="title1">Receipt</h2>

        <?php
        if (isset($_GET['id']) && isset($_GET['donation_id'])) {
            $payment_id = intval($_GET['id']);
            $donation_id = intval($_GET['donation_id']);

            require("connect.php");
            require 'vendor/autoload.php';

            // Use a prepared statement to avoid SQL injection
            $stmt = $conn->prepare("SELECT * FROM payment WHERE payment_id = ?");
            $stmt->bind_param("i", $payment_id); // "i" indicates an integer parameter
            $stmt->execute();
            $res = $stmt->get_result();

            if ($res->num_rows > 0) {
                $row = $res->fetch_assoc();

                // Function to send email using SMTP
 // Function to send email using SMTP
                // Handle sending the receipt via email
// Handle sending the receipt via email
if (isset($_POST['send_receipt'])) {
    $recipientEmail = $row['donor_email'];
    $subject = "Receipt for Payment";
    $message = "Dear " . $row['full_name'] . ",\n\n";
    $message .= "Here is your receipt for the payment of $" . $row['amount'] . ".\n";
    $message .= "Payment Date: " . $row['time_stamp'] . "\n";
    $message .= "Thank you for your donation!\n\n";
    $message .= "Best regards,\nSHAREaSMILE";

    $smtpHost = 'smtp.gmail.com';
    $smtpPort = 587;
    $smtpUsername = 'shareasmile2023@gmail.com';
    $smtpPassword = 'pgrl kcec sile kcwx';

    // Create a PHPMailer instance
    $mail = new PHPMailer\PHPMailer\PHPMailer();

    // Enable SMTP
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
    text: 'Recipt Send To Your Email!!!',
    didClose: () => {
      window.location.replace('payments.php');
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
}

                ?>
                <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"
                      rel="stylesheet">
                <div class="container bootstrap snippets bootdeys">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default invoice" id="invoice">
                                <div class="panel-body">
                                    <div class="invoice-ribbon">
                                        <div class="ribbon-inner">PAID</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 top-left">
                                            <i class="fa fa-rocket"></i>
                                        </div>
                                        <div class="col-sm-6 top-right">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-xs-4 from">
                                            <p class="lead marginbottom">From : SHAREaSMILE</p>
                                            <p>India</p>
                                            <p>KERALA</p>
                                            <p>Phone: 415-767-3600</p>
                                            <p>Email: sas@gmail.com</p>
                                        </div>
                                        <div class="col-xs-4 to">
                                            <p class="lead marginbottom">To : <?php echo $row['donor_email']; ?></p>
                                            <p><?php echo $row['phone_number']; ?></p>
                                            <p><?php echo $row['city']; ?></p>
                                            <p><?php echo $row['address']; ?></p>
                                        </div>
                                        <div class="col-xs-4 text-right payment-details">
                                            <p class="lead marginbottom payment-info">Payment details</p>
                                            <p>Amount: <?php echo $row['amount']; ?></p>
                                            <p>Organization Email: <?php echo $row['organization_email']; ?></p>
                                            <p>Date: <?php echo $row['time_stamp']; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6 margintop">
                                            <p class="lead marginbottom">THANK YOU!</p>
                                            <form method="post">
                                                <button class="btn btn-success" id="invoice-print"
                                                        name="print_receipt"
                                                        onclick="printReceipt()"><i class="fa fa-print"></i> Print Receipt
                                                </button>
                                                <button class="btn btn-danger" name="send_receipt"><i
                                                            class="fa fa-envelope-o"></i> Mail Receipt
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    function printReceipt() {
                        var printContents = document.getElementById("invoice").innerHTML;
                        var originalContents = document.body.innerHTML;
                        document.body.innerHTML = printContents;
                        window.print();
                        document.body.innerHTML = originalContents;
                    }
                </script>
                <?php
            }
        }
        ?>
    </div>
</div>

<?php
include("footer.php");
?>
