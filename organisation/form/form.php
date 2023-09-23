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
 // Check if the form was submitted
    // Retrieve data from the form using $_POST
    $event_name = $_POST["event_name"];
    $event_details = $_POST["event_details"];
    $estimated_amount = $_POST["estimated_amount"];
    $acc_num = $_POST["acc_num"];
    $ifsc = $_POST["ifsc"];
    $bank_name = $_POST["bank_name"];
    $acc_name = $_POST["acc_name"];
    $branch = $_POST["branch"];
    $place = $_POST["place"];
    $date = $_POST["date"];

    $sql = "INSERT INTO `request_form`(`donation_id`, `organization_email`, `donation_type`, `donation_details`, `estimated_amount`, `account_number`, `ifsc_code`, `bank_name`, `holder_name`, `branch`, `place`, `date`) 
    VALUES (NULL,'$email','$event_name','$event_details','$estimated_amount','$acc_num','$ifsc','$bank_name','$acc_name','$branch','$place','$date')";
    if (mysqli_query($conn, $sql)) {
        ?>
        <script>
            Swal.fire({
                                icon: 'success',
                                text: ' Form submitted successfully',
                                didClose: () => {
                                window.location.replace('../index1.html');
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
                                text: ' Error',
                                didClose: () => {
                                window.location.replace('index.html');
                                }
                                });  
        </script>
        <?php
    }
?>
    