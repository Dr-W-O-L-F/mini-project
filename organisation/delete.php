<?php
    require("connect.php");
    $donation_id = $_GET['id'];
    $sql="DELETE FROM request_form WHERE donation_id='$donation_id'";
    mysqli_query($conn,$sql);
    header("Location:organizationdetails.php");
?>