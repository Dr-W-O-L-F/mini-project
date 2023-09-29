<?php
include("header.php");
?>

<div id="page-wrapper">
  <div class="main-page">
    <h2 class="title1">Donation List</h2>

    <?php
    require("connect.php");
    $sql = "SELECT * FROM request_form";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
      $count = 0; // Initialize a counter to keep track of cards in the current row
      while ($row = mysqli_fetch_assoc($res)) {
        if ($count % 3 == 0) {
          // Start a new row container for every third card
          if ($count > 0) {
            echo '</div>';
			echo '<br>'; // Close the previous row container (except for the first row)
          }
          echo '<div class="row">'; // Start a new row container
        }
    ?>
        <div class="col-md-4"> <!-- Adjust the column size as per your layout -->
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Category: <?php echo $row['donation_type'] ?></h5>
              <p class="card-text">Details: <?php echo $row['donation_details'] ?></p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Date: <?php echo $row['date'] ?></li>
              <li class="list-group-item">Estimated Amount: <?php echo $row['estimated_amount'] ?></li>
              <li class="list-group-item">Account Number: <?php echo $row['account_number'] ?></li>
            </ul>
            <div class="card-body">
            <a href="web/index.php?email=<?php echo $row['organization_email']; ?>&donation_id=<?php echo $row['donation_id']; ?>" class="btn btn-primary">Donate</a>
			  <a href="fulldetails.php?id=<?php echo $row['donation_id']; ?>" class="btn btn-primary">Full Details</a>
		    </div>
          </div>
        </div>
    <?php
        $count++;
      }
      echo '</div>'; // Close the last row container
    }
    ?>

  </div>
</div>

<?php
include("footer.php");
?>


