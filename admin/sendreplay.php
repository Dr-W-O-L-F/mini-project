<?php
require 'connect.php';

if (isset($_POST['complaint_id'])) {
    $id = $_POST['complaint_id'];
} else {
    // Handle the case where 'complaint_id' is not set, e.g., by redirecting the user or showing an error message.
    exit("Complaint ID not provided.");
}

$message = $_POST['message'];

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("UPDATE `complaints` SET `status` = '1' , replay='$message' WHERE `complaint_id` = ?");
$stmt->bind_param("i", $id); // 'i' indicates integer type

if ($stmt->execute()) {
    // Success: Complaint updated
    ?>
    <html>
    <head>
        <script type="text/javascript" src="swal/jquery.min.js"></script>
        <script type="text/javascript" src="swal/bootstrap.min.js"></script>
        <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
    </head>

    <body>
    <script>
        Swal.fire({
            icon: 'success',
            text: 'Replied  !!!',
            didClose: () => {
                window.location.replace('complaints.php');
            }
        });
    </script>
    </body>
    </html>
    <?php
} else {
    // Error: Failed to update complaint
    echo "Error updating complaint: " . $conn->error;
}

// Close the prepared statement and database connection
$stmt->close();
$conn->close();
?>
