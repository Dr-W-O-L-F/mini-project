<?php
session_start();
include("header.php");
$email = $_SESSION['email'];
?>
			<div id="page-wrapper">
			<div class="main-page">
				<h2 class="title1">My Profile</h2>	


				<?php
				require("connect.php");
				$sql="SELECT * FROM registration_donor";
				$res=mysqli_query($conn,$sql);
				if(mysqli_num_rows($res)>0){
					while($row=mysqli_fetch_assoc($res)){
						?>

                            <h2 class="title1">Donor Name</h2>
                        	<?php echo $row['full_name'] ?><br>
                            <h2 class="title1"> Email</h2>
                            <?php echo $row['email'] ?><br>
                            <h2 class="title1"> Mobile</h2>
                            <?php echo $row['mob'] ?><br>
                            <h2 class="title1"> Street</h2>
                            <?php echo $row['street'] ?><br>
                            <h2 class="title1"> District</h2>
                            <?php echo $row['district'] ?><br>
                            <h2 class="title1"> Pin</h2>
                            <?php echo $row['pincode'] ?><br>
					
						<?php
					}
				}
				?>
			</div>
		</div>
	
  <?php
  include("footer.php");
  ?>