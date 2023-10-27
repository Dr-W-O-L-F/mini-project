<?php
session_start(); // Start the session
include("header.php");
$email = $_SESSION['email'];
?>

<div id="page-wrapper">
    <div class="main-page">
        <h2 class="title1">My Donations</h2>

        <!-- Add the search input field -->
        <input type="text" id="searchInput" placeholder="Search for donations">

        <table class="table table-hover">
            <thead>
                <th>
                <h2 class="title1">Donor Name</h2>
                </th>
                <th><h2 class="title1">Email</h2>
                </th>
                <th><h2 class="title1">Amount</h2>
                </th>
                <th><h2 class="title1">Date & Time</h2>
                </th>
                <th><h2 class="title1">Recipt</h2>
                </th>
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
                            <td><?php echo $row['donor_email'] ?></td>
                            <td><?php echo $row['amount'] ?></td>
                            <td><?php echo $row['time_stamp'] ?></td>
                            <td><a class="btn btn-primary" href="recipt.php?id=<?php echo $row['payment_id'] ?>&donation_id=<?php echo $row['donation_id']; ?>">Recipt</a></td>
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById("searchInput");
        const donationRows = document.querySelectorAll("tbody tr");

        searchInput.addEventListener("input", function () {
            const searchText = searchInput.value.toLowerCase();

            donationRows.forEach(function (row) {
                const text = row.textContent.toLowerCase();
                if (text.includes(searchText)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    });
</script>
