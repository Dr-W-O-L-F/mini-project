<html>
<head>
<script type="text/javascript" src="swal/jquery.min.js"></script>
<script type="text/javascript" src="swal/bootstrap.min.js"></script>
<script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>
<body>
</html>
<?php
require("connect.php");
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$mobnumber = $_POST['mobnumber'];
$street = $_POST['street'];
$district = $_POST['district'];
$pincode = $_POST['pincode'];
$password = $_POST['password'];
$security_question=$_POST['security_question'];
$your_answer = $_POST['your_answer'];


$sql = "SELECT * FROM login WHERE email='$email'";
$res = select_data($sql);
if (mysqli_num_rows($res) > 0) {
    ?>
        <script>
Swal.fire({
                                icon: 'error',
                                text: ' User already exists',
                                didClose: () => {
                                window.location.replace('index2.php');
                                }
                                });   
         </script>
    <?php
} else {
    // Insert the values into the registration_donor table
    $sql = "INSERT INTO `registration_donor`(user_id, full_name, email, mob, street, district, pincode) VALUES (NULL, '$full_name', '$email', '$mobnumber', '$street', '$district', '$pincode')";
    $sql1="INSERT INTO `login`(`email`, `password`, `user_type`, `security_question`, `security_answer`) VALUES ('$email','$password','Donor','$security_question','$your_answer')";   
    if (mysqli_query($conn, $sql)) {
        if(mysqli_query($conn, $sql1)){
        }
        ?>
        <script>
Swal.fire({
                                icon: 'success',
                                text: 'Registration Successfull',
                                didClose: () => {
                                window.location.replace('index.php');
                                }
                                });
        </script>
        <?php
    } else {
        echo "Error: " . mysqli_error($conn);
        ?>
        <script>
Swal.fire({
                                icon: 'error',
                                text: 'Something Went Wrong',
                                didClose: () => {
                                window.location.replace('index2.php');
                                }
                                });   
         </script>
        <?php
    }
}
?>
 