<?php
include("header.php");
?>
<div id="page-wrapper">
    <div class="main-page">
        <h2 class="title1">Donation Details</h2>

        <table class="table table-hover">
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
                $sql = "SELECT * FROM payment";
                $res = mysqli_query($conn, $sql);
                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                        <tr>
                            <td><?php echo $row['full_name'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['amount'] ?></td>
                            <td><?php echo $row['time_stamp'] ?></td>
                            <td><a class="btn btn-primary"
                                    href="fulldetails.php?id=<?php echo $row['payment_id'] ?>&donation_id=<?php echo $row['donation_id']; ?>">View</a>
                            </td>
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
