<?php
include("header.php");
?>
<div id="page-wrapper">
    <div class="main-page">
        <h2 class="title1">Organization Details</h2>
        <?php
        require("connect.php");
        $email = $_GET['email'];
        // Use a prepared statement to avoid SQL injection
        $stmt = $conn->prepare("SELECT * FROM registration_organisation WHERE organisation_email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                echo "<h3><b>Organization Name:</b> " . $row['organisation_name'] . "<br>";
                echo "<b>Organization Email:</b> " . $row['organisation_email'] . "<br>";
                echo "<b>Organization Phone:</b> " . $row['organisation_phone'] . "<br>";
                echo "<b>Organization Street:</b> " . $row['organisation_street'] . "<br>";
                echo "<b>Organization District:</b> " . $row['organistion_district'] . "<br>";
                echo "<b>Organization Pincode:</b> " . $row['organisation_pincode'] . "<br>";
                echo "<b>Organization Licence Number:</b> " . $row['organisation_licence_number'] . "<br>";
                ?>
                <img src="../log/<?php echo $row['organisation_licence_file'] ?>">
                <?php
                // Generate verification and rejection links inside the loop
                echo '<br><br>';
                echo '<a class="btn btn-success" href="verify.php?email=' . $row['organisation_email'] . '">Verify</a>';
                echo ' ';
                echo '<a class="btn btn-danger" href="reject.php?email=' . $row['organisation_email'] . '">Reject</a>';
                echo '</h3>';
            }
        }
        ?>
    </div>
</div>
<?php
include("footer.php");
?>
