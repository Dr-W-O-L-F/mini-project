<?php
include("header.php");
?>

<style>
  /* Add custom CSS styles to make page-wrapper scrollable */
  #page-wrapper {
      max-height: 500px; /* Set a maximum height for the page-wrapper */
      overflow-y: auto; /* Add a vertical scrollbar if content exceeds the height */
  }
</style>

<div id="page-wrapper">
  <div class="main-page">
        <!-- Add the search input field -->
        <input type="text" id="searchInput" placeholder="Search for donations">

    <h2 class="title1">Donation List</h2>

    <?php
    require("connect.php");
    $sql = "SELECT * FROM request_form";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
      while ($row = mysqli_fetch_assoc($res)) {
        $donation_id = $row['donation_id'];
        $sql1 = "SELECT * FROM total_amount WHERE request_id = $donation_id";
        $result1 = mysqli_query($conn, $sql1);
        if (mysqli_num_rows($result1) > 0) {
          $row1 = mysqli_fetch_assoc($result1);
          $total = $row1['recieved_amount'];
          $need = $row['estimated_amount'] - $total;
          if ($total < $row['estimated_amount']) {
    ?>
            <div class="col-md-6">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h4 class="panel-title">Category: <?php echo $row['donation_type'] ?></h4>
                </div>

                <div class="panel-body">
                  <ul class="list-group">
                    <li class="list-group-item">Details: <?php echo $row['donation_details'] ?></li>
                    <li class="list-group-item">Date: <?php echo $row['date'] ?></li>
                    <li class="list-group-item">Estimated Amount: <?php echo $row['estimated_amount'] ?></li>
                    <li class="list-group-item">Remaining To Collect: <?php echo $need ?></li>
                    <li class="list-group-item">Account Number: <?php echo $row['account_number'] ?></li>
                  </ul>
                </div>

                <div class="panel-footer">
                  <a href="web/index.php?email=<?php echo $row['organization_email']; ?>&donation_id=<?php echo $row['donation_id']; ?>" class="btn btn-primary">Donate</a>
                  <a href="fulldetails.php?id=<?php echo $row['donation_id']; ?>" class="btn btn-primary">Full Details</a>
                </div>
              </div>
            </div>
    <?php
          }
        }
      }
    }
    ?>
  </div>
</div>

<?php
include("footer.php");
?>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    const donationPanels = document.querySelectorAll(".panel-info");

    searchInput.addEventListener("input", function () {
      const searchText = searchInput.value.toLowerCase();

      donationPanels.forEach(function (panel) {
        const panelText = panel.textContent.toLowerCase();
        if (panelText.includes(searchText)) {
          panel.style.display = "";
        } else {
          panel.style.display = "none";
        }
      });
    });
  });
</script>
