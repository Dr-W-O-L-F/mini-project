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
    <script type="application/x-javascript"> 
        addEventListener("load", function() { 
            setTimeout(hideURLbar, 0); 
        }, false);

        function hideURLbar(){ 
            window.scrollTo(0,1); 
        } 
    </script>
    <!-- //for-mobile-apps -->

    <!-- //custom-theme -->
    <link href="form/css/style.css" rel="stylesheet" type="text/css" media="all" />

    <!-- js -->
    <script type="text/javascript" src="form/js/jquery-2.1.4.min.js"></script>
    <!-- //js -->

    <!-- google fonts -->
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <!-- google fonts -->

</head>

<body>
    <?php
    require('connect.php');
    $donation_id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM request_form WHERE donation_id = ?");
    $stmt->bind_param("i", $donation_id); // "i" indicates an integer parameter
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
    ?>
    <!-- banner -->
    <div class="center-container">
        <div class="banner-dott">
            <div class="main">
                <div class="w3layouts_main_grid">
                    <h1 class="w3layouts_head">Donation Request Form</h1>
                    <form action="update.php?id=<?php echo $donation_id; ?>" method="post" class="w3_form_post">
                        <div class="w3_agileits_main_grid w3l_main_grid">
                            <span class="agileits_grid">
                                <label>Donation Type <span class="star">*</span></label>
                                <input type="text" name="event_name" placeholder="Name Of Event Or Project" value="<?php echo $row['donation_type'] ?>" required="">
                            </span>
                        </div>
                        <div class="w3_agileits_main_grid w3l_main_grid">
                            <span class="agileits_grid">
                                <label>Details <span class="star">*</span></label>
                                <textarea name="event_details" placeholder="Enter Event Details" required=""><?php echo $row['donation_details']; ?></textarea>
                            </span>
                        </div>
                        <div class="w3_agileits_main_grid w3l_main_grid">
                            <span class="agileits_grid">
                                <label>Estimated Amount <span class="star">*</span></label>
                                <input type="text" name="estimated_amount" placeholder="Estimated Amount" value="<?php echo $row['estimated_amount'] ?>" required="">
                            </span>
                        </div>
                        <div class="w3_agileits_main_grid w3l_main_grid">
                            <span class="agileits_grid">
                                <label>Account Details <span class="star">*</span></label>
                                <div class="form-input add">
                                    <span class="form-sub-label line1">
                                        <input type="text" name="acc_num" placeholder="Account Number " value="<?php echo $row['account_number'] ?>" required="">
                                    </span>
                                    <span class="form-sub-label line2">
                                        <input type="text" name="ifsc" placeholder="IFSC Code " value="<?php echo $row['ifsc_code'] ?>" required="">
                                    </span>
                                    <div class="clear"></div>
                                    <span class="form-sub-label city">
                                        <input type="text" name="bank_name" placeholder="Bank Name " value="<?php echo $row['bank_name'] ?>" required="">
                                    </span>
                                    <span class="form-sub-label state">
                                        <input type="text" name="acc_name" placeholder="Account Holder Name" value="<?php echo $row['holder_name'] ?>" required="">
                                    </span>
                                    <div class="clear"></div>
                                    <span class="form-sub-label code">
                                        <input type="text" name="branch" placeholder=" Branch " value="<?php echo $row['branch'] ?>" required="">
                                    </span>
                                    <span class="form-sub-label country">
                                        <input type="text" name="place" placeholder="Place " value="<?php echo $row['place'] ?>" required="">
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
                                    <input class="date" id="datepicker" name="date" type="text" value="<?php echo $row['date'] ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required="">
                                </div>
                                <div class="clear"> </div>
                            </span>
                        </div>

                        <div class="w3_main_grid">
                            <div class="w3_main_grid_right">
                                <input type="hidden" name="donation_id" value="<?php echo $donation_id; ?>">
                                <input type="submit" value="Update" name="Update">
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Calendar -->
                <link rel="stylesheet" href="form/css/jquery-ui.css" />
                <script src="form/js/jquery-ui.js"></script>
                <script>
                    $(function() {
                        $("#datepicker").datepicker();
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
</body>
<?php
    }
    else {
        echo "<p>No data found for the specified ID.</p>";
    }
?>
</html>
 