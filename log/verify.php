<?php
$otp = $_POST['otp'];
$otp1 = $_POST['otp1'];
$email = $_POST['email'];

if ($otp === $otp1) {
    // OTPs match, load the "change.php" page

    require("connect.php");
    $email = $_POST['email'];
    $sql = "SELECT * FROM login WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        ?>
<html>
<head>
    <script type="text/javascript" src="swal/jquery.min.js"></script>
    <script type="text/javascript" src="swal/bootstrap.min.js"></script>
    <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>
<body>
    <form id="otpForm" action="change.php" method="post">
    <input type="hidden" name="qus" value="<?php echo $row['security_question'] ?>">
    <input type="hidden" name="ans" value="<?php echo $row['security_answer'] ?>">
    <input type="hidden" name="email" value="<?php echo $email ?>">
    </form>
    <script>
        Swal.fire({
            icon: 'success',
            text: 'You are all set to change password!!!',
            didClose: () => {
                // Submit the form programmatically
                document.getElementById('otpForm').submit();
            }
        });
    </script>
</body>
</html>
        <?php
    }

    // Important to prevent further code execution
} else {?>
<html>
<head>
<script type="text/javascript" src="swal/jquery.min.js"></script>
<script type="text/javascript" src="swal/bootstrap.min.js"></script>
<script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>
</html>
        <script>
                Swal.fire({
                                icon: 'error',
                                text: ' OTP does not match. Try again!!! ',
                                didClose: () => {
                                window.location.replace('index.php');
                                }
                                });
    </script>
<?php
}
?>
