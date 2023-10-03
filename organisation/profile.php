<?php
session_start();
include("header.php");
$email = $_SESSION['email'];
?>
<div id="page-wrapper">
    <div class="main-page">
        <u><h2 class="title1">My Profile</h2></u>

        <?php
        require("connect.php");
        // Use single quotes around the email value in the SQL query
        $sql = "SELECT * FROM registration_organisation WHERE email='$email'";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                ?>
                <b> Name: <h3><?php echo $row['organisation_name'] ?></h3><br></b>
                <b> Email: <h3><?php echo $row['organisation_email'] ?></h3><br></b>
                <b> Mobile: <h3><?php echo $row['organisation_phone'] ?></h3><br></b>
                <b> Street: <h3><?php echo $row['organisation_street'] ?></h3><br></b>
                <b> District: <h3><?php echo $row['organistion_district'] ?></h3><br></b>
                <b> Pin: <h3><?php echo $row['organisation_pincode'] ?></h3><br></b>
                <b> License Number: <h3><?php echo $row['organisation_licence_number'] ?></h3><br></b>
                <img src="../log/<?php echo $row['organisation_licence_file'] ?>"><br><br>

				<a class="btn btn-success" href="profile_form/edit.php?email=<?php echo $row['email'] ?>">Edit</a>
                <?php
            }
        }
        ?>
    </div>
</div>

<?php
include("footer.php");
?>
