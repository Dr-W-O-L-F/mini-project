<html>
<head>
<script type="text/javascript" src="swal/jquery.min.js"></script>
<script type="text/javascript" src="swal/bootstrap.min.js"></script>
<script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>
<body>
</html>
<?php
session_start();
$email=$_SESSION['email'];
require("connect.php");

$sql = "SELECT * FROM registration_organisation WHERE organisation_email='$email' and verify_status='1'";
$res = mysqli_query($conn, $sql);

if (!$res) {
    die("SQL Error: " . mysqli_error($conn));
}

if (mysqli_num_rows($res) > 0) {
    // Redirect to form/index.php
    header("Location: form/index.php");
    exit;
} else {
    // Redirect to index.php
    ?>
    <script>
                        Swal.fire({
                                icon: 'error',
                                text: ' You are not verified yet ',
                                didClose: () => {
                                window.location.replace('index1.php');
                                }
                                });
    </script>
    <?php    exit;
}
?>

