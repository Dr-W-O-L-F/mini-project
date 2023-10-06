<html>
<head>
  <script type="text/javascript" src="swal/jquery.min.js"></script>
  <script type="text/javascript" src="swal/bootstrap.min.js"></script>
  <script type="text/javascript" src="swal/sweetalert2@11.js"></script>
</head>
<body>
</body>
</html>
<?php
include("header.php");

require('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = 'pailysaji33@gmail.com'; // Replace with the actual email.
    $oldPassword = $_POST['old_pass'];
    $newPassword = $_POST['new_pass'];
    $confirmPassword = $_POST['con_pass'];

    // Verify that new password and confirm password match.
    if ($oldPassword !== $newPassword) {
        ?>
        <script>
                             Swal.fire({
                            icon: 'error',
                            text: 'Old password do not match .Please try again ',
                            didClose: () => {
                           window.location.href = "changepass.php";
                            }
                            });
        </script>
        <?php
    } else {
        // Use a prepared statement to update the password.
        $stmt = mysqli_prepare($conn, "UPDATE `login` SET password = ? WHERE email = ?");
        mysqli_stmt_bind_param($stmt, "ss", $newPassword, $email);

        if (mysqli_stmt_execute($stmt)) {
            ?>
            <script>
                                 Swal.fire({
                                icon: 'success',
                                text: 'Password updated successfully ',
                                didClose: () => {
                               window.location.href = "profile.php";
                                }
                                });
            </script>
            <?php
        } else {
            echo  mysqli_error($conn);
            ?>
            <script>
                                 Swal.fire({
                                icon: 'error',
                                text: 'Password update Failed ',
                                didClose: () => {
                               window.location.href = "changepass.php";
                                }
                                });
            </script>
            <?php
        }

        mysqli_stmt_close($stmt);
    }
}
?>

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

<div id="page-wrapper">
    <div class="main-page">
        <h2 class="title1">Change Password</h2>
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                <h4>Change Password :</h4>
            </div>
            <div class="form-body">
                <form onsubmit="return validatePassword()" action="" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Old Password</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Old Password" name="old_pass" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">New Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="new_pass" pattern="^(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[@#$%^&+=!])(?=\S+$).{8,}$" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" placeholder="Password" name="con_pass" required>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>
