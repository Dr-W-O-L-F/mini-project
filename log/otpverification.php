<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Animated Login Page</title>
</head>
<body>
	<div class="square">
		<!-- <i style="--clr:#00ff0a;"></i>
		<i style="--clr:#ff0057;"></i>
		<i style="--clr:#fffd44;"></i> -->
		<div class="login">
			<h2>OTP</h2>
			<form action="verify.php" method="POST">
			<div class="inputBx">				
            <input type="hidden" name="otp" value="<?php echo $_POST['otp']; ?>">
            <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
			<input type="text" name="otp1" placeholder="OTP">
			</div><br>
			<div class="inputBx">
				<input type="submit" value="submit">
			</div>
			<div class="links">
            <a href="index.php">Login</a>
			</div>
			</form>
		</div>
	</div>
</body>
</html>