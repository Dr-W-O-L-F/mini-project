<?php
session_start(); // Start the session at the very beginning

include("header.php");

require("connect.php");

// Initialize $full_name with an empty string
$full_name = "";

// Verify if the 'email' session variable is set
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Use single quotes around the email value in SQL query
    $sql = "SELECT * FROM `registration_organisation` WHERE email='$email'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            // Assuming 'full_name' is the column name in the table
            $organisation_name = $row['organisation_name'];
        } else {
            echo "Donor not found";
        }
    } else {
        echo "Error in SQL query: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Email not found in session.";
}
?>
<div id="page-wrapper">
    <div class="main-page">
        <h2 class="title1">Hi!! <br> Welcome Back <?php echo $organisation_name; ?></h2>
        <!-- Rest of your content goes here -->
    </div>
</div>

<?php
include("footer.php");
?>
