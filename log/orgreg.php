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
$security_question = $_POST['security_question'];
$your_answer = $_POST['your_answer'];
$org_name = $_POST['org_name'];
$org_email = $_POST['org_email'];
$org_phone = $_POST['org_phone'];
$org_street = $_POST['org_street'];
$org_district = $_POST['org_district'];
$org_pincode = $_POST['org_pincode'];
$org_license_num = $_POST['org_license_num'];

// Define the target directory for uploads
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["org_license"]["name"]);
$uploadOk = 1;

// Check if the email already exists in login table
$sql_check_login = "SELECT * FROM login WHERE email='$email'";
$res_check_login = select_data($sql_check_login);

// Check if the email already exists in registration_organisation table
$sql_check_org = "SELECT * FROM registration_organisation WHERE email='$email'";
$res_check_org = select_data($sql_check_org);

if (mysqli_num_rows($res_check_login) > 0 || mysqli_num_rows($res_check_org) > 0) {
    ?>
    <script>
                        Swal.fire({
                                icon: 'error',
                                text: ' User already exists ',
                                didClose: () => {
                                window.location.replace('index1.html');
                                }
                                });
    </script>
    <?php
} else {
    // Check file upload
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is an image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["org_license"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            ?>
            <script>
                                Swal.fire({
                                icon: 'error',
                                text: ' File is not an image ',
                                didClose: () => {
                                window.location.replace('index1.html');
                                }
                                });
            </script>
            <?php
            $uploadOk = 0;
        }
    }

    // ... (other file upload checks)

    // If everything is OK, try to upload the file and insert into the database
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["org_license"]["tmp_name"], $target_file)) {
            // Insert data into the database
            $sql = "INSERT INTO registration_organisation(full_name, email, phone, street, district, pincode, organisation_id,
            organisation_name, organisation_email, organisation_phone, organisation_street, organistion_district, organisation_pincode, organisation_licence_number, organisation_licence_file, verify_status) 
            VALUES ('$full_name', '$email', '$mobnumber', '$street', '$district', '$pincode', NULL, '$org_name',
            '$org_email', '$org_phone', '$org_street', '$org_district', '$org_pincode', '$org_license_num', '$target_file', 0)";
            $sql1 = "INSERT INTO `login`(`email`, `password`, `user_type`, `security_question`, `security_answer`) VALUES ('$email','$password','Organization','$security_question','$your_answer')";
if (mysqli_query($conn, $sql)) {
                if (mysqli_query($conn, $sql1)) {
                    ?>
                    <script>
                                        Swal.fire({
                                icon: 'success',
                                text: ' Registration Successfull ',
                                didClose: () => {
                                window.location.replace('index.html');
                                }
                                });
                    </script>
                    <?php
                }
            } else {
                echo "Error: " . mysqli_error($conn);
                ?>
                <script>
                                    Swal.fire({
                                icon: 'error',
                                text: 'Error ',
                                didClose: () => {
                                window.location.replace('index1.html');
                                }
                                });
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                                Swal.fire({
                                icon: 'error',
                                text: 'Sorry, there was an error uploading your file. ',
                                didClose: () => {
                                window.location.replace('index.html');
                                }
                                });
            </script>
            <?php
        }
    }
}
?>
