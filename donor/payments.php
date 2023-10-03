<?php
session_start(); // Start the session
include("header.php");
$email = $_SESSION['email'];
?>

<div id="page-wrapper">
    <div class="main-page">
        <h2 class="title1">My Donations</h2>
        <table class="table">
            <thead>
                <th>Donor Name</th>
                <th>Email</th>
                <th>Amount</th>
                <th>Date & Time</th>
                <th></th>
            </thead>
            <tbody>
                <?php
                require("connect.php");
                // Corrected the SQL query by adding single quotes around $email
                $sql = "SELECT * FROM payment WHERE donor_email='$email'";
                $res = mysqli_query($conn, $sql);
                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                ?>
                        <tr>
                            <td><?php echo $row['full_name'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['amount'] ?></td>
                            <td><?php echo $row['time_stamp'] ?></td>
                            <td><a class="btn btn-primary" href="showdetails.php?id=<?php echo $row['payment_id'] ?>&donation_id=<?php echo $row['donation_id']; ?>">View</a></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include("footer.php");
?>
 