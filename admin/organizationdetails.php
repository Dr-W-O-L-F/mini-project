<?php
include("header.php");
?>
			<div id="page-wrapper">
			<div class="main-page"><h2 class="title1">Organizations</h2>
				<table class="table table-hover">
					<thead>
					
					<th>
					<h2 class="title1">Organization Name</he>
					</th>
					<th>
					<h2 class="title1">Organization Street</h2>
					</th>
					<th>
					<h2 class="title1">organization District</h2>
					</th>
					<th></th>
                  </thead>
				<tbody>
				<?php
				require("connect.php");
				$sql="SELECT * FROM registration_organisation WHERE verify_status=1";
				$res=mysqli_query($conn,$sql);
				if(mysqli_num_rows($res)>0){
					while($row=mysqli_fetch_assoc($res)){
						?>
						<tr>
							<td>
								<?php echo $row['organisation_name'] ?>
							</td>
							<td>
								<?php echo $row['organisation_street'] ?>
							</td>
							<td>
								<?php echo $row['organistion_district'] ?>
							</td>
							<td><a class="btn btn-primary" href="showdetailsapprove.php?email=<?php echo $row['organisation_email']?>">View</a> </td>
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