<html>
<head>
<script type="text/javascript" src="swal/jquery.min.js"></script>
<script type="text/javascript" src="swal/bootstrap.min.js"></script>
<script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>
<body>
</html>
<?php
require("../connect.php");

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
    
?>
