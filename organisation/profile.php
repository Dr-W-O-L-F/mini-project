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
        $sql = "SELECT * FROM registration_organisation WHERE organisation_email='$email'";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                ?>
                <div class="col-md-4 chart-layer1-right"> 
						<div class="user-marorm">
						<div class="">				
						</div>
						<div class="malorm-bottom">
							 <h2><?php echo $row['organisation_name'] ?></h2>
							<p><b>Email: </b><?php echo $row['organisation_email'] ?> <br>
                            <b>Contact Number: </b> <?php echo $row['organisation_phone'] ?> <br>
                            <b>State: </b><?php echo $row['organisation_street'] ?> <br>
                            <b>District: </b><?php echo $row['organistion_district'] ?> <br>
                            <b>PIN: </b><?php echo $row['organisation_pincode'] ?><br>
                            <b>License Number: </b><?php echo $row['organisation_licence_number'] ?><br>
                            <img src="../log/<?php echo $row['organisation_licence_file'] ?>" width="300" height="200"><br><br>
                            <a class="btn btn-success" href="profile_form/edit.php?email=<?php echo $row['organisation_email'] ?>">Edit</a></p>
							<ul class="malorum-icons">
								<li><a href="#"><i class="fa fa-facebook"> </i>
									<div class="tooltip"><span>Facebook</span></div>
								</a></li>
								<li><a href="#"><i class="fa fa-twitter"> </i>
									<div class="tooltip"><span>Twitter</span></div>
								</a></li>
								<li><a href="#"><i class="fa fa-google-plus"> </i>
									<div class="tooltip"><span>Google</span></div>
								</a></li>
							</ul>
						</div>
					   </div>
					</div> 
					<div class="clearfix"> </div>
				</div>
                <?php
            }
        }
        ?>
    </div>
</div>

<?php
include("footer.php");
?>