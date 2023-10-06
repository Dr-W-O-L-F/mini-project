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
    $password = $_POST['password'];
    $email = $_POST['email'];
    $sql = "UPDATE `login` SET password='$password' WHERE email='$email'";
    if (mysqli_query($conn, $sql)) {
        ?>
        <script>
                                    Swal.fire({
                            icon: 'success',
                            text: 'Password updated successfully ',
                            didClose: () => {
                          window.location.href = "index.php";
                            }
                            });
        </script>
        <?php
    } else {
        echo "Error: " . mysqli_error($conn);
        ?>
        <script>
                             Swal.fire({
                            icon: 'error',
                            text: 'Error ',
                            didClose: () => {
                           window.location.href = "updatepass.php";
                            }
                            });
        </script>
        <?php
    }
}
