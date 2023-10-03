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

// Check if 'id' exists in the $_GET array
if (isset($_GET['id'])) {
    $donation_id = $_GET['id'];

    // Assuming you have an ID to identify the record to update, replace "your_id_column" with the actual column name that stores the unique identifier.
    if (isset($_POST['Update'])) {
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

        $sql = "UPDATE `request_form` SET 
            `donation_type` = '$event_name',
            `donation_details` = '$event_details',
            `estimated_amount` = '$estimated_amount',
            `account_number` = '$acc_num',
            `ifsc_code` = '$ifsc',
            `bank_name` = '$bank_name',
            `holder_name` = '$acc_name',
            `branch` = '$branch',
            `place` = '$place',
            `date` = '$date'
        WHERE `donation_id` = '$donation_id'";

        if (mysqli_query($conn, $sql)) {
            ?>
            <script>
                                        Swal.fire({
                                icon: 'success',
                                text: 'Form updated successfully ',
                                didClose: () => {
                              window.location.href = "showrequest.php?id=<?php echo  $donation_id ?>";
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
                                text: 'Error ',
                                didClose: () => {
                               window.location.href = "showrequest.php";
                                }
                                });
            </script>
            <?php
        }
    }
} else {
    echo "ID is missing in the URL.";
}
?>
  