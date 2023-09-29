<?php
include("header.php");
?>
<div id="page-wrapper">
    <div class="main-page">
        <h2 class="title1">Full Details</h2>
        <?php
// Check if the donation_id is provided in the query parameter
if (isset($_GET['id'])) {
    $donation_id = $_GET['id'];
    
    require("connect.php");
    
    // Use a prepared statement to avoid SQL injection
    $stmt = $conn->prepare("SELECT * FROM request_form WHERE donation_id = ?");
    $stmt->bind_param("i", $donation_id); // "i" indicates an integer parameter
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();

        // Display the details of the selected row
        echo "<div id='page-wrapper'>";
                echo "<h3><b>Organization Email:</b> " . $row['organization_email'] . "<br>";
                echo "<b>Donation Type:</b> " . $row['donation_type'] . "<br>";
                echo "<b>Donation Details:</b> " . $row['donation_details'] . "<br>";
                echo "<b>Estimated Amount :</b> " . $row['estimated_amount'] . "<br>";
                echo "<b>Account Number:</b> " . $row['account_number'] . "<br>";
                echo "<b>IFSC Code:</b> " . $row['ifsc_code'] . "<br>";
                echo "<b>Bank Name:</b> " . $row['bank_name'] . "<br>";
                echo "<b>Account Holder Name:</b> " . $row['holder_name'] . "<br>";
                echo "<b>Branch Name:</b> " . $row['branch'] . "<br>";
                echo "<b>Place:</b> " . $row['place'] . "<br>";
                echo "<b>Date:</b> " . $row['date'] . "<br>";
        // Add more fields as needed
        echo '<br><br>';
      ?>             
       <a href="web/index.php?email=<?php echo $row['organization_email']; ?>" class="btn btn-primary">Donate</a>
      <?php
echo '</h3>';
        
        echo "</div></div>";
    } else {
        echo "<p>No data found for the specified ID.</p>";
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
 