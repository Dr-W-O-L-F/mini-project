<?php 
    require("connect.php");
    $email=$_GET['email'];
    $sql="UPDATE registration_organisation SET verify_status='1' WHERE organisation_email='$email'";
    mysqli_query($conn,$sql);
    header("Location: organizations.php");
?>