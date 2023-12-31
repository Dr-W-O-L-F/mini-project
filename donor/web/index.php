<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Credit Card Donation</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Credit Card Donation Form Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
</head>
<body>
<?php
require("../connect.php");
$organization_email = isset($_GET['email']) ? $_GET['email'] : null;
$donation_id = isset($_GET['donation_id']) ? $_GET['donation_id'] : null;
$sql = "SELECT * FROM `total_amount` WHERE request_id = $donation_id";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        $received = $row['recieved_amount'];
        $estimate = $row['estimated_amount'];
        $total = $estimate - $received;
    } else {
        echo "No data found for donation ID: $donation_id";
    }
} else {
    echo "Query failed: " . mysqli_error($conn);
}
?>

	<div class="main">
		<h1>Credit Card Donation Form</h1>
		<form action="pay.php" method="post"> 
		<div class="w3_agile_main_grids">
		
			<div class="agileits_w3layouts_main_grid">
				<div class="agile_main_grid_left">
					
						<h3>Your Details :</h3>
						<input type="text" name="full_name" placeholder="Full Name" required="">
						<input type="email" name="email" placeholder="Email" required="">
						<input type="text" name="phone_number" placeholder="Phone Number" required="">
						<input type="text" name="place" placeholder="City" required="">
						<textarea name="address" placeholder="Address..." required=""></textarea>
					
					</div>
					<div class="agile_main_grid_left">
						<div class="w3_agileits_main_grid_left_grid">
							<h3>Your Donation :</h3>
						<div class="agileits_main_grid_left_l_grids">
							<div class="w3_agileits_main_grid_left_r">
							</div>
						</div>
						<div class="agileits_main_grid_left_l_grids">
							<div class="w3_agileits_main_grid_left_l">
								<h4>Donation Amount</h4>
							</div>
							<div class="w3_agileits_main_grid_left_r">
								<form>
									<div class="agileinfo_radio_button">
									<input type="text" name="amount" placeholder="Amount" required="">
									</div>
								</form>
							</div>
						</div>
						</div>
						<div class="w3_agileits_qualifications">
							<h3>Credit Card</h3>
							<div class="w3-agile1">
								<div class="payment-w3ls">	
									<img src="images/card.png" alt=" " class="img-responsive">
								</div>
							</div>
							<div class="card-bounding agileits"> 
								
									<div class="card-details"> 
										<aside>Name On Card:</aside>
										<input type="text" name="name" placeholder="Name On Card" required=""> 
									</div>	
									<aside>Card Number:</aside>
									<div class="card-details">
										<!--- ".card-type" is a sprite used as a background image with associated classes for the major card types, providing x-y coordinates for the sprite --->
										
										<input type="text" name="card number" class="hm" placeholder="0000 0000 0000 0000" maxlength="19" onkeyup="$cc.validate(event)" required="">
										<!-- The checkmark ".card-valid" used is a custom font from icomoon.io --->
										
									</div> 
									<div class="card-details agileits-w3layouts"> 
										<div class="expiration">
											<aside>Expiration Date</aside>
											<input type="text" name="date" id="expiry-date" maxlength="7" placeholder="mm/yyyy" required="">
										</div> 
										<div class="cvv">
											<aside>CVV</aside>
											<input type="text" name="cvv" placeholder="XXX" maxlength="3" required="">
										</div> 
										<div class="clear">	</div>		
									</div>
									<input type="hidden" name="organization_email" value="<?php echo $organization_email; ?>">
									<input type="hidden" name="donation_id" value="<?php echo $donation_id; ?>">
									<input type="submit" value="Donate">
								
							</div>
						</div>
					</div>
					
					<div class="clear"> </div>
					
			</div>
		</div>
		</form>
		<div class="agileits_copyright">
		</div>
	</div>
	<!-- Validator js -->  
	<script src="js/creditCardValidator.js" type="text/javascript"></script>
	<!-- //Validator -->  

	<script>
	function validateExpiry() {
	    var input = document.getElementById("expiry-date");
	    var currentDate = new Date();
	    var inputValue = input.value;
	    
	    // Check if the input value matches the mm/yyyy format
	    var pattern = /^(0[1-9]|1[0-2])\/(20\d{2}|21[0-9][0-9])$/;
	    
	    if (!pattern.test(inputValue)) {
	        alert("Invalid date format. Please use mm/yyyy format.");
	        return false;
	    }
	    
	    var inputDateParts = inputValue.split('/');
	    var inputMonth = parseInt(inputDateParts[0], 10);
	    var inputYear = parseInt(inputDateParts[1], 10);
	    
	    var maxDate = new Date(2100, 11, 31); // December is 11 because months are zero-based
	    
	    var userDate = new Date(inputYear, inputMonth - 1, 1); // Subtract 1 from month because months are zero-based
	    
	    if (userDate < currentDate || userDate > maxDate) {
	        alert("Expiration date must be valid one more month and before December 2100.");
	        return false;
	    }
	    
	    return true;
	}

	document.querySelector("form").addEventListener("submit", function(event) {
	    if (!validateExpiry()) {
	        event.preventDefault(); // Prevent form submission if validation fails
	    }
	});
	function validateDonationAmount() {
    var donationAmount = parseFloat(document.getElementsByName("amount")[0].value);
    if (donationAmount <= 0 || isNaN(donationAmount) || donationAmount > <?php echo $total; ?>) {
        alert("Donation amount must be a valid positive number less than or equal to $<?php echo $total; ?>.");
        return false;
    }
    return true;
}

document.querySelector("form").addEventListener("submit", function(event) {
    if (!validateExpiry() || !validateDonationAmount()) {
        event.preventDefault(); // Prevent form submission if validation fails
    }
});
	</script>

</body>
</html>
