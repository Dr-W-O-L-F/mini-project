<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Donation Request Form</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Electrical Service Form Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
    function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->

<!-- //custom-theme -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->

<!-- google fonts -->
<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
<!-- google fonts -->

</head>

<body>
<!-- banner -->
<div class="center-container">
    <div class="banner-dott">
        <div class="main">
            <div class="w3layouts_main_grid">
                <h1 class="w3layouts_head">Donation Request Form</h1>
                <form action="form.php" method="post" class="w3_form_post">
                    <div class="w3_agileits_main_grid w3l_main_grid">
                        <span class="agileits_grid">
                            <label>Donation Type <span class="star">*</span></label>
			<select name="event_name" required style="color: Blue;">
            <option value="" disabled selected>Select Donation Type</option>
            <option value="Scholarship">Scholarship</option>
            <option value="Medical Support">Medical Support</option>
            <option value="Charity For Orphanage">Charity For Orphanage</option>
        </select>                        </span>
                    </div>
                    <div class="w3_agileits_main_grid w3l_main_grid">
                        <span class="agileits_grid">
                            <label>Details <span class="star">*</span></label>
                            <textarea name="event_details" placeholder="Enter Event Details" required=""></textarea>
                        </span>                            
                    </div>
                    <div class="w3_agileits_main_grid w3l_main_grid">
                        <span class="agileits_grid">
                            <label>Estimated Amount <span class="star">*</span></label>
                            <input type="text" name="estimated_amount" placeholder="Estimated Amount" required="">
                        </span>
                    </div>
                    <div class="w3_agileits_main_grid w3l_main_grid">
                        <span class="agileits_grid">
                            <label>Account Details <span class="star">*</span></label>
                            <div class="form-input add">
                                <span class="form-sub-label line1">
								<input type="text" name="acc_num" class="hm" placeholder="0000 0000 0000 0000" minlength="11" maxlength="19" required="">
                                </span>
                                <span class="form-sub-label line2">
                                    <input type="text" name="ifsc" placeholder="IFSC Code" required="">
                                </span>
                                <div class="clear"></div>
                                <span class="form-sub-label city">
                                    <input type="text" name="bank_name" placeholder="Bank Name" required="">
                                </span>
                                <span class="form-sub-label state">
                                    <input type="text" name="acc_name" placeholder="Account Holder Name" required="">
                                </span>
                                <div class="clear"></div>
                                <span class="form-sub-label code">
                                    <input type="text" name="branch" placeholder="Branch" required="">
                                </span>
                                <span class="form-sub-label country">
                                    <input type="text" name="place" placeholder="Place" required="">
                                </span>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </span>
                    </div>
                    
                    <div class="agileits_w3layouts_main_grid w3ls_main_grid">
                        <span class="agileinfo_grid">
                            <label>Date <span class="star">*</span></label>
                            <div class="agileits_w3layouts_main_gridl">
                                <input class="date" id="datepicker" name="date" type="text" value="<?php echo date('m/d/Y'); ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required="">
                            </div>
                            <div class="clear"> </div>
                        </span>
                    </div>

                    <div class="w3_main_grid">
                        <div class="w3_main_grid_right">
                            <input type="submit" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
            
        <!-- Calendar -->
            <link rel="stylesheet" href="css/jquery-ui.css" />
                <script src="js/jquery-ui.js"></script>
                    <script>
                        $(function() {
                            $( "#datepicker" ).datepicker();
                        });
                    </script>
        <!-- //Calendar -->

            <div class="w3layouts_copy_right">
                <div class="container">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //footer -->
<script>
// Check if the entered date is not today's date and show an alert
document.querySelector('form').addEventListener('submit', function(event) {
    var dateField = document.querySelector('#datepicker');
    var enteredDate = new Date(dateField.value);
    var currentDate = new Date();

    // Check if the entered date is not equal to today's date
    if (
        enteredDate.getDate() !== currentDate.getDate() ||
        enteredDate.getMonth() !== currentDate.getMonth() ||
        enteredDate.getFullYear() !== currentDate.getFullYear()
    ) {
        event.preventDefault();
        alert('Please select today\'s date.');
    }
});
</script>
</body>
</html>

