<?php
session_start();
$email=$_SESSION['email'];
require("connect.php");

$sql = "SELECT * FROM registration_organisation WHERE organisation_email='$email' and verify_status=1";
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
        alert("You are not verified yet ");
        window.location.href = "index1.php";
    </script>
    <?php    exit;
}
?>

