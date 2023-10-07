<!-- edit.php -->

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
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
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text.css' />
    <!--//webfonts-->
</head>
<body>
<?php
require('connect.php');
$email = $_GET['email'];
$stmt = $conn->prepare("SELECT * FROM registration_donor WHERE email = ?");
$stmt1 = $conn->prepare("SELECT * FROM login WHERE email = ?");
if (!$stmt || !$stmt1) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("s", $email);

if (!$stmt->execute()) {
    die("Execute failed: " . $stmt->error);
}

$res = $stmt->get_result();

if ($res->num_rows > 0) {
    $row = $res->fetch_assoc();
    $stmt->close();
    ?>
    <div class="main">
        <div class="header">
            <h1>Edit Profile</h1>
        </div>
        <form onsubmit="return validatePassword()" action="update.php?email=<?php echo $email; ?>" method="POST" enctype="multipart/form-data">
            <ul class="left-form">
                <h2>Edit Account:</h2>
                <li>
                    <input type="text" name="full_name" placeholder="Full Name" value="<?php echo $row['full_name'] ?>" pattern="^[A-Za-z\s]+$" required/>
                    <div class="clear"> </div>
                </li> 
  
                <li>
                    <input type="text" name="mobnumber" placeholder="Mobile Number" value="<?php echo $row['mob'] ?>" pattern="^\d{10,11}$" required/>
                    <div class="clear"> </div>
                </li> 
                <li>
                    <input type="text" name="street" placeholder="Street" value="<?php echo $row['street'] ?>" pattern="^[A-Za-z]+$" required/>
                    <div class="clear"> </div>
                </li> 
                <li>
                    <input type="text" name="district" placeholder="District" value="<?php echo $row['district'] ?>" pattern="^[A-Za-z]+$" required/>
                    <div class="clear"> </div>
                </li> 
                <li>
                    <input type="text" name="pincode" placeholder="Pincode" value="<?php echo $row['pincode'] ?>" pattern="^\d{6}$" required/>
                    <div class="clear"> </div>
                </li> 
                <p>*Password should containt atleast 8 charactere, one special symbol, character, number</p>
                <li>
                    <input type="password" name="password" placeholder="Password" value="<?php echo $row['password'] ?>" id="password" pattern="^(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[@#$%^&+=!])(?=\S+$).{8,}$" required/>
                    <div class="clear"> </div>
                </li>
                <li>
                </li> 
                <?php
               } if (!$stmt1->bind_param("s", $email)) {
                    die("Binding parameters failed: " . $stmt1->error);
                }
                if (!$stmt1->execute()) {
                    die("Execute failed: " . $stmt1->error);
                }
                
                $res1 = $stmt1->get_result();
                if ($res1->num_rows > 0) {
                    $row1 = $res1->fetch_assoc();
                    ?>
                    <li>
                        <select id="Questions" name="security_question">
                            <option value="Your favorite number?" <?php if ($row1['security_question'] === 'Your favorite number?') echo 'selected'; ?>>Your favorite number?</option>
                            <option value="What is your pet?" <?php if ($row1['security_question'] === 'What is your pet?') echo 'selected'; ?>>What is your pet?</option>
                            <option value="Your favorite food?" <?php if ($row1['security_question'] === 'Your favorite food?') echo 'selected'; ?>>Your favorite food?</option>
                        </select>
                    </li>
                    <li>
                        <input type="text" name="your_answer" placeholder="Answer" value="<?php echo $row1['security_answer'] ?>" required/>
                        <div class="clear"> </div>
                    </li> 
                <?php } ?>
                <input type="hidden" name="email" value="<?php echo $email; ?>">
                <input type="submit" value="UPDATE" name="update">
            </ul>
            <ul class="right-form">
                
            </ul>
            <div class="clear"> </div>
        </form>
    </div>
</body>
</html>
 