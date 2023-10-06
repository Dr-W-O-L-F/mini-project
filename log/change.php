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

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $qus = $_POST['qus'];
    $ans = $_POST['ans'];
    $email = $_POST['email'];

    // Check if the security question answer matches the stored answer
    $sql = "SELECT * FROM login WHERE email='$email' AND security_question='$qus' AND security_answer='$ans'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Security question answer matches, allow password change
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="style.css">
            <title>Animated Login Page</title>
            <script>
		function validatePassword() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmPassword").value;
		if (password !== confirmPassword) {
        alert("Passwords do not match. Please try again.");
        return false;
	    } else {
        return true;
        }
        }
		</script>
        </head>
        <body>
            <div class="square">
                <div class="login">
                    <h2>Change Password</h2>
                    <form action="updatepass.php" method="POST" onsubmit="return validatePassword()">
                        <div class="inputBx">
						<input type="password" name="password" placeholder="New Password" id="password" pattern="^(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[@#$%^&+=!])(?=\S+$).{8,}$" required/>
                        </div>
                        <div class="inputBx">
						<input type="password" name="confirmPassword" placeholder="Confirm Password" id="confirmPassword" pattern="^(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[@#$%^&+=!])(?=\S+$).{8,}$" required/>
                        </div>
                        <!-- Include the email as a hidden input field -->
                        <input type="hidden" name="email" value="<?php echo $email; ?>">
                        <div class="inputBx">
                            <input type="submit" value="Change Password">
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
    } else {
        // Security question answer does not match
        ?>
        <script>
                             Swal.fire({
                            icon: 'error',
                            text: 'Security question answer does not match. Password change failed. ',
                            didClose: () => {
                           window.location.href = "forgotpassword.php";
                            }
                            });
        </script>
        <?php
    }
}

?>
 