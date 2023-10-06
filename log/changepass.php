<html>
<head>
<script type="text/javascript" src="swal/jquery.min.js"></script>
<script type="text/javascript" src="swal/bootstrap.min.js"></script>
<script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>
<body>
</html>
<?php
require("connect.php");
$email = $_POST['email'];
$sql = "SELECT * FROM login WHERE email='$email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Animated Login Page</title>
</head>
<body>
    <div class="square">
        <div class="login">
            <h2>Change Password</h2>
            <form action="change.php" method="POST">
                <div class="inputBx">
                    <input type="text" name="qus" value="<?php echo $row['security_question'] ?>">
                </div>
                <div class="inputBx">
                    <input type="answer" name="ans" placeholder="Answer">
                </div>
                <!-- Include the email as a hidden input field -->
                <input type="hidden" name="email" value="<?php echo $email; ?>">
                <div class="inputBx">
                    <input type="submit" value="Submit">
                </div>
                <div class="links">
                    <a href="index.php">Login</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

    <?php

}else {
    ?>
    <script>
                Swal.fire({
                                icon: 'error',
                                text: ' Email not found ',
                                didClose: () => {
                                window.location.replace('index.php');
                                }
                                });
    </script>
<?php } ?> 
