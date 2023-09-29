<html>
<head>
<script type="text/javascript" src="swal/jquery.min.js"></script>
<script type="text/javascript" src="swal/bootstrap.min.js"></script>
<script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>
<body>
</html>
<?php
session_start(); // Start the session
$email1 = $_SESSION['email'];
?>
<?php
require("../connect.php");

$organization_email = $_POST["organization_email"];
$donation_id=$_POST['donation_id'];
// Get form data
$full_name = $_POST["full_name"];
$email = $_POST["email"];
$phone_number = $_POST["phone_number"];
$place = $_POST["place"];
$address = $_POST["address"];
$amount = $_POST["amount"];
$card_name = $_POST["name"];
$card_number = $_POST["card_number"];
$expiration_date = $_POST["date"];
$cvv = $_POST["cvv"];

// Perform the database insertion (using mysqli as an example)
$sql = "INSERT INTO `payment` (`payment_id`, `full_name`, `email`, `phone_number`, `city`, `address`, `amount`, `payment_status`, `donor_email`, `organization_email`, `donation_id`)
        VALUES (NULL, '$full_name', '$email', '$phone_number', '$place', '$address', '$amount', '1', '$email1', '$organization_email', '$donation_id')";

if ($conn->query($sql) === TRUE) {
    // Close the database connection
    $conn->close();

    // Redirect to 'index.html'
   ?> <script>
    Swal.fire({
                                    icon: 'success',
                                    text: 'Donation Successfull',
                                    didClose: () => {
                                    window.location.replace('../donationdetails.php');
                                    }
                                    });
            </script><?php
} else {
    // Handle database insertion errors
   ?> <script>
    Swal.fire({
                                    icon: 'error',
                                    text: 'Something Went Wrong',
                                    didClose: () => {
                                    window.location.replace('index.html');
                                    }
                                    });   
             </script><?php

    // Close the database connection
    $conn->close();
}
?>
