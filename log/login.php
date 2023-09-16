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
              alert("Password not matching")
              window.location.href="index.html"
            </script>
            <?php
        }
    } else {
        ?>
            <script>
              alert("You are not authorized to access this page")
              window.location.href="index.html"
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
              alert("Password not matching")
              window.location.href="index.html"
            </script>
            <?php
        }
    } else {
        ?>
        <script>
          alert("You are not authorized to access this page")
          window.location.href="index.html"
        </script>
        <?php 
    }
    if ($row['user_type'] == 'Organisation') { // Check if user_type is 'Organisation'
        $sql1 = "SELECT * FROM login WHERE email='$email' AND password='$password'";
        $res = mysqli_query($conn, $sql1);
        if (mysqli_num_rows($res) > 0) {
            $r=mysqli_fetch_assoc($res);
            $_SESSION["email"]=$email;
            $_SESSION["usertype"]=$row['user_type']; // Fixed the variable name
            header("Location: ../organisation/index.php");
            exit;
        } else {
            ?>
            <script>
              alert("Password not matching")
              window.location.href="index.html"
            </script>
            <?php
        }
    } else {
        ?>
        <script>
          alert("You are not authorized to access this page")
          window.location.href="index.html"
        </script>
        <?php 
    }
} else {
    ?>
    <script>
      alert("Email not found")
      window.location.href="index.html"
    </script>
<?php } ?> 
