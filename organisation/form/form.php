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
$email = $_SESSION['email'];
require("connect.php");

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

// Insert data into request_form
$sql = "INSERT INTO `request_form`(`donation_id`, `organization_email`, `donation_type`, `donation_details`, `estimated_amount`, `account_number`, `ifsc_code`, `bank_name`, `holder_name`, `branch`, `place`, `date`) 
        VALUES (NULL,'$email','$event_name','$event_details','$estimated_amount','$acc_num','$ifsc','$bank_name','$acc_name','$branch','$place','$date')";

if (mysqli_query($conn, $sql)) {
    // Get the auto-incremented ID from the last INSERT operation
    $last_inserted_id = mysqli_insert_id($conn);

    // Fetch the estimated amount from the last inserted row in request_form
    $sql_fetch_estimated_amount = "SELECT `estimated_amount` FROM `request_form` WHERE `donation_id` = $last_inserted_id";
    $result = mysqli_query($conn, $sql_fetch_estimated_amount);
    $row = mysqli_fetch_assoc($result);
    $estimated_amount = $row['estimated_amount'];

    // Insert data into total_amount with the same request_id and estimated_amount
    $sql1 = "INSERT INTO `total_amount`(`amount_id`, `request_id`, `recieved_amount`, `estimated_amount`) 
             VALUES (NULL, '$last_inserted_id','0', '$estimated_amount')";

    if (mysqli_query($conn, $sql1)) {
        ?>
        <script>
            Swal.fire({
                icon: 'success',
                text: 'Form submitted successfully',
                didClose: () => {
                    window.location.replace('../index1.php');
                }
            });
        </script>
        <?php
    } else {
        echo "Error in SQL1: " . mysqli_error($conn);
        ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Error',
                didClose: () => {
                    window.location.replace('index.php');
                }
            });
        </script>
        <?php
    }
} else {
    echo "Error in SQL: " . mysqli_error($conn);
    ?>
    <script>
        Swal.fire({
            icon: 'error',
            text: 'Error',
            didClose: () => {
                window.location.replace('index.php');
            }
        });
    </script>
    <?php
}

// Close the database connection
mysqli_close($conn);
?>
