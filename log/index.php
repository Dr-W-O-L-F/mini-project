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
			<h2>Login</h2>
			<form action="login.php" method="POST">
			<div class="inputBx">
				<input type="email" name="email" placeholder="Email">
			</div><br>
			<div class="inputBx">
				<input type="password" name="password" placeholder="Password">
			</div>			<a href="forgotpassword.php"><b>Forget Password</b></a>

			<div class="inputBx">
				<input type="submit" value="Sign in">
			</div>
			<div class="links">
				<a href="index1.php">Signup AS Organization</a> <a href="index2.php">/ User</a>
			</div>
			</form>
		</div>
	</div>
</body>
</html>