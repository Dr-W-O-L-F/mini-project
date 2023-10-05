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
    $email=$_GET['email'];
    $sql="UPDATE registration_organisation SET verify_status='1' WHERE organisation_email='$email'";
    mysqli_query($conn,$sql);
?>
<script>
                Swal.fire({
                    icon: 'success',
                    text: 'Verified',
                    didClose: () => {
                        window.location.replace('organizations.php');
                    }
                });
            </script>