<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
		</script>
		<script>
		function validatePassword() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmPassword").value;
		if (password !== confirmPassword) {
        alert("Passwords do not match. Please try again.");
        return false;
	    } else {
        return true;
        }
        }
		</script>
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text.css'/>
		<!--//webfonts-->
</head>
<body>
	<div class="main">
		<div class="header" >
			<h1>Create an Account</h1>
		</div>
			<form onsubmit="return validatePassword()" action="doreg.php" method="POST">
				<ul class="left-form">
					<h2>New Account:</h2>
					<li>
						<input type="text" name="full_name" placeholder="Full Name" pattern="^[A-Za-z\s]+$" required/>
						<div class="clear"></div>
					  </li> 
					  <li>
						<input type="email" name="email" placeholder="Email" required/>
						<div class="clear"></div>
					  </li> 
					  <li>
						<input type="text" name="mobnumber" placeholder="Mobile Number" pattern="^\d{10,11}$"  required/>
						<div class="clear"></div>
					  </li> 
					  <li>
						<input type="text" name="street" placeholder="Street" pattern="^[A-Za-z]+$" required/>
						<div class="clear"></div>
					  </li> 
					  <li>
						<input type="text" name="district" placeholder="District" pattern="^[A-Za-z]+$" required/>
						<div class="clear"></div>
					  </li> 
					  <li>
						<input type="text" name="pincode" placeholder="Pincode" pattern="^\d{6}$" required/>
						<div class="clear"></div>
					  </li> 
					  <p>*Password should containt atleast 8 charactere, one special symbol, character, number</p>
					  <li>
						<input type="password" name="password" placeholder="Password" id="password" pattern="^(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[@#$%^&+=!])(?=\S+$).{8,}$" required/>
						<div class="clear"></div>
					  </li>
					  <li>
						<input type="password" name="confirmPassword" placeholder="Confirm Password" id="confirmPassword" pattern="^(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[@#$%^&+=!])(?=\S+$).{8,}$" required/>
						<div class="clear"></div>
					  </li> 
					  <li>
						<select id="Questions" name="security_question">
						  <option value="Your favorite number?">Your favorite number?</option>
						  <option value="What is your pet?">What is your pet?</option>
						  <option value="Your favorite food?">Your favorite food?</option>
						</select>
					  </li>
					  <li>
						<input type="text" name="your_answer" placeholder="Your Answer" required/>
						<div class="clear"></div>
					  </li> 
					<input type="submit" value="Create Account">
						<div class="clear"> </div><a href="index.php">Already have an account</a>/ <a href="index1.php">Signup as a organisation</a>
                        </ul><div class="clear"> </div>
					
                    </form>
                    </div>
        </body>
        </html> 