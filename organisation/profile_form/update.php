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

if (isset($_GET['email'])) {
    $email = $_GET['email'];

    // Retrieve data from the form using $_POST
    $full_name = $_POST['full_name'];
    $email_post = $_POST['email']; // Use a different variable name to avoid conflict
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

    // Define the absolute path to the directory where you want to store files
    $absolute_path = "../../"; // Replace with your server's absolute path

    // File Upload
    $target_dir = $absolute_path . "log/uploads/"; // Update the directory path
    $original_file_name = $_FILES["org_license"]["name"];
    $file_extension = pathinfo($original_file_name, PATHINFO_EXTENSION);
    $file_name = uniqid() . "." . $file_extension; // Custom file name with a unique ID
    $target_file = $target_dir . $file_name;
    $uploadOk = 1;

    // Check if file is an image (you can add more file type checks)
    $check = getimagesize($_FILES["org_license"]["tmp_name"]);
    if ($check === false) {
        ?>
        <script>
                            Swal.fire({
                                    icon: 'error',
                                    text: ' File is not an image. ',
                                    didClose: () => {
                                    window.location.replace('edit.php');
                                    }
                                    });
        </script>
        <?php
        exit; // Terminate script
    }

    // Check for file upload errors
    if ($_FILES["org_license"]["error"] !== UPLOAD_ERR_OK) {
        echo $_FILES["org_license"]["error"];
        ?>
        <script>
                            Swal.fire({
                                    icon: 'error',
                                    text: ' File upload error ',
                                    didClose: () => {
                                    window.location.replace('edit.php');
                                    }
                                    });
        </script>
        <?php
        exit; // Terminate script
    }

    // Perform other file upload checks (e.g., file size, file type) here if needed

    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["org_license"]["tmp_name"], $target_file)) {
            $file_name = "uploads/" . $file_name; // Add "uploads/" to the file name

            // Update 'registration_organisation' table
            $sql_update_reg_org = "UPDATE `registration_organisation` SET `full_name`=?, `email`=?, `phone`=?, `street`=?, `district`=?, `pincode`=?, `organisation_name`=?, `organisation_email`=?, `organisation_phone`=?, `organisation_street`=?, `organistion_district`=?, `organisation_pincode`=?, `organisation_licence_number`=?, `organisation_licence_file`=? WHERE `email`=?";
            $stmt_update_reg_org = $conn->prepare($sql_update_reg_org);
            $stmt_update_reg_org->bind_param("sssssssssssssss", $full_name, $email_post, $mobnumber, $street, $district, $pincode, $org_name, $org_email, $org_phone, $org_street, $org_district, $org_pincode, $org_license_num, $file_name, $email);

            if ($stmt_update_reg_org->execute()) {
                // Update 'login' table
                $sql_update_login = "UPDATE `login` SET `password`=?, `security_question`=?, `security_answer`=? WHERE `email`=?";
                $stmt_update_login = $conn->prepare($sql_update_login);
                $stmt_update_login->bind_param("ssss", $password, $security_question, $your_answer, $email_post);

                if ($stmt_update_login->execute()) {
                    ?>
                    <script>
                                        Swal.fire({
                                                icon: 'success',
                                                text: ' Updated Successfully ',
                                                didClose: () => {
                                                window.location.replace('../profile.php');
                                                }
                                                });
                    </script>
                    <?php
                    // You can also redirect the user to a success page here if needed
                } else {
                    ?>
                    <script>
                                        Swal.fire({
                                                icon: 'error',
                                                text: ' Error updating login information ',
                                                didClose: () => {
                                                window.location.replace('edit.php');
                                                }
                                                });
                    </script>
                    <?php
                    // Handle the error accordingly
                }
            } else {
                // Handle the error accordingly
                ?>
                <script>
                                    Swal.fire({
                                            icon: 'error',
                                            text: ' Error updating organization information. ',
                                            didClose: () => {
                                            window.location.replace('edit.php');
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
                                        text: ' Sorry, there was an error uploading your file. ',
                                        didClose: () => {
                                        window.location.replace('edit.php');
                                        }
                                        });
            </script>
            <?php
            // Handle the error accordingly
        }
    }
}
?>
