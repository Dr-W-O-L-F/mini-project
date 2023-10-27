<?php
session_start(); // Start the session
include("header.php");
$email = $_SESSION['email'];
?>

<div id="page-wrapper">
  <div class="main-page">
    <h2 class="title1">My Donations</h2>

    <input type="text" id="searchInput" placeholder="Search for donations">

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
        $sql = "SELECT * FROM payment WHERE organization_email='$email'";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
          while ($row = mysqli_fetch_assoc($res)) {
        ?>
            <tr class="donation-row">
              <td><?php echo $row['full_name'] ?></td>
              <td><?php echo $row['email'] ?></td>
              <td><?php echo $row['amount'] ?></td>
              <td><?php echo $row['time_stamp'] ?></td>
              <td><a class="btn btn-primary" href="fulldetails.php?id=<?php echo $row['payment_id'] ?>&donation_id=<?php echo $row['donation_id']; ?>">View</a></td>
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
    const donationRows = document.querySelectorAll(".donation-row");

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
