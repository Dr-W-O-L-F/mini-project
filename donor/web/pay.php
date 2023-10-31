<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="swal/jquery.min.js"></script>
    <script type="text/javascript" src="swal/bootstrap.min.js"></script>
    <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>
<body>
<?php
session_start(); // Start the session
$email1 = $_SESSION['email'];
?>
<?php
require("../connect.php");

$organization_email = $_POST["organization_email"];
$donation_id = $_POST['donation_id'];
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
    $sql1 = "SELECT `recieved_amount` FROM `total_amount` WHERE request_id=$donation_id";
    $result = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result);
    $total = $row['recieved_amount'] + $amount;
    
    // Update the received amount in total_amount table
    $sql2 = "UPDATE `total_amount` SET `recieved_amount`='$total' WHERE request_id=$donation_id";
    
    if (mysqli_query($conn, $sql2)) {
        // Close the database connection
        $conn->close();
        
        // Redirect to 'donationdetails.php' on successful donation
        ?>
<script>
  let timerInterval;
  Swal.fire({
    title: 'PROCESSING!',
    html: 'YOUR PAYMENT IS PROCESSING.',
    timer: 2000,
    timerProgressBar: true,
    didOpen: () => {
      Swal.showLoading();
      const b = Swal.getHtmlContainer().querySelector('b');
      timerInterval = setInterval(() => {
        b.textContent = Swal.getTimerLeft();
      }, 100);
    },
    willClose: () => {
      clearInterval(timerInterval);
    }
  }).then((result) => {
    /* Read more about handling dismissals below */
    if (result.dismiss === Swal.DismissReason.timer) {
      console.log('I was closed by the timer');

      // Add your code here to be executed after the first script has completed
      Swal.fire({
        icon: 'success',
        text: 'Donation Successful',
        didClose: () => {
          window.location.replace('../donationdetails.php');
        }
      });
    }
  });
</script>

        <?php
    } else {
        // Handle database update errors
        ?>
        <script>
            Swal.fire({
                icon: 'error',
                text: 'Something Went Wrong',
                didClose: () => {
                    window.location.replace('index.html');
                }
            });
        </script>
        <?php
    }
} else {
    // Handle database insertion errors
    ?>
    <script>
        Swal.fire({
            icon: 'error',
            text: 'Something Went Wrong',
            didClose: () => {
                window.location.replace('index.html');
            }
        });
    </script>
    <?php
    // Close the database connection
    $conn->close();
}
?>
</body>
</html>
