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
require("connect.php");
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "SELECT * FROM login WHERE email='$email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if ($row['user_type'] == 'Admin') { // Check if user_type is 'Admin'
        $sql1 = "SELECT * FROM login WHERE email='$email' AND password='$password'";
        $res = mysqli_query($conn, $sql1);
        if (mysqli_num_rows($res) > 0) {
            $r=mysqli_fetch_assoc($res);
            $_SESSION["email"]=$email;
            $_SESSION["usertype"]=$row['user_type']; // Fixed the variable name
            header("Location: ../admin/index.php");
            exit;
        } else {
            ?>
            <script>
              Swal.fire({
                                icon: 'error',
                                text: 'Password or email is not matching',
                                didClose: () => {
                                window.location.replace('index.php');
                                }
                                });   
            </script>
            <?php
        }
    } else {
        ?>
            <script>
              Swal.fire({
                                icon: 'error',
                                text: 'Password or email not matching ',
                                didClose: () => {
                                window.location.replace('index.php');
                                }
                                });   
            </script>
            <?php
    }
    if ($row['user_type'] == 'Donor') { // Check if user_type is 'Donor'
        $sql1 = "SELECT * FROM login WHERE email='$email' AND password='$password'";
        $res = mysqli_query($conn, $sql1);
        
        if (mysqli_num_rows($res) > 0) {
            $r=mysqli_fetch_assoc($res);
            $_SESSION["email"]=$email;
            $_SESSION["usertype"]=$row['user_type']; // Fixed the variable name
            header("Location: ../donor/index.php");
            exit;
          } else {
            ?>
            <script>
              Swal.fire({
                                icon: 'error',
                                text: 'Password or email is not matching',
                                didClose: () => {
                                window.location.replace('index.php');
                                }
                                });   
            </script>
            <?php
        }
    } else {
        ?>
            <script>
              Swal.fire({
                                icon: 'error',
                                text: 'Password or email is not matching  ',
                                didClose: () => {
                                window.location.replace('index.php');
                                }
                                });   
        </script>
        <?php 
    }
    if ($row['user_type'] == 'Organization') { // Check if user_type is 'Organisation'
        $sql1 = "SELECT * FROM login WHERE email='$email' AND password='$password'";
        $res = mysqli_query($conn, $sql1);
        if (mysqli_num_rows($res) > 0) {
            $r=mysqli_fetch_assoc($res);
            $_SESSION["email"]=$email;
            $_SESSION["usertype"]=$row['user_type']; // Fixed the variable name
            header("Location: ../organisation/index1.php");
            exit;
          } else {
            ?>
            <script>
              Swal.fire({
                                icon: 'error',
                                text: 'Password or email is not matching',
                                didClose: () => {
                                window.location.replace('index.php');
                                }
                                });   
            </script>
            <?php
        }
    } else {
        ?>
            <script>
              Swal.fire({
                                icon: 'error',
                                text: 'Password or email is not matching ',
                                didClose: () => {
                                window.location.replace('index.php');
                                }
                                });   
            </script>
        <?php 
    }
} else {
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
