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
        $sql = "SELECT * FROM registration_donor WHERE email='$email'";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                ?>
<div class="col-md-4 chart-layer1-right"> 
						<div class="user-marorm">
						<div class="">				
						</div>
						<div class="malorm-bottom">
							 <h2><?php echo $row['full_name'] ?></h2>
							<p><b>Email: </b><?php echo $row['email'] ?> <br>
                            <b>Contact Number: </b> <?php echo $row['mob'] ?> <br>
                            <b>State: </b><?php echo $row['street'] ?> <br>
                            <b>District: </b><?php echo $row['district'] ?> <br>
                            <b>PIN: </b><?php echo $row['pincode'] ?><br>
                            <a class="btn btn-success" href="form/edit.php?email=<?php echo $row['email'] ?>">Edit</a></p>
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
