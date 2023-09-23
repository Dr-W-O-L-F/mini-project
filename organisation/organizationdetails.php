<?php
session_start(); // Start the session
include("header.php");
$email = $_SESSION['email'];
?>

<div id="page-wrapper">
  <div class="main-page">
    <h2 class="title1">Request Details</h2>
    <table class="table">
      <thead>
        <th>
          <h2 class="title1">Donation Type</h2>
        </th>
        <th>
          <h2 class="title1">Estimated Amount</h2>
        </th>
        <th>
          <h2 class="title1">Account Number</h2>
        </th>
        <th></th>
      </thead>
      <tbody>
        <?php
        require("connect.php");
        // Corrected the SQL query by adding single quotes around $email
        $sql = "SELECT * FROM request_form WHERE organization_email='$email'";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
          while ($row = mysqli_fetch_assoc($res)) {
        ?>
            <tr>
              <td>
                <?php echo $row['donation_type'] ?>
              </td>
              <td>
                <?php echo $row['estimated_amount'] ?>
              </td>
              <td>
                <?php echo $row['account_number'] ?>
              </td>
              <td><a class="btn btn-primary" href="showrequest.php?id=<?php echo $row['donation_id'] ?>">View</a></td>
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
