<html>
<head>
<script type="text/javascript" src="swal/jquery.min.js"></script>
<script type="text/javascript" src="swal/bootstrap.min.js"></script>
<script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>
<body>
</html>
<?php
session_start();
require("connect.php");

// Check if 'email' exists in the $_GET array
if (isset($_GET['email'])) {
    $Email = $_GET['email']; // Use 'email' instead of 'Email'

    // Assuming you have an ID to identify the record to update, replace "your_id_column" with the actual column name that stores the unique identifier.
    if (isset($_POST['update'])) { // Changed 'Update' to 'update'
        // Retrieve data from the form using $_POST
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $mobnumber = $_POST['mobnumber'];
        $street = $_POST['street'];
        $district = $_POST['district'];
        $pincode = $_POST['pincode'];
        $password = $_POST['password'];
        $security_question = $_POST['security_question'];
        $your_answer = $_POST['your_answer'];

        // Update 'registration_donor' table
        $sql = "UPDATE `registration_donor` SET 
            `full_name`='$full_name', 
            `email`='$email', 
            `mob`='$mobnumber',
            `street`='$street',
            `district`='$district',
            `pincode`='$pincode',
            `password`='$password' 
            WHERE `email`='$Email'";

        if (mysqli_query($conn, $sql)) {
            // Update 'login' table
            $sql1 = "UPDATE `login` SET 
                `email`='$email',
                `password`='$password',
                `security_question`='$security_question',
                `security_answer`='$your_answer' 
                WHERE `email`='$Email'";

            if (mysqli_query($conn, $sql1)) {
                ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        text: 'Profile updated successfully ',
                        didClose: () => {
                            window.location.href = "../profile.php";
                        }
                    });
                </script>
                <?php
            } else {
                echo mysqli_error($conn);
                ?>
            <script>
                                 Swal.fire({
                                icon: 'error',
                                text: 'Error ',
                                didClose: () => {
                               window.location.href = "../profile.php";
                                }
                                });
            </script>
            <?php
            }
        } else {
            echo   mysqli_error($conn);
            ?>
            <script>
                                 Swal.fire({
                                icon: 'error',
                                text: 'Error ',
                                didClose: () => {
                               window.location.href = "../profile.php";
                                }
                                });
            </script>
            <?php
        }
    }
} else {
    ?>
            <script>
                                 Swal.fire({
                                icon: 'error',
                                text: 'Email is missing ',
                                didClose: () => {
                               window.location.href = "../profile.php";
                                }
                                });
            </script>
            <?php
}
?>
