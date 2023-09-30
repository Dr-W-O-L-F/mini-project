<?php
include("header.php");
?>
			<div id="page-wrapper">
			<div class="main-page">
				<h2 class="title1">Complaints List</h2>
				
				<table class="table">
					<thead>
					
					<th>
					<h2 class="title1">Subject</he>
					</th>
					<th>
					<h2 class="title1"> Email</h2>
					</th>
					<th>
					<h2 class="title1"> Description</h2>
					</th>
					<th>
					<h2 class="title1"> Date & Time</h2>
					</th>
					<th>
					<h2 class="title1"> Status</h2>
					</th>
					<th></th>
                  </thead>
				<tbody>
				<?php
				require("connect.php");
				$sql="SELECT * FROM complaints";
				$res=mysqli_query($conn,$sql);
				if(mysqli_num_rows($res)>0){
					while($row=mysqli_fetch_assoc($res)){
						$cmo_id=$row['complaint_id'];
						$sql1="SELECT * FROM complaints WHERE status=1 AND complaint_id=$cmo_id";
						// echo $sql1;
						$res1=mysqli_query($conn,$sql1);

						?>
						<tr>
							<td>
								<?php echo $row['subject'] ?>
							</td>
							<td>
								<?php echo $row['email'] ?>
							</td>
							<td>
								<?php echo $row['description'] ?>
							</td>
							<td>
								<?php echo $row['timestamp'] ?>
							</td>
							<td>
								<?php
								if($row1=mysqli_num_rows($res1)>0){
								 echo "Replied" ; ?>
  							    <td><a class="btn btn-primary" href="alert.php">Replay</a> </td>
								<?php
								}
								else{
								echo "Not Replied" ;
								?>
								 <td><a class="btn btn-primary" href="replay.php?id=<?php echo $row['complaint_id']?>">Replay</a> </td>
								<?php
								}
								 ?>
							</td>
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
