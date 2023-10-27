<?php
include("header.php");
require("connect.php");
?>
			<div id="page-wrapper">
			<div class="main-page">
				<h2 class="title1">Report</h2>


                <?php
// Establish a database connection (you should have a database connection set up)

// Perform the SQL query to count the number of rows in the 'request_form' table
$sql = "SELECT COUNT(*) AS request_count FROM request_form";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $requestCount = $row['request_count'];
} else {
    // Handle the query error
    $requestCount = "N/A"; // Set a default value or error message
}

// Close the database connection if needed

?>

<div class="col-md-3 widget widget1">
    <a href="donation_requests.php">
        <div class="r3_counter_box">
            <i class="pull-left fa fa-pie-chart dollar1 icon-rounded"></i>
            <div class="stats">
                <h5><strong><?php echo $requestCount; ?></strong></h5>
                <span>Total Requests</span>
            </div>
        </div>
    </a>
</div>




<?php
// Establish a database connection (you should have a database connection set up)

// Perform the SQL query to calculate the total revenue
$sql = "SELECT SUM(amount) AS total_amount FROM payment";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalRevenue = $row['total_amount'];
} else {
    // Handle the query error
    $totalRevenue = "N/A"; // Set a default value or error message
}

// Close the database connection if needed

?>

<div class="col-md-3 widget widget1">
<a href="donationdetails.php">
    <div class="r3_counter_box">
        <i class="pull-left fa fa-dollar icon-rounded"></i>
        <div class="stats">
            <h5><strong><?php echo $totalRevenue; ?></strong></h5>
            <span>Total Collection</span>
        </div>
    </div>
   </a>
</div>



            <?php
// Establish a database connection (you should have a database connection set up)

// Perform the SQL query to count the number of rows in the 'registration_organisation' table
$sql = "SELECT COUNT(*) AS organization_count FROM registration_organisation";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $organizationCount = $row['organization_count'];
} else {
    // Handle the query error
    $organizationCount = "N/A"; // Set a default value or error message
}

// Close the database connection if needed

?>

<div class="col-md-3 widget widget1">
<a href="organizationdetails.php">
    <div class="r3_counter_box">
        <i class="pull-left fa fa-laptop user1 icon-rounded"></i>
        <div class="stats">
            <h5><strong><?php echo $organizationCount; ?></strong></h5>
            <span>Organizations</span>
        </div>
    </div>
</a>
</div>




            <?php
// Establish a database connection (you should have a database connection setup)

// Perform the SQL query to count the number of rows in the 'registration_donor' table
$sql = "SELECT COUNT(*) AS user_count FROM registration_donor";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $userCount = $row['user_count'];
} else {
    // Handle the query error
    $userCount = "N/A"; // Set a default value or error message
}

// Close the database connection if needed

?>

<div class="col-md-3 widget">
<a href="donors.php">
    <div class="r3_counter_box">
        <i class="pull-left fa fa-users dollar2 icon-rounded"></i>
        <div class="stats">
            <h5><strong><?php echo $userCount; ?></strong></h5>
            <span>Total Users</span>
        </div>
    </div>
</a>
</div>



</div>
</div>
	
  <?php
  include("footer.php");
  ?>