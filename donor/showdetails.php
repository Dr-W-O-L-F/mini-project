<?php
include("header.php");
?>

<div id="page-wrapper">
    <div class="main-page">
        <h2 class="title1">Donation Details</h2>
        <?php
        // Check if the donation_id is provided in the query parameter
        if (isset($_GET['id'])) {
            $payment_id = $_GET['id'];
            $donation_id = $_GET['donation_id'];

            require("connect.php");

            // Use a prepared statement to avoid SQL injection
            $stmt = $conn->prepare("SELECT * FROM payment WHERE payment_id = ?");
            $stmt->bind_param("i", $payment_id); // "i" indicates an integer parameter
            $stmt->execute();
            $res = $stmt->get_result();

            if ($res->num_rows > 0) {
                $row = $res->fetch_assoc();

                // Display the details of the selected row
                echo "<h3><b>Donor Name:</b> " . $row['full_name'] . "<br>";
                echo "<b>Email:</b> " . $row['email'] . "<br>";
                echo "<b>Phone Number :</b> " . $row['phone_number'] . "<br>";
                echo "<b>City :</b> " . $row['city'] . "<br>";
                echo "<b>Address :</b> " . $row['address'] . "<br>";
                echo "<b>Amount:</b> " . $row['amount'] . "<br>";
                echo "<b>Organization Email:</b> " . $row['organization_email'] . "<br>";
                echo "<b>Date & Time :</b> " . $row['time_stamp'] . "<br>";

                // Add more fields as needed
                $stmt = $conn->prepare("SELECT * FROM request_form WHERE donation_id = ?");
                $stmt->bind_param("i", $donation_id); // Use the same $payment_id
                $stmt->execute();
                $res = $stmt->get_result();
                if ($res->num_rows > 0) {
                    while ($row1 = $res->fetch_assoc()) {
                        // Display the details of each row from request_form
                        echo "<b>Donation Type:</b> " . $row1['donation_type'] . "<br>";
                        echo "<b>Donation Details:</b> " . $row1['donation_details'] . "<br>";
                        echo "<b>Estimated Amount :</b> " . $row1['estimated_amount'] . "<br>";
                        echo "<b>Account Number:</b> " . $row1['account_number'] . "<br>";
                        echo "<b>IFSC Code:</b> " . $row1['ifsc_code'] . "<br>";
                        echo "<b>Bank Name:</b> " . $row1['bank_name'] . "<br>";
                        echo "<b>Account Holder Name:</b> " . $row1['holder_name'] . "<br>";
                        echo "<b>Branch Name:</b> " . $row1['branch'] . "<br>";
                        echo "<b>Place:</b> " . $row1['place'] . "<br>";
                        echo "<b>Date:</b> " . $row1['date'] . "<br>";
                        // Add any additional formatting or styling as needed
                    }
                    echo '<a class="btn btn-primary" href="payments.php">Go Back</a>';
                    echo '</h3>';
                } else {
                    echo "<p>No data found for the specified ID.</p>";
                }
            }
        } else {
            echo "<p>No ID provided.</p>";
        }
        ?>
    </div>
</div>

<?php
include("footer.php");
?>
